<?php
/**
* Most Read Section options
*
* @package Theme Palace
* @subpackage Juju Blog
* @since Juju Blog 1.0.0
*/

// Add Most Read section
$wp_customize->add_section( 'juju_blog_most_read_posts_section', array(
	'title'             => esc_html__( 'Most Read','juju-blog' ),
	'description'       => esc_html__( 'Most Read Section options.', 'juju-blog' ),
	'panel'             => 'juju_blog_front_page_panel',
	) );

// Most Read content enable control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[most_read_section_enable]', array(
	'default'			=> 	$options['most_read_section_enable'],
	'sanitize_callback' => 'juju_blog_sanitize_switch_control',
	) );

$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[most_read_section_enable]', array(
	'label'             => esc_html__( 'Most Read Section Enable', 'juju-blog' ),
	'section'           => 'juju_blog_most_read_posts_section',
	'on_off_label' 		=> juju_blog_switch_options(),
	) ) );

// Popular Posts btn label setting and control
$wp_customize->add_setting( 'juju_blog_theme_options[most_read_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['most_read_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'juju_blog_theme_options[most_read_title]', array(
	'label'           	=> esc_html__( 'Section Sub Title', 'juju-blog' ),
	'section'        	=> 'juju_blog_most_read_posts_section',
	'active_callback' 	=> 'juju_blog_is_most_read_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'juju_blog_theme_options[most_read_title]', array(
		'selector'            => '#juju_blog_most_read_posts_section h2.section-title',
		'settings'            => 'juju_blog_theme_options[most_read_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'juju_blog_most_read_title_partial',
    ) );
}

// Most Read content type control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[most_read_content_type]', array(
	'default'          	=> $options['most_read_content_type'],
	'sanitize_callback' => 'juju_blog_sanitize_select',
	) );

$wp_customize->add_control( 'juju_blog_theme_options[most_read_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'juju-blog' ),
	'section'           => 'juju_blog_most_read_posts_section',
	'type'				=> 'select',
	'active_callback' 	=> 'juju_blog_is_most_read_section_enable',
	'choices'			=> array( 
		'post' 		=> esc_html__( 'Post', 'juju-blog' ),
		'category' 	=> esc_html__( 'Category', 'juju-blog' ),
		),
	) );

for ( $i = 1; $i <= 3; $i++ ) :

// most_read posts drop down chooser control and setting
$wp_customize->add_setting( 'juju_blog_theme_options[most_read_content_post_' . $i . ']', array(
	'sanitize_callback' => 'juju_blog_sanitize_page',
	) );

$wp_customize->add_control( new Juju_Blog_Dropdown_Chooser( $wp_customize, 'juju_blog_theme_options[most_read_content_post_' . $i . ']', array(
	'label'             => sprintf( esc_html__( 'Select Post %d', 'juju-blog' ), $i ),
	'section'           => 'juju_blog_most_read_posts_section',
	'choices'			=> juju_blog_post_choices(),
	'active_callback'	=> 'juju_blog_is_most_read_section_content_post_enable',
	) ) );
endfor;

// Add dropdown category setting and control.
$wp_customize->add_setting(  'juju_blog_theme_options[most_read_content_category]', array(
	'sanitize_callback' => 'juju_blog_sanitize_single_category',
	) ) ;

$wp_customize->add_control( new Juju_Blog_Dropdown_Taxonomies_Control( $wp_customize,'juju_blog_theme_options[most_read_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'juju-blog' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'juju-blog' ),
	'section'           => 'juju_blog_most_read_posts_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'juju_blog_is_most_read_section_content_category_enable'
	) ) );