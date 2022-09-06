<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'juju_blog_single_post_section', array(
	'title'             => esc_html__( 'Single Post','juju-blog' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'juju-blog' ),
	'panel'             => 'juju_blog_theme_options_panel',
) );

// Tourableve date meta setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'juju-blog' ),
	'section'           => 'juju_blog_single_post_section',
	'on_off_label' 		=> juju_blog_hide_options(),
) ) );

// Tourableve author meta setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'juju-blog' ),
	'section'           => 'juju_blog_single_post_section',
	'on_off_label' 		=> juju_blog_hide_options(),
) ) );

// Tourableve author category setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'juju-blog' ),
	'section'           => 'juju_blog_single_post_section',
	'on_off_label' 		=> juju_blog_hide_options(),
) ) );