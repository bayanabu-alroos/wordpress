<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

// Add About section
$wp_customize->add_section( 'juju_blog_about_section', array(
	'title'             => esc_html__( 'About Us','juju-blog' ),
	'description'       => esc_html__( 'About Us Section options.', 'juju-blog' ),
	'panel'             => 'juju_blog_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'juju-blog' ),
	'section'           => 'juju_blog_about_section',
	'on_off_label' 		=> juju_blog_switch_options(),
) ) );

// about title setting and control
$wp_customize->add_setting( 'juju_blog_theme_options[about_btn_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['about_btn_text'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'juju_blog_theme_options[about_btn_text]', array(
	'label'           	=> esc_html__( 'Button Label', 'juju-blog' ),
	'section'        	=> 'juju_blog_about_section',
	'active_callback' 	=> 'juju_blog_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'juju_blog_theme_options[about_btn_text]', array(
		'selector'            => '#juju_blog_about_section .view-more a',
		'settings'            => 'juju_blog_theme_options[about_btn_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'juju_blog_about_btn_text_partial',
    ) );
}

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[about_content_page]', array(
	'sanitize_callback' => 'juju_blog_sanitize_page',
) );

$wp_customize->add_control( new Juju_Blog_Dropdown_Chooser( $wp_customize, 'juju_blog_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'juju-blog' ),
	'section'           => 'juju_blog_about_section',
	'choices'			=> juju_blog_page_choices(),
	'active_callback'	=> 'juju_blog_is_about_section_enable',
) ) );