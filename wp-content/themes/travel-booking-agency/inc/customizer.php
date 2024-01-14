<?php
/**
 * Travel Booking Agency Theme Customizer
 *
 * @package Travel Booking Agency
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function travel_booking_agency_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname',
		array(
			'selector'        => '.site-title a',
			'render_callback' => 'travel_booking_agency_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription',
		array(
			'selector'        => '.site-description',
			'render_callback' => 'travel_booking_agency_customize_partial_blogdescription',
		)
	);

	//add home page setting pannel
	$wp_customize->add_panel( 'travel_booking_agency_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'travel-booking-agency' ),
	) );

    $travel_booking_agency_font_array= array(
        '' =>'No Fonts',
        'Abril Fatface' => 'Abril Fatface',
        'Acme' =>'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' => 'Arimo', 
        'Arsenal' =>'Arsenal',
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya',
        'Alfa Slab One' =>'Alfa Slab One',
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers', 
        'Boogaloo' =>'Boogaloo', 
        'Bad Script' =>'Bad Script',
        'Bitter' =>'Bitter', 
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' =>'Cabin',
        'Cardo' =>'Cardo', 
        'Courgette' =>'Courgette', 
        'Cherry Swash' =>'Cherry Swash',
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text',
        'Cuprum' =>'Cuprum', 
        'Cookie' =>'Cookie',
        'Chewy' =>'Chewy',
        'Days One' =>'Days One',
        'Dosis' =>'Dosis',
        'Droid Sans' =>'Droid Sans', 
        'Economica' =>'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One',
        'Francois One' =>'Francois One', 
        'Frank Ruhl Libre' => 'Frank Ruhl Libre', 
        'Gloria Hallelujah' =>'Gloria Hallelujah',
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata',
        'Indie Flower' =>'Indie Flower', 
        'IM Fell English SC' =>'IM Fell English SC',
        'Julius Sans One' =>'Julius Sans One',
        'Josefin Slab' =>'Josefin Slab',
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit',
        'Lobster' =>'Lobster',
        'Lato' => 'Lato',
        'Lora' =>'Lora', 
        'Libre Baskerville' =>'Libre Baskerville',
        'Lobster Two' => 'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' =>'Monda',
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' =>'Open Sans',
        'Overpass' => 'Overpass', 
        'Overpass Mono' =>'Overpass Mono',
        'Oxygen' =>'Oxygen',
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One',
        'Pacifico' =>'Pacifico',
        'Padauk' =>'Padauk',
        'Playball' =>'Playball',
        'Playfair Display' =>'Playfair Display',
        'PT Sans' =>'PT Sans',
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker',
        'Poiret One' =>'Poiret One',
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans',
        'Raleway' =>'Raleway',
        'Rubik' =>'Rubik',
        'Rokkitt' =>'Rokkitt',
        'Russo One' => 'Russo One', 
        'Righteous' =>'Righteous', 
        'Slabo' =>'Slabo', 
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>  'Shadows Into Light',
        'Sacramento' =>'Sacramento',
        'Shrikhand' =>'Shrikhand',
        'Tangerine' => 'Tangerine',
        'Ubuntu' =>'Ubuntu',
        'VT323' =>'VT323',
        'Varela Round' =>'Varela Round',
        'Vampiro One' =>'Vampiro One',
        'Vollkorn' => 'Vollkorn',
        'Volkhov' =>'Volkhov',
        'Kavoon' =>'Kavoon',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Color / Font Pallete
	$wp_customize->add_section( 'travel_booking_agency_typography', array(
    	'title'      => __( 'Color / Font Pallete', 'travel-booking-agency' ),
		'priority'   => 30,
		'panel' => 'travel_booking_agency_panel_id'
	) );

	// This is Body Color setting
	$wp_customize->add_setting( 'travel_booking_agency_body_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_body_color', array(
		'label' => __('Body Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_body_color',
	)));

	//This is Body FontFamily  setting
	$wp_customize->add_setting('travel_booking_agency_body_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
		'travel_booking_agency_body_font_family', array(
		'section'  => 'travel_booking_agency_typography',
		'label'    => __( 'Body Fonts','travel-booking-agency'),
		'type'     => 'select',
		'choices'  => $travel_booking_agency_font_array,
	));

    //This is Body Fontsize setting
	$wp_customize->add_setting('travel_booking_agency_body_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_booking_agency_body_font_size',array(
		'label'	=> __('Body Font Size','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_typography',
		'setting'	=> 'travel_booking_agency_body_font_size',
		'type'	=> 'text'
	));

	// Add the Theme Color Option section.
	$wp_customize->add_setting( 'travel_booking_agency_theme_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_theme_color', array(
  		'label' => __('Theme Color Option','travel-booking-agency'),
	    'section' => 'travel_booking_agency_typography',
	    'settings' => 'travel_booking_agency_theme_color',
  	)));
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'travel_booking_agency_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_paragraph_color', array(
		'label' => __('Paragraph Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('travel_booking_agency_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
	    'travel_booking_agency_paragraph_font_family', array(
	    'section'  => 'travel_booking_agency_typography',
	    'label'    => __( 'Paragraph Fonts','travel-booking-agency'),
	    'type'     => 'select',
	    'choices'  => $travel_booking_agency_font_array,
	));

	$wp_customize->add_setting('travel_booking_agency_paragraph_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_booking_agency_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_typography',
		'setting'	=> 'travel_booking_agency_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'travel_booking_agency_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_atag_color', array(
		'label' => __('"a" Tag Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('travel_booking_agency_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
	    'travel_booking_agency_atag_font_family', array(
	    'section'  => 'travel_booking_agency_typography',
	    'label'    => __( '"a" Tag Fonts','travel-booking-agency'),
	    'type'     => 'select',
	    'choices'  => $travel_booking_agency_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'travel_booking_agency_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_li_color', array(
		'label' => __('"li" Tag Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('travel_booking_agency_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
	    'travel_booking_agency_li_font_family', array(
	    'section'  => 'travel_booking_agency_typography',
	    'label'    => __( '"li" Tag Fonts','travel-booking-agency'),
	    'type'     => 'select',
	    'choices'  => $travel_booking_agency_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'travel_booking_agency_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_h1_color', array(
		'label' => __('h1 Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('travel_booking_agency_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
	    'travel_booking_agency_h1_font_family', array(
	    'section'  => 'travel_booking_agency_typography',
	    'label'    => __( 'h1 Fonts','travel-booking-agency'),
	    'type'     => 'select',
	    'choices'  => $travel_booking_agency_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('travel_booking_agency_h1_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_booking_agency_h1_font_size',array(
		'label'	=> __('h1 Font Size','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_typography',
		'setting'	=> 'travel_booking_agency_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'travel_booking_agency_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_h2_color', array(
		'label' => __('h2 Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('travel_booking_agency_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
	    'travel_booking_agency_h2_font_family', array(
	    'section'  => 'travel_booking_agency_typography',
	    'label'    => __( 'h2 Fonts','travel-booking-agency'),
	    'type'     => 'select',
	    'choices'  => $travel_booking_agency_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('travel_booking_agency_h2_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_booking_agency_h2_font_size',array(
		'label'	=> __('h2 Font Size','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_typography',
		'setting'	=> 'travel_booking_agency_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'travel_booking_agency_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_h3_color', array(
		'label' => __('h3 Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('travel_booking_agency_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
	    'travel_booking_agency_h3_font_family', array(
	    'section'  => 'travel_booking_agency_typography',
	    'label'    => __( 'h3 Fonts','travel-booking-agency'),
	    'type'     => 'select',
	    'choices'  => $travel_booking_agency_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('travel_booking_agency_h3_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_booking_agency_h3_font_size',array(
		'label'	=> __('h3 Font Size','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_typography',
		'setting'	=> 'travel_booking_agency_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'travel_booking_agency_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_h4_color', array(
		'label' => __('h4 Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('travel_booking_agency_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
	    'travel_booking_agency_h4_font_family', array(
	    'section'  => 'travel_booking_agency_typography',
	    'label'    => __( 'h4 Fonts','travel-booking-agency'),
	    'type'     => 'select',
	    'choices'  => $travel_booking_agency_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('travel_booking_agency_h4_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_booking_agency_h4_font_size',array(
		'label'	=> __('h4 Font Size','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_typography',
		'setting'	=> 'travel_booking_agency_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'travel_booking_agency_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_h5_color', array(
		'label' => __('h5 Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('travel_booking_agency_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
	    'travel_booking_agency_h5_font_family', array(
	    'section'  => 'travel_booking_agency_typography',
	    'label'    => __( 'h5 Fonts','travel-booking-agency'),
	    'type'     => 'select',
	    'choices'  => $travel_booking_agency_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('travel_booking_agency_h5_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_booking_agency_h5_font_size',array(
		'label'	=> __('h5 Font Size','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_typography',
		'setting'	=> 'travel_booking_agency_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'travel_booking_agency_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_h6_color', array(
		'label' => __('h6 Color', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_typography',
		'settings' => 'travel_booking_agency_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('travel_booking_agency_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control(
	    'travel_booking_agency_h6_font_family', array(
	    'section'  => 'travel_booking_agency_typography',
	    'label'    => __( 'h6 Fonts','travel-booking-agency'),
	    'type'     => 'select',
	    'choices'  => $travel_booking_agency_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('travel_booking_agency_h6_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_booking_agency_h6_font_size',array(
		'label'	=> __('h6 Font Size','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_typography',
		'setting'	=> 'travel_booking_agency_h6_font_size',
		'type'	=> 'text'
	));

	//Layouts
	$wp_customize->add_section( 'travel_booking_agency_left_right', array(
    	'title'      => __( 'Theme Layout Settings', 'travel-booking-agency' ),
		'priority'   => 30,
		'panel' => 'travel_booking_agency_panel_id'
	) );

	$wp_customize->add_setting('travel_booking_agency_width_options',array(
        'default' => 'Full Layout',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_width_options',array(
        'type' => 'select',
        'label' => __('Select Site Layout','travel-booking-agency'),
        'section' => 'travel_booking_agency_left_right',
        'choices' => array(
            'Full Layout' => __('Full Layout','travel-booking-agency'),
            'Contained Layout' => __('Contained Layout','travel-booking-agency'),
            'Boxed Layout' => __('Boxed Layout','travel-booking-agency'),
        ),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('travel_booking_agency_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	) );
	$wp_customize->add_control('travel_booking_agency_theme_options', array(
        'type' => 'radio',
        'label' => __('Sidebar Layout','travel-booking-agency'),
        'section' => 'travel_booking_agency_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','travel-booking-agency'),
            'Right Sidebar' => __('Right Sidebar','travel-booking-agency'),
            'One Column' => __('One Column','travel-booking-agency'),
            'Three Columns' => __('Three Columns','travel-booking-agency'),
            'Four Columns' => __('Four Columns','travel-booking-agency'),
            'Grid Layout' => __('Grid Layout','travel-booking-agency')
        ),
    ));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('travel_booking_agency_single_post_sidebar',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	) );
	$wp_customize->add_control('travel_booking_agency_single_post_sidebar', array(
        'type' => 'radio',
        'label' => __('Single Post Sidebar Layout','travel-booking-agency'),
        'section' => 'travel_booking_agency_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','travel-booking-agency'),
            'Right Sidebar' => __('Right Sidebar','travel-booking-agency'),
            'One Column' => __('One Column','travel-booking-agency'),
        ),
    ));

    $wp_customize->add_setting('travel_booking_agency_single_page_sidebar_layout', array(
		'default'           => 'One Column',
		'sanitize_callback' => 'travel_booking_agency_sanitize_choices',
	));
	$wp_customize->add_control('travel_booking_agency_single_page_sidebar_layout',array(
		'type'           => 'radio',
		'label'          => __('Single Page Layouts', 'travel-booking-agency'),
		'section'        => 'travel_booking_agency_left_right',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'travel-booking-agency'),
			'Right Sidebar' => __('Right Sidebar', 'travel-booking-agency'),
			'One Column'    => __('One Column', 'travel-booking-agency'),
		),
	));

	$wp_customize->add_setting( 'travel_booking_agency_single_page_breadcrumb',array(
		'default' => true,
      	'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ) );
    $wp_customize->add_control('travel_booking_agency_single_page_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Page Breadcrumb','travel-booking-agency' ),
        'section' => 'travel_booking_agency_left_right'
    ));

    $wp_customize->add_setting('travel_booking_agency_breadcrumb_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_breadcrumb_color', array(
		'label'    => __('Breadcrumb Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_left_right',
	)));

	$wp_customize->add_setting('travel_booking_agency_breadcrumb_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_breadcrumb_background_color', array(
		'label'    => __('Breadcrumb Background Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_left_right',
	)));

	$wp_customize->add_setting('travel_booking_agency_breadcrumb_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_breadcrumb_hover_color', array(
		'label'    => __('Breadcrumb Hover Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_left_right',
	)));

	$wp_customize->add_setting('travel_booking_agency_breadcrumb_hover_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_breadcrumb_hover_bg_color', array(
		'label'    => __('Breadcrumb Hover Background Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_left_right',
	)));

	// Preloader
	$wp_customize->add_setting( 'travel_booking_agency_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ) );
    $wp_customize->add_control('travel_booking_agency_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','travel-booking-agency' ),
        'section' => 'travel_booking_agency_left_right'
    ));

    $wp_customize->add_setting('travel_booking_agency_preloader_type',array(
        'default'   => 'center-square',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control( 'travel_booking_agency_preloader_type', array(
		'label' => __( 'Preloader Type','travel-booking-agency' ),
		'section' => 'travel_booking_agency_left_right',
		'type'  => 'select',
		'settings' => 'travel_booking_agency_preloader_type',
		'choices' => array(
		    'center-square' => __('Center Square','travel-booking-agency'),
		    'chasing-square' => __('Chasing Square','travel-booking-agency'),
	    ),
	));

	$wp_customize->add_setting( 'travel_booking_agency_preloader_color', array(
	    'default' => '#333333',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_preloader_color', array(
  		'label' => 'Preloader Color',
	    'section' => 'travel_booking_agency_left_right',
	    'settings' => 'travel_booking_agency_preloader_color',
  	)));

  	$wp_customize->add_setting( 'travel_booking_agency_preloader_bg_color', array(
	    'default' => '#fff',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_preloader_bg_color', array(
  		'label' => 'Preloader Background Color',
	    'section' => 'travel_booking_agency_left_right',
	    'settings' => 'travel_booking_agency_preloader_bg_color',
  	)));

  	// Header Section
	$wp_customize->add_section('travel_booking_agency_header',array(
		'title'	=> __('Header','travel-booking-agency'),
		'priority'	=> null,
		'panel' => 'travel_booking_agency_panel_id',
	));

	$wp_customize->add_setting('travel_booking_agency_topbar_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_topbar_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide Topbar','travel-booking-agency'),
	   'section' => 'travel_booking_agency_header',
	));

	$wp_customize->add_setting('travel_booking_agency_mail',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_booking_agency_mail',array(
		'label'	=> __('Email Text','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_header',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('travel_booking_agency_mail1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('travel_booking_agency_mail1',array(
		'label'	=> __('Mail Address','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_header',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('travel_booking_agency_location',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('travel_booking_agency_location',array(
		'label'	=> __('Location','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_header',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('travel_booking_agency_location1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('travel_booking_agency_location1',array(
		'label'	=> __('Other Location','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_header',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('travel_booking_agency_call',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('travel_booking_agency_call',array(
		'label'	=> __('Phone Text','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_header',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('travel_booking_agency_call1',array(
		'default'	=> '',
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_phone_number'
	));

	$wp_customize->add_control('travel_booking_agency_call1',array(
		'label'	=> __('Phone Number','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_header',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('travel_booking_agency_navigation_case',array(
        'default' => 'capitalize',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_navigation_case',array(
        'type' => 'select',
        'label' => __('Navigation Case','travel-booking-agency'),
        'section' => 'travel_booking_agency_header',
        'choices' => array(
            'uppercase' => __('Uppercase','travel-booking-agency'),
            'capitalize' => __('Capitalize','travel-booking-agency'),
        ),
	) );

	$wp_customize->add_setting( 'travel_booking_agency_nav_font_size', array(
		'default'           => 18,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float',
	) );
	$wp_customize->add_control( 'travel_booking_agency_nav_font_size', array(
		'label' => __( 'Navigation Font Size','travel-booking-agency' ),
		'section'     => 'travel_booking_agency_header',
		'type'        => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 50,
		),
	) );

	$wp_customize->add_setting('travel_booking_agency_font_weight_menu_option',array(
        'default' => '600',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
    ));
    $wp_customize->add_control('travel_booking_agency_font_weight_menu_option',array(
        'type' => 'select',
        'label' => __('Navigation Font Weight','travel-booking-agency'),
        'section' => 'travel_booking_agency_header',
        'choices' => array(
            '100' => __('100','travel-booking-agency'),
            '200' => __('200','travel-booking-agency'),
            '300' => __('300','travel-booking-agency'),
            '400' => __('400','travel-booking-agency'),
            '500' => __('500','travel-booking-agency'),
            '600' => __('600','travel-booking-agency'),
            '700' => __('700','travel-booking-agency'),
            '800' => __('800','travel-booking-agency'),
            '900' => __('900','travel-booking-agency'),
        ),
	) );

	$wp_customize->add_setting('travel_booking_agency_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_menu_color', array(
		'label'    => __('Menu Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_header',
		'settings' => 'travel_booking_agency_menu_color',
	)));

	$wp_customize->add_setting('travel_booking_agency_menu_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_menu_hover_color', array(
		'label'    => __('Menu Hover Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_header',
		'settings' => 'travel_booking_agency_menu_hover_color',
	)));

	$wp_customize->add_setting('travel_booking_agency_submenu_menu_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_submenu_menu_color', array(
		'label'    => __('Submenu Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_header',
		'settings' => 'travel_booking_agency_submenu_menu_color',
	)));

	$wp_customize->add_setting( 'travel_booking_agency_submenu_hover_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'travel_booking_agency_submenu_hover_color', array(
  		'label' => __('Submenu Hover Color', 'travel-booking-agency'),
	    'section' => 'travel_booking_agency_header',
	    'settings' => 'travel_booking_agency_submenu_hover_color',
  	)));

    //Social Icons
	$wp_customize->add_section('travel_booking_agency_topbar',array(
		'title'	=> __('Social Icons','travel-booking-agency'),
		'priority'	=> null,
		'panel' => 'travel_booking_agency_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'travel_booking_agency_facebook_url',
		array(
			'selector'        => '.social-media',
			'render_callback' => 'travel_booking_agency_customize_partial_travel_booking_agency_facebook_url',
		)
	);

	$wp_customize->add_setting('travel_booking_agency_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('travel_booking_agency_facebook_url',array(
		'label'	=> __('Add Facebook link','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_topbar',
		'setting'	=> 'travel_booking_agency_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('travel_booking_agency_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('travel_booking_agency_twitter_url',array(
		'label'	=> __('Add Twitter link','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_topbar',
		'setting'	=> 'travel_booking_agency_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('travel_booking_agency_goggle_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('travel_booking_agency_goggle_url',array(
		'label'	=> __('Add Goggle link','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_topbar',
		'setting'	=> 'travel_booking_agency_goggle_url',
		'type'	=> 'url'
	));
	$wp_customize->add_setting('travel_booking_agency_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('travel_booking_agency_youtube_url',array(
		'label'	=> __('Add Youtube link','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_topbar',
		'setting'	=> 'travel_booking_agency_youtube_url',
		'type'		=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'travel_booking_agency_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'travel-booking-agency' ),
		'priority'   => null,
		'panel' => 'travel_booking_agency_panel_id'
	) );

	$wp_customize->selective_refresh->add_partial(
		'travel_booking_agency_slider_hide_show',
		array(
			'selector'        => '#slider .inner_carousel h1',
			'render_callback' => 'travel_booking_agency_customize_partial_travel_booking_agency_slider_hide_show',
		)
	);

	$wp_customize->add_setting('travel_booking_agency_slider_small_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('travel_booking_agency_slider_small_text',array(
		'label'	=> esc_html__('Slider Small Text','travel-booking-agency'),
		'section'=> 'travel_booking_agency_slidersettings',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('travel_booking_agency_slider_hide_show',array(
       'default' => false,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_slider_hide_show',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider','travel-booking-agency'),
	   'section' => 'travel_booking_agency_slidersettings',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'travel_booking_agency_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'travel_booking_agency_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'travel_booking_agency_slider_page' . $count, array(
			'label' => __( 'Select Slide Image Page', 'travel-booking-agency' ),
			'section' => 'travel_booking_agency_slidersettings',
			'type'    => 'dropdown-pages'
		) );
	}

	//Show / Hide slider Title
	$wp_customize->add_setting('travel_booking_agency_slider_title',array(
       'default' => 'true',
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	
	$wp_customize->add_control('travel_booking_agency_slider_title',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Title','travel-booking-agency'),
	   'section' => 'travel_booking_agency_slidersettings',
	));

	//Show / Hide slider Content
	$wp_customize->add_setting('travel_booking_agency_slider_content',array(
       'default' => 'true',
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_slider_content',array(
	   'type' => 'checkbox',
	   'label' => __('Show / Hide slider Content','travel-booking-agency'),
	   'section' => 'travel_booking_agency_slidersettings',
	));

	$wp_customize->add_setting('travel_booking_agency_slider_button',array(
		'default' => true,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_slider_button',array(
     	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider Button','travel-booking-agency'),
	   	'section' => 'travel_booking_agency_slidersettings'
	));

	$wp_customize->add_setting('travel_booking_agency_slider_width_options',array(
    	'default' => 'Full Width',
     	'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_slider_width_options',array(
		'type' => 'select',
		'label' => __('Slider Width Layout','travel-booking-agency'),
		'description' => __('Here you can change the Slider Width. ','travel-booking-agency'),
		'section' => 'travel_booking_agency_slidersettings',
		'choices' => array(
		   'Full Width' => __('Full Width','travel-booking-agency'),
		   'Container Width' => __('Container Width','travel-booking-agency'),
		),
	) );


	//Popular Tour Section
	$wp_customize->add_section('travel_booking_agency_popular_tour_section',array(
		'title'	=> __('Popular Tour Section','travel-booking-agency'),
		'panel' => 'travel_booking_agency_panel_id',
	));

	$wp_customize->add_setting('travel_booking_agency_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('travel_booking_agency_section_title',array(
		'label'	=> esc_html__('Section Title','travel-booking-agency'),
		'section'=> 'travel_booking_agency_popular_tour_section',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('travel_booking_agency_popular_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('travel_booking_agency_popular_number',array(
		'label'	=> esc_html__('No of Tabs to show','travel-booking-agency'),
		'section'=> 'travel_booking_agency_popular_tour_section',
		'type'=> 'number'
	));	

	$category_post = get_theme_mod('travel_booking_agency_popular_number','');
    for ( $j = 1; $j <= $category_post; $j++ ) {
		$wp_customize->add_setting('travel_booking_agency_popular_text'.$j,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('travel_booking_agency_popular_text'.$j,array(
			'label'	=> esc_html__('Tab ','travel-booking-agency').$j,
			'section'=> 'travel_booking_agency_popular_tour_section',
			'type'=> 'text'
		));

		$categories = get_categories();
			$cat_posts = array();
				$i = 0;
				$cat_posts[]='Select';
			foreach($categories as $category){
				if($i==0){
				$default = $category->slug;
				$i++;
			}
			$cat_posts[$category->slug] = $category->name;
		}

		$wp_customize->add_setting('travel_booking_agency_popular_category'.$j,array(
			'default'	=> 'select',
			'sanitize_callback' => 'travel_booking_agency_sanitize_choices',
		));
		$wp_customize->add_control('travel_booking_agency_popular_category'.$j,array(
			'type'    => 'select',
			'choices' => $cat_posts,
			'label' => __('Select Category to display images','travel-booking-agency'),
			'section' => 'travel_booking_agency_popular_tour_section',
		));

	  $wp_customize->add_setting('travel_booking_agency_title_small'.$j,array(
	      'default'=> '',
	      'sanitize_callback' => 'sanitize_text_field',
	  ));
	  $wp_customize->add_control('travel_booking_agency_title_small'.$j,array(
	      'label' => __('Featured Tag','travel-booking-agency'),
	      'section'=> 'travel_booking_agency_popular_tour_section',
	      'type'=> 'text'
	  ));
	}

	$wp_customize->add_setting( 'travel_booking_agency_latest_post_button_text', array(
		'default'   => __('View Tour','travel-booking-agency' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'travel_booking_agency_latest_post_button_text', array(
		'label'    => __( 'Post Button text','travel-booking-agency' ),
		'section'  => 'travel_booking_agency_popular_tour_section',
		'type'     => 'text',
		'settings' => 'travel_booking_agency_latest_post_button_text'
	) );

	//Blog Post
	$wp_customize->add_section('travel_booking_agency_blog_post',array(
		'title'	=> __('Post Settings','travel-booking-agency'),
		'panel' => 'travel_booking_agency_panel_id',
	));	

	$wp_customize->add_setting('travel_booking_agency_date_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_date_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Date','travel-booking-agency'),
       'section' => 'travel_booking_agency_blog_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize,'travel_booking_agency_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','travel-booking-agency'),
		'transport' => 'refresh',
		'section'	=> 'travel_booking_agency_blog_post',
		'setting'	=> 'travel_booking_agency_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('travel_booking_agency_author_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_author_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Author','travel-booking-agency'),
       'section' => 'travel_booking_agency_blog_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize,'travel_booking_agency_author_icon',array(
		'label'	=> __('Add Post Author Icon','travel-booking-agency'),
		'transport' => 'refresh',
		'section'	=> 'travel_booking_agency_blog_post',
		'setting'	=> 'travel_booking_agency_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('travel_booking_agency_comment_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_comment_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Comments','travel-booking-agency'),
       'section' => 'travel_booking_agency_blog_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_comment_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize,'travel_booking_agency_comment_icon',array(
		'label'	=> __('Add Post Comment Icon','travel-booking-agency'),
		'transport' => 'refresh',
		'section'	=> 'travel_booking_agency_blog_post',
		'setting'	=> 'travel_booking_agency_comment_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('travel_booking_agency_time_hide',array(
       'default' => false,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_time_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Time','travel-booking-agency'),
       'section' => 'travel_booking_agency_blog_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize,'travel_booking_agency_time_icon',array(
		'label'	=> __('Add Post Time Icon','travel-booking-agency'),
		'transport' => 'refresh',
		'section'	=> 'travel_booking_agency_blog_post',
		'setting'	=> 'travel_booking_agency_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('travel_booking_agency_feature_image_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_feature_image_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured Image','travel-booking-agency'),
       'section' => 'travel_booking_agency_blog_post'
    ));

    $wp_customize->add_setting( 'travel_booking_agency_featured_image_border_radius', array(
		'default' => 0,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	) );
	$wp_customize->add_control( 'travel_booking_agency_featured_image_border_radius', array(
		'label' => __( 'Featured image border radius','travel-booking-agency' ),
		'section' => 'travel_booking_agency_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

    $wp_customize->add_setting( 'travel_booking_agency_featured_image_box_shadow', array(
		'default' => 0,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	) );
	$wp_customize->add_control( 'travel_booking_agency_featured_image_box_shadow', array(
		'label' => __( 'Featured image box shadow','travel-booking-agency' ),
		'section' => 'travel_booking_agency_blog_post',
		'type'  => 'number',
		'input_attrs' => array(
			'step' => 1,
			'min'  => 0,
			'max'  => 50,
		),
	) );

	$wp_customize->add_setting('travel_booking_agency_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','travel-booking-agency'),
       'description' => __('Ex: "/", "|", "-", ...','travel-booking-agency'),
       'section' => 'travel_booking_agency_blog_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_post_content',array(
    	'default' => 'Excerpt Content',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_post_content',array(
        'type' => 'radio',
        'label' => __('Post Content Type','travel-booking-agency'),
        'section' => 'travel_booking_agency_blog_post',
        'choices' => array(
            'No Content' => __('No Content','travel-booking-agency'),
            'Full Content' => __('Full Content','travel-booking-agency'),
            'Excerpt Content' => __('Excerpt Content','travel-booking-agency'),
        ),
	) );

    $wp_customize->add_setting( 'travel_booking_agency_post_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	) );
	$wp_customize->add_control( 'travel_booking_agency_post_excerpt_length', array(
		'label' => esc_html__( 'Post Excerpt Length','travel-booking-agency' ),
		'section'  => 'travel_booking_agency_blog_post',
		'type'  => 'number',
		'settings' => 'travel_booking_agency_post_excerpt_length',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'travel_booking_agency_button_excerpt_suffix', array(
		'default'   => __('[...]','travel-booking-agency' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'travel_booking_agency_button_excerpt_suffix', array(
		'label'       => esc_html__( 'Excerpt Suffix','travel-booking-agency' ),
		'section'     => 'travel_booking_agency_blog_post',
		'type'        => 'text',
		'settings' => 'travel_booking_agency_button_excerpt_suffix'
	) );

	$wp_customize->add_setting( 'travel_booking_agency_post_button_text', array(
		'default'   => esc_html__('Read More','travel-booking-agency' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'travel_booking_agency_post_button_text', array(
		'label' => esc_html__('Post Button Text','travel-booking-agency' ),
		'section'     => 'travel_booking_agency_blog_post',
		'type'        => 'text',
		'settings'    => 'travel_booking_agency_post_button_text'
	) );

	$wp_customize->add_setting('travel_booking_agency_top_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_top_button_padding',array(
		'label'	=> __('Top Bottom Button Padding','travel-booking-agency'),
		'input_attrs' => array(
            'step' => 1,
			'min'  => 0,
			'max'  => 50,
        ),
		'section'=> 'travel_booking_agency_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting('travel_booking_agency_left_button_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_left_button_padding',array(
		'label'	=> __('Left Right Button Padding','travel-booking-agency'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'travel_booking_agency_blog_post',
		'type'=> 'number',
	));

	$wp_customize->add_setting( 'travel_booking_agency_button_border_radius', array(
		'default'=> '',
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	) );
	$wp_customize->add_control('travel_booking_agency_button_border_radius', array(
        'label'  => __('Button Border Radius','travel-booking-agency'),
        'type'=> 'number',
        'section'  => 'travel_booking_agency_blog_post',
        'input_attrs' => array(
        	'step' => 1,
            'min' => 0,
            'max' => 50,
        ),
    ));

    $wp_customize->add_setting( 'travel_booking_agency_post_blocks', array(
        'default'			=> 'Without box',
        'sanitize_callback'	=> 'travel_booking_agency_sanitize_choices'
    ));
    $wp_customize->add_control( 'travel_booking_agency_post_blocks', array(
        'section' => 'travel_booking_agency_blog_post',
        'type' => 'select',
        'label' => __( 'Post blocks', 'travel-booking-agency' ),
        'choices' => array(
            'Within box'  => __( 'Within box', 'travel-booking-agency' ),
            'Without box' => __( 'Without box', 'travel-booking-agency' ),
    )));

    $wp_customize->add_setting('travel_booking_agency_navigation_hide',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_navigation_hide',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Post Navigation','travel-booking-agency'),
       'section' => 'travel_booking_agency_blog_post'
    ));

    $wp_customize->add_setting( 'travel_booking_agency_post_navigation_type', array(
        'default'			=> 'numbers',
        'sanitize_callback'	=> 'travel_booking_agency_sanitize_choices'
    ));
    $wp_customize->add_control( 'travel_booking_agency_post_navigation_type', array(
        'section' => 'travel_booking_agency_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Type', 'travel-booking-agency' ),
        'choices' => array(
            'numbers'  => __( 'Number', 'travel-booking-agency' ),
            'next-prev' => __( 'Next/Prev Button', 'travel-booking-agency' ),
    )));

    $wp_customize->add_setting( 'travel_booking_agency_post_navigation_position', array(
        'default'			=> 'bottom',
        'sanitize_callback'	=> 'travel_booking_agency_sanitize_choices'
    ));
    $wp_customize->add_control( 'travel_booking_agency_post_navigation_position', array(
        'section' => 'travel_booking_agency_blog_post',
        'type' => 'select',
        'label' => __( 'Post Navigation Position', 'travel-booking-agency' ),
        'choices' => array(
            'top'  => __( 'Top', 'travel-booking-agency' ),
            'bottom' => __( 'Bottom', 'travel-booking-agency' ),
            'both' => __( 'Both', 'travel-booking-agency' ),
    )));

    //Single Post Settings
	$wp_customize->add_section('travel_booking_agency_single_post',array(
		'title'	=> __('Single Post Settings','travel-booking-agency'),
		'panel' => 'travel_booking_agency_panel_id',
	));	

	$wp_customize->add_setting( 'travel_booking_agency_single_post_breadcrumb',array(
		'default' => true,
		'transport' => 'refresh',
      	'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ) );
    $wp_customize->add_control('travel_booking_agency_single_post_breadcrumb',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Single Post Breadcrumb','travel-booking-agency' ),
        'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_single_post_date',array(
       'default' => 'true',
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Date','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize,'travel_booking_agency_single_postdate_icon',array(
		'label'	=> __('Add Sigle Post Date Icon','travel-booking-agency'),
		'transport' => 'refresh',
		'section'	=> 'travel_booking_agency_single_post',
		'setting'	=> 'travel_booking_agency_single_postdate_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('travel_booking_agency_single_post_author',array(
       'default' => 'true',
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Author','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

   	$wp_customize->add_setting('travel_booking_agency_single_postauthor_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize,'travel_booking_agency_single_postauthor_icon',array(
		'label'	=> __('Add Sigle Post Author Icon','travel-booking-agency'),
		'transport' => 'refresh',
		'section'	=> 'travel_booking_agency_single_post',
		'setting'	=> 'travel_booking_agency_single_postauthor_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('travel_booking_agency_single_post_comment_no',array(
       'default' => 'true',
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_single_post_comment_no',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment Number','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_single_postcomment_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize,'travel_booking_agency_single_postcomment_icon',array(
		'label'	=> __('Add Sigle Post Comment Icon','travel-booking-agency'),
		'transport' => 'refresh',
		'section'	=> 'travel_booking_agency_single_post',
		'setting'	=> 'travel_booking_agency_single_postcomment_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('travel_booking_agency_single_post_time',array(
       'default' => 'true',
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Time','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_single_posttime_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize,'travel_booking_agency_single_posttime_icon',array(
		'label'	=> __('Add Sigle Post Time Icon','travel-booking-agency'),
		'transport' => 'refresh',
		'section'	=> 'travel_booking_agency_single_post',
		'setting'	=> 'travel_booking_agency_single_posttime_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('travel_booking_agency_feature_image',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_feature_image',array(
       'type' => 'checkbox',
       'label' => __(' Show / Hide Single Post Image','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting( 'travel_booking_agency_single_post_img_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float',
	) );
	$wp_customize->add_control( 'travel_booking_agency_single_post_img_border_radius', array(
		'label'       => esc_html__( 'Single Post Image Border Radius','travel-booking-agency' ),
		'section'     => 'travel_booking_agency_single_post',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 100,
		),
	) );

	$wp_customize->add_setting( 'travel_booking_agency_single_post_img_box_shadow',array(
		'default' => 0,
		'sanitize_callback'    => 'travel_booking_agency_sanitize_float',
	));
	$wp_customize->add_control('travel_booking_agency_single_post_img_box_shadow',array(
		'label' => esc_html__( 'Single Post Image Shadow','travel-booking-agency' ),
		'section' => 'travel_booking_agency_single_post',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type' => 'number'
	));

	$wp_customize->add_setting('travel_booking_agency_single_post_metabox_seperator',array(
       'default' => '|',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_single_post_metabox_seperator',array(
       'type' => 'text',
       'label' => __('Metabox Seperator','travel-booking-agency'),
       'description' => __('Ex: "/", "|", "-", ...','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

     $wp_customize->add_setting('travel_booking_agency_show_hide_single_post_categories',array(
		'default' => true,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
 	));
 	$wp_customize->add_control('travel_booking_agency_show_hide_single_post_categories',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Single Post Categories','travel-booking-agency'),
		'section' => 'travel_booking_agency_single_post'
	));

	$wp_customize->add_setting('travel_booking_agency_category_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_category_color', array(
		'label'    => __('Category Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_single_post',
	)));

	$wp_customize->add_setting('travel_booking_agency_category_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_category_background_color', array(
		'label'    => __('Category Background Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_single_post',
	)));

    $wp_customize->add_setting('travel_booking_agency_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_tags',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Tags','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_comment',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Single Post Comment','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    
    $wp_customize->add_setting( 'travel_booking_agency_comment_width', array(
		'default' => 100,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	) );
	$wp_customize->add_control( 'travel_booking_agency_comment_width', array(
		'label' => __( 'Comment Textarea Width', 'travel-booking-agency'),
		'section' => 'travel_booking_agency_single_post',
		'type' => 'number',
		'settings' => 'travel_booking_agency_comment_width',
		'input_attrs' => array(
			'step' => 1,
			'min' => 0,
			'max' => 100,
		),
	) );

    $wp_customize->add_setting('travel_booking_agency_comment_title',array(
       'default' => __('Leave a Reply','travel-booking-agency'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_comment_title',array(
       'type' => 'text',
       'label' => __('Comment form Title','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_comment_submit_text',array(
       'default' => __('Post Comment','travel-booking-agency'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_comment_submit_text',array(
       'type' => 'text',
       'label' => __('Comment Button Text','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_nav_links',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_nav_links',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Nav Links','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_prev_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_prev_text',array(
       'type' => 'text',
       'label' => __('Previous Navigation Text','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_next_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_next_text',array(
       'type' => 'text',
       'label' => __('Next Navigation Text','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_related_posts',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_related_posts',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related Posts','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting('travel_booking_agency_related_posts_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_related_posts_title',array(
       'type' => 'text',
       'label' => __('Related Posts Title','travel-booking-agency'),
       'section' => 'travel_booking_agency_single_post'
    ));

    $wp_customize->add_setting( 'travel_booking_agency_related_post_count', array(
		'default' => 3,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	) );
	$wp_customize->add_control( 'travel_booking_agency_related_post_count', array(
		'label' => esc_html__( 'Related Posts Count','travel-booking-agency' ),
		'section' => 'travel_booking_agency_single_post',
		'type' => 'number',
		'settings' => 'travel_booking_agency_related_post_count',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 6,
		),
	) );

    $wp_customize->add_setting( 'travel_booking_agency_post_order', array(
        'default' => 'categories',
        'sanitize_callback'	=> 'travel_booking_agency_sanitize_choices'
    ));
    $wp_customize->add_control( 'travel_booking_agency_post_order', array(
        'section' => 'travel_booking_agency_single_post',
        'type' => 'radio',
        'label' => __( 'Related Posts Order By', 'travel-booking-agency' ),
        'choices' => array(
            'categories' => __('Categories', 'travel-booking-agency'),
            'tags' => __( 'Tags', 'travel-booking-agency' ),
    )));

    //404 page settings
	$wp_customize->add_section('travel_booking_agency_404_page',array(
		'title'	=> __('404 & No Result Page Settings','travel-booking-agency'),
		'priority'	=> null,
		'panel' => 'travel_booking_agency_panel_id',
	));

	$wp_customize->add_setting('travel_booking_agency_404_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_404_title',array(
       'type' => 'text',
       'label' => __('404 Page Title','travel-booking-agency'),
       'section' => 'travel_booking_agency_404_page'
    ));

    $wp_customize->add_setting('travel_booking_agency_404_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_404_text',array(
       'type' => 'text',
       'label' => __('404 Page Text','travel-booking-agency'),
       'section' => 'travel_booking_agency_404_page'
    ));

    $wp_customize->add_setting('travel_booking_agency_404_button_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_404_button_text',array(
       'type' => 'text',
       'label' => __('404 Page Button Text','travel-booking-agency'),
       'section' => 'travel_booking_agency_404_page'
    ));

    $wp_customize->add_setting('travel_booking_agency_no_result_title',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_no_result_title',array(
       'type' => 'text',
       'label' => __('No Result Page Title','travel-booking-agency'),
       'section' => 'travel_booking_agency_404_page'
    ));

    $wp_customize->add_setting('travel_booking_agency_no_result_text',array(
       'default' => '',
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('travel_booking_agency_no_result_text',array(
       'type' => 'text',
       'label' => __('No Result Page Text','travel-booking-agency'),
       'section' => 'travel_booking_agency_404_page'
    ));

    $wp_customize->add_setting('travel_booking_agency_show_search_form',array(
        'default' => true,
        'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_show_search_form',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Search Form','travel-booking-agency'),
      	'section' => 'travel_booking_agency_404_page',
	));

	//Footer
	$wp_customize->add_section('travel_booking_agency_footer_section',array(
		'title'	=> __('Footer Section','travel-booking-agency'),
		'priority'	=> null,
		'panel' => 'travel_booking_agency_panel_id',
	));

	$wp_customize->selective_refresh->add_partial(
		'travel_booking_agency_show_back_to_top',
		array(
			'selector'        => '.scrollup',
			'render_callback' => 'travel_booking_agency_customize_partial_travel_booking_agency_show_back_to_top',
		)
	);

	$wp_customize->add_setting('travel_booking_agency_show_back_to_top',array(
        'default' => 'true',
        'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show/Hide Back to Top Button','travel-booking-agency'),
      	'section' => 'travel_booking_agency_footer_section',
	));

	$wp_customize->add_setting('travel_booking_agency_back_to_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize, 'travel_booking_agency_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('travel_booking_agency_scroll_icon_font_size',array(
		'default'=> 18,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','travel-booking-agency'),
		'section'=> 'travel_booking_agency_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	));

	$wp_customize->add_setting('travel_booking_agency_scroll_icon_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_scroll_icon_color', array(
		'label'    => __('Back To Top Icon Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_footer_section',
	)));

	$wp_customize->add_setting('travel_booking_agency_back_to_top_text',array(
		'default'	=> __('Back to Top','travel-booking-agency'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('travel_booking_agency_back_to_top_text',array(
		'label'	=> __('Back to Top Button Text','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_footer_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('travel_booking_agency_back_to_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_back_to_top_alignment',array(
        'type' => 'select',
        'label' => __('Back to Top Button Alignment','travel-booking-agency'),
        'section' => 'travel_booking_agency_footer_section',
        'choices' => array(
            'Left' => __('Left','travel-booking-agency'),
            'Right' => __('Right','travel-booking-agency'),
            'Center' => __('Center','travel-booking-agency'),
        ),
	) );

	$wp_customize->add_setting( 'travel_booking_agency_footer_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_footer_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Footer','travel-booking-agency' ),
      'section' => 'travel_booking_agency_footer_section'
    ));

	$wp_customize->add_setting('travel_booking_agency_footer_background_color', array(
		'default'           => '#000',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_footer_background_color', array(
		'label'    => __('Footer Background Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_footer_section',
	)));

	$wp_customize->add_setting('travel_booking_agency_footer_background_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'travel_booking_agency_footer_background_img',array(
        'label' => __('Footer Background Image','travel-booking-agency'),
        'section' => 'travel_booking_agency_footer_section'
	)));

	$wp_customize->add_setting('travel_booking_agency_footer_widget_layout',array(
        'default'           => '4',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices',
    ));
    $wp_customize->add_control('travel_booking_agency_footer_widget_layout',array(
        'type' => 'radio',
        'label'  => __('Footer widget layout', 'travel-booking-agency'),
        'section'     => 'travel_booking_agency_footer_section',
        'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'travel-booking-agency'),
        'choices' => array(
            '1'     => __('One', 'travel-booking-agency'),
            '2'     => __('Two', 'travel-booking-agency'),
            '3'     => __('Three', 'travel-booking-agency'),
            '4'     => __('Four', 'travel-booking-agency')
        ),
    ));

    $wp_customize->add_setting('travel_booking_agency_footer_widgets_heading',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_footer_widgets_heading',array(
    'type' => 'select',
    'label' => __('Footer Widget Heading Alignment','travel-booking-agency'),
    'section' => 'travel_booking_agency_footer_section',
    'choices' => array(
    	'Left' => __('Left','travel-booking-agency'),
        'Center' => __('Center','travel-booking-agency'),
        'Right' => __('Right','travel-booking-agency')
      ),
	) );

	$wp_customize->add_setting('travel_booking_agency_footer_widgets_content',array(
    'default' => 'Left',
    'transport' => 'refresh',
    'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_footer_widgets_content',array(
    'type' => 'select',
    'label' => __('Footer Widget Content Alignment','travel-booking-agency'),
    'section' => 'travel_booking_agency_footer_section',
    'choices' => array(
    	'Left' => __('Left','travel-booking-agency'),
        'Center' => __('Center','travel-booking-agency'),
        'Right' => __('Right','travel-booking-agency')
        ),
	) );

    $wp_customize->add_setting( 'travel_booking_agency_copyright_hide_show',array(
      'default' => 'true',
      'sanitize_callback' => 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_copyright_hide_show',array(
    	'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Copyright','travel-booking-agency' ),
      'section' => 'travel_booking_agency_footer_section'
    ));

    $wp_customize->add_setting('travel_booking_agency_copyright_alignment',array(
        'default' => 'Center',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_copyright_alignment',array(
        'type' => 'select',
        'label' => __('Copyright Alignment','travel-booking-agency'),
        'section' => 'travel_booking_agency_footer_section',
        'choices' => array(
            'Left' => __('Left','travel-booking-agency'),
            'Right' => __('Right','travel-booking-agency'),
            'Center' => __('Center','travel-booking-agency'),
        ),
	) );

	$wp_customize->add_setting('travel_booking_agency_copyright_color', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_copyright_color', array(
		'label'    => __('Copyright Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_footer_section',
	)));

	$wp_customize->add_setting('travel_booking_agency_copyright__hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_copyright__hover_color', array(
		'label'    => __('Copyright Hover Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_footer_section',
	)));

	$wp_customize->add_setting('travel_booking_agency_copyright_background_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_booking_agency_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'travel-booking-agency'),
		'section'  => 'travel_booking_agency_footer_section',
	)));

	$wp_customize->add_setting('travel_booking_agency_copyright_fontsize',array(
		'default'	=> 16,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float',
	));	
	$wp_customize->add_control('travel_booking_agency_copyright_fontsize',array(
		'label'	=> __('Copyright Font Size','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_footer_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('travel_booking_agency_copyright_top_bottom_padding',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float',
	));	
	$wp_customize->add_control('travel_booking_agency_copyright_top_bottom_padding',array(
		'label'	=> __('Copyright Top Bottom Padding','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_footer_section',
		'type'		=> 'number'
	));

    $wp_customize->selective_refresh->add_partial(
		'travel_booking_agency_footer_copy',
		array(
			'selector'        => '#footer p',
			'render_callback' => 'travel_booking_agency_customize_partial_travel_booking_agency_footer_copy',
		)
	);
	
	$wp_customize->add_setting('travel_booking_agency_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));	
	$wp_customize->add_control('travel_booking_agency_footer_copy',array(
		'label'	=> __('Copyright Text','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_footer_section',
		'type'		=> 'text'
	));

	//Mobile Media Section
	$wp_customize->add_section( 'travel_booking_agency_mobile_media_options' , array(
    	'title'      => __( 'Mobile Media Options', 'travel-booking-agency' ),
		'priority'   => null,
		'panel' => 'travel_booking_agency_panel_id'
	) );

	$wp_customize->add_setting('travel_booking_agency_responsive_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize, 'travel_booking_agency_responsive_open_menu_icon',array(
		'label'	=> __('Open Menu Icon','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('travel_booking_agency_responsive_close_menu_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new travel_booking_agency_Icon_Changer(
        $wp_customize, 'travel_booking_agency_responsive_close_menu_icon',array(
		'label'	=> __('Close Menu Icon','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_mobile_media_options',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('travel_booking_agency_hide_topbar_responsive',array(
		'default' => true,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_hide_topbar_responsive',array(
     	'type' => 'checkbox',
		'label' => __('Show / Hide Topbar','travel-booking-agency'),
		'section' => 'travel_booking_agency_mobile_media_options',
	));

	$wp_customize->add_setting('travel_booking_agency_slider_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_slider_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider','travel-booking-agency'),
      	'section' => 'travel_booking_agency_mobile_media_options',
	));

	$wp_customize->add_setting('travel_booking_agency_slider_button_responsive',array(
        'default' => true,
        'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_slider_button_responsive',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Slider Button','travel-booking-agency'),
      	'section' => 'travel_booking_agency_mobile_media_options',
	));

    $wp_customize->add_setting('travel_booking_agency_responsive_show_back_to_top',array(
        'default' => true,
        'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
	));
	$wp_customize->add_control('travel_booking_agency_responsive_show_back_to_top',array(
     	'type' => 'checkbox',
      	'label' => __('Show / Hide Back to Top Button','travel-booking-agency'),
      	'section' => 'travel_booking_agency_mobile_media_options',
	));

	$wp_customize->add_setting( 'travel_booking_agency_responsive_preloader_hide',array(
		'default' => false,
      	'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ) );
    $wp_customize->add_control('travel_booking_agency_responsive_preloader_hide',array(
    	'type' => 'checkbox',
        'label' => __( 'Show / Hide Preloader','travel-booking-agency' ),
        'section' => 'travel_booking_agency_mobile_media_options'
    ));

    $wp_customize->add_setting( 'travel_booking_agency_sidebar_hide_show',array(
      'default' => true,
      'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_sidebar_hide_show',array(
      'type' => 'checkbox',
      'label' => esc_html__( 'Show / Hide Sidebar','travel-booking-agency' ),
      'section' => 'travel_booking_agency_mobile_media_options'
    ));

	//content layout
	$wp_customize->add_setting('travel_booking_agency_slider_content_alignment',array(
    	'default' => 'Center',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_slider_content_alignment',array(
        'type' => 'radio',
        'label' => __('Slider Content Alignment','travel-booking-agency'),
        'section' => 'travel_booking_agency_slidersettings',
        'choices' => array(
            'Center' => __('Center','travel-booking-agency'),
            'Left' => __('Left','travel-booking-agency'),
            'Right' => __('Right','travel-booking-agency'),
        ),
	) );

	//Slider excerpt
	$wp_customize->add_setting( 'travel_booking_agency_slider_excerpt_length', array(
		'default'              => 20,
		'sanitize_callback'    => 'travel_booking_agency_sanitize_float',
	) );
	$wp_customize->add_control( 'travel_booking_agency_slider_excerpt_length', array(
		'label'       => esc_html__( 'Slider Excerpt length','travel-booking-agency' ),
		'section'     => 'travel_booking_agency_slidersettings',
		'type'        => 'number',
		'settings'    => 'travel_booking_agency_slider_excerpt_length',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'travel_booking_agency_slider_height', array(
		'default'          => '',
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	) );
	$wp_customize->add_control( 'travel_booking_agency_slider_height', array(
		'label' => esc_html__( 'Slider Height','travel-booking-agency' ),
		'section' => 'travel_booking_agency_slidersettings',
		'type'    => 'number',
		'description' => __('Measurement is in pixel.','travel-booking-agency'),
		'input_attrs' => array(
			'step' => 1,
			'min'  => 500,
			'max'  => 1000,
		),
	) );

	//Woocommerce Section
	$wp_customize->add_section( 'travel_booking_agency_woocommerce_options' , array(
    	'title'      => __( 'Additional WooCommerce Options', 'travel-booking-agency' ),
		'priority'   => null,
		'panel' => 'travel_booking_agency_panel_id'
	) );

	// Product Columns
	$wp_customize->add_setting( 'travel_booking_agency_products_per_row' , array(
		'default'           => '3',
		'sanitize_callback' => 'travel_booking_agency_sanitize_choices',
	) );

	$wp_customize->add_control('travel_booking_agency_products_per_row', array(
		'label' => __( 'Product per row', 'travel-booking-agency' ),
		'section'  => 'travel_booking_agency_woocommerce_options',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
		),
	) );

	$wp_customize->add_setting('travel_booking_agency_product_per_page',array(
		'default'	=> '9',
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_float'
	));	
	$wp_customize->add_control('travel_booking_agency_product_per_page',array(
		'label'	=> __('Product per page','travel-booking-agency'),
		'section'	=> 'travel_booking_agency_woocommerce_options',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('travel_booking_agency_shop_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_shop_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page sidebar','travel-booking-agency'),
       'section' => 'travel_booking_agency_woocommerce_options',
    ));

    // shop page sidebar alignment
    $wp_customize->add_setting('travel_booking_agency_shop_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'travel_booking_agency_sanitize_choices',
	));
	$wp_customize->add_control('travel_booking_agency_shop_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Shop Page layout', 'travel-booking-agency'),
		'section'        => 'travel_booking_agency_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'travel-booking-agency'),
			'Right Sidebar' => __('Right Sidebar', 'travel-booking-agency'),
		),
	));

	// single product page sidebar
	$wp_customize->add_setting( 'travel_booking_agency_wocommerce_single_page_sidebar',array(
		'default' => true,
		'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ) );
    $wp_customize->add_control('travel_booking_agency_wocommerce_single_page_sidebar',array(
    	'type' => 'checkbox',
       	'label' => __('Enable / Disable Single Product Page Sidebar','travel-booking-agency'),
		'section' => 'travel_booking_agency_woocommerce_options'
    ));

    // single product page sidebar alignment
    $wp_customize->add_setting('travel_booking_agency_single_product_page_layout', array(
		'default'           => 'Right Sidebar',
		'sanitize_callback' => 'travel_booking_agency_sanitize_choices',
	));
	$wp_customize->add_control('travel_booking_agency_single_product_page_layout',array(
		'type'           => 'radio',
		'label'          => __('Single product Page layout', 'travel-booking-agency'),
		'section'        => 'travel_booking_agency_woocommerce_options',
		'choices'        => array(
			'Left Sidebar'  => __('Left Sidebar', 'travel-booking-agency'),
			'Right Sidebar' => __('Right Sidebar', 'travel-booking-agency'),
		),
	));

	$wp_customize->add_setting('travel_booking_agency_shop_page_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_shop_page_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Shop page pagination','travel-booking-agency'),
       'section' => 'travel_booking_agency_woocommerce_options',
    ));

    $wp_customize->add_setting('travel_booking_agency_product_page_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_product_page_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Product page sidebar','travel-booking-agency'),
       'section' => 'travel_booking_agency_woocommerce_options',
    ));

    $wp_customize->add_setting('travel_booking_agency_related_product',array(
       'default' => true,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_related_product',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','travel-booking-agency'),
       'section' => 'travel_booking_agency_woocommerce_options',
    ));

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_button_padding_top',array(
		'default' => 10,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control( 'travel_booking_agency_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_button_padding_right',array(
	 	'default' => 20,
	 	'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_woocommerce_button_padding_right',	array(
	 	'label' => esc_html__( 'Button Right Left Padding','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_button_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

    $wp_customize->add_setting('travel_booking_agency_woocommerce_product_border',array(
       'default' => false,
       'sanitize_callback'	=> 'travel_booking_agency_sanitize_checkbox'
    ));
    $wp_customize->add_control('travel_booking_agency_woocommerce_product_border',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product border','travel-booking-agency'),
       'section' => 'travel_booking_agency_woocommerce_options',
    ));

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_product_padding_top',array(
		'default' => 0,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_woocommerce_product_padding_top', array(
		'label' => esc_html__( 'Product Top Bottom Padding','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_product_padding_right',array(
		'default' => 0,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_woocommerce_product_padding_right', array(
		'label' => esc_html__( 'Product Right Left Padding','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_product_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_product_box_shadow',array(
		'default' => 0,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control( 'travel_booking_agency_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting('travel_booking_agency_sale_position',array(
        'default' => 'left',
        'sanitize_callback' => 'travel_booking_agency_sanitize_choices'
	));
	$wp_customize->add_control('travel_booking_agency_sale_position',array(
        'type' => 'select',
        'label' => __('Sale badge Position','travel-booking-agency'),
        'section' => 'travel_booking_agency_woocommerce_options',
        'choices' => array(
            'left' => __('Left','travel-booking-agency'),
            'right' => __('Right','travel-booking-agency'),
        ),
	) );

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_sale_top_padding',array(
		'default' => 5,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control( 'travel_booking_agency_woocommerce_sale_top_padding',	array(
		'label' => esc_html__( 'Sale Top Bottom Padding','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_sale_left_padding',array(
	 	'default' => 0,
	 	'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_woocommerce_sale_left_padding',	array(
	 	'label' => esc_html__( 'Sale Right Left Padding','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
	 	'input_attrs' => array(
			'min' => 0,
			'max' => 50,
	 		'step' => 1,
		),
	));

	$wp_customize->add_setting( 'travel_booking_agency_woocommerce_sale_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_woocommerce_sale_border_radius',array(
		'label' => esc_html__( 'Sale Border Radius','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));

	$wp_customize->add_setting( 'travel_booking_agency_product_sale_font_size',array(
		'default' => '',
		'sanitize_callback' => 'travel_booking_agency_sanitize_float'
	));
	$wp_customize->add_control('travel_booking_agency_product_sale_font_size',array(
		'label' => esc_html__( 'Sale Font Size','travel-booking-agency' ),
		'type' => 'number',
		'section' => 'travel_booking_agency_woocommerce_options',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	));
}
add_action( 'customize_register', 'travel_booking_agency_customize_register' );

// logo resize
load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-width.php' );


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class travel_booking_agency_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );
		
		// Register custom section types.
		$manager->register_section_type( 'travel_booking_agency_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new travel_booking_agency_Customize_Section_Pro(
				$manager,
				'travel_booking_agency_example_1',
				array(
					'priority' => 9,
					'title'    => esc_html__( 'Travel Booking Pro', 'travel-booking-agency' ),
					'pro_text' => esc_html__( 'Go Pro','travel-booking-agency' ),
					'pro_url'  => esc_url( 'https://www.themescaliber.com/themes/travel-booking-wordpress-theme/' ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'travel-booking-agency-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'travel-booking-agency-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
travel_booking_agency_Customize::get_instance();