<?php
/**
 * Single City Template
 * Hyperlocal landing page for a specific city
 *
 * @package kidazzle_Excellence
 */

get_header();

// Get city data
$city = get_the_title();
$city_slug = get_post_field('post_name');
$state = get_post_meta(get_the_ID(), 'city_state', true) ?: 'ga';
$state_upper = strtoupper($state);
$county = get_post_meta(get_the_ID(), 'city_county', true) ?: 'Local';
$neighborhoods = get_post_meta(get_the_ID(), 'city_neighborhoods', true);
$location_ids = get_post_meta(get_the_ID(), 'city_nearby_locations', true);
$intro_text = get_post_meta(get_the_ID(), 'city_intro_text', true);

// Fallback for related locations (try alternative meta key)
if (empty($location_ids)) {
    $location_ids = get_post_meta(get_the_ID(), 'related_location_ids', true);
}

$location_count = is_array($location_ids) ? count($location_ids) : 0;

// Local fallback image
$local_fallback = get_template_directory_uri() . '/assets/images/logo_Kidazzlecropped_140x140.webp';
?>

<!-- SEO Hero (Premium High-Contrast) -->
<section class="relative py-24 md:py-32 bg-white overflow-hidden text-center md:text-left">
    <!-- Refractive Decor -->
    <div class="absolute right-0 top-0 w-1/3 h-full bg-kidazzle-blue/5 skew-x-12 transform translate-x-20"></div>
    <div class="absolute -left-20 bottom-0 w-96 h-96 bg-kidazzle-yellow/5 rounded-full blur-[100px]"></div>

    <div class="max-w-7xl mx-auto px-4 lg:px-6 grid lg:grid-cols-2 gap-16 items-center relative z-10">
        <div>
            <span
                class="inline-flex items-center gap-2 bg-brand-cream border border-kidazzle-blue/20 px-5 py-2 rounded-full text-[10px] uppercase tracking-[0.3em] font-bold text-kidazzle-blue shadow-sm mb-8 italic">
                Serving <?php echo esc_html($city); ?> & <?php echo esc_html($county); ?> County
            </span>

            <h1 class="font-serif text-5xl md:text-7xl text-brand-ink mb-8 leading-[1.1]">
                The Best Daycare in <br><span class="italic text-kidazzle-blue"><?php echo esc_html($city); ?>,
                    <?php echo esc_html($state_upper); ?>.</span>
            </h1>

            <p class="text-xl text-brand-ink/60 max-w-xl mb-12 leading-relaxed">
                Discover the highest-rated early learning centers in <?php echo esc_html($city); ?>, featuring the
                KIDazzle Creative Curriculum™ framework and premium safety standards.
            </p>

            <a href="#locations"
                class="inline-flex items-center gap-4 text-xs font-bold uppercase tracking-[0.3em] text-kidazzle-red hover:text-brand-ink transition-all group">
                Find Your Campus
                <div
                    class="w-12 h-12 rounded-full border border-kidazzle-red/20 flex items-center justify-center group-hover:bg-kidazzle-red group-hover:text-white transition-all">
                    <i class="fa-solid fa-arrow-down text-[10px]"></i>
                </div>
            </a>
        </div>

        <div class="relative hidden lg:block">
            <!-- Brand Frame -->
            <div
                class="absolute inset-0 bg-kidazzle-blue/10 rounded-[4rem] rotate-3 scale-100 transform translate-x-4 translate-y-4">
            </div>
            <div class="relative rounded-[4rem] overflow-hidden shadow-2xl border-8 border-white aspect-square">
                <img src="https://images.unsplash.com/photo-1544367353-93620f9c5144?q=80&w=1024&auto=format&fit=crop"
                    class="w-full h-full object-cover" alt="<?php echo esc_attr($city); ?> Childcare">
            </div>
        </div>
    </div>
</section>

<!-- SEO Content Block -->
<section class="py-20 bg-brand-cream border-y border-brand-ink/5">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <h2 class="font-serif text-3xl md:text-5xl text-brand-ink mb-8 leading-tight">
            Early Education and <br>
            Care in <span class="text-kidazzle-blue"><?php echo esc_html($city); ?>, GA</span>
        </h2>

        <?php if ($intro_text): ?>
            <div class="text-lg md:text-xl text-brand-ink/80 leading-relaxed max-w-3xl mx-auto">
                <?php echo wp_kses_post($intro_text); ?>
            </div>
        <?php else: ?>
            <p class="text-lg md:text-xl text-brand-ink/80 leading-relaxed max-w-3xl mx-auto">
                Our school is more than a daycare. Through purposeful play and nurturing guidance, we help lay the
                foundation for a lifelong love of learning.
                <br><br>
                Conveniently located near major highways and down the road from local landmarks and top-rated
                elementary schools, we are the convenient choice for <?php echo esc_html($city); ?> working parents.
                Come by and see KIDazzle Creative Curriculum™ in action at one of our nearby campuses.
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- Locations Grid -->
<section id="locations" class="py-20 bg-white scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 lg:px-6">
        <div class="text-center mb-12">
            <h2 class="font-serif text-2xl md:text-3xl font-bold text-brand-ink">
                KIDazzle Locations Serving <?php echo esc_html($city); ?>
            </h2>
            <p class="text-brand-ink/60 mt-3">Select the campus closest to your home or work.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            if (!empty($location_ids) && is_array($location_ids)):
                $locations_query = new WP_Query([
                    'post_type' => 'location',
                    'post__in' => $location_ids,
                    'orderby' => 'post__in',
                    'posts_per_page' => -1
                ]);

                if ($locations_query->have_posts()):
                    while ($locations_query->have_posts()):
                        $locations_query->the_post();

                        // Get location data
                        $address = get_post_meta(get_the_ID(), 'location_address', true);
                        $loc_city = get_post_meta(get_the_ID(), 'location_city', true);
                        if ($loc_city && !$address) {
                            $address = $loc_city;
                        }

                        $rating = get_post_meta(get_the_ID(), 'location_google_rating', true) ?: '4.9';

                        // Get image
                        $image = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                        if (!$image) {
                            $gallery = get_post_meta(get_the_ID(), 'location_hero_gallery', true);
                            if ($gallery) {
                                $lines = explode("\n", $gallery);
                                $image = trim($lines[0]);
                            }
                        }
                        if (!$image) {
                            $image = $local_fallback;
                        }
                        ?>
                        <!-- Location Card (Premium) -->
                        <div
                            class="group relative bg-brand-cream p-10 rounded-[3rem] border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col">
                            <!-- Brand Accent Bar -->
                            <div class="absolute top-0 left-0 w-full h-1.5 bg-kidazzle-blue/10 overflow-hidden rounded-t-[3rem]">
                                <div class="h-full bg-kidazzle-blue w-0 group-hover:w-full transition-all duration-700"></div>
                            </div>

                            <div
                                class="h-56 rounded-[2.5rem] bg-white mb-8 overflow-hidden relative shadow-inner border border-brand-ink/5">
                                <?php if ($image !== $local_fallback): ?>
                                    <img src="<?php echo esc_url($image); ?>"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                                        alt="<?php the_title_attribute(); ?>" loading="lazy">
                                <?php else: ?>
                                    <div
                                        class="absolute inset-0 bg-gradient-to-br from-kidazzle-blue/10 to-kidazzle-green/10 flex items-center justify-center">
                                        <img src="<?php echo esc_url($local_fallback); ?>" alt="kidazzle" class="w-20 h-20 opacity-20"
                                            loading="lazy">
                                    </div>
                                <?php endif; ?>

                                <div
                                    class="absolute top-6 right-6 bg-white/90 backdrop-blur-md px-4 py-2 rounded-2xl text-[10px] font-bold uppercase tracking-widest shadow-xl text-brand-ink border border-white/20">
                                    <?php echo esc_html($rating); ?> <i class="fa-solid fa-star text-kidazzle-yellow ml-1"></i>
                                </div>
                            </div>

                            <h3
                                class="font-serif text-2xl font-bold text-brand-ink mb-3 group-hover:text-kidazzle-blue transition-colors">
                                <?php the_title(); ?></h3>

                            <?php if ($address): ?>
                                <p class="text-sm text-brand-ink/40 mb-2 font-medium"><i
                                        class="fa-solid fa-location-dot mr-2 text-kidazzle-blue/40"></i>
                                    <?php echo esc_html($address); ?></p>
                            <?php endif; ?>

                            <div
                                class="inline-flex items-center gap-2 text-[9px] font-bold uppercase tracking-[0.2em] text-kidazzle-blue bg-kidazzle-blue/5 px-3 py-1 rounded-full w-fit mb-8 italic">
                                Campus Serving <?php echo esc_html($city); ?>
                            </div>

                            <div class="mt-auto">
                                <a href="<?php the_permalink(); ?>" aria-label="View Campus: <?php the_title_attribute(); ?>"
                                    class="block w-full py-5 bg-brand-ink text-white text-center rounded-2xl text-[10px] font-bold uppercase tracking-widest hover:bg-kidazzle-blue transition-all shadow-lg hover:shadow-xl group-hover:-translate-y-1">
                                    View Campus Profile
                                </a>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
            else:
                ?>
                <div class="col-span-full text-center py-12">
                    <p class="text-brand-ink/60">No locations are currently linked to this city. Please check back soon!</p>
                    <a href="<?php echo esc_url(home_url('/locations/')); ?>"
                        class="inline-block mt-4 text-kidazzle-blue font-semibold hover:underline">
                        View All Locations →
                    </a>
                </div>
                <?php
            endif;
            ?>
        </div>

        <?php if (!empty($neighborhoods) && is_array($neighborhoods)): ?>
            <div class="mt-12 text-center">
                <p class="text-brand-ink/60 text-sm">
                    <strong>Also proudly serving families in:</strong><br>
                    <?php echo esc_html(implode(', ', $neighborhoods)); ?>.
                </p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Programs Grid -->
<section id="programs" class="py-20 bg-white scroll-mt-24">
    <div class="max-w-7xl mx-auto px-4 lg:px-6">
        <div class="text-center mb-12">
            <h2 class="font-serif text-2xl md:text-3xl font-bold text-brand-ink">
                Programs Available in <?php echo esc_html($city); ?>
            </h2>
            <p class="text-brand-ink/60 mt-3">World-class curriculum served locally.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $programs_query = new WP_Query([
                'post_type' => 'program',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
                'post_status' => 'publish'
            ]);

            if ($programs_query->have_posts()):
                while ($programs_query->have_posts()):
                    $programs_query->the_post();
                    $program_slug = get_post_field('post_name');
                    $city_slug = sanitize_title($city);
                    // Construct Combo URL: /program-in-city-state/
                    $combo_url = home_url("/{$program_slug}-in-{$city_slug}-{$state}/");

                    $age_range = get_post_meta(get_the_ID(), 'program_age_range', true);
                    ?>
                    <div
                        class="group relative bg-white p-10 rounded-[3rem] shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col">
                        <!-- Brand Accent Bar -->
                        <div class="absolute top-0 left-0 w-full h-1.5 bg-kidazzle-green/10 overflow-hidden rounded-t-[3rem]">
                            <div class="h-full bg-kidazzle-green w-0 group-hover:w-full transition-all duration-700"></div>
                        </div>

                        <div class="h-48 rounded-[2.5rem] bg-brand-cream/30 mb-8 overflow-hidden relative shadow-inner">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium_large', ['class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-700']); ?>
                            <?php else: ?>
                                <div
                                    class="absolute inset-0 bg-gradient-to-br from-kidazzle-blue/10 to-kidazzle-green/10 flex items-center justify-center">
                                    <span class="text-5xl opacity-30">📚</span>
                                </div>
                            <?php endif; ?>
                            <!-- Glass Badge -->
                            <div
                                class="absolute bottom-6 left-6 right-6 bg-white/40 backdrop-blur-md px-4 py-2 rounded-2xl text-center border border-white/20">
                                <span class="text-[9px] font-bold text-brand-ink uppercase tracking-widest italic">Kidazzle
                                    Specialty</span>
                            </div>
                        </div>

                        <h3
                            class="font-serif text-2xl font-bold text-brand-ink mb-3 group-hover:text-kidazzle-green transition-colors">
                            <?php the_title(); ?></h3>

                        <?php if ($age_range): ?>
                            <div
                                class="inline-flex items-center gap-2 text-[9px] font-bold uppercase tracking-[0.2em] text-kidazzle-green bg-kidazzle-green/5 px-3 py-1 rounded-full w-fit mb-8 italic">
                                Ages <?php echo esc_html($age_range); ?>
                            </div>
                        <?php endif; ?>

                        <div class="mt-auto">
                            <a href="<?php echo esc_url($combo_url); ?>"
                                class="block w-full py-5 bg-white border border-brand-ink/10 text-brand-ink text-center rounded-2xl text-[10px] font-bold uppercase tracking-widest hover:bg-kidazzle-green hover:text-white hover:border-kidazzle-green transition-all shadow-sm group-hover:-translate-y-1">
                                View Curriculum Path
                            </a>
                        </div>
                    </div>
                    <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Local FAQ for SEO -->
<section class="py-20 bg-brand-cream border-t border-brand-ink/5">
    <div class="max-w-4xl mx-auto px-4">
        <h2 class="font-serif text-2xl md:text-3xl font-bold text-brand-ink mb-10 text-center">
            Questions about Childcare in <?php echo esc_html($city); ?>
        </h2>

        <div class="space-y-4">
            <details class="group bg-white rounded-2xl p-6 shadow-sm border border-brand-ink/5">
                <summary class="flex items-center justify-between font-bold text-brand-ink list-none cursor-pointer">
                    <span>Do you offer GA Lottery Pre-K in <?php echo esc_html($city); ?>?</span>
                    <svg class="w-5 h-5 text-kidazzle-blue group-open:rotate-180 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <p class="mt-4 text-sm text-brand-ink/80">
                    Yes! Our locations serving <?php echo esc_html($city); ?> participate in the Georgia Lottery Pre-K
                    program.
                    It is tuition-free for all 4-year-olds living in Georgia.
                </p>
            </details>

            <details class="group bg-white rounded-2xl p-6 shadow-sm border border-brand-ink/5">
                <summary class="flex items-center justify-between font-bold text-brand-ink list-none cursor-pointer">
                    <span>Do you provide transportation from <?php echo esc_html($city); ?> schools?</span>
                    <svg class="w-5 h-5 text-kidazzle-blue group-open:rotate-180 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <p class="mt-4 text-sm text-brand-ink/80">
                    We provide safe bus transportation from most major elementary schools in the
                    <?php echo esc_html($county); ?> School District.
                    Check the specific campus page for a full list.
                </p>
            </details>

            <details class="group bg-white rounded-2xl p-6 shadow-sm border border-brand-ink/5">
                <summary class="flex items-center justify-between font-bold text-brand-ink list-none cursor-pointer">
                    <span>What ages do you accept at your <?php echo esc_html($city); ?> centers?</span>
                    <svg class="w-5 h-5 text-kidazzle-blue group-open:rotate-180 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <p class="mt-4 text-sm text-brand-ink/80">
                    We serve children from 6 weeks old (<a
                        href="<?php echo esc_url(home_url('/programs/infant-care/')); ?>"
                        class="text-kidazzle-blue hover:underline">Infant Care</a>) up to 12 years old (<a
                        href="<?php echo esc_url(home_url('/programs/after-school/')); ?>"
                        class="text-kidazzle-blue hover:underline">After School</a>).
                    We also offer a <a href="<?php echo esc_url(kidazzle_get_page_link('pre-k-prep')); ?>"
                        class="text-kidazzle-blue hover:underline">Pre-K Prep</a> program.
                </p>
            </details>

            <details class="group bg-white rounded-2xl p-6 shadow-sm border border-brand-ink/5">
                <summary class="flex items-center justify-between font-bold text-brand-ink list-none cursor-pointer">
                    <span>How do I enroll my child in <?php echo esc_html($city); ?>?</span>
                    <svg class="w-5 h-5 text-kidazzle-blue group-open:rotate-180 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </summary>
                <p class="mt-4 text-sm text-brand-ink/80">
                    The best way to start is by scheduling a tour at your preferred location.
                    You can book online or call us directly. We'll walk you through the enrollment process and answer
                    all your questions.
                </p>
            </details>
        </div>
    </div>
</section>

<!-- Back to Communities -->
<div class="py-8 bg-white text-center">
    <a href="<?php echo esc_url(get_post_type_archive_link('city')); ?>"
        class="inline-flex items-center gap-2 text-sm font-semibold text-brand-ink/60 hover:text-kidazzle-blue transition-colors">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
        </svg>
        Back to All Communities
    </a>
</div>

<?php get_footer(); ?>