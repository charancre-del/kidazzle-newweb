<?php
/**
 * Generate City Pages Script
 * 
 * Run this script to automatically create City pages and associate them with locations.
 * Usage: 
 * 1. Place this file in your WordPress root directory (or adjust the wp-load.php path).
 * 2. Visit it in your browser (e.g., https://your-site.com/generate-city-pages.php)
 *    OR run via command line: php generate-city-pages.php
 */

// Enable Error Reporting immediately
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo "<h1>City Page Generator</h1>";
echo "<p>Script started...</p>";

// Try to load WordPress
$possible_paths = [
    __DIR__ . '/wp-load.php',
    __DIR__ . '/../wp-load.php',
    __DIR__ . '/../../wp-load.php',
    __DIR__ . '/../../../wp-load.php',
    __DIR__ . '/../../../../wp-load.php',
    $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php'
];

$loaded = false;
foreach ($possible_paths as $path) {
    if (file_exists($path)) {
        echo "<p>Found WordPress at: $path</p>";
        require_once $path;
        $loaded = true;
        break;
    }
}

if (!$loaded) {
    die("<h3>Error: Could not find wp-load.php.</h3><p>Current directory: " . __DIR__ . "</p><p>Please place this script in your WordPress root directory (public_html).</p>");
}

if (!function_exists('is_cli')) {
    function is_cli()
    {
        return defined('WP_CLI') && WP_CLI;
    }
}

// Ensure we have admin privileges if running via browser
if (!is_cli() && !current_user_can('manage_options')) {
    die("Please log in as an administrator to run this script.");
}

echo "Starting City Page Generation...\n";
if (!is_cli())
    echo "<br>";

// 1. Define the Mapping (School -> Cities)
$school_city_map = [
    'Cherokee Academy by Chroma Early Learning' => ['Canton', 'Woodstock', 'Ballground', 'Milton'],
    'East Cobb Campus' => ['East Cobb', 'Marietta', 'Roswell'],
    'Ellenwood Campus' => ['Ellenwood', 'Rex', 'Decatur', 'Stockbridge', 'Morrow'],
    'Johns Creek' => ['Johns Creek', 'Alpharetta', 'Duluth', 'Peachtree Corners'],
    'Jonesboro Campus' => ['Jonesboro', 'Morrow', 'Rex', 'Lovejoy', 'Hampton'],
    'Lawrenceville Campus' => ['Lawrenceville', 'Snellville', 'Norcross'],
    'Lilburn Campus' => ['Lilburn', 'Tucker', 'Stone Mountain', 'Snellville'],
    'Mcdonough' => ['Mcdonough', 'Locust Grove', 'Hampton', 'Stockbridge', 'Griffin'],
    'Midway Campus' => ['Alpharetta', 'Milton', 'Cumming'],
    'Newnan Campus' => ['Newnan', 'Peachtree City', 'Fairburn', 'Palmetto'],
    'North Hall Campus, Murraysville' => ['Gainesville', 'Dawsonville'],
    'Pleasanthill Campus, Duluth' => ['Duluth', 'Norcross', 'Peachtree Corners', 'Johns Creek'],
    'Rivergreen Campus' => ['Canton', 'Woodstock', 'Ballground'],
    'Roswell Campus' => ['Roswell', 'Alpharetta', 'East Cobb', 'Milton'],
    'Satellite Bvd Campus' => ['Duluth', 'Norcross', 'Peachtree Corners'],
    'South Cobb Campus, Austell' => ['Austell', 'Mableton', 'Powder Springs', 'Lithia Springs'],
    'Tramore Campus' => ['Austell', 'Mableton', 'Powder Springs'],
    'Tyrone Campus' => ['Tyrone', 'Fayetteville', 'Peachtree City', 'Fairburn'],
    'West Cobb Campus' => ['West Cobb', 'Marietta', 'Kennesaw', 'Powder Springs'],
];

// 2. Invert to get City -> Schools
$city_schools = [];
foreach ($school_city_map as $school_name => $cities) {
    foreach ($cities as $city) {
        if (!isset($city_schools[$city])) {
            $city_schools[$city] = [];
        }
        $city_schools[$city][] = $school_name;
    }
}

// 3. Process Each City
foreach ($city_schools as $city_name => $school_names) {
    echo "Processing City: $city_name... ";

    // Check if page exists
    $existing_page = get_page_by_title($city_name, OBJECT, 'city');

    if ($existing_page) {
        echo "Exists (ID: " . $existing_page->ID . "). Updating... ";
        $post_id = $existing_page->ID;
    } else {
        // Create new post
        $post_data = [
            'post_title' => $city_name,
            'post_type' => 'city',
            'post_status' => 'publish',
            'post_author' => 1, // Assign to admin
            'post_content' => '', // Content generated below
        ];
        $post_id = wp_insert_post($post_data);

        if (is_wp_error($post_id)) {
            echo "Error creating post: " . $post_id->get_error_message() . "\n";
            if (!is_cli())
                echo "<br>";
            continue;
        }
        echo "Created (ID: $post_id). ";
    }

    // Find Location IDs
    $location_ids = [];
    foreach ($school_names as $school_name) {
        $location = get_page_by_title($school_name, OBJECT, 'location');
        if ($location) {
            $location_ids[] = $location->ID;
        } else {
            // Try fuzzy search or just warn
            echo "[Warning: Location '$school_name' not found] ";
        }
    }

    // Update Meta: city_nearby_locations
    update_post_meta($post_id, 'city_nearby_locations', $location_ids);

    // Update Meta: city_intro_text
    $intro_text = "Looking for the best <strong>daycare in $city_name</strong>? Chroma Early Learning Academy offers premium childcare, preschool, and early education programs near you. Our campuses serving the $city_name area provide a safe, nurturing environment where children thrive.";
    update_post_meta($post_id, 'city_intro_text', $intro_text);

    // Update Post Content (SEO Content)
    $content = "<!-- wp:paragraph -->
<p>Families in <strong>$city_name</strong> trust Chroma Early Learning Academy for exceptional early childhood education. We understand that choosing a daycare is one of the most important decisions you'll make as a parent.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Why Choose Chroma for Childcare in $city_name?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Our locations serving $city_name offer:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul>
<li><strong>Safe, Secure Facilities:</strong> Advanced security systems and strict safety protocols.</li>
<li><strong>Nurturing Teachers:</strong> Passionate educators dedicated to your child's growth.</li>
<li><strong>PrismPath Curriculum:</strong> A proprietary curriculum blending play-based learning with academic readiness.</li>
<li><strong>Nutritious Meals:</strong> Healthy, chef-prepared meals included.</li>
</ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Explore our campuses below to find the perfect fit for your family.</p>
<!-- /wp:paragraph -->";

    $update_args = [
        'ID' => $post_id,
        'post_content' => $content,
    ];
    wp_update_post($update_args);

    echo "Done.\n";
    if (!is_cli())
        echo "<br>";
}

echo "All cities processed successfully!\n";
