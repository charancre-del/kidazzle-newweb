# Chroma to Kidazzle Migration Notes

## Base Theme Analysis
- **Theme Name:** Chroma (Excellence)
- **Type:** Classic Theme (PHP Templates)
- **Styling:** Tailwind CSS (built via npm scripts)
- **Structure:**
  - `front-page.php`: Homepage template
  - `header.php` / `footer.php`: Global partials
  - `inc/`: Custom functionality (enqueue, setup, CPTs)
  - `template-parts/`: Components
  - `page-*.php`: Specific page templates (About, Programs, etc.)

## Migration Strategy
1.  **Branding**:
    - Update `style.css` headers.
    - Update `theme.json` (if present) or `tailwind.config.js` with Kidazzle colors/fonts.
    - Replace usage of "Chroma" in `inc/` functions if user-facing.

2.  **Content Migration (DOCX Source)**:
    - The source DOCX contains raw HTML with comments indicating views (e.g., `<!-- 1. HOME VIEW -->`).
    - **Mapping**:
        - `HOME VIEW` -> `front-page.php`
        - `PROGRAMS VIEW` -> `page-programs.php`? (Check existing `page-programs.php`)
        - `LOCATIONS` -> `page-locations.php`
        - And so on.
    - **Implementation**:
        - Extract HTML.
        - Split into sections.
        - Insert into respective PHP files, ensuring `get_header()` and `get_footer()` are preserved.
        - Ensure Tailwind classes match the existing build or update configuration.

3.  **Assets**:
    - Need to identify images referenced in the extracted HTML.
    - If they are external URLs, we might need to download them or keep them.
    - If they hold placeholders, we need to replace them.

4.  **Preservation**:
    - Essential functionality in `functions.php` and `inc/` must remain.
    - Keep `wp_head()` and `wp_footer()` hooks.
