<?php
/**
 * Plugin Name:         Zimpricecheck VueJS tools
 * Plugin URI:          https://zimpricecheck.com
 * Description:         A modular suite of VueJS-based tools, calculators, charts, and sales forms for WordPress, powered by the Zimpricecheck API.
 * Version:             4.0.0
 * Author:              Garikai Dzoma
 * Author URI:          http://zimpricecheck.com
 *
 *
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}



/**
 * Registers shortcodes.
 */


//Add below post form
// add_action('avada_before_additional_post_content', 'show_usd_below_post_airtime_form');
// add_filter('the_content', 'zp_send_wa_link');

// Initialize Core Plugin
require_once plugin_dir_path(__FILE__) . 'includes/Core/Plugin.php';
\Zimpricecheck\Core\Plugin::get_instance();
