<?php
/**
 * Post Newsroom Meta Box
 *
 * @package Chroma_Excellence
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class Chroma_Post_Newsroom extends Chroma_Meta_Box_Base
{
    /**
     * Register the meta box
     */
    public function register()
    {
        $this->id = 'chroma_post_newsroom';
        $this->title = 'Newsroom Settings';
        $this->post_types = ['post'];
        $this->context = 'side';
        $this->priority = 'default';

        parent::register();
    }

    /**
     * Render the meta box content
     *
     * @param WP_Post $post The post object.
     */
    public function render($post)
    {
        wp_nonce_field('chroma_post_newsroom_nonce', 'chroma_post_newsroom_nonce');
        $show_in_newsroom = get_post_meta($post->ID, '_chroma_show_in_newsroom', true);
        ?>
        <div class="chroma-field-wrapper">
            <label for="chroma_show_in_newsroom">
                <input type="checkbox" id="chroma_show_in_newsroom" name="chroma_show_in_newsroom" value="1" <?php checked($show_in_newsroom, '1'); ?>>
                Show in Newsroom
            </label>
            <p class="description">Check this box to display this post on the Newsroom page.</p>
        </div>
        <?php
    }

    /**
     * Save the meta box data
     *
     * @param int $post_id The post ID.
     */
    public function save($post_id)
    {
        if (!isset($_POST['chroma_post_newsroom_nonce']) || !wp_verify_nonce($_POST['chroma_post_newsroom_nonce'], 'chroma_post_newsroom_nonce')) {
            return;
        }

        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        $val = isset($_POST['chroma_show_in_newsroom']) ? '1' : '';
        update_post_meta($post_id, '_chroma_show_in_newsroom', $val);
    }
}
