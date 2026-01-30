<?php
/**
 * Security Enhancements
 *
 * @package wimper-theme
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add security headers to HTTP response
 */
function wimper_security_headers()
{
    if (!is_admin()) {
        // Enforce HTTPS
        header('Strict-Transport-Security: max-age=31536000; includeSubDomains');

        // Prevent XSS
        header('X-XSS-Protection: 1; mode=block');

        // Prevent MIME type sniffing
        header('X-Content-Type-Options: nosniff');

        // Referrer Policy
        header('Referrer-Policy: no-referrer-when-downgrade');

        // Frame Options (prevent clickjacking)
        header('X-Frame-Options: SAMEORIGIN');

        // Permissions Policy (limit browser features)
        header('Permissions-Policy: geolocation=(), camera=(), microphone=()');
    }
}
add_action('send_headers', 'wimper_security_headers');

/**
 * Remove WordPress Version from head for security
 */
remove_action('wp_head', 'wp_generator');

/**
 * Remove detailed login error messages
 */
function wimper_login_errors()
{
    return 'Something went wrong. Please try again.';
}
add_filter('login_errors', 'wimper_login_errors');

/**
 * Disable XML-RPC (common attack vector)
 */
add_filter('xmlrpc_enabled', '__return_false');
