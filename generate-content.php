<?php
/**
 * KIDazzle Theme Content Generator
 * 
 * Run this script via WP-CLI or include it temporarily in functions.php
 * to generate all required pages and locations for the theme.
 * 
 * Usage: 
 *   WP-CLI: wp eval-file generate-content.php
 *   Or add: require_once get_template_directory() . '/generate-content.php';
 *   
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    // If running via WP-CLI
    if (defined('WP_CLI') && WP_CLI) {
        // WP is loaded
    } else {
        die('This script must be run in WordPress context.');
    }
}

/**
 * Generate all required pages
 */
function kidazzle_generate_pages() {
    $pages = array(
        array(
            'title' => 'Home',
            'slug' => 'home',
            'template' => '',
            'content' => '',
        ),
        array(
            'title' => 'About Us',
            'slug' => 'about',
            'template' => 'page-about.php',
            'content' => '',
        ),
        array(
            'title' => 'Programs',
            'slug' => 'programs',
            'template' => 'page-programs.php',
            'content' => '',
        ),
        array(
            'title' => 'Curriculum',
            'slug' => 'curriculum',
            'template' => 'page-curriculum.php',
            'content' => '',
        ),
        array(
            'title' => 'Locations',
            'slug' => 'locations',
            'template' => 'page-locations.php',
            'content' => '',
        ),
        array(
            'title' => 'Parent Resources',
            'slug' => 'resources',
            'template' => 'page-resources.php',
            'content' => '',
        ),
        array(
            'title' => 'Teacher Portal',
            'slug' => 'teacher-portal',
            'template' => 'page-teacher-portal.php',
            'content' => '',
        ),
        array(
            'title' => 'Parent Stories',
            'slug' => 'stories',
            'template' => 'page-stories.php',
            'content' => '',
        ),
        array(
            'title' => 'Schedule a Tour',
            'slug' => 'schedule-tour',
            'template' => 'page-schedule-tour.php',
            'content' => '',
        ),
        array(
            'title' => 'Contact Us',
            'slug' => 'contact',
            'template' => 'page-contact.php',
            'content' => '',
        ),
        array(
            'title' => 'Careers',
            'slug' => 'careers',
            'template' => 'page-careers.php',
            'content' => '',
        ),
        array(
            'title' => 'Privacy Policy',
            'slug' => 'privacy-policy',
            'template' => '',
            'content' => 'Privacy policy content here.',
        ),
    );

    $created = 0;
    $skipped = 0;

    foreach ($pages as $page_data) {
        // Check if page already exists
        $existing = get_page_by_path($page_data['slug']);
        
        if ($existing) {
            echo "⏭️  Skipped: {$page_data['title']} (already exists)\n";
            $skipped++;
            continue;
        }

        $page_args = array(
            'post_title'   => $page_data['title'],
            'post_name'    => $page_data['slug'],
            'post_content' => $page_data['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_author'  => 1,
        );

        $page_id = wp_insert_post($page_args);

        if ($page_id && !is_wp_error($page_id)) {
            // Set page template if specified
            if (!empty($page_data['template'])) {
                update_post_meta($page_id, '_wp_page_template', $page_data['template']);
            }
            echo "✅ Created: {$page_data['title']}\n";
            $created++;
        } else {
            echo "❌ Failed: {$page_data['title']}\n";
        }
    }

    echo "\n📊 Pages: {$created} created, {$skipped} skipped\n";

    // Set front page
    $home = get_page_by_path('home');
    if ($home) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $home->ID);
        echo "🏠 Set 'Home' as static front page\n";
    }
}

/**
 * Generate all locations (CPT: location)
 */
function kidazzle_generate_locations() {
    // Check if CPT exists
    if (!post_type_exists('location')) {
        echo "⚠️  Location CPT not registered. Register it first.\n";
        return;
    }

    $locations = array(
        // MEMPHIS REGION
        array(
            'title' => 'KIDazzle Cordova',
            'slug' => 'cordova',
            'region' => 'Memphis',
            'is_hq' => true,
            'address' => '1234 Cordova Rd, Cordova, TN 38018',
            'phone' => '(901) 555-0101',
            'email' => 'cordova@kidazzle.com',
            'programs' => array('Infants', 'Toddlers', 'Preschool', 'Pre-K', 'After School'),
        ),
        array(
            'title' => 'KIDazzle Germantown',
            'slug' => 'germantown',
            'region' => 'Memphis',
            'is_hq' => false,
            'address' => '5678 Germantown Pkwy, Germantown, TN 38138',
            'phone' => '(901) 555-0102',
            'email' => 'germantown@kidazzle.com',
            'programs' => array('Infants', 'Toddlers', 'Preschool', 'Pre-K'),
        ),
        array(
            'title' => 'KIDazzle Collierville',
            'slug' => 'collierville',
            'region' => 'Memphis',
            'is_hq' => false,
            'address' => '9101 W Poplar Ave, Collierville, TN 38017',
            'phone' => '(901) 555-0103',
            'email' => 'collierville@kidazzle.com',
            'programs' => array('Toddlers', 'Preschool', 'Pre-K'),
        ),

        // ATLANTA REGION
        array(
            'title' => 'KIDazzle Buckhead',
            'slug' => 'buckhead',
            'region' => 'Atlanta',
            'is_hq' => false,
            'address' => '2345 Peachtree Rd NE, Atlanta, GA 30305',
            'phone' => '(404) 555-0201',
            'email' => 'buckhead@kidazzle.com',
            'programs' => array('Infants', 'Toddlers', 'Preschool', 'GA Pre-K'),
        ),
        array(
            'title' => 'KIDazzle Sandy Springs',
            'slug' => 'sandy-springs',
            'region' => 'Atlanta',
            'is_hq' => false,
            'address' => '6789 Roswell Rd, Sandy Springs, GA 30328',
            'phone' => '(404) 555-0202',
            'email' => 'sandysprings@kidazzle.com',
            'programs' => array('Infants', 'Toddlers', 'Preschool', 'GA Pre-K', 'After School'),
        ),
        array(
            'title' => 'KIDazzle Alpharetta',
            'slug' => 'alpharetta',
            'region' => 'Atlanta',
            'is_hq' => false,
            'address' => '1011 Windward Pkwy, Alpharetta, GA 30005',
            'phone' => '(770) 555-0203',
            'email' => 'alpharetta@kidazzle.com',
            'programs' => array('Toddlers', 'Preschool', 'GA Pre-K'),
        ),

        // DORAL (MIAMI) REGION
        array(
            'title' => 'KIDazzle Doral',
            'slug' => 'doral',
            'region' => 'Doral',
            'is_hq' => false,
            'address' => '3456 NW 87th Ave, Doral, FL 33178',
            'phone' => '(305) 555-0301',
            'email' => 'doral@kidazzle.com',
            'programs' => array('Infants', 'Toddlers', 'Preschool', 'VPK'),
        ),
        array(
            'title' => 'KIDazzle Miami Lakes',
            'slug' => 'miami-lakes',
            'region' => 'Doral',
            'is_hq' => false,
            'address' => '7890 Miami Lakes Dr, Miami Lakes, FL 33016',
            'phone' => '(305) 555-0302',
            'email' => 'miamilakes@kidazzle.com',
            'programs' => array('Infants', 'Toddlers', 'Preschool', 'VPK', 'Summer Camp'),
        ),
    );

    $created = 0;
    $skipped = 0;

    foreach ($locations as $location_data) {
        // Check if location already exists
        $existing = get_page_by_path($location_data['slug'], OBJECT, 'location');
        
        if ($existing) {
            echo "⏭️  Skipped: {$location_data['title']} (already exists)\n";
            $skipped++;
            continue;
        }

        $location_args = array(
            'post_title'   => $location_data['title'],
            'post_name'    => $location_data['slug'],
            'post_content' => 'Premier early learning center serving families in ' . $location_data['region'] . '.',
            'post_status'  => 'publish',
            'post_type'    => 'location',
            'post_author'  => 1,
        );

        $location_id = wp_insert_post($location_args);

        if ($location_id && !is_wp_error($location_id)) {
            // Set meta fields
            update_post_meta($location_id, 'region', $location_data['region']);
            update_post_meta($location_id, 'is_hq', $location_data['is_hq'] ? '1' : '0');
            update_post_meta($location_id, 'address', $location_data['address']);
            update_post_meta($location_id, 'phone', $location_data['phone']);
            update_post_meta($location_id, 'email', $location_data['email']);
            update_post_meta($location_id, 'programs', $location_data['programs']);
            
            echo "✅ Created: {$location_data['title']} ({$location_data['region']})\n";
            $created++;
        } else {
            echo "❌ Failed: {$location_data['title']}\n";
        }
    }

    echo "\n📊 Locations: {$created} created, {$skipped} skipped\n";
}

/**
 * Generate programs (CPT: program)
 */
function kidazzle_generate_programs() {
    // Check if CPT exists
    if (!post_type_exists('program')) {
        echo "⚠️  Program CPT not registered. Skipping programs.\n";
        return;
    }

    $programs = array(
        array(
            'title' => 'Infants',
            'slug' => 'infants',
            'age_range' => '6 weeks - 12 months',
            'description' => 'Nurturing care for your youngest learners with focus on trust, sensory development, and bonding.',
        ),
        array(
            'title' => 'Toddlers',
            'slug' => 'toddlers',
            'age_range' => '12 - 24 months',
            'description' => 'Active exploration and vocabulary building through play-based learning.',
        ),
        array(
            'title' => 'Preschool',
            'slug' => 'preschool',
            'age_range' => '2 - 3 years',
            'description' => 'Building independence and early academic foundations.',
        ),
        array(
            'title' => 'Pre-K',
            'slug' => 'pre-k',
            'age_range' => '4 - 5 years',
            'description' => 'Kindergarten readiness with focus on literacy and social skills.',
        ),
        array(
            'title' => 'GA Pre-K',
            'slug' => 'ga-pre-k',
            'age_range' => '4 years',
            'description' => 'Georgia Lottery-funded Pre-K program with state-certified curriculum.',
        ),
        array(
            'title' => 'VPK',
            'slug' => 'vpk',
            'age_range' => '4 years',
            'description' => 'Florida Voluntary Pre-Kindergarten program preparing children for school success.',
        ),
        array(
            'title' => 'After School',
            'slug' => 'after-school',
            'age_range' => '5 - 12 years',
            'description' => 'Homework help, enrichment activities, and safe supervision for school-age children.',
        ),
        array(
            'title' => 'Summer Camp',
            'slug' => 'summer-camp',
            'age_range' => '5 - 12 years',
            'description' => 'Fun-filled summer with field trips, themed weeks, and learning adventures.',
        ),
    );

    $created = 0;
    $skipped = 0;

    foreach ($programs as $program_data) {
        $existing = get_page_by_path($program_data['slug'], OBJECT, 'program');
        
        if ($existing) {
            echo "⏭️  Skipped: {$program_data['title']} (already exists)\n";
            $skipped++;
            continue;
        }

        $program_args = array(
            'post_title'   => $program_data['title'],
            'post_name'    => $program_data['slug'],
            'post_content' => $program_data['description'],
            'post_status'  => 'publish',
            'post_type'    => 'program',
            'post_author'  => 1,
        );

        $program_id = wp_insert_post($program_args);

        if ($program_id && !is_wp_error($program_id)) {
            update_post_meta($program_id, 'age_range', $program_data['age_range']);
            echo "✅ Created: {$program_data['title']}\n";
            $created++;
        } else {
            echo "❌ Failed: {$program_data['title']}\n";
        }
    }

    echo "\n📊 Programs: {$created} created, {$skipped} skipped\n";
}

/**
 * Create navigation menus
 */
function kidazzle_generate_menus() {
    $menus = array(
        'primary' => array(
            'name' => 'Primary Menu',
            'items' => array(
                array('title' => 'About', 'url' => '/about/'),
                array('title' => 'Programs', 'url' => '/programs/'),
                array('title' => 'Curriculum', 'url' => '/curriculum/'),
                array('title' => 'Locations', 'url' => '/locations/'),
                array('title' => 'Resources', 'url' => '/resources/'),
            ),
        ),
        'footer' => array(
            'name' => 'Footer Menu',
            'items' => array(
                array('title' => 'About Us', 'url' => '/about/'),
                array('title' => 'Programs', 'url' => '/programs/'),
                array('title' => 'Careers', 'url' => '/careers/'),
                array('title' => 'Privacy Policy', 'url' => '/privacy-policy/'),
            ),
        ),
        'footer_contact' => array(
            'name' => 'Footer Contact',
            'items' => array(
                array('title' => 'Schedule a Tour', 'url' => '/schedule-tour/'),
                array('title' => 'Contact Us', 'url' => '/contact/'),
                array('title' => 'Teacher Portal', 'url' => '/teacher-portal/'),
            ),
        ),
    );

    foreach ($menus as $location => $menu_data) {
        // Check if menu exists
        $menu_exists = wp_get_nav_menu_object($menu_data['name']);
        
        if (!$menu_exists) {
            $menu_id = wp_create_nav_menu($menu_data['name']);
            
            if (!is_wp_error($menu_id)) {
                // Add menu items
                foreach ($menu_data['items'] as $item) {
                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title'  => $item['title'],
                        'menu-item-url'    => home_url($item['url']),
                        'menu-item-status' => 'publish',
                        'menu-item-type'   => 'custom',
                    ));
                }
                echo "✅ Created menu: {$menu_data['name']}\n";
            }
        } else {
            echo "⏭️  Skipped menu: {$menu_data['name']} (already exists)\n";
            $menu_id = $menu_exists->term_id;
        }

        // Assign to location
        $locations = get_theme_mod('nav_menu_locations');
        $locations[$location] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }

    echo "\n📊 Menus configured\n";
}

// =====================================
// RUN THE GENERATORS
// =====================================
echo "\n🚀 KIDazzle Content Generator\n";
echo "================================\n\n";

echo "📄 GENERATING PAGES...\n";
echo "------------------------\n";
kidazzle_generate_pages();

echo "\n📍 GENERATING LOCATIONS...\n";
echo "----------------------------\n";
kidazzle_generate_locations();

echo "\n📚 GENERATING PROGRAMS...\n";
echo "---------------------------\n";
kidazzle_generate_programs();

echo "\n🔗 GENERATING MENUS...\n";
echo "------------------------\n";
kidazzle_generate_menus();

echo "\n================================\n";
echo "✨ Content generation complete!\n";
echo "================================\n";
