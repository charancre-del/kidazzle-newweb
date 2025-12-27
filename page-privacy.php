<?php
/**
 * Template Name: Privacy Policy Page
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
<div class="relative py-24 bg-slate-50 text-center">
  <div class="container mx-auto px-4">
    <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6"><?php the_title(); ?></h1>
    <p class="text-xl text-slate-500 max-w-2xl mx-auto">
      <?php esc_html_e('Your privacy is important to us. Please read our policy below.', 'kidazzle'); ?></p>
  </div>
</div>

<div class="container mx-auto px-4 py-16">
  <div class="max-w-4xl mx-auto prose prose-slate">
    <?php
    if (have_posts()):
      while (have_posts()):
        the_post();
        the_content();
      endwhile;
    else:
      ?>
      <!-- Fallback text -->
      <h3>Information Collection</h3>
      <p>We collect information you provide directly to us. For example, we collect information when you create an
        account, subscribe to our newsletter, request customer support, or otherwise communicate with us.</p>
      <h3>Use of Information</h3>
      <p>We use the information we collect to provide, maintain, and improve our services, such as to administer your
        account and to send you technical notices and support messages.</p>
    <?php endif; ?>
  </div>
</div>

<?php get_footer(); ?>