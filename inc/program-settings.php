<?php
/**
 * Program settings and helpers.
 *
 * @package kidazzle_Theme
 */

if (!defined('ABSPATH')) {
	return;
}

/**
 * Default slug for the Program archive.
 */
function kidazzle_program_base_slug_default()
{
	return 'programs';
}

/**
 * Sanitize a program base slug value.
 */
function kidazzle_sanitize_program_base_slug($slug)
{
	$slug = sanitize_title($slug);

	return $slug ?: kidazzle_program_base_slug_default();
}

/**
 * Retrieve the Program archive slug.
 */
function kidazzle_get_program_base_slug()
{
	$slug = get_option('kidazzle_program_base_slug', '');

	return kidazzle_sanitize_program_base_slug($slug);
}

/**
 * Retrieve the Program archive URL.
 */
function kidazzle_get_program_archive_url()
{
	return home_url('/' . kidazzle_get_program_base_slug());
}

/**
 * Register Customizer controls for the Program archive slug.
 */
function kidazzle_program_settings_customize_register(WP_Customize_Manager $wp_customize)
{
	$wp_customize->add_section(
		'kidazzle_program_settings',
		array(
			'title' => __('Programs', 'kidazzle-theme'),
			'description' => __('Control the URL slug for the Program archive and permalinks.', 'kidazzle-theme'),
			'priority' => 131,
		)
	);

	$wp_customize->add_setting(
		'kidazzle_program_base_slug',
		array(
			'type' => 'option',
			'default' => kidazzle_program_base_slug_default(),
			'sanitize_callback' => 'kidazzle_sanitize_program_base_slug',
		)
	);

	$wp_customize->add_control(
		'kidazzle_program_base_slug',
		array(
			'label' => __('Program base slug', 'kidazzle-theme'),
			'description' => __('Used for the Programs archive URL and individual program permalinks.', 'kidazzle-theme'),
			'section' => 'kidazzle_program_settings',
			'type' => 'text',
		)
	);
}
add_action('customize_register', 'kidazzle_program_settings_customize_register');

/**
 * Flush rewrites when the Program base slug changes.
 */
function kidazzle_maybe_flush_rewrite_on_program_slug_change($option, $old_value = '', $value = '')
{
	if ('kidazzle_program_base_slug' !== $option) {
		return;
	}

	$previous = kidazzle_sanitize_program_base_slug($old_value);
	$new = kidazzle_sanitize_program_base_slug($value ?: $old_value);

	if ($previous === $new) {
		return;
	}

	flush_rewrite_rules();
}
add_action('updated_option', 'kidazzle_maybe_flush_rewrite_on_program_slug_change', 10, 3);
add_action('added_option', 'kidazzle_maybe_flush_rewrite_on_program_slug_change', 10, 2);

/**
 * Ensure rewrites are refreshed on theme activation.
 */
function kidazzle_flush_rewrite_on_activation()
{
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'kidazzle_flush_rewrite_on_activation');
