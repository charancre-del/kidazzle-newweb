<?php
/**
 * Template Name: ITERS/ECERS Page
 * Quality Standards Overview
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

<!-- Hero -->
<div class="bg-indigo-900 py-24 text-white text-center relative overflow-hidden">
    <!-- Abstract pattern overlay -->
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

    <div class="container mx-auto px-4 relative z-10">
        <span
            class="bg-indigo-800 text-indigo-200 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block"><?php esc_html_e('The Science of Quality', 'kidazzle'); ?></span>
        <h1 class="text-4xl md:text-6xl font-extrabold mb-6"><?php esc_html_e('Measuring Excellence', 'kidazzle'); ?>
        </h1>
        <p class="text-xl text-indigo-200 max-w-3xl mx-auto">
            <?php esc_html_e('We use ITERS and ECERS rating scales to objectively measure and improve the quality of your child\'s daily experience.', 'kidazzle'); ?>
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-16 space-y-24">

    <!-- ITERS Section -->
    <section id="iters" class="scroll-mt-32">
        <div class="flex items-center gap-4 mb-8">
            <div class="bg-red-100 p-4 rounded-2xl text-red-600"><i data-lucide="baby" class="w-8 h-8"></i></div>
            <div>
                <h2 class="text-3xl font-bold text-slate-900"><?php esc_html_e('ITERS-3', 'kidazzle'); ?></h2>
                <p class="text-slate-500 font-medium">
                    <?php esc_html_e('Infant/Toddler Environment Rating Scale', 'kidazzle'); ?></p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-start">
            <div class="space-y-6">
                <p class="text-lg text-slate-600 leading-relaxed">
                    <?php esc_html_e('ITERS is designed to assess center-based child care programs for infants and toddlers up to 30 months of age. It focuses on the protection of health and safety, building warm relationships, and appropriate learning stimulation.', 'kidazzle'); ?>
                </p>
                <div class="bg-red-50 p-6 rounded-2xl border border-red-100">
                    <h3 class="font-bold text-red-900 mb-4"><?php esc_html_e('What We Monitor:', 'kidazzle'); ?></h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-red-500 mt-0.5"></i>
                            <span
                                class="text-slate-700 text-sm"><strong><?php esc_html_e('Space and Furnishings:', 'kidazzle'); ?></strong>
                                <?php esc_html_e('Safe furniture, room for active play, and cozy areas.', 'kidazzle'); ?></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-red-500 mt-0.5"></i>
                            <span
                                class="text-slate-700 text-sm"><strong><?php esc_html_e('Personal Care Routines:', 'kidazzle'); ?></strong>
                                <?php esc_html_e('Sanitary diapering, meals, and nap times.', 'kidazzle'); ?></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-red-500 mt-0.5"></i>
                            <span
                                class="text-slate-700 text-sm"><strong><?php esc_html_e('Listening and Talking:', 'kidazzle'); ?></strong>
                                <?php esc_html_e('Staff talking with children, books, and encouraging communication.', 'kidazzle'); ?></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-red-500 mt-0.5"></i>
                            <span
                                class="text-slate-700 text-sm"><strong><?php esc_html_e('Interaction:', 'kidazzle'); ?></strong>
                                <?php esc_html_e('Peer interaction and staff-child interaction.', 'kidazzle'); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
            <div
                class="bg-slate-100 rounded-3xl h-80 w-full flex items-center justify-center text-slate-400 border-2 border-dashed border-slate-200">
                <!-- Placeholder for Diagram/Image -->
                <span
                    class="text-sm font-mono"><?php esc_html_e('Infant Classroom Layout Diagram', 'kidazzle'); ?></span>
            </div>
        </div>
    </section>

    <!-- ECERS Section -->
    <section id="ecers" class="scroll-mt-32">
        <div class="flex items-center gap-4 mb-8">
            <div class="bg-green-100 p-4 rounded-2xl text-green-600"><i data-lucide="school" class="w-8 h-8"></i></div>
            <div>
                <h2 class="text-3xl font-bold text-slate-900"><?php esc_html_e('ECERS-3', 'kidazzle'); ?></h2>
                <p class="text-slate-500 font-medium">
                    <?php esc_html_e('Early Childhood Environment Rating Scale', 'kidazzle'); ?></p>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-start">
            <!-- Image Left for variety -->
            <div
                class="bg-slate-100 rounded-3xl h-80 w-full flex items-center justify-center text-slate-400 border-2 border-dashed border-slate-200 order-2 md:order-1">
                <!-- Placeholder for Diagram/Image -->
                <span
                    class="text-sm font-mono"><?php esc_html_e('Preschool Classroom Layout Diagram', 'kidazzle'); ?></span>
            </div>

            <div class="space-y-6 order-1 md:order-2">
                <p class="text-lg text-slate-600 leading-relaxed">
                    <?php esc_html_e('ECERS assesses programs for children of preschool age (3 through 5). It emphasizes the process of care—the nature of the interactions and activities that occur.', 'kidazzle'); ?>
                </p>
                <div class="bg-green-50 p-6 rounded-2xl border border-green-100">
                    <h3 class="font-bold text-green-900 mb-4"><?php esc_html_e('Key Assessment Areas:', 'kidazzle'); ?>
                    </h3>
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 mt-0.5"></i>
                            <span
                                class="text-slate-700 text-sm"><strong><?php esc_html_e('Language-Reasoning:', 'kidazzle'); ?></strong>
                                <?php esc_html_e('Books, encouraging children to communicate, using language to develop reasoning skills.', 'kidazzle'); ?></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 mt-0.5"></i>
                            <span
                                class="text-slate-700 text-sm"><strong><?php esc_html_e('Activities:', 'kidazzle'); ?></strong>
                                <?php esc_html_e('Fine motor, art, music/movement, blocks, sand/water, dramatic play.', 'kidazzle'); ?></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 mt-0.5"></i>
                            <span
                                class="text-slate-700 text-sm"><strong><?php esc_html_e('Program Structure:', 'kidazzle'); ?></strong>
                                <?php esc_html_e('Schedule, free play, group time, and transitions.', 'kidazzle'); ?></span>
                        </li>
                        <li class="flex items-start gap-3">
                            <i data-lucide="check-circle-2" class="w-5 h-5 text-green-500 mt-0.5"></i>
                            <span
                                class="text-slate-700 text-sm"><strong><?php esc_html_e('Parents and Staff:', 'kidazzle'); ?></strong>
                                <?php esc_html_e('Provisions for parents, staff needs, and professional interaction.', 'kidazzle'); ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <div class="bg-slate-900 rounded-[3rem] p-12 text-center text-white">
        <h2 class="text-3xl font-bold mb-4"><?php esc_html_e('See Quality in Action', 'kidazzle'); ?></h2>
        <p class="text-indigo-200 mb-8 max-w-2xl mx-auto">
            <?php esc_html_e('Schedule a tour to observe how our classrooms meet these rigorous standards every day.', 'kidazzle'); ?>
        </p>
        <a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
            class="bg-white text-indigo-900 font-bold py-3 px-8 rounded-xl hover:bg-slate-100 transition inline-block"><?php esc_html_e('Find a Center Near You', 'kidazzle'); ?></a>
    </div>

</div>

<?php get_footer(); ?>