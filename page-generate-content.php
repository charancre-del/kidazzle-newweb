<?php
/**
 * Template Name: Content Generator
 * 
 * Creates all required pages, locations, programs, and menus for the theme.
 * 
 * USAGE:
 * 1. Create a new page in WordPress (any title)
 * 2. Set Page Template to "Content Generator"
 * 3. Visit that page - content will be generated
 * 4. Delete the page after generation
 * 
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

// Only run for logged-in admins
if (!current_user_can('manage_options')) {
    wp_die('You must be an administrator to run this generator.');
}

get_header();
?>

<div style="max-width: 800px; margin: 50px auto; padding: 20px; font-family: system-ui, sans-serif;">
    <h1 style="color: #0f172a;">🚀 KIDazzle Content Generator</h1>
    <p style="color: #64748b;">Generating all required content for the theme...</p>
    
    <div style="background: #1e293b; color: #4ade80; padding: 20px; border-radius: 8px; font-family: monospace; white-space: pre-wrap; margin-top: 20px;">
<?php
// =====================================
// GENERATE PAGES
// =====================================
echo "📄 GENERATING PAGES...\n";
echo "========================\n";

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

$pages_created = $pages_skipped = 0;

foreach ($pages as $page_data) {
    $existing = get_page_by_path($page_data['slug']);
    
    if ($existing) {
        echo "⏭️  Skipped: {$page_data['title']} (exists)\n";
        $pages_skipped++;
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
        $pages_created++;
    }
}

// Set front page
$home = get_page_by_path('home');
if ($home) {
    update_option('show_on_front', 'page');
    update_option('page_on_front', $home->ID);
    echo "🏠 Set 'Home' as front page\n";
}

echo "\n📊 Pages: {$pages_created} created, {$pages_skipped} skipped\n\n";

// =====================================
// GENERATE LOCATIONS
// =====================================
echo "📍 GENERATING LOCATIONS...\n";
echo "============================\n";

if (!post_type_exists('location')) {
    echo "⚠️  Location CPT not registered - skipping\n";
} else {
    $locations = array(
        array('title' => 'KIDazzle Cordova', 'slug' => 'cordova', 'region' => 'Memphis', 'is_hq' => true),
        array('title' => 'KIDazzle Germantown', 'slug' => 'germantown', 'region' => 'Memphis', 'is_hq' => false),
        array('title' => 'KIDazzle Collierville', 'slug' => 'collierville', 'region' => 'Memphis', 'is_hq' => false),
        array('title' => 'KIDazzle Buckhead', 'slug' => 'buckhead', 'region' => 'Atlanta', 'is_hq' => false),
        array('title' => 'KIDazzle Sandy Springs', 'slug' => 'sandy-springs', 'region' => 'Atlanta', 'is_hq' => false),
        array('title' => 'KIDazzle Alpharetta', 'slug' => 'alpharetta', 'region' => 'Atlanta', 'is_hq' => false),
        array('title' => 'KIDazzle Doral', 'slug' => 'doral', 'region' => 'Doral', 'is_hq' => false),
        array('title' => 'KIDazzle Miami Lakes', 'slug' => 'miami-lakes', 'region' => 'Doral', 'is_hq' => false),
    );

    $locations_created = $locations_skipped = 0;

    foreach ($locations as $loc) {
        $existing = get_page_by_path($loc['slug'], OBJECT, 'location');
        
        if ($existing) {
            echo "⏭️  Skipped: {$loc['title']} (exists)\n";
            $locations_skipped++;
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
            $locations_created++;
        }
    }
    echo "\n📊 Locations: {$locations_created} created, {$locations_skipped} skipped\n";
}

echo "\n";

// =====================================
// GENERATE PROGRAMS
// =====================================
echo "📚 GENERATING PROGRAMS...\n";
echo "===========================\n";

if (!post_type_exists('program')) {
    echo "⚠️  Program CPT not registered - skipping\n";
} else {
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

    $programs_created = $programs_skipped = 0;

    foreach ($programs as $prog) {
        $existing = get_page_by_path($prog['slug'], OBJECT, 'program');
        
        if ($existing) {
            echo "⏭️  Skipped: {$prog['title']} (exists)\n";
            $programs_skipped++;
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
            $programs_created++;
        }
    }
    echo "\n📊 Programs: {$programs_created} created, {$programs_skipped} skipped\n";
}

echo "\n";

// =====================================
// GENERATE MENUS
// =====================================
echo "🔗 GENERATING MENUS...\n";
echo "========================\n";

$menus = array(
    'primary' => array(
        'name' => 'Primary Menu',
        'items' => array('About' => '/about/', 'Programs' => '/programs/', 'Curriculum' => '/curriculum/', 'Locations' => '/locations/', 'Resources' => '/resources/'),
    ),
    'footer' => array(
        'name' => 'Footer Menu',
        'items' => array('About Us' => '/about/', 'Programs' => '/programs/', 'Careers' => '/careers/', 'Privacy Policy' => '/privacy-policy/'),
    ),
    'footer_contact' => array(
        'name' => 'Footer Contact',
        'items' => array('Schedule a Tour' => '/schedule-tour/', 'Contact Us' => '/contact/', 'Teacher Portal' => '/teacher-portal/'),
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
    $locations_mod = get_theme_mod('nav_menu_locations');
    $locations_mod[$location] = $menu_id;
    set_theme_mod('nav_menu_locations', $locations_mod);
}

echo "\n================================\n";
echo "✨ GENERATION COMPLETE!\n";
echo "================================\n";
?>
    </div>
    
    <div style="background: #fef3c7; border: 1px solid #f59e0b; padding: 15px; border-radius: 8px; margin-top: 20px;">
        <strong>⚠️ Important:</strong> Delete this page now that content generation is complete!
    </div>
    
    <p style="margin-top: 20px;">
        <a href="<?php echo admin_url('edit.php?post_type=page'); ?>" style="background: #3b82f6; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px;">View All Pages</a>
        <a href="<?php echo home_url(); ?>" style="background: #10b981; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; margin-left: 10px;">Visit Homepage</a>
    </p>
</div>

<?php
get_footer();
