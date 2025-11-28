<?php
/**
 * Shortcode to display the USD form below content.
 *
 * @param array $atts Shortcode attributes.
 * @param string $content The content within the shortcode (not used here).
 * @return string The HTML for the form or an empty string if conditions not met.
 */
function zpc_usd_form_shortcode( $atts, $content = null ) {
   // Check if this is the main query and not a secondary query
    if ( !in_the_loop() ) {
        return ''; // Exit early if not in the main loop
    }
    $dont_show = array(
        11702,
        3115,
        16373,
        16975,
    );


	//Check the conditions for when we should show the form
    if ( !is_singular() || is_front_page() || is_home() || in_array(get_the_ID(), $dont_show)) {
        return ''; // Exit early if conditions not met
    }
    
    // Get plugin.js modification time
    $plugin_js_file = plugin_dir_path( __FILE__ ) . 'assets/plugin.js';
    $plugin_js_version = '1.' . date( 'Y.Hi', filemtime( $plugin_js_file ) );

    // Get plugin.css modification time
    $plugin_css_file = plugin_dir_path( __FILE__ ) . 'assets/plugin.css';
    $plugin_css_version = '1.' . date( 'Y.Hi', filemtime( $plugin_css_file ) );

    wp_register_script( 'zpc_post_usd_form', plugin_dir_url( __FILE__ ) . 'assets/plugin.js', array(), $plugin_js_version, true );
    wp_enqueue_script( 'zpc_post_usd_form' );
    wp_register_style( 'zpc_usdform_css', plugin_dir_url( __FILE__ ) . 'assets/plugin.css', array(), $plugin_css_version );
    wp_enqueue_style( 'zpc_usdform_css' );

    return '<div id="below-content-app"></div>';
}
add_shortcode( 'zpc_usd_form', 'zpc_usd_form_shortcode' );
