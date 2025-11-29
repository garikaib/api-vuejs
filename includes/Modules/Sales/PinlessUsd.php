<?php
namespace ZimPriceCheck\Modules\Sales;

use ZimPriceCheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class PinlessUsd extends AbstractModule
{
    public function register_shortcodes()
    {
        add_shortcode('pinless-usd', array($this, 'render_shortcode'));
    }

    public function enqueue_scripts()
    {
        $plugin_dir = plugin_dir_path(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/pinless-usd/';
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/pinless-usd/';

        // Get plugin.js modification time
        $plugin_js_file = $plugin_dir . 'assets/plugin.js';
        $plugin_js_version = file_exists($plugin_js_file) ? '1.' . date('Y.Hi', filemtime($plugin_js_file)) : '1.0.0';

        // Get plugin.css modification time
        $plugin_css_file = $plugin_dir . 'assets/plugin.css';
        $plugin_css_version = file_exists($plugin_css_file) ? '1.' . date('Y.Hi', filemtime($plugin_css_file)) : '1.0.0';

        // Register and enqueue the JavaScript file.
        wp_register_script('zpc_pinless_js', $plugin_url . 'assets/plugin.js', array(), $plugin_js_version, true);
        wp_enqueue_script('zpc_pinless_js');

        // Register and enqueue the stylesheet.
        wp_register_style('zpc_pinless_css', $plugin_url . 'assets/plugin.css', array(), $plugin_css_version);
        wp_enqueue_style('zpc_pinless_css');
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return '<div id="pinless-usd"></div>';
    }

    public function get_module_scripts()
    {
        return array('zpc_pinless_js');
    }
}
