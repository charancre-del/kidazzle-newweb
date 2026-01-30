<?php
/**
 * SEO & Social Customizer Settings
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register SEO Customizer Settings
 */
function wimper_seo_customizer_settings($wp_customize)
{
    // Add SEO Section
    $wp_customize->add_section('wimper_seo_settings', [
        'title' => __('SEO & Social', 'wimper-theme'),
        'description' => __('Manage default SEO settings and social sharing cards.', 'wimper-theme'),
        'priority' => 120,
    ]);

    // Twitter Site Handle
    $wp_customize->add_setting('wimper_twitter_site', [
        'default' => '',
        'sanitize_callback' => 'wimper_sanitize_twitter_handle',
    ]);

    $wp_customize->add_control('wimper_twitter_site', [
        'label' => __('Twitter Site Handle', 'wimper-theme'),
        'description' => __('e.g., @wimper', 'wimper-theme'),
        'section' => 'wimper_seo_settings',
        'type' => 'text',
    ]);

    // Twitter Creator Handle
    $wp_customize->add_setting('wimper_twitter_creator', [
        'default' => '',
        'sanitize_callback' => 'wimper_sanitize_twitter_handle',
    ]);

    $wp_customize->add_control('wimper_twitter_creator', [
        'label' => __('Twitter Creator Handle', 'wimper-theme'),
        'description' => __('e.g., @founder', 'wimper-theme'),
        'section' => 'wimper_seo_settings',
        'type' => 'text',
    ]);

    // Twitter Card Type
    $wp_customize->add_setting('wimper_twitter_card_type', [
        'default' => 'summary_large_image',
        'sanitize_callback' => 'sanitize_key',
    ]);

    $wp_customize->add_control('wimper_twitter_card_type', [
        'label' => __('Twitter Card Type', 'wimper-theme'),
        'section' => 'wimper_seo_settings',
        'type' => 'select',
        'choices' => [
            'summary' => 'Summary',
            'summary_large_image' => 'Summary Large Image',
        ],
    ]);

    // Facebook App ID
    $wp_customize->add_setting('wimper_facebook_app_id', [
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('wimper_facebook_app_id', [
        'label' => __('Facebook App ID', 'wimper-theme'),
        'description' => __('Numeric App ID for Open Graph Insights.', 'wimper-theme'),
        'section' => 'wimper_seo_settings',
        'type' => 'text',
    ]);

    // Default OG Image
    $wp_customize->add_setting('wimper_default_og_image', [
        'default' => '',
        'sanitize_callback' => 'absint', // Media ID
    ]);

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'wimper_default_og_image', [
        'label' => __('Default Social Share Image', 'wimper-theme'),
        'description' => __('Fallback image for pages without a featured image. Recommended: 1200x630px.', 'wimper-theme'),
        'section' => 'wimper_seo_settings',
        'mime_type' => 'image',
    ]));

    // Social Profiles
    $wp_customize->add_setting('wimper_social_facebook', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('wimper_social_facebook', [
        'label' => __('Facebook URL', 'wimper-theme'),
        'section' => 'wimper_seo_settings',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('wimper_social_instagram', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('wimper_social_instagram', [
        'label' => __('Instagram URL', 'wimper-theme'),
        'section' => 'wimper_seo_settings',
        'type' => 'url',
    ]);

    $wp_customize->add_setting('wimper_social_linkedin', [
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ]);
    $wp_customize->add_control('wimper_social_linkedin', [
        'label' => __('LinkedIn URL', 'wimper-theme'),
        'section' => 'wimper_seo_settings',
        'type' => 'url',
    ]);
}
add_action('customize_register', 'wimper_seo_customizer_settings');

/**
 * Sanitize Twitter Handle
 */
function wimper_sanitize_twitter_handle($handle)
{
    $handle = sanitize_text_field($handle);
    // Ensure @ prefix exists if not empty
    if ($handle && substr($handle, 0, 1) !== '@') {
        $handle = '@' . $handle;
    }
    return $handle;
}

/**
 * Output Social Meta Tags (Fallback)
 * Note: Main SEO is handled by wimper_seo_engine. This is for theme support.
 */
function wimper_output_social_meta_tags()
{
    // Check if SEO engine is disabled or basic metatags needed
    // Logic can be expanded here. For now, we trust seopress/yoast or our engine.
    // This function can be used to inject fallback generic site-wide meta if needed.
}
add_action('wp_head', 'wimper_output_social_meta_tags', 5);
