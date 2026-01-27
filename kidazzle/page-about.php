<?php
/**
 * Template Name: About Page
 *
 * About Us page template matching exact HTML design with proper SEO structure
 *
 * @package kidazzle_Excellence
 */

get_header();

while (have_posts()):
	the_post();
	$page_id = get_the_ID();

	// Hero Section
	$hero_badge_text = get_post_meta($page_id, 'about_hero_badge_text', true) ?: 'Since 1994';
	$hero_title = get_post_meta($page_id, 'about_hero_title', true) ?: 'More Than Childcare. <span class="text-kidazzle-yellow italic">We Are Family.</span>';
	$hero_description = get_post_meta($page_id, 'about_hero_description', true) ?: 'For over 31 years, professional families have trusted KIDazzle to provide a safe, intellectually stimulating, and loving extension of their own homes.';
	$hero_image = get_post_meta($page_id, 'about_hero_image', true) ?: 'https://images.unsplash.com/photo-1571210862729-78a52d3779a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80';

	// Mission Section
	$mission_quote = get_post_meta($page_id, 'about_mission_quote', true) ?: '"To bridge the gap between elite private education and accessible community care, ensuring every child receives the foundation they need to thrive."';

	// Story Section
	$story_title = get_post_meta($page_id, 'about_story_title', true) ?: 'From a Women\'s Shelter to a Regional Leader';
	$story_paragraph1 = get_post_meta($page_id, 'about_story_paragraph1', true) ?: 'KIDazzle was born from a mission of profound necessity. Thirty-one years ago, we opened our doors inside a women\'s shelter, dedicated to providing stability, safety, and education to families in transition. That spark of service defined our DNA.';
	$story_paragraph2 = get_post_meta($page_id, 'about_story_paragraph2', true) ?: 'As we grew, we made a strategic choice to expand into urban centers where the need for high-quality, professional early childhood education was greatest. Today, we remain an independent, family-owned organization across Georgia, Tennessee, and Florida.';
	$story_image = get_post_meta($page_id, 'about_story_image', true) ?: 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';

	$stat1_value = get_post_meta($page_id, 'about_stat1_value', true) ?: '31+';
	$stat1_label = get_post_meta($page_id, 'about_stat1_label', true) ?: 'Years Excellence';
	$stat2_value = get_post_meta($page_id, 'about_stat2_value', true) ?: '10k+';
	$stat2_label = get_post_meta($page_id, 'about_stat2_label', true) ?: 'Graduates';
	$stat3_value = get_post_meta($page_id, 'about_stat3_value', true) ?: '3';
	$stat3_label = get_post_meta($page_id, 'about_stat3_label', true) ?: 'States Served';
	$stat4_value = get_post_meta($page_id, 'about_stat4_value', true) ?: '100%';
	$stat4_label = get_post_meta($page_id, 'about_stat4_label', true) ?: 'Quality Rated';

	// Educators Section
	$educators_title = get_post_meta($page_id, 'about_educators_title', true) ?: 'The Heart of KIDazzle.';
	$educators_description = get_post_meta($page_id, 'about_educators_description', true) ?: 'We don\'t just hire supervisors; we hire career educators. Our teachers are the most valuable asset in our classrooms, selected for their passion, patience, and professional credentials.';

	$educator1_icon = get_post_meta($page_id, 'about_educator1_icon', true) ?: '🎓';
	$educator1_title = get_post_meta($page_id, 'about_educator1_title', true) ?: 'Certified & Credentialed';
	$educator1_desc = get_post_meta($page_id, 'about_educator1_desc', true) ?: 'Lead teachers hold a CDA (Child Development Associate), TCC, or higher degree in Early Childhood Education. We support ongoing education for every staff member.';

	$educator2_icon = get_post_meta($page_id, 'about_educator2_icon', true) ?: '🛡️';
	$educator2_title = get_post_meta($page_id, 'about_educator2_title', true) ?: 'Safety First';
	$educator2_desc = get_post_meta($page_id, 'about_educator2_desc', true) ?: 'Every team member undergoes rigorous federal and state background checks. All staff are certified in CPR and First Aid, with regular refresher courses.';

	$educator3_icon = get_post_meta($page_id, 'about_educator3_icon', true) ?: '📈';
	$educator3_title = get_post_meta($page_id, 'about_educator3_title', true) ?: 'Continuous Growth';
	$educator3_desc = get_post_meta($page_id, 'about_educator3_desc', true) ?: 'Our educators participate in 20+ hours of annual professional development, specializing in the KIDazzle Creative Curriculum™ curriculum and social-emotional learning.';

	// Core Values Section
	$values_title = get_post_meta($page_id, 'about_values_title', true) ?: 'The KIDazzle Standard';
	$values_description = get_post_meta($page_id, 'about_values_description', true) ?: 'Our culture is built on four non-negotiable pillars that guide every decision we make, from hiring teachers to designing playgrounds.';

	$value1_icon = get_post_meta($page_id, 'about_value1_icon', true) ?: '❤️';
	$value1_title = get_post_meta($page_id, 'about_value1_title', true) ?: 'Unconditional Joy';
	$value1_desc = get_post_meta($page_id, 'about_value1_desc', true) ?: 'We believe childhood should be magical. We prioritize laughter, play, and warmth in every interaction.';

	$value2_icon = get_post_meta($page_id, 'about_value2_icon', true) ?: '🛡️';
	$value2_title = get_post_meta($page_id, 'about_value2_title', true) ?: 'Radical Safety';
	$value2_desc = get_post_meta($page_id, 'about_value2_desc', true) ?: 'Physical safety is our baseline; emotional safety is our goal. Kids learn best when they feel secure.';

	$value3_icon = get_post_meta($page_id, 'about_value3_icon', true) ?: '🎓';
	$value3_title = get_post_meta($page_id, 'about_value3_title', true) ?: 'Academic Rigor';
	$value3_desc = get_post_meta($page_id, 'about_value3_desc', true) ?: 'Using our KIDazzle Creative Curriculum™ model, we deliver rigorous, age-appropriate learning that feels like play.';

	$value4_icon = get_post_meta($page_id, 'about_value4_icon', true) ?: '🤝';
	$value4_title = get_post_meta($page_id, 'about_value4_title', true) ?: 'Open Partnership';
	$value4_desc = get_post_meta($page_id, 'about_value4_desc', true) ?: 'Parents are partners. We maintain open doors, transparent communication, and daily updates.';

	// Vision Section
	$vision_title = get_post_meta($page_id, 'about_vision_title', true) ?: 'Vision for the Future';
	$vision_description = get_post_meta($page_id, 'about_vision_description', true) ?: 'As we look to the next 30 years, KIDazzle is committed to expanding our footprint while deepening our impact. We are constantly innovating—integrating technology like AI into our lesson planning while keeping the human connection at the center of everything we do.';

	// Nutrition Section
	$nutrition_title = get_post_meta($page_id, 'about_nutrition_title', true) ?: 'Fueling growing minds.';
	$nutrition_description = get_post_meta($page_id, 'about_nutrition_description', true) ?: 'We believe nutrition is a key part of education. Our in-house chefs prepare balanced, nut-free meals daily using fresh ingredients.';
	$nutrition_image = get_post_meta($page_id, 'about_nutrition_image', true) ?: 'https://images.unsplash.com/photo-1505576399279-565b52d4ac71?q=80&w=800&auto=format&fit=crop';

	$nutrition_bullet1_icon = get_post_meta($page_id, 'about_nutrition_bullet1_icon', true) ?: '🍎';
	$nutrition_bullet1_text = get_post_meta($page_id, 'about_nutrition_bullet1_text', true) ?: 'CACFP Certified Menus';
	$nutrition_bullet2_icon = get_post_meta($page_id, 'about_nutrition_bullet2_icon', true) ?: '🥕';
	$nutrition_bullet2_text = get_post_meta($page_id, 'about_nutrition_bullet2_text', true) ?: 'Family-Style Dining to teach manners';
	$nutrition_bullet3_icon = get_post_meta($page_id, 'about_nutrition_bullet3_icon', true) ?: '🚫';
	$nutrition_bullet3_text = get_post_meta($page_id, 'about_nutrition_bullet3_text', true) ?: 'Strict Nut-Free & Allergy Protocols';

	// Philanthropy Section
	$philanthropy_title = get_post_meta($page_id, 'about_philanthropy_title', true) ?: 'Giving back to our future.';
	$philanthropy_subtitle = get_post_meta($page_id, 'about_philanthropy_subtitle', true) ?: 'KIDazzle System Services : K.I.S.S Inc.';
	$philanthropy_description = get_post_meta($page_id, 'about_philanthropy_description', true) ?: 'At KIDazzle, our commitment extends beyond our classroom walls. Through our partnership with <strong>KIDazzle System Services : K.I.S.S Inc.</strong>, we work to ensure that quality early education is accessible to every child in our community.';
	$philanthropy_image = get_post_meta($page_id, 'about_philanthropy_image', true) ?: 'https://images.unsplash.com/photo-1593113598332-cd288d649433?q=80&w=800&auto=format&fit=crop';

	$philanthropy_bullet1_icon = get_post_meta($page_id, 'about_philanthropy_bullet1_icon', true) ?: '💙';
	$philanthropy_bullet1_text = get_post_meta($page_id, 'about_philanthropy_bullet1_text', true) ?: 'Scholarship opportunities for families';
	$philanthropy_bullet2_icon = get_post_meta($page_id, 'about_philanthropy_bullet2_icon', true) ?: '👩‍🏫';
	$philanthropy_bullet2_text = get_post_meta($page_id, 'about_philanthropy_bullet2_text', true) ?: 'Teacher training grants';
	$philanthropy_bullet3_icon = get_post_meta($page_id, 'about_philanthropy_bullet3_icon', true) ?: '🏘️';
	$philanthropy_bullet3_text = get_post_meta($page_id, 'about_philanthropy_bullet3_text', true) ?: 'Community outreach programs';

	// Leadership Section
	$leadership_title = get_post_meta($page_id, 'about_leadership_title', true) ?: 'Led by educators, not investors.';

	// CTA Section
	$cta_title = get_post_meta($page_id, 'about_cta_title', true) ?: 'Ready to join the family?';
	$cta_description = get_post_meta($page_id, 'about_cta_description', true) ?: 'Come see why over 10,000 graduates have started their journey at KIDazzle.';

	// Get Team Members
	$team_members = new WP_Query(array(
		'post_type' => 'team_member',
		'posts_per_page' => -1,
		'orderby' => 'menu_order',
		'order' => 'ASC',
	));
	?>

	<main id="main-content" role="main" class="view-section active block">
		<!-- Hero Section (High-Contrast & Refractive) -->
		<section class="relative pt-24 pb-32 lg:pt-32 lg:pb-48 overflow-hidden bg-white">
			<!-- Organic Decor -->
			<div class="absolute -right-20 -top-20 w-[600px] h-[600px] bg-kidazzle-yellow/5 rounded-full blur-[120px]">
			</div>
			<div class="absolute -left-20 top-1/2 w-96 h-96 bg-kidazzle-blue/5 rounded-full blur-[100px]"></div>

			<div class="max-w-7xl mx-auto px-4 lg:px-6 grid lg:grid-cols-2 gap-20 items-center relative z-10">
				<div class="fade-in-up">
					<?php if ($hero_badge_text): ?>
						<div
							class="inline-flex items-center gap-2 bg-brand-cream border border-kidazzle-yellow/20 px-5 py-2 rounded-full text-[10px] uppercase tracking-[0.3em] font-bold text-kidazzle-yellow shadow-sm mb-8 italic">
							<i class="fa-solid fa-star text-[8px]"></i> <?php echo esc_html($hero_badge_text); ?>
						</div>
					<?php endif; ?>

					<h1 class="font-serif text-5xl md:text-8xl text-brand-ink mb-8 leading-[1.1]">
						<?php echo wp_kses_post($hero_title); ?>
					</h1>

					<p class="text-xl text-brand-ink/60 mb-10 leading-relaxed max-w-xl">
						<?php echo esc_html($hero_description); ?>
					</p>

					<div class="flex flex-wrap gap-6">
						<a href="#story"
							class="px-10 py-5 bg-brand-ink text-white font-bold rounded-full uppercase tracking-[0.2em] text-xs hover:bg-kidazzle-blueDark transition-all shadow-xl hover:-translate-y-1">Our
							Heritage</a>
						<a href="<?php echo esc_url(home_url('/locations')); ?>"
							class="px-10 py-5 bg-white border border-brand-ink/10 text-brand-ink font-bold rounded-full uppercase tracking-[0.2em] text-xs hover:border-kidazzle-yellow hover:text-kidazzle-yellow transition-all">Find
							a Campus</a>
					</div>
				</div>

				<div class="relative fade-in-up delay-200">
					<!-- Layered Brand Frame -->
					<div class="absolute inset-0 bg-kidazzle-yellow/20 rounded-[4rem] -rotate-6 scale-95 transform"></div>
					<div
						class="absolute inset-0 bg-kidazzle-blue/10 rounded-[4rem] rotate-3 scale-100 transform translate-x-4">
					</div>
					<div
						class="relative rounded-[4rem] overflow-hidden shadow-[0_32px_64px_-16px_rgba(0,0,0,0.2)] border-8 border-white aspect-[4/5] md:aspect-square">
						<img src="<?php echo esc_url($hero_image); ?>"
							alt="<?php echo esc_attr(strip_tags($hero_title)); ?>" class="w-full h-full object-cover" />
					</div>
				</div>
			</div>
		</section>

		<!-- Mission Statement -->
		<section id="mission" class="py-20 bg-kidazzle-blue text-white relative overflow-hidden">
			<div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5">
			</div>
			<div class="max-w-5xl mx-auto px-4 lg:px-6 text-center relative z-10">
				<span class="text-kidazzle-yellow font-bold tracking-[0.2em] text-xs uppercase mb-6 block">Our
					Purpose</span>
				<h2 class="text-3xl md:text-5xl font-serif leading-tight mb-8 px-4">
					<?php echo esc_html($mission_quote); ?>
				</h2>
				<div class="w-24 h-1 bg-kidazzle-yellow mx-auto rounded-full"></div>
			</div>
		</section>

		<!-- Our Story / Statistics -->
		<section id="story" class="py-24 bg-white">
			<div class="max-w-7xl mx-auto px-4 lg:px-6">
				<div class="grid md:grid-cols-2 gap-16 items-center mb-20">
					<div class="order-2 md:order-1 relative">
						<div class="absolute -left-10 -top-10 w-40 h-40 bg-kidazzle-red/10 rounded-full blur-2xl"></div>
						<div class="relative rounded-[2.5rem] overflow-hidden shadow-card border border-brand-ink/5 z-10">
							<img src="<?php echo esc_url($story_image); ?>" class="w-full h-full object-cover"
								alt="Our Story" />
						</div>
					</div>
					<div class="order-1 md:order-2">
						<span class="text-kidazzle-red font-bold tracking-[0.2em] text-xs uppercase mb-3 block italic">Our
							Heritage</span>
						<h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-ink mb-6">
							<?php echo esc_html($story_title); ?>
						</h2>
						<div class="prose prose-slate text-brand-ink/80 leading-relaxed max-w-none">
							<p class="mb-4 font-medium"><?php echo esc_html($story_paragraph1); ?></p>
							<p class="mb-4"><?php echo esc_html($story_paragraph2); ?></p>
						</div>
					</div>
				</div>

				<div class="grid grid-cols-2 md:grid-cols-4 gap-6">
					<?php
					$stats = array(
						array('value' => $stat1_value, 'label' => $stat1_label, 'color' => 'kidazzle-blue'),
						array('value' => $stat2_value, 'label' => $stat2_label, 'color' => 'kidazzle-red'),
						array('value' => $stat3_value, 'label' => $stat3_label, 'color' => 'kidazzle-yellow'),
						array('value' => $stat4_value, 'label' => $stat4_label, 'color' => 'kidazzle-green'),
					);

					foreach ($stats as $stat):
						if ($stat['value']):
							?>
							<div
								class="p-8 bg-brand-cream rounded-[2rem] text-center border border-brand-ink/5 shadow-sm hover:shadow-md transition-shadow">
								<div
									class="text-3xl md:text-4xl font-serif font-bold text-<?php echo esc_attr($stat['color']); ?> mb-2">
									<?php echo esc_html($stat['value']); ?>
								</div>
								<div class="text-[10px] font-bold uppercase tracking-wider text-brand-ink/60">
									<?php echo esc_html($stat['label']); ?>
								</div>
							</div>
						<?php endif; endforeach; ?>
				</div>
			</div>
		</section>

		<!-- Our Educators -->
		<section id="educators" class="py-24 bg-brand-cream border-t border-brand-ink/5">
			<div class="max-w-7xl mx-auto px-4 lg:px-6">
				<div class="text-center mb-16 max-w-3xl mx-auto">
					<span class="text-kidazzle-red font-bold tracking-[0.2em] text-xs uppercase mb-3 block">Our
						Educators</span>
					<h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-ink mb-4">
						<?php echo esc_html($educators_title); ?>
					</h2>
					<p class="text-brand-ink/80"><?php echo esc_html($educators_description); ?></p>
				</div>

				<div class="grid md:grid-cols-3 gap-10">
					<?php
					$educators = array(
						array('icon' => $educator1_icon, 'title' => $educator1_title, 'desc' => $educator1_desc, 'color' => 'kidazzle-red'),
						array('icon' => $educator2_icon, 'title' => $educator2_title, 'desc' => $educator2_desc, 'color' => 'kidazzle-blue'),
						array('icon' => $educator3_icon, 'title' => $educator3_title, 'desc' => $educator3_desc, 'color' => 'kidazzle-green'),
					);

					foreach ($educators as $educator):
						if ($educator['title']):
							?>
							<div
								class="group relative bg-white p-10 rounded-[3rem] shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
								<!-- Brand Accent Bar -->
								<div
									class="absolute top-0 left-0 w-full h-1.5 bg-<?php echo esc_attr($educator['color']); ?>/10 overflow-hidden rounded-t-[3rem]">
									<div
										class="h-full bg-<?php echo esc_attr($educator['color']); ?> w-0 group-hover:w-full transition-all duration-700">
									</div>
								</div>

								<div
									class="w-16 h-16 bg-white shadow-lg text-<?php echo esc_attr($educator['color']); ?> rounded-2xl flex items-center justify-center text-4xl mb-8 border border-<?php echo esc_attr($educator['color']); ?>/10 group-hover:bg-<?php echo esc_attr($educator['color']); ?> group-hover:text-white transition-all duration-300">
									<?php echo esc_html($educator['icon']); ?>
								</div>
								<h3 class="font-serif text-2xl font-bold text-brand-ink mb-4">
									<?php echo esc_html($educator['title']); ?>
								</h3>
								<p class="text-brand-ink/60 leading-relaxed text-sm">
									<?php echo esc_html($educator['desc']); ?>
								</p>
							</div>
						<?php endif; endforeach; ?>
				</div>
			</div>
		</section>

		<!-- Core Values -->
		<section id="values" class="py-24 bg-brand-ink text-white relative overflow-hidden">
			<div
				class="absolute right-0 top-0 w-full h-full bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white/5 via-transparent to-transparent">
			</div>

			<div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10">
				<div class="text-center mb-16">
					<span class="text-kidazzle-yellow font-bold tracking-[0.2em] text-xs uppercase mb-3 block">Our
						Values</span>
					<h2 class="text-3xl md:text-4xl font-serif font-bold mb-4"><?php echo esc_html($values_title); ?></h2>
					<p class="text-white/60 max-w-2xl mx-auto"><?php echo esc_html($values_description); ?></p>
				</div>

				<div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
					<?php
					$values_data = array(
						array('icon' => $value1_icon, 'title' => $value1_title, 'desc' => $value1_desc, 'color' => 'kidazzle-red'),
						array('icon' => $value2_icon, 'title' => $value2_title, 'desc' => $value2_desc, 'color' => 'kidazzle-blue'),
						array('icon' => $value3_icon, 'title' => $value3_title, 'desc' => $value3_desc, 'color' => 'kidazzle-yellow'),
						array('icon' => $value4_icon, 'title' => $value4_title, 'desc' => $value4_desc, 'color' => 'kidazzle-green'),
					);

					foreach ($values_data as $v_item):
						if ($v_item['title']):
							?>
							<div
								class="bg-white/5 backdrop-blur-sm p-8 rounded-3xl border border-white/10 hover:bg-white/10 transition-colors">
								<div
									class="w-12 h-12 bg-<?php echo esc_attr($v_item['color']); ?> rounded-xl flex items-center justify-center mb-6 text-3xl text-white">
									<?php echo esc_html($v_item['icon']); ?>
								</div>
								<h3 class="font-serif text-xl font-bold mb-3"><?php echo esc_html($v_item['title']); ?></h3>
								<p class="text-sm text-white/70"><?php echo esc_html($v_item['desc']); ?></p>
							</div>
						<?php endif; endforeach; ?>
				</div>
			</div>
		</section>

		<!-- Nutrition & Wellness -->
		<section class="py-24 bg-white border-t border-brand-ink/5">
			<div class="max-w-6xl mx-auto px-4 lg:px-6 grid md:grid-cols-2 gap-16 items-center">
				<div>
					<span
						class="text-kidazzle-green font-bold tracking-[0.2em] text-xs uppercase mb-3 block">Wellness</span>
					<h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-ink mb-6">
						<?php echo esc_html($nutrition_title); ?>
					</h2>
					<p class="text-brand-ink/80 mb-8">
						<?php echo esc_html($nutrition_description); ?>
					</p>
					<ul class="space-y-4">
						<?php if ($nutrition_bullet1_text): ?>
							<li class="flex items-center gap-4 group">
								<div
									class="w-10 h-10 bg-kidazzle-red/10 text-kidazzle-red rounded-full flex items-center justify-center shrink-0 group-hover:bg-kidazzle-red group-hover:text-white transition-colors">
									<?php echo esc_html($nutrition_bullet1_icon); ?>
								</div>
								<span class="font-bold text-slate-700"><?php echo esc_html($nutrition_bullet1_text); ?></span>
							</li>
						<?php endif; ?>
						<?php if ($nutrition_bullet2_text): ?>
							<li class="flex items-center gap-4 group">
								<div
									class="w-10 h-10 bg-kidazzle-orange/10 text-kidazzle-orange rounded-full flex items-center justify-center shrink-0 group-hover:bg-kidazzle-orange group-hover:text-white transition-colors">
									<?php echo esc_html($nutrition_bullet2_icon); ?>
								</div>
								<span class="font-bold text-slate-700"><?php echo esc_html($nutrition_bullet2_text); ?></span>
							</li>
						<?php endif; ?>
						<?php if ($nutrition_bullet3_text): ?>
							<li class="flex items-center gap-4 group">
								<div
									class="w-10 h-10 bg-brand-ink/5 text-brand-ink/60 rounded-full flex items-center justify-center shrink-0 group-hover:bg-brand-ink group-hover:text-white transition-colors">
									<?php echo esc_html($nutrition_bullet3_icon); ?>
								</div>
								<span class="font-bold text-slate-700"><?php echo esc_html($nutrition_bullet3_text); ?></span>
							</li>
						<?php endif; ?>
					</ul>
				</div>
				<div class="relative h-[450px] rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white">
					<img src="<?php echo esc_url($nutrition_image); ?>" class="w-full h-full object-cover"
						alt="<?php echo esc_attr($nutrition_title); ?>" />
				</div>
			</div>
		</section>

		<!-- Philanthropy -->
		<section class="py-24 bg-brand-cream border-t border-brand-ink/5">
			<div class="max-w-6xl mx-auto px-4 lg:px-6 grid md:grid-cols-2 gap-16 items-center">
				<div
					class="order-2 md:order-1 relative h-[450px] rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white">
					<img src="<?php echo esc_url($philanthropy_image); ?>" class="w-full h-full object-cover"
						alt="<?php echo esc_attr($philanthropy_title); ?>" />
				</div>
				<div class="order-1 md:order-2">
					<span
						class="text-kidazzle-blue font-bold tracking-[0.2em] text-xs uppercase mb-3 block">Community</span>
					<h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-ink mb-4">
						<?php echo esc_html($philanthropy_title); ?>
					</h2>
					<?php if ($philanthropy_subtitle): ?>
						<h3 class="text-xl font-bold text-kidazzle-blue mb-4"><?php echo esc_html($philanthropy_subtitle); ?>
						</h3>
					<?php endif; ?>
					<div class="prose prose-slate text-brand-ink/80 mb-8 leading-relaxed max-w-none">
						<?php echo wp_kses_post($philanthropy_description); ?>
					</div>
					<ul class="space-y-4">
						<?php if ($philanthropy_bullet1_text): ?>
							<li class="flex items-center gap-4 group">
								<div
									class="w-10 h-10 bg-kidazzle-red/10 text-kidazzle-red rounded-full flex items-center justify-center shrink-0 group-hover:bg-kidazzle-red group-hover:text-white transition-colors">
									<?php echo esc_html($philanthropy_bullet1_icon); ?>
								</div>
								<span
									class="font-bold text-slate-700"><?php echo esc_html($philanthropy_bullet1_text); ?></span>
							</li>
						<?php endif; ?>
						<?php if ($philanthropy_bullet2_text): ?>
							<li class="flex items-center gap-4 group">
								<div
									class="w-10 h-10 bg-kidazzle-yellow/10 text-kidazzle-yellow rounded-full flex items-center justify-center shrink-0 group-hover:bg-kidazzle-yellow group-hover:text-white transition-colors">
									<?php echo esc_html($philanthropy_bullet2_icon); ?>
								</div>
								<span
									class="font-bold text-slate-700"><?php echo esc_html($philanthropy_bullet2_text); ?></span>
							</li>
						<?php endif; ?>
						<?php if ($philanthropy_bullet3_text): ?>
							<li class="flex items-center gap-4 group">
								<div
									class="w-10 h-10 bg-kidazzle-green/10 text-kidazzle-green rounded-full flex items-center justify-center shrink-0 group-hover:bg-kidazzle-green group-hover:text-white transition-colors">
									<?php echo esc_html($philanthropy_bullet3_icon); ?>
								</div>
								<span
									class="font-bold text-slate-700"><?php echo esc_html($philanthropy_bullet3_text); ?></span>
							</li>
						<?php endif; ?>
					</ul>
				</div>
			</div>
		</section>

		<!-- Vision 2030 -->
		<section class="py-24 bg-brand-ink text-white relative overflow-hidden">
			<!-- Background Pattern -->
			<div class="absolute inset-0 opacity-5 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
			</div>
			<div class="absolute -right-20 -top-20 w-96 h-96 bg-kidazzle-blue/10 rounded-full blur-3xl"></div>

			<div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10 text-center">
				<span class="text-kidazzle-yellow font-bold tracking-[0.2em] text-xs uppercase mb-6 block">Vision
					2030</span>
				<h2 class="text-3xl md:text-5xl font-serif leading-tight mb-8 max-w-4xl mx-auto">
					<?php echo esc_html($vision_title); ?>
				</h2>
				<p class="text-lg md:text-xl text-white/70 max-w-3xl mx-auto leading-relaxed mb-16">
					<?php echo esc_html($vision_description); ?>
				</p>

				<div class="grid grid-cols-2 md:grid-cols-4 gap-8 border-t border-white/10 pt-16 max-w-5xl mx-auto">
					<div class="text-center group">
						<div
							class="text-4xl md:text-5xl font-serif font-bold text-kidazzle-yellow mb-2 group-hover:scale-110 transition-transform">
							31+</div>
						<div class="text-[10px] font-bold text-white/40 uppercase tracking-widest whitespace-nowrap">Years
							of Excellence</div>
					</div>
					<div class="text-center group">
						<div
							class="text-4xl md:text-5xl font-serif font-bold text-kidazzle-red mb-2 group-hover:scale-110 transition-transform">
							10k+</div>
						<div class="text-[10px] font-bold text-white/40 uppercase tracking-widest whitespace-nowrap">
							Students Graduated</div>
					</div>
					<div class="text-center group">
						<div
							class="text-4xl md:text-5xl font-serif font-bold text-kidazzle-blue mb-2 group-hover:scale-110 transition-transform">
							3</div>
						<div class="text-[10px] font-bold text-white/40 uppercase tracking-widest whitespace-nowrap">States
							Served</div>
					</div>
					<div class="text-center group">
						<div
							class="text-4xl md:text-5xl font-serif font-bold text-kidazzle-green mb-2 group-hover:scale-110 transition-transform">
							100%</div>
						<div class="text-[10px] font-bold text-white/40 uppercase tracking-widest whitespace-nowrap">Quality
							Rated</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Final CTA -->
		<section class="py-32 bg-white text-center">
			<div class="max-w-4xl mx-auto px-4 lg:px-6">
				<div
					class="inline-flex items-center gap-2 bg-kidazzle-blue/5 border border-kidazzle-blue/20 px-4 py-1.5 rounded-full text-[10px] uppercase tracking-widest font-bold text-kidazzle-blue mb-8">
					Get Started
				</div>
				<h2 class="font-serif text-3xl md:text-5xl font-bold text-brand-ink mb-8">
					<?php echo esc_html($cta_title); ?>
				</h2>
				<p class="text-lg text-brand-ink/90 mb-12 max-w-2xl mx-auto"><?php echo esc_html($cta_description); ?></p>
				<div class="flex flex-wrap justify-center gap-6">
					<a href="<?php echo esc_url(home_url('/locations')); ?>"
						class="px-10 py-5 bg-white border-2 border-brand-ink/10 text-brand-ink font-bold rounded-full uppercase tracking-widest text-xs hover:border-kidazzle-blue hover:text-kidazzle-blue transition-all">Find
						a Location</a>
					<a href="<?php echo esc_url(home_url('/locations#tour')); ?>"
						class="px-10 py-5 bg-kidazzle-blue text-white font-bold rounded-full uppercase tracking-widest text-xs hover:bg-brand-ink transition-all shadow-xl hover:-translate-y-1">Schedule
						a Tour</a>
				</div>
			</div>
		</section>
	</main>

	<style>
		.fade-in-up {
			animation: fadeInUp 0.8s ease forwards;
			opacity: 0;
			transform: translateY(20px);
		}

		.delay-100 {
			animation-delay: 0.1s;
		}

		.delay-200 {
			animation-delay: 0.2s;
		}

		@keyframes fadeInUp {
			to {
				opacity: 1;
				transform: translateY(0);
			}
		}
	</style>

	<!-- Bio Modal -->
	<div id="kidazzle-bio-modal"
		class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-brand-ink/80 backdrop-blur-sm"
		role="dialog" aria-modal="true" aria-labelledby="kidazzle-bio-modal-title">
		<div
			class="bg-white rounded-[2rem] max-w-5xl w-full max-h-[90vh] overflow-hidden shadow-2xl relative flex flex-col">
			<button id="kidazzle-bio-close"
				class="absolute top-6 right-6 text-brand-ink/80 hover:text-kidazzle-red transition-colors z-10 bg-white/50 rounded-full p-2"
				aria-label="Close modal">
				<i class="fa-solid fa-xmark text-2xl"></i>
			</button>

			<div class="flex-grow overflow-y-auto p-8 md:p-12">
				<div class="grid md:grid-cols-2 gap-12 items-start">
					<!-- Image Column -->
					<div class="relative sticky top-0">
						<div id="kidazzle-bio-modal-image"
							class="aspect-[3/4] rounded-2xl overflow-hidden bg-brand-cream shadow-lg flex items-center justify-center">
							<!-- Image injected here -->
							<i class="fa-solid fa-user text-6xl text-brand-ink/10"></i>
						</div>
						<div class="mt-6 text-center md:text-left">
							<h3 id="kidazzle-bio-modal-title"
								class="font-serif text-3xl font-bold text-brand-ink mb-2 leading-tight"></h3>
							<p id="kidazzle-bio-modal-subtitle"
								class="text-sm font-bold uppercase tracking-wider text-kidazzle-blue"></p>
						</div>
					</div>

					<!-- Content Column -->
					<div id="kidazzle-bio-modal-content" class="prose prose-lg text-brand-ink/90">
						<!-- Bio content injected here -->
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const modal = document.getElementById('kidazzle-bio-modal');
			const closeBtn = document.getElementById('kidazzle-bio-close');
			const title = document.getElementById('kidazzle-bio-modal-title');
			const subtitle = document.getElementById('kidazzle-bio-modal-subtitle');
			const content = document.getElementById('kidazzle-bio-modal-content');
			let lastFocusedElement;

			function openModal(btn) {
				const targetId = btn.getAttribute('data-bio-target');
				const name = btn.getAttribute('data-member-name');
				const jobTitle = btn.getAttribute('data-member-title');
				const imageUrl = btn.getAttribute('data-member-image');
				const sourceContent = document.getElementById(targetId);

				if (sourceContent) {
					lastFocusedElement = btn;
					title.textContent = name;
					subtitle.textContent = jobTitle || '';
					content.innerHTML = sourceContent.innerHTML;

					// Populate image if available
					const imageContainer = document.getElementById('kidazzle-bio-modal-image');
					if (imageUrl && imageContainer) {
						imageContainer.innerHTML = `<img src="${imageUrl}" alt="${name}" class="w-full h-full object-cover">`;
					} else if (imageContainer) {
						// Reset to placeholder if no image
						imageContainer.innerHTML = '<i class="fa-solid fa-user text-6xl text-white/30"></i>';
					}

					modal.classList.remove('hidden');
					closeBtn.focus();
					document.body.style.overflow = 'hidden';

					// Trap focus
					modal.addEventListener('keydown', trapFocus);
				}
			}

			function closeModal() {
				modal.classList.add('hidden');
				document.body.style.overflow = '';
				if (lastFocusedElement) lastFocusedElement.focus();
				modal.removeEventListener('keydown', trapFocus);
			}

			function trapFocus(e) {
				if (e.key === 'Escape') {
					closeModal();
					return;
				}
				if (e.key === 'Tab') {
					// Simple focus trap
					const focusableContent = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
					const first = focusableContent[0];
					const last = focusableContent[focusableContent.length - 1];

					if (e.shiftKey) {
						if (document.activeElement === first) {
							last.focus();
							e.preventDefault();
						}
					} else {
						if (document.activeElement === last) {
							first.focus();
							e.preventDefault();
						}
					}
				}
			}

			document.querySelectorAll('.kidazzle-read-bio-btn').forEach(btn => {
				btn.addEventListener('click', () => openModal(btn));
			});

			if (closeBtn) closeBtn.addEventListener('click', closeModal);

			if (modal) modal.addEventListener('click', (e) => {
				if (e.target === modal) closeModal();
			});
		});
	</script>

	<?php
endwhile;
get_footer();
