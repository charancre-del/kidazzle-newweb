<?php
/**
 * Template Part: Legacy & Origin Section
 * KIDazzle's origin story
 *
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

$origin_image = get_theme_mod('kidazzle_origin_image', 'https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/694473359bd664b7796f283c.png');
?>

<section class="py-24 bg-white border-t border-slate-100">
    <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-16 items-center">
            <div>
                <span class="text-orange-500 font-bold tracking-widest uppercase text-sm mb-2 block"><?php esc_html_e('Our Origins', 'kidazzle'); ?></span>
                <h2 class="text-4xl font-extrabold text-slate-900 mb-8"><?php esc_html_e('From a Women\'s Shelter to a Regional Standard', 'kidazzle'); ?></h2>
                <div class="space-y-6 text-lg text-slate-600 leading-relaxed">
                    <p>
                        <?php esc_html_e('KIDazzle\'s journey began 31 years ago with a mission rooted in compassion and necessity. We started within the walls of a', 'kidazzle'); ?>
                        <strong><?php esc_html_e('women\'s shelter', 'kidazzle'); ?></strong><?php esc_html_e(', dedicated to providing a safe haven and educational foundation for families in transition. That spark of service ignited a movement.', 'kidazzle'); ?>
                    </p>
                    <p>
                        <?php esc_html_e('Driven by the belief that high-quality care is a right, not a privilege, we expanded purposefully into', 'kidazzle'); ?>
                        <strong><?php esc_html_e('urban areas', 'kidazzle'); ?></strong>
                        <?php esc_html_e('where elite early education was often out of reach. Today, whether in the heart of Atlanta, the soul of Memphis, or the vibrancy of Doral, our promise remains the same:', 'kidazzle'); ?>
                        <strong><?php esc_html_e('high-quality child care anywhere we go', 'kidazzle'); ?></strong>.
                    </p>
                    <p>
                        <?php esc_html_e('We are more than a daycare; we are a community institution always open to new opportunities to educate young minds and lift up the next generation.', 'kidazzle'); ?>
                    </p>
                </div>
                <div class="mt-8">
                    <a href="<?php echo esc_url(home_url('/about/')); ?>" class="text-orange-600 font-bold hover:text-orange-700 flex items-center gap-2">
                        <?php esc_html_e('Read Our Full Story', 'kidazzle'); ?> <i data-lucide="arrow-right" class="w-4 h-4"></i>
                    </a>
                </div>
            </div>
            <div class="h-[500px] bg-slate-100 rounded-[3rem] shadow-2xl overflow-hidden relative group">
                <img src="<?php echo esc_url($origin_image); ?>" 
                     alt="<?php esc_attr_e('Children engaged in creative learning and art', 'kidazzle'); ?>" 
                     class="w-full h-full object-cover transition duration-700 group-hover:scale-105">
            </div>
        </div>
    </div>
</section>
