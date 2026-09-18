<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $companies = Auth::user()->companies;
        return view('companies.index', compact('companies'));
    }
    
    public function create()
    {
        $legalForms = [
            'SAS' => 'Société par Actions Simplifiée (SAS)',
            'SASU' => 'Société par Actions Simplifiée Unipersonnelle (SASU)',
            'SARL' => 'Société à Responsabilité Limitée (SARL)',
            'EURL' => 'Entreprise Unipersonnelle à Responsabilité Limitée (EURL)',
            'SCI' => 'Société Civile Immobilière (SCI)',
            'AE' => 'Auto-Entrepreneur',
        ];
        
        return view('companies.create', compact('legalForms'));
    }
    
    public function store(StoreCompanyRequest $request)
    {
        $company = Auth::user()->companies()->create($request->validated());
        
        return redirect()->route('companies.show', $company)
            ->with('success', 'Votre projet de création a été enregistré avec succès.');
    }
    
    public function show(Company $company)
    {
        $this->authorize('view', $company);
        
        return view('companies.show', compact('company'));
    }
    
    public function edit(Company $company)
    {
        $this->authorize('update', $company);
        
        $legalForms = [
            'SAS' => 'Société par Actions Simplifiée (SAS)',
            'SASU' => 'Société par Actions Simplifiée Unipersonnelle (SASU)',
            'SARL' => 'Société à Responsabilité Limitée (SARL)',
            'EURL' => 'Entreprise Unipersonnelle à Responsabilité Limitée (EURL)',
            'SCI' => 'Société Civile Immobilière (SCI)',
            'AE' => 'Auto-Entrepreneur',
        ];
        
        return view('companies.edit', compact('company', 'legalForms'));
    }
    
    public function update(StoreCompanyRequest $request, Company $company)
    {
        $this->authorize('update', $company);
        
        $company->update($request->validated());
        
        return redirect()->route('companies.show', $company)
            ->with('success', 'Les informations de votre entreprise ont été mises à jour.');
    }
}