<?php
/**
 * Single City Template
 *
 * A hyperlocal landing page template that aggregates nearby locations.
 *
 * @package Chroma_Excellence
 * @since 1.0.0
 */

get_header();

$intro_text = get_post_meta(get_the_ID(), 'city_intro_text', true);
$location_ids = get_post_meta(get_the_ID(), 'city_nearby_locations', true);
?>

<main id="primary" class="site-main">

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <!-- Hero Section -->
        <header class="entry-header alignfull"
            style="background-color: var(--wp--preset--color--primary); color: white; padding: 4rem 2rem; text-align: center;">
            <div class="wp-block-group__inner-container" style="max-width: 1200px; margin: 0 auto;">
                <?php the_title('<h1 class="entry-title" style="font-size: 3rem; margin-bottom: 1rem;">', '</h1>'); ?>
                <?php if ($intro_text): ?>
                    <div class="city-intro" style="font-size: 1.25rem; max-width: 800px; margin: 0 auto;">
                        <?php echo wp_kses_post($intro_text); ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <div class="entry-content" style="max-width: 1200px; margin: 4rem auto; padding: 0 2rem;">

            <!-- Main Content (Block Editor) -->
            <?php
            while (have_posts()):
                the_post();
                the_content();
            endwhile;
            ?>

            <!-- Nearby Locations Grid -->
            <?php if (!empty($location_ids) && is_array($location_ids)): ?>
                <section class="nearby-locations" style="margin-top: 4rem;">
                    <h2 style="text-align: center; margin-bottom: 2rem;">
                        <?php _e('Our Locations in This Area', 'chroma-excellence'); ?></h2>

                    <div class="locations-grid"
                        style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
                        <?php
                        $locations_query = new WP_Query([
                            'post_type' => 'location',
                            'post__in' => $location_ids,
                            'orderby' => 'post__in'
                        ]);

                        if ($locations_query->have_posts()):
                            while ($locations_query->have_posts()):
                                $locations_query->the_post();
                                $address = get_post_meta(get_the_ID(), 'location_address', true);
                                $city = get_post_meta(get_the_ID(), 'location_city', true);
                                $phone = get_post_meta(get_the_ID(), 'location_phone', true);
                                $image = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                                ?>
                                <div class="location-card"
                                    style="border: 1px solid #eee; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                    <?php if ($image): ?>
                                        <div class="location-image"
                                            style="height: 200px; background-image: url('<?php echo esc_url($image); ?>'); background-size: cover; background-position: center;">
                                        </div>
                                    <?php else: ?>
                                        <div class="location-image" style="height: 200px; background-color: #f0f0f0;"></div>
                                    <?php endif; ?>

                                    <div class="location-details" style="padding: 1.5rem;">
                                        <h3 style="margin-top: 0; font-size: 1.5rem;"><a href="<?php the_permalink(); ?>"
                                                style="text-decoration: none; color: inherit;"><?php the_title(); ?></a></h3>
                                        <p style="color: #666; margin-bottom: 1rem;">
                                            <?php echo esc_html($address); ?><br>
                                            <?php echo esc_html($city); ?>
                                        </p>
                                        <a href="tel:<?php echo esc_attr($phone); ?>" class="button"
                                            style="display: inline-block; padding: 0.5rem 1rem; background-color: var(--wp--preset--color--secondary); color: white; text-decoration: none; border-radius: 4px;"><?php echo esc_html($phone); ?></a>
                                        <a href="<?php the_permalink(); ?>" class="button"
                                            style="display: inline-block; padding: 0.5rem 1rem; background-color: var(--wp--preset--color--primary); color: white; text-decoration: none; border-radius: 4px; margin-left: 0.5rem;"><?php _e('View Details', 'chroma-excellence'); ?></a>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                </section>
            <?php endif; ?>

        </div>

    </article>

</main>

<?php
get_footer();
