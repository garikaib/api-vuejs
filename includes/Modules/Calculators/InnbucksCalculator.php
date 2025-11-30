<?php
namespace Zimpricecheck\Modules\Calculators;

use Zimpricecheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class InnbucksCalculator extends AbstractModule
{
    public function register_shortcodes()
    {
        add_shortcode('innbucks-calculator', array($this, 'render_shortcode'));
    }

    public function enqueue_scripts()
    {
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/innbucks-calculator/';

        // Register and enqueue the JavaScript file.
        wp_register_script('innbucks-calculator-js', $plugin_url . 'innbucks-calculator.js', array(), '1.0.0', true);
        wp_enqueue_script('innbucks-calculator-js');

        // Register and enqueue the stylesheet.
        wp_register_style('innbucks-calculator-css', $plugin_url . 'innbucks-calculator.css', array(), '1.0.0');
        wp_enqueue_style('innbucks-calculator-css');
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return '<div id="innbucks-calculator"></div>';
    }

    public function get_module_scripts()
    {
        return array('innbucks-calculator-js');
    }
}
