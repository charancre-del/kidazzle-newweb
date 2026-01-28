<?php
/**
 * Universal FAQ Meta Box
 * Allows adding FAQ items to any page for FAQPage schema
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class kidazzle_Universal_FAQ extends kidazzle_Advanced_SEO_Meta_Box_Base
{
    /**
     * Get the meta box ID
     *
     * @return string
     */
    public function get_id()
    {
        return 'kidazzle_universal_faq';
    }

    /**
     * Get the meta box title
     *
     * @return string
     */
    public function get_title()
    {
        return __('FAQ Schema (LLM Optimized)', 'kidazzle-theme');
    }

    /**
     * Get post types this meta box applies to
     *
     * @return array
     */
    public function get_post_types()
    {
        return ['page', 'location', 'program', 'post', 'city'];
    }

    /**
     * Render the meta box fields
     *
     * @param WP_Post $post Current post object
     */
    public function render_fields($post)
    {
        $faqs = get_post_meta($post->ID, 'kidazzle_faq_items', true);
        if (!is_array($faqs)) {
            $faqs = [];
        }
        ?>
        <div class="kidazzle-field-wrapper">
            <p class="description">
                <?php _e('Add Questions and Answers here. They will be output as <strong>FAQPage Schema</strong>, which is highly visible to Google and LLMs.', 'kidazzle-theme'); ?>
            </p>

            <div class="kidazzle-repeater-field">
                <div class="kidazzle-repeater-items">
                    <?php if (!empty($faqs)): ?>
                        <?php foreach ($faqs as $faq): ?>
                            <div class="kidazzle-repeater-item"
                                style="display:block; border-bottom:1px solid #eee; padding-bottom:10px; margin-bottom:10px;">
                                <div style="margin-bottom:5px;">
                                    <label><?php _e('Question:', 'kidazzle-theme'); ?></label>
                                    <input type="text" name="kidazzle_faq_question[]" value="<?php echo esc_attr($faq['question']); ?>"
                                        class="widefat" />
                                </div>
                                <div style="display:flex; gap:10px; align-items:flex-start;">
                                    <div style="flex:1;">
                                        <label><?php _e('Answer:', 'kidazzle-theme'); ?></label>
                                        <textarea name="kidazzle_faq_answer[]" rows="2"
                                            class="widefat"><?php echo esc_textarea($faq['answer']); ?></textarea>
                                    </div>
                                    <button class="button kidazzle-remove-item" style="margin-top:20px;">&times;</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="kidazzle-repeater-item"
                            style="display:block; border-bottom:1px solid #eee; padding-bottom:10px; margin-bottom:10px;">
                            <div style="margin-bottom:5px;">
                                <label><?php _e('Question:', 'kidazzle-theme'); ?></label>
                                <input type="text" name="kidazzle_faq_question[]" class="widefat" />
                            </div>
                            <div style="display:flex; gap:10px; align-items:flex-start;">
                                <div style="flex:1;">
                                    <label><?php _e('Answer:', 'kidazzle-theme'); ?></label>
                                    <textarea name="kidazzle_faq_answer[]" rows="2" class="widefat"></textarea>
                                </div>
                                <button class="button kidazzle-remove-item" style="margin-top:20px;">&times;</button>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <button class="button kidazzle-add-item"><?php _e('Add Question', 'kidazzle-theme'); ?></button>
            </div>
        </div>

        <script>
            jQuery(document).ready(function ($) {
                // Enhanced repeater for block-style items
                $('.kidazzle-add-item').off('click').on('click', function (e) {
                    e.preventDefault();
                    var $wrapper = $(this).closest('.kidazzle-repeater-field');
                    var $items = $wrapper.find('.kidazzle-repeater-items');
                    var $clone = $items.find('.kidazzle-repeater-item').first().clone();
                    $clone.find('input, textarea').val('');
                    $items.append($clone);
                });
            });
        </script>
        <?php
    }

    /**
     * Save the meta box fields
     *
     * @param int $post_id Post ID
     */
    public function save_fields($post_id)
    {
        if (isset($_POST['kidazzle_faq_question']) && isset($_POST['kidazzle_faq_answer'])) {
            $questions = $_POST['kidazzle_faq_question'];
            $answers = $_POST['kidazzle_faq_answer'];
            $faqs = [];

            for ($i = 0; $i < count($questions); $i++) {
                if (!empty($questions[$i]) && !empty($answers[$i])) {
                    $faqs[] = [
                        'question' => sanitize_text_field($questions[$i]),
                        'answer' => sanitize_textarea_field($answers[$i]),
                    ];
                }
            }

            update_post_meta($post_id, 'kidazzle_faq_items', $faqs);
        } else {
            delete_post_meta($post_id, 'kidazzle_faq_items');
        }
    }
}
