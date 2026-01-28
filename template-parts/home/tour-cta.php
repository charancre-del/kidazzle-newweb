<?php
/**
 * Tour CTA Section with Embedded Form
 * 
 * KIDazzle Child Care Theme
 * 
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

$cta_headline = get_theme_mod('kidazzle_cta_headline', 'Ready to Start Your Journey?');
$cta_subheadline = get_theme_mod('kidazzle_cta_subheadline', 'Schedule a tour today and see why families have trusted us for 31 years.');
$form_embed_url = get_theme_mod('kidazzle_form_embed_url', 'https://api.leadconnectorhq.com/widget/form/N8RYaUY1SuORexcyA6la');
?>

<!-- CTA & Embed -->
<section class="py-16 bg-white">
    <div
        class="max-w-6xl mx-auto px-6 bg-gradient-to-br from-[#4c1d95] via-[#7c3aed] to-[#c026d3] rounded-[3rem] p-12 text-center text-white shadow-2xl relative overflow-hidden">
        <div class="relative z-10">
            <h3 class="text-3xl font-extrabold mb-4"><?php echo esc_html($cta_headline); ?></h3>
            <p class="text-purple-100 text-lg mb-8"><?php echo esc_html($cta_subheadline); ?></p>

            <!-- EMBEDDED FORM -->
            <!-- EMBEDDED FORM -->
            <div class="bg-white/10 rounded-2xl p-4 mb-8 max-w-4xl mx-auto h-[900px] overflow-hidden">
                <iframe src="https://api.leadconnectorhq.com/widget/form/N8RYaUY1SuORexcyA6la"
                    style="width:100%;height:100%;border:none;border-radius:20px" id="inline-N8RYaUY1SuORexcyA6la"
                    data-layout="{'id':'INLINE'}" data-trigger-type="alwaysShow" data-trigger-value=""
                    data-activation-type="alwaysActivated" data-activation-value=""
                    data-deactivation-type="neverDeactivate" data-deactivation-value=""
                    data-form-name="2023 New KIDazzel website contact " data-height="698"
                    data-layout-iframe-id="inline-N8RYaUY1SuORexcyA6la" data-form-id="N8RYaUY1SuORexcyA6la"
                    title="2023 New KIDazzel website contact ">
                </iframe>
                <script src="https://link.msgsndr.com/js/form_embed.js" defer></script>
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>"
                    class="bg-white text-purple-700 px-8 py-3 rounded-xl font-bold hover:bg-purple-50 transition shadow-lg"><?php esc_html_e('View Locations', 'kidazzle'); ?></a>
            </div>
        </div>
    </div>
</section>