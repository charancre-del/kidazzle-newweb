<?php
/**
 * WIMPER Timeline Section
 *
 * @package wimper
 */
?>

<!-- TIMELINE CONTENT -->
<div class="max-w-3xl mx-auto px-4 py-24 relative">
    <div class="timeline-line"></div>

    <!-- Phase 1 -->
    <div class="relative pl-24 mb-20 group">
        <div
            class="absolute left-0 top-0 w-14 h-14 bg-navy text-white rounded-full flex items-center justify-center font-serif text-xl border-4 border-slate-50 z-10 shadow-xl group-hover:scale-110 transition duration-300">
            1</div>
        <div class="bg-white p-10 border border-slate-100 shadow-lg hover:shadow-2xl transition rounded-sm relative">
            <div class="absolute top-0 left-0 w-1 h-full bg-slate-200 group-hover:bg-navy transition"></div>
            <span class="text-gold text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Days 1-7:
                Ingestion</span>
            <h3 class="font-bold text-2xl text-navy mb-3">Analysis & Architecture</h3>
            <p class="text-slate-600 text-sm leading-relaxed">
                We ingest your census data. Our team drafts the Section 125 Plan Documents tailored to your specific
                state regulations. <span class="font-bold">Your Lift: Emailing us the CSV file.</span>
            </p>
        </div>
    </div>

    <!-- Phase 2 -->
    <div class="relative pl-24 mb-20 group">
        <div
            class="absolute left-0 top-0 w-14 h-14 bg-white text-navy border-2 border-navy rounded-full flex items-center justify-center font-serif text-xl z-10 shadow-xl group-hover:scale-110 transition duration-300">
            2</div>
        <div class="bg-white p-10 border border-slate-100 shadow-lg hover:shadow-2xl transition rounded-sm relative">
            <div class="absolute top-0 left-0 w-1 h-full bg-slate-200 group-hover:bg-navy transition"></div>
            <span class="text-gold text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Days 8-20:
                Connection</span>
            <h3 class="font-bold text-2xl text-navy mb-3">System Integration</h3>
            <p class="text-slate-600 text-sm leading-relaxed">
                Our experts sync with your payroll provider. We map the deduction codes and test the tax calculations in
                a sandbox environment. <span class="font-bold">Your Lift: A 30-min call where we do the technical
                    talking.</span>
            </p>
        </div>
    </div>

    <!-- Go Live -->
    <div class="relative pl-24 group">
        <div
            class="absolute left-0 top-0 w-14 h-14 bg-gold text-navy rounded-full flex items-center justify-center font-serif text-xl border-4 border-slate-50 z-10 shadow-xl group-hover:scale-110 transition duration-300">
            <i class="fas fa-check"></i></div>
        <div class="bg-navy p-10 border border-navy shadow-2xl rounded-sm relative overflow-hidden">
            <div class="absolute -right-10 -top-10 w-40 h-40 bg-gold/10 rounded-full blur-3xl"></div>
            <span class="text-white/50 text-[10px] font-bold uppercase tracking-[0.2em] mb-3 block">Day 45:
                Activation</span>
            <h3 class="font-bold text-2xl text-white mb-3">Go Live</h3>
            <p class="text-white/80 text-sm leading-relaxed">
                First payroll execution. FICA savings are realized immediately. Benefits become active. The system
                begins its automated cycle. <span class="font-bold text-white">Your Lift: Standard Monthly Payroll
                    Deduction Processing.</span>
            </p>
        </div>
    </div>

    <!-- CTA -->
    <div class="relative pl-24 mt-12 group">
        <a href="<?php echo home_url('/contact'); ?>"
            class="block w-full bg-gold text-navy font-bold py-5 text-center uppercase tracking-[0.2em] text-xs hover:bg-navy hover:text-white hover:border-gold border border-transparent transition-all duration-300 shadow-xl rounded-sm">
            Request Feasibility Audit <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</div>

<style>
    .timeline-line {
        position: absolute;
        left: 28px;
        top: 20px;
        bottom: 0;
        width: 1px;
        background: linear-gradient(to bottom, #d4af37 0%, #cbd5e1 100%);
        z-index: 0;
    }

    .text-navy {
        color: #020617;
    }

    .text-gold {
        color: #d4af37;
    }

    .bg-gold {
        background-color: #d4af37;
    }

    .bg-navy {
        background-color: #020617;
    }

    .border-gold {
        border-color: #d4af37;
    }
</style>