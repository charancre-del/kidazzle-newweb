<?php
/**
 * Template Name: Teacher Portal Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<main id="view-teacher-portal" class="view-section active block">
    <!-- Daily Tools Section -->
    <section class="py-16 bg-brand-cream">
        <div class="max-w-7xl mx-auto px-4 lg:px-6">
            <h2 class="text-2xl font-serif font-bold text-brand-ink mb-10 border-b border-brand-ink/10 pb-4">Daily Classroom Tools</h2>
            <div class="grid md:grid-cols-4 gap-6 mb-20">
                <!-- AI Lesson Planner -->
                <div class="bg-white p-8 rounded-[2.5rem] border border-brand-ink/5 hover:shadow-xl transition-all group text-center cursor-pointer">
                    <div class="w-16 h-16 bg-kidazzle-purple/10 text-kidazzle-purple rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-kidazzle-purple group-hover:text-white transition-all text-2xl">
                        <i class="fa-solid fa-robot"></i>
                    </div>
                    <h3 class="font-bold text-brand-ink mb-2">AI Lesson Planner</h3>
                    <p class="text-brand-ink/60 text-xs mb-6">Create custom, standards-aligned activities instantly.</p>
                    <a href="<?php echo esc_url(home_url('/resources')); ?>" class="text-kidazzle-purple font-bold text-[10px] uppercase tracking-widest flex items-center justify-center gap-2 hover:underline">Start Planning <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Daily Checklist -->
                <div class="bg-white p-8 rounded-[2.5rem] border border-brand-ink/5 hover:shadow-xl transition-all group text-center cursor-pointer">
                    <div class="w-16 h-16 bg-kidazzle-green/10 text-kidazzle-green rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-kidazzle-green group-hover:text-white transition-all text-2xl">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                    <h3 class="font-bold text-brand-ink mb-2">Daily Checklists</h3>
                    <p class="text-brand-ink/60 text-xs mb-6">Safety, hygiene, and classroom opening reports.</p>
                    <a href="#" class="text-kidazzle-green font-bold text-[10px] uppercase tracking-widest flex items-center justify-center gap-2 hover:underline">Open List <i class="fa-solid fa-arrow-right"></i></a>
                </div>

                <!-- Staff Email -->
                <div class="bg-white p-8 rounded-[2.5rem] border border-brand-ink/5 hover:shadow-xl transition-all group text-center cursor-pointer">
                    <div class="w-16 h-16 bg-kidazzle-blue/10 text-kidazzle-blue rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-kidazzle-blue group-hover:text-white transition-all text-2xl">
                        <i class="fa-solid fa-envelope-open-text"></i>
                    </div>
                    <h3 class="font-bold text-brand-ink mb-2">Staff Email</h3>
                    <p class="text-brand-ink/60 text-xs mb-6">Access your official @kidazzle.com inbox.</p>
                    <a href="https://webmail.kidazzle.com" target="_blank" class="text-kidazzle-blue font-bold text-[10px] uppercase tracking-widest flex items-center justify-center gap-2 hover:underline">Login <i class="fa-solid fa-external-link text-[8px]"></i></a>
                </div>

                <!-- Weekly Tasks -->
                <div class="bg-white p-8 rounded-[2.5rem] border border-brand-ink/5 hover:shadow-xl transition-all group text-center cursor-pointer">
                    <div class="w-16 h-16 bg-kidazzle-orange/10 text-kidazzle-orange rounded-2xl flex items-center justify-center mx-auto mb-6 group-hover:bg-kidazzle-orange group-hover:text-white transition-all text-2xl">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <h3 class="font-bold text-brand-ink mb-2">Weekly Workflow</h3>
                    <p class="text-brand-ink/60 text-xs mb-6">Submit supply requests and upcoming weekly plans.</p>
                    <a href="#" class="text-kidazzle-orange font-bold text-[10px] uppercase tracking-widest flex items-center justify-center gap-2 hover:underline">Submit Tasks <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>

            <!-- Forms & Reporting -->
            <h2 class="text-2xl font-serif font-bold text-brand-ink mb-10 border-b border-brand-ink/10 pb-4">Reporting & Compliance</h2>
            <div class="grid md:grid-cols-4 gap-6 mb-20">
                <div class="bg-white p-6 rounded-2xl border border-brand-ink/5 hover:border-kidazzle-red/30 transition-all flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 bg-kidazzle-red/10 text-kidazzle-red rounded-xl flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-user-slash"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-brand-ink text-sm">Absentee</h4>
                        <p class="text-[10px] text-brand-ink/40 uppercase font-bold tracking-widest">Report Now &rarr;</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-brand-ink/5 hover:border-kidazzle-blue/30 transition-all flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 bg-kidazzle-blue/10 text-kidazzle-blue rounded-xl flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-file-signature"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-brand-ink text-sm">Enrollment App</h4>
                        <p class="text-[10px] text-brand-ink/40 uppercase font-bold tracking-widest">Process &rarr;</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-brand-ink/5 hover:border-kidazzle-orange/30 transition-all flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 bg-kidazzle-orange/10 text-kidazzle-orange rounded-xl flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-bowl-food"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-brand-ink text-sm">Food Survey</h4>
                        <p class="text-[10px] text-brand-ink/40 uppercase font-bold tracking-widest">Feedback &rarr;</p>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl border border-brand-ink/5 hover:border-brand-ink/30 transition-all flex items-center gap-4 group cursor-pointer">
                    <div class="w-12 h-12 bg-brand-ink/5 text-brand-ink/40 rounded-xl flex items-center justify-center shrink-0">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                    </div>
                    <div>
                        <h4 class="font-bold text-brand-ink text-sm">Suspension</h4>
                        <p class="text-[10px] text-brand-ink/40 uppercase font-bold tracking-widest">File Report &rarr;</p>
                    </div>
                </div>
            </div>

            <!-- Handbooks Section -->
            <div class="grid md:grid-cols-2 gap-8 mb-20">
                <a href="#" class="flex items-center p-8 bg-brand-ink text-white rounded-[2.5rem] hover:bg-kidazzle-blueDark transition-all shadow-xl group">
                    <div class="w-16 h-16 bg-white/10 rounded-2xl flex items-center justify-center text-3xl mr-6 group-hover:scale-110 transition-transform"><i class="fa-solid fa-book-open-reader"></i></div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-xl mb-1">Employee Handbook</h3>
                        <p class="text-white/50 text-xs">Official policies, procedures, and vision.</p>
                    </div>
                    <i class="fa-solid fa-download text-white/20 group-hover:text-white transition-colors"></i>
                </a>
                <a href="#" class="flex items-center p-8 bg-white border border-brand-ink/10 rounded-[2.5rem] hover:border-kidazzle-blue transition-all shadow-soft group">
                    <div class="w-16 h-16 bg-kidazzle-blue/5 text-kidazzle-blue rounded-2xl flex items-center justify-center text-3xl mr-6 group-hover:scale-110 transition-transform"><i class="fa-solid fa-users"></i></div>
                    <div class="flex-grow">
                        <h3 class="font-bold text-xl mb-1 text-brand-ink">Parent Handbook</h3>
                        <p class="text-brand-ink/40 text-xs">Essential guide for KIDazzle families.</p>
                    </div>
                    <i class="fa-solid fa-download text-brand-ink/10 group-hover:text-kidazzle-blue transition-colors"></i>
                </a>
            </div>

            <!-- Health & Wellness Section -->
            <div class="bg-white rounded-[4rem] border border-brand-ink/5 p-12 md:p-20 shadow-soft">
                <div class="text-center mb-16">
                    <span class="text-kidazzle-red font-bold tracking-[0.2em] text-[10px] uppercase mb-3 block">Wellness First</span>
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-brand-ink">Health & Wellness Guide</h2>
                </div>

                <div class="grid md:grid-cols-2 gap-12">
                    <!-- Illness Guide -->
                    <div class="bg-brand-cream/50 rounded-[3rem] p-10 border border-brand-ink/5">
                        <h3 class="font-bold text-xl text-brand-ink mb-6 flex items-center gap-3">
                            <i class="fa-solid fa-virus-covid text-kidazzle-red"></i> Common Illnesses
                        </h3>
                        <div class="space-y-6">
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-brand-ink/5">
                                <h4 class="font-bold text-brand-ink text-sm mb-2">Hand, Foot, and Mouth (HFMD)</h4>
                                <p class="text-xs text-brand-ink/60 leading-relaxed">
                                    <strong>Watch for:</strong> Fever, sore throat, and small red spots/blisters on hands, feet, and inside the mouth.
                                </p>
                            </div>
                            <div class="bg-white p-6 rounded-2xl shadow-sm border border-brand-ink/5">
                                <h4 class="font-bold text-brand-ink text-sm mb-2">Stomach Flu (Norovirus)</h4>
                                <p class="text-xs text-brand-ink/60 leading-relaxed">
                                    <strong>Watch for:</strong> Sudden onset of nausea, vomiting, and diarrhea. Requires immediate exclusion.
                                </p>
                            </div>
                        </div>
                        <a href="#" class="inline-block mt-8 text-xs font-bold text-kidazzle-red uppercase tracking-widest hover:underline">Full Symptom Guide &rarr;</a>
                    </div>

                    <!-- Protocols -->
                    <div class="bg-brand-cream/50 rounded-[3rem] p-10 border border-brand-ink/5">
                        <h3 class="font-bold text-xl text-brand-ink mb-6 flex items-center gap-3">
                            <i class="fa-solid fa-shield-virus text-kidazzle-green"></i> Medical Protocols
                        </h3>
                        <div class="space-y-4">
                            <div class="flex gap-4">
                                <i class="fa-solid fa-circle-check text-kidazzle-green mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-sm text-brand-ink">Fever Policy</h4>
                                    <p class="text-xs text-brand-ink/60">Fever over 100.4°F requires 24-hour exclusion without medication.</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <i class="fa-solid fa-circle-check text-kidazzle-green mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-sm text-brand-ink">Medication</h4>
                                    <p class="text-xs text-brand-ink/60">Only prescription meds in original packaging with signed forms.</p>
                                </div>
                            </div>
                            <div class="flex gap-4">
                                <i class="fa-solid fa-circle-check text-kidazzle-green mt-1"></i>
                                <div>
                                    <h4 class="font-bold text-sm text-brand-ink">Hand Washing</h4>
                                    <p class="text-xs text-brand-ink/60">Minimum 20 seconds before meals and after diaper transitions.</p>
                                </div>
                            </div>
                        </div>
                        <a href="#" class="inline-block mt-8 text-xs font-bold text-kidazzle-green uppercase tracking-widest hover:underline">Access Protocol Manual &rarr;</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
