@extends('layouts.app')

@section('title', 'Association')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

        <!-- INTRODUCTION -->
        <section class="bg-white rounded-xl shadow p-6 mb-10">
            <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            ASSOCIATION
            </h1>
            


            <h2 class="text-lg font-semibold underline mb-2">➤ Définition d'Association</h2>
           
            <ul>
               Une association est une convention par laquelle deux personnes ou plus mettent en commun, de façon permanente, leurs connaissances, leurs activités ou leurs ressources, dans un but autre que de partager des bénéfices.
               Elle est régie par la loi n°60-315 du 21 septembre 1960 relative aux associations.
            </ul>


            <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques d'une Association</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>But : Non lucratif, souvent social, culturel, éducatif, sportif, religieux…</li>
                <li>Nombre minimum de membres : 2 personnes majeures (ou 1 personne morale et 1 physique)</li>
                <li>Forme juridique : Personne morale de droit privé une fois déclarée</li>
                <li>Siège : Obligatoire, avec justificatif de domiciliation</li>
                <li>En Côte d’Ivoire, il y a deux cas :
                    <ol>
                        <li>Association non déclarée :
                            <ul>
                                <li>Existe de fait, mais n’a pas la personnalité juridique.</li>
                            </ul>
                        </li>
                    </ol>
                </li>
                <li>Ne peut ni signer de contrat, ni posséder de biens, ni ester en justice.</li>
                <li>Association déclarée (reconnue) :
                    <ul>
                        <li>Doit faire une demande d’autorisation au Ministère de l’Intérieur (Direction des libertés publiques).</li>
                        <li>Obtient un récépissé de déclaration, et devient une personne morale reconnue.</li>
                    </ul>
                </li>

            </ul>
        </section>

        <!-- TABLEAU DES COLONNES -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- CONSTITUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

                <h4 class="font-semibold underline">Documents à fournir pour la reconnaissance</h4>
                <ul class="list-disc list-inside text-gray-700">
                   <li>Lettre de demande d’autorisation</li>
                   <li>Statuts signés par les membres fondateurs</li>
                   <li>Procès-verbal de l’Assemblée constitutive</li>
                   <li>Liste des membres du bureau (avec pièces d’identité)</li>
                   <li>Certificat de résidence ou plan de localisation</li>
                   <li>Justificatif de siège social</li>
                   <li>Fiche de renseignement fournie par l’administration</li>
                </ul>


                <p class="mt-2 font-medium">Etapes de création:</p>
                <ul class="list-disc list-inside">
                    <li>Rassemblement des membres : Minimum 2 personnes majeures (nationalité ivoirienne ou étrangère)</li>
                    <li>Rédaction des statuts : Dénomination, objet, siège, durée, composition, mode de fonctionnement, ressources</li>
                    <li>Assemblée constitutive : Adoption des statuts + élection du bureau</li>
                    <li>Dossier de demande d’autorisation : À déposer à la Direction des libertés publiques (Ministère de l’Intérieur)</li>
                    <li>Délivrance du récépissé : Après étude du dossier et vérification de conformité</li>
                </ul>
            </div>

            <!-- FONCTIONNEMENT -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

                <p class="font-semibold underline">Organes</p>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Assemblée Générale (AG) : Souveraine. Adopte les rapports, élit le bureau, modifie les statuts</li>
                    <li> Bureau exécutif : Dirige l’association au quotidien : président, SG, trésorier, etc.</li>
                    <li>Commissions (facultatif) : Pour des activités spécifiques : finances, projets, événements...</li>
                </ul>

                <p class="mt-3 font-medium">Obligations: </p>
                <ul class="list-disc list-inside">
                   <li>Tenue de registres comptables</li>
                   <li>Rédaction annuelle d’un rapport moral et financier</li>
                   <li>Réunions régulières de l’AG et du bureau (au moins une fois par an)</li>
                   <li>Respect strict de l’objet social déclaré</li>

                </ul>
            </div>

            <!-- DISSOLUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

                <p class="font-semibold mt-4 underline">Dissolution administrative</p>
                <ul class="list-disc list-inside mt-2">
                    <li>Peut être décidée par le Ministre de l’Intérieur ou le tribunal :</li>
                    <li>En cas d’activités contraire à l’ordre public</li>
                    <li>Pour dérives politiques ou sectaires</li>
                    <li>Si l’association devient un instrument de trouble ou de fraude</li>

                </ul>

                 <p class="font-semibold mt-4 underline">Dissolution volontaire</p>
                <ul class="list-disc list-inside mt-2">
                    <li>Désignation d’un liquidateur : Pour vendre les biens, solder les comptes</li>
                    <li>Rédaction d’un PV de dissolution : À déposer à la préfecture ou au Ministère</li>
                    <li>Affectation des biens : À une association poursuivant le même but ou à une œuvre sociale (interdiction de répartition entre membres)</li>
                </ul>
            </div>

        </section>
</div>
@endsection

