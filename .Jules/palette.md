## 2026-09-19 - Accessible ARIA labels for icon-only modal and chatbot controls
**Learning:** Icon-only control elements (such as `×` close buttons and `→` submit arrows) lack accessible names in screen readers, causing screen readers to announce "multiplication sign" or "rightwards arrow" instead of their interactive purpose.
**Action:** Always add descriptive `aria-label` and `title` attributes to icon-only modal close (`×`) and chatbot send (`→`) buttons across all Blade views.
