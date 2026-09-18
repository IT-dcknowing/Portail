@extends('layouts.app')

@section('title', 'SARLU - Société à Responsabilité Limitée Unipersonnelle')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

    <!-- INTRODUCTION -->
    <section class="bg-white rounded-xl shadow p-6 mb-10">
        <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
         Société à Responsabilité Limitée Unipersonnelle (SARLU)  
        </h1>


        <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la SARLU</h2>
        <p class="mb-4">
            La SARLU, ou Société à Responsabilité Limitée Unipersonnelle, est une SARL constituée par un seul associé, personne physique ou morale.
            Elle a la personnalité morale, une responsabilité limitée aux apports, et un fonctionnement simplifié.
            Elle est régie par :
            <ul>
                L’Acte uniforme OHADA relatif au droit des sociétés commerciales
                Et les textes fiscaux ivoiriens applicables
            </ul>
        </p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques du SARLU</h2>
        <ul class="list-disc list-inside space-y-1">
            <li>Associé(s) : 1 seul (physique ou moral).</li>
            <li>Personnalité Moral : Oui, après immatriculation.</li>
            <li>Capital Social Minimum : À définir.</li>
            <li>Dirigeant : Gérant unique.</li>
            <li>Immatriculation : Obligatoire au CEPICI.</li>
            <li>Fiscalité : Selon régime réel, forfaitaire ou simplifié.</li>
        </ul>

        <h2 class="text-lg font-semibold underline mb-2">➤ Avantages et Inconvénients du SARLU</h2>
        <h3 class="font-semibold">Avantages :</h3>
        <ul class="list-disc list-inside">
            <li>Protection du patrimoine personnel.</li>
            <li>Gestion souple sans assemblées.</li>
            <li>Possibilité d'ajouter des associés.</li>
            <li>Accès au crédit bancaire.</li>
            <li>Responsabilité limitée.</li>
        </ul>

        <h3 class="font-semibold">Inconvénients :</h3>
        <ul class="list-disc list-inside">
            <li>Charge administrative sur le gérant.</li>
            <li>Risque de responsabilité personnelle.</li>
            <li>Moins adapté aux projets nécessitant un réseau d'investisseurs.</li>
        </ul>
    </section>

    <!-- TABLEAU DES COLONNES -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CONSTITUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

            <p class="mt-2 font-medium">Dossier à fournir (CEPICI)</p>
            <ul class="list-disc list-inside">
                <li>Statuts de la SARLU signés par l’associé unique</li>
                <li>Acte de nomination du gérant</li>
                <li>Pièce d’identité de l’associé et du gérant</li>
                <li>Déclaration sur l’honneur de non-condamnation</li>
                <li>Justificatif du siège social (bail, attestation, etc.)</li>
                <li>Formulaire unique CEPICI dûment rempli</li>
                <li>Dépôt au Guichet Unique du CEPICI → obtention du RCCM, N° IFU, immatriculation CNPS, patente</li>
            </ul>
        </div>

        <!-- FONCTIONNEMENT -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

            <p class="mt-2 font-medium">Organes de gestion</p>

            <ul class="list-disc list-inside">
                <li>Gérant : Dirige l’entreprise au quotidien ; peut-être l’associé ou un tiers</li>
                <li>Associé unique : Prend toutes les décisions importantes (approbation des comptes, affectation du résultat, changement de gérant…)</li>
            </ul>

            <p class="mt-2 font-medium">Gestion simplifiée</p>

            <ul class="list-disc list-inside">
                <li>Pas besoin d’assemblée générale : les décisions sont prises par l’associé seul, et consignées par écrit</li>
                <li>Pas de formalisme lourd, mais tout doit être traçable et justifiable</li>
                <li>Les bénéfices peuvent être soit réinvestis, soit versés sous forme de dividendes à l’associé unique</li>
            </ul>

            <ul class="list-disc list-inside">
                <li>Obligations fiscales :</li>
                <li>Comptabilité : Tenue d’une comptabilité</li>
                <li>Déclaration fiscale : TVA, BIC, impôts sur les sociétés, déclarations de revenus</li>
                <li>CNPS : Affiliation obligatoire</li>
                <li>Rapport annuel : Dépôts des états financiers</li>
            </ul>
        </div>

        <!-- DISSOLUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

            <p class="mt-2">Cas de dissolution judiciaire</p>
            <p>Intervention du tribunal en cas de :</p>
            <ul class="list-disc list-inside">
                <li>Faillite</li>
                <li>Abus de biens sociaux</li>
                <li>Conflits graves (si la SARLU est transformée en SARL plus tard)</li>
            </ul>

            <p>Procédure de dissolution volontaire</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                         <thead class="table-dark">
                            <tr>
                                <th class="col-4">Étapes</th>
                                <th class="col-8">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold">1. Décision de l’associé unique</td>
                                <td>Rédaction d’un procès-verbal de dissolution</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">2. Nomination d’un liquidateur</td>
                                <td>L’associé peut se nommer lui-même ou désigner un tiers</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">3. Publication légale</td>
                                <td>Avis de dissolution dans un journal d’annonces légales</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">4. Liquidation des biens</td>
                                <td>Paiement des dettes, vente des actifs</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">5. Clôture de la liquidation</td>
                                <td>PV de clôture, affectation du solde</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">6. Radiation</td>
                                <td>Demande au RCCM pour suppression de l’entreprise du registre</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <ul class="list-disc list-inside">
                <p class="mt-2 font-medium">Motifs courants de dissolution  :</p>
                <li>Comptabilité : Tenue d’une comptabilité</li>
                <li>Déclaration fiscale : TVA, BIC, impôts sur les sociétés, déclarations de revenus</li>
                <li>CNPS : Affiliation obligatoire</li>
                <li>Rapport annuel : Dépôts des états financiers</li>
            </ul>
                
        </div>
    </section>
</div>
@endsection