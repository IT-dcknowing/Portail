@extends('layouts.app')

@section('content')

    <!-- Main Content -->
<div class="container mx-auto px-4 py-12">
      
          <!-- Hero Section -->
          
          <!-- Navigation -->
<div class="flex justify-start pt-8 mb-10">
    <a href="javascript:void(0);" 
       id="prev-btn" 
       class="prev-step-btn flex items-center px-6 py-3 rounded-lg text-gray-700 hover:bg-gray-50 font-medium border border-gray-300 transition duration-150 ease-in-out">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
        </svg>
        <span>Retour</span>
    </a>
</div>

<script>
    document.getElementById('prev-btn').addEventListener('click', function() {
        // Si l'utilisateur a une page précédente dans l'historique, revenir
        if (document.referrer) {
            window.history.back();
        } else {
            // Sinon, rediriger vers l'accueil ou une autre page de fallback
            window.location.href = "{{ url('/') }}";
        }
    });
</script>

        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                Créez votre <span class="gradient-text">entreprise</span> en 
                <span class="gradient-text">Côte d'Ivoire</span>
            </h1>
            <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto">
                Accompagnement personnalisé par nos experts juridiques jusqu'à l'obtention de votre certificat de création
            </p>
            <div class="flex items-center justify-center space-x-8 mb-8">
                <div class="flex items-center">
                    <div class="flex text-yellow-400 mr-2">
                        <!-- étoiles SVG inchangées -->
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        </svg>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                    </div>
                    <span class="font-bold text-gray-800">4.8/5</span>
                </div>
                <div class="text-gray-600">
                    <span class="font-semibold">+500</span> entreprises créées en Côte d'Ivoire
                </div>
            </div>
        </div> 

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
                <form method="POST" action="{{ route('storeSociete') }}">
                    @csrf
                    <input type="hidden" name="gjj" value="creation_entreprise">

                    <div x-data="{ step: 1 }" class="bg-black from-orange-500 to-red-500 rounded-xl shadow-lg p-8">
                       
                        
                        <!-- Étape 1 -->
                        <template x-if="step === 1">
                            <div>
                                <div class="flex items-center justify-between mb-6">
                                    <span class="text-sm font-semibold text-white">Étape 1 sur 3</span>
                                    <div class="flex space-x-2">
                                        <span class="w-3 h-3 rounded-full bg-white"></span>
                                        <span class="w-3 h-3 rounded-full bg-white/50"></span>
                                        <span class="w-3 h-3 rounded-full bg-white/50"></span>
                                    </div>
                                </div>
                                <h2 class="text-2xl font-bold text-yellow-400 mb-8">Informations générales de votre entreprise</h2>
                                
                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-yellow-400 font-medium mb-2">Forme juridique *</label>
                                        <select name="formejuridique" id="forme_juridique" class="w-full px-4 py-2 rounded-lg bg-white/90 text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400" required>
                                            <option value="test">Sélectionner la forme juridique</option>
                                            <option value="sasu">SASU</option>
                                            <option value="sas">SAS</option>
                                            <option value="sarl">SARL</option>
                                            <option value="sa">SA</option>
                                            <option value="snc">SNC</option>
                                            <option value="autre">Autre</option>
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-yellow-400 font-medium mb-2">Dénomination sociale *</label>
                                        <input name="denomination" type="text" class="w-full px-4 py-2 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Ex: NOM DE VOTRE ENTREPRISE" required>
                                        <p class="text-white/80 text-xs mt-1">Le nom de votre entreprise tel qu'il apparaîtra sur tous les documents officiels</p>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-yellow-400 text-sm font-medium mb-2">Capital social *</label>
                                            <input name="capital" type="number" min="0" class="w-full px-4 py-2 rounded-lg bg-white/90 text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Montant du capital social" required>
                                        </div>
                                        <div>
                                            <label class="block text-yellow-400 text-sm font-medium mb-2">Nombre d'associés/actionnaires *</label>
                                            <input name="nombre_associes" type="number" min="1" class="w-full px-4 py-2 rounded-lg bg-white/90 text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Nombre d'associés/actionnaires" required>
                                        </div>
                                    </div>
                                    <div>
                                        <label class="block text-yellow-400 text-sm font-medium mb-2">Objet social *</label>
                                        <textarea name="objet_social" class="w-full px-4 py-2 rounded-lg bg-white/90 text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400" rows="3" placeholder="Décrivez l'activité principale de votre entreprise..." required></textarea>
                                    </div>
                                    
                                    <div>
                                        <label class="block text-yellow-400 text-sm font-medium mb-2">Siège social *</label>
                                        <input name="siege_social" type="text" class="w-full px-4 py-2 rounded-lg bg-white/90 text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Adresse complète du siège social" required>
                                    </div>
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-yellow-400 text-sm font-medium mb-2">Ville *</label>
                                            <select name="ville" class="w-full px-4 py-2 rounded-lg bg-white/90 text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400" required>
                                                <option value="">Sélectionner une ville</option>
                                                <option value="abidjan">Abidjan</option>
                                                <option value="bouake">Bouaké</option>
                                                <option value="yamoussoukro">Yamoussoukro</option>
                                                <option value="korhogo">Korhogo</option>
                                                <option value="san-pedro">San-Pédro</option>
                                                <option value="autre">Autre ville</option>
                                            </select>
                                        </div>
                                        <div>
                                            <label class="block text-yellow-400 text-sm font-medium mb-2">Durée de l'entreprise *</label>
                                            <input name="duree" type="number" min="1" max="99" class="w-full px-4 py-2 rounded-lg bg-white/90 text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Durée en années" required>
                                        </div>
                                    </div>
                                    <div class="pt-4">
                                        <button type="button" @click="step = 2" class="w-full bg-white text-yellow-400 font-bold py-3 rounded-lg shadow hover:bg-primary-50 transition flex items-center justify-center">
                                            <span class="text-yellow-400">Continuer vers l'étape 2</span>
                                            <svg class="inline-block ml-2 h-5 w-5 text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <!-- Étape 2 -->
                        <template x-if="step === 2">
                            <div>
                                <div class="flex items-center justify-between mb-6">
                                    <span class="text-sm font-semibold text-white">Étape 2 sur 3</span>
                                    <div class="flex space-x-2">
                                        <span class="w-3 h-3 rounded-full bg-white"></span>
                                        <span class="w-3 h-3 rounded-full bg-white"></span>
                                        <span class="w-3 h-3 rounded-full bg-white/50"></span>
                                    </div>
                                </div>
                                <h2 class="text-2xl font-bold text-yellow-400 mb-8">Informations sur le représentant légal</h2>
                                
                                <div class="space-y-6">
                                    <div>
                                        <label class="block text-yellow-400 font-medium mb-2">Nom complet *</label>
                                        <input name="nom" type="text" class="w-full px-4 py-2 rounded-lg bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-orange-400" placeholder="Nom et prénoms du représentant légal">
                                    </div>
                                </div>
                            </div>
                        </template>
                        <div class="mt-6">
                            <button type="submit" class="w-full bg-blue-500 text-white py-3 rounded-lg font-bold hover:bg-blue-600 transition">
                                Tester la soumission
                            </button>
                        </div>

                          
                    </div>
                </form>
            <!-- Avantages et informations -->
            <div class="space-y-8">
                <div class="floating-element">
                    <div class="advantage-card">
                        <div class="flex items-start space-x-4">
                            <div class="bg-green-100 p-3 rounded-lg">
                                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-2">Accompagnement expert</h3>
                                <p class="text-gray-600">Nos juristes spécialisés en droit ivoirien vous accompagnent à chaque étape</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="advantage-card">
                    <div class="flex items-start space-x-4">
                        <div class="bg-blue-100 p-3 rounded-lg">
                            <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Création rapide</h3>
                            <p class="text-gray-600">Votre entreprise créée en 7 à 15 jours ouvrables selon la complexité du dossier</p>
                        </div>
                    </div>
                </div>
                
                <div class="advantage-card">
                    <div class="flex items-start space-x-4">
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <svg class="h-8 w-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">Documents conformes</h3>
                            <p class="text-gray-600">Statuts et tous documents préparés selon la législation ivoirienne en vigueur</p>
                        </div>
                    </div>
                </div>
                
                <!-- Informations entreprise -->
                <div class="bg-black from-orange-50 to-red-50 border border-orange-200 rounded-lg p-6" id="info-creation">
                    <h3 class="text-lg font-semibold text-white mb-4">Informations générales sur la création d'entreprise en Côte d'Ivoire</h3>
                    <ul class="space-y-3 text-sm text-white">
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                            <span>Capital minimum variable selon la forme juridique</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                            <span>Nombre d'associés/actionnaires selon la forme choisie</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                            <span>Conseil d'administration ou gérance selon la structure</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                            <span>Commissaire aux comptes selon la taille et la forme</span>
                        </li>
                        <li class="flex items-start">
                            <div class="w-2 h-2 bg-yellow-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                            <span>Durée maximum généralement 99 ans</span>
                        </li>
                    </ul>
                    <p class="text-xs text-white/70 mt-2">Les conditions varient selon la forme d'entreprise (SARL, SA, SAS, SNC, etc.).</p>
                </div>
                
                <!-- Tarifs -->
                <div class="bg-gray-900 text-white rounded-lg p-6">
                    <h3 class="text-lg font-semibold mb-4">Tarifs transparents</h3>
                    <div class="flex items-center justify-between mb-4">
                        <span>Frais de service DC-KNOWING</span>
                        <span class="font-bold">À partir de 250 000 FCFA</span>
                    </div>
                    <div class="flex items-center justify-between mb-4">
                        <span>Frais officiels CEPICI</span>
                        <span class="font-bold">Selon la forme juridique</span>
                    </div>
                    <hr class="border-gray-700 my-4">
                    <div class="flex items-center justify-between text-lg font-bold">
                        <span>Total à partir de</span>
                        <span>Variable</span>
                    </div>
                    <p class="text-sm text-gray-400 mt-2">Paiement en plusieurs fois possible</p>
                </div>
            </div>
        </div>
    </div>
<script src="//unpkg.com/alpinejs" defer></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fonction pour fermer les messages
        window.closeMessage = function(id) {
            document.getElementById(id)?.remove();
        };

        // Validation avant soumission
        const form = document.getElementById('forme_juridique');
        if (form) {
            form.addEventListener('submit', function(e) {
                // Valider tous les champs requis
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!field.value.trim()) {
                        field.classList.add('border', 'border-red-500');
                        isValid = false;
                        
                        // Scroll vers le premier champ invalide
                        if (isValid === false) {
                            field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                            isValid = true; // Pour ne pas scroller sur chaque champ
                        }
                    } else {
                        field.classList.remove('border', 'border-red-500');
                    }
                });

                if (!isValid) {
                    e.preventDefault();
                    alert('Veuillez remplir tous les champs obligatoires marqués d\'un astérisque (*)');
                }
            });
        }

        // Gestion des étapes - Alpine.js
        document.addEventListener('alpine:init', () => {
            Alpine.data('formSteps', () => ({
                step: 1,
                nextStep() {
                    // Valider les champs de l'étape actuelle avant de continuer
                    const currentStepFields = this.$el.querySelectorAll(`[x-show="step === ${this.step}"] [required]`);
                    let isValid = true;

                    currentStepFields.forEach(field => {
                        if (!field.value.trim()) {
                            field.classList.add('border', 'border-red-500');
                            isValid = false;
                            
                            // Scroll vers le premier champ invalide
                            if (isValid === false) {
                                field.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                isValid = true; // Pour ne pas scroller sur chaque champ
                            }
                        }
                    });

                    if (isValid && this.step < 3) {
                        this.step++;
                    }
                },
                prevStep() {
                    if (this.step > 1) {
                        this.step--;
                    }
                }
            }));
        });
    });
</script>
<script>
    // Fonction pour fermer les messages
    function closeMessage(elementId) {
        const element = document.getElementById(elementId);
        if (element) {
            element.style.transition = 'opacity 0.3s ease-out';
            element.style.opacity = '0';
            setTimeout(() => {
                element.remove();
            }, 300);
        }
    }

    // Auto-fermeture du message de succès après 5 secondes
    document.addEventListener('DOMContentLoaded', function() {
        const successMessage = document.getElementById('success-message');
        if (successMessage) {
            setTimeout(() => {
                closeMessage('success-message');
            }, 5000);
        }
    });
</script>
@endsection

