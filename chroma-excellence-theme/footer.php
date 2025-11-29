<?php
/**
 * The template for displaying the footer
 *
 * @package Chroma_Excellence
 */
?>
<a href="https://www.facebook.com/ChromaPreschool/" target="_blank" rel="noopener noreferrer"
	class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full hover:bg-white/20 transition"
	aria-label="Visit our Facebook page">
	<i class="fa-brands fa-facebook-f text-lg"></i>
</a>
<a href="https://www.instagram.com/chromapreschool/" target="_blank" rel="noopener noreferrer"
	class="w-12 h-12 flex items-center justify-center bg-white/10 rounded-full hover:bg-white/20 transition"
	aria-label="Visit our Instagram page">
	<i class="fa-brands fa-instagram text-lg"></i>
</a>
</div>
</div>
</div>

<!-- Bottom Section -->
<div
	class="border-t border-white/10 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-white/50">
	<p>&copy; <?php echo date('Y'); ?> Chroma Early Learning Academy. All rights reserved.</p>
	<div class="flex gap-4">
		<a href="<?php echo esc_url(home_url('/privacy-policy')); ?>" class="hover:text-white">Privacy
			Policy</a>
		<a href="<?php echo esc_url(home_url('/terms-of-service')); ?>" class="hover:text-white">Terms of
			Service</a>
	</div>
</div>
</div>
</footer>

<?php wp_footer(); ?>
<?php echo get_theme_mod('chroma_footer_scripts'); ?>
</body>

</html>