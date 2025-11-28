<?php
/**
 * General SEO Meta Boxes
 * Adds "SEO Meta" box to all public post types
 *
 * @package Chroma_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register SEO Meta Box
 */
function chroma_register_general_seo_meta_box()
{
    $screens = array('post', 'page', 'program', 'location');

    foreach ($screens as $screen) {
        add_meta_box(
            'chroma-general-seo',
            __('SEO Meta', 'chroma-excellence'),
            'chroma_render_general_seo_meta_box',
            $screen,
            'side',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'chroma_register_general_seo_meta_box');

/**
 * Render SEO Meta Box
 */
function chroma_render_general_seo_meta_box($post)
{
    wp_nonce_field('chroma_general_seo_nonce', 'chroma_general_seo_nonce_field');

    $meta_description = get_post_meta($post->ID, 'meta_description', true);
    $meta_keywords = get_post_meta($post->ID, 'meta_keywords', true);
    ?>
    <div class="chroma-seo-field" style="margin-bottom: 15px;">
        <label for="meta_description" style="display: block; font-weight: 600; margin-bottom: 5px;">
            <?php _e('Meta Description', 'chroma-excellence'); ?>
        </label>
        <textarea id="meta_description" name="meta_description" rows="4" style="width: 100%;"
            placeholder="<?php _e('Enter custom meta description...', 'chroma-excellence'); ?>"><?php echo esc_textarea($meta_description); ?></textarea>
        <p class="description" style="font-size: 12px; margin-top: 5px;">
            <?php _e('Leave empty to use the auto-generated description.', 'chroma-excellence'); ?>
        </p>
    </div>

    <div class="chroma-seo-field">
        <label for="meta_keywords" style="display: block; font-weight: 600; margin-bottom: 5px;">
            <?php _e('Meta Keywords', 'chroma-excellence'); ?>
        </label>
        <textarea id="meta_keywords" name="meta_keywords" rows="2" style="width: 100%;"
            placeholder="<?php _e('keyword1, keyword2, keyword3', 'chroma-excellence'); ?>"><?php echo esc_textarea($meta_keywords); ?></textarea>
        <p class="description" style="font-size: 12px; margin-top: 5px;">
            <?php _e('Comma-separated list. Leave empty to use auto-generated keywords.', 'chroma-excellence'); ?>
        </p>
    </div>
    <?php
}

/**
 * Save SEO Meta Box
 */
function chroma_save_general_seo_meta($post_id)
{
    // Verify nonce
    if (!isset($_POST['chroma_general_seo_nonce_field']) || !wp_verify_nonce(wp_unslash($_POST['chroma_general_seo_nonce_field']), 'chroma_general_seo_nonce')) {
        return;
    }

    // Check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Check permissions
    if (isset($_POST['post_type'])) {
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }
    }

    // Save fields
    if (isset($_POST['meta_description'])) {
        update_post_meta($post_id, 'meta_description', sanitize_textarea_field($_POST['meta_description']));
    }

    if (isset($_POST['meta_keywords'])) {
        update_post_meta($post_id, 'meta_keywords', sanitize_textarea_field($_POST['meta_keywords']));
    }
}
add_action('save_post', 'chroma_save_general_seo_meta');
