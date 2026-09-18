<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'service_id' => 'required|exists:services,id',
            'company_id' => 'nullable|exists:companies,id',
        ];
    }

    /**
     * Configure the validator instance.
     *
     * @param  \Illuminate\Validation\Validator  $validator
     * @return void
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->company_id) {
                // Check if company belongs to the authenticated user
                $company = Auth::user()->companies()->find($this->company_id);
                
                if (!$company) {
                    $validator->errors()->add('company_id', 'Cette entreprise ne vous appartient pas.');
                }
            }
        });
    }
}

class StoreCompanyRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'company_name' => ['required', 'string', 'max:255'],
            'legal_form' => ['required', 'string', 'in:SAS,SASU,SARL,EURL,SCI,AE'],
            'siret' => ['nullable', 'string', 'max:14', 'min:14'],
            'address' => ['required', 'string', 'max:255'],
            'postal_code' => ['required', 'string', 'max:5', 'min:5'],
            'city' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'Le nom de l\'entreprise est obligatoire',
            'legal_form.required' => 'La forme juridique est obligatoire',
            'legal_form.in' => 'La forme juridique sélectionnée n\'est pas valide',
            'siret.max' => 'Le numéro SIRET doit contenir 14 chiffres',
            'siret.min' => 'Le numéro SIRET doit contenir 14 chiffres',
            'address.required' => 'L\'adresse est obligatoire',
            'postal_code.required' => 'Le code postal est obligatoire',
            'postal_code.max' => 'Le code postal doit contenir 5 chiffres',
            'postal_code.min' => 'Le code postal doit contenir 5 chiffres',
            'city.required' => 'La ville est obligatoire',
        ];
    }
}