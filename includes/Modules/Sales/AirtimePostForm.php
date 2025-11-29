<?php
namespace Zimpricecheck\Modules\Sales;

use Zimpricecheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class AirtimePostForm extends AbstractModule
{
    public function register_shortcodes()
    {
        add_shortcode('zpc_usd_form', array($this, 'render_shortcode'));
    }

    public function enqueue_scripts()
    {
        $plugin_dir = plugin_dir_path(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/airtime-post-form/';
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/airtime-post-form/';

        // Get plugin.js modification time
        $plugin_js_file = $plugin_dir . 'assets/plugin.js';
        $plugin_js_version = file_exists($plugin_js_file) ? '1.' . date('Y.Hi', filemtime($plugin_js_file)) : '1.0.0';

        // Get plugin.css modification time
        $plugin_css_file = $plugin_dir . 'assets/plugin.css';
        $plugin_css_version = file_exists($plugin_css_file) ? '1.' . date('Y.Hi', filemtime($plugin_css_file)) : '1.0.0';

        wp_register_script('zpc_post_usd_form', $plugin_url . 'assets/plugin.js', array(), $plugin_js_version, true);
        wp_enqueue_script('zpc_post_usd_form');

        wp_register_style('zpc_usdform_css', $plugin_url . 'assets/plugin.css', array(), $plugin_css_version);
        wp_enqueue_style('zpc_usdform_css');
    }

    public function render_shortcode($atts)
    {
        // Check if this is the main query and not a secondary query
        if (!in_the_loop()) {
            return ''; // Exit early if not in the main loop
        }

        $dont_show = array(
            11702,
            3115,
            16373,
            16975,
        );

        // Check the conditions for when we should show the form
        if (!is_singular() || is_front_page() || is_home() || in_array(get_the_ID(), $dont_show)) {
            return ''; // Exit early if conditions not met
        }

        $this->enqueue_scripts();
        return '<div id="below-content-app"></div>';
    }

    public function get_module_scripts()
    {
        return array('zpc_post_usd_form');
    }
}
