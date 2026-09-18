@extends('layouts.app')

@section('title', 'SEP - Société en Participation')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

    <!-- INTRODUCTION -->
    <section class="bg-white rounded-xl shadow p-6 mb-10">
        <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
         Société en Participation (SEP)  
        </h1>
        <p class="text-center text-gray-600 mb-4 italic">(article 854 et suivant AUSCOM)</p>


        <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la SEP</h2>
        <p class="mb-4">
             La Société en participation est la société dans laquelle les associés conviennent librement qu’elle ne sera pas immatriculée au registre du commerce et du crédit mobilier et qu’elle n’aura pas la personnalité morale.
        </p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques de la SEP</h2>
        <ul class="list-disc list-inside space-y-1">
            <li>Société occulte  (les associés concluent un contrat de société et le dissimulent aux tiers).</li>
            <li>Société non immatriculée au RCCM</li>
            <li>Société sans personnalité morale</li>
            <li>Seul le gérant apparaît aux yeux des tiers</li>
        </ul>
    </section>

    <!-- TABLEAU DES COLONNES -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CONSTITUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

            <h4 class="font-semibold underline">Les conditions de fond</h4>
            <ul class="list-disc list-inside text-gray-700">
                <li>Minimum de 2 associés requis (personnes physiques ou morales).</li>
                <li>Consentement valide et sans vice obligatoire.</li>
                <li>Capacité : civile ou commerciale selon l’objet.</li>
                <li>Objet social : civil ou commercial, mais toujours licite (art. 855-856 AUSCOM).</li>
            </ul>


            <p class="mt-2 font-medium">Apports possibles :</p>
            <ul class="list-disc list-inside">
                <li>Numéraire (mis à dispo du gérant).</li>
                <li>Nature (jouissance ou usufruit, propriété conservée)</li>
                <li>Industrie (autorisé en SEP)</li>
                <li>Industrie (autorisé en SEP)</li>
                <li>Aucune formalité requise : pas d’écrit, pas d’immatriculation, pas de publicité (art. 854 al. 2 AUSCOM).</li>
            </ul>
        </div>

        <!-- FONCTIONNEMENT -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

            <p class="font-semibold underline">La gérance de la SEP</p>
            <ul class="list-disc list-inside text-gray-700">
                <li>Le gérant (associé ou non, personne physique ou morale) est désigné et révoqué à l’unanimité, sauf clause contraire</li>
                <li>Ses pouvoirs sont définis par le mandat qui fixe sa mission.</li>
            </ul>

            <h2>Entre associés</h2>
            <p class="mt-3 font-medium">Droits : </p>
            <ul class="list-disc list-inside">
                <li>participation aux décisions, parts sociales, bénéfices, droit de retrait.</li>
            </ul>

            <p class="mt-3 font-medium">Obligations : </p>
            <ul class="list-disc list-inside">
                <li>libérer les apports, contribuer aux pertes.</li>
                <li>À défaut de précisions, les règles de la SNC s’appliquent.</li>
            </ul>

            <p class="mt-3 font-medium">Vis-à-vis des tiers</p>
            <ul class="list-disc list-inside">
                <li>Les associés sont personnellement responsables pour les actes accomplis au nom de la société.</li>
                <li>Leur responsabilité est indéfinie et solidaire.</li>
            </ul>

        </div>

        <!-- DISSOLUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

            <p class="font-semibold underline">Les causes (article 863 AUSCOM)</p>
            <p class="mt-2">Dans la société en participation indéterminée, Notification par un associé à tous les autres associés par lettre au porteur contre récépissé ou par lettre recommandée avec demande d’avis de réception.</p>

            <p class="font-semibold mt-4 underline"> Les effets</p>
            <ul class="list-disc list-inside mt-2">
                <li>Liquidation</li>
                <li>Opération de partage </li>
            </ul>
        </div>

    </section>
</div>
@endsection