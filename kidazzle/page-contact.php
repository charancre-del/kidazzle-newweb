<?php
/**
 * Template Name: Contact Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<!-- 8. CONTACT VIEW -->
<div id="view-contact" class="view-section active block">
	<div class="bg-indigo-600 py-20 text-white text-center">
		<h1 class="text-5xl font-extrabold mb-4">Contact Us</h1>
		<p class="text-xl text-indigo-200">We're here to help you finding the perfect care.</p>
	</div>

	<div class="container mx-auto px-4 py-16">
		<div class="grid lg:grid-cols-2 gap-16 max-w-6xl mx-auto">

			<!-- Contact Info -->
			<div>
				<h2 class="text-3xl font-bold text-slate-900 mb-8">Get in Touch</h2>

				<div class="space-y-8">
					<div class="flex gap-4">
						<div
							class="w-12 h-12 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center shrink-0">
							<i data-lucide="map-pin"></i></div>
						<div>
							<h3 class="font-bold text-lg text-slate-900">Corporate Office</h3>
							<p class="text-slate-600">100 Alabama St SW,<br>Atlanta, GA 30303</p>
						</div>
					</div>

					<div class="flex gap-4">
						<div
							class="w-12 h-12 bg-green-50 text-green-600 rounded-xl flex items-center justify-center shrink-0">
							<i data-lucide="phone"></i></div>
						<div>
							<h3 class="font-bold text-lg text-slate-900">Phone</h3>
							<p class="text-slate-600"><a href="tel:877-410-1002"
									class="hover:text-green-600 font-bold">877-410-1002</a></p>
							<p class="text-xs text-slate-400">Mon-Fri 8am-5pm EST</p>
						</div>
					</div>

					<div class="flex gap-4">
						<div
							class="w-12 h-12 bg-red-50 text-red-600 rounded-xl flex items-center justify-center shrink-0">
							<i data-lucide="mail"></i></div>
						<div>
							<h3 class="font-bold text-lg text-slate-900">Email</h3>
							<p class="text-slate-600"><a href="mailto:info@kidazzlechildcare.com"
									class="hover:text-red-600 font-bold">info@kidazzlechildcare.com</a></p>
						</div>
					</div>

					<div class="p-6 bg-slate-50 rounded-2xl border border-slate-200 mt-8">
						<h4 class="font-bold text-slate-900 mb-2">Looking for a specific center?</h4>
						<p class="text-sm text-slate-600 mb-4">Find contact details for your nearest location.</p>
						<a href="<?php echo home_url('/locations'); ?>"
							class="inline-flex items-center gap-2 text-indigo-600 font-bold hover:underline">
							View All Locations <i data-lucide="arrow-right" class="w-4 h-4"></i>
						</a>
					</div>
				</div>
			</div>

			<!-- Contact Form -->
			<div class="bg-white p-8 md:p-10 rounded-3xl shadow-xl border border-slate-100">
				<h3 class="text-2xl font-bold text-slate-900 mb-6">Send us a Message</h3>
				<?php
				// Use standard WPForms or shortcode if available, else standard HTML form placeholder for now
				if (shortcode_exists('wpforms')) {
					echo do_shortcode('[wpforms id="contact" title="false"]');
				} elseif (shortcode_exists('kidazzle_contact_form')) {
					echo do_shortcode('[kidazzle_contact_form]');
				} else {
					?>
					<form class="space-y-4" action="#" method="POST">
						<div class="grid md:grid-cols-2 gap-4">
							<div>
								<label class="block text-sm font-bold text-slate-700 mb-1">First Name</label>
								<input type="text"
									class="w-full bg-slate-50 border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
							</div>
							<div>
								<label class="block text-sm font-bold text-slate-700 mb-1">Last Name</label>
								<input type="text"
									class="w-full bg-slate-50 border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
							</div>
						</div>
						<div>
							<label class="block text-sm font-bold text-slate-700 mb-1">Email</label>
							<input type="email"
								class="w-full bg-slate-50 border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
						</div>
						<div>
							<label class="block text-sm font-bold text-slate-700 mb-1">Message</label>
							<textarea rows="4"
								class="w-full bg-slate-50 border border-slate-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
						</div>
						<button type="submit"
							class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-xl transition shadow-lg">
							Send Message
						</button>
					</form>
				<?php } ?>
			</div>

		</div>
	</div>
</div>

<?php
get_footer();
