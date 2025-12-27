<?php
/**
 * Template Name: Programs Page
 * Programs listing page
 * 
 * KIDazzle Child Care Theme
 * 
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- HERO SECTION -->
<div class="relative py-40 text-center overflow-hidden">
    <!-- Background Image: Children engaged in focused learning activity -->
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
            alt="<?php esc_attr_e('Children engaged in focused learning activity', 'kidazzle'); ?>"
            class="w-full h-full object-cover">
        <!-- 50% Fade Overlay (Darker) -->
        <div class="absolute inset-0 bg-black/50"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 container mx-auto px-4">
        <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg">
            <?php esc_html_e('Our Programs', 'kidazzle'); ?></h1>
        <p class="text-xl md:text-2xl text-white max-w-3xl mx-auto font-medium drop-shadow-md">
            <?php esc_html_e('Comprehensive, curriculum-driven care for every stage of childhood.', 'kidazzle'); ?></p>
    </div>
</div>

<!-- INTRO CONTENT -->
<div class="container mx-auto px-4 py-20 space-y-24">

    <!-- Philosophy of Programs -->
    <section class="text-center max-w-4xl mx-auto">
        <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6">
            <?php esc_html_e('More Than Just Care', 'kidazzle'); ?></h2>
        <p class="text-lg text-slate-600 leading-relaxed mb-8">
            <?php esc_html_e('At KIDazzle, we believe that early education is the foundation for lifelong success. Our programs are not one-size-fits-all; they are tailored to the specific developmental milestones of each age group.', 'kidazzle'); ?>
        </p>
        <div class="grid md:grid-cols-2 gap-8 text-left">
            <!-- Linked Lesson Plans Card -->
            <a href="<?php echo esc_url(home_url('/curriculum/')); ?>"
                class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-indigo-300 hover:shadow-lg transition group">
                <h3 class="text-xl font-bold text-indigo-900 mb-2 flex items-center gap-2">
                    <i data-lucide="book-open" class="text-indigo-500 group-hover:text-indigo-600"></i>
                    <?php esc_html_e('Lesson Plans', 'kidazzle'); ?>
                </h3>
                <p class="text-slate-600 mb-4">
                    <?php esc_html_e('Every classroom follows a structured, weekly lesson plan derived from the Creative Curriculum®. Click here to see sample plans and examples of our work.', 'kidazzle'); ?>
                </p>
                <span
                    class="text-indigo-600 font-bold text-sm flex items-center gap-1 group-hover:gap-2 transition-all"><?php esc_html_e('View Examples', 'kidazzle'); ?>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i></span>
            </a>

            <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100">
                <h3 class="text-xl font-bold text-indigo-900 mb-2 flex items-center gap-2"><i data-lucide="layout"
                        class="text-indigo-500"></i> <?php esc_html_e('Classroom Management', 'kidazzle'); ?></h3>
                <p class="text-slate-600">
                    <?php esc_html_e('Our environments are intentionally designed to promote independence and positive behavior. Consistent routines and clear expectations create a safe space for learning.', 'kidazzle'); ?>
                </p>
            </div>
        </div>
    </section>

    <!-- PROGRAM CARDS GRID -->
    <?php
    // Ideally this would be a WP_Query loop of 'program' CPTs.
    // For now, we preserve the exact design structure with static cards mapped to CPT links.
    ?>
    <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

        <!-- Infants -->
        <a href="<?php echo esc_url(home_url('/programs/infants/')); ?>"
            class="group bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition flex flex-col">
            <div class="h-48 bg-red-50 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1555252333-9f8e92e65df9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
                    alt="<?php esc_attr_e('Infant Care', 'kidazzle'); ?>">
                <div class="absolute inset-0 bg-red-900/10 group-hover:bg-transparent transition"></div>
            </div>
            <div class="p-8 flex flex-col flex-grow">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-2xl font-bold text-slate-900"><?php esc_html_e('Infants', 'kidazzle'); ?></h3>
                    <span
                        class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs font-bold"><?php esc_html_e('6 wks - 12 mos', 'kidazzle'); ?></span>
                </div>
                <p class="text-slate-500 text-sm mb-6 flex-grow">
                    <?php esc_html_e('Nurturing care focusing on trust, sensory milestones, and secure attachment.', 'kidazzle'); ?>
                </p>
                <span
                    class="text-red-500 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all"><?php esc_html_e('View Details', 'kidazzle'); ?>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i></span>
            </div>
        </a>

        <!-- Toddlers -->
        <a href="<?php echo esc_url(home_url('/programs/toddlers/')); ?>"
            class="group bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition flex flex-col">
            <div class="h-48 bg-orange-50 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
                    alt="<?php esc_attr_e('Toddler Care', 'kidazzle'); ?>">
                <div class="absolute inset-0 bg-orange-900/10 group-hover:bg-transparent transition"></div>
            </div>
            <div class="p-8 flex flex-col flex-grow">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-2xl font-bold text-slate-900"><?php esc_html_e('Toddlers', 'kidazzle'); ?></h3>
                    <span
                        class="bg-orange-100 text-orange-600 px-3 py-1 rounded-full text-xs font-bold"><?php esc_html_e('12 - 24 mos', 'kidazzle'); ?></span>
                </div>
                <p class="text-slate-500 text-sm mb-6 flex-grow">
                    <?php esc_html_e('Active exploration, vocabulary building, and social interaction in a safe environment.', 'kidazzle'); ?>
                </p>
                <span
                    class="text-orange-500 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all"><?php esc_html_e('View Details', 'kidazzle'); ?>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i></span>
            </div>
        </a>

        <!-- Preschool -->
        <a href="<?php echo esc_url(home_url('/programs/preschool/')); ?>"
            class="group bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition flex flex-col">
            <div class="h-48 bg-yellow-50 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1587654780291-39c940483713?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
                    alt="<?php esc_attr_e('Multicultural Preschoolers Playing', 'kidazzle'); ?>">
                <div class="absolute inset-0 bg-yellow-900/10 group-hover:bg-transparent transition"></div>
            </div>
            <div class="p-8 flex flex-col flex-grow">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-2xl font-bold text-slate-900"><?php esc_html_e('Preschool', 'kidazzle'); ?></h3>
                    <span
                        class="bg-yellow-100 text-yellow-600 px-3 py-1 rounded-full text-xs font-bold"><?php esc_html_e('2 - 3 yrs', 'kidazzle'); ?></span>
                </div>
                <p class="text-slate-500 text-sm mb-6 flex-grow">
                    <?php esc_html_e('Early academics and social skills preparing for school success through project-based learning.', 'kidazzle'); ?>
                </p>
                <span
                    class="text-yellow-500 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all"><?php esc_html_e('View Details', 'kidazzle'); ?>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i></span>
            </div>
        </a>

        <!-- GA Pre-K -->
        <a href="<?php echo esc_url(home_url('/programs/ga-pre-k/')); ?>"
            class="group bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition flex flex-col">
            <div class="h-48 bg-green-50 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
                    alt="<?php esc_attr_e('GA Pre-K', 'kidazzle'); ?>">
                <div class="absolute inset-0 bg-green-900/10 group-hover:bg-transparent transition"></div>
            </div>
            <div class="p-8 flex flex-col flex-grow">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-2xl font-bold text-slate-900"><?php esc_html_e('GA Pre-K', 'kidazzle'); ?></h3>
                    <span
                        class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs font-bold"><?php esc_html_e('4 - 5 yrs', 'kidazzle'); ?></span>
                </div>
                <p class="text-slate-500 text-sm mb-6 flex-grow">
                    <?php esc_html_e('Lottery-funded program utilizing GELDS standards and Frog Street curriculum for kindergarten readiness.', 'kidazzle'); ?>
                </p>
                <span
                    class="text-green-600 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all"><?php esc_html_e('View Details', 'kidazzle'); ?>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i></span>
            </div>
        </a>

        <!-- Private Pre-K / VPK -->
        <a href="<?php echo esc_url(home_url('/programs/vpk-fl/')); ?>"
            class="group bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition flex flex-col">
            <div class="h-48 bg-cyan-50 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
                    alt="<?php esc_attr_e('VPK', 'kidazzle'); ?>">
                <div class="absolute inset-0 bg-cyan-900/10 group-hover:bg-transparent transition"></div>
            </div>
            <div class="p-8 flex flex-col flex-grow">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-2xl font-bold text-slate-900">
                        <?php esc_html_e('Private Pre-K & VPK', 'kidazzle'); ?></h3>
                    <span
                        class="bg-cyan-100 text-cyan-600 px-3 py-1 rounded-full text-xs font-bold"><?php esc_html_e('4 - 5 yrs', 'kidazzle'); ?></span>
                </div>
                <p class="text-slate-500 text-sm mb-6 flex-grow">
                    <?php esc_html_e('Specialized preparation for Florida (VPK) and Tennessee (TN-ELDS) standards.', 'kidazzle'); ?>
                </p>
                <span
                    class="text-cyan-600 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all"><?php esc_html_e('View Details', 'kidazzle'); ?>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i></span>
            </div>
        </a>

        <!-- After School / Summer Camp -->
        <a href="<?php echo esc_url(home_url('/programs/after-school/')); ?>"
            class="group bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition flex flex-col">
            <div class="h-48 bg-purple-50 relative overflow-hidden">
                <img src="https://images.unsplash.com/photo-1571210862729-78a52d3779a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                    class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
                    alt="<?php esc_attr_e('After School', 'kidazzle'); ?>">
                <div class="absolute inset-0 bg-purple-900/10 group-hover:bg-transparent transition"></div>
            </div>
            <div class="p-8 flex flex-col flex-grow">
                <div class="flex items-center justify-between mb-2">
                    <h3 class="text-2xl font-bold text-slate-900"><?php esc_html_e('School Age', 'kidazzle'); ?></h3>
                    <span
                        class="bg-purple-100 text-purple-600 px-3 py-1 rounded-full text-xs font-bold"><?php esc_html_e('5 - 12 yrs', 'kidazzle'); ?></span>
                </div>
                <p class="text-slate-500 text-sm mb-6 flex-grow">
                    <?php esc_html_e('After School programs with homework help and engaging Summer Camps featuring weekly themes.', 'kidazzle'); ?>
                </p>
                <span
                    class="text-purple-600 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all"><?php esc_html_e('View Details', 'kidazzle'); ?>
                    <i data-lucide="arrow-right" class="w-4 h-4"></i></span>
            </div>
        </a>

    </section>

    <!-- CTA STRIP -->
    <section class="py-20 bg-white">
        <div
            class="max-w-5xl mx-auto bg-slate-900 rounded-[3rem] p-12 text-center text-white shadow-2xl relative overflow-hidden">
            <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                <div class="text-left">
                    <h3 class="text-3xl font-extrabold mb-2">
                        <?php esc_html_e('Enrollment Open Year-Round', 'kidazzle'); ?></h3>
                    <p class="text-indigo-200 text-lg">
                        <?php esc_html_e("Secure your child's spot in a center where learning is fun and futures are bright.", 'kidazzle'); ?>
                    </p>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 shrink-0">
                    <a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
                        class="bg-white text-slate-900 px-8 py-3 rounded-xl font-bold hover:bg-slate-100 transition shadow-lg whitespace-nowrap"><?php esc_html_e('Find a Location', 'kidazzle'); ?></a>
                    <a href="<?php echo esc_url(home_url('/contact/')); ?>"
                        class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-xl font-bold hover:bg-white/10 transition whitespace-nowrap"><?php esc_html_e('Apply Now', 'kidazzle'); ?></a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>