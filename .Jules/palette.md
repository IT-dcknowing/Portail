## 2026-04-18 - Accessibility for Floating Widgets and Icon-Only Controls
**Learning:** Floating action elements (like chatbot triggers) and modal close controls rendered with raw text icons (like `×` or `→`) or non-semantic `div` tags lack keyboard focusability and screen reader announcement context.
**Action:** Always use `<button type="button">` with `aria-label` for floating widgets and icon-only controls, ensuring default button styles (`border: none`, `padding: 0`) are explicitly reset when converting non-button wrappers to buttons.
