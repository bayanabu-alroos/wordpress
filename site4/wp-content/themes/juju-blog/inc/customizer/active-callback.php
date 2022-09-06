<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

if ( ! function_exists( 'juju_blog_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Juju Blog 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function juju_blog_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'juju_blog_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'juju_blog_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Juju Blog 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function juju_blog_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'juju_blog_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'juju_blog_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Juju Blog 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function juju_blog_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Front Page Active Callbacks
 */

/*=====================top_bar================*/
/**
 * Check if top_bar section is enabled.
 *
 * @since Juju Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function juju_blog_is_top_bar_section_enable( $control ) {
	return ( $control->manager->get_setting( 'juju_blog_theme_options[top_bar_section_enable]' )->value() );
}

/*========================slider====================*/

/**
 * Check if slider section is enabled.
 *
 * @since Juju Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function juju_blog_is_slider_section_enable( $control ) {

	return $control->manager->get_setting( 'juju_blog_theme_options[slider_section_enable]' )->value() ;
}

/*========================topics====================*/

/**
 * Check if topics section is enabled.
 *
 * @since Juju Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function juju_blog_is_topics_section_enable( $control ) {

	return $control->manager->get_setting( 'juju_blog_theme_options[topics_section_enable]' )->value() ;
}

/*=========================Recent Posts==================*/

/**
 * Check if recent_posts section is enabled.
 *
 * @since Juju Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function juju_blog_is_recent_posts_section_enable( $control ) {
	return ( $control->manager->get_setting( 'juju_blog_theme_options[recent_posts_section_enable]' )->value() );
}

/*========================most_read====================*/

/**
 * Check if most_read section is enabled.
 *
 * @since Juju Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function juju_blog_is_most_read_section_enable( $control ) {

	return $control->manager->get_setting( 'juju_blog_theme_options[most_read_section_enable]' )->value() ;
}

/**
 * Check if most_read section content type is category.
 *
 * @since Juju Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function juju_blog_is_most_read_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'juju_blog_theme_options[most_read_content_type]' )->value();
	return juju_blog_is_most_read_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if most_read section content type is post.
 *
 * @since Juju Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function juju_blog_is_most_read_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'juju_blog_theme_options[most_read_content_type]' )->value();
	return juju_blog_is_most_read_section_enable( $control ) && ( 'post' == $content_type );
}



/*=======================about=====================*/
/**
 * Check if about section is enabled.
 *
 * @since Juju Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function juju_blog_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'juju_blog_theme_options[about_section_enable]' )->value() );
}