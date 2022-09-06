<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

if ( ! function_exists( 'vivid_blog_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Vivid Blog 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function vivid_blog_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'vivid_blog_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'vivid_blog_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Vivid Blog 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function vivid_blog_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'vivid_blog_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Vivid Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function vivid_blog_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'vivid_blog_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Vivid Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function vivid_blog_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'vivid_blog_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Vivid Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function vivid_blog_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'vivid_blog_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Vivid Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function vivid_blog_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'vivid_blog_theme_options[blog_content_type]' )->value();
	return vivid_blog_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Vivid Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function vivid_blog_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'vivid_blog_theme_options[blog_content_type]' )->value();
	return vivid_blog_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}

/**
 * Check if subscription section is enabled.
 *
 * @since Vivid Blog 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function vivid_blog_is_subscription_section_enable( $control ) {
	return ( $control->manager->get_setting( 'vivid_blog_theme_options[subscription_section_enable]' )->value() );
}
