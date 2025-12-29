<?php
/**
 * The front page template file
 *
 * @package Chroma_Excellence
 */

get_header(); ?>

<!-- Hero Section -->
<header class="relative w-full h-[650px] flex items-center overflow-hidden bg-indigo-900">
        <div class="absolute inset-0 z-0">
                <?php
                $hero_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                if (!$hero_image) {
                        $hero_image = 'https://images.unsplash.com/photo-1560785496-0c9018085c8f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80';
                }
                ?>
                <img src="<?php echo esc_url($hero_image); ?>" alt="KIDazzle Classroom"
                        class="w-full h-full object-cover object-center opacity-40" />
                <div class="absolute inset-0 bg-gradient-to-r from-indigo-900/90 via-indigo-900/40 to-transparent">
                </div>
        </div>
        <div class="container mx-auto px-4 md:px-6 relative z-10 mt-10">
                <div class="max-w-3xl text-white">
                        <div class="flex flex-wrap items-center gap-2 mb-6">
                                <span
                                        class="bg-yellow-400 text-indigo-900 px-4 py-1 rounded-full text-sm font-bold uppercase tracking-wider shadow-lg">Now
                                        Enrolling</span>
                                <span
                                        class="bg-indigo-800/80 backdrop-blur text-white border border-indigo-400/30 px-4 py-1 rounded-full text-sm font-semibold flex items-center gap-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="text-yellow-400">
                                                <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                        </svg>
                                        31 Years of Excellence
                                </span>
                        </div>
                        <h1 class="text-5xl md:text-7xl font-extrabold leading-tight mb-4 drop-shadow-lg">Where Learning
                                <br /><span class="text-yellow-400">is Fun!</span></h1>
                        <p class="text-xl md:text-2xl text-indigo-100 mb-8 leading-relaxed font-medium max-w-lg">More
                                than a daycare. We are an independent, premier learning academy nurturing diverse bright
                                minds in Atlanta, Memphis, and Doral.</p>
                        <div class="flex flex-col sm:flex-row gap-4">
                                <a href="<?php echo esc_url(home_url('/locations')); ?>"
                                        class="font-bold py-3 px-8 rounded-full shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-yellow-400/50 bg-yellow-400 hover:bg-yellow-500 text-indigo-900 border-b-4 border-yellow-600">
                                        Find Your Center <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="m9 18 6-6-6-6" />
                                        </svg>
                                </a>
                                <a href="<?php echo esc_url(home_url('/curriculum')); ?>"
                                        class="font-bold py-3 px-8 rounded-full shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-yellow-400/50 bg-transparent border-2 border-white text-white hover:bg-white/10">
                                        Explore Curriculum
                                </a>
                        </div>
                </div>
        </div>
</header>

<!-- Value Props -->
<section class="py-24 bg-indigo-50/50">
        <div class="container mx-auto px-4 md:px-6">
                <div class="text-center max-w-3xl mx-auto mb-16">
                        <h2 class="text-3xl md:text-5xl font-bold text-indigo-900 mb-6">Why Families Choose KIDazzle
                        </h2>
                        <p class="text-gray-600 text-xl">We combine the resources of a large center with the personal
                                touch of a family-owned school.</p>
                </div>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <!-- Feature 1 -->
                        <div
                                class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition duration-300 border-b-4 border-transparent hover:border-yellow-400 group relative overflow-hidden block">
                                <div
                                        class="absolute top-0 right-0 w-24 h-24 bg-indigo-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-yellow-50">
                                </div>
                                <div
                                        class="bg-indigo-50 w-16 h-16 rounded-2xl rotate-3 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition duration-300 relative z-10 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="text-yellow-400">
                                                <path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2" />
                                                <path d="M7 2v20" />
                                                <path d="M21 15V2v0a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7" />
                                        </svg>
                                </div>
                                <h3 class="text-xl font-bold text-indigo-900 mb-3 flex items-center gap-2">Chef-Prepared
                                        Meals</h3>
                                <p class="text-gray-600 leading-relaxed text-sm">We don't do pre-packaged. Our onsite
                                        chefs prepare fresh, allergy-conscious meals daily.</p>
                        </div>
                        <!-- Feature 2 -->
                        <div
                                class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition duration-300 border-b-4 border-transparent hover:border-yellow-400 group relative overflow-hidden block">
                                <div
                                        class="absolute top-0 right-0 w-24 h-24 bg-indigo-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-yellow-50">
                                </div>
                                <div
                                        class="bg-indigo-50 w-16 h-16 rounded-2xl rotate-3 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition duration-300 relative z-10 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="text-pink-500">
                                                <path
                                                        d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z" />
                                        </svg>
                                </div>
                                <h3 class="text-xl font-bold text-indigo-900 mb-3 flex items-center gap-2">Not a
                                        Franchise. A Family.</h3>
                                <p class="text-gray-600 leading-relaxed text-sm">Independent provider built on trusted
                                        relationships, offering corporate-level structure.</p>
                        </div>
                        <!-- Feature 3 -->
                        <div
                                class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition duration-300 border-b-4 border-transparent hover:border-yellow-400 group relative overflow-hidden block">
                                <div
                                        class="absolute top-0 right-0 w-24 h-24 bg-indigo-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-yellow-50">
                                </div>
                                <div
                                        class="bg-indigo-50 w-16 h-16 rounded-2xl rotate-3 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition duration-300 relative z-10 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="text-indigo-500">
                                                <path
                                                        d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96.44 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 1.98-3A2.5 2.5 0 0 1 9.5 2Z" />
                                                <path
                                                        d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96.44 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-1.98-3A2.5 2.5 0 0 0 14.5 2Z" />
                                        </svg>
                                </div>
                                <h3 class="text-xl font-bold text-indigo-900 mb-3 flex items-center gap-2">Creative
                                        Curriculum®</h3>
                                <p class="text-gray-600 leading-relaxed text-sm">Blending rigorous education with
                                        play-based discovery for every learning style.</p>
                        </div>
                        <!-- Feature 4 -->
                        <div
                                class="bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition duration-300 border-b-4 border-transparent hover:border-yellow-400 group relative overflow-hidden block">
                                <div
                                        class="absolute top-0 right-0 w-24 h-24 bg-indigo-50 rounded-bl-full -mr-4 -mt-4 transition group-hover:bg-yellow-50">
                                </div>
                                <div
                                        class="bg-indigo-50 w-16 h-16 rounded-2xl rotate-3 flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition duration-300 relative z-10 shadow-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round" class="text-green-500">
                                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10" />
                                                <path d="m9 12 2 2 4-4" />
                                        </svg>
                                </div>
                                <h3 class="text-xl font-bold text-indigo-900 mb-3 flex items-center gap-2">Safety &
                                        Transparency</h3>
                                <p class="text-gray-600 leading-relaxed text-sm">Secure keypad access, wellness
                                        monitoring, and parent-accessible cameras.</p>
                        </div>
                </div>
        </div>
</section>

<!-- Interactive Growth Journey Graph -->
<section class="py-24 bg-white relative">
        <div class="container mx-auto px-4 md:px-6">
                <div class="mb-12 text-center">
                        <span class="font-bold uppercase tracking-wider text-sm block mb-2 text-indigo-600">Developmental
                                Milestones</span>
                        <h2 class="text-3xl md:text-5xl font-bold text-indigo-900">The KIDazzle Growth Journey</h2>
                </div>

                <div class="bg-gray-50 rounded-3xl p-8 md:p-12 shadow-inner border border-gray-100">
                        <!-- Stage Selectors -->
                        <div class="flex flex-wrap justify-center gap-4 mb-12" role="tablist"
                                aria-label="Development Stages">
                                <button role="tab" aria-selected="true" data-target="stage-infants"
                                        class="px-6 py-3 rounded-full font-bold text-sm md:text-base transition-all transform hover:-translate-y-1 shadow-lg ring-4 ring-indigo-200 scale-105 bg-indigo-600 text-white focus:outline-none focus:ring-4 focus:ring-indigo-200">Infants</button>
                                <button role="tab" aria-selected="false" data-target="stage-toddlers"
                                        class="px-6 py-3 rounded-full font-bold text-sm md:text-base transition-all transform hover:-translate-y-1 shadow-sm bg-white text-gray-500 hover:bg-white hover:text-indigo-600 border border-gray-200 focus:outline-none focus:ring-4 focus:ring-indigo-200">Toddlers</button>
                                <button role="tab" aria-selected="false" data-target="stage-preschool"
                                        class="px-6 py-3 rounded-full font-bold text-sm md:text-base transition-all transform hover:-translate-y-1 shadow-sm bg-white text-gray-500 hover:bg-white hover:text-indigo-600 border border-gray-200 focus:outline-none focus:ring-4 focus:ring-indigo-200">Preschool</button>
                                <button role="tab" aria-selected="false" data-target="stage-prek"
                                        class="px-6 py-3 rounded-full font-bold text-sm md:text-base transition-all transform hover:-translate-y-1 shadow-sm bg-white text-gray-500 hover:bg-white hover:text-indigo-600 border border-gray-200 focus:outline-none focus:ring-4 focus:ring-indigo-200">Pre-K</button>
                        </div>

                        <!-- Content Areas (Hidden/Shown via JS) -->
                        <?php
                        $stages = [
                                'infants' => ['label' => 'Infants', 'sub' => '6w - 12m', 'desc' => 'Focus on tummy time, sensory discovery, and secure emotional attachment.', 'stats' => [90, 70, 80, 40, 20]],
                                'toddlers' => ['label' => 'Toddlers', 'sub' => '12m - 24m', 'desc' => 'Explosion of movement, language acquisition, and parallel play.', 'stats' => [85, 60, 70, 85, 40]],
                                'preschool' => ['label' => 'Preschool', 'sub' => '2y - 4y', 'desc' => 'Developing independence, early literacy, and cooperative play.', 'stats' => [60, 85, 90, 80, 60]],
                                'prek' => ['label' => 'Pre-K', 'sub' => '4y - 5y', 'desc' => 'Kindergarten readiness: Focus, complex problem solving, and writing.', 'stats' => [50, 70, 85, 95, 90]],
                        ];
                        $stat_labels = ['Motor', 'Arts', 'Social', 'Music', 'Logic'];
                        $stat_icons = [
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"/></svg>',
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="13.5" cy="6.5" r=".5"/><circle cx="17.5" cy="10.5" r=".5"/><circle cx="8.5" cy="7.5" r=".5"/><circle cx="6.5" cy="12.5" r=".5"/><path d="M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10c.926 0 1.648-.746 1.648-1.688 0-.437-.18-.835-.437-1.125-.29-.289-.438-.652-.438-1.125a1.64 1.64 0 0 1 1.668-1.668h1.996c3.051 0 5.555-2.503 5.555-5.554C21.965 6.012 17.461 2 12 2z"/></svg>',
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" x2="9.01" y1="9" y2="9"/><line x1="15" x2="15.01" y1="9" y2="9"/></svg>',
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18V5l12-2v13"/><circle cx="6" cy="18" r="3"/><circle cx="18" cy="16" r="3"/></svg>',
                                '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9.5 2A2.5 2.5 0 0 1 12 4.5v15a2.5 2.5 0 0 1-4.96.44 2.5 2.5 0 0 1-2.96-3.08 3 3 0 0 1-.34-5.58 2.5 2.5 0 0 1 1.32-4.24 2.5 2.5 0 0 1 1.98-3A2.5 2.5 0 0 1 9.5 2Z"/><path d="M14.5 2A2.5 2.5 0 0 0 12 4.5v15a2.5 2.5 0 0 0 4.96.44 2.5 2.5 0 0 0 2.96-3.08 3 3 0 0 0 .34-5.58 2.5 2.5 0 0 0-1.32-4.24 2.5 2.5 0 0 0-1.98-3A2.5 2.5 0 0 0 14.5 2Z"/></svg>'
                        ];

                        foreach ($stages as $key => $data):
                                $is_active = ($key === 'infants');
                                $hidden_class = $is_active ? '' : 'hidden';
                                ?>
                                <div id="stage-<?php echo esc_attr($key); ?>"
                                        class="growth-stage-content grid md:grid-cols-12 gap-12 items-center <?php echo $hidden_class; ?>">
                                        <!-- Text Description -->
                                        <div class="md:col-span-4 animate-fade-in">
                                                <h3 class="text-3xl font-bold text-indigo-900 mb-2">
                                                        <?php echo esc_html($data['label']); ?></h3>
                                                <span
                                                        class="inline-block bg-yellow-400 text-indigo-900 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide mb-6">
                                                        <?php echo esc_html($data['sub']); ?>
                                                </span>
                                                <p class="text-gray-600 text-lg leading-relaxed mb-6">
                                                        <?php echo esc_html($data['desc']); ?></p>
                                                <a href="<?php echo esc_url(home_url('/curriculum')); ?>"
                                                        class="font-bold py-3 px-8 rounded-full shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-yellow-400/50 bg-transparent border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-50 w-full md:w-auto">
                                                        View Curriculum <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                height="18" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <path d="M5 12h14" />
                                                                <path d="m12 5 7 7-7 7" />
                                                        </svg>
                                                </a>
                                        </div>

                                        <!-- Bar Graph -->
                                        <div class="md:col-span-8 h-64 flex items-end justify-between gap-2 md:gap-6 px-4">
                                                <?php foreach ($data['stats'] as $index => $value): ?>
                                                        <div class="flex flex-col items-center gap-3 w-full group">
                                                                <div
                                                                        class="w-full bg-gray-200 rounded-t-2xl relative h-64 flex items-end overflow-hidden">
                                                                        <div class="w-full bg-gradient-to-t from-indigo-600 to-indigo-400 rounded-t-2xl transition-all duration-1000 ease-out flex items-start justify-center pt-4 text-white font-bold text-xs"
                                                                                style="height: <?php echo $value; ?>%">
                                                                                <span
                                                                                        class="opacity-0 group-hover:opacity-100 transition-opacity transform -translate-y-2 group-hover:translate-y-0"><?php echo $value; ?>%</span>
                                                                        </div>
                                                                </div>
                                                                <div class="text-center">
                                                                        <div
                                                                                class="w-8 h-8 rounded-full bg-white shadow-md flex items-center justify-center text-indigo-600 mx-auto mb-2 border border-indigo-100">
                                                                                <?php echo $stat_icons[$index]; ?>
                                                                        </div>
                                                                        <span
                                                                                class="text-xs font-bold text-gray-500 uppercase tracking-tight md:tracking-normal hidden md:block"><?php echo $stat_labels[$index]; ?></span>
                                                                </div>
                                                        </div>
                                                <?php endforeach; ?>
                                        </div>
                                </div>
                        <?php endforeach; ?>
                </div>
        </div>
</section>

<!-- Programs Preview Grid -->
<section id="programs" class="py-24 bg-white">
        <div class="container mx-auto px-4 md:px-6">
                <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                        <div class="text-left">
                                <span class="text-indigo-600 font-bold uppercase tracking-wider text-sm">Our
                                        Programs</span>
                                <h2 class="text-4xl md:text-5xl font-bold text-indigo-900 mt-2">Designed for Every Stage
                                </h2>
                        </div>
                        <a href="<?php echo esc_url(home_url('/programs')); ?>"
                                class="hidden md:flex items-center gap-2 text-indigo-600 font-bold hover:text-indigo-800 bg-indigo-50 px-6 py-3 rounded-full transition focus:outline-none focus:ring-2 focus:ring-indigo-600">
                                View All Programs <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="m12 5 7 7-7 7" />
                                </svg>
                        </a>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <?php
                        $programs_query = new WP_Query(array(
                                'post_type' => 'program',
                                'posts_per_page' => 3,
                                'orderby' => 'menu_order',
                                'order' => 'ASC'
                        ));

                        if ($programs_query->have_posts()):
                                while ($programs_query->have_posts()):
                                        $programs_query->the_post();
                                        $age_range = get_field('age_range') ?: 'All Ages'; // Fallback if ACF missing
                                        $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                        if (!$thumb_url)
                                                $thumb_url = 'https://images.unsplash.com/photo-1544991199-3176cb4025d6?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                                        ?>
                                        <a href="<?php echo esc_url(home_url('/programs')); ?>"
                                                class="group relative overflow-hidden rounded-3xl h-80 cursor-pointer shadow-lg block focus-within:ring-4 focus-within:ring-yellow-400">
                                                <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>"
                                                        class="w-full h-full object-cover transition duration-700 group-hover:scale-110" />
                                                <div
                                                        class="absolute inset-0 bg-gradient-to-t from-indigo-900/90 via-indigo-900/40 to-transparent flex flex-col justify-end p-8">
                                                        <div
                                                                class="transform translate-y-4 group-hover:translate-y-0 transition duration-300">
                                                                <h3 class="text-white text-3xl font-bold mb-1"><?php the_title(); ?>
                                                                </h3>
                                                                <p class="text-indigo-200 mb-3 font-medium text-sm">
                                                                        <?php echo esc_html($age_range); ?></p>
                                                                <p
                                                                        class="text-white text-sm opacity-0 group-hover:opacity-100 transition-opacity mb-2 line-clamp-1">
                                                                        <?php echo wp_trim_words(get_the_excerpt(), 10); ?></p>
                                                                <span class="text-yellow-400 font-bold text-sm flex items-center gap-2">
                                                                        Learn More <div
                                                                                class="bg-yellow-400 text-indigo-900 rounded-full p-1">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="12"
                                                                                        height="12" viewBox="0 0 24 24" fill="none"
                                                                                        stroke="currentColor" stroke-width="2"
                                                                                        stroke-linecap="round" stroke-linejoin="round">
                                                                                        <path d="m9 18 6-6-6-6" />
                                                                                </svg></div>
                                                                </span>
                                                        </div>
                                                </div>
                                        </a>
                                        <?php
                                endwhile;
                                wp_reset_postdata();
                        else:
                                // Fallback content if no programs found
                                echo '<p>No programs found.</p>';
                        endif;
                        ?>
                </div>
                <div class="mt-8 text-center md:hidden">
                        <a href="<?php echo esc_url(home_url('/programs')); ?>"
                                class="font-bold py-3 px-8 rounded-full shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-yellow-400/50 bg-transparent border-2 border-indigo-600 text-indigo-600 hover:bg-indigo-50">View
                                All Programs</a>
                </div>
        </div>
</section>

<!-- Dark Locations Section -->
<section id="locations" class="py-24 bg-indigo-900 text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-indigo-600 rounded-full blur-[150px] opacity-20">
        </div>
        <div class="absolute bottom-0 left-0 w-[500px] h-[500px] bg-purple-600 rounded-full blur-[150px] opacity-20">
        </div>
        <div class="container mx-auto px-4 md:px-6 relative z-10">
                <div class="mb-12 text-center">
                        <span class="font-bold uppercase tracking-wider text-sm block mb-2 text-yellow-400">Our
                                Locations</span>
                        <h2 class="text-3xl md:text-5xl font-bold text-white">Serving Communities Where You Live & Work
                        </h2>
                </div>

                <div class="grid lg:grid-cols-3 gap-6">
                        <?php
                        $locations_query = new WP_Query(array(
                                'post_type' => 'location',
                                'posts_per_page' => 3,
                                'orderby' => 'menu_order',
                                'order' => 'ASC'
                        ));

                        if ($locations_query->have_posts()):
                                while ($locations_query->have_posts()):
                                        $locations_query->the_post();
                                        $city = get_field('city') ?: 'Atlanta';
                                        $address = get_field('address') ?: '';
                                        ?>
                                        <div
                                                class="bg-white/10 backdrop-blur-md border border-white/10 rounded-2xl p-8 hover:bg-white/15 transition cursor-pointer group hover:-translate-y-1">
                                                <div class="flex justify-between items-start mb-4">
                                                        <span
                                                                class="text-yellow-400 font-bold uppercase tracking-wide text-xs bg-indigo-950/50 px-2 py-1 rounded"><?php echo esc_html($city); ?></span>
                                                        <div class="bg-white/20 p-2 rounded-full"><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                                        class="text-white">
                                                                        <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                                                        <circle cx="12" cy="10" r="3" />
                                                                </svg></div>
                                                </div>
                                                <h3 class="text-2xl font-bold mb-2 group-hover:text-yellow-400 transition">
                                                        <?php the_title(); ?></h3>
                                                <p class="text-indigo-100 text-sm mb-6 line-clamp-2">
                                                        <?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                                <div class="flex items-center gap-4 pt-6 border-t border-white/10">
                                                        <a href="<?php echo esc_url(home_url('/contact')); ?>"
                                                                class="bg-yellow-400 hover:bg-yellow-500 text-indigo-900 text-sm font-bold px-4 py-2 rounded-full flex items-center gap-1 transition focus:outline-none focus:ring-2 focus:ring-white">
                                                                Schedule Tour
                                                        </a>
                                                        <a href="<?php echo esc_url(home_url('/locations')); ?>"
                                                                class="text-indigo-200 text-sm hover:text-white transition font-medium focus:outline-none focus:underline">
                                                                View Details
                                                        </a>
                                                </div>
                                        </div>
                                        <?php
                                endwhile;
                                wp_reset_postdata();
                        endif;
                        ?>
                </div>
                <div class="mt-12 text-center">
                        <a href="<?php echo esc_url(home_url('/locations')); ?>"
                                class="font-bold py-3 px-8 rounded-full shadow-md transition transform hover:-translate-y-0.5 flex items-center justify-center gap-2 focus:outline-none focus:ring-4 focus:ring-yellow-400/50 bg-transparent border-2 border-white text-white hover:bg-white/10">View
                                All Locations</a>
                </div>
        </div>
</section>

<!-- Parent Resource Hub (Blog) -->
<section class="py-24 bg-gray-50">
        <div class="container mx-auto px-4 md:px-6">
                <div class="mb-12 text-center">
                        <span class="font-bold uppercase tracking-wider text-sm block mb-2 text-indigo-600">Parenting
                                Tips</span>
                        <h2 class="text-3xl md:text-5xl font-bold text-indigo-900">Resources for Your Journey</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                        <?php
                        $blog_query = new WP_Query(array(
                                'post_type' => 'post',
                                'posts_per_page' => 3
                        ));

                        if ($blog_query->have_posts()):
                                while ($blog_query->have_posts()):
                                        $blog_query->the_post();
                                        $category = get_the_category();
                                        $cat_name = !empty($category) ? $category[0]->name : 'News';
                                        $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                                        if (!$thumb_url)
                                                $thumb_url = 'https://images.unsplash.com/photo-1555252333-9f8e92e65df9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                                        ?>
                                        <a href="<?php the_permalink(); ?>"
                                                class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition group cursor-pointer border border-gray-100 flex flex-col h-full">
                                                <div class="relative h-56 overflow-hidden shrink-0">
                                                        <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>"
                                                                class="w-full h-full object-cover group-hover:scale-105 transition duration-700" />
                                                        <span
                                                                class="absolute top-4 left-4 bg-white/95 backdrop-blur text-indigo-900 text-xs font-bold px-3 py-1 rounded-full shadow-sm"><?php echo esc_html($cat_name); ?></span>
                                                </div>
                                                <div class="p-8 flex flex-col flex-grow">
                                                        <h3
                                                                class="text-xl font-bold text-gray-900 mb-3 group-hover:text-indigo-700 transition">
                                                                <?php the_title(); ?></h3>
                                                        <p class="text-gray-600 text-sm mb-6 leading-relaxed flex-grow">
                                                                <?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                                        <span
                                                                class="text-indigo-600 text-sm font-bold flex items-center gap-1 group-hover:gap-2 transition-all">Read
                                                                Article <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path d="M5 12h14" />
                                                                        <path d="m12 5 7 7-7 7" />
                                                                </svg></span>
                                                </div>
                                        </a>
                                        <?php
                                endwhile;
                                wp_reset_postdata();
                        endif;
                        ?>
                </div>
        </div>
</section>

<!-- Testimonials -->
<section class="py-24 bg-gradient-to-br from-indigo-700 to-indigo-900 text-white overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-full opacity-10"
                style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;">
        </div>
        <div class="container mx-auto px-4 md:px-6 text-center relative z-10">
                <div class="mb-12 text-center">
                        <span
                                class="font-bold uppercase tracking-wider text-sm block mb-2 text-yellow-400">Testimonials</span>
                        <h2 class="text-3xl md:text-5xl font-bold text-white">Trusted by Parents Like You</h2>
                </div>
                <div class="grid md:grid-cols-3 gap-8">
                        <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl relative border border-white/10">
                                <div class="text-yellow-400 flex justify-center mb-6">
                                        <?php for ($i = 0; $i < 5; $i++): ?><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="18" height="18" viewBox="0 0 24 24" fill="currentColor"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polygon
                                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                                </svg><?php endfor; ?>
                                </div>
                                <p class="text-indigo-100 italic mb-8 leading-relaxed">"Moving to the Summit Building
                                        location was the best decision. The teachers actually care, and my son loves the
                                        food! He comes home singing songs every day."</p>
                                <div class="font-bold">Sarah J. <span
                                                class="block text-indigo-300 text-xs font-normal">Midtown Atlanta
                                                Parent</span></div>
                        </div>
                        <div
                                class="bg-white text-indigo-900 p-8 rounded-2xl relative transform md:-translate-y-6 shadow-2xl">
                                <div
                                        class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-yellow-400 text-indigo-900 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                                        Top Rated</div>
                                <div class="text-indigo-600 flex justify-center mb-6">
                                        <?php for ($i = 0; $i < 5; $i++): ?><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="18" height="18" viewBox="0 0 24 24" fill="currentColor"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polygon
                                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                                </svg><?php endfor; ?>
                                </div>
                                <p class="italic mb-8 leading-relaxed font-medium">"I love that they aren't a franchise.
                                        You can feel the difference. The Director knows every single kid by name. It
                                        really feels like an extended family."</p>
                                <div class="font-bold">Michael T. <span
                                                class="block text-gray-500 text-xs font-normal">College Park
                                                Parent</span></div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm p-8 rounded-2xl relative border border-white/10">
                                <div class="text-yellow-400 flex justify-center mb-6">
                                        <?php for ($i = 0; $i < 5; $i++): ?><svg xmlns="http://www.w3.org/2000/svg"
                                                        width="18" height="18" viewBox="0 0 24 24" fill="currentColor"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <polygon
                                                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                                                </svg><?php endfor; ?>
                                </div>
                                <p class="text-indigo-100 italic mb-8 leading-relaxed">"The STEM program is real. My
                                        4-year-old came home explaining how plants grow. Amazing preparation for
                                        Kindergarten. Highly recommend!"</p>
                                <div class="font-bold">Elena R. <span
                                                class="block text-indigo-300 text-xs font-normal">Doral, FL
                                                Parent</span></div>
                        </div>
                </div>
        </div>
</section>

<?php get_footer(); ?>