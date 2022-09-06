<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'juju_blog_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','juju-blog' ),
	'description'       => esc_html__( 'Archive section options.', 'juju-blog' ),
	'panel'             => 'juju_blog_theme_options_panel',
) );

// Your latest posts title setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[your_latest_posts_title]', array(
	'default'           => $options['your_latest_posts_title'],
	'sanitize_callback' => 'sanitize_text_field',
) );

$wp_customize->add_control( 'juju_blog_theme_options[your_latest_posts_title]', array(
	'label'             => esc_html__( 'Your Latest Posts Title', 'juju-blog' ),
	'description'       => esc_html__( 'This option only works if Static Front Page is set to "Your latest posts."', 'juju-blog' ),
	'section'           => 'juju_blog_archive_section',
	'type'				=> 'text',
	'active_callback'   => 'juju_blog_is_latest_posts'
) );



// Archive category setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[hide_category]', array(
	'default'           => $options['hide_category'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'juju-blog' ),
	'section'           => 'juju_blog_archive_section',
	'on_off_label' 		=> juju_blog_hide_options(),
) ) );



// Archive post description setting and controll
$wp_customize->add_setting( 'juju_blog_theme_options[hide_author]', array(
	'default'			=> $options['hide_author'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
	) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[hide_author]',
	array(
		'label'			=> esc_html__( 'Hide Author', 'juju-blog' ),
		'section'		=> 'juju_blog_archive_section',
		'on_off_label'	=> juju_blog_hide_options(),
		)
 ) );