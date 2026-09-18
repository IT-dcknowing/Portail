<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radiation;
use Illuminate\Support\Facades\Log;

class RadiationController extends Controller
{
    /**
     * Afficher le formulaire de radiation d'entreprise.
     */
    public function index()
    {
        return view('Radiation-Form');
    }

    /**
     * Enregistrer une demande de radiation d'entreprise.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name'   => 'required|string|max:255',
            'siret'          => 'required|string|max:50',
            'legal_form'     => 'nullable|string|max:50',
            'custom_legal_form' => 'nullable|string|max:100',
            'reason'         => 'required|string',
            'date_radiation' => 'required|date',
            'contact_email'  => 'nullable|email|max:255',
        ]);

        // Si "Autre" est sélectionné, utiliser la valeur personnalisée
        $legalForm = $validated['legal_form'] === 'other'
            ? ($validated['custom_legal_form'] ?? 'Autre')
            : ($validated['legal_form'] ?? null);

        try {
            Radiation::create([
                'company_name'   => $validated['company_name'],
                'siret'          => $validated['siret'],
                'legal_form'     => $legalForm,
                'reason'         => $validated['reason'],
                'date_radiation' => $validated['date_radiation'],
                'contact_email'  => $validated['contact_email'] ?? null,
                'user_id'        => auth()->id(),
            ]);

            return redirect()->back()->with('success', 'Votre demande de radiation a bien été enregistrée ! Notre équipe vous contactera sous 48h.');
        } catch (\Exception $e) {
            Log::error('Erreur radiation entreprise : ' . $e->getMessage());

            return redirect()->back()
                ->with('error', 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.')
                ->withInput();
        }
    }
}
