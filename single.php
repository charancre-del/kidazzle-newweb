<?php
/**
 * Single Post Template (Stories/Blog)
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

get_header();

// Get post data
$post_id = get_the_ID();
$categories = get_the_category();
$primary_category = !empty($categories) ? $categories[0]->name : 'Stories';
$post_date = get_the_date('M j, Y');
$author_id = get_the_author_meta('ID');
$author_name = get_the_author();
$author_title = get_the_author_meta('description') ?: 'Contributor';
$author_avatar = get_avatar_url($author_id, array('size' => 150));
$featured_image = get_the_post_thumbnail_url($post_id, 'full');

// Get related posts (same category, exclude current)
$related_args = array(
	'post_type' => 'post',
	'posts_per_page' => 3,
	'post__not_in' => array($post_id),
	'orderby' => 'rand',
);
if (!empty($categories)) {
	$related_args['category__in'] = array($categories[0]->term_id);
}
$related_query = new WP_Query($related_args);
?>

<main id="main-content" class="bg-brand-cream min-h-screen">
	<article class="relative">
		<!-- Article Hero -->
		<header class="py-20 text-center max-w-4xl mx-auto px-4 relative z-10">
			<div class="inline-flex items-center gap-3 text-[10px] font-bold uppercase tracking-[0.2em] text-kidazzle-blue mb-8 bg-white px-5 py-2 rounded-full shadow-sm border border-brand-ink/5">
				<span class="w-2 h-2 bg-kidazzle-blue rounded-full pulse-slow"></span> <?php echo esc_html($primary_category); ?>
				<span class="text-brand-ink/20 font-light">|</span> <?php echo esc_html($post_date); ?>
			</div>
			
			<h1 class="font-serif text-4xl md:text-6xl text-brand-ink mb-10 leading-tight">
				<?php the_title(); ?>
			</h1>

			<div class="flex items-center justify-center gap-4">
				<div class="relative">
					<img src="<?php echo esc_url($author_avatar); ?>"
						class="w-14 h-14 rounded-full object-cover border-4 border-white shadow-lg"
						alt="<?php echo esc_attr($author_name); ?>" />
					<div class="absolute -bottom-1 -right-1 w-6 h-6 bg-kidazzle-yellow rounded-full flex items-center justify-center border-2 border-white">
						<i class="fa-solid fa-pen-nib text-[10px] text-brand-ink"></i>
					</div>
				</div>
				<div class="text-left">
					<p class="text-sm font-bold text-brand-ink"><?php echo esc_html($author_name); ?></p>
					<p class="text-[10px] uppercase tracking-widest text-brand-ink/60"><?php echo esc_html($author_title); ?></p>
				</div>
			</div>
		</header>

		<?php if ($featured_image): ?>
			<div class="max-w-6xl mx-auto px-4 lg:px-6 mb-16 relative">
				<div class="absolute -inset-4 bg-kidazzle-blue/5 rounded-[4rem] blur-2xl -z-10"></div>
				<img src="<?php echo esc_url($featured_image); ?>" alt="<?php the_title_attribute(); ?>"
					class="w-full h-[600px] object-cover rounded-[3.5rem] shadow-2xl border-8 border-white">
			</div>
		<?php endif; ?>

		<!-- Content -->
		<div class="max-w-3xl mx-auto px-4 lg:px-6 pb-24">
			<div class="post-content prose prose-lg prose-headings:font-serif prose-headings:font-bold prose-p:text-brand-ink/80 prose-a:text-kidazzle-blue hover:prose-a:text-kidazzle-blue/80 prose-blockquote:border-kidazzle-yellow prose-blockquote:bg-brand-cream prose-blockquote:p-8 prose-blockquote:rounded-3xl prose-img:rounded-3xl transition-all">
				<?php
				while (have_posts()):
					the_post();
					the_content();
				endwhile;
				?>
			</div>

			<!-- Share / Tags -->
			<div class="mt-16 pt-10 border-t border-brand-ink/5 flex flex-col md:flex-row justify-between items-center gap-6">
				<div class="flex gap-2">
					<?php the_tags('<span class="text-[10px] font-bold uppercase tracking-widest text-brand-ink/40 mr-2">Tags:</span> <div class="flex gap-2">', '', '</div>'); ?>
				</div>
				<div class="flex items-center gap-4">
					<span class="text-[10px] font-bold uppercase tracking-widest text-brand-ink/40">Share Story:</span>
					<div class="flex gap-3">
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="w-10 h-10 rounded-full bg-white border border-brand-ink/10 flex items-center justify-center text-brand-ink hover:bg-kidazzle-blue hover:text-white transition-all shadow-sm">
							<i class="fa-brands fa-facebook-f"></i>
						</a>
						<a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="w-10 h-10 rounded-full bg-white border border-brand-ink/10 flex items-center justify-center text-brand-ink hover:bg-black hover:text-white transition-all shadow-sm">
							<i class="fa-brands fa-x-twitter"></i>
						</a>
						<a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" class="w-10 h-10 rounded-full bg-white border border-brand-ink/10 flex items-center justify-center text-brand-ink hover:bg-kidazzle-red hover:text-white transition-all shadow-sm">
							<i class="fa-solid fa-envelope"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</article>

	<?php if ($related_query->have_posts()): ?>
		<section class="bg-white py-24 border-t border-brand-ink/5">
			<div class="max-w-7xl mx-auto px-4 lg:px-6">
				<div class="flex justify-between items-end mb-12">
					<div>
						<span class="text-kidazzle-blue font-bold tracking-[0.2em] text-[10px] uppercase mb-2 block">Read More</span>
						<h3 class="font-serif text-3xl md:text-4xl font-bold text-brand-ink">Continue the Journey</h3>
					</div>
					<a href="<?php echo esc_url(home_url('/stories/')); ?>" class="hidden md:inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-kidazzle-blue hover:gap-4 transition-all pb-1 border-b-2 border-kidazzle-blue/20">
						View All Stories <i class="fa-solid fa-arrow-right"></i>
					</a>
				</div>

				<div class="grid md:grid-cols-3 gap-10">
					<?php while ($related_query->have_posts()):
						$related_query->the_post(); ?>
						<a href="<?php the_permalink(); ?>" class="group">
							<div class="rounded-3xl overflow-hidden mb-6 h-56 shadow-soft border border-brand-ink/5">
								<?php if (has_post_thumbnail()): ?>
									<?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover group-hover:scale-105 transition-transform duration-500')); ?>
								<?php else: ?>
									<div class="w-full h-full bg-kidazzle-blue/5 flex items-center justify-center text-4xl">📚</div>
								<?php endif; ?>
							</div>
							<p class="text-kidazzle-blue font-bold text-[10px] uppercase tracking-widest mb-2">
								<?php 
								$rel_cats = get_the_category();
								echo esc_html($rel_cats[0]->name ?? 'Story');
								?>
							</p>
							<h4 class="font-serif text-xl font-bold leading-tight group-hover:text-kidazzle-blue transition-colors"><?php the_title(); ?></h4>
						</a>
					<?php endwhile;
					wp_reset_postdata(); ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
</main>

<style>
/* Essential typography overrides for post content if tailwind-typography is not fully loaded/customized */
.post-content h2, .post-content h3 {
	font-family: 'Playfair Display', serif !important;
	color: #2F4858 !important; /* blueDark */
	margin-top: 2.5rem !important;
	margin-bottom: 1.25rem !important;
}
.post-content blockquote p {
	font-family: 'Playfair Display', serif !important;
	font-style: italic !important;
	font-size: 1.25rem !important;
	color: #2F4858 !important;
}
/* Dropcap */
.post-content > p:first-of-type::first-letter {
	font-size: 3.5rem;
	font-family: 'Playfair Display', serif;
	font-weight: 700;
	color: #3B82F6; /* kidazzle-blue */
	float: left;
	margin-right: 0.75rem;
	line-height: 1;
	margin-top: 0.25rem;
}
</style>

<?php get_footer(); ?>
