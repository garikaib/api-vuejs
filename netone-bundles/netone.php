<?php
/**
 * Display NetOne Bundles.
 *
 * Registers and enqueues the required scripts and styles for the NetOne Bundles.
 *
 * @return string HTML markup for displaying the NetOne Bundles.
 */
function show_netone_bundles()
{
    // Get plugin.js modification time
    $plugin_js_file = plugin_dir_path(__FILE__) . 'assets/plugin.js';
    $plugin_js_version = '1.' . date('Y.Hi', filemtime($plugin_js_file));

    // Get plugin.css modification time
    $plugin_css_file = plugin_dir_path(__FILE__) . 'assets/plugin.css';
    $plugin_css_version = '1.' . date('Y.Hi', filemtime($plugin_css_file));

    // Register and enqueue the JavaScript file.
    wp_register_script('netone_bundles_js', plugin_dir_url(__FILE__) . 'assets/plugin.js', array(), $plugin_js_version, true);
    wp_enqueue_script('netone_bundles_js');

    // Register and enqueue the stylesheet.
    wp_register_style('netone_bundles_css', plugin_dir_url(__FILE__) . 'assets/plugin.css', array(), $plugin_css_version);
    wp_enqueue_style('netone_bundles_css');

    // Return the HTML markup for displaying NetOne Bundles form.
    return '<div id="netone-bundles"></div>';
}
