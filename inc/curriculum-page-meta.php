<?php
/**
 * WIMPER Program Process/Services Page Meta Boxes
 * (Formerly Curriculum Page)
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

/**
 * Register Process Page Meta Boxes
 */
function wimper_process_page_meta_boxes()
{
	add_meta_box(
		'wimper-process-hero',
		__('Hero Section', 'wimper-theme'),
		'wimper_process_hero_meta_box_render',
		'page',
		'normal',
		'high'
	);

	add_meta_box(
		'wimper-process-framework',
		__('WIMPER Program Framework', 'wimper-theme'),
		'wimper_process_framework_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-process-timeline',
		__('Implementation Timeline', 'wimper-theme'),
		'wimper_process_timeline_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-process-environment',
		__('Compliance & Security', 'wimper-theme'),
		'wimper_process_environment_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-process-milestones',
		__('Financial Impact Metrics', 'wimper-theme'),
		'wimper_process_milestones_meta_box_render',
		'page',
		'normal',
		'default'
	);

	add_meta_box(
		'wimper-process-cta',
		__('CTA Section', 'wimper-theme'),
		'wimper_process_cta_meta_box_render',
		'page',
		'normal',
		'default'
	);
}
add_action('add_meta_boxes', 'wimper_process_page_meta_boxes');

/**
 * Hero Section Meta Box
 */
function wimper_process_hero_meta_box_render($post)
{
	wp_nonce_field('wimper_process_hero_meta', 'wimper_process_hero_nonce');

	$hero_badge = get_post_meta($post->ID, 'process_hero_badge', true);
	$hero_title = get_post_meta($post->ID, 'process_hero_title', true);
	$hero_description = get_post_meta($post->ID, 'process_hero_description', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="process_hero_badge">Badge Text</label></th>
			<td>
				<input type="text" id="process_hero_badge" name="process_hero_badge"
					value="<?php echo esc_attr($hero_badge); ?>" class="large-text"
					placeholder="e.g., The WIMPER Advantage" />
			</td>
		</tr>
		<tr>
			<th><label for="process_hero_title">Title</label></th>
			<td>
				<input type="text" id="process_hero_title" name="process_hero_title"
					value="<?php echo esc_attr($hero_title); ?>" class="large-text"
					placeholder="e.g., Strategic Tax Reduction." />
				<p class="description">Use &lt;br&gt; for line breaks and &lt;span class='italic
					text-wimper-green'&gt;text&lt;/span&gt; for green italic text</p>
			</td>
		</tr>
		<tr>
			<th><label for="process_hero_description">Description</label></th>
			<td>
				<textarea id="process_hero_description" name="process_hero_description" rows="4"
					class="large-text"><?php echo esc_textarea($hero_description); ?></textarea>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Framework Section Meta Box (Core Benefits)
 */
function wimper_process_framework_meta_box_render($post)
{
	wp_nonce_field('wimper_process_framework_meta', 'wimper_process_framework_nonce');

	$framework_title = get_post_meta($post->ID, 'process_framework_title', true);
	$framework_description = get_post_meta($post->ID, 'process_framework_description', true);

	$pillars = array(
		array('name' => 'compliance', 'label' => 'Compliance (Red)', 'icon' => 'fa-solid fa-file-shield'),
		array('name' => 'savings', 'label' => 'Savings (Green)', 'icon' => 'fa-solid fa-sack-dollar'),
		array('name' => 'benefits', 'label' => 'Benefits (Blue)', 'icon' => 'fa-solid fa-users-viewfinder'),
		array('name' => 'process', 'label' => 'Process (Yellow)', 'icon' => 'fa-solid fa-gears'),
		array('name' => 'reporting', 'label' => 'Reporting (Dark Blue)', 'icon' => 'fa-solid fa-chart-pie'),
	);
	?>
	<table class="form-table">
		<tr>
			<th><label for="process_framework_title">Section Title</label></th>
			<td>
				<input type="text" id="process_framework_title" name="process_framework_title"
					value="<?php echo esc_attr($framework_title); ?>" class="large-text"
					placeholder="e.g., The WIMPER Methodology" />
			</td>
		</tr>
		<tr>
			<th><label for="process_framework_description">Description</label></th>
			<td>
				<textarea id="process_framework_description" name="process_framework_description" rows="3"
					class="large-text"><?php echo esc_textarea($framework_description); ?></textarea>
			</td>
		</tr>
		<?php foreach ($pillars as $pillar):
			$icon = get_post_meta($post->ID, "process_pillar_{$pillar['name']}_icon", true);
			$title = get_post_meta($post->ID, "process_pillar_{$pillar['name']}_title", true);
			$desc = get_post_meta($post->ID, "process_pillar_{$pillar['name']}_desc", true);
			?>
			<tr>
				<th colspan="2"><strong><?php echo esc_html($pillar['label']); ?></strong></th>
			</tr>
			<tr>
				<th><label for="process_pillar_<?php echo esc_attr($pillar['name']); ?>_icon">Icon</label></th>
				<td>
					<input type="text" id="process_pillar_<?php echo esc_attr($pillar['name']); ?>_icon"
						name="process_pillar_<?php echo esc_attr($pillar['name']); ?>_icon"
						value="<?php echo esc_attr($icon); ?>" placeholder="<?php echo esc_attr($pillar['icon']); ?>" />
				</td>
			</tr>
			<tr>
				<th><label for="process_pillar_<?php echo esc_attr($pillar['name']); ?>_title">Title</label></th>
				<td>
					<input type="text" id="process_pillar_<?php echo esc_attr($pillar['name']); ?>_title"
						name="process_pillar_<?php echo esc_attr($pillar['name']); ?>_title"
						value="<?php echo esc_attr($title); ?>" class="large-text" />
				</td>
			</tr>
			<tr>
				<th><label for="process_pillar_<?php echo esc_attr($pillar['name']); ?>_desc">Description</label></th>
				<td>
					<textarea id="process_pillar_<?php echo esc_attr($pillar['name']); ?>_desc"
						name="process_pillar_<?php echo esc_attr($pillar['name']); ?>_desc" rows="2"
						class="large-text"><?php echo esc_textarea($desc); ?></textarea>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php
}

/**
 * Timeline Section Meta Box
 */
function wimper_process_timeline_meta_box_render($post)
{
	wp_nonce_field('wimper_process_timeline_meta', 'wimper_process_timeline_nonce');

	$timeline_badge = get_post_meta($post->ID, 'process_timeline_badge', true);
	$timeline_title = get_post_meta($post->ID, 'process_timeline_title', true);
	$timeline_description = get_post_meta($post->ID, 'process_timeline_description', true);
	$timeline_image = get_post_meta($post->ID, 'process_timeline_image', true);

	$stages = array(
		array('name' => 'audit', 'label' => 'Audit (Red)'),
		array('name' => 'implementation', 'label' => 'Implementation (Yellow)'),
		array('name' => 'savings', 'label' => 'Savings (Green)'),
	);
	?>
	<table class="form-table">
		<tr>
			<th><label for="process_timeline_badge">Badge Text</label></th>
			<td>
				<input type="text" id="process_timeline_badge" name="process_timeline_badge"
					value="<?php echo esc_attr($timeline_badge); ?>" placeholder="e.g., Implementation" />
			</td>
		</tr>
		<tr>
			<th><label for="process_timeline_title">Section Title</label></th>
			<td>
				<input type="text" id="process_timeline_title" name="process_timeline_title"
					value="<?php echo esc_attr($timeline_title); ?>" class="large-text"
					placeholder="e.g., Seamless Integration." />
			</td>
		</tr>
		<tr>
			<th><label for="process_timeline_description">Description</label></th>
			<td>
				<textarea id="process_timeline_description" name="process_timeline_description" rows="3"
					class="large-text"><?php echo esc_textarea($timeline_description); ?></textarea>
			</td>
		</tr>
		<tr>
			<th><label for="process_timeline_image">Image</label></th>
			<td>
				<input type="text" id="process_timeline_image" name="process_timeline_image"
					value="<?php echo esc_attr($timeline_image); ?>" class="large-text wimper-image-field" />
				<button type="button" class="button wimper-upload-button" data-field="process_timeline_image">Select
					Image</button>
				<button type="button" class="button wimper-clear-button" data-field="process_timeline_image">Clear</button>
				<div class="wimper-image-preview">
					<?php if ($timeline_image): ?>
						<img src="<?php echo esc_url($timeline_image); ?>"
							style="max-width: 200px; height: auto; margin-top: 10px; border: 1px solid #ddd; padding: 5px; border-radius: 4px;" />
					<?php endif; ?>
				</div>
			</td>
		</tr>
		<?php foreach ($stages as $stage):
			$title = get_post_meta($post->ID, "process_stage_{$stage['name']}_title", true);
			$desc = get_post_meta($post->ID, "process_stage_{$stage['name']}_desc", true);
			?>
			<tr>
				<th colspan="2"><strong><?php echo esc_html($stage['label']); ?></strong></th>
			</tr>
			<tr>
				<th><label for="process_stage_<?php echo esc_attr($stage['name']); ?>_title">Title</label></th>
				<td>
					<input type="text" id="process_stage_<?php echo esc_attr($stage['name']); ?>_title"
						name="process_stage_<?php echo esc_attr($stage['name']); ?>_title"
						value="<?php echo esc_attr($title); ?>" class="large-text" />
				</td>
			</tr>
			<tr>
				<th><label for="process_stage_<?php echo esc_attr($stage['name']); ?>_desc">Description</label></th>
				<td>
					<textarea id="process_stage_<?php echo esc_attr($stage['name']); ?>_desc"
						name="process_stage_<?php echo esc_attr($stage['name']); ?>_desc" rows="2"
						class="large-text"><?php echo esc_textarea($desc); ?></textarea>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php
}

/**
 * Environment/Security Section Meta Box
 */
function wimper_process_environment_meta_box_render($post)
{
	wp_nonce_field('wimper_process_environment_meta', 'wimper_process_environment_nonce');

	$env_badge = get_post_meta($post->ID, 'process_env_badge', true);
	$env_title = get_post_meta($post->ID, 'process_env_title', true);
	$env_description = get_post_meta($post->ID, 'process_env_description', true);

	$zones = array(
		array('name' => 'legal', 'label' => 'Zone 1'),
		array('name' => 'tech', 'label' => 'Zone 2'),
		array('name' => 'audit', 'label' => 'Zone 3'),
	);
	?>
	<table class="form-table">
		<tr>
			<th><label for="process_env_badge">Badge Text</label></th>
			<td>
				<input type="text" id="process_env_badge" name="process_env_badge"
					value="<?php echo esc_attr($env_badge); ?>" placeholder="e.g., Compliance" />
			</td>
		</tr>
		<tr>
			<th><label for="process_env_title">Section Title</label></th>
			<td>
				<input type="text" id="process_env_title" name="process_env_title"
					value="<?php echo esc_attr($env_title); ?>" class="large-text"
					placeholder="e.g., Robust Legal Compliance." />
			</td>
		</tr>
		<tr>
			<th><label for="process_env_description">Description</label></th>
			<td>
				<textarea id="process_env_description" name="process_env_description" rows="4"
					class="large-text"><?php echo esc_textarea($env_description); ?></textarea>
			</td>
		</tr>
		<?php foreach ($zones as $zone):
			$emoji = get_post_meta($post->ID, "process_zone_{$zone['name']}_emoji", true);
			$title = get_post_meta($post->ID, "process_zone_{$zone['name']}_title", true);
			$desc = get_post_meta($post->ID, "process_zone_{$zone['name']}_desc", true);
			?>
			<tr>
				<th colspan="2"><strong><?php echo esc_html($zone['label']); ?></strong></th>
			</tr>
			<tr>
				<th><label for="process_zone_<?php echo esc_attr($zone['name']); ?>_emoji">Emoji (or Icon Class)</label></th>
				<td>
					<input type="text" id="process_zone_<?php echo esc_attr($zone['name']); ?>_emoji"
						name="process_zone_<?php echo esc_attr($zone['name']); ?>_emoji"
						value="<?php echo esc_attr($emoji); ?>" placeholder="e.g., ⚖️ or fa-solid fa-scale-balanced"
						style="width: 250px;" />
				</td>
			</tr>
			<tr>
				<th><label for="process_zone_<?php echo esc_attr($zone['name']); ?>_title">Title</label></th>
				<td>
					<input type="text" id="process_zone_<?php echo esc_attr($zone['name']); ?>_title"
						name="process_zone_<?php echo esc_attr($zone['name']); ?>_title"
						value="<?php echo esc_attr($title); ?>" class="large-text" />
				</td>
			</tr>
			<tr>
				<th><label for="process_zone_<?php echo esc_attr($zone['name']); ?>_desc">Description</label></th>
				<td>
					<textarea id="process_zone_<?php echo esc_attr($zone['name']); ?>_desc"
						name="process_zone_<?php echo esc_attr($zone['name']); ?>_desc" rows="2"
						class="large-text"><?php echo esc_textarea($desc); ?></textarea>
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php
}

/**
 * Milestones/Metrics Section Meta Box
 */
function wimper_process_milestones_meta_box_render($post)
{
	wp_nonce_field('wimper_process_milestones_meta', 'wimper_process_milestones_nonce');

	$milestones_title = get_post_meta($post->ID, 'process_milestones_title', true);
	$milestones_subtitle = get_post_meta($post->ID, 'process_milestones_subtitle', true);

	$cards = array(
		array('name' => 'tracking', 'label' => 'Card 1 (Blue)'),
		array('name' => 'screenings', 'label' => 'Card 2 (Red)'),
		array('name' => 'assessments', 'label' => 'Card 3 (Yellow)'),
	);
	?>
	<table class="form-table">
		<tr>
			<th><label for="process_milestones_title">Section Title</label></th>
			<td>
				<input type="text" id="process_milestones_title" name="process_milestones_title"
					value="<?php echo esc_attr($milestones_title); ?>" class="large-text"
					placeholder="e.g., Measurable Results" />
			</td>
		</tr>
		<tr>
			<th><label for="process_milestones_subtitle">Subtitle</label></th>
			<td>
				<input type="text" id="process_milestones_subtitle" name="process_milestones_subtitle"
					value="<?php echo esc_attr($milestones_subtitle); ?>" class="large-text"
					placeholder="e.g., Real-time reporting on your tax savings." />
			</td>
		</tr>
		<?php foreach ($cards as $card):
			$icon = get_post_meta($post->ID, "process_milestone_{$card['name']}_icon", true);
			$title = get_post_meta($post->ID, "process_milestone_{$card['name']}_title", true);
			$desc = get_post_meta($post->ID, "process_milestone_{$card['name']}_desc", true);
			$bullet1 = get_post_meta($post->ID, "process_milestone_{$card['name']}_bullet1", true);
			$bullet2 = get_post_meta($post->ID, "process_milestone_{$card['name']}_bullet2", true);
			?>
			<tr>
				<th colspan="2"><strong><?php echo esc_html($card['label']); ?></strong></th>
			</tr>
			<tr>
				<th><label for="process_milestone_<?php echo esc_attr($card['name']); ?>_icon">Icon</label></th>
				<td>
					<input type="text" id="process_milestone_<?php echo esc_attr($card['name']); ?>_icon"
						name="process_milestone_<?php echo esc_attr($card['name']); ?>_icon"
						value="<?php echo esc_attr($icon); ?>" placeholder="e.g., fa-solid fa-chart-line" />
				</td>
			</tr>
			<tr>
				<th><label for="process_milestone_<?php echo esc_attr($card['name']); ?>_title">Title</label></th>
				<td>
					<input type="text" id="process_milestone_<?php echo esc_attr($card['name']); ?>_title"
						name="process_milestone_<?php echo esc_attr($card['name']); ?>_title"
						value="<?php echo esc_attr($title); ?>" class="large-text" />
				</td>
			</tr>
			<tr>
				<th><label for="process_milestone_<?php echo esc_attr($card['name']); ?>_desc">Description</label></th>
				<td>
					<textarea id="process_milestone_<?php echo esc_attr($card['name']); ?>_desc"
						name="process_milestone_<?php echo esc_attr($card['name']); ?>_desc" rows="3"
						class="large-text"><?php echo esc_textarea($desc); ?></textarea>
				</td>
			</tr>
			<tr>
				<th><label for="process_milestone_<?php echo esc_attr($card['name']); ?>_bullet1">Bullet 1</label></th>
				<td>
					<input type="text" id="process_milestone_<?php echo esc_attr($card['name']); ?>_bullet1"
						name="process_milestone_<?php echo esc_attr($card['name']); ?>_bullet1"
						value="<?php echo esc_attr($bullet1); ?>" class="large-text" />
				</td>
			</tr>
			<tr>
				<th><label for="process_milestone_<?php echo esc_attr($card['name']); ?>_bullet2">Bullet 2</label></th>
				<td>
					<input type="text" id="process_milestone_<?php echo esc_attr($card['name']); ?>_bullet2"
						name="process_milestone_<?php echo esc_attr($card['name']); ?>_bullet2"
						value="<?php echo esc_attr($bullet2); ?>" class="large-text" />
				</td>
			</tr>
		<?php endforeach; ?>
	</table>
	<?php
}

/**
 * CTA Section Meta Box
 */
function wimper_process_cta_meta_box_render($post)
{
	wp_nonce_field('wimper_process_cta_meta', 'wimper_process_cta_nonce');

	$cta_title = get_post_meta($post->ID, 'process_cta_title', true);
	$cta_description = get_post_meta($post->ID, 'process_cta_description', true);
	?>
	<table class="form-table">
		<tr>
			<th><label for="process_cta_title">CTA Title</label></th>
			<td>
				<input type="text" id="process_cta_title" name="process_cta_title"
					value="<?php echo esc_attr($cta_title); ?>" class="large-text" />
			</td>
		</tr>
		<tr>
			<th><label for="process_cta_description">CTA Description</label></th>
			<td>
				<textarea id="process_cta_description" name="process_cta_description" rows="2"
					class="large-text"><?php echo esc_textarea($cta_description); ?></textarea>
			</td>
		</tr>
	</table>
	<?php
}

/**
 * Save Process Page Meta
 */
function wimper_save_process_page_meta($post_id)
{
	if (get_post_type($post_id) !== 'page') {
		return;
	}

	// Define all meta fields (mapped from old curriculum keys to process keys conceptually)
	$meta_boxes = array(
		'wimper_process_hero_nonce' => array(
			'process_hero_badge' => 'sanitize_text_field',
			'process_hero_title' => 'sanitize_text_field',
			'process_hero_description' => 'sanitize_textarea_field',
		),
		'wimper_process_framework_nonce' => array(
			'process_framework_title' => 'sanitize_text_field',
			'process_framework_description' => 'sanitize_textarea_field',
			'process_pillar_compliance_icon' => 'sanitize_text_field',
			'process_pillar_compliance_title' => 'sanitize_text_field',
			'process_pillar_compliance_desc' => 'sanitize_textarea_field',
			'process_pillar_savings_icon' => 'sanitize_text_field',
			'process_pillar_savings_title' => 'sanitize_text_field',
			'process_pillar_savings_desc' => 'sanitize_textarea_field',
			'process_pillar_benefits_icon' => 'sanitize_text_field',
			'process_pillar_benefits_title' => 'sanitize_text_field',
			'process_pillar_benefits_desc' => 'sanitize_textarea_field',
			'process_pillar_process_icon' => 'sanitize_text_field',
			'process_pillar_process_title' => 'sanitize_text_field',
			'process_pillar_process_desc' => 'sanitize_textarea_field',
			'process_pillar_reporting_icon' => 'sanitize_text_field',
			'process_pillar_reporting_title' => 'sanitize_text_field',
			'process_pillar_reporting_desc' => 'sanitize_textarea_field',
		),
		'wimper_process_timeline_nonce' => array(
			'process_timeline_badge' => 'sanitize_text_field',
			'process_timeline_title' => 'sanitize_text_field',
			'process_timeline_description' => 'sanitize_textarea_field',
			'process_timeline_image' => 'esc_url_raw',
			'process_stage_audit_title' => 'sanitize_text_field',
			'process_stage_audit_desc' => 'sanitize_textarea_field',
			'process_stage_implementation_title' => 'sanitize_text_field',
			'process_stage_implementation_desc' => 'sanitize_textarea_field',
			'process_stage_savings_title' => 'sanitize_text_field',
			'process_stage_savings_desc' => 'sanitize_textarea_field',
		),
		'wimper_process_environment_nonce' => array(
			'process_env_badge' => 'sanitize_text_field',
			'process_env_title' => 'sanitize_text_field',
			'process_env_description' => 'sanitize_textarea_field',
			'process_zone_legal_emoji' => 'sanitize_text_field',
			'process_zone_legal_title' => 'sanitize_text_field',
			'process_zone_legal_desc' => 'sanitize_textarea_field',
			'process_zone_tech_emoji' => 'sanitize_text_field',
			'process_zone_tech_title' => 'sanitize_text_field',
			'process_zone_tech_desc' => 'sanitize_textarea_field',
			'process_zone_audit_emoji' => 'sanitize_text_field',
			'process_zone_audit_title' => 'sanitize_text_field',
			'process_zone_audit_desc' => 'sanitize_textarea_field',
		),
		'wimper_process_milestones_nonce' => array(
			'process_milestones_title' => 'sanitize_text_field',
			'process_milestones_subtitle' => 'sanitize_text_field',
			'process_milestone_tracking_icon' => 'sanitize_text_field',
			'process_milestone_tracking_title' => 'sanitize_text_field',
			'process_milestone_tracking_desc' => 'sanitize_textarea_field',
			'process_milestone_tracking_bullet1' => 'sanitize_text_field',
			'process_milestone_tracking_bullet2' => 'sanitize_text_field',
			'process_milestone_screenings_icon' => 'sanitize_text_field',
			'process_milestone_screenings_title' => 'sanitize_text_field',
			'process_milestone_screenings_desc' => 'sanitize_textarea_field',
			'process_milestone_screenings_bullet1' => 'sanitize_text_field',
			'process_milestone_screenings_bullet2' => 'sanitize_text_field',
			'process_milestone_assessments_icon' => 'sanitize_text_field',
			'process_milestone_assessments_title' => 'sanitize_text_field',
			'process_milestone_assessments_desc' => 'sanitize_textarea_field',
			'process_milestone_assessments_bullet1' => 'sanitize_text_field',
			'process_milestone_assessments_bullet2' => 'sanitize_text_field',
		),
		'wimper_process_cta_nonce' => array(
			'process_cta_title' => 'sanitize_text_field',
			'process_cta_description' => 'sanitize_textarea_field',
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
add_action('save_post', 'wimper_save_process_page_meta');

/**
 * Seed default values for Process page (formerly Curriculum)
 */
function wimper_seed_process_page_defaults($post_id)
{
	if (get_post_type($post_id) !== 'page') {
		return;
	}

	// This assumes the page template name will be updated to "page-process.php" or similar
	// For now, checking if it uses the old template name or potential new one
	$template = get_post_meta($post_id, '_wp_page_template', true);
	if ($template !== 'page-curriculum.php' && $template !== 'page-process.php') {
		return;
	}

	$already_seeded = get_post_meta($post_id, '_process_defaults_seeded', true);
	if ($already_seeded) {
		return;
	}

	$defaults = array(
		'process_hero_badge' => 'The WIMPER Advantage',
		'process_hero_title' => 'Legal Compliance. <br><span class="italic text-wimper-green">Financial Growth.</span>',
		'process_hero_description' => 'The WIMPER program leverages Section 125 of the tax code to reduce employer FICA tax liability while enhancing employee benefits packages. It is a strategic approach to payroll modernization.',

		'process_framework_title' => 'Our 5-Step Compliance Framework',
		'process_framework_description' => 'We utilize a proven methodology to ensure your business maximizes tax incentives while remaining fully compliant with IRS regulations.',

		'process_pillar_compliance_icon' => 'fa-solid fa-file-shield',
		'process_pillar_compliance_title' => 'Regulatory Compliance',
		'process_pillar_compliance_desc' => 'Adherence to Section 125, ERISA, and ACA guidelines to mitigate risk.',

		'process_pillar_savings_icon' => 'fa-solid fa-sack-dollar',
		'process_pillar_savings_title' => 'FICA Reduction',
		'process_pillar_savings_desc' => 'Reducing employer payroll tax burden through pre-tax benefit contributions.',

		'process_pillar_benefits_icon' => 'fa-solid fa-users-viewfinder',
		'process_pillar_benefits_title' => 'Employee Benefits',
		'process_pillar_benefits_desc' => 'Providing wellness plans and supplemental coverage at no net cost to employees.',

		'process_pillar_process_icon' => 'fa-solid fa-gears',
		'process_pillar_process_title' => 'Seamless Implementation',
		'process_pillar_process_desc' => 'Integration with existing payroll providers (ADP, Paychex, etc.) with minimal disruption.',

		'process_pillar_reporting_icon' => 'fa-solid fa-chart-pie',
		'process_pillar_reporting_title' => 'Audit-Ready Reporting',
		'process_pillar_reporting_desc' => 'Comprehensive documentation and monthly impact reports for stakeholders.',

		'process_timeline_badge' => 'Roadmap',
		'process_timeline_title' => 'Implementation Timeline',
		'process_timeline_description' => 'From initial audit to realized savings, our team handles every step of the WIMPER integration.',
		'process_timeline_image' => '', // Placeholder or remove if not needed

		'process_stage_audit_title' => 'Phase 1: Payroll Audit',
		'process_stage_audit_desc' => 'We analyze your current payroll structure to identify potential FICA tax savings and eligibility.',

		'process_stage_implementation_title' => 'Phase 2: Integration',
		'process_stage_implementation_desc' => 'We work with your HR team to roll out the Section 125 plan and enroll employees.',

		'process_stage_savings_title' => 'Phase 3: Realized Savings',
		'process_stage_savings_desc' => 'Immediate reduction in FICA tax liability visible on your next payroll cycle.',

		'process_env_badge' => 'Security',
		'process_env_title' => 'Compliance You Can Trust',
		'process_env_description' => 'We prioritize data security and legal soundness in every aspect of the WIMPER program.',

		'process_zone_legal_emoji' => '⚖️',
		'process_zone_legal_title' => 'Legal Defense',
		'process_zone_legal_desc' => 'Backed by top-tier tax attorneys specializing in employment tax law.',

		'process_zone_tech_emoji' => '🔒',
		'process_zone_tech_title' => 'Data Encryption',
		'process_zone_tech_desc' => 'SOC-2 compliant data handling for all payroll and employee information.',

		'process_zone_audit_emoji' => '📋',
		'process_zone_audit_title' => 'Audit Support',
		'process_zone_audit_desc' => 'Full representation and documentation support in the event of an IRS inquiry.',

		'process_milestones_title' => 'Measurable Impact',
		'process_milestones_subtitle' => 'Track your savings and participation rates in real-time.',

		'process_milestone_tracking_icon' => 'fa-solid fa-chart-line',
		'process_milestone_tracking_title' => 'Monthly Savings Reports',
		'process_milestone_tracking_desc' => 'Detailed breakdowns of FICA savings per pay period, aggregated monthly and quarterly.',
		'process_milestone_tracking_bullet1' => 'Payroll-level granularity',
		'process_milestone_tracking_bullet2' => 'YTD Savings Tracking',

		'process_milestone_screenings_icon' => 'fa-solid fa-magnifying-glass-chart',
		'process_milestone_screenings_title' => 'Participation Analytics',
		'process_milestone_screenings_desc' => 'Monitor employee enrollment and participation in wellness programs to ensure plan compliance.',
		'process_milestone_screenings_bullet1' => 'Enrollment Rates',
		'process_milestone_screenings_bullet2' => 'Engagement Metrics',

		'process_milestone_assessments_icon' => 'fa-solid fa-file-invoice-dollar',
		'process_milestone_assessments_title' => 'Net Benefit Analysis',
		'process_milestone_assessments_desc' => 'Quarterly reviews comparing program costs vs. tax savings to validate ROI.',
		'process_milestone_assessments_bullet1' => 'Cost-Benefit Analysis',
		'process_milestone_assessments_bullet2' => 'Future Projection Models',

		'process_cta_title' => 'Start Saving Today.',
		'process_cta_description' => 'Contact us for a complimentary payroll tax audit and savings projection.',
	);

	foreach ($defaults as $meta_key => $default_value) {
		update_post_meta($post_id, $meta_key, $default_value);
	}

	update_post_meta($post_id, '_process_defaults_seeded', '1');
}
add_action('save_post', 'wimper_seed_process_page_defaults', 5);
