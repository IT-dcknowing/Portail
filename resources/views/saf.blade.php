@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

    <!-- INTRODUCTION -->
    <section class="bg-white rounded-xl shadow p-6 mb-10">
        <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            LA SOCIETE ANONYME (SA) 
        </h1>
        <p class="text-center text-gray-600 mb-4 italic">article 385 et suivants AUSCOM</p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la SA</h2>
        <p class="mb-4">
          La société anonyme est une société dans laquelle les actionnaires ne sont responsables des dettes sociales qu’à concurrence de leurs apports et dont les droits sont représentés par des actions.
        </p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques de la SA</h2>
        <ul class="list-disc list-inside space-y-1">
            <li>La SA est une société commerciale par la forme.</li>
            <li>La SA est une société à risque limitée (responsabilité des actionnaires limitée à leurs apports).</li>
            <li>La SA  est une société de capitaux.</li>
            <li>La SA une société très hiérarchisée au plan organisationnel.</li>
            <li>La SA est une société par actions : les valeurs mobilières qu’elle émet sont des actions susceptibles d’être cotées en bourse</li>
        </ul>
    </section>

    <!-- TABLEAU DES COLONNES -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CONSTITUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

            <h4 class="font-semibold underline">Les conditions de fond</h4>
            <ul class="list-disc list-inside text-gray-700">
                <li>1 ou plusieurs actionnaires, personnes physiques ou morales (mineurs et époux autorisés).</li>
                <li>Apports autorisés : numéraire et nature (évalués par un commissaire aux apports).</li>
                <li>•Apports en industrie interdits.</li>
                <li>Capital social minimum :
                10 millions FCFA sans appel public à l’épargne.</li>
                <li>100 millions FCFA avec appel public à l’épargne</li>
                <li>Capital divisé en actions, valeur nominale libre.</li>
                <li>Responsabilité limitée des actionnaires à leurs apports.</li>
                <li>Statuts conformes aux articles 13 et 397 AUSCOM, signés après délivrance du certificat du dépositaire (art. 396).</li>
                <li>Rapport du commissaire aux apports annexé aux statuts.</li>
                <li>En cas d’appel public à l’épargne : publication obligatoire d’une notice d’information (art. 825).</li>
                <li>Formalités de publicité à accomplir.</li>
            </ul>
        </div>

        <!-- FONCTIONNEMENT -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

            <p class="font-semibold underline">Conseil d'administration</p>
            <p class="mt-2 font-medium">Administrateurs :</p>
            <li>Nommés dans les statuts ou par l'AG constitutive.</li>
            <li>En cours de vie sociale, nommés par l'AG ordinaire.</li>
            <li>Peuvent être actionnaires ou non, mais doivent être exemptés d'interdictions.</li>
            <li>Mandats : 2 ans (constitution) ou 6 ans (vie sociale), renouvelables.</li>
            <li>Responsabilité civile et pénale.</li>

            <p class="mt-3 font-medium">Président du Conseil d'Administration (PCA) :</p>
            <ul class="list-disc list-inside">  
                <li>Nommé par le conseil, doit être une personne physique.</li>
                <li>Peut être révoqué sans motifs.</li>
                <li>Préside les réunions.</li>
            </ul>

            <p class="mt-3 font-medium">Directeur Général (DG) :</p>
            <ul class="list-disc list-inside">  
                <li>Nommé par le conseil, peut être actionnaire ou tiers.</li>
                <li>Peut être révoqué sans motifs.</li>
                <li>Préside les réunions.</li>
            </ul>

            <p class="mt-3 font-medium">Président Directeur Général (PDG) :</p>
            <ul class="list-disc list-inside">  
                <li>Nommé par le conseil, choisi parmi les administrateurs.</li>
                <li>Peut-être avoir un contrat de travail avec autorisation de l'AG</li>
                <li>Préside le conseil et assure la direction générale.</li>
            </ul>

            <p class="mt-3 font-medium">Assemblées Générales d'Actionnaires:</p>
            <ul class="list-disc list-inside">  
                <li>AG pré-constitutionnelle : Désignation du commissaire aux apports.</li>
                <li>AG constitutif : Convocation par les fondateurs 15 jours avant.</li>
                <li>Quorum : 50% des actions à la première convocation, 25% à la deuxième.</li>
                <li>AG ordinaires/extraordinaires :Convocation par le PCA ou d'autres parties désignées.</li>
                <li>Quorum et majorité spécifique selon le type d'assemblée.</li>
            </ul>

            <p class="mt-3 font-medium">Contrôle de la SA:</p>
            <ul class="list-disc list-inside">  
                <li>Droit d'information des actionnaires.</li>
                <li>Rôle du commissaire aux comptes.</li>
            </ul>

            <p class="mt-3 font-medium">SA avec Administrateur Général:</p>
            <ul class="list-disc list-inside">  
                <li>Désigné par l'AG constitutive ou AGO.</li>
                <li>Limité à 3 mandats d'administrateur</li>
                <li>Peut être révoqué pour justes motifs</li>
                <li>Dispose de pouvoirs étendus sauf pour les décisions réservées aux AG.</li>
                <li>Ces points reprennent les aspects clés de la gouvernance et de la gestion d'une société anonyme</li>
                <li>Si vous avez besoin de détails supplémentaires ou d'un aspect particulier, n'hésitez pas à le préciser !</li>
            </ul>
        </div>

        <!-- DISSOLUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

            <p class="font-semibold mt-4 underline">Effets de la dissolution</p>
            <ul class="list-disc list-inside mt-2">
                <li>La liquidation</li>
                <li>L’opération de partage</li>
            </ul>
        </div>

    </section>
</div>
@endsection