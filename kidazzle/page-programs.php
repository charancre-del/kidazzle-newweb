<?php
/**
 * Template Name: Programs Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<!-- 2. PROGRAMS VIEW -->
<div id="view-programs" class="view-section active block">
    <div class="bg-slate-900 py-20 text-white text-center">
        <h1 class="text-5xl font-extrabold mb-4">Our Programs</h1>
        <p class="text-xl text-slate-300">Comprehensive care for every stage.</p>
    </div>
    <div class="container mx-auto px-4 py-16 space-y-12">
        <!-- Infants -->
        <article id="infants"
            class="flex flex-col md:flex-row gap-8 items-center p-8 rounded-3xl bg-white border-l-8 shadow-sm border-red-500 scroll-mt-24">
            <div
                class="md:w-1/3 h-48 bg-slate-100 rounded-2xl w-full flex items-center justify-center text-slate-400 text-4xl">
                👶</div>
            <div class="md:w-2/3">
                <h2 class="text-3xl font-bold text-slate-900 mb-2">Infants</h2>
                <span class="inline-block bg-slate-100 px-3 py-1 rounded-full text-xs font-bold text-slate-600 mb-4">6
                    wks - 12 mos</span>
                <p class="text-lg text-slate-600 leading-relaxed">Our 'Smart Steps' program focuses on nurturing care,
                    tummy time, and sensory activities to build security and trust. Lesson plans include daily sensory
                    experiences (touch, sight, sound) and bonding milestones.</p>
            </div>
        </article>

        <!-- Toddlers -->
        <article id="toddlers"
            class="flex flex-col md:flex-row gap-8 items-center p-8 rounded-3xl bg-white border-l-8 shadow-sm border-orange-500 scroll-mt-24">
            <div
                class="md:w-1/3 h-48 bg-slate-100 rounded-2xl w-full flex items-center justify-center text-slate-400 text-4xl">
                🧸</div>
            <div class="md:w-2/3">
                <h2 class="text-3xl font-bold text-slate-900 mb-2">Toddlers</h2>
                <span class="inline-block bg-slate-100 px-3 py-1 rounded-full text-xs font-bold text-slate-600 mb-4">12
                    - 24 mos</span>
                <p class="text-lg text-slate-600 leading-relaxed">Toddlers are on the move! We provide safe environments
                    for exploration. Lesson plans emphasize gross motor skills (walking, climbing), early language
                    building (storytime, songs), and social interaction (parallel play).</p>
            </div>
        </article>

        <!-- Preschool -->
        <article id="preschool"
            class="flex flex-col md:flex-row gap-8 items-center p-8 rounded-3xl bg-white border-l-8 shadow-sm border-yellow-500 scroll-mt-24">
            <div
                class="md:w-1/3 h-48 bg-slate-100 rounded-2xl w-full flex items-center justify-center text-slate-400 text-4xl">
                🎨</div>
            <div class="md:w-2/3">
                <h2 class="text-3xl font-bold text-slate-900 mb-2">Preschool</h2>
                <span class="inline-block bg-slate-100 px-3 py-1 rounded-full text-xs font-bold text-slate-600 mb-4">2 -
                    3 yrs</span>
                <p class="text-lg text-slate-600 leading-relaxed">Structured play meets early academics. Children learn
                    shapes, colors, and early math concepts through hands-on fun. The curriculum introduces
                    'Project-Based Learning' where children explore themes like 'Trees' or 'Balls' in depth.</p>
            </div>
        </article>

        <!-- Pre-K -->
        <article id="prek"
            class="flex flex-col md:flex-row gap-8 items-center p-8 rounded-3xl bg-white border-l-8 shadow-sm border-green-500 scroll-mt-24">
            <div
                class="md:w-1/3 h-48 bg-slate-100 rounded-2xl w-full flex items-center justify-center text-slate-400 text-4xl">
                📚</div>
            <div class="md:w-2/3">
                <h2 class="text-3xl font-bold text-slate-900 mb-2">Pre-K</h2>
                <span class="inline-block bg-slate-100 px-3 py-1 rounded-full text-xs font-bold text-slate-600 mb-4">4 -
                    5 yrs</span>
                <p class="text-lg text-slate-600 leading-relaxed">Kindergarten readiness with a focus on literacy, math,
                    and social-emotional skills. We utilize state-approved standards (GELDS, TN-ELDS) to ensure children
                    are ready for the K-12 system.</p>
            </div>
        </article>

        <!-- After School -->
        <article id="schoolage"
            class="flex flex-col md:flex-row gap-8 items-center p-8 rounded-3xl bg-white border-l-8 shadow-sm border-cyan-500 scroll-mt-24">
            <div
                class="md:w-1/3 h-48 bg-slate-100 rounded-2xl w-full flex items-center justify-center text-slate-400 text-4xl">
                🚌</div>
            <div class="md:w-2/3">
                <h2 class="text-3xl font-bold text-slate-900 mb-2">After School</h2>
                <span class="inline-block bg-slate-100 px-3 py-1 rounded-full text-xs font-bold text-slate-600 mb-4">5 -
                    12 yrs</span>
                <p class="text-lg text-slate-600 leading-relaxed">A safe haven after the bell rings. Lesson plans
                    include homework assistance, STEM challenges, and relaxation time to unwind after a school day.</p>
            </div>
        </article>

        <!-- Summer Camp -->
        <article id="summer"
            class="flex flex-col md:flex-row gap-8 items-center p-8 rounded-3xl bg-white border-l-8 shadow-sm border-purple-500 scroll-mt-24">
            <div
                class="md:w-1/3 h-48 bg-slate-100 rounded-2xl w-full flex items-center justify-center text-slate-400 text-4xl">
                ☀️</div>
            <div class="md:w-2/3">
                <h2 class="text-3xl font-bold text-slate-900 mb-2">Summer Camp</h2>
                <span class="inline-block bg-slate-100 px-3 py-1 rounded-full text-xs font-bold text-slate-600 mb-4">5 -
                    12 yrs</span>
                <p class="text-lg text-slate-600 leading-relaxed">Weekly themes, field trips, and outdoor adventures.
                    From 'Space Week' to 'Dino Discovery', we keep learning alive all summer long with hands-on
                    projects.</p>
            </div>
        </article>
    </div>
</div>

<?php
get_footer();
