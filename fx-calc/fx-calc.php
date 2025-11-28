<?php
/**
 * Display foreign exchange rates calculator.
 *
 * @return string HTML content.
 */
function show_rates_calculator()
{
    // Register and enqueue scripts.
    wp_enqueue_script('zimpricecheck-fx-calc1', plugin_dir_url(__FILE__) . 'index.521592b0.js', array(), null, true);
    wp_enqueue_script('zimpricecheck-fx-calc2', plugin_dir_url(__FILE__) . 'webfontloader.cd097671.js', array(), null, true);

    // Register and enqueue styles.
    wp_register_style('zimpricecheck-calc-style', plugin_dir_url(__FILE__) . 'index.8ea85d8b.css', array(), null);
    wp_enqueue_style('zimpricecheck-calc-style');

    // Return HTML content.
    return "<div id='show-fx-calc'></div>";
}
