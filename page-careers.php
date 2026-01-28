<?php
/**
 * Template Name: Careers Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<!-- 6. CAREERS VIEW -->
<main id="view-careers" class="view-section active block">
    <!-- Hero Section (Premium) -->
    <section class="py-32 md:py-48 bg-white text-center relative overflow-hidden">
        <!-- Decor Blobs -->
        <div class="absolute -right-20 -top-20 w-[600px] h-[600px] bg-kidazzle-red/5 rounded-full blur-[120px]"></div>
        <div class="absolute -left-20 -bottom-20 w-[600px] h-[600px] bg-kidazzle-blue/5 rounded-full blur-[120px]"></div>

        <div class="max-w-5xl mx-auto px-4 relative z-10">
            <span class="text-kidazzle-red font-bold tracking-[0.3em] text-[10px] uppercase mb-6 block italic">
                The KIDazzle Community
            </span>
            <h1 class="font-serif text-5xl md:text-8xl text-brand-ink mb-8 leading-[1.1]">
                Shape the future. <br><span class="italic text-kidazzle-red">Love your mission.</span>
            </h1>
            <p class="text-xl text-brand-ink/60 max-w-2xl mx-auto mb-12 leading-relaxed">
                We don't just hire staff; we invest in career educators. At KIDazzle, you'll find a supportive village, clear pathways to leadership, and the resources to transform lives.
            </p>
            <a href="#openings" class="px-12 py-6 bg-brand-ink text-white font-bold rounded-full uppercase tracking-[0.2em] text-xs hover:bg-kidazzle-red transition-all shadow-[0_20px_40px_-10px_rgba(0,0,0,0.3)] hover:-translate-y-1">
                Explore Career Paths
            </a>
        </div>
    </section>

    <!-- Culture & Benefits (Premium Cards) -->
    <section id="culture" class="py-32 bg-brand-cream relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-5"></div>
        <div class="max-w-7xl mx-auto px-4 lg:px-6 relative z-10">
            <div class="text-center mb-20">
                <span class="text-kidazzle-green font-bold tracking-[0.3em] text-[10px] uppercase mb-4 block italic">The Educator Experience</span>
                <h2 class="text-4xl md:text-6xl font-serif font-bold text-brand-ink">
                    Why KIDazzle?
                </h2>
                <div class="w-16 h-1.5 bg-kidazzle-green mx-auto mt-6 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-3 gap-10">
                <!-- Benefit 1 -->
                <div class="group relative bg-white p-12 rounded-[4rem] shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 text-center">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-kidazzle-green/10 overflow-hidden rounded-t-[4rem]">
                        <div class="h-full bg-kidazzle-green w-0 group-hover:w-full transition-all duration-700"></div>
                    </div>
                    <div class="w-24 h-24 mx-auto bg-white shadow-lg rounded-[2.5rem] flex items-center justify-center text-3xl text-kidazzle-green mb-8 group-hover:bg-kidazzle-green group-hover:text-white transition-all">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <h3 class="font-serif font-bold text-2xl text-brand-ink mb-3">Supportive Village</h3>
                    <p class="text-sm text-brand-ink/60 leading-relaxed">We treat our educators like family. From anniversary bonuses to collaborative coaching and tenure awards.</p>
                </div>
                <!-- Benefit 2 -->
                <div class="group relative bg-white p-12 rounded-[4rem] shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 text-center">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-kidazzle-blue/10 overflow-hidden rounded-t-[4rem]">
                        <div class="h-full bg-kidazzle-blue w-0 group-hover:w-full transition-all duration-700"></div>
                    </div>
                    <div class="w-24 h-24 mx-auto bg-white shadow-lg rounded-[2.5rem] flex items-center justify-center text-3xl text-kidazzle-blue mb-8 group-hover:bg-kidazzle-blue group-hover:text-white transition-all">
                        <i class="fa-solid fa-graduation-cap"></i>
                    </div>
                    <h3 class="font-serif font-bold text-2xl text-brand-ink mb-3">CDA Assistance</h3>
                    <p class="text-sm text-brand-ink/60 leading-relaxed">We invest in your credentials. Paid training, TCC support, and full CDA certification sponsorships.</p>
                </div>
                <!-- Benefit 3 -->
                <div class="group relative bg-white p-12 rounded-[4rem] shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 text-center">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-kidazzle-red/10 overflow-hidden rounded-t-[4rem]">
                        <div class="h-full bg-kidazzle-red w-0 group-hover:w-full transition-all duration-700"></div>
                    </div>
                    <div class="w-24 h-24 mx-auto bg-white shadow-lg rounded-[2.5rem] flex items-center justify-center text-3xl text-kidazzle-red mb-8 group-hover:bg-kidazzle-red group-hover:text-white transition-all">
                        <i class="fa-solid fa-stethoscope"></i>
                    </div>
                    <h3 class="font-serif font-bold text-2xl text-brand-ink mb-3">Health & Wellness</h3>
                    <p class="text-sm text-brand-ink/60 leading-relaxed">Comprehensive health, dental, and vision packages tailored for our hard-working community.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Openings (Refined Lists) -->
    <section id="openings" class="py-32 bg-white">
        <div class="max-w-5xl mx-auto px-4 lg:px-6">
            <div class="text-center mb-16">
                 <span class="text-brand-ink/40 font-bold tracking-[0.3em] text-[10px] uppercase mb-3 block italic">Current Opportunities</span>
                 <h2 class="text-4xl md:text-5xl font-serif font-bold text-brand-ink mb-4">Join the Spectrum</h2>
            </div>

            <div class="space-y-6 max-w-3xl mx-auto">
                <div class="group border border-brand-ink/5 rounded-[2.5rem] p-8 flex flex-col md:flex-row justify-between items-center bg-brand-cream/30 hover:bg-white hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="text-center md:text-left mb-6 md:mb-0">
                        <h4 class="font-bold text-2xl text-brand-ink mb-1 group-hover:text-kidazzle-red transition-colors">Lead Teacher (Preschool)</h4>
                        <p class="text-sm font-bold uppercase tracking-widest text-brand-ink/40">Riverdale, GA • Full-Time</p>
                    </div>
                    <a href="mailto:careers@kidazzlechildcare.com" class="px-10 py-4 bg-brand-ink text-white rounded-full text-[10px] font-bold uppercase tracking-widest hover:bg-kidazzle-red transition-all shadow-lg">Apply Now</a>
                </div>
                
                <div class="group border border-brand-ink/5 rounded-[2.5rem] p-8 flex flex-col md:flex-row justify-between items-center bg-brand-cream/30 hover:bg-white hover:shadow-xl transition-all hover:-translate-y-1">
                    <div class="text-center md:text-left mb-6 md:mb-0">
                        <h4 class="font-bold text-2xl text-brand-ink mb-1 group-hover:text-kidazzle-blue transition-colors">Assistant Director</h4>
                        <p class="text-sm font-bold uppercase tracking-widest text-brand-ink/40">Fairburn, GA • Full-Time</p>
                    </div>
                    <a href="mailto:careers@kidazzlechildcare.com" class="px-10 py-4 bg-brand-ink text-white rounded-full text-[10px] font-bold uppercase tracking-widest hover:bg-kidazzle-blue transition-all shadow-lg">Apply Now</a>
                </div>
            </div>
            
            <div class="mt-20 text-center p-12 bg-brand-ink rounded-[4rem] text-white relative overflow-hidden shadow-2xl">
                <div class="absolute -right-20 -top-20 w-64 h-64 bg-white/5 rounded-full blur-3xl"></div>
                <h3 class="text-3xl font-serif font-bold mb-4 relative z-10">Don't see your perfect role?</h3>
                <p class="text-white/60 mb-10 text-lg relative z-10">We're always looking for stars. Send us your resume and we'll keep you in mind for future needs!</p>
                <a href="mailto:careers@kidazzlechildcare.com" class="inline-block px-12 py-6 bg-white text-brand-ink font-bold rounded-full uppercase tracking-[0.2em] text-xs hover:bg-kidazzle-green hover:text-white transition-all shadow-xl relative z-10">
                    Email Our Recruiters
                </a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
