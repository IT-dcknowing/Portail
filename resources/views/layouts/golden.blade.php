<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', "DC-KNOWING — Cabinet d'Accompagnement en Gestion d'Entreprise")</title>
  
  <!-- Tailwind CSS (nécessaire pour les sous-pages existantes) -->
  <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <script>tailwind.config={theme:{extend:{colors:{primary:'#1e3a8a',secondary:'#64748b'},borderRadius:{'none':'0px','sm':'4px',DEFAULT:'8px','md':'12px','lg':'16px','xl':'20px','2xl':'24px','3xl':'32px','full':'9999px','button':'8px'}}}}</script>

  <!-- Google Fonts : Montserrat uniquement (100-900 + italiques) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Branding CSS : Design System 'Dark Luxury Institutional' -->
  <link rel="stylesheet" href="{{ asset('css/branding.css') }}">
  
  <style>
/* ========================================
   DC-KNOWING — Styles Principaux
   Or Métallique (Dégradé #7D4E00, #FFD700, #A06000)
   Typographie : Montserrat exclusive
   ======================================== */

/* ── VARIABLES ── */
:root {
  --noir:        #0A0A0A;
  --or-base:     #FFD700; /* Jaune doré lumineux pour les bordures/icônes */
  --or-clair:    #FFD700;
  --or-fonce:    #7D4E00;
  --or-moyen:    #A06000;
  --or-degrade:  linear-gradient(135deg, #7D4E00, #FFD700, #A06000);
  --blanc:       #FAF8F4;
  --gris:        #1C1C1A;
  --gris2:       #2A2A28;
  --ligne:       rgba(255, 215, 0, 0.15); /* #FFD700 en RGBA */
  --vert:        #2ECC71;
  --rouge:       #E74C3C;
  --bleu:        #3498DB;
  --transition:  cubic-bezier(0.16, 1, 0.3, 1);
}

/* ── RESET & BASE ── */
*, *::before, *::after {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
  font-size: 15px;
}

body {
  background: var(--noir);
  color: var(--blanc);
  font-family: 'Montserrat', sans-serif;
  font-weight: 300;
  line-height: 1.6;
  min-height: 100vh;
  overflow-x: hidden;
  cursor: none;
}

/* ── CURSEUR ÉLASTIQUE (LERP) ── */
.cursor {
  width: 8px;
  height: 8px;
  background: var(--or-base);
  border-radius: 50%;
  position: fixed;
  top: 0;
  left: 0;
  pointer-events: none;
  z-index: 9999;
  will-change: transform;
  mix-blend-mode: difference;
}

.cursor-ring {
  width: 36px;
  height: 36px;
  border: 1.5px solid rgba(255, 215, 0, 0.4);
  border-radius: 50%;
  position: fixed;
  top: 0;
  left: 0;
  pointer-events: none;
  z-index: 9998;
  will-change: transform;
  transition:
    width  0.35s var(--transition),
    height 0.35s var(--transition),
    border-color 0.35s;
}

.cursor-ring.hovered {
  width: 56px;
  height: 56px;
  border-color: var(--or-base);
  background: rgba(255, 215, 0, 0.05);
}

/* ── NAVIGATION ── */
#navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 90px; /* Légère augmentation pour plus respirer */
  background: rgba(10, 10, 10, 0.98);
  backdrop-filter: blur(15px);
  border-bottom: 1px solid var(--ligne);
  padding: 0 40px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  z-index: 1000;
  transition: all 0.3s var(--transition);
}

.nav-logo {
  display: flex;
  align-items: center;
  text-decoration: none;
}

.nav-logo-mark {
  height: 100px; /* Réduction pour éviter l'écrasement */
  width: auto;
  position: relative;
  z-index: 1001;
  transition: height 0.3s ease;
}

.nav-links {
  display: flex;
  gap: 25px; /* Réduction du gap pour éviter la déformation */
  list-style: none;
  align-items: center;
}

.nav-links a {
  color: rgba(250, 248, 244, 0.7);
  text-decoration: none;
  font-size: 13px; /* Réduction légère */
  font-weight: 500;
  letter-spacing: 0.5px;
  transition: all 0.3s;
  text-transform: uppercase;
  white-space: nowrap; /* Empêche le retour à la ligne */
}

.nav-links a:hover {
  color: var(--or-base);
}

.nav-cta {
  background: var(--or-degrade);
  color: #1A1000;
  padding: 10px 18px;
  text-decoration: none;
  font-size: 13px;
  font-weight: 600;
  letter-spacing: 1px;
  text-transform: uppercase;
  transition: all 0.3s var(--transition);
  white-space: nowrap;
}

.nav-cta:hover {
  filter: brightness(1.15);
  transform: translateY(-2px);
}

/* ── SECTION HEADER ── */
.section-header {
  max-width: 720px;
  margin-bottom: 64px;
}

.section-tag {
  font-size: 11px;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: var(--or-base);
  font-weight: 500;
  margin-bottom: 16px;
  display: flex;
  align-items: center;
  gap: 12px;
}

.section-tag::before {
  content: '';
  width: 32px;
  height: 1px;
  background: var(--or-degrade);
}

.section-title {
  font-size: clamp(32px, 4vw, 56px);
  font-weight: 200;
  line-height: 1.2;
  margin-bottom: 20px;
}

.section-title em {
  font-style: italic;
  background: var(--or-degrade);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  font-weight: 300;
}

.section-title strong {
  font-weight: 700;
  display: block;
}

.section-intro {
  font-size: 16px;
  color: rgba(250, 248, 244, 0.5);
  line-height: 1.8;
  max-width: 600px;
}


/* ── FOOTER ── */
.footer {
  background: var(--gris);
  border-top: 1px solid var(--ligne);
  padding: 64px 48px 32px;
}

.footer-content {
  display: grid;
  grid-template-columns: 1.5fr 1fr 1fr 1fr;
  gap: 48px;
  margin-bottom: 48px;
  padding-bottom: 48px;
  border-bottom: 1px solid var(--ligne);
}

.footer-logo {
  font-size: 24px;
  font-weight: 700;
  letter-spacing: 2px;
  background: var(--or-degrade);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  margin-bottom: 16px;
}

.footer-desc {
  font-size: 13px;
  color: rgba(250, 248, 244, 0.4);
  line-height: 1.8;
  max-width: 300px;
}

.footer-title {
  font-size: 10px;
  letter-spacing: 3px;
  text-transform: uppercase;
  color: var(--or-base);
  font-weight: 600;
  margin-bottom: 20px;
}

.footer-col a {
  display: block;
  font-size: 13px;
  color: rgba(250, 248, 244, 0.4);
  text-decoration: none;
  margin-bottom: 12px;
  transition: color 0.3s;
}

.footer-col a:hover { color: var(--or-base); }

.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 16px;
  font-size: 11px;
  color: rgba(250, 248, 244, 0.25);
}


/* ── RESPONSIVE ── */
@media (max-width: 1024px) {
  .footer-content        { grid-template-columns: 1fr 1fr; }
}

@media (max-width: 768px) {
  #navbar              { padding: 0 24px; height: 64px; }
  .nav-logo-mark       { height: 110px; }
  .nav-links           { display: none; }
  .footer-content      { grid-template-columns: 1fr; }
}

/* ── FORM FIXES ── */
input:not([type="submit"]):not([type="button"]):not([type="checkbox"]):not([type="radio"]):not([type="file"]),
textarea,
select {
  color: #1A1A1A !important;
  background-color: #FFFFFF !important;
  border: 1px solid rgba(255, 215, 0, 0.4) !important;
}

/* Restaurer l'apparence native des checkboxes et radios */
input[type="checkbox"],
input[type="radio"] {
  appearance: auto !important;
  -webkit-appearance: auto !important;
  background-color: unset !important;
  border: unset !important;
  color: unset !important;
  width: auto !important;
  height: auto !important;
  cursor: pointer;
}

/* Options des listes déroulantes */
select option {
  color: #1A1A1A !important;
  background-color: #FFFFFF !important;
}

/* Placeholder lisible */
input::placeholder,
textarea::placeholder {
  color: #888 !important;
  opacity: 1;
}
</style>
  @yield('styles')
</head>
<body>
  
  <!-- Curseur Custom -->
  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <!-- Navigation -->
  <nav id="navbar">
    <a href="{{ url('/') }}" class="nav-logo">
      <img src="{{ asset('images/teste.jpeg') }}" alt="DC-KNOWING" class="nav-logo-mark">
    </a>
    <ul class="nav-links">
      <li><a href="{{ url('/') }}#services">Services</a></li>
      <li><a href="{{ route('services.offres') }}">Offres</a></li>
      <li><a href="{{ url('/') }}#digital">Solutions digitales</a></li>
      <li><a href="{{ url('/') }}#mes-devis">Mes Devis</a></li>
      <li><a href="{{ url('/') }}#contact">Contact</a></li>
    </ul>
    <a href="{{ url('/') }}#contact" class="nav-cta"><span>Consultation offerte</span></a>
  </nav>

  <main style="padding-top: 120px;">
      @yield('content')
  </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
        <div class="footer-col">
            <div class="footer-logo">DC-KNOWING</div>
            <p class="footer-desc">
            Cabinet d'expertise agréé (MBPE / FDFP) accompagnant les PME, grandes entreprises et ONG dans leur structuration juridique, financière et stratégique en Afrique francophone.
            </p>
        </div>
        <div class="footer-col">
            <div class="footer-title">Expertises</div>
            <a href="{{ url('/') }}#offres">Création d'entreprise</a>
            <a href="{{ url('/') }}#offres">Direction Financière (DFE)</a>
            <a href="{{ url('/') }}#offres">Secrétariat Juridique</a>
            <a href="{{ url('/') }}#offres">Assistance Fiscale</a>
            <a href="{{ url('/') }}#offres">Levée de Fonds</a>
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
        <div>© 2026 DC-KNOWING. Tous droits réservés.</div>
        <div>Agrément MBPE / FDFP / CGA — Référent OHADA</div>
        </div>
    </footer>

    <script>
        // ════════════════════════════════════════════
        // CURSEUR PERSONNALISÉ
        // ════════════════════════════════════════════
        let mouseX = window.innerWidth / 2, mouseY = window.innerHeight / 2;
        let ringX = mouseX, ringY = mouseY;
        const cursor = document.getElementById('cursor');
        const ring = document.getElementById('cursorRing');

        if (window.matchMedia("(pointer: fine)").matches) {
            window.addEventListener('mousemove', e => {
                mouseX = e.clientX;
                mouseY = e.clientY;
                cursor.style.transform = `translate(${mouseX - 4}px, ${mouseY - 4}px)`;
            });

            function render() {
                ringX += (mouseX - ringX) * 0.15;
                ringY += (mouseY - ringY) * 0.15;
                ring.style.transform = `translate(${ringX - 18}px, ${ringY - 18}px)`;
                requestAnimationFrame(render);
            }
            requestAnimationFrame(render);

            // Hover effect sur les liens et boutons
            const hoverElements = document.querySelectorAll('a, button, .toggle-switch, .offre-card, .service-card, .flow-item');
            hoverElements.forEach(el => {
                el.addEventListener('mouseenter', () => ring.classList.add('hovered'));
                el.addEventListener('mouseleave', () => ring.classList.remove('hovered'));
            });
        } else {
            cursor.style.display = 'none';
            ring.style.display = 'none';
            document.body.style.cursor = 'auto'; // Rétablir le curseur standard sur mobile
        }

        // Effet de scroll de la navbar
        window.addEventListener('scroll', () => {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(10, 10, 10, 0.98)';
                navbar.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.5)';
            } else {
                navbar.style.background = 'rgba(10, 10, 10, 0.8)';
                navbar.style.boxShadow = 'none';
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
