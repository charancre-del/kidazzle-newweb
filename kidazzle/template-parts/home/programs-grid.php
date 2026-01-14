<?php
/**
 * Template Part: Programs at a Glance Grid
 * 
 * @package kidazzle
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-8">
    <div class="md:col-span-3 px-2">
        <h2 class="text-4xl font-extrabold text-slate-900"><?php esc_html_e('Programs at a', 'kidazzle'); ?> <span
                class="text-red-500"><?php esc_html_e('Glance', 'kidazzle'); ?></span></h2>
    </div>

    <!-- Infants & Toddlers -->
    <a href="<?php echo esc_url(home_url('/programs/')); ?>"
        class="module-card group relative rounded-[2.5rem] overflow-hidden bg-white h-72 shadow-sm border border-slate-100">
        <img src="https://images.unsplash.com/photo-1555252333-9f8e92e65df9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            alt="<?php esc_attr_e('Infants and Toddlers', 'kidazzle'); ?>"
            class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-90">
        <div class="absolute inset-0 bg-gradient-to-t from-red-900/80 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-8 text-white">
            <h3 class="text-2xl font-bold mb-1"><?php esc_html_e('Infants & Toddlers', 'kidazzle'); ?></h3>
            <p class="text-red-100 text-sm font-medium"><?php esc_html_e('6 weeks - 24 months', 'kidazzle'); ?></p>
        </div>
    </a>

    <!-- Preschool & Pre-K -->
    <a href="<?php echo esc_url(home_url('/programs/')); ?>"
        class="module-card group relative rounded-[2.5rem] overflow-hidden bg-white h-72 shadow-sm border border-slate-100">
        <img src="https://images.unsplash.com/photo-1587654780291-39c940483713?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            alt="<?php esc_attr_e('Preschool and Pre-K', 'kidazzle'); ?>"
            class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-90">
        <div class="absolute inset-0 bg-gradient-to-t from-yellow-900/80 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-8 text-white">
            <h3 class="text-2xl font-bold mb-1"><?php esc_html_e('Preschool & Pre-K', 'kidazzle'); ?></h3>
            <p class="text-yellow-100 text-sm font-medium"><?php esc_html_e('2 years - 5 years', 'kidazzle'); ?></p>
        </div>
    </a>

    <!-- After School & Camp -->
    <a href="<?php echo esc_url(home_url('/programs/')); ?>"
        class="module-card group relative rounded-[2.5rem] overflow-hidden bg-white h-72 shadow-sm border border-slate-100">
        <img src="https://images.unsplash.com/photo-1571210862729-78a52d3779a2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
            alt="<?php esc_attr_e('After School and Camp', 'kidazzle'); ?>"
            class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110 opacity-90">
        <div class="absolute inset-0 bg-gradient-to-t from-purple-900/80 to-transparent"></div>
        <div class="absolute bottom-0 left-0 p-8 text-white">
            <h3 class="text-2xl font-bold mb-1"><?php esc_html_e('After School & Camp', 'kidazzle'); ?></h3>
            <p class="text-purple-100 text-sm font-medium"><?php esc_html_e('5 years - 12 years', 'kidazzle'); ?></p>
        </div>
    </a>
</div>