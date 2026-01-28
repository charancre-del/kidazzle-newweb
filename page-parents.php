<?php
/**
 * Template Name: Parents Page
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

get_header();

$page_id = get_the_ID();

// Hero Section
$hero_badge = get_post_meta($page_id, 'parents_hero_badge', true) ?: 'Parent Dashboard';
$hero_title = get_post_meta($page_id, 'parents_hero_title', true) ?: 'Partners in your child\'s journey.';
$hero_description = get_post_meta($page_id, 'parents_hero_description', true) ?: 'Everything you need to manage your enrollment, stay connected, and engage with the KIDazzle community.';

// Parent Essentials Section
$essentials_title = get_post_meta($page_id, 'parents_essentials_title', true) ?: 'Parent Essentials';

$resources = array(
	array(
		'name' => 'procare',
		'icon' => get_post_meta($page_id, 'parents_resource_procare_icon', true) ?: 'fa-solid fa-cloud',
		'title' => get_post_meta($page_id, 'parents_resource_procare_title', true) ?: 'Procare Cloud',
		'description' => get_post_meta($page_id, 'parents_resource_procare_desc', true) ?: 'Daily reports, photos, and attendance tracking.',
		'url' => get_post_meta($page_id, 'parents_resource_procare_url', true) ?: '#',
		'colorClass' => 'kidazzle-blue',
	),
	array(
		'name' => 'tuition',
		'icon' => get_post_meta($page_id, 'parents_resource_tuition_icon', true) ?: 'fa-solid fa-credit-card',
		'title' => get_post_meta($page_id, 'parents_resource_tuition_title', true) ?: 'Tuition Portal',
		'description' => get_post_meta($page_id, 'parents_resource_tuition_desc', true) ?: 'Securely view statements and make payments.',
		'url' => get_post_meta($page_id, 'parents_resource_tuition_url', true) ?: '#',
		'colorClass' => 'kidazzle-green',
	),
	array(
		'name' => 'handbook',
		'icon' => get_post_meta($page_id, 'parents_resource_handbook_icon', true) ?: 'fa-solid fa-book-open',
		'title' => get_post_meta($page_id, 'parents_resource_handbook_title', true) ?: 'Parent Handbook',
		'description' => get_post_meta($page_id, 'parents_resource_handbook_desc', true) ?: 'Policies, procedures, and operational details.',
		'url' => get_post_meta($page_id, 'parents_resource_handbook_url', true) ?: '#',
		'colorClass' => 'kidazzle-yellow',
	),
	array(
		'name' => 'enrollment',
		'icon' => get_post_meta($page_id, 'parents_resource_enrollment_icon', true) ?: 'fa-solid fa-file-signature',
		'title' => get_post_meta($page_id, 'parents_resource_enrollment_title', true) ?: 'Enrollment Agreement',
		'description' => get_post_meta($page_id, 'parents_resource_enrollment_desc', true) ?: 'Update your annual enrollment documents.',
		'url' => get_post_meta($page_id, 'parents_resource_enrollment_url', true) ?: '#',
		'colorClass' => 'kidazzle-red',
	),
	array(
		'name' => 'prekga',
		'icon' => get_post_meta($page_id, 'parents_resource_prekga_icon', true) ?: 'fa-solid fa-graduation-cap',
		'title' => get_post_meta($page_id, 'parents_resource_prekga_title', true) ?: 'GA Pre-K Enrollment',
		'description' => get_post_meta($page_id, 'parents_resource_prekga_desc', true) ?: 'Lottery registration and required state forms.',
		'url' => get_post_meta($page_id, 'parents_resource_prekga_url', true) ?: '#',
		'colorClass' => 'brand-ink',
	),
	array(
		'name' => 'waitlist',
		'icon' => get_post_meta($page_id, 'parents_resource_waitlist_icon', true) ?: 'fa-solid fa-clock',
		'title' => get_post_meta($page_id, 'parents_resource_waitlist_title', true) ?: 'Join Waitlist',
		'description' => get_post_meta($page_id, 'parents_resource_waitlist_desc', true) ?: 'Reserve a spot for siblings or future terms.',
		'url' => get_post_meta($page_id, 'parents_resource_waitlist_url', true) ?: '#',
		'colorClass' => 'brand-ink',
	),
);

// Events Section
$events_badge = get_post_meta($page_id, 'parents_events_badge', true) ?: 'Community';
$events_title = get_post_meta($page_id, 'parents_events_title', true) ?: 'Traditions & Celebrations';
$events_description = get_post_meta($page_id, 'parents_events_description', true) ?: 'We believe in building a village. Our calendar is peppered with events designed to bring families together and celebrate our students\' milestones.';
$events_image = get_post_meta($page_id, 'parents_events_image', true) ?: 'https://images.unsplash.com/photo-1511895426328-dc8714191300?q=80&w=800&auto=format&fit=crop';

$events = array(
	array(
		'icon' => get_post_meta($page_id, 'parents_event1_icon', true) ?: 'fa-solid fa-calendar-days',
		'color' => 'kidazzle-yellow',
		'title' => get_post_meta($page_id, 'parents_event1_title', true) ?: 'Quarterly Family Events',
		'desc' => get_post_meta($page_id, 'parents_event1_desc', true) ?: 'Every season brings a reason to gather. From our Fall Festival and Winter "Cookies & Cocoa" to our Spring Art Show and Summer Splash Days, we create memories for the whole family.',
	),
	array(
		'icon' => get_post_meta($page_id, 'parents_event2_icon', true) ?: 'fa-solid fa-star',
		'color' => 'kidazzle-red',
		'title' => get_post_meta($page_id, 'parents_event2_title', true) ?: 'Pre-K Graduation',
		'desc' => get_post_meta($page_id, 'parents_event2_desc', true) ?: 'A cap-and-gown ceremony celebrating our 4 and 5-year-olds as they transition to Kindergarten. It\'s the highlight of our academic year!',
	),
	array(
		'icon' => get_post_meta($page_id, 'parents_event3_icon', true) ?: 'fa-solid fa-handshake',
		'color' => 'kidazzle-green',
		'title' => get_post_meta($page_id, 'parents_event3_title', true) ?: 'Parent-Teacher Conferences',
		'desc' => get_post_meta($page_id, 'parents_event3_desc', true) ?: 'Twice a year, we sit down to review your child\'s developmental portfolio, set goals, and celebrate their individual growth curve.',
	),
);

// Nutrition Section
$nutrition_badge = get_post_meta($page_id, 'parents_nutrition_badge', true) ?: 'Wellness';
$nutrition_title = get_post_meta($page_id, 'parents_nutrition_title', true) ?: 'What\'s for lunch?';
$nutrition_description = get_post_meta($page_id, 'parents_nutrition_description', true) ?: 'Our in-house chefs prepare balanced, CACFP-compliant meals fresh daily. We are a nut-aware facility.';
$nutrition_image = get_post_meta($page_id, 'parents_nutrition_image', true) ?: 'https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?q=80&w=800&auto=format&fit=crop';

$menus = array(
	array(
		'icon' => get_post_meta($page_id, 'parents_menu1_icon', true) ?: 'fa-solid fa-carrot',
		'color' => 'kidazzle-green',
		'bgClass' => 'kidazzle-greenLight',
		'title' => get_post_meta($page_id, 'parents_menu1_title', true) ?: 'Current Month Menu',
		'subtitle' => get_post_meta($page_id, 'parents_menu1_subtitle', true) ?: 'Standard (Ages 1-12)',
		'url' => get_post_meta($page_id, 'parents_menu1_url', true) ?: '#',
	),
	array(
		'icon' => get_post_meta($page_id, 'parents_menu2_icon', true) ?: 'fa-solid fa-baby',
		'color' => 'kidazzle-blue',
		'bgClass' => 'kidazzle-blueLight',
		'title' => get_post_meta($page_id, 'parents_menu2_title', true) ?: 'Infant Puree Menu',
		'subtitle' => get_post_meta($page_id, 'parents_menu2_subtitle', true) ?: 'Stage 1 & 2 Solids',
		'url' => get_post_meta($page_id, 'parents_menu2_url', true) ?: '#',
	),
	array(
		'icon' => get_post_meta($page_id, 'parents_menu3_icon', true) ?: 'fa-solid fa-wheat-awn-circle-exclamation',
		'color' => 'kidazzle-red',
		'bgClass' => 'kidazzle-redLight',
		'title' => get_post_meta($page_id, 'parents_menu3_title', true) ?: 'Allergy Statement',
		'subtitle' => get_post_meta($page_id, 'parents_menu3_subtitle', true) ?: 'Our Nut-Free Protocols',
		'url' => get_post_meta($page_id, 'parents_menu3_url', true) ?: '#',
	),
);

// Safety Section
$safety_title = get_post_meta($page_id, 'parents_safety_title', true) ?: 'Safe. Secure. Connected.';
$safety_description = get_post_meta($page_id, 'parents_safety_description', true) ?: 'We employ enterprise-grade security measures and transparent communication protocols so you can have total peace of mind while you work.';

$safety_items = array(
	array(
		'icon' => get_post_meta($page_id, 'parents_safety1_icon', true) ?: 'fa-solid fa-video',
		'color' => 'kidazzle-green',
		'title' => get_post_meta($page_id, 'parents_safety1_title', true) ?: '24/7 Monitored Cameras',
		'desc' => get_post_meta($page_id, 'parents_safety1_desc', true) ?: 'Our facilities are equipped with high-definition closed-circuit cameras in every classroom, hallway, and playground. Feeds are monitored by leadership to ensure policy adherence and safety.',
	),
	array(
		'icon' => get_post_meta($page_id, 'parents_safety2_icon', true) ?: 'fa-solid fa-mobile-screen-button',
		'color' => 'kidazzle-blue',
		'title' => get_post_meta($page_id, 'parents_safety2_title', true) ?: 'Real-Time Updates',
		'desc' => get_post_meta($page_id, 'parents_safety2_desc', true) ?: 'Through the Procare app, you receive real-time notifications for meals, naps, and diaper changes, plus photos of your child engaging in the curriculum throughout the day.',
	),
	array(
		'icon' => get_post_meta($page_id, 'parents_safety3_icon', true) ?: 'fa-solid fa-lock',
		'color' => 'kidazzle-red',
		'title' => get_post_meta($page_id, 'parents_safety3_title', true) ?: 'Secure Access Control',
		'desc' => get_post_meta($page_id, 'parents_safety3_desc', true) ?: 'Our lobbies are secured with coded keypad entry systems. Codes are unique to each family and change regularly. ID is strictly required for any alternative pickups.',
	),
);

// FAQ Section
$faq_title = get_post_meta($page_id, 'parents_faq_title', true) ?: 'Operational Policy FAQ';
$faq_description = get_post_meta($page_id, 'parents_faq_description', true) ?: 'Quick answers to common day-to-day questions.';

$faqs = array(
	array(
		'question' => get_post_meta($page_id, 'parents_faq1_question', true) ?: 'What is the sick child policy?',
		'answer' => get_post_meta($page_id, 'parents_faq1_answer', true) ?: 'Children must be symptom-free (fever under 100.4°F, no vomiting/diarrhea) for 24 hours without medication before returning to school. Please report any contagious illnesses to the Director immediately.',
	),
	array(
		'question' => get_post_meta($page_id, 'parents_faq2_question', true) ?: 'How do you handle inclement weather?',
		'answer' => get_post_meta($page_id, 'parents_faq2_answer', true) ?: 'We generally follow the local county school system for weather closures, but we make independent decisions based on staff safety. Alerts will be sent via Procare and posted on our Facebook page by 6:00 AM.',
	),
	array(
		'question' => get_post_meta($page_id, 'parents_faq3_question', true) ?: 'What is the late pickup policy?',
		'answer' => get_post_meta($page_id, 'parents_faq3_answer', true) ?: 'We close promptly at 6:00 PM. A late fee of $1 per minute is charged to your account for pickups after 6:05 PM to compensate our staff who stay late.',
	),
);

// Referral Banner
$referral_title = get_post_meta($page_id, 'parents_referral_title', true) ?: 'Love the Kidazzle family?';
$referral_description = get_post_meta($page_id, 'parents_referral_description', true) ?: 'Refer a friend and receive a <strong>$100 tuition credit</strong> when they enroll.';
$referral_button_text = get_post_meta($page_id, 'parents_referral_button_text', true) ?: 'Refer a Friend';
$referral_button_url = get_post_meta($page_id, 'parents_referral_button_url', true) ?: 'mailto:director@Kidazzleela.com?subject=Parent%20Referral';

// Life at Kidazzle Gallery
$gallery_img1 = get_post_meta($page_id, 'about_gallery_image_1', true) ?: 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=800&auto=format&fit=crop';
$gallery_img2 = get_post_meta($page_id, 'about_gallery_image_2', true) ?: 'https://images.unsplash.com/photo-1587654780291-39c940483713?q=80&w=800&auto=format&fit=crop';
$gallery_img3 = get_post_meta($page_id, 'about_gallery_image_3', true) ?: 'https://images.unsplash.com/photo-1560785496-3c9d27877182?q=80&w=800&auto=format&fit=crop';
$gallery_img4 = get_post_meta($page_id, 'about_gallery_image_4', true) ?: 'https://images.unsplash.com/photo-1596464716127-f9a82741cac8?q=80&w=800&auto=format&fit=crop';
$gallery_img5 = get_post_meta($page_id, 'about_gallery_image_5', true) ?: 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?q=80&w=800&auto=format&fit=crop';
?>

<?php
$page_id = get_the_ID();

// Hero Section
$hero_badge = get_post_meta($page_id, 'parents_hero_badge', true) ?: 'Parent Dashboard';
$hero_title = get_post_meta($page_id, 'parents_hero_title', true) ?: 'Partners in your child\'s journey.';
$hero_description = get_post_meta($page_id, 'parents_hero_description', true) ?: 'Everything you need to manage your enrollment, stay connected, and engage with the KIDazzle community.';

// Resources
$resources = array(
	array(
		'icon' => 'fa-solid fa-cloud',
		'title' => 'Procare Cloud',
		'desc' => 'Daily reports, photos, and attendance tracking.',
		'url' => get_post_meta($page_id, 'parents_resource_procare_url', true) ?: '#',
		'color' => 'kidazzle-blue',
	),
	array(
		'icon' => 'fa-solid fa-credit-card',
		'title' => 'Tuition Portal',
		'desc' => 'Securely view statements and make payments.',
		'url' => get_post_meta($page_id, 'parents_resource_tuition_url', true) ?: '#',
		'color' => 'kidazzle-green',
	),
	array(
		'icon' => 'fa-solid fa-book-open',
		'title' => 'Parent Handbook',
		'desc' => 'Policies, procedures, and operational details.',
		'url' => get_post_meta($page_id, 'parents_resource_handbook_url', true) ?: '#',
		'color' => 'kidazzle-yellow',
	),
	array(
		'icon' => 'fa-solid fa-file-signature',
		'title' => 'Enrollment Agreement',
		'desc' => 'Update your annual enrollment documents.',
		'url' => get_post_meta($page_id, 'parents_resource_enrollment_url', true) ?: '#',
		'color' => 'kidazzle-red',
	),
	array(
		'icon' => 'fa-solid fa-graduation-cap',
		'title' => 'GA Pre-K Enrollment',
		'desc' => 'Lottery registration and required state forms.',
		'url' => get_post_meta($page_id, 'parents_resource_prekga_url', true) ?: '#',
		'color' => 'kidazzle-purple',
	),
	array(
		'icon' => 'fa-solid fa-clock',
		'title' => 'Join Waitlist',
		'desc' => 'Reserve a spot for siblings or future terms.',
		'url' => get_post_meta($page_id, 'parents_resource_waitlist_url', true) ?: '#',
		'color' => 'brand-ink',
	),
);

// Safety Highlights
$safety_highlights = array(
	array('icon' => 'fa-solid fa-video', 'title' => 'Monitored Cameras', 'color' => 'kidazzle-green'),
	array('icon' => 'fa-solid fa-mobile-screen', 'title' => 'Real-Time Updates', 'color' => 'kidazzle-blue'),
	array('icon' => 'fa-solid fa-lock', 'title' => 'Secure Access', 'color' => 'kidazzle-red'),
);

// Gallery Items
$gallery_imgs = array(
	get_post_meta($page_id, 'about_gallery_image_1', true) ?: 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=800&auto=format&fit=crop',
	get_post_meta($page_id, 'about_gallery_image_2', true) ?: 'https://images.unsplash.com/photo-1587654780291-39c940483713?q=80&w=800&auto=format&fit=crop',
	get_post_meta($page_id, 'about_gallery_image_3', true) ?: 'https://images.unsplash.com/photo-1560785496-3c9d27877182?q=80&w=800&auto=format&fit=crop',
	get_post_meta($page_id, 'about_gallery_image_4', true) ?: 'https://images.unsplash.com/photo-1596464716127-f9a82741cac8?q=80&w=800&auto=format&fit=crop',
	get_post_meta($page_id, 'about_gallery_image_5', true) ?: 'https://images.unsplash.com/photo-1516627145497-ae6968895b74?q=80&w=800&auto=format&fit=crop',
);
?>

<main id="view-parents" class="view-section active block">
	<!-- Hero Section (Premium High-Contrast) -->
	<section class="relative py-32 md:py-48 text-center overflow-hidden">
		<div class="absolute inset-0 z-0">
			<img src="https://images.unsplash.com/photo-1491438590914-bc09fcaaf77a?q=80&w=3840&auto=format&fit=crop"
				alt="Parents and children" class="w-full h-full object-cover">
			<div class="absolute inset-0 bg-brand-ink/70 backdrop-blur-[1px]"></div>
			<!-- Refractive Prism Overlay -->
			<div
				class="absolute right-0 top-0 w-1/2 h-full bg-gradient-to-l from-kidazzle-blue/20 to-transparent skew-x-12 transform translate-x-20">
			</div>
		</div>

		<div class="relative z-10 max-w-5xl mx-auto px-4">
			<span class="text-kidazzle-yellow font-bold tracking-[0.3em] text-[10px] uppercase mb-4 block italic">
				<?php echo esc_html($hero_badge); ?>
			</span>
			<h1 class="text-5xl md:text-7xl font-serif font-bold text-white mb-6 drop-shadow-xl">
				<?php echo esc_html($hero_title); ?>
			</h1>
			<p class="text-xl md:text-2xl text-white/80 max-w-2xl mx-auto leading-relaxed drop-shadow-md">
				<?php echo esc_html($hero_description); ?>
			</p>
		</div>

		<!-- Bottom Wave -->
		<div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0] transform rotate-180">
			<svg class="relative block w-[calc(100%+1.3px)] h-[60px] fill-brand-cream" viewBox="0 0 1200 120"
				preserveAspectRatio="none">
				<path
					d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z">
				</path>
			</svg>
		</div>
	</section>

	<!-- Parent Essentials (Premium Cards) -->
	<section class="py-24 bg-brand-cream">
		<div class="max-w-7xl mx-auto px-4 lg:px-6">
			<div class="text-center mb-16">
				<span
					class="text-kidazzle-blue font-bold tracking-[0.2em] text-[10px] uppercase mb-3 block italic">Self-Service
					Portals</span>
				<h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink">
					<?php echo esc_html($essentials_title); ?></h2>
				<div class="w-16 h-1.5 bg-kidazzle-blue mx-auto mt-6 rounded-full"></div>
			</div>
			<div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
				<?php foreach ($resources as $res): ?>
					<a href="<?php echo esc_url($res['url']); ?>"
						class="group relative bg-white p-10 rounded-[3rem] shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 flex flex-col items-center text-center">
						<!-- Brand Accent Bar -->
						<div class="absolute top-0 left-0 w-full h-1.5 bg-<?php echo esc_attr($res['color']); ?>/10">
							<div
								class="h-full bg-<?php echo esc_attr($res['color']); ?> w-0 group-hover:w-full transition-all duration-700">
							</div>
						</div>

						<div
							class="w-20 h-20 bg-white shadow-lg text-<?php echo esc_attr($res['color']); ?> rounded-3xl flex items-center justify-center text-3xl mb-8 border border-<?php echo esc_attr($res['color']); ?>/10 group-hover:bg-<?php echo esc_attr($res['color']); ?> group-hover:text-white transition-all duration-300">
							<i class="<?php echo esc_attr($res['icon']); ?>"></i>
						</div>
						<h3 class="font-serif font-bold text-2xl text-brand-ink mb-3"><?php echo esc_html($res['title']); ?>
						</h3>
						<p class="text-brand-ink/60 text-sm leading-relaxed mb-8 flex-grow">
							<?php echo esc_html($res['desc']); ?></p>

						<div
							class="w-10 h-10 rounded-full border border-brand-ink/10 flex items-center justify-center text-<?php echo esc_attr($res['color']); ?> group-hover:bg-brand-ink group-hover:text-white group-hover:border-brand-ink transition-all duration-300">
							<i class="fa-solid fa-arrow-right text-xs"></i>
						</div>
					</a>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<!-- Traditions & Safety Split -->
	<section class="py-24 bg-white relative overflow-hidden">
		<div class="max-w-7xl mx-auto px-4 lg:px-6">
			<div class="grid lg:grid-cols-2 gap-20 items-center">
				<div class="relative">
					<div class="absolute -left-10 -top-10 w-40 h-40 bg-kidazzle-yellow/10 rounded-full blur-3xl"></div>
					<span
						class="text-kidazzle-yellow font-bold tracking-[0.2em] text-xs uppercase mb-3 block">Community</span>
					<h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-ink mb-6">Traditions & Celebrations
					</h2>
					<p class="text-brand-ink/80 mb-8 leading-relaxed">We believe in building a village. Our calendar is
						peppered with events designed to bring families together and celebrate our students\'
						milestones.</p>

					<div class="space-y-6">
						<div class="flex gap-4 p-6 bg-brand-cream rounded-[2rem] border border-brand-ink/5">
							<i class="fa-solid fa-cake-candles text-kidazzle-red text-2xl mt-1"></i>
							<div>
								<h4 class="font-bold text-brand-ink">Quarterly Family Events</h4>
								<p class="text-sm text-brand-ink/70 mt-1">From Fall Festivals to Spring Art Shows, we
									create memories for the whole family.</p>
							</div>
						</div>
						<div class="flex gap-4 p-6 bg-brand-cream rounded-[2rem] border border-brand-ink/5">
							<i class="fa-solid fa-award text-kidazzle-green text-2xl mt-1"></i>
							<div>
								<h4 class="font-bold text-brand-ink">Milestone Ceremonies</h4>
								<p class="text-sm text-brand-ink/70 mt-1">Celebrating transitions from Infant to
									Toddler, and our grand Pre-K Graduation.</p>
							</div>
						</div>
					</div>
				</div>
				<div class="relative group">
					<div
						class="absolute inset-0 bg-kidazzle-blue/5 rounded-[3rem] rotate-2 transition-transform group-hover:rotate-0">
					</div>
					<div class="relative rounded-[3rem] overflow-hidden shadow-2xl border-4 border-white aspect-[4/5]">
						<img src="https://images.unsplash.com/photo-1511895426328-dc8714191300?q=80&w=800&auto=format&fit=crop"
							class="w-full h-full object-cover" alt="Parent Experience" />
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Nutrition Banner (High Contrast) -->
	<section class="py-16 bg-brand-ink text-white relative overflow-hidden">
		<div class="absolute -right-20 -bottom-20 w-80 h-80 bg-kidazzle-green/5 rounded-full blur-3xl"></div>
		<div
			class="max-w-7xl mx-auto px-4 lg:px-6 flex flex-col md:flex-row items-center justify-between gap-12 relative z-10">
			<div class="flex items-center gap-8">
				<div
					class="w-20 h-20 bg-kidazzle-green/20 text-kidazzle-green rounded-3xl flex items-center justify-center text-4xl shadow-inner border border-white/5">
					<i class="fa-solid fa-utensils"></i>
				</div>
				<div>
					<span
						class="text-kidazzle-green font-bold uppercase tracking-[0.3em] text-[10px] mb-2 block">Nutrition</span>
					<h3 class="text-3xl font-serif font-bold"><?php echo esc_html($nutrition_title); ?></h3>
					<p class="text-white/60 text-lg"><?php echo esc_html($nutrition_description); ?></p>
				</div>
			</div>
			<a href="#"
				class="px-10 py-5 bg-white text-brand-ink font-bold rounded-full uppercase tracking-widest text-xs hover:bg-kidazzle-green hover:text-white hover:-translate-y-1 transition-all shadow-xl">Download
				This Month's Menu</a>
		</div>
	</section>

	<!-- Gallery Section -->
	<section class="py-24 bg-white">
		<div class="max-w-7xl mx-auto px-4 lg:px-6">
			<div class="text-center mb-16">
				<span class="text-kidazzle-orange font-bold tracking-[0.2em] text-xs uppercase mb-3 block">Life at
					KIDazzle</span>
				<h2 class="text-3xl md:text-4xl font-serif font-bold text-brand-ink">Moments of Joy</h2>
			</div>
			<div class="grid grid-cols-2 md:grid-cols-4 gap-6 auto-rows-[250px]">
				<div class="col-span-2 row-span-2 rounded-[2.5rem] overflow-hidden shadow-soft">
					<img src="<?php echo esc_url($gallery_imgs[0]); ?>" class="w-full h-full object-cover"
						alt="Gallery" />
				</div>
				<div class="rounded-[2.5rem] overflow-hidden shadow-soft">
					<img src="<?php echo esc_url($gallery_imgs[1]); ?>" class="w-full h-full object-cover"
						alt="Gallery" />
				</div>
				<div class="rounded-[2.5rem] overflow-hidden shadow-soft">
					<img src="<?php echo esc_url($gallery_imgs[2]); ?>" class="w-full h-full object-cover"
						alt="Gallery" />
				</div>
				<div class="col-span-2 rounded-[2.5rem] overflow-hidden shadow-soft">
					<img src="<?php echo esc_url($gallery_imgs[3]); ?>" class="w-full h-full object-cover"
						alt="Gallery" />
				</div>
			</div>
		</div>
	</section>

	<!-- Referral Banner -->
	<section class="py-24 bg-brand-cream border-t border-brand-ink/5">
		<div class="max-w-5xl mx-auto px-4 lg:px-6">
			<div
				class="bg-gradient-to-br from-kidazzle-red to-kidazzle-orange rounded-[3rem] p-12 text-white relative overflow-hidden shadow-2xl flex flex-col md:flex-row items-center gap-10">
				<div class="absolute -right-20 -bottom-20 w-80 h-80 bg-white/10 rounded-full blur-3xl"></div>
				<div class="flex-grow relative z-10">
					<h2 class="text-3xl md:text-4xl font-serif font-bold mb-4">Love the KIDazzle family?</h2>
					<p class="text-white/80 text-lg">Refer a friend and receive a <strong>$100 tuition credit</strong>
						once they enroll. Help us grow our community!</p>
				</div>
				<div class="shrink-0 relative z-10">
					<a href="mailto:director@kidazzlechildcare.com?subject=Parent%20Referral"
						class="px-10 py-5 bg-white text-brand-ink font-bold rounded-full uppercase tracking-widest text-xs hover:scale-105 transition-all shadow-lg inline-block">Refer
						a Friend</a>
				</div>
			</div>
		</div>
	</section>
</main>

<?php
get_footer();
