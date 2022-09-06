<?php
/**
 * About options.
 *
 * @package BlogMelody
 */

$default = blogmelody_get_default_theme_options();

// About Author Section
$wp_customize->add_section( 'section_home_about',
	array(
		'title'      => __( 'Featured Posts', 'blogmelody' ),
		'description'       => esc_html__( 'Featured Posts Section options.These are limited option. You can get Various option on PREMIUM Theme(Content Type from-Post,Page,Ctaegory. Font Size Option, Section Part enable/disable etc.)', 'blogmelody' ),
		'priority'   => 20,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_about_section]',
	array(
		'default'           => $default['disable_about_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogmelody_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogMelody_Switch_Control( $wp_customize, 'theme_options[disable_about_section]',
    array(
		'label' 			=> __('Enable/Disable Featured Posts Section', 'blogmelody'),
		'section'    		=> 'section_home_about',
		 'settings'  		=> 'theme_options[disable_about_section]',
		'on_off_label' 		=> blogmelody_switch_options(),
    )
) );

// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[about_posted_on_enable]', array(
	'default'           => $default['about_posted_on_enable'],
	'sanitize_callback' => 'blogmelody_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[about_posted_on_enable]', array(
	'label'             => esc_html__( 'Enable Author & Date', 'blogmelody' ),
	'section'           => 'section_home_about',
	'type'              => 'checkbox',
	'active_callback' => 'blogmelody_about_active',
) );


// Number of items
$wp_customize->add_setting('theme_options[number_of_about_items]', 
	array(
	'default' 			=> $default['number_of_about_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'blogmelody_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_about_items]', 
	array(
	'label'       => __('Number of Items', 'blogmelody'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4. (Pro Max12)', 'blogmelody'),
	'section'     => 'section_home_about',   
	'settings'    => 'theme_options[number_of_about_items]',		
	'type'        => 'number',
	'active_callback' => 'blogmelody_about_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);

$number_of_about_items = blogmelody_get_option( 'number_of_about_items' );

for( $i=1; $i<=$number_of_about_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[about_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'blogmelody_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[about_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'blogmelody'), $i),
		'section'     => 'section_home_about',   
		'settings'    => 'theme_options[about_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'blogmelody_about_active',
		)
	);
}