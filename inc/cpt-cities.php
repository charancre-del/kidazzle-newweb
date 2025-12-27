<?php
/**
 * Register City Custom Post Type
 *
 * @package kidazzle
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function kidazzle_register_city_cpt()
{
    $labels = array(
        'name' => _x('Cities', 'Post Type General Name', 'kidazzle'),
        'singular_name' => _x('City', 'Post Type Singular Name', 'kidazzle'),
        'menu_name' => __('Cities', 'kidazzle'),
        'name_admin_bar' => __('City', 'kidazzle'),
        'archives' => __('City Archives', 'kidazzle'),
        'attributes' => __('City Attributes', 'kidazzle'),
        'parent_item_colon' => __('Parent City:', 'kidazzle'),
        'all_items' => __('All Cities', 'kidazzle'),
        'add_new_item' => __('Add New City', 'kidazzle'),
        'add_new' => __('Add New', 'kidazzle'),
        'new_item' => __('New City', 'kidazzle'),
        'edit_item' => __('Edit City', 'kidazzle'),
        'update_item' => __('Update City', 'kidazzle'),
        'view_item' => __('View City', 'kidazzle'),
        'view_items' => __('View Cities', 'kidazzle'),
        'search_items' => __('Search City', 'kidazzle'),
        'not_found' => __('Not found', 'kidazzle'),
        'not_found_in_trash' => __('Not found in Trash', 'kidazzle'),
        'featured_image' => __('City Image', 'kidazzle'),
        'set_featured_image' => __('Set city image', 'kidazzle'),
        'remove_featured_image' => __('Remove city image', 'kidazzle'),
        'use_featured_image' => __('Use as city image', 'kidazzle'),
        'insert_into_item' => __('Insert into city', 'kidazzle'),
        'uploaded_to_this_item' => __('Uploaded to this city', 'kidazzle'),
        'items_list' => __('Cities list', 'kidazzle'),
        'items_list_navigation' => __('Cities list navigation', 'kidazzle'),
        'filter_items_list' => __('Filter cities list', 'kidazzle'),
    );
    $args = array(
        'label' => __('City', 'kidazzle'),
        'description' => __('Hyperlocal landing pages for cities', 'kidazzle'),
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



