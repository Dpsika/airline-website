<?php
/**
 * Travel Booking Agency functions and definitions
 *
 * @package Travel Booking Agency
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */

/* Breadcrumb Begin */
function travel_booking_agency_the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
			echo esc_url( home_url() );
		echo '">';
			bloginfo('name');
		echo "</a> ";
		if (is_category() || is_single()) {
			the_category(',');
			if (is_single()) {
				echo "<span> ";
					the_title();
				echo "</span> ";
			}
		} elseif (is_page()) {
			echo "<span> ";
				the_title();
		}
	}
}

/* Theme Setup */
if ( ! function_exists( 'travel_booking_agency_setup' ) ) :

function travel_booking_agency_setup() {

	$GLOBALS['content_width'] = apply_filters( 'travel_booking_agency_content_width', 640 );

	load_theme_textdomain( 'travel-booking-agency', get_template_directory() . '/languages' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );
	add_image_size('travel-booking-agency-homepage-thumb',240,145,true);
	
   	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'travel-booking-agency' ),
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'f1f1f1'
	) );
	
	add_theme_support ('html5', array (
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

	add_theme_support('responsive-embeds');

	/* Selective refresh for widgets */
	add_theme_support( 'customize-selective-refresh-widgets' );

	/* Starter Content */
	add_theme_support( 'starter-content', array(
		'widgets' => array(
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),
			'sidebar-2' => array(
				'text_business_info',
			),
			'sidebar-3' => array(
				'text_about',
				'search',
			),
			'footer-1' => array(
				'text_about',
			),
			'footer-2' => array(
				'archives',
			),
			'footer-3' => array(
				'text_business_info',
			),
			'footer-4' => array(
				'search',
			),
		),
    ));

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', travel_booking_agency_font_url() ) );

	// Dashboard Theme Notification
	global $pagenow;
	
	if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
		add_action( 'admin_notices', 'travel_booking_agency_activation_notice' );
	}	
}
endif;
add_action( 'after_setup_theme', 'travel_booking_agency_setup' );

// Dashboard Theme Notification
function travel_booking_agency_activation_notice() {
	echo '<div class="welcome-notice notice notice-success is-dimdissible">';
		echo '<h2>'. esc_html__( 'Thank You!!!!!', 'travel-booking-agency' ) .'</h2>';
		echo '<p>'. esc_html__( 'Much grateful to you for choosing our Travel Booking Agency theme from themescaliber. we praise you for opting our services over others. we are obliged to invite you on our welcome page to render you with our outstanding services.', 'travel-booking-agency' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=travel_booking_agency_guide' ) ) .'" class="button button-primary">'. esc_html__( 'Click Here...', 'travel-booking-agency' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function travel_booking_agency_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'travel-booking-agency' ),
		'description'   => __( 'Appears on blog page sidebar', 'travel-booking-agency' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	
	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'travel-booking-agency' ),
		'description'   => __( 'Appears on page sidebar', 'travel-booking-agency' ),
		'id'            => 'sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'         => __( 'Third Column Sidebar', 'travel-booking-agency' ),
		'description' => __( 'Appears on page sidebar', 'travel-booking-agency' ),
		'id'            => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s p-2">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Footer widget areas
	$travel_booking_agency_widget_areas = get_theme_mod('travel_booking_agency_footer_widget_layout', '4');
	for ($i=1; $i<=$travel_booking_agency_widget_areas; $i++) {
		register_sidebar( array(
			'name'        => __( 'Footer Nav ', 'travel-booking-agency' ) . $i,
			'id'          => 'footer-' . $i,
			'description' => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s py-2">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}
	register_sidebar( array(
		'name'          => __( 'Shop Page Sidebar', 'travel-booking-agency' ),
		'description'   => __( 'Appears on shop page', 'travel-booking-agency' ),	
		'id'            => 'woocommerce_sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
	register_sidebar( array(
		'name'          => __( 'Single Product Page Sidebar', 'travel-booking-agency' ),
		'description'   => __( 'Appears on shop page', 'travel-booking-agency' ),
		'id'            => 'woocommerce-single-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'travel_booking_agency_widgets_init' );

/* Theme Font URL */
function travel_booking_agency_font_url() {
	$font_family = array(
	    'ABeeZee:ital@0;1',
		'Abril Fatfac',
		'Acme',
		'Anton',
		'Architects Daughter',
		'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Arsenal:ital,wght@0,400;0,700;1,400;1,700',
		'Arvo:ital,wght@0,400;0,700;1,400;1,700',
		'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Alfa Slab One',
		'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Bangers',
		'Boogaloo',
		'Bad Script',
		'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Bree Serif',
		'BenchNine:wght@300;400;700',
		'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cardo:ital,wght@0,400;0,700;1,400',
		'Courgette',
		'Cherry Swash:wght@400;700',
		'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
		'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700',
		'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Cookie',
		'Coming Soon',
		'Chewy',
		'Days One',
		'Dosis:wght@200;300;400;500;600;700;800',
		'Economica:ital,wght@0,400;0,700;1,400;1,700',
		'Fira Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Fredoka One',
		'Fjalla One',
		'Francois One',
		'Frank Ruhl Libre:wght@300;400;500;700;900',
		'Gloria Hallelujah',
		'Great Vibes',
		'Handlee',
		'Hammersmith One',
		'Heebo:wght@100;200;300;400;500;600;700;800;900',
		'Inconsolata:wght@200;300;400;500;600;700;800;900',
		'Indie Flower',
		'IM Fell English SC',
		'Julius Sans One',
		'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Josefin Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
		'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Lobster',
		'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900',
		'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
		'Libre Baskerville:ital,wght@0,400;0,700;1,400',
		'Lobster Two:ital,wght@0,400;0,700;1,400;1,700',
		'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
		'Monda:wght@400;700',
		'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Marck Script',
		'Noto Serif:ital,wght@0,400;0,700;1,400;1,700',
		'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
		'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Overpass Mono:wght@300;400;500;600;700',
		'Oxygen:wght@300;400;700',
		'Orbitron:wght@400;500;600;700;800;900',
		'Patua One',
		'Pacifico',
		'Padauk:wght@400;700',
		'Playball',
		'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'PT Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
		'Permanent Marker',
		'Poiret One',
		'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Quicksand:wght@300;400;500;600;700',
		'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700',
		'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
		'Rokkitt:wght@100;200;300;400;500;600;700;800;900',
		'Russo One',
		'Righteous',
		'Saira:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Satisfy',
		'Slabo 13px',
		'Slabo 27px',
		'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
		'Shadows Into Light Two',
		'Shadows Into Light',
		'Sacramento',
		'Shrikhand',
		'Staatliches',
		'Tangerine:wght@400;700',
		'Trirong:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700',
		'Unica One',
		'VT323',
		'Varela Round',
		'Vampiro One',
		'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
		'Volkhov:ital,wght@0,400;0,700;1,400;1,700',
		'Work Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
		'Yanone Kaffeesatz:wght@200;300;400;500;600;700',
		'ZCOOL XiaoWei'
	);
	
	$fonts_url = add_query_arg( array(
		'family' => implode( '&family=', $font_family ),
		'display' => 'swap',
	), 'https://fonts.googleapis.com/css2' );

	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
	return $contents;
}

/* Theme enqueue scripts */
function travel_booking_agency_scripts() {
	wp_enqueue_style( 'travel-booking-agency-font', travel_booking_agency_font_url(), array() );
	wp_enqueue_style( 'travel-booking-agency-block-patterns-style-frontend', get_theme_file_uri('/css/block-frontend.css') );
	wp_enqueue_style( 'bootstrap-css', get_template_directory_uri().'/css/bootstrap.css' );
	wp_enqueue_style( 'travel-booking-agency-basic-style', get_stylesheet_uri() );
	wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
	wp_enqueue_style( 'travel-booking-agency-block-style', get_template_directory_uri().'/css/block-style.css' );

    // Body
    $travel_booking_agency_body_color = get_theme_mod('travel_booking_agency_body_color', '');
    $travel_booking_agency_body_font_family = get_theme_mod('travel_booking_agency_body_font_family', '');
    $travel_booking_agency_body_font_size = get_theme_mod('travel_booking_agency_body_font_size', '');
	// Paragraph
    $travel_booking_agency_paragraph_color = get_theme_mod('travel_booking_agency_paragraph_color', '');
    $travel_booking_agency_paragraph_font_family = get_theme_mod('travel_booking_agency_paragraph_font_family', '');
    $travel_booking_agency_paragraph_font_size = get_theme_mod('travel_booking_agency_paragraph_font_size', '');
	// "a" tag
	$travel_booking_agency_atag_color = get_theme_mod('travel_booking_agency_atag_color', '');
    $travel_booking_agency_atag_font_family = get_theme_mod('travel_booking_agency_atag_font_family', '');
	// "li" tag
	$travel_booking_agency_li_color = get_theme_mod('travel_booking_agency_li_color', '');
    $travel_booking_agency_li_font_family = get_theme_mod('travel_booking_agency_li_font_family', '');
	// H1
	$travel_booking_agency_h1_color = get_theme_mod('travel_booking_agency_h1_color', '');
    $travel_booking_agency_h1_font_family = get_theme_mod('travel_booking_agency_h1_font_family', '');
    $travel_booking_agency_h1_font_size = get_theme_mod('travel_booking_agency_h1_font_size', '');
	// H2
	$travel_booking_agency_h2_color = get_theme_mod('travel_booking_agency_h2_color', '');
    $travel_booking_agency_h2_font_family = get_theme_mod('travel_booking_agency_h2_font_family', '');
    $travel_booking_agency_h2_font_size = get_theme_mod('travel_booking_agency_h2_font_size', '');
	// H3
	$travel_booking_agency_h3_color = get_theme_mod('travel_booking_agency_h3_color', '');
    $travel_booking_agency_h3_font_family = get_theme_mod('travel_booking_agency_h3_font_family', '');
    $travel_booking_agency_h3_font_size = get_theme_mod('travel_booking_agency_h3_font_size', '');
	// H4
	$travel_booking_agency_h4_color = get_theme_mod('travel_booking_agency_h4_color', '');
    $travel_booking_agency_h4_font_family = get_theme_mod('travel_booking_agency_h4_font_family', '');
    $travel_booking_agency_h4_font_size = get_theme_mod('travel_booking_agency_h4_font_size', '');
	// H5
	$travel_booking_agency_h5_color = get_theme_mod('travel_booking_agency_h5_color', '');
    $travel_booking_agency_h5_font_family = get_theme_mod('travel_booking_agency_h5_font_family', '');
    $travel_booking_agency_h5_font_size = get_theme_mod('travel_booking_agency_h5_font_size', '');
	// H6
	$travel_booking_agency_h6_color = get_theme_mod('travel_booking_agency_h6_color', '');
    $travel_booking_agency_h6_font_family = get_theme_mod('travel_booking_agency_h6_font_family', '');
    $travel_booking_agency_h6_font_size = get_theme_mod('travel_booking_agency_h6_font_size', '');
    $travel_booking_agency_theme_color = get_theme_mod('travel_booking_agency_theme_color', '');

	$travel_booking_agency_custom_css ='
	    body{
		    color:'.esc_attr($travel_booking_agency_body_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_body_font_family).'!important;
		    font-size: '.esc_attr($travel_booking_agency_body_font_size).'px !important;
		}
		p,span{
		    color:'.esc_attr($travel_booking_agency_paragraph_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_paragraph_font_family).'!important;
		    font-size: '.esc_attr($travel_booking_agency_paragraph_font_size).'!important;
		}
		a{
		    color:'.esc_attr($travel_booking_agency_atag_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_atag_font_family).';
		}
		li{
		    color:'.esc_attr($travel_booking_agency_li_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_li_font_family).';
		}
		h1{
		    color:'.esc_attr($travel_booking_agency_h1_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_h1_font_family).'!important;
		    font-size: '.esc_attr($travel_booking_agency_h1_font_size).'!important;
		}
		h2{
		    color:'.esc_attr($travel_booking_agency_h2_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_h2_font_family).'!important;
		    font-size: '.esc_attr($travel_booking_agency_h2_font_size).'!important;
		}
		h3{
		    color:'.esc_attr($travel_booking_agency_h3_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_h3_font_family).'!important;
		    font-size: '.esc_attr($travel_booking_agency_h3_font_size).'!important;
		}
		h4{
		    color:'.esc_attr($travel_booking_agency_h4_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_h4_font_family).'!important;
		    font-size: '.esc_attr($travel_booking_agency_h4_font_size).'!important;
		}
		h5{
		    color:'.esc_attr($travel_booking_agency_h5_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_h5_font_family).'!important;
		    font-size: '.esc_attr($travel_booking_agency_h5_font_size).'!important;
		}
		h6{
		    color:'.esc_attr($travel_booking_agency_h6_color).'!important;
		    font-family: '.esc_attr($travel_booking_agency_h6_font_family).'!important;
		    font-size: '.esc_attr($travel_booking_agency_h6_font_size).'!important;
		}

		#header .social-media i:hover,.page-template-custom-frontpage .header-menu-box:after,.header-menu-box:after,.search-box i:hover,.primary-navigation ul ul a,.slider-small-text,#slider .carousel-control-prev-icon i:hover, #slider .carousel-control-next-icon i:hover,.read-btn a,#slider .read-btn i, .option i,.heading-text,.inner-box-content:hover .tags-section,.tc-single-category a,.tc-single-category a:hover,.footertown input[type="submit"],input[type="submit"],.footertown th,#footer,.footertown .tagcloud a:hover,.services-box .tc-category a,.services-box .tc-category a:hover,#comments input[type="submit"].submit,#comments a.comment-reply-link,#comments a.comment-reply-link:hover, #comments input[type="submit"].submit:hover,.woocommerce span.onsale,.woocommerce a.button.alt,.woocommerce button.button,.woocommerce a.button, a.added_to_cart.wc-forward, .woocommerce #respond input#submit, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled],nav.woocommerce-MyAccount-navigation ul li,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.woocommerce-product-search button[type="submit"],.woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,.tags a:hover ,#sidebar th,#sidebar input[type="submit"],#sidebar .tagcloud a:hover,.blog .navigation .nav-previous a, .blog .navigation .nav-next a, .archive .navigation .nav-previous a, .archive .navigation .nav-next a, .search .navigation .nav-previous a, .search .navigation .nav-next a,.pagination a:hover, .page-links a:hover,.pagination .current, .page-links .current,.bradcrumbs a ,.bradcrumbs span,#main .wp-block-button a,.wp-block-tag-cloud a:hover,#sidebar h3, #sidebar h2, #sidebar .wp-block-search__label,.wp-block-search__button{
		    background-color:'.esc_attr($travel_booking_agency_theme_color).';
		}

		.mail-header i, .location-header i, .call-header i,.primary-navigation ul li a:hover,.textwidget a,
		.comment-list li.comment p a,#content-ma a,#slider .inner_carousel h1 a:hover,.read-btn i,#slider .read-btn i:hover, .option i:hover, .read-btn i:hover,.popular-box-section h2,.popular-box-section .tab button:hover,.popular-box-section .tab button.tablinks.active ,.top-text1 h2,.scrollup,.scrollup:focus,.scrollup:hover,.footertown .widget ul li a:hover,.metabox a:hover, .metabox a:hover i,.woocommerce ul.products li.product .star-rating,.tags a,#sidebar ul li a:hover,.wp-block-latest-comments__comment-meta a,.wp-calendar-table td a,.wp-calendar-nav a,.wp-block-archives a,.wp-block-categories a,.wp-block-latest-posts a,.wp-block-page-list a,.wp-block-rss a,.services-box h3 a  {
		    color:'.esc_attr($travel_booking_agency_theme_color).';
		}

		.primary-navigation ul ul,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.tags a ,#sidebar .tagcloud a:hover, .wp-block-tag-cloud a:hover,.footertown .widget h3, .footertown .wp-block-search__label,.footertown .tagcloud a:hover{
		   border-color:'.esc_attr($travel_booking_agency_theme_color).';
		}
		.woocommerce-message{
		   border-top-color:'.esc_attr($travel_booking_agency_theme_color).';
		}

		.tab,.popular-box-section .tablinks.active:after{
		   border-bottom-color:'.esc_attr($travel_booking_agency_theme_color).';
		}

		@media screen and (max-width: 1000px){
			.toggle-menu i,.side-menu{
			    background-color:'.esc_attr($travel_booking_agency_theme_color).';
			}
		}

		';
	wp_add_inline_style( 'travel-booking-agency-basic-style',$travel_booking_agency_custom_css );

	require get_parent_theme_file_path( '/tc-style.php' );
	wp_add_inline_style( 'travel-booking-agency-basic-style',$travel_booking_agency_custom_css );

	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js' );
	wp_enqueue_script( 'travel-booking-agency-custom-jquery', get_template_directory_uri() . '/js/custom.js', array('jquery') );
	wp_enqueue_script( 'jquery-superfish', get_template_directory_uri() . '/js/jquery.superfish.js', array('jquery') ,'',true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'travel_booking_agency_scripts' );

/*radio button sanitization*/
function travel_booking_agency_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function travel_booking_agency_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

/*** Enqueue block editor style ****/
function travel_booking_agency_block_editor_styles() {
	wp_enqueue_style( 'travel-booking-agency-font', travel_booking_agency_font_url(), array() );
	wp_enqueue_style( 'travel-booking-agency-block-patterns-style-editor', get_theme_file_uri( '/css/block-editor.css' ), false, '1.0', 'all' );
    wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.css' );
    wp_enqueue_style( 'font-awesome-css', get_template_directory_uri().'/css/fontawesome-all.css' );
}
add_action( 'enqueue_block_editor_assets', 'travel_booking_agency_block_editor_styles' );

function travel_booking_agency_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function travel_booking_agency_sanitize_dropdown_pages( $page_id, $setting ) {
  	// Ensure $input is an absolute integer.
  	$page_id = absint( $page_id );

  	// If $page_id is an ID of a published page, return it; otherwise, return the default.
  	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'travel_booking_agency_loop_columns');
if (!function_exists('travel_booking_agency_loop_columns')) {
	function travel_booking_agency_loop_columns() {
		$columns = get_theme_mod( 'travel_booking_agency_products_per_row', 3 );
		return $columns; // 3 products per row
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'travel_booking_agency_shop_per_page', 9 );
function travel_booking_agency_shop_per_page( $cols ) {
  	$cols = get_theme_mod( 'travel_booking_agency_product_per_page', 9 );
	return $cols;
}

// URL DEFINES
define('TRAVEL_BOOKING_AGENCY_SITE_URL',__('https://www.themescaliber.com/themes/free-travel-agency-wordpress-theme/','travel-booking-agency'));
define('TRAVEL_BOOKING_AGENCY_FREE_THEME_DOC',__('https://themescaliber.com/demo/doc/free-travel-booking-agency/','travel-booking-agency'));
define('TRAVEL_BOOKING_AGENCY_SUPPORT',__('https://wordpress.org/support/theme/travel-booking-agency/','travel-booking-agency'));
define('TRAVEL_BOOKING_AGENCY_REVIEW',__('https://wordpress.org/support/theme/travel-booking-agency/reviews/','travel-booking-agency'));
define('TRAVEL_BOOKING_AGENCY_BUY_NOW',__('https://www.themescaliber.com/themes/travel-booking-wordpress-theme/','travel-booking-agency'));
define('TRAVEL_BOOKING_AGENCY_LIVE_DEMO',__('https://themescaliber.com/demo/travel-booking-agency-pro/','travel-booking-agency'));
define('TRAVEL_BOOKING_AGENCY_PRO_DOC',__('https://themescaliber.com/demo/doc/travel-booking-agency-pro/','travel-booking-agency'));

function travel_booking_agency_credit_link() {
    echo "<a href=".esc_url(TRAVEL_BOOKING_AGENCY_SITE_URL)." target='_blank'>".esc_html__('Travel Booking WordPress Theme','travel-booking-agency')."</a>";
}

function travel_booking_agency_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function travel_booking_agency_sanitize_float( $input ) {
    return filter_var($input, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
}

/** Posts navigation. */
if ( ! function_exists( 'travel_booking_agency_post_navigation' ) ) {
	function travel_booking_agency_post_navigation() {
		$travel_booking_agency_pagination_type = get_theme_mod( 'travel_booking_agency_post_navigation_type', 'numbers' );
		if ( $travel_booking_agency_pagination_type == 'numbers' ) {
			the_posts_pagination();
		} else {
			the_posts_navigation( array(
	            'prev_text'          => __( 'Previous page', 'travel-booking-agency' ),
	            'next_text'          => __( 'Next page', 'travel-booking-agency' ),
	            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'travel-booking-agency' ) . ' </span>',
	        ) );
		}
	}
}

/* Custom template tags for this theme. */
require get_template_directory() . '/inc/template-tags.php';

/* Implement the Custom Header feature. */
require get_template_directory() . '/inc/custom-header.php';

/* Customizer additions. */
require get_template_directory() . '/inc/customizer.php';

/* Webfonts */
require get_template_directory() . '/wptt-webfont-loader.php';

/* Implement the get started page */
require get_template_directory() . '/inc/dashboard/getstart.php';

/* Block Pattern */
require get_template_directory() . '/block-patterns.php';



