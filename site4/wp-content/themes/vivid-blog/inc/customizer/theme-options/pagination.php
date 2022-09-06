<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'vivid_blog_pagination', array(
	'title'               => esc_html__('Pagination','vivid-blog'),
	'description'         => esc_html__( 'Pagination section options.', 'vivid-blog' ),
	'panel'               => 'vivid_blog_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'vivid-blog' ),
	'section'             => 'vivid_blog_pagination',
	'on_off_label' 		=> vivid_blog_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'vivid_blog_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'vivid_blog_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'vivid-blog' ),
	'section'             => 'vivid_blog_pagination',
	'type'                => 'select',
	'choices'			  => vivid_blog_pagination_options(),
	'active_callback'	  => 'vivid_blog_is_pagination_enable',
) );
