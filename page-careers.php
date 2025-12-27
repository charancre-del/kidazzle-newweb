<?php
/**
 * Template Name: Careers Page
 * Employment opportunities and application
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
			<img src="https://images.unsplash.com/photo-1524178232363-1fb2b075b955?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
				alt="<?php esc_attr_e('Join our Team', 'kidazzle'); ?>" class="w-full h-full object-cover">
		<?php endif; ?>
		<div class="absolute inset-0 bg-blue-900/60"></div>
	</div>
	<div class="relative z-10 container mx-auto px-4 text-white">
		<span
			class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('Careers', 'kidazzle'); ?></span>
		<h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php the_title(); ?></h1>
		<p class="text-xl md:text-2xl max-w-2xl mx-auto text-blue-100 drop-shadow-md">
			<?php esc_html_e('Join a passionate team dedicated to shaping the future, one child at a time.', 'kidazzle'); ?>
		</p>
	</div>
</div>

<div class="container mx-auto px-4 py-20 space-y-20">

	<!-- Culture / Benefits -->
	<section class="max-w-5xl mx-auto text-center">
		<h2 class="text-3xl font-bold text-slate-900 mb-12"><?php esc_html_e('Why Work with Us?', 'kidazzle'); ?></h2>
		<div class="grid md:grid-cols-3 gap-8">
			<div class="bg-blue-50 p-8 rounded-3xl border border-blue-100">
				<div
					class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6 text-blue-500 shadow-sm">
					<i data-lucide="heart" class="w-8 h-8"></i></div>
				<h3 class="text-xl font-bold text-blue-900 mb-3"><?php esc_html_e('Supportive Culture', 'kidazzle'); ?>
				</h3>
				<p class="text-slate-600 text-sm">
					<?php esc_html_e('We are a family-owned business that values every team member. You are not just a number here.', 'kidazzle'); ?>
				</p>
			</div>
			<div class="bg-cyan-50 p-8 rounded-3xl border border-cyan-100">
				<div
					class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6 text-cyan-500 shadow-sm">
					<i data-lucide="trending-up" class="w-8 h-8"></i></div>
				<h3 class="text-xl font-bold text-cyan-900 mb-3">
					<?php esc_html_e('Growth Opportunities', 'kidazzle'); ?></h3>
				<p class="text-slate-600 text-sm">
					<?php esc_html_e('Professional development, training, and clear pathways for career advancement.', 'kidazzle'); ?>
				</p>
			</div>
			<div class="bg-purple-50 p-8 rounded-3xl border border-purple-100">
				<div
					class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-6 text-purple-500 shadow-sm">
					<i data-lucide="smile" class="w-8 h-8"></i></div>
				<h3 class="text-xl font-bold text-purple-900 mb-3"><?php esc_html_e('Great Benefits', 'kidazzle'); ?>
				</h3>
				<p class="text-slate-600 text-sm">
					<?php esc_html_e('Competitive pay, paid time off, and discounted child care for staff members.', 'kidazzle'); ?>
				</p>
			</div>
		</div>
	</section>

	<!-- Application Form -->
	<section class="max-w-3xl mx-auto bg-white rounded-[2.5rem] shadow-2xl border border-slate-100 overflow-hidden">
		<div class="bg-slate-900 p-8 text-center">
			<h2 class="text-2xl font-bold text-white mb-2"><?php esc_html_e('Apply Now', 'kidazzle'); ?></h2>
			<p class="text-slate-300">
				<?php esc_html_e('Tell us about yourself and we will be in touch.', 'kidazzle'); ?></p>
		</div>
		<div class="p-8 md:p-12">
			<?php
			$form_shortcode = get_field('kidazzle_careers_form_shortcode');
			if ($form_shortcode) {
				echo do_shortcode($form_shortcode);
			} else {
				?>
				<!-- Placeholder Form -->
				<form class="space-y-6">
					<div class="grid md:grid-cols-2 gap-6">
						<div>
							<label
								class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('First Name', 'kidazzle'); ?></label>
							<input type="text"
								class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
						</div>
						<div>
							<label
								class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Last Name', 'kidazzle'); ?></label>
							<input type="text"
								class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
						</div>
					</div>
					<div>
						<label
							class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Email Address', 'kidazzle'); ?></label>
						<input type="email"
							class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
					</div>
					<div>
						<label
							class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Position of Interest', 'kidazzle'); ?></label>
						<select
							class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
							<option><?php esc_html_e('Lead Teacher', 'kidazzle'); ?></option>
							<option><?php esc_html_e('Assistant Teacher', 'kidazzle'); ?></option>
							<option><?php esc_html_e('Director', 'kidazzle'); ?></option>
							<option><?php esc_html_e('Cook / Support Staff', 'kidazzle'); ?></option>
						</select>
					</div>
					<div>
						<label
							class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Resume (Upload)', 'kidazzle'); ?></label>
						<div
							class="border-2 border-dashed border-slate-300 rounded-xl p-8 text-center text-slate-400 bg-slate-50 hover:bg-slate-100 transition cursor-pointer">
							<i data-lucide="upload-cloud" class="w-8 h-8 mx-auto mb-2"></i>
							<span class="text-xs"><?php esc_html_e('Click to upload PDF or DOCX', 'kidazzle'); ?></span>
						</div>
					</div>
					<button type="button"
						class="w-full bg-blue-600 text-white font-bold py-4 rounded-xl hover:bg-blue-700 transition shadow-lg text-lg"><?php esc_html_e('Submit Application', 'kidazzle'); ?></button>
				</form>
			<?php } ?>
		</div>
	</section>

</div>

<?php get_footer(); ?>