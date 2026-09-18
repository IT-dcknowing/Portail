@extends('layouts.app')

@section('title', 'SNC - société en commandite simple')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

    <!-- INTRODUCTION -->
    <section class="bg-white rounded-xl shadow p-6 mb-10">
        <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            société en commandite simple (SCS)
        </h1>
        <p class="text-center text-gray-600 mb-4 italic">articles 293 à 308 AUSCOM</p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la SCS</h2>
        <p class="text-justify">
          La SCS est une société commerciale dans laquelle coexistent un ou plusieurs associés indéfiniment et solidairement responsables des dettes sociales dénommés <span class="fw-semibold">« associés commandités »</span>, avec un ou plusieurs associés responsables des dettes sociales dans la limite de leur apports dénommés <span class="fw-semibold">« associés commanditaires »</span> ou <span class="fw-semibold">« associés en commandites »</span> et dont le capital est divisé en parts sociales.
        </p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques de la SCS</h2>
        <ul class="list-disc list-inside space-y-1">
            <li>-La SCS est une société commerciale par la forme</li>
            <li>-La SCS est une société de personne</li>
            <li>-La SCS comporte deux catégories d’associés : les  associés commandités et les  associés commanditaires</li>
        </ul>
    </section>

    <!-- TABLEAU DES COLONNES -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CONSTITUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

            <h4 class="font-semibold underline">Conditions de fond </h4>
            <p class="mt-2 font-medium">Conditions de financement :</p>
            <ul class="list-disc list-inside text-gray-700">
                <li>Commandités : doivent être commerçants, responsables indéfiniment et solidairement des dettes sociales.</li>
                <li>Commanditaires : responsabilité limitée à leurs apports ; seule la capacité civile est exigée.</li>
                <li>-Capital social : aucun minimum légal.</li>
            </ul>

            <p class="mt-2 font-medium">Cession de parts :</p>
            <ul class="list-disc list-inside">
                <li>En principe, consentement unanime de tous les associés.</li>
                <li>Les statuts peuvent prévoir des régimes spécifiques selon le type d’associé et le bénéficiaire.</li>
                <li>Toute cession non conforme est nulle (art. 296 AUSCOM).</li>
                <li>La cession doit être écrite et suivie des formalités de publicité (art. 297 AUSCOM).</li>
            </ul>

            <p class="mt-2 font-medium">Gérance:</p>
            <ul class="list-disc list-inside">
                <li>Seuls les commandités peuvent être gérants (art. 298 AUSCOM).</li>
                <li>Si un commanditaire accomplit un acte de gestion externe, il devient responsable indéfiniment et solidairement pour cet acte (art. 300).</li>
                <li>Les gérants sont nommés et révoqués selon les mêmes règles que dans une SNC.</li>
                <li>La révocation doit être justifiée.</li>
            </ul>

            <p class="mt-2 font-medium">Décisions collectives:</p>
            <ul class="list-disc list-inside">
                <li>Portent sur les actes hors compétence du gérant (art. 302).</li>
                <li>Peuvent être prises en assemblée ou par consultation écrite.</li>
                <li>Les règles de quorum et de majorité sont fixées librement dans les statuts, sauf pour l’assemblée générale annuelle.</li>
                <li>L’AG annuelle doit se tenir dans les 6 mois suivant la clôture des comptes pour approuver les états financiers (art. 306).</li>
                <li>Elle est convoquée 15 jours à l’avance et présidée par l’associé ayant le plus de parts.</li>
                <li>Majorité requise : au moins la moitié du capital social.</li>
                <li>Toute violation de ces règles rend la délibération nulle.</li>
            </ul>

            <p class="mt-2 font-medium">Contrôle:</p>
            <ul class="list-disc list-inside">
                <li>Exercice d’un contrôle par les associés non gérants : droit à l’information, procédure d’alerte, expertise.</li>
                <li>Un commissaire aux comptes est obligatoire si les seuils légaux sont atteints (comme pour la SNC).</li>
                <li>Hors seuils, la nomination est facultative, sauf demande judiciaire par au moins 1/10 du capital.</li>
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

            <p class="font-semibold underline">Les causes particulières de dissolution de la SCS </p>

            <ul class="list-disc list-inside mt-2">
                <li>Décès d’un commandité, sauf clause statutaire contraire ; les héritiers mineurs deviennent commanditaires.</li>
                <li>Décision des associés.</li>
                <li>Mésentente entre associés.</li>
                <li>Disparition de l’objet social.</li>
                <li>Annulation du contrat de société.</li>
                <li>Absence de remplacement du commandité unique dans l’année suivant son décès.</li>
            </ul>

            <p class="mt-3 font-medium">Effets :</p>
            <ul class="list-disc list-inside">
                <li>Liquidation des actifs.</li>
                <li>Partage entre les associés..</li>
            </ul>
        </div>

    </section>
</div>
@section('content')
