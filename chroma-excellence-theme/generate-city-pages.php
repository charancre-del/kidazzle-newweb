<?php
/**
 * Template Name: City Page Generator
 * 
 * Instructions:
 * 1. Upload this file to your theme folder.
 * 2. Create a new Page in WordPress.
 * 3. Select "City Page Generator" as the Template.
 * 4. Publish and View the page to run the script.
 */

// Prevent direct access (though WP handles this for templates usually)
if (!defined('ABSPATH')) {
    exit;
}

// Ensure admin only
if (!current_user_can('manage_options')) {
    wp_die('You must be an administrator to access this page.');
}

get_header();

echo '<div style="max-width: 800px; margin: 100px auto; padding: 20px; background: #fff; border: 1px solid #ccc;">';
echo "<h1>City Page Generator</h1>";
echo "<p>Starting generation process...</p>";
echo "<pre>";

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
            'post_author' => get_current_user_id(),
            'post_content' => '', // Content generated below
        ];
        $post_id = wp_insert_post($post_data);

        if (is_wp_error($post_id)) {
            echo "Error creating post: " . $post_id->get_error_message() . "\n";
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
}

echo "All cities processed successfully!\n";
echo "</pre>";
echo "<p><strong>Finished!</strong> You can now delete this page and the template file.</p>";
echo '</div>';

get_footer();
