<?php
/**
 * Critical CSS Injection
 *
 * @package Chroma_Excellence
 */

function chroma_print_critical_css()
{
    if (is_front_page()) {
        $css_file = CHROMA_THEME_DIR . '/assets/css/main.css';
        if (file_exists($css_file)) {
            $css = file_get_contents($css_file);
            echo '<style id="chroma-critical-css">' . $css . '</style>';
        }
    }
}
add_action('wp_head', 'chroma_print_critical_css', 1);
