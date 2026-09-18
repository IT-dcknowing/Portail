@extends('layouts.app')

@section('title', 'SNCF - Société en Nom Collectif')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

    <!-- INTRODUCTION -->
    <section class="bg-white rounded-xl shadow p-6 mb-10">
        <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
         Societe en Nom Collectif (SNC) 
        </h1>


        <h2 class="text-lg font-semibold underline mb-2">➤ Définition de la SNC</h2>
        <p class="mb-4">
            Selon l’article 270 de l’AUSCOM, la SNC est une société commerciale dans laquelle tous les associés sont commerçants et répondent indéfiniment et solidairement des dettes sociales.
        </p>

        <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques du SNC</h2>
        <ul class="list-disc list-inside space-y-1">
            <li>La SNC est une société commerciale par la forme</li>
            <li>Tous ses associés ont la qualité de commerçant</li>
            <li>La responsabilité des associés est indéfinie et solidaire</li>
        </ul>
    </section>

    <!-- TABLEAU DES COLONNES -->
    <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- CONSTITUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>

            <p class="mt-2 font-medium">Conditions de fond</p>
            <ul class="list-disc list-inside">
                <li>Nombre minimum d’associés : au moins deux.</li>
                <li>Consentement libre et sans vice : sinon, la société peut être annulée.</li>
            </ul>

            <ul>
                <li>Capacité commerciale obligatoire : les associés sont indéfiniment et solidairement responsables, mais seulement après défaillance de la société -(art. 271 AUSCOM).</li>
                <li>Capital social : aucun minimum légal ; fixé librement par les associés et divisé en parts de valeur égale (art. 273).</li>
                <li>Types d’apports autorisés : numéraire, nature (évalué par les associés), et industrie.</li>
                <li>Cession de parts sociales : doit être acceptée à l’unanimité ; sinon, elle est nulle (art. 274).</li>
                <li>Opposabilité de la cession : soumise à des formalités (signification, dépôt au siège, publication au RCCM).</li>
                <li>Objet social : doit être clairement défini.</li>
            </ul>

            <p class="mt-2 font-medium">Conditions de forme</p>

            <ul class="list-disc list-inside">
                <li>Rédaction et signature des statuts (art. 276).</li>
                <li>Publicité obligatoire : sous peine de nullité (art. 245).</li>
            </ul>

        </div>

        <!-- FONCTIONNEMENT -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>


                <p class="mt-2 font-medium">Le(s) Gérant(s) de la SNC</p>
                
                    <li>Peut-être une ou plusieurs personnes physiques ou morales, désignées dans les statuts ou par acte ultérieur.</li>
                    <li>Si le gérant est une personne morale, son représentant assume les fonctions avec les mêmes responsabilités civiles et pénales (art. 276).</li>
                    <li>À défaut de désignation, tous les associés sont réputés gérants.</li>
                

                <p class="mt-2 font-medium">
                    Révocation :
                    <li>Nommé dans les statuts : révocation à l’unanimité.</li>
                    <li>Nommé hors statuts : révocation à la majorité en nombre et en capital (art. 280 al. 2).</li>
                    <li>Dans tous les cas, révocation pour justes motifs, sinon indemnisation du gérant (art. 281)</li>
                </p>

                <p class="mt-2 font-medium">
                    Rémunération :
                    <li>Fixée par les associés à la majorité, sauf disposition contraire (art. 278).</li>
                    <li>Pouvoirs : déterminés par les statuts, sinon pouvoir général de gestion ; vis-à-vis des tiers, le gérant engage la société pour tout acte conforme à l’objet social. Les limitations statutaires ne sont pas opposables aux tiers de bonne foi (art. 277).</li>
                    <li>Responsabilité : civile, pénale ou personnelle (ex : comblement du passif, interdiction de gérer, faillite perso).</li>
                </p>
                <p class="mt-2 font-medium">
                    <li>Les Décisions Collectives:</li>
                    <li>Relèvent des associés pour les actes hors champ de compétence du gérant (art. 283).</li>
                    <li>Peuvent être prises en assemblée ou par consultation écrite.</li>
                    <li>Règles de majorité et de quorum : fixées librement par les statuts.</li>
                    <li>Convocation : par le gérant, 15 jours à l’avance, par lettre, fax ou mail (avec accord écrit préalable) (art. 286).</li>
                    <li>Assemblée générale annuelle : obligatoire dans les 6 mois suivant la clôture de l’exercice. Approuve les comptes (art. 288 al. 1).</li>
                    <li>Nécessite la présence de la moitié du capital.</li>
                    <li>Présidée par l’associé ayant le plus de parts.</li>
                    <li>Toute violation des règles de tenue = nullité (art. 288 al. 3).</li>
                </p>

                <p class="mt-2 font-medium">
                    <li>Le Contrôle de la SNC</li>
                    <li>Assuré d’abord par les associés non gérants via :</li>
                    <li>Droit à l’information</li>
                    <li>Procédure d’alerte</li>
                    <li>Expertise de gestion (art. 289)</li>
                    <li>Ensuite par un commissaire aux comptes, obligatoire si 2/3 des conditions suivantes sont remplies :</li>
                    <li>Bilan > 250 millions FCFA</li>
                    <li>CA > 500 millions FCFA</li>
                    <li>Effectif permanent > 50 personnes (art. 289-1)</li>
                    <li>Hors ces seuils, nomination facultative sauf si 1/10 du capital social en fait la demande en justice.</li>
                </p> 
        </div>

        <!-- DISSOLUTION -->
        <div class="bg-white shadow-md rounded-xl p-5">
            <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>

            <ul>
                <p class="mt-2">Dissolution et effets dans une SNC</p>
                <li>Causes particulières de dissolution</li>
                <li>Décès d’un associé (sauf clause de continuation dans les statuts)</li>
                <li>Faillite, incapacité ou interdiction commerciale d’un associé (sauf stipulation contraire ou décision unanime des autres)</li>
                <li>Décision des associés</li>
                <li>Mésentente grave entre associés</li>
                <li>Arrivée du terme de la société</li>
                <li>Disparition de l’objet social</li>
                <li>Annulation du contrat de société</li>
                <li>Autres causes prévues par les statuts</li>
                <li>Effets de la dissolution</li>
                <li>Liquidation des biens sociaux</li>
                <li>Partage du reliquat entre les associés</li>  
            </ul>
        </div>
    </section>
</div>
@endsection
