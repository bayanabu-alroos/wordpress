<?php
/**
 * Recent Posts Section options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

// Add Recent Posts section
$wp_customize->add_section( 'juju_blog_most_recent_posts_section', array(
	'title'             => esc_html__( 'Recent Posts','juju-blog' ),
	'description'       => esc_html__( 'Recent Posts Section options.', 'juju-blog' ),
	'panel'				=> 'juju_blog_front_page_panel',
) );

// Recent Posts content enable control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[recent_posts_section_enable]', array(
	'default'			=> 	$options['recent_posts_section_enable'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[recent_posts_section_enable]', array(
	'label'             => esc_html__( 'Recent Posts Section Enable', 'juju-blog' ),
	'section'           => 'juju_blog_most_recent_posts_section',
	'on_off_label' 		=> juju_blog_switch_options(),
) ) );

// Recent Posts btn label setting and control
$wp_customize->add_setting( 'juju_blog_theme_options[recent_posts_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['recent_posts_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'juju_blog_theme_options[recent_posts_title]', array(
	'label'           	=> esc_html__( 'Section Title', 'juju-blog' ),
	'section'        	=> 'juju_blog_most_recent_posts_section',
	'active_callback' 	=> 'juju_blog_is_recent_posts_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'juju_blog_theme_options[recent_posts_title]', array(
		'selector'            => '#juju_blog_most_recent_posts_section .section-title',
		'settings'            => 'juju_blog_theme_options[recent_posts_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'juju_blog_recent_posts_title_partial',
    ) );
}

for ( $i = 1; $i <= 4; $i++ ) :

	// recent_posts posts drop down chooser control and setting
	$wp_customize->add_setting( 'juju_blog_theme_options[recent_posts_content_post_' . $i . ']', array(
		'sanitize_callback' => 'juju_blog_sanitize_page',
	) );

	$wp_customize->add_control( new Juju_Blog_Dropdown_Chooser( $wp_customize, 'juju_blog_theme_options[recent_posts_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'juju-blog' ), $i ),
		'section'           => 'juju_blog_most_recent_posts_section',
		'choices'			=> juju_blog_post_choices(),
		'active_callback'	=> 'juju_blog_is_recent_posts_section_enable',
	) ) );

endfor;