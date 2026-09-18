@extends('layouts.app')

@section('title', 'Offre FULL OPTION - DC-KNOWING')

@section('content')
<section id="missions" class="py-16 bg-gray-50">
    <div class="container mx-auto px-4">

        {{-- En-tête --}}
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">
                L'Excellence Sur Mesure
            </h2>
            
             
            
            <p class="text-gray-600 max-w-3xl mx-auto">
                Cabinet agréé FDFP et MBPE (Agrément N° 296/SEPMBPE/DGI)[cite: 31]. 
                L'offre Full Option s'adapte à la spécificité de votre entité.
            </p>
        </div>

        {{-- Grille des offres --}}
        <div class="flex justify-center">
         
            {{-- Offre 5 - FULL OPTION --}}
            <div class="service-card bg-black rounded-xl shadow-sm p-8 flex flex-col hover:shadow-xl transition max-w-4xl w-full border border-yellow-400/20">
                
                <div class="flex flex-col md:flex-row md:justify-between mb-8">
                    <div>
                        <span class="bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded-full uppercase">
                            Offre 5
                        </span>
                        <h3 class="text-3xl font-bold text-white mt-2">
                            FULL OPTION [cite: 32]
                        </h3>
                    </div>

                    <div class="text-left md:text-right mt-4 md:mt-0">
                        <p class="text-yellow-400 font-bold text-2xl">
                            À négocier 
                        </p>
                        <p class="text-sm text-gray-400">
                            Selon la spécificité de l'entité 
                        </p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4 mb-8">
                    {{-- Colonne 1 : Comptabilité & Finance --}}
                    <ul class="space-y-3 text-gray-300 text-sm">
                        <li class="flex items-start">
                            <i class="ri-flashlight-line text-yellow-400 mr-2 mt-1"></i>
                            Régularisation SYSCOHADA et supervision comptable 
                        </li>
                        <li class="flex items-start">
                            <i class="ri-flashlight-line text-yellow-400 mr-2 mt-1"></i>
                            Situations financières périodiques (Grand livre, Balance, Rapprochement) 
                        </li>
                        <li class="flex items-start">
                            <i class="ri-flashlight-line text-yellow-400 mr-2 mt-1"></i>
                            Veille au respect du droit des affaires (OHADA) 
                        </li>
                    </ul>

                    {{-- Colonne 2 : Fiscalité & Social --}}
                    <ul class="space-y-3 text-gray-300 text-sm">
                        <li class="flex items-start">
                            <i class="ri-flashlight-line text-yellow-400 mr-2 mt-1"></i>
                            Optimisation des charges et déclarations fiscales 
                        </li>
                        <li class="flex items-start">
                            <i class="ri-flashlight-line text-yellow-400 mr-2 mt-1"></i>
                            Gestion sociale : Contrats de travail, bulletins et livre de paie 
                        </li>
                        <li class="flex items-start">
                            <i class="ri-flashlight-line text-yellow-400 mr-2 mt-1"></i>
                            Déclarations CNPS et établissement de la DISA 
                        </li>
                    </ul>
                </div>

                <div class="border-t border-gray-800 pt-6">
                    <button class="w-full py-4 bg-yellow-400 text-black rounded-lg font-bold hover:bg-yellow-500 transition uppercase tracking-wider">
                        Demander un devis personnalisé
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection