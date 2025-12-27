<?php
/**
 * The template for displaying Location archives
 *
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();
?>

<!-- Header / Hero Section -->
<div class="relative py-32 text-center overflow-hidden">
	<div class="absolute inset-0 z-0">
		<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/694486b75b256bd1ddbe6e9d.png"
			alt="<?php esc_attr_e('Map and community', 'kidazzle'); ?>" class="w-full h-full object-cover">
		<div class="absolute inset-0 bg-green-900/60"></div>
	</div>
	<div class="relative z-10 container mx-auto px-4 text-white">
		<span
			class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('Our Network', 'kidazzle'); ?></span>
		<h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php post_type_archive_title(); ?></h1>
		<p class="text-xl md:text-2xl max-w-2xl mx-auto text-green-100 drop-shadow-md">
			<?php esc_html_e('Find a KIDazzle center near you in Georgia, Tennessee, or Florida.', 'kidazzle'); ?>
		</p>
	</div>
</div>

<div class="container mx-auto px-4 py-16">
	<?php if (have_posts()): ?>
		<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
			<?php while (have_posts()):
				the_post();
				$city = get_field('kidazzle_location_city') ?: 'Location';
				$address = get_field('kidazzle_location_address') ?: __('Address available on contact', 'kidazzle');
				?>
				<div
					class="border border-slate-200 rounded-[2rem] overflow-hidden hover:shadow-2xl transition bg-white group flex flex-col">
					<div class="h-48 relative overflow-hidden">
						<?php if (has_post_thumbnail()): ?>
							<img src="<?php the_post_thumbnail_url('large'); ?>"
								class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
								alt="<?php the_title_attribute(); ?>">
						<?php else: ?>
							<!-- Fallback Image -->
							<img src="https://images.unsplash.com/photo-1571210862729-78a52d3779a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
								class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
								alt="<?php the_title_attribute(); ?>">
						<?php endif; ?>
						<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
						<div class="absolute bottom-4 left-6 text-white font-bold text-lg">
							<?php echo esc_html($city); ?>
						</div>
					</div>
					<div class="p-8 flex flex-col flex-grow">
						<h3 class="text-2xl font-bold text-slate-900 mb-2"><a href="<?php the_permalink(); ?>"
								class="hover:text-green-600 transition"><?php the_title(); ?></a></h3>
						<p class="text-slate-500 mb-4 text-sm flex items-start gap-2">
							<i data-lucide="map-pin" class="w-4 h-4 mt-1 text-red-400"></i> <?php echo esc_html($address); ?>
						</p>
						<div class="text-slate-600 mb-6 flex-grow text-sm leading-relaxed">
							<?php the_excerpt(); ?>
						</div>

						<?php
						// Tags as badges
						$tags = get_the_tags();
						if ($tags): ?>
							<div class="flex flex-wrap gap-2 mb-8">
								<?php foreach (array_slice($tags, 0, 2) as $tag): ?>
									<span
										class="bg-green-50 text-green-700 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php echo esc_html($tag->name); ?></span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<a href="<?php the_permalink(); ?>"
							class="w-full block bg-slate-900 text-white text-center font-bold py-3 rounded-xl hover:bg-green-600 transition shadow-md"><?php esc_html_e('View Details', 'kidazzle'); ?></a>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

		<!-- Pagination -->
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
			<h2 class="text-2xl font-bold text-slate-700 mb-4"><?php esc_html_e('No locations found.', 'kidazzle'); ?></h2>
			<p class="text-slate-500">
				<?php esc_html_e('Please check back later as we are constantly growing.', 'kidazzle'); ?></p>
		</div>
	<?php endif; ?>
</div>

<?php get_footer(); ?>