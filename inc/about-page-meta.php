<?php
/**
 * About Page Meta Boxes
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Register About Page Meta Boxes
 */
function wimper_about_page_meta_boxes()
{
	add_meta_box(
		'wimper-about-hero',
		__('Hero Section', 'wimper-theme'),
		'wimper_about_hero_meta_box_render',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'wimper-about-mission',
		__('Mission Section', 'wimper-theme'),
		'wimper_about_mission_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-about-story',
		__('Story Section', 'wimper-theme'),
		'wimper_about_story_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-about-educators',
		__('Educators Section', 'wimper-theme'),
		'wimper_about_educators_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-about-values',
		__('Values (WIMPER Standard) Section', 'wimper-theme'),
		'wimper_about_values_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-about-leadership',
		__('Leadership Section', 'wimper-theme'),
		'wimper_about_leadership_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-about-nutrition',
		__('Nutrition & Wellness Section', 'wimper-theme'),
		'wimper_about_nutrition_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-about-philanthropy',
		__('Philanthropy Section', 'wimper-theme'),
		'wimper_about_philanthropy_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-about-cta',
		__('CTA Section', 'wimper-theme'),
		'wimper_about_cta_meta_box_render',
		'page',
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', 'wimper_about_page_meta_boxes');

/**
 * Hero Section Meta Box
 */
function wimper_about_hero_meta_box_render($post)
{
	wp_nonce_field('wimper_about_hero_meta', 'wimper_about_hero_nonce');

	$hero_badge_text = get_post_meta($post->ID, 'about_hero_badge_text', true);
	$hero_title = get_post_meta($post->ID, 'about_hero_title', true);
	$hero_description = get_post_meta($post->ID, 'about_hero_description', true);
	$hero_image = get_post_meta($post->ID, 'about_hero_image', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="about_hero_badge_text">Badge Text</label></th>
			<td>
				<input type="text" id="about_hero_badge_text" name="about_hero_badge_text"
					value="<?php echo esc_attr($hero_badge_text); ?>" class="large-text"
					placeholder="e.g., Established 2015" />
				<p class="description">Text for the badge at the top (e.g., "Established 2015")</p>
			</td>
		</tr>
		<tr>
			<th><label for="about_hero_title">Hero Title</label></th>
			<td>
				<input type="text" id="about_hero_title" name="about_hero_title"
					value="<?php echo esc_attr($hero_title); ?>" class="large-text"
					placeholder="e.g., More than a school. A second home." />
				<p class="description">Use &lt;span class='text-wimper-yellow italic'&gt;text&lt;/span&gt; for yellow italic
					text</p>
			</td>
		</tr>
		<tr>
			<th><label for="about_hero_description">Hero Description</label></th>
			<td>
				<textarea id="about_hero_description" name="about_hero_description" rows="4"
					class="large-text"><?php echo esc_textarea($hero_description); ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="about_hero_image">Hero Image</label></th>
			<td>
				<input type="text" id="about_hero_image" name="about_hero_image"
					value="<?php echo esc_attr($hero_image); ?>" class="large-text wimper-image-field" />
				<button type="button" class="button wimper-upload-button" data-field="about_hero_image">Select
					Image</button>
				<button type="button" class="button wimper-clear-button" data-field="about_hero_image">Clear</button>
				<div class="wimper-image-preview">
					<?php if ($hero_image): ?>
						<img src="<?php echo esc_url($hero_image); ?>"
							style="max-width: 200px; height: auto; margin-top: 10px; border: 1px solid #ddd; padding: 5px; border-radius: 4px;" />
					<?php endif; ?>
				</div>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Mission Section Meta Box
 */
function wimper_about_mission_meta_box_render($post)
{
	wp_nonce_field('wimper_about_mission_meta', 'wimper_about_mission_nonce');

	$mission_quote = get_post_meta($post->ID, 'about_mission_quote', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="about_mission_quote">Mission Quote</label></th>
			<td>
				<textarea id="about_mission_quote" name="about_mission_quote" rows="5"
					class="large-text"><?php echo esc_textarea($mission_quote); ?></textarea>
				<p class="description">This will be displayed as a quote on a blue background</p>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Story Section Meta Box
 */
function wimper_about_story_meta_box_render($post)
{
	wp_nonce_field('wimper_about_story_meta', 'wimper_about_story_nonce');

	$story_title = get_post_meta($post->ID, 'about_story_title', true);
	$story_paragraph1 = get_post_meta($post->ID, 'about_story_paragraph1', true);
	$story_paragraph2 = get_post_meta($post->ID, 'about_story_paragraph2', true);
	$story_image = get_post_meta($post->ID, 'about_story_image', true);

	$stat1_value = get_post_meta($post->ID, 'about_stat1_value', true);
	$stat1_label = get_post_meta($post->ID, 'about_stat1_label', true);
	$stat2_value = get_post_meta($post->ID, 'about_stat2_value', true);
	$stat2_label = get_post_meta($post->ID, 'about_stat2_label', true);
	$stat3_value = get_post_meta($post->ID, 'about_stat3_value', true);
	$stat3_label = get_post_meta($post->ID, 'about_stat3_label', true);
	$stat4_value = get_post_meta($post->ID, 'about_stat4_value', true);
	$stat4_label = get_post_meta($post->ID, 'about_stat4_label', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="about_story_title">Story Title</label></th>
			<td>
				<input type="text" id="about_story_title" name="about_story_title"
					value="<?php echo esc_attr($story_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_story_paragraph1">Paragraph 1</label></th>
			<td>
				<textarea id="about_story_paragraph1" name="about_story_paragraph1" rows="4"
					class="large-text"><?php echo esc_textarea($story_paragraph1); ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="about_story_paragraph2">Paragraph 2</label></th>
			<td>
				<textarea id="about_story_paragraph2" name="about_story_paragraph2" rows="4"
					class="large-text"><?php echo esc_textarea($story_paragraph2); ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="about_story_image">Story Image</label></th>
			<td>
				<input type="text" id="about_story_image" name="about_story_image"
					value="<?php echo esc_attr($story_image); ?>" class="large-text wimper-image-field" />
				<button type="button" class="button wimper-upload-button" data-field="about_story_image">Select
					Image</button>
				<button type="button" class="button wimper-clear-button" data-field="about_story_image">Clear</button>
				<div class="wimper-image-preview">
					<?php if ($story_image): ?>
						<img src="<?php echo esc_url($story_image); ?>"
							style="max-width: 200px; height: auto; margin-top: 10px; border: 1px solid #ddd; padding: 5px; border-radius: 4px;" />
					<?php endif; ?>
				</div>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Statistics (4 boxes)</strong></th>
		</tr>
		<tr>
			<th><label for="about_stat1_value">Stat 1</label></th>
			<td>
				<input type="text" id="about_stat1_value" name="about_stat1_value"
					value="<?php echo esc_attr($stat1_value); ?>" placeholder="e.g., 19+" style="width: 100px;" />
				<input type="text" id="about_stat1_label" name="about_stat1_label"
					value="<?php echo esc_attr($stat1_label); ?>" placeholder="e.g., Locations"
					style="margin-left: 10px;" />
			</td>
		</tr>
		<tr>
			<th><label for="about_stat2_value">Stat 2</label></th>
			<td>
				<input type="text" id="about_stat2_value" name="about_stat2_value"
					value="<?php echo esc_attr($stat2_value); ?>" placeholder="e.g., 2k+" style="width: 100px;" />
				<input type="text" id="about_stat2_label" name="about_stat2_label"
					value="<?php echo esc_attr($stat2_label); ?>" placeholder="e.g., Students"
					style="margin-left: 10px;" />
			</td>
		</tr>
		<tr>
			<th><label for="about_stat3_value">Stat 3</label></th>
			<td>
				<input type="text" id="about_stat3_value" name="about_stat3_value"
					value="<?php echo esc_attr($stat3_value); ?>" placeholder="e.g., 450+" style="width: 100px;" />
				<input type="text" id="about_stat3_label" name="about_stat3_label"
					value="<?php echo esc_attr($stat3_label); ?>" placeholder="e.g., Educators"
					style="margin-left: 10px;" />
			</td>
		</tr>
		<tr>
			<th><label for="about_stat4_value">Stat 4</label></th>
			<td>
				<input type="text" id="about_stat4_value" name="about_stat4_value"
					value="<?php echo esc_attr($stat4_value); ?>" placeholder="e.g., 100%" style="width: 100px;" />
				<input type="text" id="about_stat4_label" name="about_stat4_label"
					value="<?php echo esc_attr($stat4_label); ?>" placeholder="e.g., Licensed"
					style="margin-left: 10px;" />
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Educators Section Meta Box
 */
function wimper_about_educators_meta_box_render($post)
{
	wp_nonce_field('wimper_about_educators_meta', 'wimper_about_educators_nonce');

	$educators_title = get_post_meta($post->ID, 'about_educators_title', true);
	$educators_description = get_post_meta($post->ID, 'about_educators_description', true);

	$educator1_icon = get_post_meta($post->ID, 'about_educator1_icon', true);
	$educator1_title = get_post_meta($post->ID, 'about_educator1_title', true);
	$educator1_desc = get_post_meta($post->ID, 'about_educator1_desc', true);

	$educator2_icon = get_post_meta($post->ID, 'about_educator2_icon', true);
	$educator2_title = get_post_meta($post->ID, 'about_educator2_title', true);
	$educator2_desc = get_post_meta($post->ID, 'about_educator2_desc', true);

	$educator3_icon = get_post_meta($post->ID, 'about_educator3_icon', true);
	$educator3_title = get_post_meta($post->ID, 'about_educator3_title', true);
	$educator3_desc = get_post_meta($post->ID, 'about_educator3_desc', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="about_educators_title">Section Title</label></th>
			<td>
				<input type="text" id="about_educators_title" name="about_educators_title"
					value="<?php echo esc_attr($educators_title); ?>" class="large-text"
					placeholder="e.g., The Heart of WIMPER." />
			</td>
		</tr>
		<tr>
			<th><label for="about_educators_description">Description</label></th>
			<td>
				<textarea id="about_educators_description" name="about_educators_description" rows="3"
					class="large-text"><?php echo esc_textarea($educators_description); ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Card 1</strong></th>
		</tr>
		<tr>
			<th><label for="about_educator1_icon">Icon</label></th>
			<td>
				<input type="text" id="about_educator1_icon" name="about_educator1_icon"
					value="<?php echo esc_attr($educator1_icon); ?>" placeholder="e.g., fa-solid fa-certificate" />
			</td>
		</tr>
		<tr>
			<th><label for="about_educator1_title">Title</label></th>
			<td>
				<input type="text" id="about_educator1_title" name="about_educator1_title"
					value="<?php echo esc_attr($educator1_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_educator1_desc">Description</label></th>
			<td>
				<textarea id="about_educator1_desc" name="about_educator1_desc" rows="3"
					class="large-text"><?php echo esc_textarea($educator1_desc); ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Card 2</strong></th>
		</tr>
		<tr>
			<th><label for="about_educator2_icon">Icon</label></th>
			<td>
				<input type="text" id="about_educator2_icon" name="about_educator2_icon"
					value="<?php echo esc_attr($educator2_icon); ?>" placeholder="e.g., fa-solid fa-user-shield" />
			</td>
		</tr>
		<tr>
			<th><label for="about_educator2_title">Title</label></th>
			<td>
				<input type="text" id="about_educator2_title" name="about_educator2_title"
					value="<?php echo esc_attr($educator2_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_educator2_desc">Description</label></th>
			<td>
				<textarea id="about_educator2_desc" name="about_educator2_desc" rows="3"
					class="large-text"><?php echo esc_textarea($educator2_desc); ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Card 3</strong></th>
		</tr>
		<tr>
			<th><label for="about_educator3_icon">Icon</label></th>
			<td>
				<input type="text" id="about_educator3_icon" name="about_educator3_icon"
					value="<?php echo esc_attr($educator3_icon); ?>" placeholder="e.g., fa-solid fa-chalkboard-user" />
			</td>
		</tr>
		<tr>
			<th><label for="about_educator3_title">Title</label></th>
			<td>
				<input type="text" id="about_educator3_title" name="about_educator3_title"
					value="<?php echo esc_attr($educator3_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_educator3_desc">Description</label></th>
			<td>
				<textarea id="about_educator3_desc" name="about_educator3_desc" rows="3"
					class="large-text"><?php echo esc_textarea($educator3_desc); ?></textarea>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Core Values Section Meta Box
 */
function wimper_about_values_meta_box_render($post)
{
	wp_nonce_field('wimper_about_values_meta', 'wimper_about_values_nonce');

	$values_title = get_post_meta($post->ID, 'about_values_title', true);
	$values_description = get_post_meta($post->ID, 'about_values_description', true);

	$value1_icon = get_post_meta($post->ID, 'about_value1_icon', true);
	$value1_title = get_post_meta($post->ID, 'about_value1_title', true);
	$value1_desc = get_post_meta($post->ID, 'about_value1_desc', true);

	$value2_icon = get_post_meta($post->ID, 'about_value2_icon', true);
	$value2_title = get_post_meta($post->ID, 'about_value2_title', true);
	$value2_desc = get_post_meta($post->ID, 'about_value2_desc', true);

	$value3_icon = get_post_meta($post->ID, 'about_value3_icon', true);
	$value3_title = get_post_meta($post->ID, 'about_value3_title', true);
	$value3_desc = get_post_meta($post->ID, 'about_value3_desc', true);

	$value4_icon = get_post_meta($post->ID, 'about_value4_icon', true);
	$value4_title = get_post_meta($post->ID, 'about_value4_title', true);
	$value4_desc = get_post_meta($post->ID, 'about_value4_desc', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="about_values_title">Section Title</label></th>
			<td>
				<input type="text" id="about_values_title" name="about_values_title"
					value="<?php echo esc_attr($values_title); ?>" class="large-text"
					placeholder="e.g., The WIMPER Standard" />
			</td>
		</tr>
		<tr>
			<th><label for="about_values_description">Description</label></th>
			<td>
				<textarea id="about_values_description" name="about_values_description" rows="3"
					class="large-text"><?php echo esc_textarea($values_description); ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Value 1</strong></th>
		</tr>
		<tr>
			<th><label for="about_value1_icon">Icon</label></th>
			<td>
				<input type="text" id="about_value1_icon" name="about_value1_icon"
					value="<?php echo esc_attr($value1_icon); ?>" placeholder="e.g., fa-solid fa-heart" />
			</td>
		</tr>
		<tr>
			<th><label for="about_value1_title">Title</label></th>
			<td>
				<input type="text" id="about_value1_title" name="about_value1_title"
					value="<?php echo esc_attr($value1_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_value1_desc">Description</label></th>
			<td>
				<textarea id="about_value1_desc" name="about_value1_desc" rows="2"
					class="large-text"><?php echo esc_textarea($value1_desc); ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Value 2</strong></th>
		</tr>
		<tr>
			<th><label for="about_value2_icon">Icon</label></th>
			<td>
				<input type="text" id="about_value2_icon" name="about_value2_icon"
					value="<?php echo esc_attr($value2_icon); ?>" placeholder="e.g., fa-solid fa-shield-halved" />
			</td>
		</tr>
		<tr>
			<th><label for="about_value2_title">Title</label></th>
			<td>
				<input type="text" id="about_value2_title" name="about_value2_title"
					value="<?php echo esc_attr($value2_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_value2_desc">Description</label></th>
			<td>
				<textarea id="about_value2_desc" name="about_value2_desc" rows="2"
					class="large-text"><?php echo esc_textarea($value2_desc); ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Value 3</strong></th>
		</tr>
		<tr>
			<th><label for="about_value3_icon">Icon</label></th>
			<td>
				<input type="text" id="about_value3_icon" name="about_value3_icon"
					value="<?php echo esc_attr($value3_icon); ?>" placeholder="e.g., fa-solid fa-lightbulb" />
			</td>
		</tr>
		<tr>
			<th><label for="about_value3_title">Title</label></th>
			<td>
				<input type="text" id="about_value3_title" name="about_value3_title"
					value="<?php echo esc_attr($value3_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_value3_desc">Description</label></th>
			<td>
				<textarea id="about_value3_desc" name="about_value3_desc" rows="2"
					class="large-text"><?php echo esc_textarea($value3_desc); ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Value 4</strong></th>
		</tr>
		<tr>
			<th><label for="about_value4_icon">Icon</label></th>
			<td>
				<input type="text" id="about_value4_icon" name="about_value4_icon"
					value="<?php echo esc_attr($value4_icon); ?>" placeholder="e.g., fa-solid fa-users" />
			</td>
		</tr>
		<tr>
			<th><label for="about_value4_title">Title</label></th>
			<td>
				<input type="text" id="about_value4_title" name="about_value4_title"
					value="<?php echo esc_attr($value4_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_value4_desc">Description</label></th>
			<td>
				<textarea id="about_value4_desc" name="about_value4_desc" rows="2"
					class="large-text"><?php echo esc_textarea($value4_desc); ?></textarea>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Leadership Section Meta Box
 */
function wimper_about_leadership_meta_box_render($post)
{
	wp_nonce_field('wimper_about_leadership_meta', 'wimper_about_leadership_nonce');

	$leadership_title = get_post_meta($post->ID, 'about_leadership_title', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="about_leadership_title">Leadership Title</label></th>
			<td>
				<input type="text" id="about_leadership_title" name="about_leadership_title"
					value="<?php echo esc_attr($leadership_title); ?>" class="large-text"
					placeholder="e.g., Led by educators, not investors." />
				<p class="description">Team members are managed in the "Team Members" section and will display automatically
					with circular photos.</p>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Nutrition Section Meta Box
 */
function wimper_about_nutrition_meta_box_render($post)
{
	wp_nonce_field('wimper_about_nutrition_meta', 'wimper_about_nutrition_nonce');

	$nutrition_title = get_post_meta($post->ID, 'about_nutrition_title', true);
	$nutrition_description = get_post_meta($post->ID, 'about_nutrition_description', true);
	$nutrition_image = get_post_meta($post->ID, 'about_nutrition_image', true);

	$nutrition_bullet1_icon = get_post_meta($post->ID, 'about_nutrition_bullet1_icon', true);
	$nutrition_bullet1_text = get_post_meta($post->ID, 'about_nutrition_bullet1_text', true);
	$nutrition_bullet2_icon = get_post_meta($post->ID, 'about_nutrition_bullet2_icon', true);
	$nutrition_bullet2_text = get_post_meta($post->ID, 'about_nutrition_bullet2_text', true);
	$nutrition_bullet3_icon = get_post_meta($post->ID, 'about_nutrition_bullet3_icon', true);
	$nutrition_bullet3_text = get_post_meta($post->ID, 'about_nutrition_bullet3_text', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="about_nutrition_title">Nutrition Title</label></th>
			<td>
				<input type="text" id="about_nutrition_title" name="about_nutrition_title"
					value="<?php echo esc_attr($nutrition_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_nutrition_description">Description</label></th>
			<td>
				<textarea id="about_nutrition_description" name="about_nutrition_description" rows="4"
					class="large-text"><?php echo esc_textarea($nutrition_description); ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Bullet Points</strong></th>
		</tr>
		<tr>
			<th><label for="about_nutrition_bullet1_icon">Bullet 1 Icon</label></th>
			<td>
				<input type="text" id="about_nutrition_bullet1_icon" name="about_nutrition_bullet1_icon"
					value="<?php echo esc_attr($nutrition_bullet1_icon); ?>" placeholder="e.g., fa-solid fa-apple-whole"
					style="width: 250px;" />
				<input type="text" id="about_nutrition_bullet1_text" name="about_nutrition_bullet1_text"
					value="<?php echo esc_attr($nutrition_bullet1_text); ?>" placeholder="Text" class="large-text"
					style="margin-left: 10px;" />
			</td>
		</tr>
		<tr>
			<th><label for="about_nutrition_bullet2_icon">Bullet 2 Icon</label></th>
			<td>
				<input type="text" id="about_nutrition_bullet2_icon" name="about_nutrition_bullet2_icon"
					value="<?php echo esc_attr($nutrition_bullet2_icon); ?>" placeholder="e.g., fa-solid fa-carrot"
					style="width: 250px;" />
				<input type="text" id="about_nutrition_bullet2_text" name="about_nutrition_bullet2_text"
					value="<?php echo esc_attr($nutrition_bullet2_text); ?>" placeholder="Text" class="large-text"
					style="margin-left: 10px;" />
			</td>
		</tr>
		<tr>
			<th><label for="about_nutrition_bullet3_icon">Bullet 3 Icon</label></th>
			<td>
				<input type="text" id="about_nutrition_bullet3_icon" name="about_nutrition_bullet3_icon"
					value="<?php echo esc_attr($nutrition_bullet3_icon); ?>" placeholder="e.g., fa-solid fa-ban"
					style="width: 250px;" />
				<input type="text" id="about_nutrition_bullet3_text" name="about_nutrition_bullet3_text"
					value="<?php echo esc_attr($nutrition_bullet3_text); ?>" placeholder="Text" class="large-text"
					style="margin-left: 10px;" />
			</td>
		</tr>
		<tr>
			<th><label for="about_nutrition_image">Image</label></th>
			<td>
				<input type="text" id="about_nutrition_image" name="about_nutrition_image"
					value="<?php echo esc_attr($nutrition_image); ?>" class="large-text wimper-image-field" />
				<button type="button" class="button wimper-upload-button" data-field="about_nutrition_image">Select
					Image</button>
				<button type="button" class="button wimper-clear-button" data-field="about_nutrition_image">Clear</button>
				<div class="wimper-image-preview">
					<?php if ($nutrition_image): ?>
						<img src="<?php echo esc_url($nutrition_image); ?>"
							style="max-width: 200px; height: auto; margin-top: 10px; border: 1px solid #ddd; padding: 5px; border-radius: 4px;" />
					<?php endif; ?>
				</div>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Philanthropy Section Meta Box
 */
function wimper_about_philanthropy_meta_box_render($post)
{
	wp_nonce_field('wimper_about_philanthropy_meta', 'wimper_about_philanthropy_nonce');

	$philanthropy_title = get_post_meta($post->ID, 'about_philanthropy_title', true);
	$philanthropy_subtitle = get_post_meta($post->ID, 'about_philanthropy_subtitle', true);
	$philanthropy_description = get_post_meta($post->ID, 'about_philanthropy_description', true);
	$philanthropy_image = get_post_meta($post->ID, 'about_philanthropy_image', true);

	$philanthropy_bullet1_icon = get_post_meta($post->ID, 'about_philanthropy_bullet1_icon', true);
	$philanthropy_bullet1_text = get_post_meta($post->ID, 'about_philanthropy_bullet1_text', true);
	$philanthropy_bullet2_icon = get_post_meta($post->ID, 'about_philanthropy_bullet2_icon', true);
	$philanthropy_bullet2_text = get_post_meta($post->ID, 'about_philanthropy_bullet2_text', true);
	$philanthropy_bullet3_icon = get_post_meta($post->ID, 'about_philanthropy_bullet3_icon', true);
	$philanthropy_bullet3_text = get_post_meta($post->ID, 'about_philanthropy_bullet3_text', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="about_philanthropy_title">Title</label></th>
			<td>
				<input type="text" id="about_philanthropy_title" name="about_philanthropy_title"
					value="<?php echo esc_attr($philanthropy_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_philanthropy_subtitle">Subtitle</label></th>
			<td>
				<input type="text" id="about_philanthropy_subtitle" name="about_philanthropy_subtitle"
					value="<?php echo esc_attr($philanthropy_subtitle); ?>" class="large-text"
					placeholder="e.g., Foundations For Learning Inc." />
			</td>
		</tr>
		<tr>
			<th><label for="about_philanthropy_description">Description</label></th>
			<td>
				<textarea id="about_philanthropy_description" name="about_philanthropy_description" rows="4"
					class="large-text"><?php echo esc_textarea($philanthropy_description); ?></textarea>
			</td>
		</tr>
		<tr>
			<th colspan="2"><strong>Bullet Points</strong></th>
		</tr>
		<tr>
			<th><label for="about_philanthropy_bullet1_icon">Bullet 1 Icon</label></th>
			<td>
				<input type="text" id="about_philanthropy_bullet1_icon" name="about_philanthropy_bullet1_icon"
					value="<?php echo esc_attr($philanthropy_bullet1_icon); ?>"
					placeholder="e.g., fa-solid fa-hand-holding-heart" style="width: 250px;" />
				<input type="text" id="about_philanthropy_bullet1_text" name="about_philanthropy_bullet1_text"
					value="<?php echo esc_attr($philanthropy_bullet1_text); ?>" placeholder="Text" class="large-text"
					style="margin-left: 10px;" />
			</td>
		</tr>
		<tr>
			<th><label for="about_philanthropy_bullet2_icon">Bullet 2 Icon</label></th>
			<td>
				<input type="text" id="about_philanthropy_bullet2_icon" name="about_philanthropy_bullet2_icon"
					value="<?php echo esc_attr($philanthropy_bullet2_icon); ?>"
					placeholder="e.g., fa-solid fa-chalkboard-user" style="width: 250px;" />
				<input type="text" id="about_philanthropy_bullet2_text" name="about_philanthropy_bullet2_text"
					value="<?php echo esc_attr($philanthropy_bullet2_text); ?>" placeholder="Text" class="large-text"
					style="margin-left: 10px;" />
			</td>
		</tr>
		<tr>
			<th><label for="about_philanthropy_bullet3_icon">Bullet 3 Icon</label></th>
			<td>
				<input type="text" id="about_philanthropy_bullet3_icon" name="about_philanthropy_bullet3_icon"
					value="<?php echo esc_attr($philanthropy_bullet3_icon); ?>"
					placeholder="e.g., fa-solid fa-people-roof" style="width: 250px;" />
				<input type="text" id="about_philanthropy_bullet3_text" name="about_philanthropy_bullet3_text"
					value="<?php echo esc_attr($philanthropy_bullet3_text); ?>" placeholder="Text" class="large-text"
					style="margin-left: 10px;" />
			</td>
		</tr>
		<tr>
			<th><label for="about_philanthropy_image">Image</label></th>
			<td>
				<input type="text" id="about_philanthropy_image" name="about_philanthropy_image"
					value="<?php echo esc_attr($philanthropy_image); ?>" class="large-text wimper-image-field" />
				<button type="button" class="button wimper-upload-button" data-field="about_philanthropy_image">Select
					Image</button>
				<button type="button" class="button wimper-clear-button"
					data-field="about_philanthropy_image">Clear</button>
				<div class="wimper-image-preview">
					<?php if ($philanthropy_image): ?>
						<img src="<?php echo esc_url($philanthropy_image); ?>"
							style="max-width: 200px; height: auto; margin-top: 10px; border: 1px solid #ddd; padding: 5px; border-radius: 4px;" />
					<?php endif; ?>
				</div>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * CTA Section Meta Box
 */
function wimper_about_cta_meta_box_render($post)
{
	wp_nonce_field('wimper_about_cta_meta', 'wimper_about_cta_nonce');

	$cta_title = get_post_meta($post->ID, 'about_cta_title', true);
	$cta_description = get_post_meta($post->ID, 'about_cta_description', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="about_cta_title">CTA Title</label></th>
			<td>
				<input type="text" id="about_cta_title" name="about_cta_title" value="<?php echo esc_attr($cta_title); ?>"
					class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="about_cta_description">CTA Description</label></th>
			<td>
				<textarea id="about_cta_description" name="about_cta_description" rows="2"
					class="large-text"><?php echo esc_textarea($cta_description); ?></textarea>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save About Page Meta
 */
function wimper_save_about_page_meta($post_id)
{
	// Check if this is the About page
	if (get_post_type($post_id) !== 'page') {
		return;
	}

	// Define all meta fields
	$meta_boxes = array(
		'wimper_about_hero_nonce' => array(
			'about_hero_badge_text' => 'sanitize_text_field',
			'about_hero_title' => 'sanitize_text_field',
			'about_hero_description' => 'sanitize_textarea_field',
			'about_hero_image' => 'esc_url_raw',
		),
		'wimper_about_mission_nonce' => array(
			'about_mission_quote' => 'sanitize_textarea_field',
		),
		'wimper_about_story_nonce' => array(
			'about_story_title' => 'sanitize_text_field',
			'about_story_paragraph1' => 'sanitize_textarea_field',
			'about_story_paragraph2' => 'sanitize_textarea_field',
			'about_story_image' => 'esc_url_raw',
			'about_stat1_value' => 'sanitize_text_field',
			'about_stat1_label' => 'sanitize_text_field',
			'about_stat2_value' => 'sanitize_text_field',
			'about_stat2_label' => 'sanitize_text_field',
			'about_stat3_value' => 'sanitize_text_field',
			'about_stat3_label' => 'sanitize_text_field',
			'about_stat4_value' => 'sanitize_text_field',
			'about_stat4_label' => 'sanitize_text_field',
		),
		'wimper_about_educators_nonce' => array(
			'about_educators_title' => 'sanitize_text_field',
			'about_educators_description' => 'sanitize_textarea_field',
			'about_educator1_icon' => 'sanitize_text_field',
			'about_educator1_title' => 'sanitize_text_field',
			'about_educator1_desc' => 'sanitize_textarea_field',
			'about_educator2_icon' => 'sanitize_text_field',
			'about_educator2_title' => 'sanitize_text_field',
			'about_educator2_desc' => 'sanitize_textarea_field',
			'about_educator3_icon' => 'sanitize_text_field',
			'about_educator3_title' => 'sanitize_text_field',
			'about_educator3_desc' => 'sanitize_textarea_field',
		),
		'wimper_about_values_nonce' => array(
			'about_values_title' => 'sanitize_text_field',
			'about_values_description' => 'sanitize_textarea_field',
			'about_value1_icon' => 'sanitize_text_field',
			'about_value1_title' => 'sanitize_text_field',
			'about_value1_desc' => 'sanitize_textarea_field',
			'about_value2_icon' => 'sanitize_text_field',
			'about_value2_title' => 'sanitize_text_field',
			'about_value2_desc' => 'sanitize_textarea_field',
			'about_value3_icon' => 'sanitize_text_field',
			'about_value3_title' => 'sanitize_text_field',
			'about_value3_desc' => 'sanitize_textarea_field',
			'about_value4_icon' => 'sanitize_text_field',
			'about_value4_title' => 'sanitize_text_field',
			'about_value4_desc' => 'sanitize_textarea_field',
		),
		'wimper_about_leadership_nonce' => array(
			'about_leadership_title' => 'sanitize_text_field',
		),
		'wimper_about_nutrition_nonce' => array(
			'about_nutrition_title' => 'sanitize_text_field',
			'about_nutrition_description' => 'sanitize_textarea_field',
			'about_nutrition_image' => 'esc_url_raw',
			'about_nutrition_bullet1_icon' => 'sanitize_text_field',
			'about_nutrition_bullet1_text' => 'sanitize_text_field',
			'about_nutrition_bullet2_icon' => 'sanitize_text_field',
			'about_nutrition_bullet2_text' => 'sanitize_text_field',
			'about_nutrition_bullet3_icon' => 'sanitize_text_field',
			'about_nutrition_bullet3_text' => 'sanitize_text_field',
		),
		'wimper_about_philanthropy_nonce' => array(
			'about_philanthropy_title' => 'sanitize_text_field',
			'about_philanthropy_subtitle' => 'sanitize_text_field',
			'about_philanthropy_description' => 'sanitize_textarea_field',
			'about_philanthropy_image' => 'esc_url_raw',
			'about_philanthropy_bullet1_icon' => 'sanitize_text_field',
			'about_philanthropy_bullet1_text' => 'sanitize_text_field',
			'about_philanthropy_bullet2_icon' => 'sanitize_text_field',
			'about_philanthropy_bullet2_text' => 'sanitize_text_field',
			'about_philanthropy_bullet3_icon' => 'sanitize_text_field',
			'about_philanthropy_bullet3_text' => 'sanitize_text_field',
		),
		'wimper_about_cta_nonce' => array(
			'about_cta_title' => 'sanitize_text_field',
			'about_cta_description' => 'sanitize_textarea_field',
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
add_action('save_post', 'wimper_save_about_page_meta');

/**
 * Seed default values for About page
 */
function wimper_seed_about_page_defaults($post_id)
{
	if (get_post_type($post_id) !== 'page') {
		return;
	}

	$template = get_post_meta($post_id, '_wp_page_template', true);
	if ($template !== 'page-about.php') {
		return;
	}

	$already_seeded = get_post_meta($post_id, '_about_defaults_seeded', true);
	if ($already_seeded) {
		return;
	}

	$defaults = array(
		'about_hero_badge_text' => 'Established 2015',
		'about_hero_title' => 'More than a school. A <span class="text-wimper-yellow italic">second home</span>.',
		'about_hero_description' => 'Created by educators who believe in a higher standard of care, WIMPER has grown from a single classroom to a network of thriving campuses across Metro Atlanta.',

		'about_mission_quote' => '"Our mission is to cultivate a love for learning in every child, supported by a village of educators and families working together."',

		'about_story_title' => 'Our Story',
		'about_story_paragraph1' => 'It started with a simple observation: childcare needed more heart. Founders Sarah and James noticed that many centers felt industrial, transactional, and disconnected from the joy of childhood.',
		'about_story_paragraph2' => 'They set out to build something different—a place where teachers are cherished, curriculum is creative, and parents are partners. Today, WIMPER serves thousands of families, but that original promise of "heart-first care" remains our guiding star.',
		'about_stat1_value' => '19+',
		'about_stat1_label' => 'Locations',
		'about_stat2_value' => '2k+',
		'about_stat2_label' => 'Students',
		'about_stat3_value' => '450+',
		'about_stat3_label' => 'Educators',
		'about_stat4_value' => '100%',
		'about_stat4_label' => 'Licensed',

		'about_educators_title' => 'The Heart of WIMPER',
		'about_educators_description' => 'Our teachers are more than caregivers; they are state-certified early childhood professionals dedicated to your child\'s growth.',
		'about_educator1_icon' => 'fa-solid fa-certificate',
		'about_educator1_title' => 'Certified Pros',
		'about_educator1_desc' => 'Every lead teacher holds credentials in Early Childhood Education.',
		'about_educator2_icon' => 'fa-solid fa-user-shield',
		'about_educator2_title' => 'Background Checked',
		'about_educator2_desc' => 'Rigorous screening, including FBI fingerprinting and drug testing.',
		'about_educator3_icon' => 'fa-solid fa-chalkboard-user',
		'about_educator3_title' => 'Ongoing Training',
		'about_educator3_desc' => 'Over 20 hours of annual professional development per teacher.',

		'about_values_title' => 'The WIMPER Standard',
		'about_values_description' => 'We don\'t just meet standards; we set them. Our four core values guide every interaction.',
		'about_value1_icon' => 'fa-solid fa-heart',
		'about_value1_title' => 'Kindness First',
		'about_value1_desc' => 'We model empathy and respect in every classroom.',
		'about_value2_icon' => 'fa-solid fa-shield-halved',
		'about_value2_title' => 'Uncompromised Safety',
		'about_value2_desc' => 'Secure facilities and strict supervision protocols.',
		'about_value3_icon' => 'fa-solid fa-lightbulb',
		'about_value3_title' => 'Creative Curiosity',
		'about_value3_desc' => 'Learning through play, exploration, and art.',
		'about_value4_icon' => 'fa-solid fa-users',
		'about_value4_title' => 'Community Partnership',
		'about_value4_desc' => 'Parents are partners, not just customers.',

		'about_leadership_title' => 'Led by educators, not investors.',

		'about_nutrition_title' => 'Fueling Bright Minds',
		'about_nutrition_description' => 'We participate in the USDA Child and Adult Care Food Program (CACFP) to ensure every child receives balanced, nutritious meals daily.',
		'about_nutrition_bullet1_icon' => 'fa-solid fa-apple-whole',
		'about_nutrition_bullet1_text' => 'Fresh Fruits & Veggies',
		'about_nutrition_bullet2_icon' => 'fa-solid fa-carrot',
		'about_nutrition_bullet2_text' => 'Whole Grains & Proteins',
		'about_nutrition_bullet3_icon' => 'fa-solid fa-ban',
		'about_nutrition_bullet3_text' => 'No Fried Foods',

		'about_philanthropy_title' => 'Giving Back',
		'about_philanthropy_subtitle' => 'Foundations For Learning Inc.',
		'about_philanthropy_description' => 'WIMPER is proud to partner with Foundations For Learning, a non-profit dedicated to providing early education access to underserved communities.',
		'about_philanthropy_bullet1_icon' => 'fa-solid fa-hand-holding-heart',
		'about_philanthropy_bullet1_text' => 'Scholarship Programs',
		'about_philanthropy_bullet2_icon' => 'fa-solid fa-people-roof',
		'about_philanthropy_bullet2_text' => 'Community Outreach',
		'about_philanthropy_bullet3_icon' => 'fa-solid fa-book-open-reader',
		'about_philanthropy_bullet3_text' => 'Literacy Initiatives',

		'about_cta_title' => 'Come see the WIMPER difference.',
		'about_cta_description' => 'Schedule a tour today and meet our incredible team.',
	);

	foreach ($defaults as $meta_key => $default_value) {
		update_post_meta($post_id, $meta_key, $default_value);
	}

	update_post_meta($post_id, '_about_defaults_seeded', '1');
}
add_action('save_post', 'wimper_seed_about_page_defaults', 5);
