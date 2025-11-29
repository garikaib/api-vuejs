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
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php');
        $base_url = $plugin_url . 'assets/rates-chart/';

        wp_register_script('zimpricecheck-rates-js', $base_url . 'assets/rates_chart.js', array(), '1.0.0', true);
        wp_enqueue_script('zimpricecheck-rates-js');

        wp_register_style('zimpricecheck-rates-chart', $base_url . 'assets/index.css', array(), '1.0.0');
        wp_enqueue_style('zimpricecheck-rates-chart');
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return "<div id='rates-chart-2024'></div>";
    }

    public function get_module_scripts()
    {
        return array('zimpricecheck-rates-js');
    }
}
