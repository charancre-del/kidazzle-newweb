<?php
/**
 * The front page template.
 * matches #view-home from source
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<!-- 1. HOME VIEW -->
<div id="view-home" class="view-section active block">
    <header class="relative w-full h-[600px] flex items-center overflow-hidden">
        <div class="absolute inset-0 z-0">
             <!-- Placeholder Image or Theme Mod -->
            <img src="https://images.unsplash.com/photo-1560785496-0c9018085c8f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" alt="Group of diverse children laughing" class="w-full h-full object-cover object-center" />
            <div class="absolute inset-0 bg-slate-900/40"></div>
        </div>
        <div class="container mx-auto px-4 md:px-6 relative z-10 mt-10">
            <div class="max-w-2xl bg-white/90 backdrop-blur-sm p-8 md:p-12 rounded-3xl shadow-2xl border-l-8 border-yellow-400">
                <div class="flex items-center gap-2 mb-6">
                    <span class="bg-yellow-400 text-slate-900 px-4 py-1 rounded-full text-sm font-bold uppercase tracking-wider shadow-sm">Now Enrolling</span>
                    <span class="text-slate-600 text-sm font-semibold flex items-center gap-1"><i data-lucide="star" class="w-3 h-3 fill-yellow-400 text-yellow-400"></i> 31 Years of Excellence</span>
                </div>
                <h1 class="text-4xl md:text-6xl font-extrabold leading-tight mb-4 text-slate-900">Where Learning <br /><span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 via-yellow-500 to-cyan-500">is Fun!</span></h1>
                <p class="text-lg text-slate-600 mb-8 leading-relaxed font-medium">More than a daycare. We are an independent, premier learning academy nurturing diverse bright minds.</p>
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="<?php echo home_url('/locations'); ?>" class="bg-yellow-400 hover:bg-yellow-500 text-slate-900 font-bold py-4 px-10 rounded-full shadow-lg transition flex items-center justify-center gap-2 transform hover:-translate-y-1">
                        Find Your Center <i data-lucide="chevron-right" class="w-5 h-5"></i>
                    </a>
                    <a href="<?php echo home_url('/curriculum'); ?>" class="bg-white text-slate-700 border-2 border-slate-200 hover:border-cyan-400 hover:text-cyan-600 font-bold py-4 px-10 rounded-full transition flex items-center justify-center">
                        Explore Curriculum
                    </a>
                </div>
            </div>
        </div>
    </header>

    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6">Why Families Choose KIDazzle</h2>
                <p class="text-slate-500 text-xl">We combine the resources of a large center with the personal touch of a family-owned school.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="p-8 rounded-3xl border-2 border-orange-100 hover:border-orange-400 transition cursor-pointer bg-white shadow-sm hover:shadow-xl group">
                    <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-500 flex items-center justify-center mb-4 group-hover:scale-110 transition"><i data-lucide="utensils"></i></div>
                    <h3 class="font-bold text-lg text-slate-900">Healthy Meals</h3>
                    <p class="text-slate-500 text-sm">Chef-prepared onsite daily.</p>
                </div>
                <div class="p-8 rounded-3xl border-2 border-red-100 hover:border-red-400 transition cursor-pointer bg-white shadow-sm hover:shadow-xl group">
                    <div class="w-12 h-12 rounded-xl bg-red-50 text-red-500 flex items-center justify-center mb-4 group-hover:scale-110 transition"><i data-lucide="heart"></i></div>
                    <h3 class="font-bold text-lg text-slate-900">Family Owned</h3>
                    <p class="text-slate-500 text-sm">Independent and trusted.</p>
                </div>
                <a href="<?php echo home_url('/curriculum'); ?>" class="block p-8 rounded-3xl border-2 border-cyan-100 hover:border-cyan-400 transition cursor-pointer bg-white shadow-sm hover:shadow-xl group">
                    <div class="w-12 h-12 rounded-xl bg-cyan-50 text-cyan-500 flex items-center justify-center mb-4 group-hover:scale-110 transition"><i data-lucide="brain"></i></div>
                    <h3 class="font-bold text-lg text-slate-900">Creative Curriculum</h3>
                    <p class="text-slate-500 text-sm">Play-based education.</p>
                </a>
                <div class="p-8 rounded-3xl border-2 border-green-100 hover:border-green-400 transition cursor-pointer bg-white shadow-sm hover:shadow-xl group">
                    <div class="w-12 h-12 rounded-xl bg-green-50 text-green-500 flex items-center justify-center mb-4 group-hover:scale-110 transition"><i data-lucide="shield-check"></i></div>
                    <h3 class="font-bold text-lg text-slate-900">Safety First</h3>
                    <p class="text-slate-500 text-sm">Secure and monitored.</p>
                </div>
            </div>
        </div>
    </section>
</div>

<?php
get_footer();
