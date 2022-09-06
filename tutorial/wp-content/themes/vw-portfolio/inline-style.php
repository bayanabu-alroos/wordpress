<?php
	
	/*----------------------First highlight color-------------------*/

	$vw_portfolio_first_color = get_theme_mod('vw_portfolio_first_color');

	$vw_portfolio_custom_css = '';

	if($vw_portfolio_first_color != false){
		$vw_portfolio_custom_css .=' #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .more-btn a, input[type="submit"], .footer .tagcloud a:hover, .scrollup i, .footer-2, .sidebar input[type="submit"], .sidebar .tagcloud a:hover, .home-page-header, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce span.onsale, .blogbutton-small, .pagination span, .pagination a, .error-btn a, .sidebar .widget_price_filter .ui-slider .ui-slider-range, .sidebar .widget_price_filter .ui-slider .ui-slider-handle, .sidebar .woocommerce-product-search button, .footer .widget_price_filter .ui-slider .ui-slider-range, .footer .widget_price_filter .ui-slider .ui-slider-handle, .footer .woocommerce-product-search button, .footer a.custom_read_more, .sidebar a.custom_read_more, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover, .nav-previous a, .nav-next a, .woocommerce nav.woocommerce-pagination ul li a, #preloader, .sidebar .wp-block-search .wp-block-search__button, .footer .wp-block-search .wp-block-search__button, .footer .wp-block-search .wp-block-search__button{';
			$vw_portfolio_custom_css .='background-color: '.esc_attr($vw_portfolio_first_color).';';
		$vw_portfolio_custom_css .='}';
	}
	if($vw_portfolio_first_color != false){
		$vw_portfolio_custom_css .='#comments input[type="submit"].submit, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover{';
			$vw_portfolio_custom_css .='background-color: '.esc_attr($vw_portfolio_first_color).'!important;';
		$vw_portfolio_custom_css .='}';
	}
	if($vw_portfolio_first_color != false){
		$vw_portfolio_custom_css .='a, .page-template-custom-home-page .logo h1 a, .page-template-custom-home-page #header .nav ul li a:hover, .footer h3, .footer .custom-social-icons i, .woocommerce-message::before, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title,.footer li a:hover, .entry-content a, .sidebar .textwidget a, .comment-body p a, .footer .textwidget a, .page-template-custom-home-page #header .main-navigation a:hover, .header-fixed .main-navigation a:hover, .page-template-custom-home-page .logo h1 a, .page-template-custom-home-page .logo p.site-title a, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .single-post .post-info:hover a, #slider .inner_carousel h1 a:hover, #services .overlay-box h3 a:hover, .footer .wp-block-search .wp-block-search__label, #comments p a{';
			$vw_portfolio_custom_css .='color: '.esc_attr($vw_portfolio_first_color).';';
		$vw_portfolio_custom_css .='}';
	}
	if($vw_portfolio_first_color != false){
		$vw_portfolio_custom_css .='.woocommerce-message, .footer .custom-social-icons i, .sidebar .custom-social-icons i, .footer .custom-social-icons i:hover, .sidebar .custom-social-icons i:hover{';
			$vw_portfolio_custom_css .='border-color: '.esc_attr($vw_portfolio_first_color).';';
		$vw_portfolio_custom_css .='}';
	}

	/*------------------Second highlight color-------------------*/

	$vw_portfolio_second_color = get_theme_mod('vw_portfolio_second_color');

	if($vw_portfolio_second_color != false){
		$vw_portfolio_custom_css .=' #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .more-btn a:hover,#slider{';
			$vw_portfolio_custom_css .='background-color: '.esc_attr($vw_portfolio_second_color).';';
		$vw_portfolio_custom_css .='}';
	}
	if($vw_portfolio_second_color != false){
		$vw_portfolio_custom_css .='{';
			$vw_portfolio_custom_css .='background-color: '.esc_attr($vw_portfolio_second_color).'!important;';
		$vw_portfolio_custom_css .='}';
	}
	if($vw_portfolio_second_color != false){
		$vw_portfolio_custom_css .='.page-template-custom-home-page .search-box i, .page-template-custom-home-page p.site-description, .sidebar h3, .post-main-box h3 a, .post-main-box h2 a{';
			$vw_portfolio_custom_css .='color: '.esc_attr($vw_portfolio_second_color).';';
		$vw_portfolio_custom_css .='}';
	}
	if($vw_portfolio_second_color != false){
		$vw_portfolio_custom_css .='.main-navigation ul ul{';
			$vw_portfolio_custom_css .='border-color: '.esc_attr($vw_portfolio_second_color).'!important;';
		$vw_portfolio_custom_css .='}';
	}
	if($vw_portfolio_second_color != false){
		$vw_portfolio_custom_css .='.sidebar input[type="submit"], nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .blogbutton-small, #comments input[type="submit"].submit, .footer a.custom_read_more, .sidebar a.custom_read_more, .sidebar a.custom_read_more:hover, .footer a.custom_read_more:hover, .sidebar .wp-block-search .wp-block-search__button, .footer .wp-block-search .wp-block-search__button{
		box-shadow: 5px 5px 0 0 '.esc_attr($vw_portfolio_second_color).';
		}';
	}
	if($vw_portfolio_second_color != false){
		$vw_portfolio_custom_css .='.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .blogbutton-small:hover{
		box-shadow: 3px 3px 0 0 '.esc_attr($vw_portfolio_second_color).';
		}';
	}

	/*---------------------------Width Layout -------------------*/

	$vw_portfolio_theme_lay = get_theme_mod( 'vw_portfolio_width_option','Full Width');
    if($vw_portfolio_theme_lay == 'Boxed'){
		$vw_portfolio_custom_css .='body{';
			$vw_portfolio_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$vw_portfolio_custom_css .='}';
		$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='right: 100px;';
		$vw_portfolio_custom_css .='}';
		$vw_portfolio_custom_css .='.scrollup.left i{';
			$vw_portfolio_custom_css .='left: 100px;';
		$vw_portfolio_custom_css .='}';
	}else if($vw_portfolio_theme_lay == 'Wide Width'){
		$vw_portfolio_custom_css .='body{';
			$vw_portfolio_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$vw_portfolio_custom_css .='}';
		$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='right: 30px;';
		$vw_portfolio_custom_css .='}';
		$vw_portfolio_custom_css .='.scrollup.left i{';
			$vw_portfolio_custom_css .='left: 30px;';
		$vw_portfolio_custom_css .='}';
	}else if($vw_portfolio_theme_lay == 'Full Width'){
		$vw_portfolio_custom_css .='body{';
			$vw_portfolio_custom_css .='max-width: 100%;';
		$vw_portfolio_custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$vw_portfolio_theme_lay = get_theme_mod( 'vw_portfolio_slider_opacity_color','0.5');
	if($vw_portfolio_theme_lay == '0'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0';
		$vw_portfolio_custom_css .='}';
		}else if($vw_portfolio_theme_lay == '0.1'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0.1';
		$vw_portfolio_custom_css .='}';
		}else if($vw_portfolio_theme_lay == '0.2'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0.2';
		$vw_portfolio_custom_css .='}';
		}else if($vw_portfolio_theme_lay == '0.3'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0.3';
		$vw_portfolio_custom_css .='}';
		}else if($vw_portfolio_theme_lay == '0.4'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0.4';
		$vw_portfolio_custom_css .='}';
		}else if($vw_portfolio_theme_lay == '0.5'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0.5';
		$vw_portfolio_custom_css .='}';
		}else if($vw_portfolio_theme_lay == '0.6'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0.6';
		$vw_portfolio_custom_css .='}';
		}else if($vw_portfolio_theme_lay == '0.7'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0.7';
		$vw_portfolio_custom_css .='}';
		}else if($vw_portfolio_theme_lay == '0.8'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0.8';
		$vw_portfolio_custom_css .='}';
		}else if($vw_portfolio_theme_lay == '0.9'){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='opacity:0.9';
		$vw_portfolio_custom_css .='}';
		}

	/*-------------------Slider Content Layout -------------------*/

	$vw_portfolio_theme_lay = get_theme_mod( 'vw_portfolio_slider_content_option','Left');
    if($vw_portfolio_theme_lay == 'Left'){
		$vw_portfolio_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .more-btn{';
			$vw_portfolio_custom_css .='text-align:left; left:17%; right:45%;';
		$vw_portfolio_custom_css .='}';
	}else if($vw_portfolio_theme_lay == 'Center'){
		$vw_portfolio_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .more-btn{';
			$vw_portfolio_custom_css .='text-align:center; left:20%; right:20%;';
		$vw_portfolio_custom_css .='}';
	}else if($vw_portfolio_theme_lay == 'Right'){
		$vw_portfolio_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, .more-btn{';
			$vw_portfolio_custom_css .='text-align:right; left:45%; right:17%;';
		$vw_portfolio_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$vw_portfolio_slider_content_padding_top_bottom = get_theme_mod('vw_portfolio_slider_content_padding_top_bottom');
	$vw_portfolio_slider_content_padding_left_right = get_theme_mod('vw_portfolio_slider_content_padding_left_right');
	if($vw_portfolio_slider_content_padding_top_bottom != false || $vw_portfolio_slider_content_padding_left_right != false){
		$vw_portfolio_custom_css .='#slider .carousel-caption{';
			$vw_portfolio_custom_css .='top: '.esc_attr($vw_portfolio_slider_content_padding_top_bottom).'; bottom: '.esc_attr($vw_portfolio_slider_content_padding_top_bottom).';left: '.esc_attr($vw_portfolio_slider_content_padding_left_right).';right: '.esc_attr($vw_portfolio_slider_content_padding_left_right).';';
		$vw_portfolio_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$vw_portfolio_slider_height = get_theme_mod('vw_portfolio_slider_height');
	if($vw_portfolio_slider_height != false){
		$vw_portfolio_custom_css .='#slider img{';
			$vw_portfolio_custom_css .='height: '.esc_attr($vw_portfolio_slider_height).';';
		$vw_portfolio_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$vw_portfolio_theme_lay = get_theme_mod( 'vw_portfolio_blog_layout_option','Default');
    if($vw_portfolio_theme_lay == 'Default'){
		$vw_portfolio_custom_css .='.post-main-box{';
			$vw_portfolio_custom_css .='';
		$vw_portfolio_custom_css .='}';
	}else if($vw_portfolio_theme_lay == 'Center'){
		$vw_portfolio_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, .related-post .post-main-box h2, .related-post .new-text p, #our-services .related-post p, .new-text p, #our-services p{';
			$vw_portfolio_custom_css .='text-align:center;';
		$vw_portfolio_custom_css .='}';
		$vw_portfolio_custom_css .='.post-info{';
			$vw_portfolio_custom_css .='margin-top:10px;';
		$vw_portfolio_custom_css .='}';
	}else if($vw_portfolio_theme_lay == 'Left'){
		$vw_portfolio_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, .content-bttn, #our-services p{';
			$vw_portfolio_custom_css .='text-align:Left;';
		$vw_portfolio_custom_css .='}';
	}

	/*------------------Responsive Media -----------------------*/

	$vw_portfolio_resp_stickyheader = get_theme_mod( 'vw_portfolio_stickyheader_hide_show',false);
	if($vw_portfolio_resp_stickyheader == true && get_theme_mod( 'vw_portfolio_sticky_header',false) != true){
    	$vw_portfolio_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_portfolio_custom_css .='position:static;';
		$vw_portfolio_custom_css .='} ';
	}
    if($vw_portfolio_resp_stickyheader == true){
    	$vw_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$vw_portfolio_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_portfolio_custom_css .='position:fixed;';
		$vw_portfolio_custom_css .='} }';
	}else if($vw_portfolio_resp_stickyheader == false){
		$vw_portfolio_custom_css .='@media screen and (max-width:575px){';
		$vw_portfolio_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_portfolio_custom_css .='position:static;';
		$vw_portfolio_custom_css .='} }';
	}

	$vw_portfolio_resp_slider = get_theme_mod( 'vw_portfolio_resp_slider_hide_show',false);
	if($vw_portfolio_resp_slider == true && get_theme_mod( 'vw_portfolio_slider_hide_show', false) == false){
    	$vw_portfolio_custom_css .='#slider{';
			$vw_portfolio_custom_css .='display:none;';
		$vw_portfolio_custom_css .='} ';
	}
    if($vw_portfolio_resp_slider == true){
    	$vw_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$vw_portfolio_custom_css .='#slider{';
			$vw_portfolio_custom_css .='display:block;';
		$vw_portfolio_custom_css .='} }';
	}else if($vw_portfolio_resp_slider == false){
		$vw_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$vw_portfolio_custom_css .='#slider{';
			$vw_portfolio_custom_css .='display:none;';
		$vw_portfolio_custom_css .='} }';
	}

	$vw_portfolio_resp_sidebar = get_theme_mod( 'vw_portfolio_sidebar_hide_show',true);
    if($vw_portfolio_resp_sidebar == true){
    	$vw_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$vw_portfolio_custom_css .='.sidebar{';
			$vw_portfolio_custom_css .='display:block;';
		$vw_portfolio_custom_css .='} }';
	}else if($vw_portfolio_resp_sidebar == false){
		$vw_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$vw_portfolio_custom_css .='.sidebar{';
			$vw_portfolio_custom_css .='display:none;';
		$vw_portfolio_custom_css .='} }';
	}

	$vw_portfolio_resp_scroll_top = get_theme_mod( 'vw_portfolio_resp_scroll_top_hide_show',true);
	if($vw_portfolio_resp_scroll_top == true && get_theme_mod( 'vw_portfolio_hide_show_scroll',true) != true){
    	$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='visibility:hidden !important;';
		$vw_portfolio_custom_css .='} ';
	}
    if($vw_portfolio_resp_scroll_top == true){
    	$vw_portfolio_custom_css .='@media screen and (max-width:575px) {';
		$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='visibility:visible !important;';
		$vw_portfolio_custom_css .='} }';
	}else if($vw_portfolio_resp_scroll_top == false){
		$vw_portfolio_custom_css .='@media screen and (max-width:575px){';
		$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='visibility:hidden !important;';
		$vw_portfolio_custom_css .='} }';
	}

	/*-------------- Sticky Header Padding ----------------*/

	$vw_portfolio_sticky_header_padding = get_theme_mod('vw_portfolio_sticky_header_padding');
	if($vw_portfolio_sticky_header_padding != false){
		$vw_portfolio_custom_css .='.page-template-custom-home-page .header-fixed, .header-fixed{';
			$vw_portfolio_custom_css .='padding: '.esc_attr($vw_portfolio_sticky_header_padding).';';
		$vw_portfolio_custom_css .='}';
	}

	/*-------------- Menus Font Size ----------------*/

	$vw_portfolio_navigation_menu_font_size = get_theme_mod('vw_portfolio_navigation_menu_font_size');
	if($vw_portfolio_navigation_menu_font_size != false){
		$vw_portfolio_custom_css .='.main-navigation a{';
			$vw_portfolio_custom_css .='font-size: '.esc_attr($vw_portfolio_navigation_menu_font_size).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_nav_menus_font_weight = get_theme_mod( 'vw_portfolio_navigation_menu_font_weight','Default');
    if($vw_portfolio_nav_menus_font_weight == 'Default'){
		$vw_portfolio_custom_css .='.main-navigation a{';
			$vw_portfolio_custom_css .='';
		$vw_portfolio_custom_css .='}';
	}else if($vw_portfolio_nav_menus_font_weight == 'Normal'){
		$vw_portfolio_custom_css .='.main-navigation a{';
			$vw_portfolio_custom_css .='font-weight: normal;';
		$vw_portfolio_custom_css .='}';
	}

	/*------------------ Search Settings -----------------*/
	
	$vw_portfolio_search_font_size = get_theme_mod('vw_portfolio_search_font_size');
	if($vw_portfolio_search_font_size != false){
		$vw_portfolio_custom_css .='.search-box i{';
			$vw_portfolio_custom_css .='font-size: '.esc_attr($vw_portfolio_search_font_size).';';
		$vw_portfolio_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$vw_portfolio_button_padding_top_bottom = get_theme_mod('vw_portfolio_button_padding_top_bottom');
	$vw_portfolio_button_padding_left_right = get_theme_mod('vw_portfolio_button_padding_left_right');
	if($vw_portfolio_button_padding_top_bottom != false || $vw_portfolio_button_padding_left_right != false){
		$vw_portfolio_custom_css .='.blogbutton-small{';
			$vw_portfolio_custom_css .='padding-top: '.esc_attr($vw_portfolio_button_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_portfolio_button_padding_top_bottom).';padding-left: '.esc_attr($vw_portfolio_button_padding_left_right).';padding-right: '.esc_attr($vw_portfolio_button_padding_left_right).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_button_border_radius = get_theme_mod('vw_portfolio_button_border_radius');
	if($vw_portfolio_button_border_radius != false){
		$vw_portfolio_custom_css .='.blogbutton-small{';
			$vw_portfolio_custom_css .='border-radius: '.esc_attr($vw_portfolio_button_border_radius).'px;';
		$vw_portfolio_custom_css .='}';
	}

	/*------------- Single Blog Page------------------*/

	$vw_portfolio_featured_image_border_radius = get_theme_mod('vw_portfolio_featured_image_border_radius', 0);
	if($vw_portfolio_featured_image_border_radius != false){
		$vw_portfolio_custom_css .='.box-image img, .feature-box img{';
			$vw_portfolio_custom_css .='border-radius: '.esc_attr($vw_portfolio_featured_image_border_radius).'px;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_featured_image_box_shadow = get_theme_mod('vw_portfolio_featured_image_box_shadow',0);
	if($vw_portfolio_featured_image_box_shadow != false){
		$vw_portfolio_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$vw_portfolio_custom_css .='box-shadow: '.esc_attr($vw_portfolio_featured_image_box_shadow).'px '.esc_attr($vw_portfolio_featured_image_box_shadow).'px '.esc_attr($vw_portfolio_featured_image_box_shadow).'px #cccccc;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_single_blog_post_navigation_show_hide = get_theme_mod('vw_portfolio_single_blog_post_navigation_show_hide',true);
	if($vw_portfolio_single_blog_post_navigation_show_hide != true){
		$vw_portfolio_custom_css .='.post-navigation{';
			$vw_portfolio_custom_css .='display: none;';
		$vw_portfolio_custom_css .='}';
	}

	/*-------------- Copyright Alignment ----------------*/

	$vw_portfolio_footer_background_color = get_theme_mod('vw_portfolio_footer_background_color');
	if($vw_portfolio_footer_background_color != false){
		$vw_portfolio_custom_css .='.footer{';
			$vw_portfolio_custom_css .='background-color: '.esc_attr($vw_portfolio_footer_background_color).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_copyright_font_size = get_theme_mod('vw_portfolio_copyright_font_size');
	if($vw_portfolio_copyright_font_size != false){
		$vw_portfolio_custom_css .='.copyright p{';
			$vw_portfolio_custom_css .='font-size: '.esc_attr($vw_portfolio_copyright_font_size).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_copyright_padding_top_bottom = get_theme_mod('vw_portfolio_copyright_padding_top_bottom');
	if($vw_portfolio_copyright_padding_top_bottom != false){
		$vw_portfolio_custom_css .='.footer-2{';
			$vw_portfolio_custom_css .='padding-top: '.esc_attr($vw_portfolio_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($vw_portfolio_copyright_padding_top_bottom).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_copyright_alignment = get_theme_mod('vw_portfolio_copyright_alignment');
	if($vw_portfolio_copyright_alignment != false){
		$vw_portfolio_custom_css .='.copyright p{';
			$vw_portfolio_custom_css .='text-align: '.esc_attr($vw_portfolio_copyright_alignment).';';
		$vw_portfolio_custom_css .='}';
	}

	/*----------------Sroll to top Settings ------------------*/

	$vw_portfolio_scroll_to_top_font_size = get_theme_mod('vw_portfolio_scroll_to_top_font_size');
	if($vw_portfolio_scroll_to_top_font_size != false){
		$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='font-size: '.esc_attr($vw_portfolio_scroll_to_top_font_size).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_scroll_to_top_padding = get_theme_mod('vw_portfolio_scroll_to_top_padding');
	$vw_portfolio_scroll_to_top_padding = get_theme_mod('vw_portfolio_scroll_to_top_padding');
	if($vw_portfolio_scroll_to_top_padding != false){
		$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='padding-top: '.esc_attr($vw_portfolio_scroll_to_top_padding).';padding-bottom: '.esc_attr($vw_portfolio_scroll_to_top_padding).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_scroll_to_top_width = get_theme_mod('vw_portfolio_scroll_to_top_width');
	if($vw_portfolio_scroll_to_top_width != false){
		$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='width: '.esc_attr($vw_portfolio_scroll_to_top_width).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_scroll_to_top_height = get_theme_mod('vw_portfolio_scroll_to_top_height');
	if($vw_portfolio_scroll_to_top_height != false){
		$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='height: '.esc_attr($vw_portfolio_scroll_to_top_height).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_scroll_to_top_border_radius = get_theme_mod('vw_portfolio_scroll_to_top_border_radius');
	if($vw_portfolio_scroll_to_top_border_radius != false){
		$vw_portfolio_custom_css .='.scrollup i{';
			$vw_portfolio_custom_css .='border-radius: '.esc_attr($vw_portfolio_scroll_to_top_border_radius).'px;';
		$vw_portfolio_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$vw_portfolio_social_icon_font_size = get_theme_mod('vw_portfolio_social_icon_font_size');
	if($vw_portfolio_social_icon_font_size != false){
		$vw_portfolio_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_portfolio_custom_css .='font-size: '.esc_attr($vw_portfolio_social_icon_font_size).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_social_icon_padding = get_theme_mod('vw_portfolio_social_icon_padding');
	if($vw_portfolio_social_icon_padding != false){
		$vw_portfolio_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_portfolio_custom_css .='padding: '.esc_attr($vw_portfolio_social_icon_padding).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_social_icon_width = get_theme_mod('vw_portfolio_social_icon_width');
	if($vw_portfolio_social_icon_width != false){
		$vw_portfolio_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_portfolio_custom_css .='width: '.esc_attr($vw_portfolio_social_icon_width).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_social_icon_height = get_theme_mod('vw_portfolio_social_icon_height');
	if($vw_portfolio_social_icon_height != false){
		$vw_portfolio_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_portfolio_custom_css .='height: '.esc_attr($vw_portfolio_social_icon_height).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_social_icon_border_radius = get_theme_mod('vw_portfolio_social_icon_border_radius');
	if($vw_portfolio_social_icon_border_radius != false){
		$vw_portfolio_custom_css .='.sidebar .custom-social-icons i, .footer .custom-social-icons i{';
			$vw_portfolio_custom_css .='border-radius: '.esc_attr($vw_portfolio_social_icon_border_radius).'px;';
		$vw_portfolio_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$vw_portfolio_products_padding_top_bottom = get_theme_mod('vw_portfolio_products_padding_top_bottom');
	if($vw_portfolio_products_padding_top_bottom != false){
		$vw_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_portfolio_custom_css .='padding-top: '.esc_attr($vw_portfolio_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($vw_portfolio_products_padding_top_bottom).'!important;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_products_padding_left_right = get_theme_mod('vw_portfolio_products_padding_left_right');
	if($vw_portfolio_products_padding_left_right != false){
		$vw_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_portfolio_custom_css .='padding-left: '.esc_attr($vw_portfolio_products_padding_left_right).'!important; padding-right: '.esc_attr($vw_portfolio_products_padding_left_right).'!important;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_products_box_shadow = get_theme_mod('vw_portfolio_products_box_shadow');
	if($vw_portfolio_products_box_shadow != false){
		$vw_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$vw_portfolio_custom_css .='box-shadow: '.esc_attr($vw_portfolio_products_box_shadow).'px '.esc_attr($vw_portfolio_products_box_shadow).'px '.esc_attr($vw_portfolio_products_box_shadow).'px #ddd;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_products_border_radius = get_theme_mod('vw_portfolio_products_border_radius', 0);
	if($vw_portfolio_products_border_radius != false){
		$vw_portfolio_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$vw_portfolio_custom_css .='border-radius: '.esc_attr($vw_portfolio_products_border_radius).'px;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_products_btn_padding_top_bottom = get_theme_mod('vw_portfolio_products_btn_padding_top_bottom');
	if($vw_portfolio_products_btn_padding_top_bottom != false){
		$vw_portfolio_custom_css .='.woocommerce a.button{';
			$vw_portfolio_custom_css .='padding-top: '.esc_attr($vw_portfolio_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($vw_portfolio_products_btn_padding_top_bottom).' !important;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_products_btn_padding_left_right = get_theme_mod('vw_portfolio_products_btn_padding_left_right');
	if($vw_portfolio_products_btn_padding_left_right != false){
		$vw_portfolio_custom_css .='.woocommerce a.button{';
			$vw_portfolio_custom_css .='padding-left: '.esc_attr($vw_portfolio_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($vw_portfolio_products_btn_padding_left_right).' !important;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_products_button_border_radius = get_theme_mod('vw_portfolio_products_button_border_radius', 0);
	if($vw_portfolio_products_button_border_radius != false){
		$vw_portfolio_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$vw_portfolio_custom_css .='border-radius: '.esc_attr($vw_portfolio_products_button_border_radius).'px;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_woocommerce_sale_position = get_theme_mod( 'vw_portfolio_woocommerce_sale_position','right');
    if($vw_portfolio_woocommerce_sale_position == 'left'){
		$vw_portfolio_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_portfolio_custom_css .='left: -10px; right: auto;';
		$vw_portfolio_custom_css .='}';
	}else if($vw_portfolio_woocommerce_sale_position == 'right'){
		$vw_portfolio_custom_css .='.woocommerce ul.products li.product .onsale{';
			$vw_portfolio_custom_css .='left: auto; right: 0;';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_woocommerce_sale_font_size = get_theme_mod('vw_portfolio_woocommerce_sale_font_size');
	if($vw_portfolio_woocommerce_sale_font_size != false){
		$vw_portfolio_custom_css .='.woocommerce span.onsale{';
			$vw_portfolio_custom_css .='font-size: '.esc_attr($vw_portfolio_woocommerce_sale_font_size).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_woocommerce_sale_border_radius = get_theme_mod('vw_portfolio_woocommerce_sale_border_radius', 100);
	if($vw_portfolio_woocommerce_sale_border_radius != false){
		$vw_portfolio_custom_css .='.woocommerce span.onsale{';
			$vw_portfolio_custom_css .='border-radius: '.esc_attr($vw_portfolio_woocommerce_sale_border_radius).'px;';
		$vw_portfolio_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$vw_portfolio_site_title_font_size = get_theme_mod('vw_portfolio_site_title_font_size');
	if($vw_portfolio_site_title_font_size != false){
		$vw_portfolio_custom_css .='h1.site-title a, .logo p.site-title a{';
			$vw_portfolio_custom_css .='font-size: '.esc_attr($vw_portfolio_site_title_font_size).';';
		$vw_portfolio_custom_css .='}';
	}

	// Site tagline Font Size
	$vw_portfolio_site_tagline_font_size = get_theme_mod('vw_portfolio_site_tagline_font_size');
	if($vw_portfolio_site_tagline_font_size != false){
		$vw_portfolio_custom_css .='.logo p.site-description{';
			$vw_portfolio_custom_css .='font-size: '.esc_attr($vw_portfolio_site_tagline_font_size).';';
		$vw_portfolio_custom_css .='}';
	}

	/*------------------ Preloader Background Color  -------------------*/

	$vw_portfolio_preloader_bg_color = get_theme_mod('vw_portfolio_preloader_bg_color');
	if($vw_portfolio_preloader_bg_color != false){
		$vw_portfolio_custom_css .='#preloader{';
			$vw_portfolio_custom_css .='background-color: '.esc_attr($vw_portfolio_preloader_bg_color).';';
		$vw_portfolio_custom_css .='}';
	}

	$vw_portfolio_preloader_border_color = get_theme_mod('vw_portfolio_preloader_border_color');
	if($vw_portfolio_preloader_border_color != false){
		$vw_portfolio_custom_css .='.loader-line{';
			$vw_portfolio_custom_css .='border-color: '.esc_attr($vw_portfolio_preloader_border_color).'!important;';
		$vw_portfolio_custom_css .='}';
	}
