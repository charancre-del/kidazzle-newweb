<?php
/**
 * The template for displaying Program archives
 *
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header();

// Colors defined in the design system for cycling
$colors = ['red', 'orange', 'yellow', 'green', 'cyan', 'purple'];
?>

<!-- HERO SECTION -->
<div class="relative py-40 text-center overflow-hidden">
	<!-- Background Image -->
	<div class="absolute inset-0 z-0">
		<img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80"
			alt="<?php esc_attr_e('Children engaged in focused learning activity', 'kidazzle'); ?>"
			class="w-full h-full object-cover">
		<!-- Overlay -->
		<div class="absolute inset-0 bg-black/50"></div>
	</div>

	<!-- Content -->
	<div class="relative z-10 container mx-auto px-4">
		<h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg">
			<?php post_type_archive_title(); ?>
		</h1>
		<p class="text-xl md:text-2xl text-white max-w-3xl mx-auto font-medium drop-shadow-md">
			<?php esc_html_e('Comprehensive, curriculum-driven care for every stage of childhood.', 'kidazzle'); ?>
		</p>
	</div>
</div>

<!-- INTRO CONTENT -->
<div class="container mx-auto px-4 py-20 space-y-24">

	<!-- Philosophy -->
	<section class="text-center max-w-4xl mx-auto">
		<h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6">
			<?php esc_html_e('More Than Just Care', 'kidazzle'); ?>
		</h2>
		<p class="text-lg text-slate-600 leading-relaxed mb-8">
			<?php esc_html_e('At KIDazzle, we believe that early education is the foundation for lifelong success. Our programs are not one-size-fits-all; they are tailored to the specific developmental milestones of each age group.', 'kidazzle'); ?>
		</p>
		<div class="grid md:grid-cols-2 gap-8 text-left">
			<!-- Lesson Plans Link -->
			<a href="<?php echo esc_url(home_url('/curriculum/')); ?>"
				class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-indigo-300 hover:shadow-lg transition group">
				<h3 class="text-xl font-bold text-indigo-900 mb-2 flex items-center gap-2">
					<i data-lucide="book-open" class="text-indigo-500 group-hover:text-indigo-600"></i>
					<?php esc_html_e('Lesson Plans', 'kidazzle'); ?>
				</h3>
				<p class="text-slate-600 mb-4">
					<?php esc_html_e('Every classroom follows a structured, weekly lesson plan derived from the Creative Curriculum®. Click here to see sample plans.', 'kidazzle'); ?>
				</p>
				<span
					class="text-indigo-600 font-bold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">
					<?php esc_html_e('View Examples', 'kidazzle'); ?>
					<i data-lucide="arrow-right" class="w-4 h-4"></i>
				</span>
			</a>

			<div class="bg-slate-50 p-8 rounded-3xl border border-slate-100">
				<h3 class="text-xl font-bold text-indigo-900 mb-2 flex items-center gap-2">
					<i data-lucide="layout" class="text-indigo-500"></i>
					<?php esc_html_e('Classroom Management', 'kidazzle'); ?>
				</h3>
				<p class="text-slate-600">
					<?php esc_html_e('Our environments are intentionally designed to promote independence and positive behavior. Consistent routines create a safe space.', 'kidazzle'); ?>
				</p>
			</div>
		</div>
	</section>

	<!-- PROGRAM CARDS GRID -->
	<?php if (have_posts()): ?>
		<section class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
			<?php
			$i = 0;
			while (have_posts()):
				the_post();
				$color = $colors[$i % count($colors)];
				$age_range = get_field('kidazzle_program_age_range') ?: __('All Ages', 'kidazzle');
				$i++;
				?>
				<a href="<?php the_permalink(); ?>"
					class="group bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition flex flex-col">
					<div class="h-48 bg-<?php echo esc_attr($color); ?>-50 relative overflow-hidden">
						<?php if (has_post_thumbnail()): ?>
							<img src="<?php the_post_thumbnail_url('large'); ?>"
								class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110"
								alt="<?php the_title_attribute(); ?>">
						<?php else: ?>
							<!-- Fallback placeholder -->
							<div class="absolute inset-0 flex items-center justify-center text-<?php echo esc_attr($color); ?>-200">
								<i data-lucide="image" class="w-16 h-16"></i>
							</div>
						<?php endif; ?>
						<div
							class="absolute inset-0 bg-<?php echo esc_attr($color); ?>-900/10 group-hover:bg-transparent transition">
						</div>
					</div>
					<div class="p-8 flex flex-col flex-grow">
						<div class="flex items-center justify-between mb-2">
							<h3 class="text-2xl font-bold text-slate-900"><?php the_title(); ?></h3>
							<span
								class="bg-<?php echo esc_attr($color); ?>-100 text-<?php echo esc_attr($color); ?>-600 px-3 py-1 rounded-full text-xs font-bold"><?php echo esc_html($age_range); ?></span>
						</div>
						<div class="text-slate-500 text-sm mb-6 flex-grow line-clamp-3">
							<?php the_excerpt(); ?>
						</div>
						<span
							class="text-<?php echo esc_attr($color); ?>-500 font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">
							<?php esc_html_e('View Details', 'kidazzle'); ?>
							<i data-lucide="arrow-right" class="w-4 h-4"></i>
						</span>
					</div>
				</a>
			<?php endwhile; ?>
		</section>

		<!-- Pagination -->
		<div class="mt-12 flex justify-center">
			<?php
			the_posts_pagination(array(
				'prev_text' => '<i data-lucide="chevron-left" class="w-5 h-5"></i>',
				'next_text' => '<i data-lucide="chevron-right" class="w-5 h-5"></i>',
				'class' => 'flex gap-2'
			));
			?>
		</div>

	<?php else: ?>
		<p class="text-center text-slate-500"><?php esc_html_e('No programs found.', 'kidazzle'); ?></p>
	<?php endif; ?>

	<!-- CTA STRIP -->
	<section class="py-20 bg-white">
		<div
			class="max-w-5xl mx-auto bg-slate-900 rounded-[3rem] p-12 text-center text-white shadow-2xl relative overflow-hidden">
			<div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
				<div class="text-left">
					<h3 class="text-3xl font-extrabold mb-2">
						<?php esc_html_e('Enrollment Open Year-Round', 'kidazzle'); ?></h3>
					<p class="text-indigo-200 text-lg">
						<?php esc_html_e("Secure your child's spot in a center where learning is fun.", 'kidazzle'); ?>
					</p>
				</div>
				<div class="flex flex-col sm:flex-row gap-4 shrink-0">
					<a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
						class="bg-white text-slate-900 px-8 py-3 rounded-xl font-bold hover:bg-slate-100 transition shadow-lg whitespace-nowrap"><?php esc_html_e('Find a Location', 'kidazzle'); ?></a>
					<a href="<?php echo esc_url(home_url('/enrollment/')); ?>"
						class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-xl font-bold hover:bg-white/10 transition whitespace-nowrap"><?php esc_html_e('Apply Now', 'kidazzle'); ?></a>
				</div>
			</div>
		</div>
	</section>

</div>

<?php get_footer(); ?>