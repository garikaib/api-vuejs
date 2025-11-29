<?php
namespace ZimPriceCheck\Modules\Charts;

use ZimPriceCheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class InflationChart extends AbstractModule
{
    public function register_shortcodes()
    {
        add_shortcode('zim-inflation-chart', array($this, 'render_shortcode'));
    }

    public function enqueue_scripts()
    {
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php');
        $base_url = $plugin_url . 'assets/inflation-rates/';

        wp_enqueue_script('zimpricecheck-inflation-js', $base_url . 'index.fb52351e.js', array(), null, true);
        wp_enqueue_style('zimpricecheck-inflation-chart', $base_url . 'index.8e6dcb3e.css', array(), null);
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return "<div id='inflation-chart'></div>";
    }

    public function get_module_scripts()
    {
        return array('zimpricecheck-inflation-js');
    }
}
