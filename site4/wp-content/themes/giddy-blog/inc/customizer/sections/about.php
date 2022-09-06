<?php
/**
 * Post Slider options.
 *
 * @package Giddy Blog
 */

$default = giddy_blog_get_default_theme_options();

// Post Slider Author Section
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( 'Posts Slider', 'giddy-blog' ),
		'priority'   => 15,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_about_section]',
	array(
		'default'           => $default['disable_about_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'giddy_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Giddy_Blog_Switch_Control( $wp_customize, 'theme_options[disable_about_section]',
    array(
		'label' 			=> __('Enable/Disable Post Slider Section', 'giddy-blog'),
		'section'    		=> 'section_home_about',
		 'settings'  		=> 'theme_options[disable_about_section]',
		'on_off_label' 		=> giddy_blog_switch_options(),
    )
) );


// Add dots enable setting and control.
$wp_customize->add_setting( 'theme_options[about_dots_enable]', array(
	'default'           => $default['about_dots_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[about_dots_enable]', array(
	'label'             => esc_html__( 'Enable Post Slider Slider Dots', 'giddy-blog' ),
	'section'           => 'section_home_about',
	'type'              => 'checkbox',
	'active_callback' => 'giddy_blog_about_active',
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[about_arrow_enable]', array(
	'default'           => $default['about_arrow_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[about_arrow_enable]', array(
	'label'             => esc_html__( 'Enable Post Slider Slider Arrow', 'giddy-blog' ),
	'section'           => 'section_home_about',
	'type'              => 'checkbox',
	'active_callback' => 'giddy_blog_about_active',
) );

// Setting  Team Category.
$wp_customize->add_setting( 'theme_options[about_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Giddy_Blog_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[about_category]',
		array(
		'label'    => __( 'Select Category', 'giddy-blog' ),
		'section'  => 'section_home_about',
		'settings' => 'theme_options[about_category]',	
		'active_callback' => 'giddy_blog_about_active',		
		)
	)
);
