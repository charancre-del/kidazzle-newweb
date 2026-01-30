<?php
/**
 * Legacy options helpers (works without ACF)
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
        exit;
}

/**
 * Global settings helper
 */
function wimper_get_global_setting($key, $default = '')
{
        $defaults = array(
                'global_phone' => '',
                'global_email' => '',
                'global_tour_email' => '',
                'global_address' => '',
                'global_city' => '',
                'global_state' => 'GA',
                'global_zip' => '',
                'global_facebook_url' => '',
                'global_instagram_url' => '',
                'global_linkedin_url' => '',
                'global_seo_default_title' => get_bloginfo('name'),
                'global_seo_default_description' => get_bloginfo('description'),
                'global_logo' => '',
        );

        $settings = get_option('wimper_global_settings', array());
        $value = $settings[$key] ?? get_option($key, $default);

        if ('' === $value && isset($defaults[$key])) {
                $value = $defaults[$key];
        }

        return apply_filters('wimper_global_setting', $value, $key, $settings);
}

/**
 * Global Phone Helper
 */
function wimper_global_phone()
{
        return wimper_get_global_setting('global_phone', '');
}

/**
 * Global Email Helper
 */
function wimper_global_email()
{
        return wimper_get_global_setting('global_email', '');
}

/**
 * Global Tour Email Helper
 */
function wimper_global_tour_email()
{
        return wimper_get_global_setting('global_tour_email', wimper_global_email());
}

/**
 * Global Full Address Helper
 */
function wimper_global_full_address()
{
        $address = wimper_get_global_setting('global_address', '');
        $city = wimper_get_global_setting('global_city', '');
        $state = wimper_get_global_setting('global_state', 'GA');
        $zip = wimper_get_global_setting('global_zip', '');

        if (!$address) {
                return '';
        }

        return trim(sprintf(
                '%s, %s, %s %s',
                $address,
                $city ?: '',
                $state ?: 'GA',
                $zip ?: ''
        ));
}

/**
 * Global Facebook URL
 */
function wimper_global_facebook_url()
{
        return wimper_get_global_setting('global_facebook_url', '');
}

/**
 * Global Instagram URL
 */
function wimper_global_instagram_url()
{
        return wimper_get_global_setting('global_instagram_url', '');
}

/**
 * Global LinkedIn URL
 */
function wimper_global_linkedin_url()
{
        return wimper_get_global_setting('global_linkedin_url', '');
}

/**
 * Global SEO Default Title
 */
function wimper_global_seo_default_title()
{
        return wimper_get_global_setting('global_seo_default_title', get_bloginfo('name'));
}

/**
 * Global SEO Default Description
 */
function wimper_global_seo_default_description()
{
        return wimper_get_global_setting('global_seo_default_description', get_bloginfo('description'));
}
