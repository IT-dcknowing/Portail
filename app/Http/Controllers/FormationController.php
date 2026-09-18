<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class FormationController extends Controller
{
    public function submit(Request $request)
    {
        Log::info('Formation inscription received.', $request->all());

        try {
            $validated = $request->validate([
                'nom' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telephone' => 'required|string|max:50',
                'ville' => 'required|string|max:100',
                'formation' => 'required|string|max:255',
                'message' => 'nullable|string|max:1000',
            ]);

            $recipients = [
                'infos@dc-knowing.com',
                'williamskouassi525@gmail.com',
                'alexkoffi@dc-knowing.com',
                'dcknowing@gmail.com',
            ];

            Mail::send('emails.formation_inscription', ['data' => $validated], function ($mail) use ($recipients, $validated) {
                $mail->to($recipients)
                    ->subject('Nouvelle Pré-inscription Formation — ' . $validated['formation']);
            });
            
                 // Envoi de la confirmation à l'utilisateur
            try {
                Mail::to($validated['email'])->send(new \App\Mail\UserConfirmationMail($validated, 'formation'));
                Log::info('Confirmation email sent to user: ' . $validated['email']);
            } catch (\Exception $e) {
                Log::error('User Confirmation Mail Error (Formation): ' . $e->getMessage());
            }

            Log::info('Formation email sent successfully.');

            return response()->json([
                'success' => true,
                'message' => 'Pré-inscription envoyée avec succès.',
            ]);

        } catch (\Exception $e) {
            Log::error('Formation Mail Error: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'envoi : ' . $e->getMessage(),
            ], 500);
        }
    }
}
