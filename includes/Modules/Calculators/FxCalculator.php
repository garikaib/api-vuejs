<?php
namespace Zimpricecheck\Modules\Calculators;

use Zimpricecheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class FxCalculator extends AbstractModule
{
    public function register_shortcodes()
    {
        add_shortcode('zim-fx-calc', array($this, 'render_shortcode'));
    }

    public function enqueue_scripts()
    {
        $plugin_dir = plugin_dir_path(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/fx-calc/assets/';
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/fx-calc/assets/';

        $js_file = $plugin_dir . 'fx-calc.js';
        $css_file = $plugin_dir . 'fx-calc.css';

        $js_version = file_exists($js_file) ? date('Y.m.d.H.i', filemtime($js_file)) : '1.0.0';
        $css_version = file_exists($css_file) ? date('Y.m.d.H.i', filemtime($css_file)) : '1.0.0';

        // Register and enqueue scripts.
        wp_register_script('zimpricecheck-fx-calc', $plugin_url . 'fx-calc.js', array(), $js_version, true);
        wp_enqueue_script('zimpricecheck-fx-calc');

        // Register and enqueue styles.
        wp_register_style('zimpricecheck-fx-calc-style', $plugin_url . 'fx-calc.css', array(), $css_version);
        wp_enqueue_style('zimpricecheck-fx-calc-style');
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return '<div id="zp-fx-calc"></div>';
    }

    public function get_module_scripts()
    {
        return array('zimpricecheck-fx-calc');
    }
}
