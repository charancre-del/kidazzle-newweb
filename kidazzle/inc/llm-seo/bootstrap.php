<?php
/**
 * LLM SEO Module - Bootstrap
 * Loads all module components and registers hooks
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Load component files
require_once __DIR__ . '/class-llm-data-endpoints.php';
require_once __DIR__ . '/class-llm-sitemaps.php';
require_once __DIR__ . '/helpers.php';

// Register rewrite rules
add_action('init', ['kidazzle_LLM_Data_Endpoints', 'register_rewrites']);

// Add custom query vars
add_filter('query_vars', ['kidazzle_LLM_Data_Endpoints', 'add_query_vars']);

// Handle JSON output for data endpoints
add_action('template_redirect', ['kidazzle_LLM_Data_Endpoints', 'maybe_output_json'], 1);

// Add FAQ schema to location pages (priority 6, after location schema)
add_action('wp_head', ['kidazzle_LLM_Data_Endpoints', 'output_location_faq_schema'], 6);

// Register sitemap rewrites
add_action('init', ['kidazzle_LLM_Sitemaps', 'register_rewrites']);

// Add sitemap query vars
add_filter('query_vars', ['kidazzle_LLM_Sitemaps', 'add_query_vars']);

// Handle sitemap output
add_action('template_redirect', ['kidazzle_LLM_Sitemaps', 'maybe_output_sitemap'], 1);
