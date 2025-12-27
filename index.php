<?php
/**
 * The main template file
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
		<img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
			alt="<?php esc_attr_e('News & Updates', 'kidazzle'); ?>" class="w-full h-full object-cover">
		<div class="absolute inset-0 bg-purple-900/60"></div>
	</div>
	<div class="relative z-10 container mx-auto px-4 text-white">
		<span
			class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('Blog', 'kidazzle'); ?></span>
		<h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php single_post_title(); ?></h1>
		<p class="text-xl md:text-2xl max-w-2xl mx-auto text-purple-100 drop-shadow-md">
			<?php esc_html_e('Latest news, parenting tips, and stories from KIDazzle.', 'kidazzle'); ?></p>
	</div>
</div>

<div class="container mx-auto px-4 py-20">

	<?php if (have_posts()): ?>
		<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
			<?php while (have_posts()):
				the_post(); ?>
				<article
					class="bg-white rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition group flex flex-col border border-slate-100">
					<div class="h-56 overflow-hidden relative">
						<?php if (has_post_thumbnail()): ?>
							<img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>"
								class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110">
						<?php else: ?>
							<div class="absolute inset-0 bg-slate-100 flex items-center justify-center text-slate-300">
								<i data-lucide="image" class="w-12 h-12"></i>
							</div>
						<?php endif; ?>
						<div class="absolute top-4 left-4">
							<?php
							$categories = get_the_category();
							if ($categories): ?>
								<span
									class="bg-white/90 text-slate-900 px-3 py-1 rounded-full text-xs font-bold shadow-sm"><?php echo esc_html($categories[0]->name); ?></span>
							<?php endif; ?>
						</div>
					</div>
					<div class="p-8 flex flex-col flex-grow">
						<div class="text-xs font-bold text-slate-400 mb-2 uppercase tracking-wide"><?php echo get_the_date(); ?>
						</div>
						<h2 class="text-xl font-bold text-slate-900 mb-3 group-hover:text-purple-600 transition"><a
								href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="text-slate-600 text-sm mb-6 flex-grow line-clamp-3">
							<?php the_excerpt(); ?>
						</div>
						<a href="<?php the_permalink(); ?>"
							class="text-purple-600 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
							<?php esc_html_e('Read More', 'kidazzle'); ?> <i data-lucide="arrow-right" class="w-4 h-4"></i>
						</a>
					</div>
				</article>
			<?php endwhile; ?>
		</div>

		<div class="mt-12 flex justify-center">
			<?php
			the_posts_pagination(array(
				'prev_text' => '<i data-lucide="chevron-left" class="w-5 h-5"></i>',
				'next_text' => '<i data-lucide="chevron-right" class="w-5 h-5"></i>',
				'class' => 'flex gap-2'
			));
			?>
		</div>

	<?php else: ?>
		<div class="text-center py-20">
			<h2 class="text-2xl font-bold text-slate-700 mb-4"><?php esc_html_e('No posts found.', 'kidazzle'); ?></h2>
			<p class="text-slate-500"><?php esc_html_e('Check back soon for updates.', 'kidazzle'); ?></p>
		</div>
	<?php endif; ?>

</div>

<?php get_footer(); ?>