<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCGA extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nom' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'required|string|max:20',
            'ville' => 'nullable|string|max:255',
            'entreprise' => 'nullable|string|max:255',
            'secteur' => 'nullable|string|max:255',
            'statut' => 'nullable|string|max:255',
            'effectif' => 'nullable|string|max:255',
            'services' => 'nullable|array',
            'nom_commercial' => 'nullable|string|max:255',
            'capital' => 'nullable|string|max:255',
            'rccm' => 'required|string|max:255',
            'num_contribuable' => 'nullable|string|max:255',
            'idu' => 'nullable|string|max:255',
            'code_activite' => 'nullable|string|max:255',
            'centre_impots' => 'nullable|string|max:255',
            'type_regime' => 'nullable|string|max:255',
            'localisation_geo' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:10',
            'parcelle' => 'nullable|string|max:50',
            'siege' => 'nullable|string|max:500',
            'boite_postale' => 'nullable|string|max:255',
            'chiffre_affaire' => 'nullable|string|max:255',
            'debut_activite' => 'nullable|date',
            'activites' => 'nullable|string',
            'representant_legal' => 'nullable|string|max:255',
            'qualite_representant' => 'nullable|string|max:255',
            'message' => 'nullable|string',
            'attachment' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
            'newsletter' => 'nullable|boolean',
        ];
    }
}
