@extends('layouts.app')

@section('title', 'Entreprise Individuelle (EI)')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-gray-800 text-sm">

        <!-- INTRODUCTION -->
        <section class="bg-white rounded-xl shadow p-6 mb-10">
            <h1 class="text-2xl font-bold text-center text-gray-900 uppercase mb-2">
            ENTREPRISE INDIVIDUELLE (EI)
            </h1>


            <h2 class="text-lg font-semibold underline mb-2">➤ Définition d'une Entreprise Individuelle</h2>
            <ul>
                <li>L’entreprise individuelle est une entreprise en nom propre qui ne dispose pas de la personnalité morale. Elle n’a donc aucun droit ni devoir spécifique. L’entrepreneur et l'entreprise constituent une seule et même entité sur le plan juridique.</li>
                <li>Elle est régie par l’Acte uniforme OHADA relatif au droit commercial général, notamment en ses dispositions sur les commerçants, les formalités d’immatriculation et la tenue du Registre du Commerce et du Crédit Mobilier (RCCM)</li>
            </ul>


            <h2 class="text-lg font-semibold underline mb-2">➤ Caractéristiques d'une EI</h2>
            <ul class="list-disc list-inside space-y-1">
                <li>La constitution d’une entreprise individuelle est très simple et les coûts de constitution sont très faibles dans la plupart des Pays OHADA</li>
                <li>Il n’est pas nécessaire d’accomplir de lourdes formalités (pas de statuts à rédiger, pas d’ouverture de compte bancaire, etc.)</li>
                <li>En plus, aucun capital social n’est à libérer (L’entrepreneur n’a pas besoin de déposer de l’argent à la banque) et il suffit de déposer un simple dossier de constitution au guichet des formalités d’entreprise</li>
                <li>L’entrepreneur individuel n’est pas soumis à l’obligation de tenue d’assemblée générale ni au dépôt des comptes sociaux.</li>
                <li>Il demeure toutefois assujetti à certaines obligations fiscales et comptables.</li>
                <li>L’entrepreneur exerce seul le pouvoir de décision : il n’a de compte à rendre à aucun organe collégial.</li>
                <li>L’entreprise individuelle garantit une pleine autonomie de gestion, contrairement aux sociétés où les pouvoirs sont partagés.</li>
                <li>Absence de personnalité morale : le patrimoine de l’entreprise est juridiquement confondu avec celui de l’entrepreneur.</li>
                <li>L’infraction d’abus de biens sociaux ne s’applique pas, faute de dualité entre personne morale et entrepreneur</li>
                <li>L’exploitant individuel est entièrement responsable de toutes les dettes et obligations liées à son entreprise.</li>
            </ul>
        </section>

        <!-- TABLEAU DES COLONNES -->
        <section class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- CONSTITUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-indigo-700">CONSTITUTION</h3>
                 <ul class="list-disc list-inside space-y-1">
                <li>Être majeur</li>
                <li>Être de nationalité ivoirienne ou étrangère en situation régulière</li>
                <li>Ne pas être interdit de gérer ou exercer une activité commerciale</li>
                <li>Formulaire unique dûment rempli</li>
                <li>Déclaration sur l'honneur du ou des gérants</li>
                <li>Certificat de résidence (original)</li>
                <li>Contrat de bail ou attestation de domiciliation (2 originaux) ou titre de propriété</li>
                <li>Plan de localisation (dessin à main levée avec une croix pour le siège social)</li>
                <li>Pièce d’identité</li>
                <li>Soit un extrait d’acte de mariage</li>
                <li>Soit une copie de la page des conjoints du livret de famille (mariés)</li>
            </ul>
                
            </div>

            <!-- FONCTIONNEMENT -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-green-700">FONCTIONNEMENT</h3>
                
                <p class="mb-2">Documents nécessaires:</p>
                <ul class="list-disc list-inside text-gray-700">
                   <li>L'entrepreneur doit s'enregistrer au Registre du Commerce et du Crédit Mobilier (RCCM) et obtenir un Numéro de Compte Contribuable (NCC).</li>
                   <li>Il est conseillé de se faire accompagner par le CEPICI (Centre de Promotion des Investissements en Côte d'Ivoire) pour les formalités.</li>
                </ul>
            </div>

            <!-- DISSOLUTION -->
            <div class="bg-white shadow-md rounded-xl p-5">
                <h3 class="text-lg font-bold text-center mb-4 text-red-700">DISSOLUTION</h3>
                
                <ul class="list-disc list-inside">
                    <li>L’entrepreneur décide de cesser l’activité
                    <ul>
                        <li>Déclaration de cessation d’activité</li>
                        <li>Radiation fiscale + paiement des impôts dus</li>
                        <li>Déclaration de cessation auprès du centre des impôts</li>
                        <li>Paiement des éventuels impôts dus jusqu’à la date d’arrêt</li>
                        <li>Obtenir un certificat de radiation fiscale</li>
                        <li>Radiation définitive du registre</li>
                    </ul>
                </ul>
            </div>

        </section>
</div>
@endsection