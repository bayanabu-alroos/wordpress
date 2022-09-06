<?php
/**
* Slider Section options
*
* @package Theme Palace
* @subpackage Juju Blog
* @since Juju Blog 1.0.0
*/

// Add Slider section
$wp_customize->add_section( 'juju_blog_featured_slider_section', array(
	'title'             => esc_html__( 'Main Slider','juju-blog' ),
	'description'       => esc_html__( 'Slider Section options.', 'juju-blog' ),
	'panel'             => 'juju_blog_front_page_panel',
	) );

// Slider content enable control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
	) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'juju-blog' ),
	'section'           => 'juju_blog_featured_slider_section',
	'on_off_label' 		=> juju_blog_switch_options(),
	) ) );

for ( $i = 1; $i <= 3; $i++ ) :

// slider posts drop down chooser control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[slider_content_post_' . $i . ']', array(
	'sanitize_callback' => 'juju_blog_sanitize_page',
	) );

$wp_customize->add_control( new Juju_Blog_Dropdown_Chooser( $wp_customize, 'juju_blog_theme_options[slider_content_post_' . $i . ']', array(
	'label'             => sprintf( esc_html__( 'Select Post %d', 'juju-blog' ), $i ),
	'section'           => 'juju_blog_featured_slider_section',
	'choices'			=> juju_blog_post_choices(),
	'active_callback'	=> 'juju_blog_is_slider_section_enable',
	) ) );
endfor;