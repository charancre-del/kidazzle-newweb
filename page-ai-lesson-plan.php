<?php
/**
 * Template Name: AI Lesson Planning Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<main id="view-ai-lesson-plan" class="bg-white">
    <!-- Hero Section -->
    <div class="relative py-32 text-center overflow-hidden">
         <div class="absolute inset-0 z-0">
             <!-- Image: Technology / Teacher Planning -->
             <img src="https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?ixlib=rb-4.0.3&auto=format&fit=crop&w=1600&q=80" alt="Teacher planning with technology" class="w-full h-full object-cover">
             <div class="absolute inset-0 bg-brand-ink/70"></div>
        </div>
        <div class="relative z-10 container mx-auto px-4 text-white">
            <span class="bg-white/20 px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10 italic">
                Innovation in Education
            </span>
            <h1 class="font-serif text-5xl md:text-7xl font-bold mb-6">
                AI-Powered <br><span class="italic text-kidazzle-yellow">Lesson Planning</span>
            </h1>
            <p class="text-xl md:text-2xl max-w-2xl mx-auto text-white/90 drop-shadow-md leading-relaxed">
                Embracing automation to empower teachers and elevate early education.
            </p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-24 space-y-24">
       
        <!-- The Innovation Story -->
        <section class="grid md:grid-cols-2 gap-16 items-center">
            <div class="order-2 md:order-1">
                <h2 class="font-serif text-3xl md:text-5xl font-bold text-brand-ink mb-8">Grade 'A' Plans <br><span class="text-kidazzle-blue italic">in Minutes.</span></h2>
                <div class="space-y-6 text-lg text-brand-ink/80 leading-relaxed">
                    <p>
                        At KIDazzle, we are revolutionizing the classroom by embracing <strong>Artificial Intelligence and Automation</strong>. Teachers often spend hours engaging in administrative work, taking time away from what matters most—interacting with your child.
                    </p>
                    <p>
                        With our new AI tools, our educators can generate comprehensive, standards-aligned lesson plans for <strong>all age groups</strong> in a fraction of the time. This technology ensures every activity is educational, creative, and tailored to the specific developmental needs of the class.
                    </p>
                    <ul class="space-y-4 mt-8">
                        <li class="flex items-center gap-4 font-bold text-brand-ink">
                            <i class="fa-solid fa-circle-check text-kidazzle-blue text-xl"></i> 
                            Consistent Quality Across Centers
                        </li>
                        <li class="flex items-center gap-4 font-bold text-brand-ink">
                            <i class="fa-solid fa-circle-check text-kidazzle-blue text-xl"></i> 
                            More Face-Time with Students
                        </li>
                        <li class="flex items-center gap-4 font-bold text-brand-ink">
                            <i class="fa-solid fa-circle-check text-kidazzle-blue text-xl"></i> 
                            Infinite Creative Resources
                        </li>
                    </ul>
                </div>
            </div>
            <div class="order-1 md:order-2 bg-brand-cream p-12 rounded-[4rem] border border-brand-ink/5 flex items-center justify-center relative shadow-soft">
                <div class="text-center relative z-10">
                    <div class="w-32 h-32 bg-white rounded-full flex items-center justify-center shadow-lg mx-auto mb-8">
                        <i class="fa-solid fa-microchip text-5xl text-kidazzle-blue animate-pulse"></i>
                    </div>
                    <h3 class="font-serif text-3xl font-bold text-brand-ink mb-4">Smart Automation</h3>
                    <p class="text-brand-ink/70 max-w-xs mx-auto">Turning hours of paperwork into minutes of inspired planning.</p>
                </div>
                <!-- Decoration -->
                <div class="absolute top-10 right-10 opacity-10">
                    <i class="fa-solid fa-brain text-8xl text-brand-ink"></i>
                </div>
            </div>
        </section>

        <!-- Sample Download Section -->
        <section class="max-w-4xl mx-auto">
            <div class="bg-white rounded-[4rem] shadow-2xl border border-brand-ink/5 overflow-hidden relative">
                <div class="absolute top-0 left-0 w-full h-3 bg-gradient-to-r from-kidazzle-red via-kidazzle-yellow to-kidazzle-blue"></div>
               
                <div class="p-12 md:p-20 text-center">
                    <span class="text-kidazzle-blue font-bold tracking-[0.2em] uppercase text-xs block mb-4">Free Resource</span>
                    <h2 class="font-serif text-4xl md:text-5xl font-bold text-brand-ink mb-8">See the Difference <span class="italic text-kidazzle-red">Yourself.</span></h2>
                    <p class="text-lg text-brand-ink/80 mb-12 max-w-2xl mx-auto leading-relaxed">
                        Curious about what a "Grade A" AI-assisted lesson plan looks like? Enter your details below to instantly receive sample plans for Infants, Toddlers, and Preschoolers.
                    </p>

                    <!-- LEAD CAPTURE FORM ENCAPSULATION -->
                    <div class="bg-brand-cream/50 rounded-[2.5rem] p-8 md:p-12 max-w-xl mx-auto border border-brand-ink/5">
                        <div class="bg-white rounded-3xl p-6 shadow-sm mb-6 border border-brand-ink/5">
                            <iframe
                                src="https://api.leadconnectorhq.com/widget/form/N8RYaUY1SuORexcyA6la"
                                style="width:100%;height:450px;border:none;border-radius:20px"
                                id="inline-N8RYaUY1SuORexcyA6la"
                                data-layout="{'id':'INLINE'}"
                                data-trigger-type="alwaysShow"
                                data-form-id="N8RYaUY1SuORexcyA6la"
                                title="Lesson Plan Resource Download">
                            </iframe>
                            <script src="https://link.msgsndr.com/js/form_embed.js" async></script>
                        </div>
                        
                        <p class="text-[10px] text-brand-ink/40 uppercase tracking-widest font-bold">
                            Secure Download Area • Powered by KIDazzle Innovation
                        </p>
                    </div>

                    <p class="text-xs text-brand-ink/40 mt-10">By downloading, you agree to receive educational updates from KIDazzle. We respect your privacy.</p>
                </div>
            </div>
        </section>

    </div>
</main>

<?php
get_footer();
