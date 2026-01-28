<?php
/**
 * Template Name: Programs Page
 *
 * @package kidazzle_Excellence
 */

get_header();

// Get all programs
$programs_query = new WP_Query(array(
	'post_type' => 'program',
	'posts_per_page' => -1,
	'orderby' => 'menu_order',
	'order' => 'ASC',
));
?>

<main class="font-sans text-slate-800 bg-white selection:bg-yellow-200">
	<!-- HERO SECTION -->
    <div class="relative py-40 text-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
			<?php if (has_post_thumbnail()): ?>
				<?php the_post_thumbnail('full', array('class' => 'w-full h-full object-cover')); ?>
			<?php else: ?>
             	<img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" alt="Children engaged in focused learning activity" class="w-full h-full object-cover">
			<?php endif; ?>
             <!-- 50% Fade Overlay (Darker) -->
             <div class="absolute inset-0 bg-black/50"></div>
        </div>
       
        <!-- Content -->
        <div class="relative z-10 container mx-auto px-4">
            <h1 class="text-5xl md:text-6xl font-extrabold text-white mb-6 drop-shadow-lg"><?php the_title(); ?></h1>
            <p class="text-xl md:text-2xl text-white max-w-3xl mx-auto font-medium drop-shadow-md">Comprehensive, curriculum-driven care for every stage of childhood.</p>
        </div>
    </div>

    <!-- INTRO CONTENT -->
    <div class="container mx-auto px-4 py-20 space-y-24">
       
        <!-- Philosophy of Programs -->
        <section class="text-center max-w-4xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 mb-6">More Than Just Care</h2>
            <div class="text-lg text-slate-600 leading-relaxed mb-8">
				<?php if (have_posts()) : while (have_posts()) : the_post(); the_content(); endwhile; endif; ?>
                <p>At KIDazzle, we believe that early education is the foundation for lifelong success. Our programs are not one-size-fits-all; they are tailored to the specific developmental milestones of each age group.</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8 text-left">
                <!-- Linked Lesson Plans Card -->
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100 hover:border-indigo-300 hover:shadow-lg transition group">
                    <h3 class="text-xl font-bold text-indigo-900 mb-2 flex items-center gap-2">
                        <i class="fa-solid fa-book-open text-indigo-500 group-hover:text-indigo-600"></i> Lesson Plans
                    </h3>
                    <p class="text-slate-600 mb-4">Every classroom follows a structured, weekly lesson plan derived from the Creative Curriculum®. Click specific programs to see details.</p>
                    <a href="<?php echo esc_url(kidazzle_get_program_archive_url()); ?>" class="text-indigo-600 font-bold text-sm flex items-center gap-1 group-hover:gap-2 transition-all">View Curriculum <i class="fa-solid fa-arrow-right"></i></a>
                </div>
               
                <div class="bg-slate-50 p-8 rounded-3xl border border-slate-100">
                    <h3 class="text-xl font-bold text-indigo-900 mb-2 flex items-center gap-2"><i class="fa-solid fa-chalkboard-user text-indigo-500"></i> Classroom Management</h3>
                    <p class="text-slate-600">Our environments are intentionally designed to promote independence and positive behavior. Consistent routines and clear expectations create a safe space for learning.</p>
                </div>
            </div>
        </section>

        <!-- PROGRAM CARDS GRID -->
        <section class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
			<?php 
			if ($programs_query->have_posts()): 
				$color_map = [
					'infant' => ['bg' => 'bg-red-50', 'text' => 'text-red-900', 'badge' => 'bg-red-100 text-red-600', 'btn' => 'text-red-500', 'overlay' => 'bg-red-900/10'],
					'toddler' => ['bg' => 'bg-orange-50', 'text' => 'text-orange-900', 'badge' => 'bg-orange-100 text-orange-600', 'btn' => 'text-orange-500', 'overlay' => 'bg-orange-900/10'],
					'preschool' => ['bg' => 'bg-yellow-50', 'text' => 'text-yellow-900', 'badge' => 'bg-yellow-100 text-yellow-600', 'btn' => 'text-yellow-500', 'overlay' => 'bg-yellow-900/10'],
					'prek' => ['bg' => 'bg-green-50', 'text' => 'text-green-900', 'badge' => 'bg-green-100 text-green-600', 'btn' => 'text-green-600', 'overlay' => 'bg-green-900/10'],
					'vpk' => ['bg' => 'bg-cyan-50', 'text' => 'text-slate-900', 'badge' => 'bg-cyan-100 text-cyan-600', 'btn' => 'text-cyan-600', 'overlay' => 'bg-cyan-900/10'], // VPK specific
					'schoolage' => ['bg' => 'bg-purple-50', 'text' => 'text-slate-900', 'badge' => 'bg-purple-100 text-purple-600', 'btn' => 'text-purple-600', 'overlay' => 'bg-purple-900/10'],
				];
				
				while ($programs_query->have_posts()):
					$programs_query->the_post();
					$slug = get_post_field('post_name');
					// Fallback to toddler colors if slug not found, or try fuzzy matching
					$colors = $color_map[$slug] ?? null;
					if (!$colors) {
						foreach ($color_map as $key => $val) {
							if (strpos($slug, $key) !== false) {
								$colors = $val;
								break;
							}
						}
						if (!$colors) $colors = $color_map['toddler'];
					}

					$age_range = get_post_meta(get_the_ID(), 'program_age_range', true);
					$excerpt = has_excerpt() ? get_the_excerpt() : wp_trim_words(get_the_content(), 15);
					$prog_img = get_the_post_thumbnail_url(get_the_ID(), 'large') ?: 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
			?>
            <!-- Program Card -->
            <a href="<?php the_permalink(); ?>" class="group bg-white border border-slate-100 rounded-[2.5rem] overflow-hidden shadow-lg hover:shadow-2xl transition flex flex-col">
                <div class="h-48 <?php echo $colors['bg']; ?> relative overflow-hidden">
                    <img src="<?php echo esc_url($prog_img); ?>" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="<?php the_title_attribute(); ?>">
                    <div class="absolute inset-0 <?php echo $colors['overlay']; ?> group-hover:bg-transparent transition"></div>
                </div>
                <div class="p-8 flex flex-col flex-grow">
                    <div class="flex items-center justify-between mb-2">
                        <h3 class="text-2xl font-bold text-slate-900"><?php the_title(); ?></h3>
                        <?php if ($age_range): ?>
                        <span class="<?php echo $colors['badge']; ?> px-3 py-1 rounded-full text-xs font-bold"><?php echo esc_html($age_range); ?></span>
                        <?php endif; ?>
                    </div>
                    <p class="text-slate-500 text-sm mb-6 flex-grow"><?php echo esc_html($excerpt); ?></p>
                    <span class="<?php echo $colors['btn']; ?> font-bold text-sm flex items-center gap-2 group-hover:gap-3 transition-all">View Details <i class="fa-solid fa-arrow-right"></i></span>
                </div>
            </a>
			<?php endwhile; wp_reset_postdata(); endif; ?>
        </section>

        <!-- CTA STRIP -->
        <section class="py-20 bg-white">
            <div class="max-w-5xl mx-auto bg-slate-900 rounded-[3rem] p-12 text-center text-white shadow-2xl relative overflow-hidden">
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                    <div class="text-left">
                        <h3 class="text-3xl font-extrabold mb-2">Enrollment Open Year-Round</h3>
                        <p class="text-indigo-200 text-lg">Secure your child's spot in a center where learning is fun and futures are bright.</p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 shrink-0">
                        <a href="<?php echo esc_url(home_url('/locations')); ?>" class="bg-white text-slate-900 px-8 py-3 rounded-xl font-bold hover:bg-slate-100 transition shadow-lg whitespace-nowrap">Find a Location</a>
                        <a href="<?php echo esc_url(home_url('/schedule-tour')); ?>" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-xl font-bold hover:bg-white/10 transition whitespace-nowrap">Apply Now</a>
                    </div>
                </div>
            </div>
        </section>

    </div>
</main>

<?php
get_footer();
