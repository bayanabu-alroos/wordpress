<?php
/**
 * Topbar Section options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

// Add Topbar section
$wp_customize->add_section( 'juju_blog_top_bar_section', array(
	'title'             => esc_html__( 'Topbar','juju-blog' ),
	'description'       => esc_html__( 'Topbar Section options.', 'juju-blog' ),
	'panel'             => 'juju_blog_front_page_panel',
) );

// top_bar enable/disable control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[top_bar_section_enable]', array(
	'default'			=> 	$options['top_bar_section_enable'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[top_bar_section_enable]', array(
	'label'             => esc_html__( 'Topbar Section Enable', 'juju-blog' ),
	'section'           => 'juju_blog_top_bar_section',
	'on_off_label' 		=> juju_blog_switch_options(),
) ) );

$wp_customize->add_setting( 'juju_blog_theme_options[top_bar_notice]', array(
    'default'           =>  $options['top_bar_notice'],
    'sanitize_callback' => 'sanitize_text_field',
    'transport'			=> 'postMessage',
) );

$wp_customize->add_control('juju_blog_theme_options[top_bar_notice]', array(
    'label'             => esc_html__( 'Topbar Notice', 'juju-blog' ),
    'section'           => 'juju_blog_top_bar_section',
    'type'              => 'text',
    'active_callback'   => 'juju_blog_is_top_bar_section_enable',
 ) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'juju_blog_theme_options[top_bar_notice]', array(
		'selector'            => '#top_navigation .top-navigation-content p',
		'settings'            => 'juju_blog_theme_options[top_bar_notice]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'juju_blog_top_bar_notice_partial',
    ) );
}

$wp_customize->add_setting( 'juju_blog_theme_options[top_bar_email]', array(
    'default'           =>  $options['top_bar_email'],
    'sanitize_callback' => 'sanitize_email',
    'transport'			=> 'postMessage',
) );

$wp_customize->add_control('juju_blog_theme_options[top_bar_email]', array(
    'label'             => esc_html__( 'Email Id', 'juju-blog' ),
    'section'           => 'juju_blog_top_bar_section',
    'type'              => 'email',
    'active_callback'   => 'juju_blog_is_top_bar_section_enable',
 ) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'juju_blog_theme_options[top_bar_email]', array(
		'selector'            => '#top_navigation .contact-information a',
		'settings'            => 'juju_blog_theme_options[top_bar_email]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'juju_blog_top_bar_email_partial',
    ) );
}