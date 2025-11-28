<?php

/**
 * Displays the latest inflation chart.
 *
 * @return string The HTML code for displaying the chart.
 */
function show_latest_inflation_chart()
{
    // Enqueue scripts and styles
    wp_enqueue_script('zimpricecheck-inflation-js', plugin_dir_url(__FILE__) . 'index.fb52351e.js', array(), null, true);
    wp_enqueue_style('zimpricecheck-inflation-chart', plugin_dir_url(__FILE__) . 'index.8e6dcb3e.css', array(), null);

    // Return the HTML code for displaying the chart
    return "<div id='inflation-chart'></div>";
}
