<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function submit(Request $request)
    {
        Log::info('Contact form received.', $request->all());

        try {
            $validated = $request->validate([
                'nom'       => 'required|string|max:255',
                'email'     => 'required|email|max:255',
                'telephone' => 'nullable|string|max:50',
                'entreprise'=> 'nullable|string|max:255',
                'besoin'    => 'nullable|string|max:2000',
            ]);

            $recipients = [
                'infos@dc-knowing.com',
                'williamskouassi525@gmail.com',
                'alexkoffi@dc-knowing.com',
                'dc-knowing@gmail.com'
            ];

            Mail::send('emails.contact_demande', ['data' => $validated], function ($mail) use ($recipients, $validated) {
                $mail->to($recipients)
                     ->subject('Nouvelle Demande de Contact — ' . $validated['nom']);
            });

            Log::info('Contact email sent for: ' . $validated['nom']);

            return response()->json([
                'success' => true,
                'message' => 'Votre demande a été envoyée avec succès.',
            ]);

        } catch (\Exception $e) {
            Log::error('Contact Mail Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'envoi : ' . $e->getMessage(),
            ], 500);
        }
    }
}
