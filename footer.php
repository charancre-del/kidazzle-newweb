<?php
/**
 * The template for displaying the footer
 *
 * @package kidazzle_Excellence
 */

// Get Footer Customizer Settings
$footer_phone = get_theme_mod('kidazzle_footer_phone', '1 678-940-6099');
$footer_email = get_theme_mod('kidazzle_footer_email', 'info@thewimperprogram.com');
$footer_address = get_theme_mod('kidazzle_footer_address', '');

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
<footer class="bg-navy text-white py-24 border-t border-white/5">
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
		<div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-20">
			<div class="col-span-1 md:col-span-1">
				<div class="flex flex-col border-l-4 border-gold pl-4 mb-8">
					<span
						class="text-xl font-bold text-white tracking-tight font-serif leading-none">W.I.M.P.E.R.</span>
					<span class="text-[9px] uppercase tracking-[0.1em] text-slate-500 font-semibold mt-1">Wellness &
						Integrated Medical Plan Expense Reimbursement</span>
				</div>
				<p class="text-slate-500 text-xs leading-relaxed font-light">
					The proprietary financial chassis for self-funded EBITDA expansion and payroll tax optimization.
				</p>
			</div>
			<div>
				<h4 class="text-white text-xs font-bold uppercase tracking-[0.2em] mb-8">Navigation</h4>
				<ul class="space-y-4 text-slate-500 text-xs font-bold uppercase tracking-widest">
					<li><span onclick="navigateTo('home')" class="hover:text-gold transition cursor-pointer">The
							Vision</span></li>
					<li><span onclick="navigateTo('method')" class="hover:text-gold transition cursor-pointer">The
							Chassis</span></li>
					<li><span onclick="navigateTo('iul')" class="hover:text-gold transition cursor-pointer">Wealth
							Strategy</span></li>
					<li><span onclick="navigateTo('blog')"
							class="hover:text-gold transition cursor-pointer">Insights</span></li>
				</ul>
			</div>
			<div>
				<h4 class="text-white text-xs font-bold uppercase tracking-[0.2em] mb-8">Legal</h4>
				<ul class="space-y-4 text-slate-500 text-xs font-bold uppercase tracking-widest">
					<li><a href="#" class="hover:text-gold transition">Privacy Protocol</a></li>
					<li><a href="#" class="hover:text-gold transition">Compliance Shield</a></li>
					<li><a href="#" class="hover:text-gold transition">Terms of Service</a></li>
				</ul>
			</div>
			<div>
				<h4 class="text-white text-xs font-bold uppercase tracking-[0.2em] mb-8">Connection</h4>
				<div class="flex space-x-6 text-slate-500">
					<a href="#" class="hover:text-gold transition"><i class="fab fa-linkedin-in text-xl"></i></a>
					<a href="#" class="hover:text-gold transition"><i class="fab fa-twitter text-xl"></i></a>
				</div>
			</div>
		</div>
		<div class="pt-8 border-t border-white/5 flex flex-col md:flex-row justify-between items-center gap-6">
			<p class="text-[10px] text-slate-600 uppercase tracking-widest">© 2026 W.I.M.P.E.R. Program Inc. All rights
				reserved.</p>
			<p class="text-[10px] text-slate-600 uppercase tracking-widest">Proprietary Financial Architecture</p>
		</div>
	</div>
</footer>


<script>
	// Sticky CTA Scroll Logic
	window.addEventListener('scroll', function () {
		const cta = document.getElementById('sticky-cta');
		if (!cta) return;
		if (window.scrollY > 300) {
			cta.classList.remove('translate-y-full');
		} else {
			cta.classList.add('translate-y-full');
		}
	}, {
		passive: true
	});

	// Initialize Lucide Icons
	if (typeof lucide !== 'undefined') {
		lucide.createIcons();
	}
</script>

<?php wp_footer(); ?>
<?php
/**
 * Note: We have commented out legacy footer scripts to prioritize the W.I.M.P.E.R. identity.
 * If you need to re-enable tracking or external scripts, please use a dedicated plugin or 
 * add them directly to this file within a <script> tag.
 */
/*
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
*/
?>
</body>

</html>