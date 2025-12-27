<?php
/**
 * Single Location Template
 * 
 * KIDazzle Child Care Theme
 * 
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();

// Get custom fields (assuming updated prefixes or generic names)
$address = get_field('kidazzle_location_address') ?: '674 Joseph E Lowery Blvd, Atlanta, GA 30310';
$phone = get_field('kidazzle_location_phone') ?: '(404) 753-8884';
$email = get_field('kidazzle_location_email') ?: 'westend@kidazzle.com';
$calendar_embed = get_field('kidazzle_location_calendar');
if (empty($calendar_embed)) {
	// Default fallback from HTML source
	$calendar_embed = '<iframe src="https://api.leadconnectorhq.com/widget/booking/QGN3ewkDzTOKKsOH93q6" style="width: 100%; height: 100%; border:none; overflow: hidden;" id="msgsndr-calendar"></iframe>';
}
$map_embed = get_field('kidazzle_location_map');
?>

<!-- HERO SECTION -->
<div class="bg-slate-900 py-24 text-white relative overflow-hidden">
	<div class="absolute inset-0 z-0">
		<?php if (has_post_thumbnail()): ?>
			<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>"
				class="w-full h-full object-cover opacity-20">
		<?php else: ?>
			<img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/694489509b0de40cdd3adafb.png"
				alt="<?php the_title_attribute(); ?>" class="w-full h-full object-cover opacity-20">
		<?php endif; ?>
	</div>
	<div class="container mx-auto px-4 text-center relative z-10">
		<?php
		$city = get_field('kidazzle_location_city') ?: 'Atlanta, GA';
		?>
		<span
			class="bg-white/20 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide mb-6 inline-block backdrop-blur-sm border border-white/10"><?php echo esc_html($city); ?></span>
		<h1 class="text-5xl md:text-6xl font-extrabold mb-4"><?php the_title(); ?></h1>
		<p class="text-xl max-w-2xl mx-auto text-slate-300"><?php echo esc_html(get_the_excerpt()); ?></p>
	</div>
</div>

<div class="container mx-auto px-4 py-16">
	<div class="grid lg:grid-cols-3 gap-12">
		<div class="lg:col-span-2 space-y-12">

			<!-- About / SEO Content (Top) -->
			<section>
				<h2 class="text-3xl font-bold text-slate-900 mb-6"><?php esc_html_e('About This Center', 'kidazzle'); ?>
				</h2>
				<div class="text-slate-600 leading-relaxed text-lg mb-8 content-area">
					<?php the_content(); ?>
				</div>

				<!-- Features Grid - Static for now, consistent with design -->
				<div class="grid md:grid-cols-3 gap-4 mb-8">
					<div
						class="bg-slate-50 p-6 rounded-2xl border border-slate-200 text-center hover:bg-slate-100 transition group cursor-pointer">
						<i data-lucide="palette" class="w-8 h-8 mx-auto mb-3 text-purple-500"></i>
						<h4 class="font-bold text-slate-900"><?php esc_html_e('Arts Focus', 'kidazzle'); ?></h4>
						<p class="text-xs text-slate-500 mt-2"><?php esc_html_e('Community Education', 'kidazzle'); ?>
						</p>
					</div>
					<div
						class="bg-slate-50 p-6 rounded-2xl border border-slate-200 text-center hover:bg-slate-100 transition group cursor-pointer">
						<i data-lucide="landmark" class="w-8 h-8 mx-auto mb-3 text-orange-500"></i>
						<h4 class="font-bold text-slate-900"><?php esc_html_e('Historic District', 'kidazzle'); ?></h4>
						<p class="text-xs text-slate-500 mt-2"><?php esc_html_e('Local Heritage', 'kidazzle'); ?></p>
					</div>
					<div
						class="bg-slate-50 p-6 rounded-2xl border border-slate-200 text-center hover:bg-slate-100 transition group cursor-pointer">
						<i data-lucide="graduation-cap" class="w-8 h-8 mx-auto mb-3 text-green-500"></i>
						<h4 class="font-bold text-slate-900"><?php esc_html_e('GA Pre-K', 'kidazzle'); ?></h4>
						<p class="text-xs text-slate-500 mt-2"><?php esc_html_e('Lottery Funded', 'kidazzle'); ?></p>
					</div>
				</div>
			</section>

			<!-- Calendar (Middle) -->
			<div class="bg-white p-8 rounded-[2rem] shadow-xl border-t-8 border-yellow-400">
				<h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2"><i data-lucide="calendar"
						class="text-yellow-500"></i> <?php esc_html_e('Book a Tour', 'kidazzle'); ?></h3>
				<div
					class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] min-h-[800px] flex items-center justify-center relative p-6">
					<?php echo $calendar_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
			</div>

			<!-- Map (Bottom) -->
			<?php if ($map_embed): ?>
				<section
					class="bg-slate-100 rounded-[2rem] h-96 flex items-center justify-center text-slate-400 border-2 border-slate-200 overflow-hidden relative">
					<?php echo $map_embed; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</section>
			<?php else: ?>
				<section
					class="bg-slate-100 rounded-[2rem] h-96 flex items-center justify-center text-slate-400 border-2 border-slate-200 overflow-hidden relative">
					<p class="font-mono text-sm"><?php esc_html_e('Google Map Embed Placeholder', 'kidazzle'); ?></p>
				</section>
			<?php endif; ?>
		</div>

		<!-- Sidebar -->
		<div class="space-y-8">
			<div class="bg-slate-900 p-8 rounded-[2rem] text-white shadow-xl">
				<h3 class="text-xl font-bold mb-6"><?php esc_html_e('Contact Info', 'kidazzle'); ?></h3>
				<div class="space-y-6 text-base">
					<div class="flex items-start gap-4"><i data-lucide="map-pin" class="text-red-400 mt-1"></i>
						<span><?php echo wp_kses_post($address); ?></span></div>
					<div class="flex items-center gap-4"><i data-lucide="phone" class="text-green-400"></i> <span
							class="font-bold"><?php echo esc_html($phone); ?></span></div>
					<div class="flex items-center gap-4"><i data-lucide="mail" class="text-cyan-400"></i>
						<span><?php echo esc_html($email); ?></span></div>
				</div>
			</div>
			<!-- 123 Form for this location -->
			<div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200">
				<h3 class="text-xl font-bold text-slate-900 mb-4"><?php esc_html_e('Have Questions?', 'kidazzle'); ?>
				</h3>
				<div
					class="bg-slate-50 border-dashed border-2 border-slate-300 rounded-xl p-8 text-center text-xs text-slate-400">
					<?php esc_html_e('Embed Location Form Here', 'kidazzle'); ?></div>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>