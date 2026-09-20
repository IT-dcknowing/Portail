
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DC-KNOWING — Cabinet d'Accompagnement en Gestion d'Entreprise</title>
  <link rel="icon" type="image/jpeg" href="{{ asset('images/teste.jpeg') }}">

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
    /* Icônes SVG : remplace les émojis pour un rendu cohérent sur tous les appareils. */
    .svg-sprite {
      position: absolute;
      width: 0;
      height: 0;
      overflow: hidden;
    }

    .icon {
      width: 1em;
      height: 1em;
      display: inline-block;
      flex: 0 0 auto;
      vertical-align: -0.125em;
      fill: none;
      stroke: currentColor;
      stroke-width: 1.8;
      stroke-linecap: round;
      stroke-linejoin: round;
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
      height: 84px;
      background: rgba(10, 10, 10, 0.98);
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
      border-bottom: 1px solid var(--ligne);
      padding: 0;
      z-index: 1000;
      transition: background 0.3s var(--transition), box-shadow 0.3s var(--transition);
    }

    .nav-shell {
      height: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 24px;
    }

    .nav-logo {
      display: flex;
      align-items: center;
      text-decoration: none;
    }

    .nav-logo-mark {
      height: 84px;
      width: 200px;
      object-fit: contain;
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

    /* ── Conteneur commun : header, hero et sections alignes ── */
    .shell {
      width: min(1440px, 100% - 120px);
      margin-inline: auto;
    }

    /* ── HERO SECTION (tient a zoom 100 % sans scroll) ── */
    .hero {
      --gold: linear-gradient(90deg, #b8860b 0%, #ffd700 60%, #c9970c 100%);
      --cycle: 6s;
      min-height: calc(100svh - 84px);
      /* 84px (header fixe) + 24px d'air */
      padding: 108px 0 40px;
      position: relative;
      overflow: hidden;
    }

    .hero-shell {
      display: grid;
      grid-template-columns: minmax(0, 1fr) 540px;
      column-gap: clamp(48px, 5vw, 80px);
      align-items: center;
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
      background-size: 100px 100px;
      pointer-events: none;
      opacity: 0.9;
      -webkit-mask-image: linear-gradient(to right, transparent 0%, transparent 15%, rgba(0, 0, 0, 0.4) 35%, rgba(0, 0, 0, 0.85) 55%, black 75%);
      mask-image: linear-gradient(to right, transparent 0%, transparent 15%, rgba(0, 0, 0, 0.4) 35%, rgba(0, 0, 0, 0.85) 55%, black 75%);
    }

    /* ── Lueur qui suit la souris sur le quadrillage (reutilisable) ── */
    .grid-glow {
      position: absolute;
      inset: 0;
      pointer-events: none;
      z-index: 0;
      background-image:
        radial-gradient(circle 200px at var(--mx, -500px) var(--my, -500px), rgba(255, 208, 0, .06), transparent 70%),
        linear-gradient(rgba(255, 208, 0, .35) 1px, transparent 1px),
        linear-gradient(90deg, rgba(255, 208, 0, .35) 1px, transparent 1px);
      background-size: auto, 100px 100px, 100px 100px;
      opacity: 0;
      transition: opacity .4s ease;
      -webkit-mask-image: radial-gradient(circle 200px at var(--mx, -500px) var(--my, -500px), #000 0%, transparent 100%);
      mask-image: radial-gradient(circle 200px at var(--mx, -500px) var(--my, -500px), #000 0%, transparent 100%);
    }

    .grid-glow.on {
      opacity: 1;
    }

    @media (hover: none),
    (pointer: coarse) {
      .grid-glow {
        display: none;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      .grid-glow {
        display: none;
      }
    }

    .hero-left {
      flex: 1;
      min-width: 0;
      position: relative;
      z-index: 1;
    }

    .hero-badge {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 18px;
    }

    .hero-badge-line {
      width: 40px;
      height: 1px;
      background: var(--or-degrade);
    }

    .hero-badge-text {
      font-size: 14px;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: var(--or-base);
      font-weight: 600;
    }

    .hero-title {
      font-size: clamp(40px, 4.4vw, 76px);
      font-weight: 200;
      line-height: 1.06;
      margin-bottom: 28px;
    }

    .nowrap {
      white-space: nowrap;
    }

    .ht-line {
      display: block;
    }

    .ht-thin {
      font-style: italic;
      font-weight: 300;
      color: #bdbdbd;
    }

    .ht-gold {
      font-style: normal;
      font-weight: 800;
      background: var(--gold);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .ht-white {
      font-style: normal;
      font-weight: 700;
      color: #ffffff;
    }

    .ht-premium {
      font-style: italic;
      font-weight: 300;
      background: var(--gold);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    /* ── Reflet dore en boucle sur « Cabinet » (4s, sans saut) ── */
    .shine {
      background-image:
        linear-gradient(105deg, transparent 40%, rgba(255, 245, 180, .95) 50%, transparent 60%),
        linear-gradient(90deg, #b8860b 0%, #ffd700 60%, #c9970c 100%);
      background-size: 250% 100%, 100% 100%;
      background-repeat: no-repeat;
      background-position: 100% 0, 0 0;
      -webkit-background-clip: text;
      background-clip: text;
      -webkit-text-fill-color: transparent;
      color: transparent;
      animation: shine 4s ease-in-out 1.2s infinite;
    }

    @keyframes shine {
      0% {
        background-position: 100% 0, 0 0;
      }

      40%,
      100% {
        background-position: 0% 0, 0 0;
      }
    }

    @supports not (background-clip:text) {
      .shine {
        color: #ffd000;
        background: none;
      }
    }

    @media (prefers-reduced-motion:reduce) {
      .shine {
        animation: none;
      }
    }

    .hero-subtitle {
      font-size: 16px;
      max-width: 520px;
      color: #b4b4b4;
      line-height: 1.65;
      margin-top: 20px;
      margin-bottom: 0;
      font-weight: 300;
    }

    .hero-actions {
      display: flex;
      gap: 16px;
      margin-top: 28px;
      margin-bottom: 48px;
      flex-wrap: wrap;
    }

    .hero-actions .btn-primary,
    .hero-actions .btn-secondary {
      padding: 16px 28px;
      font-size: 15px;
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
      min-width: 0;
      position: relative;
      z-index: 1;
    }

    /* ── PILE DE 4 CARTES ANIMEES (hero) ── */
    .stack-wrap {
      width: 100%;
      max-width: 540px;
      margin-top: -24px;
    }

    .stack {
      position: relative;
      width: 100%;
      max-width: 540px;
      height: auto;
      min-height: 430px;
      animation: stackFloat 7s ease-in-out infinite alternate;
    }

    @keyframes stackFloat {
      from {
        transform: translateY(0);
      }

      to {
        transform: translateY(-8px);
      }
    }

    .scard {
      position: absolute;
      inset: 0;
      background: #161616;
      border: 1px solid rgba(255, 208, 0, .24);
      padding: 28px 32px;
      display: flex;
      flex-direction: column;
      overflow: hidden;
      will-change: transform, opacity;
      transition: transform .6s cubic-bezier(.2, .8, .2, 1), opacity .5s ease;
    }

    .scard::before {
      content: '';
      position: absolute;
      top: -1px;
      left: -1px;
      right: -1px;
      height: 2px;
      background: var(--gold);
    }

    .scard[data-pos="0"] {
      transform: translate(0, 0);
      opacity: 1;
      z-index: 4;
    }

    .scard[data-pos="1"] {
      transform: translate(-14px, 12px);
      opacity: .75;
      z-index: 3;
    }

    .scard[data-pos="2"] {
      transform: translate(-28px, 24px);
      opacity: .45;
      z-index: 2;
    }

    .scard[data-pos="3"] {
      transform: translate(-42px, 36px);
      opacity: 0;
      z-index: 1;
    }

    .scard-icon {
      width: 40px;
      height: 40px;
      border: 1px solid var(--or-base);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-bottom: 18px;
      flex-shrink: 0;
    }

    .scard-icon svg {
      width: 20px;
      height: 20px;
    }

    .scard h2 {
      font-size: 24px;
      font-weight: 700;
      color: #ffffff;
      line-height: 1.25;
      margin-bottom: 8px;
    }

    .scard-sub {
      font-size: 14px;
      font-weight: 600;
      color: var(--or-base);
      margin-bottom: 10px;
    }

    .scard-desc {
      font-size: 14px;
      font-weight: 300;
      color: #b4b4b4;
      line-height: 1.55;
    }

    .scard-metric {
      margin-top: auto;
      padding-top: 16px;
    }

    .metric-label {
      font-size: 14px;
      font-weight: 500;
      color: #aaaaaa;
      margin-bottom: 8px;
    }

    .metric-value {
      display: flex;
      align-items: baseline;
      gap: 12px;
      font-size: 44px;
      font-weight: 700;
      color: #ffffff;
      line-height: 1;
    }

    .metric-value .unit {
      font-size: 16px;
      font-weight: 600;
      color: #ffd000;
      letter-spacing: .14em;
    }

    .metric-bar-row {
      display: flex;
      justify-content: space-between;
      align-items: baseline;
      font-size: 14px;
      font-weight: 600;
      color: #ffffff;
      margin-bottom: 10px;
    }

    .metric-bar-row .pct {
      color: #ffd000;
    }

    .metric-bar {
      height: 6px;
      background: rgba(255, 255, 255, .14);
      overflow: hidden;
    }

    .metric-fill {
      height: 100%;
      width: 0;
      background: var(--gold);
      transition: width 1.2s cubic-bezier(.2, .7, .2, 1) .55s;
    }

    .scard-chips {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 18px;
    }

    .scard-chips span {
      font-size: 11px;
      font-weight: 600;
      letter-spacing: .12em;
      color: #ffffff;
      border: 1px solid rgba(255, 255, 255, .16);
      padding: 7px 11px;
    }

    /* ── Apparition echelonnee du contenu de la carte active ── */
    .scard .anim {
      opacity: 0;
      transform: translateY(8px);
      will-change: transform, opacity;
      transition: opacity .45s ease, transform .45s ease;
      transition-delay: .5s;
    }

    .scard[data-pos="0"] .anim {
      opacity: 1;
      transform: translateY(0);
    }

    .scard[data-pos="0"] .d1 {
      transition-delay: .35s;
    }

    .scard[data-pos="0"] .d2 {
      transition-delay: .45s;
    }

    .scard[data-pos="0"] .d3 {
      transition-delay: .5s;
    }

    .scard[data-pos="0"] .d4 {
      transition-delay: .55s;
    }

    .scard[data-pos="0"] .d5 {
      transition-delay: .65s;
    }

    /* ── Puces carte 03 : illumination sequentielle ── */
    .scard[data-pos="0"] .chip-seq span {
      animation: chipGlow 3.2s ease-in-out infinite;
    }

    .scard[data-pos="0"] .chip-seq span:nth-child(2) {
      animation-delay: .8s;
    }

    .scard[data-pos="0"] .chip-seq span:nth-child(3) {
      animation-delay: 1.6s;
    }

    .scard[data-pos="0"] .chip-seq span:nth-child(4) {
      animation-delay: 2.4s;
    }

    @keyframes chipGlow {

      0%,
      24% {
        background: #ffd000;
        color: #111111;
        border-color: #ffd000;
      }

      25%,
      100% {
        background: transparent;
        color: #ffffff;
        border-color: rgba(255, 255, 255, .16);
      }
    }

    /* ── Onglets minuteur sous la pile ── */
    .stack-tabs {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 12px;
      margin-top: 28px;
    }

    .stack-tab {
      background: transparent;
      border: none;
      padding: 0;
      text-align: left;
      cursor: pointer;
      color: #8a8a8a;
      font-family: 'Montserrat', sans-serif;
    }

    .stack-tab .tab-label {
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .06em;
      text-transform: uppercase;
    }

    .stack-tab[aria-selected="true"] {
      color: #ffffff;
    }

    .stack-tab:focus-visible {
      outline: 2px solid #ffd000;
      outline-offset: 4px;
    }

    .tab-track {
      display: block;
      height: 3px;
      background: rgba(255, 255, 255, .14);
      margin-bottom: 10px;
      overflow: hidden;
    }

    .tab-fill {
      display: block;
      height: 100%;
      width: 0;
      background: var(--gold);
    }

    .stack-tab.active .tab-fill.go {
      animation: tabFill var(--cycle) linear forwards;
    }

    @keyframes tabFill {
      from {
        width: 0;
      }

      to {
        width: 100%;
      }
    }

    .stack-wrap:hover .tab-fill.go,
    .stack-wrap:focus-within .tab-fill.go {
      animation-play-state: paused;
    }

    /* ── Pile : responsive ── */
    @media (max-width: 1100px) {
      .hero-shell {
        grid-template-columns: 1fr;
        gap: 40px;
      }

      .hero-right {
        justify-content: center;
        width: 100%;
        padding-bottom: 96px;
      }

      .stack-wrap {
        max-width: 100%;
        margin-top: 0;
      }

      .stack {
        max-width: 100%;
        min-height: 580px;
      }
    }

    @media (max-width: 480px) {
      .stack {
        min-height: 640px;
      }

      .scard {
        padding: 28px 24px;
      }

      .scard h2 {
        font-size: 23px;
      }

      .metric-value {
        font-size: 44px;
      }

      .stack-tabs {
        margin-top: 40px;
      }

      .chatbot-trigger {
        bottom: 24px;
        right: 24px;
      }
    }

    /* ── Pile : réduire les animations ── */
    @media (prefers-reduced-motion: reduce) {
      .stack {
        animation: none;
      }

      .scard {
        transition: none;
      }

      .scard .anim {
        opacity: 1;
        transform: none;
        transition: none;
      }

      .metric-fill {
        transition: none;
      }

      .scard[data-pos="0"] .chip-seq span {
        animation: none;
      }

      .stack-tab.active .tab-fill.go {
        animation: none;
        width: 100%;
      }
    }

    /* ── Hero compact : viewports courts (le hero doit tenir sans scroll) ── */
    @media (max-height: 780px) {
      .scroll-indicator {
        display: none;
      }

      .hero-badge {
        margin-bottom: 12px;
      }

      .hero-title {
        margin-bottom: 16px;
      }

      .hero-actions {
        margin-bottom: 20px;
      }

      .hero-stats {
        gap: 28px;
        margin-bottom: 0;
      }

      .stat-number {
        font-size: 28px;
      }
    }

    /* ── Viewports tres courts : compression renforcee + 96px pour le chat ── */
    @media (max-height: 700px) {
      .hero-stats {
        display: none;
      }

      .hero-actions {
        margin-bottom: 0;
      }

      .stack {
        height: calc(100svh - 270px);
      }

      .scard {
        padding: 24px 28px;
      }

      .scard-icon {
        width: 36px;
        height: 36px;
        margin-bottom: 14px;
      }

      .scard h2 {
        font-size: 22px;
      }

      .scard-desc {
        font-size: 13.5px;
        line-height: 1.5;
      }

      .scard-metric {
        padding-top: 12px;
      }

      .metric-value {
        font-size: 40px;
      }

      .scard-chips {
        margin-top: 12px;
      }
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
      padding: 32px max(60px, calc((100vw - 1440px) / 2 + 60px));
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
      padding: 120px max(60px, calc((100vw - 1440px) / 2 + 60px));
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
      display: flex;
      align-items: center;
      gap: 8px;
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

    .offre-features li .icon {
      color: var(--or-base);
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
      padding: 64px max(60px, calc((100vw - 1440px) / 2 + 60px)) 32px;
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
      bottom: max(32px, env(safe-area-inset-bottom));
      right: max(32px, env(safe-area-inset-right));
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
      transition: transform 0.3s var(--transition), box-shadow 0.3s var(--transition);
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

    /* ── Chat v2 : bulles assistant, liens or, cartes ── */
    .chatbot-message.assistant .chatbot-message-content {
      background: rgba(255, 215, 0, 0.08);
      border: 1px solid rgba(255, 215, 0, 0.15);
      align-self: flex-start;
    }

    .chatbot-message-content a {
      color: #ffd000 !important;
      text-decoration: underline;
    }

    .chatbot-new {
      width: 32px;
      height: 32px;
      background: transparent;
      border: 1px solid var(--ligne);
      color: rgba(250, 248, 244, 0.6);
      font-size: 16px;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: border-color 0.3s, color 0.3s;
      line-height: 1;
      padding: 0;
      margin-right: 8px;
    }

    .chatbot-new:hover {
      border-color: var(--or-base);
      color: var(--or-base);
    }

    .chat-header-actions {
      display: flex;
      align-items: center;
    }

    .chat-suggest {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin: 4px 0 12px;
    }

    .chat-suggest button {
      background: transparent;
      border: 1px solid rgba(255, 215, 0, 0.35);
      color: var(--or-base);
      font-size: 12px;
      padding: 8px 12px;
      cursor: pointer;
      font-family: 'Montserrat', sans-serif;
      transition: background 0.3s, color 0.3s;
    }

    .chat-suggest button:hover {
      background: rgba(255, 215, 0, 0.12);
    }

    .chat-card {
      border: 1px solid rgba(255, 215, 0, 0.25);
      background: rgba(255, 215, 0, 0.05);
      padding: 14px;
      margin: 4px 0 12px;
      font-size: 13px;
      line-height: 1.6;
    }

    .chat-card-title {
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 4px;
    }

    .chat-card-price {
      color: var(--or-base);
      font-weight: 600;
      margin-bottom: 10px;
    }

    .chat-card-row {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
    }

    .chat-card button,
    .chat-card .chat-link-btn {
      background: transparent;
      border: 1px solid rgba(255, 215, 0, 0.4);
      color: var(--or-base);
      font-size: 12px;
      font-weight: 600;
      padding: 8px 12px;
      cursor: pointer;
      font-family: 'Montserrat', sans-serif;
      text-decoration: none;
      display: inline-block;
    }

    .chat-card button:hover,
    .chat-card .chat-link-btn:hover {
      background: rgba(255, 215, 0, 0.12);
    }

    .chat-card button.primary {
      background: var(--or-degrade);
      color: #1A1000;
      border: none;
    }

    .chat-card label {
      display: block;
      font-size: 11px;
      color: rgba(250, 248, 244, 0.5);
      margin: 8px 0 4px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .chat-card input {
      width: 100%;
      background: var(--noir);
      border: 1px solid var(--ligne);
      padding: 10px 12px;
      color: var(--blanc);
      font-size: 13px;
      font-family: 'Montserrat', sans-serif;
      outline: none;
      box-sizing: border-box;
    }

    .chat-card input:focus {
      border-color: var(--or-base);
    }

    .chat-card input:disabled {
      opacity: 0.7;
    }

    .chat-card-error {
      color: #E74C3C;
      font-size: 12px;
      margin-top: 8px;
    }

    .chat-error-buttons {
      display: flex;
      flex-wrap: wrap;
      gap: 8px;
      margin-top: 10px;
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
      backdrop-filter: blur(8px);
      -webkit-backdrop-filter: blur(8px);
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
        padding: 90px 20px 60px;
        min-height: auto;
      }

      .hero-shell {
        grid-template-columns: 1fr;
        gap: 40px;
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
        padding-bottom: 96px;
      }

      .stack-wrap {
        max-width: 100%;
        margin-top: 0;
      }

      .stack {
        max-width: 100%;
        min-height: 580px;
      }

      .chatbot-trigger {
        bottom: 24px;
        right: 24px;
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
        bottom: max(20px, env(safe-area-inset-bottom));
        right: max(20px, env(safe-area-inset-right));
        width: 52px;
        height: 52px;
      }

      .chatbot-window {
        bottom: 84px;
        right: 12px;
        left: auto;
        width: min(380px, 100vw - 24px);
        max-height: 80svh;
      }

      .chatbot-messages {
        padding: 16px;
      }

      .chatbot-input-container {
        padding: 12px;
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

      .stack {
        min-height: 640px;
      }

      .scard {
        padding: 28px 24px;
      }

      .scard h2 {
        font-size: 23px;
      }

      .metric-value {
        font-size: 44px;
      }

      .stack-tabs {
        margin-top: 40px;
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

    /* Grille tarifaire immersive — mobile uniquement */
    .grille-mobile-story {
      display: none;
    }

    @media (max-width: 767px) {
      .grille-tarifaire {
        padding: 22px 18px;
        overflow: visible;
      }

      .grille-title {
        font-size: 15px;
        line-height: 1.45;
        margin-bottom: 10px;
      }

      .grille-scroll {
        display: none;
      }

      .grille-mobile-story {
        display: block;
      }

      .tarif-mobile-intro {
        margin: 0 0 18px;
        color: rgba(250, 248, 244, 0.45);
        font-size: 11px;
        line-height: 1.55;
      }

      .tarif-profile-step {
        position: relative;
        padding-bottom: 9vh;
      }

      .tarif-profile-step + .tarif-profile-step {
        margin-top: 4vh;
      }

      .tarif-profile-sticky {
        position: sticky;
        top: 76px;
        z-index: 3;
        padding: 16px;
        background: linear-gradient(135deg, rgba(38, 33, 11, 0.98), rgba(28, 28, 26, 0.98));
        border: 1px solid rgba(255, 215, 0, 0.28);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.32);
      }

      .tarif-profile-index {
        display: block;
        margin-bottom: 6px;
        color: var(--or-base);
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 1.5px;
      }

      .tarif-profile-name {
        margin: 0 0 5px;
        color: var(--blanc);
        font-size: 18px;
        font-weight: 650;
        line-height: 1.25;
      }

      .tarif-profile-ca {
        margin: 0;
        color: rgba(250, 248, 244, 0.58);
        font-size: 13px;
      }

      .tarif-profile-progress {
        display: flex;
        gap: 5px;
        margin-top: 14px;
      }

      .tarif-profile-progress span {
        display: block;
        height: 2px;
        flex: 1;
        background: rgba(255, 215, 0, 0.22);
      }

      .tarif-profile-progress span:first-child {
        background: var(--or-base);
      }

      .tarif-formules {
        display: grid;
        gap: 14px;
        margin-top: 14px;
      }

      .tarif-formule {
        min-height: 34svh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding: 22px;
        background: rgba(255, 215, 0, 0.035);
        border: 1px solid rgba(255, 215, 0, 0.18);
        opacity: 0;
        transform: translateY(28px) scale(0.98);
        filter: blur(4px);
        transition: opacity 0.55s var(--transition), transform 0.55s var(--transition), filter 0.55s ease, border-color 0.3s ease;
      }

      .tarif-formule.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
        filter: blur(0);
        border-color: rgba(255, 215, 0, 0.42);
      }

      .tarif-formule.is-unavailable.is-visible {
        opacity: 0.58;
      }

      .tarif-formule-eyebrow {
        margin-bottom: 10px;
        color: var(--or-base);
        font-size: 10px;
        font-weight: 600;
        letter-spacing: 1.6px;
        text-transform: uppercase;
      }

      .tarif-formule-name {
        margin: 0 0 9px;
        color: var(--blanc);
        font-size: 22px;
        font-weight: 600;
      }

      .tarif-formule-price {
        color: rgba(250, 248, 244, 0.78);
        font-size: 20px;
        font-weight: 400;
        line-height: 1.35;
      }

      .tarif-formule.is-unavailable .tarif-formule-price {
        color: rgba(250, 248, 244, 0.52);
        font-size: 15px;
      }

      .tarif-formule-description {
        margin: 12px 0 0;
        color: rgba(250, 248, 244, 0.4);
        font-size: 12px;
        line-height: 1.55;
      }

      .grille-note {
        margin-top: 4px;
        font-size: 10px;
        line-height: 1.55;
      }
    }

    @media (prefers-reduced-motion: reduce) {
      .tarif-formule {
        opacity: 1;
        transform: none;
        filter: none;
        transition: none;
      }
    }
    
    /* Grille tarifaire immersive — mobile uniquement */
.grille-mobile-story {
  display: none;
}

@media (max-width: 767px) {
  .grille-tarifaire {
    padding: 22px 18px;
    overflow: visible;
  }

  .grille-title {
    font-size: 15px;
    line-height: 1.45;
    margin-bottom: 10px;
  }

  .grille-scroll {
    display: none;
  }

  .grille-mobile-story {
    display: block;
  }

  .tarif-mobile-intro {
    margin: 0 0 18px;
    color: rgba(250, 248, 244, 0.45);
    font-size: 11px;
    line-height: 1.55;
  }

  .tarif-profile-step {
    position: relative;
    padding-bottom: 9vh;
  }

  .tarif-profile-step + .tarif-profile-step {
    margin-top: 4vh;
  }

  .tarif-profile-sticky {
    position: sticky;
    top: 76px;
    z-index: 3;
    padding: 16px;
    background: linear-gradient(135deg, rgba(38, 33, 11, 0.98), rgba(28, 28, 26, 0.98));
    border: 1px solid rgba(255, 215, 0, 0.28);
    box-shadow: 0 12px 28px rgba(0, 0, 0, 0.32);
  }

  .tarif-profile-index {
    display: block;
    margin-bottom: 6px;
    color: var(--or-base);
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 1.5px;
  }

  .tarif-profile-name {
    margin: 0 0 5px;
    color: var(--blanc);
    font-size: 18px;
    font-weight: 650;
    line-height: 1.25;
  }

  .tarif-profile-ca {
    margin: 0;
    color: rgba(250, 248, 244, 0.58);
    font-size: 13px;
  }

  .tarif-profile-progress {
    display: flex;
    gap: 5px;
    margin-top: 14px;
  }

  .tarif-profile-progress span {
    display: block;
    height: 2px;
    flex: 1;
    background: rgba(255, 215, 0, 0.22);
  }

  .tarif-profile-progress span:first-child {
    background: var(--or-base);
  }

  .tarif-formules {
    display: grid;
    gap: 14px;
    margin-top: 14px;
  }

  .tarif-formule {
    min-height: 34svh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 22px;
    background: rgba(255, 215, 0, 0.035);
    border: 1px solid rgba(255, 215, 0, 0.18);
    opacity: 0;
    transform: translateY(28px) scale(0.98);
    filter: blur(4px);
    transition: opacity 0.55s var(--transition),
      transform 0.55s var(--transition),
      filter 0.55s ease;
  }

  .tarif-formule.is-visible {
    opacity: 1;
    transform: translateY(0) scale(1);
    filter: blur(0);
    border-color: rgba(255, 215, 0, 0.42);
  }

  .tarif-formule.is-unavailable.is-visible {
    opacity: 0.58;
  }

  .tarif-formule-eyebrow {
    margin-bottom: 10px;
    color: var(--or-base);
    font-size: 10px;
    font-weight: 600;
    letter-spacing: 1.6px;
    text-transform: uppercase;
  }

  .tarif-formule-name {
    margin: 0 0 9px;
    color: var(--blanc);
    font-size: 22px;
    font-weight: 600;
  }

  .tarif-formule-price {
    color: rgba(250, 248, 244, 0.78);
    font-size: 20px;
    font-weight: 400;
    line-height: 1.35;
  }

  .tarif-formule.is-unavailable .tarif-formule-price {
    color: rgba(250, 248, 244, 0.52);
    font-size: 15px;
  }

  .tarif-formule-description {
    margin: 12px 0 0;
    color: rgba(250, 248, 244, 0.4);
    font-size: 12px;
    line-height: 1.55;
  }
}
  </style>
  <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>
</head>

<body>
  <!-- Sprite d'icônes SVG local : aucun émoji ni dépendance externe. -->
  <svg class="svg-sprite" aria-hidden="true" xmlns="http://www.w3.org/2000/svg">
    <symbol id="icon-check" viewBox="0 0 24 24"><path d="m5 12 4 4L19 6" /></symbol>
    <symbol id="icon-scales" viewBox="0 0 24 24"><path d="M12 3v18M5 7h14M4 18h6L7 11l-3 7ZM14 18h6l-3-7-3 7ZM8 21h8" /></symbol>
    <symbol id="icon-chart" viewBox="0 0 24 24"><path d="M4 19V5M4 19h16M8 16v-4M12 16V8M16 16v-7M8 9l4-3 4 2 4-4" /></symbol>
    <symbol id="icon-shield" viewBox="0 0 24 24"><path d="M12 3 20 6v5c0 5-3.4 8.5-8 10-4.6-1.5-8-5-8-10V6l8-3Z" /><path d="m8.5 12 2.2 2.2 4.8-5" /></symbol>
    <symbol id="icon-users" viewBox="0 0 24 24"><circle cx="9" cy="8" r="3" /><path d="M3.5 20c.5-3.5 2.4-5.5 5.5-5.5s5 2 5.5 5.5M16 5.5a3 3 0 0 1 0 5M17 14.5c2.2.4 3.4 2.2 3.8 5.5" /></symbol>
    <symbol id="icon-graduation" viewBox="0 0 24 24"><path d="m3 9 9-5 9 5-9 5-9-5Z" /><path d="M7 12v4c2.8 2.7 7.2 2.7 10 0v-4M21 9v6" /></symbol>
    <symbol id="icon-user" viewBox="0 0 24 24"><circle cx="12" cy="8" r="3.5" /><path d="M5 21c.6-4 3-6 7-6s6.4 2 7 6" /></symbol>
    <symbol id="icon-document" viewBox="0 0 24 24"><path d="M6 3h8l4 4v14H6V3Z" /><path d="M14 3v5h5M9 13h6M9 17h6" /></symbol>
    <symbol id="icon-briefcase" viewBox="0 0 24 24"><path d="M4 8h16v11H4V8ZM9 8V5h6v3M4 12h16M10 12v2h4v-2" /></symbol>
    <symbol id="icon-pin" viewBox="0 0 24 24"><path d="M20 10c0 5-8 11-8 11S4 15 4 10a8 8 0 1 1 16 0Z" /><circle cx="12" cy="10" r="2.5" /></symbol>
    <symbol id="icon-mail" viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="14" rx="1" /><path d="m4 7 8 6 8-6" /></symbol>
    <symbol id="icon-phone" viewBox="0 0 24 24"><path d="M7 3 4.5 5.5c-.7.7-.5 2.4.5 4.6 2.2 4.8 5.1 7.7 9.9 9.9 2.2 1 3.9 1.2 4.6.5L22 18l-4-3-2.2 2.2c-2.8-1.2-4.8-3.2-6-6L12 9l-3-4Z" /></symbol>
    <symbol id="icon-crown" viewBox="0 0 24 24"><path d="m4 7 4 4 4-6 4 6 4-4-2 12H6L4 7ZM6 21h12" /></symbol>
    <symbol id="icon-warning" viewBox="0 0 24 24"><path d="M12 3 2.8 20h18.4L12 3Z" /><path d="M12 9v5M12 17h.01" /></symbol>
    <symbol id="icon-hand" viewBox="0 0 24 24"><path d="M8 11V5a1.5 1.5 0 0 1 3 0v5V3.5a1.5 1.5 0 0 1 3 0V10V5a1.5 1.5 0 0 1 3 0v6V8a1.5 1.5 0 0 1 3 0v6c0 4-2.5 7-6.5 7H12c-2.8 0-5-2.2-5-5v-4a1.5 1.5 0 0 1 1-1Z" /></symbol>
    <symbol id="icon-menu" viewBox="0 0 24 24"><path d="M4 7h16M4 12h16M4 17h16" /></symbol>
    <symbol id="icon-close" viewBox="0 0 24 24"><path d="m6 6 12 12M18 6 6 18" /></symbol>
  </svg>

  <!-- Curseur Custom -->
  <div class="cursor" id="cursor"></div>
  <div class="cursor-ring" id="cursorRing"></div>

  <!-- Navigation -->
  <nav id="navbar">
    <div class="shell nav-shell">
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
    <button class="nav-burger" id="navBurger" aria-label="Ouvrir le menu" aria-expanded="false"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-menu"></use></svg></button>
    </div>
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
    <div class="grid-glow" aria-hidden="true"></div>
    <div class="shell hero-shell">
    <div class="hero-left">
      <div class="hero-badge">
        <div class="hero-badge-line"></div>
        <span class="hero-badge-text">Cabinet Agréé MBPE & FDFP — Côte d'Ivoire</span>
      </div>
      <h1 class="hero-title">
        <span class="ht-line nowrap"><em class="ht-thin">Votre</em> <strong class="ht-gold">Cabinet</strong> <em class="ht-thin">de</em></span>
        <span class="ht-line nowrap"><strong class="ht-white">Gestion &amp;</strong> <em class="ht-thin">de</em></span>
        <span class="ht-line nowrap"><strong class="ht-white">Conseil</strong> <em class="ht-premium">Premium</em></span>
      </h1>
      <p class="hero-subtitle">DC-KNOWING accompagne les entrepreneurs et dirigeants dans la création, la structuration
        et le développement de leur entreprise — avec rigueur juridique, excellence financière et innovation digitale.
      </p>
      <div class="hero-actions">
        <a href="#services" class="btn-primary">Découvrir nos services →</a>
        <a href="#contact" class="btn-secondary">Réserver ma consultation</a>
      </div>
      <div class="hero-stats">
        <div class="stat-item"><span class="stat-number">500<sup>+</sup></span><span class="stat-label">Entreprises
            créées</span></div>
        <div class="stat-item"><span class="stat-number">12</span><span class="stat-label">Années d'expertise</span>
        </div>
        <div class="stat-item"><span class="stat-number">100%</span><span class="stat-label">Dossiers conformes</span>
        </div>
      </div>
      <div class="scroll-indicator">
        <div class="scroll-line"></div><span class="scroll-text">Défiler</span>
      </div>
    </div>
    <div class="hero-right">
      <div class="stack-wrap" id="stackWrap">
        <div class="stack" id="stack" aria-label="Nos quatre services">
          <article class="scard" data-index="0" data-pos="0" aria-hidden="false" aria-label="Carte 1 sur 4 : Créer">
            <div class="scard-icon anim d1"><svg viewBox="0 0 24 24" fill="none" stroke="#ffd000" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="9" y1="13" x2="15" y2="13"/><line x1="9" y1="17" x2="13" y2="17"/></svg></div>
            <h2 class="anim d2">Créer &amp; sécuriser votre entreprise</h2>
            <p class="scard-desc anim d4">Création, modification et radiation d'entreprise, avec un accompagnement juridique complet conforme au droit OHADA et aux formalités ivoiriennes.</p>
            <div class="scard-metric anim d5">
              <div class="metric-label">Création opérationnelle</div>
              <div class="metric-value"><span class="count" data-count="10">10</span><span class="unit">JOURS</span></div>
            </div>
            <div class="scard-chips anim d5"><span>RCCM</span><span>OHADA</span><span>DGI / DFE</span></div>
          </article>
          <article class="scard" data-index="1" data-pos="1" aria-hidden="true" inert aria-label="Carte 2 sur 4 : Gérer">
            <div class="scard-icon anim d1"><svg viewBox="0 0 24 24" fill="none" stroke="#ffd000" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1 1 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><polyline points="9 12 11 14 15 10"/></svg></div>
            <h2 class="anim d2">Gérer &amp; sécuriser</h2>
            <div class="scard-sub anim d3">Comptabilité · Fiscalité · CGA</div>
            <p class="scard-desc anim d4">Comptabilité OHADA, déclarations fiscales, conformité, suivi de gestion et accompagnement CGA pour garder une entreprise en règle et mieux piloter ses finances.</p>
            <div class="scard-metric anim d5">
              <div class="metric-bar-row"><span>Conformité administrative</span><span class="pct">98%</span></div>
              <div class="metric-bar"><div class="metric-fill" data-fill="98"></div></div>
            </div>
            <div class="scard-chips anim d5"><span>OHADA</span><span>DGI</span><span>CGA</span></div>
          </article>
          <article class="scard" data-index="2" data-pos="2" aria-hidden="true" inert aria-label="Carte 3 sur 4 : Digitaliser">
            <div class="scard-icon anim d1"><svg viewBox="0 0 24 24" fill="none" stroke="#ffd000" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 12 12 17 22 12"/><polyline points="2 17 12 22 22 17"/></svg></div>
            <h2 class="anim d2">Digitaliser votre entreprise</h2>
            <p class="scard-desc anim d4">Les solutions Flow réunissent comptabilité, RH, ventes et juridique dans des outils conçus pour les réalités des PME africaines et synchronisés avec les experts DC-KNOWING.</p>
            <div class="scard-metric anim d5">
              <div class="metric-label">Solutions connectées</div>
              <div class="metric-value"><span class="count" data-count="4">4</span><span class="unit">FLOW</span></div>
            </div>
            <div class="scard-chips chip-seq anim d5"><span>COMPTA</span><span>RH</span><span>SELL</span><span>LEGAL</span></div>
          </article>
          <article class="scard" data-index="3" data-pos="3" aria-hidden="true" inert aria-label="Carte 4 sur 4 : Former">
            <div class="scard-icon anim d1"><svg viewBox="0 0 24 24" fill="none" stroke="#ffd000" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M21.42 10.92a1 1 0 0 0 0-1.84l-8.42-4.29a1 1 0 0 0-.9 0l-8.42 4.29a1 1 0 0 0 0 1.84l8.42 4.29a1 1 0 0 0 .9 0z"/><path d="M22 10v6"/><path d="M6 12.5V16a6 3 0 0 0 12 0v-3.5"/></svg></div>
            <h2 class="anim d2">Former &amp; faire monter en compétences</h2>
            <p class="scard-desc anim d4">Des formations pratiques en comptabilité, fiscalité, droit OHADA, gestion, paie et outils professionnels pour devenir rapidement opérationnel.</p>
            <div class="scard-metric anim d5">
              <div class="metric-label">Formation pratique</div>
              <div class="metric-bar-row"><span>Progression professionnelle</span><span class="pct">80%</span></div>
              <div class="metric-bar"><div class="metric-fill" data-fill="80"></div></div>
            </div>
            <div class="scard-chips anim d5"><span>2 MOIS</span><span>STAGE GARANTI</span><span>FDFP</span></div>
          </article>
        </div>
        <div class="stack-tabs" role="tablist" aria-label="Choisir un service">
          <button type="button" class="stack-tab active" role="tab" aria-selected="true" data-index="0" aria-label="Créer"><span class="tab-track"><span class="tab-fill"></span></span><span class="tab-label">Créer</span></button>
          <button type="button" class="stack-tab" role="tab" aria-selected="false" data-index="1" aria-label="Gérer" tabindex="-1"><span class="tab-track"><span class="tab-fill"></span></span><span class="tab-label">Gérer</span></button>
          <button type="button" class="stack-tab" role="tab" aria-selected="false" data-index="2" aria-label="Digitaliser" tabindex="-1"><span class="tab-track"><span class="tab-fill"></span></span><span class="tab-label">Digitaliser</span></button>
          <button type="button" class="stack-tab" role="tab" aria-selected="false" data-index="3" aria-label="Former" tabindex="-1"><span class="tab-track"><span class="tab-fill"></span></span><span class="tab-label">Former</span></button>
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
          <div class="service-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-scales"></use></svg></div>
          <div class="service-name">Juridique & Corporate</div>
          <div class="service-desc">Création d'entreprises (SARL, SA, SAS, ONG…), modifications statutaires, secrétariat
            juridique annuel, rédaction d'actes et PV d'assemblée.</div>
          <div class="service-note"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-warning"></use></svg><span>Exception : Les contrats de bails ne sont pas pris en charge.</span></div>
          <a href="{{ route('services.juridique') }}" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d1">
          <div class="service-number">02</div>
          <div class="service-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-chart"></use></svg></div>
          <div class="service-name">Comptabilité & Finance</div>
          <div class="service-desc">Tenue comptable OHADA, états financiers, direction financière externalisée (DFE),
            tableaux de bord et pilotage de la performance.</div>
          <a href="#offres" onclick="goToOffres('comptabilite')" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d2">
          <div class="service-number">03</div>
          <div class="service-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-shield"></use></svg></div>
          <div class="service-name">CGA — Centre de Gestion Agréé</div>
          <div class="service-desc">Optimisation fiscale, dossier de gestion personnalisé, conformité comptable et
            sociale — adhérez et économisez jusqu'à 40% sur vos charges fiscales.</div>
          <a href="{{ route('services.cga') }}" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d3">
          <div class="service-number">04</div>
          <div class="service-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-users"></use></svg></div>
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
          <div class="service-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-graduation"></use></svg></div>
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

    <!-- Filtres par categorie -->
    <div class="offres-controls reveal">
      <div class="offres-tabs">
        <button class="offre-tab active" data-target="all">Tous</button>
        <button class="offre-tab" data-target="juridique">Juridique</button>
        <button class="offre-tab" data-target="comptabilite">Comptabilité</button>
        <button class="offre-tab" data-target="rh">Paie & RH</button>
        <button class="offre-tab" data-target="flow">Solutions Flow</button>
        <button class="offre-tab" data-target="finance">Finance</button>
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
        <div class="empty-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-document"></use></svg></div>
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
            <span class="app-metric-value" style="color:#4CAF50"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-check"></use></svg> Validée</span>
          </div>
          <div class="app-metric">
            <span class="app-metric-label">Déclaration CNPS</span>
            <span class="app-metric-value" style="color:#4CAF50"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-check"></use></svg> Envoyée</span>
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
            <span class="app-metric-value" style="color:#4CAF50"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-check"></use></svg> 100%</span>
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
            <div class="flow-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-users"></use></svg></div>
            <div>
              <div class="flow-name"><span>RH</span> Flow</div>
              <div class="flow-desc">Paie, CNPS/CMU, contrats, congés — zéro erreur sociale</div>
            </div>
            <div class="flow-arrow">→</div>
          </a>

          <div class="flow-item reveal reveal-d1">
            <div class="flow-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-chart"></use></svg></div>
            <div>
              <div class="flow-name"><span>Compta</span> Flow</div>
              <div class="flow-desc">Comptabilité OHADA en temps réel, états financiers automatisés</div>
            </div>
            <div class="flow-arrow">→</div>
          </div>

          <div class="flow-item reveal reveal-d2">
            <div class="flow-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-briefcase"></use></svg></div>
            <div>
              <div class="flow-name"><span>Sell</span> Flow</div>
              <div class="flow-desc">CRM, facturation, stocks, relances — pilotez vos ventes</div>
            </div>
            <div class="flow-arrow">→</div>
          </div>

          <div class="flow-item reveal reveal-d3">
            <div class="flow-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-scales"></use></svg></div>
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
          <div class="contact-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-pin"></use></svg></div>
          <div>
            <div class="contact-label">Adresse</div>
            <div class="contact-value">Riviera Bonoumin, Abidjan<br>Côte d'Ivoire</div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-mail"></use></svg></div>
          <div>
            <div class="contact-label">Email</div>
            <div class="contact-value">infos@dc-knowing.com</div>
          </div>
        </div>
        <div class="contact-item">
          <div class="contact-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-phone"></use></svg></div>
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
      <div class="chat-header-actions">
        <button class="chatbot-new" id="chatbotNew" title="Nouvelle conversation" aria-label="Nouvelle conversation">↺</button>
        <button class="chatbot-close" id="chatbotClose">×</button>
      </div>
    </div>
    <div class="chatbot-messages">
      <div class="chatbot-message bot">
        <div class="chatbot-message-content">
          Bonjour ! <svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-hand"></use></svg> Comment puis-je vous aider aujourd'hui ?
        </div>
      </div>
    </div>
    <div class="chatbot-input-container">
      <input type="text" class="chatbot-input" placeholder="Posez votre question..." maxlength="500">
      <button class="chatbot-send">→</button>
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
        id: 'jur-secretariat',
        categorie: 'juridique',
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
        tier: 'Formation',
        nom: 'Formation Professionnelle FDFP',
        tagline: 'Programmes certifiés agréés FDFP — prise en charge possible',
        prixMin: 0,
        prixMax: 0,
        unite: 'Sur devis',
        recommended: false,
        cta: 'Consulter →',
        ctaUrl: '{{ route('services.formation') }}',
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
      initStack();         // ← pile de cartes animees du hero
      initGridGlow();      // ← lueur du quadrillage qui suit la souris
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
    // PILE DE CARTES ANIMEES (hero) — boucle 6s synchronisee sur les onglets
    // ════════════════════════════════════════════
    function initStack() {
      const wrap = document.getElementById('stackWrap');
      if (!wrap) return;
      const cards = Array.from(wrap.querySelectorAll('.scard'));
      const tabs = Array.from(wrap.querySelectorAll('.stack-tab'));
      if (!cards.length || !tabs.length) return;
      const fills = tabs.map(t => t.querySelector('.tab-fill'));

      const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
      const N = cards.length;
      let cur = 0;
      let rafIds = [];
      let resetTimers = [];

      function clearStackTimers() {
        rafIds.forEach(id => cancelAnimationFrame(id));
        rafIds = [];
        resetTimers.forEach(t => clearTimeout(t));
        resetTimers = [];
      }

      function paintCounters(card, instant) {
        card.querySelectorAll('.count').forEach(el => {
          const target = parseInt(el.dataset.count || '0', 10);
          if (instant || reduced) {
            el.textContent = target;
            return;
          }
          const dur = 1100, delay = 550;
          let start = null;
          el.textContent = '0';
          function step(ts) {
            if (start === null) start = ts;
            const p = Math.min(Math.max((ts - start - delay) / dur, 0), 1);
            const eased = 1 - Math.pow(1 - p, 3);
            el.textContent = Math.round(target * eased);
            if (p < 1) {
              rafIds.push(requestAnimationFrame(step));
            }
          }
          rafIds.push(requestAnimationFrame(step));
        });
      }

      function setActive(next) {
        const prev = cur;
        cur = ((next % N) + N) % N;
        clearStackTimers();
        cards.forEach((card, i) => {
          const pos = (i - cur + N) % N;
          const isActive = pos === 0;
          card.dataset.pos = String(pos);
          card.setAttribute('aria-hidden', isActive ? 'false' : 'true');
          if (isActive) {
            card.removeAttribute('inert');
            paintCounters(card, false);
            card.querySelectorAll('.metric-fill').forEach(el => {
              el.style.width = (el.dataset.fill || '0') + '%';
            });
          } else {
            card.setAttribute('inert', '');
            if (i === prev) {
              // Remise a zero differee, invisible pour l'utilisateur
              resetTimers.push(setTimeout(() => {
                card.querySelectorAll('.count').forEach(el => { el.textContent = '0'; });
              }, 950));
              resetTimers.push(setTimeout(() => {
                card.querySelectorAll('.metric-fill').forEach(el => { el.style.width = '0'; });
              }, 900));
            } else {
              card.querySelectorAll('.count').forEach(el => { el.textContent = '0'; });
              card.querySelectorAll('.metric-fill').forEach(el => { el.style.width = '0'; });
            }
          }
        });
        tabs.forEach((tab, i) => {
          const on = i === cur;
          tab.classList.toggle('active', on);
          tab.setAttribute('aria-selected', on ? 'true' : 'false');
          tab.tabIndex = on ? 0 : -1;
          fills[i].classList.remove('go');
        });
        if (!reduced) {
          const fill = fills[cur];
          void fill.offsetWidth; // relance l'animation du minuteur a zero
          fill.classList.add('go');
        }
      }

      // Le minuteur visuel (animation CSS 6s) declenche la carte suivante :
      // minuteur et logique toujours synchronises, pause au survol via CSS.
      wrap.addEventListener('animationend', (e) => {
        if (!reduced && e.target.classList && e.target.classList.contains('tab-fill')) {
          setActive(cur + 1);
        }
      });

      tabs.forEach((tab, i) => {
        tab.addEventListener('click', () => setActive(i));
        tab.addEventListener('keydown', (e) => {
          if (e.key === 'ArrowRight') {
            e.preventDefault();
            const n = (cur + 1) % N;
            tabs[n].focus();
            setActive(n);
          }
          if (e.key === 'ArrowLeft') {
            e.preventDefault();
            const n = (cur - 1 + N) % N;
            tabs[n].focus();
            setActive(n);
          }
        });
      });

      // ── Hauteur de la pile = carte la plus grande (plafonnee) ──
      const stackEl = wrap.querySelector('.stack');
      function fitStack() {
        if (!stackEl) return;
        let max = 0;
        cards.forEach((card) => {
          const prevBottom = card.style.bottom;
          card.style.bottom = 'auto'; // hauteur naturelle du contenu
          const h = card.offsetHeight;
          card.style.bottom = prevBottom;
          if (h > max) max = h;
        });
        const vh = (window.visualViewport && window.visualViewport.height) || window.innerHeight;
        const cap = vh - 300; // plafond : calc(100svh - 300px)
        stackEl.style.height = Math.min(max, Math.max(cap, 0)) + 'px';
      }

      let fitTimer = 0;
      window.addEventListener('resize', () => {
        clearTimeout(fitTimer);
        fitTimer = setTimeout(fitStack, 150);
      });
      window.addEventListener('load', fitStack);
      if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(fitStack);
      }

      setActive(0);
      fitStack();
    }

    // ════════════════════════════════════════════
    // LUEUR DU QUADRILLAGE (hero) — suit la souris avec inertie (lerp)
    // ════════════════════════════════════════════
    function initGridGlow() {
      const hero = document.getElementById('hero');
      const glow = hero?.querySelector('.grid-glow');
      if (!hero || !glow) return;
      // Uniquement souris/trackpad : rien sur mobile, tablette, ni en mode reduit
      if (!window.matchMedia('(hover: hover) and (pointer: fine)').matches) return;
      if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

      let tx = -500, ty = -500; // position cible (relative au hero)
      let cx = -500, cy = -500; // position affichee (lissee)
      let running = false;

      function loop() {
        cx += (tx - cx) * 0.15;
        cy += (ty - cy) * 0.15;
        glow.style.setProperty('--mx', cx + 'px');
        glow.style.setProperty('--my', cy + 'px');
        // Arrete la boucle quand la position a converge
        if (Math.abs(tx - cx) < 0.1 && Math.abs(ty - cy) < 0.1) {
          running = false;
          return;
        }
        requestAnimationFrame(loop);
      }

      function kick() {
        if (!running) {
          running = true;
          requestAnimationFrame(loop);
        }
      }

      hero.addEventListener('pointermove', (e) => {
        const r = hero.getBoundingClientRect();
        tx = e.clientX - r.left;
        ty = e.clientY - r.top;
        glow.classList.add('on');
        kick();
      });

      hero.addEventListener('pointerleave', () => {
        glow.classList.remove('on');
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


    function renderOffres(filters = { categorie: 'all' }) {
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

      initTarifMobileStory();
    }


    function iconSVG(name, extraClass = '') {
      const classes = 'icon icon-' + name + (extraClass ? ' ' + extraClass : '');
      return '<svg class="' + classes + '" aria-hidden="true" focusable="false"><use href="#icon-' + name + '"></use></svg>';
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


      const iconNames = { 'ico-shield': 'shield', 'ico-chart': 'chart', 'ico-crown': 'crown' };
      const iconName = iconNames[o.iconeCls];
      const iconeBlock = iconName ? '<div class="offre-icone">' + iconSVG(iconName) + '</div>' : '';
      const cibleBlock = o.clientCible ? '<div class="offre-cible">' + o.clientCible + '</div>' : '';
      const prefixeBlock = o.prefixe ? '<div class="offre-prefixe">' + o.prefixe + '</div>' : '';


      let featuresHTML = '<ul class="offre-features">';
      if (o.prefixe && o.features) {
        featuresHTML += '<li class="prefixe-item">' + o.prefixe + '</li>';
      }
      if (o.features) {
        featuresHTML += o.features.map(f => '<li>' + iconSVG('check') + '<span>' + f + '</span></li>').join('');
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


    function renderGrilleMobileStory() {
      const formules = [
        { key: 'essentielle', name: 'Essentielle', description: 'Sécurisez vos bases et vos obligations.' },
        { key: 'croissance', name: 'Croissance', description: 'Pilotez votre activité avec des indicateurs fiables.' },
        { key: 'premium', name: 'Premium', description: 'Bénéficiez d’une direction financière externalisée.' }
      ];

      return '<div class="grille-mobile-story" aria-label="Grille tarifaire par profil">' +
        '<p class="tarif-mobile-intro">Faites défiler : le profil reste visible pendant que ses formules apparaissent une à une.</p>' +
        GRILLE_TARIFAIRE.map((row, profileIndex) => {
          const formulesHtml = formules.map((formule, formuleIndex) => {
            const prix = row[formule.key];
            const indisponible = prix === '—';
            const prixAffiche = indisponible ? 'Non inclus pour ce profil' : prix;
            return '<div class="tarif-formule' + (indisponible ? ' is-unavailable' : '') + '" data-tarif-step="' + formuleIndex + '">' +
              '<span class="tarif-formule-eyebrow">Formule ' + String(formuleIndex + 1).padStart(2, '0') + '</span>' +
              '<h5 class="tarif-formule-name">' + formule.name + '</h5>' +
              '<strong class="tarif-formule-price">' + prixAffiche + '</strong>' +
              '<p class="tarif-formule-description">' + formule.description + '</p>' +
              '</div>';
          }).join('');

          return '<article class="tarif-profile-step" data-profile="' + profileIndex + '">' +
            '<div class="tarif-profile-sticky">' +
            '<span class="tarif-profile-index">PROFIL ' + String(profileIndex + 1).padStart(2, '0') + ' / ' + String(GRILLE_TARIFAIRE.length).padStart(2, '0') + '</span>' +
            '<h4 class="tarif-profile-name">' + row.profil + '</h4>' +
            '<p class="tarif-profile-ca">' + row.ca + '</p>' +
            '<div class="tarif-profile-progress" aria-hidden="true"><span></span><span></span><span></span></div>' +
            '</div>' +
            '<div class="tarif-formules">' + formulesHtml + '</div>' +
            '</article>';
        }).join('') +
        '</div>';
    }

    function renderGrilleMobileStory() {
  const formules = [
    {
      key: 'essentielle',
      name: 'Essentielle',
      description: 'Sécurisez vos bases et vos obligations.'
    },
    {
      key: 'croissance',
      name: 'Croissance',
      description: 'Pilotez votre activité avec des indicateurs fiables.'
    },
    {
      key: 'premium',
      name: 'Premium',
      description: 'Bénéficiez d’une direction financière externalisée.'
    }
  ];

  return '<div class="grille-mobile-story">' +
    '<p class="tarif-mobile-intro">Faites défiler : le profil reste visible pendant que ses formules apparaissent une à une.</p>' +

    GRILLE_TARIFAIRE.map((row, profileIndex) => {
      const formulesHtml = formules.map((formule, formuleIndex) => {
        const prix = row[formule.key];
        const indisponible = prix === '—';
        const prixAffiche = indisponible ? 'Non inclus pour ce profil' : prix;

        return '<div class="tarif-formule' + (indisponible ? ' is-unavailable' : '') + '">' +
          '<span class="tarif-formule-eyebrow">Formule ' + String(formuleIndex + 1).padStart(2, '0') + '</span>' +
          '<h5 class="tarif-formule-name">' + formule.name + '</h5>' +
          '<strong class="tarif-formule-price">' + prixAffiche + '</strong>' +
          '<p class="tarif-formule-description">' + formule.description + '</p>' +
          '</div>';
      }).join('');

      return '<article class="tarif-profile-step">' +
        '<div class="tarif-profile-sticky">' +
        '<span class="tarif-profile-index">Profil client</span>' +
        '<h4 class="tarif-profile-name">' + row.profil + '</h4>' +
        '<p class="tarif-profile-ca">' + row.ca + '</p>' +
        '<div class="tarif-profile-progress"><span></span><span></span><span></span></div>' +
        '</div>' +
        '<div class="tarif-formules">' + formulesHtml + '</div>' +
        '</article>';
    }).join('') +

    '</div>';
}

function renderGrilleTarifaire() {
  return '<div class="grille-tarifaire">' +
    '<h3 class="grille-title">Grille tarifaire — FCFA HT / mois</h3>' +

    '<div class="grille-scroll">' +
    '<table class="grille-table">' +
    '<thead><tr>' +
    '<th>Profil client</th><th>Chiffre d’affaires</th><th>Essentielle</th><th>Croissance</th><th>Premium</th>' +
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

    renderGrilleMobileStory() +

    '<p class="grille-note">Les montants sont indicatifs. Chaque proposition fait l’objet d’un devis personnalisé après diagnostic.</p>' +
    '</div>';
}

function initTarifMobileStory() {
  const grid = document.getElementById('offresGrid');
  if (!grid) return;

  const formules = grid.querySelectorAll('.tarif-formule');

  if (!window.matchMedia('(max-width: 767px)').matches) {
    formules.forEach(formule => formule.classList.add('is-visible'));
    return;
  }

  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;

      entry.target.classList.add('is-visible');
      observer.unobserve(entry.target);
    });
  }, {
    threshold: 0.35,
    rootMargin: '0px 0px -10% 0px'
  });

  formules.forEach(formule => observer.observe(formule));
}

    function initTarifMobileStory() {
      const grid = document.getElementById('offresGrid');
      if (!grid) return;

      if (grid._tarifStoryObserver) {
        grid._tarifStoryObserver.disconnect();
        grid._tarifStoryObserver = null;
      }

      const formules = grid.querySelectorAll('.tarif-formule');
      const mobile = window.matchMedia('(max-width: 767px)').matches;
      const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

      if (!mobile || reducedMotion || !('IntersectionObserver' in window)) {
        formules.forEach(formule => formule.classList.add('is-visible'));
        return;
      }

      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (!entry.isIntersecting) return;
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        });
      }, { threshold: 0.35, rootMargin: '0px 0px -10% 0px' });

      formules.forEach(formule => observer.observe(formule));
      grid._tarifStoryObserver = observer;
    }

    let tarifStoryResizeTimer;
    window.addEventListener('resize', () => {
      clearTimeout(tarifStoryResizeTimer);
      tarifStoryResizeTimer = setTimeout(initTarifMobileStory, 160);
    });

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


      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
          tabs.forEach(t => t.classList.remove('active'));
          tab.classList.add('active');
          const target = tab.dataset.target;
          renderOffres({ categorie: target });
        });
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
            showNotification('Devis créé et envoyé par email avec succès !', 'success');

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
        <div class="empty-icon"><svg class="icon" aria-hidden="true" focusable="false"><use href="#icon-document"></use></svg></div>
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
          ${iconSVG('check')} Document signé électroniquement le ${devis.signedDate || devis.date}
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
        showNotification('Document signé ! Votre commande est confirmée.', 'success');
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
      showNotification('Message envoyé ! Nous vous répondrons sous 24h.', 'success');
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
            showNotification('Votre demande a été envoyée ! Nous vous contactons sous 24h.', 'success');
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
          juridique: { url: "{{ route('services.juridique') }}", titre: "Juridique & Corporate", description: "Création d'entreprises, modifications statutaires, secrétariat juridique" },
          creation: { url: "{{ route('services.creation') }}", titre: "Création d'entreprise", description: "Création SARL, SA, SAS, SASU, GIE, EI" },
          cga: { url: "{{ route('services.cga') }}", titre: "Centre de Gestion Agréé", description: "Optimisation fiscale jusqu'à 40%, conformité comptable et sociale" },
          formation: { url: "{{ route('services.formation') }}", titre: "Formation Professionnelle", description: "Programmes certifiés agréés FDFP" },
          modification: { url: "{{ route('services.modification') }}", titre: "Modifications statutaires", description: "Modifications de statuts, transferts de siège" },
          radiation: { url: "{{ route('services.radiation') }}", titre: "Radiation d'entreprise", description: "Radiation RCCM, dissolution" }
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
        { keywords: ['créer', 'creation', 'création', 'immatriculer', 'enregistrer entreprise', 'mon entreprise', 'création entreprise'], action: 'navigate', param: 'juridique' },
        { keywords: ['juridique', 'statuts', 'statut', 'rccm', 'forme juridique'], action: 'navigate', param: 'juridique' },
        { keywords: ['cga', 'centre de gestion', 'agréé', 'optimisation fiscale'], action: 'navigate', param: 'cga' },
        { keywords: ['formation', 'former', 'apprendre', 'academy', 'fdfp'], action: 'navigate', param: 'formation' },
        { keywords: ['contact', 'contacter', 'joindre', 'écrire', 'appeler', 'téléphone', 'email', 'formulaire'], action: 'navigate', param: '#contact' },
        { keywords: ['devis', 'mes devis'], action: 'navigate', param: '#mes-devis' },
        { keywords: ['digital', 'flow', 'solution digitale', 'logiciel'], action: 'navigate', param: '#digital' },
        { keywords: ['modifier', 'modification', 'changement'], action: 'navigate', param: 'modification' },
        { keywords: ['fermer', 'radiation', 'dissoudre', 'dissolution'], action: 'navigate', param: 'radiation' },
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

    //  Relais serveur POST /api/chat (la clé OpenRouter n'est jamais exposée).
    //  Le serveur renvoie un flux SSE : deltas de texte + événement final
    //  {"__tool_calls__": [...]} puis [DONE].
    async function iaCallServerStream(userMessage, history, onToken, onDone) {
      const response = await fetch('{{ route('api.chat') }}', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          // JSON pour les erreurs de validation, le corps reste un flux SSE
          'Accept': 'application/json, text/event-stream',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ message: userMessage, history: history })
      });

      if (!response.ok) {
        let code = 'down';
        try {
          const j = await response.clone().json();
          if (j && j.error) code = j.error;
        } catch { /* ignore */ }
        if (response.status === 429) code = 'busy';
        const err = new Error(code === 'busy' ? 'busy' : 'down');
        err.chatError = code;
        err.status = response.status;
        throw err;
      }

      // Lire le stream SSE
      const reader = response.body.getReader();
      const decoder = new TextDecoder();
      let fullText = '';
      let buffer = '';
      let toolCalls = [];

      function handleData(data) {
        if (data === '[DONE]') return;
        let parsed = null;
        try { parsed = JSON.parse(data); } catch { return; } // Ignorer les chunks malformés
        if (parsed && parsed.__tool_calls__) {
          toolCalls = parsed.__tool_calls__;
          return;
        }
        const delta = parsed?.choices?.[0]?.delta?.content;
        if (delta) {
          fullText += delta;
          onToken(delta, fullText);
        }
      }

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
          handleData(trimmed.slice(6)); // Enlever "data: "
        }
      }

      // Traiter le buffer restant
      const rest = buffer.trim();
      if (rest.startsWith('data: ') && rest !== 'data: [DONE]') {
        handleData(rest.slice(6));
      }

      onDone(fullText, toolCalls);
      return { text: fullText.trim(), tools: toolCalls };
    }

    // Compat : collecte le stream (le serveur ne propose que du streaming).
    async function iaCallOpenRouter(userMessage) {
      let full = '';
      let tools = [];
      await iaCallServerStream(
        userMessage,
        iaGetHistory().slice(-DC_IA_CONFIG.maxHistory * 2),
        (delta, acc) => { full = acc; },
        (done, tc) => { full = done; tools = tc || []; }
      );

      if (!full || typeof full !== 'string') {
        throw new Error("Réponse vide de l'IA.");
      }

      return { text: full.trim(), tools };
    }

    // Streaming via le relais serveur (même signature qu'avant : onDone reçoit aussi les tool calls).
    async function iaCallOpenRouterStream(userMessage, onToken, onDone) {
      return iaCallServerStream(
        userMessage,
        iaGetHistory().slice(-DC_IA_CONFIG.maxHistory * 2),
        onToken,
        onDone
      );
    }

    // Convertit un tool call serveur en action interne.
    function toolCallToAction(tc) {
      if (!tc || !tc.name) return null;
      let args = {};
      try { args = JSON.parse(tc.arguments || '{}'); } catch { return null; }
      switch (tc.name) {
        case 'navigate':
          return args.page_id ? { name: 'navigate', params: [args.page_id], via: 'tool' } : null;
        case 'create_quote':
          if (!args.offer_id) return null;
          return { name: 'devis', params: [args.offer_id, args.name || '', args.email || '', args.phone || '', args.company || ''], via: 'tool' };
        case 'send_contact':
          return { name: 'contact', params: [args.name || '', args.email || '', args.phone || '', args.company || '', args.message || ''], via: 'tool' };
        case 'search_info':
          return args.query ? { name: 'search', params: [args.query], via: 'tool' } : null;
        default:
          return null;
      }
    }

    // Sépare les actions immédiates (navigation/recherche + balises)
    // des actions sensibles (devis/contact via tool calling → confirmation).
    function splitActions(tagActions, toolCalls) {
      const toolActions = (toolCalls || []).map(toolCallToAction).filter(Boolean);
      const immediate = [...tagActions];
      const pending = [];
      for (const action of toolActions) {
        if (action.name === 'devis' || action.name === 'contact') {
          pending.push(action);
        } else {
          immediate.push(action);
        }
      }
      return { immediate, pending };
    }

    function runImmediate(actions) {
      const actionResults = [];
      for (const action of actions) {
        try { actionResults.push({ action: action.name, result: iaExecuteAction(action) }); }
        catch (err) { actionResults.push({ action: action.name, error: err.message }); }
      }
      return actionResults;
    }

    //  Fonction principale utilisée par le chatbot (compat : exécution directe)
    async function iaProcessMessage(userMessage) {
      iaPushMessage('user', userMessage);
      const { text: rawResponse, tools } = await iaCallOpenRouter(userMessage);
      const { actions, cleanText } = iaParseActions(rawResponse);
      const { immediate, pending } = splitActions(actions, tools);
      const actionResults = runImmediate([...immediate, ...pending]);
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
          (accumulated, toolCalls) => {
            fullText = accumulated;

            // Parser les actions sur le texte complet
            let { actions, cleanText } = iaParseActions(fullText);
            const { immediate, pending } = splitActions(actions, toolCalls || []);

            //  FALLBACK (mode balises) : si l'IA n'a pas mis d'action mais que
            // l'utilisateur demande clairement une navigation
            if (immediate.length === 0 && pending.length === 0) {
              const fallbackAction = detectFallbackAction(userMessage);
              if (fallbackAction) {
                immediate.push(fallbackAction);
                // Ne pas modifier cleanText — l'IA n'a pas écrit d'action donc rien à nettoyer
              }
            }

            const finalText = cleanText || fullText;

            // Exécuter les actions non sensibles ; les devis/contacts
            // issus du tool calling attendent la confirmation du visiteur.
            const actionResults = runImmediate(immediate);
            for (const action of pending) {
              actionResults.push({ action: action.name, pending: { name: action.name, params: action.params } });
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

    // Validation avant tout envoi (devis, contact, rappel).
    function validateEmail(email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(String(email || '').trim());
    }

    function validatePhone(phone) {
      const digits = String(phone || '').replace(/\D/g, '');
      return digits.length >= 8;
    }

    //  Fonction d'aide pour formater les résultats d'action
    function iaFormatActionResult(actionResult) {
      if (actionResult.error) {
        return ' *Erreur* : ' + actionResult.error;
      }

      switch (actionResult.action) {
        case 'navigate':
          return actionResult.result?.success
            ? 'Navigation vers ' + actionResult.result.target
            : ' Navigation impossible.';

        case 'devis':
          if (actionResult.result?.success) {
            const d = actionResult.result;
            const montantTxt = d.montantLabel || ((Number(d.montant) || 0).toLocaleString('fr-FR') + ' FCFA');
            return ` **Devis ${d.devisId} créé !**\n- Offre : ${d.offre}\n- Montant : ${montantTxt}\n- Client : ${d.client.nom}\n\n[Voir mes devis →](#mes-devis)`;
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

    // Exécute une action sensible préalablement confirmée par le visiteur.
    function iaExecutePending(pending) {
      try {
        const result = iaExecuteAction(pending);
        return { action: pending.name, result };
      } catch (err) {
        return { action: pending.name, error: err.message };
      }
    }

    //  Exposer l'API
    window.DC_IA_Core = {
      processMessage: iaProcessMessage,
      processMessageStream: iaProcessMessageStream,
      getHistory: iaGetHistory,
      clearHistory: iaClearHistory,
      executePending: iaExecutePending,
      validateEmail: validateEmail,
      validatePhone: validatePhone,
      config: DC_IA_CONFIG
    };

    // -- ia-tools.js --
    //  IA DC-KNOWING — Fonctions exposées à l'agent IA

    // Liste blanche des destinations (générée côté serveur via route()).
    // Protège d'une réponse détournée par un message malveillant.
    const CHAT_PAGES = {
      accueil: '{{ url('/') }}',
      offres: '#offres',
      services: '#services',
      contact: '#contact',
      devis: '#mes-devis',
      digital: '#digital',
      experts: '#experts',
      juridique: '{{ route('services.juridique') }}',
      cga: '{{ route('services.cga') }}',
      formation: '{{ route('services.formation') }}',
      modification: '{{ route('services.modification') }}',
      radiation: '{{ route('services.radiation') }}'
    };

    window.DC_IA_Tools = {
      /**
       * Naviguer vers une page du site (identifiant de la liste blanche CHAT_PAGES)
       * @param {string} pageId - identifiant de page (ex. 'offres', 'juridique')
       */
      navigate: function (pageId) {
        const url = CHAT_PAGES[pageId] || (typeof pageId === 'string' && pageId.startsWith('#') ? pageId : null);
        if (!url) return { error: 'Destination inconnue : ' + pageId };

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

        const fmtPrix = (n) => (Number(n) || 0).toLocaleString('fr-FR');
        const prixMin = Number(offre.prixMin) || 0;
        const prixMax = Number(offre.prixMax) || 0;
        let montant = 0, montantLabel = offre.unite || 'Sur devis';
        if (prixMax > 0 && prixMax !== prixMin) {
          montant = prixMax;
          montantLabel = fmtPrix(prixMin) + ' – ' + fmtPrix(prixMax) + ' FCFA';
        } else if (prixMin > 0) {
          montant = prixMin;
          montantLabel = 'à partir de ' + fmtPrix(prixMin) + ' FCFA';
        }

        const devis = {
          id: 'DEV-' + Date.now(),
          offre: offre.tier + ' - ' + offre.nom,
          montant: montant,
          montantLabel: montantLabel,
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
          montantLabel: devis.montantLabel,
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
              prixMin: o.prixMin,
              prixMax: o.prixMax,
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
    const CHAT_CALLBACK_KEY = 'dc_knowing_callback_offered';
    const CHAT_WELCOME = "## Bienvenue chez DC-KNOWING !\n\nJe suis votre **assistant IA**. Je peux vous aider a :\n\n- **Explorer nos services** : juridique, comptabilite, CGA, formation...\n- **Consulter les offres et tarifs** : je connais toutes nos formules\n- **Naviguer sur le site** : je vous donne des liens directs vers chaque section\n- **Generer un devis** : je m'occupe de tout !\n- **Soumettre une demande de contact** : l'equipe vous repond sous 24h\n\n*Posez-moi votre question, je suis la pour vous !*";

    document.addEventListener('DOMContentLoaded', initChatbot);

    function initChatbot() {
      const trigger = document.getElementById('chatbotTrigger');
      const win = document.getElementById('chatbotWindow');
      const close = document.getElementById('chatbotClose');
      const newConv = document.getElementById('chatbotNew');
      const input = document.querySelector('.chatbot-input');
      const send = document.querySelector('.chatbot-send');
      const messages = document.querySelector('.chatbot-messages');
      const status = document.querySelector('.chatbot-status');
      const footer = document.querySelector('.chatbot-footer');

      if (!trigger || !win || !close || !input || !send || !messages) return;

      // Clics délégués : suggestions, cartes, confirmations, erreurs, rappel
      messages.addEventListener('click', onChatAction);

      // Mettre à jour le footer
      if (footer) footer.textContent = 'Agent IA DC-KNOWING  |  Navigation  |  Devis  |  Contact';

      const state = {
        history: loadHistory(),
        sending: false,
        lastUser: '',
        pendings: {},
        pendingSeq: 0,
      };

      function userExchanges() {
        return state.history.filter(m => m.role === 'user').length;
      }

      function clearThinking() {
        messages.querySelectorAll('.thinking').forEach(el => el.remove());
      }

          // Message de bienvenue (si historique vide)
          if (state.history.length === 0) {
            state.history.push({ role: 'assistant', content: CHAT_WELCOME });
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
          const thinking = createBubble('assistant', '*Reflexion en cours...*', false);
          thinking.classList.add('thinking');
          messages.appendChild(thinking);
        }
        if (state.history.length <= 1) {
          appendSuggestions();
          appendRecommendedCard();
        }
        messages.scrollTop = messages.scrollHeight;
      }

      // Boutons de suggestion à l'ouverture
      function appendSuggestions() {
        const wrap = document.createElement('div');
        wrap.className = 'chat-suggest';
        const items = [
          'Je veux créer mon entreprise',
          'Voir les tarifs',
          'Prendre rendez-vous',
          'Parler à un expert'
        ];
        items.forEach(text => {
          const b = document.createElement('button');
          b.type = 'button';
          b.textContent = text;
          b.setAttribute('data-suggest', text);
          wrap.appendChild(b);
        });
        messages.appendChild(wrap);
      }

      // Mini-carte de l'offre recommandée
      function appendRecommendedCard() {
        if (typeof OFFRES_DATA === 'undefined') return;
        const offre = OFFRES_DATA.find(o => o.recommended) || OFFRES_DATA.find(o => o.id === 'presta-formalisation');
        if (!offre) return;
        const prixMin = Number(offre.prixMin) || 0;
        const prixTxt = prixMin > 0
          ? 'à partir de ' + prixMin.toLocaleString('fr-FR') + ' FCFA'
          : (offre.unite || 'Sur devis');
        const card = document.createElement('div');
        card.className = 'chat-card';
        const safeNom = escapeHtml(offre.nom);
        card.innerHTML =
          '<div class="chat-card-title">' + safeNom + '</div>' +
          '<div class="chat-card-price">' + escapeHtml(prixTxt) + ' ' + escapeHtml(offre.unite || '') + '</div>' +
          '<div class="chat-card-row">' +
          '<button type="button" data-navigate="#offres">Voir l\u2019offre</button>' +
          '<button type="button" class="primary" data-quote="' + escapeHtml(offre.id) + '">Demander un devis</button>' +
          '</div>';
        messages.appendChild(card);
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
            state.lastUser = text;
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
                                clearThinking();
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

                                // Retours d'actions : exécution immédiate OU carte de confirmation
                                if (actionResults && actionResults.length > 0) {
                                  for (const action of actionResults) {
                                    if (action.pending) {
                                      renderConfirmCard(action.pending);
                                    } else {
                                      const feedback = iaFormatActionResult(action);
                                      if (feedback) {
                                        pushMessage('assistant', feedback, true);
                                      }
                                    }
                                  }
                                  renderHistory();
                                }

                                maybeCallback();
                              },
                              onError: (error) => {
                                clearThinking();
                                stopTypewriter();
                                streamWrapper.classList.remove('streaming');
                                streamBubble.innerHTML = chatErrorHtml(error);
                                messages.scrollTop = messages.scrollHeight;
                                if (typeof showNotification === 'function') {
                                  showNotification(' L\'IA n\'a pas pu répondre. Vérifiez la connexion.', 'error');
                                }
                              }
          });

                          } catch (error) {
                            console.error('[Chatbot] Erreur:', error);
                            clearThinking();
                            stopTypewriter();
                            streamWrapper.classList.remove('streaming');
                            streamBubble.innerHTML = chatErrorHtml(error);
                            messages.scrollTop = messages.scrollHeight;
                            if (typeof showNotification === 'function') {
                              showNotification(' L\'IA n\'a pas pu répondre. Vérifiez la connexion.', 'error');
                            }
                          } finally {
          setSending(false);
          input.focus();
        }
      }

                          // Erreur propre : message + boutons de contact + réessayer
                          function chatErrorHtml(error) {
                            const busy = error && (error.chatError === 'busy' || error.status === 429);
                            const text = busy
                              ? '**Beaucoup de demandes en ce moment**, réessayez dans une minute.'
                              : '**L\u2019assistant est momentanément indisponible.**';
                            const wa = (typeof DC_KNOWING_KNOWLEDGE !== 'undefined' && DC_KNOWING_KNOWLEDGE.cabinet.whatsapp) || 'https://wa.me/2250767131993';
                            const tel = '+2252722421443';
                            const html = text + '\n\n<div class="chat-error-buttons">' +
                              '<a class="chat-link-btn" href="' + wa + '" target="_blank" rel="noopener">WhatsApp</a>' +
                              '<a class="chat-link-btn" href="tel:' + tel + '">Appeler</a>' +
                              '<button type="button" data-goto="#contact">Réserver une consultation</button>' +
                              '<button type="button" data-retry="1">Réessayer</button>' +
                              '</div>';
                            if (typeof marked !== 'undefined') {
                              marked.setOptions({ breaks: true, gfm: true });
                              return marked.parse(html);
                            }
                            return escapeHtml(text).replace(/\n/g, '<br>');
                          }

                          // Carte de confirmation avant toute action sensible (devis / contact)
                          function renderConfirmCard(pending) {
                            const pid = 'p' + (++state.pendingSeq);
                            state.pendings[pid] = pending;
                            const isDevis = pending.name === 'devis';
                            const [a, b, c, d, e] = pending.params;
                            let title = '', rows = '';
                            if (isDevis) {
                              const offre = (typeof OFFRES_DATA !== 'undefined')
                                ? OFFRES_DATA.find(o => o.id === a) : null;
                              title = 'Confirmer ce devis : ' + escapeHtml(offre ? offre.nom : a);
                              rows =
                                confirmField(pid, 'nom', 'Nom', b) +
                                confirmField(pid, 'email', 'Email', c) +
                                confirmField(pid, 'tel', 'Téléphone', d) +
                                confirmField(pid, 'entreprise', 'Entreprise (facultatif)', e);
                            } else {
                              title = 'Confirmer l\u2019envoi :';
                              rows =
                                confirmField(pid, 'nom', 'Nom', a) +
                                confirmField(pid, 'email', 'Email', b) +
                                confirmField(pid, 'tel', 'Téléphone', c) +
                                confirmField(pid, 'entreprise', 'Entreprise (facultatif)', d) +
                                confirmField(pid, 'message', 'Message', e);
                            }
                            const card = document.createElement('div');
                            card.className = 'chat-card';
                            card.setAttribute('data-pid', pid);
                            card.innerHTML =
                              '<div class="chat-card-title">' + title + '</div>' + rows +
                              '<div class="chat-card-error" hidden></div>' +
                              '<div class="chat-card-row" style="margin-top:10px">' +
                              '<button type="button" class="primary" data-confirm="' + pid + '">Confirmer</button>' +
                              '<button type="button" data-edit="' + pid + '">Modifier</button>' +
                              '</div>';
                            messages.appendChild(card);
                            messages.scrollTop = messages.scrollHeight;
                          }

                          function confirmField(pid, key, label, value) {
                            return '<label>' + label + '</label>' +
                              '<input data-field="' + key + '" value="' + escapeHtml(value || '') + '" disabled>';
                          }

                          function cardError(pid, msg) {
                            const card = messages.querySelector('[data-pid="' + pid + '"]');
                            const err = card ? card.querySelector('.chat-card-error') : null;
                            if (err) { err.textContent = msg; err.hidden = false; }
                          }

                          function confirmPending(btn) {
                            const pid = btn.getAttribute('data-confirm');
                            const pending = state.pendings[pid];
                            if (!pending) return;
                            const card = messages.querySelector('[data-pid="' + pid + '"]');
                            const get = (k) => {
                              const inp = card ? card.querySelector('[data-field="' + k + '"]') : null;
                              return inp ? inp.value.trim() : '';
                            };
                            const isDevis = pending.name === 'devis';
                            const vals = isDevis
                              ? [pending.params[0], get('nom'), get('email'), get('tel'), get('entreprise')]
                              : [get('nom'), get('email'), get('tel'), get('entreprise'), get('message')];
                            if (!vals[1] || vals[1].length < 2) { cardError(pid, 'Indiquez votre nom.'); return; }
                            if (!DC_IA_Core.validateEmail(vals[2])) { cardError(pid, 'Email invalide. Vérifiez l\u2019adresse.'); return; }
                            if (vals[3] && !DC_IA_Core.validatePhone(vals[3])) { cardError(pid, 'Numéro de téléphone invalide.'); return; }
                            btn.disabled = true;
                            const res = DC_IA_Core.executePending({ name: pending.name, params: vals });
                            const feedback = iaFormatActionResult(res);
                            if (feedback) pushMessage('assistant', feedback, true);
                            delete state.pendings[pid];
                            renderHistory();
                          }

                          function editPending(btn) {
                            const pid = btn.getAttribute('data-edit');
                            const card = messages.querySelector('[data-pid="' + pid + '"]');
                            if (!card) return;
                            card.querySelectorAll('input').forEach(inp => { inp.disabled = false; });
                            const first = card.querySelector('input');
                            if (first) first.focus();
                            btn.textContent = 'Modifié — vérifiez puis Confirmez';
                          }

                          // Après 2 à 3 échanges : proposer un rappel (nom + numéro)
                          function maybeCallback() {
                            if (userExchanges() < 3) return;
                            try {
                              if (sessionStorage.getItem(CHAT_CALLBACK_KEY)) return;
                            } catch { /* ignore */ }
                            const card = document.createElement('div');
                            card.className = 'chat-card';
                            card.innerHTML =
                              '<div class="chat-card-title">Être rappelé par un expert ?</div>' +
                              '<div style="font-size:12px;color:rgba(250,248,244,.55)">Laissez votre nom et votre numéro, on vous rappelle sous 24h.</div>' +
                              '<label>Nom</label><input data-cb="nom" placeholder="Votre nom">' +
                              '<label>Téléphone</label><input data-cb="tel" placeholder="+225 ...">' +
                              '<div class="chat-card-error" hidden></div>' +
                              '<div class="chat-card-row" style="margin-top:10px">' +
                              '<button type="button" class="primary" data-callback-send="1">Me rappeler</button>' +
                              '</div>';
                            messages.appendChild(card);
                            messages.scrollTop = messages.scrollHeight;
                          }

                          async function sendCallback(btn) {
                            const card = btn.closest('.chat-card');
                            const nom = card.querySelector('[data-cb="nom"]').value.trim();
                            const tel = card.querySelector('[data-cb="tel"]').value.trim();
                            const err = card.querySelector('.chat-card-error');
                            if (nom.length < 2) { err.textContent = 'Indiquez votre nom.'; err.hidden = false; return; }
                            if (!DC_IA_Core.validatePhone(tel)) { err.textContent = 'Numéro de téléphone invalide.'; err.hidden = false; return; }
                            btn.disabled = true;
                            btn.textContent = 'Envoi...';
                            try {
                              const res = await fetch('{{ route('api.callback') }}', {
                                method: 'POST',
                                headers: {
                                  'Content-Type': 'application/json',
                                  'Accept': 'application/json',
                                  'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({ nom: nom, telephone: tel })
                              });
                              if (!res.ok) throw new Error('callback ' + res.status);
                              try { sessionStorage.setItem(CHAT_CALLBACK_KEY, '1'); } catch { /* ignore */ }
                              pushMessage('assistant', 'Merci ' + nom + ' ! Un expert vous rappellera au ' + tel + ' sous 24h.', true);
                            } catch (e) {
                              err.textContent = 'Envoi impossible. Réessayez ou écrivez-nous sur WhatsApp.';
                              err.hidden = false;
                              btn.disabled = false;
                              btn.textContent = 'Me rappeler';
                              return;
                            }
                            renderHistory();
                          }

                          // Clics délégués sur tout le contenu du chat
                          function onChatAction(e) {
                            const t = e.target.closest('[data-suggest],[data-navigate],[data-quote],[data-confirm],[data-edit],[data-retry],[data-goto],[data-callback-send]');
                            if (!t || !messages.contains(t)) return;
                            if (t.hasAttribute('data-suggest')) {
                              input.value = t.getAttribute('data-suggest');
                              sendMessage();
                            } else if (t.hasAttribute('data-navigate')) {
                              DC_IA_Tools.navigate(t.getAttribute('data-navigate'));
                            } else if (t.hasAttribute('data-quote')) {
                              const id = t.getAttribute('data-quote');
                              const o = (typeof OFFRES_DATA !== 'undefined') ? OFFRES_DATA.find(x => x.id === id) : null;
                              input.value = 'Je veux un devis pour ' + (o ? o.nom : id);
                              if (!win.classList.contains('open')) win.classList.add('open');
                              sendMessage();
                            } else if (t.hasAttribute('data-goto')) {
                              DC_IA_Tools.navigate(t.getAttribute('data-goto'));
                            } else if (t.hasAttribute('data-retry')) {
                              if (state.lastUser && !state.sending) {
                                input.value = state.lastUser;
                                sendMessage();
                              }
                            } else if (t.hasAttribute('data-confirm')) {
                              confirmPending(t);
                            } else if (t.hasAttribute('data-edit')) {
                              editPending(t);
                            } else if (t.hasAttribute('data-callback-send')) {
                              sendCallback(t);
                            }
                          }

                          // Nouvelle conversation (message de bienvenue conservé)
                          if (newConv) {
                            newConv.addEventListener('click', () => {
                              state.history = [{ role: 'assistant', content: CHAT_WELCOME }];
                              saveHistory(state.history);
                              if (window.DC_IA_Core) DC_IA_Core.clearHistory();
                              state.lastUser = '';
                              state.pendings = {};
                              renderHistory();
                              input.focus();
                            });
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

    // ── BURGER MENU MOBILE ──
    (function() {
      const burger = document.getElementById('navBurger');
      const menu   = document.getElementById('mobileMenu');
      if (!burger || !menu) return;

      burger.addEventListener('click', function() {
        menu.classList.toggle('open');
        burger.querySelector('use')?.setAttribute('href', menu.classList.contains('open') ? '#icon-close' : '#icon-menu');
        burger.setAttribute('aria-label', menu.classList.contains('open') ? 'Fermer le menu' : 'Ouvrir le menu');
        burger.setAttribute('aria-expanded', String(menu.classList.contains('open')));
      });

      // Fermer si on clique en dehors du menu
      document.addEventListener('click', function(e) {
        if (!menu.contains(e.target) && !burger.contains(e.target)) {
          menu.classList.remove('open');
          burger.querySelector('use')?.setAttribute('href', '#icon-menu');
          burger.setAttribute('aria-label', 'Ouvrir le menu');
          burger.setAttribute('aria-expanded', 'false');
        }
      });
    })();

    function closeMobileMenu() {
      const menu   = document.getElementById('mobileMenu');
      const burger = document.getElementById('navBurger');
      if (menu)   menu.classList.remove('open');
      if (burger) {
        burger.querySelector('use')?.setAttribute('href', '#icon-menu');
        burger.setAttribute('aria-label', 'Ouvrir le menu');
        burger.setAttribute('aria-expanded', 'false');
      }
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
