<?php
/**
 * The template for displaying the footer
 *
 * @package kidazzle_Excellence
 */
?>
</main>

<!-- FOOTER -->
<footer class="bg-slate-900 text-slate-300 py-16 relative mt-12">
	<div
		class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-white p-2 rounded-full shadow-lg border border-slate-100">
		<!-- Footer Logo Placeholder -->
		<div class="h-10 w-10 bg-slate-100 rounded-full flex items-center justify-center font-bold text-slate-900">K
		</div>
	</div>

	<div class="container mx-auto px-4 md:px-6 pt-8">
		<div class="grid md:grid-cols-4 gap-12 mb-12">
			<div>
				<div class="flex items-center gap-2 mb-6">
					<span class="text-2xl font-bold text-white">KID<span class="text-yellow-500">azzle</span></span>
				</div>
				<p class="text-sm leading-relaxed mb-6 text-slate-400">Providing elite, independent child care and early
					education.</p>
			</div>
			<div>
				<h4 class="text-white font-bold mb-6">Quick Links</h4>
				<ul class="space-y-3 text-sm cursor-pointer">
					<li><a href="<?php echo home_url('/programs'); ?>"
							class="hover:text-red-400 transition">Programs</a></li>
					<li><a href="<?php echo home_url('/locations'); ?>"
							class="hover:text-green-400 transition">Locations</a></li>
					<li><a href="<?php echo home_url('/careers'); ?>" class="hover:text-cyan-400 transition">Careers</a>
					</li>
				</ul>
			</div>
			<div>
				<h4 class="text-white font-bold mb-6">Resources</h4>
				<ul class="space-y-3 text-sm cursor-pointer">
					<li><a href="<?php echo home_url('/teacher-portal'); ?>"
							class="hover:text-cyan-400 transition">Teacher Portal</a></li>
					<li><a href="#" class="hover:text-yellow-400 transition">Parent Portal</a></li>
				</ul>
			</div>
			<div>
				<h4 class="text-white font-bold mb-6">Contact</h4>
				<ul class="space-y-3 text-sm">
					<li>100 Alabama St SW, Atlanta, GA</li>
					<li class="font-bold text-white">877-410-1002</li>
					<li><a href="<?php echo home_url('/contact'); ?>" class="text-cyan-400 underline mt-2">Open Contact
							Form</a></li>
				</ul>
			</div>
		</div>
		<div class="border-t border-slate-800 pt-8 text-center text-xs text-slate-500">
			<span>&copy; <?php echo date('Y'); ?> KIDAZZLE Child Care Inc. All rights reserved.</span>
		</div>

		<!-- Footer SEO Text -->
		<?php
		$seo_text = get_theme_mod('kidazzle_footer_seo_text');
		if ($seo_text): ?>
			<div class="border-t border-white/10 pt-6 mt-6 text-[11px] text-white/60 leading-relaxed text-center max-w-5xl mx-auto">
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
	$sticky_text = sprintf( __('Ready to enroll in <strong>%s</strong>?', 'kidazzle-theme'), get_the_title() );
} elseif (is_singular('location')) {
	$sticky_text = sprintf( __('Ready to visit our <strong>%s</strong> campus?', 'kidazzle-theme'), get_the_title() );
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
			<i data-lucide="x" class="w-6 h-6 text-slate-600"></i>
		</button>
		<div class="text-center mb-8">
			<h3 class="text-2xl font-bold text-slate-900">How Can We Help?</h3>
			<p class="text-slate-500">Select an option below.</p>
		</div>
		<!-- Embed Placeholder -->
		<div
			class="bg-slate-50 border-2 border-dashed border-slate-300 rounded-xl p-12 text-center h-96 flex flex-col items-center justify-center">
			<div class="text-slate-400 font-mono text-xs mb-4 w-full break-all">
				<!-- PASTE 123 FORM EMBED CODE HERE -->
				&lt;iframe src="https://www.123formbuilder.com/..." &gt;&lt;/iframe&gt;
			</div>
			<p class="font-bold text-slate-700">123 Form Placeholder</p>
			<div class="flex justify-center gap-4 mt-4 text-sm text-slate-500">
				<span class="bg-white px-2 py-1 rounded border">Enrollment</span>
				<span class="bg-white px-2 py-1 rounded border">Hiring</span>
				<span class="bg-white px-2 py-1 rounded border">Service</span>
			</div>
		</div>
	</div>
</div>

<!-- Scripts -->
<script>
	// Modal Logic
	const contactModal = document.getElementById('contact-modal');
	function openContactModal() { if (contactModal) contactModal.classList.remove('hidden'); }
	function closeContactModal() { if (contactModal) contactModal.classList.add('hidden'); }

	// Lucide Init
	if (typeof lucide !== 'undefined') {
		lucide.createIcons();
	}

    // Sticky CTA Scroll Logic
    window.addEventListener('scroll', function() {
        const cta = document.getElementById('sticky-cta');
        if (!cta) return;
        if (window.scrollY > 300) {
            cta.classList.remove('translate-y-full');
        } else {
            cta.classList.add('translate-y-full');
        }
    }, { passive: true });
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
