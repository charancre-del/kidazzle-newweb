<?php
/**
 * Template Part: Contact CTA Section
 * Purple gradient CTA with embedded Lead Connector form
 *
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

$form_id = get_theme_mod('kidazzle_contact_form_id', 'N8RYaUY1SuORexcyA6la');
?>

<section class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-6 bg-ombre-purple rounded-[3rem] p-12 text-center text-white shadow-2xl relative overflow-hidden">
        <div class="relative z-10">
            <h3 class="text-3xl font-extrabold mb-4"><?php esc_html_e('Ready to Start Your Journey?', 'kidazzle'); ?></h3>
            <p class="text-purple-100 text-lg mb-8"><?php esc_html_e('Schedule a tour today and see why families have trusted us for 31 years.', 'kidazzle'); ?></p>
            
            <!-- EMBEDDED FORM -->
            <div class="bg-white/10 border-2 border-dashed border-white/30 rounded-2xl p-4 mb-8 max-w-4xl mx-auto h-[900px] overflow-hidden">
                <iframe
                    src="https://api.leadconnectorhq.com/widget/form/<?php echo esc_attr($form_id); ?>"
                    style="width:100%;height:100%;border:none;border-radius:20px"
                    id="inline-<?php echo esc_attr($form_id); ?>"
                    data-layout="{'id':'INLINE'}"
                    data-trigger-type="alwaysShow"
                    data-trigger-value=""
                    data-activation-type="alwaysActivated"
                    data-activation-value=""
                    data-deactivation-type="neverDeactivate"
                    data-deactivation-value=""
                    data-form-name="2023 New KIDazzle website contact"
                    data-height="870"
                    data-layout-iframe-id="inline-<?php echo esc_attr($form_id); ?>"
                    data-form-id="<?php echo esc_attr($form_id); ?>"
                    title="<?php esc_attr_e('KIDazzle Contact Form', 'kidazzle'); ?>">
                </iframe>
                <script src="https://link.msgsndr.com/js/form_embed.js"></script>
            </div>

            <div class="flex flex-col sm:flex-row justify-center gap-4">
                <a href="<?php echo esc_url(get_post_type_archive_link('location')); ?>" class="bg-white text-purple-700 px-8 py-3 rounded-xl font-bold hover:bg-purple-50 transition shadow-lg">
                    <?php esc_html_e('View Locations', 'kidazzle'); ?>
                </a>
            </div>
        </div>
    </div>
</section>

<style>
.bg-ombre-purple { 
    background: linear-gradient(135deg, #4c1d95 0%, #7c3aed 50%, #c026d3 100%); 
}
</style>
