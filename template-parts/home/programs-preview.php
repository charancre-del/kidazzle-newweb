<?php
/**
 * Template Part: Programs Preview
 * Featured programs grid with CTAs
 *
 * @package kidazzle
 */

$programs = kidazzle_home_programs_preview();
if (!$programs) {
    return;
}

$featured = $programs['featured'] ?? array();
$program_slug = kidazzle_get_program_base_slug();
?>

<section id="<?php echo esc_attr($program_slug); ?>" class="py-20 bg-brand-cream"
    data-section="<?php echo esc_attr($program_slug); ?>">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-4xl md:text-5xl font-bold text-brand-ink mb-4">
                <?php echo esc_html($programs['heading'] ?: 'Our Programs'); ?>
            </h2>
            <?php if (!empty($programs['subheading'])): ?>
                <p class="text-xl text-brand-ink max-w-3xl mx-auto">
                    <?php echo esc_html($programs['subheading']); ?>
                </p>
            <?php endif; ?>
        </div>

        <!-- Programs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
            <?php foreach ($featured as $program):
                $age_range = $program['age_range'] ?? '';
                $excerpt = $program['excerpt'] ?? '';
                $icon = $program['icon'] ?? 'fas fa-child';
                $url = $program['url'] ?? '#';
                ?>
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
                    data-program="<?php echo esc_attr(sanitize_title($program['title'])); ?>">
                    <div class="p-8">
                        <?php
                        $title_lower = strtolower($program['title']);
                        // Unsplash Image IDs for placeholders
                        $img_src = 'https://images.unsplash.com/photo-1587654780291-39c9404d746b?auto=format&fit=crop&w=800&q=80'; // Default (kids playing)
                    
                        if (strpos($title_lower, 'infant') !== false)
                            $img_src = 'https://images.unsplash.com/photo-1519689680058-324335c77eba?auto=format&fit=crop&w=800&q=80'; // Infant
                        elseif (strpos($title_lower, 'toddler') !== false)
                            $img_src = 'https://images.unsplash.com/photo-1544816155-12df9643f363?auto=format&fit=crop&w=800&q=80'; // Toddler
                        elseif (strpos($title_lower, 'preschool') !== false)
                            $img_src = 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=800&q=80'; // Preschool
                        elseif (strpos($title_lower, 'pre-k') !== false)
                            $img_src = 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=800&q=80'; // Pre-K
                        elseif (strpos($title_lower, 'vpk') !== false)
                            $img_src = 'https://images.unsplash.com/photo-1560785496-0887143d2c11?auto=format&fit=crop&w=800&q=80'; // VPK
                        elseif (strpos($title_lower, 'school') !== false)
                            $img_src = 'https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&w=800&q=80'; // School Age
                        ?>
                        <div class="h-48 mb-6 rounded-xl overflow-hidden relative">
                            <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($program['title']); ?>"
                                class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                        </div>

                        <h3 class="text-2xl font-bold text-brand-ink mb-2">
                            <?php echo esc_html($program['title']); ?>
                        </h3>
                        <?php if ($age_range): ?>
                            <div class="text-kidazzle-yellow font-semibold mb-4">
                                Ages <?php echo esc_html($age_range); ?>
                            </div>
                        <?php endif; ?>
                        <p class="text-brand-ink mb-6">
                            <?php echo esc_html($excerpt); ?>
                        </p>
                        <a href="<?php echo esc_url($url); ?>"
                            class="inline-block bg-kidazzle-teal text-white px-6 py-3 rounded-lg font-semibold hover:bg-kidazzle-teal/90 transition-colors"
                            aria-label="Learn more about <?php echo esc_attr($program['title']); ?>">
                            Learn More
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- View All CTA -->
        <?php if (!empty($programs['cta_link'])): ?>
            <div class="text-center">
                <a href="<?php echo esc_url($programs['cta_link']); ?>"
                    class="inline-block bg-brand-ink text-brand-cream px-8 py-4 rounded-lg font-bold text-lg hover:bg-brand-ink/90 transition-colors">
                    <?php echo esc_html($programs['cta_label'] ?: 'View All Programs'); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>