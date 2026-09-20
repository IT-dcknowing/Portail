/**
 * Custom Cursor - Light Corporate
 * Unifie les deux conventions de markup : reutilise les elements
 * `.cursor` / `.cursor-ring` deja presents dans la page, sinon cree
 * un `.cursor-container` a la volee.
 *
 * Correctif : le curseur custom reste invisible ET le curseur natif
 * reste visible jusqu'au premier mouvement de souris. Fini le point
 * bloque en haut a gauche au chargement (position 0,0 + natif masque).
 */

document.addEventListener('DOMContentLoaded', () => {
  // Desactive le curseur custom sur les ecrans tactiles
  if (window.matchMedia('(pointer: coarse)').matches) {
    return;
  }

  // Evite les doublons si le script est charge deux fois
  if (window.__dcCursorInit) {
    return;
  }
  window.__dcCursorInit = true;

  // Reutilise le markup existant si present
  let dot = document.querySelector('#cursor')
    || document.querySelector('.cursor-dot')
    || document.querySelector('.cursor');
  let ring = document.querySelector('#cursorRing')
    || document.querySelector('.cursor-ring');

  // Sinon cree les elements (convention .cursor-container)
  if (!dot || !ring) {
    if (document.querySelector('.cursor-container')) {
      return;
    }
    const cursorContainer = document.createElement('div');
    cursorContainer.classList.add('cursor-container');

    dot = document.createElement('div');
    dot.classList.add('cursor-dot');

    ring = document.createElement('div');
    ring.classList.add('cursor-ring');

    cursorContainer.appendChild(dot);
    cursorContainer.appendChild(ring);
    document.body.appendChild(cursorContainer);
  }

  // Etat initial : hors ecran + invisible, curseur natif conserve
  let mouseX = -100;
  let mouseY = -100;
  let ringX = -100;
  let ringY = -100;
  let active = false;

  // Lerp factor (lower = more lag)
  const lerpFactor = 0.15;

  dot.style.left = '-100px';
  dot.style.top = '-100px';
  ring.style.left = '-100px';
  ring.style.top = '-100px';
  dot.style.opacity = '0';
  ring.style.opacity = '0';

  function activate(x, y) {
    mouseX = x;
    mouseY = y;
    if (!active) {
      active = true;
      ringX = x;
      ringY = y;
      dot.style.opacity = '1';
      ring.style.opacity = '1';
      // Ne masque le curseur natif qu'une fois le custom operationnel
      document.body.classList.add('custom-cursor-active');
    }
  }

  // Track mouse position : le point central suit sans delai
  document.addEventListener('mousemove', (e) => {
    activate(e.clientX, e.clientY);

    // Update dot position immediately
    dot.style.left = `${mouseX}px`;
    dot.style.top = `${mouseY}px`;
  });

  // Animation loop for smooth ring movement (Lerp)
  function animate() {
    // Linear interpolation for smooth following (effet de retard)
    ringX += (mouseX - ringX) * lerpFactor;
    ringY += (mouseY - ringY) * lerpFactor;

    ring.style.left = `${ringX}px`;
    ring.style.top = `${ringY}px`;

    requestAnimationFrame(animate);
  }

  animate();

  // Add hover effect (scale) for interactive elements
  const interactiveSelectors = 'a, button, input, textarea, select, label, .btn-primary, .btn-secondary, .service-card, .offre-card, .formule-card, .short-card, .capg-card, .session-card, .tile, [role="button"], [tabindex]';

  document.addEventListener('mouseover', (e) => {
    if (e.target.closest && e.target.closest(interactiveSelectors)) {
      ring.classList.add('hovered');
    }
  });

  document.addEventListener('mouseout', (e) => {
    if (e.target.closest && e.target.closest(interactiveSelectors)) {
      ring.classList.remove('hovered');
    }
  });

  // Masque le custom quand la souris quitte la fenetre
  document.documentElement.addEventListener('mouseleave', () => {
    dot.style.opacity = '0';
    ring.style.opacity = '0';
  });
  document.documentElement.addEventListener('mouseenter', () => {
    if (active) {
      dot.style.opacity = '1';
      ring.style.opacity = '1';
    }
  });
});
