<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Vivid Blog
	 * @since Vivid Blog 1.0.0
	 */

	/**
	 * vivid_blog_doctype hook
	 *
	 * @hooked vivid_blog_doctype -  10
	 *
	 */
	do_action( 'vivid_blog_doctype' );

?>
<head>
<?php
	/**
	 * vivid_blog_before_wp_head hook
	 *
	 * @hooked vivid_blog_head -  10
	 *
	 */
	do_action( 'vivid_blog_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<?php
	/**
	 * vivid_blog_page_start_action hook
	 *
	 * @hooked vivid_blog_page_start -  10
	 *
	 */
	do_action( 'vivid_blog_page_start_action' ); 

	/**
	 * vivid_blog_header_action hook
	 *
	 * @hooked vivid_blog_header_start -  10
	 * @hooked vivid_blog_site_branding -  20
	 * @hooked vivid_blog_site_navigation -  30
	 * @hooked vivid_blog_header_end -  50
	 *
	 */
	do_action( 'vivid_blog_header_action' );

	/**
	 * vivid_blog_content_start_action hook
	 *
	 * @hooked vivid_blog_content_start -  10
	 *
	 */
	do_action( 'vivid_blog_content_start_action' );

	/**
	 * vivid_blog_header_image_action hook
	 *
	 * @hooked vivid_blog_header_image -  10
	 *
	 */
	do_action( 'vivid_blog_header_image_action' );

    if ( vivid_blog_is_frontpage() ) {
    	$options = vivid_blog_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'vivid_blog_primary_content', 'vivid_blog_add_'. $section .'_section' );
		}
		do_action( 'vivid_blog_primary_content' );
	}