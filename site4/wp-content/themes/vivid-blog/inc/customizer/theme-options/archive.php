<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'vivid_blog_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','vivid-blog' ),
	'description'       => esc_html__( 'Archive section options.', 'vivid-blog' ),
	'panel'             => 'vivid_blog_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'vivid_blog_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'vivid-blog' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'vivid-blog' ),
	'section'           => 'vivid_blog_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'vivid_blog_is_latest_posts'
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[hide_date]', array(
	'default'           => $options['hide_date'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'vivid-blog' ),
	'section'           => 'vivid_blog_archive_section',
	'on_off_label' 		=> vivid_blog_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[hide_author]', array(
	'default'           => $options['hide_author'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'vivid-blog' ),
	'section'           => 'vivid_blog_archive_section',
	'on_off_label' 		=> vivid_blog_hide_options(),
) ) );

// Archive category setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'vivid-blog' ),
	'section'           => 'vivid_blog_archive_section',
	'on_off_label' 		=> vivid_blog_hide_options(),
) ) );