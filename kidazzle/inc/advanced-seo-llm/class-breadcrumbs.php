<?php
/**
 * Breadcrumbs Module
 * Handles frontend output and dashboard settings
 *
 * @package kidazzle_Excellence
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

class kidazzle_Breadcrumbs
{
    /**
     * Initialize
     */
    public function init()
    {
        // add_action('kidazzle_breadcrumbs', [$this, 'output']);
        add_action('wp_head', [$this, 'output_schema']);
        add_action('wp_ajax_kidazzle_save_breadcrumb_settings', [$this, 'ajax_save_settings']);
        add_action('wp_ajax_kidazzle_preview_breadcrumbs', [$this, 'ajax_preview_breadcrumbs']);
        add_action('wp_ajax_kidazzle_get_preview_posts', [$this, 'ajax_get_preview_posts']);
    }

    /**
     * Output Breadcrumbs HTML
     */
    public function output()
    {
        if (is_front_page()) {
            return;
        }

        $enabled = get_option('kidazzle_breadcrumbs_enabled', 'yes');
        if ($enabled !== 'yes') {
            return;
        }

        $items = $this->get_breadcrumb_items();
        
        echo '<nav class="kidazzle-breadcrumbs max-w-7xl mx-auto px-4 lg:px-6 py-4 text-sm text-gray-500" aria-label="Breadcrumb">';
        echo '<ol class="list-none p-0 inline-flex flex-wrap gap-2 items-center">';
        
        foreach ($items as $index => $item) {
            $is_last = $index === count($items) - 1;
            
            echo '<li class="flex items-center text-[10px] uppercase tracking-wider font-bold">';
            if ($index > 0) {
                echo '<i class="fa-solid fa-chevron-right text-[8px] text-gray-300 mx-2"></i>';
            }
            
            if ($is_last) {
                echo '<span class="text-kidazzle-blue" aria-current="page">' . esc_html($item['label']) . '</span>';
            } else {
                echo '<a href="' . esc_url($item['url']) . '" class="text-brand-ink/60 hover:text-kidazzle-blue transition-colors">' . esc_html($item['label']) . '</a>';
            }
            echo '</li>';
        }
        
        echo '</ol>';
        echo '</nav>';
    }

    /**
     * Output Schema JSON-LD
     */
    public function output_schema()
    {
        if (is_front_page()) {
            return;
        }

        $items = $this->get_breadcrumb_items();
        $schema_items = [];

        foreach ($items as $index => $item) {
            $schema_items[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['label'],
                'item' => $item['url']
            ];
        }

        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $schema_items
        ];

        echo '<script type="application/ld+json">' . wp_json_encode($schema) . '</script>' . "\n";
    }

    /**
     * Get Breadcrumb Items
     * @param int|null $post_id Optional post ID for preview
     * @return array
     */
    private function get_breadcrumb_items($post_id = null)
    {
        // If post_id is provided (Preview Mode), we simulate the environment
        if ($post_id) {
            $p = get_post($post_id);
            $post_type = get_post_type($post_id);
            $is_front_page = ($post_id == get_option('page_on_front'));
            $is_home = ($post_id == get_option('page_for_posts'));
            $is_singular = true; // For preview, we assume singular view of that post
        } else {
            // Normal Frontend Mode
            global $post;
            $p = $post;
            $post_type = get_post_type();
            $is_front_page = is_front_page();
            $is_home = is_home();
            $is_singular = is_singular();
        }

        $items = [];

        // Home
        $items[] = [
            'label' => get_option('kidazzle_breadcrumbs_home_text', 'Home'),
            'url' => home_url('/')
        ];

        if ($is_home) {
            $items[] = [
                'label' => 'Blog',
                'url' => get_post_type_archive_link('post')
            ];
        } elseif ($is_singular) {
            
            // CPT Archives
            if ($post_type !== 'page' && $post_type !== 'post') {
                $post_type_obj = get_post_type_object($post_type);
                if ($post_type_obj && $post_type_obj->has_archive) {
                    $items[] = [
                        'label' => $post_type_obj->labels->name,
                        'url' => get_post_type_archive_link($post_type)
                    ];
                }

                // Try to find a taxonomy for this CPT
                $taxonomies = get_object_taxonomies($post_type, 'objects');
                if ($taxonomies) {
                    foreach ($taxonomies as $tax) {
                        if ($tax->hierarchical && $tax->public) {
                            $terms = get_the_terms($p->ID, $tax->name);
                            if ($terms && !is_wp_error($terms)) {
                                $term = $terms[0]; // Get the first term
                                $term_link = get_term_link($term);
                                
                                if (!is_wp_error($term_link)) {
                                    $items[] = [
                                        'label' => $term->name,
                                        'url' => $term_link
                                    ];
                                    break; // Only show one taxonomy trail
                                }
                            }
                        }
                    }
                }
            } elseif ($post_type === 'post') {
                $items[] = [
                    'label' => 'Blog',
                    'url' => get_post_type_archive_link('post')
                ];
            }

            // Parents
            if ($p && $p->post_parent) {
                $ancestors = array_reverse(get_post_ancestors($p->ID));
                foreach ($ancestors as $ancestor) {
                    $items[] = [
                        'label' => get_the_title($ancestor),
                        'url' => get_permalink($ancestor)
                    ];
                }
            }

            if ($p) {
                $items[] = [
                    'label' => get_the_title($p),
                    'url' => get_permalink($p)
                ];
            }
        } elseif (is_archive() && !$post_id) {
            $items[] = [
                'label' => get_the_archive_title(),
                'url' => '' // Current page
            ];
        } elseif (is_search() && !$post_id) {
            $items[] = [
                'label' => 'Search Results for "' . get_search_query() . '"',
                'url' => ''
            ];
        } elseif (is_404() && !$post_id) {
            $items[] = [
                'label' => 'Page Not Found',
                'url' => ''
            ];
        }

        return $items;
    }

    /**
     * Render Settings Tab in Dashboard
     */
    public function render_settings()
    {
        $enabled = get_option('kidazzle_breadcrumbs_enabled', 'yes');
        $home_text = get_option('kidazzle_breadcrumbs_home_text', 'Home');
        ?>
        <div class="kidazzle-seo-card">
            <h2>Breadcrumbs Configuration</h2>
            <p>Manage how breadcrumbs appear on your site.</p>
            
            <table class="form-table">
                <tr>
                    <th scope="row">Enable Breadcrumbs</th>
                    <td>
                        <label>
                            <input type="checkbox" id="kidazzle_breadcrumbs_enabled" value="yes" <?php checked($enabled, 'yes'); ?>>
                            Show breadcrumbs on site
                        </label>
                    </td>
                </tr>
                <tr>
                    <th scope="row">Home Link Text</th>
                    <td>
                        <input type="text" id="kidazzle_breadcrumbs_home_text" value="<?php echo esc_attr($home_text); ?>" class="regular-text">
                        <p class="description">The text for the first link in the breadcrumb trail.</p>
                    </td>
                </tr>
            </table>

            <p class="submit">
                <button id="kidazzle-save-breadcrumbs" class="button button-primary">Save Settings</button>
            </p>
        </div>

        <div class="kidazzle-seo-card" style="margin-top: 20px;">
            <h2>🔍 Breadcrumbs Preview</h2>
            <p>Select a page type and then a specific page to preview.</p>
            
            <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 15px;">
                <select id="kidazzle-breadcrumb-type-select" style="min-width: 150px;">
                    <option value="">-- Select Type --</option>
                    <option value="location">Locations</option>
                    <option value="program">Programs</option>
                    <option value="page">Pages</option>
                    <option value="post">Blog Posts</option>
                </select>

                <select id="kidazzle-breadcrumb-preview-select" style="min-width: 250px;" disabled>
                    <option value="">-- Select Page --</option>
                </select>

                <button id="kidazzle-preview-breadcrumbs-btn" class="button button-secondary" disabled>Preview</button>
                <span id="kidazzle-breadcrumb-spinner" class="spinner"></span>
            </div>
            
            <div id="kidazzle-breadcrumb-preview-result" style="display: none; border: 1px solid #ddd; padding: 15px; background: #f9f9f9;">
                <h4>Visual Preview:</h4>
                <div id="kidazzle-breadcrumb-visual" style="padding: 10px; background: #fff; border: 1px solid #eee; margin-bottom: 15px;"></div>
                
                <h4>JSON-LD Schema Output:</h4>
                <pre id="kidazzle-breadcrumb-json" style="background: #2d2d2d; color: #fff; padding: 10px; overflow: auto; font-size: 12px;"></pre>
            </div>
        </div>

        <script>
        jQuery(document).ready(function($) {
            // Save Settings
            $('#kidazzle-save-breadcrumbs').on('click', function(e) {
                e.preventDefault();
                var btn = $(this);
                btn.prop('disabled', true).text('Saving...');

                $.post(ajaxurl, {
                    action: 'kidazzle_save_breadcrumb_settings',
                    enabled: $('#kidazzle_breadcrumbs_enabled').is(':checked') ? 'yes' : 'no',
                    home_text: $('#kidazzle_breadcrumbs_home_text').val()
                }, function(response) {
                    btn.prop('disabled', false).text('Save Settings');
                    if(response.success) {
                        alert('Settings saved!');
                    } else {
                        alert('Error saving settings.');
                    }
                });
            });

            // Load Posts on Type Change
            $('#kidazzle-breadcrumb-type-select').on('change', function() {
                var type = $(this).val();
                var target = $('#kidazzle-breadcrumb-preview-select');
                var btn = $('#kidazzle-preview-breadcrumbs-btn');
                
                target.html('<option value="">-- Select Page --</option>').prop('disabled', true);
                btn.prop('disabled', true);

                if(!type) return;

                $('#kidazzle-breadcrumb-spinner').addClass('is-active');

                $.post(ajaxurl, {
                    action: 'kidazzle_get_preview_posts',
                    post_type: type
                }, function(response) {
                    $('#kidazzle-breadcrumb-spinner').removeClass('is-active');
                    if(response.success) {
                        target.prop('disabled', false);
                        if (Object.keys(response.data).length === 0) {
                             target.append($('<option></option>').text('No posts found'));
                        } else {
                            $.each(response.data, function(id, title) {
                                target.append($('<option></option>').val(id).text(title));
                            });
                        }
                    } else {
                        alert('Error: ' + (response.data && response.data.message ? response.data.message : 'Unknown error'));
                    }
                }).fail(function(xhr, status, error) {
                    $('#kidazzle-breadcrumb-spinner').removeClass('is-active');
                    alert('Server Error: ' + error);
                });
            });

            // Enable Preview Button
            $('#kidazzle-breadcrumb-preview-select').on('change', function() {
                $('#kidazzle-preview-breadcrumbs-btn').prop('disabled', !$(this).val());
            });

            // Preview
            $('#kidazzle-preview-breadcrumbs-btn').on('click', function(e) {
                e.preventDefault();
                var id = $('#kidazzle-breadcrumb-preview-select').val();
                if(!id) return;
                
                var btn = $(this);
                btn.prop('disabled', true).text('Loading...');
                
                $.post(ajaxurl, {
                    action: 'kidazzle_preview_breadcrumbs',
                    post_id: id
                }, function(response) {
                    btn.prop('disabled', false).text('Preview');
                    if(response.success) {
                        $('#kidazzle-breadcrumb-preview-result').show();
                        $('#kidazzle-breadcrumb-visual').html(response.data.html);
                        $('#kidazzle-breadcrumb-json').text(JSON.stringify(response.data.json, null, 2));
                    } else {
                        alert('Error generating preview.');
                    }
                });
            });
        });
        </script>
        <?php
    }

    /**
     * AJAX: Save Settings
     */
    public function ajax_save_settings()
    {
        // Check nonce (we need to pass this from JS)
        // For now, at least check permissions
        if (!current_user_can('manage_options')) {
            wp_send_json_error();
        }

        update_option('kidazzle_breadcrumbs_enabled', sanitize_text_field($_POST['enabled']));
        update_option('kidazzle_breadcrumbs_home_text', sanitize_text_field($_POST['home_text']));

        wp_send_json_success();
    }

    /**
     * AJAX: Preview Breadcrumbs
     */
    public function ajax_preview_breadcrumbs()
    {
        // Ideally check nonce here too
        $post_id = intval($_POST['post_id']);
        if(!$post_id) wp_send_json_error();
        
        // Mock the global post for the preview generation
        global $post;
        $post = get_post($post_id);
        
        // Temporarily override is_singular etc if possible, but get_breadcrumb_items relies on global state
        // which is hard to fake perfectly in AJAX without complex mocking.
        // Instead, we will refactor get_breadcrumb_items to accept a post_id optionally.
        
        $items = $this->get_breadcrumb_items($post_id);
        
        // Generate HTML
        ob_start();
        echo '<nav class="kidazzle-breadcrumbs" aria-label="Breadcrumb"><ol class="list-none p-0 inline-flex flex-wrap gap-2 items-center">';
        foreach ($items as $index => $item) {
            $is_last = $index === count($items) - 1;
            echo '<li class="flex items-center">';
            if ($index > 0) echo '<span class="mx-2 text-gray-300">/</span>';
            if ($is_last) {
                echo '<span class="text-gray-900 font-medium">' . esc_html($item['label']) . '</span>';
            } else {
                echo '<a href="#" class="text-blue-600 hover:underline">' . esc_html($item['label']) . '</a>';
            }
            echo '</li>';
        }
        echo '</ol></nav>';
        $html = ob_get_clean();

        // Generate JSON
        $schema_items = [];
        foreach ($items as $index => $item) {
            $schema_items[] = [
                '@type' => 'ListItem',
                'position' => $index + 1,
                'name' => $item['label'],
                'item' => $item['url']
            ];
        }
        $json = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => $schema_items
        ];

        wp_send_json_success(['html' => $html, 'json' => $json]);
    }
    /**
     * AJAX: Get Posts for Preview Dropdown
     */
    public function ajax_get_preview_posts()
    {
        // Permission check
        if (!current_user_can('edit_posts')) {
            wp_send_json_error(['message' => 'Permission denied']);
        }

        $post_type = sanitize_text_field($_POST['post_type']);
        if (!$post_type) {
            wp_send_json_error(['message' => 'Missing post type']);
        }

        $posts = get_posts([
            'post_type' => $post_type,
            'posts_per_page' => 50, // Limit to 50 for performance
            'orderby' => 'title',
            'order' => 'ASC'
        ]);

        $data = [];
        foreach ($posts as $p) {
            $data[$p->ID] = $p->post_title;
        }

        wp_send_json_success($data);
    }
}
