<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Juju Blog
	 * @since Juju Blog 1.0.0
	 */

	/**
	 * juju_blog_doctype hook
	 *
	 * @hooked juju_blog_doctype -  10
	 *
	 */
	do_action( 'juju_blog_doctype' );

?>
<head>
<?php
	/**
	 * juju_blog_before_wp_head hook
	 *
	 * @hooked juju_blog_head -  10
	 *
	 */
	do_action( 'juju_blog_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * juju_blog_page_start_action hook
	 *
	 * @hooked juju_blog_page_start -  10
	 *
	 */
	do_action( 'juju_blog_page_start_action' ); 

	/**
	 * juju_blog_loader_action hook
	 *
	 * @hooked juju_blog_loader -  10
	 *
	 */
	do_action( 'juju_blog_before_header' );

	/**
	 * juju_blog_header_action hook
	 *
	 * @hooked juju_blog_header_start -  10
	 * @hooked juju_blog_site_branding -  20
	 * @hooked juju_blog_site_navigation -  30
	 * @hooked juju_blog_header_end -  50
	 *
	 */
	do_action( 'juju_blog_header_action' );

	/**
	 * juju_blog_content_start_action hook
	 *
	 * @hooked juju_blog_content_start -  10
	 *
	 */
	do_action( 'juju_blog_content_start_action' );

	/**
	 * juju_blog_header_image_action hook
	 *
	 * @hooked juju_blog_header_image -  10
	 *
	 */
	do_action( 'juju_blog_header_image_action' );

	if ( juju_blog_is_frontpage() ) {
    	$options = juju_blog_get_theme_options();
    	$sorted = array();
		if ( ! empty( $options['all_sortable'] ) ) {
			$sorted = explode( ',' , $options['all_sortable'] );
		}
		
		foreach ( $sorted as $section ) {
			add_action( 'juju_blog_primary_content', 'juju_blog_add_'. $section .'_section' );
		}

		do_action( 'juju_blog_primary_content' );
	}