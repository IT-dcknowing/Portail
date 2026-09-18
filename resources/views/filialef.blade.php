@extends('layouts.app')

@section('title', 'Filiale ')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

        <!-- INTRODUCTION -->
        <section class="bg-white rounded-xl shadow p-6 mb-10">
            <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            FILIALE
            </h1>


            <h2 class="text-lg font-semibold underline mb-2">➤ Définition d'une filiale</h2>
            <ul>
                <li>Une filiale est une société dotée de la personnalité juridique propre, contrôlée par une autre société dite société mère, qui en détient plus de 50 % du capital social.</li>
                <li>Autrement dit, c’est une société juridiquement indépendante, mais financièrement et stratégiquement dépendante d'une autre.</li>
            </ul>


            <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques d'une filiale</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Statut juridique : Société à part entière (SA, SARL, SAS, etc.)</li>
                <li>Autonomie : A sa propre personnalité morale, immatriculation, siège, comptes</li>
                <li>Contrôle : Majoritairement contrôlée par une société mère (plus de 50 % du capital)</li>
                <li>Responsabilité : Limitée à son propre patrimoine (sauf abus de droit ou confusion)</li>
                <li>Dirigeants : Nommés par la société mère, mais exercent leurs fonctions dans la filiale</li>
                <li>Nationalité : En Côte d’Ivoire, la filiale est une société ivoirienne, même si la société mère est étrangère</li>
            </ul>

            <h4 class="text-md font-semibold mt-4">Base légale</h4>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Acte uniforme OHADA relatif au droit des sociétés commerciales</li>
                    <li>Code général des impôts (pour le traitement fiscal des liens entre société mère et filiale)</li>
                    <li>RCCM pour les formalités d’immatriculation</li>
                    <li>Code des investissements (si avantages recherchés)</li>
                </ul>
        </section>

        <!-- TABLEAU DES COLONNES -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- CONSTITUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>
                <p class="mb-2">Dossier de constitution</p>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Statuts signés et notariés</li>
                    <li>Procès-verbal de l’assemblée générale constitutive</li>
                    <li>Liste des membres fondateurs avec leurs apports</li>
                    <li>Liste des membres du Conseil d’Administration et du Comité de surveillance</li>
                    <li>Plan d’affaires ou note de présentation de l’activité</li>
                    <li>Pièces d’identité des membres du CA</li>
                    <li>Justificatif de siège social</li>
                    <li>Dépôt du dossier auprès de la Direction Régionale de l’Agriculture ou du Conseil des Sociétés Coopératives (CSC)</li>
                   
                </ul>
                
            </div>

            <!-- FONCTIONNEMENT -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>
                <ul>
                    <li>Une filiale peut être constituée sous n’importe quelle forme :</li>
                    <li>-SARL, SAS, SA, ou même SASU ou SARLU</li>
                    <li>-La forme dépend de la stratégie de gouvernance et du secteur</li>
                </ul>

                <p class="mb-2">Documents nécessaires:</p>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Statuts signés</li>
                    <li>PV de nomination des dirigeants</li>
                    <li>Pièces d’identité ou extraits du registre de commerce de la maison-mère</li>
                    <li>Attestation bancaire ou d’apports</li>
                    <li>Justificatif de siège social</li>
                    <li>Formulaire CEPICI complété</li>
                    <li>La maison-mère étrangère devra fournir certains documents apostillés ou légalisés (extrait RCS, statuts, identité du représentant légal, etc.)</li>
                </ul>

                <p class="mb-2">Autonomie de gestion:</p>
                <ul class="list-disc list-inside text-gray-700">
                   <li>Même si elle est contrôlée par sa société mère, la filiale :</li>
                    <li>-Dispose de sa propre personnalité juridique</li>
                    <li>-Tient une comptabilité distincte</li>
                    <li>-A des dirigeants désignés (souvent proposés par la maison-mère)</li>
                    <li>-Est responsable de ses actes (contrats, salaires, dettes…)</li>
                </ul>

                <p class="mb-2">Organes de gestion</p>
                <ul class="list-disc list-inside text-gray-700">
                  <li>Organe : Dirige la société au quotidien</li>
                    <li>Assemblée générale des associés/actionnaires : Valide les comptes, approuve les décisions importantes</li>
                    <li>Conseil d’administration (si SA) : Supervision et stratégie</li>
                    <li>Commissaire aux comptes : Obligatoire selon la taille / forme juridique</li>
                </ul>

                <p class="mb-2">Obligations fiscales et sociales</p>
                <ul class="list-disc list-inside text-gray-700">
                  <li>Déclarations fiscales : TVA, BIC, retenue à la source…</li>
                    <li>Paiement des impôts locaux (patente, impôt foncier)</li>
                    <li>Affiliation à la CNPS pour les salariés</li>
                    <li>Tenue d’états financiers annuels</li>
                </ul>
            </div>

            <!-- DISSOLUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>
                <p class="mt-3 font-medium">Cas de dissolution judiciaire</p>
                <ul class="list-disc list-inside">
                    <p>Décidée par le tribunal en cas de :</p>
                    <li>Perte totale du capital social</li>
                    <li>Inactivité prolongée</li>
                    <li>Inobservation des obligations légales</li>
                </ul>

                <p class="mt-3 font-medium">Procédure de dissolution volontaire:</p>
                <ul class="list-disc list-inside">
                    <p> extraordinaire : Vote de la dissolution par les associés</p>
                    <li>Nomination d’un liquidateur : Peut être un représentant de la maison-mère</li>
                    <li>Publication dans un journal d’annonces légales : Mention de la dissolution</li>
                    <li>Clôture de la liquidation : Clôture de la liquidation</li>
                    <li>Dépôt du PV de liquidation et radiation : Auprès du RCCM et du fisc</li>
                </ul>

                <p class="mt-3 font-medium">Causes de dissolution:</p>
                <ul class="list-disc list-inside">
                    <li>Décision de la maison-mère (volontaire)</li>
                    <li>Expiration de la durée prévue dans les statuts</li>
                    <li>Faillite ou cessation d’activité</li>
                    <li>Fusion-absorption</li>
                    <li>Dissolution judiciaire (abus, conflits, non-respect de la loi)</li>
                </ul>
            </div>

        </section>
</div>
@endsection