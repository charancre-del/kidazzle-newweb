<?php
/**
 * Template Name: Locations Page
 * Locations landing page
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

<!-- Header / Hero Section -->
<div class="relative py-32 text-center overflow-hidden">
	<div class="absolute inset-0 z-0">
		<!-- Hero Image: Map/Community Concept -->
		<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/694486b75b256bd1ddbe6e9d.png"
			alt="<?php esc_attr_e('Map and community', 'kidazzle'); ?>" class="w-full h-full object-cover">
		<div class="absolute inset-0 bg-green-900/60"></div>
	</div>
	<div class="relative z-10 container mx-auto px-4 text-white">
		<span
			class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('7 Locations', 'kidazzle'); ?></span>
		<h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php esc_html_e('Our Locations', 'kidazzle'); ?></h1>
		<p class="text-xl md:text-2xl max-w-2xl mx-auto text-green-100 drop-shadow-md">
			<?php esc_html_e('Find a KIDazzle center near you in Georgia, Tennessee, or Florida.', 'kidazzle'); ?></p>
	</div>
</div>

<div class="container mx-auto px-4 py-16">
	<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

		<?php
		// Note: This section currently uses static HTML to preserve the exact design provided.
		// In a future update, this can be converted to a WP_Query loop using the 'location' Post Type 
		// and mapping ACF fields to the status badges.
		?>

		<!-- West End -->
		<div
			class="border border-slate-200 rounded-[2rem] overflow-hidden hover:shadow-2xl transition bg-white group flex flex-col">
			<div class="h-48 relative overflow-hidden">
				<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/694489509b0de40cdd3adafb.png"
					class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
					alt="<?php esc_attr_e('West End Atlanta Daycare', 'kidazzle'); ?>">
				<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
				<div class="absolute bottom-4 left-6 text-white font-bold text-lg">
					<?php esc_html_e('Atlanta, GA', 'kidazzle'); ?></div>
			</div>
			<div class="p-8 flex flex-col flex-grow">
				<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('West End Center', 'kidazzle'); ?>
				</h3>
				<p class="text-slate-500 mb-4 text-sm flex items-start gap-2"><i data-lucide="map-pin"
						class="w-4 h-4 mt-1 text-red-400"></i> <?php esc_html_e('831 York Ave', 'kidazzle'); ?></p>
				<p class="text-slate-600 mb-6 flex-grow text-sm leading-relaxed">
					<?php esc_html_e('Historic district location offering quality rated child care with a unique focus on community arts.', 'kidazzle'); ?>
				</p>
				<div class="flex flex-wrap gap-2 mb-8">
					<span
						class="bg-green-50 text-green-700 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('Arts Focus', 'kidazzle'); ?></span>
					<span
						class="bg-slate-50 text-slate-600 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('Historic District', 'kidazzle'); ?></span>
				</div>
				<a href="<?php echo esc_url(home_url('/locations/west-end/')); ?>"
					class="w-full block bg-slate-900 text-white text-center font-bold py-3 rounded-xl hover:bg-green-600 transition shadow-md"><?php esc_html_e('View Details', 'kidazzle'); ?></a>
			</div>
		</div>

		<!-- Summit -->
		<div
			class="border border-slate-200 rounded-[2rem] overflow-hidden hover:shadow-2xl transition bg-white group flex flex-col">
			<div class="h-48 relative overflow-hidden">
				<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/69448aa74d191697026731fb.png"
					class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
					alt="<?php esc_attr_e('IRS Summit Building Child Care', 'kidazzle'); ?>">
				<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
				<div class="absolute bottom-4 left-6 text-white font-bold text-lg">
					<?php esc_html_e('Midtown Atlanta', 'kidazzle'); ?></div>
			</div>
			<div class="p-8 flex flex-col flex-grow">
				<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('IRS Summit', 'kidazzle'); ?></h3>
				<p class="text-slate-500 mb-4 text-sm flex items-start gap-2"><i data-lucide="map-pin"
						class="w-4 h-4 mt-1 text-red-400"></i> <?php esc_html_e('401 W Peachtree St NW', 'kidazzle'); ?>
				</p>
				<p class="text-slate-600 mb-6 flex-grow text-sm leading-relaxed">
					<?php esc_html_e('Convenient bilingual care for federal employees and midtown professionals. Kiss & Go drop-off available.', 'kidazzle'); ?>
				</p>
				<div class="flex flex-wrap gap-2 mb-8">
					<span
						class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('Bilingual', 'kidazzle'); ?></span>
					<span
						class="bg-slate-50 text-slate-600 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('Federal Priority', 'kidazzle'); ?></span>
				</div>
				<a href="<?php echo esc_url(home_url('/locations/irs-summit/')); ?>"
					class="w-full block bg-slate-900 text-white text-center font-bold py-3 rounded-xl hover:bg-green-400 transition shadow-md"><?php esc_html_e('View Details', 'kidazzle'); ?></a>
			</div>
		</div>

		<!-- Memphis -->
		<div
			class="border border-slate-200 rounded-[2rem] overflow-hidden hover:shadow-2xl transition bg-white group flex flex-col">
			<div class="h-48 relative overflow-hidden">
				<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/69448a0de7887060a542e4ae.png"
					class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
					alt="<?php esc_attr_e('Memphis Downtown Daycare', 'kidazzle'); ?>">
				<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
				<div class="absolute bottom-4 left-6 text-white font-bold text-lg">
					<?php esc_html_e('Memphis, TN', 'kidazzle'); ?></div>
			</div>
			<div class="p-8 flex flex-col flex-grow">
				<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('Downtown Memphis', 'kidazzle'); ?>
				</h3>
				<p class="text-slate-500 mb-4 text-sm flex items-start gap-2"><i data-lucide="map-pin"
						class="w-4 h-4 mt-1 text-red-400"></i> <?php esc_html_e('3194 Independent Rd', 'kidazzle'); ?>
				</p>
				<p class="text-slate-600 mb-6 flex-grow text-sm leading-relaxed">
					<?php esc_html_e('Soul, rhythm, and rigor located near the FedEx Hub with extended hours for working families.', 'kidazzle'); ?>
				</p>
				<div class="flex flex-wrap gap-2 mb-8">
					<span
						class="bg-indigo-50 text-indigo-700 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('FedEx Hub', 'kidazzle'); ?></span>
					<span
						class="bg-slate-50 text-slate-600 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('Music Program', 'kidazzle'); ?></span>
				</div>
				<a href="<?php echo esc_url(home_url('/locations/memphis/')); ?>"
					class="w-full block bg-slate-900 text-white text-center font-bold py-3 rounded-xl hover:bg-green-600 transition shadow-md"><?php esc_html_e('View Details', 'kidazzle'); ?></a>
			</div>
		</div>

		<!-- Doral -->
		<div
			class="border border-slate-200 rounded-[2rem] overflow-hidden hover:shadow-2xl transition bg-white group flex flex-col">
			<div class="h-48 relative overflow-hidden">
				<img src="https://images.unsplash.com/photo-1535498730771-e735b998cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
					class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
					alt="<?php esc_attr_e('Doral Florida Preschool', 'kidazzle'); ?>">
				<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
				<div class="absolute bottom-4 left-6 text-white font-bold text-lg">
					<?php esc_html_e('Doral, FL', 'kidazzle'); ?></div>
			</div>
			<div class="p-8 flex flex-col flex-grow">
				<h3 class="text-2xl font-bold text-slate-900 mb-2">
					<?php esc_html_e('Doral International', 'kidazzle'); ?></h3>
				<p class="text-slate-500 mb-4 text-sm flex items-start gap-2"><i data-lucide="map-pin"
						class="w-4 h-4 mt-1 text-red-400"></i>
					<?php esc_html_e('7500 Northwest 58th Street', 'kidazzle'); ?></p>
				<p class="text-slate-600 mb-6 flex-grow text-sm leading-relaxed">
					<?php esc_html_e('Bilingual Spanish immersion program blending sunshine with STEM education.', 'kidazzle'); ?>
				</p>
				<div class="flex flex-wrap gap-2 mb-8">
					<span
						class="bg-yellow-50 text-yellow-700 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('Spanish Immersion', 'kidazzle'); ?></span>
					<span
						class="bg-slate-50 text-slate-600 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('STEM Lab', 'kidazzle'); ?></span>
				</div>
				<a href="<?php echo esc_url(home_url('/locations/doral/')); ?>"
					class="w-full block bg-slate-900 text-white text-center font-bold py-3 rounded-xl hover:bg-green-600 transition shadow-md"><?php esc_html_e('View Details', 'kidazzle'); ?></a>
			</div>
		</div>

		<!-- AFC -->
		<div
			class="border border-slate-200 rounded-[2rem] overflow-hidden hover:shadow-2xl transition bg-white group flex flex-col">
			<div class="h-48 relative overflow-hidden">
				<img src="https://images.unsplash.com/photo-1477959858617-67f85cf4f1df?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
					class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
					alt="<?php esc_attr_e('Downtown Atlanta Daycare', 'kidazzle'); ?>">
				<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
				<div class="absolute bottom-4 left-6 text-white font-bold text-lg">
					<?php esc_html_e('Downtown Atlanta', 'kidazzle'); ?></div>
			</div>
			<div class="p-8 flex flex-col flex-grow">
				<h3 class="text-2xl font-bold text-slate-900 mb-2">
					<?php esc_html_e('Atlanta Federal Center', 'kidazzle'); ?></h3>
				<p class="text-slate-500 mb-4 text-sm flex items-start gap-2"><i data-lucide="map-pin"
						class="w-4 h-4 mt-1 text-red-400"></i> <?php esc_html_e('61 Forsyth St SW', 'kidazzle'); ?></p>
				<p class="text-slate-600 mb-6 flex-grow text-sm leading-relaxed">
					<?php esc_html_e('A secure downtown oasis for federal families featuring Toddler Discovery and GA Pre-K.', 'kidazzle'); ?>
				</p>
				<div class="flex flex-wrap gap-2 mb-8">
					<span
						class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('Secure Facility', 'kidazzle'); ?></span>
					<span
						class="bg-slate-50 text-slate-600 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('GA Pre-K', 'kidazzle'); ?></span>
				</div>
				<a href="<?php echo esc_url(home_url('/locations/atlanta-federal-center/')); ?>"
					class="w-full block bg-slate-900 text-white text-center font-bold py-3 rounded-xl hover:bg-green-600 transition shadow-md"><?php esc_html_e('View Details', 'kidazzle'); ?></a>
			</div>
		</div>

		<!-- College Park -->
		<div
			class="border border-slate-200 rounded-[2rem] overflow-hidden hover:shadow-2xl transition bg-white group flex flex-col">
			<div class="h-48 relative overflow-hidden">
				<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/694489ba4d1916e65f671511.png"
					class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
					alt="<?php esc_attr_e('College Park Daycare', 'kidazzle'); ?>">
				<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
				<div class="absolute bottom-4 left-6 text-white font-bold text-lg">
					<?php esc_html_e('College Park, GA', 'kidazzle'); ?></div>
			</div>
			<div class="p-8 flex flex-col flex-grow">
				<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('College Park', 'kidazzle'); ?></h3>
				<p class="text-slate-500 mb-4 text-sm flex items-start gap-2"><i data-lucide="map-pin"
						class="w-4 h-4 mt-1 text-red-400"></i> <?php esc_html_e('1701 Columbia Ave', 'kidazzle'); ?></p>
				<p class="text-slate-600 mb-6 flex-grow text-sm leading-relaxed">
					<?php esc_html_e('Serving tri-cities families near the airport with a focus on STEAM education and transportation.', 'kidazzle'); ?>
				</p>
				<div class="flex flex-wrap gap-2 mb-8">
					<span
						class="bg-cyan-50 text-cyan-700 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('STEAM Focus', 'kidazzle'); ?></span>
					<span
						class="bg-slate-50 text-slate-600 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('Near Airport', 'kidazzle'); ?></span>
				</div>
				<a href="<?php echo esc_url(home_url('/locations/college-park/')); ?>"
					class="w-full block bg-slate-900 text-white text-center font-bold py-3 rounded-xl hover:bg-green-600 transition shadow-md"><?php esc_html_e('View Details', 'kidazzle'); ?></a>
			</div>
		</div>

		<!-- Hampton -->
		<div
			class="border border-slate-200 rounded-[2rem] overflow-hidden hover:shadow-2xl transition bg-white group flex flex-col">
			<div class="h-48 relative overflow-hidden">
				<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/69448aec9bd664979b723cdb.png"
					class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
					alt="<?php esc_attr_e('Hampton GA Daycare', 'kidazzle'); ?>">
				<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent"></div>
				<div class="absolute bottom-4 left-6 text-white font-bold text-lg">
					<?php esc_html_e('Hampton, GA', 'kidazzle'); ?></div>
			</div>
			<div class="p-8 flex flex-col flex-grow">
				<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('Hampton', 'kidazzle'); ?></h3>
				<p class="text-slate-500 mb-4 text-sm flex items-start gap-2"><i data-lucide="map-pin"
						class="w-4 h-4 mt-1 text-red-400"></i> <?php esc_html_e('49 Woolsey Rd', 'kidazzle'); ?></p>
				<p class="text-slate-600 mb-6 flex-grow text-sm leading-relaxed">
					<?php esc_html_e('A top-rated early childhood option in the McDonough area featuring a large playground and summer camp.', 'kidazzle'); ?>
				</p>
				<div class="flex flex-wrap gap-2 mb-8">
					<span
						class="bg-orange-50 text-orange-700 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('School Readiness', 'kidazzle'); ?></span>
					<span
						class="bg-slate-50 text-slate-600 text-xs px-3 py-1 rounded-full font-bold uppercase"><?php esc_html_e('Large Playground', 'kidazzle'); ?></span>
				</div>
				<a href="<?php echo esc_url(home_url('/locations/hampton/')); ?>"
					class="w-full block bg-slate-900 text-white text-center font-bold py-3 rounded-xl hover:bg-green-600 transition shadow-md"><?php esc_html_e('View Details', 'kidazzle'); ?></a>
			</div>
		</div>

	</div>
</div>

<?php get_footer(); ?>