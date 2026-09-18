<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC-KNOWING — Services Juridiques</title>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <style>
    /* ── PAGE-SPECIFIC STYLES ── */
    .jur-hero {
      text-align: center;
      padding: 60px 24px 48px;
    }
    .jur-hero h1 {
      font-size: clamp(28px, 5vw, 48px);
      font-weight: 700;
      line-height: 1.15;
      margin-bottom: 16px;
    }
    .jur-hero h1 em {
      font-style: italic;
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .jur-hero p {
      font-size: 15px;
      color: rgba(250,248,244,0.5);
      max-width: 600px;
      margin: 0 auto;
      line-height: 1.7;
    }

    /* ── TILES ── */
    .tiles-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 24px 80px;
      transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .tile {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 48px 32px;
      text-align: center;
      cursor: none;
      position: relative;
      overflow: hidden;
      transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .tile::before {
      content: '';
      position: absolute;
      bottom: 0; left: 0; right: 0;
      height: 3px;
      background: var(--or-degrade);
      transform: scaleX(0);
      transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .tile:hover {
      background: rgba(255, 215, 0, 0.03);
      border-color: rgba(255,215,0,0.2);
    }
    .tile:hover::before { transform: scaleX(1); }

    .tile-icon {
      font-size: 48px;
      margin-bottom: 20px;
      display: block;
    }
    .tile-title {
      font-size: 20px;
      font-weight: 700;
      margin-bottom: 10px;
      color: var(--blanc);
    }
    .tile-subtitle {
      font-size: 13px;
      color: rgba(250,248,244,0.4);
      line-height: 1.6;
      max-width: 260px;
      margin: 0 auto 20px;
    }
    .tile-cta {
      display: inline-block;
      padding: 10px 24px;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      background: var(--or-degrade);
      color: #1A1000;
      border: none;
      cursor: none;
      transition: filter 0.3s, transform 0.3s;
    }
    .tile-cta:hover {
      filter: brightness(1.15);
      transform: translateY(-2px);
    }

    /* ── FORM PANELS ── */
    .form-panel {
      max-width: 900px;
      margin: 0 auto;
      padding: 0 24px 80px;
      display: none;
      opacity: 0;
      transform: translateY(20px);
      transition: opacity 0.5s ease, transform 0.5s ease;
    }
    .form-panel.active {
      display: block;
    }
    .form-panel.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .back-btn {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 10px 20px;
      font-size: 13px;
      font-weight: 600;
      color: rgba(250,248,244,0.6);
      border: 1px solid var(--ligne);
      background: transparent;
      cursor: none;
      transition: all 0.3s;
      margin-bottom: 32px;
    }
    .back-btn:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }

    .form-panel-header {
      margin-bottom: 32px;
    }
    .form-panel-header h2 {
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 8px;
    }
    .form-panel-header h2 span {
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }
    .form-panel-header p {
      font-size: 14px;
      color: rgba(250,248,244,0.45);
      line-height: 1.6;
    }

    .form-layout {
      display: grid;
      grid-template-columns: 1.2fr 1fr;
      gap: 48px;
      align-items: start;
    }

    .form-card {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 32px;
    }
    .form-card h3 {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 600;
      margin-bottom: 24px;
    }

    .field-group {
      margin-bottom: 18px;
    }
    .field-group label {
      display: block;
      font-size: 12px;
      letter-spacing: 0.5px;
      color: rgba(250,248,244,0.5);
      font-weight: 500;
      margin-bottom: 6px;
    }
    .field-group input,
    .field-group select,
    .field-group textarea {
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
    .field-group input:focus,
    .field-group select:focus,
    .field-group textarea:focus {
      border-color: var(--or-base);
    }
    .field-group textarea {
      resize: vertical;
      min-height: 90px;
    }

    .field-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    .submit-btn {
      margin-top: 24px;
      width: 100%;
      padding: 14px;
      background: var(--or-degrade);
      color: #1A1000;
      font-family: 'Montserrat', sans-serif;
      font-size: 13px;
      font-weight: 700;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      border: none;
      cursor: none;
      transition: filter 0.3s, transform 0.3s;
    }
    .submit-btn:hover {
      filter: brightness(1.15);
      transform: translateY(-2px);
    }

    .info-block {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 24px;
      margin-bottom: 16px;
    }
    .info-block h4 {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 600;
      margin-bottom: 16px;
    }
    .info-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .info-list li {
      display: flex;
      align-items: flex-start;
      gap: 10px;
      font-size: 13px;
      color: rgba(250,248,244,0.55);
      line-height: 1.6;
      margin-bottom: 10px;
    }
    .info-list li::before {
      content: '';
      width: 6px;
      height: 6px;
      background: var(--or-base);
      border-radius: 50%;
      flex-shrink: 0;
      margin-top: 7px;
    }

    .price-block {
      background: var(--noir);
      border: 1px solid var(--ligne);
      padding: 24px;
    }
    .price-block h4 {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 600;
      margin-bottom: 16px;
    }
    .price-row {
      display: flex;
      justify-content: space-between;
      font-size: 13px;
      color: rgba(250,248,244,0.6);
      padding: 8px 0;
    }
    .price-row strong {
      color: var(--blanc);
      font-weight: 600;
    }
    .price-total {
      display: flex;
      justify-content: space-between;
      font-size: 18px;
      font-weight: 700;
      padding-top: 12px;
      margin-top: 12px;
      border-top: 1px solid var(--ligne);
    }
    .price-total .amount {
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 768px) {
      .tiles-container { grid-template-columns: 1fr; gap: 12px; }
      .tile { padding: 32px 24px; }
      .form-layout { grid-template-columns: 1fr; gap: 32px; }
      .field-row { grid-template-columns: 1fr; }
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
      <li><a href="{{ route('services.juridique') }}" style="color:var(--or-base);">Services</a></li>
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

    <!-- Messages -->
    <div style="max-width: 800px; margin: 0 auto; padding: 0 24px;">
        @if(session('success'))
            <div style="background: rgba(46, 204, 113, 0.2); border: 1px solid #2ecc71; color: #2ecc71; padding: 15px; margin-bottom: 20px; text-align: center;">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div style="background: rgba(231, 76, 60, 0.2); border: 1px solid #e74c3c; color: #e74c3c; padding: 15px; margin-bottom: 20px; text-align: center;">
                {{ session('error') }}
            </div>
        @endif
    </div>

    <!-- Hero -->
    <div class="jur-hero">
      <h1>Services <em>Juridiques</em> &amp; Corporate</h1>
      <p>Création, modification ou radiation — nos juristes spécialisés en droit ivoirien vous accompagnent de A à Z avec rigueur et réactivité.</p>
    </div>

    <!-- ═══════ TILES ═══════ -->
    <div class="tiles-container" id="tilesContainer">

      <div class="tile" onclick="showForm('creation')">
        <span class="tile-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" style="display:inline-block; vertical-align:middle;">
            <rect x="4" y="2" width="16" height="20" rx="2" ry="2"></rect>
            <path d="M9 22v-4h6v4"></path>
            <path d="M8 6h.01"></path>
            <path d="M16 6h.01"></path>
            <path d="M12 6h.01"></path>
            <path d="M12 10h.01"></path>
            <path d="M12 14h.01"></path>
            <path d="M16 10h.01"></path>
            <path d="M16 14h.01"></path>
            <path d="M8 10h.01"></path>
            <path d="M8 14h.01"></path>
          </svg>
        </span>
        <div class="tile-title">Créer mon entreprise</div>
        <div class="tile-subtitle">Immatriculation RCCM, statuts OHADA, DFE — votre structure opérationnelle en 10 jours</div>
        <button class="tile-cta">Démarrer →</button>
      </div>

      <div class="tile" onclick="showForm('modification')">
        <span class="tile-icon">✏️</span>
        <div class="tile-title">Modifier mon entreprise</div>
        <div class="tile-subtitle">Changement de statuts, capital, siège social, gérance — mise à jour officielle</div>
        <button class="tile-cta">Démarrer →</button>
      </div>

      <div class="tile" onclick="showForm('radiation')">
        <span class="tile-icon">🔒</span>
        <div class="tile-title">Fermer mon entreprise</div>
        <div class="tile-subtitle">Radiation RCCM, clôture des comptes, publication légale — tout est géré</div>
        <button class="tile-cta">Démarrer →</button>
      </div>

    </div>

    <!-- ═══════ FORM: CRÉATION ═══════ -->
    <div class="form-panel" id="panel-creation">
      <button class="back-btn" onclick="showTiles()">← Retour au choix</button>

      <div class="form-panel-header">
        <h2>Créez votre <span>entreprise</span> en Côte d'Ivoire</h2>
        <p>Accompagnement personnalisé par nos experts juridiques jusqu'à l'obtention de votre certificat de création.</p>
      </div>

      <div class="form-layout">
        <form class="form-card" id="formCreation" action="{{ route('storeSociete') }}" method="POST">
          @csrf
          <h3>Informations de l'entreprise</h3>

          <div class="field-group">
            <label>Forme juridique *</label>
            <select name="formejuridique" required>
              <option value="">Sélectionner la forme juridique</option>
              <option value="sasu">SASU</option>
              <option value="sas">SAS</option>
              <option value="sarl">SARL</option>
              <option value="sa">SA</option>
              <option value="snc">SNC</option>
              <option value="autre">Autre</option>
            </select>
          </div>

          <div class="field-group">
            <label>Dénomination sociale *</label>
            <input type="text" name="denomination" placeholder="Ex: NOM DE VOTRE ENTREPRISE" required value="{{ old('denomination') }}">
          </div>

          <div class="field-row">
            <div class="field-group">
              <label>Capital social *</label>
              <input type="number" name="capital" min="0" placeholder="Montant du capital" required value="{{ old('capital') }}">
            </div>
            <div class="field-group">
              <label>Nombre d'associés *</label>
              <input type="number" name="nombre_associes" min="1" placeholder="Nb associés" required value="{{ old('nombre_associes') }}">
            </div>
          </div>

          <div class="field-group">
            <label>Objet social *</label>
            <textarea name="objet_social" placeholder="Décrivez l'activité principale de votre entreprise..." required>{{ old('objet_social') }}</textarea>
          </div>

          <div class="field-group">
            <label>Siège social *</label>
            <input type="text" name="siege_social" placeholder="Adresse complète du siège social" required value="{{ old('siege_social') }}">
          </div>

          <div class="field-row">
            <div class="field-group">
              <label>Ville *</label>
              <select name="ville" required>
                <option value="">Sélectionner une ville</option>
                <option value="abidjan">Abidjan</option>
                <option value="bouake">Bouaké</option>
                <option value="yamoussoukro">Yamoussoukro</option>
                <option value="korhogo">Korhogo</option>
                <option value="san-pedro">San-Pédro</option>
                <option value="autre">Autre ville</option>
              </select>
            </div>
            <div class="field-group">
              <label>Durée (années) *</label>
              <input type="number" name="duree" min="1" max="99" placeholder="Durée" required value="{{ old('duree', 99) }}">
            </div>
          </div>

          <div class="field-group">
            <label>Nom du représentant légal *</label>
            <input type="text" name="nom" placeholder="Nom et prénoms" required value="{{ old('nom') }}">
          </div>

          <div class="field-row">
            <div class="field-group">
              <label>Email *</label>
              <input type="email" name="email" placeholder="votre@email.com" required value="{{ old('email') }}">
            </div>
            <div class="field-group">
              <label>Téléphone</label>
              <input type="tel" name="telephone" placeholder="+225 XX XX XX XX XX" value="{{ old('telephone') }}">
            </div>
          </div>

          <button type="submit" class="submit-btn">Envoyer ma demande →</button>
        </form>

        <div>
          <div class="info-block">
            <h4>Ce que nous faisons pour vous</h4>
            <ul class="info-list">
              <li>Conseil sur la forme juridique adaptée</li>
              <li>Rédaction complète des statuts conformes OHADA</li>
              <li>Immatriculation RCCM et obtention du numéro CC</li>
              <li>Déclaration fiscale DFE auprès de la DGI</li>
              <li>Livraison des documents officiels sous 10 jours</li>
            </ul>
          </div>
          <div class="price-block">
            <h4>Tarifs transparents</h4>
            <div class="price-row"><span>Frais DC-KNOWING</span><strong>À partir de 250 000 FCFA</strong></div>
            <div class="price-row"><span>Frais officiels CEPICI</span><strong>Selon la forme</strong></div>
            <div class="price-total"><span>Total à partir de</span><span class="amount">Variable</span></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ═══════ FORM: MODIFICATION ═══════ -->
    <div class="form-panel" id="panel-modification">
      <button class="back-btn" onclick="showTiles()">← Retour au choix</button>

      <div class="form-panel-header">
        <h2>Modifiez votre <span>entreprise</span></h2>
        <p>Accompagnement personnalisé pour toutes vos démarches de modification statutaire.</p>
      </div>

      <div class="form-layout">
        <form class="form-card" id="formModification" action="{{ route('storeModification') }}" method="POST">
          @csrf
          <h3>Informations de l'entreprise</h3>

          <div class="field-group">
            <label>Forme juridique *</label>
            <select name="forme_juridique" required>
              <option value="">Sélectionner</option>
              <option value="sasu">SASU</option>
              <option value="sas">SAS</option>
              <option value="sarl">SARL</option>
              <option value="sa">SA</option>
              <option value="snc">SNC</option>
              <option value="autre">Autre</option>
            </select>
          </div>

          <div class="field-group">
            <label>Dénomination sociale *</label>
            <input type="text" name="denomination" placeholder="Nom actuel de l'entreprise" required value="{{ old('denomination') }}">
          </div>

          <div class="field-row">
            <div class="field-group">
              <label>Capital social *</label>
              <input type="number" name="capital" min="0" placeholder="Capital actuel ou nouveau" required value="{{ old('capital') }}">
            </div>
            <div class="field-group">
              <label>Nombre d'associés *</label>
              <input type="number" name="nb_associes" min="1" placeholder="Nb associés" required value="{{ old('nb_associes') }}">
            </div>
          </div>

          <div class="field-group">
            <label>Objet social *</label>
            <textarea name="objet" placeholder="Décrivez l'objet social actuel ou modifié..." required>{{ old('objet') }}</textarea>
          </div>

          <div class="field-group">
            <label>Siège social *</label>
            <input type="text" name="siege" placeholder="Adresse actuelle ou nouvelle" required value="{{ old('siege') }}">
          </div>

          <div class="field-row">
            <div class="field-group">
              <label>Ville *</label>
              <select name="ville" required>
                <option value="">Sélectionner</option>
                <option value="abidjan">Abidjan</option>
                <option value="bouake">Bouaké</option>
                <option value="yamoussoukro">Yamoussoukro</option>
                <option value="korhogo">Korhogo</option>
                <option value="san-pedro">San-Pédro</option>
                <option value="autre">Autre ville</option>
              </select>
            </div>
            <div class="field-group">
              <label>Durée (années) *</label>
              <input type="number" name="duree" min="1" max="99" placeholder="Durée" required value="{{ old('duree') }}">
            </div>
          </div>

          <div class="field-row">
            <div class="field-group">
              <label>Email *</label>
              <input type="email" name="email" placeholder="votre@email.com" required value="{{ old('email') }}">
            </div>
            <div class="field-group">
              <label>Téléphone</label>
              <input type="tel" name="telephone" placeholder="+225 XX XX XX XX XX" value="{{ old('telephone') }}">
            </div>
          </div>

          <button type="submit" class="submit-btn">Enregistrer la modification →</button>
        </form>

        <div>
          <div class="info-block">
            <h4>Modifications accompagnées</h4>
            <ul class="info-list">
              <li>Changement de dénomination sociale</li>
              <li>Augmentation ou réduction de capital</li>
              <li>Transfert de siège social</li>
              <li>Changement de gérant / dirigeant</li>
              <li>Modification de l'objet social</li>
            </ul>
          </div>
          <div class="price-block">
            <h4>Tarifs transparents</h4>
            <div class="price-row"><span>Frais DC-KNOWING</span><strong>À partir de 250 000 FCFA</strong></div>
            <div class="price-row"><span>Frais officiels CEPICI</span><strong>Selon la forme</strong></div>
            <div class="price-total"><span>Total à partir de</span><span class="amount">Variable</span></div>
          </div>
        </div>
      </div>
    </div>

    <!-- ═══════ FORM: RADIATION ═══════ -->
    <div class="form-panel" id="panel-radiation">
      <button class="back-btn" onclick="showTiles()">← Retour au choix</button>

      <div class="form-panel-header">
        <h2>Radiation d'<span>entreprise</span></h2>
        <p>Nous vous accompagnons dans toutes les démarches de fermeture de votre structure en toute conformité.</p>
      </div>

      <div class="form-layout">
        <form class="form-card" id="formRadiation" action="{{ route('storeRadiation') }}" method="POST">
          @csrf
          <h3>Informations de radiation</h3>

          <div class="field-group">
            <label>Nom de l'entreprise *</label>
            <input type="text" name="company_name" placeholder="Dénomination sociale" required value="{{ old('company_name') }}">
          </div>

          <div class="field-group">
            <label>Numéro RCCM / SIRET *</label>
            <input type="text" name="siret" placeholder="CI-ABJ-XXXX-X-XXXXX" required value="{{ old('siret') }}">
          </div>

          <div class="field-group">
            <label>Forme juridique *</label>
            <select name="legal_form" required>
              <option value="">Choisissez une forme</option>
              <option value="EI">Entreprise Individuelle (EI)</option>
              <option value="SARL">SARL</option>
              <option value="SA">SA</option>
              <option value="SAS">SAS</option>
              <option value="SNC">SNC</option>
              <option value="other">Autre</option>
            </select>
          </div>

          <div class="field-group">
            <label>Motif de la radiation *</label>
            <textarea name="reason" placeholder="Décrivez le motif de fermeture..." required>{{ old('reason') }}</textarea>
          </div>

          <div class="field-row">
            <div class="field-group">
              <label>Date de radiation souhaitée *</label>
              <input type="date" name="date_radiation" required value="{{ old('date_radiation') }}">
            </div>
            <div class="field-group">
              <label>Email de contact</label>
              <input type="email" name="contact_email" placeholder="votre@email.com" value="{{ old('contact_email') }}">
            </div>
          </div>

          <div class="field-group">
            <label>Téléphone</label>
            <input type="tel" name="telephone" placeholder="+225 XX XX XX XX XX" value="{{ old('telephone') }}">
          </div>

          <button type="submit" class="submit-btn">Soumettre la demande →</button>
        </form>

        <div>
          <div class="info-block">
            <h4>Démarches prises en charge</h4>
            <ul class="info-list">
              <li>Procédure adaptée selon la forme juridique</li>
              <li>Déclaration auprès des administrations compétentes</li>
              <li>Publication légale obligatoire</li>
              <li>Clôture des comptes et démarches fiscales</li>
              <li>Accompagnement sur mesure par nos experts</li>
            </ul>
          </div>
          <div class="price-block">
            <h4>Tarifs transparents</h4>
            <div class="price-row"><span>Frais DC-KNOWING</span><strong>À partir de 200 000 FCFA</strong></div>
            <div class="price-row"><span>Frais officiels CEPICI</span><strong>Selon la forme</strong></div>
            <div class="price-total"><span>Total à partir de</span><span class="amount">Variable</span></div>
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
        <div class="footer-title">Services</div>
        <a href="{{ url('/') }}#services">Juridique &amp; Corporate</a>
        <a href="{{ url('/') }}#services">Comptabilité &amp; Finance</a>
        <a href="{{ route('services.cga') }}">CGA</a>
        <a href="{{ url('/') }}#services">Paie &amp; RH</a>
      </div>
      <div class="footer-col">
        <div class="footer-title">Entreprise</div>
        <a href="{{ route('services.juridique') }}">Services</a>
        <a href="{{ route('services.offres') }}">Nos offres</a>
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

  <script src="{{ asset('js/cursor.js') }}"></script>
  <script src="{{ asset('js/navbar.js') }}"></script>
  <script src="{{ asset('js/notifications.js') }}"></script>

  <script>
  // ── TILE / FORM NAVIGATION ──
  const tilesContainer = document.getElementById('tilesContainer');
  const panels = {
    creation:     document.getElementById('panel-creation'),
    modification: document.getElementById('panel-modification'),
    radiation:    document.getElementById('panel-radiation'),
  };

  function showForm(name) {
    // Hide tiles
    tilesContainer.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
    tilesContainer.style.opacity = '0';
    tilesContainer.style.transform = 'translateY(-12px)';

    setTimeout(() => {
      tilesContainer.style.display = 'none';

      // Show target panel
      const panel = panels[name];
      if (!panel) return;
      panel.classList.add('active');

      // Trigger reflow then animate in
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          panel.classList.add('visible');
        });
      });

      // Scroll to top
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }, 300);
  }

  function showTiles() {
    // Hide any open panel
    Object.values(panels).forEach(p => {
      p.classList.remove('visible');
      setTimeout(() => p.classList.remove('active'), 400);
    });

    setTimeout(() => {
      tilesContainer.style.display = '';
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          tilesContainer.style.opacity = '1';
          tilesContainer.style.transform = 'translateY(0)';
        });
      });
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }, 350);
  }

  // ── INIT CURSOR ──
  document.addEventListener('DOMContentLoaded', () => {
    if (typeof initCursor === 'function') initCursor();
    if (typeof initNavbar === 'function') initNavbar();

    // Add hover cursor to interactive elements
    document.querySelectorAll('.tile, .tile-cta, .back-btn, .submit-btn, a, button').forEach(el => {
      el.addEventListener('mouseenter', () => document.querySelector('.cursor-ring')?.classList.add('hovered'));
      el.addEventListener('mouseleave', () => document.querySelector('.cursor-ring')?.classList.remove('hovered'));
    });
  });
  </script>

</body>
</html>