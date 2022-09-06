<?php
/**
 * About options.
 *
 * @package BlogMelody
 */

$default = blogmelody_get_default_theme_options();

// About Section
$wp_customize->add_section( 'section_home_message',
	array(
		'title'      => __( 'Author Message Section', 'blogmelody' ),
		'description'       => esc_html__( 'Author Message Section options.These are limited option. You can get Various option on PREMIUM Theme(Content Type from-Post,Page,Custom. Font Size Option, Social Media Link, Section Part enable/disable etc.)', 'blogmelody' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_message_section]',
	array(
		'default'           => $default['disable_message_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogmelody_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogMelody_Switch_Control( $wp_customize, 'theme_options[disable_message_section]',
    array(
		'label' 			=> __('Enable/Disable About Section', 'blogmelody'),
		'section'    		=> 'section_home_message',
		 'settings'  		=> 'theme_options[disable_message_section]',
		'on_off_label' 		=> blogmelody_switch_options(),
    )
) );

// Additional Information First Page
	$wp_customize->add_setting('theme_options[message_page]', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'blogmelody_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[message_page]', 
		array(
		'label'       => __('Select Page blogmelody', 'blogmelody'),
		'section'     => 'section_home_message',   
		'settings'    => 'theme_options[message_page]',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'blogmelody_message_active',
		)
	);

// About Button Text
$wp_customize->add_setting('theme_options[message_btn_text]', 
	array(
	//'default'           => $default['message_btn_text'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[message_btn_text]', 
	array(
	'label'       => __('Button Label', 'blogmelody'),
	'section'     => 'section_home_message',   
	'settings'    => 'theme_options[message_btn_text]',	
	'active_callback' => 'blogmelody_message_active',	
	'type'        => 'text'
	)
);
