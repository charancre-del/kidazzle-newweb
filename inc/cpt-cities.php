<?php
/**
 * Register City Custom Post Type
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

function wimper_register_city_cpt()
{
    $labels = array(
        'name' => _x('Cities', 'Post Type General Name', 'wimper-theme'),
        'singular_name' => _x('City', 'Post Type Singular Name', 'wimper-theme'),
        'menu_name' => __('Cities', 'wimper-theme'),
        'name_admin_bar' => __('City', 'wimper-theme'),
        'archives' => __('City Archives', 'wimper-theme'),
        'attributes' => __('City Attributes', 'wimper-theme'),
        'parent_item_colon' => __('Parent City:', 'wimper-theme'),
        'all_items' => __('All Cities', 'wimper-theme'),
        'add_new_item' => __('Add New City', 'wimper-theme'),
        'add_new' => __('Add New', 'wimper-theme'),
        'new_item' => __('New City', 'wimper-theme'),
        'edit_item' => __('Edit City', 'wimper-theme'),
        'update_item' => __('Update City', 'wimper-theme'),
        'view_item' => __('View City', 'wimper-theme'),
        'view_items' => __('View Cities', 'wimper-theme'),
        'search_items' => __('Search City', 'wimper-theme'),
        'not_found' => __('Not found', 'wimper-theme'),
        'not_found_in_trash' => __('Not found in Trash', 'wimper-theme'),
        'featured_image' => __('City Image', 'wimper-theme'),
        'set_featured_image' => __('Set city image', 'wimper-theme'),
        'remove_featured_image' => __('Remove city image', 'wimper-theme'),
        'use_featured_image' => __('Use as city image', 'wimper-theme'),
        'insert_into_item' => __('Insert into city', 'wimper-theme'),
        'uploaded_to_this_item' => __('Uploaded to this city', 'wimper-theme'),
        'items_list' => __('Cities list', 'wimper-theme'),
        'items_list_navigation' => __('Cities list navigation', 'wimper-theme'),
        'filter_items_list' => __('Filter cities list', 'wimper-theme'),
    );
    $args = array(
        'label' => __('City', 'wimper-theme'),
        'description' => __('Hyperlocal landing pages for cities', 'wimper-theme'),
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
        'has_archive' => 'communities',
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
        'show_in_rest' => true, // Enable Gutenberg
        'rewrite' => array('slug' => 'childcare'), // e.g., /childcare/canton-ga
    );
    register_post_type('city', $args);
}
add_action('init', 'wimper_register_city_cpt', 0);
