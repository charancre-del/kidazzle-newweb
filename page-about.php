<?php
/**
 * Template Name: About Page
 * About Us page template
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

<!-- HERO SECTION -->
<header class="relative w-full h-[600px] flex items-center overflow-hidden">
	<div class="absolute inset-0 z-0">
		<img src="https://images.unsplash.com/photo-1571210862729-78a52d3779a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
			alt="<?php esc_attr_e('Teacher reading to diverse children in a bright classroom', 'kidazzle'); ?>"
			class="w-full h-full object-cover object-center">
		<div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-white via-white/80 to-transparent"></div>
	</div>
	<div class="container mx-auto px-4 relative z-10 h-full flex items-center">
		<div
			class="max-w-2xl bg-white/40 backdrop-blur-md p-10 rounded-[2.5rem] shadow-2xl border border-white/40 mt-20">
			<span
				class="bg-orange-500 text-white px-4 py-1.5 rounded-full text-xs font-extrabold uppercase tracking-wider shadow-sm mb-4 inline-block"><?php esc_html_e('Since 1994', 'kidazzle'); ?></span>
			<h1 class="text-5xl font-extrabold leading-tight mb-6 text-slate-900">
				<?php esc_html_e('More Than Childcare.', 'kidazzle'); ?><br><?php esc_html_e('We Are Family.', 'kidazzle'); ?>
			</h1>
			<p class="text-xl text-slate-900 mb-8 font-medium">
				<?php esc_html_e('For over 31 years, professional mothers have trusted KIDazzle to provide a safe, intellectually stimulating, and loving extension of their own homes.', 'kidazzle'); ?>
			</p>
			<div class="flex gap-4">
				<a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
					class="bg-slate-900 hover:bg-slate-800 text-white font-bold py-4 px-8 rounded-2xl shadow-lg transition flex items-center gap-2"><?php esc_html_e('Visit Our Centers', 'kidazzle'); ?>
					<i data-lucide="arrow-right" class="w-5 h-5"></i></a>
			</div>
		</div>
	</div>
</header>

<!-- INTRO / PHILOSOPHY -->
<section class="py-24 bg-white relative">
	<div class="container mx-auto px-4 text-center max-w-4xl">
		<h2 class="text-4xl font-extrabold text-slate-900 mb-6">
			<?php esc_html_e('The KIDazzle Standard', 'kidazzle'); ?></h2>
		<p class="text-xl text-slate-600 leading-relaxed">
			<?php esc_html_e('We understand that choosing a learning academy is one of the most significant decisions a parent makes. Our philosophy is simple:', 'kidazzle'); ?>
			<strong><?php esc_html_e('Excellence is standard.', 'kidazzle'); ?></strong>
			<?php esc_html_e('We bridge the gap between elite private education and accessible community care, ensuring every child receives the foundation they need to thrive.', 'kidazzle'); ?>
		</p>
	</div>
</section>

<!-- ORIGIN STORY SECTION -->
<section class="py-24 bg-orange-50/50 border-y border-orange-100">
	<div class="container mx-auto px-4">
		<div class="grid md:grid-cols-2 gap-16 items-center">
			<!-- Text Column -->
			<div class="order-2 md:order-1">
				<div class="flex items-center gap-3 mb-6">
					<div class="p-3 bg-orange-100 rounded-xl text-orange-600"><i data-lucide="history"
							class="w-6 h-6"></i></div>
					<span
						class="text-orange-600 font-extrabold tracking-widest uppercase text-sm"><?php esc_html_e('Our Origins', 'kidazzle'); ?></span>
				</div>
				<h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-8 leading-tight">
					<?php esc_html_e("From a Women's Shelter to a Regional Leader", 'kidazzle'); ?></h2>
				<div class="space-y-6 text-lg text-slate-700 leading-relaxed font-medium">
					<p>
						<?php esc_html_e("KIDazzle was born from a mission of profound necessity. Thirty-one years ago, we opened our doors inside a", 'kidazzle'); ?>
						<strong><?php esc_html_e("women's shelter", 'kidazzle'); ?></strong><?php esc_html_e(", dedicated to providing stability, safety, and education to families in transition. That spark of service defined our DNA.", 'kidazzle'); ?>
					</p>
					<p>
						<?php esc_html_e('As we grew, we made a strategic choice to expand into', 'kidazzle'); ?>
						<strong><?php esc_html_e('urban centers', 'kidazzle'); ?></strong><?php esc_html_e('—Memphis, Atlanta, Doral—where the need for high-quality, professional early childhood education was greatest.', 'kidazzle'); ?>
					</p>
					<p>
						<?php esc_html_e('Today, we remain an independent, family-owned organization. We are not a franchise. This independence allows us to maintain our uncompromising standards and treat every child not as a number, but as a future leader.', 'kidazzle'); ?>
					</p>
				</div>
			</div>
			<!-- Image Column -->
			<div class="order-1 md:order-2 relative">
				<div
					class="absolute inset-0 bg-orange-200 rounded-[3rem] transform rotate-3 scale-95 translate-y-4 -z-10">
				</div>
				<div class="h-[600px] rounded-[3rem] overflow-hidden shadow-2xl relative">
					<img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
						alt="<?php esc_attr_e('Child learning and growing', 'kidazzle'); ?>"
						class="w-full h-full object-cover">
					<div
						class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-orange-900/90 to-transparent p-10">
						<p class="text-white font-bold text-xl">
							<?php esc_html_e('"Quality care is a right, not a privilege."', 'kidazzle'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- CORE PILLARS -->
<section class="py-24 bg-white">
	<div class="container mx-auto px-4">
		<div class="text-center mb-20">
			<span
				class="text-indigo-600 font-extrabold tracking-widest uppercase text-sm block mb-2"><?php esc_html_e('Peace of Mind for Parents', 'kidazzle'); ?></span>
			<h2 class="text-4xl font-extrabold text-slate-900"><?php esc_html_e('Why Families Trust Us', 'kidazzle'); ?>
			</h2>
		</div>

		<div class="grid md:grid-cols-3 gap-10">
			<!-- Pillar 1 -->
			<div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 hover:shadow-xl transition group">
				<div
					class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-8 text-cyan-500 group-hover:scale-110 transition">
					<i data-lucide="brain" class="w-8 h-8"></i></div>
				<h3 class="text-2xl font-bold text-slate-900 mb-4"><?php esc_html_e('Academic Rigor', 'kidazzle'); ?>
				</h3>
				<p class="text-slate-600 leading-relaxed mb-6">
					<?php esc_html_e('We prepare children for the future. Our Creative Curriculum® aligns with state standards in GA, TN, and FL, ensuring your child enters Kindergarten ahead of the curve.', 'kidazzle'); ?>
				</p>
				<a href="<?php echo esc_url(home_url('/curriculum/')); ?>"
					class="text-cyan-600 font-bold text-sm flex items-center gap-2 hover:gap-3 transition-all"><?php esc_html_e('Explore Curriculum', 'kidazzle'); ?>
					<i data-lucide="arrow-right" class="w-4 h-4"></i></a>
			</div>

			<!-- Pillar 2 -->
			<div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 hover:shadow-xl transition group">
				<div
					class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-8 text-green-500 group-hover:scale-110 transition">
					<i data-lucide="shield-check" class="w-8 h-8"></i></div>
				<h3 class="text-2xl font-bold text-slate-900 mb-4">
					<?php esc_html_e('Uncompromising Safety', 'kidazzle'); ?></h3>
				<p class="text-slate-600 leading-relaxed mb-6">
					<?php esc_html_e("Your child's safety is our baseline. From secure keypad entry to rigorous staff background checks and monitored environments, we provide the security professional families demand.", 'kidazzle'); ?>
				</p>
				<a href="<?php echo esc_url(home_url('/safety/')); ?>"
					class="text-green-600 font-bold text-sm flex items-center gap-2 hover:gap-3 transition-all"><?php esc_html_e('View Protocols', 'kidazzle'); ?>
					<i data-lucide="arrow-right" class="w-4 h-4"></i></a>
			</div>

			<!-- Pillar 3 -->
			<div class="bg-slate-50 rounded-[2.5rem] p-10 border border-slate-100 hover:shadow-xl transition group">
				<div
					class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-8 text-orange-500 group-hover:scale-110 transition">
					<i data-lucide="utensils" class="w-8 h-8"></i></div>
				<h3 class="text-2xl font-bold text-slate-900 mb-4"><?php esc_html_e('Holistic Wellness', 'kidazzle'); ?>
				</h3>
				<p class="text-slate-600 leading-relaxed mb-6">
					<?php esc_html_e('We nourish the body as well as the mind. Our onsite chefs prepare fresh, healthy meals daily—no processed shortcuts. We focus on developing healthy habits for life.', 'kidazzle'); ?>
				</p>
				<a href="<?php echo esc_url(home_url('/meals/')); ?>"
					class="text-orange-600 font-bold text-sm flex items-center gap-2 hover:gap-3 transition-all"><?php esc_html_e('See Sample Menu', 'kidazzle'); ?>
					<i data-lucide="arrow-right" class="w-4 h-4"></i></a>
			</div>
		</div>
	</div>
</section>

<!-- VISION / STATS -->
<section class="py-24 bg-slate-900 text-white relative overflow-hidden">
	<div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>

	<div class="container mx-auto px-4 relative z-10 text-center">
		<h2 class="text-4xl md:text-5xl font-extrabold mb-8"><?php esc_html_e('Vision for the Future', 'kidazzle'); ?>
		</h2>
		<p class="text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed mb-12">
			<?php esc_html_e('As we look to the next 30 years, KIDazzle is committed to expanding our footprint while deepening our impact. We are constantly innovating—integrating technology like AI into our lesson planning while keeping the human connection at the center of everything we do.', 'kidazzle'); ?>
		</p>

		<div class="grid grid-cols-2 md:grid-cols-4 gap-8 border-t border-slate-800 pt-12 max-w-5xl mx-auto">
			<div class="p-4">
				<div class="text-4xl font-extrabold text-yellow-400 mb-2">31+</div>
				<div class="text-xs font-bold text-slate-400 uppercase tracking-widest">
					<?php esc_html_e('Years of Excellence', 'kidazzle'); ?></div>
			</div>
			<div class="p-4">
				<div class="text-4xl font-extrabold text-red-500 mb-2">10k+</div>
				<div class="text-xs font-bold text-slate-400 uppercase tracking-widest">
					<?php esc_html_e('Students Graduated', 'kidazzle'); ?></div>
			</div>
			<div class="p-4">
				<div class="text-4xl font-extrabold text-cyan-400 mb-2">3</div>
				<div class="text-xs font-bold text-slate-400 uppercase tracking-widest">
					<?php esc_html_e('States Served', 'kidazzle'); ?></div>
			</div>
			<div class="p-4">
				<div class="text-4xl font-extrabold text-green-500 mb-2">100%</div>
				<div class="text-xs font-bold text-slate-400 uppercase tracking-widest">
					<?php esc_html_e('Quality Rated', 'kidazzle'); ?></div>
			</div>
		</div>
	</div>
</section>

<!-- CTA STRIP -->
<section class="py-20 bg-white">
	<div class="container mx-auto px-4">
		<div
			class="max-w-5xl mx-auto bg-ombre-purple rounded-[3rem] p-12 text-center text-white shadow-2xl relative overflow-hidden">
			<div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
				<div class="text-left">
					<h3 class="text-3xl font-extrabold mb-2">
						<?php esc_html_e('Join the KIDazzle Family', 'kidazzle'); ?></h3>
					<p class="text-purple-100 text-lg">
						<?php esc_html_e("Secure your child's spot in a center where learning is fun and futures are bright.", 'kidazzle'); ?>
					</p>
				</div>
				<div class="flex flex-col sm:flex-row gap-4 shrink-0">
					<a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
						class="bg-white text-purple-700 px-8 py-3 rounded-xl font-bold hover:bg-purple-50 transition shadow-lg whitespace-nowrap"><?php esc_html_e('Find a Location', 'kidazzle'); ?></a>
					<a href="<?php echo esc_url(home_url('/contact/')); ?>"
						class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-xl font-bold hover:bg-white/10 transition whitespace-nowrap"><?php esc_html_e('Contact Us', 'kidazzle'); ?></a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php get_footer(); ?>