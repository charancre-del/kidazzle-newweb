<?php
/**
 * Template Name: Resources Page
 * Resources hub for parents and teachers
 * 
 * KIDazzle Child Care Theme
 * 
 * @package Kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<!-- Header / Hero Section -->
<div class="relative py-32 text-center overflow-hidden">
    <div class="absolute inset-0 z-0">
        <!-- Updated Hero Image: Children working with robotics/tech -->
        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=3840&q=100"
            alt="<?php esc_attr_e('Children engaged with technology and learning', 'kidazzle'); ?>"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-purple-900/60"></div>
    </div>
    <div class="relative z-10 container mx-auto px-4 text-white">
        <h1 class="text-5xl md:text-6xl font-extrabold mb-6">
            <?php esc_html_e('Parent & Teacher Resources', 'kidazzle'); ?></h1>
        <p class="text-xl md:text-2xl max-w-2xl mx-auto text-purple-100 drop-shadow-md">
            <?php esc_html_e('Tools, guides, and support for your journey with KIDazzle.', 'kidazzle'); ?></p>
    </div>
</div>

<div class="container mx-auto px-4 py-16">

    <!-- AI Innovation Feature -->
    <section class="mb-20">
        <div
            class="bg-white rounded-[2rem] shadow-xl overflow-hidden border border-slate-200 flex flex-col md:flex-row">
            <div class="md:w-1/2 p-10 flex flex-col justify-center">
                <span
                    class="text-purple-600 font-bold uppercase tracking-widest text-sm mb-2 block"><?php esc_html_e('Educational Technology', 'kidazzle'); ?></span>
                <h2 class="text-3xl font-bold text-slate-900 mb-4">
                    <?php esc_html_e('AI Lesson Plan Bot', 'kidazzle'); ?></h2>
                <p class="text-slate-600 mb-6 leading-relaxed">
                    <?php esc_html_e('Our innovative AI Lesson Plan Bot helps teachers create engaging, curriculum-aligned activities tailored to their students\' needs. It streamlines planning so educators can focus more on teaching and less on paperwork.', 'kidazzle'); ?>
                </p>
                <a href="<?php echo esc_url(home_url('/teacher-portal/')); ?>"
                    class="inline-block bg-purple-600 text-white font-bold py-3 px-8 rounded-xl hover:bg-purple-700 transition self-start"><?php esc_html_e('Access Teacher Tools', 'kidazzle'); ?></a>
            </div>
            <div class="md:w-1/2 bg-purple-50 flex items-center justify-center p-10">
                <i data-lucide="bot" class="w-32 h-32 text-purple-400"></i>
            </div>
        </div>
    </section>

    <!-- Quick Links / Forms Section -->
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-slate-900 mb-8 text-center">
            <?php esc_html_e('Quick Access Forms', 'kidazzle'); ?></h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 hover:shadow-lg transition group">
                <div
                    class="w-12 h-12 bg-white rounded-full flex items-center justify-center mb-4 text-blue-500 shadow-sm">
                    <i data-lucide="clipboard-list"></i></div>
                <h3 class="text-xl font-bold text-slate-900 mb-2"><?php esc_html_e('Enrollment Form', 'kidazzle'); ?>
                </h3>
                <p class="text-slate-500 text-sm mb-4">
                    <?php esc_html_e('Submit new enrollment details efficiently.', 'kidazzle'); ?></p>
                <a href="<?php echo esc_url(home_url('/enrollment/')); ?>"
                    class="text-blue-600 font-bold text-sm hover:underline"><?php esc_html_e('Go to Admissions', 'kidazzle'); ?>
                    &rarr;</a>
            </div>
            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 hover:shadow-lg transition group">
                <div
                    class="w-12 h-12 bg-white rounded-full flex items-center justify-center mb-4 text-green-500 shadow-sm">
                    <i data-lucide="check-square"></i></div>
                <h3 class="text-xl font-bold text-slate-900 mb-2">
                    <?php esc_html_e('Weekly Task Automation', 'kidazzle'); ?></h3>
                <p class="text-slate-500 text-sm mb-4">
                    <?php esc_html_e('Sign up for daily task notifications.', 'kidazzle'); ?></p>
                <a href="<?php echo esc_url(home_url('/teacher-portal/')); ?>"
                    class="text-green-600 font-bold text-sm hover:underline"><?php esc_html_e('View in Portal', 'kidazzle'); ?>
                    &rarr;</a>
            </div>
            <div class="bg-slate-50 p-8 rounded-2xl border border-slate-200 hover:shadow-lg transition group">
                <div
                    class="w-12 h-12 bg-white rounded-full flex items-center justify-center mb-4 text-red-500 shadow-sm">
                    <i data-lucide="alert-circle"></i></div>
                <h3 class="text-xl font-bold text-slate-900 mb-2"><?php esc_html_e('Report Absence', 'kidazzle'); ?>
                </h3>
                <p class="text-slate-500 text-sm mb-4">
                    <?php esc_html_e('Notify the center of a student or teacher absence.', 'kidazzle'); ?></p>
                <a href="<?php echo esc_url(home_url('/teacher-portal/')); ?>"
                    class="text-red-600 font-bold text-sm hover:underline"><?php esc_html_e('Submit Report', 'kidazzle'); ?>
                    &rarr;</a>
            </div>
        </div>
    </section>

    <!-- Blogs Section -->
    <section>
        <h2 class="text-3xl font-bold text-slate-900 mb-8 text-center">
            <?php esc_html_e('Latest from Our Blog', 'kidazzle'); ?></h2>

        <?php
        $blog_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 3,
            'ignore_sticky_posts' => true
        ));

        if ($blog_query->have_posts()): ?>
            <div class="grid md:grid-cols-3 gap-8">
                <?php while ($blog_query->have_posts()):
                    $blog_query->the_post();
                    $cat = get_the_category();
                    $cat_name = !empty($cat) ? $cat[0]->name : 'Blog';

                    // Assign random color theme based on ID for visual variety if no color set
                    $colors = ['purple', 'orange', 'cyan'];
                    $theme = $colors[$post->ID % 3];
                    ?>
                    <a href="<?php the_permalink(); ?>"
                        class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition cursor-pointer group">
                        <div
                            class="h-48 bg-<?php echo esc_attr($theme); ?>-100 flex items-center justify-center text-4xl relative overflow-hidden">
                            <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('medium_large', array('class' => 'w-full h-full object-cover')); ?>
                            <?php else: ?>
                                <!-- Fallback icon -->
                                <?php if ($theme == 'purple')
                                    echo '📚';
                                elseif ($theme == 'orange')
                                    echo '🍎';
                                else
                                    echo '🎨'; ?>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <h3
                                class="text-lg font-bold text-slate-900 mb-2 group-hover:text-<?php echo esc_attr($theme); ?>-600 transition-colors">
                                <?php the_title(); ?></h3>
                            <p class="text-slate-500 text-sm mb-4"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            <span
                                class="text-<?php echo esc_attr($theme); ?>-600 font-bold text-xs uppercase"><?php esc_html_e('Read More', 'kidazzle'); ?></span>
                        </div>
                    </a>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        <?php else: ?>
            <!-- Fallback Static Content if no posts -->
            <div class="grid md:grid-cols-3 gap-8">
                <!-- Blog Card 1 -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition cursor-pointer">
                    <div class="h-48 bg-purple-100 flex items-center justify-center text-4xl">📚</div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Early Literacy Tips</h3>
                        <p class="text-slate-500 text-sm mb-4">Simple ways to foster a love for reading at home.</p>
                        <span class="text-purple-600 font-bold text-xs uppercase">Read More</span>
                    </div>
                </div>
                <!-- Blog Card 2 -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition cursor-pointer">
                    <div class="h-48 bg-orange-100 flex items-center justify-center text-4xl">🍎</div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">Healthy Eating Habits</h3>
                        <p class="text-slate-500 text-sm mb-4">Encouraging nutritious choices for toddlers.</p>
                        <span class="text-orange-600 font-bold text-xs uppercase">Read More</span>
                    </div>
                </div>
                <!-- Blog Card 3 -->
                <div
                    class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-xl transition cursor-pointer">
                    <div class="h-48 bg-cyan-100 flex items-center justify-center text-4xl">🎨</div>
                    <div class="p-6">
                        <h3 class="text-lg font-bold text-slate-900 mb-2">The Power of Play</h3>
                        <p class="text-slate-500 text-sm mb-4">Why unstructured play is vital for brain development.</p>
                        <span class="text-cyan-600 font-bold text-xs uppercase">Read More</span>
                    </div>
                </div>
            </div>
        <?php endif; ?>

    </section>
</div>

<?php get_footer(); ?>