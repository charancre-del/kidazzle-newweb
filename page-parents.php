<?php
/**
 * Template Name: Parents Page
 * Parent resources dashboard
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
			<img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
				alt="<?php esc_attr_e('Parent Resources', 'kidazzle'); ?>" class="w-full h-full object-cover">
		<?php endif; ?>
		<div class="absolute inset-0 bg-yellow-900/60"></div>
	</div>
	<div class="relative z-10 container mx-auto px-4 text-white">
		<span
			class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10"><?php esc_html_e('Resources', 'kidazzle'); ?></span>
		<h1 class="text-5xl md:text-6xl font-extrabold mb-6"><?php the_title(); ?></h1>
		<p class="text-xl md:text-2xl max-w-2xl mx-auto text-yellow-100 drop-shadow-md">
			<?php esc_html_e('Everything you need to manage your child’s care, all in one place.', 'kidazzle'); ?></p>
	</div>
</div>

<div class="container mx-auto px-4 py-20">

	<!-- Dashboard Grid -->
	<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

		<!-- Parent Portal -->
		<a href="https://schools.procareconnect.com/login" target="_blank" rel="noopener noreferrer"
			class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-2xl hover:-translate-y-1 transition group">
			<div
				class="w-16 h-16 bg-yellow-50 text-yellow-500 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-500 group-hover:text-white transition">
				<i data-lucide="layout-dashboard" class="w-8 h-8"></i>
			</div>
			<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('Parent Portal', 'kidazzle'); ?></h3>
			<p class="text-slate-500 mb-4">
				<?php esc_html_e('View daily reports, photos, and communicate with teachers.', 'kidazzle'); ?></p>
			<span
				class="text-yellow-600 font-bold flex items-center gap-2 text-sm"><?php esc_html_e('Log In', 'kidazzle'); ?>
				<i data-lucide="external-link" class="w-4 h-4"></i></span>
		</a>

		<!-- Pay Tuition -->
		<a href="#"
			class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-2xl hover:-translate-y-1 transition group">
			<div
				class="w-16 h-16 bg-green-50 text-green-500 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-500 group-hover:text-white transition">
				<i data-lucide="credit-card" class="w-8 h-8"></i>
			</div>
			<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('Pay Tuition', 'kidazzle'); ?></h3>
			<p class="text-slate-500 mb-4">
				<?php esc_html_e('Securely pay tuition online or set up auto-pay.', 'kidazzle'); ?></p>
			<span
				class="text-green-600 font-bold flex items-center gap-2 text-sm"><?php esc_html_e('Make Payment', 'kidazzle'); ?>
				<i data-lucide="arrow-right" class="w-4 h-4"></i></span>
		</a>

		<!-- Uniforms -->
		<a href="#"
			class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-2xl hover:-translate-y-1 transition group">
			<div
				class="w-16 h-16 bg-blue-50 text-blue-500 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-500 group-hover:text-white transition">
				<i data-lucide="shirt" class="w-8 h-8"></i>
			</div>
			<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('Order Uniforms', 'kidazzle'); ?></h3>
			<p class="text-slate-500 mb-4">
				<?php esc_html_e('Shop for approved uniforms and spirit wear.', 'kidazzle'); ?></p>
			<span
				class="text-blue-600 font-bold flex items-center gap-2 text-sm"><?php esc_html_e('Shop Now', 'kidazzle'); ?>
				<i data-lucide="shopping-bag" class="w-4 h-4"></i></span>
		</a>

		<!-- Forms -->
		<a href="<?php echo esc_url(home_url('/teacher-portal/')); ?>"
			class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-2xl hover:-translate-y-1 transition group">
			<div
				class="w-16 h-16 bg-purple-50 text-purple-500 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-purple-500 group-hover:text-white transition">
				<i data-lucide="file-text" class="w-8 h-8"></i>
			</div>
			<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('Forms & Documents', 'kidazzle'); ?>
			</h3>
			<p class="text-slate-500 mb-4">
				<?php esc_html_e('Download enrollment packets, medical forms, and handbooks.', 'kidazzle'); ?></p>
			<span
				class="text-purple-600 font-bold flex items-center gap-2 text-sm"><?php esc_html_e('View Documents', 'kidazzle'); ?>
				<i data-lucide="arrow-right" class="w-4 h-4"></i></span>
		</a>

		<!-- Calendar -->
		<a href="#"
			class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-2xl hover:-translate-y-1 transition group">
			<div
				class="w-16 h-16 bg-red-50 text-red-500 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-500 group-hover:text-white transition">
				<i data-lucide="calendar" class="w-8 h-8"></i>
			</div>
			<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('Academic Calendar', 'kidazzle'); ?>
			</h3>
			<p class="text-slate-500 mb-4">
				<?php esc_html_e('Important dates, holidays, and event schedules.', 'kidazzle'); ?></p>
			<span
				class="text-red-600 font-bold flex items-center gap-2 text-sm"><?php esc_html_e('View Calendar', 'kidazzle'); ?>
				<i data-lucide="arrow-right" class="w-4 h-4"></i></span>
		</a>

		<!-- Contact Directors -->
		<a href="<?php echo esc_url(home_url('/contact/')); ?>"
			class="bg-white p-8 rounded-[2rem] shadow-lg border border-slate-100 hover:shadow-2xl hover:-translate-y-1 transition group">
			<div
				class="w-16 h-16 bg-cyan-50 text-cyan-500 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-cyan-500 group-hover:text-white transition">
				<i data-lucide="message-circle" class="w-8 h-8"></i>
			</div>
			<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php esc_html_e('Contact Director', 'kidazzle'); ?></h3>
			<p class="text-slate-500 mb-4">
				<?php esc_html_e('Have a concern? Reach out directly to your center director.', 'kidazzle'); ?></p>
			<span
				class="text-cyan-600 font-bold flex items-center gap-2 text-sm"><?php esc_html_e('Get in Touch', 'kidazzle'); ?>
				<i data-lucide="arrow-right" class="w-4 h-4"></i></span>
		</a>

	</div>

</div>

<?php get_footer(); ?>