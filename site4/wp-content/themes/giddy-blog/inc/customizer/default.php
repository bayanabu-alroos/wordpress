<?php
/**
 * Default theme options.
 *
 * @package Giddy Blog
 */

if ( ! function_exists( 'giddy_blog_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function giddy_blog_get_default_theme_options() {

	$theme_data = wp_get_theme();
	$defaults = array();

	$defaults['show_header_contact_info'] 	= false;
	$defaults['disable_homepage_content_section'] 			= true;
    $defaults['header_email']             	= __( 'info@sensationaltheme.com','giddy-blog' );
    $defaults['header_phone' ]            	= __( '+1-541-754-3010','giddy-blog' );
    $defaults['header_location' ]           = __( 'London, UK','giddy-blog' );
    $defaults['show_header_social_links'] 	= false;
    $defaults['header_social_links']		= array();
    $defaults['disable_header_background_section'] = false;
    $defaults['show_header_search'] 	= true;


    $defaults['header_text_transform_options'] 	= 'none';
    $defaults['header_text_decoration_options'] 	= 'none';
    $defaults['header_font_style_options'] 	= 'none';
    $defaults['header_text_design'] 	= false;

	// Featured Slider Section
	$defaults['disable_featured-slider_section']	= false;
	$defaults['number_of_sr_items']			= 4;
	$defaults['number_of_sr_column']		= 1;
	$defaults['slider_layout_option']			= 'fullwidth-slider';
	$defaults['slider_content_position_option']			= 'default-position';
	$defaults['sr_content_type']			= 'sr_page';
	$defaults['slider_speed']				= 800;
	$defaults['disable_white_overlay']		= false;
	$defaults['slider_arrow_enable']		= true;
	$defaults['slider_fade_enable']		= true;
	$defaults['slider_autoplay_enable']		= true;
	$defaults['slider_infinite_enable']		= true;
	$defaults['slider_title_enable']		= true;
	$defaults['slider_category_enable']		= true;
	$defaults['slider_content_enable']		= true;
	$defaults['slider_posted_on_enable']		= true;
	$defaults['disable_blog_banner_section']		= true;

	// Latest Posts Section

	$defaults['latest_posts_title']	   	 	= esc_html__( 'Outer beauty turns the head, but inner beauty turns the heart.', 'giddy-blog' );
	$defaults['latest_section_posts_title']	   	 	= esc_html__( '"I love natural beauty, and I think it’s your best look, but I think makeup as an artist is so transformative."', 'giddy-blog' );
	$defaults['number_of_latest_posts_column']	= 1;
	$defaults['pagination_type']		= 'default';
	$defaults['latest_category_enable']		= true;
	$defaults['latest_author_enable']		= true;
	$defaults['latest_comment_enable']		= true;
	$defaults['latest_read_more_text_enable']		= false;
	$defaults['latest_posted_on_enable']		= true;
	$defaults['latest_video_enable']		= true;
	$defaults['blog_layout_content_type']		= 'blog-two';
	$defaults['archive_post_header_title_enable']		= true;
	$defaults['blog_post_header_title_enable']		= true;

	// About Section
	$defaults['disable_about_section']	= false;
	$defaults['number_of_about_items']			= 3;
	$defaults['about_layout_option']			= 'default-about';
	$defaults['about_content_type']			= 'about_post';
	$defaults['about_category_enable']		= true;
	$defaults['about_posted_on_enable']		= true;
	$defaults['about_arrow_enable']		= true;
	$defaults['about_dots_enable']		= true;
	$defaults['about_content_enable']		= false;

	// Single Post Option
	$defaults['single_post_category_enable']		= true;
	$defaults['single_post_posted_on_enable']		= true;
	$defaults['single_post_video_enable']		= true;
	$defaults['single_post_comment_enable']		= true;
	$defaults['single_post_author_enable']		= true;
	$defaults['single_post_pagination_enable']		= true;
	$defaults['single_post_image_enable']		= true;
	$defaults['single_post_header_image_enable']		= true;
	$defaults['single_post_header_title_enable']		= true;
	$defaults['single_post_header_image_as_header_image_enable']		= true;

	// Single Post Option
	$defaults['single_page_video_enable']		= true;
	$defaults['single_page_image_enable']		= true;
	$defaults['single_page_header_image_enable']		= true;
	$defaults['single_page_header_title_enable']		= true;
	$defaults['single_page_header_image_as_header_image_enable']		= true;
	
	$defaults['theme_typography']			=  'default';
	$defaults['body_theme_typography']		=  'default';

	//General Section
	$defaults['latest_readmore_text']				= esc_html__('Read More','giddy-blog');
	$defaults['excerpt_length']				= 50;
	$defaults['layout_options_blog']			= 'no-sidebar';
	$defaults['layout_options_archive']			= 'no-sidebar';
	$defaults['layout_options_page']			= 'no-sidebar';	
	$defaults['layout_options_single']			= 'no-sidebar';	

	//Footer section 
	$defaults['scroll_top_visible']		= true;		
	$defaults['copyright_text']				= esc_html__( 'Copyright &copy; All rights reserved.', 'giddy-blog' );
	$defaults['powered_by_text']			= esc_html__( 'Giddy Blog by Sensational Theme', 'giddy-blog' );

	// Pass through filter.
	$defaults = apply_filters( 'giddy_blog_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'giddy_blog_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function giddy_blog_get_option( $key ) {

		$default_options = giddy_blog_get_default_theme_options();
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