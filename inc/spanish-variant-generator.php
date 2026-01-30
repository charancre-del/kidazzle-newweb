<?php
/**
 * Spanish Variant Generator
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Detect current language
 * 
 * @return string 'en' or 'es'
 */
function wimper_detect_current_language()
{
    // Check if Polylang or WPML is active
    if (function_exists('pll_current_language')) {
        return pll_current_language();
    }

    // Fallback: Check for 'lang' query param (useful for testing without plugin)
    if (isset($_GET['lang']) && $_GET['lang'] === 'es') {
        return 'es';
    }

    return 'en';
}

/**
 * Get alternate language URL
 * 
 * @param string $target_lang Target language code ('es' or 'en')
 * @return string URL of the alternate language version
 */
function wimper_get_alternate_url($target_lang = 'es')
{
    // If using Polylang/WPML
    if (function_exists('pll_the_languages')) {
        $translations = pll_the_languages(array('raw' => 1));
        if (isset($translations[$target_lang]['url'])) {
            return $translations[$target_lang]['url'];
        }
    }

    // Fallback: Simple query param toggle
    $current_url = home_url(add_query_arg(array(), $wp->request));
    return add_query_arg('lang', $target_lang, $current_url);
}

/**
 * Render Language Switcher
 * 
 * Outputs a simple language switcher button.
 */
function wimper_render_language_switcher()
{
    $current_lang = wimper_detect_current_language();
    $target_lang = ($current_lang === 'en') ? 'es' : 'en';
    $alternate_url = wimper_get_alternate_url($target_lang);
    $label = ($target_lang === 'es') ? 'Español' : 'English';
    $flag = ($target_lang === 'es') ? '🇪🇸' : '🇺🇸';

    ?>
    <a href="<?php echo esc_url($alternate_url); ?>" class="wimper-lang-switcher"
        aria-label="Switch to <?php echo esc_attr($label); ?>">
        <span class="text-xl"><?php echo $flag; ?></span>
        <span class="hidden md:inline ml-2 text-sm font-medium"><?php echo esc_html($label); ?></span>
    </a>
    <?php
}
