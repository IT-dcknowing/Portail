/**
 * Custom Cursor - Light Corporate
 * Implements a fluid cursor with a central dot and a lagging ring
 */

document.addEventListener('DOMContentLoaded', () => {
  // Create cursor elements
  const cursorContainer = document.createElement('div');
  cursorContainer.classList.add('cursor-container');

  const cursorDot = document.createElement('div');
  cursorDot.classList.add('cursor-dot');

  const cursorRing = document.createElement('div');
  cursorRing.classList.add('cursor-ring');

  cursorContainer.appendChild(cursorDot);
  cursorContainer.appendChild(cursorRing);
  document.body.appendChild(cursorContainer);

  // Cursor state
  let mouseX = window.innerWidth / 2;
  let mouseY = window.innerHeight / 2;
  let ringX = mouseX;
  let ringY = mouseY;

  // Lerp factor (lower = more lag)
  const lerpFactor = 0.15;

  // Track mouse position
  document.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;

    // Update dot position immediately
    cursorDot.style.left = `${mouseX}px`;
    cursorDot.style.top = `${mouseY}px`;
  });

  // Animation loop for smooth ring movement (Lerp)
  function animate() {
    // Linear interpolation for smooth following
    ringX += (mouseX - ringX) * lerpFactor;
    ringY += (mouseY - ringY) * lerpFactor;

    cursorRing.style.left = `${ringX}px`;
    cursorRing.style.top = `${ringY}px`;

    requestAnimationFrame(animate);
  }

  animate();

  // Add hover effect for interactive elements
  const interactiveSelectors = 'a, button, input, textarea, select, .btn-primary, .btn-secondary, .service-card, [role="button"], [tabindex]';

  document.addEventListener('mouseover', (e) => {
    if (e.target.closest(interactiveSelectors)) {
      cursorRing.classList.add('hovered');
    }
  });

  document.addEventListener('mouseout', (e) => {
    if (e.target.closest(interactiveSelectors)) {
      cursorRing.classList.remove('hovered');
    }
  });

  // Hide default cursor
  document.body.style.cursor = 'none';
});
