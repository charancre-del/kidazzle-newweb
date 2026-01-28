<?php
/**
 * Template Part: Southeast Powerhouse Section
 * Regional location showcase - Memphis, Atlanta, Doral
 *
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

// Location data - can be made dynamic via customizer/ACF later
$locations = array(
    array(
        'name' => 'Memphis',
        'state' => 'Tennessee',
        'tagline' => 'Soul, Rhythm, & Rigor.',
        'link_text' => 'View Center',
        'url' => home_url('/location/memphis/'),
        'image' => 'https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/693c7cb5dbed99e0b07c8310.png',
        'bg_color' => 'bg-indigo-50',
        'badge_color' => 'bg-indigo-600',
        'text_color' => 'text-indigo-600',
        'is_hq' => false,
    ),
    array(
        'name' => 'Atlanta',
        'state' => 'Georgia',
        'tagline' => 'Our Headquarters.',
        'link_text' => 'View 5 Locations',
        'url' => get_post_type_archive_link('location'),
        'image' => 'https://storage.googleapis.com/msgsndr/ZR2UvxPL2wlZNSvHjmJD/media/693c7ddeb4f42080d1d6f342.png',
        'bg_color' => 'bg-orange-50',
        'badge_color' => 'bg-orange-600',
        'text_color' => 'text-orange-600',
        'is_hq' => true,
    ),
    array(
        'name' => 'Doral',
        'state' => 'Florida',
        'tagline' => 'Sunshine & STEM.',
        'link_text' => 'View Center',
        'url' => home_url('/location/doral/'),
        'image' => 'https://images.unsplash.com/photo-1535498730771-e735b998cd64?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
        'bg_color' => 'bg-cyan-50',
        'badge_color' => 'bg-cyan-600',
        'text_color' => 'text-cyan-600',
        'is_hq' => false,
    ),
);

// Get Customizer settings for locations section
$locations_heading = get_theme_mod('kidazzle_home_locations_heading', 'Defining Excellence Across the Southeast');
$locations_subheading = get_theme_mod('kidazzle_home_locations_subheading', '');
?>


<section class="py-20 bg-brand-cream relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5"
        style="background-image: radial-gradient(#0F172A20 1px, transparent 1px); background-size: 20px 20px;"></div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16">
            <span
                class="text-kidazzle-blue font-bold tracking-[0.3em] text-[10px] uppercase mb-4 block italic"><?php esc_html_e('A Southern Regional Powerhouse', 'kidazzle'); ?></span>
            <h2 class="text-4xl md:text-6xl font-serif font-bold text-brand-ink">
                <?php echo esc_html($locations_heading); ?></h2>
            <?php if ($locations_subheading): ?>
                <p class="text-brand-ink/60 mt-4 max-w-2xl mx-auto"><?php echo esc_html($locations_subheading); ?></p>
            <?php endif; ?>
        </div>


        <div class="grid md:grid-cols-3 gap-6 lg:gap-10">
            <?php foreach ($locations as $location): ?>
                <a href="<?php echo esc_url($location['url']); ?>"
                    class="group relative rounded-[3rem] overflow-hidden h-96 shadow-soft cursor-pointer transform hover:-translate-y-2 transition duration-300 bg-white border <?php echo $location['is_hq'] ? 'border-4 border-white shadow-2xl' : 'border-brand-ink/5'; ?> flex flex-col">
                    <div class="h-2/3 relative overflow-hidden <?php echo esc_attr($location['bg_color']); ?>">
                        <img src="<?php echo esc_url($location['image']); ?>"
                            alt="<?php echo esc_attr($location['name']); ?>"
                            class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-105">
                    </div>

                    <?php if ($location['is_hq']): ?>
                        <div class="absolute top-6 right-6 z-30">
                            <span
                                class="bg-white text-orange-600 px-4 py-2 rounded-full text-xs font-bold shadow-lg flex items-center gap-1">
                                ⭐ <?php esc_html_e('HQ', 'kidazzle'); ?>
                            </span>
                        </div>
                    <?php endif; ?>

                    <div class="p-8 w-full bg-white flex-grow flex flex-col justify-center relative">
                        <div class="absolute -top-5 left-8">
                            <span
                                class="<?php echo esc_attr($location['badge_color']); ?> text-white px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider shadow-md">
                                <?php echo esc_html($location['state']); ?>
                            </span>
                        </div>
                        <h3
                            class="text-<?php echo $location['is_hq'] ? '4xl' : '3xl'; ?> font-serif font-bold text-brand-ink mb-1">
                            <?php echo esc_html($location['name']); ?></h3>
                        <p class="text-brand-ink/50 text-sm font-medium"><?php echo esc_html($location['tagline']); ?></p>
                        <div
                            class="mt-4 flex items-center <?php echo esc_attr($location['text_color']); ?> font-bold text-sm group-hover:gap-2 transition-all">
                            <?php echo esc_html($location['link_text']); ?> ➡️
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>