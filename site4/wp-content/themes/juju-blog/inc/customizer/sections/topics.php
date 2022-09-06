<?php
/**
 * Trending Topics Section options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

// Add Trending Topics section
$wp_customize->add_section( 'juju_blog_trending_topics_section', array(
	'title'             => esc_html__( 'Trending Topics','juju-blog' ),
	'description'       => esc_html__( 'Trending Topics Section options.', 'juju-blog' ),
	'panel'				=> 'juju_blog_front_page_panel',
) );

// Trending Topics content enable control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[topics_section_enable]', array(
	'default'			=> 	$options['topics_section_enable'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[topics_section_enable]', array(
	'label'             => esc_html__( 'Trending Topics Section Enable', 'juju-blog' ),
	'section'           => 'juju_blog_trending_topics_section',
	'on_off_label' 		=> juju_blog_switch_options(),
) ) );

// Trending Topics btn label setting and control
$wp_customize->add_setting( 'juju_blog_theme_options[topics_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['topics_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'juju_blog_theme_options[topics_title]', array(
	'label'           	=> esc_html__( 'Section Title', 'juju-blog' ),
	'section'        	=> 'juju_blog_trending_topics_section',
	'active_callback' 	=> 'juju_blog_is_topics_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'juju_blog_theme_options[topics_title]', array(
		'selector'            => '#juju_blog_trending_topics_section .section-title',
		'settings'            => 'juju_blog_theme_options[topics_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'juju_blog_topics_title_partial',
    ) );
}

for ( $i = 1; $i <= 6; $i++ ) :

	// blog_posts posts drop down chooser control and setting
	$wp_customize->add_setting( 'juju_blog_theme_options[topics_content_post_' . $i . ']', array(
		'sanitize_callback' => 'juju_blog_sanitize_page',
	) );

	$wp_customize->add_control( new Juju_Blog_Dropdown_Chooser( $wp_customize, 'juju_blog_theme_options[topics_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'juju-blog' ), $i ),
		'section'           => 'juju_blog_trending_topics_section',
		'choices'			=> juju_blog_post_choices(),
		'active_callback'	=> 'juju_blog_is_topics_section_enable',
	) ) );

endfor;