<?php

$wp_customize->add_section( 'music_zone_recent_posts_section',
	array(
		'title'             => esc_html__( 'Recent Posts','music-zone-blog' ),
		'description'       => esc_html__( 'Recent Posts Section options.', 'music-zone-blog' ),
		'panel'             => 'music_zone_front_page_panel',
		'priority'  => 14,
	)
);

$wp_customize->add_setting( 'recent_posts_section_enable', 
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'music_zone_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Music_Zone_Blog_Switch_Control( $wp_customize,
	'recent_posts_section_enable',
		array(
			'label'             => esc_html__( 'Recent Post Section Enable', 'music-zone-blog' ),
			'section'           => 'music_zone_recent_posts_section',
			'on_off_label' 		=> music_zone_switch_options(),
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'recent_posts_section_enable', array(
		'selector' => '.recent-posts-section .tooltiptext',
		'settings' => 'recent_posts_section_enable',
    ) );
}

$wp_customize->add_setting('recent_posts_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'		=> 'postMessage'
    )
);

$wp_customize->add_control('recent_posts_title',
    array(
        'section'			=> 'music_zone_recent_posts_section',
        'label'				=> esc_html__( 'Section Title:', 'music-zone-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'music_zone_blog_is_recent_posts_enable',
    )
);

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'recent_posts_title',
		array(
			'selector'            => '#music_zone_recent_posts_section .section-title',
			'settings'            => 'recent_posts_title',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'music_zone_recent_posts_title_partial',
		) 
	);
}

$wp_customize->add_setting('recent_posts_sub_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'transport'		=> 'postMessage'
    )
);

$wp_customize->add_control('recent_posts_sub_title',
    array(
        'section'			=> 'music_zone_recent_posts_section',
        'label'				=> esc_html__( 'Section Sub Title:', 'music-zone-blog' ),
        'type'          	=>'text',
        'active_callback'   => 'music_zone_blog_is_recent_posts_enable',
    )
);

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'recent_posts_sub_title',
		array(
			'selector'            => '#music_zone_recent_posts_section .section-subtitle',
			'settings'            => 'recent_posts_sub_title',
			'fallback_refresh'    => true,
			'container_inclusive' => false,
			'render_callback'     => 'music_zone_recent_posts_sub_title_partial',
		) 
	);
}

for ( $i = 1; $i <= 6; $i++ ) :

	$wp_customize->add_setting( 'recent_posts_content_post_'. $i .'', 
		array(
			'sanitize_callback' => 'music_zone_sanitize_page',
		)
	);

	$wp_customize->add_control( new  Music_Zone_Blog_Dropdown_Chooser( $wp_customize,
		'recent_posts_content_post_'. $i .'', 
			array(
				'label'             => sprintf(esc_html__( 'Select Post: %d', 'music-zone-blog'), $i ),
				'section'           => 'music_zone_recent_posts_section',
				'choices'			=> music_zone_post_choices(),
				'active_callback'   => 'music_zone_blog_is_recent_posts_enable',
			)
		)
	);

endfor;



