<?php
/**
 * Advanced SEO/LLM Module - Bootstrap
 * Loads all modules and registers meta boxes / hooks
 *
 * @package Chroma_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Load Core Classes
 */
require_once __DIR__ . '/class-meta-box-base.php';
require_once __DIR__ . '/class-fallback-resolver.php';
require_once __DIR__ . '/class-field-sanitizer.php';
require_once __DIR__ . '/class-seo-dashboard.php';
function chroma_advanced_seo_admin_assets($hook) {
	global $post;

	if (!$post || !in_array($post->post_type, ['location', 'program'])) {
		return;
	}

	// Inline CSS for Meta Boxes
	?>
	<style>
		.chroma-advanced-seo-meta-box { padding: 10px 0; }
		.chroma-field-wrapper { margin-bottom: 20px; }
		.chroma-field-wrapper label { display: block; font-weight: 600; margin-bottom: 5px; }
		.chroma-field-wrapper .description { margin-top: 5px; font-style: normal; color: #666; }
		.chroma-field-wrapper .fallback-notice { color: #2271b1; font-style: italic; }
		.chroma-repeater-field { border: 1px solid #ddd; padding: 15px; background: #f9f9f9; }
		.chroma-repeater-items { margin-bottom: 10px; }
		.chroma-repeater-item { display: flex; gap: 10px; margin-bottom: 8px; align-items: center; }
		.chroma-repeater-item input { flex: 1; }
		.chroma-remove-item { color: #b32d2e; }
	</style>
	<script>
		jQuery(document).ready(function($) {
			// Repeater Add
			$(document).on('click', '.chroma-add-item', function(e) {
				e.preventDefault();
				var $wrapper = $(this).closest('.chroma-repeater-field');
				var $items = $wrapper.find('.chroma-repeater-items');
				var $clone = $items.find('.chroma-repeater-item').first().clone();
				$clone.find('input').val('');
				$items.append($clone);
			});
			
			// Repeater Remove
			$(document).on('click', '.chroma-remove-item', function(e) {
				e.preventDefault();
				if ($(this).closest('.chroma-repeater-items').find('.chroma-repeater-item').length > 1) {
					$(this).closest('.chroma-repeater-item').remove();
				} else {
					$(this).closest('.chroma-repeater-item').find('input').val('');
				}
			});
		});
	</script>
	<?php
}
add_action('admin_enqueue_scripts', 'chroma_advanced_seo_admin_assets');