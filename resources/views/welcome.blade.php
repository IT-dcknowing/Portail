<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC-KNOWING — Cabinet d'Accompagnement en Gestion d'Entreprise</title>
  
  <!-- Google Fonts : Montserrat uniquement (100-900 + italiques) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="{{ asset('css/main.css') }}">
  <link rel="stylesheet" href="{{ asset('css/forms.css') }}">
</head>
<body>
  
  <!-- Curseur Custom -->
  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <!-- Navigation -->
  <nav id="navbar">
    <a href="#" class="nav-logo">
      <img src="{{ asset('images/Logo blanc.png') }}" alt="DC-KNOWING" class="nav-logo-mark">
    </a>
    <ul class="nav-links">
      <li><a href="#services">Services</a></li>
      <li><a href="#offres">Offres</a></li>
      <li class="nav-dropdown" style="position:relative;">
        <a href="#digital">Solutions digitales</a>
        <ul class="dropdown-menu" style="display:none; position:absolute; top:100%; left:0; background:#111; padding:10px 0; border:1px solid #2a2a2a; border-radius:4px; min-width: 150px; z-index: 100; list-style: none;">
        </ul>
      </li>
      <li><a href="{{ asset('services/formation.html') }}">Formation</a></li>
      <li><a href="#mes-devis">Mes Devis</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>
    <a href="#contact" class="nav-cta"><span>Consultation offerte</span></a>
  </nav>

  <!-- Hero Section -->
  <section class="hero" id="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid"></div>
    <div class="hero-left">
      <div class="hero-badge">
        <div class="hero-badge-line"></div>
        <span class="hero-badge-text">Cabinet Agréé MBPE & FDFP — Côte d'Ivoire</span>
      </div>
      <h1 class="hero-title">
        <em>Votre partenaire</em>
        <strong>de croissance</strong>
        en Afrique.
      </h1>
      <p class="hero-subtitle">DC-KNOWING accompagne les entrepreneurs et dirigeants dans la création, la structuration et le développement de leur entreprise — avec rigueur juridique, excellence financière et innovation digitale.</p>
      <div class="hero-actions">
        <a href="#services" class="btn-primary">Découvrir nos services →</a>
        <a href="#contact" class="btn-secondary">Prendre rendez-vous</a>
      </div>
      <div class="hero-stats">
        <div class="stat-item"><span class="stat-number">500<sup>+</sup></span><span class="stat-label">Entreprises créées</span></div>
        <div class="stat-item"><span class="stat-number">12</span><span class="stat-label">Années d'expertise</span></div>
        <div class="stat-item"><span class="stat-number">98%</span><span class="stat-label">Satisfaction client</span></div>
      </div>
      <div class="scroll-indicator"><div class="scroll-line"></div><span class="scroll-text">Défiler</span></div>
    </div>
    <div class="hero-right">
      <div class="hero-card-stack">
        <div class="hero-card hero-card-back2"></div>
        <div class="hero-card hero-card-back1"></div>
        <div class="hero-card hero-card-main">
          <div class="card-tag">Service actif</div>
          <div class="card-service-name">Compta Flow</div>
          <div class="card-desc">Comptabilité OHADA en temps réel, synchronisée avec votre expert DC-KNOWING.</div>
          <div class="card-progress-label"><span>Conformité fiscale</span><span class="progress-percent">98%</span></div>
          <div class="card-progress-bar"><div class="card-progress-fill"></div></div>
          <div class="card-meta">
            <div class="card-meta-item"><strong>0</strong> pénalités</div>
            <div class="card-meta-item"><strong>↑23%</strong> optimisation</div>
            <div class="card-meta-item"><strong>Réel</strong> OHADA</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Agrements -->
  <div class="agrements">
    <span class="agrement-label">Certifié & Agréé</span>
    <div class="agrement-items">
      <div class="agrement-item"><div class="agrement-icon"></div><span class="agrement-text">MBPE — Ministère du Budget</span></div>
      <div class="agrement-item"><div class="agrement-icon"></div><span class="agrement-text">FDFP — Formation Professionnelle</span></div>
      <div class="agrement-item"><div class="agrement-icon"></div><span class="agrement-text">Centre de Gestion Agréé (CGA)</span></div>
      <div class="agrement-item"><div class="agrement-icon"></div><span class="agrement-text">Droit OHADA — Zone UEMOA</span></div>
    </div>
  </div>

  <!-- Services Section -->
  <section class="services" id="services">
    <div class="services-layout">
      <div class="services-sticky">
        <div class="section-header">
          <div class="section-tag reveal">Nos expertises</div>
          <h2 class="section-title reveal reveal-d1">Un cabinet <em>complet</em><strong>pour chaque étape</strong></h2>
          <p class="section-intro reveal reveal-d2">De la création de votre structure à sa croissance internationale, DC-KNOWING mobilise des experts certifiés pour couvrir l'ensemble de vos besoins.</p>
          <div class="chips reveal reveal-d3">
            <span class="chip">OHADA</span><span class="chip">Droit ivoirien</span><span class="chip">CNPS / CMU</span><span class="chip">DGI</span><span class="chip">RCCM</span><span class="chip">CEPICI</span>
          </div>
        </div>
      </div>
      <div class="services-grid">
        <div class="service-card reveal">
          <div class="service-number">01</div>
          <div class="service-icon">⚖️</div>
          <div class="service-name">Juridique & Corporate</div>
          <div class="service-desc">Création d'entreprises (SARL, SA, SAS, ONG…), modifications statutaires, secrétariat juridique annuel, rédaction d'actes et PV d'assemblée.</div>
          <div class="service-note">⚠️ Exception : Les contrats de bails ne sont pas pris en charge.</div>
          <a href="{{ asset('services/juridique.html') }}" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d1">
          <div class="service-number">02</div>
          <div class="service-icon">📊</div>
          <div class="service-name">Comptabilité & Finance</div>
          <div class="service-desc">Tenue comptable OHADA, états financiers, direction financière externalisée (DFE), tableaux de bord et pilotage de la performance.</div>
          <a href="#offres" class="service-link" data-filter="comptabilite">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d2">
          <div class="service-number">03</div>
          <div class="service-icon">🛡️</div>
          <div class="service-name">CGA — Centre de Gestion Agréé</div>
          <div class="service-desc">Optimisation fiscale, dossier de gestion personnalisé, conformité comptable et sociale — adhérez et économisez jusqu'à 40% sur vos charges fiscales.</div>
          <a href="{{ asset('services/cga.html') }}" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d3">
          <div class="service-number">04</div>
          <div class="service-icon">👥</div>
          <div class="service-name">Paie & Ressources Humaines</div>
          <div class="service-desc">Bulletins de paie certifiés, déclarations CNPS/CMU, contrats de travail, règlement intérieur, gestion des procédures sociales et disciplisnaires.</div>
          <a href="#offres" class="service-link" data-filter="rh">Explorer →</a>
        </div>
        <div class="service-card service-card-featured reveal">
          <div>
            <div class="service-number">05 — Offre Stratégique</div>
            <div class="service-name">Structuration Financière & Levées de Fonds</div>
            <div class="service-desc">Nous préparons votre entreprise à accéder aux financements bancaires, aux fonds d'investissement et aux subventions. Modélisation financière, mémorandum d'information, mise en relation investisseurs et success fee aligné sur vos résultats.</div>
            <a href="#offres" class="service-link" data-filter="finance" style="margin-top:24px">Explorer les offres →</a>
          </div>
          <div class="service-featured-details">
            <div class="service-detail-item"><strong>Business Plan</strong> — Projections 3 à 5 ans</div>
            <div class="service-detail-item"><strong>Dossier Bancaire</strong> — Standards banques ivoiriennes</div>
            <div class="service-detail-item"><strong>Pitch Investisseurs</strong> — Coaching & mise en relation</div>
            <div class="service-detail-item"><strong>Subventions</strong> — FDFP, BAD, AFD, GIZ, USAID</div>
            <div class="service-detail-item"><strong>Success Fee</strong> — Honoraires alignés sur vos résultats</div>
          </div>
        </div>
        <div class="service-card reveal">
          <div class="service-number">06</div>
          <div class="service-icon">🎓</div>
          <div class="service-name">Formation Professionnelle</div>
          <div class="service-desc">Programmes certifiés agréés FDFP en comptabilité, fiscalité, droit des affaires et management. Prise en charge possible par votre entreprise.</div>
          <a href="{{ asset('services/formation.html') }}" class="service-link">Programme →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Offres Section -->
  <section class="offres" id="offres">
    <div class="section-header">
      <div class="section-tag reveal">Formules & Tarifs</div>
      <h2 class="section-title reveal reveal-d1">Des offres <em>claires</em><strong>à chaque stade</strong></h2>
      <p class="section-intro reveal reveal-d2">Chaque formule est pensée pour délivrer une valeur mesurable — du conseil à l'acte jusqu'à l'abonnement qui vous protège au quotidien.</p>
    </div>

    <!-- Filtres avec Toggle Personne Physique/Morale -->
    <div class="offres-controls reveal">
      <div class="offres-tabs">
        <button class="offre-tab active" data-target="all">Tous</button>
        <button class="offre-tab" data-target="juridique">Juridique</button>
        <button class="offre-tab" data-target="comptabilite">Comptabilité</button>
        <button class="offre-tab" data-target="rh">Paie & RH</button>
        <button class="offre-tab" data-target="flow">Solutions Flow</button>
        <button class="offre-tab" data-target="finance">Finance</button>
      </div>
      
      <div class="toggle-cible">
        <span class="toggle-label">👤 Personne Physique</span>
        <label class="toggle-switch">
          <input type="checkbox" id="toggleCible">
          <span class="toggle-slider"></span>
        </label>
      </div>
    </div>

    <!-- Grille d'offres -->
    <div class="offres-grid" id="offresGrid">
      <!-- Les offres seront générées dynamiquement par JS -->
    </div>
  </section>

  <!-- Section Mes Devis -->
  <section class="mes-devis" id="mes-devis">
    <div class="section-header">
      <div class="section-tag reveal">Vos commandes</div>
      <h2 class="section-title reveal reveal-d1">Mes <strong>Devis</strong></h2>
      <p class="section-intro reveal reveal-d2">Retrouvez ici tous les devis générés pendant votre session. Validez-les pour confirmer votre commande.</p>
    </div>
    
    <div class="devis-container" id="devisContainer">
      <div class="devis-empty">
        <div class="empty-icon">📄</div>
        <div class="empty-text">Aucun devis créé pour le moment</div>
        <a href="#offres" class="btn-primary">Découvrir nos offres</a>
      </div>
    </div>
  </section>

  <!-- Section Digital -->

  <section class="digital" id="digital">
    <div class="digital-layout">
  
      <!-- Colonne gauche : Mockups d'applications -->
      <div class="digital-visual">
  
        <div class="app-mockup app-mockup-left">
          <div class="app-header">
            <span class="app-title">RH FLOW</span>
            <div class="app-dots">
              <div class="app-dot"></div>
              <div class="app-dot"></div>
              <div class="app-dot"></div>
            </div>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Employés actifs</span>
            <span class="app-metric-value">47</span>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Paie du mois</span>
            <span class="app-metric-value" style="color:#4CAF50">✓ Validée</span>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Déclaration CNPS</span>
            <span class="app-metric-value" style="color:#4CAF50">✓ Envoyée</span>
          </div>
          <div class="app-metric" style="margin-top:8px">
            <span class="app-metric-label">Alertes sociales</span>
            <span class="app-metric-value" style="color:var(--or-base)">0 en attente</span>
          </div>
        </div>
  
        <div class="app-mockup app-mockup-main">
          <div class="app-header">
            <span class="app-title">COMPTA FLOW</span>
            <div class="app-dots">
              <div class="app-dot"></div>
              <div class="app-dot"></div>
              <div class="app-dot"></div>
            </div>
          </div>
          <div class="app-chart">
            <div class="app-bar" style="--h:35%"></div>
            <div class="app-bar" style="--h:60%"></div>
            <div class="app-bar" style="--h:45%"></div>
            <div class="app-bar" style="--h:78%"></div>
            <div class="app-bar" style="--h:55%"></div>
            <div class="app-bar" style="--h:88%"></div>
            <div class="app-bar" style="--h:70%"></div>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Chiffre d'affaires</span>
            <span class="app-metric-value">142,5M FCFA</span>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Marge nette</span>
            <span class="app-metric-value" style="color:#4CAF50">+23.4%</span>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">TVA à déclarer</span>
            <span class="app-metric-value">8,2M FCFA</span>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Conformité OHADA</span>
            <span class="app-metric-value" style="color:#4CAF50">✓ 100%</span>
          </div>
        </div>
  
        <div class="app-mockup app-mockup-right">
          <div class="app-header">
            <span class="app-title">SELL FLOW</span>
            <div class="app-dots">
              <div class="app-dot"></div>
              <div class="app-dot"></div>
              <div class="app-dot"></div>
            </div>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Factures en attente</span>
            <span class="app-metric-value">12</span>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Encaissé ce mois</span>
            <span class="app-metric-value">34,2M FCFA</span>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Pipeline actif</span>
            <span class="app-metric-value">8 prospects</span>
          </div>
          <div class="app-metric" style="margin-top:8px">
            <span class="app-metric-label">Taux de conversion</span>
            <span class="app-metric-value" style="color:var(--or-base)">72%</span>
          </div>
        </div>
  
      </div><!-- /digital-visual -->
  
      <!-- Colonne droite : Texte + liste des flows -->
      <div>
        <div class="section-header">
          <div class="section-tag reveal">Solutions Flow</div>
          <h2 class="section-title reveal reveal-d1">
            Votre entreprise <em>digitalisée</em>
            <strong>dès aujourd'hui</strong>
          </h2>
          <p class="section-intro reveal reveal-d2">
            Quatre outils SaaS propriétaires, pensés pour les réalités des PME
            africaines — conformité OHADA native, interface en français,
            synchronisés avec votre équipe d'experts DC-KNOWING.
          </p>
        </div>
  
        <div class="flows-list">
  
          <!-- RH Flow — lien cliquable vers l'app -->
          <a href="https://rhflow.dc-knowing.com/" target="_blank" class="flow-item reveal">
            <div class="flow-icon">👥</div>
            <div>
              <div class="flow-name"><span>RH</span> Flow</div>
              <div class="flow-desc">Paie, CNPS/CMU, contrats, congés — zéro erreur sociale</div>
            </div>
            <div class="flow-arrow">→</div>
          </a>
  
          <div class="flow-item reveal reveal-d1">
            <div class="flow-icon">📊</div>
            <div>
              <div class="flow-name"><span>Compta</span> Flow</div>
              <div class="flow-desc">Comptabilité OHADA en temps réel, états financiers automatisés</div>
            </div>
            <div class="flow-arrow">→</div>
          </div>
  
          <div class="flow-item reveal reveal-d2">
            <div class="flow-icon">💼</div>
            <div>
              <div class="flow-name"><span>Sell</span> Flow</div>
              <div class="flow-desc">CRM, facturation, stocks, relances — pilotez vos ventes</div>
            </div>
            <div class="flow-arrow">→</div>
          </div>
  
          <div class="flow-item reveal reveal-d3">
            <div class="flow-icon">⚖️</div>
            <div>
              <div class="flow-name"><span>Legal</span> Flow</div>
              <div class="flow-desc">Documents juridiques, PV, échéances légales — conformité garantie</div>
            </div>
            <div class="flow-arrow">→</div>
          </div>
  
        </div><!-- /flows-list -->
      </div>
  
    </div><!-- /digital-layout -->
  </section>
  
<section class="experts" id="experts">
  <div class="section-header">
    <div class="section-tag reveal">Notre équipe</div>
    <h2 class="section-title reveal reveal-d1">Des experts <em>certifiés</em><strong>à votre service</strong></h2>
    <p class="section-intro reveal reveal-d2">DC-KNOWING réunit des experts-comptables diplômés, des juristes spécialisés et des partenaires notaires pour un accompagnement de premier rang.</p>
  </div>
  <div class="experts-grid">
    <div class="expert-card reveal">
      <div class="expert-photo-wrap">
        <img src="https://portaildck.dc-knowing.com/images/expert4.jpg" alt="Foto Noel" class="expert-photo" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
        <div class="expert-photo-placeholder" style="display:none">FN</div>
      </div>
      <div class="expert-name">Foto Noël</div>
      <div class="expert-role">Expert-Comptable Diplômé</div>
      <div class="expert-bio">Expert-comptable diplômé, spécialiste de la gestion comptable et financière des entreprises en Côte d'Ivoire. Référent OHADA et optimisation fiscale.</div>
      <span class="expert-tag">Comptabilité · Fiscalité · Finance</span>
    </div>
    <div class="expert-card reveal reveal-d1">
      <div class="expert-photo-wrap">
        <img src="https://portaildck.dc-knowing.com/images/expert1.jpg" alt="Semeridiangone" class="expert-photo" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
        <div class="expert-photo-placeholder" style="display:none">SM</div>
      </div>
      <div class="expert-name">M. Semeridiangone</div>
      <div class="expert-role">Expert-Comptable Diplômé</div>
      <div class="expert-bio">Expert-comptable et conseiller financier, spécialisé dans l'ingénierie financière, la structuration d'entreprise et l'accompagnement aux levées de fonds.</div>
      <span class="expert-tag">IFG · Levées de fonds · Stratégie</span>
    </div>
    <div class="expert-card reveal reveal-d2">
      <div class="expert-photo-wrap">
        <img src="https://portaildck.dc-knowing.com/images/Notaire.png" alt="Notaire Partenaire" class="expert-photo" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
        <div class="expert-photo-placeholder" style="display:none">NK</div>
      </div>
      <div class="expert-name">Me Nékouresslaïme</div>
      <div class="expert-role">Notaire Partenaire</div>
      <div class="expert-bio">Notaire partenaire exclusif intervenant sur les actes notariés, créations de sociétés à capital élevé, cessions immobilières et opérations complexes.</div>
      <span class="expert-tag">Notariat · Actes · Droit des biens</span>
    </div>
  </div>
</section>

<section class="testimonials" id="testimonials">
  <div class="section-header">
    <div class="section-tag reveal">Ils nous font confiance</div>
    <h2 class="section-title reveal reveal-d1">Ce que disent <em>nos clients</em><strong>après notre accompagnement</strong></h2>
  </div>
  <div class="testimonials-grid">
    <div class="testimonial-card reveal">
      <div class="testimonial-quote">"</div>
      <div class="testimonial-text">Grâce à DC-KNOWING, nous avons pu structurer notre entreprise de manière efficace. Leur expertise juridique et financière nous a permis d'éviter de nombreux écueils et d'optimiser notre développement.</div>
      <div class="testimonial-author">
        <div class="testimonial-avatar">SA</div>
        <div><div class="testimonial-name">Sebastien Augustin</div><div class="testimonial-company">Directeur — Ecotech Solutions</div></div>
        <span class="testimonial-service">Juridique</span>
      </div>
    </div>
    <div class="testimonial-card reveal reveal-d1">
      <div class="testimonial-quote">"</div>
      <div class="testimonial-text">Les solutions digitales de DC-KNOWING ont transformé notre gestion quotidienne. Compta Flow nous fait gagner un temps précieux et nous permet de nous concentrer sur notre cœur de métier.</div>
      <div class="testimonial-author">
        <div class="testimonial-avatar">AM</div>
        <div><div class="testimonial-name">AFRICAMOOV</div><div class="testimonial-company">Fondateur — Artisan Numérique</div></div>
        <span class="testimonial-service">Compta Flow</span>
      </div>
    </div>
    <div class="testimonial-card reveal reveal-d2">
      <div class="testimonial-quote">"</div>
      <div class="testimonial-text">L'accompagnement de DC-KNOWING dans notre recherche de financement a été déterminant. Leur expertise et leur réseau nous ont permis d'obtenir les fonds nécessaires pour notre expansion internationale.</div>
      <div class="testimonial-author">
        <div class="testimonial-avatar">DO</div>
        <div><div class="testimonial-name">Dylan Owen</div><div class="testimonial-company">CEO — Innovatech</div></div>
        <span class="testimonial-service">Levée de fonds</span>
      </div>
    </div>
  </div>
</section>

  <!-- Section Contact -->
  <section class="contact" id="contact">
    <div class="section-header">
      <div class="section-tag reveal">Parlons-en</div>
      <h2 class="section-title reveal reveal-d1">Prêt à <strong>démarrer ?</strong></h2>
      <p class="section-intro reveal reveal-d2">Prenez rendez-vous pour une consultation offerte de 30 minutes.</p>
    </div>
    <div class="contact-content">
      <form class="contact-form" id="contactForm">
        <div class="form-row">
          <div class="form-group">
            <label>Nom complet</label>
            <input type="text" placeholder="Jean Dupont" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" placeholder="jean@entreprise.com" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Téléphone</label>
            <input type="tel" placeholder="+225 XX XX XX XX XX">
          </div>
          <div class="form-group">
            <label>Entreprise</label>
            <input type="text" placeholder="Nom de votre structure">
          </div>
        </div>
        <div class="form-group">
          <label>Votre besoin</label>
          <textarea placeholder="Décrivez brièvement votre projet ou besoin..." rows="5"></textarea>
        </div>
        <button type="submit" class="btn-primary">Envoyer ma demande →</button>
      </form>
      <div class="contact-info">
        <div class="contact-item">
          <div class="contact-icon">📍</div>
          <div>
            <div class="contact-label">Adresse</div>
            <div class="contact-value">Riviera Bonoumin, Abidjan<br>Côte d'Ivoire</div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon">📧</div>
          <div>
            <div class="contact-label">Email</div>
            <div class="contact-value">support@dc-knowing.com</div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon">📞</div>
          <div>
            <div class="contact-label">Téléphone</div>
            <div class="contact-value">+225 07 67 13 19 93</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer-content">
      <div class="footer-col">
        <div class="footer-logo">DC-KNOWING</div>
        <p class="footer-desc">Cabinet agréé MBPE & FDFP spécialisé dans l'accompagnement des entreprises en Côte d'Ivoire et zone UEMOA.</p>
      </div>
      <div class="footer-col">
        <div class="footer-title">Services</div>
        <a href="#services">Juridique & Corporate</a>
        <a href="#services">Comptabilité & Finance</a>
        <a href="#services">Fiscalité & Veille</a>
        <a href="#services">Paie & RH</a>
      </div>
      <div class="footer-col">
        <div class="footer-title">Entreprise</div>
        <a href="#services">À propos</a>
        <a href="#offres">Nos offres</a>
        <a href="#contact">Contact</a>
        <a href="#">Mentions légales</a>
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

  <!-- Chatbot (UI uniquement) -->
  <div class="chatbot-trigger" id="chatbotTrigger">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
      <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM20 16H6L4 18V4H20V16Z" fill="currentColor"/>
    </svg>
  </div>

  <div class="chatbot-window" id="chatbotWindow">
    <div class="chatbot-header">
      <div class="chatbot-header-left">
        <div class="chatbot-avatar">DC</div>
        <div>
          <div class="chatbot-title">Assistant DC-KNOWING</div>
          <div class="chatbot-status">En ligne</div>
        </div>
      </div>
      <button class="chatbot-close" id="chatbotClose">×</button>
    </div>
    <div class="chatbot-messages">
      <div class="chatbot-message bot">
        <div class="chatbot-message-content">
          Bonjour ! 👋 Comment puis-je vous aider aujourd'hui ?
        </div>
      </div>
    </div>
    <div class="chatbot-input-container">
      <input type="text" class="chatbot-input" placeholder="Tapez votre message..." disabled>
      <button class="chatbot-send" disabled>→</button>
    </div>
    <div class="chatbot-footer">
      Interface de démonstration — Fonctionnalité à venir
    </div>
  </div>

  <!-- Modal Souscription -->
  <div class="modal-overlay" id="modalOverlay">
    <div class="modal-container">
      <div class="modal-header">
        <div class="modal-tag">Nouvelle souscription</div>
        <h3 class="modal-title" id="modalTitle">Souscrire à cette offre</h3>
        <button class="modal-close" id="modalClose">×</button>
      </div>
      
      <div class="modal-steps">
        <div class="step active" data-step="1">
          <div class="step-dot">1</div>
          <div class="step-label">Offre</div>
        </div>
        <div class="step" data-step="2">
          <div class="step-dot">2</div>
          <div class="step-label">Identité</div>
        </div>
        <div class="step" data-step="3">
          <div class="step-dot">3</div>
          <div class="step-label">Détails</div>
        </div>
        <div class="step" data-step="4">
          <div class="step-dot">4</div>
          <div class="step-label">Récapitulatif</div>
        </div>
      </div>

      <div class="modal-body" id="modalBody">
        <!-- Contenu généré dynamiquement par JS -->
      </div>

      <div class="modal-footer" id="modalFooter">
        <!-- Boutons générés dynamiquement par JS -->
      </div>
    </div>
  </div>

  <!-- Modal Devis Detail -->
  <div class="modal-overlay" id="devisModal">
    <div class="modal-container modal-devis">
      <button class="modal-close" id="devisModalClose">×</button>
      <div id="devisModalContent"></div>
    </div>
  </div>

  <!-- Notification -->
  <div class="notification" id="notification">
    <div class="notification-dot"></div>
    <div class="notification-text" id="notificationText"></div>
  </div>

  <script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/cursor.js') }}"></script>
<script src="{{ asset('js/navbar.js') }}"></script>
<script src="{{ asset('js/scroll-reveal.js') }}"></script>
<script src="{{ asset('js/offres.js') }}"></script>
<script src="{{ asset('js/modal.js') }}"></script>
<script src="{{ asset('js/devis.js') }}"></script>
<script src="{{ asset('js/chatbot.js') }}"></script>
<script src="{{ asset('js/notifications.js') }}"></script>
</body>
</html>
