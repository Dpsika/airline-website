<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package Travel Booking Agency
 */

if ( ! function_exists( 'travel_booking_agency_the_attached_image' ) ) :
/**
 * Prints the attached image with a link to the next attached image.
 */
function travel_booking_agency_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'travel_booking_agency_attachment_size', array( 1200, 1200 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids      = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    =>  1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID'
	) );

	// If there is more than 1 attachment in a gallery&hellip
	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		// get the URL of the next image attachment&hellip
		if ( $next_id )
			$next_attachment_url = get_attachment_link( $next_id );

		// or get the URL of the first image attachment.
		else
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);

	wp_reset_postdata();
}
endif;

/**
 * Returns true if a blog has more than 1 category
 */
function travel_booking_agency_categorized_blog() {
	if ( false === ( $travel_booking_agency_all_the_cool_cats = get_transient( 'travel_booking_agency_all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$travel_booking_agency_all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$travel_booking_agency_all_the_cool_cats = count( $travel_booking_agency_all_the_cool_cats );

		set_transient( 'travel_booking_agency_all_the_cool_cats', $travel_booking_agency_all_the_cool_cats );
	}

	if ( '1' != $travel_booking_agency_all_the_cool_cats ) {
		// This blog has more than 1 category so travel_booking_agency_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so travel_booking_agency_categorized_blog should return false
		return false;
	}
}

if ( ! function_exists( 'travel_booking_agency_the_custom_logo' ) ) :
	function travel_booking_agency_the_custom_logo() {
		the_custom_logo();
	}
endif;

/**
 * Flush out the transients used in travel_booking_agency_categorized_blog
 */
function travel_booking_agency_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'travel_booking_agency_all_the_cool_cats' );
}
add_action( 'edit_category', 'travel_booking_agency_category_transient_flusher' );
add_action( 'save_post',     'travel_booking_agency_category_transient_flusher' );

/*-- Custom metafield --*/
function travel_booking_agency_custom_job_field() {
  	add_meta_box( 'bn_meta', __( 'Township Meta Fields', 'travel-booking-agency' ), 'travel_booking_agency_meta_technology_callback', 'post', 'normal', 'high' );
}
if (is_admin()){
  	add_action('admin_menu', 'travel_booking_agency_custom_job_field');
}

function travel_booking_agency_meta_technology_callback( $post ) {
  	wp_nonce_field( basename( __FILE__ ), 'travel_booking_agency_technology_meta' );
  	$bn_stored_meta = get_post_meta( $post->ID );
	$spaecial_package_user = get_post_meta( $post->ID, 'spaecial_package_user', true );
	$spaecial_package_location = get_post_meta( $post->ID, 'spaecial_package_location', true );
  	$spaecial_package_days = get_post_meta( $post->ID, 'spaecial_package_days', true );
  	$spaecial_package_ratings = get_post_meta( $post->ID, 'spaecial_package_ratings', true );
  	?>
  	<div id="custom_meta_feilds">
	    <table id="list">
	      	<tbody id="the-list" data-wp-lists="list:meta">

 		        <tr id="meta-8">
	          	<td class="left">
	            	<?php esc_html_e( 'User :', 'travel-booking-agency' )?>
	          	</td>
	          	<td class="left">
	            	<input type="text" name="spaecial_package_user" id="spaecial_package_user" value="<?php echo esc_attr($spaecial_package_user); ?>" />
	          	</td>
	        	</tr>

		       	<tr id="meta-8">
	          	<td class="left">
	            	<?php esc_html_e( 'Location :', 'travel-booking-agency' )?>
	          	</td>
	          	<td class="left">
	            	<input type="text" name="spaecial_package_location" id="spaecial_package_location" value="<?php echo esc_attr($spaecial_package_location); ?>" />
	          	</td>
		        </tr>

		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Days :', 'travel-booking-agency' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="spaecial_package_days" id="spaecial_package_days" value="<?php echo esc_attr($spaecial_package_days); ?>" />
		          	</td>
		        </tr>

		        <tr id="meta-8">
		          	<td class="left">
		            	<?php esc_html_e( 'Ratings :', 'travel-booking-agency' )?>
		          	</td>
		          	<td class="left">
		            	<input type="text" name="spaecial_package_ratings" id="spaecial_package_ratings" value="<?php echo esc_attr($spaecial_package_ratings); ?>" />
		          	</td>
		        </tr>
	      	</tbody>
	    </table>
  	</div>
  	<?php
}

function travel_booking_agency_save( $post_id ) {
  	if (!isset($_POST['travel_booking_agency_technology_meta']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['travel_booking_agency_technology_meta']) ), basename(__FILE__))) {
      	return;
  	}
  	if (!current_user_can('edit_post', $post_id)) {
   		return;
  	}
  	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    	return;
  	} 

	if( isset( $_POST[ 'spaecial_package_user' ] ) ) {
    	update_post_meta( $post_id, 'spaecial_package_user', strip_tags( wp_unslash( $_POST[ 'spaecial_package_user' ]) ) );
  	}

  	if( isset( $_POST[ 'spaecial_package_location' ] ) ) {
    	update_post_meta( $post_id, 'spaecial_package_location', strip_tags( wp_unslash( $_POST[ 'spaecial_package_location' ]) ) );
  	}

  	if( isset( $_POST[ 'spaecial_package_days' ] ) ) {
    	update_post_meta( $post_id, 'spaecial_package_days', strip_tags( wp_unslash( $_POST[ 'spaecial_package_days' ]) ) );
  	}

  	if( isset( $_POST[ 'spaecial_package_ratings' ] ) ) {
    	update_post_meta( $post_id, 'spaecial_package_ratings', strip_tags( wp_unslash( $_POST[ 'spaecial_package_ratings' ]) ) );
  	}
}
add_action( 'save_post', 'travel_booking_agency_save' );