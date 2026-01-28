<?php
/**
 * Advanced SEO/LLM Module - Bootstrap
 * Loads all modules and registers meta boxes / hooks
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

// Global to track missing files
global $kidazzle_missing_seo_files;
$kidazzle_missing_seo_files = [];

/**
 * Helper to safely load files
 */
function kidazzle_safe_require($path)
{
	global $kidazzle_missing_seo_files;
	if (file_exists($path)) {
		require_once $path;
		return true;
	}
	$kidazzle_missing_seo_files[] = basename($path);
	return false;
}

/**
 * Load Base Classes & Helpers
 */
kidazzle_safe_require(__DIR__ . '/class-meta-box-base.php');
kidazzle_safe_require(__DIR__ . '/class-field-sanitizer.php');
kidazzle_safe_require(__DIR__ . '/class-fallback-resolver.php');

/**
 * Load Core Classes
 */
kidazzle_safe_require(__DIR__ . '/class-seo-dashboard.php');
kidazzle_safe_require(__DIR__ . '/class-citation-datasets.php');
kidazzle_safe_require(__DIR__ . '/class-image-alt-automation.php');
kidazzle_safe_require(__DIR__ . '/class-admin-help.php');
kidazzle_safe_require(__DIR__ . '/class-breadcrumbs.php');
kidazzle_safe_require(__DIR__ . '/class-schema-types.php');
kidazzle_safe_require(__DIR__ . '/class-llm-client.php');

// Initialize LLM Client
global $kidazzle_llm_client;
$kidazzle_llm_client = new kidazzle_LLM_Client();

/**
 * Load Meta Boxes
 */
$meta_boxes = [
	'class-location-events.php',
	'class-location-howto.php',
	'class-general-llm-context.php', // Renamed from location-llm-context
	'class-general-llm-prompt.php',  // Renamed from location-llm-prompt
	'class-location-media.php',
	'class-location-pricing.php',
	'class-location-reviews.php',
	'class-location-service-area.php',
	'class-program-relationships.php',
	'class-universal-faq.php',
	'class-hreflang-options.php',
	'class-city-landing-meta.php',
	'class-location-citation-facts.php',
	'class-post-newsroom.php'
];

foreach ($meta_boxes as $file) {
	// Try loading new name first, then fallback to old name if not renamed yet (during transition)
	if (!kidazzle_safe_require(__DIR__ . '/meta-boxes/' . $file)) {
		// Fallback for transition period
		$old_file = str_replace('general-', 'location-', $file);
		if (file_exists(__DIR__ . '/meta-boxes/' . $old_file)) {
			require_once __DIR__ . '/meta-boxes/' . $old_file;
		}
	}
}

/**
 * Load Endpoints
 */
kidazzle_safe_require(__DIR__ . '/endpoints/kml-endpoint.php');

/**
 * Load Schema Builders
 */
$schema_builders = [
	'class-event-builder.php',
	'class-howto-builder.php',
	'class-llm-context-builder.php',
	'class-schema-injector.php',
	'class-service-area-builder.php',
	'class-universal-faq-builder.php',
	'class-page-type-builder.php'
];

foreach ($schema_builders as $file) {
	kidazzle_safe_require(__DIR__ . '/schema-builders/' . $file);
}

/**
 * Initialize Modules
 */
function kidazzle_advanced_seo_init()
{
	// Core Modules
	if (class_exists('kidazzle_SEO_Dashboard'))
		(new kidazzle_SEO_Dashboard())->init();
	if (class_exists('kidazzle_Citation_Datasets'))
		(new kidazzle_Citation_Datasets())->init();
	if (class_exists('kidazzle_Image_Alt_Automation'))
		(new kidazzle_Image_Alt_Automation())->init();
	if (class_exists('kidazzle_Admin_Help'))
		(new kidazzle_Admin_Help())->init();
	if (class_exists('kidazzle_Breadcrumbs'))
		(new kidazzle_Breadcrumbs())->init();

	// Meta Boxes
	$meta_classes = [
		'kidazzle_Location_Citation_Facts',
		'kidazzle_Location_Events',
		'kidazzle_Location_HowTo',
		'kidazzle_General_LLM_Context', // Renamed
		'kidazzle_General_LLM_Prompt',  // Renamed
		'kidazzle_Location_Media',
		'kidazzle_Location_Pricing',
		'kidazzle_Location_Reviews',
		'kidazzle_Location_Service_Area',
		'kidazzle_Program_Relationships',
		'kidazzle_Universal_FAQ',
		'kidazzle_Hreflang_Options',
		'kidazzle_City_Landing_Meta',
		'kidazzle_Post_Newsroom'
	];

	// Fallback for class names if files haven't been updated yet
	if (!class_exists('kidazzle_General_LLM_Context') && class_exists('kidazzle_Location_LLM_Context')) {
		$meta_classes[] = 'kidazzle_Location_LLM_Context';
	}
	if (!class_exists('kidazzle_General_LLM_Prompt') && class_exists('kidazzle_Location_LLM_Prompt')) {
		$meta_classes[] = 'kidazzle_Location_LLM_Prompt';
	}

	foreach ($meta_classes as $class) {
		if (class_exists($class)) {
			(new $class())->register();
		}
	}

	// Schema Builders (Hooks)
	if (class_exists('kidazzle_Event_Schema_Builder'))
		add_action('wp_head', ['kidazzle_Event_Schema_Builder', 'output']);
	if (class_exists('kidazzle_HowTo_Schema_Builder'))
		add_action('wp_head', ['kidazzle_HowTo_Schema_Builder', 'output']);
	if (class_exists('kidazzle_Schema_Injector'))
		add_action('wp_head', ['kidazzle_Schema_Injector', 'output_person_schema']);
	if (class_exists('kidazzle_Universal_FAQ_Builder'))
		add_action('wp_head', ['kidazzle_Universal_FAQ_Builder', 'output']);
	if (class_exists('kidazzle_Page_Type_Builder'))
		add_action('wp_head', ['kidazzle_Page_Type_Builder', 'output']);

	// Flush Rewrite Rules if KML rule is missing (One-time check)
	if (get_option('kidazzle_seo_flush_rewrite') !== 'done') {
		flush_rewrite_rules();
		update_option('kidazzle_seo_flush_rewrite', 'done');
	}
}
add_action('init', 'kidazzle_advanced_seo_init');

/**
 * Admin Assets
 */
function kidazzle_advanced_seo_admin_assets($hook)
{
	// Only load on SEO Dashboard or Post Edit screens
	$screen = get_current_screen();
	$allowed_post_types = ['location', 'program', 'page', 'post', 'city'];

	$is_dashboard = (isset($_GET['page']) && $_GET['page'] === 'kidazzle-seo-dashboard');
	$is_post_edit = ($hook === 'post.php' || $hook === 'post-new.php');
	$is_allowed_type = ($screen && in_array($screen->post_type, $allowed_post_types));

	if (!$is_dashboard && !($is_post_edit && $is_allowed_type)) {
		return;
	}

	?>
	<style>
		.kidazzle-seo-meta-box {
			background: #fff;
		}

		.kidazzle-section-title {
			font-size: 14px;
			font-weight: 600;
			margin: 15px 0 10px;
			border-bottom: 1px solid #eee;
			padding: 10px 0;
		}

		.kidazzle-field-wrapper {
			margin-bottom: 20px;
		}

		.kidazzle-field-wrapper label {
			display: block;
			font-weight: 600;
			margin-bottom: 5px;
		}

		.kidazzle-field-wrapper .description {
			margin-top: 5px;
			font-style: normal;
			color: #666;
		}

		.kidazzle-field-wrapper .fallback-notice {
			color: #2271b1;
			font-style: italic;
		}

		.kidazzle-repeater-field {
			border: 1px solid #ddd;
			padding: 15px;
			background: #f9f9f9;
		}

		.kidazzle-repeater-items {
			margin-bottom: 10px;
		}

		.kidazzle-repeater-item {
			display: flex;
			gap: 10px;
			margin-bottom: 8px;
			align-items: center;
		}

		.kidazzle-repeater-item input {
			flex: 1;
		}

		.kidazzle-remove-item {
			color: #b32d2e;
		}
	</style>
	<script>
		jQuery(document).ready(function ($) {
			// Repeater Add
			$(document).on('click', '.kidazzle-add-item', function (e) {
				e.preventDefault();
				var $wrapper = $(this).closest('.kidazzle-repeater-field');
				var $items = $wrapper.find('.kidazzle-repeater-items');
				var $clone = $items.find('.kidazzle-repeater-item').first().clone();
				$clone.find('input, textarea').val('');
				$items.append($clone);
			});

			// Repeater Remove
			$(document).on('click', '.kidazzle-remove-item', function (e) {
				e.preventDefault();
				if ($(this).closest('.kidazzle-repeater-items').find('.kidazzle-repeater-item').length > 1) {
					$(this).closest('.kidazzle-repeater-item').remove();
				} else {
					$(this).closest('.kidazzle-repeater-item').find('input, textarea').val('');
				}
			});
		});
	</script>
	<?php
}

add_action('admin_enqueue_scripts', 'kidazzle_advanced_seo_admin_assets');

/**
 * Admin Notice for Missing Files
 */
function kidazzle_seo_missing_files_notice()
{
	global $kidazzle_missing_seo_files;
	if (!empty($kidazzle_missing_seo_files) && current_user_can('manage_options')) {
		echo '<div class="notice notice-warning is-dismissible">';
		echo '<p><strong>Advanced SEO Module Warning:</strong> The following files are missing and could not be loaded:</p>';
		echo '<ul>';
		foreach ($kidazzle_missing_seo_files as $file) {
			echo '<li>' . esc_html($file) . '</li>';
		}
		echo '</ul>';
		echo '<p>Please ensure all files are uploaded to <code>inc/advanced-seo-llm/</code>.</p>';
		echo '</div>';
	}
}
add_action('admin_notices', 'kidazzle_seo_missing_files_notice');
