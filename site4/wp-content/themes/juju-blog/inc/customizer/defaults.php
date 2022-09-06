<?php
/**
* Customizer default options
*
* @package Theme Palace
* @subpackage Juju Blog
* @since Juju Blog 1.0.0
* @return array An array of default values
*/

function juju_blog_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$juju_blog_default_options = array(
		// Color Options
		'header_title_color'			=> '#2c2d39',
		'header_tagline_color'			=> '#990f12',
		'header_txt_logo_extra'			=> 'show-all',

		// breadcrumb
		'breadcrumb_enable'				=> (bool) true,
		'breadcrumb_separator'			=> '/',

		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// pagination options
		'pagination_enable'         	=> (bool) true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'juju-blog' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> (bool) true,

		// reset options
		'reset_options'      			=> (bool) false,

		// homepage options
		'enable_frontpage_content' 		=> (bool) false,

		// homepage sections sortable
		'all_sortable'	=> 'slider,topics,about,recent_posts,most_read',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'juju-blog' ),
		'hide_category'					=> (bool) false,
		'hide_author'					=> (bool) false,
		'hide_description'				=> (bool) false,

		// single post theme options
		'single_post_hide_date' 		=> (bool) false,
		'single_post_hide_author'		=> (bool) false,
		'single_post_hide_category'		=> (bool) false,

		/* Front Page */

		// top_bar
		'top_bar_section_enable'	=> (bool) false,
		'top_bar_notice'			=> esc_html__( 'Lifestyle and Fashion Blog Theme For Everyone', 'juju-blog' ),
		'top_bar_email'				=> esc_html__( 'info@themepalace.com', 'juju-blog' ),

		// slider
		'slider_section_enable'			=> (bool) false,

		// topics
		'topics_section_enable'			=> (bool) false,
		'topics_title'					=> esc_html__( 'Trending Topics', 'juju-blog' ),

		//about 
		'about_section_enable'		=> (bool) false,
		'about_btn_text'			=> esc_html__( 'Read More', 'juju-blog' ),

		//recent_posts 
		'recent_posts_section_enable'		=> (bool) false,
		'recent_posts_title'				=> esc_html__( 'Recent Posts', 'juju-blog' ),
		'recent_posts_btn_text'				=> esc_html__( 'Read More', 'juju-blog' ),

		// most_read
		'most_read_section_enable'			=> (bool) false,
		'most_read_content_type'			=> 'post',
		'most_read_title'					=> esc_html__( 'You May Have Missed', 'juju-blog' ),

		);

$output = apply_filters( 'juju_blog_default_theme_options', $juju_blog_default_options );

// Sort array in ascending order, according to the key:
if ( ! empty( $output ) ) {
	ksort( $output );
}

return $output;
}