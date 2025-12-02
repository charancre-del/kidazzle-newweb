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

// Load core classes
require_once __DIR__ . '/class-meta-box-base.php';
require_once __DIR__ . '/class-fallback-resolver.php';
require_once __DIR__ . '/class-field-sanitizer.php';

// Load schema builders
require_once __DIR__ . '/schema-builders/class-service-area-builder.php';
require_once __DIR__ . '/schema-builders/class-llm-context-builder.php';

// Load meta boxes
require_once __DIR__ . '/meta-boxes/class-location-service-area.php';
require_once __DIR__ . '/meta-boxes/class-location-llm-context.php';
require_once __DIR__ . '/meta-boxes/class-location-llm-prompt.php';
require_once __DIR__ . '/meta-boxes/class-location-reviews.php';
require_once __DIR__ . '/meta-boxes/class-location-citation-facts.php';

// Register meta boxes
function chroma_register_advanced_seo_meta_boxes()
{
    $meta_boxes = [
        new Chroma_Location_Service_Area_Meta_Box(),
        new Chroma_Location_LLM_Context_Meta_Box(),
        new Chroma_Location_LLM_Prompt_Meta_Box(),
        new Chroma_Location_Reviews_Meta_Box(),
        new Chroma_Location_Citation_Facts_Meta_Box(),
    ];

    foreach ($meta_boxes as $box) {
        $box->register();
    }
}
add_action('init', 'chroma_register_advanced_seo_meta_boxes');

// Enqueue admin assets
function chroma_advanced_seo_admin_assets($hook)
{
    if ('post.php' !== $hook && 'post-new.php' !== $hook) {
        return;
    }

    $screen = get_current_screen();
    if (!$screen || !in_array($screen->post_type, ['location', 'program'])) {
        return;
    }

    // Inline CSS for now
    ?>
    <style>
        .chroma-advanced-seo-meta-box {
            padding: 10px 0;
        }

        .chroma-field-wrapper {
            margin-bottom: 20px;
        }

        .chroma-field-wrapper label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .chroma-field-wrapper .description {
            margin-top: 5px;
            font-style: normal;
            color: #666;
        }

        .chroma-field-wrapper .fallback-notice {
            color: #2271b1;
            font-style: italic;
        }

        .chroma-repeater-field {
            border: 1px solid #ddd;
            padding: 15px;
            background: #f9f9f9;
        }

        .chroma-repeater-items {
            margin-bottom: 10px;
        }

        .chroma-repeater-item {
            display: flex;
            gap: 10px;
            margin-bottom: 8px;
            align-items: center;
        }

        .chroma-repeater-item input {
            flex: 1;
        }

        .chroma-remove-item {
            color: #b32d2e;
        }
    </style>
    <script>
        jQuery(document).ready(function ($) {
            // Handle repeater add button
            $(document).on('click', '.chroma-add-item', function (e) {
                e.preventDefault();
                var $wrapper = $(this).closest('.chroma-repeater-field');
                var $items = $wrapper.find('.chroma-repeater-items');
                var fieldId = $wrapper.data('field-id');
                var placeholder = $wrapper.find('.chroma-repeater-item input').first().attr('placeholder') || '';

                var $newItem = $('<div class="chroma-repeater-item">' +
                    '<input type="text" name="' + fieldId + '[]" value="" class="regular-text" placeholder="' + placeholder + '" />' +
                    '<button type="button" class="button chroma-remove-item">Remove</button>' +
                    '</div>');

                $items.append($newItem);
            });

            // Handle repeater remove button
            $(document).on('click', '.chroma-remove-item', function (e) {
                e.preventDefault();
                $(this).closest('.chroma-repeater-item').remove();
            });
        });
    </script>
    <?php
}
add_action('admin_enqueue_scripts', 'chroma_advanced_seo_admin_assets');
