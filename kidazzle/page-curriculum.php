<?php
/**
 * Template Name: Curriculum Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<!-- 4. CURRICULUM VIEW -->
<div id="view-curriculum" class="view-section active block">
	<div class="bg-cyan-500 py-20 text-white text-center">
		<h1 class="text-5xl font-extrabold mb-4">Our Curriculum</h1>
		<p class="text-xl text-cyan-100">Sparking curiosity through play-based learning.</p>
	</div>

	<div class="container mx-auto px-4 py-16">
		<div class="max-w-4xl mx-auto">
			<div class="mb-16">
				<h2 class="text-3xl font-bold text-slate-900 mb-6 flex items-center gap-3">
					<span class="w-10 h-10 bg-cyan-100 text-cyan-600 rounded-full flex items-center justify-center"><i
							data-lucide="book-open"></i></span>
					The Creative Curriculum®
				</h2>
				<div class="prose prose-lg text-slate-600">
					<p>At KIDazzle, we utilize <strong>The Creative Curriculum®</strong>, a widely respected,
						research-based program that honors creativity and respects the role that teachers play in making
						learning exciting and relevant.</p>
					<p>We believe that children learn best through active exploration of their environment. Our
						classrooms are designed with distinct interest areas—Blocks, Dramatic Play, Art, Library,
						Discovery, Sand and Water, Music and Movement, Cooking, Computers, and Outdoors.</p>
				</div>
			</div>

			<div class="grid md:grid-cols-2 gap-8 mb-16">
				<div class="bg-white p-8 rounded-3xl shadow-lg border border-slate-100">
					<h3 class="font-bold text-xl text-slate-900 mb-4">Key Objectives</h3>
					<ul class="space-y-3">
						<li class="flex items-start gap-3">
							<i data-lucide="check-circle" class="w-5 h-5 text-green-500 mt-1"></i>
							<span class="text-slate-600"><strong>Social-Emotional:</strong> Regulating emotions and
								building relationships.</span>
						</li>
						<li class="flex items-start gap-3">
							<i data-lucide="check-circle" class="w-5 h-5 text-green-500 mt-1"></i>
							<span class="text-slate-600"><strong>Physical:</strong> Gross and fine motor
								strength.</span>
						</li>
						<li class="flex items-start gap-3">
							<i data-lucide="check-circle" class="w-5 h-5 text-green-500 mt-1"></i>
							<span class="text-slate-600"><strong>Language:</strong> Listening, speaking, and
								vocabulary.</span>
						</li>
						<li class="flex items-start gap-3">
							<i data-lucide="check-circle" class="w-5 h-5 text-green-500 mt-1"></i>
							<span class="text-slate-600"><strong>Cognitive:</strong> Learning, problem-solving, and
								logical thinking.</span>
						</li>
					</ul>
				</div>
				<div class="bg-slate-900 p-8 rounded-3xl shadow-lg text-white">
					<h3 class="font-bold text-xl mb-4">State Standards</h3>
					<p class="text-slate-300 mb-6">Our curriculum aligns with state early learning standards to ensuring
						school readiness.</p>
					<div class="space-y-4">
						<div class="flex items-center gap-4 p-4 bg-white/10 rounded-xl">
							<div class="font-bold text-2xl text-yellow-400">GELDS</div>
							<div class="text-sm">Georgia Early Learning and Development Standards</div>
						</div>
						<div class="flex items-center gap-4 p-4 bg-white/10 rounded-xl">
							<div class="font-bold text-2xl text-orange-400">TN-ELDS</div>
							<div class="text-sm">Tennessee Early Learning Developmental Standards</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
