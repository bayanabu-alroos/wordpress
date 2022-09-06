<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 * @return array An array of default values
 */

function vivid_blog_get_default_theme_options() {
	$vivid_blog_default_options = array(
		// Color Options
		'header_title_color'			=> '#173857',
		'header_tagline_color'			=> '#173857',
		'header_txt_logo_extra'			=> 'show-all',
		
		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',
		'nav_search_enable'				=> true,

		// excerpt options
		'long_excerpt_length'           => 25,
		'read_more_text'           		=> esc_html__( '( Read More )', 'vivid-blog' ),
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s. ', '1: Year, 2: Site Title with home URL', 'vivid-blog' ), '[the-year]', '[site-link]' ) . esc_html__( 'All Rights Reserved', 'vivid-blog' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'slider,about,blog,subscription',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'vivid-blog' ),
		'hide_date' 					=> false,
		'hide_author'					=> false,
		'hide_category'					=> false,

		// single post theme options
		'single_post_hide_date' 		=> false,
		'single_post_hide_author'		=> false,
		'single_post_hide_category'		=> false,
		'single_post_hide_tags'			=> false,

		/* Front Page */

		// topbar
		'topbar_social_enable'			=> false,
		'topbar_author'					=> esc_html__( 'Alexa Bliss', 'vivid-blog' ),
		'topbar_author_position'		=> esc_html__( 'Editor @ ABC', 'vivid-blog' ),

		// Slider
		'slider_section_enable'			=> false,

		// About
		'about_section_enable'			=> false,
		'about_btn_title'				=> esc_html__( 'Learn More', 'vivid-blog' ),

		// blog
		'blog_section_enable'			=> false,
		'blog_content_type'				=> 'recent',
		'blog_title'					=> esc_html__( 'From The Blog', 'vivid-blog' ),

		// Subscription
		'subscription_section_enable'	=> false,
		'subscription_title'			=> esc_html__( 'Don&#39;t miss any updates', 'vivid-blog' ),
		'subscription_btn_title'		=> esc_html__( 'Subscribe Now', 'vivid-blog' ),
		'subscription_image'			=> get_template_directory_uri() . '/assets/uploads/subscribe.jpg',

	);

	$output = apply_filters( 'vivid_blog_default_theme_options', $vivid_blog_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}