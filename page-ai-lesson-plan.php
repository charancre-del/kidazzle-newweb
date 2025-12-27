<?php
/**
 * Template Name: AI Lesson Plan Page
 * AI Lesson Planning & Automation Features
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

<!-- Hero Section -->
<div class="relative py-32 text-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <?php if (has_post_thumbnail()): ?>
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>"
                class="w-full h-full object-cover">
        <?php else: ?>
            <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
                alt="<?php esc_attr_e('Teacher planning with technology', 'kidazzle'); ?>"
                class="w-full h-full object-cover">
        <?php endif; ?>
        <div class="absolute inset-0 bg-purple-900/70"></div>
    </div>
    <div class="relative z-10 container mx-auto px-4 text-white">
        <span
            class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('Innovation in Education', 'kidazzle'); ?></span>
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php the_title(); ?></h1>
        <p class="text-xl md:text-2xl max-w-2xl mx-auto text-purple-100 drop-shadow-md">
            <?php echo esc_html(get_the_excerpt() ?: __('Embracing automation to empower teachers and elevate early education.', 'kidazzle')); ?>
        </p>
    </div>
</div>

<!-- Main Content -->
<div class="container mx-auto px-4 py-20 space-y-24">

    <!-- The Innovation Story -->
    <section class="grid md:grid-cols-2 gap-16 items-center">
        <div>
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6">
                <?php esc_html_e("Grade 'A' Plans in Minutes", 'kidazzle'); ?></h2>
            <div class="space-y-6 text-lg text-slate-600 leading-relaxed">
                <?php the_content(); ?>

                <?php if (!get_the_content()):  // Fallback content if page is empty ?>
                    <p>
                        <?php esc_html_e('At KIDazzle, we are revolutionizing the classroom by embracing <strong>Artificial Intelligence and Automation</strong>. Teachers often spend hours engaging in administrative work, taking time away from what matters most—interacting with your child.', 'kidazzle'); ?>
                    </p>
                    <p>
                        <?php esc_html_e('With our new AI tools, our educators can generate comprehensive, standards-aligned lesson plans for <strong>all age groups</strong> in a fraction of the time. This technology ensures every activity is educational, creative, and tailored to the specific developmental needs of the class.', 'kidazzle'); ?>
                    </p>
                <?php endif; ?>

                <ul class="space-y-3 mt-4">
                    <li class="flex items-center gap-3 font-bold text-slate-700"><i data-lucide="check-circle"
                            class="text-purple-500"></i>
                        <?php esc_html_e('Consistent Quality Across Centers', 'kidazzle'); ?></li>
                    <li class="flex items-center gap-3 font-bold text-slate-700"><i data-lucide="check-circle"
                            class="text-purple-500"></i>
                        <?php esc_html_e('More Face-Time with Students', 'kidazzle'); ?></li>
                    <li class="flex items-center gap-3 font-bold text-slate-700"><i data-lucide="check-circle"
                            class="text-purple-500"></i> <?php esc_html_e('Infinite Creative Resources', 'kidazzle'); ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="bg-purple-50 rounded-[3rem] p-10 border border-purple-100 flex items-center justify-center">
            <div class="text-center">
                <i data-lucide="cpu" class="w-24 h-24 text-purple-400 mx-auto mb-6"></i>
                <h3 class="text-2xl font-bold text-purple-900 mb-2"><?php esc_html_e('Smart Automation', 'kidazzle'); ?>
                </h3>
                <p class="text-purple-700">
                    <?php esc_html_e('Turning hours of paperwork into minutes of planning.', 'kidazzle'); ?></p>
            </div>
        </div>
    </section>

    <!-- Sample Download Section (Lead Capture) -->
    <section class="max-w-4xl mx-auto">
        <div class="bg-white rounded-[3rem] shadow-2xl border border-slate-200 overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-purple-500 via-pink-500 to-red-500">
            </div>

            <div class="p-12 text-center">
                <span
                    class="text-purple-600 font-extrabold tracking-widest uppercase text-sm block mb-2"><?php esc_html_e('Free Resource', 'kidazzle'); ?></span>
                <h2 class="text-3xl font-bold text-slate-900 mb-6">
                    <?php esc_html_e('See the Difference Yourself', 'kidazzle'); ?></h2>
                <p class="text-slate-600 mb-10 max-w-2xl mx-auto">
                    <?php esc_html_e('Curious about what a "Grade A" AI-assisted lesson plan looks like? Enter your details below to instantly receive sample plans for Infants, Toddlers, and Preschoolers.', 'kidazzle'); ?>
                </p>

                <!-- LEAD CAPTURE FORM PLACEHOLDER -->
                <div class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-2xl p-8 max-w-lg mx-auto">
                    <?php
                    // Check for a LeadConnector form shortcode or similar
                    $form_shortcode = get_field('kidazzle_ai_lesson_form_shortcode');
                    if ($form_shortcode):
                        echo do_shortcode($form_shortcode);
                    else:
                        ?>
                        <div class="space-y-4">
                            <!-- Visual representation of the form fields -->
                            <div class="text-left">
                                <label
                                    class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Full Name', 'kidazzle'); ?></label>
                                <div class="h-10 bg-white border border-slate-300 rounded-lg w-full"></div>
                            </div>
                            <div class="text-left">
                                <label
                                    class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Email Address', 'kidazzle'); ?></label>
                                <div class="h-10 bg-white border border-slate-300 rounded-lg w-full"></div>
                            </div>
                            <button
                                class="w-full bg-purple-600 text-white font-bold py-3 rounded-xl hover:bg-purple-700 transition shadow-lg mt-4 flex items-center justify-center gap-2">
                                <i data-lucide="download"></i> <?php esc_html_e('Download Sample Plans', 'kidazzle'); ?>
                            </button>
                        </div>
                        <p class="text-xs text-slate-400 mt-4 font-mono">
                            <?php esc_html_e('[ CRM Form Embed Code Goes Here ]', 'kidazzle'); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <p class="text-xs text-slate-400 mt-6">
                    <?php esc_html_e('By downloading, you agree to receive updates from KIDazzle. We respect your privacy.', 'kidazzle'); ?>
                </p>
            </div>
        </div>
    </section>

</div>

<?php get_footer(); ?>