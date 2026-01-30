<?php
/**
 * Success Stories Page Meta Boxes
 * (Repurposed from Stories Page)
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Register Stories Page Meta Boxes
 */
function wimper_stories_page_meta_boxes()
{
	add_meta_box(
		'wimper-stories-hero',
		__('Hero Section', 'wimper-theme'),
		'wimper_stories_hero_meta_box_render',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'wimper-stories-featured',
		__('Featured Case Study', 'wimper-theme'),
		'wimper_stories_featured_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-stories-list',
		__('Success Stories List', 'wimper-theme'),
		'wimper_stories_list_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-stories-cta',
		__('CTA Section', 'wimper-theme'),
		'wimper_stories_cta_meta_box_render',
		'page',
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', 'wimper_stories_page_meta_boxes');

/**
 * Hero Section Meta Box
 */
function wimper_stories_hero_meta_box_render($post)
{
	wp_nonce_field('wimper_stories_hero_meta', 'wimper_stories_hero_nonce');

	$hero_badge = get_post_meta($post->ID, 'stories_hero_badge', true);
	$hero_title = get_post_meta($post->ID, 'stories_hero_title', true);
	$hero_description = get_post_meta($post->ID, 'stories_hero_description', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="stories_hero_badge">Badge Text</label></th>
			<td>
				<input type="text" id="stories_hero_badge" name="stories_hero_badge"
					value="<?php echo esc_attr($hero_badge); ?>" class="large-text" placeholder="e.g., Client Success" />
			</td>
		</tr>
		<tr>
			<th><label for="stories_hero_title">Title</label></th>
			<td>
				<input type="text" id="stories_hero_title" name="stories_hero_title"
					value="<?php echo esc_attr($hero_title); ?>" class="large-text" placeholder="e.g., Real Results." />
				<p class="description">Use &lt;br&gt; for line breaks and &lt;span class="italic text-wimper-red"&gt; for
					styled text</p>
			</td>
		</tr>
		<tr>
			<th><label for="stories_hero_description">Description</label></th>
			<td>
				<textarea id="stories_hero_description" name="stories_hero_description" rows="3"
					class="large-text"><?php echo esc_textarea($hero_description); ?></textarea>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Featured Case Study Meta Box
 */
function wimper_stories_featured_meta_box_render($post)
{
	wp_nonce_field('wimper_stories_featured_meta', 'wimper_stories_featured_nonce');

	$featured_title = get_post_meta($post->ID, 'stories_featured_title', true);
	$featured_client = get_post_meta($post->ID, 'stories_featured_client', true);
	$featured_stats = get_post_meta($post->ID, 'stories_featured_stats', true);
	$featured_quote = get_post_meta($post->ID, 'stories_featured_quote', true);
	$featured_image = get_post_meta($post->ID, 'stories_featured_image', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="stories_featured_title">Headline</label></th>
			<td>
				<input type="text" id="stories_featured_title" name="stories_featured_title"
					value="<?php echo esc_attr($featured_title); ?>" class="large-text"
					placeholder="e.g., How Company X Saved $250k" />
			</td>
		</tr>
		<tr>
			<th><label for="stories_featured_client">Client Name</label></th>
			<td>
				<input type="text" id="stories_featured_client" name="stories_featured_client"
					value="<?php echo esc_attr($featured_client); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="stories_featured_stats">Key Stat</label></th>
			<td>
				<input type="text" id="stories_featured_stats" name="stories_featured_stats"
					value="<?php echo esc_attr($featured_stats); ?>" class="large-text"
					placeholder="e.g., 18% Payroll Reduction" />
			</td>
		</tr>
		<tr>
			<th><label for="stories_featured_quote">Client Quote</label></th>
			<td>
				<textarea id="stories_featured_quote" name="stories_featured_quote" rows="3"
					class="large-text"><?php echo esc_textarea($featured_quote); ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="stories_featured_image">Image</label></th>
			<td>
				<input type="text" id="stories_featured_image" name="stories_featured_image"
					value="<?php echo esc_attr($featured_image); ?>" class="large-text wimper-image-field" />
				<button type="button" class="button wimper-upload-button" data-field="stories_featured_image">Select
					Image</button>
				<button type="button" class="button wimper-clear-button" data-field="stories_featured_image">Clear</button>
				<div class="wimper-image-preview">
					<?php if ($featured_image): ?>
						<img src="<?php echo esc_url($featured_image); ?>"
							style="max-width: 200px; height: auto; margin-top: 10px;" />
					<?php endif; ?>
				</div>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Success Stories List Meta Box
 */
function wimper_stories_list_meta_box_render($post)
{
	wp_nonce_field('wimper_stories_list_meta', 'wimper_stories_list_nonce');

	$list_title = get_post_meta($post->ID, 'stories_list_title', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="stories_list_title">Section Title</label></th>
			<td>
				<input type="text" id="stories_list_title" name="stories_list_title"
					value="<?php echo esc_attr($list_title); ?>" class="large-text"
					placeholder="e.g., More Success Stories" />
				<p class="description">This section will automatically display 'Story' custom post types.</p>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * CTA Section Meta Box
 */
function wimper_stories_cta_meta_box_render($post)
{
	wp_nonce_field('wimper_stories_cta_meta', 'wimper_stories_cta_nonce');

	$cta_title = get_post_meta($post->ID, 'stories_cta_title', true);
	$cta_description = get_post_meta($post->ID, 'stories_cta_description', true);
	$cta_button_text = get_post_meta($post->ID, 'stories_cta_button_text', true);
	$cta_button_url = get_post_meta($post->ID, 'stories_cta_button_url', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="stories_cta_title">Title</label></th>
			<td>
				<input type="text" id="stories_cta_title" name="stories_cta_title"
					value="<?php echo esc_attr($cta_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="stories_cta_description">Description</label></th>
			<td>
				<textarea id="stories_cta_description" name="stories_cta_description" rows="2"
					class="large-text"><?php echo esc_textarea($cta_description); ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="stories_cta_button_text">Button Text</label></th>
			<td>
				<input type="text" id="stories_cta_button_text" name="stories_cta_button_text"
					value="<?php echo esc_attr($cta_button_text); ?>" />
			</td>
		</tr>
		<tr>
			<th><label for="stories_cta_button_url">Button URL</label></th>
			<td>
				<input type="url" id="stories_cta_button_url" name="stories_cta_button_url"
					value="<?php echo esc_attr($cta_button_url); ?>" class="large-text"
					placeholder="mailto: or https://" />
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save Stories Page Meta
 */
function wimper_save_stories_page_meta($post_id)
{
	// Check if this is a page
	if (get_post_type($post_id) !== 'page') {
		return;
	}

	// Define all meta fields
	$meta_boxes = array(
		'wimper_stories_hero_nonce' => array(
			'stories_hero_badge' => 'sanitize_text_field',
			'stories_hero_title' => 'sanitize_text_field',
			'stories_hero_description' => 'sanitize_textarea_field',
		),
		'wimper_stories_featured_nonce' => array(
			'stories_featured_title' => 'sanitize_text_field',
			'stories_featured_client' => 'sanitize_text_field',
			'stories_featured_stats' => 'sanitize_text_field',
			'stories_featured_quote' => 'sanitize_textarea_field',
			'stories_featured_image' => 'esc_url_raw',
		),
		'wimper_stories_list_nonce' => array(
			'stories_list_title' => 'sanitize_text_field',
		),
		'wimper_stories_cta_nonce' => array(
			'stories_cta_title' => 'sanitize_text_field',
			'stories_cta_description' => 'sanitize_textarea_field',
			'stories_cta_button_text' => 'sanitize_text_field',
			'stories_cta_button_url' => 'esc_url_raw',
		),
	);

	// Process each meta box
	foreach ($meta_boxes as $nonce_field => $fields) {
		if (!isset($_POST[$nonce_field])) {
			continue;
		}

		$nonce_action = str_replace('_nonce', '_meta', $nonce_field);
		if (!wp_verify_nonce($_POST[$nonce_field], $nonce_action)) {
			continue;
		}

		// Save each field
		foreach ($fields as $field_name => $sanitize_function) {
			if (isset($_POST[$field_name])) {
				$value = call_user_func($sanitize_function, $_POST[$field_name]);
				update_post_meta($post_id, $field_name, $value);
			}
		}
	}
}
add_action('save_post', 'wimper_save_stories_page_meta');

/**
 * Seed default values for Stories page
 */
function wimper_seed_stories_page_defaults($post_id)
{
	if (get_post_type($post_id) !== 'page') {
		return;
	}

	$template = get_post_meta($post_id, '_wp_page_template', true);
	if ($template !== 'page-stories.php') {
		return;
	}

	$already_seeded = get_post_meta($post_id, '_stories_defaults_seeded', true);
	if ($already_seeded) {
		return;
	}

	$defaults = array(
		'stories_hero_badge' => 'Success Stories',
		'stories_hero_title' => 'Proven Results. <br><span class="italic text-wimper-red">Real Impact.</span>',
		'stories_hero_description' => 'See how WIMPER has helped organizations across the country unlock hidden capital and improve employee wellbeing.',

		'stories_featured_title' => 'A Strategic Shift for Manufacturing Co.',
		'stories_featured_client' => 'Regional Manufacturing Corp.',
		'stories_featured_stats' => '$120,000 Annual FICA Savings',
		'stories_featured_quote' => 'The implementation was seamless, and the savings were immediate. It allowed us to reinvest in our workforce without touching our bottom line.',

		'stories_list_title' => 'More Case Studies',

		'stories_cta_title' => 'Ready to be our next success story?',
		'stories_cta_description' => 'Contact us for a free eligibility analysis.',
		'stories_cta_button_text' => 'Get Started',
		'stories_cta_button_url' => '/contact/',
	);

	foreach ($defaults as $meta_key => $default_value) {
		update_post_meta($post_id, $meta_key, $default_value);
	}

	update_post_meta($post_id, '_stories_defaults_seeded', '1');
}
add_action('save_post', 'wimper_seed_stories_page_defaults', 5);
