<?php
namespace Zimpricecheck\Modules\Charts;

use Zimpricecheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class RatesChart extends AbstractModule
{
    public function register_shortcodes()
    {
        add_shortcode('zim-rates-chart', array($this, 'render_shortcode'));
    }

    public function enqueue_scripts()
    {
        $plugin_dir = plugin_dir_path(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/rates-chart/';
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/rates-chart/';

        $js_file = $plugin_dir . 'rates-chart.js';
        $css_file = $plugin_dir . 'rates-chart.css';

        $js_version = file_exists($js_file) ? date('Y.m.d.H.i', filemtime($js_file)) : '1.0.0';
        $css_version = file_exists($css_file) ? date('Y.m.d.H.i', filemtime($css_file)) : '1.0.0';

        wp_register_script('zimpricecheck-rates-js', $plugin_url . 'rates-chart.js', array(), $js_version, true);
        wp_enqueue_script('zimpricecheck-rates-js');

        wp_register_style('zimpricecheck-rates-chart', $plugin_url . 'rates-chart.css', array(), $css_version);
        wp_enqueue_style('zimpricecheck-rates-chart');
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return '<div id="rates-chart"></div>';
    }

    public function get_module_scripts()
    {
        return array('zimpricecheck-rates-js');
    }
}
