<?php
/**
 * Locations Archive
 * Displays all locations with search, filtering, and interactive features
 *
 * @package kidazzle_Excellence
 */

get_header();

// Get all location regions from taxonomy
$all_regions = get_terms(array(
	'taxonomy' => 'location_region',
	'hide_empty' => true,
));

// Get all published locations
$locations_query = new WP_Query(array(
	'post_type' => 'location',
	'posts_per_page' => -1,
	'post_status' => 'publish',
	'orderby' => 'title',
	'order' => 'ASC',
));


?>

<main>
	<!-- Hero Section -->
	<section class="relative pt-16 pb-12 lg:pt-24 lg:pb-20 bg-white overflow-hidden">
		<!-- Decor -->
		<div
			class="absolute top-0 left-0 w-full h-full bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-kidazzle-greenLight/40 via-transparent to-transparent">
		</div>

		<div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10 text-center">
			<div
				class="inline-flex items-center gap-2 bg-white border border-kidazzle-green/30 px-4 py-1.5 rounded-full text-[11px] uppercase tracking-[0.2em] font-bold text-kidazzle-green shadow-sm mb-6 fade-in-up">
				<i class="fa-solid fa-map-pin"></i> <?php echo $locations_query->found_posts; ?>+
				<?php _e('Campuses', 'kidazzle-theme'); ?>
			</div>

			<h1 class="font-serif text-[2.8rem] md:text-6xl text-brand-ink mb-6 fade-in-up"
				style="animation-delay: 0.1s;">
				<?php echo wp_kses_post(get_theme_mod('kidazzle_locations_archive_title', __('Find your <span class="text-kidazzle-green italic">KIDazzle Community</span> - Our Locations', 'kidazzle-theme'))); ?>
			</h1>

			<p class="text-lg text-brand-ink/90 max-w-2xl mx-auto mb-10 fade-in-up" style="animation-delay: 0.2s;">
				<?php echo has_excerpt() ? get_the_excerpt() : esc_html(get_theme_mod('kidazzle_locations_archive_subtitle', __('Serving families across Metro Atlanta with the same high standards of safety, curriculum, and care at every single location.', 'kidazzle-theme'))); ?>
			</p>

			<!-- Filter Bar -->
			<div class="max-w-7xl mx-auto bg-white p-2 rounded-full shadow-float border border-brand-ink/5 flex flex-col lg:flex-row gap-2 fade-in-up"
				style="animation-delay: 0.3s;">
				<div class="relative flex-grow max-w-md">
					<i class="fa-solid fa-search absolute left-5 top-1/2 -translate-y-1/2 text-brand-ink"></i>
					<input type="text" id="location-search"
						placeholder="<?php esc_attr_e('Search by ZIP code or city name...', 'kidazzle-theme'); ?>"
						class="w-full pl-12 pr-4 py-3 rounded-full focus:outline-none text-brand-ink bg-white" />
				</div>
				<div class="flex gap-2 justify-start lg:justify-end flex-wrap flex-grow items-center">
					<button onclick="filterLocations('all')" data-region="all" data-color-bg="kidazzle-green"
						data-color-text="white"
						class="filter-btn px-6 py-3 rounded-full font-semibold bg-kidazzle-green text-white hover:shadow-glow transition-all duration-300 whitespace-nowrap">
						<?php echo esc_html(get_theme_mod('kidazzle_locations_label', __('All Locations', 'kidazzle-theme'))); ?>
					</button>
					<?php foreach ($all_regions as $region):
						$colors = kidazzle_get_region_color_from_term($region->term_id);
						$btn_bg = $colors['text'];
						?>
						<button onclick="filterLocations('<?php echo esc_attr($region->slug); ?>')"
							data-region="<?php echo esc_attr($region->slug); ?>"
							data-color-bg="<?php echo esc_attr($btn_bg); ?>" data-color-text="white"
							class="filter-btn px-6 py-3 rounded-full font-semibold bg-white text-brand-ink border border-brand-ink/10 hover:bg-brand-ink/5 transition-all duration-300 whitespace-nowrap">
							<?php echo esc_html($region->name); ?>
						</button>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>

	<!-- Locations Container -->
	<section class="py-16 lg:py-20 bg-white">
		<div class="max-w-7xl mx-auto px-4 lg:px-6">
			<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="locations-grid">
				<?php
				if ($locations_query->have_posts()):
					while ($locations_query->have_posts()):
						$locations_query->the_post();
						$location_id = get_the_ID();
						$location_fields = kidazzle_get_location_fields($location_id);
						$location_name = get_the_title();

						// Get location meta
						$city = $location_fields['city'];
						$state = $location_fields['state'];
						$zip = $location_fields['zip'];
						$address = kidazzle_location_address_line($location_id);
						$phone = $location_fields['phone'];
						$lat = $location_fields['latitude'];
						$lng = $location_fields['longitude'];

						// Get region from taxonomy
						$location_regions = wp_get_post_terms($location_id, 'location_region');
						$region_term = !empty($location_regions) && !is_wp_error($location_regions) ? $location_regions[0] : null;

						// Get region name and slug for display and filtering
						$region_name = $region_term ? $region_term->name : __('Metro Atlanta', 'kidazzle-theme');
						$region_slug = $region_term ? $region_term->slug : 'uncategorized';

						// Cycle Colors for variety
						$brand_colors = [
							['bg' => 'kidazzle-red', 'text' => 'kidazzle-red', 'border' => 'kidazzle-red'],
							['bg' => 'kidazzle-orange', 'text' => 'kidazzle-orange', 'border' => 'kidazzle-orange'],
							['bg' => 'kidazzle-yellow', 'text' => 'kidazzle-yellow', 'border' => 'kidazzle-yellow'],
							['bg' => 'kidazzle-green', 'text' => 'kidazzle-green', 'border' => 'kidazzle-green'],
							['bg' => 'kidazzle-blue', 'text' => 'kidazzle-blue', 'border' => 'kidazzle-blue'],
						];
						// Use global counter or static to rotate if not loop index available easily?
						// WP_Query has current_post index.
						$color_idx = $locations_query->current_post % count($brand_colors);
						$colors = $brand_colors[$color_idx];

						// Check for special badges
						$is_featured = get_post_meta($location_id, 'location_featured', true);
						$is_new = get_post_meta($location_id, 'location_new', true);
						$is_enrolling = get_post_meta($location_id, 'location_enrolling', true);

						// Dynamic Open Status
						$hours_string = get_post_meta($location_id, 'location_hours', true);
						$is_open = kidazzle_is_location_open($hours_string);

						// Badge Text Logic
						$hero_subtitle = get_post_meta($location_id, 'location_hero_subtitle', true);
						if (!empty($hero_subtitle)) {
							$badge_text = $hero_subtitle;
						} elseif ($is_new) {
							$badge_text = __('New Campus', 'kidazzle-theme');
						} else {
							$badge_text = get_theme_mod('kidazzle_locations_badge_fallback', __('Now Enrolling', 'kidazzle-theme'));
						}

						// Get age ranges/programs
						$ages_served = get_post_meta($location_id, 'location_ages_served', true) ?: __('Infant - 12y', 'kidazzle-theme');
						$special_programs_raw = get_post_meta($location_id, 'location_special_programs', true);

						if ($special_programs_raw) {
							// Explode comma-separated string
							$special_programs = array_map('trim', explode(',', $special_programs_raw));
						} else {
							$special_programs = array('GA Pre-K'); // Default fallback
						}
						?>

						<div class="location-card group" data-region="<?php echo esc_attr($region_slug); ?>"
							data-name="<?php echo esc_attr($location_name . ' ' . $city . ' ' . $zip); ?>">
							<div
								class="bg-white rounded-[2rem] p-6 shadow-card border border-<?php echo esc_attr($is_featured ? $colors['border'] . ' border-opacity-50' : 'brand-ink/5'); ?> hover:border-<?php echo esc_attr($colors['border']); ?>/30 transition-all hover:-translate-y-1 h-full flex flex-col relative overflow-hidden">

								<!-- Overlay Link for entire card -->
								<a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10"
									aria-label="<?php printf(esc_attr__('View %s', 'kidazzle-theme'), esc_attr($location_name)); ?>"></a>

								<div
									class="absolute top-0 right-0 bg-<?php echo esc_attr($is_new ? $colors['text'] : $colors['border']); ?> text-<?php echo esc_attr($is_new ? 'brand-ink' : 'white'); ?> text-[10px] font-bold uppercase px-4 py-1 rounded-bl-xl tracking-wider">
									<?php echo esc_html($badge_text); ?>
								</div>

								<div class="flex justify-between items-start mb-4 mt-2">
									<span
										class="bg-<?php echo esc_attr($colors['bg']); ?> text-<?php echo esc_attr($colors['text']); ?> px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wide">
										<?php echo esc_html($region_name); ?>
									</span>
									<?php if ($is_open): ?>
										<div class="flex items-center gap-1.5"
											title="<?php esc_attr_e('Open Now', 'kidazzle-theme'); ?>">
											<div class="w-2 h-2 rounded-full bg-kidazzle-green animate-pulse"></div>
											<span
												class="text-[10px] font-bold text-kidazzle-green uppercase tracking-wide"><?php echo esc_html(get_theme_mod('kidazzle_locations_open_text', __('Open Now', 'kidazzle-theme'))); ?></span>
										</div>
									<?php endif; ?>
								</div>

								<h2
									class="font-serif text-2xl font-bold text-brand-ink mb-2 group-hover:text-<?php echo esc_attr($colors['text']); ?> transition-colors">
									<?php echo esc_html($location_name); ?>
								</h2>

								<p class="text-sm text-brand-ink/90 mb-4 flex-grow">
									<?php echo esc_html($address); ?><br>
									<?php echo esc_html("$city, $state $zip"); ?>
								</p>

								<div
									class="flex flex-wrap gap-2 mb-6 text-[10px] font-bold uppercase tracking-wider text-brand-ink">
									<span
										class="border border-brand-ink/10 px-2 py-1 rounded-md"><?php echo esc_html($ages_served); ?></span>
									<?php foreach (array_slice($special_programs, 0, 2) as $program): ?>
										<span
											class="border border-brand-ink/10 px-2 py-1 rounded-md"><?php echo esc_html($program); ?></span>
									<?php endforeach; ?>
								</div>

								<?php
								$booking_link = get_post_meta($location_id, 'location_tour_booking_link', true);
								?>
								<div class="grid grid-cols-2 gap-3 mt-auto relative z-20">
									<a href="<?php the_permalink(); ?>"
										class="flex items-center justify-center py-3 rounded-xl bg-brand-ink/5 text-brand-ink text-xs font-bold uppercase tracking-wider hover:bg-brand-ink hover:text-white transition-colors">
												<?php _e('View Campus', 'kidazzle-theme'); ?>
									</a>
											<?php if ($booking_link): ?>
										<a href="<?php echo esc_url($booking_link); ?>"
											class="booking-btn flex items-center justify-center py-3 rounded-xl border border-<?php echo esc_attr($colors['border']); ?> text-<?php echo esc_attr($colors['text']); ?> text-xs font-bold uppercase tracking-wider hover:bg-<?php echo esc_attr($colors['text']); ?> hover:text-white transition-colors">
														<?php _e('Book Tour', 'kidazzle-theme'); ?>
										</a>
											<?php else: ?>
										<a href="<?php the_permalink(); ?>#contact"
											class="flex items-center justify-center py-3 rounded-xl border border-<?php echo esc_attr($colors['border']); ?> text-<?php echo esc_attr($colors['text']); ?> text-xs font-bold uppercase tracking-wider hover:bg-<?php echo esc_attr($colors['text']); ?> hover:text-white transition-colors">
														<?php _e('Contact Us', 'kidazzle-theme'); ?>
										</a>
									<?php endif; ?>
								</div>
							</div>
						</div>

					<?php endwhile;
					wp_reset_postdata();
				endif;
				?>
			</div>
		</div>
	</section>

	<!-- Map & CTA Section -->
	<section class="bg-white py-20 border-t border-brand-ink/5">
		<div class="max-w-7xl mx-auto px-4 lg:px-6">
			<div
				class="bg-kidazzle-blueDark rounded-[3rem] p-10 lg:p-16 text-white relative overflow-hidden flex flex-col lg:flex-row gap-12 items-center">

				<!-- Locations Gallery Preview -->
				<div class="w-full lg:w-1/2 relative z-10">
					<div class="bg-white/10 rounded-[2rem] p-4 border border-white/20 relative overflow-hidden backdrop-blur-sm">
						<div class="grid grid-cols-2 md:grid-cols-3 gap-3">
							<?php 
							// Rewind loop or re-query for visual preview
							$gallery_query = new WP_Query(array(
								'post_type' => 'location',
								'posts_per_page' => 6,
								'orderby' => 'rand', // Randomize for variety
							));

							if ($gallery_query->have_posts()):
								while ($gallery_query->have_posts()): $gallery_query->the_post();
									$thumb = get_the_post_thumbnail_url(get_the_ID(), 'medium') ?: 'https://images.unsplash.com/photo-1571210862729-78a52d3779a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80';
							?>
							<a href="<?php the_permalink(); ?>" class="group relative aspect-square rounded-xl overflow-hidden block border border-white/10 hover:border-white/50 transition-all transform hover:scale-105" title="<?php the_title_attribute(); ?>">
								<img src="<?php echo esc_url($thumb); ?>" alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover">
								<div class="absolute inset-0 bg-brand-ink/20 group-hover:bg-transparent transition-colors"></div>
							</a>
							<?php 
								endwhile; 
								wp_reset_postdata();
							endif; 
							?>
						</div>
						
						<?php if ($locations_query->found_posts > 6): ?>
						<p class="mt-4 text-center text-[10px] font-bold tracking-widest uppercase text-white/80">
							+ <?php echo ($locations_query->found_posts - 6); ?> <?php _e('More Locations', 'kidazzle-theme'); ?>
						</p>
						<?php endif; ?>
					</div>
				</div>

				<!-- CTA Content -->
				<div class="w-full lg:w-1/2 relative z-10">
					<h2 class="font-serif text-3xl md:text-5xl font-bold mb-6">
						<?php _e('Not sure which campus is right for you?', 'kidazzle-theme'); ?>
					</h2>
					<p class="text-white/90 text-lg mb-8">
						<?php _e('Our enrollment specialists can help you find the nearest location with openings for your child\'s age group.', 'kidazzle-theme'); ?>
					</p>
					<div class="flex flex-wrap gap-4">
						<a href="<?php echo esc_url(home_url('/contact')); ?>"
							class="px-8 py-4 bg-kidazzle-yellow text-brand-ink font-bold rounded-full uppercase tracking-[0.2em] text-xs hover:bg-white transition-colors">
							<?php _e('Contact Support', 'kidazzle-theme'); ?>
						</a>
						<a href="<?php echo esc_url(home_url()); ?>"
							class="px-8 py-4 border border-white/20 text-white font-bold rounded-full uppercase tracking-[0.2em] text-xs hover:bg-white/10 transition-colors">
							<?php _e('Back to Home', 'kidazzle-theme'); ?>
						</a>
					</div>
				</div>

				<!-- Decor -->
				<div class="absolute -right-20 -bottom-40 w-96 h-96 bg-kidazzle-blue rounded-full blur-3xl opacity-50">
				</div>
			</div>
		</div>
	</section>
</main>

<!-- Filter Logic -->
<script>
	function filterLocations(region) {
		const cards = document.querySelectorAll('.location-card');
		const buttons = document.querySelectorAll('.filter-btn');
		const searchInput = document.getElementById('location-search');
		const noResults = document.getElementById('no-results');
		let visibleCount = 0;

		// Reset search input visual if filtering by button
		if (region) searchInput.value = '';

		// Update button styles
		buttons.forEach(btn => {
			const activeBg = btn.dataset.colorBg || 'kidazzle-green';
			const activeText = btn.dataset.colorText || 'white';

			if (region === btn.dataset.region) {
				// Active State: Use dynamic color
				btn.classList.remove('bg-white', 'text-brand-ink', 'border', 'border-brand-ink/10');
				btn.classList.add('bg-' + activeBg, 'text-' + activeText, 'shadow-glow');

				// If using a Tailwind class that needs compilation, ensure it's safelisted.
				// For direct style manipulation (if classes aren't working):
				// btn.style.backgroundColor = ''; // Rely on class
			} else {
				// Inactive State
				btn.classList.add('bg-white', 'text-brand-ink', 'border', 'border-brand-ink/10');
				btn.classList.remove('bg-' + activeBg, 'text-' + activeText, 'shadow-glow');

				// Clean up any potential leftover dynamic classes from previous active states
				// (This simple removal might miss if we switch from one color to another, 
				// but since we re-add the white/ink classes, it should override or cascade correctly 
				// IF the dynamic classes are removed. To be safe, we should remove ALL potential dynamic classes.
				// However, since we don't know them all, we rely on the 'bg-white' overriding or 
				// simply removing the specific one we added.)

				// Better approach: Remove ALL bg-* classes that aren't bg-white? 
				// No, that's too aggressive.
				// We just remove the specific one this button WOULD have if it were active.
				btn.classList.remove('bg-' + activeBg, 'text-' + activeText);
			}
		});

		cards.forEach(card => {
			if (region === 'all' || card.dataset.region.includes(region)) {
				card.style.display = 'block';
				card.classList.add('fade-in-up');
				visibleCount++;
			} else {
				card.style.display = 'none';
			}
		});

		if (noResults) noResults.style.display = visibleCount === 0 ? 'block' : 'none';
	}

	// Search Filter Logic
	document.getElementById('location-search').addEventListener('keyup', function (e) {
		const term = e.target.value.toLowerCase();
		const cards = document.querySelectorAll('.location-card');
		const buttons = document.querySelectorAll('.filter-btn');
		const noResults = document.getElementById('no-results');
		let visibleCount = 0;

		// Reset buttons to inactive state
		buttons.forEach(btn => {
			const activeBg = btn.dataset.colorBg || 'kidazzle-green';
			const activeText = btn.dataset.colorText || 'white';

			btn.classList.add('bg-white', 'text-brand-ink', 'border', 'border-brand-ink/10');
			btn.classList.remove('bg-' + activeBg, 'text-' + activeText, 'shadow-glow');
		});

		cards.forEach(card => {
			const text = card.dataset.name.toLowerCase();
			if (text.includes(term)) {
				card.style.display = 'block';
				visibleCount++;
			} else {
				card.style.display = 'none';
			}
		});


		if (noResults) noResults.style.display = visibleCount === 0 ? 'block' : 'none';
	});
</script>

<!-- Tour Booking Modal -->
<div id="kidazzle-tour-modal" class="fixed inset-0 z-[100] hidden" role="dialog" aria-modal="true">
	<!-- Backdrop -->
	<div class="absolute inset-0 bg-brand-ink/80 backdrop-blur-sm transition-opacity" id="kidazzle-tour-backdrop">
	</div>

	<!-- Modal Container -->
	<div
		class="absolute inset-4 md:inset-10 bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col animate-fade-in-up">
		<!-- Header -->
		<div
			class="bg-brand-cream border-b border-brand-ink/5 px-6 py-4 flex items-center justify-between flex-shrink-0">
			<h3 class="font-serif text-xl font-bold text-brand-ink">Schedule Your Visit</h3>
			<div class="flex items-center gap-4">
				<a href="#" id="kidazzle-tour-external" target="_blank"
					class="text-xs font-bold uppercase tracking-wider text-brand-ink/70 hover:text-kidazzle-blue transition-colors hidden md:block">
					Open in new tab <i class="fa-solid fa-external-link-alt ml-1"></i>
				</a>
				<button id="kidazzle-tour-close"
					class="w-10 h-10 rounded-full bg-white border border-brand-ink/10 flex items-center justify-center text-brand-ink hover:bg-kidazzle-red hover:text-white hover:border-kidazzle-red transition-all">
					<i class="fa-solid fa-xmark text-lg"></i>
				</button>
			</div>
		</div>

		<!-- Iframe Container -->
		<div class="flex-grow relative bg-white">
			<div id="kidazzle-tour-loader" class="absolute inset-0 flex items-center justify-center bg-white z-10">
				<div
					class="w-12 h-12 border-4 border-kidazzle-blue/20 border-t-kidazzle-blue rounded-full animate-spin">
				</div>
			</div>
			<iframe id="kidazzle-tour-frame" src="" class="w-full h-full border-0"
				allow="camera; microphone; autoplay; encrypted-media;"></iframe>
		</div>
	</div>
</div>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const modal = document.getElementById('kidazzle-tour-modal');
		const backdrop = document.getElementById('kidazzle-tour-backdrop');
		const closeBtn = document.getElementById('kidazzle-tour-close');
		const iframe = document.getElementById('kidazzle-tour-frame');
		const externalLink = document.getElementById('kidazzle-tour-external');
		const loader = document.getElementById('kidazzle-tour-loader');

		function openModal(url) {
			modal.classList.remove('hidden');
			document.body.style.overflow = 'hidden';
			loader.classList.remove('hidden');
			iframe.src = url;
			externalLink.href = url;
			iframe.onload = function () {
				loader.classList.add('hidden');
			};
		}

		function closeModal() {
			modal.classList.add('hidden');
			document.body.style.overflow = '';
			iframe.src = '';
		}

		// Attach listeners to booking buttons
		const bookingBtns = document.querySelectorAll('.booking-btn');
		bookingBtns.forEach(btn => {
			btn.addEventListener('click', function (e) {
				const url = this.getAttribute('href');
				if (url && url.startsWith('http')) {
					e.preventDefault();
					openModal(url);
				}
			});
		});

		// Close actions
		if (closeBtn) closeBtn.addEventListener('click', closeModal);
		if (backdrop) backdrop.addEventListener('click', closeModal);
		document.addEventListener('keydown', function (e) {
			if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
				closeModal();
			}
		});
	});
</script>

<?php
get_footer();
