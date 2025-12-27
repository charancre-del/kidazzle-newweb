<?php
/**
 * Enqueue scripts and styles.
 *
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
        exit; // Exit if accessed directly.
}

/**
 * Determine whether map assets should be enqueued.
 */
function kidazzle_should_load_maps()
{
        $should_load_maps = is_post_type_archive('location') || is_singular('location') || is_page('locations');

        if (is_front_page() && function_exists('kidazzle_home_locations_preview')) {
                $locations_preview = kidazzle_home_locations_preview();
                $should_load_maps = $should_load_maps || (!empty($locations_preview['map_points']));
        }

        return $should_load_maps;
}

/**
 * Enqueue theme styles and scripts
 */
function kidazzle_enqueue_assets()
{
        // DEBUG: Confirm this function is executing
        echo '<!-- DEBUG: kidazzle_enqueue_assets is running -->';

        $script_dependencies = array('jquery');

        // Font Awesome (Subset)
        $fa_path = KIDAZZLE_THEME_DIR . '/assets/css/font-awesome-subset.css';
        $fa_version = file_exists($fa_path) ? filemtime($fa_path) : '6.4.0';
        wp_enqueue_style(
                'KIDazzle-font-awesome',
                KIDAZZLE_THEME_URI . '/assets/css/font-awesome-subset.css',
                array(),
                $fa_version,
                'all'
        );

        if (is_front_page()) {
                $chart_js_path = KIDAZZLE_THEME_DIR . '/assets/js/chart.min.js';
                $chart_js_version = file_exists($chart_js_path) ? filemtime($chart_js_path) : '4.4.1';

                wp_enqueue_script(
                        'chartjs',
                        KIDAZZLE_THEME_URI . '/assets/js/chart.min.js',
                        array(),
                        $chart_js_version,
                        true
                );

                wp_script_add_data('chartjs', 'defer', true);
                $script_dependencies[] = 'chartjs';
        }

        // Lucide Icons (used throughout the theme for icons with data-lucide attributes)
        wp_enqueue_script(
                'lucide-icons',
                'https://unpkg.com/lucide@latest',
                array(),
                null,
                true
        );
        // Initialize Lucide icons after page load
        wp_add_inline_script('lucide-icons', 'document.addEventListener("DOMContentLoaded", function() { if(window.lucide) { lucide.createIcons(); } });');

        // Compiled Tailwind CSS.
        $css_path = KIDAZZLE_THEME_DIR . '/assets/css/main.css';
        $css_version = file_exists($css_path) ? filemtime($css_path) : kidazzle_VERSION;

        // Compiled Tailwind CSS - loads synchronously
        wp_enqueue_style(
                'KIDazzle-main',
                KIDAZZLE_THEME_URI . '/assets/css/main.css',
                array(),
                $css_version,
                'all' // Load normally to prevent FOUC
        );

        // CRITICAL ACCESSIBILITY FIXES (Injected Inline to bypass cache/build)
        $custom_css = "
                /* NEW HOMEPAGE STYLES */
                html { scroll-behavior: smooth; }
                
                /* Growth Journey Graph Animation */
                .graph-bar { transition: height 1s cubic-bezier(0.4, 0, 0.2, 1); }
                
                /* Purple Ombre Gradient for CTA */
                .bg-ombre-purple { 
                        background: linear-gradient(135deg, #4c1d95 0%, #7c3aed 50%, #c026d3 100%); 
                }
                
                /* Backdrop Blur Support */
                .backdrop-blur-md {
                        -webkit-backdrop-filter: blur(12px);
                        backdrop-filter: blur(12px);
                }
                
                /* Gradient Text */
                .bg-clip-text {
                        -webkit-background-clip: text;
                        background-clip: text;
                }
                
                /* Rounded Extra Large */
                .rounded-\\[2rem\\] { border-radius: 2rem; }
                .rounded-\\[2\\.5rem\\] { border-radius: 2.5rem; }
                .rounded-\\[3rem\\] { border-radius: 3rem; }

                /* Darkened Brand Colors for WCAG AA Compliance (Enhanced) */
                .text-KIDazzle-red { color: #964030 !important; }
                .bg-KIDazzle-red { background-color: #964030 !important; }
                .text-KIDazzle-orange { color: #A8551E !important; }
                .bg-KIDazzle-orange { background-color: #A8551E !important; }
                .text-KIDazzle-green { color: #4D5C54 !important; }
                .bg-KIDazzle-green { background-color: #4D5C54 !important; }
                .text-KIDazzle-yellow { color: #8C6B2F !important; }
                .bg-KIDazzle-yellow { background-color: #8C6B2F !important; }
                
                /* Footer Social Links - Touch Target Fix (48px) */
                footer .flex.gap-3 a {
                        width: 48px !important;
                        height: 48px !important;
                        display: flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                }
                footer .flex.gap-3 a i {
                        font-size: 1.25rem !important;
                }
                
                /* Footer Navigation Links - Touch Target Fix */
                footer nav a {
                        display: inline-block !important;
                        min-height: 48px !important;
                        min-width: 48px !important;
                        padding: 12px 16px !important;
                        line-height: 1.5 !important;
                        display: flex !important;
                        align-items: center !important;
                }
                
                /* Review Carousel Dots - Touch Target Fix (48px) */
                [data-reviews-dots] button {
                        min-width: 48px !important;
                        min-height: 48px !important;
                        padding: 12px !important;
                }

                /* Global Button Touch Targets */
                a[class*='px-8'][class*='py-4'], 
                button[class*='px-8'][class*='py-4'] {
                        min-height: 48px !important;
                        display: inline-flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                }

                /* Form Inputs Touch Targets */
                input[type='text'],
                input[type='email'],
                input[type='tel'],
                input[type='number'],
                select,
                textarea {
                        min-height: 48px !important;
                        font-size: 16px !important; /* Prevent iOS zoom */
                }
                
                /* Form Labels - Ensure visibility if hidden */
                .KIDazzle-tour-form label {
                        display: block !important;
                        color: #263238 !important; /* Brand Ink */
                        opacity: 1 !important;
                        margin-bottom: 0.5rem !important;
                }

                /* Force CTA Button Visibility */
                header .container > a[href*='contact'] {
                        display: flex !important;
                }

                /* Accessibility: Increase contrast for muted text */
                .text-brand-ink\\/60 { color: rgba(38, 50, 56, 0.9) !important; }
                .text-brand-ink\\/70 { color: rgba(38, 50, 56, 0.95) !important; }
        ";
        wp_add_inline_style('KIDazzle-main', $custom_css);

        // Main JavaScript.
        $js_path = KIDAZZLE_THEME_DIR . '/assets/js/main.js';
        $js_version = file_exists($js_path) ? filemtime($js_path) : kidazzle_VERSION;

        wp_enqueue_script(
                'KIDazzle-main-js',
                KIDAZZLE_THEME_URI . '/assets/js/main.js',
                $script_dependencies,
                $js_version,
                true
        );

        // DEBUG: Confirm script was enqueued
        echo '<!-- DEBUG: Enqueued KIDazzle-main-js with URL: ' . KIDAZZLE_THEME_URI . '/assets/js/main.js and version: ' . $js_version . ' -->';

        // Defer re-enabled for FCP optimization
        wp_script_add_data('KIDazzle-main-js', 'defer', true);

        // Map Facade (Lazy Load Leaflet).
        $should_load_maps = kidazzle_should_load_maps();

        if ($should_load_maps) {
                wp_enqueue_script(
                        'KIDazzle-map-facade',
                        KIDAZZLE_THEME_URI . '/assets/js/map-facade.js',
                        array('KIDazzle-main-js'), // Depend on main to ensure KIDazzleData is available
                        $js_version,
                        true
                );
                wp_script_add_data('KIDazzle-map-facade', 'defer', true);
        }

        // Localize script for AJAX and dynamic data.
        wp_localize_script(
                'KIDazzle-main-js',
                'KIDazzleData',
                array(
                        'ajaxUrl' => admin_url('admin-ajax.php'),
                        'nonce' => wp_create_nonce('kidazzle_nonce'),
                        'themeUrl' => KIDAZZLE_THEME_URI,
                        'homeUrl' => home_url(),
                )
        );
}
add_action('wp_enqueue_scripts', 'kidazzle_enqueue_assets');



/**
 * Add resource hints for external assets to improve initial page performance.
 */
function kidazzle_resource_hints($urls, $relation_type)
{
        if ('preconnect' === $relation_type) {

                if (is_front_page() || is_singular('program') || is_post_type_archive('program')) {
                        $urls[] = 'https://cdn.jsdelivr.net';
                }

                if (kidazzle_should_load_maps()) {
                        $urls[] = 'https://unpkg.com';
                }

                // Preconnect to external origins identified in audit
                $urls[] = 'https://widgets.leadconnectorhq.com';
                $urls[] = 'https://services.leadconnectorhq.com';
                $urls[] = 'https://images.leadconnectorhq.com';
                $urls[] = 'https://stcdn.leadconnectorhq.com';
                $urls[] = 'https://fonts.bunny.net';
        }

        if ('dns-prefetch' === $relation_type) {

                if (is_front_page() || is_singular('program') || is_post_type_archive('program')) {
                        $urls[] = '//cdn.jsdelivr.net';
                }

                if (kidazzle_should_load_maps()) {
                        $urls[] = '//unpkg.com';
                }
                $urls[] = '//widgets.leadconnectorhq.com';
                $urls[] = '//services.leadconnectorhq.com';
                $urls[] = '//images.leadconnectorhq.com';
                $urls[] = '//stcdn.leadconnectorhq.com';
                $urls[] = '//fonts.bunny.net';
        }

        return array_unique($urls, SORT_REGULAR);
}
add_filter('wp_resource_hints', 'kidazzle_resource_hints', 10, 2);

/**
 * Enqueue admin assets
 */
function kidazzle_enqueue_admin_assets($hook)
{
        // Only load on post edit screens
        if ('post.php' !== $hook && 'post-new.php' !== $hook) {
                return;
        }

        // Font Awesome for icon previews in admin (using local version)
        $fa_path = KIDAZZLE_THEME_DIR . '/assets/css/font-awesome.css';
        $fa_version = file_exists($fa_path) ? filemtime($fa_path) : '6.4.0';

        wp_enqueue_style(
                'font-awesome-admin',
                KIDAZZLE_THEME_URI . '/assets/css/font-awesome.css',
                array(),
                $fa_version // Use same version as frontend for consistency
        );

        // Media uploader
        wp_enqueue_media();

        // Custom admin script for media uploader
        wp_enqueue_script(
                'KIDazzle-admin',
                KIDAZZLE_THEME_URI . '/assets/js/admin.js',
                array('jquery'),
                kidazzle_VERSION,
                true
        );
}
add_action('admin_enqueue_scripts', 'kidazzle_enqueue_admin_assets');

/**
 * Async load CSS for fonts only (not main CSS to prevent FOUC)
 */
function kidazzle_async_styles($html, $handle, $href, $media)
{
        // Defer Font Awesome AND Main CSS (Critical CSS inlined in header)
        if (in_array($handle, array('KIDazzle-font-awesome'))) {
                // Add data-no-optimize to prevent LiteSpeed from combining/blocking this file
                $html = str_replace('<link', '<link data-no-optimize="1"', $html);

                // If media is 'all', swap to 'print' and add onload
                $html = str_replace("media='all'", "media='print' onload=\"this.media='all'\"", $html);
                // If media is already 'print' (rare but possible), ensure onload is present
                $html = str_replace("media='print'", "media='print' onload=\"this.media='all'\"", $html);

                // Add fallback for no-js
                $html .= "<noscript><link rel='stylesheet' href='{$href}' media='all'></noscript>";
        }
        return $html;
}
add_filter('style_loader_tag', 'kidazzle_async_styles', 10, 4);

/**
 * Dequeue Dashicons for non-logged in users to improve performance
 */
function kidazzle_dequeue_dashicons()
{
        if (!is_user_logged_in()) {
                wp_dequeue_style('dashicons');
                wp_deregister_style('dashicons');
        }
}
add_action('wp_enqueue_scripts', 'kidazzle_dequeue_dashicons');


/**
 * Dequeue CDN styles (specifically Font Awesome) to force local loading.
 * Runs at priority 100 to ensure it runs after plugins.
 */
function kidazzle_dequeue_cdn_styles()
{
        global $wp_styles;
        if (empty($wp_styles->queue)) {
                return;
        }

        foreach ($wp_styles->queue as $handle) {
                if (!isset($wp_styles->registered[$handle])) {
                        continue;
                }

                $src = $wp_styles->registered[$handle]->src;

                // Check if it's Font Awesome and coming from a CDN
                if (
                        (strpos($handle, 'font-awesome') !== false || strpos($handle, 'fontawesome') !== false || strpos($handle, 'fa-') !== false) &&
                        (strpos($src, 'cdnjs') !== false || strpos($src, 'cloudflare') !== false || strpos($src, 'jsdelivr') !== false)
                ) {
                        wp_dequeue_style($handle);
                        wp_deregister_style($handle);
                }
        }
}
add_action('wp_enqueue_scripts', 'kidazzle_dequeue_cdn_styles', 100);





