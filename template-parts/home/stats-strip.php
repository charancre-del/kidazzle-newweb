<?php
/**
 * Stats Strip Section
 * 
 * KIDazzle Child Care Theme
 * 
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
        exit;
}

// Try to get stats from Customizer JSON, fallback to defaults
$stats_json = get_theme_mod('kidazzle_home_stats_json', '');
$stats = array();

if (!empty($stats_json)) {
    $decoded = json_decode($stats_json, true);
    if (is_array($decoded) && !empty($decoded)) {
        // Map Customizer JSON to template format with colors
        $colors = array('kidazzle-yellow', 'kidazzle-red', 'kidazzle-blue', 'kidazzle-green');
        foreach ($decoded as $index => $stat) {
            $stats[] = array(
                'value' => $stat['value'] ?? '',
                'label' => $stat['label'] ?? '',
                'color' => $colors[$index % count($colors)],
            );
        }
    }
}

// Fallback to hardcoded defaults
if (empty($stats)) {
    $stats = array(
        array('value' => '33+', 'label' => 'Years of Excellence', 'color' => 'kidazzle-yellow'),
        array('value' => '10k+', 'label' => 'Students Graduated', 'color' => 'kidazzle-red'),
        array('value' => '15+', 'label' => 'Awarded Campuses', 'color' => 'kidazzle-blue'),
        array('value' => '100%', 'label' => 'Quality Rated', 'color' => 'kidazzle-green'),
    );
}

$stats = apply_filters('kidazzle_home_stats', $stats);
?>


<!-- STATS STRIP (High Fidelity Refractive) -->
<section class="py-32 bg-brand-ink text-white relative overflow-hidden">
        <!-- Brand Decor Blobs -->
        <div class="absolute -right-40 -top-40 w-[800px] h-[800px] bg-kidazzle-blue/5 rounded-full blur-[120px]"></div>
        <div class="absolute -left-40 -bottom-40 w-[800px] h-[800px] bg-kidazzle-red/5 rounded-full blur-[120px]"></div>
        
        <div class="absolute inset-0 opacity-[0.03] bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] pointer-events-none"></div>

        <div class="container mx-auto px-4 relative z-10 text-center">
                <span class="text-kidazzle-yellow font-bold tracking-[0.3em] text-[10px] uppercase mb-6 block italic">Impact & Innovation</span>
                <h2 class="text-4xl md:text-7xl font-serif font-bold mb-10 leading-[1.1]">
                        <?php esc_html_e('Vision for the Future', 'kidazzle'); ?></h2>
                <p class="text-xl md:text-2xl text-white/60 max-w-4xl mx-auto leading-relaxed mb-24 italic px-4">
                        <?php esc_html_e('As we look to the next 30 years, KIDazzle is committed to expanding our village while deepening our educational impact. We are constantly innovating—integrating proprietary AI for personalized learning while keeping the human connection at the heart of our mission.', 'kidazzle'); ?>
                </p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-12 border-t border-white/10 pt-20 max-w-6xl mx-auto">
                        <?php foreach ($stats as $stat): ?>
                                <div class="group cursor-default">
                                        <div class="text-5xl md:text-8xl font-serif font-bold text-<?php echo esc_attr($stat['color']); ?> mb-4 group-hover:scale-110 transition-transform duration-500 inline-block drop-shadow-lg">
                                                <?php echo esc_html($stat['value']); ?></div>
                                        <div class="text-[10px] font-bold text-white/40 uppercase tracking-[0.4em] mt-2">
                                                <?php echo esc_html($stat['label']); ?></div>
                                </div>
                        <?php endforeach; ?>
                </div>
        </div>
</section>
