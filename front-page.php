<?php
/**
 * Front Page Template - WIMPER
 *
 * @package wimper
 */

get_header();
?>

<main>
    <?php
    // WIMPER Home Page Sections
    get_template_part('template-parts/wimper/hero');
    get_template_part('template-parts/wimper/paradigm-shift');
    get_template_part('template-parts/wimper/financial-calculator');
    ?>
</main>

<?php
get_footer();