<?php
/**
 * Post Newsroom Meta Box
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class kidazzle_Post_Newsroom extends kidazzle_Advanced_SEO_Meta_Box_Base
{
    /**
     * Get meta box ID
     *
     * @return string
     */
    public function get_id()
    {
        return 'kidazzle_post_newsroom';
    }

    /**
     * Get meta box title
     *
     * @return string
     */
    public function get_title()
    {
        return 'Newsroom Settings';
    }

    /**
     * Get allowed post types
     *
     * @return array
     */
    public function get_post_types()
    {
        return ['post'];
    }

    /**
     * Render the meta box fields
     *
     * @param WP_Post $post The post object.
     */
    public function render_fields($post)
    {
        $show_in_newsroom = get_post_meta($post->ID, '_kidazzle_show_in_newsroom', true);
        ?>
        <div class="kidazzle-field-wrapper">
            <label for="kidazzle_show_in_newsroom">
                <input type="checkbox" id="kidazzle_show_in_newsroom" name="kidazzle_show_in_newsroom" value="1" <?php checked($show_in_newsroom, '1'); ?>>
                Show in Newsroom
            </label>
            <p class="description">Check this box to display this post on the Newsroom page.</p>
        </div>
        <?php
    }

    /**
     * Save the meta box fields
     *
     * @param int $post_id The post ID.
     */
    public function save_fields($post_id)
    {
        $val = isset($_POST['kidazzle_show_in_newsroom']) ? '1' : '';
        update_post_meta($post_id, '_kidazzle_show_in_newsroom', $val);
    }
}
