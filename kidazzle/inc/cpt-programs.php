<?php
/**
 * Custom Post Type: Programs
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Register Program CPT
 */
function kidazzle_register_program_cpt()
{
	$labels = array(
		'name' => _x('Programs', 'Post Type General Name', 'kidazzle-theme'),
		'singular_name' => _x('Program', 'Post Type Singular Name', 'kidazzle-theme'),
		'menu_name' => __('Programs', 'kidazzle-theme'),
		'all_items' => __('All Programs', 'kidazzle-theme'),
		'add_new_item' => __('Add New Program', 'kidazzle-theme'),
		'edit_item' => __('Edit Program', 'kidazzle-theme'),
		'view_item' => __('View Program', 'kidazzle-theme'),
	);

	$program_slug = kidazzle_get_program_base_slug();

	$args = array(
		'label' => __('Program', 'kidazzle-theme'),
		'labels' => $labels,
		'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
		'public' => true,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-welcome-learn-more',
		'has_archive' => $program_slug,
		'rewrite' => array('slug' => $program_slug),
		'show_in_rest' => true,
	);

	register_post_type('program', $args);
}
add_action('init', 'kidazzle_register_program_cpt', 0);

/**
 * Add admin columns for Programs
 */
function kidazzle_program_admin_columns($columns)
{
	$new_columns = array();
	$new_columns['cb'] = $columns['cb'];
	$new_columns['title'] = $columns['title'];
	$new_columns['age_range'] = __('Age Range', 'kidazzle-theme');
	$new_columns['locations'] = __('Locations', 'kidazzle-theme');
	$new_columns['date'] = $columns['date'];

	return $new_columns;
}
add_filter('manage_program_posts_columns', 'kidazzle_program_admin_columns');

/**
 * Populate admin columns
 */
function kidazzle_program_admin_column_content($column, $post_id)
{
	switch ($column) {
		case 'age_range':
			$age_range = get_post_meta($post_id, 'program_age_range', true);
			echo $age_range ? esc_html($age_range) : '—';
			break;

		case 'locations':
			$locations = get_post_meta($post_id, 'program_locations', true);
			if ($locations) {
				$count = count($locations);
				echo esc_html($count . ' location' . ($count > 1 ? 's' : ''));
			} else {
				echo '—';
			}
			break;
	}
}
add_action('manage_program_posts_custom_column', 'kidazzle_program_admin_column_content', 10, 2);

/**
 * Custom title placeholder
 */
function kidazzle_program_title_placeholder($title)
{
	$screen = get_current_screen();
	if ('program' === $screen->post_type) {
		$title = __('e.g., Infant Care', 'kidazzle-theme');
	}
	return $title;
}
add_filter('enter_title_here', 'kidazzle_program_title_placeholder');

/**
 * Register meta fields for Program anchors and SEO intro
 */
function kidazzle_register_program_meta()
{
	$meta_args = array(
		'object_subtype' => 'program',
		'type' => 'string',
		'single' => true,
		'show_in_rest' => true,
		'auth_callback' => function () {
			return current_user_can('edit_posts');
		},
	);

	register_post_meta(
		'program',
		'program_anchor_slug',
		array_merge(
			$meta_args,
			array(
				'sanitize_callback' => 'sanitize_title',
				'default' => '',
			)
		)
	);

	register_post_meta(
		'program',
		'program_seo_heading',
		array_merge(
			$meta_args,
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		)
	);

	register_post_meta(
		'program',
		'program_seo_summary',
		array_merge(
			$meta_args,
			array(
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		)
	);

	register_post_meta(
		'program',
		'program_seo_highlights',
		array_merge(
			$meta_args,
			array(
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		)
	);

	register_post_meta(
		'program',
		'program_meta_title',
		array_merge(
			$meta_args,
			array(
				'sanitize_callback' => 'sanitize_text_field',
			)
		)
	);

	register_post_meta(
		'program',
		'program_meta_description',
		array_merge(
			$meta_args,
			array(
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		)
	);

	register_post_meta(
		'program',
		'program_faq_items',
		array_merge(
			$meta_args,
			array(
				'sanitize_callback' => 'sanitize_textarea_field',
			)
		)
	);

	register_post_meta(
		'program',
		'program_lesson_plan_file',
		array_merge(
			$meta_args,
			array(
				'sanitize_callback' => 'esc_url_raw',
			)
		)
	);
}
add_action('init', 'kidazzle_register_program_meta');

/**
 * Add meta box for anchor and SEO intro fields
 */
function kidazzle_program_meta_box()
{
	add_meta_box(
		'kidazzle-program-anchor-seo',
		__('Program Anchor & SEO Intro', 'kidazzle-theme'),
		'kidazzle_program_meta_box_render',
		'program',
		'side',
		'default'
	);
}
add_action('add_meta_boxes', 'kidazzle_program_meta_box');

/**
 * Render the meta box fields
 */
function kidazzle_program_meta_box_render($post)
{
	wp_nonce_field('kidazzle_program_meta_nonce', 'kidazzle_program_meta_nonce_field');

	$anchor = get_post_meta($post->ID, 'program_anchor_slug', true);
	$heading = get_post_meta($post->ID, 'program_seo_heading', true);
	$summary = get_post_meta($post->ID, 'program_seo_summary', true);
	$highlights = get_post_meta($post->ID, 'program_seo_highlights', true);
	$meta_title = get_post_meta($post->ID, 'program_meta_title', true);
	$meta_desc = get_post_meta($post->ID, 'program_meta_description', true);
	$faq_items = get_post_meta($post->ID, 'program_faq_items', true);
	?>
	<p>
		<label for="program_anchor_slug"
			class="screen-reader-text"><?php esc_html_e('Program Anchor', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_anchor_slug" name="program_anchor_slug" value="<?php echo esc_attr($anchor); ?>"
			class="widefat" placeholder="<?php esc_attr_e('e.g., infant', 'kidazzle-theme'); ?>" />
		<small><?php esc_html_e('Used for #anchors and homepage wizard links. Defaults to the slug.', 'kidazzle-theme'); ?></small>
	</p>
	<p>
		<label for="program_seo_heading"
			class="screen-reader-text"><?php esc_html_e('SEO Heading', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_seo_heading" name="program_seo_heading" value="<?php echo esc_attr($heading); ?>"
			class="widefat" placeholder="<?php esc_attr_e('Program intro heading', 'kidazzle-theme'); ?>" />
	</p>
	<p>
		<label for="program_seo_summary"
			class="screen-reader-text"><?php esc_html_e('SEO Summary', 'kidazzle-theme'); ?></label>
		<textarea id="program_seo_summary" name="program_seo_summary" class="widefat" rows="3"
			placeholder="<?php esc_attr_e('Short overview that lives above the card', 'kidazzle-theme'); ?>"><?php echo esc_textarea($summary); ?></textarea>
	</p>
	<p>
		<label for="program_seo_highlights"
			class="screen-reader-text"><?php esc_html_e('SEO Highlights', 'kidazzle-theme'); ?></label>
		<textarea id="program_seo_highlights" name="program_seo_highlights" class="widefat" rows="4"
			placeholder="<?php esc_attr_e("One bullet per line (e.g. ratios, curriculum)", 'kidazzle-theme'); ?>"><?php echo esc_textarea($highlights); ?></textarea>
	</p>
	<hr />
	<p>
		<label for="program_meta_title"
			class="screen-reader-text"><?php esc_html_e('Meta Title', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_meta_title" name="program_meta_title" value="<?php echo esc_attr($meta_title); ?>"
			class="widefat" placeholder="<?php esc_attr_e('Custom title tag (optional)', 'kidazzle-theme'); ?>" />
		<small><?php esc_html_e('Used on the program detail for search visibility.', 'kidazzle-theme'); ?></small>
	</p>
	<p>
		<label for="program_meta_description"
			class="screen-reader-text"><?php esc_html_e('Meta Description', 'kidazzle-theme'); ?></label>
		<textarea id="program_meta_description" name="program_meta_description" class="widefat" rows="3"
			placeholder="<?php esc_attr_e('1–2 sentence description for search snippets', 'kidazzle-theme'); ?>"><?php echo esc_textarea($meta_desc); ?></textarea>
	</p>
	<p>
		<label for="program_faq_items"
			class="screen-reader-text"><?php esc_html_e('FAQ Items', 'kidazzle-theme'); ?></label>
		<textarea id="program_faq_items" name="program_faq_items" class="widefat" rows="4"
			placeholder="<?php esc_attr_e('Question | Answer (one per line)', 'kidazzle-theme'); ?>"><?php echo esc_textarea($faq_items); ?></textarea>
		<small><?php esc_html_e('Populate FAQ schema and on-page Q&A.', 'kidazzle-theme'); ?></small>
	</p>
	<?php
}

/**
 * Save meta box fields
 */
function kidazzle_program_meta_box_save($post_id)
{
	if (!isset($_POST['kidazzle_program_meta_nonce_field']) || !wp_verify_nonce(wp_unslash($_POST['kidazzle_program_meta_nonce_field']), 'kidazzle_program_meta_nonce')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (isset($_POST['post_type']) && 'program' === $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	$anchor = isset($_POST['program_anchor_slug']) ? sanitize_title(wp_unslash($_POST['program_anchor_slug'])) : '';
	$heading = isset($_POST['program_seo_heading']) ? sanitize_text_field(wp_unslash($_POST['program_seo_heading'])) : '';
	$summary = isset($_POST['program_seo_summary']) ? sanitize_textarea_field(wp_unslash($_POST['program_seo_summary'])) : '';
	$highlights = isset($_POST['program_seo_highlights']) ? sanitize_textarea_field(wp_unslash($_POST['program_seo_highlights'])) : '';
	$meta_title = isset($_POST['program_meta_title']) ? sanitize_text_field(wp_unslash($_POST['program_meta_title'])) : '';
	$meta_desc = isset($_POST['program_meta_description']) ? sanitize_textarea_field(wp_unslash($_POST['program_meta_description'])) : '';
	$faq_items = isset($_POST['program_faq_items']) ? sanitize_textarea_field(wp_unslash($_POST['program_faq_items'])) : '';

	update_post_meta($post_id, 'program_anchor_slug', $anchor);
	update_post_meta($post_id, 'program_seo_heading', $heading);
	update_post_meta($post_id, 'program_seo_summary', $summary);
	update_post_meta($post_id, 'program_seo_highlights', $highlights);
	update_post_meta($post_id, 'program_meta_title', $meta_title);
	update_post_meta($post_id, 'program_meta_description', $meta_desc);
	update_post_meta($post_id, 'program_faq_items', $faq_items);
}
add_action('save_post', 'kidazzle_program_meta_box_save');

/**
 * Add meta box for program locations
 */
function kidazzle_program_locations_meta_box()
{
	add_meta_box(
		'kidazzle-program-locations',
		__('Available at Locations', 'kidazzle-theme'),
		'kidazzle_program_locations_meta_box_render',
		'program',
		'side',
		'default'
	);

	add_meta_box(
		'kidazzle-program-details',
		__('Program Details', 'kidazzle-theme'),
		'kidazzle_program_details_meta_box_render',
		'program',
		'normal',
		'high'
	);

	add_meta_box(
		'kidazzle-program-single-page',
		__('Single Page Content', 'kidazzle-theme'),
		'kidazzle_program_single_page_meta_box_render',
		'program',
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', 'kidazzle_program_locations_meta_box');

/**
 * Render program locations meta box
 */
function kidazzle_program_locations_meta_box_render($post)
{
	wp_nonce_field('kidazzle_program_locations_nonce', 'kidazzle_program_locations_nonce_field');

	// Get all locations
	$all_locations = get_posts(array(
		'post_type' => 'location',
		'posts_per_page' => -1,
		'orderby' => 'title',
		'order' => 'ASC',
	));

	// Get currently selected locations
	$selected_locations = get_post_meta($post->ID, 'program_locations', true);
	if (!is_array($selected_locations)) {
		$selected_locations = array();
	}
	?>
	<p><?php _e('Select the locations where this program is available:', 'kidazzle-theme'); ?></p>
	<p style="margin-bottom: 10px;">
		<button type="button" id="kidazzle-toggle-all-locations" class="button button-secondary" style="margin-bottom: 5px;">
			<?php _e('Select All / Deselect All', 'kidazzle-theme'); ?>
		</button>
	</p>
	<div id="kidazzle-locations-list"
		style="max-height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px; background: #f9f9f9;">
		<?php if (!empty($all_locations)): ?>
			<?php foreach ($all_locations as $location): ?>
				<label style="display: block; margin-bottom: 8px;">
					<input type="checkbox" class="kidazzle-location-checkbox" name="program_locations[]"
						value="<?php echo esc_attr($location->ID); ?>" <?php checked(in_array($location->ID, $selected_locations)); ?> />
					<?php echo esc_html($location->post_title); ?>
				</label>
			<?php endforeach; ?>
		<?php else: ?>
			<p><?php _e('No locations found. Please add locations first.', 'kidazzle-theme'); ?></p>
		<?php endif; ?>
	</div>
	<p><small><?php _e('This program will only appear on selected location pages.', 'kidazzle-theme'); ?></small></p>

	<script>
		(function ($) {
			$(document).ready(function () {
				$('#kidazzle-toggle-all-locations').on('click', function (e) {
					e.preventDefault();

					var checkboxes = $('.kidazzle-location-checkbox');
					var allChecked = checkboxes.length === checkboxes.filter(':checked').length;

					// If all are checked, uncheck all. Otherwise, check all.
					checkboxes.prop('checked', !allChecked);
				});
			});
		})(jQuery);
	</script>
	<?php
}

/**
 * Save program locations
 */
function kidazzle_program_locations_meta_box_save($post_id)
{
	// Verify nonce
	if (!isset($_POST['kidazzle_program_locations_nonce_field']) || !wp_verify_nonce(wp_unslash($_POST['kidazzle_program_locations_nonce_field']), 'kidazzle_program_locations_nonce')) {
		return;
	}

	// Check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Check permissions
	if (isset($_POST['post_type']) && 'program' === $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	// Save selected locations
	$selected_locations = isset($_POST['program_locations']) && is_array($_POST['program_locations'])
		? array_map('intval', $_POST['program_locations'])
		: array();

	update_post_meta($post_id, 'program_locations', $selected_locations);
}
add_action('save_post_program', 'kidazzle_program_locations_meta_box_save');

/**
 * Render program details meta box
 */
function kidazzle_program_details_meta_box_render($post)
{
	wp_nonce_field('kidazzle_program_details_nonce', 'kidazzle_program_details_nonce_field');

	$age_range = get_post_meta($post->ID, 'program_age_range', true);
	$features = get_post_meta($post->ID, 'program_features', true);
	$cta_text = get_post_meta($post->ID, 'program_cta_text', true);
	$cta_link = get_post_meta($post->ID, 'program_cta_link', true);
	$color_scheme = get_post_meta($post->ID, 'program_color_scheme', true);
	?>
	<style>
		.kidazzle-program-field {
			margin-bottom: 20px;
		}

		.kidazzle-program-field label {
			display: block;
			font-weight: 600;
			margin-bottom: 5px;
		}

		.kidazzle-program-field input[type="text"],
		.kidazzle-program-field textarea,
		.kidazzle-program-field select {
			width: 100%;
			max-width: 600px;
		}

		.kidazzle-program-field small {
			display: block;
			margin-top: 5px;
			color: #666;
			font-style: italic;
		}

		.kidazzle-color-preview {
			display: inline-flex;
			align-items: center;
			gap: 15px;
			margin-top: 10px;
		}

		.kidazzle-color-preview .color-swatch {
			width: 40px;
			height: 40px;
			border-radius: 8px;
			border: 2px solid #ddd;
		}
	</style>

	<div class="kidazzle-program-field">
		<label for="program_icon"><?php _e('Program Icon/Emoji', 'kidazzle-theme'); ?></label>
		<div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
			<input type="text" id="program_icon" name="program_icon"
				value="<?php echo esc_attr(get_post_meta($post->ID, 'program_icon', true)); ?>" placeholder="e.g., 👶"
				style="width: 80px; text-align: center; font-size: 24px;" />

			<div class="kidazzle-emoji-presets" style="display: flex; gap: 5px; flex-wrap: wrap;">
				<?php
				$presets = array(
					'👶' => 'Infant',
					'🚀' => 'Toddler',
					'🎨' => 'Preschool',
					'🖍️' => 'Pre-K Prep',
					'🎓' => 'GA Pre-K',
					'🚌' => 'After School',
					'☀️' => 'Summer Camp',
					'🎉' => 'Parents Day Out',
				);
				foreach ($presets as $emoji => $label) {
					echo sprintf(
						'<button type="button" class="button kidazzle-emoji-btn" data-emoji="%s" title="%s" style="font-size: 18px; padding: 0 10px;">%s</button>',
						esc_attr($emoji),
						esc_attr($label),
						esc_html($emoji)
					);
				}
				?>
			</div>
		</div>
		<small><?php _e('Select a preset or type a custom emoji.', 'kidazzle-theme'); ?></small>

		<script>
			jQuery(document).ready(function ($) {
				$('.kidazzle-emoji-btn').on('click', function () {
					$('#program_icon').val($(this).data('emoji'));
				});
			});
		</script>
	</div>

	<div class="kidazzle-program-field">
		<label for="program_age_range"><?php _e('Age Range', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_age_range" name="program_age_range" value="<?php echo esc_attr($age_range); ?>"
			placeholder="e.g., 6w - 12mo, 1 Year, 2-3 Years" />
		<small><?php _e('Age range badge shown on program card (e.g., "6w - 12mo", "1 Year", "4yr - 5yr")', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-program-field">
		<label for="program_features"><?php _e('Program Features', 'kidazzle-theme'); ?></label>
		<textarea id="program_features" name="program_features" rows="4"
			placeholder="Enter one feature per line, e.g.:&#10;Individualized Schedules&#10;Sign Language Intro&#10;Daily Circle Time"><?php echo esc_textarea($features); ?></textarea>
		<small><?php _e('Enter one feature per line. These will display with checkmarks on the program card.', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-program-field">
		<label for="program_cta_text"><?php _e('CTA Button Text', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_cta_text" name="program_cta_text" value="<?php echo esc_attr($cta_text); ?>"
			placeholder="e.g., Schedule Tour, Join Waitlist, Learn More" />
		<small><?php _e('Text for the call-to-action button (default: "Schedule Tour")', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-program-field">
		<label for="program_cta_link"><?php _e('CTA Button Link', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_cta_link" name="program_cta_link" value="<?php echo esc_attr($cta_link); ?>"
			placeholder="#tour" />
		<small><?php _e('URL or anchor link for the CTA button (default: "#tour")', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-program-field">
		<label for="program_lesson_plan_file"><?php _e('Lesson Plan File (URL)', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_lesson_plan_file" name="program_lesson_plan_file"
			value="<?php echo esc_attr(get_post_meta($post->ID, 'program_lesson_plan_file', true)); ?>"
			placeholder="https://... (Paste PDF URL here)" />
		<small><?php _e('Paste the full URL to the PDF lesson plan. If set, a button will appear on the program page.', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-program-field">
		<label for="program_color_scheme"><?php _e('Color Scheme', 'kidazzle-theme'); ?></label>
		<select id="program_color_scheme" name="program_color_scheme">
			<option value="red" <?php selected($color_scheme, 'red'); ?>>Red - Infant Care</option>
			<option value="blue" <?php selected($color_scheme, 'blue'); ?>>Blue - Toddler</option>
			<option value="yellow" <?php selected($color_scheme, 'yellow'); ?>>Yellow - Preschool</option>
			<option value="blueDark" <?php selected($color_scheme, 'blueDark'); ?>>Dark Blue - Pre-K Prep</option>
			<option value="green" <?php selected($color_scheme, 'green'); ?>>Green - GA Pre-K</option>
		</select>
		<div class="kidazzle-color-preview">
			<div class="color-swatch" style="background-color: #D67D6B;" title="Red"></div>
			<div class="color-swatch" style="background-color: #4A6C7C;" title="Blue"></div>
			<div class="color-swatch" style="background-color: #E6BE75;" title="Yellow"></div>
			<div class="color-swatch" style="background-color: #2F4858;" title="Dark Blue"></div>
			<div class="color-swatch" style="background-color: #8DA399;" title="Green"></div>
		</div>
		<small><?php _e('Color theme for the program card hover effects and badges', 'kidazzle-theme'); ?></small>
	</div>

	<p><strong><?php _e('Note:', 'kidazzle-theme'); ?></strong>
		<?php _e('The program description shown on the card comes from the "Excerpt" field. The featured image is used as the card image.', 'kidazzle-theme'); ?>
	</p>
	<?php
}

/**
 * Save program details
 */
function kidazzle_program_details_meta_box_save($post_id)
{
	// Verify nonce
	if (!isset($_POST['kidazzle_program_details_nonce_field']) || !wp_verify_nonce(wp_unslash($_POST['kidazzle_program_details_nonce_field']), 'kidazzle_program_details_nonce')) {
		return;
	}

	// Check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Check permissions
	if (isset($_POST['post_type']) && 'program' === $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	// Save fields
	$fields = array(
		'program_icon' => 'sanitize_text_field',
		'program_lesson_plan_file' => 'esc_url_raw',
		'program_age_range' => 'sanitize_text_field',
		'program_features' => 'sanitize_textarea_field',
		'program_cta_text' => 'sanitize_text_field',
		'program_cta_link' => 'esc_url_raw',
		'program_color_scheme' => 'sanitize_text_field',
	);

	foreach ($fields as $field => $sanitize_callback) {
		if (isset($_POST[$field])) {
			$value = call_user_func($sanitize_callback, wp_unslash($_POST[$field]));
			update_post_meta($post_id, $field, $value);
		}
	}
}
add_action('save_post_program', 'kidazzle_program_details_meta_box_save');

/**
 * Render single page content meta box
 */
function kidazzle_program_single_page_meta_box_render($post)
{
	wp_nonce_field('kidazzle_program_single_page_nonce', 'kidazzle_program_single_page_nonce_field');

	// Hero section
	$hero_title = get_post_meta($post->ID, 'program_hero_title', true);
	$hero_description = get_post_meta($post->ID, 'program_hero_description', true);

	// Prismpath section
	$prism_title = get_post_meta($post->ID, 'program_prism_title', true);
	$prism_description = get_post_meta($post->ID, 'program_prism_description', true);
	$prism_focus_items = get_post_meta($post->ID, 'program_prism_focus_items', true);

	// Chart data
	$prism_physical = get_post_meta($post->ID, 'program_prism_physical', true) ?: '50';
	$prism_emotional = get_post_meta($post->ID, 'program_prism_emotional', true) ?: '50';
	$prism_social = get_post_meta($post->ID, 'program_prism_social', true) ?: '50';
	$prism_academic = get_post_meta($post->ID, 'program_prism_academic', true) ?: '50';
	$prism_creative = get_post_meta($post->ID, 'program_prism_creative', true) ?: '50';

	// Schedule
	$schedule_title = get_post_meta($post->ID, 'program_schedule_title', true);
	$schedule_items = get_post_meta($post->ID, 'program_schedule_items', true);
	?>
	<style>
		.kidazzle-single-field {
			margin-bottom: 20px;
		}

		.kidazzle-single-field label {
			display: block;
			font-weight: 600;
			margin-bottom: 5px;
		}

		.kidazzle-single-field input[type="text"],
		.kidazzle-single-field input[type="number"],
		.kidazzle-single-field textarea {
			width: 100%;
			max-width: 800px;
		}

		.kidazzle-single-field small {
			display: block;
			margin-top: 5px;
			color: #666;
			font-style: italic;
		}

		.kidazzle-section-divider {
			border-top: 2px solid #0073aa;
			margin: 30px 0 20px 0;
			padding-top: 20px;
		}

		.kidazzle-chart-inputs {
			display: grid;
			grid-template-columns: repeat(5, 1fr);
			gap: 15px;
			max-width: 800px;
		}

		.kidazzle-chart-input {
			text-align: center;
		}

		.kidazzle-chart-input input {
			text-align: center;
			font-weight: bold;
		}
	</style>

	<div class="kidazzle-section-divider">
		<h3 style="margin-top: 0; color: #0073aa;">Hero Section</h3>
	</div>

	<div class="kidazzle-single-field">
		<label for="program_hero_title"><?php _e('Hero Title', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_hero_title" name="program_hero_title" value="<?php echo esc_attr($hero_title); ?>"
			placeholder="e.g., The Foundation Phase." />
		<small><?php _e('Main heading on single program page (defaults to program title if empty)', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-single-field">
		<label for="program_hero_description"><?php _e('Hero Description', 'kidazzle-theme'); ?></label>
		<textarea id="program_hero_description" name="program_hero_description" rows="3"
			placeholder="A peaceful, 'shoeless' environment..."><?php echo esc_textarea($hero_description); ?></textarea>
		<small><?php _e('Description paragraph in hero section', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-section-divider">
		<h3 style="margin-top: 0; color: #0073aa;">Prismpath™ Focus Section</h3>
	</div>

	<div class="kidazzle-single-field">
		<label for="program_prism_title"><?php _e('Prism Section Title', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_prism_title" name="program_prism_title" value="<?php echo esc_attr($prism_title); ?>"
			placeholder="e.g., Building Trust & Body." />
		<small><?php _e('Title for the Prismpath focus section', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-single-field">
		<label for="program_prism_description"><?php _e('Prism Description', 'kidazzle-theme'); ?></label>
		<textarea id="program_prism_description" name="program_prism_description" rows="4"
			placeholder="In the first year, the brain grows faster than at any other time..."><?php echo esc_textarea($prism_description); ?></textarea>
		<small><?php _e('Description explaining the program\'s Prismpath focus', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-single-field">
		<label><?php _e('Prismpath Chart Values (0-100)', 'kidazzle-theme'); ?></label>
		<div style="margin-bottom: 15px;">
			<span style="font-size: 12px; font-weight: bold; margin-right: 10px;">Quick Fill:</span>
			<button type="button" class="button kidazzle-chart-preset" data-values="[90,90,40,15,40]">Infant</button>
			<button type="button" class="button kidazzle-chart-preset" data-values="[85,75,65,30,70]">Toddler</button>
			<button type="button" class="button kidazzle-chart-preset" data-values="[75,65,70,55,80]">Preschool</button>
			<button type="button" class="button kidazzle-chart-preset" data-values="[65,60,75,75,70]">Pre-K Prep</button>
			<button type="button" class="button kidazzle-chart-preset" data-values="[60,60,80,90,70]">GA Pre-K</button>
			<button type="button" class="button kidazzle-chart-preset" data-values="[50,70,85,75,80]">After School</button>
		</div>
		<div class="kidazzle-chart-inputs">
			<div class="kidazzle-chart-input">
				<label for="program_prism_physical"
					style="font-size: 11px; text-transform: uppercase; color: #666; margin-bottom: 5px;">Physical</label>
				<input type="number" id="program_prism_physical" name="program_prism_physical"
					value="<?php echo esc_attr($prism_physical); ?>" min="0" max="100" style="background: #F4E5E2;" />
			</div>
			<div class="kidazzle-chart-input">
				<label for="program_prism_emotional"
					style="font-size: 11px; text-transform: uppercase; color: #666; margin-bottom: 5px;">Emotional</label>
				<input type="number" id="program_prism_emotional" name="program_prism_emotional"
					value="<?php echo esc_attr($prism_emotional); ?>" min="0" max="100" style="background: #FDF6E3;" />
			</div>
			<div class="kidazzle-chart-input">
				<label for="program_prism_social"
					style="font-size: 11px; text-transform: uppercase; color: #666; margin-bottom: 5px;">Social</label>
				<input type="number" id="program_prism_social" name="program_prism_social"
					value="<?php echo esc_attr($prism_social); ?>" min="0" max="100" style="background: #E3EBE8;" />
			</div>
			<div class="kidazzle-chart-input">
				<label for="program_prism_academic"
					style="font-size: 11px; text-transform: uppercase; color: #666; margin-bottom: 5px;">Academic</label>
				<input type="number" id="program_prism_academic" name="program_prism_academic"
					value="<?php echo esc_attr($prism_academic); ?>" min="0" max="100" style="background: #E3E9EC;" />
			</div>
			<div class="kidazzle-chart-input">
				<label for="program_prism_creative"
					style="font-size: 11px; text-transform: uppercase; color: #666; margin-bottom: 5px;">Creative</label>
				<input type="number" id="program_prism_creative" name="program_prism_creative"
					value="<?php echo esc_attr($prism_creative); ?>" min="0" max="100" style="background: #FDF6E3;" />
			</div>
		</div>
		<small><?php _e('Set values 0-100 for each pillar. These create the radar chart.', 'kidazzle-theme'); ?></small>

		<script>
			jQuery(document).ready(function ($) {
				$('.kidazzle-chart-preset').on('click', function () {
					var values = $(this).data('values'); // Array [Phy, Emo, Soc, Aca, Cre]
					$('#program_prism_physical').val(values[0]);
					$('#program_prism_emotional').val(values[1]);
					$('#program_prism_social').val(values[2]);
					$('#program_prism_academic').val(values[3]);
					$('#program_prism_creative').val(values[4]);
				});
			});
		</script>
	</div>

	<div class="kidazzle-single-field">
		<label for="program_prism_focus_items"><?php _e('Focus Items', 'kidazzle-theme'); ?></label>
		<textarea id="program_prism_focus_items" name="program_prism_focus_items" rows="4"
			placeholder="Enter one item per line, e.g.:&#10;High Physical: Tummy time, rolling, reaching.&#10;High Emotional: Responsive feeding, cuddling."><?php echo esc_textarea($prism_focus_items); ?></textarea>
		<small><?php _e('Bullet points explaining the focus. One per line.', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-section-divider">
		<h3 style="margin-top: 0; color: #0073aa;">Daily Schedule/Rhythm Section</h3>
	</div>

	<div class="kidazzle-single-field">
		<label for="program_schedule_title"><?php _e('Schedule Section Title', 'kidazzle-theme'); ?></label>
		<input type="text" id="program_schedule_title" name="program_schedule_title"
			value="<?php echo esc_attr($schedule_title); ?>" placeholder="e.g., A Rhythm, Not a Routine" />
		<small><?php _e('Title for the schedule section', 'kidazzle-theme'); ?></small>
	</div>

	<div class="kidazzle-single-field">
		<label for="program_schedule_items"><?php _e('Schedule Items', 'kidazzle-theme'); ?></label>
		<textarea id="program_schedule_items" name="program_schedule_items" rows="8"
			placeholder="Format: Badge|Title|Description (one per line)&#10;Example:&#10;AM|Warm Welcome & Bottles|Transition from parent arms to teacher arms...&#10;Mid|Sensory Discovery|Tummy time on textured mats...&#10;PM|Stroller Walks & Nap|Fresh air in our buggy carts..."><?php echo esc_textarea($schedule_items); ?></textarea>
		<small><?php _e('Format: Badge|Title|Description (one per line). Badge can be AM, Mid, PM, or any text.', 'kidazzle-theme'); ?></small>
	</div>

	<p><strong><?php _e('Note:', 'kidazzle-theme'); ?></strong>
		<?php _e('The featured image is used as the hero image on the single program page.', 'kidazzle-theme'); ?></p>
	<?php
}

/**
 * Save single page content
 */
function kidazzle_program_single_page_meta_box_save($post_id)
{
	// Verify nonce
	if (!isset($_POST['kidazzle_program_single_page_nonce_field']) || !wp_verify_nonce(wp_unslash($_POST['kidazzle_program_single_page_nonce_field']), 'kidazzle_program_single_page_nonce')) {
		return;
	}

	// Check autosave
	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	// Check permissions
	if (isset($_POST['post_type']) && 'program' === $_POST['post_type']) {
		if (!current_user_can('edit_post', $post_id)) {
			return;
		}
	}

	// Save fields
	$fields = array(
		'program_hero_title' => 'sanitize_text_field',
		'program_hero_description' => 'sanitize_textarea_field',
		'program_prism_title' => 'sanitize_text_field',
		'program_prism_description' => 'sanitize_textarea_field',
		'program_prism_focus_items' => 'sanitize_textarea_field',
		'program_prism_physical' => 'absint',
		'program_prism_emotional' => 'absint',
		'program_prism_social' => 'absint',
		'program_prism_academic' => 'absint',
		'program_prism_creative' => 'absint',
		'program_schedule_title' => 'sanitize_text_field',
		'program_schedule_items' => 'sanitize_textarea_field',
	);

	foreach ($fields as $field => $sanitize_callback) {
		if (isset($_POST[$field])) {
			$value = call_user_func($sanitize_callback, wp_unslash($_POST[$field]));
			update_post_meta($post_id, $field, $value);
		}
	}
}
add_action('save_post_program', 'kidazzle_program_single_page_meta_box_save');
