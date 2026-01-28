<?php
/**
 * SEO & Social Customizer Settings
 * Twitter, Facebook, Open Graph settings
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register SEO Customizer Settings
 */
function kidazzle_seo_customizer_settings($wp_customize) {
    
    // Add SEO Section
    $wp_customize->add_section('kidazzle_seo_settings', [
        'title'       => __('SEO & Social', 'kidazzle-theme'),
        'description' => __('Configure Twitter Cards, Open Graph, and other SEO settings.', 'kidazzle-theme'),
        'priority'    => 35,
    ]);
    
    // =========================================
    // Twitter Settings
    // =========================================
    
    // Twitter Site Handle
    $wp_customize->add_setting('kidazzle_twitter_site', [
        'default'           => '',
        'sanitize_callback' => 'kidazzle_sanitize_twitter_handle',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control('kidazzle_twitter_site', [
        'label'       => __('Twitter Site Handle', 'kidazzle-theme'),
        'description' => __('Your Twitter/X handle (e.g., @Kidazzleela or Kidazzleela). Used for twitter:site meta tag.', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
        'type'        => 'text',
        'input_attrs' => [
            'placeholder' => '@Kidazzleela',
        ],
    ]);
    
    // Twitter Card Type
    $wp_customize->add_setting('kidazzle_twitter_card_type', [
        'default'           => 'summary_large_image',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control('kidazzle_twitter_card_type', [
        'label'       => __('Twitter Card Type', 'kidazzle-theme'),
        'description' => __('Choose how your links appear when shared on Twitter/X.', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
        'type'        => 'select',
        'choices'     => [
            'summary'             => __('Summary (small image)', 'kidazzle-theme'),
            'summary_large_image' => __('Summary with Large Image', 'kidazzle-theme'),
        ],
    ]);
    
    // =========================================
    // Facebook / Open Graph Settings
    // =========================================
    
    // Facebook App ID
    $wp_customize->add_setting('kidazzle_fb_app_id', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control('kidazzle_fb_app_id', [
        'label'       => __('Facebook App ID', 'kidazzle-theme'),
        'description' => __('Optional. Used for Facebook Insights.', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
        'type'        => 'text',
        'input_attrs' => [
            'placeholder' => '123456789012345',
        ],
    ]);
    
    // Default OG Image
    $wp_customize->add_setting('kidazzle_default_og_image', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'kidazzle_default_og_image', [
        'label'       => __('Default Social Share Image', 'kidazzle-theme'),
        'description' => __('Default image for social sharing when a post has no featured image. Recommended: 1200x630px.', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
    ]));
    
    // =========================================
    // Organization Social Links
    // =========================================
    
    // Facebook Page URL
    $wp_customize->add_setting('kidazzle_facebook_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control('kidazzle_facebook_url', [
        'label'       => __('Facebook Page URL', 'kidazzle-theme'),
        'description' => __('Your Facebook page URL. Used in Organization schema sameAs.', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
        'type'        => 'url',
        'input_attrs' => [
            'placeholder' => 'https://facebook.com/Kidazzleela',
        ],
    ]);
    
    // Instagram URL
    $wp_customize->add_setting('kidazzle_instagram_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control('kidazzle_instagram_url', [
        'label'       => __('Instagram URL', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
        'type'        => 'url',
        'input_attrs' => [
            'placeholder' => 'https://instagram.com/Kidazzleela',
        ],
    ]);
    
    // LinkedIn URL
    $wp_customize->add_setting('kidazzle_linkedin_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control('kidazzle_linkedin_url', [
        'label'       => __('LinkedIn URL', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
        'type'        => 'url',
        'input_attrs' => [
            'placeholder' => 'https://linkedin.com/company/Kidazzleela',
        ],
    ]);
    
    // YouTube URL
    $wp_customize->add_setting('kidazzle_youtube_url', [
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control('kidazzle_youtube_url', [
        'label'       => __('YouTube URL', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
        'type'        => 'url',
        'input_attrs' => [
            'placeholder' => 'https://youtube.com/@Kidazzleela',
        ],
    ]);
    
    // =========================================
    // Advanced SEO Settings (Rank #1)
    // =========================================
    
    // Brand Phonetic Name (Tier 12 - TT)
    $wp_customize->add_setting('kidazzle_global_brand_phonetic', [
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control('kidazzle_global_brand_phonetic', [
        'label'       => __('Brand Phonetic Name', 'kidazzle-theme'),
        'description' => __('How your brand is pronounced (for voice search). E.g., "KROH-muh Early Learning"', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
        'type'        => 'text',
        'input_attrs' => [
            'placeholder' => 'KROH-muh Early Learning',
        ],
    ]);
    
    // Footer SEO Text (Tier 12 - SS)
    $wp_customize->add_setting('kidazzle_footer_seo_text', [
        'default'           => '',
        'sanitize_callback' => 'wp_kses_post',
        'transport'         => 'refresh',
    ]);
    
    $wp_customize->add_control('kidazzle_footer_seo_text', [
        'label'       => __('Footer SEO Text (NLP)', 'kidazzle-theme'),
        'description' => __('Proximity-based footer copy for local SEO. Include city names and "near me" keywords.', 'kidazzle-theme'),
        'section'     => 'kidazzle_seo_settings',
        'type'        => 'textarea',
    ]);
}
add_action('customize_register', 'kidazzle_seo_customizer_settings');

/**
 * Sanitize Twitter handle
 */
function kidazzle_sanitize_twitter_handle($handle) {
    $handle = sanitize_text_field($handle);
    // Remove @ if present, we'll add it back when outputting
    $handle = ltrim($handle, '@');
    return $handle;
}

/**
 * Get formatted Twitter handle with @
 */
function kidazzle_get_twitter_handle() {
    $handle = get_theme_mod('kidazzle_twitter_site', '');
    if (empty($handle)) {
        return '';
    }
    return '@' . ltrim($handle, '@');
}

/**
 * Output Twitter and Open Graph meta tags
 */
function kidazzle_output_social_meta_tags() {
    $twitter_site = kidazzle_get_twitter_handle();
    $twitter_card = get_theme_mod('kidazzle_twitter_card_type', 'summary_large_image');
    $fb_app_id = get_theme_mod('kidazzle_fb_app_id', '');
    $default_og_image = get_theme_mod('kidazzle_default_og_image', '');
    
    // Get current page data
    $title = wp_get_document_title();
    $description = '';
    $image = $default_og_image;
    $url = get_permalink();
    $type = 'website';
    
    if (is_singular()) {
        $post = get_post();
        $description = get_the_excerpt($post);
        if (has_post_thumbnail($post)) {
            $image = get_the_post_thumbnail_url($post, 'large');
        }
        $type = is_singular('post') ? 'article' : 'website';
        $url = get_permalink($post);
    } elseif (is_home() || is_front_page()) {
        $description = get_bloginfo('description');
        $url = home_url('/');
    } elseif (is_archive()) {
        $description = get_the_archive_description();
        $url = get_post_type_archive_link(get_post_type());
    }
    
    // Fallback description
    if (empty($description)) {
        $description = get_bloginfo('description');
    }
    
    // Truncate description
    $description = wp_trim_words(strip_tags($description), 30, '...');
    
    // Output Twitter Card tags
    echo "\n<!-- Twitter Card Meta -->\n";
    echo '<meta name="twitter:card" content="' . esc_attr($twitter_card) . '">' . "\n";
    
    if ($twitter_site) {
        echo '<meta name="twitter:site" content="' . esc_attr($twitter_site) . '">' . "\n";
        // Also output creator if single post
        if (is_singular('post')) {
            $author_twitter = get_the_author_meta('twitter');
            if ($author_twitter) {
                echo '<meta name="twitter:creator" content="@' . esc_attr(ltrim($author_twitter, '@')) . '">' . "\n";
            } else {
                echo '<meta name="twitter:creator" content="' . esc_attr($twitter_site) . '">' . "\n";
            }
        }
    }
    
    echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
    
    if ($image) {
        echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
    }
    
    // Output Open Graph tags
    echo "\n<!-- Open Graph Meta -->\n";
    echo '<meta property="og:type" content="' . esc_attr($type) . '">' . "\n";
    echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
    echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
    echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
    echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
    
    if ($image) {
        echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
        echo '<meta property="og:image:width" content="1200">' . "\n";
        echo '<meta property="og:image:height" content="630">' . "\n";
    }
    
    if ($fb_app_id) {
        echo '<meta property="fb:app_id" content="' . esc_attr($fb_app_id) . '">' . "\n";
    }
    
    // Article-specific OG tags
    if (is_singular('post')) {
        echo '<meta property="article:published_time" content="' . esc_attr(get_the_date('c')) . '">' . "\n";
        echo '<meta property="article:modified_time" content="' . esc_attr(get_the_modified_date('c')) . '">' . "\n";
        echo '<meta property="article:author" content="' . esc_attr(get_the_author()) . '">' . "\n";
    }
}
add_action('wp_head', 'kidazzle_output_social_meta_tags', 5);

/**
 * Get all social URLs for schema sameAs
 */
function kidazzle_get_social_urls() {
    $urls = [];
    
    $platforms = [
        'kidazzle_twitter_site'  => 'https://twitter.com/',
        'kidazzle_facebook_url'  => '',
        'kidazzle_instagram_url' => '',
        'kidazzle_linkedin_url'  => '',
        'kidazzle_youtube_url'   => '',
    ];
    
    foreach ($platforms as $mod => $prefix) {
        $value = get_theme_mod($mod, '');
        if (empty($value)) continue;
        
        if ($mod === 'kidazzle_twitter_site') {
            // Twitter handle needs to be converted to URL
            $urls[] = $prefix . ltrim($value, '@');
        } else {
            $urls[] = $value;
        }
    }
    
    return array_filter($urls);
}
