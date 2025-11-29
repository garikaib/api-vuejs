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



// Initialize Core Plugin
require_once plugin_dir_path(__FILE__) . 'includes/Core/Plugin.php';
\Zimpricecheck\Core\Plugin::get_instance();
