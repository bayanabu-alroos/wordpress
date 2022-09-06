<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'juju_blog_pagination', array(
	'title'               => esc_html__('Pagination','juju-blog'),
	'description'         => esc_html__( 'Pagination section options.', 'juju-blog' ),
	'panel'               => 'juju_blog_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'juju-blog' ),
	'section'             => 'juju_blog_pagination',
	'on_off_label' 		=> juju_blog_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'juju_blog_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'juju_blog_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'juju-blog' ),
	'section'             => 'juju_blog_pagination',
	'type'                => 'select',
	'choices'			  => juju_blog_pagination_options(),
	'active_callback'	  => 'juju_blog_is_pagination_enable',
) );
