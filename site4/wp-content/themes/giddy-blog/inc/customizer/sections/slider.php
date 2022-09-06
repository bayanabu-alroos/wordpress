<?php
/**
 * Slider options.
 *
 * @package Giddy Blog
 */

$default = giddy_blog_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Featured Slider Section', 'giddy-blog' ),
		'priority'   => 10,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_featured-slider_section]',
	array(
		'default'           => $default['disable_featured-slider_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'giddy_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Giddy_Blog_Switch_Control( $wp_customize, 'theme_options[disable_featured-slider_section]',
    array(
		'label' 	=> __('Disable slider Section', 'giddy-blog'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> giddy_blog_switch_options(),
    )
) );

// Add arrow enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_arrow_enable]', array(
	'default'           => $default['slider_arrow_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_arrow_enable]', array(
	'label'             => esc_html__( 'Enable Slider Arrow', 'giddy-blog' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'giddy_blog_slider_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_autoplay_enable]', array(
	'default'           => $default['slider_autoplay_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_autoplay_enable]', array(
	'label'             => esc_html__( 'Enable Slider Autoplay', 'giddy-blog' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'giddy_blog_slider_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_infinite_enable]', array(
	'default'           => $default['slider_infinite_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_infinite_enable]', array(
	'label'             => esc_html__( 'Enable Slider Slide Infinite', 'giddy-blog' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'giddy_blog_slider_active',
) );

// Add autoplay enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_fade_enable]', array(
	'default'           => $default['slider_fade_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_fade_enable]', array(
	'label'             => esc_html__( 'Enable Slider Fade Effect', 'giddy-blog' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'giddy_blog_slider_active',
) );


// Add category enable setting and control.
$wp_customize->add_setting( 'theme_options[slider_content_enable]', array(
	'default'           => $default['slider_content_enable'],
	'sanitize_callback' => 'giddy_blog_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[slider_content_enable]', array(
	'label'             => esc_html__( 'Enable Content', 'giddy-blog' ),
	'section'           => 'section_featured_slider',
	'type'              => 'checkbox',
	'active_callback' => 'giddy_blog_slider_active',
) );


// Number of items
$wp_customize->add_setting('theme_options[slider_speed]', 
	array(
	'default' 			=> $default['slider_speed'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'giddy_blog_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[slider_speed]', 
	array(
	'label'       => __('Slider Speed', 'giddy-blog'),
	'description' => __('Slider Speed Default speed 800', 'giddy-blog'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_speed]',		
	'type'        => 'number',
	'active_callback' => 'giddy_blog_slider_active',
	)
);

$wp_customize->add_setting( 'theme_options[slider_dot]',
	array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'giddy_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Giddy_Blog_Switch_Control( $wp_customize, 'theme_options[slider_dot]',
    array(
		'label' 	=> __('Disable Slider Dots', 'giddy-blog'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> giddy_blog_switch_options(),
		'active_callback' => 'giddy_blog_slider_active',
    )
) );


// Setting  Slider Category.
$wp_customize->add_setting( 'theme_options[slider_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new giddy_blog_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[slider_category]',
		array(
		'label'    => __( 'Select Category', 'giddy-blog' ),
		'section'  => 'section_featured_slider',
		'settings' => 'theme_options[slider_category]',	
		'active_callback' => 'giddy_blog_slider_active',		
		)
	)
);

for( $i=1; $i<=3; $i++ ){


	// Cta Button Text
	$wp_customize->add_setting('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(

		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control('theme_options[slider_custom_btn_text_' . $i . ']', 
		array(
		'label'       => sprintf( __('Button Label %d', 'giddy-blog'),$i ),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custom_btn_text_' . $i . ']',	
		'active_callback' => 'giddy_blog_slider_active',	
		'type'        => 'text',
		)
	);

}

$wp_customize->add_setting( 'theme_options[disable_blog_banner_section]',
	array(
		'default'           => $default['disable_blog_banner_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'giddy_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Giddy_Blog_Switch_Control( $wp_customize, 'theme_options[disable_blog_banner_section]',
    array(
		'label' 			=> __('Disable Blog Header Section', 'giddy-blog'),
		'description' 		=> __('If you want only header image then disable featured slider and actiove this option.', 'giddy-blog'),
		'section'    		=> 'section_featured_slider',
		'on_off_label' 		=> giddy_blog_switch_options(),
    )
) );