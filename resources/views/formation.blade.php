<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC Formation × DC-KNOWING Academy — Formation Professionnelle</title>
  <meta name="description" content="Formations certifiées FDFP : comptabilité, fiscalité, FNE, e-impôts, SYSCOHADA, paie CNPS. Devenez opérationnel en 2 mois avec DC-KNOWING Academy.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <style>
    /* ── LAYOUT ── */
    .fm-section { max-width: 1100px; margin: 0 auto; padding: 80px 24px; }
    .fm-section + .fm-section { padding-top: 0; }

    .fm-tag { font-size: 10px; letter-spacing: 3px; text-transform: uppercase; color: var(--or-base); font-weight: 600; margin-bottom: 16px; }
    .fm-title { font-size: clamp(28px,4vw,44px); font-weight: 700; line-height: 1.15; margin-bottom: 16px; }
    .fm-title em { font-style: italic; background: var(--or-degrade); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
    .fm-intro { font-size: 15px; color: rgba(250,248,244,0.5); max-width: 640px; line-height: 1.7; }

    /* ── 1. HERO ── */
    .fm-hero { text-align: center; padding: 80px 24px 60px; max-width: 820px; margin: 0 auto; }
    .fm-hero .fm-intro { margin: 0 auto 32px; }
    .fm-badge { display: inline-flex; align-items: center; gap: 10px; background: rgba(255,215,0,0.06); border: 1px solid rgba(255,215,0,0.15); padding: 8px 18px; font-size: 12px; font-weight: 600; margin-bottom: 24px; }
    .fm-badge .badge-gold { color: var(--or-base); }

    .hero-stats { display: flex; justify-content: center; gap: 48px; margin-bottom: 36px; flex-wrap: wrap; }
    .hero-stat { text-align: center; }
    .hero-stat-num { font-size: 32px; font-weight: 800; background: var(--or-degrade); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; line-height: 1; }
    .hero-stat-label { font-size: 12px; color: rgba(250,248,244,0.45); margin-top: 4px; }

    .hero-ctas { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; }
    .cta-primary { padding: 14px 32px; background: var(--or-degrade); color: #1A1000; font-family: 'Montserrat',sans-serif; font-size: 13px; font-weight: 700; letter-spacing: 0.5px; border: none; cursor: none; text-decoration: none; transition: filter .3s, transform .3s; }
    .cta-primary:hover { filter: brightness(1.15); transform: translateY(-2px); }
    .cta-secondary { padding: 14px 32px; background: transparent; border: 1px solid var(--ligne); color: rgba(250,248,244,0.6); font-family: 'Montserrat',sans-serif; font-size: 13px; font-weight: 600; cursor: none; text-decoration: none; transition: all .3s; }
    .cta-secondary:hover { border-color: var(--or-base); color: var(--or-base); }

    /* ── 2. FORMULES ── */
    .formules-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2px; margin-top: 40px; }
    .formule-card { background: var(--gris); border: 1px solid var(--ligne); padding: 36px 28px; position: relative; overflow: hidden; }
    .formule-card::after { content:''; position:absolute; bottom:0; left:0; right:0; height:2px; background:var(--or-degrade); opacity:0; transition:opacity .3s; }
    .formule-card:hover::after { opacity:1; }
    .formule-badge { display: inline-block; font-size: 10px; letter-spacing: 1.5px; text-transform: uppercase; font-weight: 700; padding: 4px 12px; border: 1px solid rgba(255,215,0,0.3); color: var(--or-base); margin-bottom: 16px; }
    .formule-name { font-size: 20px; font-weight: 700; margin-bottom: 8px; }
    .formule-desc { font-size: 13px; color: rgba(250,248,244,0.45); line-height: 1.6; margin-bottom: 16px; }
    .formule-detail { font-size: 12px; color: rgba(250,248,244,0.5); line-height: 1.7; margin-bottom: 4px; }
    .formule-detail strong { color: var(--blanc); font-weight: 600; }
    .formule-modules { list-style: none; padding: 0; margin: 16px 0; }
    .formule-modules li { display: flex; align-items: flex-start; gap: 8px; font-size: 12px; color: rgba(250,248,244,0.5); line-height: 1.5; padding: 3px 0; }
    .formule-modules li::before { content: '→'; color: var(--or-base); font-weight: 700; flex-shrink: 0; }
    .formule-price { font-size: 28px; font-weight: 800; background: var(--or-degrade); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; margin: 16px 0 8px; }
    .formule-payment { font-size: 11px; color: rgba(250,248,244,0.35); line-height: 1.6; margin-bottom: 20px; }

    /* Short formations grid inside card 2 */
    .short-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 2px; margin-top: 16px; }
    .short-card { background: var(--noir); border: 1px solid var(--ligne); padding: 20px; }
    .short-name { font-size: 14px; font-weight: 700; margin-bottom: 6px; }
    .short-meta { font-size: 11px; color: rgba(250,248,244,0.4); line-height: 1.6; margin-bottom: 10px; }
    .short-cta { font-size: 11px; font-weight: 600; color: var(--or-base); text-decoration: none; transition: opacity .3s; }
    .short-cta:hover { opacity: 0.7; }

    /* ── 3. CAPG ── */
    .capg-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 2px; margin-top: 32px; }
    .capg-card { background: var(--gris); border: 1px solid var(--ligne); padding: 28px 24px; text-align: center; }
    .capg-icon { font-size: 32px; margin-bottom: 12px; }
    .capg-icon svg { vertical-align: middle; }
    .capg-title { font-size: 14px; font-weight: 700; margin-bottom: 6px; }
    .capg-desc { font-size: 12px; color: rgba(250,248,244,0.4); line-height: 1.6; }

    /* ── 4. TIMELINE ── */
    .timeline { display: flex; align-items: flex-start; gap: 0; margin-top: 40px; position: relative; }
    .timeline::before { content: ''; position: absolute; top: 20px; left: 40px; right: 40px; height: 2px; background: var(--ligne); }
    .tl-step { flex: 1; text-align: center; position: relative; z-index: 2; }
    .tl-num { display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; background: var(--or-degrade); color: #1A1000; font-weight: 800; font-size: 14px; margin-bottom: 12px; }
    .tl-label { font-size: 12px; font-weight: 600; margin-bottom: 4px; }
    .tl-desc { font-size: 11px; color: rgba(250,248,244,0.35); line-height: 1.5; max-width: 130px; margin: 0 auto; }

    /* ── 5. SESSIONS ── */
    .sessions-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 2px; margin-top: 32px; }
    .session-card { background: var(--gris); border: 1px solid var(--ligne); padding: 28px 24px; text-align: center; position: relative; overflow: hidden; }
    .session-card::after { content:''; position:absolute; bottom:0; left:0; right:0; height:2px; background:var(--or-degrade); opacity:0; transition:opacity .3s; }
    .session-card:hover::after { opacity:1; }
    .session-name { font-size: 18px; font-weight: 700; margin-bottom: 8px; }
    .session-dates { font-size: 12px; color: rgba(250,248,244,0.45); margin-bottom: 12px; }
    .session-places { display: inline-block; padding: 4px 14px; font-size: 12px; font-weight: 600; border: 1px solid rgba(255,215,0,0.2); color: var(--or-base); margin-bottom: 16px; }

    /* ── 6. FORMULAIRE ── */
    .fm-form-card { background: var(--gris); border: 1px solid var(--ligne); padding: 40px; margin-top: 32px; max-width: 700px; }
    .fg { margin-bottom: 18px; }
    .fg label { display: block; font-size: 11px; letter-spacing: 0.5px; text-transform: uppercase; color: rgba(250,248,244,0.5); font-weight: 500; margin-bottom: 6px; }
    .fg label .req { color: var(--or-base); }
    .fg input, .fg select, .fg textarea { width: 100%; background: var(--noir); border: 1px solid var(--ligne); padding: 12px; color: var(--blanc); font-family: 'Montserrat',sans-serif; font-size: 14px; outline: none; transition: border-color .3s; }
    .fg input:focus, .fg select:focus, .fg textarea:focus { border-color: var(--or-base); }
    .fg textarea { resize: vertical; min-height: 80px; }
    .fg-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
      .formules-grid, .capg-grid, .sessions-grid, .short-grid { grid-template-columns: 1fr; }
      .timeline { flex-direction: column; gap: 16px; align-items: flex-start; }
      .timeline::before { display: none; }
      .fm-hero { padding: 60px 20px 40px; }
      .hero-stats { gap: 24px; }
      .fg-row { grid-template-columns: 1fr; }
      .fm-form-card { padding: 24px 20px; }
    }
  </style>
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
      <li><a href="{{ route('services.formation') }}" style="color:var(--or-base);">Formation</a></li>
      <li><a href="{{ url('/') }}#mes-devis">Mes Devis</a></li>
      <li><a href="{{ url('/') }}#contact">Contact</a></li>
    </ul>
    <a href="#inscription" class="nav-cta"><span>S'inscrire</span></a>
  </nav>

  <main style="padding-top: 100px;">

    <!-- ═══════ 1. HERO ═══════ -->
    <div class="fm-hero">
      <div class="fm-badge">
        <span>DC Formation</span>
        <span style="color:rgba(250,248,244,0.2);">×</span>
        <span class="badge-gold">DC-KNOWING Academy</span>
      </div>
      <h1 class="fm-title">Devenez <em>opérationnel</em> en 2 mois</h1>
      <p class="fm-intro">
        Former des professionnels capables de comprendre, décider et agir.
        Programmes certifiés agréés FDFP, du Pack Forfaitaire aux formations spécialisées.
      </p>
      <div class="hero-stats">
        <div class="hero-stat">
          <div class="hero-stat-num">50</div>
          <div class="hero-stat-label">apprenants / cohorte</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">80%</div>
          <div class="hero-stat-label">pratique</div>
        </div>
        <div class="hero-stat">
          <div class="hero-stat-num">100%</div>
          <div class="hero-stat-label">stage garanti</div>
        </div>
      </div>
      <div class="hero-ctas">
        <a href="#inscription" class="cta-primary">Rejoindre la prochaine cohorte →</a>
        <a href="#formules" class="cta-secondary">Voir le programme</a>
      </div>
    </div>

    <!-- ═══════ 2. FORMULES ═══════ -->
    <section class="fm-section" id="formules">
      <div class="fm-tag">Nos formations</div>
      <h2 class="fm-title">Deux <em>formules</em> pour monter en compétences</h2>

      <div class="formules-grid">
        <!-- Pack Forfaitaire -->
        <div class="formule-card">
          <div class="formule-badge">Certifiante · CAPG</div>
          <div class="formule-name">Pack Forfaitaire</div>
          <div class="formule-desc">Formation intensive de 2 mois couvrant toutes les compétences essentielles de gestion d'entreprise.</div>

          <div class="formule-detail"><strong>Durée :</strong> 2 mois — 3 séances/semaine</div>
          <div class="formule-detail"><strong>Jours :</strong> Mardi, Mercredi, Jeudi — 9h à 12h</div>
          <div class="formule-detail"><strong>Mode :</strong> Présentiel + En ligne</div>

          <ul class="formule-modules">
            <li>Comptabilité générale & analytique</li>
            <li>Fiscalité ivoirienne</li>
            <li>Marketing & Vente</li>
            <li>Droit des affaires OHADA</li>
            <li>Bureautique (Word / Excel / PowerPoint)</li>
            <li>SAGE / Odoo / Gamme Flow</li>
            <li>Intelligence Artificielle & Productivité</li>
            <li>Français professionnel</li>
            <li>Anglais professionnel</li>
          </ul>

          <div class="formule-price">250 000 FCFA</div>
          <div class="formule-payment">
            Paiement échelonné possible :<br>
            Inscription : 50 000 FCFA · Acompte : 100 000 FCFA · Solde : 100 000 FCFA
          </div>
          <a href="#inscription" class="cta-primary" style="display:inline-block;">Je m'inscris au Pack Forfaitaire →</a>
        </div>

        <!-- Formations courtes -->
        <div class="formule-card">
          <div class="formule-badge">Spécialisées</div>
          <div class="formule-name">Formations Courtes</div>
          <div class="formule-desc">Sessions ponctuelles organisées par DC-KNOWING sur des thématiques ciblées et d'actualité.</div>

          <div class="short-grid">
            <div class="short-card">
              <div class="short-name">FNE</div>
              <div class="short-meta">
                Facture Normalisée Électronique<br>
                <strong style="color:var(--blanc);">1 journée</strong> — 9h à 17h<br>
                Public : Dirigeants, comptables, DAF
              </div>
              <a href="#inscription" class="short-cta">Prochaine session →</a>
            </div>
            <div class="short-card">
              <div class="short-name">E-impôts</div>
              <div class="short-meta">
                Télédéclaration DGI<br>
                <strong style="color:var(--blanc);">1 journée</strong> — 9h à 13h<br>
                Public : Comptables, entrepreneurs
              </div>
              <a href="#inscription" class="short-cta">Prochaine session →</a>
            </div>
            <div class="short-card">
              <div class="short-name">SYSCOHADA Révisé</div>
              <div class="short-meta">
                Pratique comptable<br>
                <strong style="color:var(--blanc);">2 jours</strong><br>
                Public : Comptables, assistants de gestion
              </div>
              <a href="#inscription" class="short-cta">Prochaine session →</a>
            </div>
            <div class="short-card">
              <div class="short-name">Gestion de Paie</div>
              <div class="short-meta">
                CNPS / CMU / Flow RH<br>
                <strong style="color:var(--blanc);">1 journée</strong><br>
                Public : RH, dirigeants TPE
              </div>
              <a href="#inscription" class="short-cta">Prochaine session →</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ═══════ 3. CAPG ═══════ -->
    <section class="fm-section">
      <div class="fm-tag">Certification</div>
      <h2 class="fm-title">Certificat d'Aptitude Professionnelle en <em>Gestion</em></h2>
      <p class="fm-intro">À l'issue du Pack Forfaitaire, les apprenants reçoivent le CAPG, certifié par DC-KNOWING Academy — cabinet agréé MBPE & FDFP.</p>

      <div class="capg-grid">
        <div class="capg-card">
          <div class="capg-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#FFD700" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg></div>
          <div class="capg-title">En entreprise</div>
          <div class="capg-desc">Comptable, assistant de gestion, contrôleur, responsable administratif et financier.</div>
        </div>
        <div class="capg-card">
          <div class="capg-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#FFD700" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 20 20 4"/><path d="M4 20h7"/><path d="M4 20v-7"/><path d="M9.5 14.5 15 9"/></svg></div>
          <div class="capg-title">En cabinet</div>
          <div class="capg-desc">Collaborateur comptable, assistant fiscal, auditeur junior dans un cabinet d'expertise comptable.</div>
        </div>
        <div class="capg-card">
          <div class="capg-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#FFD700" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"/><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-6 11a22.35 22.35 0 0 1-4 2z"/><path d="M9 12H4s.55-3.03 2-4c1.62-1.08 5 0 5 0"/><path d="M12 15v5s3.03-.55 4-2c1.08-1.62 0-5 0-5"/></svg></div>
          <div class="capg-title">En entrepreneuriat</div>
          <div class="capg-desc">Créer et gérer votre propre structure avec les bases solides en comptabilité, fiscalité et gestion.</div>
        </div>
      </div>
    </section>

    <!-- ═══════ 4. TIMELINE ADMISSION ═══════ -->
    <section class="fm-section">
      <div class="fm-tag">Processus d'admission</div>
      <h2 class="fm-title">5 étapes vers votre <em>intégration</em></h2>

      <div class="timeline">
        <div class="tl-step">
          <div class="tl-num">1</div>
          <div class="tl-label">Pré-inscription</div>
          <div class="tl-desc">Remplissez le formulaire ci-dessous</div>
        </div>
        <div class="tl-step">
          <div class="tl-num">2</div>
          <div class="tl-label">Étude du profil</div>
          <div class="tl-desc">Notre équipe analyse votre candidature</div>
        </div>
        <div class="tl-step">
          <div class="tl-num">3</div>
          <div class="tl-label">Admission validée</div>
          <div class="tl-desc">Confirmation par email sous 48h</div>
        </div>
        <div class="tl-step">
          <div class="tl-num">4</div>
          <div class="tl-label">Paiement</div>
          <div class="tl-desc">Virement, Mobile Money ou échelonné</div>
        </div>
        <div class="tl-step">
          <div class="tl-num">5</div>
          <div class="tl-label">Intégration cohorte</div>
          <div class="tl-desc">Bienvenue dans votre promotion !</div>
        </div>
      </div>
    </section>

    <!-- ═══════ 5. SESSIONS ═══════ -->
    <section class="fm-section">
      <div class="fm-tag">Prochaines sessions 2026</div>
      <h2 class="fm-title">Réservez votre <em>place</em></h2>

      <div class="sessions-grid">
        <div class="session-card">
          <div class="session-name">Cohorte ALPHA</div>
          <div class="session-dates">Avril — Juin 2026</div>
          <div class="session-places">38/50 places</div>
          <a href="#inscription" class="cta-primary" style="display:block;text-align:center;">Réserver ma place →</a>
        </div>
        <div class="session-card">
          <div class="session-name">Cohorte BETA</div>
          <div class="session-dates">Juillet — Septembre 2026</div>
          <div class="session-places">50/50 places</div>
          <a href="#inscription" class="cta-primary" style="display:block;text-align:center;">Réserver ma place →</a>
        </div>
        <div class="session-card">
          <div class="session-name">Cohorte GAMMA</div>
          <div class="session-dates">Octobre — Décembre 2026</div>
          <div class="session-places">50/50 places</div>
          <a href="#inscription" class="cta-primary" style="display:block;text-align:center;">Réserver ma place →</a>
        </div>
      </div>
    </section>

    <!-- ═══════ 6. FORMULAIRE ═══════ -->
    <section class="fm-section" id="inscription">
      <div class="fm-tag">Pré-inscription</div>
      <h2 class="fm-title">Rejoignez <em>DC-KNOWING Academy</em></h2>
      <p class="fm-intro">Remplissez ce formulaire en moins d'1 minute. Notre équipe vous recontacte sous 48h.</p>

      <form class="fm-form-card" id="formationForm" onsubmit="handleFormationSubmit(event)">
        <div class="fg-row">
          <div class="fg">
            <label>Nom complet <span class="req">*</span></label>
            <input type="text" name="nom" placeholder="Nom et prénoms" required>
          </div>
          <div class="fg">
            <label>Email <span class="req">*</span></label>
            <input type="email" name="email" placeholder="votre@email.com" required>
          </div>
        </div>
        <div class="fg-row">
          <div class="fg">
            <label>Téléphone WhatsApp <span class="req">*</span></label>
            <input type="tel" name="telephone" placeholder="+225 XX XX XX XX XX" required>
          </div>
          <div class="fg">
            <label>Ville <span class="req">*</span></label>
            <select name="ville" required>
              <option value="">Sélectionner</option>
              <option value="abidjan">Abidjan</option>
              <option value="bouake">Bouaké</option>
              <option value="yamoussoukro">Yamoussoukro</option>
              <option value="autre">Autre ville</option>
            </select>
          </div>
        </div>
        <div class="fg">
          <label>Formation souhaitée <span class="req">*</span></label>
          <select name="formation" required>
            <option value="">Sélectionner une formation</option>
            <option value="pack_forfaitaire">Pack Forfaitaire (2 mois — CAPG)</option>
            <option value="fne">Formation FNE — Facture Normalisée Électronique</option>
            <option value="eimpots">Formation E-impôts — Télédéclaration DGI</option>
            <option value="syscohada">Formation SYSCOHADA Révisé</option>
            <option value="paie">Formation Gestion de Paie & CNPS/CMU</option>
          </select>
        </div>
        <div class="fg">
          <label>Message (optionnel)</label>
          <textarea name="message" placeholder="Questions, précisions, situation actuelle..."></textarea>
        </div>
        <button type="submit" class="cta-primary" style="width:100%;text-align:center;display:block;margin-top:8px;">
          Envoyer ma pré-inscription →
        </button>
      </form>
    </section>

  </main>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-col">
        <div class="footer-logo">DC-KNOWING</div>
        <p class="footer-desc">Cabinet agréé MBPE &amp; FDFP spécialisé dans l'accompagnement des entreprises en Côte d'Ivoire et zone UEMOA.</p>
      </div>
      <div class="footer-col">
        <div class="footer-title">Services</div>
        <a href="{{ url('/') }}#services">Juridique &amp; Corporate</a>
        <a href="{{ url('/') }}#services">Comptabilité &amp; Finance</a>
        <a href="{{ route('services.cga') }}">CGA</a>
        <a href="{{ url('/') }}#services">Paie &amp; RH</a>
      </div>
      <div class="footer-col">
        <div class="footer-title">Formation</div>
        <a href="#formules">Pack Forfaitaire</a>
        <a href="#formules">Formations courtes</a>
        <a href="#inscription">Pré-inscription</a>
      </div>
      <div class="footer-col">
        <div class="footer-title">Suivez-nous</div>
        <a href="#">LinkedIn</a>
        <a href="#">Facebook</a>
        <a href="#">Twitter</a>
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

  <script>
  // ── Smooth scrolling for anchor links ──
  document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', e => {
      const href = link.getAttribute('href');
      if (href !== '#' && document.querySelector(href)) {
        e.preventDefault();
        document.querySelector(href).scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // ── FORM SUBMISSION ──
  function handleFormationSubmit(e) {
    e.preventDefault();
    const form = e.target;
    const btn = form.querySelector('button[type="submit"]');

    // État de chargement
    btn.disabled = true;
    btn.innerHTML = '<span style="display:inline-block;width:14px;height:14px;border:2px solid rgba(26,16,0,0.3);border-radius:50%;border-top-color:#1A1000;animation:spin 1s linear infinite;margin-right:8px;vertical-align:middle;"></span> Envoi en cours...';

    const formData = new FormData(form);
    const data = Object.fromEntries(formData.entries());

    fetch('{{ route("formation.submit") }}', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify(data)
    })
    .then(r => r.json())
    .then(res => {
      if (res.success) {
        if (typeof showNotification === 'function') {
          showNotification('✓ Pré-inscription envoyée ! Nous vous recontactons sous 48h.', 'success');
        } else {
          alert('✓ Pré-inscription envoyée !');
        }
        form.reset();
      } else {
        if (typeof showNotification === 'function') {
          showNotification('Erreur : ' + (res.message || 'Réessayez plus tard.'), 'error');
        }
      }
      btn.disabled = false;
      btn.innerHTML = 'Envoyer ma pré-inscription →';
    })
    .catch(err => {
      console.error('Erreur:', err);
      if (typeof showNotification === 'function') {
        showNotification('Erreur de connexion. Réessayez.', 'error');
      }
      btn.disabled = false;
      btn.innerHTML = 'Envoyer ma pré-inscription →';
    });
  }

  // ── INIT ──
  document.addEventListener('DOMContentLoaded', () => {
    // Hover cursor
    document.querySelectorAll('a, button, .formule-card, .short-card, .capg-card, .session-card').forEach(el => {
      el.addEventListener('mouseenter', () => document.querySelector('.cursor-ring')?.classList.add('hovered'));
      el.addEventListener('mouseleave', () => document.querySelector('.cursor-ring')?.classList.remove('hovered'));
    });
  });
  </script>

</body>
</html>
