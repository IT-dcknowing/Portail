<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class ChatController extends Controller
{
    private const HISTORY_LIMIT = 20;   // borne unique côté serveur
    private const MAX_TOKENS = 600;
    private const TIMEOUT = 30;         // secondes
    private const DAY_LIMIT = 100;      // messages/jour/IP (quota gratuit partagé)

    /**
     * POST /api/chat — relaie OpenRouter en SSE, sans jamais exposer la clé.
     */
    public function respond(Request $request)
    {
        $ip = $request->ip();

        $data = $request->validate([
            'message' => 'required|string|max:500',
            'history' => 'sometimes|array|max:41',
            'history.*.role' => 'required_with:history|in:user,assistant,system',
            'history.*.content' => 'required_with:history|string|max:2000',
        ]);

        if (RateLimiter::tooManyAttempts('chat-day:'.$ip, self::DAY_LIMIT)) {
            return response()->json(['error' => 'busy'], 429);
        }
        RateLimiter::hit('chat-day:'.$ip, 86400);

        $key = config('services.openrouter.key');
        if (!$key) {
            Log::error('chat.openrouter: OPENROUTER_API_KEY manquante');
            return response()->json(['error' => 'down'], 503);
        }

        $model = config('services.openrouter.model', 'openrouter/free');
        $mode = config('services.openrouter.action_mode', 'tools');
        $history = array_slice($data['history'] ?? [], -self::HISTORY_LIMIT);

        $payload = [
            'model' => $model,
            'messages' => $this->buildMessages($data['message'], $history, $mode),
            'temperature' => 0.3,
            'max_tokens' => self::MAX_TOKENS,
            'stream' => true,
        ];
        if ($mode === 'tools') {
            $payload['tools'] = $this->tools();
            $payload['tool_choice'] = 'auto';
        }

        try {
            $response = $this->postStream($key, $payload);
        } catch (\Illuminate\Http\Client\ConnectionException $e) {
            Log::warning('chat.openrouter: réseau/timeout', ['ip' => $ip, 'model' => $model, 'error' => $e->getMessage()]);
            return response()->json(['error' => 'down'], 503);
        }

        // Modèle gratuit sans support des outils → 2e essai en mode balises.
        if ($mode === 'tools' && $response->status() === 400 && $this->looksLikeToolsError($response->body())) {
            Log::info('chat.openrouter: outils non supportés, repli balises', ['model' => $model]);
            unset($payload['tools'], $payload['tool_choice']);
            $payload['messages'] = $this->buildMessages($data['message'], $history, 'tags');
            try {
                $response = $this->postStream($key, $payload);
            } catch (\Illuminate\Http\Client\ConnectionException $e) {
                Log::warning('chat.openrouter: réseau/timeout (repli)', ['ip' => $ip, 'error' => $e->getMessage()]);
                return response()->json(['error' => 'down'], 503);
            }
        }

        $status = $response->status();
        if ($status === 402) {
            Log::warning('chat.openrouter: 402 paiement requis', ['ip' => $ip, 'model' => $model]);
            return response()->json(['error' => 'down'], 402);
        }
        if ($status === 429) {
            Log::warning('chat.openrouter: 429 quota', ['ip' => $ip, 'model' => $model]);
            return response()->json(['error' => 'busy'], 429);
        }
        if ($status < 200 || $status >= 300) {
            Log::warning('chat.openrouter: erreur API', [
                'ip' => $ip, 'model' => $model, 'status' => $status,
                'body' => Str::limit($response->body(), 500),
                'message' => Str::limit($data['message'], 200),
            ]);
            return response()->json(['error' => 'down'], 503);
        }

        $stream = $response->toPsrResponse()->getBody();

        return response()->stream(function () use ($stream) {
            $buffer = '';
            $tools = [];
            while (!$stream->eof()) {
                $chunk = $stream->read(8192);
                if ($chunk === '') {
                    continue;
                }
                echo $chunk;
                if (ob_get_level()) {
                    ob_flush();
                }
                flush();
                $buffer .= $chunk;
                while (($pos = strpos($buffer, "\n")) !== false) {
                    $this->collectTools(substr($buffer, 0, $pos), $tools);
                    $buffer = substr($buffer, $pos + 1);
                }
            }
            if (!empty($tools)) {
                echo 'data: '.json_encode(['__tool_calls__' => array_values($tools)])."\n\n";
                flush();
            }
            echo "data: [DONE]\n\n";
            flush();
        }, 200, [
            'Content-Type' => 'text/event-stream',
            'Cache-Control' => 'no-cache',
            'X-Accel-Buffering' => 'no',
        ]);
    }

    /**
     * POST /api/callback — demande de rappel (nom + téléphone uniquement).
     */
    public function callback(Request $request)
    {
        $data = $request->validate([
            'nom' => 'required|string|min:2|max:100',
            'telephone' => ['required', 'string', 'max:30', 'regex:/^[+\d][\d\s.\-()]{7,}$/'],
        ]);

        Log::info('chat.callback', ['nom' => $data['nom'], 'telephone' => $data['telephone'], 'ip' => $request->ip()]);

        try {
            Mail::raw(
                "Demande de rappel via le chat — {$data['nom']} ({$data['telephone']})",
                function ($mail) use ($data) {
                    $mail->to('infos@dc-knowing.com')
                        ->subject('Rappel demandé via le chat — '.$data['nom']);
                }
            );
        } catch (\Exception $e) {
            Log::error('chat.callback: envoi email impossible', ['error' => $e->getMessage()]);
        }

        return response()->json(['success' => true]);
    }

    private function postStream(string $key, array $payload)
    {
        return Http::withToken($key)
            ->timeout(self::TIMEOUT)
            ->withHeaders([
                'HTTP-Referer' => config('app.url'),
                'X-Title' => 'DC-KNOWING Agent IA',
            ])
            ->withOptions(['stream' => true])
            ->post('https://openrouter.ai/api/v1/chat/completions', $payload);
    }

    private function looksLikeToolsError(string $body): bool
    {
        return Str::contains(Str::lower($body), ['tool', 'function']);
    }

    private function collectTools(string $line, array &$tools): void
    {
        $line = trim($line);
        if (!str_starts_with($line, 'data: ')) {
            return;
        }
        $json = substr($line, 6);
        if ($json === '[DONE]') {
            return;
        }
        $parsed = json_decode($json, true);
        $calls = $parsed['choices'][0]['delta']['tool_calls'] ?? [];
        foreach ($calls as $call) {
            $idx = $call['index'] ?? 0;
            $tools[$idx]['name'] = ($tools[$idx]['name'] ?? '').($call['function']['name'] ?? '');
            $tools[$idx]['arguments'] = ($tools[$idx]['arguments'] ?? '').($call['function']['arguments'] ?? '');
        }
    }

    private function buildMessages(string $message, array $history, string $mode): array
    {
        $messages = [['role' => 'system', 'content' => $this->systemPrompt($mode)]];
        foreach ($history as $item) {
            if (in_array($item['role'], ['user', 'assistant'], true)) {
                $messages[] = ['role' => $item['role'], 'content' => (string) $item['content']];
            }
        }
        $messages[] = ['role' => 'user', 'content' => $message];

        return $messages;
    }

    private function systemPrompt(string $mode): string
    {
        $tpl = File::get(resource_path('prompts/assistant.md'));

        $offres = collect(config('offers'))
            ->map(fn ($o) => '- '.$o['id'].' : '.$o['nom'].' — '.$this->priceLine($o))
            ->implode("\n");
        $pages = collect($this->pages())
            ->map(fn ($p, $id) => "{$id} ({$p['label']})")
            ->chunk(4)
            ->map(fn ($chunk) => '- '.implode(' · ', $chunk->all()))
            ->implode("\n");
        $legend = $mode === 'tags'
            ? "\nMODE BALISES (outils désactivés) : pour agir, écris sur UNE ligne AVANT ta réponse : ACTION:navigate:page_id | ACTION:create_quote:offer_id|Nom|Email|Tel|Entreprise | ACTION:send_contact:Nom|Email|Tel|Entreprise|Message | ACTION:search_info:mots-clés. Ces lignes sont filtrées, le visiteur ne les voit jamais."
            : '';

        return str_replace(
            ['{{OFFRES}}', '{{PAGES}}', '{{TAGS_LEGEND}}'],
            [$offres, $pages, $legend],
            $tpl
        );
    }

    private function priceLine(array $offer): string
    {
        $fmt = fn ($n) => number_format((int) $n, 0, ',', ' ');
        $min = (int) ($offer['prixMin'] ?? 0);
        $max = (int) ($offer['prixMax'] ?? 0);
        $unite = (string) ($offer['unite'] ?? '');
        if ($max > 0 && $max !== $min) {
            return $fmt($min).' – '.$fmt($max).' FCFA '.$unite;
        }
        if ($min > 0 && $max !== 0 && $max === $min) {
            return $fmt($min).' FCFA '.$unite; // prix fixe (ex. secrétariat annuel)
        }
        if ($min > 0) {
            // L'unité contient déjà « à partir de » (ex. « HT à partir de »)
            return str_contains(mb_strtolower($unite), 'à partir de')
                ? $fmt($min).' FCFA '.$unite
                : 'à partir de '.$fmt($min).' FCFA '.$unite;
        }

        return $unite; // ex. « Sur devis »
    }

    /**
     * Liste blanche des destinations (protège d'une réponse détournée).
     */
    private function pages(): array
    {
        return [
            'accueil' => ['label' => "Page d'accueil", 'url' => url('/')],
            'offres' => ['label' => 'Offres et tarifs', 'url' => '#offres'],
            'services' => ['label' => 'Nos expertises', 'url' => '#services'],
            'contact' => ['label' => 'Formulaire de contact', 'url' => '#contact'],
            'devis' => ['label' => 'Mes devis', 'url' => '#mes-devis'],
            'digital' => ['label' => 'Solutions digitales', 'url' => '#digital'],
            'experts' => ['label' => 'Notre équipe', 'url' => '#experts'],
            'juridique' => ['label' => 'Juridique & Corporate', 'url' => route('services.juridique')],
            'cga' => ['label' => 'Centre de Gestion Agréé', 'url' => route('services.cga')],
            'formation' => ['label' => 'Formation professionnelle', 'url' => route('services.formation')],
            'modification' => ['label' => 'Modifications statutaires', 'url' => route('services.modification')],
            'radiation' => ['label' => "Radiation d'entreprise", 'url' => route('services.radiation')],
        ];
    }

    private function tools(): array
    {
        $offerIds = collect(config('offers'))->pluck('id')->all();
        $pageIds = array_keys($this->pages());

        return [
            [
                'type' => 'function',
                'function' => [
                    'name' => 'navigate',
                    'description' => 'Montrer une page du site au visiteur. Utiliser uniquement un identifiant de la liste.',
                    'parameters' => [
                        'type' => 'object',
                        'properties' => ['page_id' => ['type' => 'string', 'enum' => $pageIds]],
                        'required' => ['page_id'],
                    ],
                ],
            ],
            [
                'type' => 'function',
                'function' => [
                    'name' => 'create_quote',
                    'description' => 'Préparer un devis. Demander nom, email et téléphone avant si manquants.',
                    'parameters' => [
                        'type' => 'object',
                        'properties' => [
                            'offer_id' => ['type' => 'string', 'enum' => $offerIds],
                            'name' => ['type' => 'string'],
                            'email' => ['type' => 'string'],
                            'phone' => ['type' => 'string'],
                            'company' => ['type' => 'string'],
                        ],
                        'required' => ['offer_id'],
                    ],
                ],
            ],
            [
                'type' => 'function',
                'function' => [
                    'name' => 'send_contact',
                    'description' => 'Transmettre une demande de contact. Demander nom, email et téléphone avant si manquants.',
                    'parameters' => [
                        'type' => 'object',
                        'properties' => [
                            'name' => ['type' => 'string'],
                            'email' => ['type' => 'string'],
                            'phone' => ['type' => 'string'],
                            'company' => ['type' => 'string'],
                            'message' => ['type' => 'string'],
                        ],
                        'required' => ['name', 'email'],
                    ],
                ],
            ],
            [
                'type' => 'function',
                'function' => [
                    'name' => 'search_info',
                    'description' => 'Chercher dans les offres et tarifs du cabinet.',
                    'parameters' => [
                        'type' => 'object',
                        'properties' => ['query' => ['type' => 'string']],
                        'required' => ['query'],
                    ],
                ],
            ],
        ];
    }
}
