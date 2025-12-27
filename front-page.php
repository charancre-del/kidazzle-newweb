<?php
/**
 * Front Page Template (Homepage)
 * Uses hardcoded helpers for modular sections (ACF optional)
 *
 * @package kidazzle
 * @since 1.0.0
 */

get_header();
?>

<!-- Hero Section -->
<?php get_template_part( 'template-parts/home/hero' ); ?>

<!-- Prismpath Expertise Section (Bento Grid) -->
<?php get_template_part( 'template-parts/home/teaching-methodology' ); ?>

<!-- Stats Strip -->
<?php if ( kidazzle_home_has_stats() ) : ?>
        <?php get_template_part( 'template-parts/home/stats-strip' ); ?>
<?php endif; ?>

<!-- Programs Wizard -->
<?php if ( kidazzle_home_has_program_wizard() ) : ?>
<?php get_template_part( 'template-parts/home/programs-wizard' ); ?>
<?php endif; ?>

<!-- Curriculum Radar -->
<?php if ( kidazzle_home_has_curriculum_profiles() ) : ?>
<?php get_template_part( 'template-parts/home/curriculum-chart' ); ?>
<?php endif; ?>

<!-- Schedule Tabs -->
<?php if ( kidazzle_home_has_schedule_tracks() ) : ?>
<?php get_template_part( 'template-parts/home/schedule-tabs' ); ?>
<?php endif; ?>

<!-- Parent Reviews Carousel -->
<?php if ( kidazzle_home_has_parent_reviews() ) : ?>
<?php get_template_part( 'template-parts/home/parent-reviews' ); ?>
<?php endif; ?>

<!-- Locations Preview -->
<?php get_template_part( 'template-parts/home/locations-preview' ); ?>

<!-- Tour CTA -->
<?php get_template_part( 'template-parts/home/tour-cta' ); ?>

<!-- FAQ Section -->
<?php if ( kidazzle_home_has_faq() ) : ?>
	<?php get_template_part( 'template-parts/home/faq' ); ?>
<?php endif; ?>

<?php get_footer(); ?>



