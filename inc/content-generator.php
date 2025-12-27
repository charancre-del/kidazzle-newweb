<?php
/**
 * KIDazzle Content Generator - Admin Page
 * 
 * Adds an admin page under "Tools" menu to generate theme content.
 * 
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add admin menu item
 */
function kidazzle_generator_admin_menu() {
    add_management_page(
        'KIDazzle Content Generator',
        'KIDazzle Generator',
        'manage_options',
        'kidazzle-generator',
        'kidazzle_generator_admin_page'
    );
}
add_action('admin_menu', 'kidazzle_generator_admin_menu');

/**
 * Render admin page
 */
function kidazzle_generator_admin_page() {
    if (!current_user_can('manage_options')) {
        return;
    }

    $messages = array();
    
    // Handle form submission
    if (isset($_POST['kidazzle_generate']) && check_admin_referer('kidazzle_generator_action')) {
        $action = sanitize_text_field($_POST['kidazzle_generate']);
        
        ob_start();
        
        switch ($action) {
            case 'pages':
                kidazzle_generate_pages();
                break;
            case 'locations':
                kidazzle_generate_locations();
                break;
            case 'programs':
                kidazzle_generate_programs();
                break;
            case 'menus':
                kidazzle_generate_menus();
                break;
            case 'all':
                kidazzle_generate_pages();
                kidazzle_generate_locations();
                kidazzle_generate_programs();
                kidazzle_generate_menus();
                break;
        }
        
        $messages = explode("\n", trim(ob_get_clean()));
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="card" style="max-width: 600px; margin-top: 20px;">
            <h2>Generate Theme Content</h2>
            <p>Use these buttons to generate required content for the KIDazzle theme. Existing content will be skipped.</p>
            
            <form method="post" style="margin-top: 20px;">
                <?php wp_nonce_field('kidazzle_generator_action'); ?>
                
                <table class="form-table">
                    <tr>
                        <th>Pages</th>
                        <td>
                            <button type="submit" name="kidazzle_generate" value="pages" class="button">Generate Pages</button>
                            <p class="description">Creates: Home, About, Programs, Curriculum, Locations, Resources, etc.</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Locations</th>
                        <td>
                            <button type="submit" name="kidazzle_generate" value="locations" class="button">Generate Locations</button>
                            <p class="description">Creates: 3 Memphis, 3 Atlanta, 2 Doral location entries</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Programs</th>
                        <td>
                            <button type="submit" name="kidazzle_generate" value="programs" class="button">Generate Programs</button>
                            <p class="description">Creates: Infants, Toddlers, Preschool, Pre-K, GA Pre-K, VPK, After School, Summer Camp</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Menus</th>
                        <td>
                            <button type="submit" name="kidazzle_generate" value="menus" class="button">Generate Menus</button>
                            <p class="description">Creates: Primary Menu, Footer Menu, Footer Contact Menu</p>
                        </td>
                    </tr>
                    <tr>
                        <th><strong>All Content</strong></th>
                        <td>
                            <button type="submit" name="kidazzle_generate" value="all" class="button button-primary button-hero">Generate All Content</button>
                            <p class="description">Runs all generators above in sequence.</p>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        
        <?php if (!empty($messages)) : ?>
        <div class="card" style="max-width: 600px; margin-top: 20px; background: #f6f7f7;">
            <h2>Generation Results</h2>
            <pre style="background: #1d2327; color: #50c878; padding: 15px; border-radius: 4px; overflow: auto; max-height: 400px;"><?php 
                foreach ($messages as $msg) {
                    echo esc_html($msg) . "\n";
                }
            ?></pre>
        </div>
        <?php endif; ?>
        
        <div class="card" style="max-width: 600px; margin-top: 20px;">
            <h2>Notes</h2>
            <ul style="list-style: disc; padding-left: 20px;">
                <li>Existing content with the same slug will be <strong>skipped</strong> (not overwritten)</li>
                <li>The Location and Program CPTs must be registered for those generators to work</li>
                <li>After generating, set the homepage in <a href="<?php echo admin_url('options-reading.php'); ?>">Settings → Reading</a></li>
            </ul>
        </div>
    </div>
    <?php
}

// =====================================
// GENERATOR FUNCTIONS
// =====================================

/**
 * Generate all required pages
 */
function kidazzle_generate_pages() {
    $pages = array(
        array('title' => 'Home', 'slug' => 'home', 'template' => ''),
        array('title' => 'About Us', 'slug' => 'about', 'template' => 'page-about.php'),
        array('title' => 'Programs', 'slug' => 'programs', 'template' => 'page-programs.php'),
        array('title' => 'Curriculum', 'slug' => 'curriculum', 'template' => 'page-curriculum.php'),
        array('title' => 'Locations', 'slug' => 'locations', 'template' => 'page-locations.php'),
        array('title' => 'Parent Resources', 'slug' => 'resources', 'template' => 'page-resources.php'),
        array('title' => 'Teacher Portal', 'slug' => 'teacher-portal', 'template' => 'page-teacher-portal.php'),
        array('title' => 'Parent Stories', 'slug' => 'stories', 'template' => 'page-stories.php'),
        array('title' => 'Schedule a Tour', 'slug' => 'schedule-tour', 'template' => 'page-schedule-tour.php'),
        array('title' => 'Contact Us', 'slug' => 'contact', 'template' => 'page-contact.php'),
        array('title' => 'Careers', 'slug' => 'careers', 'template' => 'page-careers.php'),
        array('title' => 'Privacy Policy', 'slug' => 'privacy-policy', 'template' => ''),
    );

    $created = $skipped = 0;

    foreach ($pages as $page_data) {
        $existing = get_page_by_path($page_data['slug']);
        
        if ($existing) {
            echo "⏭️  Skipped: {$page_data['title']} (exists)\n";
            $skipped++;
            continue;
        }

        $page_id = wp_insert_post(array(
            'post_title'  => $page_data['title'],
            'post_name'   => $page_data['slug'],
            'post_status' => 'publish',
            'post_type'   => 'page',
            'post_author' => get_current_user_id(),
        ));

        if ($page_id && !is_wp_error($page_id)) {
            if (!empty($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }
            echo "✅ Created: {$page_data['title']}\n";
            $created++;
        }
    }

    // Set front page
    $home = get_page_by_path('home');
    if ($home) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home->ID);
        echo "🏠 Set 'Home' as front page\n";
    }

    echo "\n📊 Pages: {$created} created, {$skipped} skipped\n";
}

/**
 * Generate locations
 */
function kidazzle_generate_locations() {
    if (!post_type_exists('location')) {
        echo "⚠️  Location CPT not registered. Register it first.\n";
        return;
    }

    $locations = array(
        // Memphis
        array('title' => 'KIDazzle Cordova', 'slug' => 'cordova', 'region' => 'Memphis', 'is_hq' => true),
        array('title' => 'KIDazzle Germantown', 'slug' => 'germantown', 'region' => 'Memphis', 'is_hq' => false),
        array('title' => 'KIDazzle Collierville', 'slug' => 'collierville', 'region' => 'Memphis', 'is_hq' => false),
        // Atlanta
        array('title' => 'KIDazzle Buckhead', 'slug' => 'buckhead', 'region' => 'Atlanta', 'is_hq' => false),
        array('title' => 'KIDazzle Sandy Springs', 'slug' => 'sandy-springs', 'region' => 'Atlanta', 'is_hq' => false),
        array('title' => 'KIDazzle Alpharetta', 'slug' => 'alpharetta', 'region' => 'Atlanta', 'is_hq' => false),
        // Doral
        array('title' => 'KIDazzle Doral', 'slug' => 'doral', 'region' => 'Doral', 'is_hq' => false),
        array('title' => 'KIDazzle Miami Lakes', 'slug' => 'miami-lakes', 'region' => 'Doral', 'is_hq' => false),
    );

    $created = $skipped = 0;

    foreach ($locations as $loc) {
        $existing = get_page_by_path($loc['slug'], OBJECT, 'location');
        
        if ($existing) {
            echo "⏭️  Skipped: {$loc['title']} (exists)\n";
            $skipped++;
            continue;
        }

        $location_id = wp_insert_post(array(
            'post_title'  => $loc['title'],
            'post_name'   => $loc['slug'],
            'post_content' => 'Premier early learning center in ' . $loc['region'] . '.',
            'post_status' => 'publish',
            'post_type'   => 'location',
            'post_author' => get_current_user_id(),
        ));

        if ($location_id && !is_wp_error($location_id)) {
            update_post_meta($location_id, 'region', $loc['region']);
            update_post_meta($location_id, 'is_hq', $loc['is_hq'] ? '1' : '0');
            echo "✅ Created: {$loc['title']} ({$loc['region']})\n";
            $created++;
        }
    }

    echo "\n📊 Locations: {$created} created, {$skipped} skipped\n";
}

/**
 * Generate programs
 */
function kidazzle_generate_programs() {
    if (!post_type_exists('program')) {
        echo "⚠️  Program CPT not registered.\n";
        return;
    }

    $programs = array(
        array('title' => 'Infants', 'slug' => 'infants', 'age' => '6 weeks - 12 months'),
        array('title' => 'Toddlers', 'slug' => 'toddlers', 'age' => '12 - 24 months'),
        array('title' => 'Preschool', 'slug' => 'preschool', 'age' => '2 - 3 years'),
        array('title' => 'Pre-K', 'slug' => 'pre-k', 'age' => '4 - 5 years'),
        array('title' => 'GA Pre-K', 'slug' => 'ga-pre-k', 'age' => '4 years'),
        array('title' => 'VPK', 'slug' => 'vpk', 'age' => '4 years'),
        array('title' => 'After School', 'slug' => 'after-school', 'age' => '5 - 12 years'),
        array('title' => 'Summer Camp', 'slug' => 'summer-camp', 'age' => '5 - 12 years'),
    );

    $created = $skipped = 0;

    foreach ($programs as $prog) {
        $existing = get_page_by_path($prog['slug'], OBJECT, 'program');
        
        if ($existing) {
            echo "⏭️  Skipped: {$prog['title']} (exists)\n";
            $skipped++;
            continue;
        }

        $prog_id = wp_insert_post(array(
            'post_title'  => $prog['title'],
            'post_name'   => $prog['slug'],
            'post_status' => 'publish',
            'post_type'   => 'program',
            'post_author' => get_current_user_id(),
        ));

        if ($prog_id && !is_wp_error($prog_id)) {
            update_post_meta($prog_id, 'age_range', $prog['age']);
            echo "✅ Created: {$prog['title']}\n";
            $created++;
        }
    }

    echo "\n📊 Programs: {$created} created, {$skipped} skipped\n";
}

/**
 * Generate navigation menus
 */
function kidazzle_generate_menus() {
    $menus = array(
        'primary' => array(
            'name' => 'Primary Menu',
            'items' => array(
                'About' => '/about/',
                'Programs' => '/programs/',
                'Curriculum' => '/curriculum/',
                'Locations' => '/locations/',
                'Resources' => '/resources/',
            ),
        ),
        'footer' => array(
            'name' => 'Footer Menu',
            'items' => array(
                'About Us' => '/about/',
                'Programs' => '/programs/',
                'Careers' => '/careers/',
                'Privacy Policy' => '/privacy-policy/',
            ),
        ),
        'footer_contact' => array(
            'name' => 'Footer Contact',
            'items' => array(
                'Schedule a Tour' => '/schedule-tour/',
                'Contact Us' => '/contact/',
                'Teacher Portal' => '/teacher-portal/',
            ),
        ),
    );

    foreach ($menus as $location => $menu_data) {
        $menu_exists = wp_get_nav_menu_object($menu_data['name']);
        
        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($menu_data['name']);
            
            if (!is_wp_error($menu_id)) {
                foreach ($menu_data['items'] as $title => $url) {
                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title'  => $title,
                        'menu-item-url'    => home_url($url),
                        'menu-item-status' => 'publish',
                        'menu-item-type'   => 'custom',
                    ));
                }
                echo "✅ Created: {$menu_data['name']}\n";
            }
        } else {
            echo "⏭️  Skipped: {$menu_data['name']} (exists)\n";
            $menu_id = $menu_exists->term_id;
        }

        // Assign to location
        $locations = get_theme_mod('nav_menu_locations');
        $locations[$location] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    echo "\n📊 Menus configured\n";
}
