<?php
/**
 * @package Travel Booking Agency
 * @subpackage travel-booking-agency
 * @since travel-booking-agency 1.0
 * Setup the WordPress core custom header feature.
 *
 * @uses travel_booking_agency_header_style()
*/

function travel_booking_agency_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'travel_booking_agency_custom_header_args', array(
		'default-text-color' => 'fff',
		'header-text' 	     =>	false,
		'width'              => 1400,
		'height'             => 70,
		'flex-height'        => true,
	    'flex-width'         => true,
		'wp-head-callback'   => 'travel_booking_agency_header_style',
	) ) );

}

add_action( 'after_setup_theme', 'travel_booking_agency_custom_header_setup' );

if ( ! function_exists( 'travel_booking_agency_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see travel_booking_agency_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'travel_booking_agency_header_style' );
function travel_booking_agency_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$travel_booking_agency_custom_css = "
        .header-menu-box{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: cover;
		}		
		";
	   	wp_add_inline_style( 'travel-booking-agency-basic-style', $travel_booking_agency_custom_css );
	endif;
}
endif; // travel_booking_agency_header_style
