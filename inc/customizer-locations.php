<?php
/**
 * Locations Customizer Settings
 *
 * @package kidazzle_Theme
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Locations Settings
 */
function kidazzle_customize_locations($wp_customize)
{

    // Section: Locations Archive
    $wp_customize->add_section('kidazzle_locations_settings', array(
        'title' => __('Locations Archive', 'kidazzle-theme'),
        'description' => __('Customize the title, subtitle, and labels for the Locations page.', 'kidazzle-theme'),
        'priority' => 130,
    ));

    // Setting: Archive Title
    $wp_customize->add_setting('kidazzle_locations_archive_title', array(
        'default' => 'Find your Kidazzle <span class="text-kidazzle-green italic">Community</span> - Our Locations',
        'sanitize_callback' => 'kidazzle_sanitize_raw_html', // Allow HTML for spans
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('kidazzle_locations_archive_title', array(
        'label' => __('Archive Page Title', 'kidazzle-theme'),
        'description' => __('The main H1 title on the Locations page. HTML allowed.', 'kidazzle-theme'),
        'section' => 'kidazzle_locations_settings',
        'type' => 'textarea',
    ));

    // Setting: Archive Subtitle
    $wp_customize->add_setting('kidazzle_locations_archive_subtitle', array(
        'default' => 'Serving families across Metro Atlanta with the same high standards of safety, curriculum, and care at every single location.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('kidazzle_locations_archive_subtitle', array(
        'label' => __('Archive Page Subtitle', 'kidazzle-theme'),
        'description' => __('The subtitle text below the main title.', 'kidazzle-theme'),
        'section' => 'kidazzle_locations_settings',
        'type' => 'textarea',
    ));

    // Setting: "All Locations" Label
    $wp_customize->add_setting('kidazzle_locations_label', array(
        'default' => 'All Locations',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('kidazzle_locations_label', array(
        'label' => __('"All Locations" Label', 'kidazzle-theme'),
        'description' => __('The label used for buttons and filters (e.g., "All Areas", "View All Locations").', 'kidazzle-theme'),
        'section' => 'kidazzle_locations_settings',
        'type' => 'text',
    ));

    // Setting: Badge Fallback Text
    $wp_customize->add_setting('kidazzle_locations_badge_fallback', array(
        'default' => 'Now Enrolling',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('kidazzle_locations_badge_fallback', array(
        'label' => __('Badge Fallback Text', 'kidazzle-theme'),
        'description' => __('Text to show on the location card badge if not "New Campus" (e.g., "Now Enrolling").', 'kidazzle-theme'),
        'section' => 'kidazzle_locations_settings',
        'type' => 'text',
        'input_attrs' => array(
            'placeholder' => 'now enrolling',
        ),
    ));

    // Setting: Open Now Text
    $wp_customize->add_setting('kidazzle_locations_open_text', array(
        'default' => 'Open Now',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('kidazzle_locations_open_text', array(
        'label' => __('"Open Now" Text', 'kidazzle-theme'),
        'description' => __('Text displayed next to the pulsing dot when location is open.', 'kidazzle-theme'),
        'section' => 'kidazzle_locations_settings',
        'type' => 'text',
    ));

}
add_action('customize_register', 'kidazzle_customize_locations');
