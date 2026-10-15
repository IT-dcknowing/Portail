## 2025-05-10 - Icon-Only Action Buttons in Blade Views
**Learning:** Icon-only buttons (such as download and delete actions in attachment lists) lack visible text, making them inaccessible to screen reader users and ambiguous without tooltip descriptions (`title` / `aria-label`).
**Action:** Always include both `aria-label` and `title` on icon-only links and buttons in Laravel Blade templates to ensure assistive technology compatibility and clear visual context on hover.
