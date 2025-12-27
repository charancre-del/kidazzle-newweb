<?php
/**
 * The template for displaying all single program posts
 *
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();

while (have_posts()):
	the_post();
	?>

	<!-- Hero Section -->
	<div class="relative py-32 text-center overflow-hidden">
		<div class="absolute inset-0 z-0">
			<?php if (has_post_thumbnail()): ?>
				<img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title_attribute(); ?>"
					class="w-full h-full object-cover">
			<?php else: ?>
				<img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
					alt="<?php esc_attr_e('Program Hero', 'kidazzle'); ?>" class="w-full h-full object-cover">
			<?php endif; ?>
			<div class="absolute inset-0 bg-indigo-900/60"></div>
		</div>
		<div class="relative z-10 container mx-auto px-4 text-white">
			<span
				class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10">
				<?php echo esc_html(get_field('kidazzle_program_age_range') ?: __('Our Program', 'kidazzle')); ?>
			</span>
			<h1 class="text-4xl md:text-6xl font-extrabold mb-6"><?php the_title(); ?></h1>
		</div>
	</div>

	<div class="container mx-auto px-4 py-16">
		<div class="grid lg:grid-cols-3 gap-12">

			<!-- Main Content -->
			<main class="lg:col-span-2 space-y-8 text-lg text-slate-700 leading-relaxed">
				<?php the_content(); ?>

				<!-- Example Fallback Content if empty -->
				<?php if (!get_the_content()): ?>
					<p>
						<?php esc_html_e('Our curriculum is designed to spark curiosity and foster a love for learning. We provide a safe, nurturing environment where children can explore, discover, and grow.', 'kidazzle'); ?>
					</p>
					<h3 class="text-2xl font-bold text-slate-900 mt-8 mb-4"><?php esc_html_e('A Typical Day', 'kidazzle'); ?>
					</h3>
					<ul class="space-y-3">
						<li class="flex items-center gap-3"><i data-lucide="sun" class="text-yellow-500"></i>
							<?php esc_html_e('Morning Circle & Story Time', 'kidazzle'); ?></li>
						<li class="flex items-center gap-3"><i data-lucide="palette" class="text-purple-500"></i>
							<?php esc_html_e('Creative Arts & Expression', 'kidazzle'); ?></li>
						<li class="flex items-center gap-3"><i data-lucide="users" class="text-blue-500"></i>
							<?php esc_html_e('Social Play & Outdoor Activities', 'kidazzle'); ?></li>
					</ul>
				<?php endif; ?>

				<div class="mt-12 p-8 bg-indigo-50 rounded-3xl border border-indigo-100">
					<h3 class="text-xl font-bold text-indigo-900 mb-4">
						<?php esc_html_e('Program Highlights', 'kidazzle'); ?></h3>
					<div class="grid sm:grid-cols-2 gap-4">
						<div class="flex items-start gap-3">
							<i data-lucide="check-circle-2" class="w-5 h-5 text-indigo-600 mt-1"></i>
							<span><?php esc_html_e('Age-Appropriate Curriculum', 'kidazzle'); ?></span>
						</div>
						<div class="flex items-start gap-3">
							<i data-lucide="check-circle-2" class="w-5 h-5 text-indigo-600 mt-1"></i>
							<span><?php esc_html_e('Experienced Educators', 'kidazzle'); ?></span>
						</div>
						<div class="flex items-start gap-3">
							<i data-lucide="check-circle-2" class="w-5 h-5 text-indigo-600 mt-1"></i>
							<span><?php esc_html_e('Safe & Secure Environment', 'kidazzle'); ?></span>
						</div>
						<div class="flex items-start gap-3">
							<i data-lucide="check-circle-2" class="w-5 h-5 text-indigo-600 mt-1"></i>
							<span><?php esc_html_e('Nutritious Meals Included', 'kidazzle'); ?></span>
						</div>
					</div>
				</div>
			</main>

			<!-- Sidebar / Enroll CTA -->
			<aside class="space-y-8">
				<div class="bg-white p-8 rounded-3xl shadow-xl border border-slate-100 sticky top-32">
					<h3 class="text-2xl font-bold text-slate-900 mb-6"><?php esc_html_e('Join This Program', 'kidazzle'); ?>
					</h3>
					<p class="text-slate-600 mb-6">
						<?php esc_html_e('Spots fill up quickly! Schedule a tour today to secure your child’s future.', 'kidazzle'); ?>
					</p>

					<div class="space-y-4">
						<a href="<?php echo esc_url(home_url('/enrollment/')); ?>"
							class="block w-full bg-indigo-600 text-white text-center font-bold py-3 rounded-xl hover:bg-indigo-700 transition shadow-lg">
							<?php esc_html_e('Apply Now', 'kidazzle'); ?>
						</a>
						<a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
							class="block w-full bg-white border-2 border-slate-200 text-slate-700 text-center font-bold py-3 rounded-xl hover:border-indigo-600 hover:text-indigo-600 transition">
							<?php esc_html_e('Find Nearest Location', 'kidazzle'); ?>
						</a>
					</div>

					<hr class="my-8 border-slate-100">

					<div class="text-center">
						<p class="font-bold text-slate-900 mb-2"><?php esc_html_e('Have Questions?', 'kidazzle'); ?></p>
						<a href="tel:8774101002"
							class="flex items-center justify-center gap-2 text-indigo-600 font-bold text-lg hover:underline">
							<i data-lucide="phone" class="w-5 h-5"></i> 877-410-1002
						</a>
					</div>
				</div>
			</aside>

		</div>
	</div>

<?php
endwhile;
get_footer();
?>