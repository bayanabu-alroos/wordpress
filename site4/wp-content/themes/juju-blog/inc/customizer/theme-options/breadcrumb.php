<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

$wp_customize->add_section( 'juju_blog_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','juju-blog' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'juju-blog' ),
	'panel'             => 'juju_blog_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'juju-blog' ),
	'section'          	=> 'juju_blog_breadcrumb',
	'on_off_label' 		=> juju_blog_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'juju_blog_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'juju-blog' ),
	'active_callback' 	=> 'juju_blog_is_breadcrumb_enable',
	'section'          	=> 'juju_blog_breadcrumb',
) );
