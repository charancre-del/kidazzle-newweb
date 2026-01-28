<?php
/**
 * Template Helper Functions
 *
 * @package kidazzle_Theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Trimmed Excerpt
 */
function kidazzle_trimmed_excerpt($length = 20, $post_id = null)
{
    $post_id = $post_id ?: get_the_ID();
    $excerpt = has_excerpt($post_id) ? get_the_excerpt($post_id) : get_the_content(null, false, $post_id);
    $excerpt = wp_strip_all_tags($excerpt);
    $words = explode(' ', $excerpt);

    if (count($words) > $length) {
        $excerpt = implode(' ', array_slice($words, 0, $length)) . '...';
    }

    return $excerpt;
}

/**
 * Safe meta accessor
 */
function kidazzle_get_meta_value($post_id, $key, $default = '')
{
    $value = get_post_meta($post_id, $key, true);

    if ('' === $value || null === $value) {
        return $default;
    }

    return $value;
}

/**
 * Location meta bundle
 */
function kidazzle_get_location_fields($post_id = null)
{
    $post_id = $post_id ?: get_the_ID();

    return array(
        'address' => kidazzle_get_meta_value($post_id, 'location_address', ''),
        'city' => kidazzle_get_meta_value($post_id, 'location_city', ''),
        'state' => kidazzle_get_meta_value($post_id, 'location_state', 'GA'),
        'zip' => kidazzle_get_meta_value($post_id, 'location_zip', ''),
        'phone' => kidazzle_get_meta_value($post_id, 'location_phone', ''),
        'email' => kidazzle_get_meta_value($post_id, 'location_email', ''),
        'latitude' => kidazzle_get_meta_value($post_id, 'location_latitude', ''),
        'longitude' => kidazzle_get_meta_value($post_id, 'location_longitude', ''),
    );
}

/**
 * Program meta bundle
 */
function kidazzle_get_program_fields($post_id = null)
{
    $post_id = $post_id ?: get_the_ID();

    // Get manual icon override
    $icon = kidazzle_get_meta_value($post_id, 'program_icon', '');

    // Smart Defaults if no manual icon set
    if (empty($icon)) {
        $slug = get_post_field('post_name', $post_id);

        // Map slugs to emojis
        if (strpos($slug, 'infant') !== false) {
            $icon = '👶';
        } elseif (strpos($slug, 'toddler') !== false) {
            $icon = '🚀';
        } elseif (strpos($slug, 'preschool') !== false) {
            $icon = '🎨';
        } elseif (strpos($slug, 'pre-k') !== false || strpos($slug, 'prek') !== false) {
            $icon = '🖍️'; // Pre-K Prep
            if (strpos($slug, 'ga') !== false) {
                $icon = '🎓'; // GA Pre-K
            }
        } elseif (strpos($slug, 'school') !== false) {
            $icon = '🚌'; // After School / Schoolagers
        } elseif (strpos($slug, 'camp') !== false) {
            $icon = '☀️';
        } elseif (strpos($slug, 'parent') !== false) {
            $icon = '🎉';
        } else {
            $icon = 'fas fa-child'; // Fallback
        }
    }

    return array(
        'age_range' => kidazzle_get_meta_value($post_id, 'program_age_range', ''),
        'excerpt' => kidazzle_get_meta_value($post_id, 'program_short_description', ''),
        'icon' => $icon,
        'color' => kidazzle_get_meta_value($post_id, 'program_color', 'kidazzle-teal'),
    );
}

/**
 * Program anchor slug helper
 */
function kidazzle_get_program_anchor_slug($post_id = null)
{
    $post_id = $post_id ?: get_the_ID();
    $anchor = kidazzle_get_meta_value($post_id, 'program_anchor_slug', '');

    if (!$anchor) {
        $anchor = get_post_field('post_name', $post_id);
    }

    return sanitize_title($anchor);
}

/**
 * Program SEO intro fields
 */
function kidazzle_get_program_seo_fields($post_id = null)
{
    $post_id = $post_id ?: get_the_ID();

    $highlights = kidazzle_get_meta_value($post_id, 'program_seo_highlights', '');
    $highlights = preg_split('/\r\n|\r|\n/', $highlights);
    $highlights = array_filter(array_map('trim', (array) $highlights));

    return array(
        'heading' => kidazzle_get_meta_value($post_id, 'program_seo_heading', ''),
        'summary' => kidazzle_get_meta_value($post_id, 'program_seo_summary', ''),
        'highlights' => $highlights,
    );
}

/**
 * Program SEO meta tags
 */
function kidazzle_get_program_meta_tags($post_id = null)
{
    $post_id = $post_id ?: get_the_ID();
    $meta_desc = kidazzle_get_meta_value($post_id, 'program_meta_description', '');

    if (!$meta_desc) {
        $meta_desc = has_excerpt($post_id) ? get_the_excerpt($post_id) : kidazzle_trimmed_excerpt(32, $post_id);
    }

    return array(
        'title' => kidazzle_get_meta_value($post_id, 'program_meta_title', get_the_title($post_id)),
        'description' => $meta_desc,
    );
}

/**
 * Program FAQ items as structured array
 */
function kidazzle_get_program_faq_items($post_id = null)
{
    $post_id = $post_id ?: get_the_ID();
    $raw = kidazzle_get_meta_value($post_id, 'program_faq_items', '');

    if (!$raw) {
        return array();
    }

    $rows = preg_split('/\r\n|\r|\n/', $raw);
    $rows = array_filter(array_map('trim', (array) $rows));
    $faq = array();

    foreach ($rows as $row) {
        $parts = array_map('trim', explode('|', $row, 2));

        if (count($parts) < 2 || !$parts[0] || !$parts[1]) {
            continue;
        }

        $faq[] = array(
            'question' => wp_strip_all_tags($parts[0]),
            'answer' => wp_kses_post($parts[1]),
        );
    }

    return $faq;
}

/**
 * Render FAQ schema JSON-LD
 */
function kidazzle_render_program_faq_schema($faq_items)
{
    if (empty($faq_items)) {
        return;
    }

    $entities = array();

    foreach ($faq_items as $item) {
        $entities[] = array(
            '@type' => 'Question',
            'name' => $item['question'],
            'acceptedAnswer' => array(
                '@type' => 'Answer',
                'text' => wp_strip_all_tags($item['answer']),
            ),
        );
    }

    $schema = array(
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $entities,
    );

    echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
}

/**
 * Cached lookup of program anchors keyed by slug and title
 */
function kidazzle_get_program_anchor_lookup()
{
    static $lookup;

    if (null !== $lookup) {
        return $lookup;
    }

    $lookup = array();

    $programs = get_posts(
        array(
            'post_type' => 'program',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'fields' => 'ids',
            'orderby' => 'menu_order title',
            'order' => 'ASC',
        )
    );

    foreach ($programs as $program_id) {
        $anchor = kidazzle_get_program_anchor_slug($program_id);
        $slug = get_post_field('post_name', $program_id);
        $title_anchor = sanitize_title(get_the_title($program_id));

        $lookup[$anchor] = $anchor;
        $lookup[$slug] = $anchor;
        $lookup[$title_anchor] = $anchor;
    }

    return $lookup;
}

/**
 * Resolve an anchor slug for a given program key
 */
function kidazzle_program_anchor_for_key($key)
{
    $lookup = kidazzle_get_program_anchor_lookup();
    $key = sanitize_title($key);

    return $lookup[$key] ?? $key;
}

/**
 * Program color class mapping
 */
function kidazzle_program_color_classes($color_key)
{
    $map = array(
        'kidazzle-teal' => array(
            'gradient_from' => 'from-kidazzle-teal/10',
            'gradient_to' => 'to-kidazzle-teal/5',
            'text' => 'text-kidazzle-teal',
            'button' => 'bg-kidazzle-teal',
        ),
        'kidazzle-red' => array(
            'gradient_from' => 'from-kidazzle-red/10',
            'gradient_to' => 'to-kidazzle-red/5',
            'text' => 'text-kidazzle-red',
            'button' => 'bg-kidazzle-red',
        ),
        'kidazzle-yellow' => array(
            'gradient_from' => 'from-kidazzle-yellow/10',
            'gradient_to' => 'to-kidazzle-yellow/5',
            'text' => 'text-kidazzle-yellow',
            'button' => 'bg-kidazzle-yellow',
        ),
        'kidazzle-blue' => array(
            'gradient_from' => 'from-kidazzle-blue/10',
            'gradient_to' => 'to-kidazzle-blue/5',
            'text' => 'text-kidazzle-blue',
            'button' => 'bg-kidazzle-blue',
        ),
        'kidazzle-green' => array(
            'gradient_from' => 'from-kidazzle-green/10',
            'gradient_to' => 'to-kidazzle-green/5',
            'text' => 'text-kidazzle-green',
            'button' => 'bg-kidazzle-green',
        ),
    );

    return $map[$color_key] ?? $map['kidazzle-teal'];
}

/**
 * Eyebrow Badge
 */
function kidazzle_eyebrow($text, $color = 'blue')
{
    $color_class = 'text-kidazzle-' . $color;
    echo '<span class="' . esc_attr($color_class) . ' font-bold tracking-[0.2em] text-[11px] uppercase mb-3 block">' . esc_html($text) . '</span>';
}

/**
 * Archive Pagination
 */
function kidazzle_archive_pagination()
{
    the_posts_pagination(array(
        'mid_size' => 2,
        'prev_text' => __('← Previous', 'kidazzle-theme'),
        'next_text' => __('Next →', 'kidazzle-theme'),
        'class' => 'flex items-center justify-center gap-2 mt-12',
    ));
}

/**
 * Location Address Line
 */
function kidazzle_location_address_line($post_id = null)
{
    $fields = kidazzle_get_location_fields($post_id);
    $address = $fields['address'];

    return $address ?: '';
}

/**
 * Location City State
 */
function kidazzle_location_city_state($post_id = null)
{
    $fields = kidazzle_get_location_fields($post_id);
    $city = $fields['city'];
    $state = $fields['state'];

    if (!$city) {
        return '';
    }

    return $city . ', ' . $state;
}

/**
 * Badge Helper
 */
function kidazzle_badge($text, $color = 'blue')
{
    $bg_class = 'bg-kidazzle-' . $color . '/10';
    $text_class = 'text-kidazzle-' . $color;

    echo '<span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold ' . esc_attr($bg_class . ' ' . $text_class) . '">';
    echo esc_html($text);
    echo '</span>';
}

/**
 * Sanitize and validate URL field
 * Supports both http(s) URLs and mailto links
 *
 * @param string $url The URL to sanitize
 * @return string Sanitized URL or empty string if invalid
 */
function kidazzle_sanitize_url_field($url)
{
    if (empty($url)) {
        return '';
    }

    $url = trim($url);

    // Check if it's a mailto link
    if (strpos($url, 'mailto:') === 0) {
        return sanitize_email(str_replace('mailto:', '', $url)) ? $url : '';
    }

    // Check if it's a tel link
    if (strpos($url, 'tel:') === 0) {
        return $url; // Tel links are generally safe
    }

    // Check if it's an anchor link (starting with #)
    if (strpos($url, '#') === 0) {
        return sanitize_text_field($url);
    }

    // For regular URLs, use esc_url_raw
    $sanitized = esc_url_raw($url, array('http', 'https'));

    // Validate that it's a proper URL
    if (filter_var($sanitized, FILTER_VALIDATE_URL)) {
        return $sanitized;
    }

    // If URL validation fails, return empty (don't save invalid URLs)
    return '';
}

/**
 * Check if location is currently open based on hours string
 *
 * @param string $hours_string e.g., "7am - 6pm"
 * @return boolean
 */
function kidazzle_is_location_open($hours_string)
{
    if (empty($hours_string)) {
        return false;
    }

    // Check for weekends (assume closed unless string says otherwise)
    $is_weekend = (date('N') >= 6);
    if ($is_weekend && stripos($hours_string, 'Sat') === false && stripos($hours_string, 'Sun') === false) {
        return false;
    }

    // Extract times
    // Look for patterns like "7am - 6pm", "7:00 AM - 6:00 PM"
    $parts = preg_split('/(-| to )/i', $hours_string);
    if (count($parts) !== 2) {
        return false;
    }

    $start_str = trim($parts[0]);
    $end_str = trim($parts[1]);

    // Clean up "Mon-Fri" etc from start string if present
    $start_str = preg_replace('/^[A-Za-z\-, ]+/', '', $start_str);

    $start_time = strtotime($start_str);
    $end_time = strtotime($end_str);
    $now = current_time('timestamp');

    if (!$start_time || !$end_time) {
        return false;
    }

    // Compare times (minutes from midnight)
    $current_minutes = (int) date('H', $now) * 60 + (int) date('i', $now);
    $start_minutes = (int) date('H', $start_time) * 60 + (int) date('i', $start_time);
    $end_minutes = (int) date('H', $end_time) * 60 + (int) date('i', $end_time);

    return ($current_minutes >= $start_minutes && $current_minutes < $end_minutes);
}

/**
 * Helper function to get region color from term meta
 */
function kidazzle_get_region_color_from_term($term_id)
{
    $color_bg = get_term_meta($term_id, 'region_color_bg', true);
    $color_text = get_term_meta($term_id, 'region_color_text', true);
    $color_border = get_term_meta($term_id, 'region_color_border', true);

    // Fallback to default green if no colors set
    return array(
        'bg' => $color_bg ?: 'kidazzle-greenLight',
        'text' => $color_text ?: 'kidazzle-green',
        'border' => $color_border ?: 'kidazzle-green',
    );
}

/**
 * Region Emoji Helper
 */
function kidazzle_region_emoji($label)
{
    $map = array(
        'Cobb County' => '🍑',
        'Gwinnett County' => '🌳',
        'North Metro' => '🏙️',
        'South Metro' => '⛰️',
    );

    return $map[$label] ?? '📍';
}
