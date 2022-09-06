<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package BlogMelody
 */

if ( ! function_exists( 'blogmelody_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function blogmelody_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'blogmelody_action_doctype', 'blogmelody_doctype', 10 );


if ( ! function_exists( 'blogmelody_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function blogmelody_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php esc_url( bloginfo( 'pingback_url' )); ?>">
	<?php endif;
	
}
endif;
add_action( 'blogmelody_action_head', 'blogmelody_head', 10 );

if ( ! function_exists( 'blogmelody_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function blogmelody_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'blogmelody' ); ?></a><?php
	}
endif;

add_action( 'blogmelody_action_before', 'blogmelody_page_start', 10 );

if ( ! function_exists( 'blogmelody_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function blogmelody_header_start() {
		
		?><header id="masthead" class="site-header nav-shrink" role="banner"><?php
	}
endif;
add_action( 'blogmelody_action_before_header', 'blogmelody_header_start' );

if ( ! function_exists( 'blogmelody_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function blogmelody_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'blogmelody_action_header', 'blogmelody_header_end', 15 );

if ( ! function_exists( 'blogmelody_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function blogmelody_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'blogmelody_action_before_content', 'blogmelody_content_start', 10 );

if ( ! function_exists( 'blogmelody_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function blogmelody_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo"><?php
		if ( true === blogmelody_get_option('scroll_top_visible') ) : ?>
			<div class="backtotop"><i class="fa fa-chevron-up"></i></div>
		<?php endif;
	} 
endif;
add_action( 'blogmelody_action_before_footer', 'blogmelody_footer_start' );


if ( ! function_exists( 'blogmelody_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function blogmelody_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'blogmelody_action_after_footer', 'blogmelody_footer_end', 100 );

