<?php
/**
 * The template for displaying all single posts
 *
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
  exit;
}

get_header();

while (have_posts()):
  the_post();
  ?>

  <!-- Hero / Header -->
  <div class="relative py-24 bg-slate-50 text-center overflow-hidden">
    <div class="container mx-auto px-4 relative z-10">
      <div class="max-w-4xl mx-auto">
        <div
          class="flex items-center justify-center gap-2 mb-6 text-sm font-bold text-slate-500 uppercase tracking-wider">
          <span class="text-indigo-600"><?php echo get_the_date(); ?></span>
          <span>&bull;</span>
          <span><?php the_author(); ?></span>
        </div>
        <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-tight"><?php the_title(); ?></h1>

        <?php if (has_category()): ?>
          <div class="flex justify-center gap-2">
            <?php foreach (get_the_category() as $cat): ?>
              <span
                class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-xs font-bold"><?php echo esc_html($cat->name); ?></span>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Featured Image -->
  <?php if (has_post_thumbnail()): ?>
    <div class="container mx-auto px-4 -mt-12 relative z-20">
      <div class="max-w-5xl mx-auto rounded-[2.5rem] overflow-hidden shadow-2xl">
        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-auto">
      </div>
    </div>
  <?php endif; ?>

  <!-- Content -->
  <article class="container mx-auto px-4 py-16">
    <div class="max-w-3xl mx-auto prose prose-lg prose-indigo prose-img:rounded-2xl">
      <?php the_content(); ?>
    </div>

    <!-- Navigation -->
    <div class="max-w-3xl mx-auto mt-16 pt-8 border-t border-slate-200">
      <div class="flex justify-between items-center">
        <div class="text-left">
          <?php previous_post_link('<span class="block text-xs uppercase text-slate-400 font-bold mb-1">Previous</span>%link', '%title'); ?>
        </div>
        <div class="text-right">
          <?php next_post_link('<span class="block text-xs uppercase text-slate-400 font-bold mb-1">Next</span>%link', '%title'); ?>
        </div>
      </div>
    </div>

  </article>

  <!-- Related / CTA -->
  <div class="bg-slate-50 py-20">
    <div class="container mx-auto px-4 text-center">
      <h3 class="text-2xl font-bold text-slate-900 mb-6"><?php esc_html_e('Stay Updated', 'kidazzle'); ?></h3>
      <p class="text-slate-600 mb-8 max-w-xl mx-auto">
        <?php esc_html_e('Join our newsletter to receive the latest updates, parenting tips, and KIDazzle news.', 'kidazzle'); ?>
      </p>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>"
        class="bg-indigo-600 text-white font-bold px-8 py-3 rounded-xl hover:bg-indigo-700 transition shadow-lg"><?php esc_html_e('Contact Us', 'kidazzle'); ?></a>
    </div>
  </div>

<?php
endwhile;
get_footer();
?>