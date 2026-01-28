<?php
/**
 * Template Name: Newsroom
 *
 * Displays posts with "Show in Newsroom" checked
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

get_header();

// Query posts with "Show in Newsroom" checked
$newsroom_args = array(
	'post_type' => 'post',
	'posts_per_page' => -1, // Show all newsroom posts
	'post_status' => 'publish',
	'orderby' => 'date',
	'order' => 'DESC',
	'meta_query' => array(
		array(
			'key' => '_kidazzle_show_in_newsroom',
			'value' => '1',
			'compare' => '='
		)
	)
);

$newsroom_query = new WP_Query($newsroom_args);
?>

<main id="view-newsroom" class="view-section active block min-h-screen bg-white">
	<section class="py-24 bg-brand-cream border-b border-brand-ink/5 relative overflow-hidden">
		<div class="absolute inset-0 bg-kidazzle-blue/5 -z-10"></div>
		<div class="max-w-5xl mx-auto px-4 relative z-10 text-center">
			<span class="text-kidazzle-blue font-bold tracking-[0.2em] text-xs uppercase mb-4 block">Press & Media</span>
			<h1 class="font-serif text-4xl md:text-6xl text-brand-ink mb-6">Newsroom</h1>
			<p class="text-brand-ink/70 text-lg md:text-xl max-w-2xl mx-auto">The latest updates, press releases, and announcements from <?php bloginfo('name'); ?>.</p>
		</div>
	</section>

	<section class="py-20 max-w-5xl mx-auto px-4 lg:px-6">
		<?php if ($newsroom_query->have_posts()): ?>
			<div class="space-y-16">
				<?php
				$post_count = 0;
				while ($newsroom_query->have_posts()):
					$newsroom_query->the_post();
					if ($post_count > 0): ?>
						<div class="h-px bg-brand-ink/5 w-full"></div>
					<?php endif; ?>

					<div class="group relative md:grid md:grid-cols-4 gap-12 items-start">
						<div class="mb-4 md:mb-0">
							<p class="text-[10px] font-bold uppercase tracking-[0.2em] text-kidazzle-blue">
								<?php echo esc_html(get_the_date('M j, Y')); ?>
							</p>
						</div>
						<div class="md:col-span-3">
							<h2 class="font-serif text-2xl md:text-3xl font-bold text-brand-ink mb-4 group-hover:text-kidazzle-blue transition-colors">
								<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h2>
							<p class="text-brand-ink/70 mb-6 leading-relaxed text-lg">
								<?php echo esc_html(wp_trim_words(get_the_excerpt(), 40)); ?>
							</p>
							<a href="<?php the_permalink(); ?>"
								class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-brand-ink border-b-2 border-kidazzle-yellow pb-1 hover:text-kidazzle-blue hover:border-kidazzle-blue transition-all">
								Read Release <i class="fa-solid fa-arrow-right text-[10px]"></i>
							</a>
						</div>
					</div>

					<?php
					$post_count++;
				endwhile;
				wp_reset_postdata();
				?>
			</div>

		<?php else: ?>
			<div class="text-center py-24 bg-brand-cream rounded-[3rem] border border-brand-ink/5">
				<p class="text-brand-ink/60 text-lg">No newsroom posts found. Check back soon!</p>
			</div>
		<?php endif; ?>
	</section>

	<section class="py-24 bg-brand-ink text-white relative overflow-hidden">
		<div class="absolute -right-20 -top-20 w-80 h-80 bg-white/5 rounded-full blur-3xl"></div>
		<div class="max-w-4xl mx-auto px-4 text-center relative z-10">
			<h2 class="font-serif text-3xl md:text-4xl font-bold mb-6">Media Inquiries</h2>
			<p class="text-white/60 mb-10 text-lg max-w-2xl mx-auto">For interview requests, high-resolution brand assets, or filming permissions at any of our campuses.</p>
			<?php
			$contact_page = get_page_by_path('contact');
			$contact_url = $contact_page ? get_permalink($contact_page->ID) : home_url('/contact/');
			?>
			<a href="<?php echo esc_url($contact_url); ?>"
				class="inline-block px-10 py-5 bg-white text-brand-ink font-bold rounded-full text-xs uppercase tracking-widest hover:bg-kidazzle-yellow hover:scale-105 transition-all shadow-xl">
				Contact Media Team
			</a>
		</div>
	</section>
</main>

<?php get_footer(); ?>
