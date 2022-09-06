<?php 
/**
 * Theme Options.
 *
 * @package Giddy Blog
 */

$default = giddy_blog_get_default_theme_options();

// Single Post Setting Section starts
$wp_customize->add_section('section_single_post', 
	array(    
	'title'       => __('Single Post Option', 'giddy-blog'),
	'panel'       => 'theme_option_panel'    
	)
);

// Add Single Header Image enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_header_image_as_header_image_enable]', array(
	'default'           => $default['single_post_header_image_as_header_image_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_header_image_as_header_image_enable]', array(
	'label'             => esc_html__( 'Enable Header Image As Header Image', 'giddy-blog' ),
	'description' => __('If this option is Enable then Display Header Image as Header Image Otherwise display Featured Image as Header Image  ', 'giddy-blog'),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );

// Add Single Post Video enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_video_enable]', array(
	'default'           => $default['single_post_video_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_video_enable]', array(
	'label'             => esc_html__( 'Enable Featured Video', 'giddy-blog' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );

// Add Single Post Pagimation enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_pagination_enable]', array(
	'default'           => $default['single_post_pagination_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_pagination_enable]', array(
	'label'             => esc_html__( 'Enable Pagination', 'giddy-blog' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );

// Add Single Post Comment enable setting and control.
$wp_customize->add_setting( 'theme_options[single_post_comment_enable]', array(
	'default'           => $default['single_post_comment_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[single_post_comment_enable]', array(
	'label'             => esc_html__( 'Enable Comment', 'giddy-blog' ),
	'section'           => 'section_single_post',
	'type'              => 'checkbox',

) );