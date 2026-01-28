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
        'icon' => '🥗',
        'title' => __('Chef-Prepared Nutrition', 'kidazzle'),
        'description' => __('Our commercial-grade kitchens serve fresh, hot meals prepared daily by professional chefs.', 'kidazzle'),
        'url' => home_url('/resources/'),
        'accent' => 'kidazzle-orange',
    ),
    array(
        'icon' => '🧠',
        'title' => __('Creative Curriculum®', 'kidazzle'),
        'description' => __('Research-based learning tailored to each developmental stage. Every activity has a purpose.', 'kidazzle'),
        'url' => home_url('/curriculum/'),
        'accent' => 'kidazzle-blue',
    ),
    array(
        'icon' => '🛡️',
        'title' => __('Safety & Security', 'kidazzle'),
        'description' => __('Peace of mind with secure keypad entry, monitored surveillance, and rigorous protocols.', 'kidazzle'),
        'url' => home_url('/about/'),
        'accent' => 'kidazzle-green',
    ),
    array(
        'icon' => '❤️',
        'title' => __('Dedicated Staff', 'kidazzle'),
        'description' => __('Low turnover and a team of tenured educators who truly know and love your child.', 'kidazzle'),
        'url' => home_url('/careers/'),
        'accent' => 'kidazzle-red',
    ),
);
?>

<section class="py-24 bg-brand-cream relative overflow-hidden">
    <!-- Abstract Brand Pattern -->
    <div
        class="absolute inset-0 opacity-[0.03] pointer-events-none bg-[url('https://www.transparenttextures.com/patterns/circle-knot.png')]">
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto mb-20">
            <span
                class="text-kidazzle-blue font-bold tracking-[0.3em] text-[10px] uppercase mb-4 block italic">Excellence
                by Design</span>
            <h2 class="text-3xl md:text-6xl font-serif font-bold text-brand-ink mb-6">
                <?php esc_html_e('The KIDazzle Difference', 'kidazzle'); ?></h2>
            <p class="text-brand-ink/60 text-xl leading-relaxed max-w-2xl mx-auto">
                <?php esc_html_e('We are an independent family of schools connected by a singular mission: providing elite care and education.', 'kidazzle'); ?>
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php foreach ($pillars as $index => $pillar):
                $accent = $pillar['accent'];
                $is_even = ($index % 2 !== 0);
                ?>
                <a href="<?php echo esc_url($pillar['url']); ?>"
                    class="relative group <?php echo $is_even ? 'md:translate-y-8' : ''; ?> transition-transform duration-500">
                    <div
                        class="relative bg-white p-10 rounded-[3rem] shadow-soft border border-brand-ink/5 group-hover:-translate-y-2 group-hover:shadow-2xl transition-all duration-300 h-full flex flex-col items-center text-center">
                        <!-- Decorative Blob -->
                        <div
                            class="absolute top-0 right-0 w-24 h-24 bg-<?php echo esc_attr($accent); ?>/5 rounded-bl-full group-hover:scale-125 transition-transform duration-500">
                        </div>

                        <div
                            class="w-20 h-20 rounded-3xl bg-white shadow-lg flex items-center justify-center mb-8 border-2 border-<?php echo esc_attr($accent); ?>/10 text-<?php echo esc_attr($accent); ?> relative overflow-hidden group-hover:bg-<?php echo esc_attr($accent); ?> group-hover:text-white transition-all duration-300">
                            <span class="text-3xl relative z-10"><?php echo esc_html($pillar['icon']); ?></span>
                        </div>

                        <h3 class="font-serif font-bold text-2xl text-brand-ink mb-4">
                            <?php echo esc_html($pillar['title']); ?></h3>
                        <p class="text-brand-ink/70 text-sm leading-relaxed mb-6 flex-grow">
                            <?php echo esc_html($pillar['description']); ?></p>

                        <div
                            class="w-10 h-10 rounded-full border border-brand-ink/10 flex items-center justify-center text-<?php echo esc_attr($accent); ?> group-hover:bg-<?php echo esc_attr($accent); ?> group-hover:text-white group-hover:border-<?php echo esc_attr($accent); ?> transition-all duration-300">
                            <i class="fa-solid fa-arrow-right text-xs"></i>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>