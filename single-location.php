<?php
/**
 * Single Location Template
 *
 * @package kidazzle_Excellence
 */

get_header();

while (have_posts()):
	the_post();
	$location_fields = kidazzle_get_location_fields();
	$location_id = get_the_ID();
	$location_name = get_the_title();

	// Get location meta
	$phone = $location_fields['phone'];
	$email = $location_fields['email'];
	$address = kidazzle_location_address_line();
	$city = $location_fields['city'];
	$state = $location_fields['state'];
	$zip = $location_fields['zip'];
	$lat = $location_fields['latitude'];
	$lng = $location_fields['longitude'];

	// Additional meta fields (with defaults)
	$hero_subtitle = get_post_meta($location_id, 'location_hero_subtitle', true) ?: "Now Enrolling: Pre-K & Toddlers";
	$hero_gallery_raw = get_post_meta($location_id, 'location_hero_gallery', true);
	$virtual_tour_embed = get_post_meta($location_id, 'location_virtual_tour_embed', true);
	$tagline = get_post_meta($location_id, 'location_tagline', true) ?: "{$city}'s home for brilliant beginnings.";
	$description = get_post_meta($location_id, 'location_description', true) ?: get_the_excerpt();

	// Parse hero gallery URLs (one per line)
	$hero_gallery = array();
	if (!empty($hero_gallery_raw)) {
		$lines = explode("\n", $hero_gallery_raw);
		foreach ($lines as $line) {
			$url = trim($line);
			if (!empty($url) && filter_var($url, FILTER_VALIDATE_URL)) {
				$hero_gallery[] = esc_url($url);
			}
		}
	}
	$google_rating = get_post_meta($location_id, 'location_google_rating', true) ?: '4.9';
	$hours = get_post_meta($location_id, 'location_hours', true) ?: '7am - 6pm';
	$ages_served = get_post_meta($location_id, 'location_ages_served', true) ?: '6w - 12y';

	// Director info
	$director_name = get_post_meta($location_id, 'location_director_name', true);
	$director_bio = get_post_meta($location_id, 'location_director_bio', true);
	$director_photo = get_post_meta($location_id, 'location_director_photo', true);
	$director_signature = get_post_meta($location_id, 'location_director_signature', true);

	// Maps embed
	$maps_embed = get_post_meta($location_id, 'location_maps_embed', true);

	// Tour booking link
	$tour_booking_link = get_post_meta($location_id, 'location_tour_booking_link', true);

	// School pickups
	$school_pickups = get_post_meta($location_id, 'location_school_pickups', true);

	// SEO content
	$seo_content_title = get_post_meta($location_id, 'location_seo_content_title', true);
	$seo_content_text = get_post_meta($location_id, 'location_seo_content_text', true);

	// Get programs at this location
	$programs_query = new WP_Query(array(
		'post_type' => 'program',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'meta_query' => array(
			array(
				'key' => 'program_locations',
				'value' => '(^|;)i:' . intval($location_id) . ';',
				'compare' => 'REGEXP',
			),
		),
	));

	// Get Region Colors
	$location_regions = wp_get_post_terms($location_id, 'location_region');
	$region_term = !empty($location_regions) && !is_wp_error($location_regions) ? $location_regions[0] : null;
	$region_colors = $region_term ? kidazzle_get_region_color_from_term($region_term->term_id) : array(
		'bg' => 'kidazzle-blueLight',
		'text' => 'kidazzle-blue',
		'border' => 'kidazzle-blue',
	);
	?>

	<main class="bg-slate-50">
		<!-- HERO SECTION -->
		<div class="bg-slate-900 py-24 text-white relative overflow-hidden">
			<div class="absolute inset-0 z-0">
				<!-- Hero Image -->
				<?php if (has_post_thumbnail()): ?>
					<?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover opacity-20')); ?>
				<?php else: ?>
					<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/694489509b0de40cdd3adafb.png" alt="West End Center" class="w-full h-full object-cover opacity-20">
				<?php endif; ?>
			</div>
			<div class="container mx-auto px-4 text-center relative z-10">
				<?php if ($city): ?>
					<span class="bg-white/20 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide mb-6 inline-block backdrop-blur-sm border border-white/10"><?php echo esc_html($city); ?></span>
				<?php endif; ?>
				<h1 class="text-5xl md:text-6xl font-extrabold mb-4"><?php the_title(); ?></h1>
				<?php if ($tagline): ?>
					<p class="text-xl max-w-2xl mx-auto text-slate-300"><?php echo esc_html($tagline); ?></p>
				<?php endif; ?>
			</div>
		</div>

		<div class="container mx-auto px-4 py-16">
			<div class="grid lg:grid-cols-3 gap-12">
				<div class="lg:col-span-2 space-y-12">
				   
					<!-- About / Content (Top) -->
					<section>
						<h2 class="text-3xl font-bold text-slate-900 mb-6">About This Center</h2>
						<div class="text-slate-600 leading-relaxed text-lg mb-8">
							<?php the_content(); ?>
						</div>
					   
						<?php 
						$features = get_post_meta($location_id, 'location_features', true);
						$features_array = is_array($features) ? $features : array_filter(array_map('trim', explode("\n", (string)$features)));
						
						if (!empty($features_array)): 
						?>
						<div class="grid md:grid-cols-3 gap-4 mb-8">
							<?php 
							$icons = ['fa-solid fa-palette', 'fa-solid fa-landmark', 'fa-solid fa-graduation-cap'];
							$colors = ['text-purple-500', 'text-orange-500', 'text-green-500'];
							
							foreach (array_slice($features_array, 0, 3) as $i => $feature): 
								$icon = $icons[$i % count($icons)];
								$color = $colors[$i % count($colors)];
							?>
							<div class="bg-white p-6 rounded-2xl border border-slate-200 text-center hover:bg-slate-50 transition group cursor-pointer shadow-sm">
								<i class="<?php echo $icon; ?> text-3xl mx-auto mb-3 <?php echo $color; ?>"></i>
								<h4 class="font-bold text-slate-900"><?php echo esc_html($feature); ?></h4>
							</div>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					</section>

					<!-- Calendar (Middle) -->
					<div id="tour" class="bg-white p-8 rounded-[2rem] shadow-xl border-t-8 border-yellow-400">
						<h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
							<i class="fa-solid fa-calendar-day text-yellow-500"></i> Book a Tour
						</h3>
						<div class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] min-h-[600px] flex items-center justify-center relative p-2 overflow-hidden">
							<?php if ($tour_booking_link): ?>
								<!-- If explicitly a link/embed URL is provided -->
								<iframe src="<?php echo esc_url($tour_booking_link); ?>" style="width: 100%; height: 100%; min-height: 800px; border:none;" id="msgsndr-calendar"></iframe>
							<?php else: ?>
								<!-- Fallback to Shortcode Form -->
								<div class="w-full">
									<?php echo do_shortcode('[kidazzle_tour_form location_id="' . $location_id . '"]'); ?>
								</div>
							<?php endif; ?>
						</div>
					</div>

					<!-- Map (Bottom) -->
					<section class="bg-slate-100 rounded-[2rem] h-96 flex items-center justify-center text-slate-400 border-2 border-slate-200 overflow-hidden relative">
						<?php if ($maps_embed): ?>
							<?php echo $maps_embed; ?>
						<?php elseif ($lat && $lng): ?>
							<div data-kidazzle-map
								data-kidazzle-locations='[{"lat":<?php echo esc_attr($lat); ?>,"lng":<?php echo esc_attr($lng); ?>,"name":"<?php echo esc_js(get_the_title()); ?>","city":"<?php echo esc_js($city); ?>","url":"<?php echo esc_url(get_permalink()); ?>"}]'
								class="w-full h-full"></div>
						<?php else: ?>
							<p class="font-mono text-sm">Map Unavailable</p>
						<?php endif; ?>
					</section>

					<?php if ($virtual_tour_embed): ?>
						<!-- Virtual Tour Section -->
						<div class="bg-white p-8 rounded-[2rem] shadow-xl border-t-8 border-kidazzle-blue">
							<h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
								<i class="fa-solid fa-vr-cardboard text-kidazzle-blue"></i> Virtual Tour
							</h3>
							<div class="relative aspect-video rounded-3xl overflow-hidden border-2 border-slate-100 shadow-inner">
								<?php 
								// Allow iframe and script for virtual tours
								echo wp_kses($virtual_tour_embed, array(
									'iframe' => array(
										'src' => true,
										'width' => true,
										'height' => true,
										'frameborder' => true,
										'allowfullscreen' => true,
										'style' => true,
										'id' => true,
									),
									'script' => array(
										'src' => true,
										'type' => true,
									),
									'div' => array(
										'class' => true,
										'id' => true,
										'style' => true,
									)
								)); 
								?>
							</div>
						</div>
					<?php endif; ?>
				</div>
			   
				<!-- Sidebar -->
				<div class="space-y-8">
				<div class="bg-slate-900 p-8 rounded-[2rem] text-white shadow-xl">
						<h3 class="text-xl font-bold mb-6">Contact Info</h3>
						<div class="space-y-6 text-base">
							<?php if ($address): ?>
							<div class="flex items-start gap-4">
								<i class="fa-solid fa-location-dot text-red-400 mt-1 shrink-0"></i> 
								<span><?php echo esc_html($address); ?><br><?php echo esc_html("$city, $state $zip"); ?></span>
							</div>
							<?php endif; ?>
							
							<?php if ($phone): ?>
							<div class="flex items-center gap-4">
								<i class="fa-solid fa-phone text-green-400 shrink-0"></i> 
								<a href="tel:<?php echo esc_attr(preg_replace('/[^0-9]/', '', $phone)); ?>" class="font-bold hover:text-green-300 transition"><?php echo esc_html($phone); ?></a>
							</div>
							<?php endif; ?>
							
							<?php if ($email): ?>
							<div class="flex items-center gap-4">
								<i class="fa-solid fa-envelope text-cyan-400 shrink-0"></i> 
								<a href="mailto:<?php echo esc_attr($email); ?>" class="hover:text-cyan-300 transition break-all"><?php echo esc_html($email); ?></a>
							</div>
							<?php endif; ?>

							<?php if ($location_fields['hours']): ?>
							<div class="flex items-start gap-4">
								<i class="fa-solid fa-clock text-yellow-400 mt-1 shrink-0"></i> 
								<span><?php echo esc_html($location_fields['hours']); ?></span>
							</div>
							<?php endif; ?>
						</div>
					</div>
					
					<!-- 123 Form / Questions for this location -->
					<div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200">
						<h3 class="text-xl font-bold text-slate-900 mb-4">Have Questions?</h3>
						<div class="bg-slate-50 border-dashed border-2 border-slate-300 rounded-xl p-4 text-center text-xs text-slate-400">
							<p class="mb-2">Contact our team directly.</p>
							<a href="mailto:<?php echo esc_attr($email); ?>" class="inline-block bg-slate-200 hover:bg-slate-300 text-slate-700 px-4 py-2 rounded-lg font-bold transition">Email Directors</a>
						</div>
					</div>
				</div>
			</div>

			<?php if ($director_name || $director_bio): ?>
				<!-- Director's Welcome -->
				<section class="mt-24 bg-white rounded-[3rem] p-12 shadow-soft border border-brand-ink/5">
					<div class="grid md:grid-cols-2 gap-16 items-center">
						<div class="relative">
							<div class="absolute inset-0 bg-kidazzle-yellow/10 rounded-[3rem] -rotate-3 transform translate-x-4 translate-y-4"></div>
							<div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white aspect-[4/5]">
								<?php if ($director_photo): ?>
									<img src="<?php echo esc_url($director_photo); ?>" alt="<?php echo esc_attr($director_name); ?>" class="w-full h-full object-cover">
								<?php else: ?>
									<div class="w-full h-full bg-slate-100 flex items-center justify-center">
										<i class="fa-solid fa-user-tie text-6xl text-slate-300"></i>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<div>
							<span class="text-kidazzle-yellow font-bold tracking-[0.2em] text-[10px] uppercase mb-3 block">Campus Leadership</span>
							<h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink mb-6">A Welcome from Our Director</h2>
							<div class="prose prose-slate text-brand-ink/80 text-lg leading-relaxed mb-8">
								<?php echo wp_kses_post(wpautop($director_bio)); ?>
							</div>
							<div class="flex items-center gap-6">
								<?php if ($director_signature): ?>
									<img src="<?php echo esc_url($director_signature); ?>" alt="Director Signature" class="h-16 w-auto opacity-70">
								<?php endif; ?>
								<div>
									<p class="font-bold text-brand-ink"><?php echo esc_html($director_name); ?></p>
									<p class="text-xs text-brand-ink/60 uppercase tracking-widest leading-none">Center Director</p>
								</div>
							</div>
						</div>
					</div>
				</section>
			<?php endif; ?>

			<?php if ($programs_query->have_posts()): ?>
				<!-- Programs at this location -->
				<section class="mt-24">
					<div class="text-center mb-16">
						<span class="text-kidazzle-red font-bold tracking-[0.2em] text-[10px] uppercase mb-3 block">Our Programs</span>
						<h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink">Programs at this Center</h2>
					</div>
					<div class="grid md:grid-cols-3 gap-8">
						<?php while ($programs_query->have_posts()): $programs_query->the_post(); ?>
							<a href="<?php the_permalink(); ?>" class="bg-white p-8 rounded-[2rem] border border-brand-ink/5 hover:border-kidazzle-red/30 transition-all group shadow-sm hover:shadow-xl">
								<div class="w-14 h-14 bg-kidazzle-red/10 text-kidazzle-red rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition-transform">
									<i class="fa-solid fa-graduation-cap"></i>
								</div>
								<h3 class="font-bold text-xl text-brand-ink mb-3 group-hover:text-kidazzle-red transition-colors"><?php the_title(); ?></h3>
								<p class="text-sm text-brand-ink/70 leading-relaxed mb-6"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
								<span class="text-xs font-bold text-kidazzle-red uppercase tracking-widest flex items-center gap-2">Learn More <i class="fa-solid fa-arrow-right text-[10px]"></i></span>
							</a>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</section>
			<?php endif; ?>
		</div>

		<?php if ($seo_content_title || $seo_content_text): ?>
			<!-- Location SEO Content Section -->
			<section class="py-24 bg-brand-cream relative">
				<div class="max-w-4xl mx-auto px-4 lg:px-6 text-center">
					<?php if ($seo_content_title): ?>
						<h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-ink mb-6">
							<?php echo esc_html($seo_content_title); ?>
						</h2>
					<?php endif; ?>

					<?php if ($seo_content_text): ?>
						<div class="text-lg text-brand-ink/90 leading-relaxed max-w-3xl mx-auto">
							<?php echo wp_kses_post(wpautop($seo_content_text)); ?>
						</div>
					<?php endif; ?>
				</div>
			</section>
		<?php endif; ?>

	</main>

	<?php
endwhile;
get_footer();
