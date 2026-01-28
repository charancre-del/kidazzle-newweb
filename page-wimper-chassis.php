<?php
/**
 * Template Name: WIMPER - The Chassis
 *
 * @package wimper
 */

get_header();
?>

<!-- PAGE HEADER -->
<header class="page-header-spacer">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">The Proprietary Twist</span>
        <h1 class="text-5xl md:text-6xl font-serif text-navy mb-6">The W.I.M.P.E.R. Chassis</h1>
        <p class="text-slate-500 text-lg font-light max-w-2xl mx-auto leading-relaxed">
            Most organizations fail because they lack the automated "Claims Trigger." Here is how we engineered the
            compliant solution.
        </p>
    </div>
</header>

<main>
    <?php
    // WIMPER Chassis Page Sections
    get_template_part('template-parts/wimper/chassis-lift');
    get_template_part('template-parts/wimper/chassis-comparison');
    ?>
</main>

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
</style>

<?php
get_footer();
