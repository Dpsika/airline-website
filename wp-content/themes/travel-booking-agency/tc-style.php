<?php 
	$travel_booking_agency_custom_css ='';

	/*----------------Width Layout -------------------*/
	$travel_booking_agency_theme_lay = get_theme_mod( 'travel_booking_agency_width_options','Full Layout');
    if($travel_booking_agency_theme_lay == 'Full Layout'){
		$travel_booking_agency_custom_css .='body{';
			$travel_booking_agency_custom_css .='max-width: 100%;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == 'Contained Layout'){
		$travel_booking_agency_custom_css .='body{';
			$travel_booking_agency_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == 'Boxed Layout'){
		$travel_booking_agency_custom_css .='body{';
			$travel_booking_agency_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$travel_booking_agency_custom_css .='}';
		$travel_booking_agency_custom_css .='div.header-menu-box, .header-menu-box:after{';
			$travel_booking_agency_custom_css .='box-shadow:none !important;';
		$travel_booking_agency_custom_css .='}';
	}

	/*------ Button Style -------*/
	$travel_booking_agency_top_buttom_padding = get_theme_mod('travel_booking_agency_top_button_padding');
	$travel_booking_agency_left_right_padding = get_theme_mod('travel_booking_agency_left_button_padding');
	if($travel_booking_agency_top_buttom_padding != false || $travel_booking_agency_left_right_padding != false ){
		$travel_booking_agency_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
			$travel_booking_agency_custom_css .='padding-top: '.esc_attr($travel_booking_agency_top_buttom_padding).'px; padding-bottom: '.esc_attr($travel_booking_agency_top_buttom_padding).'px; padding-left: '.esc_attr($travel_booking_agency_left_right_padding).'px; padding-right: '.esc_attr($travel_booking_agency_left_right_padding).'px;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_button_border_radius = get_theme_mod('travel_booking_agency_button_border_radius');
	$travel_booking_agency_custom_css .='.read-btn a.blogbutton-small, #comments input[type="submit"].submit{';
		$travel_booking_agency_custom_css .='border-radius: '.esc_attr($travel_booking_agency_button_border_radius).'px;';
	$travel_booking_agency_custom_css .='}';

	/*-------------- Woocommerce Button  -------------------*/

	$travel_booking_agency_woocommerce_button_padding_top = get_theme_mod('travel_booking_agency_woocommerce_button_padding_top');
	if($travel_booking_agency_woocommerce_button_padding_top != false){
		$travel_booking_agency_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$travel_booking_agency_custom_css .='padding-top: '.esc_attr($travel_booking_agency_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($travel_booking_agency_woocommerce_button_padding_top).'px;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_woocommerce_button_padding_right = get_theme_mod('travel_booking_agency_woocommerce_button_padding_right');
	if($travel_booking_agency_woocommerce_button_padding_right != false){
		$travel_booking_agency_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$travel_booking_agency_custom_css .='padding-left: '.esc_attr($travel_booking_agency_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($travel_booking_agency_woocommerce_button_padding_right).'px;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_woocommerce_button_border_radius = get_theme_mod('travel_booking_agency_woocommerce_button_border_radius');
	if($travel_booking_agency_woocommerce_button_border_radius != false){
		$travel_booking_agency_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce button.button.alt, a.button.wc-forward, .woocommerce .cart .button, .woocommerce .cart input.button{';
			$travel_booking_agency_custom_css .='border-radius: '.esc_attr($travel_booking_agency_woocommerce_button_border_radius).'px;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_related_product = get_theme_mod('travel_booking_agency_related_product',true);

	if($travel_booking_agency_related_product == false){
		$travel_booking_agency_custom_css .='.related.products{';
			$travel_booking_agency_custom_css .='display: none;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_woocommerce_product_border = get_theme_mod('travel_booking_agency_woocommerce_product_border',false);

	if($travel_booking_agency_woocommerce_product_border == true){
		$travel_booking_agency_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$travel_booking_agency_custom_css .='border: 1px solid #ddd;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_woocommerce_product_padding_top = get_theme_mod('travel_booking_agency_woocommerce_product_padding_top',0);
		$travel_booking_agency_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$travel_booking_agency_custom_css .='padding-top: '.esc_attr($travel_booking_agency_woocommerce_product_padding_top).'px; padding-bottom: '.esc_attr($travel_booking_agency_woocommerce_product_padding_top).'px;';
		$travel_booking_agency_custom_css .='}';

	$travel_booking_agency_woocommerce_product_padding_right = get_theme_mod('travel_booking_agency_woocommerce_product_padding_right',0);
		$travel_booking_agency_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$travel_booking_agency_custom_css .='padding-left: '.esc_attr($travel_booking_agency_woocommerce_product_padding_right).'px; padding-right: '.esc_attr($travel_booking_agency_woocommerce_product_padding_right).'px;';
		$travel_booking_agency_custom_css .='}';

	$travel_booking_agency_woocommerce_product_border_radius = get_theme_mod('travel_booking_agency_woocommerce_product_border_radius');
	if($travel_booking_agency_woocommerce_product_border_radius != false){
		$travel_booking_agency_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$travel_booking_agency_custom_css .='border-radius: '.esc_attr($travel_booking_agency_woocommerce_product_border_radius).'px;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_woocommerce_product_box_shadow = get_theme_mod('travel_booking_agency_woocommerce_product_box_shadow');
	if($travel_booking_agency_woocommerce_product_box_shadow != false){
		$travel_booking_agency_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$travel_booking_agency_custom_css .='box-shadow: '.esc_attr($travel_booking_agency_woocommerce_product_box_shadow).'px '.esc_attr($travel_booking_agency_woocommerce_product_box_shadow).'px '.esc_attr($travel_booking_agency_woocommerce_product_box_shadow).'px #aaa;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_product_sale_font_size = get_theme_mod('travel_booking_agency_product_sale_font_size');
	$travel_booking_agency_custom_css .='.woocommerce span.onsale {';
		$travel_booking_agency_custom_css .='font-size: '.esc_attr($travel_booking_agency_product_sale_font_size).'px;';
	$travel_booking_agency_custom_css .='}';

	// Breadcrumb color option
	$travel_booking_agency_breadcrumb_color = get_theme_mod('travel_booking_agency_breadcrumb_color');
	$travel_booking_agency_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_breadcrumb_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	// Breadcrumb bg color option
	$travel_booking_agency_breadcrumb_background_color = get_theme_mod('travel_booking_agency_breadcrumb_background_color');
	$travel_booking_agency_custom_css .='.bradcrumbs a,.bradcrumbs span{';
		$travel_booking_agency_custom_css .='background-color: '.esc_attr($travel_booking_agency_breadcrumb_background_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	// Breadcrumb hover color option
	$travel_booking_agency_breadcrumb_hover_color = get_theme_mod('travel_booking_agency_breadcrumb_hover_color');
	$travel_booking_agency_custom_css .='.bradcrumbs a:hover{';
		$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_breadcrumb_hover_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	// Breadcrumb hover bg color option
	$travel_booking_agency_breadcrumb_hover_bg_color = get_theme_mod('travel_booking_agency_breadcrumb_hover_bg_color');
	$travel_booking_agency_custom_css .='.bradcrumbs a:hover{';
		$travel_booking_agency_custom_css .='background-color: '.esc_attr($travel_booking_agency_breadcrumb_hover_bg_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	// Category color option
	$travel_booking_agency_category_color = get_theme_mod('travel_booking_agency_category_color');
	$travel_booking_agency_custom_css .='.tc-single-category a{';
		$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_category_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	// Category bg color option
	$travel_booking_agency_category_background_color = get_theme_mod('travel_booking_agency_category_background_color');
	$travel_booking_agency_custom_css .='.tc-single-category a{';
		$travel_booking_agency_custom_css .='background-color: '.esc_attr($travel_booking_agency_category_background_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	/*---- Preloader Color ----*/
	$travel_booking_agency_preloader_color = get_theme_mod('travel_booking_agency_preloader_color');
	$travel_booking_agency_preloader_bg_color = get_theme_mod('travel_booking_agency_preloader_bg_color');

	if($travel_booking_agency_preloader_color != false){
		$travel_booking_agency_custom_css .='.preloader-squares .square, .preloader-chasing-squares .square{';
			$travel_booking_agency_custom_css .='background-color: '.esc_attr($travel_booking_agency_preloader_color).';';
		$travel_booking_agency_custom_css .='}';
	}
	if($travel_booking_agency_preloader_bg_color != false){
		$travel_booking_agency_custom_css .='.preloader{';
			$travel_booking_agency_custom_css .='background-color: '.esc_attr($travel_booking_agency_preloader_bg_color).';';
		$travel_booking_agency_custom_css .='}';
	}

	// menu color
	$travel_booking_agency_menu_color = get_theme_mod('travel_booking_agency_menu_color');

	$travel_booking_agency_custom_css .='.primary-navigation a,.primary-navigation .current_page_item > a, .primary-navigation .current-menu-item > a, .primary-navigation .current_page_ancestor > a{';
			$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_menu_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	// menu hover color
	$travel_booking_agency_menu_hover_color = get_theme_mod('travel_booking_agency_menu_hover_color');
	$travel_booking_agency_custom_css .='.primary-navigation a:hover, .primary-navigation ul li a:hover, .primary-navigation ul.sub-menu a:hover, .primary-navigation ul.sub-menu li a:hover{';
			$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_menu_hover_color).' !important;';
	$travel_booking_agency_custom_css .='}';

	// Submenu color
	$travel_booking_agency_submenu_menu_color = get_theme_mod('travel_booking_agency_submenu_menu_color');
	$travel_booking_agency_custom_css .='.primary-navigation ul.sub-menu a, .primary-navigation ul.sub-menu li a{';
			$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_submenu_menu_color).' !important;';
	$travel_booking_agency_custom_css .='}';

	// Submenu Hover Color Option
	$travel_booking_agency_submenu_hover_color = get_theme_mod('travel_booking_agency_submenu_hover_color');
	$travel_booking_agency_custom_css .='.primary-navigation ul.sub-menu li a:hover  {';
	$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_submenu_hover_color).'!important;';
	$travel_booking_agency_custom_css .='} ';

	/*-------- Scrollup icon css -------*/
	$travel_booking_agency_scroll_icon_font_size = get_theme_mod('travel_booking_agency_scroll_icon_font_size', 18);
	$travel_booking_agency_custom_css .='.scrollup{';
		$travel_booking_agency_custom_css .='font-size: '.esc_attr($travel_booking_agency_scroll_icon_font_size).'px;';
	$travel_booking_agency_custom_css .='}';

	$travel_booking_agency_scroll_icon_color = get_theme_mod('travel_booking_agency_scroll_icon_color');
	$travel_booking_agency_custom_css .='.scrollup{';
		$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_scroll_icon_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	/*---- Copyright css ----*/
	$travel_booking_agency_copyright_fontsize = get_theme_mod('travel_booking_agency_copyright_fontsize',16);
	if($travel_booking_agency_copyright_fontsize != false){
		$travel_booking_agency_custom_css .='#footer p{';
			$travel_booking_agency_custom_css .='font-size: '.esc_attr($travel_booking_agency_copyright_fontsize).'px; ';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_copyright_top_bottom_padding = get_theme_mod('travel_booking_agency_copyright_top_bottom_padding',15);
	if($travel_booking_agency_copyright_top_bottom_padding != false){
		$travel_booking_agency_custom_css .='#footer {';
			$travel_booking_agency_custom_css .='padding-top:'.esc_attr($travel_booking_agency_copyright_top_bottom_padding).'px; padding-bottom: '.esc_attr($travel_booking_agency_copyright_top_bottom_padding).'px; ';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_copyright_alignment = get_theme_mod( 'travel_booking_agency_copyright_alignment','Center');
    if($travel_booking_agency_copyright_alignment == 'Left'){
		$travel_booking_agency_custom_css .='#footer p{';
			$travel_booking_agency_custom_css .='text-align:start;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_copyright_alignment == 'Center'){
		$travel_booking_agency_custom_css .='#footer p{';
			$travel_booking_agency_custom_css .='text-align:center;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_copyright_alignment == 'Right'){
		$travel_booking_agency_custom_css .='#footer p{';
			$travel_booking_agency_custom_css .='text-align:end;';
		$travel_booking_agency_custom_css .='}';
	}

	/*------- Wocommerce sale css -----*/
	$travel_booking_agency_woocommerce_sale_top_padding = get_theme_mod('travel_booking_agency_woocommerce_sale_top_padding',0);
	$travel_booking_agency_woocommerce_sale_left_padding = get_theme_mod('travel_booking_agency_woocommerce_sale_left_padding',0);
	$travel_booking_agency_custom_css .=' .woocommerce span.onsale{';
		$travel_booking_agency_custom_css .='padding-top: '.esc_attr($travel_booking_agency_woocommerce_sale_top_padding).'px; padding-bottom: '.esc_attr($travel_booking_agency_woocommerce_sale_top_padding).'px; padding-left: '.esc_attr($travel_booking_agency_woocommerce_sale_left_padding).'px; padding-right: '.esc_attr($travel_booking_agency_woocommerce_sale_left_padding).'px;';
	$travel_booking_agency_custom_css .='}';

	$travel_booking_agency_woocommerce_sale_border_radius = get_theme_mod('travel_booking_agency_woocommerce_sale_border_radius', 5);
	$travel_booking_agency_custom_css .='.woocommerce span.onsale{';
		$travel_booking_agency_custom_css .='border-radius: '.esc_attr($travel_booking_agency_woocommerce_sale_border_radius).'px;';
	$travel_booking_agency_custom_css .='}';

	$travel_booking_agency_sale_position = get_theme_mod( 'travel_booking_agency_sale_position','left');
    if($travel_booking_agency_sale_position == 'left'){
		$travel_booking_agency_custom_css .='.woocommerce ul.products li.product span.onsale{';
			$travel_booking_agency_custom_css .='left: 0; right: auto;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_sale_position == 'right'){
		$travel_booking_agency_custom_css .='.woocommerce ul.products li.product span.onsale{';
			$travel_booking_agency_custom_css .='left: auto; right: 0;';
		$travel_booking_agency_custom_css .='}';
	}

	/*-------- footer background css -------*/
	$travel_booking_agency_footer_background_color = get_theme_mod('travel_booking_agency_footer_background_color');
	$travel_booking_agency_custom_css .='.footertown{';
		$travel_booking_agency_custom_css .='background-color: '.esc_attr($travel_booking_agency_footer_background_color).';';
	$travel_booking_agency_custom_css .='}';

	$travel_booking_agency_footer_background_img = get_theme_mod('travel_booking_agency_footer_background_img');
	if($travel_booking_agency_footer_background_img != false){
		$travel_booking_agency_custom_css .='.footertown{';
			$travel_booking_agency_custom_css .='background: url('.esc_attr($travel_booking_agency_footer_background_img).') no-repeat; background-size: cover; background-attachment: fixed;';
		$travel_booking_agency_custom_css .='}';
	}

	/*---- Comment form ----*/
	$travel_booking_agency_comment_width = get_theme_mod('travel_booking_agency_comment_width', '100');
	$travel_booking_agency_custom_css .='#comments textarea{';
		$travel_booking_agency_custom_css .=' width:'.esc_attr($travel_booking_agency_comment_width).'%;';
	$travel_booking_agency_custom_css .='}';

	$travel_booking_agency_comment_submit_text = get_theme_mod('travel_booking_agency_comment_submit_text', 'Post Comment');
	if($travel_booking_agency_comment_submit_text == ''){
		$travel_booking_agency_custom_css .='#comments p.form-submit {';
			$travel_booking_agency_custom_css .='display: none;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_comment_title = get_theme_mod('travel_booking_agency_comment_title', 'Leave a Reply');
	if($travel_booking_agency_comment_title == ''){
		$travel_booking_agency_custom_css .='#comments h2#reply-title {';
			$travel_booking_agency_custom_css .='display: none;';
		$travel_booking_agency_custom_css .='}';
	}

	// Navigation Font Size 
	$travel_booking_agency_nav_font_size = get_theme_mod('travel_booking_agency_nav_font_size');
	if($travel_booking_agency_nav_font_size != false){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-size: '.esc_attr($travel_booking_agency_nav_font_size).'px;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_navigation_case = get_theme_mod('travel_booking_agency_navigation_case', 'capitalize');
	if($travel_booking_agency_navigation_case == 'uppercase' ){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .=' text-transform: uppercase;';
		$travel_booking_agency_custom_css .='}';
	}elseif($travel_booking_agency_navigation_case == 'capitalize' ){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .=' text-transform: capitalize;';
		$travel_booking_agency_custom_css .='}';
	}

    // site title color option
	$travel_booking_agency_site_title_color_setting = get_theme_mod('travel_booking_agency_site_title_color_setting');
	$travel_booking_agency_custom_css .=' .logo h1 a, .logo p a{';
		$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_site_title_color_setting).';';
	$travel_booking_agency_custom_css .='} ';

	$travel_booking_agency_tagline_color_setting = get_theme_mod('travel_booking_agency_tagline_color_setting');
	$travel_booking_agency_custom_css .=' .logo p.site-description{';
		$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_tagline_color_setting).';';
	$travel_booking_agency_custom_css .='} ';   

	//Site title Font size
	$travel_booking_agency_site_title_fontsize = get_theme_mod('travel_booking_agency_site_title_fontsize');
	$travel_booking_agency_custom_css .='.logo h1, .logo p.site-title{';
		$travel_booking_agency_custom_css .='font-size: '.esc_attr($travel_booking_agency_site_title_fontsize).'px;';
	$travel_booking_agency_custom_css .='}';

	$travel_booking_agency_site_description_fontsize = get_theme_mod('travel_booking_agency_site_description_fontsize');
	$travel_booking_agency_custom_css .='.logo p.site-description{';
		$travel_booking_agency_custom_css .='font-size: '.esc_attr($travel_booking_agency_site_description_fontsize).'px;';
	$travel_booking_agency_custom_css .='}';

	/*----- Featured image css -----*/
	$travel_booking_agency_featured_image_border_radius = get_theme_mod('travel_booking_agency_featured_image_border_radius');
	if($travel_booking_agency_featured_image_border_radius != false){
		$travel_booking_agency_custom_css .='.inner-service .service-image img{';
			$travel_booking_agency_custom_css .='border-radius: '.esc_attr($travel_booking_agency_featured_image_border_radius).'px;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_featured_image_box_shadow = get_theme_mod('travel_booking_agency_featured_image_box_shadow');
	if($travel_booking_agency_featured_image_box_shadow != false){
		$travel_booking_agency_custom_css .='.inner-service .service-image img{';
			$travel_booking_agency_custom_css .='box-shadow: 8px 8px '.esc_attr($travel_booking_agency_featured_image_box_shadow).'px #aaa;';
		$travel_booking_agency_custom_css .='}';
	} 

	/*------Shop page pagination ---------*/
	$travel_booking_agency_shop_page_pagination = get_theme_mod('travel_booking_agency_shop_page_pagination', true);
	if($travel_booking_agency_shop_page_pagination == false){
		$travel_booking_agency_custom_css .= '.woocommerce nav.woocommerce-pagination {';
			$travel_booking_agency_custom_css .='display: none;';
		$travel_booking_agency_custom_css .='}';
	}

	/*------- Post into blocks ------*/
	$travel_booking_agency_post_blocks = get_theme_mod('travel_booking_agency_post_blocks', 'Without box');
	if($travel_booking_agency_post_blocks == 'Within box' ){
		$travel_booking_agency_custom_css .='.services-box{';
			$travel_booking_agency_custom_css .=' border: 1px solid #222;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_responsive_show_back_to_top = get_theme_mod('travel_booking_agency_responsive_show_back_to_top',true);
	if($travel_booking_agency_responsive_show_back_to_top == true && get_theme_mod('travel_booking_agency_show_back_to_top',true) == false){
		$travel_booking_agency_custom_css .='@media screen and (min-width:575px){
			.scrollup{';
			$travel_booking_agency_custom_css .='visibility:hidden;';
		$travel_booking_agency_custom_css .='} }';
	}

	if($travel_booking_agency_responsive_show_back_to_top == false){
		$travel_booking_agency_custom_css .='@media screen and (max-width:575px){
			.scrollup{';
			$travel_booking_agency_custom_css .='visibility:hidden;';
		$travel_booking_agency_custom_css .='} }';
	}

	$travel_booking_agency_responsive_preloader_hide = get_theme_mod('travel_booking_agency_responsive_preloader_hide',false);
	if($travel_booking_agency_responsive_preloader_hide == true && get_theme_mod('travel_booking_agency_preloader_hide',false) == false){
		$travel_booking_agency_custom_css .='@media screen and (min-width:575px){
			.preloader{';
			$travel_booking_agency_custom_css .='display:none !important;';
		$travel_booking_agency_custom_css .='} }';
	}

	if($travel_booking_agency_responsive_preloader_hide == false){
		$travel_booking_agency_custom_css .='@media screen and (max-width:575px){
			.preloader{';
			$travel_booking_agency_custom_css .='display:none !important;';
		$travel_booking_agency_custom_css .='} }';
	}

	// slider button
	if (get_theme_mod('travel_booking_agency_slider_button_responsive',true) == true && get_theme_mod('travel_booking_agency_slider_button',true) == false) {
		$travel_booking_agency_custom_css .='@media screen and (min-width: 575px){
			.read-btn{';
			$travel_booking_agency_custom_css .=' display: none;';
		$travel_booking_agency_custom_css .='} }';
	}
	if (get_theme_mod('travel_booking_agency_slider_button_responsive',true) == false) {
		$travel_booking_agency_custom_css .='@media screen and (max-width: 575px){
			.read-btn{';
			$travel_booking_agency_custom_css .=' display: none;';
		$travel_booking_agency_custom_css .='} }';
		$travel_booking_agency_custom_css .='@media screen and (max-width: 575px){
			#slider .carousel-caption{';
			$travel_booking_agency_custom_css .=' padding: 0px;';
		$travel_booking_agency_custom_css .='} }';
	}

	//slider content alignment css
	$travel_booking_agency_theme_lay = get_theme_mod( 'travel_booking_agency_slider_content_alignment','Center');
    if($travel_booking_agency_theme_lay == 'Left'){
		$travel_booking_agency_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$travel_booking_agency_custom_css .='text-align:left !important; left:14%; right:50%;';
		$travel_booking_agency_custom_css .='}';
		$travel_booking_agency_custom_css .='@media screen and (max-width: 425px){
		#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$travel_booking_agency_custom_css .='text-align:left !important; left:10%; right:32%;';
		$travel_booking_agency_custom_css .='}}';
	}else if($travel_booking_agency_theme_lay == 'Center'){
		$travel_booking_agency_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$travel_booking_agency_custom_css .='text-align:center !important; left:15%; right:15%;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == 'Right'){
		$travel_booking_agency_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$travel_booking_agency_custom_css .='text-align:right !important; left:45%; right:15%;';
		$travel_booking_agency_custom_css .='}';
		$travel_booking_agency_custom_css .='@media screen and (max-width: 425px){
		#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .readbutton{';
			$travel_booking_agency_custom_css .='text-align:right !important; left:27%; right:15%;';
		$travel_booking_agency_custom_css .='}}';
	}	

	/*---- Slider Height ------*/
	$travel_booking_agency_slider_height = get_theme_mod('travel_booking_agency_slider_height');
	$travel_booking_agency_custom_css .='#slider img{';
		$travel_booking_agency_custom_css .='height: '.esc_attr($travel_booking_agency_slider_height).'px;';
	$travel_booking_agency_custom_css .='}';
	$travel_booking_agency_custom_css .='@media screen and (max-width: 768px){
		#slider img{';
		$travel_booking_agency_custom_css .='height: auto;';
	$travel_booking_agency_custom_css .='} }';

	// menu font weight
	$travel_booking_agency_theme_lay = get_theme_mod( 'travel_booking_agency_font_weight_menu_option','600');
    if($travel_booking_agency_theme_lay == '100'){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-weight:100;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == '200'){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-weight: 200;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == '300'){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-weight: 300;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == '400'){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-weight: 400;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == '500'){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-weight: 500;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == '600'){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-weight: 600;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == '700'){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-weight: 700;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == '800'){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-weight: 800;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_theme_lay == '900'){
		$travel_booking_agency_custom_css .='.primary-navigation ul li a{';
			$travel_booking_agency_custom_css .='font-weight: 900;';
		$travel_booking_agency_custom_css .='}';
	}

	// slider hide css
	$travel_booking_agency_slider_hide_show = get_theme_mod('travel_booking_agency_slider_hide_show',false);
	if($travel_booking_agency_slider_hide_show == false) {
		$travel_booking_agency_custom_css .='.page-template-custom-frontpage #header{';
			$travel_booking_agency_custom_css .='position:static; border-bottom: 1px solid #e2e2e2;';
		$travel_booking_agency_custom_css .='}';
	}

	if (get_theme_mod('travel_booking_agency_slider_responsive',true) == true && get_theme_mod('travel_booking_agency_slider_hide_show',false) == false) {
		$travel_booking_agency_custom_css .='@media screen and (min-width: 575px){
			#slider{';
			$travel_booking_agency_custom_css .=' display: none;';
		$travel_booking_agency_custom_css .='} }';
	}
	if (get_theme_mod('travel_booking_agency_slider_responsive',true) == false) {
		$travel_booking_agency_custom_css .='@media screen and (max-width: 575px){
			#slider{';
			$travel_booking_agency_custom_css .=' display: none;';
		$travel_booking_agency_custom_css .='} }';
	}

	//  ------------ Mobile Media Options ----------
	$travel_booking_agency_hide_topbar_responsive = get_theme_mod('travel_booking_agency_hide_topbar_responsive',false);
	if($travel_booking_agency_hide_topbar_responsive == true && get_theme_mod('travel_booking_agency_topbar_hide_show',false) == false){
		$travel_booking_agency_custom_css .='@media screen and (min-width:575px){
			.top-header-section{';
			$travel_booking_agency_custom_css .='display:none;';
		$travel_booking_agency_custom_css .='} }';
	}

	if($travel_booking_agency_hide_topbar_responsive == false){
		$travel_booking_agency_custom_css .='@media screen and (max-width:575px){
			.top-header-section{';
			$travel_booking_agency_custom_css .='display:none;';
		$travel_booking_agency_custom_css .='} }';
	}

	$travel_booking_agency_resp_sidebar = get_theme_mod( 'travel_booking_agency_sidebar_hide_show',true);
    if($travel_booking_agency_resp_sidebar == true){
    	$travel_booking_agency_custom_css .='@media screen and (max-width:575px) {';
		$travel_booking_agency_custom_css .='#sidebar{';
			$travel_booking_agency_custom_css .='display:block;';
		$travel_booking_agency_custom_css .='} }';
	}else if($travel_booking_agency_resp_sidebar == false){
		$travel_booking_agency_custom_css .='@media screen and (max-width:575px) {';
		$travel_booking_agency_custom_css .='#sidebar{';
			$travel_booking_agency_custom_css .='display:none;';
		$travel_booking_agency_custom_css .='} }';
	}

	// Metabox Seperator
	$travel_booking_agency_metabox_seperator = get_theme_mod('travel_booking_agency_metabox_seperator');
	if($travel_booking_agency_metabox_seperator != '' ){
		$travel_booking_agency_custom_css .='.metabox .me-2:after{';
			$travel_booking_agency_custom_css .=' content: "'.esc_attr($travel_booking_agency_metabox_seperator).'"; padding-left:10px;';
		$travel_booking_agency_custom_css .='}';		
	}

	// Metabox Seperator
	$travel_booking_agency_single_post_metabox_seperator = get_theme_mod('travel_booking_agency_single_post_metabox_seperator');
	if($travel_booking_agency_single_post_metabox_seperator != '' ){
		$travel_booking_agency_custom_css .='.metabox .px-2:after{';
			$travel_booking_agency_custom_css .=' content: "'.esc_attr($travel_booking_agency_single_post_metabox_seperator).'"; padding-left:10px;';
		$travel_booking_agency_custom_css .='}';		
	}

	// Single post image border radious
	$travel_booking_agency_single_post_img_border_radius = get_theme_mod('travel_booking_agency_single_post_img_border_radius', 0);
	$travel_booking_agency_custom_css .='.feature-box img{';
		$travel_booking_agency_custom_css .='border-radius: '.esc_attr($travel_booking_agency_single_post_img_border_radius).'px;';
	$travel_booking_agency_custom_css .='}';

	// Single post image box shadow
	$travel_booking_agency_single_post_img_box_shadow = get_theme_mod('travel_booking_agency_single_post_img_box_shadow',0);
	$travel_booking_agency_custom_css .='.feature-box img{';
		$travel_booking_agency_custom_css .='box-shadow: '.esc_attr($travel_booking_agency_single_post_img_box_shadow).'px '.esc_attr($travel_booking_agency_single_post_img_box_shadow).'px '.esc_attr($travel_booking_agency_single_post_img_box_shadow).'px #ccc;';
	$travel_booking_agency_custom_css .='}';

	// topbar line

	$travel_booking_agency_topbar_hide_show = get_theme_mod('travel_booking_agency_topbar_hide_show', false);
	if($travel_booking_agency_topbar_hide_show == false){
		$travel_booking_agency_custom_css .= '.header-menu-box:after{';
			$travel_booking_agency_custom_css .='display: none !important;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_copyright_color = get_theme_mod('travel_booking_agency_copyright_color');
	$travel_booking_agency_custom_css .='#footer p,#footer p a{';
		$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_copyright_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	$travel_booking_agency_copyright__hover_color = get_theme_mod('travel_booking_agency_copyright__hover_color');
	$travel_booking_agency_custom_css .='#footer p:hover,#footer p a:hover{';
		$travel_booking_agency_custom_css .='color: '.esc_attr($travel_booking_agency_copyright__hover_color).'!important;';
	$travel_booking_agency_custom_css .='}';

	/*-------- Copyright background css -------*/
	$travel_booking_agency_copyright_background_color = get_theme_mod('travel_booking_agency_copyright_background_color');
	$travel_booking_agency_custom_css .='#footer{';
		$travel_booking_agency_custom_css .='background-color: '.esc_attr($travel_booking_agency_copyright_background_color).';';
	$travel_booking_agency_custom_css .='}';

	/*----------- Footer widgets heading alignment -----*/
	$travel_booking_agency_footer_widgets_heading = get_theme_mod( 'travel_booking_agency_footer_widgets_heading','Left');
    if($travel_booking_agency_footer_widgets_heading == 'Left'){
		$travel_booking_agency_custom_css .='footer h3{';
		$travel_booking_agency_custom_css .='text-align: left;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_footer_widgets_heading == 'Center'){
		$travel_booking_agency_custom_css .='footer h3{';
			$travel_booking_agency_custom_css .='text-align: center;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_footer_widgets_heading == 'Right'){
		$travel_booking_agency_custom_css .='footer h3{';
			$travel_booking_agency_custom_css .='text-align: right;';
		$travel_booking_agency_custom_css .='}';
	}

	$travel_booking_agency_footer_widgets_content = get_theme_mod( 'travel_booking_agency_footer_widgets_content','Left');
    if($travel_booking_agency_footer_widgets_content == 'Left'){
		$travel_booking_agency_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer.gallery,aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar_wrap caption{';
		$travel_booking_agency_custom_css .='text-align: left;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_footer_widgets_content == 'Center'){
		$travel_booking_agency_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar_wrap caption{';
			$travel_booking_agency_custom_css .='text-align: center;';
		$travel_booking_agency_custom_css .='}';
	}else if($travel_booking_agency_footer_widgets_content == 'Right'){
		$travel_booking_agency_custom_css .='footer ul,.widget_shopping_cart_content p,footer form,div#calendar_wrap,.footertown table,footer .gallery, aside#media_image-2,.tagcloud,footer figure.gallery-item,aside#block-7,.textwidget p,#calendar_wrap caption{';
			$travel_booking_agency_custom_css .='text-align: right !important;';
		$travel_booking_agency_custom_css .='}';
	}