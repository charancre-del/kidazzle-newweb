<?php
/**
 * Customizer controls for homepage content
 *
 * @package kidazzle_Excellence
 */

if ( ! defined( 'ABSPATH' ) ) {
return;
}

/**
 * Ensure JSON textareas round-trip cleanly.
 */
function kidazzle_home_sanitize_json_setting( $value ) {
if ( empty( $value ) ) {
return '';
}

$data = json_decode( $value, true );

if ( JSON_ERROR_NONE !== json_last_error() || ! is_array( $data ) ) {
return '';
}

return wp_json_encode( $data );
}

/**
 * Register homepage customization controls.
 */
function kidazzle_home_customize_register( WP_Customize_Manager $wp_customize ) {
$wp_customize->add_panel(
'kidazzle_home_panel',
array(
'title'       => __( 'Kidazzle Homepage', 'kidazzle-theme' ),
'description' => __( 'Adjust hero copy, stats, and JSON-driven homepage sections.', 'kidazzle-theme' ),
'priority'    => 132,
)
);

// Hero section.
$wp_customize->add_section(
'kidazzle_home_hero_section',
array(
'title' => __( 'Hero', 'kidazzle-theme' ),
'panel' => 'kidazzle_home_panel',
)
);

$hero_defaults = kidazzle_home_default_hero();

$wp_customize->add_setting( 'kidazzle_home_hero_heading', array( 'default' => $hero_defaults['heading'], 'sanitize_callback' => 'wp_kses_post' ) );
$wp_customize->add_control( 'kidazzle_home_hero_heading', array( 'label' => __( 'Heading (supports basic HTML)', 'kidazzle-theme' ), 'section' => 'kidazzle_home_hero_section', 'type' => 'textarea' ) );

$wp_customize->add_setting( 'kidazzle_home_hero_subheading', array( 'default' => $hero_defaults['subheading'], 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_hero_subheading', array( 'label' => __( 'Subheading', 'kidazzle-theme' ), 'section' => 'kidazzle_home_hero_section', 'type' => 'textarea' ) );

$wp_customize->add_setting( 'kidazzle_home_hero_cta_label', array( 'default' => $hero_defaults['cta_label'], 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_hero_cta_label', array( 'label' => __( 'Primary CTA label', 'kidazzle-theme' ), 'section' => 'kidazzle_home_hero_section', 'type' => 'text' ) );

$wp_customize->add_setting( 'kidazzle_home_hero_cta_url', array( 'default' => $hero_defaults['cta_url'], 'sanitize_callback' => 'esc_url_raw' ) );
$wp_customize->add_control( 'kidazzle_home_hero_cta_url', array( 'label' => __( 'Primary CTA URL', 'kidazzle-theme' ), 'section' => 'kidazzle_home_hero_section', 'type' => 'url' ) );

$wp_customize->add_setting( 'kidazzle_home_hero_secondary_label', array( 'default' => $hero_defaults['secondary_label'], 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_hero_secondary_label', array( 'label' => __( 'Secondary CTA label', 'kidazzle-theme' ), 'section' => 'kidazzle_home_hero_section', 'type' => 'text' ) );

$wp_customize->add_setting( 'kidazzle_home_hero_secondary_url', array( 'default' => $hero_defaults['secondary_url'], 'sanitize_callback' => 'esc_url_raw' ) );
$wp_customize->add_control( 'kidazzle_home_hero_secondary_url', array( 'label' => __( 'Secondary CTA URL', 'kidazzle-theme' ), 'section' => 'kidazzle_home_hero_section', 'type' => 'url' ) );

// Stats JSON.
$wp_customize->add_section(
'kidazzle_home_stats_section',
array(
'title' => __( 'Stats Strip', 'kidazzle-theme' ),
'panel' => 'kidazzle_home_panel',
)
);

$wp_customize->add_setting(
'kidazzle_home_stats_json',
array(
'default'           => wp_json_encode( kidazzle_home_default_stats() ),
'sanitize_callback' => 'kidazzle_home_sanitize_json_setting',
)
);

$wp_customize->add_control(
'kidazzle_home_stats_json',
array(
'label'       => __( 'Stats JSON (value/label pairs)', 'kidazzle-theme' ),
'description' => __( 'Example: [{"value":"19+","label":"Metro campuses"}]', 'kidazzle-theme' ),
'section'     => 'kidazzle_home_stats_section',
'type'        => 'textarea',
)
);

// KIDazzle Creative Curriculum copy + cards JSON.
$wp_customize->add_section(
'kidazzle_home_curriculum_section',
array(
'title' => __( 'KIDazzle Creative Curriculum', 'kidazzle-theme' ),
'panel' => 'kidazzle_home_panel',
)
);

$curriculum = kidazzle_home_default_curriculum();

$wp_customize->add_setting( 'kidazzle_home_curriculum_eyebrow', array( 'default' => $curriculum['feature']['eyebrow'], 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_curriculum_eyebrow', array( 'label' => __( 'Eyebrow', 'kidazzle-theme' ), 'section' => 'kidazzle_home_curriculum_section', 'type' => 'text' ) );

$wp_customize->add_setting( 'kidazzle_home_curriculum_heading', array( 'default' => $curriculum['feature']['heading'], 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_curriculum_heading', array( 'label' => __( 'Heading', 'kidazzle-theme' ), 'section' => 'kidazzle_home_curriculum_section', 'type' => 'text' ) );

$wp_customize->add_setting( 'kidazzle_home_curriculum_cta_label', array( 'default' => $curriculum['feature']['cta_label'], 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_curriculum_cta_label', array( 'label' => __( 'CTA label', 'kidazzle-theme' ), 'section' => 'kidazzle_home_curriculum_section', 'type' => 'text' ) );

$wp_customize->add_setting( 'kidazzle_home_curriculum_cta_url', array( 'default' => $curriculum['feature']['cta_url'], 'sanitize_callback' => 'esc_url_raw' ) );
$wp_customize->add_control( 'kidazzle_home_curriculum_cta_url', array( 'label' => __( 'CTA URL', 'kidazzle-theme' ), 'section' => 'kidazzle_home_curriculum_section', 'type' => 'url' ) );

$wp_customize->add_setting(
'kidazzle_home_curriculum_cards_json',
array(
'default'           => wp_json_encode( $curriculum['cards'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES ),
'sanitize_callback' => 'kidazzle_home_sanitize_json_setting',
)
);

$wp_customize->add_control(
'kidazzle_home_curriculum_cards_json',
array(
'label'       => __( 'Cards JSON (badge, heading, text, button, url, icons)', 'kidazzle-theme' ),
'description' => __( 'Icon fields: "icon" for simple cards, or "icon_bg"/"icon_badge"/"icon_check" for complex cards. Use Font Awesome 6 classes: fa-solid fa-heart, fa-brands fa-connectdevelop', 'kidazzle-theme' ),
'section'     => 'kidazzle_home_curriculum_section',
'type'        => 'textarea',
)
);

$wp_customize->add_setting( 'kidazzle_home_curriculum_readiness_heading', array( 'default' => $curriculum['readiness']['heading'], 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_curriculum_readiness_heading', array( 'label' => __( 'Readiness heading', 'kidazzle-theme' ), 'section' => 'kidazzle_home_curriculum_section', 'type' => 'text' ) );

$wp_customize->add_setting( 'kidazzle_home_curriculum_readiness_desc', array( 'default' => $curriculum['readiness']['description'], 'sanitize_callback' => 'sanitize_textarea_field' ) );
$wp_customize->add_control( 'kidazzle_home_curriculum_readiness_desc', array( 'label' => __( 'Readiness description', 'kidazzle-theme' ), 'section' => 'kidazzle_home_curriculum_section', 'type' => 'textarea' ) );

// Program wizard JSON.
$wp_customize->add_section(
'kidazzle_home_programs_section',
array(
'title' => __( 'Program Wizard', 'kidazzle-theme' ),
'panel' => 'kidazzle_home_panel',
)
);

$wp_customize->add_setting(
'kidazzle_home_program_wizard_json',
array(
'default'           => wp_json_encode( kidazzle_home_default_program_wizard_options() ),
'sanitize_callback' => 'kidazzle_home_sanitize_json_setting',
)
);

$wp_customize->add_control(
'kidazzle_home_program_wizard_json',
array(
'label'       => __( 'Program options JSON', 'kidazzle-theme' ),
'description' => __( 'Example: [{"key":"infant","emoji":"👶","label":"Infant\\n(6 weeks–12m)","description":"..."}]', 'kidazzle-theme' ),
'section'     => 'kidazzle_home_programs_section',
'type'        => 'textarea',
)
);

// Curriculum profiles JSON.
$wp_customize->add_section(
'kidazzle_home_curriculum_section',
array(
'title' => __( 'Curriculum Radar', 'kidazzle-theme' ),
'panel' => 'kidazzle_home_panel',
)
);

$wp_customize->add_setting(
'kidazzle_home_curriculum_profiles_json',
array(
'default'           => wp_json_encode( kidazzle_home_default_curriculum_profiles()['profiles'] ),
'sanitize_callback' => 'kidazzle_home_sanitize_json_setting',
)
);

$wp_customize->add_control(
'kidazzle_home_curriculum_profiles_json',
array(
'label'       => __( 'Curriculum profiles JSON', 'kidazzle-theme' ),
'description' => __( 'Example: [{"key":"infant","title":"Foundation Phase","color":"#D67D6B","data":[90,90,40,15,40]}]', 'kidazzle-theme' ),
'section'     => 'kidazzle_home_curriculum_section',
'type'        => 'textarea',
)
);

// Schedule JSON.
$wp_customize->add_section(
'kidazzle_home_schedule_section',
array(
'title' => __( 'Schedule Tabs', 'kidazzle-theme' ),
'panel' => 'kidazzle_home_panel',
)
);

$wp_customize->add_setting(
'kidazzle_home_schedule_tracks_json',
array(
'default'           => wp_json_encode( kidazzle_home_default_schedule_tracks() ),
'sanitize_callback' => 'kidazzle_home_sanitize_json_setting',
)
);

$wp_customize->add_control(
'kidazzle_home_schedule_tracks_json',
array(
'label'       => __( 'Schedule JSON', 'kidazzle-theme' ),
'description' => __( 'Example: [{"key":"infant","title":"The Nurturing Nest","steps":[{"time":"AM","title":"Warm Welcome"}]}]', 'kidazzle-theme' ),
'section'     => 'kidazzle_home_schedule_section',
'type'        => 'textarea',
)
);

// FAQ JSON + heading.
$wp_customize->add_section(
'kidazzle_home_faq_section',
array(
'title' => __( 'FAQ', 'kidazzle-theme' ),
'panel' => 'kidazzle_home_panel',
)
);

$faq_defaults = kidazzle_home_default_faq();

$wp_customize->add_setting( 'kidazzle_home_faq_heading', array( 'default' => $faq_defaults['heading'], 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_faq_heading', array( 'label' => __( 'FAQ heading', 'kidazzle-theme' ), 'section' => 'kidazzle_home_faq_section', 'type' => 'text' ) );

$wp_customize->add_setting( 'kidazzle_home_faq_subheading', array( 'default' => $faq_defaults['subheading'], 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_faq_subheading', array( 'label' => __( 'FAQ subheading', 'kidazzle-theme' ), 'section' => 'kidazzle_home_faq_section', 'type' => 'textarea' ) );

$wp_customize->add_setting(
'kidazzle_home_faq_items_json',
array(
'default'           => wp_json_encode( $faq_defaults['items'] ),
'sanitize_callback' => 'kidazzle_home_sanitize_json_setting',
)
);

$wp_customize->add_control(
'kidazzle_home_faq_items_json',
array(
'label'       => __( 'FAQ JSON (question/answer)', 'kidazzle-theme' ),
'description' => __( 'Example: [{"question":"Do you offer GA Lottery Pre-K?","answer":"Yes..."}]', 'kidazzle-theme' ),
'section'     => 'kidazzle_home_faq_section',
'type'        => 'textarea',
)
);

// Locations callout.
$wp_customize->add_section(
'kidazzle_home_locations_section',
array(
'title' => __( 'Locations Preview', 'kidazzle-theme' ),
'panel' => 'kidazzle_home_panel',
)
);

$wp_customize->add_setting( 'kidazzle_home_locations_heading', array( 'default' => '19+ neighborhood locations across Metro Atlanta', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_locations_heading', array( 'label' => __( 'Locations heading', 'kidazzle-theme' ), 'section' => 'kidazzle_home_locations_section', 'type' => 'text' ) );

$wp_customize->add_setting( 'kidazzle_home_locations_subheading', array( 'default' => 'Find a Kidazzle campus near your home or work. All locations share the same safety standards, curriculum framework, and warm Kidazzle culture.', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_locations_subheading', array( 'label' => __( 'Locations subheading', 'kidazzle-theme' ), 'section' => 'kidazzle_home_locations_section', 'type' => 'textarea' ) );

$wp_customize->add_setting( 'kidazzle_home_locations_cta_label', array( 'default' => 'View All Locations', 'sanitize_callback' => 'sanitize_text_field' ) );
$wp_customize->add_control( 'kidazzle_home_locations_cta_label', array( 'label' => __( 'CTA label', 'kidazzle-theme' ), 'section' => 'kidazzle_home_locations_section', 'type' => 'text' ) );

$wp_customize->add_setting( 'kidazzle_home_locations_cta_link', array( 'default' => '/locations', 'sanitize_callback' => 'esc_url_raw' ) );
$wp_customize->add_control( 'kidazzle_home_locations_cta_link', array( 'label' => __( 'CTA link', 'kidazzle-theme' ), 'section' => 'kidazzle_home_locations_section', 'type' => 'url' ) );
}
add_action( 'customize_register', 'kidazzle_home_customize_register' );
