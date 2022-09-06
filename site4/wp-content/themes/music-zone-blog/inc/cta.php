<?php

$wp_customize->add_section( 'music_zone_promotions_section',
	array(
		'title'             => esc_html__( 'CTA','music-zone-blog' ),
		'description'       => esc_html__( 'CTA  Section options.', 'music-zone-blog' ),
        'panel'             => 'music_zone_front_page_panel',
        'priority'  => 13,
	)
);


$wp_customize->add_setting( 'promotions_section_enable',
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'music_zone_sanitize_switch_control',
	)
);

$wp_customize->add_control( new Music_Zone_Blog_Switch_Control( $wp_customize,
	'promotions_section_enable',
		array(
			'label'             => esc_html__( 'CTA Section Enable', 'music-zone-blog' ),
			'section'           => 'music_zone_promotions_section',
			'on_off_label' 		=> music_zone_switch_options(),
		)
	)
);


if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'promotions_section_enable', array(
		'selector' => '.promotions-section .tooltiptext',
		'settings' => 'promotions_section_enable',
    ) );
}

$wp_customize->add_setting( 'promotions_content_page',
	array(
		'sanitize_callback' => 'music_zone_sanitize_page',
	)
);

$wp_customize->add_control( new Music_Zone_Blog_Dropdown_Chooser( $wp_customize,
	'promotions_content_page',
		array(
			'label'             => esc_html__( 'Select Page', 'music-zone-blog' ),
			'section'           => 'music_zone_promotions_section',
			'choices'			=> music_zone_page_choices(),
			'active_callback'   => 'music_zone_blog_is_cta_section_enable',
		)
	)
);


$wp_customize->add_setting('promotions_video_url',
    array(
        'sanitize_callback' => 'esc_url_raw',
    )
);

$wp_customize->add_control('promotions_video_url',
    array(
        'section'			=> 'music_zone_promotions_section',
        'label'				=> esc_html__( 'Video Url', 'music-zone-blog' ),
        'type'          	=>'url',
        'active_callback'   => 'music_zone_blog_is_cta_section_enable',
    )
);
