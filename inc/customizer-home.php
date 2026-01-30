<?php
/**
 * Homepage Customizer Settings
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Homepage Customizer Settings
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function wimper_home_customize_register(WP_Customize_Manager $wp_customize)
{

    // Add Homepage Panel
    $wp_customize->add_panel('wimper_home_panel', array(
        'title' => __('WIMPER Homepage', 'wimper-theme'),
        'description' => __('Customize the homepage sections, stats, and content.', 'wimper-theme'),
        'priority' => 130, // Display after core sections
    ));

    // -----------------------------------------------------------------------------
    // Hero Section
    // -----------------------------------------------------------------------------
    $wp_customize->add_section('wimper_home_hero_section', array(
        'title' => __('Hero', 'wimper-theme'),
        'panel' => 'wimper_home_panel',
    ));

    $defaults = wimper_home_default_hero();

    // Heading
    $wp_customize->add_setting('wimper_home_hero_heading', array(
        'default' => $defaults['heading'],
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('wimper_home_hero_heading', array(
        'label' => __('Hero Heading', 'wimper-theme'),
        'section' => 'wimper_home_hero_section',
        'type' => 'textarea',
    ));

    // Subheading
    $wp_customize->add_setting('wimper_home_hero_subheading', array(
        'default' => $defaults['subheading'],
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('wimper_home_hero_subheading', array(
        'label' => __('Hero Subheading', 'wimper-theme'),
        'section' => 'wimper_home_hero_section',
        'type' => 'textarea',
    ));

    // CTA Label
    $wp_customize->add_setting('wimper_home_hero_cta_label', array(
        'default' => $defaults['cta_label'],
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('wimper_home_hero_cta_label', array(
        'label' => __('CTA Button Label', 'wimper-theme'),
        'section' => 'wimper_home_hero_section',
        'type' => 'text',
    ));

    // CTA URL
    $wp_customize->add_setting('wimper_home_hero_cta_url', array(
        'default' => $defaults['cta_url'],
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('wimper_home_hero_cta_url', array(
        'label' => __('CTA Button URL', 'wimper-theme'),
        'section' => 'wimper_home_hero_section',
        'type' => 'text',
    ));


    // -----------------------------------------------------------------------------
    // Stats Section
    // -----------------------------------------------------------------------------
    $wp_customize->add_section('wimper_home_stats_section', array(
        'title' => __('Stats', 'wimper-theme'),
        'panel' => 'wimper_home_panel',
    ));

    $wp_customize->add_setting('wimper_home_stats_json', array(
        'default' => json_encode(wimper_home_default_stats()),
        'sanitize_callback' => 'wp_kses_post', // JSON string
    ));

    $wp_customize->add_control('wimper_home_stats_json', array(
        'label' => __('Stats Data (JSON)', 'wimper-theme'),
        'description' => __('Edit this JSON array to change stats. Array of objects with value and label.', 'wimper-theme'),
        'section' => 'wimper_home_stats_section',
        'type' => 'textarea',
        // In a real implementation, we'd use a repeater control here.
    ));


    // -----------------------------------------------------------------------------
    // Curriculum Section
    // -----------------------------------------------------------------------------
    $wp_customize->add_section('wimper_home_curriculum_section', array(
        'title' => __('Curriculum Panels', 'wimper-theme'),
        'panel' => 'wimper_home_panel',
    ));

    $curri_defaults = wimper_home_default_curriculum();
    $feature = $curri_defaults['feature'];

    // Feature Eyebrow
    $wp_customize->add_setting('wimper_home_curriculum_eyebrow', array(
        'default' => $feature['eyebrow'],
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('wimper_home_curriculum_eyebrow', array(
        'label' => __('Feature Eyebrow', 'wimper-theme'),
        'section' => 'wimper_home_curriculum_section',
        'type' => 'text',
    ));

    // Feature Heading
    $wp_customize->add_setting('wimper_home_curriculum_heading', array(
        'default' => $feature['heading'],
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('wimper_home_curriculum_heading', array(
        'label' => __('Feature Heading', 'wimper-theme'),
        'section' => 'wimper_home_curriculum_section',
        'type' => 'text',
    ));


    // -----------------------------------------------------------------------------
    // Program Wizard Options (Age Groups)
    // -----------------------------------------------------------------------------
    $wp_customize->add_section('wimper_home_wizard_section', array(
        'title' => __('Program Wizard Options', 'wimper-theme'),
        'panel' => 'wimper_home_panel',
    ));

    $wp_customize->add_setting('wimper_home_program_wizard_json', array(
        'default' => json_encode(wimper_home_default_program_wizard_options()),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('wimper_home_program_wizard_json', array(
        'label' => __('Wizard Options (JSON)', 'wimper-theme'),
        'description' => __('Array of key, emoji, label, description, link.', 'wimper-theme'),
        'section' => 'wimper_home_wizard_section',
        'type' => 'textarea',
    ));


    // -----------------------------------------------------------------------------
    // Curriculum Profiles (Chart)
    // -----------------------------------------------------------------------------
    $wp_customize->add_section('wimper_home_profiles_section', array(
        'title' => __('Curriculum Profiles (Chart)', 'wimper-theme'),
        'panel' => 'wimper_home_panel',
    ));

    $profiles_defaults = wimper_home_default_curriculum_profiles();

    $wp_customize->add_setting('wimper_home_curriculum_profiles_json', array(
        'default' => json_encode($profiles_defaults['profiles']),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('wimper_home_curriculum_profiles_json', array(
        'label' => __('Profiles Data (JSON)', 'wimper-theme'),
        'description' => __('Array of profiles with data points for the radar chart.', 'wimper-theme'),
        'section' => 'wimper_home_profiles_section',
        'type' => 'textarea',
    ));


    // -----------------------------------------------------------------------------
    // FAQ Section
    // -----------------------------------------------------------------------------
    $wp_customize->add_section('wimper_home_faq_section', array(
        'title' => __('FAQ', 'wimper-theme'),
        'panel' => 'wimper_home_panel',
    ));

    $faq_defaults = wimper_home_default_faq();

    $wp_customize->add_setting('wimper_home_faq_heading', array(
        'default' => $faq_defaults['heading'],
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('wimper_home_faq_heading', array(
        'label' => __('FAQ Heading', 'wimper-theme'),
        'section' => 'wimper_home_faq_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('wimper_home_faq_items_json', array(
        'default' => json_encode(wimper_home_default_faq_items()),
        'sanitize_callback' => 'wp_kses_post',
    ));
    $wp_customize->add_control('wimper_home_faq_items_json', array(
        'label' => __('FAQ Items (JSON)', 'wimper-theme'),
        'section' => 'wimper_home_faq_section',
        'type' => 'textarea',
    ));

}
add_action('customize_register', 'wimper_home_customize_register');
