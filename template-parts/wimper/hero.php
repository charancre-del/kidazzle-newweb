<?php
/**
 * WIMPER Hero Section
 *
 * @package wimper
 */
?>

<!-- HERO SECTION -->
<section class="hero-gradient text-white pt-52 pb-40 relative overflow-hidden">
    <!-- Subtle Grid Background -->
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10">
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-20 items-center">

            <!-- Text Side -->
            <div class="lg:col-span-7">
                <div class="flex items-center mb-10 space-x-4">
                    <span class="h-px w-16 bg-gold"></span>
                    <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] glow-text">Financial
                        Architecture</span>
                </div>
                <h1 class="text-5xl md:text-7xl font-medium mb-8 leading-tight">
                    Reduce Your<br>
                    <span class="italic text-slate-400">Taxable Surface Area.</span>
                </h1>
                <p
                    class="text-lg text-slate-300 mb-12 leading-relaxed max-w-2xl font-light border-l border-white/20 pl-6">
                    The <strong>W.I.M.P.E.R. Protocol</strong> is not just a wellness program. It is a proprietary
                    <strong>Section 125/105 Chassis</strong> that physically removes payroll from the FICA taxation
                    zone. The result is a self-funded EBITDA expansion that no competitor can match.
                </p>
                <div class="flex flex-col sm:flex-row gap-6">
                    <a href="#impact"
                        class="bg-gold text-navy px-12 py-5 rounded-sm font-bold text-xs uppercase tracking-[0.15em] hover:bg-white transition shadow-2xl hover:scale-105 transform duration-300 text-center inline-block">
                        Model The Savings
                    </a>
                    <a href="<?php echo home_url('/method'); ?>"
                        class="group flex items-center text-slate-300 text-xs font-bold uppercase tracking-[0.15em] hover:text-white transition px-6">
                        <span
                            class="border-b border-slate-600 group-hover:border-gold pb-1 transition duration-300">Inspect
                            The Engine</span>
                        <i class="fas fa-chevron-right ml-4 text-[10px] text-gold"></i>
                    </a>
                </div>
            </div>

            <!-- Stats Side -->
            <div class="lg:col-span-5">
                <div
                    class="glass-panel bg-white/5 backdrop-blur-2xl border-white/10 p-12 rounded-sm relative group hover:border-gold/30 transition duration-500">
                    <div class="absolute top-0 right-0 p-6 opacity-20 group-hover:opacity-100 transition duration-500">
                        <i class="fas fa-fingerprint text-gold text-6xl"></i>
                    </div>
                    <h3 class="text-white font-serif text-3xl mb-10">The New Baseline</h3>
                    <div class="space-y-10">
                        <div>
                            <p class="text-slate-400 text-[10px] uppercase tracking-[0.2em] mb-2">EBITDA Recapture (Per
                                Employee)</p>
                            <p class="text-5xl text-white font-light tracking-tight">~$1,100<span
                                    class="text-gold text-lg align-top">/yr</span></p>
                        </div>
                        <div class="w-full h-px bg-gradient-to-r from-white/20 to-transparent"></div>
                        <div>
                            <p class="text-slate-400 text-[10px] uppercase tracking-[0.2em] mb-2">Implementation
                                Velocity</p>
                            <p class="text-5xl text-white font-light tracking-tight">45 <span
                                    class="text-2xl text-slate-400">Days</span></p>
                        </div>
                        <div class="w-full h-px bg-gradient-to-r from-white/20 to-transparent"></div>
                        <div>
                            <p class="text-slate-400 text-[10px] uppercase tracking-[0.2em] mb-2">Client ROI</p>
                            <p class="text-5xl text-gold font-light tracking-tight">Infinite <span
                                    class="text-sm text-slate-400 align-middle">(Zero Cost)</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .hero-gradient {
        background: radial-gradient(circle at 50% 0%, #1e293b 0%, #020617 100%);
    }

    .glass-panel {
        background: rgba(255, 255, 255, 0.98);
        border: 1px solid #e2e8f0;
        box-shadow: 0 20px 50px -12px rgba(0, 0, 0, 0.15);
    }

    .glow-text {
        text-shadow: 0 0 20px rgba(212, 175, 55, 0.3);
    }

    .bg-navy {
        background-color: #020617;
    }

    .text-gold {
        color: #d4af37;
    }

    .bg-gold {
        background-color: #d4af37;
    }
</style>