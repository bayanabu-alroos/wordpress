<?php

$wp_customize->add_section( 'music_zone_featured_posts_section',
	array(
		'title'             => esc_html__( 'Featured Posts','music-zone-blog' ),
		'description'       => esc_html__( 'Featured Posts Section options.', 'music-zone-blog' ),
		'panel'             => 'music_zone_front_page_panel',
		'priority'  => 11,
	)
);


$wp_customize->add_setting( 'featured_posts_section_enable', 
	array(
		'default'			=> 	false,
		'sanitize_callback' => 'music_zone_sanitize_switch_control',
	) 
);

$wp_customize->add_control( new  Music_Zone_Blog_Switch_Control( $wp_customize,
	'featured_posts_section_enable',
		array(
			'label'             => esc_html__( 'Featured Posts Section Enable', 'music-zone-blog' ),
			'section'           => 'music_zone_featured_posts_section',
			'on_off_label' 		=> music_zone_switch_options(),
		)
	)
);


if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'featured_posts_section_enable', array(
		'selector' => '.featured-posts-section .tooltiptext',
		'settings' => 'featured_posts_section_enable',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :

	$wp_customize->add_setting( 'featured_posts_content_post_'. $i .'', 
		array(
			'sanitize_callback' => 'music_zone_sanitize_page',
		)
	);

	$wp_customize->add_control( new  Music_Zone_Blog_Dropdown_Chooser( $wp_customize,
		'featured_posts_content_post_'. $i .'', 
			array(
				'label'             => sprintf(esc_html__( 'Select post: %d', 'music-zone-blog'), $i ),
				'section'           => 'music_zone_featured_posts_section',
				'choices'			=> music_zone_post_choices(),
				'active_callback'   => 'music_zone_blog_is_featured_posts_enable',
			)
		)
	);

endfor;



