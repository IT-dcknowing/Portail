<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Client_CGA;
use App\Models\Entreprise;
use App\Models\DemandeEntreprise;
use App\Models\Detail;  
use App\Models\Radiation;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request as FacadesRequest;
use App\Models\ActeJuridique;
use App\Models\ModificationEntreprise;
use App\Http\Controllers\Validator;


class ServiceController extends Controller
{
    public function index()
{
    // Définition des catégories avec libellés
    $categories = [
        'creation'       => 'Création d\'entreprise',
        'comptabilité'   => 'Comptabilité',
        'domiciliation'  => 'Domiciliation',
        'juridique'      => 'Services juridiques',
        'autre'          => 'Autres services',
    ];

    // Récupération des services actifs et groupement par catégorie
    $services = Service::where('status', 'active')  // Remplace par ->active() si tu as un scope
                       ->get()
                       ->groupBy('category');

    // Passage des données à la vue
    return view('home', compact('services', 'categories'));
}

    
    public function show(Service $service)
    {
        if (!$service->is_active) {
            abort(404);
        }
        
        $relatedServices = Service::active()
            ->where('category', $service->category)
            ->where('id', '!=', $service->id)
            ->take(3)
            ->get();
            
        return view('services.show', compact('service', 'relatedServices'));
    }


    public function storeSociete(Request $request)
    {
        // ✅ 3. Création de l'entreprise  $clientCGA->email= $request->email;
        $entreprise = new Entreprise();
        $entreprise->forme_juridique = $request->formejuridique;
        $entreprise->denomination_sociale = $request->denomination;
        $entreprise->capital_social = $request->capital;
        $entreprise->nombre_associes = $request->nombre_associes;
        $entreprise->objet_social = $request->objet_social;
        $entreprise->siege_social = $request->siege_social;
        $entreprise->ville = $request->ville;
        $entreprise->duree= $request->duree;
        $entreprise->nom= $request->nom;
        $entreprise->save();

        return redirect()->back()->with('success', 'Votre demande de création d\'entreprise a été soumise avec succès.');
   }


    public function storeCGA(Request $request)
   {
         // Validation complète de tous les champs
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telephone' => 'required|string|max:20', // Changé de int à string pour gérer les numéros internationaux
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
        
        ]);
        try {
            
            // Créer une nouvelle instance
            $clientCGA = new client_CGA();
            
            // Assigner toutes les valeurs
            $clientCGA->nom = $request->nom;
            $clientCGA->email= $request->email;
            $clientCGA->telephone = $request->telephone;
            $clientCGA->ville = $request->ville;
            $clientCGA->entreprise = $request->entreprise;
            $clientCGA->secteur = $request->secteur;
            $clientCGA->statut = $request->statut;
            $clientCGA->effectif = $request->effectif;
            $clientCGA->services= $request->services;
            $clientCGA->nom_commercial = $request->nom_commercial;
            $clientCGA->capital = $request->capital;
            $clientCGA->rccm = $request->rccm;
            $clientCGA->num_contribuable = $request->num_contribuable;
            $clientCGA->idu = $request->idu;
            $clientCGA->code_activite = $request->code_activite;
            $clientCGA->centre_impots= $request->centre_impots;
            $clientCGA->type_regime= $request->type_regime;
            $clientCGA->localisation_geo= $request->localisation_geo;
            $clientCGA->section= $request->section;
            $clientCGA->parcelle = $request->parcelle;
            $clientCGA->siege = $request->siege;
            $clientCGA->boite_postale= $request->boite_postale;
            $clientCGA->chiffre_affaire = $request->chiffre_affaire;
            $clientCGA->debut_activite= $request->debut_activite;
            $clientCGA->activites= $request->activites;
            $clientCGA->representant_legal= $request->representant_legal;
            $clientCGA->qualite_representant= $request->qualite_representant;
            $clientCGA->message = $request->message;
            $clientCGA->attachment= $request->attachment;
            $clientCGA->newsletter = $request->newsletter;
        
            // Sauvegarder en base de données
            $clientCGA->save();

            return redirect()->back()->with('success', 'Formulaire enregistré avec succès !');

            } catch (\Exception $e) {
                // Log l'erreur pour le débogage
                \Log::error('Erreur lors de l\'enregistrement CGA: ' . $e->getMessage());
                
                return redirect()->back()
                    ->with('error', 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.')
                    ->withInput();
            }
    }

    public function storeRadiation(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'siret' => 'required|string|max:14|unique:radiations,siret',
            'legal_form' => 'nullable|string|max:255',
            'custom_legal_form' => 'nullable|string|max:255',
            'reason' => 'required|string|max:1000',
            'date_radiation' => 'required|date',
            'contact_email' => 'nullable|email|max:255',
        ]);

        try {
            // Si "Autre" est choisi, on utilise la valeur du champ personnalisé
            $finalLegalForm = ($request->legal_form === 'other' && $request->filled('custom_legal_form'))
                ? $request->custom_legal_form
                : $request->legal_form;

            // Création de la radiation
            $radiation = new Radiation();
            $radiation->company_name = $request->company_name;
            $radiation->siret = $request->siret;
            $radiation->legal_form = $finalLegalForm;
            $radiation->reason = $request->reason;
            $radiation->date_radiation = $request->date_radiation;
            $radiation->contact_email = $request->contact_email;
            $radiation->save();

            return redirect()->back()->with('success', 'Votre demande de radiation a été enregistrée avec succès.');
        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'enregistrement de la radiation: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Une erreur est survenue lors de l\'enregistrement. Veuillez réessayer.'])
                ->withInput();
        }
    }
    
    
    public function storeActeJuridique(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'required|string',
            'email' => 'nullable|email|max:255'
        ]);

        try {
            // Création de l'acte juridique
            $acteJuridique = new ActeJuridique();
            $acteJuridique ->titre =$request->titre;
            $acteJuridique ->date =$request->date;
            $acteJuridique ->description =$request->description;
            $acteJuridique ->email =$request->email;
            $acteJuridique ->created_at =$request->created_at;
            $acteJuridique ->updated_at =$request->updated_at;
            $acteJuridique ->save();
           

            // Retour avec message de succès
            return redirect()->back()->with('success', 'Acte juridique enregistré avec succès.');
            
        } catch (\Exception $e) {
            // En cas d'erreur
            return redirect()->back()
                ->withInput()
                ->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
        }
    }

   public function storeModification(Request $request)
{
    // Validation (Laravel gère les erreurs automatiquement ici)
    $validated = $request->validate([
        'forme_juridique' => 'required|string|in:sasu,sas,sarl,sa,snc,autre',
        'denomination' => 'required|string|max:255',
        'capital' => 'required|numeric|min:0',
        'nb_associes' => 'required|integer|min:1',
        'objet' => 'required|string|max:1000',
        'siege' => 'required|string|max:500',
        'ville' => 'required|string|in:abidjan,bouake,yamoussoukro,korhogo,san-pedro,autre',
        'duree' => 'required|integer|min:1|max:99'
    ]);

    try {
        DB::beginTransaction();

        $modificationId = DB::table('modifications_entreprise')->insertGetId([
            'forme_juridique' => $request->forme_juridique,
            'denomination_sociale' => $request->denomination,
            'capital_social' => $request->capital,
            'nombre_associes' => $request->nb_associes,
            'objet_social' => $request->objet,
            'siege_social' => $request->siege,
            'ville' => $request->ville,
            'duree_entreprise' => $request->duree,
            'statut' => 'en_attente',
            'date_demande' => now(),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::commit();

        return redirect()->back()->with('success', 'Acte juridique enregistré avec succès.');

    } catch (\Exception $e) {
        DB::rollBack();

        return redirect()->back()
            ->withInput()
            ->with('error', 'Erreur lors de l\'enregistrement : ' . $e->getMessage());
    }
  }
    

    // Méthode pour récupérer une modification
    public function getModification($id)
    {
        try {
            $modification = DB::table('modifications_entreprise')
                ->where('id', $id)
                ->first();

            if (!$modification) {
                return response()->json([
                    'success' => false,
                    'message' => 'Modification non trouvée'
                ], 404);
            }

            return response()->json([
                'success' => true,
                'data' => $modification
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des données',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // Méthode pour lister toutes les modifications
    public function listModifications()
    {
        try {
            $modifications = DB::table('modifications_entreprise')
                ->orderBy('created_at', 'desc')
                ->paginate(10);

            return response()->json([
                'success' => true,
                'data' => $modifications
            ]);

        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de la récupération des données',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit(Service $service)
    {
        $entreprise = $service->company;

        return view('Modification', compact('service', 'entreprise'));
    }

    public function category($category)
    {
        $categories = [
            'creation' => 'Création d\'entreprise',
            'comptabilité' => 'Comptabilité',
            'domiciliation' => 'Domiciliation',
            'juridique' => 'Services juridiques',
            'autre' => 'Autres services',
        ];
        
        if (!array_key_exists($category, $categories)) {
            abort(404);
        }
        
        $services = Service::active()->byCategory($category)->get();
        $categoryName = $categories[$category];
        
        return view('services.category', compact('services', 'category', 'categoryName'));
    }

    public function form(Service $service)
    {
       
        return view('Radiation-Form');
    }

    public function acteJuridique(Service $service)
    {
        return view('Acte-Juridique');
    }

    public function CGA(Service $service)
    {
        return view('CGA');

    }

    public function showSNCF() 
    {
        return view('sncf');    
    }

    public function showSARLF()
    {
        return view('sarlf'); // Assurez-vous que la vue 'sarlf' existe
    }

    public function showSAF()
    {
        return view('saf'); // Assurez-vous que la vue 'saf' existe
    }

    public function showSASF()
    {
        return view('sasf'); // Assurez-vous que la vue 'sasf' existe
    }

    public function showSCSF()
    {
        return view('scsf'); // Assurez-vous que la vue 'scsf' existe
    }

    public function showSARLUF()
    {
        return view('sarluf'); // Assurez-vous que la vue 'sarluf' existe
    }

    public function showSEPF()
    {
        return view('sepf'); // Assurez-vous que la vue 'sepf' existe
    }

    public function showONGF()
    {
        return view('ongf'); // Assurez-vous que la vue 'ongf' existe
    }

    public function showSCIF()
    {
        return view('scif'); // Assurez-vous que la vue 'scif' existe
    }

    public function showASSOCIATIONF()
    {
        return view('associationf'); // Assurez-vous que la vue 'associationf' existe
    }

    public function showFONDATIONF()
    {
        return view('fondationf'); // Assurez-vous que la vue 'fondationf' existe
    }

    public function showSCOOPSF()
    {
        return view('scoopsf'); // Assurez-vous que la vue 'scoopsf' existe
    }

    public function showEIF()
    {
        return view('eif'); // Assurez-vous que la vue 'eif' existe
    }

    public function showSASUF()
    {
        return view('sasuf'); // Assurez-vous que la vue 'sasuf' existe
    }

    public function showFILIALEF()
    {
        return view('filialef'); // Assurez-vous que la vue 'filialef' existe
    }

     public function contractIndex()
    {
        $contractTypes = ContractType::all();
        $contractCounts = Contract::count();

        return view('contract-template.index', compact('contractTypes', 'contractCounts'));
    }

    public function contractCreate()
    {
        $contractId = request('id');
        $contract = null;

        if ($contractId != '') {
            $contract = ContractTemplate::findOrFail($contractId);
        }

        $clients = User::allClients();
        $contractTypes = ContractType::all();
        $currencies = Currency::all();

        if (request()->ajax()) {
            return view('contract-template.ajax.create', compact('contract', 'clients', 'contractTypes', 'currencies'));
        }

        return view('contract-template.create', compact('contract', 'clients', 'contractTypes', 'currencies'));
    }

    public function contractStore(StoreContractTemplate $request)
    {
        $contract = new ContractTemplate();
        $contract->subject = $request->subject;
        $contract->amount = $request->amount;
        $contract->currency_id = $request->currency_id;
        $contract->contract_type_id = $request->contract_type;
        $contract->description = trim_editor($request->description);
        $contract->contract_detail = trim_editor($request->description);
        $contract->added_by = auth()->id();
        $contract->save();

        return redirect()->route('contract-template.index')->with('success', 'Contrat enregistré avec succès');
    }

    public function contractShow($id)
    {
        $contract = ContractTemplate::findOrFail($id);

        if (request()->ajax()) {
            return view('contract-template.ajax.overview', compact('contract'));
        }

        return view('contract-template.create', compact('contract'));
    }

    public function contractEdit($id)
    {
        $contract = ContractTemplate::findOrFail($id);
        $contractTypes = ContractType::all();
        $currencies = Currency::all();

        if (request()->ajax()) {
            return view('contract-template.ajax.edit', compact('contract', 'contractTypes', 'currencies'));
        }

        return view('contract-template.create', compact('contract', 'contractTypes', 'currencies'));
    }

    public function contractUpdate(StoreContractTemplate $request, $id)
    {
        $contract = ContractTemplate::findOrFail($id);
        $contract->subject = $request->subject;
        $contract->amount = $request->amount;
        $contract->currency_id = $request->currency_id;
        $contract->contract_type_id = $request->contract_type;
        $contract->description = trim_editor($request->description);
        $contract->contract_detail = trim_editor($request->description);
        $contract->save();

        return redirect()->route('contract-template.index')->with('success', 'Contrat mis à jour avec succès');
    }

    public function contractDestroy($id)
    {
        $contract = ContractTemplate::findOrFail($id);
        $contract->delete();

        return response()->json(['success' => 'Contrat supprimé avec succès']);
    }



}