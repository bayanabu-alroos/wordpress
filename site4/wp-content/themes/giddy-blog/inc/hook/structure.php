<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Giddy Blog
 */

if ( ! function_exists( 'giddy_blog_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
function giddy_blog_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
}
endif;

add_action( 'giddy_blog_action_doctype', 'giddy_blog_doctype', 10 );


if ( ! function_exists( 'giddy_blog_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
function giddy_blog_head() {
	?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
	<?php endif; ?>
	<?php
}
endif;
add_action( 'giddy_blog_action_head', 'giddy_blog_head', 10 );

if ( ! function_exists( 'giddy_blog_page_start' ) ) :
	/**
	 * Add Skip to content.
	 *
	 * @since 1.0.0
	 */
	function giddy_blog_page_start() {
	?><div id="page" class="site"><a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'giddy-blog' ); ?></a><?php
	}
endif;

add_action( 'giddy_blog_action_before', 'giddy_blog_page_start', 10 );

if ( ! function_exists( 'giddy_blog_header_start' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function giddy_blog_header_start() {

        $show_contact = giddy_blog_get_option( 'show_header_contact_info' );
        $location     = giddy_blog_get_option( 'header_location' );
        $email        = giddy_blog_get_option( 'header_email' );
        $phone        = giddy_blog_get_option( 'header_phone' );
        $class = 'col-1';
        $show_header_social_links =giddy_blog_get_option('show_header_social_links');
        $topbar_color =giddy_blog_get_option('topbar_color');
        $topbar_background_color =giddy_blog_get_option('topbar_background_color');

        if( ( ( ! empty( $email ) || ! empty( $phone ) || ! empty( $location ) ) && $show_contact ) && ( $show_header_social_links ) ) {
            $class = 'col-2';
        }

        if( $show_contact==true ){ ?>
        	<style>
        		#top-bar .widget_address_block ul li,
        		#top-bar .widget_address_block ul li a,
        		#top-bar .social-icons li a{
        			color: <?php echo esc_attr($topbar_color); ?>;
        		}
        	</style>
    
            <div id="top-bar" class="top-bar-widgets <?php echo esc_attr( $class ); ?>"style="background-color: <?php echo esc_attr($topbar_background_color); ?> ">
                <div class="wrapper">
                    <?php if( ( ! empty( $email ) || ! empty( $phone ) || ! empty( $location ) ) && $show_contact ) : ?>
                        
                        <div class="widget widget_address_block">
                            <ul>
                                <?php 

                                    if( ! empty( $location ) ){
                                        echo '<li><i class="fa fa-map-marker"></i>'. esc_html( $location ) .'</li>';
                                    }
                                    if( ! empty( $phone ) ){
                                        echo '<li><a href="tel: '. esc_attr( $phone ) .'"><i class="fa fa-phone"></i>'. esc_html( $phone ) .'</a></li>';
                                    }
                                    if( ! empty( $email ) ){
                                        echo '<li><a href="' . esc_url('mailto:' . sanitize_email($email)) . '"><i class="fa fa-envelope"></i>'. esc_html( $email ) .'</a></li>';
                                    }
                                ?>
                            </ul>
                        </div><!-- .widget_address_block -->
                    <?php endif; 

                    if ( $show_header_social_links==true){ ?>
                       <div class="widget widget_social_icons">
				             <ul class="social-icons">
				                  <?php 
				                    for ($i=0; $i <=4 ; $i++) { 
				                      $show_social   = giddy_blog_get_option( 'header_social_link_' . $i );
				                        if ( isset( $show_social ) ) { 
				                        ?>
				                            <li><a href=" <?php echo esc_url($show_social); ?>" target="_blank"></a></li>
				                        <?php }  }?>
				              </ul> 
                        </div><!-- .widget_social_icons -->
                    <?php } ?>
                </div><!-- .wrapper -->
            </div><!-- #top-bar -->
        <?php
        } ?>
		<header id="masthead" class="site-header nav-shrink" role="banner"><?php
	}
endif;
add_action( 'giddy_blog_action_before_header', 'giddy_blog_header_start' );

if ( ! function_exists( 'giddy_blog_header_end' ) ) :
	/**
	 * Header Start.
	 *
	 * @since 1.0.0
	 */
	function giddy_blog_header_end() {

		?></header> <!-- header ends here --><?php
	}
endif;
add_action( 'giddy_blog_action_header', 'giddy_blog_header_end', 15 );

if ( ! function_exists( 'giddy_blog_content_start' ) ) :
	/**
	 * Header End.
	 *
	 * @since 1.0.0
	 */
	function giddy_blog_content_start() { 
	?>
	<div id="content" class="site-content">
	<?php 

	}
endif;

add_action( 'giddy_blog_action_before_content', 'giddy_blog_content_start', 10 );

if ( ! function_exists( 'giddy_blog_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function giddy_blog_footer_start() {
		if( !(is_home() || is_front_page()) ){
			echo '</div>';
		} ?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo"><?php
		if ( true === giddy_blog_get_option('scroll_top_visible') ) : ?>
			<div class="backtotop"><i class="fa fa-long-arrow-up"></i></div>
		<?php endif;
	} 
endif;
add_action( 'giddy_blog_action_before_footer', 'giddy_blog_footer_start' );


if ( ! function_exists( 'giddy_blog_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function giddy_blog_footer_end() {?>
		</footer><?php
	}
endif;
add_action( 'giddy_blog_action_after_footer', 'giddy_blog_footer_end', 100 );

