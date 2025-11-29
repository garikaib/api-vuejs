<?php
/**
 * Display TelOne USD cart.
 *
 * Registers and enqueues the required scripts and styles for the TelOne USD cart.
 *
 * @return string HTML markup for displaying the TelOne USD cart.
 */
function show_zesausdexpress()
{
    // Get plugin.js modification time
    $plugin_js_file = plugin_dir_path(__FILE__) . 'assets/plugin.js';
    $plugin_js_version = '1.' . date('Y.Hi', filemtime($plugin_js_file));

    // Get plugin.css modification time
    $plugin_css_file = plugin_dir_path(__FILE__) . 'assets/plugin.css';
    $plugin_css_version = '1.' . date('Y.Hi', filemtime($plugin_css_file));

    // Register and enqueue the JavaScript file.
    wp_register_script('zpc_zesausdexpress_js', plugin_dir_url(__FILE__) . 'assets/plugin.js', array(), $plugin_js_version, true);
    wp_enqueue_script('zpc_zesausdexpress_js');

    // Register and enqueue the stylesheet.
    wp_register_style('zpc_zesausdexpress_css', plugin_dir_url(__FILE__) . 'assets/plugin.css', array(), $plugin_css_version);
    wp_enqueue_style('zpc_zesausdexpress_css');

    // Return the HTML markup for displaying ZESA Express form
    return '<div id="zesa-usd-express"></div>';

}
