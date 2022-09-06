<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'vivid_blog_single_post_section', array(
	'title'             => esc_html__( 'Single Post','vivid-blog' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'vivid-blog' ),
	'panel'             => 'vivid_blog_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'vivid-blog' ),
	'section'           => 'vivid_blog_single_post_section',
	'on_off_label' 		=> vivid_blog_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'vivid-blog' ),
	'section'           => 'vivid_blog_single_post_section',
	'on_off_label' 		=> vivid_blog_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'vivid-blog' ),
	'section'           => 'vivid_blog_single_post_section',
	'on_off_label' 		=> vivid_blog_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'vivid-blog' ),
	'section'           => 'vivid_blog_single_post_section',
	'on_off_label' 		=> vivid_blog_hide_options(),
) ) );
