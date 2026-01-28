<?php
/**
 * Template Name: WIMPER - The Execution
 *
 * @package wimper
 */

get_header();
?>

<!-- PAGE HEADER -->
<header class="page-header-spacer">
    <div class="max-w-4xl mx-auto px-4 text-center">
        <span class="text-gold text-xs font-bold uppercase tracking-[0.2em] mb-6 block">Speed to Savings</span>
        <h1 class="text-6xl font-serif text-navy mb-6">The 45-Day Protocol</h1>
        <p class="text-slate-500 mt-6 text-lg font-light max-w-2xl mx-auto">
            We don't ask for 9 months. We ask for 45 days. Here is the linear path to Go-Live.
        </p>
    </div>
</header>

<main>
    <?php get_template_part('template-parts/wimper/timeline'); ?>
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

    .border-gold {
        border-color: #d4af37;
    }
</style>

<?php
get_footer();
