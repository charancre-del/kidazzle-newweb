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

// Default stats - can be overridden via customizer
$stats = array(
        array('value' => '31+', 'label' => 'Years of Excellence', 'color' => 'text-yellow-400'),
        array('value' => '10k+', 'label' => 'Students Graduated', 'color' => 'text-red-500'),
        array('value' => '3', 'label' => 'States Served', 'color' => 'text-cyan-400'),
        array('value' => '100%', 'label' => 'Quality Rated', 'color' => 'text-green-500'),
);

// Allow filtering/customization
$stats = apply_filters('kidazzle_home_stats', $stats);
?>

<!-- STATS STRIP -->
<section class="py-24 bg-slate-900 text-white relative overflow-hidden">
        <!-- Background Pattern -->
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]">
        </div>

        <div class="container mx-auto px-4 relative z-10 text-center">
                <h2 class="text-4xl md:text-5xl font-extrabold mb-8">
                        <?php esc_html_e('Vision for the Future', 'kidazzle'); ?></h2>
                <p class="text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed mb-12">
                        <?php esc_html_e('As we look to the next 30 years, KIDazzle is committed to expanding our footprint while deepening our impact. We are constantly innovating—integrating technology like AI into our lesson planning while keeping the human connection at the center of everything we do.', 'kidazzle'); ?>
                </p>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 border-t border-slate-800 pt-12 max-w-5xl mx-auto">
                        <?php foreach ($stats as $stat): ?>
                                <div class="p-4">
                                        <div class="text-4xl font-extrabold <?php echo esc_attr($stat['color']); ?> mb-2">
                                                <?php echo esc_html($stat['value']); ?></div>
                                        <div class="text-xs font-bold text-slate-400 uppercase tracking-widest">
                                                <?php echo esc_html($stat['label']); ?></div>
                                </div>
                        <?php endforeach; ?>
                </div>
        </div>
</section>