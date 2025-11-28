<?php
/**
 * Enqueue scripts and styles.
 *
 * @package Chroma_Excellence
 */

if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
}

/**
 * Determine whether map assets should be enqueued.
 */
function chroma_should_load_maps()
{
        $should_load_maps = is_post_type_archive('location') || is_singular('location') || is_page('locations');

        if (is_front_page() && function_exists('chroma_home_locations_preview')) {
                $locations_preview = chroma_home_locations_preview();
                $should_load_maps = $should_load_maps || (!empty($locations_preview['map_points']));
        }

        return $should_load_maps;
}

/**
 * Enqueue theme styles and scripts
 */
function chroma_enqueue_assets()
{
        // Google Fonts.
        wp_enqueue_style(
                'chroma-fonts',
                'https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap',
                array(),
                null,
                'print' // Load as print initially for async
        );

        // Font Awesome (Local).
        $fa_path = CHROMA_THEME_DIR . '/assets/css/font-awesome.css';
        $fa_version = file_exists($fa_path) ? filemtime($fa_path) : '6.4.0';
        wp_enqueue_style(
                'font-awesome',
                CHROMA_THEME_URI . '/assets/css/font-awesome.css',
                array(),
                $fa_version,
                'all' // Load synchronously to ensure icons appear
        );

        // Compiled Tailwind CSS.
        $css_path = CHROMA_THEME_DIR . '/assets/css/main.css';
        $css_version = file_exists($css_path) ? filemtime($css_path) : CHROMA_VERSION;

        // If front page, we inline critical CSS (which is the full file), so we DO NOT enqueue it to avoid blocking.
        // For other pages, we load it normally.
        // Always enqueue main stylesheet to prevent "white screen" if critical CSS fails
        wp_enqueue_style(
                'chroma-main',
                CHROMA_THEME_URI . '/assets/css/main.css',
                array(),
                $css_version,
                'all'
        );

        // Chart.js for curriculum radar (homepage and program pages).
        $script_dependencies = array();

        if (is_front_page() || is_singular('program') || is_post_type_archive('program')) {
                wp_enqueue_script(
                        'chartjs',
                        'https://cdn.jsdelivr.net/npm/chart.js',
                        array(),
                        '4.4.1',
                        true
                );

                wp_script_add_data('chartjs', 'defer', true);
                $script_dependencies[] = 'chartjs';
        }

        // Main JavaScript.
        $js_path = CHROMA_THEME_DIR . '/assets/js/main.js';
        $js_version = file_exists($js_path) ? filemtime($js_path) : CHROMA_VERSION;

        wp_enqueue_script(
                'chroma-main',
                CHROMA_THEME_URI . '/assets/js/main.js',
                $script_dependencies,
                $js_version,
                true
        );

        wp_script_add_data('chroma-main', 'defer', true);

        // Map Facade (Lazy Load Leaflet).
        $should_load_maps = chroma_should_load_maps();

        if ($should_load_maps) {
                wp_enqueue_script(
                        'chroma-map-facade',
                        CHROMA_THEME_URI . '/assets/js/map-facade.js',
                        array('chroma-main'), // Depend on main to ensure chromaData is available
                        $js_version,
                        true
                );
                wp_script_add_data('chroma-map-facade', 'defer', true);
        }

        // Localize script for AJAX and dynamic data.
        wp_localize_script(
                'chroma-main',
                'chromaData',
                array(
                        'ajaxUrl' => admin_url('admin-ajax.php'),
                        'nonce' => wp_create_nonce('chroma_nonce'),
                        'themeUrl' => CHROMA_THEME_URI,
                        'homeUrl' => home_url(),
                )
        );
}
add_action('wp_enqueue_scripts', 'chroma_enqueue_assets');

/**
 * Preload critical fonts.
 */
function chroma_preload_fonts()
{
        echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700;800&display=swap" as="style">' . "\n";
}
add_action('wp_head', 'chroma_preload_fonts', 1);

/**
 * Add resource hints for external assets to improve initial page performance.
 */
function chroma_resource_hints($urls, $relation_type)
{
        if ('preconnect' === $relation_type) {
                $urls[] = 'https://fonts.googleapis.com';
                $urls[] = array(
                        'href' => 'https://fonts.gstatic.com',
                        'crossorigin' => 'anonymous',
                );
                $urls[] = 'https://cdnjs.cloudflare.com';

                if (is_front_page() || is_singular('program') || is_post_type_archive('program')) {
                        $urls[] = 'https://cdn.jsdelivr.net';
                }

                if (chroma_should_load_maps()) {
                        $urls[] = 'https://unpkg.com';
                }

                // Preconnect to external origins identified in audit
                $urls[] = 'https://fonts.bunny.net';
                $urls[] = 'https://widgets.leadconnectorhq.com';
                $urls[] = 'https://services.leadconnectorhq.com';
                $urls[] = 'https://images.leadconnectorhq.com';
        }

        if ('dns-prefetch' === $relation_type) {
                $urls[] = '//fonts.googleapis.com';
                $urls[] = '//fonts.gstatic.com';
                $urls[] = '//cdnjs.cloudflare.com';

                if (is_front_page() || is_singular('program') || is_post_type_archive('program')) {
                        $urls[] = '//cdn.jsdelivr.net';
                }

                if (chroma_should_load_maps()) {
                        $urls[] = '//unpkg.com';
                }

                $urls[] = '//fonts.bunny.net';
                $urls[] = '//widgets.leadconnectorhq.com';
                $urls[] = '//services.leadconnectorhq.com';
                $urls[] = '//images.leadconnectorhq.com';
        }

        return array_unique($urls, SORT_REGULAR);
}
add_filter('wp_resource_hints', 'chroma_resource_hints', 10, 2);

/**
 * Enqueue admin assets
 */
function chroma_enqueue_admin_assets($hook)
{
        // Only load on post edit screens
        if ('post.php' !== $hook && 'post-new.php' !== $hook) {
                return;
        }

        // Font Awesome for icon previews in admin
        wp_enqueue_style(
                'font-awesome-admin',
                'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css',
                array(),
                '6.4.0'
        );

        // Media uploader
        wp_enqueue_media();

        // Custom admin script for media uploader
        wp_enqueue_script(
                'chroma-admin',
                CHROMA_THEME_URI . '/assets/js/admin.js',
                array('jquery'),
                CHROMA_VERSION,
                true
        );
}
add_action('admin_enqueue_scripts', 'chroma_enqueue_admin_assets');

/**
 * Async load CSS for fonts to prevent render blocking
 */
function chroma_async_styles($html, $handle, $href, $media)
{
        if ('font-awesome' === $handle || 'chroma-fonts' === $handle || ('chroma-main' === $handle && is_front_page())) {
                $html = str_replace("media='print'", "media='print' onload=\"this.media='all'\"", $html);
                // Add fallback for no-js
                $html .= "<noscript><link rel='stylesheet' href='{$href}' media='all'></noscript>";
        }
        return $html;
}
add_filter('style_loader_tag', 'chroma_async_styles', 10, 4);


