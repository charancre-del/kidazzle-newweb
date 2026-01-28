<?php
/**
 * The template for displaying the footer
 *
 * @package kidazzle_Excellence
 */

// Get Footer Customizer Settings
$footer_phone = get_theme_mod('kidazzle_footer_phone', '877-410-1002');
$footer_email = get_theme_mod('kidazzle_footer_email', 'info@kidazzle.com');
$footer_address = get_theme_mod('kidazzle_footer_address', '674 Joseph E Lowery Blvd, Atlanta, GA 30310');

// Social Links
$footer_facebook = get_theme_mod('kidazzle_footer_facebook', '');
$footer_instagram = get_theme_mod('kidazzle_footer_instagram', '');
$footer_linkedin = get_theme_mod('kidazzle_footer_linkedin', '');
$footer_twitter = get_theme_mod('kidazzle_footer_twitter', '');
$footer_youtube = get_theme_mod('kidazzle_footer_youtube', '');

$has_social = $footer_facebook || $footer_instagram || $footer_linkedin || $footer_twitter || $footer_youtube;
?>
</main>

<!-- FOOTER -->
<footer class="bg-brand-ink text-white/60 py-16 relative mt-12">
	<div
		class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-white p-2 rounded-full shadow-lg border border-brand-ink/5">
		<img src="<?php echo get_template_directory_uri(); ?>/assets/images/kidazzle-logo-140x140.webp"
			alt="KIDazzle Logo" class="h-10 w-auto"
			onerror="this.src='https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/64ef561bad8c716760dfd435.png'">
	</div>

	<div class="container mx-auto px-4 md:px-6 pt-8">
		<div class="grid md:grid-cols-4 gap-12 mb-12">
			<div>

				<?php if ($has_social): ?>
					<div class="flex gap-4 mt-4">
						<?php if ($footer_facebook): ?>
							<a href="<?php echo esc_url($footer_facebook); ?>"
								class="text-white/40 hover:text-kidazzle-blue transition" target="_blank" rel="noopener"
								aria-label="Facebook"><i class="fa-brands fa-facebook text-xl"></i></a>
						<?php endif; ?>
						<?php if ($footer_instagram): ?>
							<a href="<?php echo esc_url($footer_instagram); ?>"
								class="text-white/40 hover:text-kidazzle-red transition" target="_blank" rel="noopener"
								aria-label="Instagram"><i class="fa-brands fa-instagram text-xl"></i></a>
						<?php endif; ?>
						<?php if ($footer_linkedin): ?>
							<a href="<?php echo esc_url($footer_linkedin); ?>"
								class="text-white/40 hover:text-kidazzle-blue transition" target="_blank" rel="noopener"
								aria-label="LinkedIn"><i class="fa-brands fa-linkedin text-xl"></i></a>
						<?php endif; ?>
						<?php if ($footer_twitter): ?>
							<a href="<?php echo esc_url($footer_twitter); ?>" class="text-white/40 hover:text-white transition"
								target="_blank" rel="noopener" aria-label="Twitter/X"><i
									class="fa-brands fa-x-twitter text-xl"></i></a>
						<?php endif; ?>
						<?php if ($footer_youtube): ?>
							<a href="<?php echo esc_url($footer_youtube); ?>"
								class="text-white/40 hover:text-kidazzle-red transition" target="_blank" rel="noopener"
								aria-label="YouTube"><i class="fa-brands fa-youtube text-xl"></i></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
			<div>
				<h4 class="text-white font-bold mb-6 italic tracking-widest uppercase text-xs">Quick Links</h4>
				<div class="space-y-3 text-sm flex flex-col">
					<?php kidazzle_footer_nav(); ?>
				</div>
			</div>
			<div>
				<h4 class="text-white font-bold mb-6 italic tracking-widest uppercase text-xs">Resources</h4>
				<ul class="space-y-3 text-sm">
					<li><a href="<?php echo home_url('/teacher-portal'); ?>"
							class="hover:text-kidazzle-blue transition">Teacher Portal</a></li>
					<li><a href="<?php echo home_url('/resources'); ?>"
							class="hover:text-kidazzle-yellow transition">Parent Resources</a></li>
				</ul>
			</div>
			<div>
				<h4 class="text-white font-bold mb-6 italic tracking-widest uppercase text-xs">Contact</h4>
				<ul class="space-y-3 text-sm">
					<?php if ($footer_address): ?>
						<li><?php echo esc_html($footer_address); ?></li>
					<?php endif; ?>
					<?php if ($footer_phone): ?>
						<li class="font-bold text-white text-lg"><?php echo esc_html($footer_phone); ?></li>
					<?php endif; ?>
					<?php if ($footer_email): ?>
						<li><a href="mailto:<?php echo esc_attr($footer_email); ?>"
								class="hover:text-kidazzle-yellow transition"><?php echo esc_html($footer_email); ?></a>
						</li>
					<?php endif; ?>
					<li><a href="<?php echo home_url('/contact'); ?>"
							class="text-kidazzle-yellow underline mt-2 block">Open Contact
							Form</a></li>
				</ul>
			</div>
		</div>

		<div class="border-t border-white/10 pt-8 text-center text-xs text-white/40">
			<span>&copy; <?php echo date('Y'); ?> KIDAZZLE Child Care Inc. All rights reserved.</span>
		</div>

		<!-- Footer SEO Text -->
		<?php
		$seo_text = get_theme_mod('kidazzle_footer_seo_text');
		if ($seo_text): ?>
			<div
				class="border-t border-white/10 pt-6 mt-6 text-[11px] text-white/60 leading-relaxed text-center max-w-5xl mx-auto">
				<?php echo wp_kses_post($seo_text); ?>
			</div>
		<?php endif; ?>
	</div>
</footer>


<!-- Global Sticky CTA -->
<?php
$show_sticky_cta = true;
$sticky_text = __('Ready to experience the KIDAZZLE difference?', 'kidazzle-theme');
$sticky_btn_text = __('Schedule a Tour', 'kidazzle-theme');
$sticky_url = home_url('/contact');

if (is_page('contact') || is_page('careers')) {
	$show_sticky_cta = false;
} elseif (is_singular('program')) {
	$sticky_text = sprintf(__('Ready to enroll in <strong>%s</strong>?', 'kidazzle-theme'), get_the_title());
} elseif (is_singular('location')) {
	$sticky_text = sprintf(__('Ready to visit our <strong>%s</strong> campus?', 'kidazzle-theme'), get_the_title());
}

if ($show_sticky_cta):
	?>
	<div id="sticky-cta"
		class="md:hidden will-change-transform transform translate-y-full fixed bottom-0 left-0 right-0 bg-slate-900/95 backdrop-blur-md text-white py-4 px-6 z-50 shadow-[0_-5px_20px_rgba(0,0,0,0.1)] border-t border-white/10 transition-transform duration-500 ease-out">
		<div class="max-w-7xl mx-auto flex flex-col items-center justify-between gap-4 text-center">
			<span class="text-sm font-medium tracking-wide">
				<?php echo $sticky_text; ?>
			</span>
			<a href="<?php echo esc_url($sticky_url); ?>"
				class="inline-block bg-orange-500 text-white text-xs font-bold uppercase tracking-wider px-8 py-3 rounded-full hover:bg-white hover:text-orange-500 transition-all shadow-md">
				<?php echo esc_html($sticky_btn_text); ?>
			</a>
		</div>
	</div>
<?php endif; ?>

<!-- Contact Modal (Global) - Hidden by default -->
<div id="contact-modal"
	class="hidden fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/80 backdrop-blur-sm animate-fade-in">
	<div class="relative w-full max-w-3xl bg-white rounded-3xl shadow-2xl max-h-[90vh] overflow-y-auto p-8">
		<button onclick="closeContactModal()"
			class="absolute top-4 right-4 p-2 bg-slate-100 rounded-full hover:bg-slate-200 transition">
			<i class="fa-solid fa-xmark text-slate-600"></i>
		</button>
		<div class="text-center mb-8">
			<h3 class="text-2xl font-bold text-slate-900">How Can We Help?</h3>
			<p class="text-slate-500">Select an option below.</p>
		</div>
		<div
			class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-[2rem] p-4 text-center h-[600px] overflow-hidden">
			<iframe src="https://api.leadconnectorhq.com/widget/form/N8RYaUY1SuORexcyA6la"
				style="width:100%;height:100%;border:none;border-radius:20px" id="inline-N8RYaUY1SuORexcyA6la"
				data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
				data-activation-type="alwaysActivated" data-activation-value="" data-deactivation-type="neverDeactivate"
				data-deactivation-value="" data-form-name="2023 New KIDazzel website contact " data-height="870"
				data-layout-iframe-id="inline-N8RYaUY1SuORexcyA6la" data-form-id="N8RYaUY1SuORexcyA6la"
				title="2023 New KIDazzel website contact ">
			</iframe>
			<script src="https://link.msgsndr.com/js/form_embed.js" async></script>
		</div>
	</div>
</div>

<!-- Scripts -->
<script>
	// Modal Logic
	const contactModal = document.getElementById('contact-modal');
	function openContactModal() { if (contactModal) contactModal.classList.remove('hidden'); }
	function closeContactModal() { if (contactModal) contactModal.classList.add('hidden'); }

	// Sticky CTA Scroll Logic
	window.addEventListener('scroll', function () {
		const cta = document.getElementById('sticky-cta');
		if (!cta) return;
		if (window.scrollY > 300) {
			cta.classList.remove('translate-y-full');
		} else {
			cta.classList.add('translate-y-full');
		}
	}, { passive: true });

	// Initialize Lucide Icons
	if (typeof lucide !== 'undefined') {
		lucide.createIcons();
	}
</script>

<?php wp_footer(); ?>
<?php
// Footer scripts from Customizer
$footer_scripts = get_theme_mod('kidazzle_footer_scripts');
if ($footer_scripts) {
	if (current_user_can('unfiltered_html')) {
		echo $footer_scripts;
	} else {
		echo wp_kses($footer_scripts, array(
			'script' => array(
				'src' => true,
				'async' => true,
				'defer' => true,
				'type' => true,
				'id' => true,
			),
			'noscript' => array(),
		));
	}
}
?>
</body>

</html>