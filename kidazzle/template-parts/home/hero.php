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

$hero_image = 'https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/693c80ab97c0233276b3ff26.png';
$locations_url = get_post_type_archive_link('location') ?: home_url('/locations/');
$about_url = home_url('/about/');
?>

<div class="rounded-[3rem] overflow-hidden relative h-[650px] md:h-[750px] shadow-lg group bg-slate-900">
    <div class="absolute inset-0 z-0">
        <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Happy Children', 'kidazzle'); ?>"
            class="w-full h-full object-cover transition duration-[3000ms] group-hover:scale-105 opacity-80">
        <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/20 to-transparent"></div>
    </div>
    <div class="absolute inset-0 z-10 flex items-center p-8 md:p-16">
        <div class="max-w-3xl">
            <div
                class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 text-white px-4 py-2 rounded-full mb-8">
                <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                <span
                    class="font-bold text-xs uppercase tracking-widest"><?php esc_html_e('Enrolling Now for 2025', 'kidazzle'); ?></span>
            </div>
            <h1
                class="text-5xl md:text-8xl font-extrabold text-white leading-[1.05] mb-8 drop-shadow-xl tracking-tight">
                <?php esc_html_e('Where Learning', 'kidazzle'); ?> <br />
                <span
                    class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-300 to-yellow-500"><?php esc_html_e('Is Fun!', 'kidazzle'); ?></span>
            </h1>
            <p class="text-lg md:text-2xl text-white/90 font-medium mb-10 leading-relaxed max-w-lg">
                <?php esc_html_e('We are an independent, premier learning academy nurturing diverse bright minds for over 31 years.', 'kidazzle'); ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="<?php echo esc_url($locations_url); ?>"
                    class="bg-yellow-400 text-slate-900 px-10 py-5 rounded-full font-extrabold hover:bg-white transition hover:scale-105 shadow-xl flex items-center justify-center gap-2 text-lg">
                    <?php esc_html_e('Find Your Center', 'kidazzle'); ?>
                </a>
                <a href="<?php echo esc_url($about_url); ?>"
                    class="bg-white/10 backdrop-blur-md border border-white/50 text-white px-10 py-5 rounded-full font-bold hover:bg-white hover:text-slate-900 transition flex items-center justify-center text-lg">
                    <?php esc_html_e('Our Legacy', 'kidazzle'); ?>
                </a>
            </div>
        </div>
    </div>
</div>