<?php
/**
 * Footer Template
 * 
 * KIDazzle Child Care Theme
 * 
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
	exit;
}
?>
</main><!-- #main-content -->

<!-- FOOTER -->
<footer class="bg-slate-900 text-slate-300 py-16 relative mt-12 text-center md:text-left" role="contentinfo">
	<div
		class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-white p-2 rounded-full shadow-lg border border-slate-100">
		<?php if (has_custom_logo()):
			$custom_logo_id = get_theme_mod('custom_logo');
			$logo_url = wp_get_attachment_image_url($custom_logo_id, 'thumbnail');
			?>
			<img src="<?php echo esc_url($logo_url); ?>" class="h-10 w-auto"
				alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
		<?php else: ?>
			<span class="text-xl font-extrabold text-black px-2">KID<span class="text-yellow-500">azzle</span></span>
		<?php endif; ?>
	</div>

	<div class="container mx-auto px-4 grid md:grid-cols-4 gap-8 pt-10">
		<!-- Column 1: About -->
		<div>
			<?php if (has_custom_logo()):
				$custom_logo_id = get_theme_mod('custom_logo');
				$logo_url = wp_get_attachment_image_url($custom_logo_id, 'medium');
				?>
				<img src="<?php echo esc_url($logo_url); ?>" class="h-10 mb-4 mx-auto md:mx-0 bg-white p-1 rounded"
					alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
			<?php else: ?>
				<h2 class="text-2xl font-extrabold text-white mb-4">KID<span class="text-yellow-500">azzle</span></h2>
			<?php endif; ?>
			<p class="text-sm">
				<?php echo esc_html(get_theme_mod('kidazzle_footer_tagline', 'Providing elite, independent child care for 31 years.')); ?>
			</p>
		</div>

		<!-- Column 2: Quick Links -->
		<div>
			<h4 class="text-white font-bold mb-4"><?php esc_html_e('Quick Links', 'kidazzle'); ?></h4>
			<?php
			wp_nav_menu(array(
				'theme_location' => 'footer-quick',
				'container' => false,
				'menu_class' => 'space-y-2 text-sm',
				'fallback_cb' => 'kidazzle_footer_quick_links_fallback',
				'depth' => 1,
			));
			?>
		</div>

		<!-- Column 3: Resources -->
		<div>
			<h4 class="text-white font-bold mb-4"><?php esc_html_e('Resources', 'kidazzle'); ?></h4>
			<?php
			wp_nav_menu(array(
				'theme_location' => 'footer-resources',
				'container' => false,
				'menu_class' => 'space-y-2 text-sm',
				'fallback_cb' => 'kidazzle_footer_resources_fallback',
				'depth' => 1,
			));
			?>
		</div>

		<!-- Column 4: Contact -->
		<div>
			<h4 class="text-white font-bold mb-4"><?php esc_html_e('Contact', 'kidazzle'); ?></h4>
			<p class="text-sm">
				<?php echo esc_html(get_theme_mod('kidazzle_address', '100 Alabama St SW, Atlanta, GA')); ?><br>
				<span
					class="text-white font-bold"><?php echo esc_html(get_theme_mod('kidazzle_phone', '877-410-1002')); ?></span>
			</p>
			<a href="<?php echo esc_url(home_url('/contact/')); ?>"
				class="text-cyan-400 underline mt-2 inline-block"><?php esc_html_e('Open Contact Form', 'kidazzle'); ?></a>
		</div>
	</div>

	<div class="border-t border-slate-800 mt-12 pt-8 text-center text-xs text-slate-500">
		<span>&copy; <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>.
			<?php esc_html_e('All Rights Reserved.', 'kidazzle'); ?></span>
	</div>
</footer>

<script>
	// Initialize Lucide icons
	if (typeof lucide !== 'undefined') {
		lucide.createIcons();
	}

	// Mobile menu toggle
	const mobileMenuBtn = document.getElementById('mobile-menu-btn');
	const mobileMenu = document.getElementById('mobile-menu');
	if (mobileMenuBtn && mobileMenu) {
		mobileMenuBtn.addEventListener('click', () => {
			mobileMenu.classList.toggle('hidden');
		});
	}
</script>

<?php wp_footer(); ?>
</body>

</html>