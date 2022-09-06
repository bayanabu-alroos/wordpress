<?php

if ( ! function_exists( 'music_zone_blog_enqueue_styles' ) ) :

	function music_zone_blog_enqueue_styles() {
		wp_enqueue_style( 'music-zone-blog-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'music-zone-blog-style', get_stylesheet_directory_uri() . '/style.css', array( 'music-zone-blog-style-parent' ), '1.0.0' );

		wp_enqueue_script( 'music-zone-blog-custom', get_theme_file_uri() . '/custom.js', array(), '1.0', true );

	}
endif;
add_action( 'wp_enqueue_scripts', 'music_zone_blog_enqueue_styles', 99 );

function music_zone_blog_customize_control_js() {

	wp_enqueue_style( 'music-zone-blog-customize-controls-css', get_theme_file_uri() . '/customizer-control.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'music_zone_blog_customize_control_js' );



require get_theme_file_path() . '/inc/customizer.php';

require get_theme_file_path() . '/inc/front-sections/featured-posts.php';

require get_theme_file_path() . '/inc/front-sections/about.php';

require get_theme_file_path() . '/inc/front-sections/cta.php';

require get_theme_file_path() . '/inc/front-sections/recent-posts.php';

