@extends('layouts.app')

@section('title', 'ONGF - Organisation Non Gouvernementale à But Non Lucratif')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

    <!-- INTRODUCTION -->
    <section class="bg-white rounded-xl shadow p-6 mb-10">
            <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            Organisation Non Gouvernementale (ONG)
            </h1>

            
            <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la ONG</h2>
            <p>Une ONG est une organisation à but non lucratif, indépendante des gouvernements, qui œuvre dans des domaines variés tels que l'humanitaire, le développement, l'environnement, la santé, l'éducation, les droits humains, etc. Son but n'est pas de réaliser des bénéfices.</p>
        
        <p>L'Organisation Non Gouvernementale est régie par la loi Ivoirienne n° 60-315 du 21 septembre 1960 relative aux associations. Ainsi, en l'état actuel du droit ivoirien, l'ONG est une association à but non lucratif, qui ne relève ni de l'État, ni d'institutions internationales. Les ONG sont définies par certains critères dont les principaux sont les suivants :</p>
        
        <ul>
            <li>Le but non lucratif de son action ;</li>
            <li>L'indépendance financière ;</li>
            <li>L'indépendance politique ;</li>
            <li>La notion d'intérêt public.</li>
        </ul>
        
        <p>Elle est une personne morale agissant au plan national ou international.</p>

                <h3>Caractéristiques des ONG</h3>
            
            <ul class="list-disc pl-5 mb-6">
                <li class="mb-2">
                    <strong>Non étatique :</strong> Elle ne dépend pas directement d’un gouvernement, même si elle peut recevoir des financements publics.
                </li>
                
                <li class="mb-2">
                    <strong>Non lucrative :</strong> Son objectif n’est pas de faire des bénéfices, mais d’agir pour l’intérêt général ou collectif.
                </li>
                
                <li class="mb-2">
                    <strong>Indépendante :</strong> Elle conserve une autonomie d’action, de pensée et de décision.
                </li>
                
                <li class="mb-2">
                    <strong>Volontariat :</strong> Elle fonctionne souvent grâce à l’engagement de bénévoles et de professionnels.
                </li>
                
                <li class="mb-2">
                    <strong>Légalité :</strong> Elle est reconnue juridiquement dans le pays où elle est créée, souvent sous le statut d’association.
                </li>
            </ul>

            <h3 class="mt-8 mb-4">Régime d’imposition des ONG</h3>
            
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="py-2 px-4 border-b text-left">Élément</th>
                            <th class="py-2 px-4 border-b text-left">Détail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">Type de fiscalité</td>
                            <td class="py-2 px-4 border-b">Exonérée sauf si activités lucratives</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">IS</td>
                            <td class="py-2 px-4 border-b">Non sauf en cas d’activités commerciales</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">TVA</td>
                            <td class="py-2 px-4 border-b">Exonération possible selon les projets</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Comptabilité</td>
                            <td class="py-2 px-4 border-b">Obligatoire pour transparence</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Autres taxes</td>
                            <td class="py-2 px-4 border-b">ITS sur salaires, droits d’enregistrement</td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </section>

    <!-- TABLEAU DES COLONNES -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CONSTITUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

            <h4 class="font-semibold underline">Les conditions de fond</h4>
            <ul class="list-disc list-inside text-gray-700">
               <li> Être au moins 7 membres fondateurs de nationalité ivoirienne ou étrangère (avec résidence légale en CI).</li>
               <li> Avoir un objet social non lucratif, tourné vers l’intérêt général : santé, éducation, environnement, droits humains, etc.</li>

            </ul>


            <p class="mt-2 font-medium">Documents à fournir :</p>
            <ul class="list-disc list-inside">
                <li>Demande d’agrément adressée au Ministre de l’Intérieur.</li>
                <li>Statuts de l’ONG (signés et paraphés par tous les membres fondateurs).</li>
                <li>Procès-verbal de l’assemblée constitutive.</li>
                <li>Liste des membres du bureau (noms, prénoms, nationalités, professions, adresses).</li>
                <li>Photocopies des pièces d’identité des membres du bureau.</li>
                <li>Extrait du casier judiciaire (moins de 3 mois) du président et du secrétaire général.</li>
                <li>Plan de localisation du siège.</li>
                <li>Justificatif de siège social (bail, attestation de domiciliation, etc.).</li>
                <li>Deux photos d’identité du président et du SG.</li>
                <li>Fiche de renseignement (modèle fourni par l’administration).</li>
                <li>Récépissé de versement des frais de dossier.</li>
                <li>Après réception, le dossier est instruit par les services du ministère.</li>
                <li>En cas de conformité, l’ONG obtient un récépissé d’agrément, condition nécessaire pour exister légalement et exercer.</li>
                <li>Le délai moyen est de 1 à 3 mois, mais... avec les vents de l’administration, mieux vaut prévoir une voile patiente.</li>
            </ul>

             <p class="mt-2 font-medium">Obligations après création:</p>
            <ul class="list-disc list-inside text-gray-700">
                <li>Tenue d’assemblées générales régulières.</li>
                <li>Soumission annuelle des rapports d’activités et financiers.</li>
                <li>Toute modification des statuts ou du bureau doit être déclarée à l’administration.</li>

            </ul>
        </div>

        <!-- FONCTIONNEMENT -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

            <p class="font-semibold underline">1-Assemblée Générale (AG)</p>
            <ul class="list-disc list-inside text-gray-700">
                <li>Le cœur souverain.</li>
                <li>Elle réunit tous les membres actifs de l’ONG.</li>
                <li>Elle prend les grandes décisions :</li>
                <ul>
                <li>Approbation des rapports moral et financier</li>
                <li>Élection ou révocation des membres du bureau</li>
                <li>Modification des statuts</li>
                <li>Dissolution éventuelle</li>
                </ul>
                <p>Elle se tient au moins une fois par an.</p>

            </ul>

            
            <p class="mt-3 font-medium">2-Bureau Exécutif </p>
            <ul class="list-disc list-inside">
                <li>Le bras opérationnel.</li>
                <li>Élu par l’AG pour une durée déterminée (selon les statuts).</li>
                <li>Il se compose généralement de :</li>
                <ul>
                    <li>Président(e)</li>
                    <li>Secrétaire général(e)</li>
                    <li>Trésorier(ère)</li>
                    <li>Et parfois des chargés de mission, coordonnateurs, etc.</li>
                </ul>
                <p>Rôle : piloter les activités, coordonner les projets, gérer les finances et représenter l’ONG légalement.</p>
            </ul>

            <p class="mt-3 font-medium">Obligations administratives </p>
            <p class="mt-3 font-medium">Tenue de documents obligatoires </p>
            <ul class="list-disc list-inside">
                <li>Livre de comptes</li>
                <li>Registre des membres</li>
                <li>PV d’AG et de réunions du bureau</li>
            </ul>

            <p class="mt-3 font-medium">Déclarations au Ministère de l’Intérieur</p>
            <ul class="list-disc list-inside">
                <li>Rapport d’activités annuel</li>
                <li>Rapport financier annuel</li>
                <li>Modification du bureau ou des statuts</li>
                <li>Changement d’adresse du siège</li>
            </ul>

            <p class="mt-3 font-medium">Gestion financière</p>
            <ul class="list-disc list-inside">
                <li>Sources de financement :</li>
                <li>Cotisations des membres</li>
                <li>Dons et legs</li>
                <li>Subventions de l’État ou de partenaires internationaux</li>
                <li>Revenus d’activités annexes (si non lucratives)</li>
            </ul>

            <p class="mt-3 font-medium">Principes :</p>
            <ul class="list-disc list-inside">
                <li>Transparence : tous les mouvements financiers doivent être justifiés.</li>
                <li>Non lucrativité : pas de bénéfices personnels ; tout est réinvesti dans l’objet social.</li>
                <li>Un compte bancaire au nom de l’ONG est conseillé (voire exigé par certains bailleurs).</li>
            </ul>

            <p class="mt-3 font-medium">Activités et projets:</p>
            <ul class="list-disc list-inside">
                <li>Organiser des campagnes de sensibilisation</li>
                <li>Monter des projets de développement</li>
                <li>Former, assister, soigner, accompagner...</li>
                <li>Mais toujours dans le cadre de son objet social déclaré. Toute activité sortant du périmètre statutaire est sujette à suspicion administrative.</li>
            </ul>

            <p class="mt-3 font-medium">Sanctions possibles en cas de manquement:</p>
            <ul class="list-disc list-inside">
                <li>Suspension temporaire</li>
                <li>Retrait de l’agrément</li>
                <li>Poursuites judiciaires en cas de fraude, de détournement ou de trouble à l’ordre public</li>
            </ul>

        </div>

        <!-- DISSOLUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

            <p class="font-semibold underline">1-Dissolution volontaire</p>
            <ul class="list-disc list-inside mt-2">
                <li>Décidée par l’Assemblée Générale selon les modalités prévues dans les statuts.</li>
                Motifs :
                <li>Mission accomplie</li>
                <li>Inactivité prolongée</li>
                <li>Difficultés financières</li>
                <li>Désintérêt des membres</li>
            </ul>

            <p class="font-semibold underline">2-Dissolution administrative</p>
            <ul class="list-disc list-inside mt-2">
                <li>Imposée par le Ministère de l’Intérieur ou un tribunal :</li>
                <li>Activités contraires à l’ordre public ou à la loi</li>
                <li>Dérives politiques, sectaires, ou financières</li>
                <li>Non-respect répété des obligations réglementaires</li>
            </ul>

            <p class="font-semibold underline">Procédure de dissolution volontaire</p>
            <ul class="list-disc list-inside mt-2">
                <li>Convocation de l’Assemblée Générale Extraordinaire (AGE)</li>
                <li>Selon les modalités statutaires (quorum, délai de convocation…)</li>
                <li>Objet : voter la dissolution</li>
            </ul>

             <p class="font-semibold underline">Vote de la dissolution</p>
            <ul class="list-disc list-inside mt-2">
                <li>Doit être consigné dans un Procès-Verbal de l’AGE</li>
                <li>Décision actée selon les règles prévues dans les statuts (ex. : majorité qualifiée)</li>
            </ul>

             <p class="font-semibold underline">Nomination d’un liquidateur</p>
            <ul class="list-disc list-inside mt-2">
                <li>L’AGE peut désigner une ou plusieurs personnes chargées de liquider les biens de l’ONG</li>
                <li>Règlement des dettes et liquidation des biens</li>
                <li>Paiement des dettes éventuelles</li>
                <li>Don ou transfert des biens restants à une structure poursuivant un objectif similaire</li>
                <li>Rédaction du rapport de liquidation</li>
                <li>Dépôt du dossier de dissolution</li>
                <li>À la Direction des libertés publiques (Ministère de l’Intérieur)</li>
            </ul>

            <p class="font-semibold underline">Documents à fournir pour la dissolution</p>
            <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td class="fw-semibold">Document………….</td>
                                <td>Contenu / Fonction</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Demande de……… dissolution</td>
                                <td>Lettre adressée au Ministre de l’Intérieur</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">PV de l’AG Extraordinaire…….</td>
                                <td>Décision de dissolution et désignation du liquidateur</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Rapport de liquidation………..</td>
                                <td>Bilan des biens, dettes et affectation finale</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Copie de la pièce d’identité du liquidateur………..</td>
                                <td>Comptes soldés, reçus</td>
                            </tr>
                        </tbody>
                    </table>
            </div>

            <p class="font-semibold underline">Conséquences juridiques</p>
            <ul class="list-disc list-inside mt-2">
                <li>L’ONG cesse d’exister légalement après l’acceptation officielle de la dissolution.</li>
                <li>Elle ne peut plus exercer ni recevoir de dons/subventions.</li>
                <li>Le liquidateur peut être tenu pour responsable en cas d’irrégularités dans la clôture.</li>
            </ul>
        </div>

    </section>
</div>
@endsection

