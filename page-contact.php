<?php
/**
 * Template Name: Contact Page
 * Contact info and form
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

<!-- Hero -->
<div class="relative py-32 text-center overflow-hidden">
	<div class="absolute inset-0 z-0">
		<?php if (has_post_thumbnail()): ?>
			<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>"
				class="w-full h-full object-cover">
		<?php else: ?>
			<img src="https://images.unsplash.com/photo-1596443686812-2f45229eeb36?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
				alt="<?php esc_attr_e('Contact Us', 'kidazzle'); ?>" class="w-full h-full object-cover">
		<?php endif; ?>
		<div class="absolute inset-0 bg-indigo-900/60"></div>
	</div>
	<div class="relative z-10 container mx-auto px-4 text-white">
		<span
			class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('Get in Touch', 'kidazzle'); ?></span>
		<h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php the_title(); ?></h1>
		<p class="text-xl md:text-2xl max-w-2xl mx-auto text-indigo-100 drop-shadow-md">
			<?php esc_html_e('We are here to help you find the perfect care solution for your family.', 'kidazzle'); ?>
		</p>
	</div>
</div>

<div class="container mx-auto px-4 py-16">
	<div class="grid lg:grid-cols-2 gap-16">

		<!-- Contact Info -->
		<div class="space-y-12">
			<div>
				<h2 class="text-3xl font-bold text-slate-900 mb-6"><?php esc_html_e('Contact a Center', 'kidazzle'); ?>
				</h2>
				<p class="text-slate-600 mb-8">
					<?php esc_html_e('Looking for a specific location? Visit our locations page to find phone numbers and directions for the center nearest you.', 'kidazzle'); ?>
				</p>
				<a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
					class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:gap-3 transition">
					<?php esc_html_e('Find a Location', 'kidazzle'); ?> <i data-lucide="arrow-right"
						class="w-5 h-5"></i>
				</a>
			</div>

			<div class="bg-slate-50 p-8 rounded-3xl border border-slate-100">
				<h3 class="text-xl font-bold text-slate-900 mb-6"><?php esc_html_e('Corporate Office', 'kidazzle'); ?>
				</h3>
				<ul class="space-y-6">
					<li class="flex items-start gap-4">
						<div class="bg-white p-3 rounded-xl shadow-sm border border-slate-100"><i data-lucide="map-pin"
								class="w-6 h-6 text-red-500"></i></div>
						<div>
							<p class="font-bold text-slate-900"><?php esc_html_e('Address', 'kidazzle'); ?></p>
							<p class="text-slate-600">100 Alabama St SW, Atlanta, GA 30303</p>
						</div>
					</li>
					<li class="flex items-start gap-4">
						<div class="bg-white p-3 rounded-xl shadow-sm border border-slate-100"><i data-lucide="phone"
								class="w-6 h-6 text-green-500"></i></div>
						<div>
							<p class="font-bold text-slate-900"><?php esc_html_e('Phone', 'kidazzle'); ?></p>
							<a href="tel:8774101002"
								class="text-slate-600 hover:text-indigo-600 transition">877-410-1002</a>
						</div>
					</li>
					<li class="flex items-start gap-4">
						<div class="bg-white p-3 rounded-xl shadow-sm border border-slate-100"><i data-lucide="mail"
								class="w-6 h-6 text-purple-500"></i></div>
						<div>
							<p class="font-bold text-slate-900"><?php esc_html_e('Email', 'kidazzle'); ?></p>
							<a href="mailto:info@kidazzle.com"
								class="text-slate-600 hover:text-indigo-600 transition">info@kidazzle.com</a>
						</div>
					</li>
				</ul>
			</div>
		</div>

		<!-- Form Section -->
		<div class="bg-white p-8 md:p-12 rounded-[2.5rem] shadow-xl border border-slate-100">
			<h2 class="text-3xl font-bold text-slate-900 mb-2"><?php esc_html_e('Send us a Message', 'kidazzle'); ?>
			</h2>
			<p class="text-slate-500 mb-8">
				<?php esc_html_e('Fill out the form below and we will get back to you shortly.', 'kidazzle'); ?></p>

			<?php
			$form_shortcode = get_field('kidazzle_contact_form_shortcode');
			if ($form_shortcode) {
				echo do_shortcode($form_shortcode);
			} else {
				?>
				<!-- Placeholder Form -->
				<form class="space-y-4">
					<div class="grid md:grid-cols-2 gap-4">
						<div>
							<label
								class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('First Name', 'kidazzle'); ?></label>
							<input type="text"
								class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
								placeholder="Jane">
						</div>
						<div>
							<label
								class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Last Name', 'kidazzle'); ?></label>
							<input type="text"
								class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
								placeholder="Doe">
						</div>
					</div>
					<div>
						<label
							class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Email / Phone', 'kidazzle'); ?></label>
						<input type="text"
							class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
							placeholder="jane@example.com">
					</div>
					<div>
						<label
							class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Message', 'kidazzle'); ?></label>
						<textarea rows="4"
							class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"
							placeholder="How can we help?"></textarea>
					</div>
					<button type="button"
						class="w-full bg-indigo-600 text-white font-bold py-4 rounded-xl hover:bg-indigo-700 transition shadow-lg"><?php esc_html_e('Send Message', 'kidazzle'); ?></button>
					<p class="text-xs text-center text-slate-400 mt-4">
						<?php esc_html_e('This is a placeholder. Configure a form shortcode in Page Settings.', 'kidazzle'); ?>
					</p>
				</form>
			<?php } ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>