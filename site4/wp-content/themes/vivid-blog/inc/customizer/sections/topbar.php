<?php
/**
 * Topbar Section options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Add Topbar section
$wp_customize->add_section( 'vivid_blog_topbar_section', array(
	'title'             => esc_html__( 'Header Meta','vivid-blog' ),
	'description'       => esc_html__( 'Header Meta options.', 'vivid-blog' ),
	'panel'             => 'vivid_blog_front_page_panel',
	'priority' => 10,
) );

// top bar menu visible
$wp_customize->add_setting( 'vivid_blog_theme_options[topbar_social_enable]',
	array(
		'default'       	=> $options['topbar_social_enable'],
		'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[topbar_social_enable]',
    array(
		'label'      		=> esc_html__( 'Display Social Menu', 'vivid-blog' ),
		'description'       => sprintf( '%1$s <a class="topbar-menu-trigger" href="#"> %2$s </a> %3$s', esc_html__( 'Note: To show topbar menu.', 'vivid-blog' ), esc_html__( 'Click Here', 'vivid-blog' ), esc_html__( 'to create menu', 'vivid-blog' ) ),
		'section'    		=> 'vivid_blog_topbar_section',
		'on_off_label' 		=> vivid_blog_switch_options(),
    )
) );

// topbar author name setting and control
$wp_customize->add_setting( 'vivid_blog_theme_options[topbar_author]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_author'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'vivid_blog_theme_options[topbar_author]', array(
	'label'           	=> esc_html__( 'Author Name', 'vivid-blog' ),
	'section'        	=> 'vivid_blog_topbar_section',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'vivid_blog_theme_options[topbar_author]', array(
		'selector'            => '.site-branding-wrapper .site-advertisement .desc span.topbar-author',
		'settings'            => 'vivid_blog_theme_options[topbar_author]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'vivid_blog_topbar_author_partial',
    ) );
}

// topbar author position setting and control
$wp_customize->add_setting( 'vivid_blog_theme_options[topbar_author_position]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topbar_author_position'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'vivid_blog_theme_options[topbar_author_position]', array(
	'label'           	=> esc_html__( 'Author Position', 'vivid-blog' ),
	'section'        	=> 'vivid_blog_topbar_section',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'vivid_blog_theme_options[topbar_author_position]', array(
		'selector'            => '.site-branding-wrapper .site-advertisement .desc p',
		'settings'            => 'vivid_blog_theme_options[topbar_author_position]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'vivid_blog_topbar_author_position_partial',
    ) );
}

// topbar author image setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[topbar_author_image]', array(
	'sanitize_callback' => 'vivid_blog_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'vivid_blog_theme_options[topbar_author_image]',
		array(
		'label'       		=> esc_html__( 'Author Image', 'vivid-blog' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'vivid-blog' ), 100, 100 ),
		'section'     		=> 'vivid_blog_topbar_section',
) ) );