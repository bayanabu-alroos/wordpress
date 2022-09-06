<?php
/**
 * Default theme options.
 *
 * @package BlogMelody
 */

if ( ! function_exists( 'blogmelody_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function blogmelody_get_default_theme_options() {

	$theme_data = wp_get_theme();
	$defaults = array();

	$defaults['disable_homepage_content_section'] 	= true;
    $defaults['show_header_social_links'] 	= true;
    $defaults['header_social_links']		= array();
    $defaults['disable_header_background_section'] = false;

	// Featured Slider Section
	$defaults['disable_featured-slider_section']	= false;
	$defaults['number_of_sr_items']			= 4;
	$defaults['number_of_sr_column']		= 3;
	$defaults['slider_speed']				= 800;
	$defaults['disable_white_overlay']		= false;
	$defaults['disable_blog_banner_section']		= true;


	// Popular Section
	$defaults['disable_popular_section']	= false;
	$defaults['popular_title']	   	 		= esc_html__( 'Popular Posts', 'blogmelody' );
	$defaults['popular_posted_on_enable']			= true;

	// Author Section
	$defaults['disable_message_section']	= false;

	// Latest Posts Section

	$defaults['latest_posts_title']	   	 	= esc_html__( 'Recent New More Stories', 'blogmelody' );
	$defaults['pagination_type']		= 'default';

	// About Section
	$defaults['disable_about_section']	= false;
	$defaults['number_of_about_items']			= 4;
	$defaults['about_posted_on_enable']			= true;
	

	//General Section
	$defaults['readmore_text']				= esc_html__('Read More','blogmelody');
	$defaults['excerpt_length']				= 30;
	$defaults['layout_options_blog']			= 'no-sidebar';
	$defaults['layout_options_archive']			= 'right-sidebar';
	$defaults['layout_options_page']			= 'right-sidebar';	
	$defaults['layout_options_single']			= 'right-sidebar';	

	//Footer section 		
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'blogmelody' );
	$defaults['powered_by_text']			= esc_html__( 'BlogMelody by Sensational Theme', 'blogmelody' );

	// Pass through filter.
	$defaults = apply_filters( 'blogmelody_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'blogmelody_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function blogmelody_get_option( $key ) {

		$default_options = blogmelody_get_default_theme_options();
		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;