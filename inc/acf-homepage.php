<?php
/**
 * Homepage data helpers (hardcoded)
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
        exit;
}

/**
 * Get Home Page ID (for thumbnail rendering)
 */
function kidazzle_get_home_page_id()
{
        return get_option('page_on_front') ?: 0;
}

function kidazzle_home_default_hero()
{
        return array(
                'heading' => 'Where Learning <br /><span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-yellow-600 to-cyan-700">is Fun!</span>',
                'subheading' => 'From Memphis to Miami to Atlanta, we are an independent, premier learning academy nurturing diverse bright minds for over three decades.',
                'cta_label' => 'Find Your Center',
                'cta_url' => '/locations/',
                'secondary_label' => 'Our Legacy',
                'secondary_url' => '/about/',
        );
}


function kidazzle_home_default_stats()
{
        return array(
                array('value' => '19+', 'label' => 'Metro campuses'),
                array('value' => '2,000+', 'label' => 'Children enrolled'),
                array('value' => '4.8', 'label' => 'Avg parent rating'),
                array('value' => '6w–12y', 'label' => 'Age range'),
        );
}

function kidazzle_home_default_curriculum()
{
        return array(
                'feature' => array(
                        'eyebrow' => 'The Kidazzle Standard',
                        'heading' => 'Grounded in Expertise. Wrapped in Love.',
                        'subheading' => '',
                        'cta_label' => 'Meet the Team',
                        'cta_url' => '/about',
                ),
                'cards' => array(
                        array(
                                'badge' => 'Proprietary Model',
                                'heading' => 'The KIDazzle Creative Curriculum™ Curriculum',
                                'text' => 'Just as a prism refracts light into a full spectrum of color, KIDazzle Creative Curriculum™ refracts play into a full spectrum of development.',
                                'icon_bg' => 'fa-solid fa-shapes',
                                'icon_badge' => 'fa-brands fa-connectdevelop',
                                'icon_check' => 'fa-solid fa-check-circle',
                        ),
                        array(
                                'badge' => '',
                                'heading' => 'Expert Care, Extended Family.',
                                'text' => 'Our educators are state-certified professionals who understand that the most important credential is kindness.',
                                'button' => 'Meet the Team',
                                'url' => '/about',
                                'icon_bg' => 'fa-solid fa-heart',
                                'icon_badge' => 'fa-solid fa-user-check',
                        ),
                        array(
                                'badge' => '',
                                'heading' => 'Wholesome Fuel',
                                'text' => 'Organic, balanced meals served family-style to fuel growing minds.',
                                'icon' => 'fa-solid fa-apple-whole',
                        ),
                        array(
                                'badge' => '',
                                'heading' => 'Uncompromised Safety',
                                'text' => 'Secure, monitored facilities with open-door transparency for parents.',
                                'icon' => 'fa-solid fa-shield-halved',
                        ),
                ),
                'readiness' => array(
                        'heading' => 'Kindergarten Readiness',
                        'description' => 'Our graduates enter school confident, socially capable, and academically prepared.',
                ),
        );
}

function kidazzle_home_get_theme_mod_json($key, $default = array())
{
        $raw = get_theme_mod($key, '');

        if (empty($raw)) {
                return $default;
        }

        $decoded = json_decode($raw, true);

        if (JSON_ERROR_NONE !== json_last_error() || !is_array($decoded)) {
                return $default;
        }

        return $decoded;
}

/**
 * Home Hero Data
 */
function kidazzle_home_hero()
{
        $defaults = kidazzle_home_default_hero();

        return array(
                'heading' => wp_kses_post(get_theme_mod('kidazzle_home_hero_heading', $defaults['heading'])),
                'subheading' => sanitize_text_field(get_theme_mod('kidazzle_home_hero_subheading', $defaults['subheading'])),
                'cta_label' => sanitize_text_field(get_theme_mod('kidazzle_home_hero_cta_label', $defaults['cta_label'])),
                'cta_url' => esc_url_raw(get_theme_mod('kidazzle_home_hero_cta_url', $defaults['cta_url'])),
                'secondary_label' => sanitize_text_field(get_theme_mod('kidazzle_home_hero_secondary_label', $defaults['secondary_label'])),
                'secondary_url' => esc_url_raw(get_theme_mod('kidazzle_home_hero_secondary_url', $defaults['secondary_url'])),
        );
}

/**
 * Home Stats
 */
function kidazzle_home_stats()
{
	$stats = kidazzle_home_get_theme_mod_json('kidazzle_home_stats_json', kidazzle_home_default_stats());
	$cleaned = array();

	// Define color cycle for stats (red, yellow, blue, green)
	$colors = array('kidazzle-red', 'kidazzle-yellow', 'kidazzle-blue', 'kidazzle-green');
	$index = 0;

	foreach ($stats as $stat) {
		$cleaned[] = array(
			'value' => sanitize_text_field($stat['value'] ?? ''),
			'label' => sanitize_text_field($stat['label'] ?? ''),
			'color' => $colors[$index % count($colors)],
		);
		$index++;
	}

	return $cleaned;
}

/**
 * Featured Programs Preview
 */
function kidazzle_home_programs_preview()
{
	// Query all published programs
	$programs_query = new WP_Query(array(
		'post_type' => 'program',
		'posts_per_page' => 3,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'post_status' => 'publish',
	));

	$featured = array();

	if ($programs_query->have_posts()) {
		while ($programs_query->have_posts()) {
			$programs_query->the_post();
			$post_id = get_the_ID();

			$featured[] = array(
				'title' => get_the_title(),
				'excerpt' => get_the_excerpt(),
				'icon' => get_post_meta($post_id, 'program_icon', true) ?: 'fas fa-child',
				'age_range' => get_post_meta($post_id, 'program_age_range', true),
				'url' => get_permalink(),
			);
		}
		wp_reset_postdata();
	}

	return array(
		'heading' => get_theme_mod('kidazzle_home_programs_heading', 'Our Programs'),
		'subheading' => get_theme_mod('kidazzle_home_programs_subheading', 'Nurturing diverse bright minds through expert care and proprietary curriculum.'),
		'cta_label' => get_theme_mod('kidazzle_home_programs_cta_label', 'View All Programs'),
		'cta_link' => get_theme_mod('kidazzle_home_programs_cta_link', get_post_type_archive_link('program')),
		'featured' => $featured,
	);
}

/**
 * KIDazzle Creative Curriculum expertise panels
 */
function kidazzle_home_curriculum_panels()
{
        $defaults = kidazzle_home_default_curriculum();

        $feature = $defaults['feature'];
        $feature = array(
                'eyebrow' => sanitize_text_field(get_theme_mod('kidazzle_home_curriculum_eyebrow', $feature['eyebrow'])),
                'heading' => sanitize_text_field(get_theme_mod('kidazzle_home_curriculum_heading', $feature['heading'])),
                'subheading' => sanitize_text_field(get_theme_mod('kidazzle_home_curriculum_subheading', $feature['subheading'])),
                'cta_label' => sanitize_text_field(get_theme_mod('kidazzle_home_curriculum_cta_label', $feature['cta_label'])),
                'cta_url' => esc_url_raw(get_theme_mod('kidazzle_home_curriculum_cta_url', $feature['cta_url'])),
        );

        $cards = kidazzle_home_get_theme_mod_json('kidazzle_home_curriculum_cards_json', $defaults['cards']);
        $cards = array_map(
                function ($card, $index) use ($defaults) {
                        // Get default card for this index
                        $default_card = $defaults['cards'][$index] ?? array();

                        // Explicitly set each field, preferring saved data but falling back to defaults
                        // Use ?: operator for icons to handle empty strings, not just null
                        return array(
                                'badge' => sanitize_text_field($card['badge'] ?? $default_card['badge'] ?? ''),
                                'heading' => sanitize_text_field($card['heading'] ?? $default_card['heading'] ?? ''),
                                'text' => sanitize_textarea_field($card['text'] ?? $default_card['text'] ?? ''),
                                'button' => sanitize_text_field($card['button'] ?? $default_card['button'] ?? ''),
                                'url' => esc_url_raw($card['url'] ?? $default_card['url'] ?? ''),
                                // Use ?: to check for empty strings, not just null - falls back to defaults
                                'icon' => sanitize_text_field(($card['icon'] ?? '') ?: ($default_card['icon'] ?? '')),
                                'icon_bg' => sanitize_text_field(($card['icon_bg'] ?? '') ?: ($default_card['icon_bg'] ?? '')),
                                'icon_badge' => sanitize_text_field(($card['icon_badge'] ?? '') ?: ($default_card['icon_badge'] ?? '')),
                                'icon_check' => sanitize_text_field(($card['icon_check'] ?? '') ?: ($default_card['icon_check'] ?? '')),
                        );
                },
                $cards,
                array_keys($cards)
        );

        $readiness = $defaults['readiness'];
        $readiness = array(
                'heading' => sanitize_text_field(get_theme_mod('kidazzle_home_curriculum_readiness_heading', $readiness['heading'])),
                'description' => sanitize_textarea_field(get_theme_mod('kidazzle_home_curriculum_readiness_desc', $readiness['description'])),
        );

        return array(
                'feature' => $feature,
                'cards' => $cards,
                'readiness' => $readiness,
        );
}

function kidazzle_home_default_program_wizard_options()
{
        $program_url = kidazzle_get_program_archive_url();

        return array(
                array(
                        'key' => 'infant',
                        'emoji' => '👶',
                        'label' => "Infant\n(6 weeks–12m)",
                        'description' => 'Low ratios, safe sleep practices, responsive caregiving, and sensory play in a peaceful, predictable environment.',
                        'link' => $program_url . '#infant',
                ),
                array(
                        'key' => 'toddler',
                        'emoji' => '🚀',
                        'label' => "Toddler\n(1 year)",
                        'description' => 'Curated environments for walkers and explorers with language bursts and social skills.',
                        'link' => $program_url . '#toddler',
                ),
                array(
                        'key' => 'preschool',
                        'emoji' => '🎨',
                        'label' => "Preschool\n(2 years)",
                        'description' => 'Early concepts in math, literacy, and science introduced through hands-on centers and guided play.',
                        'link' => $program_url . '#preschool',
                ),
                array(
                        'key' => 'prep',
                        'emoji' => '✏️',
                        'label' => "Pre-K Prep\n(3 years)",
                        'description' => 'Structured centers and small-group instruction that build independence before GA Pre-K.',
                        'link' => $program_url . '#pre-k-prep',
                ),
                array(
                        'key' => 'prek',
                        'emoji' => '🎓',
                        'label' => "GA Pre-K\n(4 years)",
                        'description' => 'Balanced academic readiness, social-emotional learning, and joyful experiences aligned with GA standards.',
                        'link' => $program_url . '#ga-pre-k',
                ),
                array(
                        'key' => 'afterschool',
                        'emoji' => '🚌',
                        'label' => "After School\n(5–12 years)",
                        'description' => 'Transportation from local schools, homework support, clubs, and outdoor play.',
                        'link' => $program_url . '#after-school',
                ),
        );
}

function kidazzle_home_default_curriculum_profiles()
{
        return array(
                'labels' => array('Physical', 'Emotional', 'Social', 'Academic', 'Creative'),
                'profiles' => array(
                        array(
                                'key' => 'infant',
                                'label' => 'Infant',
                                'title' => 'Foundation Phase',
                                'description' => 'Infant classrooms emphasize emotional security, attachment, physical health, and sensory experiences. Academics are embedded through language-rich interactions.',
                                'color' => '#D67D6B',
                                'data' => array(90, 90, 40, 15, 40),
                        ),
                        array(
                                'key' => 'toddler',
                                'label' => 'Toddler',
                                'title' => 'Discovery Phase',
                                'description' => 'Toddlers explore movement, language, early problem-solving, and social skills through guided play and routines.',
                                'color' => '#4A6C7C',
                                'data' => array(85, 75, 65, 30, 70),
                        ),
                        array(
                                'key' => 'preschool',
                                'label' => 'Preschool',
                                'title' => 'Exploration Phase',
                                'description' => 'Preschoolers work on early literacy, math concepts, dramatic play, and collaborative projects, supported by strong routines.',
                                'color' => '#E6BE75',
                                'data' => array(75, 65, 70, 55, 80),
                        ),
                        array(
                                'key' => 'prep',
                                'label' => 'Pre-K Prep',
                                'title' => 'Pre-K Prep Phase',
                                'description' => 'Children build stamina for small-group work, early writing, and multi-step directions while strengthening self-regulation.',
                                'color' => '#2F4858',
                                'data' => array(65, 60, 75, 75, 70),
                        ),
                        array(
                                'key' => 'prek',
                                'label' => 'GA Pre-K',
                                'title' => 'GA Pre-K Readiness',
                                'description' => 'Balanced academic readiness, social-emotional learning, and joyful experiences aligned with GA standards.',
                                'color' => '#4A6C7C',
                                'data' => array(60, 60, 80, 90, 70),
                        ),
                        array(
                                'key' => 'afterschool',
                                'label' => 'After School',
                                'title' => 'Enrichment Phase',
                                'description' => 'School-age programming offers homework help, social clubs, athletic play, and creative enrichment for older children.',
                                'color' => '#E6BE75',
                                'data' => array(50, 70, 85, 75, 80),
                        ),
                ),
        );
}

/**
 * Home FAQ Items
 */
function kidazzle_home_default_faq_items()
{
        return array(
                array(
                        'question' => 'Do you offer GA Lottery Pre-K?',
                        'answer' => 'Yes. Many Kidazzle locations offer free GA Lottery Pre-K for 4-year-olds.',
                ),
                array(
                        'question' => 'What ages do you serve?',
                        'answer' => 'Most campuses serve children from 6 weeks through 12 years old.',
                ),
                array(
                        'question' => 'Are meals and snacks included?',
                        'answer' => 'Yes. Through the Child and Adult Care Food Program (CACFP).',
                ),
                array(
                        'question' => 'How do you communicate with parents?',
                        'answer' => 'We use a modern parent app and in-person conversations to keep you informed.',
                ),
                array(
                        'question' => 'Can I tour before enrolling?',
                        'answer' => 'Absolutely. We encourage tours so you can meet the Director and see classrooms in action.',
                ),
        );
}

function kidazzle_home_default_faq()
{
        return array(
                'heading' => 'Common questions from parents',
                'subheading' => 'We’ve answered a few of the questions parents ask most when choosing childcare and early learning.',
                'items' => kidazzle_home_default_faq_items(),
                'cta_text' => '',
                'cta_label' => '',
                'cta_link' => '',
        );
}

/**
 * Curriculum radar profiles
 */
function kidazzle_home_default_schedule_tracks()
{
        return array(
                array(
                        'key' => 'infant',
                        'label' => 'Infants',
                        'title' => 'The Nurturing Nest',
                        'description' => 'Individualized schedules follow infants’ cues for sleeping and eating, with gentle sensory play.',
                        'color' => 'kidazzle-blue',
                        'background' => 'bg-kidazzle-blueLight',
                        'image' => 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?q=80&w=800&auto=format&fit=crop',
                        'steps' => array(
                                array(
                                        'time' => 'AM',
                                        'title' => 'Warm Welcome & Cuddles',
                                        'copy' => 'Transition from parent, bottle feeding, and floor play.',
                                ),
                                array(
                                        'time' => 'Mid',
                                        'title' => 'Sensory Discovery',
                                        'copy' => 'Tummy time, soft textures, and mirror play.',
                                ),
                                array(
                                        'time' => 'PM',
                                        'title' => 'Stroller Walk & Songs',
                                        'copy' => 'Fresh air (weather permitting) and gentle music.',
                                ),
                        ),
                ),
                array(
                        'key' => 'toddler',
                        'label' => 'Toddlers',
                        'title' => 'Explorers & Builders',
                        'description' => 'Structured circle time and communal meals help toddlers understand social cues and transitions.',
                        'color' => 'kidazzle-yellow',
                        'background' => 'bg-kidazzle-yellowLight',
                        'image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=800&auto=format&fit=crop',
                        'steps' => array(
                                array(
                                        'time' => '9:00',
                                        'title' => 'Morning Circle',
                                        'copy' => 'Songs, greeting friends, and introducing the daily theme.',
                                ),
                                array(
                                        'time' => '10:30',
                                        'title' => 'KIDazzle Creative Curriculum Play',
                                        'copy' => 'Block building, art stations, and guided motor skills.',
                                ),
                                array(
                                        'time' => '12:00',
                                        'title' => 'Family-Style Lunch',
                                        'copy' => 'Learning to pass bowls, use utensils, and chat with friends.',
                                ),
                        ),
                ),
                array(
                        'key' => 'prek',
                        'label' => 'Pre-K',
                        'title' => 'Kindergarten Readiness',
                        'description' => 'The Pre-K rhythm mirrors elementary flow, building stamina and focus.',
                        'color' => 'kidazzle-red',
                        'background' => 'bg-kidazzle-redLight',
                        'image' => 'https://images.unsplash.com/photo-1503919545874-86c1d9a04595?q=80&w=800&auto=format&fit=crop',
                        'steps' => array(
                                array(
                                        'time' => '9:00',
                                        'title' => 'Literacy & Logic',
                                        'copy' => 'Phonics games, calendar math, and story comprehension.',
                                ),
                                array(
                                        'time' => '11:00',
                                        'title' => 'Project-Based Learning',
                                        'copy' => 'Collaborative science experiments and art projects.',
                                ),
                                array(
                                        'time' => '2:00',
                                        'title' => 'Social Centers',
                                        'copy' => 'Dramatic play and negotiation skills.',
                                ),
                        ),
                ),
        );
}

/**
 * Age-based program wizard options - Pull from Program CPT
 */
function kidazzle_home_program_wizard_options()
{
        // Query all published programs
        $programs = new WP_Query(array(
                'post_type' => 'program',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_status' => 'publish',
        ));

        if (!$programs->have_posts()) {
                // Fallback to theme mod options if no programs exist
                $options = kidazzle_home_get_theme_mod_json('kidazzle_home_program_wizard_json', kidazzle_home_default_program_wizard_options());
                $program_url = kidazzle_get_program_archive_url();

                return array_map(
                        function ($item) use ($program_url) {
                                $key = sanitize_title($item['key'] ?? '');
                                $anchor_slug = kidazzle_program_anchor_for_key($key);
                                $link_target = $anchor_slug ?: $key;

                                return array(
                                        'key' => $key,
                                        'emoji' => sanitize_text_field($item['emoji'] ?? ''),
                                        'label' => sanitize_text_field($item['label'] ?? ''),
                                        'description' => sanitize_textarea_field($item['description'] ?? ''),
                                        'link' => esc_url_raw($program_url . '#' . $link_target),
                                );
                        },
                        $options
                );
        }

        // Build options from program posts
        $options = array();
        while ($programs->have_posts()) {
                $programs->the_post();
                $post_id = get_the_ID();

                // Get program meta
                $icon = get_post_meta($post_id, 'program_icon', true) ?: '📚';
                $age_range = get_post_meta($post_id, 'program_age_range', true) ?: '';
                $excerpt = get_the_excerpt() ?: '';
                // Use post_name (slug) as the unique key to prevent collisions from cloned meta values
                $anchor_slug = get_post_field('post_name', $post_id);

                // Get image with fallback
                $image_url = get_the_post_thumbnail_url($post_id, 'large');
                if (!$image_url) {
                        $image_url = 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?q=80&w=800&auto=format&fit=crop';
                }

                // Build label with line break for display
                $label = get_the_title();
                if ($age_range) {
                        $clean_range = trim($age_range, '() ');
                        $label .= ' (' . $clean_range . ')';
                }

                $options[] = array(
                        'key' => $anchor_slug,
                        'emoji' => $icon,
                        'label' => $label,
                        'description' => $excerpt,
                        'link' => get_permalink($post_id),
                        'image' => $image_url, // Added image URL
                );
        }

        wp_reset_postdata();

        return $options;
}

function kidazzle_home_curriculum_profiles()
{
        $defaults = kidazzle_home_default_curriculum_profiles();
        $profiles = kidazzle_home_get_theme_mod_json('kidazzle_home_curriculum_profiles_json', $defaults['profiles']);

        $profiles = array_map(
                function ($profile) {
                        $color = $profile['color'] ?? '';
                        if (!sanitize_hex_color($color)) {
                                $color = '#4A6C7C';
                        }

                        $data = array_map('floatval', $profile['data'] ?? array());

                        return array(
                                'key' => sanitize_title($profile['key'] ?? ''),
                                'label' => sanitize_text_field($profile['label'] ?? ''),
                                'title' => sanitize_text_field($profile['title'] ?? ''),
                                'description' => sanitize_textarea_field($profile['description'] ?? ''),
                                'color' => $color,
                                'data' => $data,
                        );
                },
                $profiles
        );

        return array(
                'labels' => $defaults['labels'],
                'profiles' => $profiles,
        );
}

/**
 * Daily schedule tracks - Pull from Program CPT
 */
function kidazzle_home_schedule_tracks()
{
        // Query all published programs with schedule data
        $programs = new WP_Query(array(
                'post_type' => 'program',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_status' => 'publish',
                'meta_query' => array(
                        array(
                                'key' => 'program_schedule_items',
                                'compare' => '!=',
                                'value' => '',
                        ),
                ),
        ));

        if (!$programs->have_posts()) {
                // Fallback to theme mod/defaults if no programs have schedule data
                $tracks = kidazzle_home_get_theme_mod_json('kidazzle_home_schedule_tracks_json', kidazzle_home_default_schedule_tracks());

                return array_map(
                        function ($track) {
                                $steps = array_map(
                                        function ($step) {
                                                return array(
                                                        'time' => sanitize_text_field($step['time'] ?? ''),
                                                        'title' => sanitize_text_field($step['title'] ?? ''),
                                                        'copy' => sanitize_textarea_field($step['copy'] ?? ''),
                                                );
                                        },
                                        $track['steps'] ?? array()
                                );

                                return array(
                                        'key' => sanitize_title($track['key'] ?? ''),
                                        'label' => sanitize_text_field($track['label'] ?? ''),
                                        'title' => sanitize_text_field($track['title'] ?? ''),
                                        'description' => sanitize_textarea_field($track['description'] ?? ''),
                                        'color' => sanitize_text_field($track['color'] ?? ''),
                                        'background' => sanitize_text_field($track['background'] ?? ''),
                                        'image' => esc_url_raw($track['image'] ?? ''),
                                        'steps' => $steps,
                                );
                        },
                        $tracks
                );
        }

        // Build tracks from program posts
        $tracks = array();
        $used_keys = array();

        while ($programs->have_posts()) {
                $programs->the_post();
                $post_id = get_the_ID();

                // Get program meta
                // Use post_name (slug) as the unique key to prevent collisions from cloned meta values
                $anchor_slug = get_post_field('post_name', $post_id);

                // Ensure unique key
                $key = $anchor_slug;
                if (isset($used_keys[$key])) {
                        $key .= '-' . $post_id;
                }
                $used_keys[$key] = true;

                $schedule_title = get_post_meta($post_id, 'program_schedule_title', true);
                $schedule_items = get_post_meta($post_id, 'program_schedule_items', true);
                $color_scheme = get_post_meta($post_id, 'program_color_scheme', true) ?: 'blue';

                // Get program title and excerpt for label and description
                $program_title = get_the_title();
                $description = get_the_excerpt() ?: '';

                // Parse schedule items (format: Badge|Title|Description, one per line)
                $steps = array();
                if (!empty($schedule_items)) {
                        $lines = explode("\n", $schedule_items);
                        foreach ($lines as $line) {
                                $line = trim($line);
                                if (empty($line)) {
                                        continue;
                                }

                                $parts = explode('|', $line);
                                if (count($parts) >= 3) {
                                        $steps[] = array(
                                                'time' => sanitize_text_field(trim($parts[0])),
                                                'title' => sanitize_text_field(trim($parts[1])),
                                                'copy' => sanitize_textarea_field(trim($parts[2])),
                                        );
                                }
                        }
                }

                // Skip if no valid steps
                if (empty($steps)) {
                        continue;
                }

                // Get featured image URL
                $image_url = get_the_post_thumbnail_url($post_id, 'large');

                // Map color scheme to Tailwind classes
                $color_map = array(
                        'red' => array('color' => 'kidazzle-red', 'background' => 'bg-kidazzle-redLight'),
                        'blue' => array('color' => 'kidazzle-blue', 'background' => 'bg-kidazzle-blueLight'),
                        'yellow' => array('color' => 'kidazzle-yellow', 'background' => 'bg-kidazzle-yellowLight'),
                        'blueDark' => array('color' => 'kidazzle-blueDark', 'background' => 'bg-kidazzle-blueDark/10'),
                        'green' => array('color' => 'kidazzle-green', 'background' => 'bg-kidazzle-greenLight'),
                );

                $colors = $color_map[$color_scheme] ?? $color_map['blue'];

                $tracks[] = array(
                        'key' => $key,
                        'label' => $program_title,
                        'title' => $schedule_title ?: $program_title,
                        'description' => $description,
                        'color' => $colors['color'],
                        'background' => $colors['background'],
                        'image' => $image_url ?: '',
                        'steps' => $steps,
                );
        }

        wp_reset_postdata();

        return $tracks;
}

/**
 * Home FAQ block
 */
function kidazzle_home_faq_items()
{
        $items = kidazzle_home_get_theme_mod_json('kidazzle_home_faq_items_json', kidazzle_home_default_faq_items());

        return array_map(
                function ($item) {
                        return array(
                                'question' => sanitize_text_field($item['question'] ?? ''),
                                'answer' => sanitize_textarea_field($item['answer'] ?? ''),
                        );
                },
                $items
        );
}

function kidazzle_home_faq()
{
        $defaults = kidazzle_home_default_faq();

        return array(
                'heading' => sanitize_text_field(get_theme_mod('kidazzle_home_faq_heading', $defaults['heading'])),
                'subheading' => sanitize_text_field(get_theme_mod('kidazzle_home_faq_subheading', $defaults['subheading'])),
                'items' => kidazzle_home_faq_items(),
                'cta_text' => '',
                'cta_label' => '',
                'cta_link' => '',
        );
}

function kidazzle_home_locations_preview()
{
        static $cached;

        if (isset($cached)) {
                return $cached;
        }

        $heading = sanitize_text_field(get_theme_mod('kidazzle_home_locations_heading', '19+ neighborhood locations across Metro Atlanta'));
        $subheading = sanitize_text_field(get_theme_mod('kidazzle_home_locations_subheading', 'Find a Kidazzle campus near your home or work. All locations share the same safety standards, curriculum framework, and warm Kidazzle culture.'));
        $cta_label = sanitize_text_field(get_theme_mod('kidazzle_home_locations_cta_label', 'View All Locations'));
        $cta_link = esc_url_raw(get_theme_mod('kidazzle_home_locations_cta_link', '/locations'));
        $taxonomy = 'location_region';
        $fallback = (object) array(
                'name' => __('Other Areas', 'kidazzle-theme'),
                'slug' => 'other-areas',
        );

        $locations = get_posts(
                array(
                        'post_type' => 'location',
                        'post_status' => 'publish',
                        'posts_per_page' => -1,
                        'orderby' => 'title',
                        'order' => 'ASC',
                        'suppress_filters' => true,
                )
        );

        $map_points = array();
        $featured = array();
        $grouped = array();

        foreach ($locations as $location) {
                $post_id = $location->ID;
                $title = get_the_title($post_id);
                $permalink = get_permalink($post_id);

                $fields = kidazzle_get_location_fields($post_id);
                $city = $fields['city'];
                $state = $fields['state'];
                $phone = $fields['phone'];
                $address = $fields['address'];

                $lat = $fields['latitude'];
                $lng = $fields['longitude'];

                if ($lat && $lng) {
                        $map_points[] = array(
                                'id' => $post_id,
                                'name' => $title,
                                'lat' => (float) $lat,
                                'lng' => (float) $lng,
                                'url' => $permalink,
                                'city' => $city,
                                'state' => $state,
                        );
                }

                $location_data = array(
                        'title' => $title,
                        'city' => $city,
                        'state' => $state,
                        'address' => $address,
                        'phone' => $phone,
                        'url' => $permalink,
                );

                $featured[] = $location_data;

                $terms = get_the_terms($post_id, $taxonomy);
                if (empty($terms) || is_wp_error($terms)) {
                        $terms = array($fallback);
                }

                foreach ($terms as $term) {
                        $group_key = $term->slug ? sanitize_title($term->slug) : sanitize_title($term->name);

                        if (!isset($grouped[$group_key])) {
                                $grouped[$group_key] = array(
                                        'label' => $term->name,
                                        'slug' => $term->slug ?: $group_key,
                                        'term_id' => $term->term_id ?? 0,
                                        'locations' => array(),
                                );
                        }

                        $grouped[$group_key]['locations'][] = $location_data;
                }
        }

        // If no dynamic locations exist, retain the previous static defaults.
        if (empty($featured)) {
                $map_points = array(
                        array(
                                'id' => 1,
                                'name' => 'Marietta – East',
                                'lat' => 33.975,
                                'lng' => -84.507,
                                'url' => '/locations/marietta-east',
                                'city' => 'Marietta',
                                'state' => 'GA',
                        ),
                        array(
                                'id' => 2,
                                'name' => 'Austell – Tramore',
                                'lat' => 33.815,
                                'lng' => -84.63,
                                'url' => '/locations/austell-tramore',
                                'city' => 'Austell',
                                'state' => 'GA',
                        ),
                        array(
                                'id' => 3,
                                'name' => 'Lawrenceville',
                                'lat' => 33.956,
                                'lng' => -83.99,
                                'url' => '/locations/lawrenceville',
                                'city' => 'Lawrenceville',
                                'state' => 'GA',
                        ),
                        array(
                                'id' => 4,
                                'name' => 'Johns Creek',
                                'lat' => 34.028,
                                'lng' => -84.198,
                                'url' => '/locations/johns-creek',
                                'city' => 'Johns Creek',
                                'state' => 'GA',
                        ),
                );

                $featured = array(
                        array(
                                'title' => 'Marietta – East',
                                'city' => 'Marietta',
                                'state' => 'GA',
                                'address' => '2499 Shallowford Rd',
                                'phone' => '(770) 555-1201',
                                'url' => '/locations/marietta-east',
                        ),
                        array(
                                'title' => 'Austell – Tramore',
                                'city' => 'Austell',
                                'state' => 'GA',
                                'address' => '2081 Mesa Valley Rd',
                                'phone' => '(770) 555-4432',
                                'url' => '/locations/austell-tramore',
                        ),
                        array(
                                'title' => 'Lawrenceville',
                                'city' => 'Lawrenceville',
                                'state' => 'GA',
                                'address' => '3650 Club Dr NW',
                                'phone' => '(770) 555-8890',
                                'url' => '/locations/lawrenceville',
                        ),
                );

                $grouped = array(
                        'metro-atlanta' => array(
                                'label' => 'Metro Atlanta',
                                'slug' => 'metro-atlanta',
                                'locations' => $featured,
                        ),
                );
        }

        foreach ($grouped as &$group) {
                usort(
                        $group['locations'],
                        function ($a, $b) {
                                return strnatcasecmp($a['title'], $b['title']);
                        }
                );
        }
        unset($group);

        if (!empty($grouped)) {
                uasort(
                        $grouped,
                        function ($a, $b) {
                                return strnatcasecmp($a['label'], $b['label']);
                        }
                );
        }

        $cached = array(
                'heading' => $heading,
                'subheading' => $subheading,
                'cta_label' => $cta_label,
                'cta_link' => $cta_link,
                'map_points' => $map_points,
                'featured' => $featured,
                'grouped' => $grouped,
                'taxonomy_key' => $taxonomy,
        );

        return $cached;
}

/**
 * Tour CTA content
 */
function kidazzle_home_tour_cta()
{
        return array(
                'heading' => 'Schedule a private tour',
                'subheading' => 'Share a few details and your preferred campus. A Kidazzle Director will reach out to confirm tour times.',
                'trust_text' => 'No obligation. We’ll never share your information.',
        );
}

/**
 * Home Featured Locations (static)
 */
function kidazzle_home_featured_locations()
{
        $locations = kidazzle_home_locations_preview();
        return $locations['featured'];
}

/**
 * Home Featured Stories (static placeholders)
 */
function kidazzle_home_featured_stories()
{
        return array(
                array(
                        'title' => 'Inside the KIDazzle Creative Curriculum™ Classroom',
                        'excerpt' => 'Take a peek at how our educators weave play and academics together each day.',
                        'url' => '/stories/KIDazzle Creative Curriculum-classroom',
                ),
                array(
                        'title' => 'Family-Style Dining at Kidazzle',
                        'excerpt' => 'Why shared meals matter for social-emotional growth and independence.',
                        'url' => '/stories/family-style-dining',
                ),
                array(
                        'title' => 'Partnering with Parents',
                        'excerpt' => 'See how we communicate daily to keep families connected to the classroom.',
                        'url' => '/stories/partnering-with-parents',
                ),
        );
}

/**
 * Parent Reviews for homepage carousel
 */
function kidazzle_home_default_parent_reviews()
{
        return array(
                array(
                        'name' => 'Sarah M.',
                        'location' => 'Marietta Campus',
                        'rating' => '5',
                        'review' => 'Our daughter has flourished at Kidazzle. The teachers genuinely care, and The KIDazzle Creative Curriculum has her excited to learn every day. We couldn\'t ask for a better early learning experience.',
                ),
                array(
                        'name' => 'James & Lisa T.',
                        'location' => 'Johns Creek Campus',
                        'rating' => '5',
                        'review' => 'After touring several centers, Kidazzle stood out immediately. The transparency, the warmth, and the expert care made our decision easy. Our son has been there for two years and we\'ve never looked back.',
                ),
                array(
                        'name' => 'Maria G.',
                        'location' => 'Austell Campus',
                        'rating' => '5',
                        'review' => 'The family-style meals, the daily communication, the beautiful facilities — everything exceeds expectations. Kidazzle feels like an extension of our family, and our twins are thriving.',
                ),
        );
}

function kidazzle_home_parent_reviews()
{
        $reviews = kidazzle_home_get_theme_mod_json('kidazzle_home_parent_reviews_json', kidazzle_home_default_parent_reviews());

        return array_map(
                function ($review) {
                        return array(
                                'name' => sanitize_text_field($review['name'] ?? ''),
                                'location' => sanitize_text_field($review['location'] ?? ''),
                                'rating' => absint($review['rating'] ?? 5),
                                'review' => sanitize_textarea_field($review['review'] ?? ''),
                        );
                },
                $reviews
        );
}
/**
 * Curriculum Data
 */
function kidazzle_home_curriculum()
{
	return array(
		'heading' => get_theme_mod('kidazzle_home_curriculum_heading', 'The KIDazzle Creative Curriculum'),
		'subheading' => get_theme_mod('kidazzle_home_curriculum_subheading', 'Nurturing diverse bright minds through expert care and proprietary curriculum.'),
		'description' => get_theme_mod('kidazzle_home_curriculum_description', ''),
		'card_1_heading' => get_theme_mod('kidazzle_home_curriculum_card_1_heading', 'Philosophy'),
		'card_1_text' => get_theme_mod('kidazzle_home_curriculum_card_1_text', 'We believe every child is unique and deserves a tailored approach to learning.'),
		'card_2_heading' => get_theme_mod('kidazzle_home_curriculum_card_2_heading', 'Approach'),
		'card_2_text' => get_theme_mod('kidazzle_home_curriculum_card_2_text', 'Our play-based methodology encourages exploration and critical thinking.'),
		'card_3_heading' => get_theme_mod('kidazzle_home_curriculum_card_3_heading', 'Outcomes'),
		'card_3_text' => get_theme_mod('kidazzle_home_curriculum_card_3_text', 'Graduates leave ready for kindergarten with confidence and social skills.'),
		'cta_label' => get_theme_mod('kidazzle_home_curriculum_cta_label', 'Learn About KIDazzle Creative Curriculum'),
		'cta_link' => get_theme_mod('kidazzle_home_curriculum_cta_link', home_url('/curriculum/')),
	);
}

/**
 * Checkers for optional sections
 */
function kidazzle_home_has_curriculum_panels()
{
	return true;
}

function kidazzle_home_has_program_wizard()
{
        return true;
}

function kidazzle_home_has_curriculum_profiles()
{
        return true;
}

function kidazzle_home_has_schedule_tracks()
{
        return true;
}

function kidazzle_home_has_faq()
{
        return true;
}

function kidazzle_home_has_stats()
{
        return true;
}

function kidazzle_home_has_parent_reviews()
{
        $reviews = kidazzle_home_parent_reviews();
        return !empty($reviews);
}
