<?php
/**
 * Slider options.
 *
 * @package BlogMelody
 */

$default = blogmelody_get_default_theme_options();

// Featured Slider Section
$wp_customize->add_section( 'section_featured_slider',
	array(
		'title'      => __( 'Featured Slider Section', 'blogmelody' ),
		'description'       => esc_html__( 'Slider Section options.These are limited option. You can get Various option on PREMIUM Theme(Content Type from-Post,Page,ategory,Custom. Font Size Option, Section Part enable/disable, Slider Controller Options etc.)', 'blogmelody' ),
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
		'sanitize_callback' => 'blogmelody_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogMelody_Switch_Control( $wp_customize, 'theme_options[disable_featured-slider_section]',
    array(
		'label' 	=> __('Disable slider Section', 'blogmelody'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> blogmelody_switch_options(),
    )
) );


// Number of items
$wp_customize->add_setting('theme_options[slider_speed]', 
	array(
	'default' 			=> $default['slider_speed'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'blogmelody_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[slider_speed]', 
	array(
	'label'       => __('Slider Speed', 'blogmelody'),
	'description' => __('Slider Speed Default speed 800', 'blogmelody'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[slider_speed]',		
	'type'        => 'number',
	'active_callback' => 'blogmelody_slider_active',
	)
);

$wp_customize->add_setting( 'theme_options[disable_white_overlay]',
	array(
		'default'           => $default['disable_white_overlay'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogmelody_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogMelody_Switch_Control( $wp_customize, 'theme_options[disable_white_overlay]',
    array(
		'label' 	=> __('Disable White overlay and enable image overlay', 'blogmelody'),
		'section'    			=> 'section_featured_slider',
		'on_off_label' 		=> blogmelody_switch_options(),
		'active_callback' => 'blogmelody_slider_active',
    )
) );

// Number of items
$wp_customize->add_setting('theme_options[number_of_sr_items]', 
	array(
	'default' 			=> $default['number_of_sr_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'blogmelody_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_sr_items]', 
	array(
	'label'       => __('Number Of Slides', 'blogmelody'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 4. (PRO MAX 12)', 'blogmelody'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[number_of_sr_items]',		
	'type'        => 'number',
	'active_callback' => 'blogmelody_slider_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 4,
			'step'	=> 1,
		),
	)
);
// Number of items
$wp_customize->add_setting('theme_options[number_of_sr_column]', 
	array(
	'default' 			=> $default['number_of_sr_column'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'blogmelody_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_sr_column]', 
	array(
	'label'       => __('Number Of Slides Column', 'blogmelody'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'blogmelody'),
	'section'     => 'section_featured_slider',   
	'settings'    => 'theme_options[number_of_sr_column]',		
	'type'        => 'number',
	'active_callback' => 'blogmelody_slider_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

// Setting  Slider Category.
$wp_customize->add_setting( 'theme_options[slider_category]',
	array(

	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new blogmelody_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[slider_category]',
		array(
		'label'    => __( 'Select Category', 'blogmelody' ),
		'section'  => 'section_featured_slider',
		'settings' => 'theme_options[slider_category]',	
		'active_callback' => 'blogmelody_slider_active',		
		)
	)
);

$number_of_sr_items = blogmelody_get_option( 'number_of_sr_items' );

for( $i=1; $i<=$number_of_sr_items; $i++ ){

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
		'label'       => sprintf( __('Button Label %d', 'blogmelody'),$i ),
		'section'     => 'section_featured_slider',   
		'settings'    => 'theme_options[slider_custom_btn_text_' . $i . ']',	
		'active_callback' => 'blogmelody_slider_active',	
		'type'        => 'text',
		)
	);
}

$wp_customize->add_setting( 'theme_options[disable_blog_banner_section]',
	array(
		'default'           => $default['disable_blog_banner_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogmelody_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogMelody_Switch_Control( $wp_customize, 'theme_options[disable_blog_banner_section]',
    array(
		'label' 			=> __('Disable Blog Header Section', 'blogmelody'),
		'section'    		=> 'section_featured_slider',
		'on_off_label' 		=> blogmelody_switch_options(),
    )
) );