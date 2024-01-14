<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="content-ma">
 *
 * @package Travel Booking Agency
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?> class="main-bodybox">
	<?php if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
	    do_action( 'wp_body_open' );
	}?>
	<?php if(get_theme_mod('travel_booking_agency_preloader_hide',false)!= '' || get_theme_mod('travel_booking_agency_responsive_preloader_hide',false) != ''){ ?>
    <?php if(get_theme_mod( 'travel_booking_agency_preloader_type','center-square') == 'center-square'){ ?>
	    <div class='preloader'>
		    <div class='preloader-squares'>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
				<div class='square'></div>
		    </div>
			</div>
    <?php }else if(get_theme_mod( 'travel_booking_agency_preloader_type') == 'chasing-square') {?>    
      <div class='preloader'>
				<div class='preloader-chasing-squares'>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
					<div class='square'></div>
				</div>
			</div>
    <?php }?>
	<?php }?>
<header role="banner">
	<a class="screen-reader-text skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'travel-booking-agency' ); ?><span class="screen-reader-text"><?php esc_html_e( 'Skip to content', 'travel-booking-agency' );?></span></a>

	<div id="header">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-12 text-lg-start text-center mb-lg-0 mb-md-0 mb-3">
					<div class="logo">
	     	 		<?php if ( has_custom_logo() ) : ?>
     	    		<div class="site-logo"><?php the_custom_logo(); ?></div>
          	<?php endif; ?>
	          <?php if( get_theme_mod( 'travel_booking_agency_site_title',true) != '') { ?>
	            <?php $blog_info = get_bloginfo( 'name' ); ?>
	            <?php if ( ! empty( $blog_info ) ) : ?>
		            <?php if ( is_front_page() && is_home() ) : ?>
		              <h1 class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		            <?php else : ?>
		              <p class="site-title mt-0 p-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
		            <?php endif; ?>
	            <?php endif; ?>
		        <?php }?>
		        <?php if( get_theme_mod( 'travel_booking_agency_site_tagline',false) != '') { ?>
	            <?php
	            $description = get_bloginfo( 'description', 'display' );
	            if ( $description || is_customize_preview() ) :
	            ?>
		            <p class="site-description">
		              <?php echo esc_html($description); ?>
		            </p>
	            <?php endif; ?>
		        <?php }?>
		    	</div>
		    </div>
	    	<div class="col-lg-10 align-self-center">
	    		<div class="header-menu-box">
		    		<div class="row">
		    			<div class="col-lg-12 align-self-center top-header-section">
		    				<?php if(get_theme_mod('travel_booking_agency_topbar_hide_show',false) == true || get_theme_mod('travel_booking_agency_hide_topbar_responsive',true) == true) {?>
			    				<div class="row">
			    					<div class="col-lg-3 col-md-3 mail-header text-center text-lg-start text-md-start align-self-center">
				              <?php if( get_theme_mod( 'travel_booking_agency_mail','' ) != '') { ?>
				                <div class="row">
				                  <div class="col-lg-2 col-md-3 col-4 text-lg-center text-md-center text-end align-self-center">
				                    <i class='far fa-envelope-open'></i>
				                  </div>
				                  <div class="col-lg-10 col-md-9 col-8 text-start mb-lg-0 mb-md-0 mb-4 align-self-center">
				                    <p class="diff-lay mb-0"><?php echo esc_html( get_theme_mod('travel_booking_agency_mail','') ); ?></p>
				                    <p class="same-lay mb-0"><a href="mailto:<?php echo esc_attr(get_theme_mod('travel_booking_agency_mail1',''));?>"><?php echo esc_html(get_theme_mod('travel_booking_agency_mail1',''));?></a></p>
				                  </div>
				                </div>
				              <?php }?>        
				            </div>
			    					<div class="col-lg-3 col-md-3 location-header align-self-center">
				              <?php if( get_theme_mod( 'travel_booking_agency_location','' ) != '') { ?>
				                <div class="row">
				                  <div class="col-lg-2 col-md-3 col-4 text-lg-center text-md-center text-end align-self-center">
				                    <i class="fas fa-location-arrow"></i>
				                  </div>
				                  <div class="col-lg-10 col-md-9 col-8 text-start mb-lg-0 mb-md-0 mb-4 align-self-center">
				                    <p class="diff-lay mb-0"><?php echo esc_html( get_theme_mod('travel_booking_agency_location','') ); ?></p>
				                    <p class="same-lay mb-0"><?php echo esc_html( get_theme_mod('travel_booking_agency_location1','') ); ?></p>
				                  </div>
				                </div>
				              <?php }?>
				            </div>
			    					<div class="col-lg-3 col-md-3 call-header text-center text-lg-start text-md-start align-self-center">
				              <?php if( get_theme_mod( 'travel_booking_agency_call','' ) != '' || get_theme_mod( 'travel_booking_agency_call1','' ) != '') { ?>
				                <div class="row">
				                  <div class="col-lg-2 col-md-3 col-4 text-lg-center text-md-center text-end align-self-center">
				                    <i class="fas fa-phone"></i>
				                  </div>
				                  <div class="col-lg-10 col-md-9 col-8 text-start mb-lg-0 mb-md-0 mb-4 align-self-center">
				                    <p class="diff-lay mb-0"><?php echo esc_html( get_theme_mod('travel_booking_agency_call','') ); ?></p>
				                    <p class="same-lay mb-0"><a href="tel:<?php echo esc_attr( get_theme_mod('travel_booking_agency_call1','') ); ?>"><?php echo esc_html(get_theme_mod('travel_booking_agency_call1',''));?></a></p>
				                  </div>
				                </div>
				              <?php }?>
				            </div>
		    						<div class="col-lg-3 col-md-3  socialicons align-self-center text-lg-end">
											<div class="social-media text-lg-end text-center">
												<?php if( get_theme_mod( 'travel_booking_agency_facebook_url' ) != '' && get_theme_mod('travel_booking_agency_facebook_icon') != 'None') { ?>
												<a href="<?php echo esc_url( get_theme_mod( 'travel_booking_agency_facebook_url','' ) ); ?>"><i class='fab fa-facebook-f'></i><span class="screen-reader-text"><?php esc_html_e( 'Facebook','travel-booking-agency' );?></span></a>
												<?php } ?>
												<?php if( get_theme_mod( 'travel_booking_agency_twitter_url' ) != '' && get_theme_mod('travel_booking_agency_twitter_icon') != 'None') { ?>
												<a href="<?php echo esc_url( get_theme_mod( 'travel_booking_agency_twitter_url','' ) ); ?>"><i class='fab fa-twitter'></i><span class="screen-reader-text"><?php esc_html_e( 'Twitter','travel-booking-agency' );?></span></a>
												<?php } ?>
												<?php if( get_theme_mod( 'travel_booking_agency_goggle_url' ) != '' && get_theme_mod('travel_booking_agency_goggle_icon') != 'None') { ?>
												<a href="<?php echo esc_url( get_theme_mod( 'travel_booking_agency_goggle_url','' ) ); ?>"><i class="fab fa-google"></i><span class="screen-reader-text"><?php esc_html_e( 'Goggle','travel-booking-agency' );?></span></a>
												<?php } ?>
												<?php if( get_theme_mod( 'travel_booking_agency_youtube_url' ) != '' && get_theme_mod('travel_booking_agency_youtube_icon') != 'None') { ?>
												<a href="<?php echo esc_url( get_theme_mod( 'travel_booking_agency_youtube_url','' ) ); ?>"><i class='fab fa-youtube'></i><span class="screen-reader-text"><?php esc_html_e( 'Youtube','travel-booking-agency' );?></span></a>
												<?php } ?>
											</div>
						        </div>
						      <?php } ?>
			    			</div>
		    			</div>
		    			<div class="col-lg-12 align-self-center menu-header">
		    				<div class="row">
		    					<div class="col-lg-11 col-md-6 col-6 align-self-center">
		    						<?php  ?>
									   	<div class="toggle-menu responsive-menu text-lg-start text-md-end text-center">
						           	<button role="tab" onclick="travel_booking_agency_menu_open()"><i class="<?php echo esc_attr(get_theme_mod('travel_booking_agency_responsive_open_menu_icon','fas fa-bars'));?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','travel-booking-agency'); ?></span></button>
						         	</div>
						         	<div id="menu-sidebar" class="nav side-menu">
						            <nav id="primary-site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'travel-booking-agency' ); ?>">
						              <?php 
						                wp_nav_menu( array( 
						                  'theme_location' => 'primary',
						                  'container_class' => 'main-menu-navigation clearfix' ,
						                  'menu_class' => 'clearfix',
						                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 p-0">%3$s</ul>',
						                  'fallback_cb' => 'wp_page_menu',
						                ) ); 
						              ?>
						              <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="travel_booking_agency_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('travel_booking_agency_responsive_close_menu_icon','fas fa-times'));?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','travel-booking-agency'); ?></span></a>
						            </nav>
						        	</div>
				      			<?php ?>
		    					</div>
		    					<div class="search-box col-lg-1 col-md-6 col-6 align-self-center text-lg-end text-md-start text-center">
							    	<div class="search-box d-inline-block">
				        			<button type="button" onclick="travel_booking_agency_search_show()"><i class="fas fa-search"></i></button>
					        	</div>
						        <div class="search-outer">
						          <div class="serach_inner">
						          	<?php get_search_form(); ?>
						          </div>
						        	<button type="button" class="closepop" onclick="travel_booking_agency_search_hide()">X</button>
						        </div>
							    </div>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
	    	</div>
			</div>
		</div>
	</div>	
</header>