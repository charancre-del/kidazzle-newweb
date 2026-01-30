<?php
/**
 * Custom Post Type: Team Members
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Team Member CPT
 */
function wimper_register_team_member_cpt()
{
    $labels = array(
        'name' => _x('Team Members', 'Post Type General Name', 'wimper-theme'),
        'singular_name' => _x('Team Member', 'Post Type Singular Name', 'wimper-theme'),
        'menu_name' => __('Team Members', 'wimper-theme'),
        'all_items' => __('All Team Members', 'wimper-theme'),
        'add_new_item' => __('Add New Team Member', 'wimper-theme'),
        'edit_item' => __('Edit Team Member', 'wimper-theme'),
        'view_item' => __('View Team Member', 'wimper-theme'),
        'search_items' => __('Search Team Members', 'wimper-theme'),
        'not_found' => __('No team members found', 'wimper-theme'),
        'not_found_in_trash' => __('No team members found in Trash', 'wimper-theme'),
    );

    $args = array(
        'label' => __('Team Member', 'wimper-theme'),
        'labels' => $labels,
        'supports' => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'public' => true,
        'publicly_queryable' => false,
        'show_ui' => true,
        'show_in_nav_menus' => false,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-groups',
        'has_archive' => false,
        'rewrite' => false,
        'query_var' => false,
        'show_in_rest' => true,
        'exclude_from_search' => true,
    );

    register_post_type('team_member', $args);
}
add_action('init', 'wimper_register_team_member_cpt');

/**
 * Register meta fields for Team Member title/role.
 */
function wimper_register_team_member_meta()
{
    register_post_meta(
        'team_member',
        'team_member_title',
        array(
            'object_subtype' => 'team_member',
            'type' => 'string',
            'single' => true,
            'show_in_rest' => true,
            'sanitize_callback' => 'sanitize_text_field',
            'auth_callback' => function () {
                return current_user_can('edit_posts');
            },
        )
    );
}
add_action('init', 'wimper_register_team_member_meta');

/**
 * Add Meta Box for Team Member Details
 */
function wimper_team_member_add_meta_box()
{
    add_meta_box(
        'wimper_team_member_details',
        __('Team Member Details', 'wimper-theme'),
        'wimper_team_member_render_meta_box',
        'team_member',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'wimper_team_member_add_meta_box');

/**
 * Render Meta Box Content
 */
function wimper_team_member_render_meta_box($post)
{
    wp_nonce_field('wimper_team_member_save', 'wimper_team_member_nonce');
    $value = get_post_meta($post->ID, 'team_member_title', true);
    ?>
    <p>
        <label for="team_member_title"
            style="font-weight:bold; display:block; margin-bottom:5px;"><?php _e('Job Title / Role', 'wimper-theme'); ?></label>
        <input type="text" id="team_member_title" name="team_member_title" value="<?php echo esc_attr($value); ?>"
            class="widefat" style="width:100%; max-width:400px;">
        <span class="description"
            style="display:block; margin-top:5px;"><?php _e('e.g. "Executive Director" or "Lead Teacher"', 'wimper-theme'); ?></span>
    </p>
    <?php
}

/**
 * Save Meta Box Data
 */
function wimper_team_member_save_meta_box($post_id)
{
    if (!isset($_POST['wimper_team_member_nonce']) || !wp_verify_nonce($_POST['wimper_team_member_nonce'], 'wimper_team_member_save')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['team_member_title'])) {
        update_post_meta($post_id, 'team_member_title', sanitize_text_field($_POST['team_member_title']));
    }
}
add_action('save_post', 'wimper_team_member_save_meta_box');

/**
 * Add admin columns for Team Members.
 */
function wimper_team_member_admin_columns($columns)
{
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = __('Name', 'wimper-theme');
    $new_columns['role'] = __('Title', 'wimper-theme');
    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter('manage_team_member_posts_columns', 'wimper_team_member_admin_columns');

/**
 * Populate admin columns.
 */
function wimper_team_member_admin_column_content($column, $post_id)
{
    switch ($column) {
        case 'role':
            $title = get_post_meta($post_id, 'team_member_title', true);
            echo $title ? esc_html($title) : '—';
            break;
    }
}
add_action('manage_team_member_posts_custom_column', 'wimper_team_member_admin_column_content', 10, 2);

/**
 * Seed default team members to populate About page cards.
 */
function wimper_seed_default_team_members()
{
    $existing = get_posts(
        array(
            'post_type' => 'team_member',
            'posts_per_page' => 1,
            'post_status' => 'any',
            'fields' => 'ids',
        )
    );

    if (get_option('wimper_team_members_seeded') && !empty($existing)) {
        return;
    }

    // If posts exist but the option was never set (e.g., after theme updates),
    // mark the site as seeded so we do not insert duplicates on every request.
    if (!empty($existing)) {
        update_option('wimper_team_members_seeded', 1);
        return;
    }

    $defaults = array(
        array(
            'post_title' => __('Jordan Avery', 'wimper-theme'),
            'post_content' => __('Jordan leads the W.I.M.P.E.R. creative team with a passion for creating joyful, evidence-based learning experiences for every child.', 'wimper-theme'),
            'role' => __('Executive Director', 'wimper-theme'),
        ),
        array(
            'post_title' => __('Samira Patel', 'wimper-theme'),
            'post_content' => __('Samira partners with families and educators to ensure each center reflects the needs of its community.', 'wimper-theme'),
            'role' => __('Director of Family Partnerships', 'wimper-theme'),
        ),
        array(
            'post_title' => __('Luis Moreno', 'wimper-theme'),
            'post_content' => __('Luis coaches classroom teams, championing playful curricula that meet students where they are.', 'wimper-theme'),
            'role' => __('Director of Learning', 'wimper-theme'),
        ),
    );

    foreach ($defaults as $index => $member) {
        $post_id = wp_insert_post(
            array(
                'post_type' => 'team_member',
                'post_status' => 'publish',
                'post_title' => $member['post_title'],
                'post_content' => $member['post_content'],
                'menu_order' => $index,
            )
        );

        if (!is_wp_error($post_id) && !empty($member['role'])) {
            update_post_meta($post_id, 'team_member_title', $member['role']);
        }
    }

    update_option('wimper_team_members_seeded', 1);
}
add_action('after_switch_theme', 'wimper_seed_default_team_members');
add_action('init', 'wimper_seed_default_team_members', 20);
