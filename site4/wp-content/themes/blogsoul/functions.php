<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if ( ! function_exists( 'blogsoul_enqueue_styles' ) ) :
    /**
     * Load assets.
     *
     * @since 1.0.0
     */
    function blogsoul_enqueue_styles() {
        wp_enqueue_style( 'blogmelody-style-parent', get_template_directory_uri() . '/style.css' );
        wp_enqueue_style( 'blogsoul-style', get_stylesheet_directory_uri() . '/style.css', array( 'blogmelody-style-parent' ), '1.0.0' );
    }
endif;
add_action( 'wp_enqueue_scripts', 'blogsoul_enqueue_styles', 99 );

// END ENQUEUE PARENT ACTION
if ( ! function_exists( 'blogsoul_fonts_url' ) ) :

	function blogsoul_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Lobster, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lobster font: on or off', 'blogsoul' ) ) {
		$fonts[] = 'Lobster:300,400,500,600,700';
	}

	/* translators: If there are characters in your language that are not supported by Redressed, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Redressed: on or off', 'blogsoul' ) ) {
		$fonts[] = 'Redressed';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}
endif;


if ( ! function_exists( 'blogsoul_get_default_theme_options' ) ) :

    /**
     * Get default theme options.
     *
     * @since 1.0.0
     *
     * @return array Default theme options.
     */
function blogsoul_get_default_theme_options() {

    $theme_data = wp_get_theme();
    $defaults = array();


    $defaults['disable_homepage_content_section'] 	= true;
    $defaults['show_header_social_links'] 	= true;
    $defaults['header_social_links']		= array();
    $defaults['disable_header_background_section'] = false;

	// Featured Slider Section
	$defaults['disable_featured-slider_section']	= false;
	$defaults['number_of_sr_items']			= 4;
	$defaults['number_of_sr_column']		= 1;
	$defaults['slider_speed']				= 800;
	$defaults['disable_white_overlay']		= false;
	$defaults['disable_blog_banner_section']		= true;


	// Popular Section
	$defaults['disable_popular_section']	= false;
	$defaults['popular_title']	   	 		= esc_html__( 'Popular Posts', 'blogsoul' );
	$defaults['popular_posted_on_enable']			= true;

	// Author Section
	$defaults['disable_message_section']	= false;

	// Latest Posts Section

	$defaults['latest_posts_title']	   	 	= esc_html__( 'Recent New More Stories', 'blogsoul' );
	$defaults['pagination_type']		= 'default';

	// About Section
	$defaults['disable_about_section']	= false;
	$defaults['number_of_about_items']			= 4;
	$defaults['about_posted_on_enable']			= true;
	

	//General Section
	$defaults['readmore_text']				= esc_html__('Read More','blogsoul');
	$defaults['excerpt_length']				= 30;
	$defaults['layout_options_blog']			= 'no-sidebar';
	$defaults['layout_options_archive']			= 'right-sidebar';
	$defaults['layout_options_page']			= 'right-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'blogsoul' );
	$defaults['powered_by_text']			= esc_html__( 'BlogMelody by Sensational Theme', 'blogsoul' );

    return $defaults;
}
endif;
add_filter( 'blogmelody_filter_default_theme_options', 'blogsoul_get_default_theme_options', 99 );


if ( ! function_exists( 'blogsoul_customize_backend_styles' ) ) :
    /**
     * Load assets.
     *
     * @since 1.0.0
     */
    function blogsoul_customize_backend_styles() {
        wp_enqueue_style( 'blogsoul-style', get_stylesheet_directory_uri() . '/customizer-style.css' );
    }
endif;
add_action( 'customize_controls_enqueue_scripts', 'blogsoul_customize_backend_styles', 99 );
