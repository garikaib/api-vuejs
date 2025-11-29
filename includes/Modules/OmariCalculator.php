<?php
namespace ZimPriceCheck\Modules;

use ZimPriceCheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class OmariCalculator extends AbstractModule
{
    public function register_shortcodes()
    {
        add_shortcode('omari-calculator', array($this, 'render_shortcode'));
    }

    public function enqueue_scripts()
    {
        // Calculate the root URL of the plugin
        $plugin_url = plugin_dir_url(dirname(dirname(__DIR__)) . '/api-vuejs.php');

        // Register styles
        wp_register_style(
            'omari-calculator-style',
            $plugin_url . 'omari-calculator/assets/dist/omari-calculator.css',
            array(),
            '1.0.0'
        );

        // Register scripts
        wp_register_script(
            'omari-calculator-script',
            $plugin_url . 'omari-calculator/assets/dist/omari-calculator.js',
            array(),
            '1.0.0',
            true
        );

        wp_enqueue_style('omari-calculator-style');
        wp_enqueue_script('omari-calculator-script');
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return '<div id="omari-calculator"></div>';
    }

    public function get_module_scripts()
    {
        return array('omari-calculator-script');
    }
}
