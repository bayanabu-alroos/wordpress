<?php
/**
 * Features options.
 *
 * @package BlogMelody
 */

$default = blogmelody_get_default_theme_options();

// Features Section
$wp_customize->add_section( 'section_home_popular',
	array(
		'title'      => __( 'Popular Posts ', 'blogmelody' ),
		'description'       => esc_html__( 'Popular Posts Section options.These are limited option. You can get Various option on PREMIUM Theme(Content Type from-Post,Page,Ctaegory. Font Size Option, Image shape, Section Part enable/disable etc.)', 'blogmelody' ),
		'priority'   => 30,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);

$wp_customize->add_setting( 'theme_options[disable_popular_section]',
	array(
		'default'           => $default['disable_popular_section'],
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'blogmelody_sanitize_switch_control',
	)
);
$wp_customize->add_control( new BlogMelody_Switch_Control( $wp_customize, 'theme_options[disable_popular_section]',
    array(
		'label' 			=> __('Enable/Disable Features Section', 'blogmelody'),
		'section'    		=> 'section_home_popular',
		 'settings'  		=> 'theme_options[disable_popular_section]',
		'on_off_label' 		=> blogmelody_switch_options(),
    )
) );

//Features Section title
$wp_customize->add_setting('theme_options[popular_title]', 
	array(
	'default'           => $default['popular_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[popular_title]', 
	array(
	'label'       => __('Section Title', 'blogmelody'),
	'section'     => 'section_home_popular',   
	'settings'    => 'theme_options[popular_title]',
	'active_callback' => 'blogmelody_popular_active',		
	'type'        => 'text'
	)
);

// Add posted on enable setting and control.
$wp_customize->add_setting( 'theme_options[popular_posted_on_enable]', array(
	'default'           => $default['popular_posted_on_enable'],
	'sanitize_callback' => 'blogmelody_sanitize_checkbox',
) );

$wp_customize->add_control( 'theme_options[popular_posted_on_enable]', array(
	'label'             => esc_html__( 'Enable Author & Date', 'blogmelody' ),
	'section'           => 'section_home_popular',
	'type'              => 'checkbox',
	'active_callback' => 'blogmelody_popular_active',
) );

for( $i=1; $i<=5; $i++ ){

	// Additional Information First Post
	$wp_customize->add_setting('theme_options[popular_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'blogmelody_dropdown_posts'
		)
	);
	$wp_customize->add_control( new BlogMelody_Dropdown_Chooser( $wp_customize,'theme_options[popular_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'blogmelody'), $i),
		'section'     => 'section_home_popular',  
		'settings'    => 'theme_options[popular_post_'.$i.']',	
		'choices'			=> blogmelody_post_choices(),	
		'type'        => 'dropdown-posts',
		'active_callback' => 'blogmelody_popular_active',
		)
	));
	
}