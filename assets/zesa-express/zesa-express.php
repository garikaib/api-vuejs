<?php
/**
 * Display TelOne USD cart.
 *
 * Registers and enqueues the required scripts and styles for the TelOne USD cart.
 *
 * @return string HTML markup for displaying the TelOne USD cart.
 */
function show_zesaexpress()
{
    // Get plugin.js modification time
    $plugin_js_file = plugin_dir_path(__FILE__) . 'assets/plugin.js';
    $plugin_js_version = '1.' . date('Y.Hi', filemtime($plugin_js_file));

    // Get plugin.css modification time
    $plugin_css_file = plugin_dir_path(__FILE__) . 'assets/plugin.css';
    $plugin_css_version = '1.' . date('Y.Hi', filemtime($plugin_css_file));

    // Register and enqueue the JavaScript file.
    wp_register_script('zpc_zesaexpress_js', plugin_dir_url(__FILE__) . 'assets/plugin.js', array(), $plugin_js_version, true);
    wp_enqueue_script('zpc_zesaexpress_js');

    // Register and enqueue the stylesheet.
    wp_register_style('zpc_zesaexpress_css', plugin_dir_url(__FILE__) . 'assets/plugin.css', array(), $plugin_css_version);
    wp_enqueue_style('zpc_zesaexpress_css');

    // Return the HTML markup for displaying ZESA Express form
    return '<div id="zesa-express"></div>';
/*
return '<div style="background-color: #FBD38D; border-left: 4px solid #FB923C; color: #C05621; padding: 16px;" role="alert">
<p style="font-weight: bold;">ZESA Token sales temporarily unavailable!</p>
<p>We are currently doing a system upgrade and as a result ZESA Token sales are not available. We are sorry for the  inconvenience. Please check again later.</p>
</div>
</p>
<p>Here you can buy ZESA Tokens for your loved ones or yourself? You can pay using PayPal, EFT, Visa/MasterCard, MasterPass, Mobicred, Zapper,Scode or Snapscan and the ZESA token will be sent to your desired number. To buy a ZESA Token please perform the following steps.</p>
<p>'; */
}
