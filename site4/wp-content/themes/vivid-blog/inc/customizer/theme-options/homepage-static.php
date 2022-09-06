<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Vivid Blog
* @since Vivid Blog 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'vivid_blog_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'vivid_blog_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'vivid-blog' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'vivid-blog' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
) );