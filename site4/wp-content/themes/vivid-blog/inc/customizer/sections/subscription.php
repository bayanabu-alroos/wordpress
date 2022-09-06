<?php
/**
 * Subscription Section options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Add Subscription section
$wp_customize->add_section( 'vivid_blog_subscription_section', array(
	'title'             => esc_html__( 'Subscription','vivid-blog' ),
	'description'       => esc_html__( 'Note: To activate this section you need to install Jetpack Plugin and activate subscription module.', 'vivid-blog' ),
	'panel'             => 'vivid_blog_front_page_panel',
	'priority' => 50,
) );

// Subscription content enable control and setting
$wp_customize->add_setting( 'vivid_blog_theme_options[subscription_section_enable]', array(
	'default'			=> 	$options['subscription_section_enable'],
	'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[subscription_section_enable]', array(
	'label'             => esc_html__( 'Subscription Section Enable', 'vivid-blog' ),
	'section'           => 'vivid_blog_subscription_section',
	'on_off_label' 		=> vivid_blog_switch_options(),
) ) );

// subscription title setting and control
$wp_customize->add_setting( 'vivid_blog_theme_options[subscription_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['subscription_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'vivid_blog_theme_options[subscription_title]', array(
	'label'           	=> esc_html__( 'Title', 'vivid-blog' ),
	'section'        	=> 'vivid_blog_subscription_section',
	'active_callback' 	=> 'vivid_blog_is_subscription_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'vivid_blog_theme_options[subscription_title]', array(
		'selector'            => '#subscribe .section-header h2.section-title',
		'settings'            => 'vivid_blog_theme_options[subscription_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'vivid_blog_subscription_title_partial',
    ) );
}

// subscription image setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[subscription_image]', array(
	'sanitize_callback' => 'vivid_blog_sanitize_image',
	'default'			=> $options['subscription_image'],
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'vivid_blog_theme_options[subscription_image]',
		array(
		'label'       		=> esc_html__( 'Image', 'vivid-blog' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'vivid-blog' ), 1280, 854 ),
		'section'     		=> 'vivid_blog_subscription_section',
		'active_callback'	=> 'vivid_blog_is_subscription_section_enable',
) ) );

// subscription btn title setting and control
$wp_customize->add_setting( 'vivid_blog_theme_options[subscription_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['subscription_btn_title'],
) );

$wp_customize->add_control( 'vivid_blog_theme_options[subscription_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'vivid-blog' ),
	'section'        	=> 'vivid_blog_subscription_section',
	'active_callback' 	=> 'vivid_blog_is_subscription_section_enable',
	'type'				=> 'text',
) );

