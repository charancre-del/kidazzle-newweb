<?php
/**
 * Template Name: Employers Page
 * Corporate partnerships and benefits
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
		<img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
			alt="<?php esc_attr_e('Corporate Partnerships', 'kidazzle'); ?>" class="w-full h-full object-cover">
		<div class="absolute inset-0 bg-slate-900/60"></div>
	</div>
	<div class="relative z-10 container mx-auto px-4 text-white">
		<span
			class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('For Employers', 'kidazzle'); ?></span>
		<h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php the_title(); ?></h1>
		<p class="text-xl md:text-2xl max-w-2xl mx-auto text-slate-100 drop-shadow-md">
			<?php esc_html_e('Empower your workforce with reliable, high-quality child care solutions.', 'kidazzle'); ?>
		</p>
	</div>
</div>

<div class="container mx-auto px-4 py-20 space-y-20">

	<!-- Value Prop -->
	<section class="grid md:grid-cols-2 gap-16 items-center">
		<div>
			<h2 class="text-3xl font-bold text-slate-900 mb-6">
				<?php esc_html_e('Child Care is a Business Issue', 'kidazzle'); ?></h2>
			<div class="space-y-4 text-lg text-slate-600">
				<p><?php esc_html_e('Employee absenteeism due to child care issues costs businesses billions every year. By partnering with KIDazzle, you can support your working parents, increase retention, and boost productivity.', 'kidazzle'); ?>
				</p>
				<p><?php esc_html_e('We offer priority enrollment, tuition discounts, and backup care options for our corporate partners.', 'kidazzle'); ?>
				</p>
			</div>
			<ul class="space-y-4 mt-8">
				<li class="flex items-center gap-3">
					<div class="bg-green-100 p-2 rounded-full text-green-600"><i data-lucide="check"
							class="w-5 h-5"></i></div> <span
						class="font-bold text-slate-700"><?php esc_html_e('Reduced Turnover', 'kidazzle'); ?></span>
				</li>
				<li class="flex items-center gap-3">
					<div class="bg-green-100 p-2 rounded-full text-green-600"><i data-lucide="check"
							class="w-5 h-5"></i></div> <span
						class="font-bold text-slate-700"><?php esc_html_e('Higher Morale', 'kidazzle'); ?></span>
				</li>
				<li class="flex items-center gap-3">
					<div class="bg-green-100 p-2 rounded-full text-green-600"><i data-lucide="check"
							class="w-5 h-5"></i></div> <span
						class="font-bold text-slate-700"><?php esc_html_e('Tax Credits Available', 'kidazzle'); ?></span>
				</li>
			</ul>
		</div>
		<div class="relative">
			<div class="absolute -inset-4 bg-slate-100 rounded-[3rem] transform rotate-3"></div>
			<div class="relative bg-white p-8 rounded-[2.5rem] shadow-xl border border-slate-100">
				<h3 class="text-2xl font-bold text-slate-900 mb-6 text-center">
					<?php esc_html_e('Partnership Inquiry', 'kidazzle'); ?></h3>
				<?php
				$form_shortcode = get_field('kidazzle_employers_form_shortcode');
				if ($form_shortcode) {
					echo do_shortcode($form_shortcode);
				} else {
					?>
					<form class="space-y-4">
						<div>
							<label
								class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Company Name', 'kidazzle'); ?></label>
							<input type="text"
								class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
						</div>
						<div>
							<label
								class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Contact Person', 'kidazzle'); ?></label>
							<input type="text"
								class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
						</div>
						<div>
							<label
								class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Business Email', 'kidazzle'); ?></label>
							<input type="email"
								class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
						</div>
						<div>
							<label
								class="block text-sm font-bold text-slate-700 mb-1"><?php esc_html_e('Employees in Your Org', 'kidazzle'); ?></label>
							<select
								class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500">
								<option>10 - 50</option>
								<option>50 - 200</option>
								<option>200+</option>
							</select>
						</div>
						<button type="button"
							class="w-full bg-green-600 text-white font-bold py-3 rounded-xl hover:bg-green-700 transition shadow-lg mt-2"><?php esc_html_e('Request Information', 'kidazzle'); ?></button>
					</form>
				<?php } ?>
			</div>
		</div>
	</section>

</div>

<?php get_footer(); ?>