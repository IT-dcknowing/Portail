<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC-KNOWING — Radiation Entreprise</title>
  <meta name="description" content="Rayez votre entreprise du registre du commerce en Côte d'Ivoire. Accompagnement juridique complet pour la radiation.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <style>
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

        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-6xl font-bold mb-6 text-white">
                Radiation d'<span class="gradient-text">entreprise</span>
            </h1>
            <p class="text-xl text-gray-400 mb-8 max-w-3xl mx-auto">
                Accompagnement expert pour la fermeture de votre structure en toute conformité légale et fiscale.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <!-- Form -->
            <form method="POST" action="{{ route('storeRadiation') }}">
                @csrf
                <div x-data="{ legal_form: '' }" class="bg-[#111] border border-[#2a2a2a] rounded-xl shadow-lg p-8">
                    <h2 class="text-2xl font-bold text-white mb-8">Informations de radiation</h2>
                    
                    <div class="space-y-6">
                        <div>
                            <label class="block text-gray-400 text-sm font-medium mb-2">Nom de l'entreprise *</label>
                            <input name="company_name" type="text" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" required>
                        </div>
                        <div>
                            <label class="block text-gray-400 text-sm font-medium mb-2">Numéro RCCM / SIRET *</label>
                            <input name="siret" type="text" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" required>
                        </div>
                        <div>
                            <label class="block text-gray-400 text-sm font-medium mb-2">Forme juridique *</label>
                            <select x-model="legal_form" name="legal_form" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" required>
                                <option value="">Sélectionner</option>
                                <option value="EI">Entreprise Individuelle (EI)</option>
                                <option value="SARL">SARL / SARLU</option>
                                <option value="SA">SA</option>
                                <option value="SAS">SAS / SASU</option>
                                <option value="other">Autre (préciser)</option>
                            </select>
                            <div x-show="legal_form === 'other'" class="mt-4" x-cloak>
                                <input name="custom_legal_form" type="text" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="Quelle est la forme juridique ?">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-400 text-sm font-medium mb-2">Motif de la radiation *</label>
                            <textarea name="reason" rows="3" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" placeholder="Raisons de la fermeture..." required></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-400 text-sm font-medium mb-2">Date souhaitée *</label>
                                <input name="date_radiation" type="date" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" required>
                            </div>
                            <div>
                                <label class="block text-gray-400 text-sm font-medium mb-2">Email de contact *</label>
                                <input name="contact_email" type="email" class="w-full px-4 py-3 rounded-lg bg-[#000] border border-[#2a2a2a] text-white focus:border-yellow-500 outline-none" required>
                            </div>
                        </div>

                        <div class="pt-4">
                            <button type="submit" class="w-full bg-yellow-500 text-black font-bold py-3 rounded-lg hover:brightness-110 transition">
                                Soumettre ma demande de radiation
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Sidebar -->
            <div class="space-y-8">
                <div class="advantage-card rounded-xl">
                    <h3 class="text-lg font-semibold text-white mb-4">Pourquoi radier ?</h3>
                    <ul class="space-y-3 text-sm text-gray-400">
                        <li class="flex items-center"><span class="text-yellow-500 mr-2">✔</span> Éviter l'accumulation de taxes (impôts, patentes)</li>
                        <li class="flex items-center"><span class="text-yellow-500 mr-2">✔</span> Arrêt définitif de l'activité commerciale</li>
                        <li class="flex items-center"><span class="text-yellow-500 mr-2">✔</span> Transformation en une autre structure</li>
                        <li class="flex items-center"><span class="text-yellow-500 mr-2">✔</span> Mise en sommeil prolongée</li>
                    </ul>
                </div>

                <div class="bg-gradient-to-br from-yellow-500/10 to-transparent border border-yellow-500/20 rounded-xl p-8">
                    <h4 class="text-white font-bold mb-4">Avertissement</h4>
                    <p class="text-gray-400 text-sm">Une radiation est irréversible. Toutes les dettes sociales et fiscales doivent être apurées avant la clôture définitive au RCCM.</p>
                </div>
            </div>
        </div>
    </div>

  </main>

  <footer class="footer">
    <div class="footer-content">
      <div class="footer-col">
        <div class="footer-logo">DC-KNOWING</div>
        <p class="footer-desc">Cabinet spécialisé dans l'assistance juridique et fiscale en zone UEMOA.</p>
      </div>
      <div class="footer-col">
        <div class="footer-title">Contact</div>
        <a href="#">contact@dc-knowing.com</a>
        <a href="#">+225 07 00 00 00 00</a>
      </div>
    </div>
    <div class="footer-bottom">
      <p>© 2026 DC-KNOWING. Tous droits réservés.</p>
    </div>
  </footer>

  <script src="{{ asset('js/cursor.js') }}"></script>
  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (typeof initCursor === 'function') initCursor();
      if (typeof initNavbar === 'function') initNavbar();
    });
  </script>
</body>
</html>