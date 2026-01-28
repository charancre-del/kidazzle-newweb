<?php
/**
 * Template Name: Stories Page (Blog)
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
	exit;
}

get_header();

$page_id = get_the_ID();

// Get featured post ID
$featured_post_id = get_post_meta($page_id, 'stories_featured_post', true);

// Get selected category filter
$selected_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';

// Query arguments
$args = array(
	'post_type' => 'post',
	'posts_per_page' => 9,
	'post_status' => 'publish',
	'orderby' => 'date',
	'order' => 'DESC',
);

// Exclude featured post from grid
if ($featured_post_id) {
	$args['post__not_in'] = array($featured_post_id);
}

// Filter by category if selected
if ($selected_category) {
	$args['category_name'] = $selected_category;
}

$posts_query = new WP_Query($args);

// Get all categories for filter buttons
$categories = get_categories(array(
	'orderby' => 'name',
	'order' => 'ASC',
));

// Helper function to get category color
if (!function_exists('kidazzle_get_category_color')) {
	function kidazzle_get_category_color($category_slug)
	{
		$colors = array(
			'parenting' => 'kidazzle-blue',
			'development' => 'kidazzle-green',
			'inside-kidazzle' => 'kidazzle-red',
		);
		return $colors[$category_slug] ?? 'kidazzle-blue';
	}
}
?>

<main id="view-stories" class="view-section active block bg-brand-cream min-h-screen">
	<!-- Hero -->
	<section class="py-20 bg-white text-center border-b border-brand-ink/5">
		<div class="max-w-4xl mx-auto px-4">
			<span class="text-kidazzle-red font-bold tracking-[0.2em] text-xs uppercase mb-3 block">The Blog</span>
			<h1 class="font-serif text-5xl md:text-6xl text-brand-ink mb-6">KIDazzle Stories</h1>
			<p class="text-lg text-brand-ink/90">Parenting tips, classroom spotlights, and insights from our educators.</p>

			<!-- Categories -->
			<div class="flex flex-wrap justify-center gap-2 mt-8">
				<a href="<?php echo esc_url(get_permalink()); ?>"
					class="px-5 py-2.5 rounded-full border border-brand-ink/10 <?php echo empty($selected_category) ? 'bg-brand-ink text-white' : 'bg-white hover:bg-brand-cream text-brand-ink/80'; ?> text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">
					All
				</a>
				<?php foreach ($categories as $category): ?>
					<a href="<?php echo esc_url(add_query_arg('category', $category->slug, get_permalink())); ?>"
						class="px-5 py-2.5 rounded-full border border-brand-ink/10 <?php echo $selected_category === $category->slug ? 'bg-brand-ink text-white' : 'bg-white hover:bg-brand-cream text-brand-ink/80'; ?> text-[10px] font-bold uppercase tracking-widest transition-all shadow-sm">
						<?php echo esc_html($category->name); ?>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php if ($featured_post_id):
		$featured_post = get_post($featured_post_id);
		if ($featured_post):
			setup_postdata($featured_post);
			$featured_categories = get_the_category($featured_post_id);
			$featured_image = get_the_post_thumbnail_url($featured_post_id, 'large') ?: 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=1200&auto=format&fit=crop';
			?>
			<!-- Featured Post -->
			<section class="py-12 px-4 lg:px-6 max-w-7xl mx-auto">
				<a href="<?php echo esc_url(get_permalink($featured_post_id)); ?>" class="block">
					<div class="relative rounded-[3rem] overflow-hidden shadow-soft group cursor-pointer h-[500px] border-4 border-white">
						<img src="<?php echo esc_url($featured_image); ?>"
							class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
							alt="<?php echo esc_attr(get_the_title($featured_post_id)); ?>" />
						<div class="absolute inset-0 bg-gradient-to-t from-brand-ink/90 via-brand-ink/20 to-transparent"></div>
						<div class="absolute bottom-0 left-0 p-8 md:p-12">
							<span
								class="bg-kidazzle-yellow text-brand-ink text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full mb-4 inline-block shadow-sm">Featured Post</span>
							<h2 class="font-serif text-3xl md:text-5xl text-white font-bold mb-4 group-hover:text-kidazzle-yellow transition-colors">
								<?php echo esc_html(get_the_title($featured_post_id)); ?>
							</h2>
							<p class="text-white/80 mb-6 max-w-2xl text-lg">
								<?php echo esc_html(wp_trim_words(get_the_excerpt($featured_post_id), 25)); ?>
							</p>
							<span class="text-white text-[10px] font-bold uppercase tracking-[0.2em] border-b-2 border-white/40 pb-1 group-hover:border-kidazzle-yellow">Read
								Story</span>
						</div>
					</div>
				</a>
			</section>
			<?php
			wp_reset_postdata();
		endif;
	endif;
	?>

	<!-- Grid -->
	<section class="pb-24 px-4 lg:px-6 max-w-7xl mx-auto">
		<?php if ($posts_query->have_posts()): ?>
			<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
				<?php while ($posts_query->have_posts()):
					$posts_query->the_post();
					$post_categories = get_the_category();
					$category_name = !empty($post_categories) ? $post_categories[0]->name : 'Uncategorized';
					$category_slug = !empty($post_categories) ? $post_categories[0]->slug : 'uncategorized';
					$category_color = kidazzle_get_category_color($category_slug);
					$post_image = get_the_post_thumbnail_url(get_the_ID(), 'medium_large') ?: 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?q=80&w=600&auto=format&fit=crop';
					?>
					<!-- Post -->
					<article class="group cursor-pointer">
						<a href="<?php the_permalink(); ?>" class="block">
							<div class="rounded-[2.5rem] overflow-hidden mb-6 h-72 relative shadow-soft border border-brand-ink/5">
								<img src="<?php echo esc_url($post_image); ?>"
									class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
									alt="<?php the_title_attribute(); ?>" />
								<div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-all"></div>
							</div>
							<span class="text-<?php echo esc_attr($category_color); ?> font-bold text-[10px] uppercase tracking-[0.2em]">
								<?php echo esc_html($category_name); ?>
							</span>
							<h3
								class="font-serif text-2xl font-bold text-brand-ink mt-2 mb-3 group-hover:text-kidazzle-blue transition-colors">
								<?php the_title(); ?>
							</h3>
							<p class="text-sm text-brand-ink/70 leading-relaxed">
								<?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?>
							</p>
						</a>
					</article>
				<?php endwhile; ?>
			</div>

		<?php else: ?>
			<div class="text-center py-24 bg-white rounded-[3rem] border border-brand-ink/5">
				<p class="text-brand-ink/60 text-lg">No stories found. Check back soon!</p>
			</div>
		<?php endif; ?>

		<?php wp_reset_postdata(); ?>
	</section>
</main>

<?php get_footer(); ?>
