<?php
/**
 * Template Name: Locations Page
 *
 * @package kidazzle_Excellence
 */

get_header();

// Locations Data (Converted from Source JS locationsData)
$locations = [
	'westend' => [
		'id' => "westend",
		'name' => "West End Center",
		'city' => "Atlanta, GA",
		'address' => "674 Joseph E Lowery Blvd, Atlanta, GA 30310",
		'phone' => "(404) 753-8884",
		'email' => "westend@kidazzle.com",
		'desc' => "Rooted in culture, bursting with creativity — West End kids shine in every crayon stroke.",
		'features' => ["Arts Focus", "Historic District", "Pre-K Program"]
	],
	'summit' => [
		'id' => "summit",
		'name' => "IRS Summit Building",
		'city' => "Midtown Atlanta, GA",
		'address' => "401 W Peachtree St NW, Atlanta, GA 30308",
		'phone' => "(404) 555-0101",
		'email' => "summit@kidazzle.com",
		'desc' => "Bright minds meet big city energy. Convenient for federal employees.",
		'features' => ["Bilingual Center", "Infant Care", "Federal Employee Priority"]
	],
	'memphis' => [
		'id' => "memphis",
		'name' => "Downtown Memphis",
		'city' => "Memphis, TN",
		'address' => "200 Main St, Memphis, TN 38103",
		'phone' => "(901) 555-0105",
		'email' => "memphis@kidazzle.com",
		'desc' => "From blues to blocks, we've got Memphis rhythm and preschool brilliance.",
		'features' => ["FedEx Hub Nearby", "Music Program", "Extended Hours"]
	],
	'afc' => [
		'id' => "afc",
		'name' => "Atlanta Federal Center",
		'city' => "Downtown Atlanta, GA",
		'address' => "61 Forsyth St SW, Atlanta, GA 30303",
		'phone' => "(404) 555-0102",
		'email' => "afc@kidazzle.com",
		'desc' => "A hub for hugs, discovery, and Storytime superstars — your downtown oasis.",
		'features' => ["Secure Federal Facility", "GA Pre-K", "Toddler Discovery"]
	],
	'collegepark' => [
		'id' => "collegepark",
		'name' => "College Park Center",
		'city' => "College Park, GA",
		'address' => "1701 Columbia Ave, College Park, GA 30337",
		'phone' => "(404) 555-0103",
		'email' => "collegepark@kidazzle.com",
		'desc' => "Where little learners take flight — right in the heart of College Park.",
		'features' => ["Near Airport", "STEAM Focus", "Transportation"]
	],
	'hampton' => [
		'id' => "hampton",
		'name' => "Hampton Center",
		'city' => "Hampton, GA",
		'address' => "Hampton, GA",
		'phone' => "(770) 555-0199",
		'email' => "hampton@kidazzle.com",
		'desc' => "Where the kids sparkle brighter than the Georgia sunshine.",
		'features' => ["School Readiness", "Large Playground", "Summer Camp"]
	],
	'miami' => [
		'id' => "miami",
		'name' => "Doral International",
		'city' => "Doral, FL",
		'address' => "8800 NW 36th St, Doral, FL 33178",
		'phone' => "(305) 555-0106",
		'email' => "miami@kidazzle.com",
		'desc' => "Sunshine, smiles, and Spanish flair — Spanish immersion learning.",
		'features' => ["Spanish Immersion", "STEM Lab", "Cultural Arts"]
	]
];
?>

<!-- 4. LOCATIONS VIEW (List) -->
<div id="view-locations" class="view-section active block">
	<div class="bg-cyan-50 py-20">
		<div class="container mx-auto px-4 text-center">
			<h1 class="text-5xl font-extrabold mb-4 text-slate-900">Our Locations</h1>
			<p class="text-xl max-w-2xl mx-auto text-slate-600">Find a KIDazzle center near you.</p>
		</div>
	</div>
	<div class="container mx-auto px-4 py-16 grid md:grid-cols-2 lg:grid-cols-3 gap-8" id="locations-grid">
		<!-- Rendered PHP Locations matching source renderLocationList JS logic -->
		<?php foreach ($locations as $loc): ?>
			<div class="border border-slate-200 rounded-3xl p-8 hover:shadow-xl transition bg-white group flex flex-col">
				<h3 class="text-2xl font-bold text-slate-900 mb-2"><?php echo esc_html($loc['name']); ?></h3>
				<p class="text-slate-500 mb-4 text-sm"><?php echo esc_html($loc['address']); ?></p>
				<div class="flex-grow mb-6">
					<div class="flex flex-wrap gap-2">
						<?php foreach ($loc['features'] as $f): ?>
							<span
								class="bg-cyan-50 text-cyan-700 text-xs px-2 py-1 rounded-md font-bold"><?php echo esc_html($f); ?></span>
						<?php endforeach; ?>
					</div>
				</div>
				<button
					class="w-full bg-slate-900 text-white font-bold py-3 rounded-xl hover:bg-cyan-600 transition shadow-md">View
					Details</button>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<script>
	function focusLocation(id) {
		// Logic to highlight marker on map would go here
		console.log('Focusing location:', id);
	}
</script>

<?php
get_footer();
