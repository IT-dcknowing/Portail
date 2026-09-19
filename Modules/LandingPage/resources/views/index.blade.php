<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC-KNOWING — Cabinet d'Accompagnement en Gestion d'Entreprise</title>
  <link rel="icon" type="image/jpeg" href="{{ asset('images/teste.jpeg') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Google Fonts : Montserrat uniquement (100-900 + italiques) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

  <style>
    /* ========================================
   DC-KNOWING — Styles Principaux
   Or Métallique (Dégradé #7D4E00, #FFD700, #A06000)
   Typographie : Montserrat exclusive
   ======================================== */

    /* ── VARIABLES ── */
    :root {
      --noir: #0A0A0A;
      --or-base: #FFD700;
      /* Jaune doré lumineux pour les bordures/icônes */
      --or-clair: #FFD700;
      --or-fonce: #7D4E00;
      --or-moyen: #A06000;
      --or-degrade: linear-gradient(135deg, #7D4E00, #FFD700, #A06000);
      --blanc: #FAF8F4;
      --gris: #1C1C1A;
      --gris2: #2A2A28;
      --ligne: rgba(255, 215, 0, 0.15);
      /* #FFD700 en RGBA */
      --vert: #2ECC71;
      --rouge: #E74C3C;
      --bleu: #3498DB;
      --transition: cubic-bezier(0.16, 1, 0.3, 1);
    }

    /* ── RESET & BASE ── */
    *,
    *::before,
    *::after {
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
      width: 10px;
      height: 10px;
      background: var(--or-base);
      border-radius: 50%;
      position: fixed;
      top: 0;
      left: 0;
      pointer-events: none;
      z-index: 2147483647 !important;
      will-change: transform;
    }

    /* L'anneau suit avec un léger délai (LERP) */
    .cursor-ring {
      width: 40px;
      height: 40px;
      border: 2px solid var(--or-base);
      background: rgba(255, 215, 0, 0.1);
      border-radius: 50%;
      position: fixed;
      top: 0;
      left: 0;
      pointer-events: none;
      z-index: 2147483646 !important;
      will-change: transform;
      opacity: 0;
      /* Caché par défaut jusqu'au premier mouvement */
      transition:
        width 0.3s var(--transition),
        height 0.3s var(--transition),
        border-color 0.3s,
        opacity 0.3s;
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
      height: 90px;
      /* Légère augmentation pour plus respirer */
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
      height: 100px;
      /* Réduction pour éviter l'écrasement */
      width: auto;
      position: relative;
      z-index: 1001;
      transition: height 0.3s ease;
    }

    .nav-links {
      display: flex;
      gap: 25px;
      /* Réduction du gap pour éviter la déformation */
      list-style: none;
      align-items: center;
    }

    .nav-links a {
      color: rgba(250, 248, 244, 0.7);
      text-decoration: none;
      font-size: 13px;
      /* Réduction légère */
      font-weight: 500;
      letter-spacing: 0.5px;
      transition: all 0.3s;
      text-transform: uppercase;
      white-space: nowrap;
      /* Empêche le retour à la ligne */
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

    /* ── HERO SECTION ── */
    .hero {
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding: 120px 48px 80px;
      position: relative;
      overflow: hidden;
    }

    .hero-bg {
      position: absolute;
      inset: 0;
      background: linear-gradient(135deg, rgba(255, 215, 0, 0.03) 0%, rgba(10, 10, 10, 0) 50%);
      pointer-events: none;
    }

    /* ── GRILLE DE FOND PLUS VISIBLE ── */
    .hero-grid {
      position: absolute;
      inset: 0;
      background-image:
        linear-gradient(rgba(255, 215, 0, 0.08) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 215, 0, 0.08) 1px, transparent 1px);
      background-size: 80px 80px;
      pointer-events: none;
      opacity: 0.9;
      -webkit-mask-image: linear-gradient(to right, transparent 0%, transparent 15%, rgba(0, 0, 0, 0.4) 35%, rgba(0, 0, 0, 0.85) 55%, black 75%);
      mask-image: linear-gradient(to right, transparent 0%, transparent 15%, rgba(0, 0, 0, 0.4) 35%, rgba(0, 0, 0, 0.85) 55%, black 75%);
    }

    .hero-left {
      flex: 1;
      max-width: 640px;
      z-index: 2;
    }

    .hero-badge {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 24px;
    }

    .hero-badge-line {
      width: 40px;
      height: 1px;
      background: var(--or-degrade);
    }

    .hero-badge-text {
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 500;
    }

    .hero-title {
      font-size: clamp(38px, 5vw, 72px);
      font-weight: 200;
      line-height: 1.1;
      margin-bottom: 28px;
    }

    .hero-title em {
      font-style: italic;
      font-weight: 300;
      display: block;
      color: rgba(250, 248, 244, 0.7);
    }

    .hero-title strong {
      font-weight: 700;
      display: block;
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-subtitle {
      font-size: 16px;
      color: rgba(250, 248, 244, 0.5);
      line-height: 1.8;
      margin-bottom: 36px;
      font-weight: 300;
    }

    .hero-actions {
      display: flex;
      gap: 16px;
      margin-bottom: 48px;
      flex-wrap: wrap;
    }

    .btn-primary {
      background: var(--or-degrade);
      color: #1A1000;
      padding: 16px 32px;
      text-decoration: none;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 0.5px;
      transition: all 0.3s var(--transition);
      display: inline-block;
    }

    .btn-primary:hover {
      filter: brightness(1.15);
      transform: translateY(-2px);
    }

    .btn-secondary {
      background: transparent;
      color: var(--blanc);
      padding: 16px 32px;
      text-decoration: none;
      font-size: 13px;
      font-weight: 500;
      letter-spacing: 0.5px;
      border: 1px solid rgba(250, 248, 244, 0.2);
      transition: all 0.3s var(--transition);
      display: inline-block;
    }

    .btn-secondary:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }

    .hero-stats {
      display: flex;
      gap: 48px;
      margin-bottom: 64px;
      flex-wrap: wrap;
    }

    .stat-item {
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .stat-number {
      font-size: 36px;
      font-weight: 700;
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      line-height: 1;
    }

    .stat-number sup {
      font-size: 0.5em;
      font-weight: 600;
    }

    .stat-label {
      font-size: 12px;
      color: rgba(250, 248, 244, 0.4);
      text-transform: uppercase;
      letter-spacing: 1px;
      font-weight: 400;
    }

    .scroll-indicator {
      display: flex;
      align-items: center;
      gap: 12px;
      opacity: 0.5;
    }

    .scroll-line {
      width: 1px;
      height: 48px;
      background: linear-gradient(to bottom, var(--or-base), transparent);
      animation: scrollPulse 2s ease-in-out infinite;
    }

    @keyframes scrollPulse {

      0%,
      100% {
        opacity: 0.3;
      }

      50% {
        opacity: 1;
      }
    }

    .scroll-text {
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      font-weight: 400;
    }

    .hero-right {
      flex: 1;
      display: flex;
      justify-content: flex-end;
      align-items: center;
    }

    .hero-card-stack {
      position: relative;
      width: 420px;
      height: 480px;
    }

    .hero-card {
      position: absolute;
      background: var(--gris);
      border: 1px solid var(--ligne);
      border-radius: 2px;
      padding: 32px;
      transition: all 0.4s var(--transition);
    }

    .hero-card-back2 {
      width: 100%;
      height: 100%;
      top: 16px;
      left: -16px;
      opacity: 0.3;
    }

    .hero-card-back1 {
      width: 100%;
      height: 100%;
      top: 8px;
      left: -8px;
      opacity: 0.6;
    }

    .hero-card-main {
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      z-index: 3;
    }

    .hero-card-main:hover {
      transform: translateY(-4px);
      border-color: rgba(255, 215, 0, 0.3);
    }

    .card-tag {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 500;
      margin-bottom: 16px;
    }

    .card-service-name {
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 12px;
    }

    .card-desc {
      font-size: 14px;
      color: rgba(250, 248, 244, 0.5);
      line-height: 1.7;
      margin-bottom: 28px;
    }

    .card-progress-label {
      display: flex;
      justify-content: space-between;
      font-size: 12px;
      margin-bottom: 8px;
      font-weight: 500;
    }

    .progress-percent {
      color: var(--or-base);
    }

    .card-progress-bar {
      width: 100%;
      height: 6px;
      background: rgba(255, 255, 255, 0.05);
      border-radius: 3px;
      overflow: hidden;
      margin-bottom: 24px;
    }

    .card-progress-fill {
      width: 98%;
      height: 100%;
      background: var(--or-degrade);
      border-radius: 3px;
    }

    .card-meta {
      display: flex;
      gap: 24px;
      flex-wrap: wrap;
    }

    .card-meta-item {
      font-size: 13px;
      color: rgba(250, 248, 244, 0.6);
    }

    .card-meta-item strong {
      color: var(--blanc);
      font-weight: 600;
    }

    /* ── AGRÉMENTS ── */
    .agrements {
      background: var(--gris);
      border-top: 1px solid var(--ligne);
      border-bottom: 1px solid var(--ligne);
      padding: 32px 48px;
      display: flex;
      gap: 48px;
      align-items: center;
      flex-wrap: wrap;
    }

    .agrement-label {
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 600;
    }

    .agrement-items {
      display: flex;
      gap: 32px;
      flex: 1;
      flex-wrap: wrap;
    }

    .agrement-item {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .agrement-icon {
      width: 8px;
      height: 8px;
      background: var(--or-base);
      border-radius: 50%;
    }

    .agrement-text {
      font-size: 12px;
      color: rgba(250, 248, 244, 0.5);
      font-weight: 400;
    }

    /* ── SECTIONS GÉNÉRIQUES ── */
    section {
      padding: 120px 48px;
    }

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

    /* ── SERVICES ── */
    .services-layout {
      display: grid;
      grid-template-columns: 380px 1fr;
      gap: 64px;
    }

    .services-sticky {
      position: sticky;
      top: 140px;
      height: fit-content;
    }

    .chips {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-top: 24px;
    }

    .chip {
      padding: 6px 14px;
      font-size: 11px;
      letter-spacing: 1px;
      text-transform: uppercase;
      background: rgba(255, 215, 0, 0.06);
      border: 1px solid var(--ligne);
      color: var(--or-base);
      font-weight: 500;
    }

    .services-grid {
      display: grid;
      gap: 24px;
    }

    .service-card {
      background: var(--gris);
      border: 1px solid transparent;
      padding: 36px;
      transition: all 0.4s var(--transition);
      position: relative;
      overflow: hidden;
    }

    .service-card::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 2px;
      background: var(--or-degrade);
      transform: scaleX(0);
      transition: transform 0.4s var(--transition);
    }

    .service-card:hover {
      border-color: rgba(255, 215, 0, 0.25);
      transform: translateX(4px);
    }

    .service-card:hover::after {
      transform: scaleX(1);
    }

    .service-number {
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: rgba(255, 215, 0, 0.5);
      font-weight: 600;
      margin-bottom: 12px;
    }

    .service-icon {
      font-size: 32px;
      margin-bottom: 16px;
      width: 56px;
      height: 56px;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 1px solid var(--ligne);
      transition: all 0.4s var(--transition);
    }

    .service-card:hover .service-icon {
      border-color: var(--or-base);
      background: rgba(255, 215, 0, 0.06);
    }

    .service-name {
      font-size: 24px;
      font-weight: 600;
      margin-bottom: 12px;
    }

    .service-desc {
      font-size: 14px;
      color: rgba(250, 248, 244, 0.5);
      line-height: 1.7;
      margin-bottom: 20px;
    }

    .service-note {
      font-size: 12px;
      color: rgba(255, 215, 0, 0.65);
      padding: 12px;
      background: rgba(255, 215, 0, 0.04);
      border-left: 2px solid var(--or-base);
      margin-bottom: 20px;
      font-style: italic;
    }

    .service-link {
      color: var(--or-base);
      text-decoration: none;
      font-size: 13px;
      font-weight: 500;
      transition: all 0.3s;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .service-link:hover {
      gap: 14px;
    }

    .service-card-featured {
      background: linear-gradient(135deg, rgba(255, 215, 0, 0.06) 0%, rgba(10, 10, 10, 0) 100%);
      border: 1px solid rgba(255, 215, 0, 0.2);
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
    }

    .service-featured-details {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .service-detail-item {
      font-size: 13px;
      color: rgba(250, 248, 244, 0.6);
      padding: 12px 16px;
      background: rgba(10, 10, 10, 0.4);
      border-left: 2px solid var(--or-base);
    }

    .service-detail-item strong {
      color: var(--blanc);
      font-weight: 500;
    }

    /* ── OFFRES ── */
    .offres-controls {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 48px;
      gap: 24px;
      flex-wrap: wrap;
    }

    .offres-tabs {
      display: flex;
      gap: 4px;
      background: var(--gris);
      padding: 4px;
    }

    .offre-tab {
      padding: 12px 24px;
      font-size: 12px;
      letter-spacing: 1px;
      text-transform: uppercase;
      background: transparent;
      border: none;
      color: rgba(250, 248, 244, 0.5);
      cursor: none;
      transition: all 0.3s var(--transition);
      font-family: 'Montserrat', sans-serif;
      font-weight: 500;
    }

    .offre-tab.active {
      background: var(--or-degrade);
      color: #1A1000;
      font-weight: 600;
    }

    .offre-tab:hover:not(.active) {
      color: rgba(250, 248, 244, 0.8);
    }

    .toggle-cible {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 8px 16px;
      background: var(--gris);
      border: 1px solid var(--ligne);
    }

    .toggle-label {
      font-size: 12px;
      color: rgba(250, 248, 244, 0.6);
      font-weight: 500;
      letter-spacing: 0.5px;
    }

    .toggle-switch {
      position: relative;
      width: 48px;
      height: 24px;
      display: inline-block;
    }

    .toggle-switch input {
      opacity: 0;
      width: 0;
      height: 0;
    }

    .toggle-slider {
      position: absolute;
      cursor: none;
      inset: 0;
      background: rgba(255, 255, 255, 0.1);
      transition: 0.3s;
      border: 1px solid var(--ligne);
    }

    .toggle-slider:before {
      position: absolute;
      content: "";
      height: 16px;
      width: 16px;
      left: 3px;
      bottom: 3px;
      background: var(--blanc);
      transition: 0.3s;
    }

    input:checked+.toggle-slider {
      background: var(--or-base);
      border-color: var(--or-base);
    }

    input:checked+.toggle-slider:before {
      transform: translateX(24px);
      background: var(--noir);
    }

    .offres-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
      gap: 2px;
    }

    .offre-card {
      background: var(--gris);
      border: 1px solid transparent;
      padding: 44px 36px;
      transition: all 0.4s var(--transition);
      position: relative;
      display: flex;
      flex-direction: column;
    }

    .offre-card:hover {
      border-color: var(--ligne);
    }

    .offre-card.recommended {
      border-color: rgba(255, 215, 0, 0.3);
      background: rgba(255, 215, 0, 0.02);
    }

    .offre-card.recommended::before {
      content: 'RECOMMANDÉ';
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      background: var(--or-degrade);
      color: #1A1000;
      font-size: 9px;
      letter-spacing: 2px;
      padding: 5px 16px;
      font-weight: 600;
      text-transform: uppercase;
      white-space: nowrap;
    }

    .offre-tier {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: rgba(255, 215, 0, 0.55);
      font-weight: 600;
      margin-bottom: 16px;
    }

    .offre-name {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 8px;
    }

    .offre-tagline {
      font-size: 13px;
      color: rgba(250, 248, 244, 0.45);
      margin-bottom: 32px;
      font-style: italic;
      line-height: 1.6;
    }

    .offre-price {
      padding: 24px 0;
      border-top: 1px solid var(--ligne);
      border-bottom: 1px solid var(--ligne);
      margin-bottom: 32px;
    }

    .price-value {
      font-size: 40px;
      font-weight: 700;
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      line-height: 1;
    }

    .price-unit {
      font-size: 13px;
      color: rgba(250, 248, 244, 0.4);
      margin-left: 8px;
      font-weight: 300;
    }

    .offre-features {
      list-style: none;
      margin-bottom: 36px;
      flex: 1;
    }

    .offre-features li {
      font-size: 13px;
      color: rgba(250, 248, 244, 0.6);
      padding: 10px 0;
      border-bottom: 1px solid rgba(255, 255, 255, 0.03);
      display: flex;
      gap: 12px;
      align-items: flex-start;
      line-height: 1.5;
    }

    .offre-features li::before {
      content: '✓';
      color: var(--or-base);
      font-weight: 600;
      flex-shrink: 0;
      margin-top: 2px;
    }

    .btn-souscrire {
      display: block;
      width: 100%;
      padding: 16px;
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      font-weight: 500;
      cursor: none;
      transition: all 0.4s var(--transition);
      font-family: 'Montserrat', sans-serif;
      border: 1px solid rgba(250, 248, 244, 0.2);
      background: transparent;
      color: rgba(250, 248, 244, 0.7);
      text-align: center;
      text-decoration: none;
    }

    .btn-souscrire:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }

    .btn-souscrire.primary {
      background: var(--or-degrade);
      color: #1A1000;
      border-color: transparent;
      font-weight: 600;
    }

    .btn-souscrire.primary:hover {
      filter: brightness(1.15);
    }

    /* ── OFFRE CTA (btn-primary variante) ── */
    .offre-cta {
      display: block;
      width: 100%;
      padding: 16px;
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      font-weight: 600;
      cursor: none;
      transition: all 0.4s var(--transition);
      font-family: 'Montserrat', sans-serif;
      border: none;
      background: var(--or-degrade);
      color: #1A1000;
      text-align: center;
      margin-top: auto;
    }

    .offre-cta:hover {
      filter: brightness(1.15);
      transform: translateY(-2px);
    }

    /* ── FORMULE CARD (cards principales Essentielle/Croissance/Premium) ── */
    .formule-card {
      border-color: rgba(255, 215, 0, 0.15);
      background: linear-gradient(160deg, rgba(255, 215, 0, 0.04) 0%, var(--gris) 60%);
    }

    .offre-icone {
      width: 48px;
      height: 48px;
      border: 1px solid var(--ligne);
      margin-bottom: 20px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 22px;
    }

    .ico-shield::before {
      content: '🛡';
    }

    .ico-chart::before {
      content: '📈';
    }

    .ico-crown::before {
      content: '👑';
    }

    .offre-cible {
      font-size: 11px;
      color: rgba(255, 215, 0, 0.6);
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 16px;
      font-weight: 500;
    }

    .offre-features .prefixe-item {
      font-style: italic;
      color: var(--or-base);
      border-bottom: 1px solid var(--ligne);
      font-size: 12px;
    }

    .offres-empty {
      grid-column: 1/-1;
      text-align: center;
      padding: 60px 20px;
      font-size: 15px;
      color: rgba(250, 248, 244, 0.35);
    }

    /* ── GRILLE TARIFAIRE ── */
    .grille-tarifaire {
      grid-column: 1 / -1;
      margin-top: 40px;
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 32px;
    }

    .grille-title {
      font-size: 14px;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: var(--or-base);
      margin-bottom: 20px;
    }

    .grille-scroll {
      overflow-x: auto;
    }

    .grille-table {
      width: 100%;
      border-collapse: collapse;
      font-size: 13px;
    }

    .grille-table th {
      text-align: left;
      padding: 12px 16px;
      background: rgba(255, 215, 0, 0.07);
      color: var(--or-base);
      font-weight: 600;
      font-size: 11px;
      letter-spacing: 1px;
      text-transform: uppercase;
      border-bottom: 1px solid var(--ligne);
      white-space: nowrap;
    }

    .grille-table td {
      padding: 14px 16px;
      color: rgba(250, 248, 244, 0.65);
      border-bottom: 1px solid rgba(255, 255, 255, 0.04);
      vertical-align: top;
    }

    .grille-table tr:last-child td {
      border-bottom: none;
    }

    .grille-table td strong {
      color: var(--blanc);
      font-weight: 600;
    }

    .grille-note {
      margin-top: 16px;
      font-size: 11px;
      color: rgba(250, 248, 244, 0.35);
      font-style: italic;
    }

    /* ── AVANTAGES FIDÉLITÉ ── */
    .avantages-fidelite {
      grid-column: 1 / -1;
      margin-top: 24px;
      padding: 28px 32px;
      background: rgba(255, 215, 0, 0.03);
      border: 1px solid rgba(255, 215, 0, 0.15);
    }

    .fidelite-cards {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
      margin-top: 12px;
    }

    .fidelite-card {
      flex: 1;
      min-width: 220px;
      padding: 16px 20px;
      background: rgba(255, 215, 0, 0.06);
      border: 1px solid rgba(255, 215, 0, 0.15);
      font-size: 13px;
      color: rgba(250, 248, 244, 0.75);
    }

    .fidelite-card strong {
      color: var(--or-base);
    }

    .fidelite-icon {
      margin-right: 6px;
    }

    /* ── MES DEVIS ── */
    .devis-container {
      min-height: 400px;
    }

    .devis-empty {
      text-align: center;
      padding: 80px 20px;
    }

    .empty-icon {
      font-size: 64px;
      margin-bottom: 24px;
      opacity: 0.3;
    }

    .empty-text {
      font-size: 16px;
      color: rgba(250, 248, 244, 0.4);
      margin-bottom: 32px;
    }

    .devis-list {
      display: grid;
      gap: 16px;
    }

    .devis-item {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 24px;
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 24px;
      align-items: center;
      cursor: none;
      transition: all 0.3s var(--transition);
    }

    .devis-item:hover {
      border-color: rgba(255, 215, 0, 0.3);
      transform: translateX(4px);
    }

    .devis-id {
      font-size: 11px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: rgba(255, 215, 0, 0.65);
      font-weight: 600;
    }

    .devis-info {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }

    .devis-name {
      font-size: 18px;
      font-weight: 600;
    }

    .devis-details {
      font-size: 12px;
      color: rgba(250, 248, 244, 0.5);
    }

    .devis-status {
      padding: 6px 16px;
      font-size: 10px;
      letter-spacing: 1px;
      text-transform: uppercase;
      font-weight: 600;
      border: 1px solid;
    }

    .devis-status.pending {
      background: rgba(52, 152, 219, 0.1);
      border-color: var(--bleu);
      color: var(--bleu);
    }

    .devis-status.signed {
      background: rgba(46, 204, 113, 0.1);
      border-color: var(--vert);
      color: var(--vert);
    }

    .devis-status.cancelled {
      background: rgba(231, 76, 60, 0.1);
      border-color: var(--rouge);
      color: var(--rouge);
    }

    /* ── CONTACT ── */
    .contact-content {
      display: grid;
      grid-template-columns: 1.5fr 1fr;
      gap: 64px;
      max-width: 1200px;
    }

    .contact-form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 20px;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      gap: 8px;
    }

    .form-group label {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: rgba(250, 248, 244, 0.4);
      font-weight: 500;
    }

    .form-group input,
    .form-group textarea,
    .form-group select {
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 14px 16px;
      color: var(--blanc);
      font-family: 'Montserrat', sans-serif;
      font-size: 14px;
      font-weight: 300;
      outline: none;
      transition: border-color 0.3s;
      -webkit-appearance: none;
    }

    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
      border-color: var(--or-base);
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
      color: rgba(250, 248, 244, 0.25);
    }

    .contact-info {
      display: flex;
      flex-direction: column;
      gap: 0;
    }

    .contact-item {
      display: flex;
      gap: 16px;
      padding: 28px 0;
      border-bottom: 1px solid var(--ligne);
    }

    .contact-icon {
      font-size: 16px;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: rgba(255, 215, 0, 0.06);
      border: 1px solid var(--ligne);
      flex-shrink: 0;
    }

    .contact-label {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 600;
      margin-bottom: 6px;
    }

    .contact-value {
      font-size: 14px;
      color: rgba(250, 248, 244, 0.7);
      line-height: 1.6;
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

    .footer-col a:hover {
      color: var(--or-base);
    }

    .footer-bottom {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
      font-size: 11px;
      color: rgba(250, 248, 244, 0.25);
    }

    /* ── CHATBOT ── */
    .chatbot-trigger {
      position: fixed;
      bottom: 32px;
      right: 32px;
      width: 64px;
      height: 64px;
      background: var(--or-degrade);
      color: #1A1000;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: none;
      z-index: 900;
      transition: all 0.3s var(--transition);
      box-shadow: 0 4px 24px rgba(255, 215, 0, 0.25);
    }

    .chatbot-trigger:hover {
      transform: scale(1.1);
      box-shadow: 0 6px 32px rgba(255, 215, 0, 0.35);
    }

    .chatbot-trigger svg {
      width: 28px;
      height: 28px;
    }

    .chatbot-window {
      position: fixed;
      bottom: 112px;
      right: 32px;
      left: auto;
      width: 380px;
      max-height: 600px;
      background: var(--gris);
      border: 1px solid var(--ligne);
      z-index: 899;
      display: none;
      flex-direction: column;
      animation: chatSlideUp 0.3s var(--transition);
    }

    .chatbot-window.open {
      display: flex;
    }

    @keyframes chatSlideUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .chatbot-header {
      padding: 20px;
      border-bottom: 1px solid var(--ligne);
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: var(--gris2);
    }

    .chatbot-header-left {
      display: flex;
      gap: 12px;
      align-items: center;
    }

    .chatbot-avatar {
      width: 40px;
      height: 40px;
      background: var(--or-degrade);
      color: #1A1000;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      font-size: 14px;
    }

    .chatbot-title {
      font-size: 14px;
      font-weight: 600;
    }

    .chatbot-status {
      font-size: 11px;
      color: var(--vert);
    }

    .chatbot-close {
      width: 32px;
      height: 32px;
      background: transparent;
      border: 1px solid var(--ligne);
      color: rgba(250, 248, 244, 0.6);
      font-size: 24px;
      cursor: none;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
      line-height: 1;
      padding: 0;
    }

    .chatbot-close:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }

    .chatbot-messages {
      flex: 1;
      overflow-y: auto;
      padding: 20px;
      max-height: 400px;
    }

    .chatbot-message {
      margin-bottom: 16px;
      display: flex;
      flex-direction: column;
      gap: 6px;
    }

    .chatbot-message.bot .chatbot-message-content {
      background: rgba(255, 215, 0, 0.08);
      border: 1px solid rgba(255, 215, 0, 0.15);
      align-self: flex-start;
    }

    .chatbot-message.user .chatbot-message-content {
      background: var(--gris2);
      border: 1px solid var(--ligne);
      align-self: flex-end;
    }

    .chatbot-message-content {
      padding: 12px 16px;
      font-size: 13px;
      line-height: 1.6;
      max-width: 80%;
      border-radius: 2px;
    }

    .chatbot-input-container {
      padding: 16px;
      border-top: 1px solid var(--ligne);
      display: flex;
      gap: 8px;
    }

    .chatbot-input {
      flex: 1;
      background: var(--noir);
      border: 1px solid var(--ligne);
      padding: 10px 12px;
      color: var(--blanc);
      font-family: 'Montserrat', sans-serif;
      font-size: 13px;
      outline: none;
    }

    .chatbot-input:focus {
      border-color: var(--or-base);
    }

    .chatbot-input::placeholder {
      color: rgba(250, 248, 244, 0.25);
    }

    .chatbot-send {
      width: 40px;
      height: 40px;
      background: var(--or-degrade);
      color: #1A1000;
      border: none;
      font-size: 18px;
      cursor: none;
      transition: all 0.3s;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .chatbot-send:hover {
      filter: brightness(1.15);
    }

    .chatbot-send:disabled {
      opacity: 0.3;
    }

    .chatbot-footer {
      padding: 12px 16px;
      background: var(--gris2);
      border-top: 1px solid var(--ligne);
      font-size: 10px;
      color: rgba(250, 248, 244, 0.3);
      text-align: center;
      font-style: italic;
    }

    /* ── MODALS ── */
    .modal-overlay {
      position: fixed;
      inset: 0;
      background: rgba(0, 0, 0, 0.9);
      backdrop-filter: blur(8px);
      z-index: 2000;
      display: none;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .modal-overlay.open {
      display: flex;
    }

    .modal-container {
      background: var(--gris);
      border: 1px solid var(--ligne);
      width: 100%;
      max-width: 720px;
      max-height: 90vh;
      overflow-y: auto;
      position: relative;
      animation: modalSlideIn 0.4s var(--transition);
    }

    @keyframes modalSlideIn {
      from {
        opacity: 0;
        transform: scale(0.95) translateY(20px);
      }

      to {
        opacity: 1;
        transform: scale(1) translateY(0);
      }
    }

    .modal-devis {
      max-width: 900px;
    }

    .modal-header {
      padding: 32px;
      border-bottom: 1px solid var(--ligne);
      position: sticky;
      top: 0;
      background: var(--gris);
      z-index: 10;
    }

    .modal-tag {
      font-size: 10px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 600;
      margin-bottom: 8px;
    }

    .modal-title {
      font-size: 24px;
      font-weight: 600;
    }

    .modal-close {
      position: absolute;
      top: 24px;
      right: 24px;
      width: 40px;
      height: 40px;
      background: transparent;
      border: 1px solid var(--ligne);
      color: rgba(250, 248, 244, 0.6);
      font-size: 28px;
      cursor: none;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s;
      line-height: 1;
      padding: 0;
    }

    .modal-close:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }

    .modal-steps {
      display: flex;
      padding: 32px;
      border-bottom: 1px solid var(--ligne);
    }

    .step {
      flex: 1;
      display: flex;
      flex-direction: column;
      align-items: center;
      position: relative;
    }

    .step:not(:last-child)::after {
      content: '';
      position: absolute;
      top: 16px;
      left: 50%;
      right: -50%;
      height: 1px;
      background: var(--ligne);
      z-index: 0;
    }

    .step.active::after,
    .step.done::after {
      background: var(--or-base);
    }

    .step-dot {
      width: 32px;
      height: 32px;
      border: 1px solid var(--ligne);
      background: var(--noir);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 12px;
      color: rgba(250, 248, 244, 0.4);
      position: relative;
      z-index: 1;
      transition: all 0.4s;
      font-weight: 600;
    }

    .step.active .step-dot {
      border-color: var(--or-base);
      color: var(--or-base);
      background: rgba(255, 215, 0, 0.08);
    }

    .step.done .step-dot {
      border-color: var(--or-base);
      background: var(--or-degrade);
      color: #1A1000;
    }

    .step-label {
      font-size: 10px;
      letter-spacing: 1px;
      color: rgba(250, 248, 244, 0.3);
      margin-top: 8px;
      text-transform: uppercase;
      font-weight: 500;
    }

    .step.active .step-label {
      color: var(--or-base);
    }

    .modal-body {
      padding: 32px;
    }

    .modal-footer {
      padding: 24px 32px;
      border-top: 1px solid var(--ligne);
      background: var(--gris2);
      display: flex;
      justify-content: space-between;
      gap: 12px;
      position: sticky;
      bottom: 0;
    }

    .modal-btn {
      padding: 12px 28px;
      font-size: 12px;
      letter-spacing: 1px;
      text-transform: uppercase;
      font-weight: 600;
      cursor: none;
      transition: all 0.3s var(--transition);
      font-family: 'Montserrat', sans-serif;
      border: none;
    }

    .modal-btn-secondary {
      background: transparent;
      border: 1px solid var(--ligne);
      color: rgba(250, 248, 244, 0.6);
    }

    .modal-btn-secondary:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }

    .modal-btn-primary {
      background: var(--or-degrade);
      color: #1A1000;
    }

    .modal-btn-primary:hover {
      filter: brightness(1.15);
    }

    /* ── NOTIFICATION ── */
    .notification {
      position: fixed;
      top: 80px;
      right: 32px;
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 16px 20px;
      z-index: 3000;
      display: none;
      align-items: center;
      gap: 12px;
      min-width: 320px;
      animation: notifSlideIn 0.3s var(--transition);
    }

    .notification.show {
      display: flex;
    }

    @keyframes notifSlideIn {
      from {
        opacity: 0;
        transform: translateX(100px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    .notification-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: var(--or-degrade);
      flex-shrink: 0;
    }

    .notification-text {
      font-size: 13px;
      color: var(--blanc);
    }

    /* ── RÉVÉLATIONS AU SCROLL ── */
    .reveal {
      opacity: 0;
      transform: translateY(40px);
      transition: opacity 0.8s var(--transition), transform 0.8s var(--transition);
    }

    .reveal.active {
      opacity: 1;
      transform: translateY(0);
    }

    .reveal-d1 {
      transition-delay: 0.1s;
    }

    .reveal-d2 {
      transition-delay: 0.2s;
    }

    .reveal-d3 {
      transition-delay: 0.3s;
    }

    .reveal-d4 {
      transition-delay: 0.4s;
    }

    /* ── SECTION DIGITAL ── */
    .digital-layout {
      display: grid;
      grid-template-columns: 500px 1fr;
      gap: 80px;
      align-items: start;
    }

    .digital-visual {
      position: sticky;
      top: 140px;
      height: 520px;
    }

    .app-mockup {
      position: absolute;
      background: var(--gris);
      border: 1px solid var(--ligne);
      padding: 22px;
      box-shadow: 0 30px 80px rgba(0, 0, 0, 0.5);
      transition: all 0.4s var(--transition);
    }

    .app-mockup:hover {
      border-color: rgba(255, 215, 0, 0.3);
      box-shadow: 0 40px 100px rgba(0, 0, 0, 0.6), 0 0 0 1px rgba(255, 215, 0, 0.08);
    }

    .app-mockup-main {
      width: 290px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 3;
    }

    .app-mockup-left {
      width: 190px;
      top: 28%;
      left: -10px;
      transform: translateY(-50%) rotate(-4deg);
      z-index: 2;
      opacity: 0.65;
    }

    .app-mockup-right {
      width: 190px;
      top: 65%;
      right: -10px;
      transform: translateY(-50%) rotate(4deg);
      z-index: 2;
      opacity: 0.65;
    }

    .app-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 16px;
      padding-bottom: 14px;
      border-bottom: 1px solid var(--ligne);
    }

    .app-title {
      font-size: 10px;
      letter-spacing: 2px;
      font-weight: 700;
      color: var(--or-base);
    }

    .app-dots {
      display: flex;
      gap: 5px;
    }

    .app-dot {
      width: 7px;
      height: 7px;
      border-radius: 50%;
      background: rgba(250, 248, 244, 0.15);
    }

    .app-dot:first-child {
      background: var(--or-base);
    }

    .app-chart {
      height: 70px;
      display: flex;
      align-items: flex-end;
      gap: 5px;
      margin-bottom: 16px;
    }

    .app-bar {
      flex: 1;
      background: rgba(255, 215, 0, 0.1);
      border-radius: 2px;
      position: relative;
      overflow: hidden;
      min-height: 8px;
    }

    .app-bar::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background: linear-gradient(180deg, var(--or-clair), rgba(255, 215, 0, 0.25));
      height: var(--h, 50%);
    }

    .app-metric {
      padding: 9px 11px;
      background: rgba(10, 10, 10, 0.5);
      margin-bottom: 6px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      font-size: 11px;
    }

    .app-metric-label {
      font-size: 9px;
      color: rgba(250, 248, 244, 0.4);
    }

    .app-metric-value {
      font-size: 11px;
      font-weight: 600;
      color: var(--or-clair);
    }

    /* ── FLOWS LIST ── */
    .flows-list {
      display: flex;
      flex-direction: column;
      gap: 14px;
      margin-top: 44px;
    }

    .flow-item {
      padding: 22px 26px;
      border: 1px solid var(--ligne);
      display: grid;
      grid-template-columns: auto 1fr auto;
      gap: 20px;
      align-items: center;
      transition: all 0.4s var(--transition);
      cursor: none;
      position: relative;
      overflow: hidden;
      text-decoration: none;
      color: inherit;
    }

    .flow-item::before {
      content: '';
      position: absolute;
      left: 0;
      top: 0;
      bottom: 0;
      width: 2px;
      background: var(--or-degrade);
      transform: scaleY(0);
      transition: transform 0.4s var(--transition);
    }

    .flow-item:hover {
      background: rgba(255, 215, 0, 0.03);
      border-color: rgba(255, 215, 0, 0.2);
    }

    .flow-item:hover::before {
      transform: scaleY(1);
    }

    .flow-item-featured {
      background: linear-gradient(135deg, rgba(255, 215, 0, 0.06) 0%, rgba(10, 10, 10, 0) 100%);
      border-color: rgba(255, 215, 0, 0.25);
    }

    .flow-icon {
      width: 44px;
      height: 44px;
      flex-shrink: 0;
      border: 1px solid var(--ligne);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
      transition: all 0.4s var(--transition);
    }

    .flow-item:hover .flow-icon {
      border-color: var(--or-base);
      background: rgba(255, 215, 0, 0.06);
    }

    .flow-name {
      font-size: 20px;
      font-weight: 600;
      line-height: 1.2;
      margin-bottom: 4px;
    }

    .flow-name span {
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      font-weight: 700;
    }

    .flow-desc {
      font-size: 12px;
      color: rgba(250, 248, 244, 0.4);
      line-height: 1.6;
    }

    .flow-arrow {
      font-size: 18px;
      color: var(--or-base);
      opacity: 0.4;
      transition: opacity 0.3s, transform 0.3s var(--transition);
      flex-shrink: 0;
    }

    .flow-item:hover .flow-arrow {
      opacity: 1;
      transform: translateX(6px);
    }

    .flow-content {
      display: flex;
      flex-direction: column;
      gap: 12px;
    }

    .flow-actions {
      display: flex;
      gap: 12px;
      margin-top: 8px;
      flex-wrap: wrap;
    }

    .flow-btn {
      padding: 10px 20px;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: 0.5px;
      text-decoration: none;
      transition: all 0.3s var(--transition);
      display: inline-block;
      text-align: center;
    }

    .flow-btn-primary {
      background: transparent;
      border: 1px solid var(--ligne);
      color: var(--blanc);
    }

    .flow-btn-primary:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }

    .flow-btn-secondary {
      background: rgba(255, 215, 0, 0.08);
      border: 1px solid rgba(255, 215, 0, 0.2);
      color: var(--or-base);
    }

    .flow-btn-secondary:hover {
      background: rgba(255, 215, 0, 0.12);
      border-color: var(--or-base);
    }

    .flow-btn-highlight {
      background: var(--or-degrade);
      color: #1A1000;
      border: 1px solid transparent;
      padding: 12px 28px;
      font-weight: 700;
    }

    .flow-btn-highlight:hover {
      filter: brightness(1.15);
      transform: translateY(-2px);
    }

    .flow-features {
      display: flex;
      flex-direction: column;
      gap: 8px;
      margin-top: 12px;
      padding: 16px;
      background: rgba(255, 215, 0, 0.04);
      border-left: 2px solid var(--or-base);
    }

    .flow-feature {
      font-size: 13px;
      color: rgba(250, 248, 244, 0.7);
      line-height: 1.5;
    }

    /* ── EXPERTS ── */
    .experts {
      padding: 120px 48px;
      background: var(--gris);
      border-top: 1px solid var(--ligne);
    }

    .experts .section-title {
      font-weight: 200;
    }

    .experts .section-title em {
      font-style: italic;
      color: var(--or-base);
      font-weight: 300;
    }

    .experts .section-title strong {
      font-weight: 700;
      display: block;
    }

    .experts-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      margin-top: 64px;
    }

    .expert-card {
      background: var(--noir);
      padding: 40px 36px;
      border: 1px solid transparent;
      transition: border-color 0.4s var(--transition);
      position: relative;
      overflow: hidden;
    }

    .expert-card::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      height: 2px;
      background: var(--or-degrade);
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.4s var(--transition);
    }

    .expert-card:hover {
      border-color: var(--ligne);
    }

    .expert-card:hover::after {
      transform: scaleX(1);
    }

    .expert-photo-wrap {
      width: 100px;
      height: 100px;
      margin-bottom: 28px;
      position: relative;
      flex-shrink: 0;
    }

    .expert-photo-wrap::before {
      content: '';
      position: absolute;
      inset: -4px;
      border: 1px solid var(--or-base);
      opacity: 0;
      transition: opacity 0.4s;
      pointer-events: none;
    }

    .expert-card:hover .expert-photo-wrap::before {
      opacity: 1;
    }

    .expert-photo {
      width: 100px;
      height: 100px;
      object-fit: cover;
      object-position: center top;
      display: block;
      filter: grayscale(15%);
      transition: filter 0.4s;
    }

    .expert-card:hover .expert-photo {
      filter: grayscale(0%);
    }

    .expert-photo-placeholder {
      width: 100px;
      height: 100px;
      background: var(--gris2);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 26px;
      font-weight: 700;
      color: var(--or-base);
      letter-spacing: 1px;
    }

    .expert-name {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 6px;
      line-height: 1.2;
      color: var(--blanc);
    }

    .expert-role {
      font-size: 10px;
      letter-spacing: 2.5px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 500;
      margin-bottom: 20px;
      display: block;
    }

    .expert-bio {
      font-size: 13px;
      line-height: 1.75;
      color: rgba(250, 248, 244, 0.45);
      margin-bottom: 24px;
    }

    .expert-tag {
      display: inline-block;
      padding: 6px 14px;
      border: 1px solid var(--ligne);
      font-size: 10px;
      letter-spacing: 1.5px;
      color: rgba(250, 248, 244, 0.4);
      text-transform: uppercase;
      font-weight: 400;
      line-height: 1.4;
    }

    /* ── TÉMOIGNAGES ── */
    .testimonials {
      padding: 120px 48px;
      background: var(--noir);
      border-top: 1px solid var(--ligne);
    }

    .testimonials .section-title em {
      font-style: italic;
      color: var(--or-base);
      font-weight: 300;
    }

    .testimonials-grid {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 2px;
      margin-top: 64px;
    }

    .testimonial-card {
      padding: 44px 36px;
      background: var(--gris);
      border: 1px solid transparent;
      transition: border-color 0.4s var(--transition), background 0.4s;
      display: flex;
      flex-direction: column;
      position: relative;
      overflow: hidden;
    }

    .testimonial-card:hover {
      border-color: var(--ligne);
      background: #1E1E1C;
    }

    .testimonial-quote {
      font-family: Georgia, 'Times New Roman', serif;
      font-size: 56px;
      font-weight: 700;
      line-height: 1;
      background: var(--or-degrade);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      opacity: 0.25;
      margin-bottom: 20px;
      display: block;
      user-select: none;
      letter-spacing: -2px;
    }

    .testimonial-text {
      font-size: 14px;
      line-height: 1.8;
      font-style: italic;
      color: rgba(250, 248, 244, 0.7);
      font-weight: 300;
      margin-bottom: 32px;
      flex: 1;
    }

    .testimonial-author {
      display: flex;
      align-items: center;
      gap: 16px;
      padding-top: 24px;
      border-top: 1px solid var(--ligne);
    }

    .testimonial-avatar {
      width: 44px;
      height: 44px;
      min-width: 44px;
      background: var(--gris2);
      border: 1px solid var(--ligne);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 13px;
      font-weight: 700;
      color: var(--or-base);
      letter-spacing: 0.5px;
      flex-shrink: 0;
    }

    .testimonial-name {
      font-size: 14px;
      font-weight: 600;
      line-height: 1.2;
      color: var(--blanc);
    }

    .testimonial-company {
      font-size: 11px;
      color: rgba(250, 248, 244, 0.35);
      margin-top: 3px;
      line-height: 1.3;
    }

    .testimonial-service {
      margin-left: auto;
      font-size: 9px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      background: rgba(255, 215, 0, 0.05);
      border: 1px solid rgba(255, 215, 0, 0.15);
      padding: 5px 12px;
      white-space: nowrap;
      font-weight: 500;
      align-self: center;
      flex-shrink: 0;
    }

    /* ── BURGER MENU MOBILE ── */
    .nav-burger {
      display: none;
      background: transparent;
      border: 1px solid var(--ligne);
      color: var(--blanc);
      font-size: 22px;
      width: 40px;
      height: 40px;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      transition: all 0.3s;
      flex-shrink: 0;
    }

    .nav-burger:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }

    /* Drawer menu mobile */
    .nav-mobile-menu {
      display: none;
      position: fixed;
      top: 64px;
      left: 0;
      right: 0;
      background: rgba(10, 10, 10, 0.98);
      backdrop-filter: blur(15px);
      border-bottom: 1px solid var(--ligne);
      z-index: 999;
      padding: 20px 24px 32px;
      flex-direction: column;
      gap: 0;
    }

    .nav-mobile-menu.open {
      display: flex;
    }

    .nav-mobile-menu a {
      color: rgba(250, 248, 244, 0.75);
      text-decoration: none;
      font-size: 15px;
      font-weight: 500;
      letter-spacing: 0.5px;
      text-transform: uppercase;
      padding: 16px 0;
      border-bottom: 1px solid var(--ligne);
      display: block;
      transition: color 0.3s;
    }

    .nav-mobile-menu a:last-child {
      border-bottom: none;
    }

    .nav-mobile-menu a:hover {
      color: var(--or-base);
    }

    .nav-mobile-cta {
      margin-top: 20px;
      display: block;
      width: 100%;
      padding: 14px;
      text-align: center;
      background: var(--or-degrade);
      color: #1A1000 !important;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: 1px;
      text-transform: uppercase;
      text-decoration: none;
      border: none !important;
    }

    /* ── RESPONSIVE ── */
    @media (max-width: 1024px) {
      .services-layout {
        grid-template-columns: 1fr;
        gap: 48px;
      }

      .services-sticky {
        position: static;
      }

      .contact-content {
        grid-template-columns: 1fr;
      }

      .footer-content {
        grid-template-columns: 1fr 1fr;
      }

      .service-card-featured {
        grid-template-columns: 1fr;
      }

      .digital-layout {
        grid-template-columns: 1fr;
        gap: 48px;
      }

      .digital-visual {
        position: relative;
        height: 420px;
      }

      .experts-grid,
      .testimonials-grid {
        grid-template-columns: 1fr 1fr;
      }
    }

    @media (max-width: 768px) {
      #navbar {
        padding: 0 20px;
        height: 64px;
      }

      .nav-logo-mark {
        height: 72px;
      }

      .nav-links {
        display: none;
      }

      .nav-cta {
        display: none;
      }

      .nav-burger {
        display: flex;
      }

      .hero {
        flex-direction: column;
        padding: 90px 20px 60px;
        gap: 40px;
        min-height: auto;
      }

      .hero-left {
        max-width: 100%;
        width: 100%;
      }

      .hero-title {
        font-size: clamp(30px, 8vw, 48px);
        word-break: break-word;
        overflow-wrap: break-word;
      }

      .hero-subtitle {
        font-size: 14px;
      }

      .hero-stats {
        gap: 24px;
      }

      .stat-number {
        font-size: 28px;
      }

      .hero-right {
        justify-content: center;
        width: 100%;
      }

      .hero-card-stack {
        width: 100%;
        max-width: 360px;
        height: 380px;
      }

      section {
        padding: 64px 20px;
      }

      .agrements {
        padding: 20px;
        gap: 20px;
        flex-direction: column;
      }

      .agrement-items {
        flex-direction: column;
        gap: 12px;
      }

      .offres-controls {
        flex-direction: column;
        align-items: stretch;
      }

      .offres-tabs {
        flex-wrap: wrap;
      }

      .offres-grid {
        grid-template-columns: 1fr;
      }

      .form-row {
        grid-template-columns: 1fr;
      }

      .footer {
        padding: 48px 20px 24px;
      }

      .footer-content {
        grid-template-columns: 1fr;
        gap: 32px;
      }

      .footer-bottom {
        flex-direction: column;
        text-align: center;
      }

      .chatbot-trigger {
        bottom: 20px;
        right: 20px;
        width: 52px;
        height: 52px;
      }

      .chatbot-window {
        bottom: 84px;
        right: 16px;
        left: 16px;
        width: auto;
      }

      .devis-item {
        grid-template-columns: 1fr;
        gap: 12px;
      }

      .digital-visual {
        height: 300px;
      }

      .app-mockup-left,
      .app-mockup-right {
        display: none;
      }

      .app-mockup-main {
        width: 240px;
      }

      .flow-item {
        grid-template-columns: auto 1fr;
      }

      .flow-arrow {
        display: none;
      }

      .flow-actions {
        justify-content: center;
      }

      .experts,
      .testimonials {
        padding: 64px 20px;
      }

      .experts-grid,
      .testimonials-grid {
        grid-template-columns: 1fr;
      }

      .testimonial-author {
        flex-wrap: wrap;
      }

      .testimonial-service {
        margin-left: 0;
        margin-top: 10px;
      }

      .section-title {
        font-size: clamp(26px, 7vw, 40px);
      }

      .modal-container {
        max-height: 95vh;
      }

      .modal-header,
      .modal-body {
        padding: 20px;
      }

      .modal-footer {
        padding: 16px 20px;
        flex-wrap: wrap;
      }

      .modal-steps {
        padding: 16px 20px;
        overflow-x: auto;
      }

      .step-label {
        display: none;
      }

      .notification {
        right: 16px;
        left: 16px;
        min-width: auto;
      }

      /* ── FIX BURGER + LOGO ── */
  html {
    overflow-x: hidden;
    max-width: 100%;
  }

  .nav-logo-mark {
    height: 40px !important;
    z-index: auto !important;
  }

  .nav-burger {
    z-index: 1002;
    margin-left: auto;
  }

  /* ── FIX TAILLE CARTES OFFRES ── */
  .offre-card {
    padding: 24px 20px;
  }

  .offre-icone {
    width: 40px;
    height: 40px;
    margin-bottom: 14px;
  }

  .offre-tier {
    font-size: 9px;
    margin-bottom: 10px;
  }

  .offre-name {
    font-size: 22px;
  }

  .offre-tagline {
    font-size: 12px;
    margin-bottom: 20px;
  }

  .offre-cible {
    font-size: 10px;
    margin-bottom: 12px;
  }

  .offre-price {
    padding: 16px 0;
    margin-bottom: 20px;
  }

  .price-value {
    font-size: 26px;
  }

  .offre-features {
    margin-bottom: 20px;
  }

  .offre-features li {
    font-size: 12px;
    padding: 7px 0;
    gap: 8px;
  }

  .offre-cta,
  .btn-souscrire {
    padding: 12px;
    font-size: 10px;
  }
    }



    /* ── TRÈS PETITS ÉCRANS ── */
    @media (max-width: 480px) {

      .grille-tarifaire {
        padding: 16px 12px;
        margin-top: 24px;
      }

      .grille-title {
        font-size: 12px;
        margin-bottom: 14px;
      }

      /* Transforme le tableau en cartes empilées, plus de scroll horizontal */
      .grille-table thead {
        display: none;
      }

      .grille-table,
      .grille-table tbody,
      .grille-table tr {
        display: block;
        width: 100%;
      }

      .grille-table tr {
        margin-bottom: 14px;
        padding: 12px 14px;
        background: rgba(255, 215, 0, 0.03);
        border: 1px solid var(--ligne);
      }

      .grille-table tr:last-child {
        margin-bottom: 0;
      }

      .grille-table td {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 8px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        font-size: 11px;
        text-align: right;
      }

      .grille-table td:last-child {
        border-bottom: none;
      }

      .grille-table td::before {
        content: attr(data-label);
        font-size: 9px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--or-base);
        font-weight: 600;
        text-align: left;
        padding-right: 12px;
      }

      .grille-table td[data-label="Profil"] {
        font-size: 13px;
      }

      .grille-note {
        font-size: 9px;
        margin-top: 10px;
      }

      /* ── AVANTAGES FIDÉLITÉ ── */
      .avantages-fidelite {
        padding: 16px 14px;
        margin-top: 16px;
      }

      .fidelite-cards {
        flex-direction: column;
        gap: 10px;
        margin-top: 8px;
      }

      .fidelite-card {
        min-width: 0;
        width: 100%;
        font-size: 12px;
        padding: 12px 14px;
      }

      /* ── OFFRES ── */
      .offre-card {
        padding: 16px 14px;
        overflow: hidden;
      }

      .offre-name {
        font-size: 17px;
        line-height: 1.25;
        word-break: break-word;
      }

      .offre-tagline {
        font-size: 11px;
        line-height: 1.4;
      }

      .offre-features li {
        font-size: 11px;
        line-height: 1.35;
      }

      .offre-card.recommended::before {
        font-size: 8px;
        padding: 4px 10px;
        white-space: nowrap;
      }

      #navbar {
        padding: 0 16px;
      }

      .nav-logo-mark {
        height: 60px;
      }

      .hero {
        padding: 80px 16px 48px;
        gap: 32px;
      }

      .hero-title {
        font-size: clamp(26px, 9vw, 38px);
      }

      .hero-badge-text {
        font-size: 9px;
        letter-spacing: 1px;
      }

      .hero-actions {
        flex-direction: column;
        gap: 12px;
      }

      .btn-primary,
      .btn-secondary {
        width: 100%;
        text-align: center;
        padding: 14px 20px;
      }

      .hero-stats {
        gap: 16px;
      }

      .stat-number {
        font-size: 24px;
      }

      .hero-card-stack {
        height: 320px;
      }

      .hero-card {
        padding: 20px;
      }

      section {
        padding: 48px 16px;
      }

      .agrements {
        padding: 16px;
      }

      .service-card {
        padding: 24px 20px;
      }

      .experts,
      .testimonials {
        padding: 48px 16px;
      }

      .expert-card {
        padding: 28px 20px;
      }

      .testimonial-card {
        padding: 28px 20px;
      }

      .footer {
        padding: 40px 16px 20px;
      }

      .chatbot-window {
        right: 8px;
        left: 8px;
      }

      .flow-item {
        padding: 16px 18px;
        gap: 12px;
      }

      .contact-content {
        gap: 40px;
      }

      .section-title {
        font-size: clamp(22px, 8vw, 32px);
      }

      .hero-grid {
        display: none;
      }
    }

    /*
    1. flow-item passe à 3 colonnes pour accueillir .flow-arrow
  */
    .flow-item {
      grid-template-columns: auto 1fr auto;
      align-items: center;
      text-decoration: none;
      color: inherit;
    }

    /*
    2. Flèche décorative à droite de chaque flow-item
  */
    .flow-arrow {
      font-size: 20px;
      color: var(--or-base);
      opacity: 0.5;
      transition: opacity 0.3s, transform 0.3s var(--transition);
      flex-shrink: 0;
    }

    .flow-item:hover .flow-arrow {
      opacity: 1;
      transform: translateX(4px);
    }

    .modal-form-row {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 16px;
  margin-bottom: 16px;
}

@media (max-width: 768px) {
  .modal-form-row {
    grid-template-columns: 1fr;
  }
}

    /* Spinner pour le chargement */
    .spinner {
      display: inline-block;
      width: 16px;
      height: 16px;
      border: 2px solid rgba(26, 16, 0, 0.3);
      border-radius: 50%;
      border-top-color: #1A1000;
      animation: spin 1s ease-in-out infinite;
      margin-right: 8px;
    }

    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>

<body>

  <!-- Curseur Custom -->
  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <!-- Navigation -->
  <nav id="navbar">
    <a href="#" class="nav-logo">
      <img src="{{ asset('images/teste.jpeg') }}" alt="DC-KNOWING" class="nav-logo-mark">
    </a>
    <ul class="nav-links">
      <li><a href="#services">Services</a></li>
      <li><a href="{{ url('/') }}#offres">Offres</a></li>
      <li class="nav-dropdown" style="position:relative;"
        onmouseenter="this.querySelector('.dropdown-menu').style.display='block'"
        onmouseleave="this.querySelector('.dropdown-menu').style.display='none'">
        <a href="{{ url('/') }}#digital">Solutions digitales</a>
        <ul class="dropdown-menu"
          style="display:none; position:absolute; top:100%; left:0; background:#111; padding:10px 0; border:1px solid #2a2a2a; border-radius:4px; min-width: 180px; z-index: 100; list-style: none;">
          <li style="padding: 5px 20px;"><a href="{{ url('/') }}#digital"
              style="text-transform: none; color: #fff; font-size: 13px;">RH Flow</a></li>
          <li style="padding: 5px 20px;"><a href="{{ url('/') }}#digital"
              style="text-transform: none; color: #fff; font-size: 13px;">Compta Flow</a></li>
          <li style="padding: 5px 20px;"><a href="{{ url('/') }}#digital"
              style="text-transform: none; color: #fff; font-size: 13px;">Sell Flow</a></li>
          <li style="padding: 5px 20px;"><a href="{{ url('/') }}#digital"
              style="text-transform: none; color: #fff; font-size: 13px;">Legal Flow</a></li>
        </ul>
      </li>
      <li><a href="{{ route('services.formation') }}">Formation</a></li>
      <li><a href="{{ url('/') }}#mes-devis">Mes Devis</a></li>
      <li><a href="{{ url('/') }}#contact">Contact</a></li>
    </ul>
    <a href="{{ url('/') }}#contact" class="nav-cta"><span>Consultation offerte</span></a>
    <button class="nav-burger" id="navBurger" aria-label="Menu">☰</button>
  </nav>

  <!-- Menu Mobile Drawer -->
  <div class="nav-mobile-menu" id="mobileMenu">
    <a href="#services" onclick="closeMobileMenu()">Services</a>
    <a href="{{ url('/') }}#offres" onclick="closeMobileMenu()">Offres</a>
    <a href="{{ url('/') }}#digital" onclick="closeMobileMenu()">Solutions digitales</a>
    <a href="{{ route('services.formation') }}" onclick="closeMobileMenu()">Formation</a>
    <a href="{{ url('/') }}#mes-devis" onclick="closeMobileMenu()">Mes Devis</a>
    <a href="{{ url('/') }}#contact" onclick="closeMobileMenu()">Contact</a>
    <a href="{{ url('/') }}#contact" class="nav-mobile-cta" onclick="closeMobileMenu()">Consultation offerte</a>
  </div>

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
        <em>Votre <span
            style="background:var(--or-degrade);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;font-weight:700;">Cabinet</span>
          de</em>
        <strong
          style="background:none;-webkit-text-fill-color:var(--blanc);color:var(--blanc);">Gestion
          &amp; de Conseil</strong>
        <strong><em>Premium</em></strong>
      </h1>
      <p class="hero-subtitle">DC-KNOWING accompagne les entrepreneurs et dirigeants dans la création, la structuration
        et le développement de leur entreprise — avec rigueur juridique, excellence financière et innovation digitale.
      </p>
      <div class="hero-actions">
        <a href="#services" class="btn-primary">Découvrir nos services →</a>
        <a href="#contact" class="btn-secondary">Prendre rendez-vous</a>
      </div>
      <div class="hero-stats">
        <div class="stat-item"><span class="stat-number">500<sup>+</sup></span><span class="stat-label">Entreprises
            créées</span></div>
        <div class="stat-item"><span class="stat-number">12</span><span class="stat-label">Années d'expertise</span>
        </div>
        <div class="stat-item"><span class="stat-number">98%</span><span class="stat-label">Satisfaction client</span>
        </div>
      </div>
      <div class="scroll-indicator">
        <div class="scroll-line"></div><span class="scroll-text">Défiler</span>
      </div>
    </div>
    <div class="hero-right">
      <div class="hero-card-stack">
        <div class="hero-card hero-card-back2"></div>
        <div class="hero-card hero-card-back1"></div>
        <div class="hero-card hero-card-main">
          <div class="card-tag">Service actif</div>
          <div class="card-service-name">Compta Flow</div>
          <div class="card-desc">Comptabilité OHADA en temps réel, synchronisée avec votre expert DC-KNOWING.</div>
          <div class="card-progress-label"><span>Conformité fiscale</span><span class="progress-percent">98%</span>
          </div>
          <div class="card-progress-bar">
            <div class="card-progress-fill"></div>
          </div>
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
      <div class="agrement-item">
        <div class="agrement-icon"></div><span class="agrement-text">MBPE — Ministère du Budget</span>
      </div>
      <div class="agrement-item">
        <div class="agrement-icon"></div><span class="agrement-text">FDFP — Formation Professionnelle</span>
      </div>
      <div class="agrement-item">
        <div class="agrement-icon"></div><span class="agrement-text">Centre de Gestion Agréé (CGA)</span>
      </div>
      <div class="agrement-item">
        <div class="agrement-icon"></div><span class="agrement-text">Droit OHADA — Zone UEMOA</span>
      </div>
    </div>
  </div>

  <!-- Services Section -->
  <section class="services" id="services">
    <div class="services-layout">
      <div class="services-sticky">
        <div class="section-header">
          <div class="section-tag reveal">Nos expertises</div>
          <h2 class="section-title reveal reveal-d1">Un cabinet <em>complet</em><strong>pour chaque étape</strong></h2>
          <p class="section-intro reveal reveal-d2">De la création de votre structure à sa croissance internationale,
            DC-KNOWING mobilise des experts certifiés pour couvrir l'ensemble de vos besoins.</p>
          <div class="chips reveal reveal-d3">
            <span class="chip">OHADA</span><span class="chip">Droit ivoirien</span><span class="chip">CNPS /
              CMU</span><span class="chip">DGI</span><span class="chip">RCCM</span><span class="chip">CEPICI</span>
          </div>
        </div>
      </div>
      <div class="services-grid">
        <div class="service-card reveal">
          <div class="service-number">01</div>
          <div class="service-icon">⚖️</div>
          <div class="service-name">Juridique & Corporate</div>
          <div class="service-desc">Création d'entreprises (SARL, SA, SAS, ONG…), modifications statutaires, secrétariat
            juridique annuel, rédaction d'actes et PV d'assemblée.</div>
          <div class="service-note">⚠️ Exception : Les contrats de bails ne sont pas pris en charge.</div>
          <a href="{{ route('services.juridique') }}" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d1">
          <div class="service-number">02</div>
          <div class="service-icon">📊</div>
          <div class="service-name">Comptabilité & Finance</div>
          <div class="service-desc">Tenue comptable OHADA, états financiers, direction financière externalisée (DFE),
            tableaux de bord et pilotage de la performance.</div>
          <a href="#offres" onclick="goToOffres('comptabilite')" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d2">
          <div class="service-number">03</div>
          <div class="service-icon">🛡️</div>
          <div class="service-name">CGA — Centre de Gestion Agréé</div>
          <div class="service-desc">Optimisation fiscale, dossier de gestion personnalisé, conformité comptable et
            sociale — adhérez et économisez jusqu'à 40% sur vos charges fiscales.</div>
          <a href="{{ route('services.cga') }}" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d3">
          <div class="service-number">04</div>
          <div class="service-icon">👥</div>
          <div class="service-name">Paie & Ressources Humaines</div>
          <div class="service-desc">Bulletins de paie certifiés, déclarations CNPS/CMU, contrats de travail, règlement
            intérieur, gestion des procédures sociales et disciplinaires.</div>
          <a href="#offres" onclick="goToOffres('rh')" class="service-link">Explorer →</a>
        </div>
        <div class="service-card service-card-featured reveal">
          <div>
            <div class="service-number">05 — Offre Stratégique</div>
            <div class="service-name">Structuration Financière & Levées de Fonds</div>
            <div class="service-desc">Nous préparons votre entreprise à accéder aux financements bancaires, aux fonds
              d'investissement et aux subventions. Modélisation financière, mémorandum d'information, mise en relation
              investisseurs et success fee aligné sur vos résultats.</div>
            <a href="#contact" class="service-link" style="margin-top:24px">Prendre rendez-vous →</a>
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
          <div class="service-desc">Programmes certifiés agréés FDFP : Pack Forfaitaire (CAPG), FNE, E-impôts, SYSCOHADA
            et Gestion de Paie. Devenez opérationnel en 2 mois.</div>
          <a href="{{ route('services.formation') }}" class="service-link">Programme →</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Offres Section -->
  <section class="offres" id="offres">
    <div class="section-header">
      <div class="section-tag reveal">Formules & Tarifs</div>
      <h2 class="section-title reveal reveal-d1">Des offres <em>claires</em><strong>à chaque stade</strong></h2>
      <p class="section-intro reveal reveal-d2">Chaque formule est pensée pour délivrer une valeur mesurable — du
        conseil à l'acte jusqu'à l'abonnement qui vous protège au quotidien.</p>
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
      <p class="section-intro reveal reveal-d2">Retrouvez ici tous les devis générés pendant votre session. Validez-les
        pour confirmer votre commande.</p>
    </div>

    <div class="devis-container" id="devisContainer">
      <div class="devis-empty">
        <div class="empty-icon">📄</div>
        <div class="empty-text">Aucun devis créé pour le moment</div>
        <a href="{{ route('services.offres') }}" class="btn-primary">Découvrir nos offres</a>
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



  <section class="testimonials" id="testimonials">
    <div class="section-header">
      <div class="section-tag reveal">Ils nous font confiance</div>
      <h2 class="section-title reveal reveal-d1">Ce que disent <em>nos clients</em><strong>après notre
          accompagnement</strong></h2>
    </div>
    <div class="testimonials-grid">
      <div class="testimonial-card reveal">
        <div class="testimonial-quote">"</div>
        <div class="testimonial-text">Grâce à DC-KNOWING, nous avons pu structurer notre entreprise de manière efficace.
          Leur expertise juridique et financière nous a permis d'éviter de nombreux écueils et d'optimiser notre
          développement.</div>
        <div class="testimonial-author">
          <div class="testimonial-avatar">SA</div>
          <div>
            <div class="testimonial-name">Sebastien Augustin</div>
            <div class="testimonial-company">Directeur — Ecotech Solutions</div>
          </div>
          <span class="testimonial-service">Juridique</span>
        </div>
      </div>
      <div class="testimonial-card reveal reveal-d1">
        <div class="testimonial-quote">"</div>
        <div class="testimonial-text">Les solutions digitales de DC-KNOWING ont transformé notre gestion quotidienne.
          Compta Flow nous fait gagner un temps précieux et nous permet de nous concentrer sur notre cœur de métier.
        </div>
        <div class="testimonial-author">
          <div class="testimonial-avatar">AM</div>
          <div>
            <div class="testimonial-name">AFRICAMOOV</div>
            <div class="testimonial-company">Fondateur — Artisan Numérique</div>
          </div>
          <span class="testimonial-service">Compta Flow</span>
        </div>
      </div>
      <div class="testimonial-card reveal reveal-d2">
        <div class="testimonial-quote">"</div>
        <div class="testimonial-text">L'accompagnement de DC-KNOWING dans notre recherche de financement a été
          déterminant. Leur expertise et leur réseau nous ont permis d'obtenir les fonds nécessaires pour notre
          expansion internationale.</div>
        <div class="testimonial-author">
          <div class="testimonial-avatar">DO</div>
          <div>
            <div class="testimonial-name">Dylan Owen</div>
            <div class="testimonial-company">CEO — Innovatech</div>
          </div>
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
      <form class="contact-form" id="contactForm" onsubmit="handleContactSubmit(event)">
        <div class="form-row">
          <div class="form-group">
            <label>Nom complet</label>
            <input type="text" name="nom" placeholder="Jean Dupont" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" placeholder="jean@entreprise.com" required>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group">
            <label>Téléphone</label>
            <input type="tel" name="telephone" placeholder="+225 XX XX XX XX XX">
          </div>
          <div class="form-group">
            <label>Entreprise</label>
            <input type="text" name="entreprise" placeholder="Nom de votre structure">
          </div>
        </div>
        <div class="form-group">
          <label>Votre besoin</label>
          <textarea name="besoin" placeholder="Décrivez brièvement votre projet ou besoin..." rows="5"></textarea>
        </div>
        <button type="submit" class="btn-primary" id="contactSubmitBtn">Envoyer ma demande →</button>
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
            <div class="contact-value">infos@dc-knowing.com</div>
          </div>
        </div>
        <div class="contact-item"><div class="contact-icon">📧</div>
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
        <p class="footer-desc">Cabinet agréé MBPE & FDFP spécialisé dans l'accompagnement des entreprises en Côte
          d'Ivoire et zone UEMOA.</p>
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
        <a href="{{ route('services.offres') }}">Nos offres</a>
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
      <path d="M20 2H4C2.9 2 2 2.9 2 4V22L6 18H20C21.1 18 22 17.1 22 16V4C22 2.9 21.1 2 20 2ZM20 16H6L4 18V4H20V16Z"
        fill="currentColor" />
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
      <button class="chatbot-close" id="chatbotClose" aria-label="Fermer la discussion" title="Fermer">×</button>
    </div>
    <div class="chatbot-messages">
      <div class="chatbot-message bot">
        <div class="chatbot-message-content">
          Bonjour ! 👋 Comment puis-je vous aider aujourd'hui ?
        </div>
      </div>
    </div>
    <div class="chatbot-input-container">
      <input type="text" class="chatbot-input" placeholder="Posez votre question...">
      <button class="chatbot-send" aria-label="Envoyer le message" title="Envoyer">→</button>
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
        <button class="modal-close" id="modalClose" aria-label="Fermer la fenêtre" title="Fermer">×</button>
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
      <button class="modal-close" id="devisModalClose" aria-label="Fermer le devis" title="Fermer">×</button>
      <div id="devisModalContent"></div>
    </div>
  </div>

  <!-- Notification -->
  <div class="notification" id="notification">
    <div class="notification-dot"></div>
    <div class="notification-text" id="notificationText"></div>
  </div>

  <script>
    // =============================================
    // DC-KNOWING — JavaScript Principal
    // Curseur élastique lerp + Animations fluides
    // =============================================

    // ── CONFIGURATION & DONNÉES ──
    const OFFRES_DATA = [
      //
      // FORMULES D'ACCOMPAGNEMENT EN GESTION (cœur de métier)
      //


      //  FORMULE ESSENTIELLE
      {
        id: 'essentielle',
        categorie: 'comptabilite',
        categories: ['comptabilite'],
        tier: 'Essentielle',
        iconeCls: 'ico-shield',
        nom: 'Formule Essentielle',
        tagline: 'Sécuriser vos bases',
        clientCible: 'Entrepreneurs, TPE, activités en création',
        prixMin: 100000,
        prixMax: 0,
        unite: 'HT / mois',
        recommended: false,
        features: [
          'Tenue comptable SYSCOHADA révisé & télédéclarations DGI',
          'Déclarations sociales CNPS & suivi obligations personnel',
          'Assistance à la formalisation (RCCM, régime fiscal)',
          'Veille échéances fiscales et sociales avec alertes'
        ]
      },


      //  FORMULE CROISSANCE
      {
        id: 'croissance',
        categorie: 'comptabilite',
        categories: ['comptabilite'],
        tier: 'Croissance',
        iconeCls: 'ico-chart',
        nom: 'Formule Croissance',
        tagline: 'Piloter votre développement',
        clientCible: 'PME structurées en phase de croissance',
        prixMin: 250000,
        prixMax: 0,
        unite: 'HT / mois',
        recommended: true,
        prefixe: 'Tout Essentielle, plus :',
        features: [
          'Tableaux de bord mensuels & suivi budgétaire',
          'Gestion et prévision de trésorerie',
          'États financiers annuels & liasse fiscale SYSCOHADA',
          'Reporting mensuel commenté remis au dirigeant'
        ]
      },


      //  FORMULE PREMIUM
      {
        id: 'premium',
        categorie: 'comptabilite',
        categories: ['comptabilite', 'finance'],
        tier: 'Premium',
        iconeCls: 'ico-crown',
        nom: 'Formule Premium',
        tagline: 'Direction financière externalisée',
        clientCible: 'PME établies, projets d\'investissement',
        prixMin: 1000000,
        prixMax: 0,
        unite: 'HT / mois',
        recommended: false,
        prefixe: 'Tout Croissance, plus :',
        features: [
          'Business plans & recherche de financement',
          'Contrôle de gestion & optimisation fiscale',
          'Assistance contrôles fiscaux et sociaux',
          'Participation aux comités de direction'
        ]
      },


      //
      // PRESTATIONS PONCTUELLES
      //


      {
        id: 'presta-diagnostic',
        categorie: 'comptabilite',
        categories: ['comptabilite'],
        cible: 'morale',
        tier: 'Ponctuel',
        nom: 'Diagnostic Initial de Gestion',
        tagline: 'Audit de votre organisation comptable, fiscale et sociale',
        prixMin: 100000,
        prixMax: 0,
        unite: 'HT à partir de',
        recommended: false,
        features: [
          'Analyse de l\'organisation comptable existante',
          'Vérification de la conformité fiscale et sociale',
          'Identification des priorités et axes d\'amélioration',
          'Recommandations personnalisées',
          'Remise d\'un rapport de diagnostic'
        ]
      },
      {
        id: 'presta-formalisation',
        categorie: 'juridique',
        categories: ['juridique'],
        cible: 'morale',
        tier: 'Ponctuel',
        nom: 'Assistance à la Formalisation',
        tagline: 'Création et mise en conformité de votre entreprise',
        prixMin: 150000,
        prixMax: 500000,
        unite: 'HT',
        recommended: false,
        features: [
          'Immatriculation CEPICI, RCCM, DFE',
          'Déclaration fiscale et choix du régime adapté',
          'Constitution du dossier juridique complet',
          'Obtention des documents officiels'
        ]
      },
      {
        id: 'presta-etats-financiers',
        categorie: 'comptabilite',
        categories: ['comptabilite'],
        cible: 'morale',
        tier: 'Ponctuel',
        nom: 'États Financiers Annuels & Liasse Fiscale',
        tagline: 'Établissement ponctuel de vos comptes annuels',
        prixMin: 300000,
        prixMax: 0,
        unite: 'HT à partir de',
        recommended: false,
        features: [
          'Bilan, Compte de Résultat et Annexes SYSCOHADA',
          'Liasse fiscale complète',
          'Analyse des principaux ratios financiers'
        ]
      },
      {
        id: 'presta-business-plan',
        categorie: 'finance',
        categories: ['finance'],
        cible: 'morale',
        tier: 'Ponctuel',
        nom: 'Business Plan & Étude de Rentabilité',
        tagline: 'Un dossier solide pour vos investisseurs et banques',
        prixMin: 500000,
        prixMax: 0,
        unite: 'HT à partir de',
        recommended: false,
        features: [
          'Analyse du modèle économique',
          'Projections financières 3-5 ans',
          'Plan de financement et BFR',
          'Mémorandum d\'information'
        ]
      },
      {
        id: 'presta-financement',
        categorie: 'finance',
        categories: ['finance'],
        cible: 'morale',
        tier: 'Ponctuel',
        nom: 'Montage de Dossier de Financement',
        tagline: 'Accédez aux financements bancaires et investisseurs',
        prixMin: 500000,
        prixMax: 0,
        unite: 'HT à partir de (+ success fee)',
        recommended: true,
        features: [
          'Constitution du dossier bancaire complet',
          'Préparation aux rendez-vous banques',
          'Accompagnement dans les négociations',
          'Honoraire de succès selon montant obtenu'
        ]
      },
      {
        id: 'presta-controle-fiscal',
        categorie: 'comptabilite',
        categories: ['comptabilite', 'finance'],
        cible: 'morale',
        tier: 'Ponctuel',
        nom: 'Assistance Contrôle Fiscal ou Social',
        tagline: 'Un expert à vos côtés face à l\'administration',
        prixMin: 100000,
        prixMax: 150000,
        unite: 'HT / jour',
        recommended: false,
        features: [
          'Préparation du dossier et des justificatifs',
          'Présence lors du contrôle sur site',
          'Rédaction des réponses aux notifications'
        ]
      },
      {
        id: 'presta-formation',
        categorie: 'formation',
        categories: ['formation'],
        cible: 'morale',
        tier: 'Ponctuel',
        nom: 'Formation du Personnel',
        tagline: 'Montez en compétence sur la gestion d\'entreprise',
        prixMin: 150000,
        prixMax: 300000,
        unite: 'HT / jour',
        recommended: false,
        features: [
          'Comptabilité générale et analytique',
          'Fiscalité ivoirienne pratique',
          'Outils de gestion et logiciels comptables',
          'Programme adapté à vos besoins'
        ]
      },
      {
        id: 'presta-systeme-comptable',
        categorie: 'comptabilite',
        categories: ['comptabilite'],
        cible: 'morale',
        tier: 'Ponctuel',
        nom: 'Mise en Place d\'un Système Comptable',
        tagline: 'Structuration de vos procédures et outils internes',
        prixMin: 500000,
        prixMax: 0,
        unite: 'HT à partir de',
        recommended: false,
        features: [
          'Organisation du classement et des procédures comptables',
          'Paramétrage du logiciel comptable adapté',
          'Formation du personnel aux procédures',
          'Documentation des processus internes'
        ]
      },
      {
        id: 'presta-consultation',
        categorie: 'comptabilite',
        categories: ['comptabilite', 'finance', 'juridique'],
        cible: 'morale',
        tier: 'Ponctuel',
        nom: 'Consultation Ponctuelle',
        tagline: 'Un avis d\'expert sur une question précise',
        prixMin: 50000,
        prixMax: 200000,
        unite: 'HT / consultation',
        recommended: false,
        features: [
          'Note de conseil fiscal ou de gestion',
          'Analyse d\'une situation spécifique',
          'Recommandations écrites'
        ]
      },


      //
      // JURIDIQUE — Création d'entreprise
      //


      {
        id: 'jur-starter',
        categorie: 'juridique',
        cible: 'morale',
        tier: 'Création',
        nom: 'Création d\'Entreprise — Starter',
        tagline: 'Créez votre SARL, SA ou SAS en toute sérénité',
        prixMin: 450000,
        prixMax: 450000,
        unite: 'HT forfait',
        recommended: false,
        features: [
          'Conseil sur la forme juridique adaptée',
          'Rédaction complète des statuts conformes OHADA',
          'Immatriculation RCCM et obtention du numéro CC',
          'Déclaration fiscale DFE auprès de la DGI',
          'Livraison des documents officiels sous 10 jours ouvrés'
        ]
      },
      {
        id: 'jur-premium',
        categorie: 'juridique',
        cible: 'morale',
        tier: 'Création',
        nom: 'Création d\'Entreprise — Premium',
        tagline: 'Structurez votre entreprise avec conformité totale',
        prixMin: 750000,
        prixMax: 750000,
        unite: 'HT forfait',
        recommended: true,
        features: [
          'Tout Starter +',
          'Rédaction du règlement intérieur',
          'Assistance adhésion CNPS, CMU, DGI employeur',
          'Création de registres légaux',
          'Formation du dirigeant (2h)',
          'Suivi post-création 3 mois'
        ]
      },
      {
        id: 'jur-secretariat',
        categorie: 'juridique',
        cible: 'morale',
        tier: 'Abonnement',
        nom: 'Secrétariat Juridique Annuel',
        tagline: 'Votre conformité légale gérée toute l\'année',
        prixMin: 180000,
        prixMax: 180000,
        unite: 'HT / an',
        recommended: false,
        features: [
          'Tenue des Assemblées Générales',
          'Rédaction des PV de décisions',
          'Mise à jour du registre de commerce',
          'Veille réglementaire et alertes échéances',
          'Hotline juridique illimitée'
        ]
      },


      {
        id: 'formation-fdfp',
        categorie: 'formation',
        categories: ['formation'],
        cible: 'morale',
        tier: 'Formation',
        nom: 'Formation Professionnelle FDFP',
        tagline: 'Programmes certifiés agréés FDFP — prise en charge possible',
        prixMin: 0,
        prixMax: 0,
        unite: 'Sur devis',
        recommended: false,
        cta: 'Consulter →',
        ctaUrl: 'services/formation.html',
        features: [
          'Comptabilité générale et analytique',
          'Fiscalité ivoirienne pratique',
          'Droit des affaires et management',
          'IA, bureautique avancée, outils digitaux',
          'Logiciels de gestion et ERP',
          'Programmes certifiés agréés FDFP'
        ]
      },
    ];

    let currentModalStep = 1;
    let currentOffreData = null;
    let formData = {};
    let sessionDevis = [];

    // ════════════════════════════════════════════
    // INITIALISATION
    // ════════════════════════════════════════════
    document.addEventListener('DOMContentLoaded', () => {
      initCursor();        // ← en premier pour un curseur immédiat
      initOffres();
      initFiltres();
      initScrollReveal();
      initNavbar();
      initSmoothLinks();
      loadSessionDevis();
      renderDevisList();

      document.getElementById('contactForm')?.addEventListener('submit', handleContactSubmit);
      document.getElementById('modalClose')?.addEventListener('click', closeModal);
      document.getElementById('devisModalClose')?.addEventListener('click', closeDevisModal);
      document.getElementById('modalOverlay')?.addEventListener('click', e => {
        if (e.target.id === 'modalOverlay') closeModal();
      });
      document.getElementById('devisModal')?.addEventListener('click', e => {
        if (e.target.id === 'devisModal') closeDevisModal();
      });
    });

    // ════════════════════════════════════════════
    // ──────────────────────────────────────────────
    // CURSEUR ÉLASTIQUE (V4 - ROBUSTE)
    // ──────────────────────────────────────────────
    function initCursor() {
      // Désactiver sur mobile/tactile pour éviter les bugs
      if ('ontouchstart' in window || navigator.maxTouchPoints > 0) return;

      const cursor = document.querySelector('.cursor');
      const ring = document.querySelector('.cursor-ring');
      if (!cursor || !ring) return;

      let mouseX = -100, mouseY = -100; // Position cible
      let cursorX = -100, cursorY = -100; // Position point
      let ringX = -100, ringY = -100; // Position anneau
      let isFirstMove = true;

      document.addEventListener('mousemove', e => {
        mouseX = e.clientX;
        mouseY = e.clientY;

        if (isFirstMove) {
          cursorX = ringX = mouseX;
          cursorY = ringY = mouseY;
          cursor.style.opacity = '1';
          ring.style.opacity = '1';
          isFirstMove = false;
        }
      });

      function render() {
        // Interpolation pour le point (très rapide)
        cursorX += (mouseX - cursorX) * 0.5;
        cursorY += (mouseY - cursorY) * 0.5;

        // Interpolation pour l'anneau (plus lent/élastique)
        ringX += (mouseX - ringX) * 0.15;
        ringY += (mouseY - ringY) * 0.15;

        cursor.style.transform = `translate3d(${cursorX}px, ${cursorY}px, 0) translate(-50%, -50%)`;
        ring.style.transform = `translate3d(${ringX}px, ${ringY}px, 0) translate(-50%, -50%)`;

        requestAnimationFrame(render);
      }
      render();

      // Interactions
      const interactives = 'a, button, [role="button"], .flow-item, .service-card, .offre-card, .btn-souscrire, .nav-cta, label';
      document.body.addEventListener('mouseover', e => {
        if (e.target.closest(interactives)) ring.classList.add('hovered');
      });
      document.body.addEventListener('mouseout', e => {
        if (e.target.closest(interactives)) ring.classList.remove('hovered');
      });

      // Visibilité fenêtre
      document.addEventListener('mouseleave', () => {
        cursor.style.opacity = '0';
        ring.style.opacity = '0';
      });
      document.addEventListener('mouseenter', () => {
        cursor.style.opacity = '1';
        ring.style.opacity = '1';
      });
    }

    // ════════════════════════════════════════════
    // NAVBAR — fond au scroll
    // ════════════════════════════════════════════
    function initNavbar() {
      const navbar = document.getElementById('navbar');
      if (!navbar) return;

      const onScroll = () => {
        if (window.scrollY > 60) {
          navbar.classList.add('scrolled');
        } else {
          navbar.classList.remove('scrolled');
        }
      };

      window.addEventListener('scroll', onScroll, { passive: true });
      onScroll(); // état initial
    }

    // ════════════════════════════════════════════
    // LIENS LISSES (ancres)
    // ════════════════════════════════════════════
    function initSmoothLinks() {
      document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener('click', e => {
          const target = document.querySelector(link.getAttribute('href'));
          if (!target) return;
          e.preventDefault();
          target.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
      });
    }

    // ════════════════════════════════════════════
    // SCROLL REVEAL — entrée fluide des éléments
    // ════════════════════════════════════════════
    function initScrollReveal() {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('active');
            // On arrête d'observer une fois visible (perf)
            observer.unobserve(entry.target);
          }
        });
      }, {
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px'
      });

      document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    }

    // ════════════════════════════════════════════
    // OFFRES
    // ════════════════════════════════════════════
    //  Initialisation
    function initOffres() { renderOffres(); }


    function renderOffres(filters = { categorie: 'all', cible: 'morale' }) {
      const grid = document.getElementById('offresGrid');
      if (!grid) return;


      let filtered = OFFRES_DATA;
      if (filters.categorie !== 'all') {
        filtered = filtered.filter(o => {
          // Supporte categories (array) ET categorie (string unique)
          if (o.categories) return o.categories.includes(filters.categorie);
          return o.categorie === filters.categorie;
        });
      }
      if (filters.cible && filters.cible !== 'all') filtered = filtered.filter(o => !o.cible || o.cible === 'morale' || o.cible === filters.cible);


      // Toujours garder les 3 formules + grille + fidélité en haut quand on est sur TOUS ou COMPTABILITÉ
      const showGrille = filters.categorie === 'all' || filters.categorie === 'comptabilite';
      const formulesIds = ['essentielle', 'croissance', 'premium'];
      const formules = showGrille ? filtered.filter(o => formulesIds.includes(o.id)) : [];
      const autres = filtered.filter(o => !formulesIds.includes(o.id));


      if (filtered.length === 0) {
        grid.innerHTML = '<div class="offres-empty">Aucune offre ne correspond à ces critères.</div>';
        return;
      }


      grid.innerHTML = [
        ...formules.map(o => renderCard(o)),
        ...autres.map(o => renderCard(o))
      ].join('');


      if (showGrille) {
        grid.innerHTML += renderGrilleTarifaire();
        grid.innerHTML += renderAvantagesFidelite();
      }
    }


    function renderCard(o) {
      const isFormule = o.iconeCls !== undefined;
      const prixAffichage = o.prixMin === 0 && o.prixMax === 0
        ? '<div class="offre-price"><span class="price-value">Sur devis</span></div>'
        : o.prixMax > 0 && o.prixMin !== o.prixMax
          ? '<div class="offre-price"><span class="price-value">' + o.prixMin.toLocaleString('fr-FR') + ' – ' + o.prixMax.toLocaleString('fr-FR') + '</span><span class="price-unit">' + o.unite + '</span></div>'
          : '<div class="offre-price"><span class="price-value">Dès ' + o.prixMin.toLocaleString('fr-FR') + '</span><span class="price-unit">' + o.unite + '</span></div>';


      const ctaText = o.cta || 'Souscrire →';
      const ctaAction = o.ctaUrl
        ? 'window.open(\'' + o.ctaUrl + '\', \'_blank\')'
        : 'openSouscriptionModal(\'' + o.id + '\')';


      const iconeBlock = o.iconeCls ? '<div class="offre-icone ' + o.iconeCls + '"></div>' : '';
      const cibleBlock = o.clientCible ? '<div class="offre-cible">' + o.clientCible + '</div>' : '';
      const prefixeBlock = o.prefixe ? '<div class="offre-prefixe">' + o.prefixe + '</div>' : '';


      let featuresHTML = '<ul class="offre-features">';
      if (o.prefixe && o.features) {
        featuresHTML += '<li class="prefixe-item">' + o.prefixe + '</li>';
      }
      if (o.features) {
        featuresHTML += o.features.map(f => '<li>' + f + '</li>').join('');
      }
      featuresHTML += '</ul>';


      return '<div class="offre-card' + (o.recommended ? ' recommended' : '') + (isFormule ? ' formule-card' : '') + '" data-offre-id="' + o.id + '">' +
        iconeBlock +
        '<div class="offre-tier">' + o.tier + '</div>' +
        '<div class="offre-name">' + o.nom + '</div>' +
        '<div class="offre-tagline">' + o.tagline + '</div>' +
        cibleBlock +
        prixAffichage +
        featuresHTML +
        '<button class="btn-primary offre-cta" onclick="' + ctaAction + '">' + ctaText + '</button>' +
        '</div>';
    }


    //  Grille tarifaire par profil
    const GRILLE_TARIFAIRE = [
      { profil: 'Entrepreneur individuel / TPE', ca: 'CA < 50 millions', essentielle: '100 000 – 150 000', croissance: '—', premium: '—' },
      { profil: 'Petite entreprise', ca: 'CA 50 à 200 millions', essentielle: '150 001 – 200 000', croissance: '250 000 – 500 000', premium: '—' },
      { profil: 'PME', ca: 'CA 200 millions à 1 milliard', essentielle: '200 000 – 500 000', croissance: '500 001 – 1 000 000', premium: '1 000 000 – 1 500 000' },
      { profil: 'Entreprise structurée', ca: 'CA > 1 milliard', essentielle: 'Sur devis', croissance: 'Sur devis', premium: 'Sur devis' }
    ];


    function renderGrilleTarifaire() {
      return '<div class="grille-tarifaire">' +
        '<h3 class="grille-title">Grille tarifaire — FCFA HT / mois</h3>' +
        '<div class="grille-scroll">' +
        '<table class="grille-table">' +
        '<thead><tr>' +
        '<th>Profil client</th><th>Chiffre d\'affaires</th><th>Essentielle</th><th>Croissance</th><th>Premium</th>' +
        '</tr></thead>' +
        '<tbody>' +
        GRILLE_TARIFAIRE.map(row =>
          '<tr>' +
          '<td><strong>' + row.profil + '</strong></td>' +
          '<td>' + row.ca + '</td>' +
          '<td>' + row.essentielle + '</td>' +
          '<td>' + row.croissance + '</td>' +
          '<td>' + row.premium + '</td>' +
          '</tr>'
        ).join('') +
        '</tbody></table></div>' +
        '<p class="grille-note"> Les montants sont indicatifs. Chaque proposition fait l\'objet d\'un devis personnalisé après diagnostic.</p>' +
        '</div>';
    }


    function renderAvantagesFidelite() {
      return '<div class="avantages-fidelite">' +
        '<h3 class="grille-title"> Avantages fidélité</h3>' +
        '<div class="fidelite-cards">' +
        '<div class="fidelite-card"><span class="fidelite-icon"></span><strong>-10%</strong> pour tout engagement annuel réglé d\'avance</div>' +
        '<div class="fidelite-card"><span class="fidelite-icon"></span><strong>1ᵉʳ mois offert</strong> pour un engagement de 12 mois</div>' +
        '</div></div>';
    }


    function initFiltres() {
      const tabs = document.querySelectorAll('.offre-tab');
      const toggleCible = document.getElementById('toggleCible');


      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
          tabs.forEach(t => t.classList.remove('active'));
          tab.classList.add('active');
          const target = tab.dataset.target;
          const cible = toggleCible?.checked ? 'physique' : 'morale';
          renderOffres({ categorie: target, cible });
        });
      });


      toggleCible?.addEventListener('change', e => {
        const activeTab = document.querySelector('.offre-tab.active');
        const categorie = activeTab?.dataset.target || 'all';
        const cible = e.target.checked ? 'physique' : 'morale';
        renderOffres({ categorie, cible });
      });
    }

    // ════════════════════════════════════════════
    // MODAL SOUSCRIPTION
    // ════════════════════════════════════════════
    function openSouscriptionModal(offreId) {
      currentOffreData = OFFRES_DATA.find(o => o.id === offreId);
      if (!currentOffreData) return;

      currentModalStep = 1;
      formData = { offre: currentOffreData };

      document.getElementById('modalTitle').textContent = `Souscrire — ${currentOffreData.nom}`;
      renderModalStep();

      const overlay = document.getElementById('modalOverlay');
      overlay.classList.add('open');
      // Focus trap léger
      overlay.querySelector('.modal-btn-primary')?.focus();
    }

    function renderModalStep() {
      document.querySelectorAll('.step').forEach((step, i) => {
        step.classList.remove('active', 'done');
        if (i + 1 < currentModalStep) step.classList.add('done');
        if (i + 1 === currentModalStep) step.classList.add('active');
      });

      const body = document.getElementById('modalBody');
      const footer = document.getElementById('modalFooter');

      // Micro-animation du body
      body.style.opacity = '0';
      body.style.transform = 'translateY(10px)';
      body.style.transition = 'opacity 0.25s ease, transform 0.25s ease';

      const inputStyle = `
    background:var(--noir);border:1px solid var(--ligne);padding:12px;
    color:var(--blanc);font-family:'Montserrat',sans-serif;font-size:14px;
    outline:none;width:100%;transition:border-color .3s;
  `;
      const labelStyle = `
    font-size:11px;letter-spacing:1px;text-transform:uppercase;
    color:rgba(250,248,244,0.5);font-weight:500;margin-bottom:6px;display:block;
  `;

      switch (currentModalStep) {
        case 1:
          body.innerHTML = `
        <h4 style="font-size:18px;font-weight:600;margin-bottom:16px;">Offre sélectionnée</h4>
        <div style="background:rgba(255,215,0,0.05);border:1px solid var(--ligne);padding:24px;margin-bottom:24px;">
          <div style="font-size:14px;color:var(--or-base);font-weight:600;margin-bottom:8px;">${currentOffreData.nom}</div>
          <div style="font-size:13px;color:rgba(250,248,244,0.5);margin-bottom:16px;">${currentOffreData.tagline}</div>
          <div style="font-size:28px;font-weight:700;background:var(--or-degrade);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">
            ${currentOffreData.prix > 0 ? currentOffreData.prix.toLocaleString('fr-FR') + ' FCFA' : 'Sur devis'}
            ${currentOffreData.prix > 0 ? `<span style="font-size:12px;font-weight:400;color:rgba(250,248,244,0.4);margin-left:8px;">${currentOffreData.unite}</span>` : ''}
          </div>
        </div>
        <p style="font-size:14px;color:rgba(250,248,244,0.5);line-height:1.7;">
          Vous êtes sur le point de souscrire à cette offre. Remplissez les informations suivantes pour générer votre devis personnalisé.
        </p>`;
          footer.innerHTML = `
        <button class="modal-btn modal-btn-secondary" onclick="closeModal()">Annuler</button>
        <button class="modal-btn modal-btn-primary"   onclick="nextModalStep()">Suivant →</button>`;
          break;

        case 2:
          body.innerHTML = `
        <h4 style="font-size:18px;font-weight:600;margin-bottom:20px;">Informations d'identité</h4>
        <div class="modal-form-row">
          <div><label style="${labelStyle}">Nom complet</label>
            <input type="text" id="inputNom" placeholder="Jean Dupont" style="${inputStyle}" value="${formData.nom || ''}"></div>
          <div><label style="${labelStyle}">Email</label>
            <input type="email" id="inputEmail" placeholder="jean@entreprise.com" style="${inputStyle}" value="${formData.email || ''}"></div>
        </div>
        <div class="modal-form-row">
          <div><label style="${labelStyle}">Téléphone</label>
            <input type="tel" id="inputTel" placeholder="+225 XX XX XX XX XX" style="${inputStyle}" value="${formData.tel || ''}"></div>
          <div><label style="${labelStyle}">Entreprise</label>
            <input type="text" id="inputEntreprise" placeholder="Nom de votre structure" style="${inputStyle}" value="${formData.entreprise || ''}"></div>
        </div>
        <div><label style="${labelStyle}">Forme juridique</label>
          <select id="inputForme" style="${inputStyle}">
            <option value="">Sélectionner...</option>
            ${['SARL', 'SAS', 'SA', 'ONG', 'EI', 'Autre'].map(f =>
            `<option value="${f}" ${formData.forme === f ? 'selected' : ''}>${f === 'ONG' ? 'ONG / Association' : f === 'EI' ? 'Entreprise Individuelle' : f}</option>`
          ).join('')}
          </select>
        </div>`;
          footer.innerHTML = `
        <button class="modal-btn modal-btn-secondary" onclick="prevModalStep()">← Retour</button>
        <button class="modal-btn modal-btn-primary"   onclick="nextModalStep()">Suivant →</button>`;

          // Focus sur premier champ après animation
          setTimeout(() => document.getElementById('inputNom')?.focus(), 300);
          break;

        case 3:
          body.innerHTML = `
        <h4 style="font-size:18px;font-weight:600;margin-bottom:20px;">Détails de votre projet</h4>
        <div style="display:flex;flex-direction:column;gap:6px;margin-bottom:16px;">
          <label style="${labelStyle}">Objet de la demande</label>
          <textarea id="inputObjet" placeholder="Décrivez brièvement votre besoin ou projet..." rows="5"
            style="${inputStyle}resize:none;">${formData.objet || ''}</textarea>
        </div>
        <div style="display:flex;flex-direction:column;gap:6px;">
          <label style="${labelStyle}">Date de démarrage souhaitée</label>
          <input type="date" id="inputDate" style="${inputStyle}" value="${formData.dateDemarrage || ''}">
        </div>`;
          footer.innerHTML = `
        <button class="modal-btn modal-btn-secondary" onclick="prevModalStep()">← Retour</button>
        <button class="modal-btn modal-btn-primary"   onclick="nextModalStep()">Suivant →</button>`;
          break;

        case 4: {
          const tva = currentOffreData.prix > 0 ? Math.round(currentOffreData.prix * 0.18) : 0;
          const ttc = currentOffreData.prix + tva;
          body.innerHTML = `
        <h4 style="font-size:18px;font-weight:600;margin-bottom:20px;">Récapitulatif</h4>
        <div style="background:var(--noir);border:1px solid var(--ligne);padding:24px;margin-bottom:24px;">
          <div style="font-size:11px;letter-spacing:2px;text-transform:uppercase;color:var(--or-base);font-weight:600;margin-bottom:16px;">Détails du devis</div>
          ${[
              ['Offre', currentOffreData.nom],
              ['Client', formData.nom],
              ['Entreprise', `${formData.entreprise} (${formData.forme})`],
            ].map(([k, v]) => `
            <div style="display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.05);font-size:13px;">
              <span style="color:rgba(250,248,244,0.6);">${k}</span>
              <span style="font-weight:600;">${v}</span>
            </div>`).join('')}
          ${currentOffreData.prix > 0 ? `
            <div style="display:flex;justify-content:space-between;padding:12px 0 8px;font-size:13px;margin-top:16px;">
              <span style="color:rgba(250,248,244,0.6);">Montant HT</span>
              <span style="font-weight:600;">${currentOffreData.prix.toLocaleString('fr-FR')} FCFA</span>
            </div>
            <div style="display:flex;justify-content:space-between;padding:8px 0;border-bottom:1px solid rgba(255,255,255,0.05);font-size:13px;">
              <span style="color:rgba(250,248,244,0.6);">TVA 18%</span>
              <span style="font-weight:600;">${tva.toLocaleString('fr-FR')} FCFA</span>
            </div>
            <div style="display:flex;justify-content:space-between;padding:12px 0 0;font-size:20px;font-weight:700;">
              <span>Total TTC</span>
              <span style="background:var(--or-degrade);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">${ttc.toLocaleString('fr-FR')} FCFA</span>
            </div>` : `
            <div style="padding:12px 0;margin-top:16px;text-align:center;color:var(--or-base);font-weight:600;">Tarif sur devis personnalisé</div>`}
        </div>
        <p style="font-size:12px;color:rgba(250,248,244,0.4);line-height:1.7;font-style:italic;">
          En validant ce devis, vous confirmez les informations fournies. Un membre de l'équipe DC-KNOWING vous contactera sous 24h.
        </p>`;
          footer.innerHTML = `
        <button class="modal-btn modal-btn-secondary" onclick="prevModalStep()">← Retour</button>
        <button class="modal-btn modal-btn-primary"   onclick="validerDevis()">Valider le devis →</button>`;
          break;
        }
      }

      // Lance le fade-in du body
      requestAnimationFrame(() => {
        requestAnimationFrame(() => {
          body.style.opacity = '1';
          body.style.transform = 'translateY(0)';
        });
      });
    }

    function nextModalStep() {
      if (currentModalStep === 2) {
        formData.nom = document.getElementById('inputNom')?.value.trim();
        formData.email = document.getElementById('inputEmail')?.value.trim();
        formData.tel = document.getElementById('inputTel')?.value.trim();
        formData.entreprise = document.getElementById('inputEntreprise')?.value.trim();
        formData.forme = document.getElementById('inputForme')?.value;

        if (!formData.nom || !formData.email || !formData.entreprise) {
          showNotification('Veuillez remplir tous les champs obligatoires', 'error');
          // Shake léger sur les champs vides
          ['inputNom', 'inputEmail', 'inputEntreprise'].forEach(id => {
            const el = document.getElementById(id);
            if (el && !el.value.trim()) {
              el.style.borderColor = '#E74C3C';
              el.style.animation = 'shake 0.3s ease';
              setTimeout(() => { el.style.borderColor = ''; el.style.animation = ''; }, 600);
            }
          });
          return;
        }
      }

      if (currentModalStep === 3) {
        formData.objet = document.getElementById('inputObjet')?.value.trim();
        formData.dateDemarrage = document.getElementById('inputDate')?.value;
      }

      currentModalStep++;
      renderModalStep();
    }

    function prevModalStep() {
      currentModalStep--;
      renderModalStep();
    }

    function validerDevis() {
      const btn = document.querySelector('.modal-footer .modal-btn-primary');
      if (btn) {
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner"></span> Traitement...';
      }

      const devisId = 'DEV-' + Date.now();
      const devis = {
        id: devisId,
        date: new Date().toLocaleDateString('fr-FR'),
        offre: currentOffreData.nom,
        categorie: currentOffreData.categorie,
        client: formData.nom,
        email: formData.email,
        tel: formData.tel,
        entreprise: formData.entreprise,
        forme: formData.forme,
        objet: formData.objet || '',
        dateDemarrage: formData.dateDemarrage || '',
        montant: currentOffreData.prix,
        unite: currentOffreData.unite,
        statut: 'pending'
      };

      // Envoi au serveur pour notification mail
      fetch('{{ route("quote.submit") }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify(devis)
      })
        .then(response => response.json())
        .then(data => {
          if (data.success) {
            sessionDevis.push(devis);
            saveSessionDevis();
            renderDevisList();
            closeModal();
            showNotification('✓ Devis créé et envoyé par email avec succès !', 'success');

            setTimeout(() => {
              document.getElementById('mes-devis')?.scrollIntoView({ behavior: 'smooth' });
            }, 500);
          } else {
            showNotification('Erreur : ' + (data.message || 'Impossible d\'envoyer l\'email.'), 'error');
            if (btn) {
              btn.disabled = false;
              btn.innerHTML = 'Valider le devis →';
            }
          }
        })
        .catch(error => {
          console.error('Erreur:', error);
          showNotification('Erreur de connexion au serveur.', 'error');
          if (btn) {
            btn.disabled = false;
            btn.innerHTML = 'Valider le devis →';
          }
        });
    }

    function closeModal() {
      const overlay = document.getElementById('modalOverlay');
      overlay.classList.remove('open');
      currentModalStep = 1;
      formData = {};
      currentOffreData = null;
    }

    // ════════════════════════════════════════════
    // SESSION DEVIS
    // ════════════════════════════════════════════
    function saveSessionDevis() {
      sessionStorage.setItem('dc_knowing_devis', JSON.stringify(sessionDevis));
    }

    function loadSessionDevis() {
      const saved = sessionStorage.getItem('dc_knowing_devis');
      if (saved) {
        try { sessionDevis = JSON.parse(saved); }
        catch { sessionDevis = []; }
      }
    }

    function renderDevisList() {
      const container = document.getElementById('devisContainer');
      if (!container) return;

      if (sessionDevis.length === 0) {
        container.innerHTML = `
      <div class="devis-empty">
        <div class="empty-icon">📄</div>
        <div class="empty-text">Aucun devis créé pour le moment</div>
        <a href="{{ route('services.offres') }}" class="btn-primary">Découvrir nos offres</a>
      </div>`;
        return;
      }

      const statusLabels = { pending: 'En attente', signed: 'Signé', cancelled: 'Annulé' };

      container.innerHTML = `
    <div class="devis-list">
      ${sessionDevis.map(d => `
        <div class="devis-item" onclick="openDevisDetail('${d.id}')">
          <div class="devis-id">${d.id}</div>
          <div class="devis-info">
            <div class="devis-name">${d.offre}</div>
            <div class="devis-details">${d.entreprise} • ${d.date}</div>
          </div>
          <div class="devis-status ${d.statut}">${statusLabels[d.statut]}</div>
        </div>`).join('')}
    </div>`;
    }

    function openDevisDetail(devisId) {
      const devis = sessionDevis.find(d => d.id === devisId);
      if (!devis) return;

      const tva = devis.montant > 0 ? Math.round(devis.montant * 0.18) : 0;
      const ttc = devis.montant + tva;
      const canSign = devis.statut === 'pending';
      const catLabel = {
        juridique: 'Service Juridique & Corporate',
        comptabilite: 'Comptabilité & Finance',
        rh: 'Gestion Paie & RH',
        flow: 'Solution Digitale Flow',
        finance: 'Structuration Financière'
      }[devis.categorie] || devis.categorie;

      const inputStyle = `
    width:100%;background:var(--noir);border:1px solid var(--ligne);
    padding:12px;color:var(--blanc);font-family:'Montserrat',sans-serif;
    font-size:14px;outline:none;margin-bottom:8px;transition:border-color .3s;
  `;

      const content = `
    <div style="padding:32px;">
      <!-- En-tête -->
      <div style="display:flex;justify-content:space-between;align-items:start;margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid var(--ligne);">
        <div>
          <div style="font-size:28px;font-weight:700;letter-spacing:2px;background:var(--or-degrade);-webkit-background-clip:text;-webkit-text-fill-color:transparent;margin-bottom:8px;display:inline-block;">DC-KNOWING</div>
          <div style="font-size:12px;color:rgba(250,248,244,0.4);line-height:1.7;">
            Riviera Bonoumin, Abidjan<br>
            support@dc-knowing.com<br>
            +225 07 67 13 19 93
          </div>
        </div>
        <div style="text-align:right;">
          <div style="font-size:24px;font-weight:700;margin-bottom:8px;">${devis.statut === 'signed' ? 'FACTURE' : 'DEVIS'}</div>
          <div style="font-size:12px;color:rgba(250,248,244,0.5);">N° ${devis.id}</div>
          <div style="font-size:12px;color:rgba(250,248,244,0.5);">Date : ${devis.date}</div>
          <div style="font-size:12px;color:rgba(250,248,244,0.5);margin-bottom:12px;">Validité : 30 jours</div>
          <div class="devis-status ${devis.statut}">${devis.statut === 'pending' ? 'En attente' : devis.statut === 'signed' ? 'Signé' : 'Annulé'}</div>
        </div>
      </div>

      <!-- Émetteur / Client -->
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:32px;margin-bottom:32px;padding-bottom:24px;border-bottom:1px solid var(--ligne);">
        <div>
          <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4);margin-bottom:8px;">Émetteur</div>
          <div style="font-size:16px;font-weight:600;margin-bottom:6px;">DC-KNOWING</div>
          <div style="font-size:12px;color:rgba(250,248,244,0.5);line-height:1.6;">
            Cabinet agréé MBPE & FDFP<br>Riviera Bonoumin, Abidjan CI<br>support@dc-knowing.com
          </div>
        </div>
        <div>
          <div style="font-size:10px;letter-spacing:2px;text-transform:uppercase;color:rgba(250,248,244,0.4);margin-bottom:8px;">Client</div>
          <div style="font-size:16px;font-weight:600;margin-bottom:6px;">${devis.client}</div>
          <div style="font-size:12px;color:rgba(250,248,244,0.5);line-height:1.6;">
            ${devis.entreprise}<br>Forme : ${devis.forme}<br>${devis.email}<br>${devis.tel}
          </div>
        </div>
      </div>

      <!-- Table -->
      <table style="width:100%;margin-bottom:24px;border-collapse:collapse;">
        <thead>
          <tr style="border-bottom:1px solid var(--ligne);">
            ${['Désignation', 'Qté', 'Prix HT', 'Total HT'].map((h, i) => `
              <th style="text-align:${i === 0 ? 'left' : i === 1 ? 'center' : 'right'};padding:12px 0;
                font-size:11px;letter-spacing:1px;text-transform:uppercase;
                color:rgba(250,248,244,0.5);font-weight:600;">${h}</th>`).join('')}
          </tr>
        </thead>
        <tbody>
          <tr style="border-bottom:1px solid rgba(255,255,255,0.05);">
            <td style="padding:16px 0;">
              <div style="font-weight:600;margin-bottom:4px;">${devis.offre}</div>
              <div style="font-size:11px;color:rgba(250,248,244,0.4);">${catLabel}</div>
              ${devis.objet ? `<div style="font-size:11px;color:rgba(250,248,244,0.3);margin-top:4px;">${devis.objet}</div>` : ''}
            </td>
            <td style="text-align:center;padding:16px 0;">1</td>
            <td style="text-align:right;padding:16px 0;">${devis.montant > 0 ? devis.montant.toLocaleString('fr-FR') + ' FCFA' : 'Sur devis'}</td>
            <td style="text-align:right;padding:16px 0;font-weight:600;">${devis.montant > 0 ? devis.montant.toLocaleString('fr-FR') + ' FCFA' : 'Sur devis'}</td>
          </tr>
        </tbody>
      </table>

      <!-- Totaux -->
      ${devis.montant > 0 ? `
        <div style="display:flex;flex-direction:column;align-items:flex-end;gap:8px;padding:16px 0;border-top:1px solid var(--ligne);">
          ${[
            ['Sous-total HT', devis.montant.toLocaleString('fr-FR') + ' FCFA'],
            ['TVA 18%', tva.toLocaleString('fr-FR') + ' FCFA'],
          ].map(([k, v]) => `
            <div style="display:flex;justify-content:space-between;width:300px;font-size:13px;">
              <span style="color:rgba(250,248,244,0.6);">${k}</span>
              <span style="font-weight:600;">${v}</span>
            </div>`).join('')}
          <div style="display:flex;justify-content:space-between;width:300px;font-size:20px;font-weight:700;padding-top:8px;border-top:1px solid var(--ligne);">
            <span>Total TTC</span>
            <span style="background:var(--or-degrade);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">${ttc.toLocaleString('fr-FR')} FCFA</span>
          </div>
        </div>` : ''}

      <!-- Conditions -->
      <div style="margin-top:32px;padding:16px;background:rgba(255,215,0,0.05);border:1px solid var(--ligne);font-size:11px;color:rgba(250,248,244,0.5);line-height:1.7;">
        <strong style="color:var(--or-base);">Conditions :</strong>
        Règlement par virement bancaire ou Mobile Money (Orange / MTN / Wave) à réception du devis signé.
        Validité 30 jours. DC-KNOWING — Cabinet agréé MBPE & FDFP — Abidjan, Côte d'Ivoire.
      </div>

      <!-- Signature -->
      ${canSign ? `
        <div style="margin-top:24px;padding:20px;background:var(--gris2);border:1px solid var(--ligne);">
          <div style="font-size:12px;letter-spacing:1px;text-transform:uppercase;color:var(--or-base);font-weight:600;margin-bottom:8px;">
            Signature électronique du client
          </div>
          <div style="font-size:11px;color:rgba(250,248,244,0.4);margin-bottom:12px;">
            En signant, vous acceptez les conditions générales et validez la commande.
          </div>
          <input type="text" id="signatureInput" placeholder="Tapez votre nom complet pour signer..."
            style="${inputStyle}">
          <div style="font-size:10px;color:rgba(250,248,244,0.3);font-style:italic;">
            Date : ${new Date().toLocaleDateString('fr-FR', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' })}
          </div>
        </div>
        <div style="margin-top:24px;display:flex;justify-content:flex-end;gap:12px;">
          <button class="modal-btn modal-btn-secondary" onclick="closeDevisModal()">Fermer</button>
          <button class="modal-btn modal-btn-primary"   onclick="signerDevis('${devis.id}')">Valider & Signer →</button>
        </div>` : `
        <div style="margin-top:24px;padding:16px;background:rgba(46,204,113,0.05);border:1px solid rgba(46,204,113,0.2);font-size:13px;color:rgba(46,204,113,0.9);text-align:center;">
          ✓ Document signé électroniquement le ${devis.signedDate || devis.date}
        </div>
        <div style="margin-top:16px;display:flex;justify-content:flex-end;">
          <button class="modal-btn modal-btn-secondary" onclick="closeDevisModal()">Fermer</button>
        </div>`}
    </div>`;

      document.getElementById('devisModalContent').innerHTML = content;
      document.getElementById('devisModal').classList.add('open');
    }

    function signerDevis(devisId) {
      const signature = document.getElementById('signatureInput')?.value.trim();
      if (!signature) {
        showNotification('Veuillez taper votre nom complet pour signer', 'error');
        document.getElementById('signatureInput').style.borderColor = '#E74C3C';
        return;
      }

      const devis = sessionDevis.find(d => d.id === devisId);
      if (devis) {
        devis.statut = 'signed';
        devis.signedDate = new Date().toLocaleDateString('fr-FR');
        saveSessionDevis();
        renderDevisList();
        closeDevisModal();
        showNotification('✓ Document signé ! Votre commande est confirmée.', 'success');
      }
    }

    function closeDevisModal() {
      document.getElementById('devisModal').classList.remove('open');
    }

    // ════════════════════════════════════════════
    // CONTACT
    // ════════════════════════════════════════════
    function handleContactSubmit(e) {
      e.preventDefault();
      showNotification('✓ Message envoyé ! Nous vous répondrons sous 24h.', 'success');
      e.target.reset();
    }

    // ════════════════════════════════════════════
    // NOTIFICATIONS
    // ════════════════════════════════════════════
    function showNotification(message, type = 'info') {
      const notif = document.getElementById('notification');
      const text = document.getElementById('notificationText');
      const dot = notif?.querySelector('.notification-dot');

      if (!notif || !text || !dot) return;

      text.textContent = message;

      const colors = { success: '#2ECC71', error: '#E74C3C', info: '#FFD700' };
      dot.style.background = colors[type] || colors.info;

      // Reset animation si déjà visible
      notif.classList.remove('show');
      void notif.offsetWidth; // reflow
      notif.classList.add('show');

      clearTimeout(notif._hideTimer);
      notif._hideTimer = setTimeout(() => notif.classList.remove('show'), 4500);
    }

    // ════════════════════════════════════════════
    // CSS DYNAMIQUE — animation shake pour inputs
    // ════════════════════════════════════════════
    const styleSheet = document.createElement('style');
    styleSheet.textContent = `
  @keyframes shake {
    0%,100% { transform: translateX(0); }
    20%,60% { transform: translateX(-5px); }
    40%,80% { transform: translateX(5px); }
  }
`;
    document.head.appendChild(styleSheet);

    // ════════════════════════════════════════════
    // NAVIGATION DYNAMIQUE VERS OFFRES
    // ════════════════════════════════════════════
    function goToOffres(category) {
      const targetTab = document.querySelector(`.offre-tab[data-target="${category}"]`);
      if (targetTab) {
        targetTab.click();
      }
      const section = document.getElementById('offres');
      if (section) {
        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    }

    // ════════════════════════════════════════════
    // FORMULAIRE DE CONTACT — AJAX
    // ════════════════════════════════════════════
    function handleContactSubmit(e) {
      e.preventDefault();
      const form = e.target;
      const btn = document.getElementById('contactSubmitBtn');

      if (btn) {
        btn.disabled = true;
        btn.innerHTML = 'Envoi en cours...';
      }

      const formData = new FormData(form);
      const data = Object.fromEntries(formData.entries());

      fetch('{{ route("contact.submit") }}', {
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
            showNotification('✓ Votre demande a été envoyée ! Nous vous contactons sous 24h.', 'success');
            form.reset();
          } else {
            showNotification('Erreur : ' + (res.message || 'Réessayez plus tard.'), 'error');
          }
          if (btn) { btn.disabled = false; btn.innerHTML = 'Envoyer ma demande →'; }
        })
        .catch(err => {
          console.error('Erreur:', err);
          showNotification('Erreur de connexion. Réessayez.', 'error');
          if (btn) { btn.disabled = false; btn.innerHTML = 'Envoyer ma demande →'; }
        });
    }


    // ============================================
    // IA DC-KNOWING — Moteur + Chatbot Actif
    // ============================================

    // -- ia-knowledge.js --
    //  IA DC-KNOWING — Base de connaissance & System Prompt

    const DC_KNOWING_KNOWLEDGE = {
      cabinet: {
        nom: "DC-KNOWING — Conseil & Assistance en Gestion des Entreprises",
        slogan: "Votre gestion entre de bonnes mains, votre énergie au service de votre croissance",
        creation: "Cabinet ivoirien de référence",
        stats: "Accompagnement d'entrepreneurs, TPE, PME et structures en croissance",
        localisation: "Abidjan, Côte d'Ivoire",
        email: "infos@dcknowing.com",
        emailCopie: "alexkoffi@dc-knowing.com, constant.keyman@dcknowing.com",
        telephone: "+225 27 22 42 14 43 / 07 67 13 19 93",
        whatsapp: "https://wa.me/2250767131993",
        reseaux: "Facebook (CabinetDCknowing), LinkedIn (DC-Knowing), TikTok (@dcknowing)",
        agrements: ["Conformité SYSCOHADA révisé", "Droit OHADA", "DGI (e-impôts)", "CNPS", "Centre de Gestion Agréé (CGA)"]
      },

      equipe: [
        { nom: "Keyman-Bi Irie Constant", role: "Directeur Général, Gérant du cabinet", specialite: "Décisions stratégiques" },
        { nom: "Foto Noël", role: "Expert-Comptable Diplômé", specialite: "Comptabilité, Fiscalité, Finance" },
        { nom: "M. Semeridiangone", role: "Expert-Comptable Diplômé", specialite: "IFG, Levées de fonds" },
        { nom: "Me Nékouresslaïme", role: "Notaire Partenaire", specialite: "Actes notariés, contrats" },
        { nom: "Williams", role: "Développeur, Chef de projet logiciel", specialite: "Solutions logicielles, ERP" },
        { nom: "Alex Mardochée", role: "Chef Projet IA & Digital", specialite: "Transformation digitale, IA, contenu" }
      ],

      pages: {
        accueil: { url: "/", titre: "Accueil DC-KNOWING", description: "Page d'accueil du cabinet" },
        services: {
          juridique: { url: "services/juridique.html", titre: "Juridique & Corporate", description: "Création d'entreprises, modifications statutaires, secrétariat juridique" },
          creation: { url: "services/creation.html", titre: "Création d'entreprise", description: "Création SARL, SA, SAS, SASU, GIE, EI" },
          cga: { url: "services/cga.html", titre: "Centre de Gestion Agréé", description: "Optimisation fiscale jusqu'à 40%, conformité comptable et sociale" },
          formation: { url: "services/formation.html", titre: "Formation Professionnelle", description: "Programmes certifiés agréés FDFP" },
          modification: { url: "services/modification.html", titre: "Modifications statutaires", description: "Modifications de statuts, transferts de siège" },
          radiation: { url: "services/radiation.html", titre: "Radiation d'entreprise", description: "Radiation RCCM, dissolution" }
        },
        ancres: {
          offres: { url: "#offres", titre: "Offres et tarifs", description: "Toutes les formules et forfaits" },
          services_section: { url: "#services", titre: "Nos expertises", description: "Les services du cabinet" },
          digital: { url: "#digital", titre: "Transformation Digitale", description: "Accompagnement digital et solutions sur mesure" },
          contact: { url: "#contact", titre: "Formulaire de contact", description: "Nous écrire" },
          mes_devis: { url: "#mes-devis", titre: "Mes Devis", description: "Vos devis en cours" },
          experts: { url: "#experts", titre: "Notre équipe", description: "Les experts du cabinet" }
        }
      },

      services_description: {
        essentielle: "**Formule Essentielle** — Sécurisez vos bases : tenue comptable SYSCOHADA, télédéclarations fiscales (e-impôts DGI), déclarations sociales CNPS, assistance à la formalisation, veille sur les échéances. Pour entrepreneurs, TPE, activités en formalisation. Forfait mensuel accessible.",
        croissance: "**Formule Croissance** — Pilotez votre développement : tout Essentielle + tableaux de bord mensuels, suivi budgétaire, gestion prévisionnelle de trésorerie, états financiers annuels et liasse fiscale SYSCOHADA. Pour PME structurées en croissance.",
        premium: "**Formule Premium** — Votre direction financière externalisée (DFE) : tout Croissance + business plans, recherche de financement, contrôle de gestion, conseil et optimisation fiscale, assistance aux contrôles, participation aux comités de direction. Pour PME établies et projets d'investissement.",
        juridique: "Création d'entreprises (SARL, SA, SAS, SASU, GIE, EI), modifications statutaires, secrétariat juridique annuel, rédaction d'actes et PV d'assemblée.  Exception : Les contrats de bails ne sont pas pris en charge.",
        prestations: "Prestations ponctuelles : diagnostic initial (à partir de 100 000 FCFA), assistance formalisation (150 000-500 000 FCFA), états financiers annuels (à partir de 300 000 FCFA), business plan (à partir de 500 000 FCFA), montage dossier financement (à partir de 500 000 FCFA), assistance contrôle fiscal (100 000-150 000 FCFA/jour), formation (150 000-300 000 FCFA/jour), consultation (50 000-200 000 FCFA).",
        formation: "Programmes certifiés agréés FDFP en comptabilité, fiscalité, droit des affaires et management. Formations IA, bureautique, logiciels de gestion."
      },

      tarifs_rapides: {
        "essentielle_tpe": "100 000 – 150 000 FCFA HT/mois — Formule Essentielle pour TPE (CA < 50M)",
        "essentielle_pe": "150 001 – 200 000 FCFA HT/mois — Formule Essentielle pour Petite Entreprise (CA 50-200M)",
        "essentielle_pme": "200 000 – 500 000 FCFA HT/mois — Formule Essentielle pour PME (CA 200M-1Md)",
        "croissance_pe": "250 000 – 500 000 FCFA HT/mois — Formule Croissance pour Petite Entreprise",
        "croissance_pme": "500 001 – 1 000 000 FCFA HT/mois — Formule Croissance pour PME (RECOMMANDÉ)",
        "premium_pme": "1 000 000 – 1 500 000 FCFA HT/mois — Formule Premium (DFE)",
        "creation_starter": "450 000 FCFA HT forfait — Création d'entreprise Starter",
        "creation_premium": "750 000 FCFA HT forfait — Création d'entreprise Premium",
        "secretariat": "180 000 FCFA HT/an — Secrétariat Juridique Annuel",
        "diagnostic": "À partir de 100 000 FCFA HT — Diagnostic initial de gestion",
        "formalisation": "150 000 – 500 000 FCFA HT — Assistance à la formalisation",
        "etats_financiers": "À partir de 300 000 FCFA HT — États financiers annuels et liasse fiscale",
        "business_plan": "À partir de 500 000 FCFA HT — Business plan et étude de rentabilité",
        "financement": "À partir de 500 000 FCFA HT — Montage dossier de financement (+ success fee)",
        "controle_fiscal": "100 000 – 150 000 FCFA HT/jour — Assistance contrôle fiscal ou social",
        "formation": "150 000 – 300 000 FCFA HT/jour — Formation du personnel",
        "consultation": "50 000 – 200 000 FCFA HT — Consultation ponctuelle"
      },

      processus: [
        "Étape 1 : Premier échange gratuit pour comprendre votre activité et vos attentes",
        "Étape 2 : Diagnostic de votre situation comptable, fiscale et sociale",
        "Étape 3 : Proposition d'accompagnement sur mesure avec devis détaillé",
        "Étape 4 : Signature de la lettre de mission et démarrage de la collaboration"
      ],

      engagements: [
        "Interlocuteur dédié qui connaît votre dossier",
        "Confidentialité absolue de vos informations",
        "Respect strict des échéances légales, fiscales et sociales",
        "Honoraires clairs, définis à l'avance, sans frais cachés",
        "Points réguliers et livrables compréhensibles",
        "Avantage fidélité : -10% pour engagement annuel, 1er mois offert pour 12 mois"
      ]
    };

    //  SYSTEM PROMPT
    const DC_IA_SYSTEM_PROMPT = `Tu es l'assistant IA officiel de DC-KNOWING, cabinet d'accompagnement en gestion d'entreprise basé à Abidjan, Côte d'Ivoire.

    ## IDENTITÉ DU CABINET
    - ${DC_KNOWING_KNOWLEDGE.cabinet.stats}
    - Agréments : ${DC_KNOWING_KNOWLEDGE.cabinet.agrements.join(', ')}
    - Adresse : ${DC_KNOWING_KNOWLEDGE.cabinet.localisation}
    - Email : ${DC_KNOWING_KNOWLEDGE.cabinet.email}
    - Tél : ${DC_KNOWING_KNOWLEDGE.cabinet.telephone}

    ## ÉQUIPE
    ${DC_KNOWING_KNOWLEDGE.equipe.map(e => `- **${e.nom}** — ${e.role} (${e.specialite})`).join('\n')}

    ## FORMULES D'ACCOMPAGNEMENT (cœur de métier)
    DC-KNOWING propose 3 formules progressives :

    ### 1. Formule ESSENTIELLE — Sécuriser vos bases
    ${DC_KNOWING_KNOWLEDGE.services_description.essentielle}

    ### 2. Formule CROISSANCE — Piloter votre développement
    ${DC_KNOWING_KNOWLEDGE.services_description.croissance}

    ### 3. Formule PREMIUM — Direction Financière Externalisée
    ${DC_KNOWING_KNOWLEDGE.services_description.premium}

    ## SERVICES COMPLÉMENTAIRES
    - **Juridique & Corporate** — ${DC_KNOWING_KNOWLEDGE.services_description.juridique}
    - **Prestations ponctuelles** — ${DC_KNOWING_KNOWLEDGE.services_description.prestations}
    - **Formation** — ${DC_KNOWING_KNOWLEDGE.services_description.formation}

    ## NOS ENGAGEMENTS
    ${DC_KNOWING_KNOWLEDGE.engagements.map(e => `- ${e}`).join('\n')}

    ## PROCESSUS POUR DÉMARRER
    ${DC_KNOWING_KNOWLEDGE.processus.map(e => `- ${e}`).join('\n')}

    ## PAGES DU SITE
    - Accueil : /
    - Juridique : services/juridique.html
    - CGA : services/cga.html
    - Formation : services/formation.html
    - Sections : #offres (formules et tarifs), #services (expertises), #digital, #contact (formulaire), #mes-devis

    ## GRILLE TARIFAIRE (Fourchettes FCFA HT)
    ${Object.entries(DC_KNOWING_KNOWLEDGE.tarifs_rapides).map(([k, v]) => `- ${k} : ${v}`).join('\n')}

    >  Les montants sont indicatifs. Chaque proposition fait l'objet d'un devis personnalisé après diagnostic.
    >  Avantage fidélité : -10% pour engagement annuel réglé d'avance, 1er mois offert pour 12 mois.
    >  Pour un diagnostic gratuit : ${DC_KNOWING_KNOWLEDGE.cabinet.telephone}

    ---

    ## 🤖 ACTIONS AUTOMATIQUES (obligatoire — invisible pour l'utilisateur)

     **CRITIQUE : Tu dois TOUJOURS utiliser une action quand l'utilisateur demande quelque chose de concret.**
    L'utilisateur ne doit JAMAIS voir la syntaxe d'action. Tu ne dois JAMAIS lui dire de cliquer.

    Format (sur UNE ligne, AVANT ta réponse) :
    ACTION:navigate:URL
    ACTION:devis:idOffre|Nom|Email|Tel|Entreprise
    ACTION:contact:Nom|Email|Tel|Entreprise|Message
    ACTION:search:mots-clés

    ### DÉTECTION AUTOMATIQUE — quand l'utilisateur dit :

    | L'utilisateur dit... | Tu fais automatiquement... |
    |---|---|
    | "je veux voir les offres", "montre les prix", "quels sont vos tarifs" | ACTION:navigate:#offres |
    | "je veux créer une entreprise", "créer ma société" | ACTION:navigate:services/juridique.html |
    | "comment contacter", "formulaire", "je veux vous écrire" | ACTION:navigate:#contact |
    | "c'est quoi le CGA", "avantages CGA" | ACTION:navigate:services/cga.html |
    | "formation", "formations FDFP", "programme formation" | ACTION:navigate:services/formation.html |
    | "modifier mon entreprise", "changement statuts" | ACTION:navigate:services/modification.html |
    | "fermer ma société", "radiation" | ACTION:navigate:services/radiation.html |
    | "je veux la formule X", "souscrire à X" | ACTION:navigate:#offres |
    | "je veux un devis pour X" | ACTION:navigate:#offres |

     **RÈGLE IMPÉRATIVE : Si tu ne mets pas le ACTION: en première ligne, TU AS ÉCHOUÉ.**
    L'utilisateur doit voir le résultat immédiatement, sans avoir à cliquer.

    ---

    ##  LIENS EXTERNES
    - WhatsApp : ${DC_KNOWING_KNOWLEDGE.cabinet.whatsapp}
    - Portail : https://portaildck.dc-knowing.com
    - RH Flow : https://rhflow.dc-knowing.com/

    ##  RAPPEL FINAL (lis ceci avant chaque réponse)

    1. Si l'utilisateur demande à VOIR quelque chose → ACTION:navigate: suivi de la page.
    2. Si l'utilisateur demande un DEVIS → demande-lui ses infos d'abord, puis ACTION:devis:...
    3. Si l'utilisateur veut un CONTACT → demande-lui ses infos d'abord, puis ACTION:contact:...
    4. **NE DIS JAMAIS** "cliquez sur...", "allez dans...", "utilisez le bouton..." — FAIS-LE.
    5. L'action ACTION: doit être la TOUTE PREMIÈRE LIGNE de ta réponse. Pas après un paragraphe.

    EXEMPLE CORRECT de réponse :
    ACTION:navigate:#offres
    Voici nos offres ! Vous y trouverez toutes nos formules...

    EXEMPLE INCORRECT (ne fais jamais ça) :
    Voici nos offres ! Cliquez sur le bouton "Offres" dans le menu pour y accéder...
    (Ceci est un ÉCHEC car tu n'as pas utilisé ACTION:)

    Tu es l'assistant le plus compétent du cabinet. Chaque réponse doit être UTILE, ACTIONNABLE et ÉLÉGANTE.`.trim();

    // -- ia-core.js --
    //  IA DC-KNOWING — Moteur Core (appels OpenRouter + parsing actions)

    const DC_IA_CONFIG = {
      model: 'meta-llama/llama-3.1-8b-instruct', // recommandé par OpenRouter
      maxTokens: 2000,
      temperature: 0.3,
      maxHistory: 20
    };

    //  Mémoire de conversation
    let _iaHistory = [];

    function iaGetHistory() { return _iaHistory; }
    function iaClearHistory() { _iaHistory = []; }

    function iaPushMessage(role, content) {
      _iaHistory.push({ role, content });
      if (_iaHistory.length > DC_IA_CONFIG.maxHistory * 2) {
        _iaHistory = _iaHistory.slice(-DC_IA_CONFIG.maxHistory * 2);
      }
    }

    //  Parser la réponse de l'IA pour détecter les actions
    // Accepte plusieurs formats :
    //   ACTION:navigate:#offres
    //   [ACTION:navigate:#offres]
    //   <action>navigate:#offres</action>
    //   iaNaviguerVers("#offres")
    function iaParseActions(text) {
      if (!text) return { actions: [], cleanText: '' };

      const actions = [];
      let cleanText = text;

      // Format 1 : ACTION:nomFonction:params (séparés par |)
      const actionRegex1 = /ACTION:(\w+):(.+?)(?:\n|$)/g;
      let match;
      while ((match = actionRegex1.exec(text)) !== null) {
        const [, name, rawParams] = match;
        actions.push({ name, params: rawParams.split('|').map(p => p.trim()) });
        cleanText = cleanText.replace(match[0], '');
      }

      // Format 2 : [ACTION:nomFonction:params]
      const actionRegex2 = /\[ACTION:(\w+):(.+?)\]/g;
      while ((match = actionRegex2.exec(text)) !== null) {
        const [, name, rawParams] = match;
        actions.push({ name, params: rawParams.split('|').map(p => p.trim()) });
        cleanText = cleanText.replace(match[0], '');
      }

      // Format 3 : Appels directs iaNaviguerVers("url"), iaGenererDevis(...), etc.
      const directCalls = [
        { pattern: /iaNaviguerVers\s*\(\s*["']([^"']+)["']\s*\)/g, name: 'navigate', extract: m => [m[1]] },
        { pattern: /iaSoumettreContact\s*\(\s*["']([^"']+)["']\s*,\s*["']([^"']+)["']\s*,\s*["']([^"']+)["']\s*,\s*["']([^"']+)["']\s*,\s*["']([^"']+)["']\s*\)/g, name: 'contact', extract: m => [m[1], m[2], m[3], m[4], m[5]] },
        { pattern: /iaRechercherInfos\s*\(\s*["']([^"']+)["']\s*\)/g, name: 'search', extract: m => [m[1]] },
      ];

      for (const call of directCalls) {
        while ((match = call.pattern.exec(text)) !== null) {
          actions.push({ name: call.name, params: call.extract(match) });
          cleanText = cleanText.replace(match[0], '');
        }
      }

      // Nettoyage final : supprimer tout ce qui ressemble à du code/action
      cleanText = sanitizeResponse(cleanText);

      return { actions, cleanText };
    }

    //  Nettoyer la réponse de tout résidu d'action ou de code
    function sanitizeResponse(text) {
      if (!text) return '';

      let clean = text;

      // Supprimer les lignes qui sont purement des actions
      clean = clean.replace(/^.*ACTION:.*$/gm, '');
      clean = clean.replace(/^.*\[ACTION:.*\]$/gm, '');
      clean = clean.replace(/^.*iaNaviguerVers\s*\(.+$/gm, '');
      clean = clean.replace(/^.*iaGenererDevis\s*\(.+$/gm, '');
      clean = clean.replace(/^.*iaSoumettreContact\s*\(.+$/gm, '');
      clean = clean.replace(/^.*iaRechercherInfos\s*\(.+$/gm, '');
      clean = clean.replace(/^.*<action>.*<\/action>.*$/gm, '');

      // Supprimer les blocs de code qui contiennent des appels de fonction
      clean = clean.replace(/```[\s\S]*?```/g, '');
      clean = clean.replace(/`[^`]*iaNaviguerVers[^`]*`/g, '');
      clean = clean.replace(/`[^`]*iaGenererDevis[^`]*`/g, '');

      // Supprimer les phrases qui disent d'utiliser des fonctions
      clean = clean.replace(/Vous pouvez (utiliser|appeler|cliquer sur|cliquer) .+/gi, '');
      clean = clean.replace(/Cliquez sur .+/gi, '');
      clean = clean.replace(/Utilisez (la fonction |le bouton |le lien ).+/gi, '');

      // Nettoyer les lignes vides multiples
      clean = clean.replace(/\n{3,}/g, '\n\n');

      return clean.trim();
    }

    //  Fallback : détecter l'intention de l'utilisateur si l'IA n'a pas utilisé d'action
    function detectFallbackAction(userMessage) {
      const msg = userMessage.toLowerCase().trim();

      // Mapping intention → action
      const patterns = [
        { keywords: ['offre', 'tarif', 'prix', 'formule', 'forfait', 'combien coûte', 'coût'], action: 'navigate', param: '#offres' },
        { keywords: ['créer', 'creation', 'création', 'immatriculer', 'enregistrer entreprise', 'mon entreprise', 'création entreprise'], action: 'navigate', param: 'services/juridique.html' },
        { keywords: ['juridique', 'statuts', 'statut', 'rccm', 'forme juridique'], action: 'navigate', param: 'services/juridique.html' },
        { keywords: ['cga', 'centre de gestion', 'agréé', 'optimisation fiscale'], action: 'navigate', param: 'services/cga.html' },
        { keywords: ['formation', 'former', 'apprendre', 'academy', 'fdfp'], action: 'navigate', param: 'services/formation.html' },
        { keywords: ['contact', 'contacter', 'joindre', 'écrire', 'appeler', 'téléphone', 'email', 'formulaire'], action: 'navigate', param: '#contact' },
        { keywords: ['devis', 'mes devis'], action: 'navigate', param: '#mes-devis' },
        { keywords: ['digital', 'flow', 'solution digitale', 'logiciel'], action: 'navigate', param: '#digital' },
        { keywords: ['modifier', 'modification', 'changement'], action: 'navigate', param: 'services/modification.html' },
        { keywords: ['fermer', 'radiation', 'dissoudre', 'dissolution'], action: 'navigate', param: 'services/radiation.html' },
        { keywords: ['expert', 'équipe', 'qui êtes', 'dirigeant'], action: 'navigate', param: '#experts' },
        { keywords: ['service', 'expertise', 'que faites', 'accompagnement'], action: 'navigate', param: '#services' },
      ];

      for (const pattern of patterns) {
        if (pattern.keywords.some(kw => msg.includes(kw))) {
          return { name: pattern.action, params: [pattern.param] };
        }
      }

      return null;
    }
    function iaExecuteAction(action) {
      switch (action.name) {
        case 'navigate':
          return DC_IA_Tools.navigate(action.params[0]);

        case 'devis':
          return DC_IA_Tools.genererDevis(
            action.params[0], // offreId
            action.params[1], // nom
            action.params[2], // email
            action.params[3], // telephone
            action.params[4]  // entreprise
          );

        case 'contact':
          return DC_IA_Tools.soumettreContact(
            action.params[0], // nom
            action.params[1], // email
            action.params[2], // telephone
            action.params[3], // entreprise
            action.params[4]  // message
          );

        case 'search':
          return DC_IA_Tools.rechercherInfos(action.params[0]);

        default:
          return { error: 'Action inconnue : ' + action.name };
      }
    }

    //  Appel principal à OpenRouter (non-streaming, fallback)
    async function iaCallOpenRouter(userMessage) {
      const apiKey = window.DC_KNOWING_OPENROUTER_API_KEY ||
        localStorage.getItem('dc_knowing_openrouter_key') || '';

      if (!apiKey) {
        throw new Error('Clé API OpenRouter manquante.');
      }

      const messages = [
        { role: 'system', content: DC_IA_SYSTEM_PROMPT },
        ..._iaHistory.slice(-DC_IA_CONFIG.maxHistory * 2),
        { role: 'user', content: userMessage }
      ];

      const response = await fetch('https://openrouter.ai/api/v1/chat/completions', {
        method: 'POST',
        headers: {
          'Authorization': 'Bearer ' + apiKey,
          'Content-Type': 'application/json',
          'HTTP-Referer': window.location.origin,
          'X-Title': 'DC-KNOWING Agent IA'
        },
        body: JSON.stringify({
          model: DC_IA_CONFIG.model,
          messages: messages,
          temperature: DC_IA_CONFIG.temperature,
          max_tokens: DC_IA_CONFIG.maxTokens
        })
      });

      const payload = await response.json().catch(() => null);

      if (!response.ok) {
        const errMsg = payload?.error?.message || payload?.message || 'Erreur OpenRouter ' + response.status;
        throw new Error(errMsg);
      }

      const choice = payload?.choices?.[0];
      const content = choice?.message?.content;

      if (!content || typeof content !== 'string') {
        throw new Error('Réponse vide de l\'IA.');
      }

      return content.trim();
    }

    //  Appel streaming à OpenRouter (SSE)
    async function iaCallOpenRouterStream(userMessage, onToken, onDone) {
      const apiKey = window.DC_KNOWING_OPENROUTER_API_KEY ||
        localStorage.getItem('dc_knowing_openrouter_key') || '';

      if (!apiKey) {
        throw new Error('Clé API OpenRouter manquante.');
      }

      const messages = [
        { role: 'system', content: DC_IA_SYSTEM_PROMPT },
        ..._iaHistory.slice(-DC_IA_CONFIG.maxHistory * 2),
        { role: 'user', content: userMessage }
      ];

      const response = await fetch('https://openrouter.ai/api/v1/chat/completions', {
        method: 'POST',
        headers: {
          'Authorization': 'Bearer ' + apiKey,
          'Content-Type': 'application/json',
          'HTTP-Referer': window.location.origin,
          'X-Title': 'DC-KNOWING Agent IA'
        },
        body: JSON.stringify({
          model: DC_IA_CONFIG.model,
          messages: messages,
          temperature: DC_IA_CONFIG.temperature,
          max_tokens: DC_IA_CONFIG.maxTokens,
          stream: true
        })
      });

      if (!response.ok) {
        const errorText = await response.text().catch(() => '');
        let errMsg;
        try {
          const err = JSON.parse(errorText);
          errMsg = err?.error?.message || err?.message || 'Erreur OpenRouter ' + response.status;
        } catch {
          errMsg = 'Erreur OpenRouter ' + response.status;
        }
        throw new Error(errMsg);
      }

      // Lire le stream SSE
      const reader = response.body.getReader();
      const decoder = new TextDecoder();
      let fullText = '';
      let buffer = '';

      while (true) {
        const { done, value } = await reader.read();
        if (done) break;

        buffer += decoder.decode(value, { stream: true });

        // Parser les lignes SSE
        const lines = buffer.split('\n');
        buffer = lines.pop() || ''; // Garder la dernière ligne incomplète

        for (const line of lines) {
          const trimmed = line.trim();
          if (!trimmed || !trimmed.startsWith('data: ')) continue;

          const data = trimmed.slice(6); // Enlever "data: "
          if (data === '[DONE]') continue;

          try {
            const parsed = JSON.parse(data);
            const delta = parsed?.choices?.[0]?.delta?.content;
            if (delta) {
              fullText += delta;
              onToken(delta, fullText);
            }
          } catch {
            // Ignorer les chunks malformés
          }
        }
      }

      // Traiter le buffer restant
      if (buffer.trim().startsWith('data: ') && buffer.trim() !== 'data: [DONE]') {
        try {
          const parsed = JSON.parse(buffer.trim().slice(6));
          const delta = parsed?.choices?.[0]?.delta?.content;
          if (delta) {
            fullText += delta;
            onToken(delta, fullText);
          }
        } catch { /* ignore */ }
      }

      onDone(fullText);
      return fullText.trim();
    }

    //  Fonction principale utilisée par le chatbot
    async function iaProcessMessage(userMessage) {
      iaPushMessage('user', userMessage);
      const rawResponse = await iaCallOpenRouter(userMessage);
      const { actions, cleanText } = iaParseActions(rawResponse);
      const actionResults = [];
      for (const action of actions) {
        try { actionResults.push({ action: action.name, result: iaExecuteAction(action) }); }
        catch (err) { actionResults.push({ action: action.name, error: err.message }); }
      }
      const finalText = cleanText || rawResponse;
      iaPushMessage('assistant', finalText);
      return { text: finalText, raw: rawResponse, actions: actionResults };
    }

    //  Fonction streaming utilisée par le chatbot
    async function iaProcessMessageStream(userMessage, callbacks) {
      const { onToken, onComplete, onError } = callbacks;
      iaPushMessage('user', userMessage);

      try {
        let fullText = '';

        await iaCallOpenRouterStream(
          userMessage,
          // onToken — appelé à chaque morceau de texte
          (delta, accumulated) => {
            fullText = accumulated;
            if (onToken) onToken(delta, accumulated);
          },
          // onDone — appelé quand le stream est terminé
          (accumulated) => {
            fullText = accumulated;

            // Parser les actions sur le texte complet
            let { actions, cleanText } = iaParseActions(fullText);

            //  FALLBACK : si l'IA n'a pas mis d'action mais que l'utilisateur demande clairement une navigation
            if (actions.length === 0) {
              const fallbackAction = detectFallbackAction(userMessage);
              if (fallbackAction) {
                actions.push(fallbackAction);
                // Ne pas modifier cleanText — l'IA n'a pas écrit d'action donc rien à nettoyer
              }
            }

            const finalText = cleanText || fullText;

            // Exécuter les actions
            const actionResults = [];
            for (const action of actions) {
              try { actionResults.push({ action: action.name, result: iaExecuteAction(action) }); }
              catch (err) { actionResults.push({ action: action.name, error: err.message }); }
            }

            iaPushMessage('assistant', finalText);

            if (onComplete) onComplete(finalText, actionResults);
          }
        );
      } catch (error) {
        console.error('[IA Stream] Erreur:', error);
        if (onError) onError(error);
      }
    }

    //  Fonction d'aide pour formater les résultats d'action
    function iaFormatActionResult(actionResult) {
      if (actionResult.error) {
        return ' *Erreur* : ' + actionResult.error;
      }

      switch (actionResult.action) {
        case 'navigate':
          return actionResult.result?.success
            ? '🧭 Navigation vers ' + actionResult.result.target
            : ' Navigation impossible.';

        case 'devis':
          if (actionResult.result?.success) {
            const d = actionResult.result;
            return ` **Devis ${d.devisId} créé !**\n- Offre : ${d.offre}\n- Montant : ${d.montant.toLocaleString('fr-FR')} FCFA\n- Client : ${d.client.nom}\n\n[Voir mes devis →](#mes-devis)`;
          }
          return ' ' + (actionResult.result?.error || 'Erreur devis');

        case 'contact':
          return actionResult.result?.success
            ? ' Formulaire envoyé ! L\'équipe vous répond sous 24h.'
            : ' ' + (actionResult.result?.error || 'Erreur formulaire');

        case 'search':
          if (actionResult.result?.success) {
            const r = actionResult.result;
            const count = r.totalResults;
            return ` ${count} résultat(s) trouvé(s) pour "${r.query}"`;
          }
          return ' Aucun résultat.';

        default:
          return '';
      }
    }

    //  Exposer l'API
    window.DC_IA_Core = {
      processMessage: iaProcessMessage,
      processMessageStream: iaProcessMessageStream,
      getHistory: iaGetHistory,
      clearHistory: iaClearHistory,
      config: DC_IA_CONFIG
    };

    // -- ia-tools.js --
    //  IA DC-KNOWING — Fonctions exposées à l'agent IA

    window.DC_IA_Tools = {
      /**
       * Naviguer vers une page ou une ancre du site
       * @param {string} url - URL relative ou ancre (#offres, services/juridique.html, etc.)
       */
      navigate: function (url) {
        if (!url) return { error: 'URL manquante' };

        // Si c'est une ancre sur la même page
        if (url.startsWith('#')) {
          const el = document.querySelector(url);
          if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            // Si c'est #offres, déclencher l'événement de scroll
            if (url === '#offres' && typeof initFiltres === 'function') {
              setTimeout(() => initFiltres(), 400);
            }
            if (typeof showNotification === 'function') {
              showNotification(' Navigation vers : ' + url, 'info');
            }
            return { success: true, action: 'scroll', target: url };
          }
          return { error: 'Section ' + url + ' introuvable sur cette page' };
        }

        // Navigation vers une autre page
        window.location.href = url;
        return { success: true, action: 'navigate', target: url };
      },

      /**
       * Générer un devis pour une offre
       * @param {string} offreId - ID de l'offre dans OFFRES_DATA
       * @param {string} nom - Nom du client
       * @param {string} email - Email du client
       * @param {string} telephone - Téléphone du client
       * @param {string} entreprise - Nom de l'entreprise
       */
      genererDevis: function (offreId, nom, email, telephone, entreprise) {
        if (!offreId || !nom || !email) {
          return { error: 'Informations manquantes : offreId, nom et email requis.' };
        }

        if (typeof OFFRES_DATA === 'undefined') {
          return { error: 'Données des offres non disponibles.' };
        }

        const offre = OFFRES_DATA.find(o => o.id === offreId);
        if (!offre) {
          const suggestions = OFFRES_DATA
            .filter(o => o.id.includes(offreId) || o.nom.toLowerCase().includes(offreId.toLowerCase()))
            .map(o => o.id + ' (' + o.nom + ')');
          return {
            error: 'Offre "' + offreId + '" introuvable.',
            suggestions: suggestions.length > 0 ? suggestions : Object.keys(DC_KNOWING_KNOWLEDGE.tarifs_rapides)
          };
        }

        // Assurer que sessionDevis est initialisé
        if (typeof sessionDevis === 'undefined') {
          window.sessionDevis = [];
        }
        if (!Array.isArray(sessionDevis)) {
          sessionDevis = [];
        }

        const devis = {
          id: 'DEV-' + Date.now(),
          offre: offre.tier + ' - ' + offre.nom,
          montant: offre.prix,
          categorie: offre.categorie,
          entreprise: entreprise || '',
          date: new Date().toLocaleDateString('fr-FR'),
          statut: 'pending',
          client: { nom, email, telephone }
        };

        sessionDevis.push(devis);

        if (typeof saveSessionDevis === 'function') saveSessionDevis();
        if (typeof renderDevisList === 'function') renderDevisList();

        if (typeof showNotification === 'function') {
          showNotification(' Devis créé : ' + devis.id, 'success');
        }

        // Navigation vers la section devis
        setTimeout(() => {
          const devisSection = document.querySelector('#mes-devis');
          if (devisSection) devisSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }, 500);

        return {
          success: true,
          devisId: devis.id,
          offre: devis.offre,
          montant: devis.montant,
          categorie: devis.categorie,
          client: devis.client
        };
      },

      /**
       * Soumettre le formulaire de contact
       * @param {string} nom - Nom complet
       * @param {string} email - Email
       * @param {string} telephone - Téléphone
       * @param {string} entreprise - Nom de l'entreprise
       * @param {string} message - Message/Besoin
       */
      soumettreContact: function (nom, email, telephone, entreprise, message) {
        if (!nom || !email) {
          return { error: 'Nom et email requis pour soumettre le formulaire.' };
        }

        const form = document.getElementById('contactForm');
        if (!form) {
          return { error: 'Formulaire de contact introuvable sur cette page.' };
        }

        const inputs = form.querySelectorAll('input, textarea');

        // Mapping des champs (ordre dans le formulaire)
        if (inputs.length >= 4) {
          if (inputs[0]) inputs[0].value = nom || '';
          if (inputs[1]) inputs[1].value = email || '';
          if (inputs[2]) inputs[2].value = telephone || '';
          if (inputs[3]) inputs[3].value = entreprise || '';
          if (inputs[4]) inputs[4].value = message || '';
        }

        // Déclencher la soumission
        if (typeof handleContactSubmit === 'function') {
          handleContactSubmit(new Event('submit'));
        }

        if (typeof showNotification === 'function') {
          showNotification(' Demande envoyée ! Réponse sous 24h.', 'success');
        }

        return {
          success: true,
          message: 'Formulaire soumis avec succès. L\'équipe DC-KNOWING répond sous 24h.',
          details: { nom, email, telephone, entreprise }
        };
      },

      /**
       * Rechercher des informations dans les offres et la base de connaissance
       * @param {string} query - Mots-clés de recherche
       */
      rechercherInfos: function (query) {
        if (!query) return { error: 'Requête vide.' };

        const q = query.toLowerCase().trim();
        const results = { offres: [], services: [], tarifs: [], pages: [] };

        // Chercher dans OFFRES_DATA
        if (typeof OFFRES_DATA !== 'undefined') {
          OFFRES_DATA.forEach(o => {
            const searchStr = (o.id + ' ' + o.nom + ' ' + o.categorie + ' ' + o.tier + ' ' + o.tagline + ' ' + (o.features || []).join(' ')).toLowerCase();
            if (searchStr.includes(q)) {
              results.offres.push({
                id: o.id,
                nom: o.tier + ' - ' + o.nom,
                categorie: o.categorie,
                prix: o.prix,
                unite: o.unite,
                tagline: o.tagline
              });
            }
          });
          // Limiter à 5 offres max
          results.offres = results.offres.slice(0, 5);
        }

        // Chercher dans les services
        Object.entries(DC_KNOWING_KNOWLEDGE.services_description).forEach(([key, desc]) => {
          if (desc.toLowerCase().includes(q) || key.includes(q)) {
            results.services.push({ service: key, description: desc.substring(0, 200) + '...' });
          }
        });

        // Chercher dans les tarifs rapides
        Object.entries(DC_KNOWING_KNOWLEDGE.tarifs_rapides).forEach(([key, tarif]) => {
          if (key.includes(q) || tarif.toLowerCase().includes(q)) {
            results.tarifs.push({ nom: key, tarif: tarif });
          }
        });

        // Chercher dans les pages
        if (DC_KNOWING_KNOWLEDGE.pages) {
          Object.entries(DC_KNOWING_KNOWLEDGE.pages.services || {}).forEach(([key, page]) => {
            if ((page.titre + ' ' + page.description).toLowerCase().includes(q)) {
              results.pages.push({ nom: page.titre, url: page.url, description: page.description });
            }
          });
        }

        const totalResults = results.offres.length + results.services.length + results.tarifs.length + results.pages.length;

        return {
          success: true,
          query: query,
          totalResults: totalResults,
          results: results
        };
      }
    };

    //  Exposer les fonctions en global pour l'IA
    window.iaNaviguerVers = DC_IA_Tools.navigate;
    window.iaGenererDevis = DC_IA_Tools.genererDevis;
    window.iaSoumettreContact = DC_IA_Tools.soumettreContact;
    window.iaRechercherInfos = DC_IA_Tools.rechercherInfos;

    // -- chatbot.js --
    //  DC-KNOWING — Chatbot Agent IA
    // Connecté à ia-core.js (moteur IA) et ia-tools.js (actions)

    const CHATBOT_STORAGE_KEY = 'dc_knowing_chat_history';
    const CHATBOT_MAX_MESSAGES = 30;

    document.addEventListener('DOMContentLoaded', initChatbot);

    function initChatbot() {
      const trigger = document.getElementById('chatbotTrigger');
      const win = document.getElementById('chatbotWindow');
      const close = document.getElementById('chatbotClose');
      const input = document.querySelector('.chatbot-input');
      const send = document.querySelector('.chatbot-send');
      const messages = document.querySelector('.chatbot-messages');
      const status = document.querySelector('.chatbot-status');
      const footer = document.querySelector('.chatbot-footer');

      if (!trigger || !win || !close || !input || !send || !messages) return;

      // Mettre à jour le footer
      if (footer) footer.textContent = 'Agent IA DC-KNOWING  |  Navigation  |  Devis  |  Contact';

      const state = {
        history: loadHistory(),
        sending: false,
      };

      // Message de bienvenue (si historique vide)
      if (state.history.length === 0) {
        const welcome = "## Bienvenue chez DC-KNOWING !\n\nJe suis votre **assistant IA**. Je peux vous aider a :\n\n- **Explorer nos services** : juridique, comptabilite, CGA, formation...\n- **Consulter les offres et tarifs** : je connais toutes nos formules\n- **Naviguer sur le site** : je vous donne des liens directs vers chaque section\n- **Generer un devis** : je m'occupe de tout !\n- **Soumettre une demande de contact** : l'equipe vous repond sous 24h\n\n*Posez-moi votre question, je suis la pour vous !*";
        state.history.push({ role: 'assistant', content: welcome });
        saveHistory(state.history);
      }

      function setStatus(text) {
        if (status) status.textContent = text;
      }

      function setSending(isSending) {
        state.sending = isSending;
        send.disabled = isSending;
        input.disabled = isSending;
        input.placeholder = isSending ? 'Reflexion en cours...' : 'Posez votre question...';
        setStatus(isSending ? 'Analyse en cours...' : 'En ligne | Agent IA actif');
      }

      function renderHistory() {
        messages.innerHTML = '';
        state.history.slice(-CHATBOT_MAX_MESSAGES).forEach(msg => {
          messages.appendChild(createBubble(msg.role, msg.content, msg.isActionFeedback));
        });
        if (state.sending) {
          messages.appendChild(createBubble('assistant', '*Reflexion en cours...*', false));
        }
        messages.scrollTop = messages.scrollHeight;
      }

      function pushMessage(role, content, isActionFeedback) {
        state.history.push({ role, content, isActionFeedback });
        if (state.history.length > CHATBOT_MAX_MESSAGES) {
          state.history = state.history.slice(-CHATBOT_MAX_MESSAGES);
        }
        saveHistory(state.history);
      }

      async function sendMessage() {
        const text = input.value.trim();
        if (!text || state.sending) return;

        // Message utilisateur
        pushMessage('user', text);
        input.value = '';
        setSending(true);
        renderHistory();

        //  Créer une bulle de streaming
        const streamWrapper = document.createElement('div');
        streamWrapper.className = 'chatbot-message assistant streaming';
        const streamBubble = document.createElement('div');
        streamBubble.className = 'chatbot-message-content';
        streamBubble.innerHTML = '<span class="stream-cursor"></span>';
        streamWrapper.appendChild(streamBubble);
        messages.appendChild(streamWrapper);
        messages.scrollTop = messages.scrollHeight;

        //  Système de machine à écrire
        let fullBuffer = '';       // Texte complet reçu du modèle
        let displayedLen = 0;     // Nombre de caractères déjà affichés
        let typewriterTimer = null;
        let streamEnded = false;
        const CHARS_PER_TICK = 6; // Caractères affichés par tick (~60/sec → 360 chars/sec, fluide)

        function startTypewriter() {
          if (typewriterTimer) return;
          typewriterTimer = setInterval(() => {
            if (displayedLen >= fullBuffer.length) {
              if (streamEnded) stopTypewriter();
              return;
            }
            // Avancer de quelques caractères
            displayedLen = Math.min(displayedLen + CHARS_PER_TICK, fullBuffer.length);
            let visible = fullBuffer.substring(0, displayedLen);
            // Filtrer les lignes d'action pour ne jamais les montrer
            visible = visible.replace(/^.*ACTION:.*$/gm, '').replace(/^.*\[ACTION:.*\]$/gm, '');
            streamBubble.innerHTML = escapeHtml(visible) + '<span class="stream-cursor"></span>';
            messages.scrollTop = messages.scrollHeight;
          }, 16); // ~60 fps
        }

        function stopTypewriter() {
          if (typewriterTimer) {
            clearInterval(typewriterTimer);
            typewriterTimer = null;
          }
        }

        function finalizeStreamBubble(finalText) {
          stopTypewriter();
          streamWrapper.classList.remove('streaming');
          streamWrapper.classList.add('stream-done');
          if (typeof marked !== 'undefined') {
            marked.setOptions({ breaks: true, gfm: true });
            streamBubble.innerHTML = marked.parse(finalText);
          } else {
            streamBubble.innerHTML = escapeHtml(finalText).replace(/\n/g, '<br>');
          }
          messages.scrollTop = messages.scrollHeight;
        }

        try {
          if (!window.DC_IA_Core || typeof DC_IA_Core.processMessageStream !== 'function') {
            throw new Error('Le moteur IA n\'est pas encore chargé. Rechargez la page.');
          }

          // Appeler l'IA en streaming
          await DC_IA_Core.processMessageStream(text, {
            onToken: (delta, accumulated) => {
              // Ajouter au buffer et démarrer/continuer la machine à écrire
              fullBuffer = accumulated;
              if (!typewriterTimer) startTypewriter();
            },
            onComplete: (finalText, actionResults) => {
              streamEnded = true;
              fullBuffer = finalText;
              // Accélérer la fin : afficher tout ce qui reste
              if (displayedLen < fullBuffer.length) {
                // Vider le reste rapidement (50 chars par tick)
                const fastTicks = setInterval(() => {
                  displayedLen = Math.min(displayedLen + 50, fullBuffer.length);
                  streamBubble.innerHTML = escapeHtml(fullBuffer.substring(0, displayedLen)) + '<span class="stream-cursor"></span>';
                  messages.scrollTop = messages.scrollHeight;
                  if (displayedLen >= fullBuffer.length) {
                    clearInterval(fastTicks);
                    finalizeStreamBubble(finalText);
                  }
                }, 30);
              } else {
                finalizeStreamBubble(finalText);
              }

              // Sauvegarder dans l'historique
              state.history.push({ role: 'assistant', content: finalText, isActionFeedback: false });
              if (state.history.length > CHATBOT_MAX_MESSAGES) {
                state.history = state.history.slice(-CHATBOT_MAX_MESSAGES);
              }
              saveHistory(state.history);

              // Afficher les retours d'actions
              if (actionResults && actionResults.length > 0) {
                for (const action of actionResults) {
                  const feedback = iaFormatActionResult(action);
                  if (feedback) {
                    pushMessage('assistant', feedback, true);
                  }
                }
              }
            },
            onError: (error) => {
              stopTypewriter();
              streamWrapper.classList.remove('streaming');
              streamBubble.innerHTML = marked.parse(
                ' **Oups !** Je n\'ai pas pu répondre.\n\n' +
                '> ' + (error?.message || 'Erreur de connexion au serveur IA.') +
                '\n\n*Vérifiez votre connexion et réessayez.*'
              );
              if (typeof showNotification === 'function') {
                showNotification(' L\'IA n\'a pas pu répondre. Vérifiez la connexion.', 'error');
              }
            }
          });

        } catch (error) {
          console.error('[Chatbot] Erreur:', error);
          stopTypewriter();
          streamWrapper.classList.remove('streaming');
          streamBubble.innerHTML = marked.parse(
            ' **Oups !** Je n\'ai pas pu répondre.\n\n' +
            '> ' + (error?.message || 'Erreur de connexion au serveur IA.') +
            '\n\n*Vérifiez votre connexion et réessayez.*'
          );
          if (typeof showNotification === 'function') {
            showNotification(' L\'IA n\'a pas pu répondre. Vérifiez la connexion.', 'error');
          }
        } finally {
          setSending(false);
          input.focus();
        }
      }

      //  Event Listeners
      trigger.addEventListener('click', () => {
        win.classList.toggle('open');
        if (win.classList.contains('open')) {
          renderHistory();
          setTimeout(() => input.focus(), 100);
        }
      });

      close.addEventListener('click', () => win.classList.remove('open'));

      input.addEventListener('keydown', e => {
        if (e.key === 'Enter' && !e.shiftKey) {
          e.preventDefault();
          sendMessage();
        }
        if (e.key === 'Escape') {
          win.classList.remove('open');
        }
      });

      send.addEventListener('click', sendMessage);

      document.addEventListener('keydown', e => {
        if (e.key === 'Escape') win.classList.remove('open');
      });

      //  Initialisation
      setSending(false);
      renderHistory();
    }

    //  Fonctions utilitaires

    function loadHistory() {
      try {
        const raw = sessionStorage.getItem(CHATBOT_STORAGE_KEY);
        const parsed = raw ? JSON.parse(raw) : [];
        return Array.isArray(parsed)
          ? parsed.filter(item => item && typeof item.role === 'string' && typeof item.content === 'string')
          : [];
      } catch {
        return [];
      }
    }

    function saveHistory(history) {
      try {
        sessionStorage.setItem(CHATBOT_STORAGE_KEY, JSON.stringify(history));
      } catch { /* ignore */ }
    }

    function createBubble(role, content, isActionFeedback) {
      const wrapper = document.createElement('div');
      wrapper.className = `chatbot-message ${role}`;
      if (isActionFeedback) wrapper.classList.add('action-feedback');

      const bubble = document.createElement('div');
      bubble.className = 'chatbot-message-content';

      if (role === 'assistant') {
        if (typeof marked !== 'undefined') {
          marked.setOptions({ breaks: true, gfm: true });
          bubble.innerHTML = marked.parse(content);
        } else {
          bubble.innerHTML = escapeHtml(content).replace(/\n/g, '<br>');
        }
      } else {
        bubble.textContent = content;
      }

      wrapper.appendChild(bubble);
      return wrapper;
    }

    function escapeHtml(text) {
      const div = document.createElement('div');
      div.textContent = text;
      return div.innerHTML;
    }

    //  Exposer pour le debug
    window.DC_Chatbot = {
      getHistory: () => JSON.parse(sessionStorage.getItem(CHATBOT_STORAGE_KEY) || '[]'),
      clearHistory: () => {
        sessionStorage.removeItem(CHATBOT_STORAGE_KEY);
        if (window.DC_IA_Core) DC_IA_Core.clearHistory();
        location.reload();
      }
    };

    // IA KEY (définie via OPENROUTER_API_KEY dans .env)
    window.DC_KNOWING_OPENROUTER_API_KEY = @json(config('services.openrouter.key'));

    // ── BURGER MENU MOBILE ──
    (function() {
      const burger = document.getElementById('navBurger');
      const menu   = document.getElementById('mobileMenu');
      if (!burger || !menu) return;

      burger.addEventListener('click', function() {
        menu.classList.toggle('open');
        burger.textContent = menu.classList.contains('open') ? '✕' : '☰';
      });

      // Fermer si on clique en dehors du menu
      document.addEventListener('click', function(e) {
        if (!menu.contains(e.target) && !burger.contains(e.target)) {
          menu.classList.remove('open');
          burger.textContent = '☰';
        }
      });
    })();

    function closeMobileMenu() {
      const menu   = document.getElementById('mobileMenu');
      const burger = document.getElementById('navBurger');
      if (menu)   menu.classList.remove('open');
      if (burger) burger.textContent = '☰';
    }

    // ── DÉSACTIVER LE CURSEUR CUSTOM SUR MOBILE ──
    (function() {
      const isTouchDevice = () => window.matchMedia('(pointer: coarse)').matches;
      if (isTouchDevice()) {
        document.body.style.cursor = 'auto';
        const cursor = document.getElementById('cursor');
        const ring   = document.getElementById('cursorRing');
        if (cursor) cursor.style.display = 'none';
        if (ring)   ring.style.display   = 'none';
        // Rétablir le curseur sur tous les boutons/liens
        document.querySelectorAll('a, button, [style*="cursor: none"]').forEach(el => {
          el.style.cursor = 'auto';
        });
      }
    })();

  </script>
</body>

</html>
