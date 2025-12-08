<?php
/**
 * Universal FAQ Schema Builder
 * Generates JSON-LD for FAQPage Schema from universal meta box
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class kidazzle_Universal_FAQ_Builder
{
    /**
     * Output FAQ schema
     */
    public static function output()
    {
        if (!is_singular()) {
            return;
        }

        $post_id = get_the_ID();
        $faqs = get_post_meta($post_id, 'kidazzle_faq_items', true);

        if (empty($faqs) || !is_array($faqs)) {
            return;
        }

        $main_entity = [];
        foreach ($faqs as $faq) {
            $main_entity[] = [
                '@type' => 'Question',
                'name' => $faq['question'],
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $faq['answer']
                ]
            ];
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => $main_entity
        ];

        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
    }
}
