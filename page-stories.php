<?php
/**
 * Template Name: Stories Page
 * Success stories and testimonials
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
    <img src="https://images.unsplash.com/photo-1544945582-7d32e6a4951d?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
      alt="<?php esc_attr_e('Success Stories', 'kidazzle'); ?>" class="w-full h-full object-cover">
    <div class="absolute inset-0 bg-orange-900/60"></div>
  </div>
  <div class="relative z-10 container mx-auto px-4 text-white">
    <span
      class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('Testimonials', 'kidazzle'); ?></span>
    <h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php the_title(); ?></h1>
    <p class="text-xl md:text-2xl max-w-2xl mx-auto text-orange-100 drop-shadow-md">
      <?php esc_html_e('Real stories from real families whose lives have been touched by KIDazzle.', 'kidazzle'); ?></p>
  </div>
</div>

<div class="container mx-auto px-4 py-20">

  <!-- Stories Grid -->
  <?php
  // Query for 'stories' category
  $args = array(
    'post_type' => 'post',
    'posts_per_page' => 9,
    'category_name' => 'stories',
    'orderby' => 'rand' // Random testimonials
  );
  $stories_query = new WP_Query($args);

  if ($stories_query->have_posts()): ?>
    <div class="grid md:grid-cols-2 gap-8 columns-2">
      <?php while ($stories_query->have_posts()):
        $stories_query->the_post(); ?>
        <article
          class="bg-white p-8 rounded-[2.5rem] shadow-lg border border-slate-100 mb-8 break-inside-avoid hover:-translate-y-1 transition">
          <div class="text-orange-400 mb-4"><i data-lucide="quote" class="w-8 h-8 fill-current"></i></div>
          <div class="text-slate-700 text-lg italic mb-6 leading-relaxed">
            "<?php echo get_the_excerpt(); ?>"
          </div>
          <div class="flex items-center gap-4">
            <?php if (has_post_thumbnail()): ?>
              <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" class="w-12 h-12 rounded-full object-cover shadow-sm">
            <?php else: ?>
              <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-500 flex items-center justify-center font-bold">
                <?php echo substr(get_the_title(), 0, 1); ?>
              </div>
            <?php endif; ?>
            <div>
              <h3 class="font-bold text-slate-900"><?php the_title(); ?></h3>
              <div class="text-xs text-slate-500 uppercase tracking-wide font-bold">
                <?php esc_html_e('Parent', 'kidazzle'); ?></div>
            </div>
          </div>
        </article>
      <?php endwhile;
      wp_reset_postdata(); ?>
    </div>
  <?php else: ?>
    <!-- Placeholder Grid if no posts -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      <div class="bg-white p-8 rounded-[2.5rem] shadow-lg border border-slate-100">
        <div class="text-orange-400 mb-4"><i data-lucide="quote" class="w-8 h-8 fill-current"></i></div>
        <p class="text-slate-700 text-lg italic mb-6">"My child has blossomed since joining KIDazzle. The teachers are
          incredibly supportive and the curriculum is top-notch."</p>
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 rounded-full bg-orange-100 text-orange-500 flex items-center justify-center font-bold">S
          </div>
          <div>
            <h3 class="font-bold text-slate-900">Sarah M.</h3>
            <div class="text-xs text-slate-500 uppercase font-bold">Parent</div>
          </div>
        </div>
      </div>
      <div class="bg-white p-8 rounded-[2.5rem] shadow-lg border border-slate-100">
        <div class="text-orange-400 mb-4"><i data-lucide="quote" class="w-8 h-8 fill-current"></i></div>
        <p class="text-slate-700 text-lg italic mb-6">"I feel so safe leaving my baby here. The app updates throughout the
          day give me such peace of mind."</p>
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 rounded-full bg-blue-100 text-blue-500 flex items-center justify-center font-bold">J</div>
          <div>
            <h3 class="font-bold text-slate-900">Jason T.</h3>
            <div class="text-xs text-slate-500 uppercase font-bold">Parent</div>
          </div>
        </div>
      </div>
      <div class="bg-white p-8 rounded-[2.5rem] shadow-lg border border-slate-100">
        <div class="text-orange-400 mb-4"><i data-lucide="quote" class="w-8 h-8 fill-current"></i></div>
        <p class="text-slate-700 text-lg italic mb-6">"We love the focus on arts and creativity. Our daughter brings home
          the most amazing projects!"</p>
        <div class="flex items-center gap-4">
          <div class="w-12 h-12 rounded-full bg-purple-100 text-purple-500 flex items-center justify-center font-bold">E
          </div>
          <div>
            <h3 class="font-bold text-slate-900">Emily R.</h3>
            <div class="text-xs text-slate-500 uppercase font-bold">Parent</div>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

</div>

<?php get_footer(); ?>