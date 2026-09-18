<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModificationEntreprise;
use Illuminate\Support\Facades\Log;

class ModificationController extends Controller
{
    /**
     * Afficher le formulaire de modification d'entreprise.
     */
    public function index()
    {
        return view('Modification');
    }

    /**
     * Enregistrer une demande de modification d'entreprise.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'forme_juridique'  => 'required|string|max:50',
            'denomination'     => 'required|string|max:255',
            'capital'          => 'required|numeric|min:0',
            'nb_associes'      => 'required|integer|min:1',
            'objet'            => 'required|string',
            'siege'            => 'required|string|max:255',
            'ville'            => 'required|string|max:100',
            'duree'            => 'required|integer|min:1|max:99',
        ]);

        try {
            ModificationEntreprise::create([
                'forme_juridique'    => $validated['forme_juridique'],
                'denomination_sociale' => $validated['denomination'],
                'capital_social'     => $validated['capital'],
                'nombre_associes'    => $validated['nb_associes'],
                'objet_social'       => $validated['objet'],
                'siege_social'       => $validated['siege'],
                'ville'              => $validated['ville'],
                'duree_entreprise'   => $validated['duree'],
                'statut'             => 'en_attente',
                'date_demande'       => now(),
                'user_id'            => auth()->id(),
            ]);

            return redirect()->back()->with('success', 'Votre demande de modification a bien été enregistrée ! Notre équipe vous contactera sous 48h.');
        } catch (\Exception $e) {
            Log::error('Erreur modification entreprise : ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.')
                ->withInput();
        }
    }
}
