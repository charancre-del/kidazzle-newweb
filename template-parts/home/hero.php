<?php
/**
 * Template Part: Hero Section
 * New KIDazzle homepage hero with glassmorphic content box
 *
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get Customizer settings with defaults
$hero_defaults = function_exists('kidazzle_home_default_hero') ? kidazzle_home_default_hero() : array();
$hero_heading = get_theme_mod('kidazzle_home_hero_heading', $hero_defaults['heading'] ?? 'Where Learning <br /><span class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-yellow-600 to-cyan-700">is Fun!</span>');
$hero_subheading = get_theme_mod('kidazzle_home_hero_subheading', $hero_defaults['subheading'] ?? 'From Memphis to Miami to Atlanta, we are an independent, premier learning academy nurturing diverse bright minds for over three decades.');
$hero_cta_label = get_theme_mod('kidazzle_home_hero_cta_label', $hero_defaults['cta_label'] ?? 'Find Your Center');
$hero_cta_url = get_theme_mod('kidazzle_home_hero_cta_url', $hero_defaults['cta_url'] ?? '');
$hero_secondary_label = get_theme_mod('kidazzle_home_hero_secondary_label', $hero_defaults['secondary_label'] ?? 'Our Legacy');
$hero_secondary_url = get_theme_mod('kidazzle_home_hero_secondary_url', $hero_defaults['secondary_url'] ?? '');

// URLs with fallbacks
$hero_image = 'https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/693c80ab97c0233276b3ff26.png';
$locations_url = !empty($hero_cta_url) ? $hero_cta_url : (get_post_type_archive_link('location') ?: home_url('/locations/'));
$about_url = !empty($hero_secondary_url) ? $hero_secondary_url : home_url('/about/');
?>

<div class="relative w-full h-[700px] flex items-center overflow-hidden rounded-[3rem] shadow-2xl">
    <div class="absolute inset-0 z-0">
        <!-- Hero Image -->
        <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Happy Children', 'kidazzle'); ?>" class="w-full h-full object-cover">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <!-- Main Content Box: 20% Opacity with Blur -->
        <div class="max-w-3xl bg-white/20 backdrop-blur-md p-10 rounded-[2rem] shadow-2xl border-l-[12px] border-yellow-400">
            <div class="flex items-center gap-3 mb-6 flex-wrap">
                <span class="bg-kidazzle-yellow text-brand-ink px-4 py-1.5 rounded-full text-sm font-extrabold uppercase tracking-wider shadow-sm">
                    <?php esc_html_e('Now Enrolling', 'kidazzle'); ?>
                </span>
                <span class="text-brand-ink text-sm font-bold flex items-center gap-1 bg-white/60 px-3 py-1.5 rounded-full">
                    <i class="fa-solid fa-star text-kidazzle-yellow"></i> <?php esc_html_e('Since 1994', 'kidazzle'); ?>
                </span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 text-brand-ink">
                <?php echo wp_kses_post($hero_heading); ?>
            </h1>
            <p class="text-xl text-brand-ink mb-8 font-bold drop-shadow-sm">
                <?php echo esc_html($hero_subheading); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="<?php echo esc_url($locations_url); ?>" class="bg-kidazzle-yellow hover:bg-kidazzle-orange text-brand-ink font-bold py-4 px-10 rounded-2xl shadow-lg transition flex items-center justify-center gap-2 transform hover:-translate-y-1 text-center">
                    <?php echo esc_html($hero_cta_label); ?> <i class="fa-solid fa-chevron-right"></i>
                </a>
                <a href="<?php echo esc_url($about_url); ?>" class="bg-white/80 text-brand-ink border-2 border-brand-ink hover:border-kidazzle-blue hover:text-kidazzle-blue font-bold py-4 px-10 rounded-2xl transition flex items-center justify-center text-center">
                    <?php echo esc_html($hero_secondary_label); ?>
                </a>
            </div>
        </div>
    </div>
</div>

