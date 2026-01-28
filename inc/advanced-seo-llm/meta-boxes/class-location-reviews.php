<?php
/**
 * Location Reviews & Rating Meta Box
 * Allows editing review aggregation data
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class kidazzle_Location_Reviews_Meta_Box extends kidazzle_Advanced_SEO_Meta_Box_Base
{
    public function get_id()
    {
        return 'kidazzle_location_reviews';
    }

    public function get_title()
    {
        return __('Reviews & Rating', 'kidazzle-theme');
    }

    public function get_post_types()
    {
        return ['location'];
    }

    public function render_fields($post)
    {
        // Get current values
        $rating_value = get_post_meta($post->ID, 'seo_llm_aggregate_rating_value', true);
        $rating_count = get_post_meta($post->ID, 'seo_llm_aggregate_rating_count', true);
        $rating_best = get_post_meta($post->ID, 'seo_llm_aggregate_rating_best', true);
        $rating_worst = get_post_meta($post->ID, 'seo_llm_aggregate_rating_worst', true);

        echo '<div style="margin-bottom: 20px;">';
        echo '<p class="description"><strong>Add aggregate rating data to display stars in search results.</strong></p>';
        echo '<p class="description">Leave empty to avoid showing ratings. Only add real, verified rating data.</p>';
        echo '</div>';

        // Aggregate Rating
        echo '<h4>' . __('Aggregate Rating', 'kidazzle-theme') . '</h4>';

        $this->render_number_field([
            'id' => 'seo_llm_aggregate_rating_value',
            'label' => __('Rating Value (0-5)', 'kidazzle-theme'),
            'value' => $rating_value,
            'step' => '0.1',
            'min' => '0',
            'max' => '5',
            'placeholder' => '4.8',
            'description' => 'Average rating (e.g., 4.8 out of 5)',
        ]);

        $this->render_number_field([
            'id' => 'seo_llm_aggregate_rating_count',
            'label' => __('Review Count', 'kidazzle-theme'),
            'value' => $rating_count,
            'step' => '1',
            'min' => '0',
            'placeholder' => '127',
            'description' => 'Total number of reviews',
        ]);

        $this->render_number_field([
            'id' => 'seo_llm_aggregate_rating_best',
            'label' => __('Best Rating', 'kidazzle-theme'),
            'value' => $rating_best,
            'step' => '1',
            'min' => '1',
            'placeholder' => '5',
            'description' => 'Highest possible rating (usually 5)',
            'fallback_notice' => empty($rating_best) ? '5' : '',
        ]);

        $this->render_number_field([
            'id' => 'seo_llm_aggregate_rating_worst',
            'label' => __('Worst Rating', 'kidazzle-theme'),
            'value' => $rating_worst,
            'step' => '1',
            'min' => '1',
            'placeholder' => '1',
            'description' => 'Lowest possible rating (usually 1)',
            'fallback_notice' => empty($rating_worst) ? '1' : '',
        ]);
    }

    public function save_fields($post_id)
    {
        // Save rating value
        if (isset($_POST['seo_llm_aggregate_rating_value'])) {
            $value = kidazzle_Field_Sanitizer::sanitize_rating($_POST['seo_llm_aggregate_rating_value']);
            update_post_meta($post_id, 'seo_llm_aggregate_rating_value', $value);
        }

        // Save rating count
        if (isset($_POST['seo_llm_aggregate_rating_count'])) {
            $count = kidazzle_Field_Sanitizer::sanitize_number($_POST['seo_llm_aggregate_rating_count']);
            update_post_meta($post_id, 'seo_llm_aggregate_rating_count', $count);
        }

        // Save best rating
        if (isset($_POST['seo_llm_aggregate_rating_best'])) {
            $best = kidazzle_Field_Sanitizer::sanitize_number($_POST['seo_llm_aggregate_rating_best']);
            update_post_meta($post_id, 'seo_llm_aggregate_rating_best', $best);
        }

        // Save worst rating
        if (isset($_POST['seo_llm_aggregate_rating_worst'])) {
            $worst = kidazzle_Field_Sanitizer::sanitize_number($_POST['seo_llm_aggregate_rating_worst']);
            update_post_meta($post_id, 'seo_llm_aggregate_rating_worst', $worst);
        }
    }
}
