<?php
/**
 * Chroma Excellence Theme Functions
 *
 * Homepage Template: front-page.php (WordPress default)
 *
 * @package Chroma_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Define theme constants
 */
define('CHROMA_VERSION', '1.0.0');
define('CHROMA_THEME_DIR', get_template_directory());
define('CHROMA_THEME_URI', get_template_directory_uri());

/**
 * Load core theme functionality
 * Order matters - load dependencies first
 */

// Core setup and configuration
require_once CHROMA_THEME_DIR . '/inc/setup.php';
require_once CHROMA_THEME_DIR . '/inc/enqueue.php';
require_once CHROMA_THEME_DIR . '/inc/program-settings.php';
require_once CHROMA_THEME_DIR . '/inc/nav-menus.php';

// Custom Post Types
require_once CHROMA_THEME_DIR . '/inc/cpt-programs.php';
require_once CHROMA_THEME_DIR . '/inc/cpt-locations.php';
require_once CHROMA_THEME_DIR . '/inc/cpt-team-members.php';

// Page Meta Boxes
require_once CHROMA_THEME_DIR . '/inc/about-page-meta.php';
require_once CHROMA_THEME_DIR . '/inc/curriculum-page-meta.php';
require_once CHROMA_THEME_DIR . '/inc/contact-page-meta.php';
require_once CHROMA_THEME_DIR . '/inc/stories-page-meta.php';
require_once CHROMA_THEME_DIR . '/inc/parents-page-meta.php';
require_once CHROMA_THEME_DIR . '/inc/careers-page-meta.php';
require_once CHROMA_THEME_DIR . '/inc/employers-page-meta.php';
require_once CHROMA_THEME_DIR . '/inc/privacy-page-meta.php';
require_once CHROMA_THEME_DIR . '/inc/schema-meta-boxes.php';

// Utility Functions
require_once CHROMA_THEME_DIR . '/inc/template-tags.php';
require_once CHROMA_THEME_DIR . '/inc/about-seo.php';
require_once CHROMA_THEME_DIR . '/inc/customizer-home.php';
require_once CHROMA_THEME_DIR . '/inc/customizer-header.php';
require_once CHROMA_THEME_DIR . '/inc/customizer-footer.php';

// Legacy helper files (ACF plugin optional; helpers run on core WP functions only)
require_once CHROMA_THEME_DIR . '/inc/acf-options.php';
require_once CHROMA_THEME_DIR . '/inc/acf-homepage.php';

require_once CHROMA_THEME_DIR . '/inc/cleanup.php';

// SEO and Internationalization
require_once CHROMA_THEME_DIR . '/inc/seo-engine.php';
require_once CHROMA_THEME_DIR . '/inc/city-slug-logic.php';
require_once CHROMA_THEME_DIR . '/inc/spanish-variant-generator.php';
require_once CHROMA_THEME_DIR . '/inc/monthly-seo-cron.php';



require_once CHROMA_THEME_DIR . '/inc/security.php';
require_once CHROMA_THEME_DIR . '/inc/critical-css.php';


/**
 * Performance Optimizations - Phase 1 (Safe Mode)
 * Added: [Current Date]
 */

// Force image dimensions to prevent layout shift (CLS improvement)
add_filter('wp_img_tag_add_width_and_height_attr', '__return_true');

// Force Elementor to output image dimensions
add_filter('elementor/image/print_dimensions', '__return_true');

/**
 * Add width and height attributes to post thumbnails for CLS optimization
 * Filter: post_thumbnail_html
 */
function chroma_add_post_thumbnail_dims($html, $post_id, $post_thumbnail_id)
{
    if (!$post_thumbnail_id) {
        return $html;
    }
    return chroma_inject_dimensions($html, $post_thumbnail_id);
}
add_filter('post_thumbnail_html', 'chroma_add_post_thumbnail_dims', 10, 3);

/**
 * Add width and height attributes to content images
 * Filter: get_image_tag
 */
function chroma_add_content_image_dims($html, $id, $alt)
{
    if (!$id) {
        return $html;
    }
    return chroma_inject_dimensions($html, $id);
}
add_filter('get_image_tag', 'chroma_add_content_image_dims', 10, 3);

/**
 * Helper function to inject dimensions
 */
function chroma_inject_dimensions($html, $attachment_id)
{
    // If width is already defined, skip
    if (strpos($html, 'width=') !== false) {
        return $html;
    }

    $metadata = wp_get_attachment_metadata($attachment_id);
    if (isset($metadata['width']) && isset($metadata['height'])) {
        $html = str_replace('<img', sprintf(
            '<img width="%d" height="%d"',
            $metadata['width'],
            $metadata['height']
        ), $html);
    }

    return $html;
}

/**
 * Allow WebP uploads
 */
function chroma_mime_types($mimes)
{
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter('upload_mimes', 'chroma_mime_types');


