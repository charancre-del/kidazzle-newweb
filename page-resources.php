<?php
/**
 * Template Name: Resources Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<main id="view-resources" class="view-section active block">
    <!-- AI Feature Section (Full Width Premium) -->
    <section class="py-24 bg-white border-b border-brand-ink/5 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="relative bg-brand-ink rounded-[4rem] p-12 md:p-24 text-white overflow-hidden shadow-2xl flex flex-col lg:flex-row items-center gap-16">
                <!-- Decor -->
                <div class="absolute -right-40 -top-40 w-[600px] h-[600px] bg-kidazzle-blue/10 rounded-full blur-[120px]"></div>
                <div class="absolute -left-20 bottom-0 w-96 h-96 bg-kidazzle-purple/10 rounded-full blur-[100px]"></div>

                <div class="lg:w-3/5 relative z-10">
                    <span class="text-kidazzle-purple font-bold tracking-[0.3em] text-[10px] uppercase mb-4 block italic">Educational Technology</span>
                    <h2 class="text-4xl md:text-7xl font-serif font-bold mb-8 leading-[1.1]">AI Lesson <br><span class="italic text-kidazzle-purple">Plan Bot</span></h2>
                    <p class="text-white/70 text-lg md:text-xl leading-relaxed mb-12 max-w-2xl">
                        Our proprietary AI solution empowers KIDazzle educators to transform the Creative Curriculum® into personalized, adaptive daily activities in seconds. Efficiency in administration means more time for individual student connection.
                    </p>
                    <div class="flex flex-wrap gap-6">
                        <a href="<?php echo esc_url(home_url('/teacher-portal')); ?>" class="px-12 py-6 bg-kidazzle-purple text-white font-bold rounded-full uppercase tracking-[0.2em] text-xs hover:bg-white hover:text-brand-ink transition-all shadow-xl hover:-translate-y-1">
                            Access Teacher Portal
                        </a>
                    </div>
                </div>
                <div class="lg:w-2/5 relative z-10 flex justify-center">
                    <div class="relative group">
                         <div class="absolute inset-0 bg-kidazzle-purple/20 rounded-full blur-3xl animate-pulse group-hover:scale-110 transition-transform"></div>
                         <div class="w-64 h-64 bg-white/5 backdrop-blur-md rounded-[3rem] border border-white/10 flex items-center justify-center relative shadow-inner">
                            <i class="fa-solid fa-microchip text-[100px] text-kidazzle-purple/40"></i>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Family Toolbox (Premium Cards) -->
    <section class="py-32 bg-brand-cream">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="text-center mb-20">
                <span class="text-kidazzle-blue font-bold tracking-[0.3em] text-[10px] uppercase mb-4 block italic">The Family Toolbox</span>
                <h2 class="text-4xl md:text-6xl font-serif font-bold text-brand-ink">Essential Resources</h2>
                <div class="w-20 h-1.5 bg-kidazzle-blue mx-auto mt-6 rounded-full"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-12">
                <!-- Portal -->
                <div class="group relative bg-white p-12 rounded-[4rem] shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 text-center">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-kidazzle-purple/10 overflow-hidden rounded-t-[4rem]">
                        <div class="h-full bg-kidazzle-purple w-0 group-hover:w-full transition-all duration-700"></div>
                    </div>
                    <div class="w-24 h-24 bg-white shadow-lg text-kidazzle-purple rounded-[2.5rem] flex items-center justify-center text-4xl mb-10 mx-auto group-hover:bg-kidazzle-purple group-hover:text-white transition-all">
                        <i class="fa-solid fa-file-invoice"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-bold text-brand-ink mb-4">Enrollment Portal</h3>
                    <p class="text-brand-ink/60 mb-10 leading-relaxed text-sm">Submit enrollment details, health records, and required state forms securely online.</p>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-flex items-center gap-2 font-bold text-[11px] uppercase tracking-widest text-kidazzle-purple border-b-2 border-kidazzle-purple/20 pb-1 hover:border-kidazzle-purple transition-all">Go to Admissions <i class="fa-solid fa-chevron-right text-[8px]"></i></a>
                </div>

                <!-- Calendar -->
                <div class="group relative bg-white p-12 rounded-[4rem] shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 text-center">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-kidazzle-blue/10 overflow-hidden rounded-t-[4rem]">
                        <div class="h-full bg-kidazzle-blue w-0 group-hover:w-full transition-all duration-700"></div>
                    </div>
                    <div class="w-24 h-24 bg-white shadow-lg text-kidazzle-blue rounded-[2.5rem] flex items-center justify-center text-4xl mb-10 mx-auto group-hover:bg-kidazzle-blue group-hover:text-white transition-all">
                        <i class="fa-solid fa-calendar-day"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-bold text-brand-ink mb-4">Family Calendar</h3>
                    <p class="text-brand-ink/60 mb-10 leading-relaxed text-sm">Stay synchronized with themes, school closures, holiday events, and campus celebrations.</p>
                    <a href="#" class="inline-flex items-center gap-2 font-bold text-[11px] uppercase tracking-widest text-kidazzle-blue border-b-2 border-kidazzle-blue/20 pb-1 hover:border-kidazzle-blue transition-all">View 2025 Calendar <i class="fa-solid fa-chevron-right text-[8px]"></i></a>
                </div>

                <!-- Absence -->
                <div class="group relative bg-white p-12 rounded-[4rem] shadow-soft border border-brand-ink/5 hover:shadow-2xl transition-all duration-500 hover:-translate-y-2 text-center">
                    <div class="absolute top-0 left-0 w-full h-1.5 bg-kidazzle-red/10 overflow-hidden rounded-t-[4rem]">
                        <div class="h-full bg-kidazzle-red w-0 group-hover:w-full transition-all duration-700"></div>
                    </div>
                    <div class="w-24 h-24 bg-white shadow-lg text-kidazzle-red rounded-[2.5rem] flex items-center justify-center text-4xl mb-10 mx-auto group-hover:bg-kidazzle-red group-hover:text-white transition-all">
                        <i class="fa-solid fa-bell"></i>
                    </div>
                    <h3 class="text-2xl font-serif font-bold text-brand-ink mb-4">Report Absence</h3>
                    <p class="text-brand-ink/60 mb-10 leading-relaxed text-sm">Notify center leadership of student absences efficiently for attendance and meal planning.</p>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="inline-flex items-center gap-2 font-bold text-[11px] uppercase tracking-widest text-kidazzle-red border-b-2 border-kidazzle-red/20 pb-1 hover:border-kidazzle-red transition-all">Notify Center <i class="fa-solid fa-chevron-right text-[8px]"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Stories (Refractive Grid) -->
    <section class="py-32 bg-white border-t border-brand-ink/5">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-20 gap-8">
                <div>
                    <span class="text-kidazzle-orange font-bold tracking-[0.3em] text-[10px] uppercase mb-4 block italic">From the Classrooms</span>
                    <h2 class="text-4xl md:text-7xl font-serif font-bold text-brand-ink leading-[1.1]">KIDazzle Stories</h2>
                </div>
                <a href="<?php echo esc_url(home_url('/stories')); ?>" class="px-10 py-5 bg-white border border-brand-ink/10 text-brand-ink font-bold rounded-full uppercase tracking-widest text-[11px] hover:border-kidazzle-orange hover:text-kidazzle-orange transition-all shadow-sm">
                    View All Stories <i class="fa-solid fa-arrow-right ml-2 text-[8px]"></i>
                </a>
            </div>

            <div class="grid md:grid-cols-3 gap-12">
                <div class="group cursor-pointer">
                    <div class="relative aspect-[4/5] rounded-[4rem] overflow-hidden mb-8 shadow-card border-8 border-white group-hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <img src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Literacy">
                        <div class="absolute inset-x-4 bottom-4 bg-white/90 backdrop-blur-md rounded-[3rem] p-8">
                             <span class="text-kidazzle-purple font-bold uppercase tracking-widest text-[10px] mb-2 block">Pedagogy</span>
                             <h4 class="font-bold text-brand-ink text-xl">Early Literacy Tips</h4>
                        </div>
                    </div>
                </div>
                
                <div class="group cursor-pointer">
                    <div class="relative aspect-[4/5] rounded-[4rem] overflow-hidden mb-8 shadow-card border-8 border-white group-hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <img src="https://images.unsplash.com/photo-1564834724105-918b73d1b9e0?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Nutrition">
                        <div class="absolute inset-x-4 bottom-4 bg-white/90 backdrop-blur-md rounded-[3rem] p-8">
                             <span class="text-kidazzle-orange font-bold uppercase tracking-widest text-[10px] mb-2 block">Wellness</span>
                             <h4 class="font-bold text-brand-ink text-xl">Healthy Food Habits</h4>
                        </div>
                    </div>
                </div>

                <div class="group cursor-pointer">
                    <div class="relative aspect-[4/5] rounded-[4rem] overflow-hidden mb-8 shadow-card border-8 border-white group-hover:shadow-2xl transition-all duration-500 hover:-translate-y-2">
                        <img src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?q=80&w=800&auto=format&fit=crop" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Play">
                        <div class="absolute inset-x-4 bottom-4 bg-white/90 backdrop-blur-md rounded-[3rem] p-8">
                             <span class="text-kidazzle-green font-bold uppercase tracking-widest text-[10px] mb-2 block">Development</span>
                             <h4 class="font-bold text-brand-ink text-xl">The Power of Play</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Final Support Banner -->
    <section class="py-32 bg-brand-cream border-t border-brand-ink/5">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <div class="inline-flex items-center gap-2 bg-white border border-brand-ink/10 px-5 py-2 rounded-full text-[10px] uppercase tracking-widest font-bold text-brand-ink/40 mb-8 italic">
                Need Support?
            </div>
            <h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink mb-8 leading-tight">Can't find what <br>you're looking for?</h2>
            <p class="text-xl text-brand-ink/60 mb-12 max-w-2xl mx-auto">Please reach out directly to your center director or our regional support office for personalized assistance.</p>
            <div class="flex flex-wrap justify-center gap-6">
                <a href="<?php echo esc_url(home_url('/contact')); ?>" class="px-12 py-6 bg-brand-ink text-white font-bold rounded-full uppercase tracking-widest text-xs hover:bg-kidazzle-blue transition-all shadow-xl hover:-translate-y-1">Contact Support Office</a>
                <a href="<?php echo esc_url(home_url('/locations')); ?>" class="px-12 py-6 bg-white border border-brand-ink/10 text-brand-ink font-bold rounded-full uppercase tracking-widest text-xs hover:border-kidazzle-blue hover:text-kidazzle-blue transition-all shadow-sm">Contact My Center</a>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
