<?php

namespace Modules\Contracts\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Modules\Employees\Models\Employee;
use Modules\Contracts\Models\Contract;
use Modules\Contracts\Models\ContractType;
use Modules\Contracts\Models\ContractAttechements;
use Modules\Contracts\Models\ContractAvenant;

class ContractsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $company_id = $user->company_id;
        
        $query = Contract::where('company_id', $company_id);
        
        // Filtres
        if ($request->has('employee_id') && $request->employee_id != '') {
            $query->where('employee_id', $request->employee_id);
        }
        
        if ($request->has('type_id') && $request->type_id != '') {
            $query->where('contract_type_id', $request->type_id);
        }
        
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        $contracts = $query->orderBy('created_at', 'desc')->paginate(10);
        $employees = Employee::where('company_id', $company_id)->get();
        $contractTypes = ContractType::all();
        
        return view('contracts::index', compact('contracts', 'employees', 'contractTypes'));
    }

    public function ContractEmployee($id){
        $user = Auth::user();
        $company_id = $user->company_id;
        
        $employee = Employee::where('company_id', $company_id)->where('id', $id)->first();
        $contractTypes = ContractType::All();
        
        return view('contracts::create_employee', compact('id','employee', 'contractTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        $company_id = $user->company_id;
        
        $employees = Employee::where('company_id', $company_id)->get();
        $contractTypes = ContractType::all();
        
        return view('contracts::create', compact('employees', 'contractTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) 
    {
        try {
            DB::beginTransaction();
            \Log::info($request->all());
            // Validation des données
            try {
                $request->validate([
                    'subject' => 'required|string|max:255',
                    'employee_id' => 'required|integer',
                    'type_id' => 'required|exists:contract_types,id',
                    'start_date' => 'required|date',
                    'end_date' => 'nullable|date|after_or_equal:start_date',
                    'duration' => 'nullable|integer',
                    'value' => 'nullable|numeric',
                    'description' => 'nullable|string',
                    'notes' => 'nullable|string',
                    'attachments.*' => 'nullable|file|max:10240', // 10MB max
                ]);
            } catch (\Illuminate\Validation\ValidationException $e) {
                \Log::error('Erreur de validation : ', [
                    'errors' => $e->validator->errors()->toArray(),
                    'input' => $request->all()
                ]);
                return redirect()->back()
                    ->withInput()
                    ->withErrors($e->validator);
            }
            
            $user = Auth::user();
            
            $contract = Contract::create([
                'subject' => $request->subject,
                'employee_id' => $request->employee_id,
                'type_id' => $request->type_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'duration' => $request->duration,
                'value' => $request->value,
                'description' => $request->description,
                'notes' => $request->notes,
                'status' => 'accept',
                'company_id' => $user->company_id,
            ]);
            // Gestion des pièces jointes
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $path = $file->store('contracts/' . $contract->id, 'public');
                    
                    $attachment = ContractAttechements::create([
                    'contract_id' => $contract->id,
                    'employee_id'  => $request->employee_id,
                    'files' => $path.'/'.$file->getClientOriginalName(),
                    'company_id'  => $user->company_id,
                    ]);
                }
            }
            
            return redirect()->route('company.contracts.show', $contract->id)
                ->with('success', 'Contrat créé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Erreur lors de la création du contrat : ' . $e->getMessage());
            
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Une erreur est survenue lors de la création du contrat : ' . $e->getMessage());
        }
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        $user = Auth::user();
        $contract = Contract::with(['employee', 'type', 'attachments', 'avenants'])
            ->where('company_id', $user->company_id)
            ->findOrFail($id);
            
        return view('contracts::show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = Auth::user();
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($id);
        
        $employees = Employee::where('company_id', $user->company_id)->get();
        $contractTypes = ContractType::where('company_id', $user->company_id)->get();
        
        return view('contracts::edit', compact('contract', 'employees', 'contractTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subject' => 'required|string|max:255',
            'employee_id' => 'required|exists:employees,id',
            'contract_type_id' => 'required|exists:contract_types,id',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'value' => 'nullable|numeric',
            'status' => 'required|in:draft,active,expired,terminated',
            'description' => 'nullable|string',
            'notes' => 'nullable|string',
            'attachments.*' => 'nullable|file|max:10240', // 10MB max
        ]);
        
        $user = Auth::user();
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($id);
        
        $contract->subject = $request->subject;
        $contract->employee_id = $request->employee_id;
        $contract->contract_type_id = $request->contract_type_id;
        $contract->start_date = $request->start_date;
        $contract->end_date = $request->end_date;
        $contract->value = $request->value;
        $contract->status = $request->status;
        $contract->description = $request->description;
        $contract->notes = $request->notes;
        $contract->updated_by = $user->id;
        $contract->save();
        
        // Gestion des pièces jointes
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $path = $file->store('contracts/' . $contract->id, 'public');
                
                $attachment = new ContractAttachment();
                $attachment->contract_id = $contract->id;
                $attachment->file_name = $file->getClientOriginalName();
                $attachment->file_path = $path;
                $attachment->file_size = $file->getSize();
                $attachment->file_type = $file->getMimeType();
                $attachment->uploaded_by = $user->id;
                $attachment->save();
            }
        }
        
        return redirect()->route('company.contracts.show', $contract->id)
            ->with('success', 'Contrat mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($id);
        
        // Supprimer les pièces jointes
        foreach ($contract->attachments as $attachment) {
            Storage::disk('public')->delete($attachment->file_path);
            $attachment->delete();
        }
        
        // Supprimer les avenants
        foreach ($contract->avenants as $avenant) {
            if ($avenant->file_path) {
                Storage::disk('public')->delete($avenant->file_path);
            }
            $avenant->delete();
        }
        
        $contract->delete();
        
        return redirect()->route('company.contracts.index')
            ->with('success', 'Contrat supprimé avec succès.');
    }
    
    /**
     * Ajouter une pièce jointe à un contrat
     */
    public function addAttachment(Request $request, $id)
    {
        $request->validate([
            'attachment' => 'required|file|max:10240', // 10MB max
        ]);
        
        $user = Auth::user();
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($id);
        
        $file = $request->file('attachment');
        $path = $file->store('contracts/' . $contract->id, 'public');
        
        $attachment = new ContractAttachment();
        $attachment->contract_id = $contract->id;
        $attachment->file_name = $file->getClientOriginalName();
        $attachment->file_path = $path;
        $attachment->file_size = $file->getSize();
        $attachment->file_type = $file->getMimeType();
        $attachment->uploaded_by = $user->id;
        $attachment->save();
        
        return redirect()->back()->with('success', 'Pièce jointe ajoutée avec succès.');
    }
    
    /**
     * Télécharger une pièce jointe
     */
    public function downloadAttachment($id)
    {
        $user = Auth::user();
        $attachment = ContractAttachment::findOrFail($id);
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($attachment->contract_id);
        
        return Storage::disk('public')->download($attachment->file_path, $attachment->file_name);
    }
    
    /**
     * Supprimer une pièce jointe
     */
    public function deleteAttachment($id)
    {
        $user = Auth::user();
        $attachment = ContractAttachment::findOrFail($id);
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($attachment->contract_id);
        
        Storage::disk('public')->delete($attachment->file_path);
        $attachment->delete();
        
        return redirect()->back()->with('success', 'Pièce jointe supprimée avec succès.');
    }
    
    /**
     * Ajouter un avenant à un contrat
     */
    public function addAvenant(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'effective_date' => 'required|date',
            'description' => 'required|string',
            'attachment' => 'nullable|file|max:10240', // 10MB max
        ]);
        
        $user = Auth::user();
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($id);
        
        $avenant = new ContractAvenant();
        $avenant->contract_id = $contract->id;
        $avenant->title = $request->title;
        $avenant->effective_date = $request->effective_date;
        $avenant->description = $request->description;
        $avenant->created_by = $user->id;
        
        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $path = $file->store('contracts/' . $contract->id . '/avenants', 'public');
            $avenant->file_path = $path;
            $avenant->file_name = $file->getClientOriginalName();
        }
        
        $avenant->save();
        
        return redirect()->back()->with('success', 'Avenant ajouté avec succès.');
    }
    
    /**
     * Télécharger un avenant
     */
    public function downloadAvenant($id)
    {
        $user = Auth::user();
        $avenant = ContractAvenant::findOrFail($id);
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($avenant->contract_id);
        
        return Storage::disk('public')->download($avenant->file_path, $avenant->file_name);
    }
    
    /**
     * Page de gestion des signatures
     */
    public function signature($id)
    {
        $user = Auth::user();
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($id);
        
        return view('contracts::signature', compact('contract'));
    }
    
    /**
     * Enregistrer une signature
     */
    public function saveSignature(Request $request, $id)
    {
        $request->validate([
            'signature_type' => 'required|in:employee,company',
            'signature_data' => 'required|string',
        ]);
        
        $user = Auth::user();
        $contract = Contract::where('company_id', $user->company_id)->findOrFail($id);
        
        // Convertir la signature base64 en fichier
        $image_parts = explode(";base64,", $request->signature_data);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        
        $signature_path = 'contracts/' . $contract->id . '/signatures/' . $request->signature_type . '_' . time() . '.' . $image_type;
        Storage::disk('public')->put($signature_path, $image_base64);
        
        if ($request->signature_type == 'employee') {
            $contract->employee_signature = $signature_path;
            $contract->employee_signature_date = now();
        } else {
            $contract->company_signature = $signature_path;
            $contract->company_signature_date = now();
        }
        
        $contract->save();
        
        return redirect()->route('company.contracts.show', $contract->id)
            ->with('success', 'Signature enregistrée avec succès.');
    }
    
    /**
     * Afficher la page des types de contrat
     */
    public function contractTypes()
    {
        $user = Auth::user();
        $contractTypes = ContractType::where('company_id', $user->company_id)
            ->withCount('contracts')
            ->paginate(10);
        
        return view('contracts::contract-types', compact('contractTypes'));
    }
    
    /**
     * Ajouter un type de contrat
     */
    public function storeContractType(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        $user = Auth::user();
        
        $contractType = new ContractType();
        $contractType->name = $request->name;
        $contractType->description = $request->description;
        $contractType->company_id = $user->company_id;
        $contractType->status = 'active';
        $contractType->created_by = $user->id;
        $contractType->save();
        
        return redirect()->route('company.contracts.types')
            ->with('success', 'Type de contrat ajouté avec succès.');
    }
    
    /**
     * Mettre à jour un type de contrat
     */
    public function updateContractType(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);
        
        $user = Auth::user();
        $contractType = ContractType::where('company_id', $user->company_id)->findOrFail($id);
        
        $contractType->name = $request->name;
        $contractType->description = $request->description;
        $contractType->status = $request->status;
        $contractType->updated_by = $user->id;
        $contractType->save();
        
        return redirect()->route('company.contracts.types')
            ->with('success', 'Type de contrat mis à jour avec succès.');
    }
    
    /**
     * Supprimer un type de contrat
     */
    public function destroyContractType($id)
    {
        $user = Auth::user();
        $contractType = ContractType::where('company_id', $user->company_id)->findOrFail($id);
        
        // Vérifier si des contrats utilisent ce type
        $contractCount = $contractType->contracts()->count();
        if ($contractCount > 0) {
            return redirect()->route('company.contracts.types')
                ->with('error', 'Ce type de contrat ne peut pas être supprimé car il est utilisé par ' . $contractCount . ' contrat(s).');
        }
        
        $contractType->delete();
        
        return redirect()->route('company.contracts.types')
            ->with('success', 'Type de contrat supprimé avec succès.');
    }   
}
