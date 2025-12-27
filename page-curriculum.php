<?php
/**
 * Template Name: Curriculum Page
 * Curriculum and Standards overview
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
	<!-- Background Image (New distinct image) -->
	<div class="absolute inset-0 z-0">
		<img src="https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-4.0.3&auto=format&fit=crop&w=3840&q=100"
			alt="<?php esc_attr_e('Teacher reading to diverse group of children', 'kidazzle'); ?>"
			class="w-full h-full object-cover">
		<!-- Overlay: 60% Fade for Text Focus -->
		<div class="absolute inset-0 bg-cyan-900/60"></div>
	</div>

	<div class="relative z-10 container mx-auto px-4 text-white">
		<i data-lucide="brain" class="w-16 h-16 mx-auto mb-4 text-cyan-400"></i>
		<h1 class="text-5xl md:text-6xl font-extrabold mb-6">
			<?php esc_html_e('Our Educational Approach', 'kidazzle'); ?></h1>
		<p class="text-xl md:text-2xl text-cyan-100 max-w-3xl mx-auto drop-shadow-md">
			<?php esc_html_e('Research-based, state-aligned, and environment-focused for every stage of development.', 'kidazzle'); ?>
		</p>
	</div>
</div>

<div class="container mx-auto px-4 py-16 max-w-6xl space-y-24">

	<!-- Core Curriculum Section: Infants & Toddlers -->
	<section class="grid md:grid-cols-2 gap-12 items-center">
		<div>
			<span
				class="text-cyan-600 font-bold uppercase tracking-widest text-sm mb-2 block"><?php esc_html_e('The Foundation', 'kidazzle'); ?></span>
			<h2 class="text-3xl font-bold text-slate-900 mb-6"><a href="<?php echo esc_url(home_url('/programs/')); ?>"
					class="hover:text-cyan-600 transition-colors"><?php esc_html_e('Creative Curriculum®', 'kidazzle'); ?></a>
				<?php esc_html_e('(Infant - 3 Years)', 'kidazzle'); ?></h2>
			<p class="text-lg text-slate-600 leading-relaxed mb-6">
				<?php esc_html_e('For our youngest learners, we utilize the nationally recognized', 'kidazzle'); ?>
				<strong><a href="<?php echo esc_url(home_url('/programs/')); ?>"
						class="text-cyan-600 hover:underline"><?php esc_html_e('Creative Curriculum®', 'kidazzle'); ?></a></strong>.
				<?php esc_html_e('This research-based framework focuses on the vital connection between caregiver and child, turning everyday moments into learning opportunities.', 'kidazzle'); ?>
			</p>
			<p class="text-lg text-slate-600 leading-relaxed">
				<?php esc_html_e('By balancing teacher-directed instruction with child-initiated exploration, we ensure every activity—whether it\'s sensory play, block building, or storytime—supports specific developmental goals in', 'kidazzle'); ?>
				<strong><?php esc_html_e('Social-Emotional, Physical, Language, and Cognitive', 'kidazzle'); ?></strong>
				<?php esc_html_e('domains.', 'kidazzle'); ?>
			</p>
		</div>
		<div class="bg-cyan-50 rounded-[3rem] p-10 border border-cyan-100 shadow-sm relative overflow-hidden">
			<div class="absolute top-0 right-0 w-32 h-32 bg-cyan-100 rounded-bl-[100px]"></div>
			<h3 class="text-xl font-bold text-cyan-900 mb-6 relative z-10">
				<?php esc_html_e('Why It Works', 'kidazzle'); ?></h3>
			<ul class="space-y-6 relative z-10">
				<li class="flex items-start gap-4">
					<div class="bg-white p-2 rounded-full shadow-sm text-green-500"><i data-lucide="smile"
							class="w-5 h-5"></i></div>
					<div>
						<strong
							class="block text-slate-900"><?php esc_html_e('Individualized Care', 'kidazzle'); ?></strong>
						<span
							class="text-slate-600 text-sm"><?php esc_html_e('Teachers adapt lessons to fit each child\'s unique temperament and pace.', 'kidazzle'); ?></span>
					</div>
				</li>
				<li class="flex items-start gap-4">
					<div class="bg-white p-2 rounded-full shadow-sm text-green-500"><i data-lucide="activity"
							class="w-5 h-5"></i></div>
					<div>
						<strong
							class="block text-slate-900"><?php esc_html_e('Active Learning', 'kidazzle'); ?></strong>
						<span
							class="text-slate-600 text-sm"><?php esc_html_e('Children learn by doing—touching, moving, and interacting with their world.', 'kidazzle'); ?></span>
					</div>
				</li>
			</ul>
		</div>
	</section>

	<!-- State-Specific Standards (Linked) -->
	<section>
		<div class="text-center mb-16">
			<h2 class="text-3xl md:text-5xl font-extrabold text-slate-900 mb-4">
				<?php esc_html_e('State-Specific Excellence', 'kidazzle'); ?></h2>
			<p class="text-lg text-slate-600 max-w-3xl mx-auto">
				<?php esc_html_e('We align our curriculum with the highest educational standards in every state we serve. Click below to explore our specific programs.', 'kidazzle'); ?>
			</p>
		</div>

		<div class="grid md:grid-cols-3 gap-8">
			<!-- Georgia Link -->
			<a href="<?php echo esc_url(home_url('/programs/ga-pre-k/')); ?>"
				class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-lg hover:shadow-2xl transition group block transform hover:-translate-y-2">
				<div
					class="bg-orange-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 text-4xl group-hover:scale-110 transition">
					🍑</div>
				<h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-orange-600 transition-colors">
					<?php esc_html_e('Georgia Pre-K', 'kidazzle'); ?></h3>
				<p class="text-sm font-bold text-orange-600 mb-4 uppercase tracking-wide">
					<?php esc_html_e('Frog Street & GELDS', 'kidazzle'); ?></p>
				<p class="text-slate-600 mb-4 leading-relaxed">
					<?php esc_html_e('Our Lottery Funded Pre-K program utilizes', 'kidazzle'); ?>
					<strong><?php esc_html_e('Frog Street', 'kidazzle'); ?></strong><?php esc_html_e(', aligned with GELDS standards for joyful, rigorous kindergarten readiness.', 'kidazzle'); ?>
				</p>
				<span
					class="text-orange-500 font-bold text-sm flex items-center gap-2"><?php esc_html_e('View GA Program', 'kidazzle'); ?>
					<i data-lucide="arrow-right" class="w-4 h-4"></i></span>
			</a>

			<!-- Tennessee Link -->
			<a href="<?php echo esc_url(home_url('/programs/tennessee/')); ?>"
				class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-lg hover:shadow-2xl transition group block transform hover:-translate-y-2">
				<div
					class="bg-indigo-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 text-4xl group-hover:scale-110 transition">
					🎸</div>
				<h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors">
					<?php esc_html_e('Tennessee', 'kidazzle'); ?></h3>
				<p class="text-sm font-bold text-indigo-600 mb-4 uppercase tracking-wide">
					<?php esc_html_e('TN-ELDS Aligned', 'kidazzle'); ?></p>
				<p class="text-slate-600 mb-4 leading-relaxed">
					<?php esc_html_e('In Memphis, our curriculum adheres to the', 'kidazzle'); ?>
					<strong><?php esc_html_e('TN-ELDS', 'kidazzle'); ?></strong><?php esc_html_e(', ensuring educational goals are met from birth to age 5.', 'kidazzle'); ?>
				</p>
				<span
					class="text-indigo-500 font-bold text-sm flex items-center gap-2"><?php esc_html_e('View TN Program', 'kidazzle'); ?>
					<i data-lucide="arrow-right" class="w-4 h-4"></i></span>
			</a>

			<!-- Florida Link -->
			<a href="<?php echo esc_url(home_url('/programs/vpk-fl/')); ?>"
				class="bg-white p-8 rounded-[2.5rem] border border-slate-100 shadow-lg hover:shadow-2xl transition group block transform hover:-translate-y-2">
				<div
					class="bg-cyan-50 w-16 h-16 rounded-2xl flex items-center justify-center mb-6 text-4xl group-hover:scale-110 transition">
					☀️</div>
				<h3 class="text-2xl font-bold text-slate-900 mb-3 group-hover:text-cyan-600 transition-colors">
					<?php esc_html_e('Florida VPK', 'kidazzle'); ?></h3>
				<p class="text-sm font-bold text-cyan-600 mb-4 uppercase tracking-wide">
					<?php esc_html_e('OWL & ASQ', 'kidazzle'); ?></p>
				<p class="text-slate-600 mb-4 leading-relaxed">
					<?php esc_html_e('Incorporating', 'kidazzle'); ?>
					<strong><?php esc_html_e('OWL', 'kidazzle'); ?></strong> <?php esc_html_e('and', 'kidazzle'); ?>
					<strong><?php esc_html_e('ASQ', 'kidazzle'); ?></strong>
					<?php esc_html_e('to meet Florida\'s VPK standards with a focus on literacy and bilingual support.', 'kidazzle'); ?>
				</p>
				<span
					class="text-cyan-500 font-bold text-sm flex items-center gap-2"><?php esc_html_e('View FL Program', 'kidazzle'); ?>
					<i data-lucide="arrow-right" class="w-4 h-4"></i></span>
			</a>
		</div>
	</section>

	<!-- Environmental Rating Scales Link Block -->
	<section
		class="bg-white border-2 border-slate-100 rounded-[3rem] p-10 shadow-xl flex flex-col items-center text-center">
		<h2 class="text-3xl font-bold text-slate-900 mb-4">
			<?php esc_html_e('The Environment as a Teacher', 'kidazzle'); ?></h2>
		<p class="text-lg text-slate-600 mb-8 leading-relaxed max-w-4xl">
			<?php esc_html_e('We adhere to rigorous environmental rating scales (ITERS/ECERS) to ensure our classrooms are not just safe, but optimally designed for learning. Every corner, toy, and routine is intentional.', 'kidazzle'); ?>
		</p>

		<div class="grid md:grid-cols-2 gap-10 w-full max-w-4xl mb-8">
			<!-- ITERS -->
			<a href="<?php echo esc_url(home_url('/environment-rating-scales/')); ?>#iters"
				class="flex items-center gap-6 p-6 rounded-3xl border border-red-100 bg-red-50/50 hover:bg-red-50 transition group text-left cursor-pointer">
				<div class="w-24 h-24 rounded-2xl overflow-hidden flex-shrink-0 border-2 border-white shadow-sm">
					<!-- Image of Baby -->
					<img src="https://images.unsplash.com/photo-1519689680058-324335c77eba?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
						alt="<?php esc_attr_e('Infant Care', 'kidazzle'); ?>" class="w-full h-full object-cover">
				</div>
				<div>
					<h4 class="font-bold text-red-900 text-xl"><?php esc_html_e('ITERS', 'kidazzle'); ?></h4>
					<p class="text-sm text-red-700 mb-2"><?php esc_html_e('Infant/Toddler Rating Scale', 'kidazzle'); ?>
					</p>
					<span
						class="text-xs font-bold text-red-500 flex items-center gap-1 group-hover:gap-2 transition-all"><?php esc_html_e('Learn More', 'kidazzle'); ?>
						<i data-lucide="arrow-right" class="w-3 h-3"></i></span>
				</div>
			</a>

			<!-- ECERS -->
			<a href="<?php echo esc_url(home_url('/environment-rating-scales/')); ?>#ecers"
				class="flex items-center gap-6 p-6 rounded-3xl border border-green-100 bg-green-50/50 hover:bg-green-50 transition group text-left cursor-pointer">
				<div class="w-24 h-24 rounded-2xl overflow-hidden flex-shrink-0 border-2 border-white shadow-sm">
					<!-- Image of Preschooler -->
					<img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80"
						alt="<?php esc_attr_e('Preschool Learning', 'kidazzle'); ?>" class="w-full h-full object-cover">
				</div>
				<div>
					<h4 class="font-bold text-green-900 text-xl"><?php esc_html_e('ECERS', 'kidazzle'); ?></h4>
					<p class="text-sm text-green-700 mb-2">
						<?php esc_html_e('Early Childhood Rating Scale', 'kidazzle'); ?></p>
					<span
						class="text-xs font-bold text-green-500 flex items-center gap-1 group-hover:gap-2 transition-all"><?php esc_html_e('Learn More', 'kidazzle'); ?>
						<i data-lucide="arrow-right" class="w-3 h-3"></i></span>
				</div>
			</a>
		</div>

		<a href="<?php echo esc_url(home_url('/environment-rating-scales/')); ?>"
			class="bg-slate-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-slate-800 transition shadow-lg"><?php esc_html_e('Explore Our Quality Standards', 'kidazzle'); ?></a>
	</section>

	<!-- Innovation Section -->
	<section class="bg-slate-900 text-white rounded-[3rem] p-12 md:p-20 relative overflow-hidden">
		<!-- Background decoration -->
		<div class="absolute top-0 right-0 w-96 h-96 bg-cyan-500 rounded-full blur-[150px] opacity-20"></div>

		<div class="relative z-10 flex flex-col md:flex-row items-center gap-12">
			<div class="md:w-1/3 flex justify-center">
				<div class="bg-white/10 p-6 rounded-3xl border border-white/20 backdrop-blur-sm">
					<i data-lucide="cpu" class="w-24 h-24 text-cyan-400"></i>
				</div>
			</div>
			<div class="md:w-2/3">
				<span
					class="text-cyan-400 font-bold uppercase tracking-widest text-sm mb-2 block"><?php esc_html_e('Future-Ready Learning', 'kidazzle'); ?></span>
				<h2 class="text-3xl md:text-4xl font-extrabold mb-6">
					<?php esc_html_e('AI-Powered Lesson Planning', 'kidazzle'); ?></h2>
				<p class="text-indigo-100 text-lg leading-relaxed mb-8">
					<?php esc_html_e('KIDazzle innovates by integrating an', 'kidazzle'); ?>
					<strong><?php esc_html_e('AI Lesson Plan Bot', 'kidazzle'); ?></strong>
					<?php esc_html_e('into our teacher resources. This tool helps educators instantly tailor the Creative Curriculum® to the specific needs of their current classroom, generating creative, standards-aligned activities in seconds. This reduces administrative time and allows teachers to focus more on interacting with your child.', 'kidazzle'); ?>
				</p>
				<a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
					class="bg-cyan-500 text-white px-8 py-3 rounded-xl font-bold hover:bg-cyan-400 transition inline-block"><?php esc_html_e('Schedule a Tour to Learn More', 'kidazzle'); ?></a>
			</div>
		</div>
	</section>

	<!-- CTA -->
	<div class="text-center">
		<h2 class="text-3xl font-bold text-slate-900 mb-6">
			<?php esc_html_e('Ready to see our curriculum in action?', 'kidazzle'); ?></h2>
		<div class="flex justify-center gap-4">
			<a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
				class="bg-slate-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-slate-800 transition shadow-lg"><?php esc_html_e('Find a Location', 'kidazzle'); ?></a>
			<a href="<?php echo esc_url(home_url('/contact/')); ?>"
				class="bg-white text-slate-900 border-2 border-slate-200 px-8 py-3 rounded-xl font-bold hover:border-cyan-500 transition"><?php esc_html_e('Apply Now', 'kidazzle'); ?></a>
		</div>
	</div>

</div>

<?php get_footer(); ?>