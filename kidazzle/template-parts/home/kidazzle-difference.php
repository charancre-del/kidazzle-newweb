<?php
/**
 * Template Part: KIDazzle Difference Section
 * Four pillars of the KIDazzle difference
 *
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

$pillars = array(
    array(
        'icon' => 'utensils',
        'title' => __('Chef-Prepared Nutrition', 'kidazzle'),
        'description' => __('Our commercial-grade kitchens serve fresh, hot meals prepared daily by professional chefs. We accommodate all dietary needs.', 'kidazzle'),
        'url' => home_url('/parents/#meals'),
        'border_color' => 'border-orange-100 hover:border-orange-400',
        'icon_bg' => 'bg-orange-50',
        'icon_color' => 'text-orange-600',
    ),
    array(
        'icon' => 'brain',
        'title' => __('Creative Curriculum®', 'kidazzle'),
        'description' => __('Research-based learning tailored to each developmental stage. Every activity has a learning purpose.', 'kidazzle'),
        'url' => home_url('/curriculum/'),
        'border_color' => 'border-cyan-100 hover:border-cyan-400',
        'icon_bg' => 'bg-cyan-50',
        'icon_color' => 'text-cyan-600',
    ),
    array(
        'icon' => 'shield-check',
        'title' => __('Safety & Security', 'kidazzle'),
        'description' => __('Your peace of mind is our priority with secure keypad entry and monitored surveillance. We maintain rigorous safety protocols.', 'kidazzle'),
        'url' => home_url('/about/#safety'),
        'border_color' => 'border-green-100 hover:border-green-400',
        'icon_bg' => 'bg-green-50',
        'icon_color' => 'text-green-600',
    ),
    array(
        'icon' => 'heart-handshake',
        'title' => __('Dedicated Staff', 'kidazzle'),
        'description' => __('We pride ourselves on low turnover and a team of tenured educators who truly know your child. Our staff receives ongoing training to provide the highest quality care.', 'kidazzle'),
        'url' => home_url('/about/#team'),
        'border_color' => 'border-red-100 hover:border-red-400',
        'icon_bg' => 'bg-red-50',
        'icon_color' => 'text-red-600',
    ),
);
?>

<section class="py-24 bg-slate-50">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-4xl mx-auto mb-16">
            <h2 class="text-3xl md:text-5xl font-bold text-slate-900 mb-6"><?php esc_html_e('The KIDazzle Difference', 'kidazzle'); ?></h2>
            <p class="text-slate-500 text-xl leading-relaxed"><?php esc_html_e('We are not a franchise. We are a family of independent schools connected by a shared mission.', 'kidazzle'); ?></p>
        </div>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-24">
            <?php foreach ($pillars as $pillar) : ?>
                <a href="<?php echo esc_url($pillar['url']); ?>" class="p-8 rounded-[2rem] border-2 <?php echo esc_attr($pillar['border_color']); ?> transition bg-white shadow-sm hover:shadow-xl text-center group block">
                    <div class="w-14 h-14 rounded-2xl <?php echo esc_attr($pillar['icon_bg']); ?> <?php echo esc_attr($pillar['icon_color']); ?> flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition">
                        <i data-lucide="<?php echo esc_attr($pillar['icon']); ?>" class="w-7 h-7"></i>
                    </div>
                    <h3 class="font-bold text-xl text-slate-900 mb-2"><?php echo esc_html($pillar['title']); ?></h3>
                    <p class="text-sm text-slate-600 mb-4 leading-relaxed"><?php echo esc_html($pillar['description']); ?></p>
                    <span class="<?php echo esc_attr($pillar['icon_color']); ?> font-bold text-xs flex items-center justify-center gap-1 uppercase tracking-wide mt-2">
                        <?php esc_html_e('Learn More', 'kidazzle'); ?> <i data-lucide="arrow-right" class="w-3 h-3"></i>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
