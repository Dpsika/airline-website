<?php
//about theme info
add_action( 'admin_menu', 'travel_booking_agency_gettingstarted' );
function travel_booking_agency_gettingstarted() {    	
	add_theme_page( esc_html__('Get Started', 'travel-booking-agency'), esc_html__('Get Started', 'travel-booking-agency'), 'edit_theme_options', 'travel_booking_agency_guide', 'travel_booking_agency_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function travel_booking_agency_admin_theme_style() {
   wp_enqueue_style('travel-booking-agency-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/getstart.css');
   wp_enqueue_script('tabs', esc_url(get_template_directory_uri()) . '/inc/dashboard/js/tab.js');
}
add_action('admin_enqueue_scripts', 'travel_booking_agency_admin_theme_style');

//guidline for about theme
function travel_booking_agency_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'travel-booking-agency' );
?>

<div class="wrapper-info">  
    <div class="tab-sec">
		<div class="tab">
			<div class="logo">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/logo.png" alt="" />
			</div>
			<button role="tab" class="tablinks home" onclick="travel_booking_agency_openCity(event, 'tc_index')"><?php esc_html_e( 'Free Theme Information', 'travel-booking-agency' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="travel_booking_agency_openCity(event, 'tc_pro')"><?php esc_html_e( 'Premium Theme Information', 'travel-booking-agency' ); ?></button>
		  	<button role="tab" class="tablinks" onclick="travel_booking_agency_openCity(event, 'tc_create')"><?php esc_html_e( 'Theme Support', 'travel-booking-agency' ); ?></button>				
		</div>

		<div  id="tc_index" class="tabcontent">
			<h2><?php esc_html_e( 'Welcome to Travel Booking Agency Theme', 'travel-booking-agency' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
			<hr>
			<div class="info-link">
				<a href="<?php echo esc_url( TRAVEL_BOOKING_AGENCY_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'travel-booking-agency' ); ?></a>
				<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'travel-booking-agency'); ?></a>
				<a class="get-pro" href="<?php echo esc_url( TRAVEL_BOOKING_AGENCY_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'travel-booking-agency'); ?></a>
			</div>
			<div class="col-tc-6">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/screenshot.png" alt="" />
			</div>
			<div class="col-tc-6">
				<P><?php esc_html_e( 'The Travel Booking WordPress Theme is the ultimate solution for travel agencies and tour operators looking to streamline their booking process and create a visually stunning online platform. This theme comes with comprehensive features and customizable options and offers an exceptional booking experience for travelers. Designed specifically for the travel industry, the Travel Booking WordPress Theme offers advanced booking functionality that allows visitors to search, select, and book travel services seamlessly. The theme integrates with leading travel plugins, enabling real-time availability of flights, accommodations, tours, and more. The intuitive booking system provides a user-friendly interface for travelers to customize their itineraries, select preferred dates and destinations, and complete secure online transactions. This enhances the user experience and simplifies the booking process, resulting in higher conversion rates for travel agencies. In addition to its robust booking features, this theme offers a range of customization options to tailor the website to the agency unique brand and style. With multiple pre-designed templates and layouts, agencies can showcase their travel packages, destinations, and services in a visually appealing manner. The drag-and-drop page builder feature makes it effortless to create custom pages without any coding knowledge. The Travel Booking WordPress Theme also provides customizable color schemes, fonts, and layouts, allowing agencies to create a captivating online presence that reflects their brand identity.', 'travel-booking-agency' ); ?></P>
			</div>
    	</div>

		<div id="tc_pro" class="tabcontent">
			<h3><?php esc_html_e( 'Travel Booking Agency Theme Information', 'travel-booking-agency' ); ?></h3>
			<hr>
			<div class="pro-image">
				<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/dashboard/images/resize.png" alt="" />
			</div>
			<div class="info-link-pro">
				<p><a href="<?php echo esc_url( TRAVEL_BOOKING_AGENCY_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Buy Now', 'travel-booking-agency' ); ?></a></p>
				<p><a href="<?php echo esc_url( TRAVEL_BOOKING_AGENCY_LIVE_DEMO ); ?>" target="_blank"> <?php esc_html_e( 'Live Demo', 'travel-booking-agency' ); ?></a></p>
				<p><a href="<?php echo esc_url( TRAVEL_BOOKING_AGENCY_PRO_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Pro Documentation', 'travel-booking-agency' ); ?></a></p>
			</div>
			<div class="col-pro-5">
				<h4><?php esc_html_e( 'Travel Booking Agency Pro Theme', 'travel-booking-agency' ); ?></h4>
				<P><?php esc_html_e( 'The Free Travel Agency WordPress Theme is a fantastic option for travel agencies looking to establish a stunning online presence without breaking the bank. The theme comes with all the necessary features to help you create a professional website and offers a compelling platform to showcase travel destinations, packages, and services. This theme provides a user-friendly interface that makes it easy for travel agencies to create a professional website even without extensive coding knowledge. The intuitive design and layout options allow agencies to highlight their unique offerings and create an immersive experience for their visitors. The Free Travel Agency WordPress Theme also ensures responsiveness, ensuring that the website looks and functions flawlessly on various devices, including desktops, tablets, and mobile phones.
					In addition to its aesthetic appeal, this theme offers practical features specifically tailored to the needs of travel agencies. It includes built-in search functionality that enables visitors to explore and book travel packages directly from the website. The theme also supports integration with popular travel plugins, allowing agencies to showcase real-time flight information, hotel availability, and interactive maps. These features enhance the user experience and streamline the booking process for potential travelers. Furthermore, the Free Travel Agency WordPress Theme is optimized for search engines, helping agencies improve their online visibility and attract more organic traffic.', 'travel-booking-agency' ); ?></P>		
			</div>
			<div class="col-pro-6">				
				<h4><?php esc_html_e( 'Theme Features', 'travel-booking-agency' ); ?></h4>
				<ul>
					<li><?php esc_html_e( 'Theme Options using Customizer API', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Responsive design', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Favicon, Logo, title, and tagline customization', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Advanced Color options', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( '100+ Font Family Options', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Background Image Option', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Simple Menu Option', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Additional section for products', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Enable-Disable options on All sections', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Home Page setting for different sections', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Advance Slider with unlimited slides', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Partner Section', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Promotional Banner Section for Products', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Separate Newsletter Section', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Text and call to action button for each slide', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Pagination option', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Custom CSS option', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Translations Ready', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Customizable Home Page', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Full-Width Template', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Footer Widgets & Editor Style', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Banner & Post Type Plugin Functionality', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Post type', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Woo Commerce Compatible', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Multiple Inner Page Templates', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Product Sliders', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Slider', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Contact page template', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Contact Widget', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Advance Social Media Feature', 'travel-booking-agency' ); ?></li>
					<li><?php esc_html_e( 'Testimonial Listing With Shortcode', 'travel-booking-agency' ); ?></li>
				</ul>				
			</div>
		</div>	

		<div id="tc_create" class="tabcontent">
			<h3><?php esc_html_e( 'Support', 'travel-booking-agency' ); ?></h3>
			<hr>
			<div class="tab-cont">
		  		<h4><?php esc_html_e( 'Need Support?', 'travel-booking-agency' ); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'Our team is obliged to help you in every way possible whenever you face any type of difficulties and doubts.', 'travel-booking-agency' ); ?></P>
					<a href="<?php echo esc_url( TRAVEL_BOOKING_AGENCY_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support Forum', 'travel-booking-agency' ); ?></a>
				</div>
			</div>
			<div class="tab-cont">	
				<h4><?php esc_html_e('Reviews', 'travel-booking-agency'); ?></h4>				
				<div class="info-link-support">
					<P><?php esc_html_e( 'It is commendable to have such a theme inculcated with amazing features and robust functionalities. I feel grateful to recommend this theme to one and all.', 'travel-booking-agency' ); ?></P>
					<a href="<?php echo esc_url( TRAVEL_BOOKING_AGENCY_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'travel-booking-agency'); ?></a>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>