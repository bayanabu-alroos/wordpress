<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'vivid_blog_slider_section', array(
	'title'             => esc_html__( 'Main Slider','vivid-blog' ),
	'description'       => esc_html__( 'Slider Section options.', 'vivid-blog' ),
	'panel'             => 'vivid_blog_front_page_panel',
	'priority' => 20,
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'vivid_blog_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'vivid-blog' ),
	'section'           => 'vivid_blog_slider_section',
	'on_off_label' 		=> vivid_blog_switch_options(),
) ) );

for ( $i = 1; $i <= 4; $i++ ) :
	// slider posts drop down chooser control and setting
	$wp_customize->add_setting( 'vivid_blog_theme_options[slider_content_post_' . $i . ']', array(
		'sanitize_callback' => 'vivid_blog_sanitize_page',
	) );

	$wp_customize->add_control( new Vivid_Blog_Dropdown_Chooser( $wp_customize, 'vivid_blog_theme_options[slider_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'vivid-blog' ), $i ),
		'section'           => 'vivid_blog_slider_section',
		'choices'			=> vivid_blog_post_choices(),
		'active_callback'	=> 'vivid_blog_is_slider_section_enable',
	) ) );
endfor;
