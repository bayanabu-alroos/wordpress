<?php

get_header(); 

	if ( music_zone_is_latest_posts() ) {
		get_template_part( 'template-parts/content', 'home' );

	} elseif ( music_zone_is_frontpage() ) {

		$sorted = array( 'slider', 'featured_posts', 'about', 'cta', 'recent_posts', 'subscription', 'latest_posts' );
		
		foreach ( $sorted as $section ) {
			if ( $section == 'about' || $section == 'cta' || $section == 'recent_posts' || $section == 'featured_posts' ) {
				add_action( 'music_zone_blog_primary_content', 'music_zone_blog_add_'. $section .'_section' );
			}else{
				add_action( 'music_zone_blog_primary_content', 'music_zone_add_'. $section .'_section' );
			}			
		}
		do_action( 'music_zone_blog_primary_content' );

		if (true === apply_filters( 'music_zone_filter_frontpage_content_enable', true ) ) {
			get_template_part( 'page' );
		}
	}
get_footer();