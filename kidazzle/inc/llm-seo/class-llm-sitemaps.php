<?php
/**
 * LLM Sitemaps
 * Generates XML sitemap of machine-readable JSON endpoints
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

class kidazzle_LLM_Sitemaps
{
    /**
     * Register rewrite rules for sitemap
     */
    public static function register_rewrites()
    {
        add_rewrite_rule(
            '^llm-sitemap\.xml$',
            'index.php?kidazzle_llm_sitemap=1',
            'top'
        );
    }

    /**
     * Add custom query vars
     */
    public static function add_query_vars($vars)
    {
        $vars[] = 'kidazzle_llm_sitemap';
        return $vars;
    }

    /**
     * Maybe output sitemap if the request matches
     */
    public static function maybe_output_sitemap()
    {
        if (!get_query_var('kidazzle_llm_sitemap')) {
            return;
        }

        header('Content-Type: application/xml; charset=utf-8');
        echo self::generate_sitemap_xml();
        exit;
    }

    /**
     * Generate the sitemap XML
     *
     * @return string
     */
    private static function generate_sitemap_xml()
    {
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Get all locations
        $locations = self::get_all_locations();

        foreach ($locations as $location) {
            $slug = $location['slug'];
            $modified = $location['modified'];

            // Add location data.json
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . esc_url(home_url("/locations/{$slug}/data.json")) . '</loc>' . "\n";
            $xml .= '    <lastmod>' . esc_html($modified) . '</lastmod>' . "\n";
            $xml .= '    <changefreq>weekly</changefreq>' . "\n";
            $xml .= '  </url>' . "\n";

            // Add location faq.json
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . esc_url(home_url("/locations/{$slug}/faq.json")) . '</loc>' . "\n";
            $xml .= '    <lastmod>' . esc_html($modified) . '</lastmod>' . "\n";
            $xml .= '    <changefreq>monthly</changefreq>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        // Get all programs
        $programs = self::get_all_programs();

        foreach ($programs as $program) {
            $slug = $program['slug'];
            $modified = $program['modified'];

            // Add program data.json
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . esc_url(home_url("/programs/{$slug}/data.json")) . '</loc>' . "\n";
            $xml .= '    <lastmod>' . esc_html($modified) . '</lastmod>' . "\n";
            $xml .= '    <changefreq>monthly</changefreq>' . "\n";
            $xml .= '  </url>' . "\n";

            // Add program faq.json
            $xml .= '  <url>' . "\n";
            $xml .= '    <loc>' . esc_url(home_url("/programs/{$slug}/faq.json")) . '</loc>' . "\n";
            $xml .= '    <lastmod>' . esc_html($modified) . '</lastmod>' . "\n";
            $xml .= '    <changefreq>monthly</changefreq>' . "\n";
            $xml .= '  </url>' . "\n";
        }

        $xml .= '</urlset>';

        return $xml;
    }

    /**
     * Get all published locations with slugs and modification dates
     *
     * @return array
     */
    private static function get_all_locations()
    {
        $posts = get_posts([
            'post_type' => 'location',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);

        $locations = [];
        foreach ($posts as $post) {
            $locations[] = [
                'slug' => $post->post_name,
                'modified' => get_the_modified_date('c', $post->ID),
            ];
        }

        return $locations;
    }

    /**
     * Get all published programs with slugs and modification dates
     *
     * @return array
     */
    private static function get_all_programs()
    {
        $posts = get_posts([
            'post_type' => 'program',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);

        $programs = [];
        foreach ($posts as $post) {
            $programs[] = [
                'slug' => $post->post_name,
                'modified' => get_the_modified_date('c', $post->ID),
            ];
        }

        return $programs;
    }
}
