<?php
/**
 * Plugin Name:         Zimpricecheck VueJS tools
 * Plugin URI:          https://zimpricecheck.com
 * Description:         Pulls the latest updates from our API and sets up necessary short codes for use with WordPress
 * Version:             3.0.8
 * Author:              Garikai Dzoma
 * Author URI:          http://zimpricecheck.com
 *
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

add_action('init', 'zpc_product_schema');
function zpc_product_schema()
{

    if (is_plugin_active('wordpress-seo/wp-seo.php')) {
//Include Product Schema to manipulate Yoast
        require_once __DIR__ . "/includes/product_schema.php";
        require_once __DIR__ . "/yoast/yoast.php";
    }
}
require_once plugin_dir_path(__FILE__) . 'options/options-page.php';
require_once plugin_dir_path(__FILE__) . "airtime-post-form/airtime.php";
require_once plugin_dir_path(__FILE__) . "zimloan/zimloan.php";


/**
 * Registers shortcodes.
 */


//Add below post form
// add_action('avada_before_additional_post_content', 'show_usd_below_post_airtime_form');
// add_filter('the_content', 'zp_send_wa_link');
/**
 * Adds module attribute to Vue scripts.
 *
 * @param string $tag The script tag.
 * @param string $handle The script handle.
 * @param string $src The script source.
 * @return string The modified script tag.
 */
function add_module_to_vue_scripts($tag, $handle, $src)
{
    $module_scripts = array(
        'zpc_post_usd_form',
    );
    if (in_array($handle, $module_scripts, true)) {
        $tag = '<script type="module" src="' . esc_url($src) . '"></script>';
    }
    return $tag;
}
add_filter('script_loader_tag', 'add_module_to_vue_scripts', 10, 3);

// Initialize Core Plugin
require_once plugin_dir_path(__FILE__) . 'includes/Core/Plugin.php';
\ZimPriceCheck\Core\Plugin::get_instance();
