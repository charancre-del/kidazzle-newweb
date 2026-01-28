<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php // Canonical URL is handled by Yoast SEO or framework canonical enforcer ?>
	<!-- Google Fonts: Inter and Playfair Display for WIMPER -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&display=swap"
		rel="stylesheet">

	<!-- FontAwesome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

	<!-- Tailwind CSS CDN -->
	<script src="https://cdn.tailwindcss.com"></script>

	<!-- Tier 3: Instant Navigation (Speculation Rules API) -->
	<script type="speculationrules">
	{
		"prerender": [
			{
				"source": "document",
				"where": {
					"and": [
						{ "href_matches": "/*" },
						{ "not": { "href_matches": "/wp-admin/*" } }
					]
				},
				"eagerness": "moderate"
			}
		]
	}
	</script>

	<?php
	// Get Customizer settings
	$header_phone = get_theme_mod('kidazzle_footer_phone', '1 678-940-6099'); // Updated branding phone
	$header_cta_text = get_theme_mod('kidazzle_header_cta_text', 'Verify Eligibility');
	$header_cta_url = get_theme_mod('kidazzle_book_tour_url', home_url('/contact'));
	$header_scripts = get_theme_mod('kidazzle_header_scripts', '');

	// Output header scripts if set
	if (!empty($header_scripts)) {
		echo $header_scripts;
	}

	wp_head();
	?>
</head>


<body <?php body_class('font-sans antialiased bg-navy'); ?>>
	<?php wp_body_open(); ?>

	<!-- Skip Links for Accessibility -->
	<a href="#main-content"
		class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-white text-kidazzle-blueDark p-4 z-[100] rounded-lg shadow-lg"><?php _e('Skip to content', 'kidazzle-theme'); ?></a>

	<!-- NAVIGATION -->
	<nav class="bg-white/95 backdrop-blur-xl border-b border-slate-200 fixed w-full z-50 transition-all duration-300">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex justify-between h-24">
				<div class="flex items-center cursor-pointer"
					onclick="<?php echo is_front_page() ? "navigateTo('home')" : "window.location.href='" . home_url('/') . "'"; ?>">
					<div class="flex flex-col border-l-4 border-gold pl-4 transition hover:border-navy">
						<span
							class="text-xl font-bold text-slate-900 tracking-tight font-serif leading-none">W.I.M.P.E.R.</span>
						<span class="text-[9px] uppercase tracking-[0.1em] text-slate-500 font-semibold mt-1">Wellness &
							Integrated Medical Plan Expense Reimbursement</span>
					</div>
				</div>

				<div class="hidden lg:flex items-center space-x-12">
					<span
						onclick="<?php echo is_front_page() ? "navigateTo('home')" : "window.location.href='" . home_url('/') . "'"; ?>"
						id="nav-home" class="nav-link active text-slate-600">The Vision</span>
					<span
						onclick="<?php echo is_front_page() ? "navigateTo('method')" : "window.location.href='" . home_url('/') . "#method'"; ?>"
						id="nav-method" class="nav-link text-slate-600">The Chassis</span>
					<span
						onclick="<?php echo is_front_page() ? "navigateTo('iul')" : "window.location.href='" . home_url('/') . "#iul'"; ?>"
						id="nav-iul" class="nav-link text-slate-600">Wealth Strategy</span>
					<span
						onclick="<?php echo is_front_page() ? "navigateTo('timeline')" : "window.location.href='" . home_url('/') . "#timeline'"; ?>"
						id="nav-timeline" class="nav-link text-slate-600">The Execution</span>
					<span
						onclick="<?php echo is_front_page() ? "navigateTo('blog')" : "window.location.href='" . home_url('/') . "#blog'"; ?>"
						id="nav-blog" class="nav-link text-slate-600">Insights</span>
					<button
						onclick="<?php echo is_front_page() ? "navigateTo('contact')" : "window.location.href='" . home_url('/') . "#contact'"; ?>"
						class="bg-navy text-white px-8 py-3 rounded-sm text-[10px] font-bold uppercase tracking-[0.2em] hover:bg-gold hover:text-navy transition duration-300 shadow-lg">
						Verify Eligibility
					</button>
				</div>

				<!-- Mobile Menu Button -->
				<div class="lg:hidden flex items-center">
					<button onclick="document.getElementById('mobile-menu').classList.toggle('hidden')"
						class="text-slate-600 focus:outline-none">
						<i class="fas fa-bars text-2xl"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Mobile Menu -->
		<div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-slate-100">
			<div class="flex flex-col p-4 space-y-4">
				onclick="<?php echo is_front_page() ? "navigateTo('home')" : "window.location.href='" . home_url('/') . "'"; ?>"
				class="nav-link text-slate-600">The Vision</span>
				<span
					onclick="<?php echo is_front_page() ? "navigateTo('method')" : "window.location.href='" . home_url('/') . "#method'"; ?>"
					class="nav-link text-slate-600">The Chassis</span>
				<span
					onclick="<?php echo is_front_page() ? "navigateTo('iul')" : "window.location.href='" . home_url('/') . "#iul'"; ?>"
					class="nav-link text-slate-600">Wealth Strategy</span>
				<span
					onclick="<?php echo is_front_page() ? "navigateTo('timeline')" : "window.location.href='" . home_url('/') . "#timeline'"; ?>"
					class="nav-link text-slate-600">The Execution</span>
				<span
					onclick="<?php echo is_front_page() ? "navigateTo('blog')" : "window.location.href='" . home_url('/') . "#blog'"; ?>"
					class="nav-link text-slate-600">Insights</span>
				<span
					onclick="<?php echo is_front_page() ? "navigateTo('contact')" : "window.location.href='" . home_url('/') . "#contact'"; ?>"
					class="nav-link text-gold font-bold">Audit Eligibility</span>
			</div>
		</div>
	</nav>


	<!-- MAIN CONTENT WRAPPER -->
	<main class="min-h-screen">
		<script>
			// SPA ROUTING LOGIC
			function navigateTo(pageId) {
				// If we are on front page, toggle visibility
				const pages = document.querySelectorAll('.page-view');
				if (pages.length > 0) {
					// Update View
					pages.forEach(el => el.classList.remove('active'));
					const targetPage = document.getElementById(pageId);
					if (targetPage) targetPage.classList.add('active');

					// Update Nav State
					document.querySelectorAll('.nav-link').forEach(el => el.classList.remove('active'));
					const activeLink = document.getElementById('nav-' + pageId);
					if (activeLink) activeLink.classList.add('active');

					// Update URL Hash without jumping
					history.pushState(null, null, '#' + (pageId === 'home' ? '' : pageId));

					// Scroll Top
					window.scrollTo({ top: 0, behavior: 'smooth' });

					// Close Mobile Menu if open
					const mobileMenu = document.getElementById('mobile-menu');
					if (mobileMenu) mobileMenu.classList.add('hidden');
				} else {
					// Fallback for non-SPA pages: redirect to home with hash
					window.location.href = '<?php echo home_url('/'); ?>#' + pageId;
				}
			}

			// Handle initial hash on page load
			window.addEventListener('DOMContentLoaded', () => {
				const hash = window.location.hash.replace('#', '');
				if (hash && document.getElementById(hash)) {
					navigateTo(hash);
				}
			});

			function scrollToId(elementId) {
				const element = document.getElementById(elementId);
				if (element) element.scrollIntoView({ behavior: 'smooth' });
			}
		</script>
		<script>
			document.addEventListener('DOMContentLoaded', function () {
				const menuBtn = document.getElementById('mobile-menu-btn');
				const closeBtn = document.getElementById('close-menu-btn');
				const mobileMenu = document.getElementById('mobile-menu');

				if (menuBtn && mobileMenu) {
					menuBtn.addEventListener('click', () => {
						mobileMenu.classList.remove('hidden');
					});
				}
				if (closeBtn && mobileMenu) {
					closeBtn.addEventListener('click', () => {
						mobileMenu.classList.add('hidden');
					});
				}
			});
		</script>