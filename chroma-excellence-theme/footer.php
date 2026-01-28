<?php
/**
 * The template for displaying the footer
 *
 * @package Kidazzle_Theme
 */
?>
</main>

<footer class="bg-gray-900 text-gray-300 py-16 border-t-8 border-yellow-400">
	<div class="container mx-auto px-4 md:px-6">
		<div class="grid md:grid-cols-4 gap-12 mb-12">
			<!-- Brand -->
			<div>
				<span class="text-2xl font-extrabold text-white tracking-tighter mb-6 block">KID<span
						class="text-yellow-500">azzle</span></span>
				<p class="text-sm leading-relaxed mb-6 text-gray-400">Providing elite, independent child care and early
					education. Nurturing the future, one bright mind at a time.</p>
			</div>

			<!-- Quick Links -->
			<div>
				<h4 class="text-white font-bold mb-6 text-lg">Quick Links</h4>
				<ul class="space-y-3 text-sm">
					<li><a href="<?php echo esc_url(home_url('/programs')); ?>"
							class="hover:text-yellow-400 transition">Programs</a></li>
					<li><a href="<?php echo esc_url(home_url('/locations')); ?>"
							class="hover:text-yellow-400 transition">Find a Center</a></li>
					<li><a href="<?php echo esc_url(home_url('/contact')); ?>"
							class="hover:text-yellow-400 transition">Contact Us</a></li>
				</ul>
			</div>

			<!-- Contact -->
			<div>
				<h4 class="text-white font-bold mb-6 text-lg">Contact</h4>
				<ul class="space-y-4 text-sm">
					<li class="flex items-start gap-3">
						<!-- MapPin Icon -->
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="text-yellow-500 mt-1 shrink-0">
							<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
							<circle cx="12" cy="10" r="3" />
						</svg>
						<span>Corporate Office: <br />100 Alabama St SW, Atlanta, GA</span>
					</li>
					<li class="flex items-center gap-3">
						<!-- Phone Icon -->
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
							stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
							class="text-yellow-500 shrink-0">
							<path
								d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
						</svg>
						<a href="tel:8774101002" class="font-bold text-white hover:text-yellow-400">877-410-1002</a>
					</li>
				</ul>
			</div>
		</div>

		<!-- Bottom Bar -->
		<div class="border-t border-gray-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
			<div class="flex flex-wrap justify-center gap-6">
				<span>© <?php echo date('Y'); ?> KIDazzle Child Care Inc.</span>
				<a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="hover:text-white underline">Privacy
					Policy</a>
			</div>
			<div class="flex items-center gap-2">
				<span class="text-gray-500 font-bold uppercase tracking-wide">Quality Rated</span>
				<div class="flex text-yellow-500 gap-1">
					<!-- Star Icons -->
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
						fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round">
						<polygon
							points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
						fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round">
						<polygon
							points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
						fill="currentColor" stroke="currentColor" stroke-width="2" stroke-linecap="round"
						stroke-linejoin="round">
						<polygon
							points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
					</svg>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
<?php echo get_theme_mod('chroma_footer_scripts'); ?>
</body>

</html>