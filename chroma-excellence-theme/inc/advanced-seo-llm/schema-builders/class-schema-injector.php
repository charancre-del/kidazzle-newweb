<?php
/**
 * Schema Injector
 * Injects Organization, Person, and CourseInstance schema into relevant pages
 *
 * @package Chroma_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

{
    /**
     * Output Person Schema for Directors
     */
    public static function output_person_schema()
    {
        if (!is_singular('location')) {
            return;
        }

        $post_id = get_the_ID();
        $director_name = get_post_meta($post_id, 'location_director_name', true);
        $director_bio = get_post_meta($post_id, 'location_director_bio', true);
        $director_photo = get_post_meta($post_id, 'location_director_photo', true);

        if (!$director_name) {
            return;
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => $director_name,
            'jobTitle' => 'Center Director',
            'worksFor' => [
                '@type' => 'ChildCare',
                'name' => get_the_title($post_id),
                '@id' => get_permalink($post_id) . '#organization'
            ],
            'description' => $director_bio ? wp_strip_all_tags($director_bio) : sprintf(__('Director at %s', 'chroma-excellence'), get_the_title($post_id)),
        ];

        if ($director_photo) {
            $schema['image'] = $director_photo;
        }

        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
    }

    /**
     * Output CourseInstance Schema for Pre-K Programs
     */
    public static function output_course_schema()
    {
        if (!is_singular('program')) {
            return;
        }

        $post_id = get_the_ID();
        $title = get_the_title($post_id);

        // Only apply to Pre-K or educational programs
        if (stripos($title, 'Pre-K') === false && stripos($title, 'Preschool') === false && stripos($title, 'Kindergarten') === false) {
            return;
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'CourseInstance',
            'name' => $title,
            'description' => get_the_excerpt($post_id),
            'courseMode' => 'onsite',
            'provider' => [
                '@type' => 'Organization',
                'name' => get_bloginfo('name'),
                'url' => home_url()
            ]
        ];

        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
    }

    /**
     * Output Global Organization Schema
     */
    public static function output_organization_schema()
    {
        if (!is_front_page()) {
            return;
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            '@id' => home_url() . '#organization',
            'name' => get_bloginfo('name'),
            'url' => home_url(),
            'logo' => get_theme_mod('custom_logo') ? wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') : '',
            'sameAs' => [
                // Add social links here if available via theme mods
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => get_theme_mod('chroma_phone_number'), // Assuming this exists
                'contactType' => 'customer service'
            ]
        ];

        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>';
    }
}
