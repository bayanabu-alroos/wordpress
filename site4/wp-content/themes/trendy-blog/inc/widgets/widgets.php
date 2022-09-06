<?php
/**
 * Handle the wigets files and hooks
 * 
 * @package Trendy Blog
 * 
 */
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function trendy_blog_widgets_init() {
	// default sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Toggle Sidebar', 'trendy-blog' ),
			'id'            => 'sidebar-header-toggle',
			'description'   => esc_html__( 'Add widgets here.', 'trendy-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);

	// default sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'trendy-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'trendy-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);

	// sidebar Page
	register_sidebar(
		array(
			'name'          => esc_html__( 'Page Sidebar', 'trendy-blog' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'Add widgets here.', 'trendy-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);

	if ( class_exists( 'WooCommerce' ) ) {
		// shop sidebar
		register_sidebar(
			array(
				'name'          => esc_html__( 'Shop Sidebar', 'trendy-blog' ),
				'id'            => 'shop-sidebar',
				'description'   => esc_html__( 'Add widgets here.', 'trendy-blog' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
				'after_title'   => '</h5></div>',
			)
		);	
	}

	// frontpage middle right sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Frontpage Middle - Right Sidebar', 'trendy-blog' ),
			'id'            => 'frontpage-middle-right-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'trendy-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);

	// frontpage middle left sidebar
	register_sidebar(
		array(
			'name'          => esc_html__( 'Frontpage Middle - Left Sidebar', 'trendy-blog' ),
			'id'            => 'frontpage-middle-left-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'trendy-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);

	// footer sidebars
	register_sidebars( 4, array(
			'name'          => esc_html__( 'Footer Column %d', 'trendy-blog' ),
			'id'            => 'footer-column',
			'description'   => esc_html__( 'Add widgets here.', 'trendy-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<div class="center-line-title"><h5 class="widget-title">',
			'after_title'   => '</h5></div>',
		)
	);

    // Register custom widgets
    register_widget( 'Trendy_Blog_Category_Collection_Widget' ); // category collection widget
	register_widget( 'Trendy_Blog_Posts_List_Widget' ); // posts list widget
	register_widget( 'Trendy_Blog_Author_Info_Widget' ); // author widget
	register_widget( 'Trendy_Blog_Social_Icons_Widget' ); // social icons widget
}
add_action( 'widgets_init', 'trendy_blog_widgets_init' );

// includes files
require TRENDY_BLOG_INCLUDES_PATH .'widgets/widget-fields.php';
require TRENDY_BLOG_INCLUDES_PATH .'widgets/category-collection.php';
require TRENDY_BLOG_INCLUDES_PATH .'widgets/posts-list.php';
require TRENDY_BLOG_INCLUDES_PATH .'widgets/author-info.php';
require TRENDY_BLOG_INCLUDES_PATH .'widgets/social-icons.php';

function trendy_blog_widget_scripts($hook) {
    if( $hook !== "widgets.php" ) {
        return;
    }
    wp_enqueue_style( 'trendy-blog-widget', get_template_directory_uri() . '/inc/widgets/assets/widgets.css', array(), TRENDY_BLOG_VERSION );

	wp_enqueue_media();
	wp_enqueue_script( 'trendy-blog-widget', get_template_directory_uri() . '/inc/widgets/assets/widgets.js', array( 'jquery' ), TRENDY_BLOG_VERSION, true );
}
add_action( 'admin_enqueue_scripts', 'trendy_blog_widget_scripts' );