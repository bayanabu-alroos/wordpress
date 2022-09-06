<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

$wp_customize->add_section( 'vivid_blog_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','vivid-blog' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'vivid-blog' ),
	'panel'             => 'vivid_blog_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'vivid-blog' ),
	'section'          	=> 'vivid_blog_breadcrumb',
	'on_off_label' 		=> vivid_blog_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'vivid_blog_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'vivid-blog' ),
	'active_callback' 	=> 'vivid_blog_is_breadcrumb_enable',
	'section'          	=> 'vivid_blog_breadcrumb',
) );
