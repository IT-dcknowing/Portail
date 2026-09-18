<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDocumentRequest;

class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the documents.
     *
     * @param  \App\Models\Company|null  $company
     * @return \Illuminate\Http\Response
     */
    public function index(?Company $company = null)
    {
        if ($company) {
            $this->authorize('view', $company);
            $documents = $company->documents()->latest()->get();
            return view('documents.index', compact('documents', 'company'));
        } else {
            $documents = Auth::user()->documents()->latest()->get();
            return view('documents.index', compact('documents'));
        }
    }
    
    /**
     * Show the form for creating a new document.
     *
     * @param  \App\Models\Company|null  $company
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company = null)
    {
        if ($company) {
            $this->authorize('update', $company);
        }
        
        $companies = Auth::user()->companies;
        
        $documentTypes = [
            'statuts' => 'Statuts',
            'kbis' => 'Extrait K-bis',
            'cin' => 'Carte d\'identité',
            'justificatif_domicile' => 'Justificatif de domicile',
            'attestation_bancaire' => 'Attestation bancaire',
            'contrat' => 'Contrat',
            'autre' => 'Autre document',
        ];
        
        return view('documents.create', compact('company', 'companies', 'documentTypes'));
    }
    
    /**
     * Store a newly created document in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDocumentRequest $request)
    {
        if ($request->company_id) {
            $company = Auth::user()->companies()->findOrFail($request->company_id);
            $this->authorize('update', $company);
        }
        
        // Handle file upload
        $path = $request->file('file')->store('documents');
        
        $document = new Document();
        $document->user_id = Auth::id();
        $document->company_id = $request->company_id;
        $document->name = $request->name;
        $document->file_path = $path;
        $document->document_type = $request->document_type;
        $document->status = 'draft'; // Default status
        $document->save();
        
        if ($request->company_id) {
            return redirect()->route('companies.documents.index', $company)
                ->with('success', 'Le document a été téléchargé avec succès.');
        } else {
            return redirect()->route('documents.index')
                ->with('success', 'Le document a été téléchargé avec succès.');
        }
    }
    
    /**
     * Display the specified document.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        $this->authorize('view', $document);
        
        return view('documents.show', compact('document'));
    }
    
    /**
     * Show the form for editing the specified document.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        $this->authorize('update', $document);
        
        $documentTypes = [
            'statuts' => 'Statuts',
            'kbis' => 'Extrait K-bis',
            'cin' => 'Carte d\'identité',
            'justificatif_domicile' => 'Justificatif de domicile',
            'attestation_bancaire' => 'Attestation bancaire',
            'contrat' => 'Contrat',
            'autre' => 'Autre document',
        ];
        
        return view('documents.edit', compact('document', 'documentTypes'));
    }
    
    /**
     * Update the specified document in storage.
     *
     * @param  \App\Http\Requests\StoreDocumentRequest  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDocumentRequest $request, Document $document)
    {
        $this->authorize('update', $document);
        
        $document->name = $request->name;
        $document->document_type = $request->document_type;
        
        // Handle file upload if a new file is provided
        if ($request->hasFile('file')) {
            // Delete old file
            Storage::delete($document->file_path);
            
            // Store new file
            $path = $request->file('file')->store('documents');
            $document->file_path = $path;
            $document->status = 'draft'; // Reset status when updating file
        }
        
        $document->save();
        
        if ($document->company_id) {
            return redirect()->route('companies.documents.index', $document->company)
                ->with('success', 'Le document a été mis à jour avec succès.');
        } else {
            return redirect()->route('documents.index')
                ->with('success', 'Le document a été mis à jour avec succès.');
        }
    }
    
    /**
     * Download the document file.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function download(Document $document)
    {
        $this->authorize('view', $document);
        
        return Storage::download($document->file_path, $document->name);
    }
    
    /**
     * Submit document for validation.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function submit(Document $document)
    {
        $this->authorize('update', $document);
        
        if ($document->isDraft()) {
            $document->status = 'pending';
            $document->save();
            
            return back()->with('success', 'Le document a été soumis pour validation.');
        }
        
        return back()->with('info', 'Ce document a déjà été soumis.');
    }
    
    /**
     * Remove the specified document from storage.
     *
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        $this->authorize('delete', $document);
        
        // Only allow deletion of draft documents
        if (!$document->isDraft()) {
            return back()->with('error', 'Vous ne pouvez supprimer que les documents en brouillon.');
        }
        
        // Delete the file
        Storage::delete($document->file_path);
        
        // Delete the record
        $document->delete();
        
        return back()->with('success', 'Le document a été supprimé avec succès.');
    }
}