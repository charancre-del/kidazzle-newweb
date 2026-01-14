<?php
/**
 * SEO Automations Bootstrap
 * Loads all SEO automation classes
 *
 * @package Kidazzle_Excellence
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Phase 1: Internal Linking
require_once __DIR__ . '/class-related-locations.php';
require_once __DIR__ . '/class-related-programs.php';
require_once __DIR__ . '/class-keyword-linker.php';
require_once __DIR__ . '/class-footer-city-links.php';

// Phase 2: Auto-Generated Pages
require_once __DIR__ . '/class-combo-page-generator.php';
require_once __DIR__ . '/class-combo-page-data.php';
require_once __DIR__ . '/class-combo-ai-generator.php';
require_once __DIR__ . '/class-combo-internal-links.php';
require_once __DIR__ . '/class-near-me-pages.php';

// Phase 3: Technical SEO
require_once __DIR__ . '/class-dynamic-titles.php';
require_once __DIR__ . '/class-canonical-enforcer.php';
require_once __DIR__ . '/class-author-tags.php';

// Phase 4: Analysis
require_once __DIR__ . '/class-link-equity-analyzer.php';

// Phase 5: Advanced
require_once __DIR__ . '/class-geographic-seo.php';
require_once __DIR__ . '/class-credential-badges.php';
require_once __DIR__ . '/class-entity-seo.php';
require_once __DIR__ . '/class-accessibility-seo.php';

/**
 * Register default options
 */
add_action('after_setup_theme', function() {
    // Set defaults if not already set
    $defaults = [
        'Kidazzle_seo_show_related_locations' => true,
        'Kidazzle_seo_link_programs_locations' => true,
        'Kidazzle_seo_enable_keyword_linking' => true,
        'Kidazzle_seo_show_footer_cities' => true,
        'Kidazzle_seo_enable_dynamic_titles' => true,
        'Kidazzle_seo_enable_canonical' => true,
        'Kidazzle_seo_trailing_slash' => true,
        'Kidazzle_seo_show_author_meta' => true,
        'Kidazzle_seo_show_author_box' => true,
        'Kidazzle_seo_show_credential_badges' => true,
        'Kidazzle_seo_enable_skip_nav' => true,
        'Kidazzle_seo_enable_focus_indicators' => true
    ];
    
    foreach ($defaults as $key => $default) {
        if (get_option($key) === false) {
            update_option($key, $default);
        }
    }
});

/**
 * Add SEO settings page
 */
add_action('admin_menu', function() {
    add_submenu_page(
        'Kidazzle-seo-dashboard',
        'SEO Automations',
        'SEO Automations',
        'manage_options',
        'Kidazzle-seo-automations',
        'Kidazzle_render_seo_settings'
    );
}, 20);

/**
 * Render settings page
 */
function Kidazzle_render_seo_settings() {
    if (isset($_POST['save_seo_settings']) && check_admin_referer('Kidazzle_seo_settings')) {
        $options = [
            'Kidazzle_seo_show_related_locations',
            'Kidazzle_seo_link_programs_locations',
            'Kidazzle_seo_enable_keyword_linking',
            'Kidazzle_seo_show_footer_cities',
            'Kidazzle_seo_enable_dynamic_titles',
            'Kidazzle_seo_enable_canonical',
            'Kidazzle_seo_trailing_slash',
            'Kidazzle_seo_show_author_meta',
            'Kidazzle_seo_show_author_box',
            'Kidazzle_seo_show_credential_badges',
            'Kidazzle_seo_enable_skip_nav',
            'Kidazzle_seo_enable_focus_indicators'
        ];
        
        foreach ($options as $opt) {
            update_option($opt, isset($_POST[$opt]) ? 1 : 0);
        }
        
        echo '<div class="notice notice-success"><p>Settings saved!</p></div>';
    }
    ?>
    <div class="wrap">
        <h1>🚀 SEO Automations</h1>
        
        <form method="post">
            <?php wp_nonce_field('Kidazzle_seo_settings'); ?>
            
            <h2>Internal Linking</h2>
            <table class="form-table">
                <tr>
                    <th>Related Locations</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_show_related_locations" 
                                <?php checked(get_option('Kidazzle_seo_show_related_locations')); ?>>
                            Show "Other Locations Near You" on location pages
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Related Programs</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_link_programs_locations" 
                                <?php checked(get_option('Kidazzle_seo_link_programs_locations')); ?>>
                            Auto-link programs ↔ locations
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Keyword Linking</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_enable_keyword_linking" 
                                <?php checked(get_option('Kidazzle_seo_enable_keyword_linking')); ?>>
                            Auto-link keywords in blog posts
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Footer City Links</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_show_footer_cities" 
                                <?php checked(get_option('Kidazzle_seo_show_footer_cities')); ?>>
                            Show city links in footer
                        </label>
                    </td>
                </tr>
            </table>
            
            <h2>Technical SEO</h2>
            <table class="form-table">
                <tr>
                    <th>Dynamic Titles</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_enable_dynamic_titles" 
                                <?php checked(get_option('Kidazzle_seo_enable_dynamic_titles')); ?>>
                            Use pattern-based title generation
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Canonical URLs</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_enable_canonical" 
                                <?php checked(get_option('Kidazzle_seo_enable_canonical')); ?>>
                            Enforce canonical URLs
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Trailing Slash</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_trailing_slash" 
                                <?php checked(get_option('Kidazzle_seo_trailing_slash')); ?>>
                            Enforce trailing slashes on URLs
                        </label>
                    </td>
                </tr>
            </table>
            
            <h2>E-E-A-T</h2>
            <table class="form-table">
                <tr>
                    <th>Author Meta</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_show_author_meta" 
                                <?php checked(get_option('Kidazzle_seo_show_author_meta')); ?>>
                            Add author meta tags
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Author Box</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_show_author_box" 
                                <?php checked(get_option('Kidazzle_seo_show_author_box')); ?>>
                            Show author box after posts
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Credential Badges</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_show_credential_badges" 
                                <?php checked(get_option('Kidazzle_seo_show_credential_badges')); ?>>
                            Show trust badges on location pages
                        </label>
                    </td>
                </tr>
            </table>
            
            <h2>Accessibility</h2>
            <table class="form-table">
                <tr>
                    <th>Skip Navigation</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_enable_skip_nav" 
                                <?php checked(get_option('Kidazzle_seo_enable_skip_nav')); ?>>
                            Add skip-to-content link
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>Focus Indicators</th>
                    <td>
                        <label>
                            <input type="checkbox" name="Kidazzle_seo_enable_focus_indicators" 
                                <?php checked(get_option('Kidazzle_seo_enable_focus_indicators')); ?>>
                            Enhanced keyboard focus indicators
                        </label>
                    </td>
                </tr>
            </table>
            
            <p class="submit">
                <input type="submit" name="save_seo_settings" class="button button-primary" value="Save Settings">
            </p>
        </form>
        
        <hr>
        
        <h2>Quick Links</h2>
        <ul>
            <li><a href="<?php echo admin_url('admin.php?page=Kidazzle-auto-pages'); ?>">Auto Pages Dashboard</a></li>
            <li><a href="<?php echo admin_url('admin.php?page=Kidazzle-keyword-linking'); ?>">Keyword Linking</a></li>
            <li><a href="<?php echo admin_url('admin.php?page=Kidazzle-title-patterns'); ?>">Title Patterns</a></li>
            <li><a href="<?php echo admin_url('admin.php?page=Kidazzle-link-equity'); ?>">Link Equity Report</a></li>
        </ul>
    </div>
    <?php
}

/**
 * Flush rewrite rules on activation
 */
add_action('after_switch_theme', function() {
    // Trigger rewrite rules to be flushed
    delete_option('rewrite_rules');
});
