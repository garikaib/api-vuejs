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
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php');
        $base_url = $plugin_url . 'assets/fx-calc/';

        // Register and enqueue scripts.
        wp_enqueue_script('zimpricecheck-fx-calc1', $base_url . 'index.521592b0.js', array(), null, true);
        wp_enqueue_script('zimpricecheck-fx-calc2', $base_url . 'webfontloader.cd097671.js', array(), null, true);

        // Register and enqueue styles.
        wp_register_style('zimpricecheck-calc-style', $base_url . 'index.8ea85d8b.css', array(), null);
        wp_enqueue_style('zimpricecheck-calc-style');
    }

    public function render_shortcode($atts)
    {
        $this->enqueue_scripts();
        return "<div id='show-fx-calc'></div>";
    }

    public function get_module_scripts()
    {
        return array('zimpricecheck-fx-calc2'); // Based on original file, only fx-calc2 was in the module list?
        // Wait, let's check the original api-vuejs.php module list.
        // 'zimpricecheck-fx-calc2' is in the list. 'zimpricecheck-fx-calc1' is NOT.
    }
}
