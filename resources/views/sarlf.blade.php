@extends('layouts.app')

@section('title', 'SARL - Services Juridiques et Solutions de Gestion')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

    <!-- INTRODUCTION -->
    <section class="bg-white rounded-xl shadow p-6 mb-10">
        <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            La Société à Responsabilité Limitée (SARL)
        </h1>
        <p class="text-center text-gray-600 mb-4 italic">Articles 309 à 314 AUSCOM de 2014</p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la SARL</h2>
        <p class="mb-4">
            Selon l’article 309 de l’AUSCOM, <span class="font-semibold">la SARL</span> est une société dans laquelle les associés ne sont responsables que des dettes sociales qu’à concurrence de leurs apports et dont les droits sont représentés par des parts sociales.
        </p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques de la SARL</h2>
        <ul class="list-disc list-inside space-y-1">
            <li>La SARL est une société commerciale à caractère hybride ou mixte : elle n’est pas totalement une société de personnes car les associés ne sont pas indéfiniment et solidairement responsables des dettes sociales.</li>
            <li>Elle n’est pas non plus tout à fait une société de capitaux : car le capital social n’est pas représenté par des titres négociables mais par des parts sociales cessibles sous certaines conditions.</li>
            <li>La responsabilité des associés de la SARL est limitée à leurs apports.</li>
            <li>Le capital social est peu important (<span class="italic">cf. article 311 nouveau de l’AUSCOM + article 5 de l’Ordonnance n° 2014-161 du 2 avril 2014</span>).</li>
            <li>La présence d’un certain <span class="italic">intuitu personae</span>.</li>
            <li>Absence de limitation du cumul de <span class="underline">mandat</span> du gérant de la SARL.</li>
        </ul>
    </section>

    <!-- TABLEAU DES COLONNES -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CONSTITUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

            <h4 class="font-semibold underline">Les conditions de fond</h4>
            <p class="mt-2 font-medium">Conditions de financement :</p>
            <ul class="list-disc list-inside text-gray-700">
                <li>Associés : Une ou plusieurs personnes physiques ou morales, sans maximum. Constatement exempté des vices requis.</li>
                <li>Capital : Minimum de 5 000 FCFA. Apports en numéraire libérés à 50% lors de la souscription.</li>
            </ul>

            <p class="mt-2"><span class="font-medium">Parts Sociales</span> : Cession entre associés selon les statuts ; à des tiers avec l’accord de la majorité. Libre entre conjoints.</p>
            <p class="mt-2"><span class="font-medium">Droits d’un Associé</span> : Parts associatives aux ayants droit, sauf clause d’agrément.</p>

            <p class="mt-2 font-medium">Conditions de Forme :</p>
            <ul class="list-disc list-inside">
                <li>Statuts : 13 mentions de l’AUSCOM obligatoires, signés.</li>
                <li>Publicité : Formalités obligatoires sous peine de nullité.</li>
            </ul>
        </div>

        <!-- FONCTIONNEMENT -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

            <p class="font-semibold underline">Conditions de financement</p>
            <p class="mt-2 font-medium">Gérance :</p>
            <ul class="list-disc list-inside text-gray-700">
                <li><strong>Désignation</strong> : Gérants nommés pour au moins 4 ans par les statuts ou autre titre.</li>
                <li><strong>Révocation</strong> : Motifs justes nécessaires, majorité simple.</li>
                <li><strong>Pouvoirs</strong> : Définis par les statuts. Le gérant engage la société.</li>
                <li><strong>Responsabilité</strong> : Civile, pénale ou personnelle.</li>
            </ul>

            <p class="mt-3 font-medium">Décisions Collectives :</p>
            <ul class="list-disc list-inside">
                <li>Assemblées générales ou consultation écrite.</li>
                <li>Réunion à la moitié des parts statutaires.</li>
                <li>Assemblée annuelle obligatoire dans les 6 mois après clôture de l’exercice.</li>
            </ul>

            <p class="mt-3"><span class="font-medium">Contrôle</span> : Par les associés non gérants. Commissaire aux comptes obligatoire si seuil atteint.</p>
        </div>

        <!-- DISSOLUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

            <p class="font-semibold underline">Causes de dissolution (art. 200 AUSCOM)</p>
            <p class="mt-2">La SARL n’est pas dissoute en cas de décès, d’interdiction, de faillite ou d’incapacité d’un associé.</p>

            <p class="font-semibold mt-4 underline">Effets de la dissolution</p>
            <ul class="list-disc list-inside mt-2">
                <li>La liquidation</li>
                <li>L’opération de partage</li>
            </ul>
        </div>

    </section>
</div>
@endsection
