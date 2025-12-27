<?php
/**
 * Homepage Hero Section
 * 
 * KIDazzle Child Care Theme
 * 
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

// Get hero content from customizer or ACF
$hero_badge = get_theme_mod('kidazzle_hero_badge', 'Now Enrolling');
$hero_since = get_theme_mod('kidazzle_hero_since', 'Since 1994');
$hero_headline = get_theme_mod('kidazzle_hero_headline', 'Where Learning is Fun!');
$hero_subheadline = get_theme_mod('kidazzle_hero_subheadline', 'From Memphis to Miami to Atlanta, we are an independent, premier learning academy nurturing diverse bright minds for over three decades.');
$hero_cta_primary_text = get_theme_mod('kidazzle_hero_cta_primary', 'Find Your Center');
$hero_cta_secondary_text = get_theme_mod('kidazzle_hero_cta_secondary', 'Our Legacy');
$hero_image = get_theme_mod('kidazzle_hero_image', 'https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/693c80ab97c0233276b3ff26.png');
?>

<!-- HERO SECTION -->
<header class="relative w-full h-[700px] flex items-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <!-- Hero Image -->
        <img src="<?php echo esc_url($hero_image); ?>"
            alt="<?php esc_attr_e('Diverse group of happy children playing', 'kidazzle'); ?>"
            class="w-full h-full object-cover" loading="eager" fetchpriority="high">
    </div>
    <div class="container mx-auto px-4 relative z-10">
        <!-- Main Content Box: 20% Opacity with Blur -->
        <div
            class="max-w-3xl bg-white/20 backdrop-blur-md p-10 rounded-[2rem] shadow-2xl border-l-[12px] border-yellow-400">
            <div class="flex items-center gap-3 mb-6 flex-wrap">
                <span
                    class="bg-yellow-400 text-slate-900 px-4 py-1.5 rounded-full text-sm font-extrabold uppercase tracking-wider shadow-sm"><?php echo esc_html($hero_badge); ?></span>
                <span
                    class="text-slate-900 text-sm font-bold flex items-center gap-1 bg-white/60 px-3 py-1.5 rounded-full"><i
                        data-lucide="star" class="w-4 h-4 fill-yellow-400 text-yellow-600"></i>
                    <?php echo esc_html($hero_since); ?></span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-6 text-slate-900">
                <?php
                $headline_parts = explode(' ', $hero_headline);
                $last_word = array_pop($headline_parts);
                echo esc_html(implode(' ', $headline_parts));
                ?>
                <br><span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-yellow-600 to-cyan-700"><?php echo esc_html($last_word); ?></span>
            </h1>
            <p class="text-xl text-slate-900 mb-8 font-medium font-bold drop-shadow-sm">
                <?php echo esc_html($hero_subheadline); ?></p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
                    class="bg-yellow-400 hover:bg-yellow-500 text-slate-900 font-bold py-4 px-10 rounded-2xl shadow-lg transition flex items-center justify-center gap-2 transform hover:-translate-y-1 text-center"><?php echo esc_html($hero_cta_primary_text); ?>
                    <i data-lucide="chevron-right" class="w-5 h-5"></i></a>
                <a href="<?php echo esc_url(home_url('/about/')); ?>"
                    class="bg-white/80 text-slate-900 border-2 border-slate-900 hover:border-cyan-600 hover:text-cyan-700 font-bold py-4 px-10 rounded-2xl transition flex items-center justify-center text-center"><?php echo esc_html($hero_cta_secondary_text); ?></a>
            </div>
        </div>
    </div>
</header>