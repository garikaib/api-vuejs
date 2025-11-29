<?php

/**
 * Registers and enqueues the necessary scripts and styles for displaying the USD airtime cart.
 *
 * @return string The HTML mount point for for displaying the USD airtime cart.
 */

function show_usd_airtime_cart()
{
    wp_register_script('zpc_usdcat_js', plugin_dir_url(__FILE__) . 'assets/index.c14cf232.js', array(), '1.0.0', true);
    wp_enqueue_script('zpc_usdcat_js');

    wp_register_style('zpc_usdcat_css', plugin_dir_url(__FILE__) . 'assets/index.a6c8e3b2.css', array(), '1.0.0');
    wp_enqueue_style('zpc_usdcat_css');

    return '<div id="usd-airtime-sales"></div>';
}
