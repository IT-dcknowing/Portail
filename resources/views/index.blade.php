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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
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

/* ── SPINNER ── */
.spinner {
  display: inline-block;
  width: 14px;
  height: 14px;
  border: 2px solid rgba(26, 16, 0, 0.3);
  border-radius: 50%;
  border-top-color: #1A1000;
  animation: spin 0.8s linear infinite;
  margin-right: 8px;
  vertical-align: middle;
}

@keyframes spin {
  to { transform: rotate(360deg); }
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
  height: 80px;
  background: rgba(10, 10, 10, 0.95);
  backdrop-filter: blur(12px);
  border-bottom: 1px solid var(--ligne);
  padding: 0 48px;
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
  height: 160px;
  width: auto;
  position: relative;
  z-index: 1001;
}

.nav-links {
  display: flex;
  gap: 50px;
  list-style: none;
}

.nav-links a {
  color: rgba(250, 248, 244, 0.6);
  text-decoration: none;
  font-size: 15px;
  font-weight: 400;
  letter-spacing: 0.5px;
  transition: color 0.3s;
  text-transform: uppercase;
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
  -webkit-mask-image: linear-gradient(to right, transparent 0%, transparent 15%, rgba(0,0,0,0.4) 35%, rgba(0,0,0,0.85) 55%, black 75%);
  mask-image: linear-gradient(to right, transparent 0%, transparent 15%, rgba(0,0,0,0.4) 35%, rgba(0,0,0,0.85) 55%, black 75%);
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
  0%, 100% { opacity: 0.3; }
  50%       { opacity: 1; }
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

input:checked + .toggle-slider {
  background: var(--or-base);
  border-color: var(--or-base);
}

input:checked + .toggle-slider:before {
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

/* ── MES DEVIS ── */
.devis-container { min-height: 400px; }

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

.devis-list { display: grid; gap: 16px; }

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

.devis-info { display: flex; flex-direction: column; gap: 4px; }

.devis-name { font-size: 18px; font-weight: 600; }

.devis-details { font-size: 12px; color: rgba(250, 248, 244, 0.5); }

.devis-status {
  padding: 6px 16px;
  font-size: 10px;
  letter-spacing: 1px;
  text-transform: uppercase;
  font-weight: 600;
  border: 1px solid;
}

.devis-status.pending   { background: rgba(52, 152, 219, 0.1);  border-color: var(--bleu);  color: var(--bleu);  }
.devis-status.signed    { background: rgba(46, 204, 113, 0.1);  border-color: var(--vert);  color: var(--vert);  }
.devis-status.cancelled { background: rgba(231, 76, 60, 0.1);   border-color: var(--rouge); color: var(--rouge); }

/* ── CONTACT ── */
.contact-content {
  display: grid;
  grid-template-columns: 1.5fr 1fr;
  gap: 64px;
  max-width: 1200px;
}

.contact-form { display: flex; flex-direction: column; gap: 20px; }

.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }

.form-group { display: flex; flex-direction: column; gap: 8px; }

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
.form-group select:focus { border-color: var(--or-base); }

.form-group input::placeholder,
.form-group textarea::placeholder { color: rgba(250, 248, 244, 0.25); }

.contact-info { display: flex; flex-direction: column; gap: 0; }

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

.chatbot-trigger svg { width: 28px; height: 28px; }

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

.chatbot-window.open { display: flex; }

@keyframes chatSlideUp {
  from { opacity: 0; transform: translateY(20px); }
  to   { opacity: 1; transform: translateY(0); }
}

.chatbot-header {
  padding: 20px;
  border-bottom: 1px solid var(--ligne);
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: var(--gris2);
}

.chatbot-header-left { display: flex; gap: 12px; align-items: center; }

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

.chatbot-title  { font-size: 14px; font-weight: 600; }
.chatbot-status { font-size: 11px; color: var(--vert); }

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

.chatbot-close:hover { border-color: var(--or-base); color: var(--or-base); }

.chatbot-messages {
  flex: 1;
  overflow-y: auto;
  padding: 20px;
  max-height: 400px;
}

.chatbot-message { margin-bottom: 16px; display: flex; flex-direction: column; gap: 6px; }

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

.chatbot-input:focus { border-color: var(--or-base); }
.chatbot-input::placeholder { color: rgba(250, 248, 244, 0.25); }

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

.chatbot-send:hover    { filter: brightness(1.15); }
.chatbot-send:disabled { opacity: 0.3; }

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

.modal-overlay.open { display: flex; }

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
  from { opacity: 0; transform: scale(0.95) translateY(20px); }
  to   { opacity: 1; transform: scale(1) translateY(0); }
}

.modal-devis { max-width: 900px; }

.modal-header {
  padding: 32px;
  border-bottom: 1px solid var(--ligne);
  position: sticky;
  top: 0;
  background: var(--gris);
  z-index: 10;
}

.modal-tag   { font-size: 10px; letter-spacing: 2px; text-transform: uppercase; color: var(--or-base); font-weight: 600; margin-bottom: 8px; }
.modal-title { font-size: 24px; font-weight: 600; }

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

.modal-close:hover { border-color: var(--or-base); color: var(--or-base); }

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
.step.done::after { background: var(--or-base); }

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

.step.active .step-dot { border-color: var(--or-base); color: var(--or-base); background: rgba(255, 215, 0, 0.08); }
.step.done   .step-dot { border-color: var(--or-base); background: var(--or-degrade); color: #1A1000; }

.step-label {
  font-size: 10px;
  letter-spacing: 1px;
  color: rgba(250, 248, 244, 0.3);
  margin-top: 8px;
  text-transform: uppercase;
  font-weight: 500;
}

.step.active .step-label { color: var(--or-base); }

.modal-body { padding: 32px; }

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

.modal-btn-secondary          { background: transparent; border: 1px solid var(--ligne); color: rgba(250, 248, 244, 0.6); }
.modal-btn-secondary:hover    { border-color: var(--or-base); color: var(--or-base); }
.modal-btn-primary            { background: var(--or-degrade); color: #1A1000; }
.modal-btn-primary:hover      { filter: brightness(1.15); }

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

.notification.show { display: flex; }

@keyframes notifSlideIn {
  from { opacity: 0; transform: translateX(100px); }
  to   { opacity: 1; transform: translateX(0); }
}

.notification-dot  { width: 10px; height: 10px; border-radius: 50%; background: var(--or-degrade); flex-shrink: 0; }
.notification-text { font-size: 13px; color: var(--blanc); }

/* ── RÉVÉLATIONS AU SCROLL ── */
.reveal {
  opacity: 0;
  transform: translateY(40px);
  transition: opacity 0.8s var(--transition), transform 0.8s var(--transition);
}

.reveal.active { opacity: 1; transform: translateY(0); }

.reveal-d1 { transition-delay: 0.1s; }
.reveal-d2 { transition-delay: 0.2s; }
.reveal-d3 { transition-delay: 0.3s; }
.reveal-d4 { transition-delay: 0.4s; }

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

.app-mockup-main  { width: 290px; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 3; }
.app-mockup-left  { width: 190px; top: 28%; left: -10px; transform: translateY(-50%) rotate(-4deg); z-index: 2; opacity: 0.65; }
.app-mockup-right { width: 190px; top: 65%; right: -10px; transform: translateY(-50%) rotate(4deg); z-index: 2; opacity: 0.65; }

.app-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 16px;
  padding-bottom: 14px;
  border-bottom: 1px solid var(--ligne);
}

.app-title { font-size: 10px; letter-spacing: 2px; font-weight: 700; color: var(--or-base); }

.app-dots { display: flex; gap: 5px; }

.app-dot { width: 7px; height: 7px; border-radius: 50%; background: rgba(250, 248, 244, 0.15); }
.app-dot:first-child { background: var(--or-base); }

.app-chart { height: 70px; display: flex; align-items: flex-end; gap: 5px; margin-bottom: 16px; }

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
  bottom: 0; left: 0; right: 0;
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

.app-metric-label { font-size: 9px; color: rgba(250, 248, 244, 0.4); }
.app-metric-value { font-size: 11px; font-weight: 600; color: var(--or-clair); }

/* ── FLOWS LIST ── */
.flows-list { display: flex; flex-direction: column; gap: 14px; margin-top: 44px; }

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
  left: 0; top: 0; bottom: 0;
  width: 2px;
  background: var(--or-degrade);
  transform: scaleY(0);
  transition: transform 0.4s var(--transition);
}

.flow-item:hover {
  background: rgba(255, 215, 0, 0.03);
  border-color: rgba(255, 215, 0, 0.2);
}

.flow-item:hover::before { transform: scaleY(1); }

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

.flow-name { font-size: 20px; font-weight: 600; line-height: 1.2; margin-bottom: 4px; }

.flow-name span { 
  background: var(--or-degrade);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  background-clip: text;
  font-weight: 700; 
}

.flow-desc { font-size: 12px; color: rgba(250, 248, 244, 0.4); line-height: 1.6; }

.flow-arrow {
  font-size: 18px;
  color: var(--or-base);
  opacity: 0.4;
  transition: opacity 0.3s, transform 0.3s var(--transition);
  flex-shrink: 0;
}

.flow-item:hover .flow-arrow { opacity: 1; transform: translateX(6px); }

.flow-content { display: flex; flex-direction: column; gap: 12px; }
.flow-actions { display: flex; gap: 12px; margin-top: 8px; flex-wrap: wrap; }

.flow-btn { padding: 10px 20px; font-size: 12px; font-weight: 600; letter-spacing: 0.5px; text-decoration: none; transition: all 0.3s var(--transition); display: inline-block; text-align: center; }

.flow-btn-primary             { background: transparent; border: 1px solid var(--ligne); color: var(--blanc); }
.flow-btn-primary:hover       { border-color: var(--or-base); color: var(--or-base); }
.flow-btn-secondary           { background: rgba(255, 215, 0, 0.08); border: 1px solid rgba(255, 215, 0, 0.2); color: var(--or-base); }
.flow-btn-secondary:hover     { background: rgba(255, 215, 0, 0.12); border-color: var(--or-base); }
.flow-btn-highlight           { background: var(--or-degrade); color: #1A1000; border: 1px solid transparent; padding: 12px 28px; font-weight: 700; }
.flow-btn-highlight:hover     { filter: brightness(1.15); transform: translateY(-2px); }

.flow-features {
  display: flex;
  flex-direction: column;
  gap: 8px;
  margin-top: 12px;
  padding: 16px;
  background: rgba(255, 215, 0, 0.04);
  border-left: 2px solid var(--or-base);
}

.flow-feature { font-size: 13px; color: rgba(250, 248, 244, 0.7); line-height: 1.5; }

/* ── EXPERTS ── */
.experts {
  padding: 120px 48px;
  background: var(--gris);
  border-top: 1px solid var(--ligne);
}

.experts .section-title        { font-weight: 200; }
.experts .section-title em     { font-style: italic; color: var(--or-base); font-weight: 300; }
.experts .section-title strong { font-weight: 700; display: block; }

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
  bottom: 0; left: 0; right: 0;
  height: 2px;
  background: var(--or-degrade);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.4s var(--transition);
}

.expert-card:hover                      { border-color: var(--ligne); }
.expert-card:hover::after               { transform: scaleX(1); }

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

.expert-card:hover .expert-photo-wrap::before { opacity: 1; }

.expert-photo {
  width: 100px;
  height: 100px;
  object-fit: cover;
  object-position: center top;
  display: block;
  filter: grayscale(15%);
  transition: filter 0.4s;
}

.expert-card:hover .expert-photo { filter: grayscale(0%); }

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

.expert-name { font-size: 20px; font-weight: 600; margin-bottom: 6px; line-height: 1.2; color: var(--blanc); }
.expert-role { font-size: 10px; letter-spacing: 2.5px; text-transform: uppercase; color: var(--or-base); font-weight: 500; margin-bottom: 20px; display: block; }
.expert-bio  { font-size: 13px; line-height: 1.75; color: rgba(250, 248, 244, 0.45); margin-bottom: 24px; }

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

.testimonials .section-title em { font-style: italic; color: var(--or-base); font-weight: 300; }

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

.testimonial-card:hover { border-color: var(--ligne); background: #1E1E1C; }

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

.testimonial-name    { font-size: 14px; font-weight: 600; line-height: 1.2; color: var(--blanc); }
.testimonial-company { font-size: 11px; color: rgba(250, 248, 244, 0.35); margin-top: 3px; line-height: 1.3; }

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

/* ── RESPONSIVE ── */
@media (max-width: 1024px) {
  .services-layout       { grid-template-columns: 1fr; gap: 48px; }
  .services-sticky       { position: static; }
  .contact-content       { grid-template-columns: 1fr; }
  .footer-content        { grid-template-columns: 1fr 1fr; }
  .service-card-featured { grid-template-columns: 1fr; }
  .digital-layout        { grid-template-columns: 1fr; gap: 48px; }
  .digital-visual        { position: static; height: 420px; }
  .experts-grid,
  .testimonials-grid     { grid-template-columns: 1fr 1fr; }
}

@media (max-width: 768px) {
  #navbar              { padding: 0 24px; height: 64px; }
  .nav-logo-mark       { height: 110px; }
  .nav-links           { display: none; }
  .hero                { flex-direction: column; padding: 100px 24px 60px; gap: 48px; }
  .hero-right          { justify-content: center; }
  .hero-card-stack     { width: 100%; max-width: 400px; }
  section              { padding: 80px 24px; }
  .agrements           { padding: 24px; }
  .offres-controls     { flex-direction: column; align-items: stretch; }
  .offres-tabs         { flex-wrap: wrap; }
  .offres-grid         { grid-template-columns: 1fr; }
  .form-row            { grid-template-columns: 1fr; }
  .footer-content      { grid-template-columns: 1fr; }
  .chatbot-trigger     { bottom: 24px; right: 24px; width: 56px; height: 56px; }
  .chatbot-window      { bottom: 92px; right: 24px; left: auto; width: calc(100vw - 48px); }
  .devis-item          { grid-template-columns: 1fr; gap: 12px; }
  .digital-visual      { height: 340px; }
  .app-mockup-left,
  .app-mockup-right    { display: none; }
  .app-mockup-main     { width: 260px; }
  .flow-item           { grid-template-columns: auto 1fr; }
  .flow-arrow          { display: none; }
  .flow-actions        { justify-content: center; }
  .experts,
  .testimonials        { padding: 80px 24px; }
  .experts-grid,
  .testimonials-grid   { grid-template-columns: 1fr; }
  .testimonial-author  { flex-wrap: wrap; }
  .testimonial-service { margin-left: 0; margin-top: 10px; }
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
  </style>
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
      <li><a href="#offres">Offres</a></li>
      <li><a href="#digital">Solutions digitales</a></li>
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
        Votre <span class="highlight-block">Cabinet</span> de gestion et de <span class="highlight-block">conseil premium</span>
      </h1>
      <p class="hero-subtitle">DC-KNOWING accompagne les entrepreneurs et dirigeants dans la création, la structuration et le développement de leur entreprise — avec rigueur juridique, excellence financière et innovation digitale.</p>
      
      <div class="hero-content-wrapper">
        <div class="hero-left-content">
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
        
        <div class="services-list-sidebar">
          <ul class="service-list">
            <li>Création d'entreprise (SARL, SA, SAS)</li>
            <li>Comptabilité OHADA & Finance</li>
            <li>Fiscalité & Déclarations DGI</li>
            <li>Paie & Ressources Humaines</li>
            <li>Levée de fonds & Structuration</li>
            <li>Formation professionnelle agréée</li>
          </ul>
        </div>
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
          <a href="#offres" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d1">
          <div class="service-number">02</div>
          <div class="service-icon">📊</div>
          <div class="service-name">Comptabilité & Finance</div>
          <div class="service-desc">Tenue comptable OHADA, états financiers, direction financière externalisée (DFE), tableaux de bord et pilotage de la performance.</div>
          <a href="#offres" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d2">
          <div class="service-number">03</div>
          <div class="service-icon">🛡️</div>
          <div class="service-name">Fiscalité & Veille</div>
          <div class="service-desc">Déclarations fiscales périodiques, optimisation légale de la charge fiscale, assistance lors des contrôles DGI, veille et loi de finances annuelle.</div>
          <a href="#offres" class="service-link">Explorer →</a>
        </div>
        <div class="service-card reveal reveal-d3">
          <div class="service-number">04</div>
          <div class="service-icon">👥</div>
          <div class="service-name">Paie & Ressources Humaines</div>
          <div class="service-desc">Bulletins de paie certifiés, déclarations CNPS/CMU, contrats de travail, règlement intérieur, gestion des procédures sociales et disciplinaires.</div>
          <a href="#offres" class="service-link">Explorer →</a>
        </div>
        <div class="service-card service-card-featured reveal">
          <div>
            <div class="service-number">05 — Offre Stratégique</div>
            <div class="service-name">Structuration Financière & Levées de Fonds</div>
            <div class="service-desc">Nous préparons votre entreprise à accéder aux financements bancaires, aux fonds d'investissement et aux subventions. Modélisation financière, mémorandum d'information, mise en relation investisseurs et success fee aligné sur vos résultats.</div>
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
          <div class="service-desc">Programmes certifiés agréés FDFP en comptabilité, fiscalité, droit des affaires et management. Prise en charge possible par votre entreprise.</div>
          <a href="#contact" class="service-link">Programme →</a>
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
            <div class="contact-value">infos@dc-knowing.com</div>
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
        <div class="contact-icons">
          <div class="icon-box">
            <span>📍</span>
          </div>
          <div class="icon-box">
            <span>🌐</span>
          </div>
          <div class="icon-box">
            <span>📞</span>
          </div>
        </div>
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
      <button class="chatbot-close" id="chatbotClose" aria-label="Fermer">×</button>
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
      <button class="chatbot-send" disabled aria-label="Envoyer le message">→</button>
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
        <button class="modal-close" id="modalClose" aria-label="Fermer">×</button>
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
      <button class="modal-close" id="devisModalClose" aria-label="Fermer">×</button>
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
  // JURIDIQUE - Personnes Morales
  {
    id: 'jur-starter',
    categorie: 'juridique',
    cible: 'morale',
    tier: 'Formule 01',
    nom: 'Starter',
    tagline: 'Je crée mon entreprise rapidement et sereinement',
    prix: 450000,
    unite: 'HT forfait',
    recommended: false,
    features: [
      'Conseil sur la forme juridique adaptée (SARL, SAS, SA, etc.)',
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
    tier: 'Formule 02',
    nom: 'Premium',
    tagline: 'Je structure mon entreprise avec une conformité totale',
    prix: 750000,
    unite: 'HT forfait',
    recommended: true,
    features: [
      'Tout Starter +',
      'Rédaction du règlement intérieur conforme au Code du travail',
      'Assistance pour adhésion CNPS, CMU, et DGI employeur',
      'Création de registres légaux (AG, PV, paies, mouvements)',
      'Formation du dirigeant aux obligations légales (2h)',
      'Suivi post-création pendant 3 mois'
    ]
  },
  {
    id: 'jur-secrétariat',
    categorie: 'juridique',
    cible: 'morale',
    tier: 'Abonnement',
    nom: 'Secrétariat Juridique Annuel',
    tagline: 'Mon cabinet gère toute la conformité légale de mon entreprise',
    prix: 180000,
    unite: 'HT / an',
    recommended: false,
    features: [
      'Préparation et tenue des Assemblées Générales (AG Ordinaire & Extraordinaire)',
      'Rédaction des PV de décisions (nomination, révocation, modifications)',
      'Mise à jour du registre de commerce en cas de modifications statutaires',
      'Veille réglementaire et alertes sur échéances juridiques',
      'Hotline juridique illimitée par email et WhatsApp'
    ]
  },
  // JURIDIQUE - Personnes Physiques
  {
    id: 'jur-physique-ei',
    categorie: 'juridique',
    cible: 'physique',
    tier: 'Formule PP',
    nom: 'Entreprise Individuelle',
    tagline: 'Je démarre mon activité en nom propre',
    prix: 150000,
    unite: 'HT forfait',
    recommended: false,
    features: [
      'Immatriculation au registre du commerce (commerçant ou artisan)',
      'Déclaration fiscale DFE pour activité individuelle',
      'Assistance pour obtention de patente/licence',
      'Guide de démarrage et obligations fiscales',
      'Livraison sous 7 jours ouvrés'
    ]
  },
  // COMPTABILITÉ - Personnes Morales
  {
    id: 'compta-essential',
    categorie: 'comptabilite',
    cible: 'morale',
    tier: 'Formule 01',
    nom: 'Essential',
    tagline: 'Ma comptabilité est tenue par des professionnels certifiés',
    prix: 80000,
    unite: 'HT / mois',
    recommended: false,
    features: [
      'Saisie comptable mensuelle de toutes les opérations',
      'États financiers trimestriels (Bilan, Compte de résultat, Annexes)',
      'Déclarations fiscales mensuelles (TVA, IS, IR, Patente)',
      'Conseil fiscal personnalisé et optimisation légale',
      'Support par email et téléphone'
    ]
  },
  {
    id: 'compta-flow',
    categorie: 'comptabilite',
    cible: 'morale',
    tier: 'Formule 02',
    nom: 'Compta Flow',
    tagline: 'Comptabilité digitale OHADA en temps réel avec tableau de bord',
    prix: 150000,
    unite: 'HT / mois',
    recommended: true,
    features: [
      'Tout Essential +',
      'Accès plateforme Compta Flow avec sync bancaire',
      'Tableau de bord financier mis à jour quotidiennement',
      'Alerte trésorerie et prévisions de cash-flow',
      'Archivage numérique sécurisé des pièces comptables',
      'Accompagnement au pilotage de la performance'
    ]
  },
  {
    id: 'compta-dfe',
    categorie: 'comptabilite',
    cible: 'morale',
    tier: 'Formule 03',
    nom: 'Direction Financière Externalisée',
    tagline: 'Un CFO dédié pilote ma stratégie financière',
    prix: 0,
    unite: 'Sur devis',
    recommended: false,
    features: [
      'Tout Compta Flow +',
      'CFO certifié attribué à votre structure',
      'Business plan & projections financières 3-5 ans',
      'Stratégie de financement et recherche de fonds',
      'Reporting mensuel au comité de direction',
      'Préparation aux audits et due diligence investisseurs'
    ]
  },
  // COMPTABILITÉ - Personnes Physiques
  {
    id: 'compta-physique-light',
    categorie: 'comptabilite',
    cible: 'physique',
    tier: 'Formule PP',
    nom: 'Compta Simplifiée',
    tagline: "Tenue de mes comptes en tant qu'indépendant",
    prix: 35000,
    unite: 'HT / mois',
    recommended: false,
    features: [
      'Saisie mensuelle des recettes et dépenses',
      'Déclarations fiscales trimestrielles',
      'Conseil fiscal pour optimisation',
      'Support par email',
      'Rapport annuel simplifié'
    ]
  },
  // PAIE & RH - Personnes Morales
  {
    id: 'rh-starter',
    categorie: 'rh',
    cible: 'morale',
    tier: 'Formule 01',
    nom: 'Paie Starter',
    tagline: 'Mes bulletins de paie sont conformes et livrés à temps',
    prix: 15000,
    unite: 'HT / bulletin',
    recommended: false,
    features: [
      'Élaboration des bulletins de paie certifiés CNPS/CMU',
      'Déclarations sociales mensuelles (CNPS, CMU, FDFP)',
      'Calcul des cotisations et taxes (CNPS, FDFP, VPS)',
      'Archivage numérique et envoi sécurisé aux salariés',
      'Support RH par email'
    ]
  },
  {
    id: 'rh-premium',
    categorie: 'rh',
    cible: 'morale',
    tier: 'Formule 02',
    nom: 'RH Premium',
    tagline: 'Un service RH complet pour sécuriser ma gestion du personnel',
    prix: 120000,
    unite: 'HT / mois',
    recommended: true,
    features: [
      'Tout Paie Starter (bulletins illimités) +',
      'Rédaction contrats de travail (CDI, CDD, Stage, Prestation)',
      'Gestion administrative des entrées/sorties (embauche, démission, licenciement)',
      'Conseil juridique RH et conformité Code du travail',
      'Assistance lors de contrôles CNPS ou inspection du travail',
      'Hotline RH illimitée'
    ]
  },
  // PAIE & RH - Personnes Physiques
  {
    id: 'rh-physique-assistant',
    categorie: 'rh',
    cible: 'physique',
    tier: 'Formule PP',
    nom: 'Assistant Salarié',
    tagline: "J'embauche mon premier employé en toute conformité",
    prix: 85000,
    unite: 'HT forfait',
    recommended: false,
    features: [
      'Rédaction du contrat de travail personnalisé',
      'Déclaration d\'embauche CNPS et CMU',
      'Bulletins de paie mensuels (1 salarié inclus)',
      'Accompagnement sur les obligations employeur',
      'Support pendant 3 mois'
    ]
  },
  // SOLUTIONS FLOW - Personnes Morales
  {
    id: 'flow-compta',
    categorie: 'flow',
    cible: 'morale',
    tier: 'Solution 01',
    nom: 'Compta Flow Pro',
    tagline: 'Plateforme comptable OHADA avec synchronisation bancaire',
    prix: 45000,
    unite: 'HT / mois',
    recommended: true,
    features: [
      'Synchronisation automatique avec vos comptes bancaires',
      'Tableau de bord financier temps réel (CA, trésorerie, charges)',
      'Catégorisation intelligente des transactions',
      'Export comptable OHADA pour votre expert-comptable',
      'Alertes trésorerie et échéances fiscales',
      'Application mobile iOS & Android'
    ]
  },
  {
    id: 'flow-facture',
    categorie: 'flow',
    cible: 'morale',
    tier: 'Solution 02',
    nom: 'Facture Flow',
    tagline: 'Gestion de facturation et relances automatiques',
    prix: 25000,
    unite: 'HT / mois',
    recommended: false,
    features: [
      'Création de devis et factures professionnels',
      'Relances automatiques des factures impayées',
      'Suivi des paiements et indicateurs de créances',
      'Multi-devises et calcul automatique TVA',
      'Interface client pour paiement en ligne (Mobile Money, Visa)',
      'Export vers Compta Flow'
    ]
  },
  // FINANCE - Personnes Morales
  {
    id: 'finance-bp',
    categorie: 'finance',
    cible: 'morale',
    tier: 'Structuration',
    nom: 'Business Plan Financier',
    tagline: 'Je prépare un dossier bancaire solide pour lever des fonds',
    prix: 0,
    unite: 'Sur devis',
    recommended: false,
    features: [
      'Analyse du modèle économique et hypothèses de croissance',
      'Projections financières 3-5 ans (Compte de résultat, Bilan, Trésorerie)',
      'Plan de financement et besoin en fonds de roulement (BFR)',
      "Mémorandum d'information (Executive Summary)",
      'Coaching pitch investisseurs (2 sessions)',
      'Mise en relation avec banques et fonds'
    ]
  },
  {
    id: 'finance-levee',
    categorie: 'finance',
    cible: 'morale',
    tier: 'Levée de Fonds',
    nom: 'Accompagnement Levée',
    tagline: "DC-KNOWING m'accompagne jusqu'à la signature investisseur",
    prix: 0,
    unite: 'Success fee',
    recommended: true,
    features: [
      'Audit financier et restructuration si nécessaire',
      'Business Plan et valorisation de l\'entreprise',
      'Identification et approche d\'investisseurs cibles',
      'Négociation term sheet et pacte d\'actionnaires',
      'Due diligence et closing',
      'Honoraires : 3-5% du montant levé (Success Fee)'
    ]
  }
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
  initChatbot();
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
// CURSEUR ÉLASTIQUE (LERP)
// ════════════════════════════════════════════
// Le point (.cursor) suit la souris instantanément.
// L'anneau (.cursor-ring) "rattrape" avec un délai
// via requestAnimationFrame → effet élastique visible.
// ════════════════════════════════════════════
function initCursor() {
  const cursor = document.querySelector('.cursor');
  const ring   = document.querySelector('.cursor-ring');

  if (!cursor || !ring) return;

  // Cacher le curseur natif sur tout le document
  document.body.style.cursor = 'none';

  let mouseX = 0, mouseY = 0; // position réelle souris
  let ringX  = 0, ringY  = 0; // position actuelle de l'anneau

  // ── Suivi instantané du point ──
  document.addEventListener('mousemove', e => {
    mouseX = e.clientX;
    mouseY = e.clientY;
    // Le point suit sans délai
    cursor.style.transform = `translate(${mouseX}px, ${mouseY}px) translate(-50%, -50%)`;
  });

  // ── Anneau élastique via RAF + lerp ──
  // Facteur lerp : 0.08 = lent/très élastique | 0.15 = rapide
  const LERP = 0.18;

  function animateRing() {
    // Interpolation linéaire : avance de 8% vers la cible à chaque frame
    ringX += (mouseX - ringX) * LERP;
    ringY += (mouseY - ringY) * LERP;

    ring.style.transform = `translate(${ringX}px, ${ringY}px) translate(-50%, -50%)`;
    requestAnimationFrame(animateRing);
  }
  animateRing(); // démarre la boucle permanente

  // ── Agrandissement au survol des éléments interactifs ──
  const interactives = 'a, button, [role="button"], .flow-item, .service-card, .offre-card, .offre-tab, .nav-cta, .chatbot-trigger, label';

  document.querySelectorAll(interactives).forEach(el => {
    el.addEventListener('mouseenter', () => ring.classList.add('hovered'));
    el.addEventListener('mouseleave', () => ring.classList.remove('hovered'));
  });

  // ── Masquer/afficher quand la souris quitte la fenêtre ──
  document.addEventListener('mouseleave', () => {
    cursor.style.opacity = '0';
    ring.style.opacity   = '0';
  });
  document.addEventListener('mouseenter', () => {
    cursor.style.opacity = '1';
    ring.style.opacity   = '1';
  });

  // ── Clic : petite impulsion sur le point ──
  document.addEventListener('mousedown', () => {
    cursor.style.transform = `translate(${mouseX}px, ${mouseY}px) translate(-50%, -50%) scale(0.7)`;
  });
  document.addEventListener('mouseup', () => {
    cursor.style.transform = `translate(${mouseX}px, ${mouseY}px) translate(-50%, -50%) scale(1)`;
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
function initOffres() {
  renderOffres();
}

function renderOffres(filters = { categorie: 'all', cible: 'morale' }) {
  const grid = document.getElementById('offresGrid');
  if (!grid) return;

  let filtered = OFFRES_DATA;

  if (filters.categorie !== 'all') {
    filtered = filtered.filter(o => o.categorie === filters.categorie);
  }
  filtered = filtered.filter(o => o.cible === filters.cible);

  if (filtered.length === 0) {
    grid.innerHTML = `
      <div style="grid-column:1/-1;text-align:center;padding:60px 20px;opacity:.5;">
        <div style="font-size:48px;margin-bottom:16px;">📦</div>
        <div style="font-size:16px;color:rgba(250,248,244,0.4);">Aucune offre disponible pour cette sélection</div>
      </div>`;
    return;
  }

  // Fade-out → mise à jour → fade-in
  grid.style.opacity = '0';
  grid.style.transform = 'translateY(12px)';
  grid.style.transition = 'opacity 0.3s ease, transform 0.3s ease';

  setTimeout(() => {
    grid.innerHTML = filtered.map(offre => `
      <div class="offre-card ${offre.recommended ? 'recommended' : ''}"
           data-categorie="${offre.categorie}" data-cible="${offre.cible}">
        <div class="offre-tier">${offre.tier}</div>
        <div class="offre-name">${offre.nom}</div>
        <div class="offre-tagline">${offre.tagline}</div>
        <div class="offre-price">
          <span class="price-value">
            ${offre.prix > 0 ? offre.prix.toLocaleString('fr-FR') + ' FCFA' : 'Sur devis'}
          </span>
          ${offre.prix > 0 ? `<span class="price-unit">${offre.unite}</span>` : ''}
        </div>
        <ul class="offre-features">
          ${offre.features.map(f => `<li>${f}</li>`).join('')}
        </ul>
        <button class="btn-souscrire ${offre.recommended ? 'primary' : ''}"
                onclick="openSouscriptionModal('${offre.id}')">
          Souscrire →
        </button>
      </div>`).join('');

    // Ré-attache les events curseur sur les nouvelles cards
    grid.querySelectorAll('.offre-card, button').forEach(el => {
      el.addEventListener('mouseenter', () => document.querySelector('.cursor-ring')?.classList.add('hovered'));
      el.addEventListener('mouseleave', () => document.querySelector('.cursor-ring')?.classList.remove('hovered'));
    });

    // Fade-in
    grid.style.opacity   = '1';
    grid.style.transform = 'translateY(0)';
  }, 250);
}

// ════════════════════════════════════════════
// FILTRES
// ════════════════════════════════════════════
function initFiltres() {
  const tabs        = document.querySelectorAll('.offre-tab');
  const toggleCible = document.getElementById('toggleCible');

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      tabs.forEach(t => t.classList.remove('active'));
      tab.classList.add('active');

      const target = tab.dataset.target;
      const cible  = toggleCible?.checked ? 'physique' : 'morale';
      renderOffres({ categorie: target, cible });
    });
  });

  toggleCible?.addEventListener('change', e => {
    const activeTab = document.querySelector('.offre-tab.active');
    const categorie = activeTab?.dataset.target || 'all';
    const cible     = e.target.checked ? 'physique' : 'morale';
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

  const body   = document.getElementById('modalBody');
  const footer = document.getElementById('modalFooter');

  // Micro-animation du body
  body.style.opacity   = '0';
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
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
          <div><label style="${labelStyle}">Nom complet</label>
            <input type="text" id="inputNom" placeholder="Jean Dupont" style="${inputStyle}" value="${formData.nom || ''}"></div>
          <div><label style="${labelStyle}">Email</label>
            <input type="email" id="inputEmail" placeholder="jean@entreprise.com" style="${inputStyle}" value="${formData.email || ''}"></div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
          <div><label style="${labelStyle}">Téléphone</label>
            <input type="tel" id="inputTel" placeholder="+225 XX XX XX XX XX" style="${inputStyle}" value="${formData.tel || ''}"></div>
          <div><label style="${labelStyle}">Entreprise</label>
            <input type="text" id="inputEntreprise" placeholder="Nom de votre structure" style="${inputStyle}" value="${formData.entreprise || ''}"></div>
        </div>
        <div><label style="${labelStyle}">Forme juridique</label>
          <select id="inputForme" style="${inputStyle}">
            <option value="">Sélectionner...</option>
            ${['SARL','SAS','SA','ONG','EI','Autre'].map(f =>
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
            ['Offre',      currentOffreData.nom],
            ['Client',     formData.nom],
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
      body.style.opacity   = '1';
      body.style.transform = 'translateY(0)';
    });
  });
}

function nextModalStep() {
  if (currentModalStep === 2) {
    formData.nom        = document.getElementById('inputNom')?.value.trim();
    formData.email      = document.getElementById('inputEmail')?.value.trim();
    formData.tel        = document.getElementById('inputTel')?.value.trim();
    formData.entreprise = document.getElementById('inputEntreprise')?.value.trim();
    formData.forme      = document.getElementById('inputForme')?.value;

    if (!formData.nom || !formData.email || !formData.entreprise) {
      showNotification('Veuillez remplir tous les champs obligatoires', 'error');
      // Shake léger sur les champs vides
      ['inputNom','inputEmail','inputEntreprise'].forEach(id => {
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
    formData.objet         = document.getElementById('inputObjet')?.value.trim();
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
    id:            devisId,
    date:          new Date().toLocaleDateString('fr-FR'),
    offre:         currentOffreData.nom,
    categorie:     currentOffreData.categorie,
    client:        formData.nom,
    email:         formData.email,
    tel:           formData.tel,
    entreprise:    formData.entreprise,
    forme:         formData.forme,
    objet:         formData.objet || '',
    dateDemarrage: formData.dateDemarrage || '',
    montant:       currentOffreData.prix,
    unite:         currentOffreData.unite,
    statut:        'pending'
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
  formData         = {};
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
        <a href="#offres" class="btn-primary">Découvrir nos offres</a>
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

  const tva      = devis.montant > 0 ? Math.round(devis.montant * 0.18) : 0;
  const ttc      = devis.montant + tva;
  const canSign  = devis.statut === 'pending';
  const catLabel = {
    juridique:    'Service Juridique & Corporate',
    comptabilite: 'Comptabilité & Finance',
    rh:           'Gestion Paie & RH',
    flow:         'Solution Digitale Flow',
    finance:      'Structuration Financière'
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
            ${['Désignation','Qté','Prix HT','Total HT'].map((h, i) => `
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
            ['TVA 18%',       tva.toLocaleString('fr-FR') + ' FCFA'],
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
            Date : ${new Date().toLocaleDateString('fr-FR', { weekday:'long', year:'numeric', month:'long', day:'numeric' })}
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
    devis.statut     = 'signed';
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
// CHATBOT
// ════════════════════════════════════════════
function initChatbot() {
  const trigger = document.getElementById('chatbotTrigger');
  const win     = document.getElementById('chatbotWindow');
  const close   = document.getElementById('chatbotClose');

  trigger?.addEventListener('click', () => win?.classList.toggle('open'));
  close?.addEventListener('click',   () => win?.classList.remove('open'));

  // Fermeture sur Escape
  document.addEventListener('keydown', e => {
    if (e.key === 'Escape') {
      win?.classList.remove('open');
      document.getElementById('modalOverlay')?.classList.remove('open');
      document.getElementById('devisModal')?.classList.remove('open');
    }
  });
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
  const text  = document.getElementById('notificationText');
  const dot   = notif?.querySelector('.notification-dot');

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
  </script>
</body>
</html>