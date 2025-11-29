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
require_once plugin_dir_path(__FILE__) . "rates-chart/rates.php";
require_once plugin_dir_path(__FILE__) . "inflation-rates/inflation.php";
// require_once plugin_dir_path(__FILE__) . "fx-calc/fx-calc.php"; // Migrated to ZimPriceCheck\Modules\FxCalculator
require_once plugin_dir_path(__FILE__) . "join-wa/join-wa.php";
require_once plugin_dir_path(__FILE__) . "telone-usd/telone-usd.php";
require_once plugin_dir_path(__FILE__) . "liquid-home/liquid-home.php";
require_once plugin_dir_path(__FILE__) . "usd-airtime/usd-airtime.php";
require_once plugin_dir_path(__FILE__) . "airtime-post-form/airtime.php";
require_once plugin_dir_path(__FILE__) . 'join-wa/join-wa.php';
require_once plugin_dir_path(__FILE__) . "pinless-usd/pinless-usd.php";
require_once plugin_dir_path(__FILE__) . "zesa-express/zesa-express.php";
require_once plugin_dir_path(__FILE__) . "zesa-usd-express/zesa-express.php";
require_once plugin_dir_path(__FILE__) . "netone-bundles/netone.php";
require_once plugin_dir_path(__FILE__) . "telone-zwl/telone-zwl.php";
require_once plugin_dir_path(__FILE__) . "zimloan/zimloan.php";
// require_once plugin_dir_path(__FILE__) . "omari-calculator/omari-calculator.php"; // Migrated to ZimPriceCheck\Modules\OmariCalculator


/**
 * Registers shortcodes.
 */

add_shortcode('zim-rates-chart', 'show_latest_rates_chart');
add_shortcode('zim-inflation-chart', 'show_latest_inflation_chart');
// add_shortcode('zim-fx-calc', 'show_rates_calculator'); // Migrated
add_shortcode('telone-usd', 'show_telone_usd_cart');
add_shortcode('lt-sales', 'show_liquid_home_cart');
add_shortcode('usd-airtime-sales', 'show_usd_airtime_cart');
add_shortcode('pinless-usd', 'show_pinless_usd');
add_shortcode('zesaexpress', 'show_zesaexpress');
add_shortcode('netone-bundles', 'show_netone_bundles');
add_shortcode('telone-form', 'show_telone_zwl_cart');
add_shortcode('zesa_usd', 'show_zesausdexpress');

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
        'zimpricecheck-rates-js',
        'zimpricecheck-inflation-js',
        // 'zimpricecheck-fx-calc2', // Migrated
        'zp-send-wa-js',
        'zpc_telone_usd_js',
        'zpc_telone_zwl_js',
        'zpc_lt_cart_js',
        'zpc_usdcat_js',
        'zpc_post_usd_form',
        'zpc_pinless_js',
        'netone_bundles_js',
        'zpc_zesausdexpress_js',
        // 'omari-calculator-script', // Migrated
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
