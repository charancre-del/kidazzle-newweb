<?php
/**
 * Template Name: Resources Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<!-- 5. RESOURCES VIEW -->
<div id="view-resources" class="view-section active block">
    <div class="bg-purple-600 py-20 text-white text-center">
        <h1 class="text-5xl font-extrabold mb-4">Family Resources</h1>
        <p class="text-xl text-purple-200">Tools to support your child's journey.</p>
    </div>

    <div class="container mx-auto px-4 py-16">
        <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
            <a href="#"
                class="group p-8 bg-white rounded-3xl shadow-md hover:shadow-xl transition border border-slate-100 flex flex-col items-center text-center">
                <div
                    class="w-20 h-20 bg-purple-100 text-purple-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition">
                    <i data-lucide="file-text" class="w-8 h-8"></i>
                </div>
                <h3 class="font-bold text-xl text-slate-900 mb-2">Enrollment Forms</h3>
                <p class="text-slate-500 mb-6">Download the necessary paperwork to get started.</p>
                <span class="text-purple-600 font-bold group-hover:underline">Download PDF</span>
            </a>

            <a href="#"
                class="group p-8 bg-white rounded-3xl shadow-md hover:shadow-xl transition border border-slate-100 flex flex-col items-center text-center">
                <div
                    class="w-20 h-20 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition">
                    <i data-lucide="calendar" class="w-8 h-8"></i>
                </div>
                <h3 class="font-bold text-xl text-slate-900 mb-2">Academic Calendar</h3>
                <p class="text-slate-500 mb-6">Important dates, closures, and special events.</p>
                <span class="text-blue-600 font-bold group-hover:underline">View Calendar</span>
            </a>

            <a href="#"
                class="group p-8 bg-white rounded-3xl shadow-md hover:shadow-xl transition border border-slate-100 flex flex-col items-center text-center">
                <div
                    class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mb-6 group-hover:scale-110 transition">
                    <i data-lucide="credit-card" class="w-8 h-8"></i>
                </div>
                <h3 class="font-bold text-xl text-slate-900 mb-2">Pay Tuition</h3>
                <p class="text-slate-500 mb-6">Secure online portal for tuition payments.</p>
                <span class="text-green-600 font-bold group-hover:underline">Login to Pay</span>
            </a>
        </div>
    </div>
</div>

<?php
get_footer();
