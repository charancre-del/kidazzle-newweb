<?php
/**
 * Template Name: College Park Location
 */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Park Child Care | KIDazzle</title>
    <meta name="description"
        content="Daycare near me in College Park, GA. Serving tri-cities families with STEAM education and transportation near Hartsfield-Jackson Airport.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script src="https://link.msgsndr.com/js/embed.js" type="text/javascript"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .bg-pattern {
            background-color: #ffffff;
            background-image: radial-gradient(#e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body class="font-sans text-slate-800 bg-white">
    <?php
    if (function_exists('wp_body_open')) {
        wp_body_open();
    }
    ?>
    <!-- TOP UTILITY BAR -->
    <div
        class="bg-slate-50 text-slate-600 text-xs py-2 px-4 hidden md:flex justify-between items-center border-b border-slate-200">
        <div class="flex gap-4 items-center">
            <a href="locations.html" class="flex items-center gap-1 hover:text-cyan-600 transition"><i
                    data-lucide="map-pin" class="w-3 h-3 text-red-500"></i> Serving GA, TN, & FL</a>
            <span class="flex items-center gap-1"><i data-lucide="phone" class="w-3 h-3 text-green-500"></i>
                877-410-1002</span>
            <a href="acquisitions.html" class="flex items-center gap-1 font-bold text-indigo-600 hover:underline"><i
                    data-lucide="briefcase" class="w-3 h-3"></i> Acquisitions</a>
        </div>
        <div class="flex gap-6 font-medium">
            <a href="careers.html" class="hover:text-cyan-600 flex items-center gap-1">Careers</a>
            <a href="teacher-portal.html"
                class="hover:text-cyan-600 flex items-center gap-1 font-bold text-orange-500"><i data-lucide="users"
                    class="w-3 h-3"></i> Teacher Portal</a>
        </div>
    </div>

    <!-- MAIN NAVIGATION -->
    <nav class="sticky top-0 w-full z-40 bg-white py-4 shadow-sm border-b">
        <div class="container mx-auto px-4 flex justify-between items-center">
            <a href="index.html" class="flex items-center gap-2">
                <img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/64ef561bad8c716760dfd435.png"
                    alt="KIDazzle Logo" class="h-12 w-auto">
            </a>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="lg:hidden text-slate-900"><i data-lucide="menu"
                    class="w-8 h-8"></i></button>

            <!-- Desktop Links -->
            <div class="hidden lg:flex items-center gap-6 font-bold text-slate-600 text-sm tracking-wide">
                <a href="<?php echo home_url('/'); ?>" class="hover:text-indigo-600 transition pb-1">HOME</a>
                <a href="about.html" class="hover:text-orange-500 transition pb-1">ABOUT US</a>
                <a href="programs.html" class="hover:text-red-500 transition pb-1">PROGRAMS</a>
                <a href="curriculum.html" class="hover:text-cyan-500 transition pb-1">CURRICULUM</a>
                <a href="locations.html" class="text-green-500 border-b-2 border-green-500 pb-1">LOCATIONS</a>
                <a href="resources.html" class="hover:text-purple-500 transition pb-1">RESOURCES</a>
                <a href="enrollment.html"
                    class="bg-slate-900 text-white px-5 py-2.5 rounded-xl hover:bg-slate-800 transition shadow-md ml-2">CONTACT
                    US</a>
            </div>
        </div>
        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu"
            class="hidden absolute top-full left-0 w-full bg-white shadow-lg border-t border-slate-100 flex flex-col p-4 gap-4 lg:hidden">
            <a href="index.html" class="text-indigo-600 font-bold">Home</a>
            <a href="locations.html" class="text-green-500 font-bold">Locations</a>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <div class="bg-slate-900 py-24 text-white relative overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- Hero Image: College Park Specific -->
            <img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/694489ba4d1916e65f671511.png"
                alt="College Park Center" class="w-full h-full object-cover opacity-20">
        </div>
        <div class="container mx-auto px-4 text-center relative z-10">
            <span
                class="bg-white/20 text-white px-4 py-1.5 rounded-full text-xs font-bold uppercase tracking-wide mb-6 inline-block backdrop-blur-sm border border-white/10">College
                Park, GA</span>
            <h1 class="text-5xl md:text-6xl font-extrabold mb-4">College Park Center</h1>
            <p class="text-xl max-w-2xl mx-auto text-slate-300">Where little learners take flight.</p>
        </div>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-12">

                <!-- About / SEO Content (Top) -->
                <section>
                    <h2 class="text-3xl font-bold text-slate-900 mb-6">About This Center</h2>
                    <p class="text-slate-600 leading-relaxed text-lg mb-8">
                        Welcome to <strong>KIDazzle College Park</strong>. Located just a hop from Hartsfield-Jackson
                        Airport, we serve families in the tri-cities area with a world of wonder inside. Our program
                        emphasizes STEAM education and provides convenient transportation options.
                    </p>

                    <div class="grid md:grid-cols-3 gap-4 mb-8">
                        <div
                            class="bg-slate-50 p-6 rounded-2xl border border-slate-200 text-center hover:bg-slate-100 transition group cursor-pointer">
                            <i data-lucide="plane" class="w-8 h-8 mx-auto mb-3 text-blue-500"></i>
                            <h4 class="font-bold text-slate-900">Near Airport</h4>
                            <p class="text-xs text-slate-500 mt-2">Convenient Location</p>
                        </div>
                        <div
                            class="bg-slate-50 p-6 rounded-2xl border border-slate-200 text-center hover:bg-slate-100 transition group cursor-pointer">
                            <i data-lucide="microscope" class="w-8 h-8 mx-auto mb-3 text-cyan-500"></i>
                            <h4 class="font-bold text-slate-900">STEAM Focus</h4>
                            <p class="text-xs text-slate-500 mt-2">Science & Tech</p>
                        </div>
                        <div
                            class="bg-slate-50 p-6 rounded-2xl border border-slate-200 text-center hover:bg-slate-100 transition group cursor-pointer">
                            <i data-lucide="bus" class="w-8 h-8 mx-auto mb-3 text-yellow-500"></i>
                            <h4 class="font-bold text-slate-900">Transportation</h4>
                            <p class="text-xs text-slate-500 mt-2">School Pick-Up</p>
                        </div>
                    </div>
                </section>

                <!-- Calendar (Middle) -->
                <div class="bg-white p-8 rounded-[2rem] shadow-xl border-t-8 border-cyan-400">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2"><i data-lucide="calendar"
                            class="text-cyan-500"></i> Book a Tour</h3>
                    <div
                        class="bg-slate-50 border-2 border-dashed border-slate-200 rounded-[2rem] min-h-[800px] flex items-center justify-center relative p-6">
                        <!-- Placeholder for College Park Calendar -->
                        <p class="text-slate-400 font-mono text-sm text-center">Paste College Park Calendar Embed Here
                        </p>
                    </div>
                </div>

                <!-- Map (Bottom) -->
                <section
                    class="bg-slate-100 rounded-[2rem] h-96 flex items-center justify-center text-slate-400 border-2 border-slate-200 overflow-hidden relative">
                    <p class="font-mono text-sm">Google Map Embed Placeholder (College Park)</p>
                </section>
            </div>

            <!-- Sidebar -->
            <div class="space-y-8">
                <div class="bg-slate-900 p-8 rounded-[2rem] text-white shadow-xl">
                    <h3 class="text-xl font-bold mb-6">Contact Info</h3>
                    <div class="space-y-6 text-base">
                        <div class="flex items-start gap-4"><i data-lucide="map-pin" class="text-red-400 mt-1"></i>
                            <span>1701 Columbia Ave<br>College Park, GA 30337</span></div>
                        <div class="flex items-center gap-4"><i data-lucide="phone" class="text-green-400"></i> <span
                                class="font-bold">(404) 305-6950</span></div>
                        <div class="flex items-center gap-4"><i data-lucide="mail" class="text-cyan-400"></i>
                            <span>collegepark@kidazzle.com</span></div>
                    </div>
                </div>
                <!-- 123 Form for this location -->
                <div class="bg-white p-8 rounded-[2rem] shadow-sm border border-slate-200">
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Have Questions?</h3>
                    <div
                        class="bg-slate-50 border-dashed border-2 border-slate-300 rounded-xl p-8 text-center text-xs text-slate-400">
                        Embed Location Form Here</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-slate-900 text-slate-300 py-16 mt-12 text-center md:text-left">
        <div class="container mx-auto px-4 grid md:grid-cols-4 gap-8">
            <div>
                <img src="https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/64ef561bad8c716760dfd435.png"
                    class="h-10 mb-4 mx-auto md:mx-0 bg-white p-1 rounded">
                <p class="text-sm">Providing elite child care.</p>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Quick Links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="programs.html" class="hover:text-white">Programs</a></li>
                    <li><a href="locations.html" class="hover:text-white">Locations</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-white font-bold mb-4">Contact</h4>
                <p class="text-sm">100 Alabama St SW, Atlanta, GA<br>877-410-1002</p>
            </div>
        </div>
    </footer>
    <script>
        lucide.createIcons();
        document.getElementById('mobile-menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
    <?php wp_footer(); ?>
</body>

</html>