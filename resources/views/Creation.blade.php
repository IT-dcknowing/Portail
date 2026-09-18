<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC-KNOWING — Création Entreprise</title>
  <meta name="description" content="Créez votre entreprise en Côte d'Ivoire avec l'accompagnement expert de DC-KNOWING. De la rédaction des statuts à l'immatriculation CEPICI.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <style>
    /* Custom Styles for Creation Page */
    .gradient-text {
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .advantage-card {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 24px;
      transition: transform 0.3s ease, border-color 0.3s ease;
    }
    .advantage-card:hover {
      transform: translateY(-5px);
      border-color: var(--or-base);
    }
    [x-cloak] { display: none !important; }
  </style>
</head>
<body>

  <!-- Curseur Custom -->
  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <!-- Navigation -->
  <nav id="navbar">
    <a href="{{ url('/') }}" class="nav-logo">
      <img src="{{ asset('images/Logo blanc.png') }}" alt="DC-KNOWING" class="nav-logo-mark">
    </a>
    <ul class="nav-links">
      <li><a href="{{ url('/') }}#services">Services</a></li>
      <li><a href="{{ url('/') }}#offres">Offres</a></li>
      <li class="nav-dropdown" style="position:relative;" onmouseenter="this.querySelector('.dropdown-menu').style.display='block'" onmouseleave="this.querySelector('.dropdown-menu').style.display='none'">
        <a href="{{ url('/') }}#digital">Solutions digitales</a>
        <ul class="dropdown-menu" style="display:none; position:absolute; top:100%; left:0; background:#111; padding:10px 0; border:1px solid #2a2a2a; border-radius:4px; min-width: 180px; z-index: 100; list-style: none;">
          <li style="padding: 5px 20px;"><a href="{{ url('/') }}#digital" style="text-transform: none; color: #fff; font-size: 13px;">RH Flow</a></li>
          <li style="padding: 5px 20px;"><a href="{{ url('/') }}#digital" style="text-transform: none; color: #fff; font-size: 13px;">Compta Flow</a></li>
          <li style="padding: 5px 20px;"><a href="{{ url('/') }}#digital" style="text-transform: none; color: #fff; font-size: 13px;">Sell Flow</a></li>
          <li style="padding: 5px 20px;"><a href="{{ url('/') }}#digital" style="text-transform: none; color: #fff; font-size: 13px;">Legal Flow</a></li>
        </ul>
      </li>
      <li><a href="{{ route('services.formation') }}">Formation</a></li>
      <li><a href="{{ url('/') }}#mes-devis">Mes Devis</a></li>
      <li><a href="{{ url('/') }}#contact">Contact</a></li>
    </ul>
    <a href="{{ url('/') }}#contact" class="nav-cta"><span>Consultation offerte</span></a>
  </nav>

  <main style="padding-top: 100px;">
    
    <div class="container mx-auto px-4 py-12">
        
        <!-- Flash Messages -->
        @if(session('success'))
            <div class="mb-8 p-4 bg-green-500/20 border border-green-500 text-green-500 rounded-lg text-center">
                {{ session('success') }}
            </div>
        @endif

        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white">
                Créez votre <span class="gradient-text">entreprise</span> en 
                <span class="gradient-text">Côte d'Ivoire</span>
            </h1>
            <p class="text-xl text-gray-400 mb-8 max-w-3xl mx-auto">
                Accompagnement personnalisé par nos experts juridiques jusqu'à l'obtention de votre certificat de création
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <!-- Multi-step Form -->
            <form method="POST" action="{{ route('storeSociete') }}" id="creationForm">
                @csrf
                <input type="hidden" name="gjj" value="creation_entreprise">

                <div x-data="{ step: 1 }" class="bg-[#111] border border-[#2a2a2a] rounded-xl shadow-lg p-8">
                    
                    <!-- Étape 1 -->
                    <div x-show="step === 1" x-transition>
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-sm font-semibold text-gray-400">Étape 1 sur 3</span>
                            <div class="flex space-x-2">
                                <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                                <span class="w-3 h-3 rounded-full bg-gray-700"></span>
                                <span class="w-3 h-3 rounded-full bg-gray-700"></span>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-8">Informations générales de l'entreprise</h2>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-400 text-sm font-medium mb-2">Forme juridique *</label>
                                <select name="formejuridique" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" required>
                                    <option value="">Sélectionner</option>
                                    <option value="sasu">SASU</option>
                                    <option value="sas">SAS</option>
                                    <option value="sarl">SARL</option>
                                    <option value="sa">SA</option>
                                    <option value="autre">Autre</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm font-medium mb-2">Dénomination sociale *</label>
                                <input name="denomination" type="text" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="Ex: MON ENTREPRISE SARL" required>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-400 text-sm font-medium mb-2">Capital social (FCFA) *</label>
                                    <input name="capital" type="number" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="1 000 000" required>
                                </div>
                                <div>
                                    <label class="block text-gray-400 text-sm font-medium mb-2">Associés *</label>
                                    <input name="nombre_associes" type="number" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="Nombre" required>
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm font-medium mb-2">Objet social (Activités) *</label>
                                <textarea name="objet_social" rows="3" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="Décrivez l'activité..." required></textarea>
                            </div>
                            
                            <div class="pt-4">
                                <button type="button" @click="step = 2" class="w-full bg-yellow-500 text-black font-bold py-3 rounded-lg hover:brightness-110 transition flex items-center justify-center">
                                    Continuer vers l'étape 2
                                    <svg class="ml-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Étape 2 -->
                    <div x-show="step === 2" x-transition x-cloak>
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-sm font-semibold text-gray-400">Étape 2 sur 3</span>
                            <div class="flex space-x-2">
                                <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                                <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                                <span class="w-3 h-3 rounded-full bg-gray-700"></span>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-8">Représentation & Localisation</h2>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-400 text-sm font-medium mb-2">Nom du représentant légal *</label>
                                <input name="nom" type="text" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="Nom et prénoms" required>
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm font-medium mb-2">Siège social *</label>
                                <input name="siege_social" type="text" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="Adresse complète" required>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-gray-400 text-sm font-medium mb-2">Ville *</label>
                                    <input name="ville" type="text" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="Abidjan" required>
                                </div>
                                <div>
                                    <label class="block text-gray-400 text-sm font-medium mb-2">Durée (Années) *</label>
                                    <input name="duree" type="number" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="Généralement 99" required>
                                </div>
                            </div>
                            <div class="flex space-x-4 pt-4">
                                <button type="button" @click="step = 1" class="flex-1 border border-[#2a2a2a] text-white font-bold py-3 rounded-lg hover:bg-gray-800 transition">Retour</button>
                                <button type="button" @click="step = 3" class="flex-2 bg-yellow-500 text-black font-bold py-3 px-6 rounded-lg hover:brightness-110 transition">Étape finale</button>
                            </div>
                        </div>
                    </div>

                    <!-- Étape 3 -->
                    <div x-show="step === 3" x-transition x-cloak>
                        <div class="flex items-center justify-between mb-6">
                            <span class="text-sm font-semibold text-gray-400">Étape 3 sur 3</span>
                            <div class="flex space-x-2">
                                <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                                <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                                <span class="w-3 h-3 rounded-full bg-yellow-500"></span>
                            </div>
                        </div>
                        <h2 class="text-2xl font-bold text-white mb-8">Contact & Validation</h2>
                        
                        <div class="space-y-6">
                            <div>
                                <label class="block text-gray-400 text-sm font-medium mb-2">Votre Email *</label>
                                <input name="email" type="email" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="votre@email.com" required>
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm font-medium mb-2">Votre Téléphone *</label>
                                <input name="telephone" type="tel" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="+225 XX XX XX XX XX" required>
                            </div>
                            <div>
                                <label class="flex items-start text-sm text-gray-400 cursor-pointer">
                                    <input type="checkbox" required class="mt-1 mr-3">
                                    <span>Je certifie l'exactitude des informations et accepte d'être recontacté pour la rédaction de mes statuts.</span>
                                </label>
                            </div>
                            <div class="flex space-x-4 pt-4">
                                <button type="button" @click="step = 2" class="flex-1 border border-[#2a2a2a] text-white font-bold py-3 rounded-lg hover:bg-gray-800 transition">Retour</button>
                                <button type="submit" class="flex-2 bg-yellow-500 text-black font-bold py-3 px-8 rounded-lg hover:brightness-110 transition">Créer mon entreprise</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Sidebar Info -->
            <div class="space-y-8">
                <div class="advantage-card rounded-xl">
                    <div class="flex items-start space-x-4">
                        <div class="text-3xl text-yellow-500 mt-1">🚀</div>
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-2">Création rapide</h3>
                            <p class="text-gray-400 text-sm">Votre entreprise immatriculée en 72h après finalisation du dossier au CEPICI.</p>
                        </div>
                    </div>
                </div>
                
                <div class="advantage-card rounded-xl">
                    <div class="flex items-start space-x-4">
                        <div class="text-3xl text-yellow-500 mt-1">⚖️</div>
                        <div>
                            <h3 class="text-lg font-semibold text-white mb-2">Accompagnement Juridique</h3>
                            <p class="text-gray-400 text-sm">Nos juristes rédigent vos statuts personnalisés et gèrent toutes les formalités.</p>
                        </div>
                    </div>
                </div>

                <div class="bg-[#111] border border-[#2a2a2a] rounded-xl p-8">
                    <h3 class="text-lg font-bold text-white mb-6">Conditions Générales</h3>
                    <ul class="space-y-4 text-sm text-gray-400">
                        <li class="flex items-start">
                            <span class="text-yellow-500 mr-3">•</span>
                            <span>Capital minimum : 1 FCFA (SARL) ou 10 000 000 FCFA (SA).</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-500 mr-3">•</span>
                            <span>Pièce d'identité valide ou passeport requis pour l'immatriculation.</span>
                        </li>
                        <li class="flex items-start">
                            <span class="text-yellow-500 mr-3">•</span>
                            <span>Justificatif de domicile du siège social requis.</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-yellow-500/10 to-transparent border border-yellow-500/20 rounded-xl p-8 text-center">
                    <h4 class="text-white font-bold mb-2">Besoin d'aide ?</h4>
                    <p class="text-gray-400 text-sm mb-6">Nos experts vous répondent par WhatsApp sous 15 minutes.</p>
                    <a href="https://wa.me/2250700000000" class="inline-block bg-yellow-500 text-black px-6 py-3 rounded-full font-bold shadow-lg shadow-yellow-500/20">Chatter sur WhatsApp</a>
                </div>
            </div>
        </div>
    </div>

  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-col">
        <div class="footer-logo">DC-KNOWING</div>
        <p class="footer-desc">Cabinet agréé MBPE &amp; FDFP spécialisé dans l'accompagnement des entreprises en Côte d'Ivoire et zone UEMOA.</p>
      </div>
      <div class="footer-col">
        <div class="footer-title">Expertises</div>
        <a href="{{ url('/') }}#services">Création d'entreprise</a>
        <a href="{{ url('/') }}#services">Direction Financière (DFE)</a>
        <a href="{{ url('/') }}#services">Secrétariat Juridique</a>
        <a href="{{ url('/') }}#services">Assistance Fiscale</a>
        <a href="{{ url('/') }}#services">Levée de Fonds</a>
      </div>
      <div class="footer-col">
        <div class="footer-title">Solutions Digitales</div>
        <a href="{{ url('/') }}#digital">RH Flow</a>
        <a href="{{ url('/') }}#digital">Compta Flow</a>
        <a href="{{ url('/') }}#digital">Sell Flow</a>
        <a href="{{ url('/') }}#digital">Legal Flow</a>
      </div>
      <div class="footer-col">
        <div class="footer-title">Contact & Légal</div>
        <a href="#">Cocody Angré, Abidjan</a>
        <a href="#">+225 07 00 00 00 00</a>
        <a href="#">contact@dc-knowing.com</a>
        <br>
        <a href="#">Mentions légales</a>
        <a href="#">Politique de confidentialité</a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2026 DC-KNOWING. Tous droits réservés.</p>
    </div>
  </footer>

  <!-- Notification -->
  <div class="notification" id="notification">
    <div class="notification-dot"></div>
    <div class="notification-text" id="notificationText"></div>
  </div>

  <script src="{{ asset('js/cursor.js') }}"></script>
  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="{{ asset('js/notifications.js') }}"></script>
  <script src="//unpkg.com/alpinejs" defer></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (typeof initCursor === 'function') initCursor();
      if (typeof initNavbar === 'function') initNavbar();
      
      // Hover effects
      document.querySelectorAll('a, button, .advantage-card').forEach(el => {
          el.addEventListener('mouseenter', () => document.querySelector('.cursor-ring')?.classList.add('hovered'));
          el.addEventListener('mouseleave', () => document.querySelector('.cursor-ring')?.classList.remove('hovered'));
      });
    });
  </script>

</body>
</html>
