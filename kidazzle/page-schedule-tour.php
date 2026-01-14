<?php
/**
 * Template Name: Schedule a Tour
 *
 * @package Kidazzle_Excellence
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Fetch all locations
$locations_query = new WP_Query(array(
    'post_type' => 'location',
    'posts_per_page' => -1,
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
));

// Buckets for regions
$regions = array(
    'gwinnett' => array(
        'title' => __('Gwinnett County', 'kidazzle-theme'),
        'icon' => '<i class="fa-solid fa-tree"></i>',
        'color' => 'Kidazzle-green',
        'bg' => 'bg-brand-cream',
        'text' => 'text-white', // Button text
        'posts' => array(),
    ),
    'cobb' => array(
        'title' => __('Cobb County', 'kidazzle-theme'),
        'icon' => '<i class="fa-solid fa-city"></i>',
        'color' => 'Kidazzle-red',
        'bg' => 'bg-white',
        'text' => 'text-white',
        'posts' => array(),
    ),
    'north-metro' => array(
        'title' => __('North Metro', 'kidazzle-theme'),
        'icon' => '<i class="fa-solid fa-mountain"></i>',
        'color' => 'Kidazzle-blue',
        'bg' => 'bg-brand-cream',
        'text' => 'text-white',
        'posts' => array(),
    ),
    'south-metro' => array(
        'title' => __('South Metro', 'kidazzle-theme'),
        'icon' => '<i class="fa-solid fa-sun"></i>',
        'color' => 'Kidazzle-yellow',
        'bg' => 'bg-white',
        'text' => 'text-brand-ink', // Special case as per design
        'posts' => array(),
    ),
);

// Fallback bucket
$other_regions = array();

if ($locations_query->have_posts()) {
    while ($locations_query->have_posts()) {
        $locations_query->the_post();
        $id = get_the_ID();
        $terms = get_the_terms($id, 'location_region');
        $first_term = ($terms && !is_wp_error($terms)) ? $terms[0] : null;

        $post_data = array(
            'title' => get_the_title(),
            'permalink' => get_permalink(),
            'thumb' => get_the_post_thumbnail_url($id, 'large') ?: 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?q=80&w=600&auto=format&fit=crop', // Fallback
            'address' => get_post_meta($id, 'location_address', true),
            'city' => get_post_meta($id, 'location_city', true),
            'booking' => get_post_meta($id, 'location_tour_booking_link', true),
        );

        // Determine bucket
        $bucket_found = false;
        if ($first_term) {
            $slug = $first_term->slug;
            // Simple matching logic
            if (strpos($slug, 'gwinnett') !== false) {
                $regions['gwinnett']['posts'][] = $post_data;
                $bucket_found = true;
            } elseif (strpos($slug, 'cobb') !== false) {
                $regions['cobb']['posts'][] = $post_data;
                $bucket_found = true;
            } elseif (strpos($slug, 'north') !== false) {
                $regions['north-metro']['posts'][] = $post_data;
                $bucket_found = true;
            } elseif (strpos($slug, 'south') !== false) {
                $regions['south-metro']['posts'][] = $post_data;
                $bucket_found = true;
            }
        }

        if (!$bucket_found) {
            // Add to Gwinnett as fallback if logical (or create 'other')?
            // The user HTML implies strictly these 4. Let's put in 'other' just in case.
            $other_regions[] = $post_data;
        }
    }
    wp_reset_postdata();
}
get_header();
?>

<main>
    <!-- Hero with Image -->
    <section class="py-20 bg-white border-b border-brand-ink/5 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 lg:px-6 grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-center lg:text-left fade-in-up">
                <span class="text-Kidazzle-red font-bold tracking-[0.2em] text-xs uppercase mb-3 block"><?php _e('Admissions', 'kidazzle-theme'); ?></span>
                <h1 class="font-serif text-5xl md:text-6xl text-brand-ink mb-6"><?php _e('Come see the magic.', 'kidazzle-theme'); ?></h1>
                <p class="text-lg text-brand-ink/60 mb-10 max-w-xl mx-auto lg:mx-0"><?php _e('Select your preferred campus below to schedule a private walkthrough with the Director. We can\'t wait to meet you!', 'kidazzle-theme'); ?></p>

                <!-- Region Quick Links -->
                <div class="flex flex-wrap justify-center lg:justify-start gap-3">
                    <a href="#gwinnett"
                        class="px-5 py-2 rounded-full border border-brand-ink/10 hover:bg-Kidazzle-greenLight hover:border-Kidazzle-green hover:text-Kidazzle-green transition-colors text-xs font-bold uppercase tracking-wider"><?php _e('Gwinnett', 'kidazzle-theme'); ?></a>
                    <a href="#cobb"
                        class="px-5 py-2 rounded-full border border-brand-ink/10 hover:bg-Kidazzle-redLight hover:border-Kidazzle-red hover:text-Kidazzle-red transition-colors text-xs font-bold uppercase tracking-wider"><?php _e('Cobb', 'kidazzle-theme'); ?></a>
                    <a href="#north-metro"
                        class="px-5 py-2 rounded-full border border-brand-ink/10 hover:bg-Kidazzle-blueLight hover:border-Kidazzle-blue hover:text-Kidazzle-blue transition-colors text-xs font-bold uppercase tracking-wider"><?php _e('North Metro', 'kidazzle-theme'); ?></a>
                    <a href="#south-metro"
                        class="px-5 py-2 rounded-full border border-brand-ink/10 hover:bg-Kidazzle-yellowLight hover:border-Kidazzle-yellow hover:text-Kidazzle-yellow transition-colors text-xs font-bold uppercase tracking-wider"><?php _e('South Metro', 'kidazzle-theme'); ?></a>
                </div>
            </div>
            <div
                class="relative h-[400px] lg:h-[500px] rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white rotate-2 hover:rotate-0 transition-transform duration-500">
                <img src="https://images.unsplash.com/photo-1571210862729-78a52d3779a2?q=80&w=1000&auto=format&fit=crop"
                    class="w-full h-full object-cover" alt="<?php esc_attr_e('Parent touring a classroom', 'kidazzle-theme'); ?>" />
            </div>
        </div>
    </section>

    <?php foreach ($regions as $slug => $data):
        // Skip empty regions if needed, or keep for structure? 
        // User HTML has all 4. Better to show them.
        if (empty($data['posts']))
            continue;
        ?>
        <!-- <?php echo esc_html($data['title']); ?> Section -->
        <section id="<?php echo esc_attr($slug); ?>" class="py-20 <?php echo esc_attr($data['bg']); ?>">
            <div class="max-w-7xl mx-auto px-4 lg:px-6">
                <div class="flex items-center gap-4 mb-10">
                    <div
                        class="w-12 h-12 rounded-full bg-<?php echo esc_attr($data['color']); ?> <?php echo ($slug === 'south-metro') ? 'text-brand-ink' : 'text-white'; ?> flex items-center justify-center text-xl">
                        <?php echo $data['icon']; ?> <!-- Allowed HTML from array -->
                    </div>
                    <h2 class="font-serif text-3xl font-bold text-brand-ink"><?php echo esc_html($data['title']); ?>
                    </h2>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php foreach ($data['posts'] as $post): ?>
                        <!-- <?php echo esc_html($post['title']); ?> -->
                        <?php
                        // Determine the main link for the card
                        $card_link = $post['booking'] ? $post['booking'] : $post['permalink'] . '#contact';
                        $is_booking = !empty($post['booking']);
                        ?>
                        <div class="relative bg-white p-5 rounded-3xl shadow-sm border border-brand-ink/5 hover:shadow-md transition-shadow group flex flex-col text-left">
                            <a href="<?php echo esc_url($post['permalink']); ?>" class="absolute inset-0 z-0" aria-label="<?php printf( esc_attr__('View location details for %s', 'kidazzle-theme'), esc_attr($post['title']) ); ?>"></a>
                            
                            <div class="h-40 rounded-2xl overflow-hidden mb-4 relative z-0">
                                <img src="<?php echo esc_url($post['thumb']); ?>"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    alt="<?php echo esc_attr($post['title']); ?>">
                            </div>
                            <h3
                                class="font-bold text-xl mb-1 group-hover:text-<?php echo esc_attr($data['color']); ?> transition-colors text-brand-ink relative z-0">
                                <?php echo esc_html(str_replace('Location', '', $post['title'])); // Clean title if needed ?>
                            </h3>
                            <p class="text-xs text-brand-ink/70 mb-4 flex-grow relative z-0"><?php echo esc_html($post['address']); ?>
                            </p>

                            <?php if ($post['booking']): ?>
                                <a href="<?php echo esc_url($post['booking']); ?>"
                                    class="booking-btn relative z-10 block w-full py-3 bg-<?php echo esc_attr($data['color']); ?> <?php echo esc_attr($data['text']); ?> text-center rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-Kidazzle-blueDark hover:text-white transition-colors"><?php _e('Schedule Visit', 'kidazzle-theme'); ?></a>
                            <?php else: ?>
                                <a href="<?php echo esc_url($post['permalink']); ?>#contact"
                                    class="relative z-10 block w-full py-3 bg-brand-cream text-brand-ink border border-brand-ink/10 text-center rounded-xl text-xs font-bold uppercase tracking-widest hover:bg-Kidazzle-blueDark hover:text-white transition-colors"><?php _e('Contact Us', 'kidazzle-theme'); ?></a>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    <?php endforeach; ?>

</main>

<!-- Tour Booking Modal -->
<div id="Kidazzle-tour-modal" class="fixed inset-0 z-[100] hidden" role="dialog" aria-modal="true">
    <!-- Backdrop -->
    <div class="absolute inset-0 bg-brand-ink/80 backdrop-blur-sm transition-opacity" id="Kidazzle-tour-backdrop">
    </div>

    <!-- Modal Container -->
    <div
        class="absolute inset-4 md:inset-10 bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col animate-fade-in-up">
        <!-- Header -->
        <div
            class="bg-brand-cream border-b border-brand-ink/5 px-6 py-4 flex items-center justify-between flex-shrink-0">
            <h3 class="font-serif text-xl font-bold text-brand-ink"><?php _e('Schedule Your Visit', 'kidazzle-theme'); ?></h3>
            <div class="flex items-center gap-4">
                <a href="#" id="Kidazzle-tour-external" target="_blank"
                    class="text-xs font-bold uppercase tracking-wider text-brand-ink/70 hover:text-Kidazzle-blue transition-colors hidden md:block">
                    <?php _e('Open in new tab', 'kidazzle-theme'); ?> <i class="fa-solid fa-external-link-alt ml-1"></i>
                </a>
                <button id="Kidazzle-tour-close"
                    class="w-10 h-10 rounded-full bg-white border border-brand-ink/10 flex items-center justify-center text-brand-ink hover:bg-Kidazzle-red hover:text-white hover:border-Kidazzle-red transition-all">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
        </div>

        <!-- Iframe Container -->
        <div class="flex-grow relative bg-white">
            <div id="Kidazzle-tour-loader" class="absolute inset-0 flex items-center justify-center bg-white z-10">
                <div class="w-12 h-12 border-4 border-Kidazzle-blue/20 border-t-Kidazzle-blue rounded-full animate-spin">
                </div>
            </div>
            <iframe id="Kidazzle-tour-frame" src="" class="w-full h-full border-0"
                allow="camera; microphone; autoplay; encrypted-media;"></iframe>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('Kidazzle-tour-modal');
        const backdrop = document.getElementById('Kidazzle-tour-backdrop');
        const closeBtn = document.getElementById('Kidazzle-tour-close');
        const iframe = document.getElementById('Kidazzle-tour-frame');
        const externalLink = document.getElementById('Kidazzle-tour-external');
        const loader = document.getElementById('Kidazzle-tour-loader');

        function openModal(url) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';

            // Show loader
            loader.classList.remove('hidden');

            // Load URL
            iframe.src = url;
            externalLink.href = url;

            iframe.onload = function () {
                loader.classList.add('hidden');
            };
        }

        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
            iframe.src = ''; // Clear source to stop media/reset
        }

        // Attach listeners to booking buttons
        const bookingBtns = document.querySelectorAll('.booking-btn');
        bookingBtns.forEach(btn => {
            btn.addEventListener('click', function (e) {
                const url = this.getAttribute('href');
                // Only intercept standard external URLs, ignore mailto/tel or hashes
                if (url && url.startsWith('http')) {
                    e.preventDefault();
                    openModal(url);
                }
            });
        });

        // Close actions
        if (closeBtn) closeBtn.addEventListener('click', closeModal);
        if (backdrop) backdrop.addEventListener('click', closeModal);
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>

<?php get_footer(); ?>
