<?php
/**
 * Template Name: Acquisitions Page
 * Information for selling a center to KIDazzle
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
<div class="relative py-32 text-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
            alt="<?php esc_attr_e('Acquisitions', 'kidazzle'); ?>" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-green-900/70"></div>
    </div>
    <div class="relative z-10 container mx-auto px-4 text-white">
        <span
            class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('Growth', 'kidazzle'); ?></span>
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php the_title(); ?></h1>
        <p class="text-xl md:text-2xl max-w-2xl mx-auto text-green-100 drop-shadow-md">
            <?php esc_html_e('Considering selling your childcare center? Partner with a team that honors your legacy.', 'kidazzle'); ?>
        </p>
    </div>
</div>

<div class="container mx-auto px-4 py-20 space-y-20">

    <!-- Info Section -->
    <section class="grid md:grid-cols-2 gap-16 items-center">
        <div>
            <h2 class="text-3xl font-bold text-slate-900 mb-6"><?php esc_html_e('Why Sell to KIDazzle?', 'kidazzle'); ?>
            </h2>
            <div class="space-y-4 text-lg text-slate-600">
                <p><?php esc_html_e('We understand that your center is more than just a business—it is a community you have built with heart and plenty of hard work.', 'kidazzle'); ?>
                </p>
                <p><?php esc_html_e('We are looking for partners who share our commitment to high-quality education and care. We offer a smooth transition, ensuring your staff and families are well taken care of.', 'kidazzle'); ?>
                </p>
            </div>
            <ul class="space-y-4 mt-8">
                <li class="flex items-center gap-3">
                    <div class="bg-green-100 p-2 rounded-full text-green-600"><i data-lucide="check"
                            class="w-5 h-5"></i></div> <span
                        class="font-bold text-slate-700"><?php esc_html_e('Fair Valuation', 'kidazzle'); ?></span>
                </li>
                <li class="flex items-center gap-3">
                    <div class="bg-green-100 p-2 rounded-full text-green-600"><i data-lucide="check"
                            class="w-5 h-5"></i></div> <span
                        class="font-bold text-slate-700"><?php esc_html_e('Staff Retention', 'kidazzle'); ?></span>
                </li>
                <li class="flex items-center gap-3">
                    <div class="bg-green-100 p-2 rounded-full text-green-600"><i data-lucide="check"
                            class="w-5 h-5"></i></div> <span
                        class="font-bold text-slate-700"><?php esc_html_e('Legacy Preservation', 'kidazzle'); ?></span>
                </li>
            </ul>
        </div>

        <!-- Form -->
        <div class="bg-white p-8 md:p-12 rounded-[2.5rem] shadow-xl border border-slate-100">
            <h3 class="text-2xl font-bold text-slate-900 mb-6"><?php esc_html_e('Confidential Inquiry', 'kidazzle'); ?>
            </h3>
            <?php
            $form_shortcode = get_field('kidazzle_acquisitions_form_shortcode');
            if ($form_shortcode) {
                echo do_shortcode($form_shortcode);
            } else {
                ?>
                <form class="space-y-4">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label
                                class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Name', 'kidazzle'); ?></label>
                            <input type="text"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                        <div>
                            <label
                                class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Phone', 'kidazzle'); ?></label>
                            <input type="tel"
                                class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                        </div>
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Email', 'kidazzle'); ?></label>
                        <input type="email"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <div>
                        <label
                            class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Center Location (City/State)', 'kidazzle'); ?></label>
                        <input type="text"
                            class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                    <button type="button"
                        class="w-full bg-green-600 text-white font-bold py-4 rounded-xl hover:bg-green-700 transition shadow-lg flex justify-center gap-2">
                        <i data-lucide="lock" class="w-5 h-5"></i> <?php esc_html_e('Submit Confidentially', 'kidazzle'); ?>
                    </button>
                </form>
            <?php } ?>
        </div>
    </section>

</div>

<?php get_footer(); ?>