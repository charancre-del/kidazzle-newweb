<?php
/**
 * Template Name: Newsroom Page
 * Company news and press releases
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
    <img src="https://images.unsplash.com/photo-1557804506-669a67965ba0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
      alt="<?php esc_attr_e('Newsroom', 'kidazzle'); ?>" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-slate-900/60"></div>
  </div>
  <div class="relative z-10 container mx-auto px-4 text-white">
    <span
      class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('Press & Media', 'kidazzle'); ?></span>
    <h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php the_title(); ?></h1>
    <p class="text-xl md:text-2xl max-w-2xl mx-auto text-slate-100 drop-shadow-md">
      <?php esc_html_e('Latest announcements and press releases from KIDazzle.', 'kidazzle'); ?></p>
  </div>
</div>

<div class="container mx-auto px-4 py-20">

  <!-- News Grid -->
  <?php
  // Query for 'news' category or fallback to latest posts
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 9,
    'category_name' => 'news'
  );
  $news_query = new WP_Query($args);

  if ($news_query->have_posts()): ?>
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <?php while ($news_query->have_posts()):
        $news_query->the_post(); ?>
        <article class="bg-white p-6 rounded-[2rem] border border-slate-100 hover:shadow-xl transition flex flex-col">
          <div class="text-xs font-bold text-slate-400 mb-2 uppercase tracking-wide"><?php echo get_the_date(); ?></div>
          <h2 class="text-xl font-bold text-slate-900 mb-3 hover:text-indigo-600 transition"><a
              href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="text-slate-600 text-sm mb-4 line-clamp-3">
            <?php the_excerpt(); ?>
          </div>
          <a href="<?php the_permalink(); ?>"
            class="text-indigo-600 font-bold text-sm mt-auto inline-flex items-center gap-1"><?php esc_html_e('Read Release', 'kidazzle'); ?>
            <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
        </article>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </div>
  <?php else: ?>
    <p class="text-center text-slate-500"><?php esc_html_e('No news items found.', 'kidazzle'); ?></p>
  <?php endif; ?>

  <!-- Media Contact -->
  <div class="mt-20 bg-slate-50 rounded-[2.5rem] p-12 text-center max-w-4xl mx-auto">
    <h3 class="text-2xl font-bold text-slate-900 mb-4"><?php esc_html_e('Media Inquiries', 'kidazzle'); ?></h3>
    <p class="text-slate-600 mb-8">
      <?php esc_html_e('For press kits, interview requests, or high-res logos, please contact our media team.', 'kidazzle'); ?>
    </p>
    <a href="mailto:media@kidazzle.com"
      class="inline-flex items-center gap-2 bg-slate-900 text-white font-bold px-8 py-3 rounded-xl hover:bg-slate-800 transition shadow-lg">
      <i data-lucide="mail" class="w-5 h-5"></i> media@kidazzle.com
    </a>
  </div>

</div>

<?php get_footer(); ?>