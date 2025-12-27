<?php
/**
 * Header Template
 * 
 * KIDazzle Child Care Theme
 * 
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class('font-sans text-slate-800 bg-white selection:bg-yellow-200'); ?>>
	<?php wp_body_open(); ?>

	<!-- TOP UTILITY BAR -->
	<div
		class="bg-slate-50 text-slate-600 text-xs py-2 px-4 hidden md:flex justify-between items-center border-b border-slate-200">
		<div class="flex gap-4 items-center">
			<a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
				class="flex items-center gap-1 hover:text-cyan-600 transition"><i data-lucide="map-pin"
					class="w-3 h-3 text-red-500"></i> Serving GA, TN, &amp; FL</a>
			<span class="flex items-center gap-1"><i data-lucide="phone" class="w-3 h-3 text-green-500"></i>
				<?php echo esc_html(get_theme_mod('kidazzle_phone', '877-410-1002')); ?></span>
			<a href="<?php echo esc_url(home_url('/acquisitions/')); ?>"
				class="flex items-center gap-1 font-bold text-indigo-600 hover:underline"><i data-lucide="briefcase"
					class="w-3 h-3"></i> Acquisitions</a>
		</div>
		<div class="flex gap-6 font-medium">
			<a href="<?php echo esc_url(home_url('/careers/')); ?>"
				class="hover:text-cyan-600 flex items-center gap-1">Careers</a>
			<a href="<?php echo esc_url(home_url('/teacher-portal/')); ?>"
				class="hover:text-cyan-600 flex items-center gap-1 font-bold text-orange-500"><i data-lucide="users"
					class="w-3 h-3"></i> Teacher Portal</a>
		</div>
	</div>

	<!-- MAIN NAVIGATION -->
	<nav class="sticky top-0 w-full z-40 bg-white py-4 shadow-sm" role="navigation"
		aria-label="<?php esc_attr_e('Primary Navigation', 'kidazzle'); ?>">
		<div class="container mx-auto px-4 flex justify-between items-center">
			<a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2">
				<?php if (has_custom_logo()): ?>
					<?php the_custom_logo(); ?>
				<?php else: ?>
					<h1 class="text-3xl font-extrabold text-black tracking-tighter">KID<span
							class="text-yellow-500">azzle</span></h1>
				<?php endif; ?>
			</a>

			<!-- Mobile Menu Button -->
			<button id="mobile-menu-btn" class="lg:hidden text-slate-900"
				aria-label="<?php esc_attr_e('Toggle Menu', 'kidazzle'); ?>"><i data-lucide="menu"
					class="w-8 h-8"></i></button>

			<!-- Desktop Links -->
			<div class="hidden lg:flex items-center gap-6 font-bold text-slate-600 text-sm tracking-wide">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'primary',
					'container' => false,
					'items_wrap' => '%3$s',
					'fallback_cb' => 'kidazzle_primary_nav_fallback',
					'depth' => 1,
					'walker' => new kidazzle_Primary_Nav_Walker(),
				));
				?>
				<a href="<?php echo esc_url(home_url('/contact/')); ?>"
					class="bg-slate-900 text-white px-5 py-2.5 rounded-xl hover:bg-slate-800 transition shadow-md ml-2">CONTACT
					US</a>
			</div>
		</div>

		<!-- Mobile Menu Dropdown -->
		<div id="mobile-menu"
			class="hidden absolute top-full left-0 w-full bg-white shadow-lg border-t border-slate-100 flex flex-col p-4 gap-4 lg:hidden">
			<?php
			wp_nav_menu(array(
				'theme_location' => 'primary',
				'container' => false,
				'menu_class' => 'mobile-nav-menu flex flex-col gap-4',
				'fallback_cb' => 'kidazzle_mobile_nav_fallback',
				'depth' => 1,
			));
			?>
		</div>
	</nav>

	<!-- Main Content Wrapper -->
	<main id="main-content" role="main">