<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Juju Blog
* @since Juju Blog 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'juju_blog_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'juju_blog_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'juju-blog' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'juju-blog' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
	'active_callback' => 'juju_blog_is_static_homepage_enable',
) );