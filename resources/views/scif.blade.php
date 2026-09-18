@extends('layouts.app')

@section('title', 'Société Civile Immobilière (SCI)')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

        <!-- INTRODUCTION -->
        <section class="bg-white rounded-xl shadow p-6 mb-10">
            <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            Société Civile Immobilière (SCI)
            </h1>


            <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la SCI</h2>
            <p>
                En Côte d’Ivoire, la SCI est une forme juridique permettant à plusieurs personnes de détenir, gérer et transmettre ensemble un ou plusieurs biens immobiliers, dans un cadre souple mais juridiquement encadré.
                Une Société Civile Immobilière est une société civile constituée par deux ou plusieurs personnes (physiques ou morales), dans le but d’acquérir, posséder, gérer, louer ou transmettre des biens immobiliers, sans but commercial direct.
            </p>
            <p>Elle est régie principalement par :</p>
            <ul>
                <li>L’Acte uniforme OHADA sur les sociétés (notamment les dispositions sur les sociétés civiles),</li>
                <li>Le Code civil ivoirien pour les règles générales,</li>
                <li>Et les textes fiscaux pour son régime d’imposition.</li>
            </ul>


            <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques de la SCI</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>Civil : acquisition, détention, gestion d’immeubles</li>
                <li>Nombre d’associés : Minimum 2, pas de maximum légal</li>
                <li>Capital social : Librement fixé par les associés (numéraire ou en nature)</li>
                <li>Durée de vie : Maximum 99 ans (sauf renouvellement)</li>
                <li>Responsabilité : Indéfinie mais non solidaire des associés (ils répondent sur leur patrimoine personnel, chacun pour sa part)</li>
                <li>Dirigeant : Gérant désigné dans les statuts ou par les associés</li>
            </ul>

            <p class="font-semibold underline">Régime fiscal</p>
            <ul class="list-disc list-inside text-gray-700">
                <li>En Côte d’Ivoire :</li>
                <li>La SCI n’est pas imposée directement si elle ne perçoit pas de revenus commerciaux.</li>
                <li>Les revenus fonciers sont imposés entre les mains des associés à proportion de leurs parts.</li>
                <li>Toutefois, si la SCI exerce une activité commerciale (location meublée, spéculation…), elle peut être assujettie à l’impôt sur les bénéfices industriels et commerciaux (BIC).</li>
            </ul>
        </section>

        <!-- TABLEAU DES COLONNES -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- CONSTITUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

                <h4 class="font-semibold underline">formalité de création</h4>
                <ul class="list-disc list-inside text-gray-700">
                   <li>Rédaction des statuts</li>
                   <li>Évaluation des apports (en nature ou en numéraire)</li>
                   <li>Nomination du ou des gérants</li>
                   <li>Enregistrement au CEPICI (Guichet Unique de création d’entreprise)</li>
                   <li>Obtention du RCCM (Registre du Commerce et du Crédit Mobilier)</li>
                   <li>Immatriculation fiscale</li>
                </ul>


                <p class="mt-2 font-medium">Conditions préalables:</p>
                <ul class="list-disc list-inside">
                    <li>Nombre d’associés : au minimum 2 (personnes physiques ou morales)</li>
                    <li>Objet social : exclusivement civil, généralement la gestion ou l’acquisition de biens immobiliers</li>
                    <li>Capital social : librement fixé, en numéraire ou en nature</li>
                    <li>Responsabilité : indéfinie mais non solidaire (chacun répond à hauteur de sa part)</li>
                </ul>
            </div>

            <!-- FONCTIONNEMENT -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>

                <p class="font-semibold underline">Le Gérant</p>
                <ul class="list-disc list-inside text-gray-700">
                    <li>Nommé par les statuts ou les associés</li>
                    <li>Représente légalement la SCI</li>
                    <li>Gère l’exploitation courante, les baux, les paiements, les déclarations fiscales</li>
                </ul>

                
                <p class="mt-3 font-medium">Les Associés: </p>
                <ul class="list-disc list-inside">
                    <li>Se réunissent en Assemblée Générale</li>
                    <li>Prennent les grandes décisions : cession de parts, emprunt, changement de gérant, modification des statuts</li>

                </ul>

                <p class="mt-3 font-medium">Obligations administratives: </p>
                <ul class="list-disc list-inside">
                   <li>Tenue de comptes réguliers</li>
                   <li>Rédaction de procès-verbaux pour les grandes décisions</li>
                   <li>Déclaration annuelle d’impôt, même en l’absence de revenus</li>

                </ul>

                <p class="mt-3 font-medium">Fiscalité</p>
                <ul class="list-disc list-inside">
                    <li>Si l’activité est non commerciale (location nue, détention passive) : imposition au niveau des associés</li>
                    <li>Si activité commerciale (location meublée, achat-revente) : SCI imposée comme une société commerciale</li>

                </ul>

            </div>

            <!-- DISSOLUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

                <p class="font-semibold mt-4 underline">Causes possibles</p>
                <ul class="list-disc list-inside mt-2">
                    <li>Expiration de la durée de vie (99 ans maximum)</li>
                    <li>Réalisation ou extinction de l’objet social</li>
                    <li>Décision unanime ou majorité statutaire des associés</li>
                    <li>Faillite, mésentente grave, liquidation judiciaire</li>
                </ul>

                <p>Procédure de dissolution volontaire</p>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                         <thead class="table-dark">
                            <tr>
                                <th class="col-4">Étapes</th>
                                <th class="col-8">Details</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="fw-semibold">Convocation d’une AG extraordinaire….</td>
                                <td>Pour voter la dissolution</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Rédaction du PV de dissolution……..</td>
                                <td>Désignation d’un liquidateur</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Publication légale…….</td>
                                <td>Annonce dans un journal d’annonces légales</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Liquidation des biens…</td>
                                <td>Vente, règlement des dettes, répartition du solde entre associés</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Dépôt du rapport de liquidation……….</td>
                                <td>Au registre du commerce (RCCM)</td>
                            </tr>
                            <tr>
                                <td class="fw-semibold">Radiation de la société….</td>
                                <td>Clôture officielle au RCCM et au fisc</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
</div>
@endsection