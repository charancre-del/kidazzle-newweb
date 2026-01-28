<?php
/**
 * Template Name: WIMPER - Feasibility Audit
 *
 * @package wimper
 */

get_header();
?>

<!-- PAGE HEADER -->
<header class="page-header-spacer bg-slate-50">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">No Sales Calls. Just
            Data.</span>
        <h1 class="text-5xl md:text-6xl font-serif text-navy mb-6">Feasibility Audit</h1>
        <p class="text-slate-500 mt-6 text-lg font-light max-w-2xl mx-auto leading-relaxed">
            We conduct comprehensive audits to determine if your organization qualifies for the W.I.M.P.E.R. protocol.
            Submit your preliminary data below to initiate the analysis.
        </p>
    </div>
</header>

<!-- EMBEDDED FORM CONTAINER -->
<div class="max-w-3xl mx-auto px-4 py-20">
    <div class="form-container">
        <iframe src="https://api.leadconnectorhq.com/widget/form/bnJjCYqGaVFUFp4v8wp6"
            style="width:100%;height:100%;border:none;border-radius:4px" id="inline-bnJjCYqGaVFUFp4v8wp6"
            data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
            data-activation-type="alwaysActivated" data-activation-value="" data-deactivation-type="neverDeactivate"
            data-deactivation-value="" data-form-name="Calendar Form" data-height="462"
            data-layout-iframe-id="inline-bnJjCYqGaVFUFp4v8wp6" data-form-id="bnJjCYqGaVFUFp4v8wp6"
            title="Calendar Form">
        </iframe>
        <script src="https://link.msgsndr.com/js/form_embed.js"></script>
    </div>

    <div class="mt-8 text-center text-xs text-slate-400 max-w-lg mx-auto">
        <p>Data transmission is encrypted via 256-bit SSL. Information provided is used strictly for eligibility
            calculation and is not sold to third parties.</p>
    </div>
</div>

<style>
    .page-header-spacer {
        padding-top: 160px;
        padding-bottom: 80px;
        background: white;
        border-bottom: 1px solid #e2e8f0;
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

    /* Integrated Form Container */
    .form-container {
        background-color: #ffffff;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        border-top: 4px solid #020617;
        /* Matches Navy Theme */
        border-radius: 2px;
        overflow: hidden;
        /* Ensures clean edges */
        min-height: 600px;
        /* Prevents collapse while loading */
    }
</style>

<?php
get_footer();
