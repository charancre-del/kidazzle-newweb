<?php
/**
 * Register City Custom Post Type
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function kidazzle_register_city_cpt()
{
    $labels = array(
        'name' => _x('Cities', 'Post Type General Name', 'kidazzle-theme'),
        'singular_name' => _x('City', 'Post Type Singular Name', 'kidazzle-theme'),
        'menu_name' => __('Cities', 'kidazzle-theme'),
        'name_admin_bar' => __('City', 'kidazzle-theme'),
        'archives' => __('City Archives', 'kidazzle-theme'),
        'attributes' => __('City Attributes', 'kidazzle-theme'),
        'parent_item_colon' => __('Parent City:', 'kidazzle-theme'),
        'all_items' => __('All Cities', 'kidazzle-theme'),
        'add_new_item' => __('Add New City', 'kidazzle-theme'),
        'add_new' => __('Add New', 'kidazzle-theme'),
        'new_item' => __('New City', 'kidazzle-theme'),
        'edit_item' => __('Edit City', 'kidazzle-theme'),
        'update_item' => __('Update City', 'kidazzle-theme'),
        'view_item' => __('View City', 'kidazzle-theme'),
        'view_items' => __('View Cities', 'kidazzle-theme'),
        'search_items' => __('Search City', 'kidazzle-theme'),
        'not_found' => __('Not found', 'kidazzle-theme'),
        'not_found_in_trash' => __('Not found in Trash', 'kidazzle-theme'),
        'featured_image' => __('City Image', 'kidazzle-theme'),
        'set_featured_image' => __('Set city image', 'kidazzle-theme'),
        'remove_featured_image' => __('Remove city image', 'kidazzle-theme'),
        'use_featured_image' => __('Use as city image', 'kidazzle-theme'),
        'insert_into_item' => __('Insert into city', 'kidazzle-theme'),
        'uploaded_to_this_item' => __('Uploaded to this city', 'kidazzle-theme'),
        'items_list' => __('Cities list', 'kidazzle-theme'),
        'items_list_navigation' => __('Cities list navigation', 'kidazzle-theme'),
        'filter_items_list' => __('Filter cities list', 'kidazzle-theme'),
    );
    $args = array(
        'label' => __('City', 'kidazzle-theme'),
        'description' => __('Hyperlocal landing pages for cities', 'kidazzle-theme'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'revisions', 'custom-fields'),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 22, // Below Locations
        'menu_icon' => 'dashicons-location',
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'can_export' => true,
        'has_archive' => false,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'show_in_rest' => true, // Enable Gutenberg
        'rewrite' => array('slug' => 'childcare'), // e.g., /childcare/canton-ga
    );
    register_post_type('city', $args);
}
add_action('init', 'kidazzle_register_city_cpt', 0);
