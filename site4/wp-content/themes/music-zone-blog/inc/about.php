<?php

$wp_customize->add_section( 'music_zone_about_section',
	array(
		'title'             => esc_html__( 'About us','music-zone-blog' ),
		'description'       => esc_html__( 'About us  Section options.', 'music-zone-blog' ),
        'panel'             => 'music_zone_front_page_panel',
        'priority'  => 12,
	)
);


$wp_customize->add_setting( 'about_us_section_enable',
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'music_zone_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Music_Zone_Blog_Switch_Control( $wp_customize,
	'about_us_section_enable',
		array(
			'label'             => esc_html__( 'About Section Enable', 'music-zone-blog' ),
			'section'           => 'music_zone_about_section',
			'on_off_label' 		=> music_zone_switch_options(),
		)
	)
);


if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'about_us_section_enable', array(
		'selector' => '.about-section .tooltiptext',
		'settings' => 'about_us_section_enable',
    ) );
}

$wp_customize->add_setting('about_us_custom_sub_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'		=> 'postMessage'
    )
);

$wp_customize->add_control('about_us_custom_sub_title',
    array(
        'section'			=> 'music_zone_about_section',
        'label'				=> esc_html__( 'Section Sub Title:', 'music-zone-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'music_zone_blog_is_about_section_enable',
    )
);

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'about_us_custom_sub_title',
		array(
			'selector'            => '#music_zone_about_section .section-subtitle',
			'settings'            => 'about_us_custom_sub_title',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'music_zone_about_sub_title_partial',
		) 
	);
}



$wp_customize->add_setting( 'about_us_content_page',
	array(
		'sanitize_callback' => 'music_zone_sanitize_page',
	)
);

$wp_customize->add_control( new Music_Zone_Blog_Dropdown_Chooser( $wp_customize,
	'about_us_content_page',
		array(
			'label'             => esc_html__( 'Select Page', 'music-zone-blog' ),
			'section'           => 'music_zone_about_section',
			'choices'			=> music_zone_page_choices(),
			'active_callback'   => 'music_zone_blog_is_about_section_enable',
		)
	)
);


$wp_customize->add_setting('about_us_btn_txt',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'		=> 'postMessage'
    )
);

$wp_customize->add_control('about_us_btn_txt',
    array(
        'section'			=> 'music_zone_about_section',
        'label'				=> esc_html__( 'Button Text:', 'music-zone-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'music_zone_blog_is_about_section_enable',
    )
);

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'about_us_btn_txt',
		array(
			'selector'            => '#music_zone_about_section .read-more a',
			'settings'            => 'about_us_btn_txt',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'music_zone_about_btn_txt_partial',
		) 
	);
}