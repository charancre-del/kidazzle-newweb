<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();
?>

<div class="min-h-[60vh] flex items-center justify-center py-20 bg-slate-50 text-center px-4">
  <div class="max-w-xl">
    <div class="mb-8 relative inline-block">
      <div class="text-9xl font-extrabold text-indigo-100">404</div>
      <div class="absolute inset-0 flex items-center justify-center">
        <i data-lucide="help-circle" class="w-20 h-20 text-indigo-500"></i>
      </div>
    </div>

    <h1 class="text-4xl font-bold text-slate-900 mb-4"><?php esc_html_e('Oops! Page Not Found', 'kidazzle'); ?></h1>
    <p class="text-slate-600 text-lg mb-8">
      <?php esc_html_e('It looks like nothing was found at this location. Use the navigation to find your way back or return home.', 'kidazzle'); ?>
    </p>

    <div class="flex flex-col sm:flex-row gap-4 justify-center">
      <a href="<?php echo esc_url(home_url('/')); ?>"
        class="bg-indigo-600 text-white font-bold px-8 py-3 rounded-xl hover:bg-indigo-700 transition shadow-lg inline-flex items-center justify-center gap-2">
        <i data-lucide="home" class="w-5 h-5"></i> <?php esc_html_e('Go Home', 'kidazzle'); ?>
      </a>
      <a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
        class="bg-white border-2 border-slate-200 text-slate-700 font-bold px-8 py-3 rounded-xl hover:bg-white hover:text-indigo-600 hover:border-indigo-600 transition inline-flex items-center justify-center gap-2">
        <i data-lucide="map-pin" class="w-5 h-5"></i> <?php esc_html_e('Find a Location', 'kidazzle'); ?>
      </a>
    </div>
  </div>
</div>

<?php get_footer(); ?>