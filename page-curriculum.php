<?php
/**
 * Template Name: Curriculum Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<?php
$page_id = get_the_ID();

// Hero Section
$hero_badge = get_post_meta($page_id, 'curriculum_hero_badge', true) ?: 'Our Curriculum';
$hero_title = get_post_meta($page_id, 'curriculum_hero_title', true) ?: 'Scientific rigor. <br><span class="italic text-kidazzle-green">Joyful delivery.</span>';
$hero_description = get_post_meta($page_id, 'curriculum_hero_description', true) ?: 'At KIDazzle, we utilize The Creative Curriculum®, a research-based program that honors creativity and respects the role that teachers play in making learning relevant.';

// Framework Pillars (Fetched from Meta in Framework Section)
$framework_title = get_post_meta($page_id, 'curriculum_framework_title', true) ?: 'The KIDazzle Creative Curriculum™ Framework';
$framework_description = get_post_meta($page_id, 'curriculum_framework_description', true) ?: 'Just as a prism refracts light into a spectrum, our curriculum refracts "play" into five distinct pillars of development.';

$framework_pillars = array(
    'physical' => array('icon' => 'fa-solid fa-person-running', 'color' => 'kidazzle-red'),
    'emotional' => array('icon' => 'fa-solid fa-face-smile', 'color' => 'kidazzle-yellow'),
    'social' => array('icon' => 'fa-solid fa-users', 'color' => 'kidazzle-green'),
    'academic' => array('icon' => 'fa-solid fa-brain', 'color' => 'kidazzle-blue'),
    'creative' => array('icon' => 'fa-solid fa-palette', 'color' => 'kidazzle-blueDark'),
);

// Environment Section
$env_title = 'The classroom is the "Third Teacher."';
$env_description = 'We believe children learn best through active exploration. Our classrooms are intentionally designed zones that invite curiosity and independence.';

$zones = array(
    array(
        'emoji' => '🧱',
        'title' => 'Construction Zone',
        'desc' => 'Blocks and engineering tools to teach balance, gravity, and spatial reasoning.',
    ),
    array(
        'emoji' => '🎨',
        'title' => 'Atelier (Art)',
        'desc' => 'Open access to paints and creative materials for unrestricted expression.',
    ),
    array(
        'emoji' => '📖',
        'title' => 'Literacy Nook',
        'desc' => 'Cozy spaces with diverse books to foster a lifelong love of reading.',
    ),
);
?>

<main id="view-curriculum" class="view-section active block">
    <!-- Hero Section (Premium Full-Bleed) -->
    <section class="relative py-32 md:py-48 text-center overflow-hidden">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-4.0.3&auto=format&fit=crop&w=3840&q=100"
                alt="Teacher reading to children" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-kidazzle-blueDark/60 backdrop-blur-[2px]"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 text-white">
            <div
                class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-1.5 rounded-full text-[11px] uppercase tracking-[0.2em] font-bold text-white mb-6 backdrop-blur-md">
                <i class="fa-solid fa-brain text-kidazzle-yellow"></i> <?php echo esc_html($hero_badge); ?>
            </div>
            <h1 class="text-5xl md:text-7xl font-serif font-bold mb-6 drop-shadow-xl text-white">
                <?php echo wp_kses_post($hero_title); ?>
            </h1>
            <p class="text-xl md:text-2xl text-white/90 max-w-3xl mx-auto drop-shadow-md leading-relaxed">
                <?php echo esc_html($hero_description); ?>
            </p>
        </div>

        <!-- Bottom Wave/Curve Decor -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] transform rotate-180">
            <svg class="relative block w-[calc(100%+1.3px)] h-[50px] fill-brand-cream" data-name="Layer 1"
                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z">
                </path>
            </svg>
        </div>
    </section>

    <!-- Core Curriculum Section (Foundation) -->
    <section class="py-24 bg-brand-cream border-t border-brand-ink/5">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <span class="text-kidazzle-blue font-bold uppercase tracking-widest text-xs mb-3 block">The
                        Foundation</span>
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink mb-6">Creative Curriculum® <span
                            class="text-2xl block mt-2 text-brand-ink/60 md:inline md:mt-0 font-sans md:ml-4">(Infant -
                            3 Years)</span></h2>
                    <p class="text-lg text-brand-ink/70 leading-relaxed mb-6">
                        For our youngest learners, we utilize the nationally recognized <strong>Creative
                            Curriculum®</strong>. This research-based framework focuses on the vital connection between
                        caregiver and child, turning everyday moments into learning opportunities.
                    </p>
                    <p class="text-lg text-brand-ink/70 leading-relaxed">
                        By balancing teacher-directed instruction with child-initiated exploration, we ensure every
                        activity—whether it's sensory play, block building, or storytime—supports specific developmental
                        goals in <strong>Social-Emotional, Physical, Language, and Cognitive</strong> domains.
                    </p>
                </div>
                <div
                    class="bg-white rounded-[3rem] p-10 shadow-soft border border-brand-ink/5 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-kidazzle-blue/5 rounded-bl-[100px]"></div>
                    <h3 class="text-2xl font-serif font-bold text-brand-ink mb-8 relative z-10">Why It Works</h3>
                    <ul class="space-y-6 relative z-10">
                        <li class="flex items-start gap-5">
                            <div class="bg-kidazzle-green/10 p-3 rounded-xl text-kidazzle-green">
                                <i class="fa-solid fa-heart-pulse"></i>
                            </div>
                            <div>
                                <strong class="block text-brand-ink text-lg">Individualized Care</strong>
                                <span class="text-brand-ink/60">Teachers adapt lessons to fit each child's unique
                                    temperament and pace.</span>
                            </div>
                        </li>
                        <li class="flex items-start gap-5">
                            <div class="bg-kidazzle-blue/10 p-3 rounded-xl text-kidazzle-blue">
                                <i class="fa-solid fa-child-reaching"></i>
                            </div>
                            <div>
                                <strong class="block text-brand-ink text-lg">Active Learning</strong>
                                <span class="text-brand-ink/60">Children learn by doing—touching, moving, and
                                    interacting with their world.</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- KIDazzle Creative Curriculum™ Framework (Refractive Prism Design) -->
    <section class="py-24 bg-white relative overflow-hidden">
        <!-- Refractive Background Elements -->
        <div
            class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-kidazzle-blue/5 to-transparent skew-x-12 transform translate-x-20">
        </div>
        <div
            class="absolute bottom-0 left-0 w-1/4 h-1/2 bg-gradient-to-tr from-kidazzle-red/5 to-transparent -skew-x-12 transform -translate-x-10">
        </div>

        <div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10">
            <div class="text-center mb-16">
                <div class="inline-block p-3 bg-brand-cream rounded-2xl mb-4 border border-brand-ink/5">
                    <i class="fa-solid fa-gem text-kidazzle-blue text-2xl animate-pulse"></i>
                </div>
                <span class="text-kidazzle-green font-bold tracking-[0.2em] text-[10px] uppercase mb-3 block italic">The
                    Refractive Power of Play</span>
                <h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink mb-6">
                    <?php echo esc_html($framework_title); ?></h2>
                <div class="text-brand-ink/70 max-w-3xl mx-auto text-lg leading-relaxed">
                    <?php echo wp_kses_post(wpautop($framework_description)); ?></div>
            </div>

            <div class="flex flex-wrap justify-center gap-8 lg:gap-12">
                <?php foreach ($framework_pillars as $key => $meta):
                    $p_title = get_post_meta($page_id, "curriculum_pillar_{$key}_title", true);
                    $p_desc = get_post_meta($page_id, "curriculum_pillar_{$key}_desc", true);
                    $p_icon = get_post_meta($page_id, "curriculum_pillar_{$key}_icon", true) ?: $meta['icon'];
                    $color = $meta['color'];
                    ?>
                    <div class="w-full md:w-[calc(50%-2rem)] lg:w-[calc(20%-2.5rem)] group relative">
                        <!-- Connecting Line (Desktop Only) -->
                        <div
                            class="hidden lg:block absolute top-12 left-full w-full h-[2px] bg-gradient-to-r from-brand-ink/10 to-transparent z-0 -translate-x-4 last:hidden">
                        </div>

                        <div
                            class="relative bg-white p-8 rounded-[3rem] shadow-soft border border-brand-ink/5 group-hover:-translate-y-3 transition-all duration-500 z-10 text-center">
                            <!-- Refractive Glow -->
                            <div
                                class="absolute inset-0 bg-gradient-to-br from-<?php echo esc_attr($color); ?>/0 to-<?php echo esc_attr($color); ?>/5 opacity-0 group-hover:opacity-100 transition-opacity rounded-[3rem]">
                            </div>

                            <div
                                class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 mx-auto shadow-lg text-<?php echo esc_attr($color); ?> text-2xl group-hover:bg-<?php echo esc_attr($color); ?> group-hover:text-white transition-all duration-300">
                                <i class="<?php echo esc_attr($p_icon); ?>"></i>
                            </div>
                            <h3 class="font-serif font-bold text-xl text-brand-ink mb-3"><?php echo esc_html($p_title); ?>
                            </h3>
                            <p class="text-xs text-brand-ink/60 leading-relaxed"><?php echo esc_html($p_desc); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Learning Zones Section (The Third Teacher) -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div>
                    <span
                        class="text-kidazzle-green font-bold tracking-[0.2em] text-[10px] uppercase mb-3 block">Environment</span>
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink mb-6">
                        <?php echo esc_html($env_title); ?></h2>
                    <p class="text-brand-ink/70 text-lg leading-relaxed mb-10">
                        <?php echo esc_html($env_description); ?>
                    </p>

                    <div class="space-y-8">
                        <?php foreach ($zones as $zone): ?>
                            <div class="flex gap-6 items-start group">
                                <div
                                    class="text-4xl bg-brand-cream w-16 h-16 rounded-2xl flex items-center justify-center shrink-0 border border-brand-ink/5 group-hover:scale-110 transition-transform">
                                    <?php echo esc_html($zone['emoji']); ?>
                                </div>
                                <div>
                                    <h4 class="font-bold text-xl text-brand-ink mb-2">
                                        <?php echo esc_html($zone['title']); ?></h4>
                                    <p class="text-sm text-brand-ink/70 leading-relaxed">
                                        <?php echo esc_html($zone['desc']); ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-kidazzle-green/10 rounded-[3rem] rotate-3 transform translate-x-4 translate-y-4">
                    </div>
                    <div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white aspect-[4/5]">
                        <img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80"
                            alt="Learning Environment" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- State Standards Section -->
    <section class="py-24 bg-white border-t border-brand-ink/5">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="text-center mb-16">
                <span class="text-kidazzle-red font-bold tracking-[0.2em] text-[10px] uppercase mb-3 block">Excellence
                    is Standard</span>
                <h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink">State-Specific Preparation</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Georgia -->
                <div
                    class="bg-brand-cream p-8 rounded-[2.5rem] border border-brand-ink/5 hover:shadow-xl transition-all group">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 text-4xl shadow-sm group-hover:scale-110 transition-transform">
                        🍑</div>
                    <h3
                        class="text-2xl font-bold text-brand-ink mb-3 group-hover:text-kidazzle-orange transition-colors">
                        Georgia Pre-K</h3>
                    <p class="text-xs font-bold text-kidazzle-orange mb-4 uppercase tracking-[0.2em]">Frog Street &
                        GELDS</p>
                    <p class="text-brand-ink/70 mb-6 leading-relaxed">Our Lottery Funded Pre-K program utilizes Frog
                        Street, aligned with GELDS standards for joyful, rigorous kindergarten readiness.</p>
                </div>

                <!-- Tennessee -->
                <div
                    class="bg-brand-cream p-8 rounded-[2.5rem] border border-brand-ink/5 hover:shadow-xl transition-all group">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 text-4xl shadow-sm group-hover:scale-110 transition-transform">
                        🎸</div>
                    <h3 class="text-2xl font-bold text-brand-ink mb-3 group-hover:text-kidazzle-blue transition-colors">
                        Tennessee</h3>
                    <p class="text-xs font-bold text-kidazzle-blue mb-4 uppercase tracking-[0.2em]">TN-ELDS Aligned</p>
                    <p class="text-brand-ink/70 mb-6 leading-relaxed">In Memphis, our curriculum adheres strictly to the
                        TN-ELDS, ensuring educational goals are met from birth to age 5.</p>
                </div>

                <!-- Florida -->
                <div
                    class="bg-brand-cream p-8 rounded-[2.5rem] border border-brand-ink/5 hover:shadow-xl transition-all group">
                    <div
                        class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center mb-6 text-4xl shadow-sm group-hover:scale-110 transition-transform">
                        ☀️</div>
                    <h3 class="text-2xl font-bold text-brand-ink mb-3 group-hover:text-kidazzle-red transition-colors">
                        Florida VPK</h3>
                    <p class="text-xs font-bold text-kidazzle-red mb-4 uppercase tracking-[0.2em]">OWL & ASQ</p>
                    <p class="text-brand-ink/70 mb-6 leading-relaxed">Incorporating OWL and ASQ to meet Florida's VPK
                        standards with a focus on literacy and bilingual support.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Environment Section -->
    <section class="py-24 bg-brand-ink text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        </div>
        <div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10">
            <div class="text-center mb-16">
                <span
                    class="text-kidazzle-green font-bold tracking-[0.2em] text-[10px] uppercase mb-3 block">Environmental
                    Rating Scales</span>
                <h2 class="text-3xl md:text-5xl font-serif font-bold mb-6">The Environment as a Teacher</h2>
                <p class="text-white/70 max-w-3xl mx-auto text-lg leading-relaxed">We adhere to rigorous environmental
                    rating scales (ITERS/ECERS) to ensure our classrooms are optimally designed for learning. Every
                    corner, toy, and routine is intentional.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-10 max-w-4xl mx-auto">
                <div
                    class="flex items-center gap-6 p-8 rounded-[2rem] border border-white/10 bg-white/5 hover:bg-white/10 transition-all group">
                    <div class="w-24 h-24 rounded-2xl overflow-hidden shrink-0 border-2 border-white shadow-lg">
                        <img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="Infant Care" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-bold text-kidazzle-yellow text-xl mb-1">ITERS</h4>
                        <p class="text-xs text-white/50 mb-3 uppercase tracking-widest leading-none">Infant/Toddler
                            Rating Scale</p>
                        <p class="text-sm text-white/70 leading-relaxed">Specific standards for safety and stimulation
                            for children under 3.</p>
                    </div>
                </div>

                <div
                    class="flex items-center gap-6 p-8 rounded-[2rem] border border-white/10 bg-white/5 hover:bg-white/10 transition-all group">
                    <div class="w-24 h-24 rounded-2xl overflow-hidden shrink-0 border-2 border-white shadow-lg">
                        <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
                            alt="Preschool Learning" class="w-full h-full object-cover">
                    </div>
                    <div>
                        <h4 class="font-bold text-kidazzle-green text-xl mb-1">ECERS</h4>
                        <p class="text-xs text-white/50 mb-3 uppercase tracking-widest leading-none">Early Childhood
                            Rating Scale</p>
                        <p class="text-sm text-white/70 leading-relaxed">Optimizing classroom flow and materials for
                            school readiness.</p>
                    </div>
                </div>
            </div>

            <div class="mt-12 text-center text-white">
                <a href="<?php echo esc_url(home_url('/ers/')); ?>"
                    class="inline-flex items-center gap-2 font-bold border-b-2 border-kidazzle-yellow text-white hover:text-kidazzle-yellow transition-colors pb-1">
                    Learn more about our quality standards <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- AI Innovation Section -->
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div
                class="bg-brand-cream rounded-[4rem] p-12 md:p-20 relative overflow-hidden border border-brand-ink/5 shadow-soft">
                <div class="absolute -right-20 -top-20 w-80 h-80 bg-kidazzle-blue/5 rounded-full blur-3xl"></div>
                <div class="relative z-10 flex flex-col md:flex-row items-center gap-16">
                    <div class="md:w-1/3">
                        <div
                            class="bg-white p-8 rounded-[2.5rem] shadow-xl border border-brand-ink/5 text-center relative">
                            <i class="fa-solid fa-microchip text-7xl text-kidazzle-blue mb-4"></i>
                            <div
                                class="absolute -bottom-4 -right-4 w-16 h-16 bg-kidazzle-yellow rounded-2xl flex items-center justify-center text-white text-2xl rotate-12 shadow-lg">
                                <i class="fa-solid fa-robot"></i>
                            </div>
                        </div>
                    </div>
                    <div class="md:w-2/3 text-center md:text-left">
                        <span
                            class="text-kidazzle-blue font-bold uppercase tracking-[0.2em] text-[10px] mb-4 block">Innovation</span>
                        <h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink mb-6">AI-Powered Lesson
                            Planning</h2>
                        <p class="text-brand-ink/70 text-lg md:text-xl leading-relaxed mb-10">
                            KIDazzle is pioneering the future of early education by integrating a proprietary AI Lesson
                            Plan Assistant. This tool enables our teachers to instantly tailor standard curricula to the
                            specific interests and development levels of their current classroom, ensuring personalized
                            learning for every child.
                        </p>
                        <a href="<?php echo esc_url(home_url('/ai-lesson-plan/')); ?>"
                            class="inline-flex items-center gap-3 px-10 py-5 bg-brand-ink text-white font-bold rounded-full uppercase tracking-widest text-xs hover:bg-kidazzle-blue hover:-translate-y-1 transition-all shadow-xl">
                            Experience the Innovation <i class="fa-solid fa-wand-magic-sparkles text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-24 bg-brand-cream text-center border-t border-brand-ink/5">
        <div class="max-w-3xl mx-auto px-4 lg:px-6">
            <h2 class="text-3xl font-serif font-bold text-brand-ink mb-8">See the curriculum in action.</h2>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="<?php echo esc_url(home_url('/locations')); ?>"
                    class="px-8 py-4 bg-kidazzle-blue text-white font-bold rounded-full uppercase tracking-widest text-xs hover:bg-brand-ink transition-all shadow-lg">Find
                    a Location</a>
                <a href="<?php echo esc_url(home_url('/locations#tour')); ?>"
                    class="px-8 py-4 bg-white border border-brand-ink/10 text-brand-ink font-bold rounded-full uppercase tracking-widest text-xs hover:border-kidazzle-blue hover:text-kidazzle-blue transition-all">Schedule
                    a Tour</a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
