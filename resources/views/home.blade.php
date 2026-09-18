@extends('layouts.app')

@section('title', 'Services Juridiques et Solutions de Gestion')

@section('content')
        <!-- Hero Section animée -->
    <section class="hero-section relative bg-cover bg-center bg-no-repeat py-20 sm:py-24 md:py-32 overflow-x-hidden"
            style="background-image: url({{ asset('images/startup-office-african-american-entrepreneurs.jpg') }});">
        <div class="absolute inset-0 bg-black/70"></div>

        <div class="relative container mx-auto px-4 sm:px-6 z-10 flex flex-col lg:flex-row justify-between items-start gap-10">
            <!-- Partie gauche -->
            <div class="w-full lg:w-2/3">
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-6 animate-fadeInUp">
                    Lancez votre entreprise en toute simplicité
                </h1>
                <p class="text-yellow-400 text-lg sm:text-xl lg:text-2xl font-semibold mb-4 animate-fadeInUp delay-200">
                    Notre plateforme vous guide à chaque étape de la formalisation de
                votre entreprise. Des outils intuitifs et un accompagnement
                personnalisé pour concrétiser votre projet avec DC-Knowing.
                </p>
                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-6 animate-fadeInUp">
                    Bénéficiez d’un accompagnement sur mesure avec nos experts,
                    alliant professionnalisme et écoute active.
                </h1>
                <p class="text-white text-base md:text-lg lg:text-xl font-medium mb-8 animate-fadeInUp delay-300">
                Soyez accompagnés par des <span class="text-yellow-400 font-semibold">experts du domaine</span> pour assurer
                le succès de votre entreprise. Notre équipe vous suit de A à Z avec professionnalisme et bienveillance.
                </p>
                <a href="#services" class="bg-yellow-400 text-black px-6 py-3 rounded-md font-medium hover:bg-yellow-500 transition transform hover:scale-105 shadow-lg text-sm sm:text-base">
                    Découvrir nos services
                </a>
            </div>

            <!-- Partie droite : Photos -->
             <div class="flex flex-col items-center w-full lg:w-1/3">
                <!-- Titre centré juste au-dessus des images -->
                <div class="text-center mb-8">
                    <h3 class="text-2xl sm:text-3xl font-bold text-white">Nos Experts</h3>
                </div>

                <!-- Grille des experts -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full">
                    @foreach ([ 
                        ['img' => 'expert4.jpg', 'name' => 'Monsieur FOTO Noel', 'desc' => ['Expert Comptable diplômé', "Inscrit à l'ordre des experts Comptables"]],
                        ['img' => 'expert1.jpg', 'name' => 'Monsieur SEMI Bi Djangoné', 'desc' => ['Expert-Comptable diplômé',"Inscrit à l'ordre des experts Comptables"]],
                       /*['img' => 'expert2.jpg', 'name' => 'Maître Hermine Sery', 'desc' => ["Avocate, inscrite au barreau de Côte d'Ivoire"]],*/
                        ['img' => 'Notaire.png', 'name' => 'Maître NEKOURESSI Aimé-Rodrigue', 'desc' => ["Étude de Maître NEKOURESSI", "Notaire"]],
                    ] as $expert)
                    <div class="flex flex-col items-center text-center">
                        <img src="{{ asset('images/' . $expert['img']) }}" alt="{{ $expert['name'] }}" class="w-28 h-28 sm:w-32 sm:h-32 rounded-full border-4 border-yellow-400 object-cover shadow-lg">
                        <p class="mt-2 text-white font-medium text-sm sm:text-base">{{ $expert['name'] }}</p>
                        @foreach ($expert['desc'] as $line)
                            <span class="text-xs text-yellow-300">{{ $line }}</span>
                        @endforeach
                    </div>
                    @endforeach
                </div>
            </div>

        <!-- Animations SVG -->
        <div class="absolute inset-0 pointer-events-none z-0">
                <!-- SVG éléments -->
                <svg class="absolute top-10 left-10 w-6 h-6 sm:w-10 sm:h-10 animate-rocket" viewBox="0 0 100 100" fill="none">
                    <path d="M50 10 L60 40 L50 30 L40 40 Z" fill="#FFD700" />
                </svg>
                <svg class="absolute bottom-10 left-1/2 transform -translate-x-1/2 w-6 h-6 sm:w-10 sm:h-10 animate-pulse-network" viewBox="0 0 100 100" fill="none">
                    <circle cx="50" cy="50" r="30" stroke="#FFD700" stroke-width="4" fill="none"/>
                </svg>
                <svg class="absolute top-1/2 right-6 sm:right-10 transform -translate-y-1/2 w-6 h-6 sm:w-10 sm:h-10 animate-spin-gear" viewBox="0 0 100 100" fill="none">
                    <circle cx="50" cy="50" r="20" stroke="#FFD700" stroke-width="4" fill="none"/>
                    <line x1="50" y1="30" x2="50" y2="70" stroke="#FFD700" stroke-width="2"/>
                    <line x1="30" y1="50" x2="70" y2="50" stroke="#FFD700" stroke-width="2"/>
                </svg>
        </div>

        <!-- Icônes décoratives -->
        <div class="absolute top-4 right-4 sm:top-6 sm:right-6 animate-spin-slow">
            <svg class="w-4 h-4 sm:w-6 sm:h-6 text-yellow-400" viewBox="0 0 24 24" fill="none">
                <path d="M16 3l5 5-5 5" stroke="currentColor" stroke-width="2" fill="none"/>
            </svg>
        </div>
        <div class="absolute bottom-4 left-4 sm:bottom-6 sm:left-6 animate-bounce">
            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-yellow-400" viewBox="0 0 24 24" fill="none">
                <path d="M12 15.5A3.5 3.5 0 1 0 12 8.5a3.5 3.5 0 0 0 0 7zm0 4.5v2m0-18v2m9 9h-2M5 12H3m15.36 6.36l-1.42-1.42M6.05 6.05L4.64 4.64m12.72 0l-1.41 1.41M6.05 17.95l-1.41 1.41" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </section>




    <!-- Services Juridiques -->
    <section id="services-juridiques" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <!-- Titre et description globale -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Nos services pour vous accompagner :</h2>
                <h2 class="text-3xl font-bold text-gray-900 mb-4">1 - Service juridique</h2>

                <p class="text-gray-600 max-w-3xl mx-auto">
                    Découvrez nos solutions adaptées à chaque étape de votre projet
                </p>
            </div>

            <!-- Onglets horizontaux -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 mb-8">
                <!-- Création d'entreprise -->
                <button type="button" class="service-btn px-4 py-2 rounded-t-lg border-b-2 border-transparent hover:border-primary/50 transition duration-300 ease-in-out focus:outline-none active:bg-primary active:text-white active:border-primary"
                        data-service="creation">
                    <i class="ri-building-line text-xl text-primary"></i>
                    <span class="ml-2">Création d'entreprise</span>
                </button>

                <!-- Modification d'entreprise -->
                <button type="button" class="service-btn px-4 py-2 rounded-t-lg border-b-2 border-transparent hover:border-primary/50 transition duration-300 ease-in-out focus:outline-none active:bg-primary active:text-white active:border-primary"
                        data-service="modification">
                    <i class="ri-edit-line text-xl text-primary"></i>
                    <span class="ml-2">Modification</span>
                </button>

                <!-- Radiation d'entreprise -->
                <button type="button" class="service-btn px-4 py-2 rounded-t-lg border-b-2 border-transparent hover:border-primary/50 transition duration-300 ease-in-out focus:outline-none active:bg-primary active:text-white active:border-primary"
                        data-service="radiation">
                    <i class="ri-close-circle-line text-xl text-primary"></i>
                    <span class="ml-2">Radiation</span>
                </button>

                <!-- Acte Juridique -->
                <button type="button" class="service-btn px-4 py-2 rounded-t-lg border-b-2 border-transparent hover:border-primary/50 transition duration-300 ease-in-out focus:outline-none active:bg-primary active:text-white active:border-primary"
                        data-service="acte">
                    <i class="ri-file-text-line text-xl text-primary"></i>
                    <span class="ml-2">Actes Juridiques</span>
                </button>
            </div>
            <!-- Contenu dynamique -->
            <div id="service-explanations" class="mt-8">
                <!-- Explication de la création d'entreprise -->
                <div id="explanation-creation" class="service-explanation hidden mt-4 w-full">
                    <div class="bg-gray-100 border border-gray-300 shadow-md rounded-xl p-6">
                        <h3 class="text-black font-semibold mb-2">Création d'entreprise</h3>
                        <p class="text-gray-700 mb-4">
                            Nous vous accompagnons dans toutes les démarches de création d'entreprise : choix de la forme juridique, rédaction des statuts, immatriculation, et conseils personnalisés pour démarrer sereinement votre activité.
                        </p>
                        <div class="flex justify-between">
                            <a href="#" onclick="openModal()" class="bg-primary text-black px-6 py-2 rounded-button font-medium hover:bg-primary/90 transition inline-block">
                                En savoir plus
                            </a>
                            <!-- MODALE -->
                            <div id="infoModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center">
                                <div class="bg-white w-full max-w-5xl rounded-xl p-6 relative shadow-xl">
                                    
                                    <!-- Bouton de fermeture -->
                                    <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-500 hover:text-black text-xl">&times;</button>

                                    <!-- Onglets avec icônes -->
                                    <div class="flex justify-around border-b pb-4 text-sm font-semibold text-gray-800">
                                        <button class="tab-btn flex items-center space-x-2" onclick="openTab('forme')">
                                            <span class="text-yellow-400 text-xl flex items-center justify-center"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect><path d="M9 22v-4h6v4"></path></svg></span><span>Forme Juridique</span>
                                        </button>
                                        <button class="tab-btn flex items-center space-x-2" onclick="openTab('regime')">
                                      <span class="text-yellow-400 text-xl">📊</span><span>Régime d’imposition</span>
                                        </button>
                                        <button class="tab-btn flex items-center space-x-2" onclick="openTab('code')">
                                            <span class="text-yellow-400 text-xl">📘</span><span>Code des investissements</span>
                                        </button>
                                    </div>

                                    <!-- Contenu -->
                                    <div class="max-h-[600px] overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100 p-4">
                                       <!-- Onglet Forme Juridique -->
                                        <div id="forme" class="tab-content hidden">
                                            <div class="bg-gray-100 p-6 rounded-xl">
                                                <h3 class="text-black font-bold mb-4">Forme Juridique</h3>
                                               
                                                <!-- Liste déroulante -->
                                                <select id="selectForme" onchange="window.location.href = this.value;" class="w-full p-2 border rounded mb-4">
                                                    <option value="">-- Sélectionnez une forme juridique --</option>
                                                    <option value="{{ route('showSARLF') }}">SARL</option>
                                                    <option value="{{ route('showSAF') }}">SA</option>
                                                    <option value="{{ route('showSASF') }}">SAS</option>
                                                    <option value="{{ route('showSNCF') }}">SNC</option>
                                                    <option value="{{ route('showSCSF') }}">SCS</option>
                                                    <option value="{{ route('showSARLUF') }}">SARLU</option>
                                                    <option value="{{ route('showSEPF') }}">SEP</option>
                                                    <option value="{{ route('showONGF') }}">ONG</option>
                                                    <option value="{{ route('showSCIF') }}">SCI</option> 
                                                    <option value="{{ route('showASSOCIATIONF') }}">Association</option>
                                                    <option value="{{ route('showFONDATIONF') }}">Fondation</option>
                                                    <option value="{{ route('showSCOOPSF') }}">SCOOPS</option>
                                                    <option value="{{ route('showEIF') }}">EI</option>
                                                    <option value="{{ route('showSASUF') }}">SASU</option>
                                                    <option value="{{ route('showFILIALEF') }}">FILIALE</option>
                                                </select>

                                                <div id="detailsForme" class="space-y-4">

                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">Définition</h4>
                                                        <p class="text-gray-700">La forme juridique désigne le cadre légal dans lequel une entreprise est créée et exerce ses activités. Elle détermine les règles de fonctionnement, la responsabilité des associés, le régime fiscal, le capital requis, et les obligations comptables.</p>
                                                    </div>

                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">Caractéristiques</h4>
                                                        <p class="text-gray-700">Responsabilité des associés : limitée ou illimitée.</p>
                                                        <p class="text-gray-700">Capital social : minimum requis ou librement fixé.</p>
                                                        <p class="text-gray-700">Nombre d’associés : de 1 à plusieurs.</p>
                                                        <p class="text-gray-700">Obligations comptables et fiscales : simplifiées ou renforcées.</p>
                                                        <p class="text-gray-700">Régime fiscal : impôt sur le revenu ou sur les sociétés.</p>
                                                    </div>

                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">Constitution</h4>
                                                        <p class="text-gray-700">Rédaction des statuts, dépôt au greffe, immatriculation.</p>
                                                    </div>

                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">Fonctionnement</h4>
                                                        <p class="text-gray-700">Le fonctionnement d’une entité dépend de sa forme</p>
                                                    </div>

                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">Dissolution</h4>
                                                        <p class="text-gray-700">Volontaire ou judiciaire selon les conditions prévues.</p>
                                                    </div>

                                                 </div>
                                            </div>
                                        </div>

                                        <!-- Onglet Régime d’imposition -->
                                        <div id="regime" class="tab-content hidden">
                                            <div class="bg-gray-100 p-6 rounded-xl">
                                                <h3 class="text-black font-bold mb-4">Régime d’imposition</h3>
                                                
                                                <!-- Liste déroulante -->
                                                <select id="selectRegime" onchange="updateRegimeDetails()" class="w-full p-2 border rounded mb-4">
                                                    <option value="">-- Sélectionnez un régime --</option>
                                                    <option value="reel">Régime Réel</option>
                                                    <option value="simplifie">Régime Simplifié</option>
                                                    <option value="regime_micro">Régime des microentreprises</option>
                                                </select>

                                                <!-- Détails dynamiques -->
                                                <div id="detailsRegime" class="space-y-4">
                                                     <!-- Carte Définition -->
                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">📘 Définition</h4>
                                                        <p class="text-gray-700">
                                                            Le régime d’imposition définit le système fiscal auquel une entreprise est soumise selon son activité et son chiffre d’affaires.
                                                        </p>
                                                    </div>

                                                    <!-- Carte Caractéristiques -->
                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">📌 Caractéristiques</h4>
                                                        <p class="text-gray-700">
                                                            Il existe plusieurs régimes : réel normal, réel simplifié, micro. Chacun implique des obligations fiscales différentes (TVA, tenue de comptabilité, etc.).
                                                        </p>
                                                    </div>

                                                    <!-- Carte Constitution -->
                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">📝 Constitution</h4>
                                                        <p class="text-gray-700">
                                                            Le choix du régime peut être fait lors de la création de l’entreprise ou modifié par déclaration auprès de l’administration fiscale.
                                                        </p>
                                                    </div>

                                                    <!-- Carte Fonctionnement -->
                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">⚙️ Fonctionnement</h4>
                                                        <p class="text-gray-700">
                                                            Chaque régime impose un mode de déclaration (mensuelle, trimestrielle, ou annuelle) et une fréquence de paiement des impôts différents.
                                                        </p>
                                                    </div>

                                                    <!-- Carte Dissolution -->
                                                    <div class="bg-gray-100 p-4 rounded-xl shadow-sm">
                                                        <h4 class="font-bold text-gray-900 mb-1">❌ Dissolution</h4>
                                                        <p class="text-gray-700">
                                                            En cas de fermeture, l’entreprise doit faire ses déclarations fiscales finales et régulariser les paiements dus auprès de l’administration.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Onglet 3 -->
                                        <div id="code" class="tab-content hidden">
                                            <div class="bg-gray-100 p-6 rounded-xl">
                                                <h3 class="text-black font-bold mb-2">Code des investissements</h3>
                                                <ul class="list-disc pl-6 text-gray-700 space-y-1">
                                                    <li><strong>Définition :</strong> Ensemble des avantages accordés aux investisseurs.</li>
                                                    <li><strong>Caractéristiques :</strong> Exonérations fiscales, garanties légales.</li>
                                                    <li><strong>Constitution :</strong> Dossier d’agrément à soumettre aux autorités compétentes.</li>
                                                    <li><strong>Fonctionnement :</strong> Suivi des engagements, durée de validité.</li>
                                                    <li><strong>Dissolution :</strong> Retrait ou expiration des avantages.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{ route('Création') }}" class="bg-primary text-black px-6 py-2 rounded-button font-medium hover:bg-primary/90 transition inline-block">
                                Accéder au service
                            </a>
                        </div>
                    </div>
                </div>


                <!-- Explication de la modification d'entreprise -->
                <div id="explanation-modification" class="service-explanation hidden">
                    <div class="bg-gray-100 border border-gray-300 shadow-md rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-primary mb-2">Modification d'entreprise</h3>
                        <p class="text-gray-700 mb-4">
                            Modifiez votre entreprise en toute sécurité : changement de siège social, d'objet social, de dirigeants, ou toute autre modification statutaire, avec un accompagnement juridique complet.
                        </p>
                        <a href="{{ route('Modification') }}" class="bg-primary text-black px-6 py-2 rounded-button font-medium hover:bg-primary/90 transition inline-block">Accéder au service</a>
                    </div>
                </div>

                <!-- Explication de la radiation d'entreprise -->
                <div id="explanation-radiation" class="service-explanation hidden">
                    <div class="bg-gray-100 border border-gray-300 shadow-md rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-primary mb-2">Radiation d'entreprise</h3>
                        <p class="text-gray-700 mb-4">
                            Nous gérons pour vous toutes les formalités de radiation : dissolution, liquidation, clôture des comptes et publication légale, pour une cessation d'activité conforme et sans tracas.
                        </p>
                        <a href="{{ route('Radiation-Form') }}" class="bg-primary text-black px-6 py-2 rounded-button font-medium hover:bg-primary/90 transition inline-block">Accéder au service</a>
                    </div>
                </div>

                <!-- Explication de l'acte juridique -->
                <div id="explanation-acte" class="service-explanation hidden">
                    <div class="bg-gray-100 border border-gray-300 shadow-md rounded-xl p-6">
                        <h3 class="text-xl font-semibold text-primary mb-2">Acte Juridique</h3>
                        <p class="text-gray-700 mb-4">
                            Rédaction et gestion de tous vos actes juridiques : procès-verbaux, contrats, cessions de parts, conventions, avec une expertise adaptée à votre secteur d'activité.
                        </p>
                        <a href="{{ route('Acte-Juridique') }}" class="bg-primary text-black px-6 py-2 rounded-button font-medium hover:bg-primary/90 transition inline-block">Accéder au service</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const serviceButtons = document.querySelectorAll(".service-btn");
            const explanations = document.querySelectorAll(".service-explanation");

            // Fonction pour afficher le contenu d'un service
            function showExplanation(serviceId) {
                explanations.forEach(explanation => {
                    explanation.classList.add("hidden");
                });

                const targetExplanation = document.getElementById(`explanation-${serviceId}`);
                if (targetExplanation) {
                    targetExplanation.classList.remove("hidden");
                }
            }

            // Écouter les clics sur les boutons
            serviceButtons.forEach(button => {
                button.addEventListener("click", function () {
                    const serviceId = this.getAttribute("data-service");
                    showExplanation(serviceId);

                    // Activer le bouton cliqué
                    serviceButtons.forEach(btn => btn.classList.remove("active"));
                    this.classList.add("active");
                });
            });

            // Afficher par défaut le premier onglet
            showExplanation("creation");
            serviceButtons[0].classList.add("active");
        });
    </script>
    @endpush

    <!-- Centres de Gestion Agréé -->
    <section id="cga" class="py-16 bg-gray-50 relative overflow-hidden">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                <div class="lg:w-1/2">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl border-4 border-primary group">
                        <span class="absolute left-4 top-4 text-2xl animate-sparkle opacity-60"></span>
                        <div class="absolute inset-0 flex items-center justify-center z-0 pointer-events-none">
                            <div class="w-64 h-64 bg-primary/20 rounded-full blur-3xl animate-pulse group-hover:scale-110 transition"></div>
                        </div>
                        <img src="{{ asset('images/smiling-businessman-signing-contract.jpg') }}" alt="Centres de Gestion Agréé"
                            class="w-full h-auto object-cover relative z-10 rounded-2xl transition-transform duration-500 hover:scale-105" />
                    </div>
                </div>
                
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4 animate-fadeInUp">Centres de Gestion Agréé (CGA) <span class="inline-block animate-sparkle ml-2"></span></h2>
                    <p class="text-gray-600 mb-6 animate-fadeInUp delay-200">Notre Cabinet de Gestion Agréé vous offre un accompagnement fiscal et comptable complet, vous permettant de bénéficier d'avantages fiscaux significatifs tout en sécurisant votre gestion. <span class="inline-block animate-sparkle ml-1"></span></p>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex items-start">
                            <div class="w-6 h-6 flex items-center justify-center text-primary mr-3 mt-0.5">
                                <i class="ri-check-line ri-lg"></i>
                            </div>
                            <p class="text-gray-700">Réduction d'impôt pour adhésion à un CGA</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 flex items-center justify-center text-primary mr-3 mt-0.5">
                                <i class="ri-check-line ri-lg"></i>
                            </div>
                            <p class="text-gray-700">Prévention des contrôles fiscaux</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 flex items-center justify-center text-primary mr-3 mt-0.5">
                                <i class="ri-check-line ri-lg"></i>
                            </div>
                            <p class="text-gray-700">Assistance comptable et fiscale personnalisée</p>
                        </div>
                        <div class="flex items-start">
                            <div class="w-6 h-6 flex items-center justify-center text-primary mr-3 mt-0.5">
                                <i class="ri-check-line ri-lg"></i>
                            </div>
                            <p class="text-gray-700">Dossier de gestion et statistiques sectorielles</p>
                        </div>
                    </div>
                    
                    <a href="{{ route('CGA') }}" class="bg-primary text-black px-6 py-3 !rounded-button whitespace-nowrap font-medium hover:bg-primary/90 transition inline-block">En savoir plus</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Ingénierie des Finances et de la Gestion -->
    <section id="ifg" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col lg:flex-row-reverse items-center gap-12">
                <div class="lg:w-1/2">
                    <div class="relative rounded-2xl overflow-hidden shadow-xl border-4 border-primary">
                        <!-- Animation en arrière-plan -->
                        <div class="absolute inset-0 flex items-center justify-center z-0 pointer-events-none">
                            <div class="w-64 h-64 bg-primary/20 rounded-full blur-3xl animate-pulse"></div>
                        </div>
                        <!-- Image avec bordure stylisée -->
                        <img src="{{ asset('images/male-manager-reviewing-data-clipboard.jpg') }}" alt="Ingénierie des Finances et de la Gestion" class="w-full h-auto object-cover relative z-10 rounded-2xl transition-transform duration-500 hover:scale-105" />
                    </div>
                </div>
                
                <div class="lg:w-1/2">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Ingénierie des Finances et de la Gestion (IFG)</h2>
                    <p class="text-gray-600 mb-6">Notre département IFG vous propose des solutions sur mesure pour optimiser votre gestion financière et développer votre entreprise avec une vision stratégique claire.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="w-10 h-10 flex items-center justify-center text-primary mb-3">
                                <i class="ri-line-chart-line ri-lg"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Analyse financière</h3>
                            <p class="text-gray-600 text-sm">Diagnostic complet de votre situation financière</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="w-10 h-10 flex items-center justify-center text-primary mb-3">
                                <i class="ri-funds-line ri-lg"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Stratégie d'investissement</h3>
                            <p class="text-gray-600 text-sm">Conseils pour optimiser vos investissements</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="w-10 h-10 flex items-center justify-center text-primary mb-3">
                                <i class="ri-bank-line ri-lg"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Gestion de trésorerie</h3>
                            <p class="text-gray-600 text-sm">Optimisation des flux financiers</p>
                        </div>
                        
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <div class="w-10 h-10 flex items-center justify-center text-primary mb-3">
                                <i class="ri-pie-chart-line ri-lg"></i>
                            </div>
                            <h3 class="font-semibold text-gray-900 mb-2">Reporting financier</h3>
                            <p class="text-gray-600 text-sm">Tableaux de bord et indicateurs clés</p>
                        </div>
                    </div>
                    
                    <a href="#" class="bg-primary text-black px-6 py-3 !rounded-button whitespace-nowrap font-medium hover:bg-primary/90 transition inline-block">Découvrir nos solutions</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Missions Ponctuelles -->
    <section id="missions" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Missions Ponctuelles</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">Des interventions ciblées pour répondre à vos besoins spécifiques et ponctuels dans tous les domaines de la gestion d'entreprise.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                <!-- Fiscalité -->
                <div class="service-card bg-white rounded-lg shadow-md p-6 border border-gray-100">
                    <div class="w-14 h-14 bg-black rounded-full flex items-center justify-center mb-4">
                        <i class="ri-building-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Fiscalité</h3>
                    <p class="text-gray-600">Optimisation fiscale, déclarations fiscales, assistance en cas de contrôle fiscal, conseil en matière d'impôts directs et indirects.</p>
                </div>
                
                <!-- Formation -->
                <div class="service-card bg-white rounded-lg shadow-md p-6 border border-gray-100 h-full">
                    <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center mb-4">
                        <i class="ri-graduation-cap-line ri-lg text-primary"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Formation</h3>
                    <p class="text-gray-600">Formations sur mesure en comptabilité, fiscalité, gestion, droit des affaires et management pour vos équipes.</p>
                </div>
                
                <!-- Gestion Organisationnelle -->
                <div class="service-card bg-white rounded-lg shadow-md p-6 border border-gray-100 h-full">
                    <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center mb-4">
                        <i class="ri-graduation-cap-line ri-lg text-primary"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Gestion Organisationnelle</h3>
                    <p class="text-gray-600">
                        Audit organisationnel, optimisation des processus, mise en place de procédures et d'outils de gestion efficaces.
                    </p>
                </div>
                
                <!-- Droit des Affaires -->
                <div class="service-card bg-white rounded-lg shadow-md p-6 border border-gray-100 h-full">
                    <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center mb-4">
                        <i class="ri-scales-line ri-lg text-primary"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Droit des Affaires</h3>
                    <p class="text-gray-600">Conseil juridique, rédaction de contrats commerciaux, gestion des litiges, protection de la propriété intellectuelle.</p>
                </div>
                
                <!-- Recherche de financement -->
                <div class="service-card bg-white rounded-lg shadow-md p-6 border border-gray-100 h-full">
                    <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center mb-4">
                        <i class="ri-money-euro-circle-line ri-lg text-primary"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Recherche de financement</h3>
                    <p class="text-gray-600">Identification des sources de financement adaptées, montage de dossiers de financement, relations avec les établissements financiers.</p>
                </div>
                
                <!-- GRH -->
                <div class="service-card bg-white rounded-lg shadow-md p-6 border border-gray-100 h-full">
                    <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center mb-4">
                        <i class="ri-team-line ri-lg text-primary"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">GRH</h3>
                    <p class="text-gray-600">Gestion des ressources humaines, recrutement, évaluation des performances, politique de rémunération, gestion des talents.</p>
                </div>
                
                <!-- Droit du Travail -->
                <div class="service-card bg-white rounded-lg shadow-md p-6 border border-gray-100 h-full">
                    <div class="w-12 h-12 bg-black rounded-full flex items-center justify-center mb-4">
                        <i class="ri-file-user-line ri-lg text-primary"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Droit du Travail</h3>
                    <p class="text-gray-600">Conseil en droit social, rédaction de contrats de travail, gestion des relations sociales, procédures disciplinaires.</p>
                </div>
                
                <!-- Bouton -->
                <div class="service-card bg-primary/5 rounded-lg p-6 border border-primary/20 h-full flex flex-col items-center justify-center">
                    <p class="text-gray-700 font-medium mb-4 text-center">Besoin d'une mission spécifique ?</p>
                    <a href="#contact" class="bg-primary text-black px-5 py-2.5 !rounded-button whitespace-nowrap font-medium hover:bg-primary/90 transition">Contactez-nous</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Solutions Digitales -->
  <section id="solutions" class="py-16 bg-white relative overflow-hidden">
    <div class="container mx-auto px-4">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 animate-fadeInUp flex items-center justify-center gap-2">
                Solutions Digitales
            </h2>
            <p class="text-gray-600 max-w-3xl mx-auto animate-fadeInUp delay-200 flex items-center justify-center gap-2">
                Nos outils digitaux innovants pour simplifier et optimiser la gestion quotidienne de votre entreprise.
            </p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- RH Flow -->
            <div class="digital-card relative bg-black rounded-lg shadow-md overflow-hidden border border-gray-100 group hover:shadow-2xl transition">
                <span class="absolute left-4 top-4 text-xl animate-sparkle opacity-70"></span>
                <div class="h-40 bg-gradient-to-r from-primary/20 to-primary/5 flex items-center justify-center">
                    <div class="w-20 h-20 flex items-center justify-center">
                        <i class="ri-user-settings-line ri-3x text-primary"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-white mb-3">RH Flow</h3>
                    <p class="text-white mb-4">Gestion complète des ressources humaines : recrutement, onboarding, congés, évaluations et développement des compétences.</p>
                    <div class="flex justify-between items-center">
                        <a href="https://dc-knowing.com/RHFLOW/" class="text-primary font-medium flex items-center">
                            En savoir plus
                            <i class="ri-arrow-right-line ml-1"></i>
                        </a>
                        <a href="https://www.youtube.com/watch?v=u1K8cpLkieo&ab_channel=RHFlow"
                        target="_blank"
                        class="bg-primary/10 text-primary px-4 py-2 !rounded-button whitespace-nowrap font-medium hover:bg-primary/20 transition">
                        Démonstration
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Compta Flow -->
            <div class="digital-card relative bg-black rounded-lg shadow-md overflow-hidden border border-gray-100 group hover:shadow-2xl transition">
                <span class="absolute left-4 top-4 text-xl animate-sparkle opacity-70"></span>
                <div class="h-40 bg-gradient-to-r from-primary/20 to-primary/5 flex items-center justify-center">
                    <div class="w-20 h-20 flex items-center justify-center">
                        <i class="ri-bank-card-line ri-3x text-primary"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-white mb-3">Compta Flow</h3>
                    <p class="text-white mb-4">Solution de comptabilité intuitive : facturation, suivi des dépenses, rapports financiers et gestion de trésorerie.</p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-primary font-medium flex items-center">
                            En savoir plus
                            <i class="ri-arrow-right-line ml-1"></i>
                        </a>
                        <a href="#" class="bg-primary/10 text-primary px-4 py-2 !rounded-button whitespace-nowrap font-medium hover:bg-primary/20 transition">Démonstration</a>
                    </div>
                </div>
            </div>
            
            <!-- Sell Flow -->
            <div class="digital-card relative bg-black rounded-lg shadow-md overflow-hidden border border-gray-100 group hover:shadow-2xl transition">
                <span class="absolute left-4 top-4 text-xl animate-sparkle opacity-70"></span>
                <div class="h-40 bg-gradient-to-r from-primary/20 to-primary/5 flex items-center justify-center">
                    <div class="w-20 h-20 flex items-center justify-center">
                        <i class="ri-shopping-cart-line ri-3x text-primary"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-white mb-3">Sell Flow</h3>
                    <p class="text-white mb-4">CRM complet pour gérer vos ventes : suivi des prospects, pipeline commercial, devis et facturation automatisée.</p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-primary font-medium flex items-center">
                            En savoir plus
                            <i class="ri-arrow-right-line ml-1"></i>
                        </a>
                        <a href="#" class="bg-primary/10 text-primary px-4 py-2 !rounded-button whitespace-nowrap font-medium hover:bg-primary/20 transition">Démonstration</a>
                    </div>
                </div>
            </div>
            
            <!-- Legal Flow -->
            <div class="digital-card relative bg-black rounded-lg shadow-md overflow-hidden border border-gray-100 group hover:shadow-2xl transition">
                <span class="absolute left-4 top-4 text-xl animate-sparkle opacity-70"></span>
                <div class="h-40 bg-gradient-to-r from-primary/20 to-primary/5 flex items-center justify-center">
                    <div class="w-20 h-20 flex items-center justify-center">
                        <i class="ri-file-text-line ri-3x text-primary"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-white mb-3">Legal Flow</h3>
                    <p class="text-white mb-4">Gestion des documents juridiques : création, stockage sécurisé, suivi des échéances et conformité réglementaire.</p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-primary font-medium flex items-center">
                            En savoir plus
                            <i class="ri-arrow-right-line ml-1"></i>
                        </a>
                        <a href="#" class="bg-primary/10 text-primary px-4 py-2 !rounded-button whitespace-nowrap font-medium hover:bg-primary/20 transition">Démonstration</a>
                    </div>
                </div>
            </div>
            
            <!-- Flow Community -->
            <div class="digital-card relative bg-black rounded-lg shadow-md overflow-hidden border border-gray-100 group hover:shadow-2xl transition">
                <span class="absolute left-4 top-4 text-xl animate-sparkle opacity-70"></span>
                <div class="h-40 bg-gradient-to-r from-primary/20 to-primary/5 flex items-center justify-center">
                    <div class="w-20 h-20 flex items-center justify-center">
                        <i class="ri-group-line ri-3x text-primary"></i>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-white mb-3">Flow Community</h3>
                    <p class="text-white mb-4">Plateforme collaborative pour échanger avec d'autres entrepreneurs, partager des expériences et accéder à des ressources.</p>
                    <div class="flex justify-between items-center">
                        <a href="#" class="text-primary font-medium flex items-center">
                            En savoir plus
                            <i class="ri-arrow-right-line ml-1"></i>
                        </a>
                        <a href="#" class="bg-primary/10 text-primary px-4 py-2 !rounded-button whitespace-nowrap font-medium hover:bg-primary/20 transition">Démonstration</a>
                    </div>
                </div>
            </div>
            
            <!-- All-in-One -->
            <div class="digital-card relative bg-black rounded-lg shadow-md overflow-hidden">
                <div class="p-8 text-white">
                    <h3 class="text-2xl font-semibold mb-4">Solution All-in-One</h3>
                    <p class="mb-6 opacity-90">Accédez à toutes nos solutions digitales dans une interface unifiée pour une gestion d'entreprise simplifiée.</p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start">
                            <div class="w-5 h-5 flex items-center justify-center mr-2 mt-0.5">
                                <i class="ri-check-line"></i>
                            </div>
                            <span>Intégration complète entre tous les modules</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-5 h-5 flex items-center justify-center mr-2 mt-0.5">
                                <i class="ri-check-line"></i>
                            </div>
                            <span>Tableau de bord personnalisable</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-5 h-5 flex items-center justify-center mr-2 mt-0.5">
                                <i class="ri-check-line"></i>
                            </div>
                            <span>Support prioritaire 7j/7</span>
                        </li>
                    </ul>
                    <a href="#" class="bg-white text-black px-6 py-3 !rounded-button whitespace-nowrap font-medium hover:bg-gray-100 transition inline-block">Demander un devis</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Témoignages -->
    <section class="py-16 bg-gray-50 relative overflow-hidden">
        <span class="absolute left-8 top-8 text-3xl animate-sparkle pointer-events-none select-none"></span>
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 animate-fadeInUp">Ce que nos clients disent <span class="inline-block animate-sparkle ml-2"></span></h2>
                <p class="text-gray-600 max-w-3xl mx-auto animate-fadeInUp delay-200">Découvrez les témoignages de nos clients satisfaits qui nous font confiance pour le développement de leur entreprise. <span class="inline-block animate-sparkle ml-1"></span></p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Témoignage 1 -->
                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="text-primary">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Grâce à DC-Knowing, nous avons pu structurer notre entreprise de manière efficace. Leur expertise juridique et financière nous a permis d'éviter de nombreux écueils et d'optimiser notre développement."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <i class="ri-user-line ri-lg text-gray-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Sebastien Augustin</h4>
                            <p class="text-gray-500 text-sm">Directeur, Ecotech Solutions</p>
                        </div>
                    </div>
                </div>
                
                <!-- Témoignage 2 -->
                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="text-primary">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Les solutions digitales de DC-Knowing ont transformé notre gestion quotidienne. Compta Flow nous fait gagner un temps précieux et nous permet de nous concentrer sur notre cœur de métier."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <i class="ri-user-line ri-lg text-gray-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">AFRICAMOOV</h4>
                            <p class="text-gray-500 text-sm">Fondateur, Artisan Numérique</p>
                        </div>
                    </div>
                </div>
                
                <!-- Témoignage 3 -->
                <div class="bg-white rounded-lg shadow-md p-6 border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="text-primary">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-half-fill"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"L'accompagnement de DC-Knowing dans notre recherche de financement a été déterminant. Leur expertise et leur réseau nous ont permis d'obtenir les fonds nécessaires pour notre expansion internationale."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-gray-200 rounded-full flex items-center justify-center mr-4">
                            <i class="ri-user-line ri-lg text-gray-500"></i>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Dylan Owen</h4>
                            <p class="text-gray-500 text-sm">CEO, Innovatech</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact -->
   <section id="contact" class="py-16 bg-white relative overflow-hidden">
    <!-- Coin haut droit : Lettre animée (contact/email) -->
    <span class="absolute right-8 top-8 w-8 h-8 animate-sparkle pointer-events-none select-none">
        <svg viewBox="0 0 24 24" fill="none">
            <rect x="3" y="7" width="18" height="10" rx="2" stroke="#bfa94a" stroke-width="2" fill="none"/>
            <polyline points="3 7 12 14 21 7" stroke="#bfa94a" stroke-width="2" fill="none">
                <animate attributeName="points" values="3 7 12 14 21 7;3 7 12 10 21 7;3 7 12 14 21 7" dur="1.2s" repeatCount="indefinite"/>
            </polyline>
        </svg>
    </span>
    <div class="container mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-12">
            <div class="lg:w-1/2">
                <h2 class="text-3xl font-bold text-gray-900 mb-4 animate-fadeInUp flex items-center gap-2">
                    Contactez-nous
                    <!-- Téléphone animé -->
                    <span class="inline-block animate-sparkle ml-2">
                        <svg class="w-7 h-7" viewBox="0 0 24 24" fill="none">
                            <path d="M6 2h12a2 2 0 012 2v16a2 2 0 01-2 2H6a2 2 0 01-2-2V4a2 2 0 012-2z" stroke="#bfa94a" stroke-width="2" fill="none"/>
                            <circle cx="12" cy="20" r="1.5" fill="#bfa94a">
                                <animate attributeName="r" values="1.5;2;1.5" dur="1.2s" repeatCount="indefinite"/>
                            </circle>
                        </svg>
                    </span>
                </h2>
                <p class="text-gray-600 mb-8 animate-fadeInUp delay-200 flex items-center gap-2">
                    Vous avez des questions ou souhaitez en savoir plus sur nos services ? N'hésitez pas à nous contacter, notre équipe d'experts est à votre disposition.
                    <!-- Message animé -->
                    <span class="inline-block animate-sparkle ml-1">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none">
                            <rect x="3" y="7" width="18" height="10" rx="2" stroke="#bfa94a" stroke-width="2" fill="none"/>
                            <polyline points="3 7 12 14 21 7" stroke="#bfa94a" stroke-width="2" fill="none">
                                <animate attributeName="points" values="3 7 12 14 21 7;3 7 12 10 21 7;3 7 12 14 21 7" dur="1.2s" repeatCount="indefinite"/>
                            </polyline>
                        </svg>
                    </span>
                </p>
                
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nom complet</label>
                            <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Votre nom">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="votre@email.com">
                        </div>
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Sujet</label>
                        <input type="text" id="subject" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Sujet de votre message">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Message</label>
                        <textarea id="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Votre message"></textarea>
                    </div>
                    
                    <div>
                        <button type="submit" class="bg-primary text-black px-6 py-3 !rounded-button whitespace-nowrap font-medium hover:bg-primary/90 transition">Envoyer le message</button>
                    </div>
                </form>
            </div>
            
            <div class="lg:w-1/2">
                <div class="bg-gray-50 rounded-lg p-8 h-full">
                    <h3 class="text-xl font-semibold text-gray-900 mb-6">Informations de contact</h3>
                    
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-black mr-4">
                                <i class="ri-map-pin-line ri-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900 mb-1">Adresse</h4>
                                <p class="text-gray-600">123 Avenue des Affaires, 75008 Paris, France</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-black mr-4">
                                <i class="ri-phone-line ri-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900 mb-1">Téléphone</h4>
                                <p class="text-gray-600">+33 1 23 45 67 89</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-black mr-4">
                                <i class="ri-mail-line ri-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900 mb-1">Email</h4>
                                <p class="text-gray-600">contact@dc-knowing.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-black mr-4">
                                <i class="ri-time-line ri-lg"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-gray-900 mb-1">Horaires d'ouverture</h4>
                                <p class="text-gray-600">Lundi - Vendredi: 9h00 - 18h00</p>
                                <p class="text-gray-600">Samedi - Dimanche: Fermé</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <h4 class="font-medium text-gray-900 mb-3">Suivez-nous</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-black hover:bg-primary/20 transition">
                                <i class="ri-linkedin-fill"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-black hover:bg-primary/20 transition">
                                <i class="ri-twitter-x-fill"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-black hover:bg-primary/20 transition">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary/10 rounded-full flex items-center justify-center text-black hover:bg-primary/20 transition">
                                <i class="ri-instagram-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter -->
   <section class="py-16 bg-primary">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-black mb-4">Restez informé</h2>
                <p class="text-black mb-8">Abonnez-vous à notre newsletter pour recevoir nos dernières actualités, conseils et offres spéciales.</p>
                
                <form class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
                    <input type="email" placeholder="Votre adresse email" class="flex-1 px-4 py-3 rounded border-none focus:ring-2 focus:ring-white/30 outline-none text-black">
                    <button type="submit" class="bg-white text-black px-6 py-3 !rounded-button whitespace-nowrap font-medium hover:bg-gray-100 transition">S'abonner</button>
                </form>
                
                <p class="text-black text-sm mt-4">En vous inscrivant, vous acceptez notre politique de confidentialité et de recevoir des emails de notre part.</p>
            </div>
        </div>
    </section>
    <div class="golden-line mx-auto my-6"></div>
@endsection


@section('scripts')
    <!-- Scripts spécifiques à la page d'accueil si nécessaire -->
    <script>
        // Scripts pour la validation des formulaires de la page d'accueil
    </script>
@endsection

{{-- 
    Déplacez le CSS ci-dessous dans un fichier séparé (par exemple, public/css/home.css) 
    et ajoutez dans votre layout/app.blade.php ou ici dans un @push('styles') :

    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
--}}
@push('styles')
<style>
:root {
    --primary: #FFD700;
}
.bg-primary { background-color: var(--primary); }
.text-primary { color: var(--primary); }
.border-primary { border-color: var(--primary); }
.rounded-button { border-radius: 25px; }
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px);}
    to { opacity: 1; transform: translateY(0);}
}
@keyframes bounceSlow {
    0%, 20%, 50%, 80%, 100% { transform: translateY(0);}
    40% { transform: translateY(-10px);}
    60% { transform: translateY(-5px);}
}
@keyframes countUp {
    from { transform: scale(1);}
    50% { transform: scale(1.1); color: var(--primary);}
    to { transform: scale(1);}
}
@keyframes float {
    0%, 100% { transform: translateY(0px);}
    50% { transform: translateY(-20px);}
}
@keyframes shimmer {
    0% { background-position: -200% 0;}
    100% { background-position: 200% 0;}
}
@keyframes sparkle {
    0%, 100% { opacity: 1; transform: scale(1);}
    50% { opacity: 0.7; transform: scale(1.2);}
}
.animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards;}
.animate-bounce-slow { animation: bounceSlow 3s infinite;}
.animate-countUp { animation: countUp 2s ease-in-out infinite;}
.animate-float { animation: float 6s ease-in-out infinite;}
.animate-shimmer {
    background: linear-gradient(90deg, transparent, rgba(255, 215, 0, 0.4), transparent);
    background-size: 200% 100%;
    animation: shimmer 3s infinite;
}
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s;
}
.btn-shine:hover::before { left: 100%;}
.particle {
    position: absolute;
    background: var(--primary);
    border-radius: 50%;
    pointer-events: none;
    opacity: 0.7;
}
.particle-1 { width: 8px; height: 8px; top: 20%; left: 10%; animation: float 4s ease-in-out infinite;}
.particle-2 { width: 6px; height: 6px; top: 60%; right: 15%; animation: float 5s ease-in-out infinite reverse;}
.particle-3 { width: 4px; height: 4px; top: 80%; left: 20%; animation: sparkle 3s ease-in-out infinite;}
.hero-overlay {
    background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, rgba(255, 255, 255, 0.9) 100%);
    position: absolute; inset: 0; z-index: 0;
}
.text-gold { color: #bfa94a; } /* Or doux, bien lisible sur fond blanc */
 .tab-btn {
        background: transparent;
        border: none;
        cursor: pointer;
    }

    .tab-btn:focus {
        outline: none;
    }

    .tab-btn:hover {
        color: #1d4ed8; /* bleu Tailwind */
    }
</style>
@endpush


