<?php

if ( ! function_exists( 'blog_foodie_enqueue_styles' ) ) :

	function blog_foodie_enqueue_styles() {

		wp_enqueue_style( 'blog-foodie-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'blog-foodie-style', get_stylesheet_directory_uri() . '/style.css', array( 'blog-foodie-style-parent' ), '1.0.0' );

		wp_enqueue_script( 'blog-foodie-custom', get_theme_file_uri() . '/custom.js', array(), '1.0', true );
		
	}
endif;
add_action( 'wp_enqueue_scripts', 'blog_foodie_enqueue_styles', 99 );

function blog_foodie_customize_control_js() {

	wp_enqueue_style( 'blog-foodie-customize-controls-css', get_theme_file_uri() . '/customizer-control.css' );

}
add_action( 'customize_controls_enqueue_scripts', 'blog_foodie_customize_control_js' );




require get_theme_file_path() . '/inc/customizer.php';

require get_theme_file_path() . '/inc/front-sections/slider.php';

require get_theme_file_path() . '/inc/front-sections/gallery.php';

require get_theme_file_path() . '/inc/front-sections/cta.php';

require get_theme_file_path() . '/inc/front-sections/quote.php';
