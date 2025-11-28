<?php

/**
 * Registers and enqueues the WhatsApp send link JavaScript and CSS, and optionally adds the send link
 * to the end of the post content if the post type is "post".
 *
 * @param string $content The post content.
 * @return string The post content with the WhatsApp send link added, if applicable.
 */
function zp_send_wa_link($content)
{
  //Hacky but lets' check if we are the main loop or not https://wordpress.stackexchange.com/questions/162747/the-content-and-is-main-query
    if ( !in_the_loop() ) {
        return $content;
    }
    // Register and enqueue the JavaScript file.
    wp_register_script('zp-send-wa-js', plugin_dir_url(__FILE__) . 'index.413c2c27.js', true);
    wp_enqueue_script('zp-send-wa-js');

    // Register and enqueue the CSS file.
    wp_register_style(
        'zp-send-wa-css', // handle name
        plugin_dir_url(__FILE__) . 'index.dc168957.css', // the URL of the stylesheet
    );
    wp_enqueue_style('zp-send-wa-css');

    // If the post type is "post" and the following condition is true, add the WhatsApp send link to the end of the content.
    if (is_singular('post') && false) {
        $content = $content . "<div id='wa-subscribe'></div>";
    }

    return $content;
}
