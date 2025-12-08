<?php
/**
 * Template Name: Careers Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<!-- 6. CAREERS VIEW -->
<div id="view-careers" class="view-section active block">
	<div class="bg-pink-500 py-20 text-white text-center">
		<h1 class="text-5xl font-extrabold mb-4">Join Our Team</h1>
		<p class="text-xl text-pink-100">Make a difference in the lives of children.</p>
	</div>

	<div class="container mx-auto px-4 py-16">
		<div class="flex flex-col lg:flex-row gap-12 items-start max-w-6xl mx-auto">
			<div class="lg:w-1/2">
				<h2 class="text-3xl font-bold text-slate-900 mb-6">Why KIDazzle?</h2>
				<div class="space-y-6">
					<div class="flex gap-4">
						<div
							class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center shrink-0">
							<i data-lucide="smile"></i></div>
						<div>
							<h3 class="font-bold text-lg text-slate-900">Supportive Culture</h3>
							<p class="text-slate-600">We treat our staff like family. Ask about our tenure bonuses!</p>
						</div>
					</div>
					<div class="flex gap-4">
						<div
							class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center shrink-0">
							<i data-lucide="trending-up"></i></div>
						<div>
							<h3 class="font-bold text-lg text-slate-900">Growth Opportunities</h3>
							<p class="text-slate-600">Paid training and CDA certification assistance.</p>
						</div>
					</div>
					<div class="flex gap-4">
						<div
							class="w-12 h-12 bg-pink-100 text-pink-600 rounded-xl flex items-center justify-center shrink-0">
							<i data-lucide="award"></i></div>
						<div>
							<h3 class="font-bold text-lg text-slate-900">Competitive Benefits</h3>
							<p class="text-slate-600">Health, dental, and vision options available.</p>
						</div>
					</div>
				</div>
			</div>

			<div class="lg:w-1/2 bg-slate-50 p-8 rounded-3xl border border-slate-200">
				<h3 class="text-2xl font-bold text-slate-900 mb-6">Current Openings</h3>
				<div class="space-y-4">
					<!-- Placeholder Jobs -->
					<div
						class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex justify-between items-center">
						<div>
							<h4 class="font-bold text-slate-900">Lead Teacher (Preschool)</h4>
							<p class="text-sm text-slate-500">Riverdale, GA • Full-Time</p>
						</div>
						<a href="mailto:careers@kidazzlechildcare.com"
							class="text-pink-600 font-bold hover:underline">Apply</a>
					</div>
					<div
						class="bg-white p-6 rounded-xl shadow-sm border border-slate-100 flex justify-between items-center">
						<div>
							<h4 class="font-bold text-slate-900">Assistant Director</h4>
							<p class="text-sm text-slate-500">Fairburn, GA • Full-Time</p>
						</div>
						<a href="mailto:careers@kidazzlechildcare.com"
							class="text-pink-600 font-bold hover:underline">Apply</a>
					</div>
				</div>
				<div class="mt-8 pt-6 border-t border-slate-200 text-center">
					<p class="text-slate-600 mb-4">Don't see your role? Send us your resume!</p>
					<a href="mailto:careers@kidazzlechildcare.com"
						class="inline-block bg-slate-900 text-white font-bold py-3 px-8 rounded-full hover:bg-slate-800 transition">Email
						Recruiting</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
