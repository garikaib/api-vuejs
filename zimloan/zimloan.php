<?php
/**
 * Shortcode to display the ZimLoan promotion banner.
 *
 * @param array  $atts Shortcode attributes (not used here).
 * @param string $content The content within the shortcode (not used here).
 * @return string The HTML for the banner, or an empty string if conditions are not met.
 */
function zpc_zimloan_banner_shortcode( $atts, $content = null ) {
   // Check if this is the main query and not a secondary query
    if ( !in_the_loop() ) {
         return ''; // Exit early if not in the main loop
    }
    
    if ( ! is_singular() || is_front_page() ) {
		return '';
	}

    // Use esc_url() for the URL and wp_kses_post() for post content that includes the HTML.
	$banner_url  = esc_url( 'https://zimloan.com/i/dfknsaOn' );
    $image_url = esc_url('https://test.crystalcred.co.zw/wp-content/uploads/2024/08/zimloan.png');

	$banner_html = sprintf(
		'<div style="%s">
        <img src="%s" alt="%s" style="%s"/>
        <h1 style="%s">%s</h1>
        <p style="%s">%s</p>
        <a href="%s" style="%s" rel="nofollow" target="_blank">%s</a>
        <p style="%s">%s</p>
      </div>',
		// Div container Styles
		'background-color: #f0f0f0; padding: 20px; text-align: center; font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;',
        // Image src
		$image_url,
        // Image alt
		esc_attr__( 'ZimLoan Logo', 'your-text-domain' ),
		// Image Styles
		'max-width: 100%; height: auto; margin-bottom: 20px',
        // H1 Styles
		'color: #008000; font-size: 36px; margin-bottom: 10px',
        // H1 Text
		esc_html__( 'Get Your Loan in 5 Minutes!', 'your-text-domain' ),
		// Paragraph Styles
		'font-size: 24px; margin-bottom: 20px; color: #333',
		// Paragraph Text
		esc_html__( 'Quick, Easy, and Secure Financial Solutions', 'your-text-domain' ),
		// Button Link
		$banner_url,
		// Button Styles
		'background-color: #ffd700; color: #008000; padding: 15px 30px; text-decoration: none; font-size: 20px; font-weight: bold; border-radius: 5px; display: inline-block;',
		// Button Text
		esc_html__( 'Apply Now!', 'your-text-domain' ),
		// Bottom paragraph
		'font-size: 18px; margin-top: 20px; color: #666',
		// Bottom Paragraph
		esc_html__( 'No hidden fees • Competitive rates • Instant approval', 'your-text-domain' )
	);

	return wp_kses_post( $banner_html );

}
//add_shortcode( 'zpc_zimloan_banner', 'zpc_zimloan_banner_shortcode' );
