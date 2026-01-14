<?php
/**
 * Global Scripts Customizer Settings
 *
 * @package Kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Global Scripts Customizer Settings
 */
function Kidazzle_scripts_customizer_settings($wp_customize)
{
    // Add Scripts Section
    $wp_customize->add_section('Kidazzle_scripts_settings', array(
        'title' => __('Global Scripts', 'kidazzle-theme'),
        'description' => __('Add custom scripts (Google Analytics, Pixels, etc.) to your site header and footer.', 'kidazzle-theme'),
        'priority' => 120,
    ));

    // Header Scripts (wp_head)
    $wp_customize->add_setting('Kidazzle_header_scripts', array(
        'default' => '',
        'sanitize_callback' => 'Kidazzle_sanitize_scripts', // Custom callback to allow tags
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('Kidazzle_header_scripts', array(
        'label' => __('Header Scripts (Head)', 'kidazzle-theme'),
        'description' => __('These scripts will be printed in the &lt;head&gt; section. Use for Google Analytics, GTM, etc.', 'kidazzle-theme'),
        'section' => 'Kidazzle_scripts_settings',
        'type' => 'textarea',
        'input_attrs' => array(
            'class' => 'code', // specific font for code
            'rows' => 10,
        ),
    ));

    // Footer Scripts (wp_footer)
    $wp_customize->add_setting('Kidazzle_footer_scripts', array(
        'default' => '',
        'sanitize_callback' => 'Kidazzle_sanitize_scripts', 
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('Kidazzle_footer_scripts', array(
        'label' => __('Footer Scripts (Body End)', 'kidazzle-theme'),
        'description' => __('These scripts will be printed before the closing &lt;/body&gt; tag.', 'kidazzle-theme'),
        'section' => 'Kidazzle_scripts_settings',
        'type' => 'textarea',
        'input_attrs' => array(
            'class' => 'code',
            'rows' => 10,
        ),
    ));
}
add_action('customize_register', 'Kidazzle_scripts_customizer_settings');

/**
 * Sanitize callback for scripts (allow standard HTML/JS)
 */
function Kidazzle_sanitize_scripts($input) {
    if (current_user_can('unfiltered_html')) {
        return $input;
    }
    return wp_kses_post($input); // Fallback for lower permission users
}

/**
 * Output Header Scripts
 */
function Kidazzle_output_header_scripts() {
    $scripts = get_theme_mod('Kidazzle_header_scripts');
    if ($scripts) {
        echo "<!-- Global Header Scripts -->\n";
        echo $scripts . "\n";
        echo "<!-- End Global Header Scripts -->\n";
    }
}
add_action('wp_head', 'Kidazzle_output_header_scripts', 1);

/**
 * Output Footer Scripts
 */
function Kidazzle_output_footer_scripts() {
    $scripts = get_theme_mod('Kidazzle_footer_scripts');
    if ($scripts) {
        echo "<!-- Global Footer Scripts -->\n";
        echo $scripts . "\n";
        echo "<!-- End Global Footer Scripts -->\n";
    }
}
add_action('wp_footer', 'Kidazzle_output_footer_scripts', 99);
