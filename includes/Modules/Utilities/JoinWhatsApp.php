<?php
namespace ZimPriceCheck\Modules\Utilities;

use ZimPriceCheck\Core\AbstractModule;

if (!defined('ABSPATH')) {
    exit;
}

class JoinWhatsApp extends AbstractModule
{
    public function register_shortcodes()
    {
        // This module uses a filter on the_content instead of a shortcode
        add_filter('the_content', array($this, 'add_wa_link'));
    }

    public function enqueue_scripts()
    {
        $plugin_url = plugin_dir_url(dirname(dirname(dirname(__DIR__))) . '/api-vuejs.php') . 'assets/join-wa/';

        // Register and enqueue the JavaScript file.
        wp_register_script('zp-send-wa-js', $plugin_url . 'index.413c2c27.js', array(), '1.0.0', true);
        wp_enqueue_script('zp-send-wa-js');

        // Register and enqueue the CSS file.
        wp_register_style('zp-send-wa-css', $plugin_url . 'index.dc168957.css', array(), '1.0.0');
        wp_enqueue_style('zp-send-wa-css');
    }

    public function add_wa_link($content)
    {
        // Check if we are in the main loop
        if (!in_the_loop()) {
            return $content;
        }

        $this->enqueue_scripts();

        // If the post type is "post" and the following condition is true, add the WhatsApp send link to the end of the content.
        // Keeping original logic: is_singular('post') && false
        if (is_singular('post') && false) {
            $content = $content . "<div id='wa-subscribe'></div>";
        }

        return $content;
    }

    public function get_module_scripts()
    {
        return array('zp-send-wa-js');
    }
}
