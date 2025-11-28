<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class ZP_Omari_Calculator
{
    public function __construct()
    {
        add_shortcode('omari-calculator', array($this, 'render_shortcode'));
        add_action('wp_enqueue_scripts', array($this, 'register_scripts'));
    }

    public function register_scripts()
    {
        // Register styles
        wp_register_style(
            'omari-calculator-style',
            plugins_url('assets/dist/assets/index-YUW8ao_m.css', __FILE__),
            array(),
            '1.0.0'
        );

        // Register scripts
        // Note: The script is a module, so we need to handle that via the script_loader_tag filter in the main plugin file
        wp_register_script(
            'omari-calculator-script',
            plugins_url('assets/dist/assets/index-CLlZpZCn.js', __FILE__),
            array(),
            '1.0.0',
            true
        );
    }

    public function render_shortcode($atts)
    {
        // Enqueue assets only when shortcode is used
        wp_enqueue_style('omari-calculator-style');
        wp_enqueue_script('omari-calculator-script');

        return '<div id="app"></div>';
    }
}

new ZP_Omari_Calculator();
