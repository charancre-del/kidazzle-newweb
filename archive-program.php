<?php
/**
 * Programs Archive Template
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<main class="bg-white selection:bg-kidazzle-yellow/30">
    <!-- HERO SECTION (High Contrast Brand Hero) -->
    <section class="relative py-40 text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=3840&q=100"
                alt="Children engaged in learning" class="w-full h-full object-cover">
            <!-- Brand Overlay -->
            <div class="absolute inset-0 bg-brand-ink/70"></div>
        </div>

        <div class="relative z-10 container mx-auto px-4">
            <span class="text-kidazzle-yellow font-bold tracking-[0.3em] text-[10px] uppercase mb-4 block italic">Our
                Programs</span>
            <h1 class="text-5xl md:text-7xl font-serif font-bold text-white mb-6 drop-shadow-lg">Excellence for Every
                Age</h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto drop-shadow-md leading-relaxed">Comprehensive,
                curriculum-driven care designed to inspire curiosity and foster growth at every stage of childhood.</p>
        </div>
    </section>

    <div class="container mx-auto px-4 py-24 space-y-32">

        <!-- Philosophy Section -->
        <section class="grid lg:grid-cols-2 gap-20 items-center">
            <div>
                <span
                    class="text-kidazzle-blue font-bold tracking-[0.2em] text-[10px] uppercase mb-3 block">Methodology</span>
                <h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink mb-8">More Than Just Care</h2>
                <div class="text-lg text-brand-ink/70 leading-relaxed mb-10">
                    <p>At KIDazzle, we believe that early education is the foundation for lifelong success. Our programs
                        are not one-size-fits-all; they are tailored to the specific developmental milestones and
                        "refractive" learning needs of each age group.</p>
                </div>
                <div class="flex flex-wrap gap-4">
                    <a href="<?php echo esc_url(home_url('/curriculum/')); ?>"
                        class="px-8 py-3 bg-brand-ink text-white font-bold rounded-full uppercase tracking-widest text-[10px] hover:bg-kidazzle-blue transition-all shadow-lg">Our
                        Curriculum</a>
                    <a href="<?php echo esc_url(home_url('/about/')); ?>"
                        class="px-8 py-3 bg-white border border-brand-ink/10 text-brand-ink font-bold rounded-full uppercase tracking-widest text-[10px] hover:border-kidazzle-blue transition-all">About
                        Our Schools</a>
                </div>
            </div>

            <div class="grid gap-6">
                <!-- Info Card 1 -->
                <div
                    class="bg-brand-cream p-10 rounded-[3rem] border border-brand-ink/5 relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-kidazzle-blue/5 rounded-bl-[100px] transition-transform group-hover:scale-110">
                    </div>

                    <h3 class="text-2xl font-serif font-bold text-brand-ink mb-4">Lesson Planning</h3>
                    <p class="text-brand-ink/60 leading-relaxed">Every classroom follows a structured, weekly lesson
                        plan derived from the Creative Curriculum® and enhanced by our proprietary AI tools.</p>
                </div>

                <!-- Info Card 2 -->
                <div
                    class="bg-brand-cream p-10 rounded-[3rem] border border-brand-ink/5 relative overflow-hidden group">
                    <div
                        class="absolute top-0 right-0 w-24 h-24 bg-kidazzle-green/5 rounded-bl-[100px] transition-transform group-hover:scale-110">
                    </div>

                    <h3 class="text-2xl font-serif font-bold text-brand-ink mb-4">Management</h3>
                    <p class="text-brand-ink/60 leading-relaxed">Our environments are intentionally designed zones that
                        promote independence, curiosity, and positive social interaction.</p>
                </div>
            </div>
        </section>

        <!-- PROGRAM CARDS GRID -->
        <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            if (have_posts()):
                $color_map = [
                    'infant' => ['bg' => 'kidazzle-red', 'accent' => 'text-kidazzle-red'],
                    'toddler' => ['bg' => 'kidazzle-orange', 'accent' => 'text-kidazzle-orange'],
                    'preschool' => ['bg' => 'kidazzle-yellow', 'accent' => 'text-kidazzle-yellow'],
                    'prek' => ['bg' => 'kidazzle-green', 'accent' => 'text-kidazzle-green'],
                    'vpk' => ['bg' => 'kidazzle-blue', 'accent' => 'text-kidazzle-blue'],
                    'schoolage' => ['bg' => 'brand-ink', 'accent' => 'text-brand-ink'],
                ];

                while (have_posts()):
                    the_post();
                    $slug = get_post_field('post_name');
                    // Fallback to toddler colors if slug not found, or try fuzzy matching
                    $colors = $color_map[$slug] ?? null;
                    if (!$colors) {
                        foreach ($color_map as $key => $val) {
                            if (strpos($slug, $key) !== false) {
                                $colors = $val;
                                break;
                            }
                        }
                        if (!$colors)
                            $colors = $color_map['toddler'];
                    }

                    $age_range = get_post_meta(get_the_ID(), 'program_age_range', true);
                    $excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 15);
                    // Image Fallback Logic
                    $placeholders = [
                        'infant' => 'https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=800&q=80',
                        'toddler' => 'https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=800&q=80',
                        'preschool' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=800&q=80',
                        'prek' => 'https://images.unsplash.com/photo-1596464716127-f9a0859606d6?auto=format&fit=crop&w=800&q=80',
                        'pre-k' => 'https://images.unsplash.com/photo-1596464716127-f9a0859606d6?auto=format&fit=crop&w=800&q=80',
                        'vpk' => 'https://images.unsplash.com/photo-1560785496-0887143d2c11?auto=format&fit=crop&w=800&q=80',
                        'school' => 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80'
                    ];

                    $fallback_img = 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=800&q=80'; // Default
            
                    foreach ($placeholders as $key => $url) {
                        if (strpos($slug, $key) !== false) {
                            $fallback_img = $url;
                            break;
                        }
                    }

                    $prog_img = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: $fallback_img;
                    ?>
                    <!-- Premium Program Card -->
                    <a href="<?php the_permalink(); ?>"
                        class="group relative bg-white rounded-[3rem] overflow-hidden shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col">
                        <div class="h-64 relative overflow-hidden">
                            <img src="<?php echo esc_url($prog_img); ?>"
                                class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
                                alt="<?php the_title_attribute(); ?>">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-brand-ink/80 via-transparent to-transparent opacity-60 group-hover:opacity-40 transition-opacity">
                            </div>

                            <?php if ($age_range): ?>
                                <div class="absolute top-6 right-6">
                                    <span
                                        class="bg-white/90 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] uppercase font-bold tracking-widest text-brand-ink shadow-lg border border-white/20">
                                        <?php echo esc_html($age_range); ?>
                                    </span>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-10 flex flex-col flex-grow relative">
                            <!-- Brand Accent Bar -->
                            <div class="absolute top-0 left-0 w-full h-1.5 bg-<?php echo esc_attr($colors['bg']); ?>/20">
                                <div
                                    class="h-full bg-<?php echo esc_attr($colors['bg']); ?> w-0 group-hover:w-full transition-all duration-700">
                                </div>
                            </div>

                            <h3
                                class="text-2xl font-serif font-bold text-brand-ink mb-4 group-hover:<?php echo esc_attr($colors['accent']); ?> transition-colors">
                                <?php the_title(); ?></h3>
                            <p class="text-brand-ink/60 text-sm leading-relaxed mb-8 flex-grow">
                                <?php echo esc_html($excerpt); ?></p>

                            <div class="flex items-center justify-between">
                                <span
                                    class="font-bold text-[10px] uppercase tracking-[0.2em] text-brand-ink/40 group-hover:text-brand-ink transition-colors">Program
                                    Details</span>
                                <div
                                    class="w-10 h-10 rounded-full border border-brand-ink/10 flex items-center justify-center <?php echo esc_attr($colors['accent']); ?> group-hover:bg-brand-ink group-hover:text-white transition-all duration-300">
                                    <i class="fa-solid fa-arrow-right text-xs"></i>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endwhile; endif; ?>
        </section>

        <!-- High Contrast CTA Strip -->
        <section class="pb-24">
            <div
                class="bg-brand-ink rounded-[4rem] p-12 md:p-20 text-center text-white shadow-2xl relative overflow-hidden">
                <div class="absolute -right-20 -bottom-20 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>
                <div class="relative z-10 max-w-4xl mx-auto">
                    <span class="text-kidazzle-yellow font-bold uppercase tracking-[0.3em] text-[10px] mb-6 block">Join
                        the Family</span>
                    <h3 class="text-3xl md:text-5xl font-serif font-bold mb-6">Enrollment Open Year-Round</h3>
                    <p class="text-white/60 text-lg md:text-xl leading-relaxed mb-12 max-w-2xl mx-auto">Secure your
                        child's spot in a center where learning is a joy and futures are nurtured with intention.</p>

                    <div class="flex flex-col sm:flex-row justify-center gap-6">
                        <a href="<?php echo esc_url(home_url('/locations')); ?>"
                            class="px-10 py-5 bg-white text-brand-ink font-bold rounded-full uppercase tracking-widest text-xs hover:bg-kidazzle-yellow hover:-translate-y-1 transition-all shadow-xl">Find
                            a Location</a>
                        <a href="<?php echo esc_url(home_url('/locations#tour')); ?>"
                            class="px-10 py-5 bg-transparent border-2 border-white/20 text-white font-bold rounded-full uppercase tracking-widest text-xs hover:bg-white/10 transition-all">Apply
                            Now</a>
                    </div>
                </div>
            </div>
        </section>

</main>

<?php
get_footer();
