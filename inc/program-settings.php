<?php
/**
 * Program settings and helpers.
 *
 * @package wimper_Theme
 */

if (!defined('ABSPATH')) {
	return;
}

/**
 * Default slug for the Program archive.
 */
/**
 * Default slug for the Program archive.
 */
function wimper_program_base_slug_default()
{
	return 'programs';
}

/**
 * Sanitize a program base slug value.
 */
function wimper_sanitize_program_base_slug($slug)
{
	$slug = sanitize_title($slug);

	return $slug ?: wimper_program_base_slug_default();
}

/**
 * Retrieve the Program archive slug.
 */
function wimper_get_program_base_slug()
{
	$slug = get_option('wimper_program_base_slug', '');

	return wimper_sanitize_program_base_slug($slug);
}

/**
 * Retrieve the Program archive URL.
 */
function wimper_get_program_archive_url()
{
	return home_url('/' . wimper_get_program_base_slug());
}

/**
 * Register Customizer controls for the Program archive slug.
 */
function wimper_program_settings_customize_register(WP_Customize_Manager $wp_customize)
{
	$wp_customize->add_section(
		'wimper_program_settings',
		array(
			'title' => __('Programs', 'wimper-theme'),
			'description' => __('Control the URL slug for the Program archive and permalinks.', 'wimper-theme'),
			'priority' => 131,
		)
	);

	$wp_customize->add_setting(
		'wimper_program_base_slug',
		array(
			'type' => 'option',
			'default' => wimper_program_base_slug_default(),
			'sanitize_callback' => 'wimper_sanitize_program_base_slug',
		)
	);

	$wp_customize->add_control(
		'wimper_program_base_slug',
		array(
			'label' => __('Program base slug', 'wimper-theme'),
			'description' => __('Used for the Programs archive URL and individual program permalinks.', 'wimper-theme'),
			'section' => 'wimper_program_settings',
			'type' => 'text',
		)
	);
}
add_action('customize_register', 'wimper_program_settings_customize_register');

/**
 * Flush rewrites when the Program base slug changes.
 */
/**
 * Flush rewrites when the Program base slug changes.
 */
function wimper_maybe_flush_rewrite_on_program_slug_change($option, $old_value = '', $value = '')
{
	if ('wimper_program_base_slug' !== $option) {
		return;
	}

	$previous = wimper_sanitize_program_base_slug($old_value);
	$new = wimper_sanitize_program_base_slug($value ?: $old_value);

	if ($previous === $new) {
		return;
	}

	flush_rewrite_rules();
}
add_action('updated_option', 'wimper_maybe_flush_rewrite_on_program_slug_change', 10, 3);
add_action('added_option', 'wimper_maybe_flush_rewrite_on_program_slug_change', 10, 2);

/**
 * Ensure rewrites are refreshed on theme activation.
 */
function wimper_flush_rewrite_on_activation()
{
	flush_rewrite_rules();
}
add_action('after_switch_theme', 'wimper_flush_rewrite_on_activation');
