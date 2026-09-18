function initCursor() {
  if ('ontouchstart' in window || navigator.maxTouchPoints > 0) {
    document.body.style.cursor = 'auto';
    const cursor = document.querySelector('.cursor');
    const ring = document.querySelector('.cursor-ring');
    if (cursor) cursor.style.display = 'none';
    if (ring) ring.style.display = 'none';
    return;
  }

  const cursor = document.querySelector('.cursor');
  const ring = document.querySelector('.cursor-ring');

  if (!cursor || !ring) return;

  // Masquer initialement jusqu'au premier mouvement de souris
  cursor.style.opacity = '0';
  ring.style.opacity = '0';
  cursor.style.transition = 'opacity 0.2s ease';
  ring.style.transition = 'opacity 0.2s ease';

  document.body.style.cursor = 'none';

  let mouseX = -100, mouseY = -100;
  let ringX = -100, ringY = -100;
  let isFirstMove = true;

  document.addEventListener('mousemove', e => {
    mouseX = e.clientX;
    mouseY = e.clientY;

    if (isFirstMove) {
      ringX = mouseX;
      ringY = mouseY;
      cursor.style.opacity = '1';
      ring.style.opacity = '1';
      isFirstMove = false;
    }

    cursor.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0) translate(-50%, -50%)`;
  });

  const LERP = 0.18;

  function animateRing() {
    if (!isFirstMove) {
      ringX += (mouseX - ringX) * LERP;
      ringY += (mouseY - ringY) * LERP;
      ring.style.transform = `translate3d(${ringX}px, ${ringY}px, 0) translate(-50%, -50%)`;
    }
    requestAnimationFrame(animateRing);
  }
  animateRing();

  const interactives = 'a, button, [role="button"], .flow-item, .service-card, .offre-card, .offre-tab, .nav-cta, .chatbot-trigger, label, .tile, .short-card, .capg-card, .benefit-card';

  document.body.addEventListener('mouseover', e => {
    if (e.target.closest && e.target.closest(interactives)) {
      ring.classList.add('hovered');
    }
  });

  document.body.addEventListener('mouseout', e => {
    if (e.target.closest && e.target.closest(interactives)) {
      ring.classList.remove('hovered');
    }
  });

  document.addEventListener('mouseleave', () => {
    cursor.style.opacity = '0';
    ring.style.opacity = '0';
  });

  document.addEventListener('mouseenter', () => {
    if (!isFirstMove) {
      cursor.style.opacity = '1';
      ring.style.opacity = '1';
    }
  });

  document.addEventListener('mousedown', () => {
    cursor.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0) translate(-50%, -50%) scale(0.7)`;
  });

  document.addEventListener('mouseup', () => {
    cursor.style.transform = `translate3d(${mouseX}px, ${mouseY}px, 0) translate(-50%, -50%) scale(1)`;
  });
}
