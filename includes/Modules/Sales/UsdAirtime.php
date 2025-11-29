<?php
namespace ZimPriceCheck\Modules\Sales;

use ZimPriceCheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class UsdAirtime extends AbstractModule
{
    public function register_shortcodes()
    {
        add_shortcode('usd-airtime-sales', array($this, 'render_shortcode'));
    }

    public function enqueue_scripts()
    {
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/usd-airtime/';

        wp_register_script('zpc_usdcat_js', $plugin_url . 'assets/index.c14cf232.js', array(), '1.0.0', true);
        wp_enqueue_script('zpc_usdcat_js');

        wp_register_style('zpc_usdcat_css', $plugin_url . 'assets/index.a6c8e3b2.css', array(), '1.0.0');
        wp_enqueue_style('zpc_usdcat_css');
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return '<div id="usd-airtime-sales"></div>';
    }

    public function get_module_scripts()
    {
        return array('zpc_usdcat_js');
    }
}
