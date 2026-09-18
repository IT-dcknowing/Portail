@extends('layouts.app')

@section('title', 'Société par Actions Simplifiée Unipersonnelle (SASU)')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

        <!-- INTRODUCTION -->
        <section class="bg-white rounded-xl shadow p-6 mb-10">
            <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            Société par Actions Simplifiée Unipersonnelle (SASU)
            </h1>


            <h2 class="text-lg font-semibold underline mb-2">➤ Définition SASU</h2>
               <ul>
                   <li>La SASU (Société par Actions Simplifiée Unipersonnelle) est une société de capitaux constituée par une seule personne, appelée associé unique, qui peut être une personne physique ou morale.</li>
                   <li>Elle dispose d’une personnalité juridique propre et sa responsabilité est limitée à ses apports.</li>
               </ul>


            <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques SASU</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Grande souplesse dans l’organisation et la gestion</li>
                <li>Responsabilité limitée au capital social</li>
                <li>Bonne image pour les investisseurs et clients institutionnels</li>
                <li>Facilité d’évolution vers une SAS (à plusieurs actionnaires)</li>
                <li>Pas d’exigence de commissaire aux comptes sauf seuils dépassés</li>
                <li>Coût de création et de gestion plus élevé qu’une entreprise individuelle</li>
                <li>Obligation de tenir une comptabilité rigoureuse</li>
                <li>Complexité potentielle des statuts mal rédigés</li>
                <li>Nombre d’associés 1 seul</li>
                <li>Responsabilité Limitée aux apports</li>
                <li>Statuts Librement rédigés, mais obligatoires</li>
                <li>Capital social Libre (souvent ≥ 100 000 FCFA recommandé)</li>
                <li>Fiscalité Imposition à l’IS (Impôt sur les Sociétés)</li>
                <li>Registre Immatriculation au RCCM + DGI obligatoire</li>

            </ul>
        </section>

        <!-- TABLEAU DES COLONNES -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- CONSTITUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

                <ul class="list-disc list-inside text-gray-700">
                    <li> Un seul associé </li>
                    <li>Responsabilité limitée aux apports</li>
                    <li>Statuts librement rédigés, mais obligatoires</li>
                    <li>Capital social libre (souvent ≥ 100 000 FCFA recommandé)</li>
                    <li>Imposition à l’IS (Impôt sur les Sociétés)</li>
                    <li>Immatriculation au RCCM + DGI obligatoire</li>
                    <li>Comptabilité stricte</li>

                </ul>
            </div>

            <!-- FONCTIONNEMENT -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

                <ul class="list-disc list-inside text-gray-700">
                    <li>La rédaction des statuts</li>
                    <li>La constitution du capital social</li>
                    <li>La publication d'un avis de création dans un journal d'annonces légales</li>
                    <li>L'immatriculation au Registre du Commerce et du Crédit Mobilier (RCCM)</li>
                </ul>

            </div>

            <!-- DISSOLUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

                <ul class="list-disc list-inside mt-2">
                    <li>L'associé unique de la SASU doit prendre la décision de dissoudre la société, généralement actée par un procès-verbal de dissolution. Ce procès-verbal doit également désigner un liquidateur, souvent le président de la SASU.</li>
                    <li>Si la SASU possède des actifs et des dettes, une liquidation est nécessaire. Le liquidateur nommé sera chargé de gérer la vente des actifs, le remboursement des dettes, et la répartition du reliquat (boni de liquidation) aux associés, le cas échéant.</li>
                    <li>Une fois les formalités accomplies et le dossier validé, la SASU est radiée du Registre du Commerce et du Crédit Mobilier, marquant ainsi sa disparition juridique.</li>
                    <li>Demande de radiation : un procès-verbal est rédigé pour officialiser la radiation de la société du Registre du Commerce et du Crédit Mobilier (RCCM).</li>

                </ul>
            </div>

        </section>
</div>
@endsection