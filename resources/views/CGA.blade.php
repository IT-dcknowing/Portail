<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC-KNOWING — Centre de Gestion Agréé (CGA)</title>
  <meta name="description" content="Adhérez au CGA DC-KNOWING et économisez jusqu'à 40% sur vos charges fiscales. Cabinet agréé MBPE & FDFP en Côte d'Ivoire.">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">

  <style>
    /* ── PAGE LAYOUT ── */
    .cga-section {
      max-width: 1100px;
      margin: 0 auto;
      padding: 80px 24px;
    }
    .cga-section + .cga-section { padding-top: 0; }

    .section-tag-cga {
      font-size: 10px;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 600;
      margin-bottom: 16px;
    }
    .section-title-cga {
      font-size: clamp(28px, 4vw, 44px);
      font-weight: 700;
      line-height: 1.15;
      margin-bottom: 16px;
    }
    .section-title-cga em {
      font-style: italic;
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .section-intro-cga {
      font-size: 15px;
      color: rgba(250,248,244,0.5);
      max-width: 640px;
      line-height: 1.7;
    }

    /* ── 1. HERO ── */
    .cga-hero {
      text-align: center;
      padding: 80px 24px 60px;
      max-width: 800px;
      margin: 0 auto;
    }
    .cga-hero .section-intro-cga {
      margin: 0 auto 32px;
    }
    .cga-hero-stat {
      display: inline-flex;
      align-items: center;
      gap: 12px;
      background: rgba(255,215,0,0.06);
      border: 1px solid rgba(255,215,0,0.15);
      padding: 14px 28px;
      font-size: 15px;
      font-weight: 600;
    }
    .cga-hero-stat .stat-highlight {
      font-size: 28px;
      font-weight: 800;
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* ── 2. BÉNÉFICES ── */
    .benefits-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      margin-top: 40px;
    }
    .benefit-card {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 36px 28px;
      position: relative;
      overflow: hidden;
      transition: border-color 0.3s;
    }
    .benefit-card:hover { border-color: rgba(255,215,0,0.2); }
    .benefit-card::after {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 2px;
      background: var(--or-degrade);
      opacity: 0;
      transition: opacity 0.3s;
    }
    .benefit-card:hover::after { opacity: 1; }
    .benefit-number {
      font-size: 36px;
      font-weight: 800;
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 12px;
      line-height: 1;
    }
    .benefit-title {
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .benefit-desc {
      font-size: 13px;
      color: rgba(250,248,244,0.45);
      line-height: 1.6;
    }

    /* ── 3. SERVICES CGA ── */
    .services-cga-grid {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 2px;
      margin-top: 40px;
    }
    .service-cga-card {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 32px 28px;
      transition: border-color 0.3s;
    }
    .service-cga-card:hover { border-color: rgba(255,215,0,0.15); }
    .service-cga-icon {
      font-size: 32px;
      margin-bottom: 16px;
    }
    .service-cga-name {
      font-size: 16px;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .service-cga-desc {
      font-size: 13px;
      color: rgba(250,248,244,0.45);
      line-height: 1.7;
    }
    .service-cga-list {
      list-style: none;
      padding: 0;
      margin: 12px 0 0;
    }
    .service-cga-list li {
      display: flex;
      align-items: flex-start;
      gap: 8px;
      font-size: 12px;
      color: rgba(250,248,244,0.5);
      line-height: 1.5;
      padding: 4px 0;
    }
    .service-cga-list li::before {
      content: '→';
      color: var(--or-base);
      font-weight: 700;
      flex-shrink: 0;
    }

    /* ── 4. DOSSIER DE GESTION ── */
    .dossier-table {
      width: 100%;
      margin-top: 32px;
      border-collapse: collapse;
    }
    .dossier-table thead th {
      text-align: left;
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 600;
      padding: 14px 16px;
      border-bottom: 1px solid var(--ligne);
    }
    .dossier-table tbody td {
      font-size: 13px;
      color: rgba(250,248,244,0.7);
      padding: 16px;
      border-bottom: 1px solid rgba(255,255,255,0.04);
      vertical-align: top;
    }
    .dossier-table tbody tr:hover td {
      background: rgba(255,215,0,0.02);
    }
    .dossier-label {
      font-weight: 600;
      color: var(--blanc);
    }
    .dossier-badge {
      display: inline-block;
      padding: 3px 10px;
      font-size: 10px;
      font-weight: 600;
      letter-spacing: 0.5px;
      border: 1px solid rgba(255,215,0,0.2);
      color: var(--or-base);
    }

    /* ── 5. FORMULAIRE MULTI-ÉTAPES ── */
    .form-section {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 48px;
      margin-top: 40px;
    }
    .progress-bar {
      display: flex;
      align-items: center;
      gap: 0;
      margin-bottom: 40px;
      position: relative;
    }
    .progress-step {
      flex: 1;
      text-align: center;
      position: relative;
    }
    .progress-step .step-num {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 32px;
      height: 32px;
      font-size: 12px;
      font-weight: 700;
      border: 2px solid var(--ligne);
      color: rgba(250,248,244,0.3);
      background: var(--noir);
      position: relative;
      z-index: 2;
      transition: all 0.3s;
    }
    .progress-step.active .step-num {
      background: var(--or-degrade);
      border-color: transparent;
      color: #1A1000;
    }
    .progress-step.done .step-num {
      background: var(--or-degrade);
      border-color: transparent;
      color: #1A1000;
    }
    .progress-step .step-label {
      display: block;
      font-size: 10px;
      letter-spacing: 0.5px;
      color: rgba(250,248,244,0.3);
      margin-top: 6px;
      transition: color 0.3s;
    }
    .progress-step.active .step-label,
    .progress-step.done .step-label {
      color: var(--or-base);
    }
    .progress-line {
      position: absolute;
      top: 15px;
      left: 0; right: 0;
      height: 2px;
      background: var(--ligne);
      z-index: 1;
    }
    .progress-fill {
      height: 100%;
      background: var(--or-degrade);
      transition: width 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .form-step {
      display: none;
      opacity: 0;
      transform: translateY(12px);
      transition: opacity 0.35s ease, transform 0.35s ease;
    }
    .form-step.active {
      display: block;
    }
    .form-step.visible {
      opacity: 1;
      transform: translateY(0);
    }
    .form-step h3 {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 24px;
    }

    .fg {
      margin-bottom: 18px;
    }
    .fg label {
      display: block;
      font-size: 11px;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      color: rgba(250,248,244,0.5);
      font-weight: 500;
      margin-bottom: 6px;
    }
    .fg label .req { color: var(--or-base); }
    .fg input, .fg select, .fg textarea {
      width: 100%;
      background: var(--noir);
      border: 1px solid var(--ligne);
      padding: 12px;
      color: var(--blanc);
      font-family: 'Montserrat', sans-serif;
      font-size: 14px;
      outline: none;
      transition: border-color 0.3s;
    }
    .fg input:focus, .fg select:focus, .fg textarea:focus {
      border-color: var(--or-base);
    }
    .fg textarea { resize: vertical; min-height: 80px; }
    .fg-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    .form-nav {
      display: flex;
      justify-content: space-between;
      margin-top: 32px;
      gap: 12px;
    }
    .btn-prev, .btn-next, .btn-submit {
      padding: 12px 28px;
      font-family: 'Montserrat', sans-serif;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.5px;
      cursor: none;
      transition: all 0.3s;
    }
    .btn-prev {
      background: transparent;
      border: 1px solid var(--ligne);
      color: rgba(250,248,244,0.6);
    }
    .btn-prev:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }
    .btn-next, .btn-submit {
      background: var(--or-degrade);
      border: none;
      color: #1A1000;
      font-weight: 700;
    }
    .btn-next:hover, .btn-submit:hover {
      filter: brightness(1.15);
      transform: translateY(-1px);
    }

    /* ── 6. CONFIANCE ── */
    .trust-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      margin-top: 40px;
    }
    .trust-card {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 32px 24px;
      text-align: center;
    }
    .trust-icon {
      font-size: 36px;
      margin-bottom: 16px;
    }
    .trust-title {
      font-size: 14px;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .trust-desc {
      font-size: 12px;
      color: rgba(250,248,244,0.4);
      line-height: 1.6;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
      .benefits-grid, .trust-grid { grid-template-columns: 1fr; }
      .services-cga-grid { grid-template-columns: 1fr; }
      .fg-row { grid-template-columns: 1fr; }
      .form-section { padding: 28px 20px; }
      .cga-hero { padding: 60px 20px 40px; }
      .progress-step .step-label { display: none; }
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
      <li><a href="{{ url('/') }}#mes-devis">Mes Devis</a></li>
      <li><a href="{{ url('/') }}#contact">Contact</a></li>
    </ul>
    <a href="{{ url('/') }}#contact" class="nav-cta"><span>Consultation offerte</span></a>
  </nav>

  <main style="padding-top: 100px;">

    <!-- ═══════════ 1. HERO ═══════════ -->
    <div class="cga-hero">
      <div class="section-tag-cga">Centre de Gestion Agréé</div>
      <h1 class="section-title-cga">
        Optimisez votre fiscalité<br>avec un <em>CGA agréé MBPE</em>
      </h1>
      <p class="section-intro-cga">
        DC-KNOWING pilote votre conformité fiscale et vous fait bénéficier
        des avantages légaux réservés aux adhérents des Centres de Gestion Agréés
        en Côte d'Ivoire.
      </p>
      <div class="cga-hero-stat">
        <span class="stat-highlight">−40%</span>
        <span style="color:rgba(250,248,244,0.7);font-size:14px;">d'économie potentielle<br>sur vos charges fiscales</span>
      </div>
    </div>

    <!-- ═══════════ 2. POURQUOI ADHÉRER ═══════════ -->
    <section class="cga-section">
      <div class="section-tag-cga">Pourquoi adhérer au CGA ?</div>
      <h2 class="section-title-cga">
        Trois avantages <em>concrets</em> pour votre entreprise
      </h2>

      <div class="benefits-grid">
        <div class="benefit-card">
          <div class="benefit-number">40%</div>
          <div class="benefit-title">Réduction d'impôts</div>
          <div class="benefit-desc">Abattement de 40% sur le bénéfice imposable pour les adhérents à jour. Un avantage fiscal direct prévu par le Code Général des Impôts.</div>
        </div>
        <div class="benefit-card">
          <div class="benefit-number">0</div>
          <div class="benefit-title">Pénalité & redressement</div>
          <div class="benefit-desc">Une comptabilité encadrée par nos experts élimine les risques de redressement fiscal. Votre déclaration est certifiée conforme.</div>
        </div>
        <div class="benefit-card">
          <div class="benefit-number">360°</div>
          <div class="benefit-title">Suivi de gestion complet</div>
          <div class="benefit-desc">Dossier de gestion personnalisé avec analyse de performance, ratios sectoriels et recommandations stratégiques chaque année.</div>
        </div>
      </div>
    </section>

    <!-- ═══════════ 3. NOS SERVICES CGA ═══════════ -->
    <section class="cga-section">
      <div class="section-tag-cga">Ce que DC-KNOWING fait pour vous</div>
      <h2 class="section-title-cga">
        4 piliers de <em>l'accompagnement</em> CGA
      </h2>

      <div class="services-cga-grid">
        <div class="service-cga-card">
          <div class="service-cga-icon">📊</div>
          <div class="service-cga-name">Assistance en Gestion</div>
          <div class="service-cga-desc">Diagnostic permanent de la santé financière de votre entreprise.</div>
          <ul class="service-cga-list">
            <li>Dossier de gestion annuel personnalisé</li>
            <li>Tableaux de bord et indicateurs clés</li>
            <li>Prévisions de trésorerie</li>
          </ul>
        </div>
        <div class="service-cga-card">
          <div class="service-cga-icon">🛡️</div>
          <div class="service-cga-name">Assistance Fiscale</div>
          <div class="service-cga-desc">Veille et conformité fiscale permanente pour votre structure.</div>
          <ul class="service-cga-list">
            <li>Contrôle de cohérence des déclarations</li>
            <li>Optimisation légale de la charge fiscale</li>
            <li>Alerte sur les nouvelles obligations</li>
          </ul>
        </div>
        <div class="service-cga-card">
          <div class="service-cga-icon">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:middle;">
              <path d="M2 22h20"></path>
              <path d="M13 2l9 9-9 9H2V2z"></path>
              <circle cx="9" cy="9" r="2"></circle>
            </svg>
          </div>
          <div class="service-cga-name">Assistance Comptable</div>
          <div class="service-cga-desc">Vérification et conformité OHADA de votre tenue comptable.</div>
          <ul class="service-cga-list">
            <li>Examen de conformité des états financiers</li>
            <li>Contrôle de concordance fiscale/comptable</li>
            <li>Formation du personnel comptable</li>
          </ul>
        </div>
        <div class="service-cga-card">
          <div class="service-cga-icon">👥</div>
          <div class="service-cga-name">Assistance Sociale</div>
          <div class="service-cga-desc">Conformité sociale et sécurité de vos obligations employeur.</div>
          <ul class="service-cga-list">
            <li>Contrôle des déclarations CNPS / CMU</li>
            <li>Vérification bulletins de paie</li>
            <li>Audit conformité Code du travail</li>
          </ul>
        </div>
      </div>
    </section>

    <!-- ═══════════ 4. DOSSIER DE GESTION ═══════════ -->
    <section class="cga-section">
      <div class="section-tag-cga">Le dossier de gestion</div>
      <h2 class="section-title-cga">
        Vos <em>livrables</em> annuels
      </h2>
      <p class="section-intro-cga">Chaque adhérent reçoit un dossier de gestion complet, véritable tableau de bord de sa performance.</p>

      <table class="dossier-table">
        <thead>
          <tr>
            <th>Livrable</th>
            <th>Contenu</th>
            <th>Échéance</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="dossier-label">Analyse d'exploitation</td>
            <td>Soldes intermédiaires de gestion, marges, charges comparées sur 3 ans</td>
            <td><span class="dossier-badge">Annuel</span></td>
          </tr>
          <tr>
            <td class="dossier-label">Ratios sectoriels</td>
            <td>Comparaison de votre performance vs la moyenne de votre secteur d'activité</td>
            <td><span class="dossier-badge">Annuel</span></td>
          </tr>
          <tr>
            <td class="dossier-label">Prévisionnel de trésorerie</td>
            <td>Projection des flux entrants/sortants sur 12 mois roulants</td>
            <td><span class="dossier-badge">Semestriel</span></td>
          </tr>
          <tr>
            <td class="dossier-label">Tableau de bord dirigeant</td>
            <td>Indicateurs clés synthétiques : CA, BFR, résultat net, taux de marge</td>
            <td><span class="dossier-badge">Trimestriel</span></td>
          </tr>
          <tr>
            <td class="dossier-label">Attestation de conformité</td>
            <td>Certificat officiel d'adhésion CGA à présenter à la DGI</td>
            <td><span class="dossier-badge">Annuel</span></td>
          </tr>
        </tbody>
      </table>
    </section>

    <!-- ═══════════ 5. FORMULAIRE D'ADHÉSION ═══════════ -->
    <section class="cga-section">
      <div class="section-tag-cga">Adhérer au CGA</div>
      <h2 class="section-title-cga">
        Demande d'<em>adhésion</em>
      </h2>
      <p class="section-intro-cga">Complétez ce formulaire en quelques minutes. Notre équipe vous recontacte sous 24h pour finaliser votre adhésion.</p>

      <div class="form-section">
        <!-- Barre de progression -->
        <div class="progress-bar">
          <div class="progress-line"><div class="progress-fill" id="progressFill" style="width: 0%"></div></div>
          <div class="progress-step active" data-step="1"><span class="step-num">1</span><span class="step-label">Entreprise</span></div>
          <div class="progress-step" data-step="2"><span class="step-num">2</span><span class="step-label">Dirigeant</span></div>
          <div class="progress-step" data-step="3"><span class="step-num">3</span><span class="step-label">Comptable</span></div>
          <div class="progress-step" data-step="4"><span class="step-num">4</span><span class="step-label">Activité</span></div>
          <div class="progress-step" data-step="5"><span class="step-num">5</span><span class="step-label">Fiscal</span></div>
          <div class="progress-step" data-step="6"><span class="step-num">6</span><span class="step-label">Social</span></div>
          <div class="progress-step" data-step="7"><span class="step-num">7</span><span class="step-label">Documents</span></div>
          <div class="progress-step" data-step="8"><span class="step-num">8</span><span class="step-label">Validation</span></div>
        </div>

        <form id="cgaForm" action="{{ route('storeCGA') }}" method="POST">
          @csrf
          <!-- ÉTAPE 1 : Entreprise -->
          <div class="form-step active visible" data-step="1">
            <h3>Informations de l'entreprise</h3>
            <div class="fg">
              <label>Raison sociale <span class="req">*</span></label>
              <input type="text" name="entreprise" placeholder="Nom de votre entreprise" required>
            </div>
            <div class="fg-row">
              <div class="fg">
                <label>Forme juridique <span class="req">*</span></label>
                <select name="statut" required>
                  <option value="">Sélectionner</option>
                  <option value="SARL">SARL</option>
                  <option value="SA">SA</option>
                  <option value="SAS">SAS</option>
                  <option value="SASU">SASU</option>
                  <option value="SNC">SNC</option>
                  <option value="EI">Entreprise Individuelle</option>
                  <option value="Autre">Autre</option>
                </select>
              </div>
              <div class="fg">
                <label>Capital social (FCFA) <span class="req">*</span></label>
                <input type="number" name="capital" min="0" placeholder="1 000 000" required>
              </div>
            </div>
            <div class="fg-row">
              <div class="fg">
                <label>N° RCCM <span class="req">*</span></label>
                <input type="text" name="rccm" placeholder="CI-ABJ-XXXX-X-XXXXX" required>
              </div>
              <div class="fg">
                <label>N° Compte Contribuable</label>
                <input type="text" name="num_contribuable" placeholder="XXXXXXX X">
              </div>
            </div>
            <div class="fg">
              <label>Siège social <span class="req">*</span></label>
              <input type="text" name="siege" placeholder="Adresse complète" required>
            </div>
          </div>

          <!-- ÉTAPE 2 : Dirigeant -->
          <div class="form-step" data-step="2">
            <h3>Dirigeant / Représentant légal</h3>
            <div class="fg-row">
              <div class="fg">
                <label>Nom & Prénoms <span class="req">*</span></label>
                <input type="text" name="nom" placeholder="Nom complet" required>
              </div>
              <div class="fg">
                <label>Fonction <span class="req">*</span></label>
                <input type="text" name="representant_legal" placeholder="Ex: Gérant, DG, PDG" required>
              </div>
            </div>
            <div class="fg-row">
              <div class="fg">
                <label>Email <span class="req">*</span></label>
                <input type="email" name="email" placeholder="dirigeant@entreprise.com" required>
              </div>
              <div class="fg">
                <label>Téléphone <span class="req">*</span></label>
                <input type="tel" name="telephone" placeholder="+225 XX XX XX XX XX" required>
              </div>
            </div>
            <div class="fg">
              <label>Nationalité</label>
              <input type="text" name="ville" placeholder="Ivoirienne">
            </div>
          </div>

          <!-- ÉTAPE 3 : Expert-comptable -->
          <div class="form-step" data-step="3">
            <h3>Votre expert-comptable actuel</h3>
            <div class="fg">
              <label>Nom du cabinet / expert-comptable</label>
              <input type="text" name="cabinet_compta" placeholder="Nom du cabinet ou de l'expert-comptable">
            </div>
            <div class="fg-row">
              <div class="fg">
                <label>Email du cabinet</label>
                <input type="email" name="email_compta" placeholder="cabinet@email.com">
              </div>
              <div class="fg">
                <label>Téléphone du cabinet</label>
                <input type="tel" name="tel_compta" placeholder="+225 XX XX XX XX XX">
              </div>
            </div>
            <p style="font-size:12px;color:rgba(250,248,244,0.35);margin-top:8px;font-style:italic;">
              Si DC-KNOWING est votre expert-comptable, laissez ces champs vides.
            </p>
          </div>

          <!-- ÉTAPE 4 : Activité -->
          <div class="form-step" data-step="4">
            <h3>Informations sur l'activité</h3>
            <div class="fg">
              <label>Secteur d'activité <span class="req">*</span></label>
              <select name="secteur" required>
                <option value="">Sélectionner</option>
                <option value="commerce">Commerce général</option>
                <option value="services">Prestation de services</option>
                <option value="btp">BTP & Construction</option>
                <option value="transport">Transport & Logistique</option>
                <option value="industrie">Industrie & Production</option>
                <option value="agriculture">Agriculture & Agro-industrie</option>
                <option value="tech">Technologie & Digital</option>
                <option value="sante">Santé & Pharmacie</option>
                <option value="education">Éducation & Formation</option>
                <option value="autre">Autre</option>
              </select>
            </div>
            <div class="fg">
              <label>Description de l'activité principale</label>
              <textarea name="activites" placeholder="Décrivez brièvement votre activité..."></textarea>
            </div>
            <div class="fg-row">
              <div class="fg">
                <label>Date de début d'activité</label>
                <input type="date" name="debut_activite">
              </div>
              <div class="fg">
                <label>Chiffre d'affaires dernier exercice (FCFA)</label>
                <input type="number" name="chiffre_affaire" min="0" placeholder="Ex: 50 000 000">
              </div>
            </div>
          </div>

          <!-- ÉTAPE 5 : Régime fiscal -->
          <div class="form-step" data-step="5">
            <h3>Régime fiscal</h3>
            <div class="fg">
              <label>Régime d'imposition actuel <span class="req">*</span></label>
              <select name="type_regime" required>
                <option value="">Sélectionner</option>
                <option value="reel_normal">Réel Normal</option>
                <option value="reel_simplifie">Réel Simplifié</option>
                <option value="synthetique">Impôt Synthétique</option>
                <option value="micro">Micro-entreprise</option>
                <option value="ne_sait_pas">Ne sait pas</option>
              </select>
            </div>
            <div class="fg">
              <label>Assujetti à la TVA ?</label>
              <select name="tva">
                <option value="oui">Oui</option>
                <option value="non">Non</option>
                <option value="ne_sait_pas">Ne sait pas</option>
              </select>
            </div>
            <div class="fg">
              <label>Exercice comptable</label>
              <select name="exercice">
                <option value="01-12">Janvier → Décembre</option>
                <option value="04-03">Avril → Mars</option>
                <option value="07-06">Juillet → Juin</option>
                <option value="autre">Autre</option>
              </select>
            </div>
          </div>

          <!-- ÉTAPE 6 : Social -->
          <div class="form-step" data-step="6">
            <h3>Informations sociales</h3>
            <div class="fg-row">
              <div class="fg">
                <label>Nombre de salariés</label>
                <input type="number" name="effectif" min="0" placeholder="0">
              </div>
              <div class="fg">
                <label>Immatriculé à la CNPS ?</label>
                <select name="cnps">
                  <option value="">Sélectionner</option>
                  <option value="oui">Oui</option>
                  <option value="non">Non</option>
                  <option value="en_cours">En cours</option>
                </select>
              </div>
            </div>
            <div class="fg">
              <label>N° CNPS employeur</label>
              <input type="text" name="cnps_num" placeholder="Si applicable">
            </div>
          </div>

          <!-- ÉTAPE 7 : Documents -->
          <div class="form-step" data-step="7">
            <h3>Documents à préparer</h3>
            <p style="font-size:13px;color:rgba(250,248,244,0.5);line-height:1.7;margin-bottom:20px;">
              Pour finaliser votre adhésion, nous vous demanderons :
            </p>
            <ul class="service-cga-list" style="margin-bottom:20px;">
              <li>Copie du registre de commerce (RCCM)</li>
              <li>Statuts de l'entreprise</li>
              <li>Copie de la pièce d'identité du dirigeant</li>
              <li>Dernière liasse fiscale (si disponible)</li>
              <li>Attestation DFE (Déclaration Fiscale d'Existence)</li>
            </ul>
            <div class="fg">
              <label>Observations complémentaires</label>
              <textarea name="message" placeholder="Informations supplémentaires ou questions..."></textarea>
            </div>
          </div>

          <!-- ÉTAPE 8 : Validation -->
          <div class="form-step" data-step="8">
            <h3>Récapitulatif &amp; validation</h3>
            <div id="recapContent" style="background:var(--noir);border:1px solid var(--ligne);padding:24px;margin-bottom:20px;">
              <!-- Rempli dynamiquement -->
            </div>
            <p style="font-size:12px;color:rgba(250,248,244,0.4);line-height:1.7;font-style:italic;">
              En validant, vous confirmez les informations fournies et acceptez d'être recontacté par DC-KNOWING pour finaliser votre adhésion au CGA. Cotisation annuelle à partir de <strong style="color:var(--or-base);">120 000 FCFA HT</strong>.
            </p>
          </div>

          <!-- Navigation -->
          <div class="form-nav">
            <button type="button" class="btn-prev" id="btnPrev" onclick="prevStep()" style="visibility:hidden;">← Retour</button>
            <button type="button" class="btn-next" id="btnNext" onclick="nextStep()">Suivant →</button>
            <button type="submit" class="btn-submit" id="btnSubmit" style="display:none;">Valider mon adhésion →</button>
          </div>
        </form>
      </div>
    </section>

    <!-- ═══════════ 6. POURQUOI DC-KNOWING ═══════════ -->
    <section class="cga-section">
      <div class="section-tag-cga">Pourquoi DC-KNOWING ?</div>
      <h2 class="section-title-cga">
        Un cabinet <em>de confiance</em>
      </h2>

      <div class="trust-grid">
        <div class="trust-card">
          <div class="trust-icon">🏛️</div>
          <div class="trust-title">Agréé MBPE & FDFP</div>
          <div class="trust-desc">Cabinet officiellement agréé par le Ministère du Budget et par le FDFP pour la formation professionnelle.</div>
        </div>
        <div class="trust-card">
          <div class="trust-icon">⏱️</div>
          <div class="trust-title">+5 ans d'expérience CGA</div>
          <div class="trust-desc">Plus de 500 entreprises accompagnées en création, comptabilité et conformité fiscale en Côte d'Ivoire.</div>
        </div>
        <div class="trust-card">
          <div class="trust-icon">💻</div>
          <div class="trust-title">Outils Flow propriétaires</div>
          <div class="trust-desc">Compta Flow, RH Flow, Sell Flow — des plateformes SaaS conçues pour les réalités des PME africaines.</div>
        </div>
      </div>
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
        <a href="#">CGA</a>
        <a href="{{ url('/') }}#services">Paie &amp; RH</a>
      </div>
      <div class="footer-col">
        <div class="footer-title">Entreprise</div>
        <a href="{{ url('/') }}#services">À propos</a>
        <a href="{{ url('/') }}#offres">Nos offres</a>
        <a href="{{ url('/') }}#contact">Contact</a>
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

  @if(session('success'))
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (typeof showNotification === 'function') {
        showNotification("{{ session('success') }}", 'success');
      } else {
        alert("{{ session('success') }}");
      }
    });
  </script>
  @endif

  @if(session('error'))
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      if (typeof showNotification === 'function') {
        showNotification("{{ session('error') }}", 'error');
      } else {
        alert("{{ session('error') }}");
      }
    });
  </script>
  @endif

  <script src="{{ asset('js/cursor.js') }}"></script>
  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="{{ asset('js/notifications.js') }}"></script>

  <script>
  // ── MULTI-STEP FORM ──
  const TOTAL_STEPS = 8;
  let currentStep = 1;

  function updateProgress() {
    const fill = document.getElementById('progressFill');
    fill.style.width = ((currentStep - 1) / (TOTAL_STEPS - 1) * 100) + '%';

    document.querySelectorAll('.progress-step').forEach(s => {
      const n = parseInt(s.dataset.step);
      s.classList.remove('active', 'done');
      if (n < currentStep) s.classList.add('done');
      if (n === currentStep) s.classList.add('active');
    });

    // Nav buttons
    document.getElementById('btnPrev').style.visibility = currentStep === 1 ? 'hidden' : 'visible';
    document.getElementById('btnNext').style.display = currentStep === TOTAL_STEPS ? 'none' : '';
    document.getElementById('btnSubmit').style.display = currentStep === TOTAL_STEPS ? '' : 'none';
  }

  function showStep(n) {
    document.querySelectorAll('.form-step').forEach(s => {
      s.classList.remove('active', 'visible');
    });
    const target = document.querySelector(`.form-step[data-step="${n}"]`);
    if (!target) return;
    target.classList.add('active');
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        target.classList.add('visible');
      });
    });
    updateProgress();
  }

  function nextStep() {
    // Basic validation for required fields in current step
    const current = document.querySelector(`.form-step[data-step="${currentStep}"]`);
    const requiredFields = current.querySelectorAll('[required]');
    let valid = true;
    requiredFields.forEach(f => {
      if (!f.value.trim()) {
        f.style.borderColor = '#E74C3C';
        f.style.animation = 'shake 0.3s ease';
        setTimeout(() => { f.style.borderColor = ''; f.style.animation = ''; }, 600);
        valid = false;
      }
    });
    if (!valid) {
      if (typeof showNotification === 'function') {
        showNotification('Veuillez remplir les champs obligatoires', 'error');
      }
      return;
    }
    if (currentStep < TOTAL_STEPS) {
      currentStep++;
      if (currentStep === TOTAL_STEPS) buildRecap();
      showStep(currentStep);
    }
  }

  function prevStep() {
    if (currentStep > 1) {
      currentStep--;
      showStep(currentStep);
    }
  }

  function buildRecap() {
    const form = document.getElementById('cgaForm');
    const fd = new FormData(form);
    const fields = [
      ['Entreprise', fd.get('entreprise')],
      ['Forme juridique', fd.get('statut')],
      ['Capital', fd.get('capital') ? parseInt(fd.get('capital')).toLocaleString('fr-FR') + ' FCFA' : '—'],
      ['RCCM', fd.get('rccm')],
      ['Dirigeant', fd.get('nom')],
      ['Email', fd.get('email')],
      ['Téléphone', fd.get('telephone')],
      ['Secteur', fd.get('secteur')],
      ['Régime fiscal', fd.get('type_regime')],
      ['Effectif', fd.get('effectif') || '0'],
    ];
    document.getElementById('recapContent').innerHTML = fields.map(([k, v]) => `
      <div style="display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.04);font-size:13px;">
        <span style="color:rgba(250,248,244,0.5);">${k}</span>
        <span style="font-weight:600;">${v || '—'}</span>
      </div>
    `).join('');
  }

  // ── INIT ──
  document.addEventListener('DOMContentLoaded', () => {
    // Note: initCursor and initNavbar are already handled in the external JS files
    showStep(1);

    // Hover cursor
    document.querySelectorAll('a, button, .benefit-card, .service-cga-card, .trust-card').forEach(el => {
      el.addEventListener('mouseenter', () => document.querySelector('.cursor-ring')?.classList.add('hovered'));
      el.addEventListener('mouseleave', () => document.querySelector('.cursor-ring')?.classList.remove('hovered'));
    });
  });

  // Shake animation
  const shakeStyle = document.createElement('style');
  shakeStyle.textContent = `@keyframes shake{0%,100%{transform:translateX(0)}20%,60%{transform:translateX(-5px)}40%,80%{transform:translateX(5px)}}`;
  document.head.appendChild(shakeStyle);
  </script>

</body>
</html>