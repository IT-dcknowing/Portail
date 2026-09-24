# Palette's Journal - Critical UX Learnings

## 2025-05-18 - Accessibility on Icon-Only UI Elements in Landing Blade Views
**Learning:** Icon-only control buttons (such as "×" for closing modals/chat windows or "→" for sending chat messages) in complex Blade views often lack `aria-label` and `title` attributes, making them inaccessible to screen reader users and confusing for hover interactions.
**Action:** Always inspect modal headers, chatbot widgets, and icon-only trigger buttons in Blade views to ensure descriptive `aria-label` and `title` attributes are present.
