<?php
/**
 * The template part for displaying slider
 *
 * @package Travel Booking Agency
 * @subpackage travel_booking_agency
 * @since Travel Booking Agency 1.0
 */
?>
<div class="col-lg-4 col-md-4">
  <article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
    <div class="services-box mb-5">    
      <?php if(has_post_thumbnail() && get_theme_mod( 'travel_booking_agency_feature_image_hide',true) != '') { ?>
        <div class="service-image">
          <a href="<?php echo esc_url( get_permalink() ); ?>">
            <?php  the_post_thumbnail(); ?>
            <span class="screen-reader-text"><?php the_title(); ?></span>
          </a>
        </div>
      <?php }?>
      <div class="lower-box">
        <h2 class="pt-0"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
        <?php if(get_the_excerpt()) { ?>
          <p><?php $travel_booking_agency_excerpt = get_the_excerpt(); echo esc_html( travel_booking_agency_string_limit_words( $travel_booking_agency_excerpt, esc_attr(get_theme_mod('travel_booking_agency_post_excerpt_length','20')))); ?><?php echo esc_html( get_theme_mod('travel_booking_agency_button_excerpt_suffix','[...]') ); ?></p>
        <?php }?>
        <?php if ( get_theme_mod('travel_booking_agency_post_button_text','Read More') != '' ) {?>
          <div class="read-btn mt-4">
            <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" ><?php echo esc_html( get_theme_mod('travel_booking_agency_post_button_text',__( 'Read More','travel-booking-agency' )) ); ?><i class="far fa-arrow-right ms-2"></i><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('travel_booking_agency_post_button_text',__( 'Read More','travel-booking-agency' )) ); ?></span>
            </a>
          </div>
        <?php }?>
      </div>
    </div>
  </article>
</div>