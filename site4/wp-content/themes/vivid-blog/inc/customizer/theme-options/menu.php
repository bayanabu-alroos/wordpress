<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'vivid_blog_menu', array(
	'title'             => esc_html__('Header Menu','vivid-blog'),
	'description'       => esc_html__( 'Header Menu options.', 'vivid-blog' ),
	'panel'             => 'nav_menus',
) );

// search enable setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[nav_search_enable]', array(
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
	'default'           => $options['nav_search_enable'],
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[nav_search_enable]', array(
	'label'             => esc_html__( 'Enable search', 'vivid-blog' ),
	'section'           => 'vivid_blog_menu',
	'on_off_label' 		=> vivid_blog_switch_options(),
) ) );