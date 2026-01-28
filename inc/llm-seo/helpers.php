<?php
/**
 * LLM SEO Helper Functions
 * Template helpers for marking up citable content
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Wrap content in LLM-citable markup
 *
 * Marks content as highly structured and citable by LLMs
 * using semantic HTML and data attributes.
 *
 * @param string $content HTML content to wrap
 * @param array  $attrs   Additional HTML attributes (data-* recommended)
 * @return string Wrapped HTML
 *
 * @example
 * echo kidazzle_llm_citable(
 *     '<h3>Infant Tuition</h3><p>$279/week</p>',
 *     ['data-llm-intent' => 'pricing', 'data-llm-location-id' => 'cherokee-academy']
 * );
 */
function kidazzle_llm_citable($content, $attrs = [])
{
    $attrs_str = '';

    foreach ($attrs as $key => $value) {
        $attrs_str .= ' ' . esc_attr($key) . '="' . esc_attr($value) . '"';
    }

    return '<aside data-llm-citable="true"' . $attrs_str . '>' . $content . '</aside>';
}
