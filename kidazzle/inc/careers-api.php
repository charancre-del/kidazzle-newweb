<?php
/**
 * Careers API Handler
 *
 * Fetches and parses job listings from Acquire4Hire.
 *
 * @package kidazzle_Excellence
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Fetch careers data from external source
 *
 * @return array Array of job data ['title', 'location', 'url', 'type']
 */
function kidazzle_get_careers()
{
    // Check for cached data
    $cached_jobs = get_transient('kidazzle_careers_data');
    if (false !== $cached_jobs) {
        return $cached_jobs;
    }

    $url = 'https://app.acquire4hire.com/careers/list.json?id=4668';

    // Fetch data with timeout
    $response = wp_remote_get($url, array(
        'timeout' => 5,
        'headers' => array(
            'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
        ),
    ));

    if (is_wp_error($response)) {
        return array(); // Return empty array on error
    }

    $body = wp_remote_retrieve_body($response);
    if (empty($body)) {
        return array();
    }

    // Parse HTML
    $jobs = array();
    $dom = new DOMDocument();

    // Suppress warnings for malformed HTML
    libxml_use_internal_errors(true);
    $dom->loadHTML($body);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);
    $job_nodes = $xpath->query("//div[contains(@class, 'job')]");

    foreach ($job_nodes as $node) {
        $title_node = $xpath->query(".//div[contains(@class, 'job1')]//a//h2", $node)->item(0);
        $link_node = $xpath->query(".//div[contains(@class, 'job1')]//a", $node)->item(0);
        $location_node = $xpath->query(".//div[contains(@class, 'job2')]//div", $node)->item(0);

        if ($title_node && $link_node) {
            $title = trim($title_node->textContent);
            $url = $link_node->getAttribute('href');
            $location = $location_node ? trim($location_node->textContent) : 'Alpharetta, GA';

            // Clean up location (remove extra spaces/commas if needed)
            $location = trim($location, " \t\n\r\0\x0B,");

            $jobs[] = array(
                'title' => $title,
                'location' => $location,
                'type' => 'Full Time', // Default as type isn't in the feed
                'url' => $url,
            );
        }
    }

    // Cache for 1 hour
    if (!empty($jobs)) {
        set_transient('kidazzle_careers_data', $jobs, HOUR_IN_SECONDS);
    }

    return $jobs;
}
