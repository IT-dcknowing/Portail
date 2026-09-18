<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\QuoteRequestMail;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    /**
     * Handle the quote submission and send notification email.
     */
    public function submit(Request $request)
    {
            Log::critical('!!! QUOTE SUBMISSION RECEIVED !!!');
            Log::info('Data: ', $request->all());

            // ... (rest of logic remains the same)

        try {
            // On assouplit la validation pour éviter les erreurs 422 qui bloquent l'envoi
            $request->validate([
                'email' => 'required|email',
                'client' => 'required',
                'offre' => 'nullable',
                'entreprise' => 'nullable',
            ]);

            $recipients = [
                'infos@dc-knowing.com',
                'williamskouassi525@gmail.com',
                'alexkoffi@dc-knowing.com',
                'dc-knowing@gmail.com',
            ];

            // On utilise Mail::send avec plus de logs
            Mail::send('emails.quote_request', ['devis' => $request->all()], function ($mail) use ($recipients, $request) {
                $mail->to($recipients)
                     ->subject('Nouvelle Demande de Devis — ' . ($request->offre ?? 'Client'));
            });
            
            Log::info('Quote email sent successfully to: ' . implode(', ', $recipients));

            return response()->json([
                'success' => true,
                'message' => 'Email envoyé avec succès.'
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation Error: ', $e->errors());
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation des données.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Mail Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'envoi : ' . $e->getMessage()
            ], 500);
        }
    }
}
