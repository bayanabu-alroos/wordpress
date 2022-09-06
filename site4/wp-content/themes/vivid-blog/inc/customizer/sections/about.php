<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Add About section
$wp_customize->add_section( 'vivid_blog_about_section', array(
	'title'             => esc_html__( 'About Us','vivid-blog' ),
	'description'       => esc_html__( 'About Section options.', 'vivid-blog' ),
	'panel'             => 'vivid_blog_front_page_panel',
	'priority' => 30,
) );

// About content enable control and setting
$wp_customize->add_setting( 'vivid_blog_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'vivid-blog' ),
	'section'           => 'vivid_blog_about_section',
	'on_off_label' 		=> vivid_blog_switch_options(),
) ) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'vivid_blog_theme_options[about_content_page]', array(
	'sanitize_callback' => 'vivid_blog_sanitize_page',
) );

$wp_customize->add_control( new Vivid_Blog_Dropdown_Chooser( $wp_customize, 'vivid_blog_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'vivid-blog' ),
	'section'           => 'vivid_blog_about_section',
	'choices'			=> vivid_blog_page_choices(),
	'active_callback'	=> 'vivid_blog_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'vivid_blog_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'vivid_blog_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'vivid-blog' ),
	'section'        	=> 'vivid_blog_about_section',
	'active_callback' 	=> 'vivid_blog_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'vivid_blog_theme_options[about_btn_title]', array(
		'selector'            => '#about-us a.btn',
		'settings'            => 'vivid_blog_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'vivid_blog_about_btn_title_partial',
    ) );
}
