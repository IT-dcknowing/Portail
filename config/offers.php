<?php

/*
|--------------------------------------------------------------------------
| Offres DC-KNOWING — source de vérité pour l'assistant IA
|--------------------------------------------------------------------------
| Miroir serveur de OFFRES_DATA (landing page). Toute modification de
| prix/offre ici est injectée dans le prompt système du chat.
| Les offres Starter et Premium (création d'entreprise) sont retirées :
| seule l'Assistance à la formalisation subsiste pour la création.
*/

return [
    ['id' => 'essentielle', 'nom' => 'Formule Essentielle', 'prixMin' => 100000, 'prixMax' => 0, 'unite' => 'HT / mois'],
    ['id' => 'croissance', 'nom' => 'Formule Croissance', 'prixMin' => 250000, 'prixMax' => 0, 'unite' => 'HT / mois'],
    ['id' => 'premium', 'nom' => 'Formule Premium (DFE)', 'prixMin' => 1000000, 'prixMax' => 0, 'unite' => 'HT / mois'],
    ['id' => 'presta-diagnostic', 'nom' => 'Diagnostic Initial de Gestion', 'prixMin' => 100000, 'prixMax' => 0, 'unite' => 'HT à partir de'],
    ['id' => 'presta-formalisation', 'nom' => 'Assistance à la Formalisation', 'prixMin' => 150000, 'prixMax' => 500000, 'unite' => 'HT'],
    ['id' => 'presta-etats-financiers', 'nom' => 'États Financiers Annuels & Liasse Fiscale', 'prixMin' => 300000, 'prixMax' => 0, 'unite' => 'HT à partir de'],
    ['id' => 'presta-business-plan', 'nom' => 'Business Plan & Étude de Rentabilité', 'prixMin' => 500000, 'prixMax' => 0, 'unite' => 'HT à partir de'],
    ['id' => 'presta-financement', 'nom' => 'Montage de Dossier de Financement', 'prixMin' => 500000, 'prixMax' => 0, 'unite' => 'HT à partir de (+ success fee)'],
    ['id' => 'presta-controle-fiscal', 'nom' => 'Assistance Contrôle Fiscal ou Social', 'prixMin' => 100000, 'prixMax' => 150000, 'unite' => 'HT / jour'],
    ['id' => 'presta-formation', 'nom' => 'Formation du Personnel', 'prixMin' => 150000, 'prixMax' => 300000, 'unite' => 'HT / jour'],
    ['id' => 'presta-systeme-comptable', 'nom' => "Mise en Place d'un Système Comptable", 'prixMin' => 500000, 'prixMax' => 0, 'unite' => 'HT à partir de'],
    ['id' => 'presta-consultation', 'nom' => 'Consultation Ponctuelle', 'prixMin' => 50000, 'prixMax' => 200000, 'unite' => 'HT / consultation'],
    ['id' => 'jur-secretariat', 'nom' => 'Secrétariat Juridique Annuel', 'prixMin' => 180000, 'prixMax' => 180000, 'unite' => 'HT / an'],
    ['id' => 'formation-fdfp', 'nom' => 'Formation Professionnelle FDFP', 'prixMin' => 0, 'prixMax' => 0, 'unite' => 'Sur devis'],
];
