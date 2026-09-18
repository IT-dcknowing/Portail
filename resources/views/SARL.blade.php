@extends('layouts.app')

@section('title', 'Créez votre SARL ultra rapidement !')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Section principale -->
    <div class="flex flex-col md:flex-row items-center justify-between mb-12">
        <div class="md:w-1/2">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Créez votre SARL ultra rapidement !</h1>
            <p class="text-gray-600 mb-6">Accompagnement personnalisé par un juriste dédié jusqu'à l'obtention du Kbis</p>
            
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Quel sera votre domaine d'activité ?</h2>
            
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                <!-- Consultants et freelance -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <p class="text-sm">Consultants et freelance</p>
                </div>
                
                <!-- Construction et travaux -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="9" width="20" height="11" rx="2" ry="2"></rect>
                            <path d="M12 9V5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v4"></path>
                            <path d="M8 21V7a2 2 0 0 0-2-2H2"></path>
                        </svg>
                    </div>
                    <p class="text-sm">Construction et travaux</p>
                </div>
                
                <!-- Automobile et transport -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="7" cy="17" r="2"></circle>
                            <circle cx="17" cy="17" r="2"></circle>
                            <path d="M5 17H3V6a1 1 0 0 1 1-1h16v12h-2"></path>
                            <path d="M14 8h-4"></path>
                            <path d="M9 8H7"></path>
                        </svg>
                    </div>
                    <p class="text-sm">Automobile et transport</p>
                </div>
                
                <!-- Vente en ligne -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="9" cy="21" r="1"></circle>
                            <circle cx="20" cy="21" r="1"></circle>
                            <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                        </svg>
                    </div>
                    <p class="text-sm">Vente en ligne</p>
                </div>
                
                <!-- Commerce -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                            <circle cx="8.5" cy="8.5" r="1.5"></circle>
                            <path d="M20.4 14.5L16 10l-4 4-4-4-4 4-4.4-4.5"></path>
                        </svg>
                    </div>
                    <p class="text-sm">Commerce</p>
                </div>
                
                <!-- Informatique et web -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"></rect>
                            <line x1="8" y1="21" x2="16" y2="21"></line>
                            <line x1="12" y1="17" x2="12" y2="21"></line>
                        </svg>
                    </div>
                    <p class="text-sm">Informatique et web</p>
                </div>
                
                <!-- Achat et revente -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                    <p class="text-sm">Achat et revente</p>
                </div>
                
                <!-- Santé et beauté -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                        </svg>
                    </div>
                    <p class="text-sm">Santé et beauté</p>
                </div>
                
                <!-- Services à la personne -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                    </div>
                    <p class="text-sm">Services à la personne</p>
                </div>
                
                <!-- Restauration -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 8h1a4 4 0 0 1 0 8h-1"></path>
                            <path d="M3 8h18v9a4 4 0 0 1-4 4H7a4 4 0 0 1-4-4V8z"></path>
                            <line x1="3" y1="12" x2="21" y2="12"></line>
                        </svg>
                    </div>
                    <p class="text-sm">Restauration</p>
                </div>
                
                <!-- Services aux entreprises -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="2.18" ry="2.18"></rect>
                            <line x1="7" y1="2" x2="7" y2="22"></line>
                            <line x1="17" y1="2" x2="17" y2="22"></line>
                            <line x1="2" y1="12" x2="22" y2="12"></line>
                            <line x1="2" y1="7" x2="7" y2="7"></line>
                            <line x1="2" y1="17" x2="7" y2="17"></line>
                            <line x1="17" y1="17" x2="22" y2="17"></line>
                            <line x1="17" y1="7" x2="22" y2="7"></line>
                        </svg>
                    </div>
                    <p class="text-sm">Services aux entreprises</p>
                </div>
                
                <!-- Autres -->
                <div class="bg-white rounded-lg p-4 border border-gray-200 flex flex-col items-center text-center hover:shadow-md transition">
                    <div class="mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <line x1="12" y1="8" x2="12" y2="12"></line>
                            <line x1="12" y1="16" x2="12.01" y2="16"></line>
                        </svg>
                    </div>
                    <p class="text-sm">Autres</p>
                </div>
            </div>
            
            <div class="flex items-center mb-4">
                <div class="flex items-center mr-4">
                    <span class="font-bold text-gray-800 mr-1">4.5/5</span>
                    <div class="flex text-yellow-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                    </div>
                </div>
                <div class="flex items-center">
                    <span class="font-bold text-gray-800 mr-1">Excellent</span>
                    <span class="text-gray-600 mr-1">4.4 sur 5</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2z"></path>
                    </svg>
                </div>
            </div>
            
            <p class="text-gray-600">+300 000 sociétés accompagnées par DC-KNOWING</p>
        </div>
        
        <div class="md:w-1/2 mt-8 md:mt-0 flex justify-center">
            <img src="/public/images/business-person-female-with-a-cane-svgrepo-com.svg" alt="Illustration" class="w-full max-w-md">
        </div>
    </div>
    
    <!-- Section Comment ça marche -->

    <div class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Comment ça marche ?</h2>
        
        <div class="flex flex-col md:flex-row">
            <div class="md:w-1/2 flex justify-center mb-8 md:mb-0">
                <img src="/images/business-person-male-with-a-cane-svgrepo-com.svg" alt="Étapes" class="w-full max-w-md">
            </div>
            
            <div class="md:w-1/2">
                <div class="relative pl-8 pb-8">
                    <div class="absolute left-0 top-0 h-full border-l-2 border-gray-300"></div>
                    
                    <div class="relative mb-6">
                        <div class="absolute left-0 -ml-4 bg-white">
                            <div class="w-8 h-8 rounded-full bg-blue-400 flex items-center justify-center">
                                <span class="text-white text-sm font-bold">1</span>
                            </div>
                        </div>
                        <p class="text-gray-700 pl-6">Vous complétez le questionnaire.</p>
                    </div>
                    
                    <div class="relative mb-6">
                        <div class="absolute left-0 -ml-4 bg-white">
                            <div class="w-8 h-8 rounded-full bg-blue-400 flex items-center justify-center">
                                <span class="text-white text-sm font-bold">2</span>
                            </div>
                        </div>
                        <p class="text-gray-700 pl-6">Nous préparons votre dossier pour qu'il soit conforme.</p>
                    </div>
                    
                    <div class="relative mb-6">
                        <div class="absolute left-0 -ml-4 bg-white">
                            <div class="w-8 h-8 rounded-full bg-blue-400 flex items-center justify-center">
                                <span class="text-white text-sm font-bold">3</span>
                            </div>
                        </div>
                        <p class="text-gray-700 pl-6">Nous déposons votre dossier auprès du greffe.</p>
                    </div>
                    
                    <div class="relative mb-6">
                        <div class="absolute left-0 -ml-4 bg-white">
                            <div class="w-8 h-8 rounded-full bg-blue-400 flex items-center justify-center">
                                <span class="text-white text-sm font-bold">4</span>
                            </div>
                        </div>
                        <p class="text-gray-700 pl-6">Nous assurons la gestion des échanges avec le greffe.</p>
                    </div>
                    
                    <div class="relative mb-6">
                        <div class="absolute left-0 -ml-4 bg-white">
                            <div class="w-8 h-8 rounded-full bg-blue-400 flex items-center justify-center">
                                <span class="text-white text-sm font-bold">5</span>
                            </div>
                        </div>
                        <p class="text-gray-700 pl-6">Votre entreprise est créée !</p>
                    </div>
                    
                    <div class="relative">
                        <div class="absolute left-0 -ml-4 bg-white">
                            <div class="w-8 h-8 rounded-full bg-blue-400 flex items-center justify-center">
                                <span class="text-white text-sm font-bold">6</span>
                            </div>
                        </div>
                        <p class="text-gray-700 pl-6">Vous pouvez démarrer votre activité !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Section Pourquoi LegalPlace -->
    <div class="mb-16">
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Pourquoi DC KNOWING  ?</h2>
        
        <div class="flex flex-col md:flex-row items-center mb-12">
            <div class="md:w-1/2 mb-8 md:mb-0 flex justify-center">
                <img src="/images/5894.jpg" alt="Pourquoi nous" class="w-full max-w-sm">
            </div>
            
            <div class="md:w-1/2 pl-0 md:pl-8">
                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-gray-700">Notre service a été construit par des comptables</p>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-gray-700">Vos données sont en sécurité</p>
                    </div>
                </div>
                
                <div class="mb-4">
                    <div class="flex items-center mb-2">
                        <div class="w-6 h-6 rounded-full bg-green-500 flex items-center justify-center mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <p class="text-gray-700">Vous êtes satisfait ou remboursé</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Des services pensés pour vos besoins</h2>
        
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Création de société -->
            <div class="bg-white rounded-lg p-6 text-center hover:shadow-md transition">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Création de société</h3>
                <p class="text-sm text-gray-600">Vous remplissez un questionnaire en ligne afin d'éditer vos statuts et nous nous occupons de toutes les démarches</p>
            </div>
            
            <!-- Dépôt de capital -->
            <div class="bg-white rounded-lg p-6 text-center hover:shadow-md transition">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Dépôt de capital</h3>
                <p class="text-sm text-gray-600">Déposez votre capital en ligne facilement grâce à DC-KNOWING Pro et obtenez votre certificat de dépôt en 12h</p>
            </div>
            
            <!-- Compte pro en ligne -->
            <div class="bg-white rounded-lg p-6 text-center hover:shadow-md transition">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2"></rect>
                            <rect x="6" y="8" width="12" height="4"></rect>
                            <line x1="6" y1="14" x2="6.01" y2="14"></line>
                            <line x1="10" y1="14" x2="10.01" y2="14"></line>
                            <line x1="14" y1="14" x2="14.01" y2="14"></line>
                            <line x1="18" y1="14" x2="18.01" y2="14"></line>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Compte pro en ligne</h3>
                <p class="text-sm text-gray-600">Un abonnement au compte professionnel vous est proposé pendant 12 mois.</p>
            </div>
            
            <!-- Domiciliation -->
            <div class="bg-white rounded-lg p-6 text-center hover:shadow-md transition">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                            <circle cx="12" cy="10" r="3"></circle>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Domiciliation</h3>
                <p class="text-sm text-gray-600">Domiciliez votre entreprise en ligne afin de bénéficier d'une adresse prestigieuse à Paris</p>
            </div>
            
            <!-- Service expert comptable -->
            <div class="bg-white rounded-lg p-6 text-center hover:shadow-md transition">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Service expert comptable</h3>
                <p class="text-sm text-gray-600">Votre comptable disponible, réactif avec un logiciel de suivi simple et efficace pour être enfin serein sur sa comptabilité.</p>
            </div>
            
            <!-- Assistance LegalPlace -->
            <div class="bg-white rounded-lg p-6 text-center hover:shadow-md transition">
                <div class="flex justify-center mb-4">
                    <div class="bg-blue-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"></circle>
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path>
                            <line x1="12" y1="17" x2="12.01" y2="17"></line>
                        </svg>
                    </div>
                </div>
                <h3 class="text-lg font-semibold text-gray-800 mb-2">Assistance DC-KNOWING</h3>
                <p class="text-sm text-gray-600">Accédez à des milliers de documents juridiques personnalisables (contrat de CDI, CGV, etc) ainsi qu'à une assistance juridique.</p>
            </div>
        </div>
    </div>
</div>
@endsection