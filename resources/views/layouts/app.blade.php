<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'RH Flow - Gestion RH')</title>
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#1e3a8a',secondary:'#64748b'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon/favicon.ico') }}">
    <!-- Branding CSS -->
    <link rel="stylesheet" href="{{ asset('css/branding.css') }}">
    <!-- Custom Cursor CSS -->
    <link rel="stylesheet" href="{{ asset('css/cursor.css') }}">
    <style>
        :where([class^="ri-"])::before { content: "\f3c2"; }
        body {
            font-family: 'Inter', sans-serif;
        }
        .hero-gradient {
            background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(255,255,255,0.9) 70%, rgba(255,255,255,0) 100%);
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.1);
        }
        .custom-checkbox {
            position: relative;
            padding-left: 30px;
            cursor: pointer;
            user-select: none;
        }
        .custom-checkbox input {
            position: absolute;
            opacity: 0;
            cursor: pointer;
            height: 0;
            width: 0;
        }
        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            height: 20px;
            width: 20px;
            background-color: #fff;
            border: 2px solid #e5e7eb;
            border-radius: 4px;
        }
        .custom-checkbox:hover input ~ .checkmark {
            border-color: #1e3a8a;
        }
        .custom-checkbox input:checked ~ .checkmark {
            background-color: #1e3a8a;
            border-color: #1e3a8a;
        }
        .checkmark:after {
            content: "";
            position: absolute;
            display: none;
        }
        .custom-checkbox input:checked ~ .checkmark:after {
            display: block;
        }
        .custom-checkbox .checkmark:after {
            left: 6px;
            top: 2px;
            width: 5px;
            height: 10px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform: rotate(45deg);
        }
        .custom-switch {
            position: relative;
            display: inline-block;
            width: 48px;
            height: 24px;
        }
        .custom-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .switch-slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #e5e7eb;
            transition: .4s;
            border-radius: 24px;
        }
        .switch-slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 3px;
            bottom: 3px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .switch-slider {
            background-color: #1e3a8a;
        }
        input:checked + .switch-slider:before {
            transform: translateX(24px);
        }
    </style>
    <script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script>
</head>
<body class="bg-white">
    <!-- Header -->
    <header class="w-full bg-white shadow-sm fixed top-0 left-0 right-0 z-50">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <a href="https://dc-knowing.com/RH-Flow/" class="flex items-center">
                <img src="{{ asset('img/logos/logo.png') }}" width="100px" alt="logo">
            </a>
            <nav class="hidden md:flex items-center space-x-8">
                <a href="#fonctionnalites" class="text-gray-700 hover:text-primary font-medium transition-colors">Fonctionnalités</a>
                <a href="#avantages" class="text-gray-700 hover:text-primary font-medium transition-colors">Avantages</a>
                <a href="#tarifs" class="text-gray-700 hover:text-primary font-medium transition-colors">Tarifs</a>
                <a href="#contact" class="text-gray-700 hover:text-primary font-medium transition-colors">Contact</a>
                <a href="{{route('simulateur') }}" target="_blank" class="text-gray-700 hover:text-primary font-medium transition-colors">Simulateur</a>
            </nav>
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="hidden md:inline-block text-primary bg-white text-primary border border-primary px-6 py-2 rounded-button hover:text-primary/80 font-medium whitespace-nowrap">Se connecter</a>
                <!--<a href="#demo" class="bg-primary text-white px-6 py-2 rounded-button hover:bg-primary/90 transition-colors font-medium !rounded-button whitespace-nowrap">Demander une démo</a>-->
            </div>
            <button class="md:hidden flex items-center justify-center w-10 h-10 text-gray-700">
                <i class="ri-menu-line ri-xl"></i>
            </button>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="pt-24 pb-16 md:pt-32 md:pb-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-full h-full" style="background-image: url('https://readdy.ai/api/search-image?query=modern%20office%20environment%20with%20professional%20HR%20team%20working%20on%20digital%20solutions%2C%20clean%20minimalist%20workspace%20with%20blue%20accent%20colors%2C%20people%20looking%20at%20screens%20with%20HR%20software%20interfaces%2C%20soft%20lighting%2C%20professional%20atmosphere&width=1200&height=800&seq=1&orientation=landscape'); background-position: right center; background-size: cover; background-repeat: no-repeat;"></div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="w-full max-w-2xl hero-gradient py-16 px-8 md:px-12 rounded-lg">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Bienvenue sur RH-Flow</h1>
                <p class="text-xl md:text-2xl text-gray-700 mb-8">Simplifiez, automatisez et optimisez la gestion de vos ressources humaines.</p>
                <p class="text-gray-600 mb-10 max-w-xl">RH-Flow est la solution web et mobile tout-en-un pensée pour les entreprises modernes qui souhaitent fluidifier leur gestion RH, améliorer l'expérience collaborateur et gagner du temps sur les tâches administratives.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#tarifs" class="bg-primary text-white px-6 py-3 rounded-button hover:bg-primary/90 transition-colors font-medium text-center !rounded-button whitespace-nowrap">Créer un compte gratuit</a>
                    <a href="#contact" class="bg-white text-primary border border-primary px-6 py-3 rounded-button hover:bg-gray-50 transition-colors font-medium text-center !rounded-button whitespace-nowrap">Demander une démo</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="fonctionnalites" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Fonctionnalités clés</h2>
                <p class="text-gray-600">Découvrez comment RH-Flow peut transformer votre gestion des ressources humaines avec nos outils puissants et intuitifs.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white p-6 rounded-lg shadow-sm border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-calendar-check-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Gestion des congés et absences</h3>
                    <p class="text-gray-600 mb-4">Demande, validation, suivi en temps réel. Un calendrier partagé pour une vision claire et instantanée.</p>
                    <a href="#contact" class="text-primary font-medium flex items-center">
                        En savoir plus
                        <i class="ri-arrow-right-line ml-2"></i>
                    </a>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card bg-white p-6 rounded-lg shadow-sm border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-time-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Simplifiez vos déclarations fiscales</h3>
                    <p class="text-gray-600 mb-4">Exportez vos déclarations EFI et EDI vers le format XML en toute simplicité. Tout est désormais à portée de clic.</p>
                    <a href="#contact" class="text-primary font-medium flex items-center">
                        En savoir plus
                        <i class="ri-arrow-right-line ml-2"></i>
                    </a>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card bg-white p-6 rounded-lg shadow-sm border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-file-list-3-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Gestion des fiches de paie</h3>
                    <p class="text-gray-600 mb-4">Centralisez les bulletins de paie, contrats et autres documents administratifs dans un espace sécurisé.</p>
                    <a href="#contact" class="text-primary font-medium flex items-center">
                        En savoir plus
                        <i class="ri-arrow-right-line ml-2"></i>
                    </a>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card bg-white p-6 rounded-lg shadow-sm border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-team-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Suivi du personnel</h3>
                    <p class="text-gray-600 mb-4">Un espace individuel pour chaque collaborateur : coordonnées, poste, historique RH, entretiens, objectifs, etc.</p>
                    <a href="#contact" class="text-primary font-medium flex items-center">
                        En savoir plus
                        <i class="ri-arrow-right-line ml-2"></i>
                    </a>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card bg-white p-6 rounded-lg shadow-sm border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-message-3-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Communication interne</h3>
                    <p class="text-gray-600 mb-4">Notifications, messages et échanges centralisés pour rester connectés avec vos équipes.</p>
                    <a href="#contact" class="text-primary font-medium flex items-center">
                        En savoir plus
                        <i class="ri-arrow-right-line ml-2"></i>
                    </a>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card bg-white p-6 rounded-lg shadow-sm border border-gray-100 transition-all duration-300">
                    <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-smartphone-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Application mobile</h3>
                    <p class="text-gray-600 mb-4">Grâce à notre application mobile, vos équipes restent connectées, même en déplacement.</p>
                    <a href="#contact" class="text-primary font-medium flex items-center">
                        En savoir plus
                        <i class="ri-arrow-right-line ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="avantages" class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Pourquoi choisir RH-Flow ?</h2>
                <p class="text-gray-600">Découvrez les avantages qui font de RH-Flow la solution préférée des entreprises modernes.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Advantage 1 -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto bg-blue-50 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-layout-masonry-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Interface intuitive</h3>
                    <p class="text-gray-600">Une expérience utilisateur fluide et responsive, adaptée à tous les appareils.</p>
                </div>

                <!-- Advantage 2 -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto bg-blue-50 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-shield-check-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Données sécurisées</h3>
                    <p class="text-gray-600">Protection optimale de vos données avec un hébergement exclusivement en France.</p>
                </div>

                <!-- Advantage 3 -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto bg-blue-50 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-customer-service-2-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Accompagnement</h3>
                    <p class="text-gray-600">Support personnalisé à chaque étape, de l'implémentation à l'utilisation quotidienne.</p>
                </div>

                <!-- Advantage 4 -->
                <div class="text-center">
                    <div class="w-16 h-16 mx-auto bg-blue-50 rounded-full flex items-center justify-center mb-5">
                        <i class="ri-settings-line ri-xl text-primary"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-3">Intégration facile</h3>
                    <p class="text-gray-600">Compatibilité et synchronisation avec vos outils existants pour une transition en douceur.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Ce que nos clients disent</h2>
                <p class="text-gray-600">Découvrez comment RH-Flow transforme la gestion RH de nos clients.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="text-amber-400 flex">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"RH-Flow a révolutionné notre gestion RH. Nous avons gagné un temps précieux sur les tâches administratives et amélioré la satisfaction de nos collaborateurs."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-primary font-semibold">FB</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Franck Bakary</h4>
                            <p class="text-gray-500 text-sm">RH, B-Home</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="text-amber-400 flex">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"L'interface intuitive et l'application mobile ont été des atouts majeurs pour notre équipe. Le support client est également exceptionnel."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-primary font-semibold">BK</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Beatrice Kouakou</h4>
                            <p class="text-gray-500 text-sm">Comptable, La Fabrique</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
                    <div class="flex items-center mb-4">
                        <div class="text-amber-400 flex">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-6">"La gestion des congés et absences est devenue un jeu d'enfant. Nos collaborateurs apprécient la transparence et la simplicité du système."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                            <span class="text-primary font-semibold">DK</span>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-900">Djissa Kouamé</h4>
                            <p class="text-gray-500 text-sm">Responsable RH, Leader</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="tarifs" class="py-16 md:py-24">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Des forfaits adaptés à vos besoins</h2>
                <p class="text-gray-600">Choisissez la formule qui correspond le mieux à la taille et aux besoins de votre entreprise.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 max-w-5xl mx-auto">
                @if(isset($plans))
                    @foreach ($plans as $pack)
                        <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200 flex flex-col">
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">{{$pack->name}}</h3>
                            <div class="mb-4">
                                @if($pack->id == 100 || $pack->id == 102)
                                    <span class="text-xl font-bold text-gray-900">Sur mesure</span>
                                @else
                                    <span class="text-xl font-bold text-gray-900">{{number_format($pack->price, 0, ',', ' ')}} FCFA</span>
                                    <span class="text-gray-500">/mois</span><br>
                                    <span class="text-xl font-bold text-gray-900">{{number_format($pack->price_yearly, 0, ',', ' ')}} FCFA</span>
                                    <span class="text-gray-500">/an</span>
                                @endif
                            </div>
                            <ul class="space-y-2 mb-6 text-sm">
                                @if($pack->popular == 1)
                                    <li class="flex items-start bg-white text-primary border border-primary px-6 py-3 rounded-button">
                                        <span class="text-gray-900">Populaire</span>
                                    </li>
                                @endif
                                @php
                                    $features = $pack->features;
                                @endphp
                                @foreach ($features as $feature)
                                    <li class="flex items-start">
                                        <i class="ri-check-line text-green-500 mr-2"></i>
                                        <span class="text-gray-600">{{ trim($feature) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                            @if($pack->id == 100 || $pack->id == 102)
                                <a href="#contact" class="mt-auto bg-white text-primary border border-primary px-6 py-3 rounded-button hover:bg-gray-50 transition-colors font-medium text-center !rounded-button whitespace-nowrap">Nou contacter</a>
                            @else
                                <a href="{{ route('register',$pack->id) }}" class="mt-auto bg-primary text-white border border-primary px-6 py-3 rounded-button hover:bg-gray-50 transition-colors font-medium text-center !rounded-button whitespace-nowrap">Commencer</a>
                            @endif
                        </div>                    
                    @endforeach
                @endif
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section id="demo" class="py-16 md:py-24 bg-gradient-to-r from-blue-900 to-blue-600 text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Essayez RH-Flow dès maintenant</h2>
            <p class="text-xl mb-10 max-w-2xl mx-auto">Redonnez du souffle à votre gestion RH et concentrez-vous sur ce qui compte vraiment : vos collaborateurs.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#tarifs" class="bg-white text-primary px-8 py-3 rounded-button hover:bg-gray-100 transition-colors font-medium !rounded-button whitespace-nowrap">Créer un compte gratuit</a>
                <a href="#contact" class="bg-transparent text-white border border-white px-8 py-3 rounded-button hover:bg-white/10 transition-colors font-medium !rounded-button whitespace-nowrap">Demander une démo</a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 md:py-24">  
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Questions fréquentes</h2>
                <p class="text-gray-600">Tout ce que vous devez savoir sur RH-Flow</p>
            </div>

            <div class="max-w-3xl mx-auto divide-y divide-gray-200">
                <!-- FAQ Item 1 -->
                <div class="faq-item py-6">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-1" class="flex justify-between items-center w-full text-left focus-visible:ring-2 focus-visible:ring-primary focus-visible:outline-none rounded p-1">
                        <h3 class="text-lg font-semibold text-gray-900">Combien de temps faut-il pour implémenter RH-Flow ?</h3>
                        <i class="ri-arrow-down-s-line text-gray-500"></i>
                    </button>
                    <div id="faq-answer-1" class="mt-3 hidden">
                        <p class="text-gray-600">L'implémentation de RH-Flow est rapide et simple. Pour les petites entreprises, comptez environ 1 semaine. Pour les structures plus importantes, le délai peut varier de 2 à 4 semaines selon la complexité de vos besoins et le volume de données à migrer.</p>
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item py-6">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-2" class="flex justify-between items-center w-full text-left focus-visible:ring-2 focus-visible:ring-primary focus-visible:outline-none rounded p-1">
                        <h3 class="text-lg font-semibold text-gray-900">RH-Flow est-il compatible avec nos outils existants ?</h3>
                        <i class="ri-arrow-down-s-line text-gray-500"></i>
                    </button>
                    <div id="faq-answer-2" class="mt-3 hidden">
                        <p class="text-gray-600">Oui, RH-Flow s'intègre facilement avec la plupart des outils de gestion d'entreprise courants (ERP, CRM, outils comptables, etc.). Nous proposons des connecteurs standards pour les solutions les plus populaires et pouvons développer des intégrations sur mesure pour des besoins spécifiques.</p>
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item py-6">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-3" class="flex justify-between items-center w-full text-left focus-visible:ring-2 focus-visible:ring-primary focus-visible:outline-none rounded p-1">
                        <h3 class="text-lg font-semibold text-gray-900">Comment sont sécurisées nos données RH ?</h3>
                        <i class="ri-arrow-down-s-line text-gray-500"></i>
                    </button>
                    <div id="faq-answer-3" class="mt-3 hidden">
                        <p class="text-gray-600">La sécurité est notre priorité. Toutes vos données sont chiffrées, hébergées exclusivement en France dans des centres de données certifiés. Nous respectons scrupuleusement le RGPD et effectuons des audits de sécurité réguliers. Notre système de gestion des accès garantit que seules les personnes autorisées peuvent accéder aux informations sensibles.</p>
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item py-6">
                    <button type="button" aria-expanded="false" aria-controls="faq-answer-4" class="flex justify-between items-center w-full text-left focus-visible:ring-2 focus-visible:ring-primary focus-visible:outline-none rounded p-1">
                        <h3 class="text-lg font-semibold text-gray-900">Puis-je essayer RH-Flow avant de m'engager ?</h3>
                        <i class="ri-arrow-down-s-line text-gray-500"></i>
                    </button>
                    <div id="faq-answer-4" class="mt-3 hidden">
                        <p class="text-gray-600">Absolument ! Nous proposons une période d'essai gratuite de 14 jours avec accès à toutes les fonctionnalités. Vous pouvez également demander une démo personnalisée avec l'un de nos experts qui vous guidera à travers la plateforme et répondra à toutes vos questions.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 max-w-5xl mx-auto">
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-6">Contactez-nous</h2>
                    <p class="text-gray-600 mb-8">Vous avez des questions ? Notre équipe est là pour vous aider et vous accompagner dans votre projet.</p>

                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <i class="ri-mail-line text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Email</h3>
                                <p class="text-gray-600">support@dc-knowing.com</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <i class="ri-phone-line text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Téléphone</h3>
                                <p class="text-gray-600">+225 27 22 14 43 / 07 67 13 19 93</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center mr-4">
                                <i class="ri-map-pin-line text-primary"></i>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-1">Adresse</h3>
                                <sm class="text-gray-600">II Plateaux les oscars - Immeuble Yasmine</sm>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    @if(session('success'))
                        <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('contact') }}" method="POST" class="bg-white p-8 rounded-lg shadow-sm">
                        @csrf
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 font-medium mb-2">Nom</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded" placeholder="Votre nom" required>
                        </div>

                        <div class="mb-6">
                            <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded" placeholder="votre@email.com" required>
                        </div>

                        <div class="mb-6">
                            <label for="company" class="block text-gray-700 font-medium mb-2">Entreprise</label>
                            <input type="text" id="company" name="company" class="w-full px-4 py-2 border rounded" placeholder="Nom de votre entreprise">
                        </div>

                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded" placeholder="Comment pouvons-nous vous aider ?" required></textarea>
                        </div>

                        <div class="mb-6">
                            <label class="flex items-center">
                                <input type="checkbox" name="accept" class="mr-2" required>
                                <span class="text-gray-600">J'accepte de recevoir des informations de RH-Flow</span>
                            </label>
                        </div>

                        <button type="submit" class="w-full bg-primary text-white px-6 py-3 rounded-button hover:bg-primary/90 transition-colors font-medium !rounded-button whitespace-nowrap">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <a href="https://dc-knowing.com/RH-Flow" class="inline-block mb-6">
                        <img src="{{ Module::asset('LandingPage:Resources/style/img/icon/logo rh flow 1.png') }}" width="100px" alt="logo">
                    </a>
                    <p class="text-gray-400 mb-6">Simplifiez, automatisez et optimisez la gestion de vos ressources humaines.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="ri-linkedin-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="ri-twitter-x-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="ri-facebook-fill"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                            <i class="ri-instagram-fill"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Produit</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Fonctionnalités</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Tarifs</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Témoignages</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Ressources</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Guides</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">À propos</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Centre d'aide</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-semibold mb-6">Paiement</h3>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Paiement sécurisé par CinetPay</a></li>
                    </ul>
                    <img src="https://docs.cinetpay.com/images/latest_ci4.png" alt="Logo CinetPay" width="150px" class="mt-6">
                </div>
            </div>

            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <p class="text-gray-400 mb-4 md:mb-0">© 2025 RH-Flow. Tous droits réservés.</p>
                    <div class="flex space-x-6">
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Mentions légales</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">Politique de confidentialité</a>
                        <a href="#" class="text-gray-400 hover:text-white transition-colors">CGU</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ Accordion
            const faqButtons = document.querySelectorAll('.faq-item button');
            faqButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const content = button.nextElementSibling;
                    const icon = button.querySelector('i');
                    const isExpanded = button.getAttribute('aria-expanded') === 'true';

                    button.setAttribute('aria-expanded', !isExpanded);
                    if (isExpanded) {
                        content.classList.add('hidden');
                        content.style.display = 'none';
                        icon.classList.remove('ri-arrow-up-s-line');
                        icon.classList.add('ri-arrow-down-s-line');
                    } else {
                        content.classList.remove('hidden');
                        content.style.display = 'block';
                        icon.classList.remove('ri-arrow-down-s-line');
                        icon.classList.add('ri-arrow-up-s-line');
                    }
                });
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const menuButton = document.querySelector('.md\\:hidden');
            const mobileMenu = document.createElement('div');
            mobileMenu.className = 'fixed inset-0 bg-white z-50 transform translate-x-full transition-transform duration-300 ease-in-out';
            mobileMenu.innerHTML = `
                <div class="flex justify-between items-center p-4 border-b">
                    <span class="text-primary font-['Pacifico'] text-2xl">RH-Flow</span>
                    <button class="w-10 h-10 flex items-center justify-center text-gray-700">
                        <i class="ri-close-line ri-xl"></i>
                    </button>
                </div>
                <nav class="p-4">
                    <ul class="space-y-4">
                        <li><a href="#fonctionnalites" class="block py-2 text-gray-700 hover:text-primary font-medium">Fonctionnalités</a></li>
                        <li><a href="#avantages" class="block py-2 text-gray-700 hover:text-primary font-medium">Avantages</a></li>
                        <li><a href="#tarifs" class="block py-2 text-gray-700 hover:text-primary font-medium">Tarifs</a></li>
                        <li><a href="#contact" class="block py-2 text-gray-700 hover:text-primary font-medium">Contact</a></li>
                        <li class="pt-4 border-t"><a href="#" class="block py-2 text-gray-700 hover:text-primary font-medium">Se connecter</a></li>
                        <li><a href="#contact" class="block py-2 bg-primary text-white px-6 py-2 rounded-button text-center">Demander une démo</a></li>
                    </ul>
                </nav>
            `;
            document.body.appendChild(mobileMenu);

            menuButton.addEventListener('click', function() {
                mobileMenu.classList.remove('translate-x-full');
            });

            const closeButton = mobileMenu.querySelector('button');
            closeButton.addEventListener('click', function() {
                mobileMenu.classList.add('translate-x-full');
            });

            // Close mobile menu when clicking on links
            const mobileLinks = mobileMenu.querySelectorAll('a');
            mobileLinks.forEach(link => {
                link.addEventListener('click', function() {
                    mobileMenu.classList.add('translate-x-full');
                });
            });
        });
        function checkout() {
            CinetPay.setConfig({
                apikey: '291038086662625fc7026f9.57751076',//   YOUR APIKEY
                site_id: '5871268',//YOUR_SITE_ID
                notify_url: 'https://dc-knowing.com/RH-Flow/',
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
                amount: 5000,
                currency: 'XOF',
                channels: 'MOBILE_MONEY',
                description: 'Paiement du pack BASIC',
            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    if (alert("Votre paiement a échoué")) {
                        window.location.reload();
                    }
                } else if (data.status == "ACCEPTED") {
                    if (alert("Votre paiement a été effectué avec succès")) {
                        window.location.href = "https://dc-knowing.com/RH-Flow/register/2";
                    }
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
        function checkout1() {
            CinetPay.setConfig({
                apikey: '291038086662625fc7026f9.57751076',//   YOUR APIKEY
                site_id: '5871268',//YOUR_SITE_ID
                notify_url: 'https://dc-knowing.com/RH-Flow/',
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
                amount: 10000,
                currency: 'XOF',
                channels: 'MOBILE_MONEY',
                description: 'Paiement du pack PRO',
            });
            CinetPay.onSuccess(function(data) {
                if (!data) {
                    console.error("Aucune donnée reçue du processeur de paiement");
                    alert("Erreur de communication avec le processeur de paiement. Veuillez réessayer.");
                    return;
                }
                
                if (data.status === "REFUSED") {
                    if (confirm("Votre paiement a échoué. Souhaitez-vous réessayer ?")) {
                        window.location.reload();
                    }
                } else if (data.status === "ACCEPTED") {
                    if (confirm("Votre paiement a été effectué avec succès. Vous allez être redirigé vers votre espace membre.")) {
                        window.location.href = "https://dc-knowing.com/RH-Flow/register/3";
                    }
                } else {
                    console.error("Statut de paiement inconnu:", data);
                    alert("Nous avons reçu une réponse inattendue du processeur de paiement. Veuillez vérifier votre compte ou contacter le support.");
                }
            });
            
            CinetPay.onError(function(error) {
                console.error("Erreur de paiement:", error);
                alert("Une erreur est survenue lors du traitement de votre paiement. Veuillez réessayer ou contacter le support.");
            });
        }
        function checkout2() {
            CinetPay.setConfig({
                apikey: '291038086662625fc7026f9.57751076',//   YOUR APIKEY
                site_id: '5871268',//YOUR_SITE_ID
                notify_url: 'https://dc-knowing.com/RH-Flow/',
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
                amount: 50000,
                currency: 'XOF',
                channels: 'MOBILE_MONEY',
                description: 'Paiement du pack PRO MAX',

            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    if (alert("Votre paiement a échoué")) {
                        window.location.reload();
                    }
                } else if (data.status == "ACCEPTED") {
                    if (alert("Votre paiement a été effectué avec succès")) {
                        window.location.href = "https://dc-knowing.com/RH-Flow/register/8";
                    }
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
    </script>
    <!-- Custom Cursor JS -->
    <script src="{{ asset('js/cursor.js') }}" defer></script>
</body>
</html>
