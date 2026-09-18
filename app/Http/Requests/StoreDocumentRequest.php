<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'file' => ['required', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:10240'],
            'document_type' => ['required', 'string', 'in:statuts,kbis,cin,justificatif_domicile,attestation_bancaire,contrat,autre'],
            'company_id' => ['nullable', 'exists:companies,id'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Le nom du document est obligatoire',
            'file.required' => 'Le fichier est obligatoire',
            'file.mimes' => 'Le fichier doit être au format PDF, JPG, JPEG ou PNG',
            'file.max' => 'Le fichier ne doit pas dépasser 10 Mo',
            'document_type.required' => 'Le type de document est obligatoire',
            'document_type.in' => 'Le type de document sélectionné n\'est pas valide',
        ];
    }
} 