<?php
/**
 * Template Name: Generate City Pages
 * Description: Automates the creation of SEO-optimized City pages with rich content.
 */

// Ensure WordPress is loaded
if (!defined('ABSPATH')) {
    require_once('../../../wp-load.php');
}

// Check permissions
if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}

get_header();

// -------------------------------------------------------------------------
// 1. HARDCODED SUBDIVISIONS / NEIGHBORHOODS (The "Research" Data)
// -------------------------------------------------------------------------
$city_neighborhoods = array(
    // --- Cherokee County ---
    'Canton' => ['River Green', 'Bridgemill', 'Great Sky', 'Harmony on the Lakes', 'Woodmont', 'Towne Mill', 'Laurel Canyon', 'Governors Preserve', 'Hickory Flat', 'Sixes Road'],
    'Woodstock' => ['Towne Lake', 'Eagle Watch', 'Bradshaw Farm', 'Woodlands', 'Wyngate', 'Downtown Woodstock', 'Kingsgate', 'Brookshire', 'South on Main', 'Deer Run'],
    'Ballground' => ['Woodhaven Bend', 'Estates at Sharp Mountain', 'Mountain Brooke', 'Creekside Estates', 'River Rock', 'Lantern Walk', 'Hawks Ridge', 'Amber Lake'],
    'Waleska' => ['Lake Arrowhead', 'Reinhardt Area', 'Sawyers Farm', 'Arrowhead Forest', 'Cagle Shoals', 'Brookwood'],
    'Holly Springs' => ['Harmony on the Lakes', 'Holly Springs Station', 'Edmondson Lane', 'Toonigh'],

    // --- Cobb County ---
    'Marietta' => ['Indian Hills', 'Whitlock Heights', 'West Hampton', 'Windsor Oaks', 'Chimney Springs', 'Somerset', 'Oakton', 'East Cobb', 'Marietta Square'],
    'East Cobb' => ['Indian Hills', 'Atlanta Country Club', 'Chimney Springs', 'EastHampton', 'Walton Reserve', 'Paper Mill', 'Chestnut Creek', 'Highland Pointe'],
    'West Cobb' => ['Oregon Park', 'Lost Mountain', 'Mud Creek', 'Ward Creek'],
    'Kennesaw' => ['Legacy Park', 'Summerbrooke', 'Pinetree Country Club', 'Barrett Green', 'Ridenour', 'Arden Lake', 'Winchester Forest'],
    'Acworth' => ['Bentwater', 'Brookstone', 'Governors Towne Club', 'Seven Hills', 'Parkside at Mason Mill'],
    'Powder Springs' => ['Echo Mill', 'Oakleigh', 'Kyle Farm', 'Silverbrooke', 'Country Walk', 'Broadlands', 'Lost Mountain'],
    'Austell' => ['Sanders Park', 'Cureton Woods', 'Clayton Crossing', 'Sweetwater', 'Lithia Springs'],
    'Mableton' => ['Vinings Estates', 'Providence', 'Legacy at the River Line', 'Cobblestone Ridge'],
    'Smyrna' => ['Williams Park', 'Market Village', 'Vinings', 'King Springs'],

    // --- North Fulton ---
    'Alpharetta' => ['Windward', 'Avalon', 'Glen Abbey', 'Crabapple', 'The Manor', 'Brookshade', 'Park Brooke', 'Kimball Bridge'],
    'Roswell' => ['Horseshoe Bend', 'Martin\'s Landing', 'Willow Springs', 'Edenwilde', 'Historic Roswell', 'Crabapple', 'Wexford'],
    'Johns Creek' => ['St Ives', 'Seven Oaks', 'Medlock Bridge', 'Sugar Mill', 'Wellington', 'Falls of Autry Mill'],
    'Milton' => ['White Columns', 'The Manor', 'Crooked Creek', 'Crabapple', 'Blue Valley', 'Alpharetta Woods'],

    // --- Gwinnett County ---
    'Lawrenceville' => ['Sugarloaf', 'River Stone', 'Edgewater', 'Flowers Crossing', 'Chandler Pond', 'Tribble Mill', 'Brookwood'],
    'Duluth' => ['Sugarloaf Country Club', 'Sweet Bottom Plantation', 'River Plantation', 'St Marlo', 'Berkeley Lake'],
    'Norcross' => ['Peachtree Corners', 'Amberfield', 'Neely Farm', 'Spalding Corners', 'Historic Norcross'],
    'Snellville' => ['Brookwood Manor', 'Summit Chase', 'Bright Water', 'Montclair', 'Norris Lake'],
    'Lilburn' => ['Mountain Park', 'Killian Hill', 'Camp Creek', 'Parkview', 'Evermore'],
    'Suwanee' => ['Rivermoore Park', 'Edinburgh', 'MorningView', 'Old Suwanee'],
    'Buford' => ['Hamilton Mill', 'Lake Lanier', 'Buford City', 'Mall of Georgia Area'],
    'Dacula' => ['Hamilton Mill', 'Apalachee Farms', 'Reunion', 'Dacula City'],

    // --- South Metro ---
    'McDonough' => ['Lake Dow', 'Eagles Landing', 'Ola', 'Union Grove', 'City Square', 'Kelleytown'],
    'Stockbridge' => ['Eagles Landing', 'Monarch Village', 'Windy Hill', 'Spivey', 'Flippen'],
    'Jonesboro' => ['Lake Spivey', 'Mundy\'s Mill', 'Tara', 'Irondale'],
    'Fayetteville' => ['Whitewater', 'Trilith', 'The Canoe Club', 'Starr\'s Mill', 'Redwine'],
    'Peachtree City' => ['Kedron', 'Braelinn', 'Glenloch', 'Wilksmoor', 'Aberdeen'],
    'Newnan' => ['Summergrove', 'White Oak', 'Lake Redwine', 'Arbor Springs', 'Madras'],
    'Tyrone' => ['Southampton', 'River Crest', 'Windcastle', 'Berry Hill'],
    'Fairburn' => ['Durham Lakes', 'Renaissance', 'Cedar Grove', 'South Fulton'],
    'Palmetto' => ['Serenbe', 'Chattahoochee Hills', 'Rico'],
    'Union City' => ['South Fulton', 'Oakley Township', 'Shannon'],
    'Ellenwood' => ['Panola Mountain', 'Fairview', 'Cedar Grove'],
    'Rex' => ['Rex Ridge', 'Homestead', 'Stagecoach'],
    'Morrow' => ['Lake City', 'Reynolds Road', 'Southlake'],
    'Lovejoy' => ['Lovejoy Station', 'Panhandle', 'Hastings'],
    'Hampton' => ['Crystal Lake', 'Atlanta Motor Speedway Area', 'Lovejoy'],
    'Locust Grove' => ['Heron Bay', 'Luella', 'Locust Grove Station'],
    'Griffin' => ['Sun City Peachtree', 'Cowan Road', 'Downtown Griffin'],

    // --- North Hall / Mountains ---
    'Gainesville' => ['Chattahoochee Country Club', 'Mundy Mill', 'Cresswind', 'Lake Lanier', 'Sardis'],
    'Dawsonville' => ['Gold Creek', 'Chestatee', 'Dawson Forest', 'Outlet Mall Area'],
    'Dahlonega' => ['Achasta', 'Downtown Dahlonega', 'Camp Glisson', 'Yahoola'],
    'Jasper' => ['Big Canoe', 'Bent Tree', 'Grandview', 'Talking Rock'],
    'Murrayville' => ['Bark Camp', 'Yellow Creek', 'Wahoo'],
    'Clermont' => ['Wauka Mountain', 'Cleveland Highway', 'Mossy Creek'],
    'North Hall' => ['Mount Vernon', 'Clermont', 'Wauka'],
    'Cumming' => ['Vickery', 'Polo Fields', 'Windermere', 'Lake Lanier'],
);

// -------------------------------------------------------------------------
// 2. HELPER FUNCTIONS
// -------------------------------------------------------------------------

/**
 * Get Programs for a specific Location ID
 * Checks both 'program_locations' (legacy) and 'program_locations_served' (new)
 */
function chroma_get_programs_for_location_script($location_id)
{
    $programs = array();

    // Query Programs
    $args = array(
        'post_type' => 'program',
        'posts_per_page' => -1,
        'meta_query' => array(
            'relation' => 'OR',
            array(
                'key' => 'program_locations',
                'value' => '(^|;)i:' . intval($location_id) . ';',
                'compare' => 'REGEXP',
            ),
            array(
                'key' => 'program_locations_served',
                'value' => '"' . intval($location_id) . '"',
                'compare' => 'LIKE',
            )
        )
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) {
        foreach ($query->posts as $p) {
            $programs[$p->ID] = array(
                'title' => $p->post_title,
                'url' => get_permalink($p->ID),
                'excerpt' => get_the_excerpt($p->ID),
                'image' => get_the_post_thumbnail_url($p->ID, 'medium') // Fetch program image
            );
        }
    }
    return $programs;
}

/**
 * Generate "Why Families Love" Content (Hero Section)
 */
function chroma_generate_why_love_content($city, $neighborhoods, $hero_image_url)
{
    $hood_string = "";
    if (!empty($neighborhoods)) {
        $selected = array_slice($neighborhoods, 0, 4); // Pick top 4
        $last = array_pop($selected);
        $hood_string = "Families from " . implode(', ', $selected) . ", and " . $last . " choose Chroma for our commitment to excellence.";
    } else {
        $hood_string = "Families throughout $city choose Chroma for our commitment to excellence.";
    }

    $bg_style = "background-color:#fdfbf7;";
    $overlay = "";
    if ($hero_image_url) {
        $bg_style = "background-image: url('$hero_image_url'); background-size: cover; background-position: center; position: relative;";
        $overlay = "<div style='position:absolute; inset:0; background:rgba(255,255,255,0.85);'></div>"; // Light overlay to ensure text readability
    }

    return "
    <!-- Why Families Love Section (Hero) -->
    <section class='wp-block-group alignfull' style='$bg_style padding-top:6rem; padding-bottom:6rem;'>
        $overlay
        <div class='wp-block-group__inner-container' style='position:relative; max-width:1200px; margin:0 auto; padding:0 20px;'>
            <h2 class='has-text-align-center has-brand-ink-color' style='font-size:3rem; margin-bottom:1.5rem;'>Why Families in $city, GA Love Chroma</h2>
            <p class='has-text-align-center' style='font-size:1.3rem; max-width:800px; margin:0 auto 3rem; font-weight:500;'>
                We are more than just a daycare. We are a partner in your child's development. $hood_string
            </p>
            <div class='wp-block-columns alignwide'>
                <div class='wp-block-column' style='background:rgba(255,255,255,0.9); padding:2rem; border-radius:1rem;'>
                    <h3 class='has-chroma-red-color'>Safe & Secure</h3>
                    <p>Our campuses feature secure keypad entry, 24/7 video monitoring, and strict safety protocols to give $city parents peace of mind.</p>
                </div>
                <div class='wp-block-column' style='background:rgba(255,255,255,0.9); padding:2rem; border-radius:1rem;'>
                    <h3 class='has-chroma-blue-color'>Play-Based Learning</h3>
                    <p>We believe children learn best through play. Our curriculum balances structured activities with creative exploration.</p>
                </div>
                <div class='wp-block-column' style='background:rgba(255,255,255,0.9); padding:2rem; border-radius:1rem;'>
                    <h3 class='has-chroma-green-color'>Nurturing Teachers</h3>
                    <p>Our educators are passionate, experienced, and dedicated to helping every child in $city reach their full potential.</p>
                </div>
            </div>
        </div>
    </section>";
}

/**
 * Generate Programs Section
 */
function chroma_generate_programs_section($city, $programs)
{
    if (empty($programs))
        return "";

    $html = "
    <!-- Programs Section -->
    <section class='wp-block-group alignfull' style='padding-top:4rem; padding-bottom:4rem;'>
        <div class='wp-block-group__inner-container' style='max-width:1200px; margin:0 auto; padding:0 20px;'>
            <h2 class='has-text-align-center' style='margin-bottom:3rem;'>Programs Available in $city</h2>
            <div class='wp-block-columns alignwide' style='flex-wrap:wrap; gap:2rem;'>";

    foreach ($programs as $prog) {
        $img_html = "";
        if ($prog['image']) {
            $img_html = "<img src='{$prog['image']}' alt='{$prog['title']}' style='width:100%; height:200px; object-fit:cover; border-radius:1rem 1rem 0 0; margin-bottom:1rem;'>";
        }

        $html .= "
        <div class='wp-block-column' style='flex-basis:30%; min-width:300px; background:#fff; padding:0; border-radius:1rem; box-shadow:0 4px 20px rgba(0,0,0,0.05); overflow:hidden;'>
            $img_html
            <div style='padding:2rem;'>
                <h3 class='has-brand-ink-color' style='margin-top:0;'>{$prog['title']}</h3>
                <p>" . wp_trim_words($prog['excerpt'], 20) . "</p>
                <a href='{$prog['url']}' class='wp-block-button__link has-chroma-blue-background-color has-background'>Learn More</a>
            </div>
        </div>";
    }

    $html .= "
            </div>
        </div>
    </section>";
    return $html;
}

/**
 * Generate FAQ Section
 */
function chroma_generate_faq_section($city)
{
    return "
    <!-- FAQ Section -->
    <section class='wp-block-group alignfull has-background' style='background-color:#fff; padding-top:4rem; padding-bottom:4rem;'>
        <div class='wp-block-group__inner-container' style='max-width:800px; margin:0 auto; padding:0 20px;'>
            <h2 class='has-text-align-center'>Frequently Asked Questions</h2>
            
            <div style='margin-bottom:2rem;'>
                <h4 style='margin-bottom:0.5rem; color:#1f2937;'>Do you offer tours for $city families?</h4>
                <p>Yes! We encourage all families to book a tour to see our classrooms, meet our directors, and experience the Chroma difference firsthand.</p>
            </div>

            <div style='margin-bottom:2rem;'>
                <h4 style='margin-bottom:0.5rem; color:#1f2937;'>What ages do you serve in $city?</h4>
                <p>We typically serve children from 6 weeks (Infants) up to 12 years old (After School), though specific programs may vary by campus.</p>
            </div>

            <div style='margin-bottom:2rem;'>
                <h4 style='margin-bottom:0.5rem; color:#1f2937;'>Is food included?</h4>
                <p>Yes, we provide nutritious, child-friendly meals and snacks prepared fresh daily.</p>
            </div>
        </div>
    </section>";
}

// -------------------------------------------------------------------------
// 3. MAIN EXECUTION LOGIC
// -------------------------------------------------------------------------

echo '<div class="wrap">';
echo '<h1>Generating City Pages (Excellence Edition + Images)</h1>';

// Parse locations.md
$locations_file = get_template_directory() . '/locations.md';
if (!file_exists($locations_file)) {
    wp_die('Error: locations.md not found.');
}

$lines = file($locations_file);
$city_map = array(); // City Name => [School Name, School Address, School ID]

// Find all published locations first to map names to IDs
$all_locations = get_posts(array('post_type' => 'location', 'posts_per_page' => -1));
$location_lookup = array();
foreach ($all_locations as $loc) {
    $location_lookup[trim($loc->post_title)] = $loc->ID;
}

foreach ($lines as $line) {
    if (strpos($line, '|') === false || strpos($line, 'School Name') !== false)
        continue;

    $parts = array_map('trim', explode('|', $line));
    if (count($parts) < 4)
        continue; // Need at least empty parts

    $school_name = $parts[1];
    $address = $parts[2];
    $target_cities_str = $parts[3];

    if (empty($target_cities_str))
        continue;

    $target_cities = array_map('trim', explode(',', $target_cities_str));
    $school_id = isset($location_lookup[$school_name]) ? $location_lookup[$school_name] : 0;

    foreach ($target_cities as $city) {
        if (empty($city))
            continue;
        if (!isset($city_map[$city])) {
            $city_map[$city] = array();
        }
        $city_map[$city][] = array(
            'school_name' => $school_name,
            'address' => $address,
            'id' => $school_id
        );
    }
}

// Process Each City
foreach ($city_map as $city_name => $schools) {
    echo "<hr><h3>Processing: $city_name</h3>";

    // 1. Aggregate Programs
    $city_programs = array();
    foreach ($schools as $school) {
        if ($school['id']) {
            $progs = chroma_get_programs_for_location_script($school['id']);
            // Merge preserving keys (IDs) to deduplicate
            $city_programs = $city_programs + $progs;
        }
    }
    echo "Found " . count($city_programs) . " programs.<br>";

    // 2. Get Neighborhoods
    $neighborhoods = isset($city_neighborhoods[$city_name]) ? $city_neighborhoods[$city_name] : array();
    // Fallback: Use School Names as neighborhoods if none hardcoded
    if (empty($neighborhoods)) {
        foreach ($schools as $s) {
            $neighborhoods[] = str_replace(['Campus', 'Academy by Chroma Early Learning'], '', $s['school_name']);
        }
    }

    // 3. Get Hero Image (From First School)
    $hero_image_url = '';
    if (!empty($schools)) {
        $primary_school_id = $schools[0]['id'];
        if ($primary_school_id) {
            // Try Hero Gallery First
            $gallery_raw = get_post_meta($primary_school_id, 'location_hero_gallery', true);
            if ($gallery_raw) {
                $gallery_lines = explode("\n", $gallery_raw);
                if (!empty($gallery_lines)) {
                    $hero_image_url = trim($gallery_lines[0]);
                }
            }
            // Fallback to Featured Image
            if (empty($hero_image_url)) {
                $hero_image_url = get_the_post_thumbnail_url($primary_school_id, 'full');
            }
        }
    }

    // 3. Prepare Content
    $full_city_name = "$city_name, GA";
    $page_title = "Daycare & Preschool in $full_city_name | Chroma Early Learning";

    // Construct HTML Content
    $content = "";

    // Hero / Intro (Pass Image URL)
    $content .= chroma_generate_why_love_content($city_name, $neighborhoods, $hero_image_url);

    // Programs
    $content .= chroma_generate_programs_section($city_name, $city_programs);

    // Testimonials (Localized)
    $content .= "
    <!-- Testimonial -->
    <section class='wp-block-group alignfull' style='background-color:#eef2ff; padding:4rem 2rem; text-align:center;'>
        <blockquote style='font-size:1.5rem; font-style:italic; max-width:800px; margin:0 auto;'>
            \"We absolutely love Chroma! The teachers in $city_name are so caring and my child has learned so much.\"
            <cite style='display:block; margin-top:1rem; font-size:1rem; font-style:normal; font-weight:bold;'>— Happy Parent in $city_name</cite>
        </blockquote>
    </section>";

    // FAQ
    $content .= chroma_generate_faq_section($city_name);

    // Service Area / Driving
    $school_links = "";
    foreach ($schools as $s) {
        $school_links .= "<li><strong>{$s['school_name']}</strong> ({$s['address']})</li>";
    }

    $content .= "
    <!-- Service Area -->
    <section class='wp-block-group alignfull' style='padding:4rem 2rem;'>
        <div style='max-width:800px; margin:0 auto;'>
            <h3>Conveniently Located for $city_name Families</h3>
            <p>Chroma Early Learning has campuses conveniently located near you:</p>
            <ul>$school_links</ul>
            <p><strong>Serving neighborhoods including:</strong> " . implode(', ', $neighborhoods) . ".</p>
        </div>
    </section>";

    // CTA
    $content .= "
    <!-- CTA -->
    <section class='wp-block-group alignfull has-background' style='background-color:#ff6b6b; color:white; padding:4rem 2rem; text-align:center;'>
        <h2 style='color:white;'>Ready to Join the Chroma Family?</h2>
        <p style='font-size:1.2rem; margin-bottom:2rem;'>Schedule a tour today and see why families in $city_name trust us with their children's early education.</p>
        <a href='/schedule-tour/' class='wp-block-button__link has-white-background-color has-text-color has-brand-ink-color' style='padding:1rem 2rem; font-weight:bold; text-decoration:none; border-radius:50px;'>Book Your Tour</a>
    </section>";

    // 4. Create/Update Post
    $existing_page = get_page_by_title($city_name, OBJECT, 'city');

    $post_data = array(
        'post_title' => $city_name, // Slug will be city name
        'post_content' => $content,
        'post_status' => 'publish',
        'post_type' => 'city',
        'post_author' => get_current_user_id(),
    );

    if ($existing_page) {
        $post_data['ID'] = $existing_page->ID;
        $post_id = wp_update_post($post_data);
        echo "Updated page for $city_name (ID: $post_id)<br>";
    } else {
        $post_id = wp_insert_post($post_data);
        echo "Created page for $city_name (ID: $post_id)<br>";
    }

    if (is_wp_error($post_id)) {
        echo "Error creating page: " . $post_id->get_error_message() . "<br>";
        continue;
    }

    // 5. Update Meta Data
    update_post_meta($post_id, '_yoast_wpseo_title', $page_title);
    update_post_meta($post_id, '_yoast_wpseo_metadesc', "Looking for the best daycare in $city_name, GA? Chroma Early Learning offers premier child care, preschool, and early education. Book a tour today!");

    // Keywords
    $keywords = array("daycare $city_name", "preschool $city_name", "child care $city_name", "early learning $city_name");
    foreach ($schools as $s) {
        $keywords[] = $s['school_name'];
    }
    update_post_meta($post_id, 'meta_keywords', implode(', ', $keywords));

    // Save Related School IDs for Schema
    $school_ids = array_column($schools, 'id');
    update_post_meta($post_id, 'related_location_ids', $school_ids);
}

echo '<p>All operations completed.</p>';
echo '</div>';

get_footer();
