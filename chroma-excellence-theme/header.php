<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="preload" as="font"
		href="<?php echo get_template_directory_uri(); ?>/assets/webfonts/Outfit-Regular.woff2" type="font/woff2"
		crossorigin>
	<link rel="preload" as="font" href="<?php echo get_template_directory_uri(); ?>/assets/webfonts/Outfit-Bold.woff2"
		type="font/woff2" crossorigin>

	<?php wp_head(); ?>
</head>

<body <?php body_class('font-sans text-gray-800 bg-white min-h-screen flex flex-col'); ?>>

	<!-- Skip Links for Accessibility -->
	<a href="#main-content"
		class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 z-50 bg-yellow-400 text-indigo-900 px-4 py-2 font-bold rounded shadow-lg border-2 border-indigo-900 transition-all">
		Skip to main content
	</a>

	<!-- Utility Bar -->
	<div class="bg-indigo-900 text-indigo-50 text-xs py-2 px-4 hidden md:flex justify-between items-center border-b border-indigo-800">
		<div class="flex gap-4">
			<span class="flex items-center gap-1">
				<!-- MapPin Icon -->
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-400"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
				Locations in GA, TN, & FL
			</span>
			<span class="flex items-center gap-1">
				<!-- Phone Icon -->
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-yellow-400"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
				<?php echo esc_html(get_theme_mod('chroma_global_phone', '877-410-1002')); ?>
			</span>
		</div>
		<div class="flex gap-6 font-medium">
			<a href="<?php echo esc_url(home_url('/careers')); ?>" class="hover:text-yellow-400 transition flex items-center gap-1 focus:outline-none focus:underline">Careers</a>
			<a href="https://teachers.kidazzle.com" class="hover:text-yellow-400 transition flex items-center gap-1 focus:outline-none focus:underline">
				<!-- Users Icon -->
				<svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
				Teacher Portal
			</a>
		</div>
	</div>

	<!-- Navigation -->
	<nav class="sticky top-0 z-40 w-full transition-all duration-300 bg-white py-4" role="navigation" aria-label="Main Navigation">
		<div class="container mx-auto px-4 md:px-6 flex justify-between items-center">
			<!-- Logo -->
			<a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 focus:outline-none focus:ring-2 focus:ring-indigo-600 rounded-lg p-1" aria-label="KIDazzle Home">
				<div class="h-10 md:h-12 flex items-center">
					<span class="text-3xl font-extrabold text-indigo-900 tracking-tighter">KID<span class="text-yellow-500">azzle</span></span>
				</div>
			</a>

			<!-- Desktop Menu -->
			<div class="hidden lg:flex items-center gap-8 font-medium text-gray-700">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-indigo-700 transition font-bold py-2 border-b-2 border-transparent hover:border-yellow-400">Home</a>
				<a href="<?php echo esc_url(home_url('/programs')); ?>" class="hover:text-indigo-700 transition font-bold py-2 border-b-2 border-transparent hover:border-yellow-400">Programs</a>
				<a href="<?php echo esc_url(home_url('/curriculum')); ?>" class="hover:text-indigo-700 transition font-bold py-2 border-b-2 border-transparent hover:border-yellow-400">Curriculum</a>
				<a href="<?php echo esc_url(home_url('/locations')); ?>" class="hover:text-indigo-700 transition font-bold py-2 border-b-2 border-transparent hover:border-yellow-400">Locations</a>
				
				<a href="<?php echo esc_url(home_url('/contact')); ?>" class="font-bold py-3 px-8 rounded-full shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-yellow-400/50 bg-yellow-400 hover:bg-yellow-500 text-indigo-900 border-b-4 border-yellow-600">
					Book a Tour
				</a>
			</div>

			<!-- Mobile Menu Button -->
			<button id="mobile-menu-toggle" class="lg:hidden text-indigo-900 p-2 rounded focus:outline-none focus:bg-indigo-50" aria-label="Open Menu" aria-expanded="false">
				<!-- Menu Icon -->
				<svg id="icon-menu" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" x2="20" y1="12" y2="12"/><line x1="4" x2="20" y1="6" y2="6"/><line x1="4" x2="20" y1="18" y2="18"/></svg>
				<!-- Close Icon (Hidden by default) -->
				<svg id="icon-close" class="hidden" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 18 18"/></svg>
			</button>
		</div>

		<!-- Mobile Menu Dropdown -->
		<div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 absolute w-full shadow-2xl z-50 animate-fade-in-down">
			<div class="flex flex-col p-4 gap-2">
				<a href="<?php echo esc_url(home_url('/')); ?>" class="text-left py-3 px-4 font-bold text-gray-700 hover:bg-gray-50 rounded">Home</a>
				<a href="<?php echo esc_url(home_url('/programs')); ?>" class="text-left py-3 px-4 font-bold text-gray-700 hover:bg-gray-50 rounded">Programs</a>
				<a href="<?php echo esc_url(home_url('/curriculum')); ?>" class="text-left py-3 px-4 font-bold text-gray-700 hover:bg-gray-50 rounded">Curriculum</a>
				<a href="<?php echo esc_url(home_url('/locations')); ?>" class="text-left py-3 px-4 font-bold text-gray-700 hover:bg-gray-50 rounded">Locations</a>
				<hr class="my-2" />
				<a href="<?php echo esc_url(home_url('/contact')); ?>" class="bg-yellow-400 text-indigo-900 font-bold py-3 px-4 rounded shadow-md text-center">Book a Tour</a>
			</div>
		</div>
	</nav>

	<main id="main-content" class="flex-grow focus:outline-none" tabindex="-1" role="main">