<?php
/**
 * Template Name: Locations Page
 *
 * @package kidazzle_Excellence
 */

get_header();

// Get all locations
$locations_query = new WP_Query(array(
	'post_type' => 'location',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
));
?>

<main id="view-locations" class="block">
	<!-- Hero Section -->
	<section class="relative py-32 text-center overflow-hidden">
		<div class="absolute inset-0 z-0">
			<!-- Hero Image -->
			<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/694486b75b256bd1ddbe6e9d.png"
				alt="Map and community" class="w-full h-full object-cover">
			<div class="absolute inset-0 bg-kidazzle-greenDark/60"></div>
		</div>
		<div class="relative z-10 container mx-auto px-4 text-white">
			<span
				class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10">
				<?php echo $locations_query->found_posts; ?> Locations
			</span>
			<h1 class="text-5xl md:text-6xl font-extrabold mb-6">Our Locations</h1>
			<p class="text-xl md:text-2xl max-w-2xl mx-auto text-green-100 drop-shadow-md">
				Find a KIDazzle center near you in Georgia, Tennessee, or Florida.
			</p>
		</div>
	</section>

	<div class="container mx-auto px-4 py-16">
		<?php if ($locations_query->have_posts()): ?>
			<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
				<?php while ($locations_query->have_posts()):
					$locations_query->the_post();
					$location_id = get_the_ID();
					$city = get_post_meta($location_id, 'location_city', true);
					$address = get_post_meta($location_id, 'location_address', true);
					$features = get_post_meta($location_id, 'location_features', true); // Assumed array or newline string
					$hero_image = get_the_post_thumbnail_url($location_id, 'large') ?: 'https://images.unsplash.com/photo-1588072432836-e10032774350?q=80&w=800&auto=format&fit=crop';
					
					// Parse features
					$features_array = is_array($features) ? $features : array_filter(array_map('trim', explode("\n", (string)$features)));
					?>

					<div
						class="border border-brand-ink/10 rounded-[2rem] overflow-hidden hover:shadow-2xl transition bg-white group flex flex-col">
						<div class="h-48 relative overflow-hidden">
							<img src="<?php echo esc_url($hero_image); ?>"
								class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
								alt="<?php echo esc_attr(get_the_title()); ?>">
							<div class="absolute inset-0 bg-gradient-to-t from-brand-ink/80 to-transparent"></div>
							<?php if ($city): ?>
								<div class="absolute bottom-4 left-6 text-white font-bold text-lg"><?php echo esc_html($city); ?></div>
							<?php endif; ?>
						</div>
						<div class="p-8 flex flex-col flex-grow">
							<h3 class="text-2xl font-bold text-brand-ink mb-2"><?php the_title(); ?></h3>
							
							<?php if ($address): ?>
							<p class="text-slate-500 mb-4 text-sm flex items-start gap-2">
								<i class="fa-solid fa-location-dot w-4 h-4 mt-1 text-kidazzle-red"></i> 
								<?php echo esc_html($address); ?>
							</p>
							<?php endif; ?>

							<div class="text-slate-600 mb-6 flex-grow text-sm leading-relaxed">
								<?php the_excerpt(); ?>
							</div>

							<?php if (!empty($features_array)): ?>
								<div class="flex flex-wrap gap-2 mb-8">
									<?php 
									$colors = ['bg-kidazzle-greenLight text-kidazzle-green', 'bg-kidazzle-blueLight text-kidazzle-blue', 'bg-kidazzle-yellowLight text-kidazzle-yellow'];
									foreach (array_slice($features_array, 0, 3) as $i => $feature): 
										$color_class = $colors[$i % count($colors)];
									?>
										<span class="<?php echo $color_class; ?> text-xs px-3 py-1 rounded-full font-bold uppercase">
											<?php echo esc_html($feature); ?>
										</span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

							<a href="<?php the_permalink(); ?>"
								class="w-full block bg-brand-ink text-white text-center font-bold py-3 rounded-xl hover:bg-kidazzle-green transition shadow-md">
								View Details
							</a>
						</div>
					</div>

				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		<?php else: ?>
			<div class="text-center py-20">
				<p class="text-xl text-brand-ink/60">No locations found.</p>
			</div>
		<?php endif; ?>
	</div>
</main>

<?php
get_footer();
