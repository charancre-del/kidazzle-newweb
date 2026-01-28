<?php
/**
 * Template Name: ERS Quality Standards Page
 *
 * @package kidazzle_Excellence
 */

get_header();
?>

<main id="view-ers" class="bg-white">
    <!-- Hero -->
    <section class="bg-kidazzle-blue py-24 text-white text-center relative overflow-hidden">
        <div class="container mx-auto px-4 relative z-10">
            <span class="bg-white/20 text-white px-4 py-1 rounded-full text-xs font-bold uppercase tracking-wider mb-4 inline-block backdrop-blur-sm border border-white/10 italic">
                The Science of Quality
            </span>
            <h1 class="font-serif text-4xl md:text-6xl font-bold mb-6">
                Measuring Excellence
            </h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto leading-relaxed">
                We use ITERS and ECERS rating scales to objectively measure and improve the quality of your child's daily experience.
            </p>
        </div>
        <!-- Abstract Background Pattern -->
        <div class="absolute inset-0 opacity-10 pointer-events-none">
            <div class="absolute top-0 right-0 w-96 h-96 bg-white rounded-full -mr-48 -mt-48 blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-96 h-96 bg-kidazzle-green rounded-full -ml-48 -mb-48 blur-3xl"></div>
        </div>
    </section>

    <div class="container mx-auto px-4 py-16 max-w-5xl space-y-24">
       
        <!-- Intro -->
        <section class="text-center max-w-3xl mx-auto">
            <h2 class="font-serif text-3xl md:text-4xl font-bold text-brand-ink mb-6">
                Why Environment Matters
            </h2>
            <p class="text-lg text-brand-ink/80 leading-relaxed">
                A child's environment—the space, the routine, and the interactions—is their third teacher. KIDazzle adheres to the rigorous standards of the <strong>Environment Rating Scales (ERS)</strong>, the gold standard for measuring quality in early childhood programs.
            </p>
        </section>

        <!-- ITERS Section -->
        <section id="iters" class="grid md:grid-cols-2 gap-12 items-center bg-brand-cream/30 p-10 rounded-[3rem] border border-brand-ink/5 shadow-soft">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-kidazzle-red/10 p-4 rounded-2xl text-kidazzle-red">
                        <i class="fa-solid fa-baby text-3xl"></i>
                    </div>
                    <h2 class="font-serif text-3xl font-bold text-brand-ink">ITERS-3</h2>
                </div>
                <h3 class="text-xl font-bold text-kidazzle-red mb-4 uppercase tracking-wider">Infant/Toddler Environment Rating Scale</h3>
                <p class="text-brand-ink/80 mb-6 leading-relaxed">
                    Designed for classrooms serving children from birth to 30 months. It focuses on the protection of children's health and safety, appropriate stimulation through language and activities, and warm interaction.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="bg-kidazzle-red/20 w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fa-solid fa-check text-kidazzle-red text-xs"></i>
                        </div>
                        <span class="text-brand-ink/90 text-sm"><strong>Personal Care Routines:</strong> Hygienic diapering, meals, and naps.</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="bg-kidazzle-red/20 w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fa-solid fa-check text-kidazzle-red text-xs"></i>
                        </div>
                        <span class="text-brand-ink/90 text-sm"><strong>Listening & Talking:</strong> Consistent verbal interaction to build vocabulary.</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="bg-kidazzle-red/20 w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fa-solid fa-check text-kidazzle-red text-xs"></i>
                        </div>
                        <span class="text-brand-ink/90 text-sm"><strong>Interaction:</strong> Peer interaction and staff-child emotional support.</span>
                    </div>
                </div>
            </div>
            <div class="h-80 bg-white rounded-[2rem] shadow-sm flex items-center justify-center text-kidazzle-red/20 border border-brand-ink/5 overflow-hidden group">
                 <i class="fa-solid fa-heart-circle-check text-9xl group-hover:scale-110 transition-transform duration-500"></i>
            </div>
        </section>

        <!-- ECERS Section -->
        <section id="ecers" class="grid md:grid-cols-2 gap-12 items-center bg-brand-cream/30 p-10 rounded-[3rem] border border-brand-ink/5 shadow-soft">
            <div class="order-2 md:order-1 h-80 bg-white rounded-[2rem] shadow-sm flex items-center justify-center text-kidazzle-green/20 border border-brand-ink/5 overflow-hidden group">
                 <i class="fa-solid fa-book-open-reader text-9xl group-hover:scale-110 transition-transform duration-500"></i>
            </div>
            <div class="order-1 md:order-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="bg-kidazzle-green/10 p-4 rounded-2xl text-kidazzle-green">
                        <i class="fa-solid fa-school text-3xl"></i>
                    </div>
                    <h2 class="font-serif text-3xl font-bold text-brand-ink">ECERS-3</h2>
                </div>
                <h3 class="text-xl font-bold text-kidazzle-green mb-4 uppercase tracking-wider">Early Childhood Environment Rating Scale</h3>
                <p class="text-brand-ink/80 mb-6 leading-relaxed">
                    Designed for preschool-aged children (3 through 5 years). It emphasizes the learning environment, program structure, and the quality of teaching interactions.
                </p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3">
                        <div class="bg-kidazzle-green/20 w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fa-solid fa-check text-kidazzle-green text-xs"></i>
                        </div>
                        <span class="text-brand-ink/90 text-sm"><strong>Language-Reasoning:</strong> Using books and encouraging communication.</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="bg-kidazzle-green/20 w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fa-solid fa-check text-kidazzle-green text-xs"></i>
                        </div>
                        <span class="text-brand-ink/90 text-sm"><strong>Activities:</strong> Fine motor, art, music, blocks, and nature/science.</span>
                    </div>
                    <div class="flex items-start gap-3">
                        <div class="bg-kidazzle-green/20 w-6 h-6 rounded-full flex items-center justify-center flex-shrink-0 mt-1">
                            <i class="fa-solid fa-check text-kidazzle-green text-xs"></i>
                        </div>
                        <span class="text-brand-ink/90 text-sm"><strong>Program Structure:</strong> Balance of free play and group time.</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Parent Impact -->
        <section class="bg-brand-ink text-white rounded-[3rem] p-12 text-center relative overflow-hidden shadow-2xl">
            <div class="relative z-10">
                <h2 class="font-serif text-3xl md:text-4xl font-bold mb-4">What This Means for You</h2>
                <p class="text-lg text-white/80 max-w-3xl mx-auto mb-10">
                    When a center follows these scales, it means your child isn't just "safe"—they are in an environment scientifically proven to boost cognitive development, social skills, and emotional well-being.
                </p>
                <a href="<?php echo esc_url(home_url('/locations/')); ?>" class="inline-flex items-center gap-3 bg-kidazzle-red text-white px-10 py-5 rounded-full font-bold uppercase tracking-widest text-sm hover:bg-white hover:text-brand-ink transition-all transform hover:-translate-y-1 shadow-xl">
                    Schedule a Tour to See the Difference
                    <i class="fa-solid fa-chevron-right"></i>
                </a>
            </div>
            <!-- Background Decoration -->
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -mr-32 -mt-32 blur-2xl"></div>
            <div class="absolute bottom-0 left-0 w-64 h-64 bg-kidazzle-yellow/5 rounded-full -ml-32 -mb-32 blur-2xl"></div>
        </section>

    </div>
</main>

<?php
get_footer();
