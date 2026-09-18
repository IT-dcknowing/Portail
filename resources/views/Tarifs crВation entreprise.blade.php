@extends('layouts.app')

@section('title', 'Tarifs pour la création de société en Côte d\'Ivoire | DC-KNOWING')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Section principale -->
    <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Création de société en Côte d'Ivoire</h1>
        <p class="text-gray-600 text-lg max-w-2xl mx-auto">Créez votre entreprise en ligne avec un accompagnement personnalisé par nos experts juridiques</p>
    </div>
    
    <!-- Barre de navigation des statuts -->
    <div class="flex justify-center mb-12">
        <div class="inline-flex rounded-md shadow-sm">
            <button onclick="showPricing('sarl')" class="px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-l-lg border border-gray-200 hover:bg-blue-100 focus:z-10 focus:ring-2 focus:ring-blue-500 pricing-tab active" data-type="sarl">
                SARL
            </button>
            <button onclick="showPricing('sa')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border-t border-b border-gray-200 hover:bg-gray-50 hover:text-blue-600 pricing-tab" data-type="sa">
                SA
            </button>
            <button onclick="showPricing('ei')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-200 hover:bg-gray-50 hover:text-blue-600 pricing-tab" data-type="ei">
                Entreprise Individuelle
            </button>
            <button onclick="showPricing('suarl')" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white rounded-r-md border border-gray-200 hover:bg-gray-50 hover:text-blue-600 pricing-tab" data-type="suarl">
                SUARL
            </button>
        </div>
    </div>
    
    <!-- Section des forfaits (SARL par défaut) -->
    <div class="max-w-6xl mx-auto mb-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="pricing-container">
            <!-- Le contenu sera généré dynamiquement par JavaScript -->
        </div>
    </div>
    
    <!-- Section garanties -->
    <div class="bg-blue-50 rounded-lg p-8 mb-16">
        <div class="max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Nos garanties</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Conformité légale</h3>
                    <p class="text-sm text-gray-600">Votre entreprise créée en conformité avec le droit ivoirien</p>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Rapidité</h3>
                    <p class="text-sm text-gray-600">Traitement accéléré auprès du CEPICI</p>
                </div>
                <div class="text-center">
                    <div class="flex justify-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Expertise locale</h3>
                    <p class="text-sm text-gray-600">Des experts connaissant parfaitement le contexte ivoirien</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Section étapes -->
    <div class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Créez votre entreprise en 4 étapes</h2>
        
        <div class="max-w-4xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Etape 1 -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-500 text-white rounded-full h-12 w-12 flex items-center justify-center text-xl font-bold">1</div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Dépôt du nom</h3>
                    <p class="text-sm text-gray-600">Vérification et réservation de la dénomination sociale</p>
                </div>
                
                <!-- Etape 2 -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-500 text-white rounded-full h-12 w-12 flex items-center justify-center text-xl font-bold">2</div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Rédaction des statuts</h3>
                    <p class="text-sm text-gray-600">Nos experts préparent vos documents juridiques</p>
                </div>
                
                <!-- Etape 3 -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-500 text-white rounded-full h-12 w-12 flex items-center justify-center text-xl font-bold">3</div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Dépôt au CEPICI</h3>
                    <p class="text-sm text-gray-600">Enregistrement de votre société</p>
                </div>
                
                <!-- Etape 4 -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <div class="bg-blue-500 text-white rounded-full h-12 w-12 flex items-center justify-center text-xl font-bold">4</div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Obtention du RCCM</h3>
                    <p class="text-sm text-gray-600">Réception de votre extrait RCCM et documents officiels</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Section FAQ -->
    <div class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Questions fréquentes</h2>
        
        <div class="max-w-3xl mx-auto">
            <!-- Question 1 -->
            <div class="mb-6 border-b border-gray-200 pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Quel est le capital minimum pour une SARL en Côte d'Ivoire ?</h3>
                <p class="text-gray-600">Le capital minimum pour une SARL est de 1 000 000 FCFA. Cependant, ce montant peut varier selon l'activité exercée. Nos experts peuvent vous conseiller sur le montant approprié pour votre projet.</p>
            </div>
            
            <!-- Question 2 -->
            <div class="mb-6 border-b border-gray-200 pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Quels sont les documents nécessaires pour créer une entreprise ?</h3>
                <p class="text-gray-600">Vous aurez besoin notamment d'une pièce d'identité, d'un extrait de casier judiciaire, d'un justificatif de domicile, et des statuts de la société. Nous vous fournissons la liste complète et les modèles nécessaires.</p>
            </div>
            
            <!-- Question 3 -->
            <div class="mb-6 border-b border-gray-200 pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Combien de temps prend la création d'entreprise ?</h3>
                <p class="text-gray-600">Le délai moyen est de 7 à 15 jours ouvrés, selon la complexité du dossier et la charge du CEPICI. Avec nos forfaits Premium et Business, nous accélérons le processus.</p>
            </div>
            
            <!-- Question 4 -->
            <div class="mb-6 border-b border-gray-200 pb-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Quelle est la différence entre une SARL et une SUARL ?</h3>
                <p class="text-gray-600">La SARL (Société à Responsabilité Limitée) compte au moins deux associés, tandis que la SUARL (Société Unipersonnelle à Responsabilité Limitée) n'en a qu'un seul. Nos experts peuvent vous aider à choisir la forme la plus adaptée.</p>
            </div>
            
            <!-- Question 5 -->
            <div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Puis-je créer mon entreprise à distance ?</h3>
                <p class="text-gray-600">Oui, nous proposons une création d'entreprise 100% en ligne. Tous les documents peuvent être signés électroniquement et les échanges se font par email ou téléphone.</p>
            </div>
        </div>
    </div>
    
    <!-- Section CTA -->
    <div class="bg-blue-500 rounded-lg p-8 text-center text-white mb-16">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Prêt à lancer votre entreprise en Côte d'Ivoire ?</h2>
        <p class="text-lg mb-6 max-w-2xl mx-auto">Notre équipe d'experts locaux vous accompagne à chaque étape de la création de votre société</p>
        <a href="#" class="inline-block bg-white text-blue-500 font-bold py-3 px-8 rounded-lg hover:bg-gray-100 transition-colors duration-300">
            Commencer maintenant
        </a>
    </div>
</div>

<script>
    // Données des tarifs pour chaque type de société
    const pricingData = {
        sarl: {
            title: "SARL (Société à Responsabilité Limitée)",
            packages: [
                {
                    name: "Essentiel",
                    price: "250 000 FCFA",
                    features: [
                        "Rédaction des statuts avec un expert",
                        "Accompagnement juridique",
                        "Dépôt de dossier au CEPICI",
                        "Publication au Journal Officiel"
                    ],
                    delay: "7-15 jours",
                    popular: false
                },
                {
                    name: "Premium",
                    price: "450 000 FCFA",
                    features: [
                        "Tout l'offre Essentiel",
                        "Certificat de dépôt de capital",
                        "Obtention du numéro d'identification fiscale",
                        "Traitement prioritaire",
                        "Ligne téléphonique dédiée"
                    ],
                    delay: "5-10 jours",
                    popular: true
                },
                {
                    name: "Business",
                    price: "750 000 FCFA",
                    features: [
                        "Tout l'offre Premium",
                        "Compte professionnel 12 mois",
                        "Domiciliation 3 mois offerts",
                        "Assistance juridique 1 an"
                    ],
                    delay: "3-7 jours",
                    popular: false
                }
            ]
        },
        sa: {
            title: "SA (Société Anonyme)",
            packages: [
                {
                    name: "Essentiel",
                    price: "350 000 FCFA",
                    features: [
                        "Rédaction des statuts avec un expert",
                        "Accompagnement juridique",
                        "Dépôt de dossier au CEPICI",
                        "Publication au Journal Officiel"
                    ],
                    delay: "10-20 jours",
                    popular: false
                },
                {
                    name: "Premium",
                    price: "600 000 FCFA",
                    features: [
                        "Tout l'offre Essentiel",
                        "Certificat de dépôt de capital",
                        "Obtention du numéro d'identification fiscale",
                        "Traitement prioritaire",
                        "Ligne téléphonique dédiée"
                    ],
                    delay: "7-14 jours",
                    popular: true
                },
                {
                    name: "Business",
                    price: "950 000 FCFA",
                    features: [
                        "Tout l'offre Premium",
                        "Compte professionnel 12 mois",
                        "Domiciliation 3 mois offerts",
                        "Assistance juridique 1 an"
                    ],
                    delay: "5-10 jours",
                    popular: false
                }
            ]
        },
        ei: {
            title: "Entreprise Individuelle",
            packages: [
                {
                    name: "Essentiel",
                    price: "150 000 FCFA",
                    features: [
                        "Rédaction des statuts avec un expert",
                        "Accompagnement juridique",
                        "Dépôt de dossier au CEPICI",
                        "Publication au Journal Officiel"
                    ],
                    delay: "5-10 jours",
                    popular: false
                },
                {
                    name: "Premium",
                    price: "300 000 FCFA",
                    features: [
                        "Tout l'offre Essentiel",
                        "Certificat de dépôt de capital",
                        "Obtention du numéro d'identification fiscale",
                        "Traitement prioritaire",
                        "Ligne téléphonique dédiée"
                    ],
                    delay: "3-7 jours",
                    popular: true
                },
                {
                    name: "Business",
                    price: "500 000 FCFA",
                    features: [
                        "Tout l'offre Premium",
                        "Compte professionnel 6 mois",
                        "Domiciliation 2 mois offerts",
                        "Assistance juridique 6 mois"
                    ],
                    delay: "2-5 jours",
                    popular: false
                }
            ]
        },
        suarl: {
            title: "SUARL (Société Unipersonnelle à Responsabilité Limitée)",
            packages: [
                {
                    name: "Essentiel",
                    price: "200 000 FCFA",
                    features: [
                        "Rédaction des statuts avec un expert",
                        "Accompagnement juridique",
                        "Dépôt de dossier au CEPICI",
                        "Publication au Journal Officiel"
                    ],
                    delay: "7-12 jours",
                    popular: false
                },
                {
                    name: "Premium",
                    price: "400 000 FCFA",
                    features: [
                        "Tout l'offre Essentiel",
                        "Certificat de dépôt de capital",
                        "Obtention du numéro d'identification fiscale",
                        "Traitement prioritaire",
                        "Ligne téléphonique dédiée"
                    ],
                    delay: "5-9 jours",
                    popular: true
                },
                {
                    name: "Business",
                    price: "650 000 FCFA",
                    features: [
                        "Tout l'offre Premium",
                        "Compte professionnel 12 mois",
                        "Domiciliation 3 mois offerts",
                        "Assistance juridique 1 an"
                    ],
                    delay: "3-6 jours",
                    popular: false
                }
            ]
        }
    };

    // Affiche les tarifs par défaut (SARL) au chargement de la page
    document.addEventListener('DOMContentLoaded', function() {
        showPricing('sarl');
    });

    // Fonction pour afficher les tarifs selon le type de société
    function showPricing(type) {
        const pricingContainer = document.getElementById('pricing-container');
        const pricingTabs = document.querySelectorAll('.pricing-tab');
        
        // Mettre à jour l'onglet actif
        pricingTabs.forEach(tab => {
            if (tab.dataset.type === type) {
                tab.classList.add('text-blue-600', 'bg-blue-50', 'hover:bg-blue-100');
                tab.classList.remove('text-gray-700', 'bg-white', 'hover:bg-gray-50');
            } else {
                tab.classList.remove('text-blue-600', 'bg-blue-50', 'hover:bg-blue-100');
                tab.classList.add('text-gray-700', 'bg-white', 'hover:bg-gray-50');
            }
        });
        
        // Générer le HTML pour les forfaits
        let html = '';
        const data = pricingData[type];
        
        data.packages.forEach(pkg => {
            html += `
                <div class="bg-white rounded-lg shadow-lg overflow-hidden border ${pkg.popular ? 'border-blue-500 transform scale-105 relative' : 'border-gray-200 hover:shadow-xl transition-shadow duration-300'}">
                    ${pkg.popular ? '<div class="absolute top-0 right-0 bg-blue-500 text-white text-xs font-bold px-3 py-1 rounded-bl-lg">LE PLUS CHOISI</div>' : ''}
                    <div class="${pkg.popular ? 'bg-blue-500' : 'bg-gray-50'} p-6 text-center">
                        <h3 class="text-xl font-bold ${pkg.popular ? 'text-white' : 'text-gray-800'}">${pkg.name}</h3>
                        <div class="mt-4">
                            <span class="text-3xl font-bold ${pkg.popular ? 'text-white' : 'text-gray-800'}">${pkg.price}</span>
                            <span class="${pkg.popular ? 'text-white opacity-80' : 'text-gray-600'} text-sm">TTC</span>
                        </div>
                        <p class="text-sm ${pkg.popular ? 'text-white opacity-80' : 'text-gray-600'} mt-2">+ frais d'enregistrement et de publication</p>
                    </div>
                    <div class="p-6">
                        <ul class="space-y-3">
                            ${pkg.features.map(feature => `
                                <li class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <p class="ml-3 text-sm text-gray-700">${feature}</p>
                                </li>
                            `).join('')}
                        </ul>
                    </div>
                    <div class="bg-gray-50 p-6">
                        <a href="#" class="block text-center py-3 px-4 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 transition-colors duration-300">
                            Choisir cette offre
                        </a>
                        <p class="text-xs text-gray-500 mt-2 text-center">Délai moyen de création : ${pkg.delay}</p>
                    </div>
                </div>
            `;
        });
        
        pricingContainer.innerHTML = html;
    }
</script>

<style>
    .pricing-tab {
        transition: all 0.3s ease;
    }
    
    .pricing-tab:hover {
        transform: translateY(-2px);
    }
    
    .transform.scale-105 {
        z-index: 10;
    }
</style>
@endsection