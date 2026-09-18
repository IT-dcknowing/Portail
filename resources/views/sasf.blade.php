@extends('layouts.app')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

    <!-- INTRODUCTION -->
    <section class="bg-white rounded-xl shadow p-6 mb-10">
        <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
         LA SOCIETE PAR ACTIONS SIMPLIFIEE (SAS) 
        </h1>

        <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la SAS</h2>
        <p class="mb-4">
            La société par actions simplifiée est une société commerciale instituée par un ou plusieurs associés et dont les statuts prévoient librement l’organisation et le fonctionnement de la société sous réserve des règles impératives du présent livre.</p>
        <p class="mb-4">Les associés de la société par actions simplifiée ne sont responsables des dettes sociales qu’à concurrence de leurs apports et dont les droits sont représentés par des actions (article 853-1 nouveau AUSC).</p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques de la SAS</h2>
        <ul class="list-disc list-inside space-y-1">
            <li>La SAS est plus souple dans son organisation et son fonctionnement que la SA.</li>
            <li>Les associés sont responsables des dettes sociales qu’à concurrence de leurs apports.</li>
            <li>Plusieurs dispositions de la SA sont applicables à la SAS (à l’exception des articles 387 alinéa 1, 414 à 561, 690, 751 à 753 AUSCOM)</li>
            <li>Le capital social minimum et le nominal des actions est librement fixé par les statuts.</li>
            <li>Pas d’obligation de nomination de Commissaires aux comptes en principe</li>
        </ul>
    </section>

    <!-- TABLEAU DES COLONNES -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CONSTITUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

            <h4 class="font-semibold underline">Les conditions de fond</h4>
            <p class="mt-2 font-medium">Associés:</p>
            <ul class="list-disc list-inside text-gray-700">
                <li>Une ou plusieurs personnes physiques ou morales, sans limitation maximale.</li>
                <li>Les époux peuvent être associés.</li>
            </ul>


            <p class="mt-2 font-medium">Apports:</p>
            <ul class="list-disc list-inside">
                <li>En numéraire : Obligation de libération d'au moins 1/4 lors de la souscription, le reste dans les 3 ans suivant l’immatriculation.</li>
                <li>Publicité : Formalités obligatoires sous peine de nullité.</li>
            </ul>

            <p class="mt-2 font-medium">En nature :</p>
            <ul class="list-disc list-inside">
                <li>Apports en biens autres que de l’argent.</li>
            </ul>

            <p class="mt-2 font-medium">En industrie :</p>
            <ul class="list-disc list-inside">
                <li>Apports de compétences ou de services.</li>
            </ul>

            <p class="mt-2 font-medium">Restrictions :</p>
            <ul class="list-disc list-inside">
                <li>Interdiction de faire appel public à l’épargne.</li>
                <li>Pas de montant minimum pour le capital social, fixé librement dans les statuts (capital variable possible).</li>
                <li>Actions librement cessibles, sauf clauses d'inaliénabilité ou d'agrément.</li>
            </ul>

            <p class="mt-2 font-medium">Dénomination sociale :</p>
            <ul class="list-disc list-inside">
                <li>Doit inclure "Société par actions simplifiée" ou "SAS".</li>
                <li>Pas de montant minimum pour le capital social, fixé librement dans les statuts (capital variable possible).</li>
                <li>Actions librement cessibles, sauf clauses d'inaliénabilité ou d'agrément.</li>
            </ul>

            <p class="mt-2 font-medium">Responsabilité :</p>
            <ul class="list-disc list-inside">
                <li>Les associés ne sont responsables des dettes qu'à hauteur de leurs apports.</li>
            </ul>

            <p class="mt-2 font-medium">Formalités de constitution:</p>
            <ul class="list-disc list-inside">
                <li>Identiques à celles des sociétés anonymes ne faisant pas appel public à l’épargne.</li>
            </ul>

            <p class="mt-2 font-medium">Statuts:</p>
            <ul class="list-disc list-inside">
                <li>Doivent inclure : Les mentions de l’article 13 de l’AUSCOM.</li>
                <li>Mode d’administration.</li>
                <li>Identification (noms, prénoms, adresse, professions, nationalité) du premier président et des dirigeants.</li>
                <li>Modalités de fonctionnement et organisation de la société.</li>
                <li>Ces points résument les exigences pour la création d'une SAS. Si vous avez d'autres questions ou si vous souhaitez des détails supplémentaires, n'hésitez pas à demander !</li>
            </ul>
            
        </div>

        <!-- FONCTIONNEMENT -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

            <p class="font-semibold underline">Organisation</p>
            <p class="mt-2 font-medium">Direction :</p>
            <ul class="list-disc list-inside">
                <li>La société est gérée selon les conditions fixées dans les statuts.</li>
                <li>Obligatoirement représenté par un Président, désigné selon les statuts.</li>
                <li>Le Président peut être assisté par d'autres dirigeants et un organe de surveillance.</li>
            </ul>

            <p class="mt-2 font-medium">Décisions collectives
                Prise de Décisions : 
                :</p>
            <ul class="list-disc list-inside">    
                <li>Les statuts déterminent les décisions à prendre collectivement et les règles de convocation, quorum et majorité.</li>
                <li>Les décisions contraires aux clauses statutaires sont nulles.</li>
                <li>Unanimité requise pour certaines décisions importantes (désignation de commissaire aux apports, fusion, modification des statuts).</li>
            </ul>

            <p class="mt-2 font-medium">Commissaire aux comptes
                Désignation : 
                </p>
            <ul class="list-disc list-inside">
                <li>Généralement non obligatoire, mais devient obligatoire si 2/3 des condition.</li>
            </ul>

            <p class="mt-2 font-medium">suivantes sont remplies :</p>
            <ul class="list-disc list-inside">
                <li>Total du bilan > 125.000.000 CFA.</li>
                <li>Chiffre d'affaires > 250.000.000 CFA.</li>
                <li>Effectif permanent > 50 personnes.</li>
            </ul>
        </div>

        <!-- DISSOLUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>
            <p class="font-semibold underline">Les causes particulières de dissolution de la SAS</p>
            <ul class="list-disc list-inside mt-2">
                <li>La non-tenue de la réunion de L’assemblée des associés en cas de perte de la moitié du capital social (art.667)</li>
            </ul>

            <p class="mt-2 font-medium">Les effets</p>
            <ul class="list-disc list-inside">
                <li>la liquidation</li>
                <li>l’opération de partage.</li>
            </ul>
        </div>

    </section>
</div>
@endsection
