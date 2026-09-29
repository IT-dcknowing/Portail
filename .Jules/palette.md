## 2026-09-29 - Chatbot Accessibility & ARIA Support
**Learning:** Custom non-button elements used as triggers for interactive overlays (such as floating chat widgets) require explicit `role="button"`, `tabindex="0"`, `aria-label`, `aria-expanded` state, and Enter/Space keyboard event listeners to be accessible to screen reader and keyboard-only users.
**Action:** When adding or updating custom trigger elements, always ensure ARIA attributes and keyboard event handlers are implemented alongside click listeners.
