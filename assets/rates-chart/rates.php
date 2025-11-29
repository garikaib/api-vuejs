<?php

/**
 * Registers and enqueues the required scripts and styles for the latest rates chart.
 *
 * @return string The HTML code to display the chart.
 */
function show_latest_rates_chart()
{
    wp_register_script('zimpricecheck-rates-js', plugin_dir_url(__FILE__) . 'assets/rates_chart.js', array(), '1.0.0', true);
    wp_enqueue_script('zimpricecheck-rates-js');

    wp_register_style('zimpricecheck-rates-chart', plugin_dir_url(__FILE__) . 'assets/index.css', array(), '1.0.0');
    wp_enqueue_style('zimpricecheck-rates-chart');

    return "<div id='rates-chart-2024'></div>";
}
