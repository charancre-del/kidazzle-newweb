<?php
/**
 * Security Headers
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add security headers to HTTP response
 */
function kidazzle_security_headers()
{
    if (headers_sent()) {
        return;
    }

    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');

    // HSTS - Uncomment when SSL is fully configured and tested
    // header( 'Strict-Transport-Security: max-age=31536000; includeSubDomains' );
}
add_action('send_headers', 'kidazzle_security_headers');
