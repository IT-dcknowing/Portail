@extends('layouts.app')

@section('title', 'SCOOPF')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

        <!-- INTRODUCTION -->
        <section class="bg-white rounded-xl shadow p-6 mb-10">
            <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            SCOOPS
            </h1>


            <h2 class="text-lg font-semibold underline mb-2">➤ Définition d'une SCOOPS</h2>
            <ul>
                <li>La SCOOPS (Société Coopérative avec Conseil d’Administration) est une personne morale de droit privé, à but économique et social, regroupant des personnes physiques ou morales volontairement réunies pour satisfaire leurs besoins économiques,</li> 
                    <li>sociaux ou culturels communs, sur la base de la gestion démocratique et de la mutualisation des moyens.</li> 
                    <li>Elle est régie par :</li>
                    <ul>
                        <li>L’Acte uniforme OHADA relatif au droit des sociétés coopératives (2010)</li>
                        <li>Le Code des coopératives ivoirien (loi n°2014-856 du 22 décembre 2014)</li>
                    </ul>
            </ul>


            <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques de la SCI</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Nature juridique : Société coopérative, personne morale</li>
                <li>Nombre minimum de membres : 7 membres fondateurs (personnes physiques ou morales)</li>
                <li>But : Satisfaire les besoins économiques et sociaux communs (production, transformation, commercialisation, approvisionnement, services...)</li>
                <li>Statut : Coopérative avec Conseil d’Administration (par opposition à la SCOOP-S avec gérance simple)</li>
                <li>Responsabilité des membres : Limitée à leurs apports, sauf stipulation contraire</li>
                <li>Capital social : Variable, constitué par les parts sociales des membres</li>
                <li>Organes de gestion : Assemblée Générale (AG), Conseil d’Administration (CA), Comité de Surveillance</li>
                <li>Gestion : Démocratique : 1 membre = 1 voix, quelle que soit sa part</li>
                <li>Répartition des excédents : Après mise en réserve obligatoire, possibilité de ristournes aux membres selon leur activité avec la coopérative</li>
                <li>Durée : En principe illimitée, sauf mention contraire dans les statuts</li>
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
                 <p class="mb-2">Obligations légales:</p>
                <ul class="list-disc list-inside text-gray-700">
                    <li>La SCOOPS doit être enregistrée au registre des sociétés coopératives (auprès du Conseil des Sociétés Coopératives – CSC ou des directions régionales du ministère en charge de l’Agriculture).</li>
                    <li>Elle doit tenir une comptabilité, produire des rapports annuels, et convoquer régulièrement l’AG.</li>
                    <li>Elle est soumise à un audit coopératif périodique obligatoire.</li>
                </ul>
                <p class="mb-2">Obligations comptables et fiscales:</p>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Tenue d’une comptabilité régulière</li>
                    <li>Production d’un rapport d’activités et d’un rapport financier annuel</li>
                    <li>Convocation annuelle de l’AG</li>
                    <li>Déclaration fiscale (si activité génératrice de revenu)</li>
                    <li>Audit coopératif périodique obligatoire</li>
                </ul>


            </div>

            <!-- DISSOLUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>
                <p class="mt-3 font-medium">Dissolution administrative:</p>
                <ul class="list-disc list-inside">
                    <li>Peut être prononcée par le Ministère en charge de l’Agriculture ou la Justice, en cas :</li>
                    <ul>
                        <li>D’activités frauduleuses</li>
                        <li>De non-tenue des AG</li>
                        <li>D’inobservation des règles coopératives</li>
                        <li>D’inaction prolongée</li>
                    </ul>
                    </li>

                </ul>

                <p class="mt-3 font-medium">Dissolution volontaire:</p>
                <ul class="list-disc list-inside">
                     <li>Convocation d’une AG extraordinaire</li>
                    <li>Vote de la dissolution à la majorité qualifiée prévue dans les statuts</li>
                    <li>Désignation d’un liquidateur pour gérer la liquidation des biens</li>
                    <li>Inventaire des actifs et passifs</li>
                    <li>Paiement des dettes</li>
                    <li>Affectation du solde à une autre coopérative ou structure similaire</li>
                    <li>Dépôt du dossier de dissolution à l’administration</li>
                </ul>

                <p class="mt-3 font-medium">Causes de dissolution:</p>
                <ul class="list-disc list-inside">
                    <li>Décision de l’AG extraordinaire (volontaire)</li>
                    <li>Réduction du nombre de membres en dessous du seuil légal</li>
                    <li>Faillite ou cessation d’activité</li>
                    <li>Non-respect répété des obligations légales</li>
                    <li>Dissolution administrative par l’autorité compétente</li>
                </ul>
            </div>

        </section>
</div>
@endsection