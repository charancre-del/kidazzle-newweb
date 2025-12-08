<?php
/**
 * Monthly SEO Cron Job
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add Monthly Cron Interval
 */
function kidazzle_add_monthly_cron_interval( $schedules ) {
	$schedules['monthly'] = array(
		'interval' => 30 * DAY_IN_SECONDS,
		'display'  => __( 'Once Monthly', 'kidazzle-theme' ),
	);
	return $schedules;
}
add_filter( 'cron_schedules', 'kidazzle_add_monthly_cron_interval' );

/**
 * Schedule Monthly SEO Event on Theme Activation
 */
function kidazzle_activate_monthly_seo_cron() {
	if ( ! wp_next_scheduled( 'kidazzle_monthly_seo_event' ) ) {
		wp_schedule_event( time(), 'monthly', 'kidazzle_monthly_seo_event' );
	}
}
add_action( 'after_switch_theme', 'kidazzle_activate_monthly_seo_cron' );

/**
 * Unschedule on Theme Deactivation
 */
function kidazzle_deactivate_monthly_seo_cron() {
	$timestamp = wp_next_scheduled( 'kidazzle_monthly_seo_event' );
	if ( $timestamp ) {
		wp_unschedule_event( $timestamp, 'kidazzle_monthly_seo_event' );
	}
}
add_action( 'switch_theme', 'kidazzle_deactivate_monthly_seo_cron' );

/**
 * Monthly SEO Callback
 * Pings Google and Bing with sitemap URL
 */
function kidazzle_monthly_seo_callback() {
	if ( defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) {
		error_log( '[Kidazzle SEO Cron] Monthly SEO event executed at ' . current_time( 'mysql' ) );
	}

	$sitemap_url = home_url( '/?sitemap=xml' );

	// Ping Google
	wp_remote_get( 'https://www.google.com/ping?sitemap=' . urlencode( $sitemap_url ), array(
		'timeout'     => 5,
		'blocking'    => false,
		'sslverify'   => false,
	) );

	// Ping Bing
	wp_remote_get( 'https://www.bing.com/ping?sitemap=' . urlencode( $sitemap_url ), array(
		'timeout'     => 5,
		'blocking'    => false,
		'sslverify'   => false,
	) );
}
add_action( 'kidazzle_monthly_seo_event', 'kidazzle_monthly_seo_callback' );
