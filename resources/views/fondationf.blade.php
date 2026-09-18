@extends('layouts.app')
@section('title', 'Fondation')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

        <!-- INTRODUCTION -->
        <section class="bg-white rounded-xl shadow p-6 mb-10">
            <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            Fondation
            </h1>


            <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la Fondation</h2>
            <ul>
                <li>Une fondation est un acte juridique par lequel une ou plusieurs personnes, physiques ou morales, affectent irrévocablement des biens, droits ou ressources à la réalisation d’une œuvre d’intérêt général, à but non lucratif.</li>
                <li>Elle est généralement créée pour des actions culturelles, sociales, éducatives, environnementales, scientifiques ou caritatives, et fonctionne avec une dotation initiale (fonds de départ).</li>
            </ul>


            <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques de la SCI</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Fondateurs : Personnes physiques ou morales (particuliers, entreprises, institutions…)</li>
                <li>But : Strictement d’intérêt général, sans but lucratif ni partage de bénéfice</li>
                <li>Acte fondateur : Décision unilatérale ou convention pluri-personnelle déposée auprès de l’autorité compétente</li>
                <li>Dotation initiale : Obligatoire (montant fixé selon la loi ou l’usage local)</li>
                <li>Durée : Déterminée ou illimitée</li>
                <li>Gouvernance : Conseil de gestion ou conseil d’administration, selon les statuts</li>
            </ul>
        </section>

        <!-- TABLEAU DES COLONNES -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- CONSTITUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">Documents à fournir</h3>

                <ul class="list-disc list-inside text-gray-700">
                    <li>Lettre de demande d’autorisation adressée au Ministre de l’Intérieur</li>
                    <li>Acte constitutif ou statuts signés</li>
                    <li>Description précise de l’objet de la fondation</li>
                    <li>Justificatif de la dotation initiale (attestation bancaire, acte notarié, etc.)</li>
                    <li>Liste des membres du conseil de gestion</li>
                    <li>Pièces d’identité du ou des fondateurs</li>
                    <li>Preuve du siège social</li>
                    <li>L’administration peut demander des garanties sur la pérennité financière du projet.</li>
                </ul>
            </div>

            <!-- FONCTIONNEMENT -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

                <ul class="list-disc list-inside text-gray-700">
                    <li><strong>Le Conseil d’administration ou Conseil de gestion</strong> : Pilote les grandes orientations, valide les budgets</li>
                    <li><strong>Le Directeur exécutif / Secrétaire général</strong> : Gère au quotidien, rend compte au conseil</li>
                    <li><strong>Les Comités spécialisés (facultatifs)</strong> : Suivi des projets, finances, éthique, etc.</li>

                </ul>

                
                <p class="mt-3 font-medium">Obligations légales: </p>
                <ul class="list-disc list-inside">
                    <li>Tenue de la comptabilité (livres de compte, bilan, etc.)</li>
                    <li>Rapport d’activités annuel à présenter au conseil et, selon le cas, à l’État</li>
                    <li>Respect strict de l’objet statutaire (pas d’activité commerciale sauf accessoire)</li>
                    <li>Interdiction de distribuer les bénéfices</li>
                    <li>Affectation des ressources exclusivement à l’œuvre fondée</li>
                </ul>

                <p class="mt-3 font-medium">Sources de financement: </p>
                <ul class="list-disc list-inside">
                     <li>Dotation initiale (capital placé ou mobilisé)</li>
                    <li>Dons et legs</li>
                    <li>Subventions publiques ou privées</li>
                    <li>Revenus du patrimoine (intérêts, loyers…)</li>
                    <li>Activités accessoires licites et non lucratives</li>
                </ul>

            </div>

            <!-- DISSOLUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

                <p class="font-semibold mt-4 underline">Dissolution administrative ou judiciaire</p>
                <ul class="list-disc list-inside mt-2">
                  <li> Décidée par :</li>
                    <li>Le Ministère de l’Intérieur, en cas de dérives graves, détournement, inactivité prolongée</li>
                    <li>Un tribunal, en cas de conflit, insolvabilité, non-respect de l’objet</li>
                </ul>

                <p class="font-semibold mt-4 underline">Dissolution volontaire</p>
                <ul class="list-disc list-inside mt-2">
                  <li>Peut intervenir si :</li>
                  <li>L’objet de la fondation a été atteint ou devient irréalisable</li>
                  <li>Le fondateur (ou le conseil) décide d’y mettre fin dans le respect des statuts</li>
                </ul>

                <p class="font-semibold mt-4 underline">Procédure :</p>
                <ul class="list-disc list-inside mt-2">
                    <li>Réunion du conseil d’administration ou du comité fondateur</li>
                    <li>Rédaction d’un procès-verbal de dissolution</li>
                    <li>Nomination d’un liquidateur</li>
                    <li>Clôture des comptes et liquidation des biens</li>
                    <li>Affectation du solde à une autre œuvre d’intérêt général (interdiction de partage entre membres ou fondateurs)</li>
                    <li>Déclaration de dissolution aux autorités administratives</li>
                </ul>
            </div>

        </section>
</div>
@endsection