<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'juju_blog_layout', array(
	'title'               => esc_html__('Layout','juju-blog'),
	'description'         => esc_html__( 'Layout section options.', 'juju-blog' ),
	'panel'               => 'juju_blog_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[site_layout]', array(
	'sanitize_callback'   => 'juju_blog_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Juju_Blog_Custom_Radio_Image_Control ( $wp_customize, 'juju_blog_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'juju-blog' ),
	'section'             => 'juju_blog_layout',
	'choices'			  => juju_blog_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'juju_blog_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Juju_Blog_Custom_Radio_Image_Control ( $wp_customize, 'juju_blog_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'juju-blog' ),
	'section'             => 'juju_blog_layout',
	'choices'			  => juju_blog_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'juju_blog_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Juju_Blog_Custom_Radio_Image_Control ( $wp_customize, 'juju_blog_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'juju-blog' ),
	'section'             => 'juju_blog_layout',
	'choices'			  => juju_blog_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'juju_blog_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Juju_Blog_Custom_Radio_Image_Control( $wp_customize, 'juju_blog_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'juju-blog' ),
	'section'             => 'juju_blog_layout',
	'choices'			  => juju_blog_sidebar_position(),
) ) );