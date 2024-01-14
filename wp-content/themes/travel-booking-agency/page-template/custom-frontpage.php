<?php
/**
 * The template for displaying home page.
 *
 * Template Name: Custom Home Page
 *
 * @package Travel Booking Agency
 */
get_header(); ?>

<main id="main" role="main">
  
  <?php if( get_theme_mod( 'travel_booking_agency_slider_hide_show') != '' || get_theme_mod('travel_booking_agency_slider_responsive') != ''){ ?>
    <div class="<?php if( get_theme_mod('travel_booking_agency_slider_width_options', 'Full Width') == 'Container Width'){ ?>container <?php }?>">
      <div class="slider-section">
        <section id="slider">
          <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000"> 
            <?php $travel_booking_agency_slider_pages = array();
              for ( $travel_booking_agency_count = 1; $travel_booking_agency_count <= 4; $travel_booking_agency_count++ ) {
                $travel_booking_agency_mod = intval( get_theme_mod( 'travel_booking_agency_slider_page' . $travel_booking_agency_count ));
                if ( 'page-none-selected' != $travel_booking_agency_mod ) {
                  $travel_booking_agency_slider_pages[] = $travel_booking_agency_mod;
                }
              }
              if( !empty($travel_booking_agency_slider_pages) ) :
                $travel_booking_agency_args = array(
                  'post_type' => 'page',
                  'post__in' => $travel_booking_agency_slider_pages,
                  'orderby' => 'post__in'
                );
                $travel_booking_agency_query = new WP_Query( $travel_booking_agency_args );
              if ( $travel_booking_agency_query->have_posts() ) :
                $i = 1;
            ?>     
            <div class="carousel-inner" role="listbox">
              <?php  while ( $travel_booking_agency_query->have_posts() ) : $travel_booking_agency_query->the_post(); ?>
              <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
                <div class="slider-bgimage">
                  <?php if(has_post_thumbnail()){ ?>
                    <?php the_post_thumbnail(); ?>
                  <?php } else {?>
                    <img src="<?php echo esc_url(get_template_directory_uri()) ?>/images/slider.png" alt="<?php echo esc_attr('Slider Image', 'travel-booking-agency'); ?>">
                  <?php }?>
                </div>
                <div class="carousel-caption">
                  <div class="inner_carousel">
                    <div class="slider-small-text">
                      <?php if( get_theme_mod('travel_booking_agency_slider_small_text',true) != ''){ ?>  
                        <span><?php echo esc_html(get_theme_mod('travel_booking_agency_slider_small_text')); ?></span>
                      <?php }?>
                    </div>
                    <?php if( get_theme_mod('travel_booking_agency_slider_title',true) != ''){ ?>
                      <h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
                    <?php }?>
                    <?php if( get_theme_mod('travel_booking_agency_slider_content',true) != ''){ ?>  
                      <p class="mb-3"><?php $travel_booking_agency_excerpt = get_the_excerpt(); echo esc_html( travel_booking_agency_string_limit_words( $travel_booking_agency_excerpt,esc_attr(get_theme_mod('travel_booking_agency_slider_excerpt_length',20))) ); ?></p>
                    <?php }?>  
                    <?php if(get_theme_mod('travel_booking_agency_slider_button',true) != '' || get_theme_mod('travel_booking_agency_slider_button_responsive',true) != '') {?>
                      <div class="read-btn">
                        <a href="<?php the_permalink(); ?>"><?php echo esc_html('View Tour', 'travel-booking-agency') ?><i class="far fa-arrow-right ms-2"></i><span class="screen-reader-text"><?php echo esc_html('View Tour', 'travel-booking-agency') ?></span></a>
                      </div>
                    <?php }?>   
                  </div>
                </div>
              </div>
              <?php $i++; endwhile; 
              wp_reset_postdata();?>
            </div>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php endif;
            endif;?>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-angle-left"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Previous','travel-booking-agency');?></span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-angle-right"></i></span><span class="screen-reader-text"><?php esc_html_e( 'Next','travel-booking-agency');?></span>
            </a>
          </div> 
        </section> 
      </div>
    </div>  
  <?php }?>

  <?php do_action( 'travel_booking_agency_before_popular_section' ); ?>

  <section id="popular-section" class="pb-5">
    <div class="container">
      <div class="popular-box-section pt-4">
        <div class="top-text pt-3 px-lg-0 px-md-0 px-2">
        <?php if (get_theme_mod('travel_booking_agency_section_title') != '') { ?>
          <h2><?php echo esc_html(get_theme_mod('travel_booking_agency_section_title')); ?></h2>
        <?php } ?>
          <div class="tab">
            <?php
              $category_post = get_theme_mod('travel_booking_agency_popular_number', '');
              for ( $j = 1; $j <= $category_post; $j++ ){ ?>
              <button class="tablinks" onclick="travel_booking_agency_project_tab(event, '<?php $main_id = get_theme_mod('travel_booking_agency_popular_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?> ')">
              <?php echo esc_html(get_theme_mod('travel_booking_agency_popular_text'.$j)); ?></button>
            <?php }?>
          </div>
        </div>
        <?php for ( $j = 1; $j <= $category_post; $j++ ){ ?>
          <div id="<?php $main_id = get_theme_mod('travel_booking_agency_popular_text'.$j); $tab_id = str_replace(' ', '-', $main_id); echo $tab_id; ?>"  class="tabcontent mt-3">
            <div class="row">
              <?php
              $travel_booking_agency_catData = get_theme_mod('travel_booking_agency_popular_category'.$j);
              if($travel_booking_agency_catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html( $travel_booking_agency_catData ,'travel-booking-agency')));
                $bgcolor = 1; ?>
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                  <div class="col-lg-4 col-md-4">
                    <div class="inner-box-content">
                      <?php if(has_post_thumbnail()) {?>
                        <div class="box">
                          <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                        </div>
                      <?php }?>
                      <?php if ( get_theme_mod('travel_booking_agency_latest_post_button_text','View Tour') != '') {?>
                        <div class="option">
                          <a href="<?php echo esc_url( get_permalink() );?>" class="blog-btn" title="<?php esc_attr_e( 'View Tour', 'travel-booking-agency' ); ?>"><?php echo esc_html( get_theme_mod('travel_booking_agency_latest_post_button_text',__('View Tour', 'travel-booking-agency')) ); ?><span class="screen-reader-text"><?php echo esc_html( get_theme_mod('travel_booking_agency_latest_post_button_text',__('View Tour', 'travel-booking-agency')) ); ?></span><i class="far fa-arrow-right ms-2"></i></a>
                        </div>
                      <?php }?>
                      <div class="position-relative">
                        <div class="heading-text">
                          <h3 class="p-0 text-center"><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
                        </div>
                      </div>
                      <div class="middle-text text-center"><h4><?php echo esc_html(get_theme_mod('travel_booking_agency_title_small'.$j)); ?></h4></div>
                      <div class="tags-section">
                        <?php if( get_post_meta($post->ID, 'spaecial_package_user', true) ) {?>
                          <span class="features-meta-fields2 text-center p-1">
                            <?php if( get_post_meta($post->ID, 'spaecial_package_user', true) ) {?>
                              <i class="fas fa-user"></i>
                              <span class="features"><?php echo esc_html(get_post_meta($post->ID,'spaecial_package_user',true)); ?></span>
                            <?php }?>
                          </span>
                        <?php }?>

                        <?php if( get_post_meta($post->ID, 'spaecial_package_location', true) ) {?>
                          <span class="features-meta-fields2 text-center">
                            <?php if( get_post_meta($post->ID, 'spaecial_package_location', true) ) {?>
                              <i class="fas fa-map-marker-alt"></i>
                              <span class="features"><?php echo esc_html(get_post_meta($post->ID,'spaecial_package_location',true)); ?></span>
                            <?php }?>
                          </span>
                        <?php }?>

                        <?php if( get_post_meta($post->ID, 'spaecial_package_days', true) ) {?>
                          <span class="features-meta-fields2 text-center p-1">
                            <?php if( get_post_meta($post->ID, 'spaecial_package_days', true) ) {?>
                              <i class="fas fa-clock"></i>
                              <span class="features"><?php echo esc_html(get_post_meta($post->ID,'spaecial_package_days',true)); ?></span>
                            <?php }?>
                          </span>
                        <?php }?>

                        <?php if( get_post_meta($post->ID, 'spaecial_package_ratings', true) ) {?>
                          <span class="features-meta-fields2 text-center p-1">
                            <?php if( get_post_meta($post->ID, 'spaecial_package_ratings', true) ) {?>
                              <i class="fas fa-smile"></i>
                              <span class="features"><?php echo esc_html(get_post_meta($post->ID,'spaecial_package_ratings',true)); ?></span>
                            <?php }?>
                          </span>
                        <?php }?>
                      </div>
                    </div>
                  </div>
                <?php if($bgcolor >= 6){ $bgcolor = 0; } $bgcolor++; endwhile;
                wp_reset_postdata();
                } ?>
              </div>
            </div>
        <?php }?>
      </div>
    </div>
  </section>

  <?php do_action( 'travel_booking_agency_after_product_section' ); ?>

  <div id="content-ma" class="py-5">
  	<div class="container">
    	<?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
  	</div>
  </div>
</main>

<?php get_footer(); ?>