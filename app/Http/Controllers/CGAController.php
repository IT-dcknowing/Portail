<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client_CGA;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class CGAController extends Controller
{
    /**
     * Afficher le formulaire d'adhésion CGA.
     */
    public function index()
    {
        return view('CGA');
    }

    /**
     * Enregistrer une nouvelle adhésion CGA en base de données.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom'                  => 'required|string|max:255',
            'email'                => 'required|email|max:255',
            'telephone'            => 'required|string|max:30',
            'ville'                => 'nullable|string|max:100',
            'entreprise'           => 'nullable|string|max:255',
            'secteur'              => 'nullable|string|max:100',
            'statut'               => 'nullable|string|max:100',
            'effectif'             => 'nullable|string|max:50',
            'services'             => 'nullable|array',
            'services.*'           => 'string',
            'nom_commercial'       => 'nullable|string|max:255',
            'capital'              => 'nullable|string|max:100',
            'rccm'                 => 'nullable|string|max:100',
            'num_contribuable'     => 'nullable|string|max:100',
            'idu'                  => 'nullable|string|max:100',
            'code_activite'        => 'nullable|string|max:100',
            'centre_impots'        => 'nullable|string|max:100',
            'type_regime'          => 'nullable|string|max:100',
            'localisation_geo'     => 'nullable|string|max:255',
            'section'              => 'nullable|string|max:100',
            'parcelle'             => 'nullable|string|max:100',
            'siege'                => 'nullable|string|max:255',
            'boite_postale'        => 'nullable|string|max:50',
            'chiffre_affaire'      => 'nullable|string|max:100',
            'debut_activite'       => 'nullable|date',
            'activites'            => 'nullable|string',
            'representant_legal'   => 'nullable|string|max:255',
            'qualite_representant' => 'nullable|string|max:100',
            'message'              => 'nullable|string',
            'newsletter'           => 'nullable|boolean',
        ]);

        // Convertir le tableau "services" en JSON s'il est présent
        if (isset($validated['services'])) {
            $validated['services'] = json_encode($validated['services']);
        }

        try {
            Client_CGA::create($validated);

            // Envoi email aux administrateurs
            $recipients = [
                'infos@dc-knowing.com',
                'williamskouassi525@gmail.com',
                'alexkoffi@dc-knowing.com',
                'dc-knowing@gmail.com'
            ];
            $data = $validated;
            Mail::send('emails.cga_adhesion', ['data' => $data], function ($mail) use ($recipients, $data) {
                $mail->to($recipients)
                     ->subject('Nouvelle Adhésion CGA — ' . ($data['entreprise'] ?? $data['nom']));
            });
            
            
            
            
            
            Log::info('CGA adhesion email sent for: ' . ($data['nom'] ?? ''));

            return redirect()->back()->with('success', 'Votre adhésion CGA a bien été enregistrée ! Nous vous contacterons sous 48h.');
        } catch (\Exception $e) {
            Log::error('Erreur enregistrement CGA : ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.')
                ->withInput();
        }
    }
}
