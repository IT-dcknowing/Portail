<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entreprise;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\FormSubmittedConfirmation;

class CreationController extends Controller
{
    /**
     * Afficher le formulaire de création d'entreprise.
     */
    public function index()
    {
        return view('Creation');
    }

    /**
     * Enregistrer une nouvelle demande de création d'entreprise.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'formejuridique'     => 'required|string|max:50',
            'denomination'       => 'required|string|max:255',
            'capital'            => 'required|numeric|min:0',
            'nombre_associes'    => 'required|integer|min:1',
            'objet_social'       => 'required|string',
            'siege_social'       => 'required|string|max:255',
            'ville'              => 'required|string|max:100',
            'duree'              => 'required|integer|min:1|max:99',
            // Représentant légal (étape 2)
            'nom'                => 'nullable|string|max:255',
            'nationalite'        => 'nullable|string|max:100',
            'date_naissance'     => 'nullable|date',
            'lieu_naissance'     => 'nullable|string|max:255',
            'adresse'            => 'nullable|string|max:255',
            'telephone'          => 'nullable|string|max:30',
            'email'              => 'nullable|email|max:255',
        ]);

        try {
            Entreprise::create([
                'forme_juridique'       => strtolower($validated['formejuridique']),
                'denomination_sociale'  => $validated['denomination'],
                'capital_social'        => $validated['capital'],
                'nombre_associes'       => $validated['nombre_associes'],
                'objet_social'          => $validated['objet_social'],
                'siege_social'          => $validated['siege_social'],
                'ville'                 => strtolower($validated['ville']),
                'duree_entreprise'      => $validated['duree'],
                'nom_representant'      => $validated['nom'] ?? null,
                'nationalite'           => $validated['nationalite'] ?? null,
                'date_naissance'        => $validated['date_naissance'] ?? null,
                'lieu_naissance'        => $validated['lieu_naissance'] ?? null,
                'adresse_representant'  => $validated['adresse'] ?? null,
                'telephone'             => $validated['telephone'] ?? null,
                'email'                 => $validated['email'] ?? null,
                'user_id'               => auth()->id(), // Associe à l'utilisateur connecté s'il existe
            ]);

            // Envoi email aux administrateurs
            $recipients = [
                'infos@dc-knowing.com',
                'williamskouassi525@gmail.com',
                'alexkoffi@dc-knowing.com',
                'dc-knowing@gmail.com'
            ];

            Mail::send('emails.creation_demande', ['data' => $validated], function ($mail) use ($recipients, $validated) {
                $mail->to($recipients)
                     ->subject('Nouvelle Demande de Création — ' . $validated['denomination']);
            });

            Log::info('Creation entreprise email sent for: ' . $validated['denomination']);

            return redirect()->back()->with('success', 'Votre demande de création d\'entreprise a bien été enregistrée ! Nous vous contacterons sous 48h.');
        } catch (\Exception $e) {
            Log::error('Erreur création entreprise : ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.')
                ->withInput();
        }
    }
}
