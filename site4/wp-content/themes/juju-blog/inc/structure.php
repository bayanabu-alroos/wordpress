<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

$options = juju_blog_get_theme_options();


if ( ! function_exists( 'juju_blog_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Juju Blog 1.0.0
	 */
	function juju_blog_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'juju_blog_doctype', 'juju_blog_doctype', 10 );


if ( ! function_exists( 'juju_blog_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'juju_blog_before_wp_head', 'juju_blog_head', 10 );

if ( ! function_exists( 'juju_blog_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'juju-blog' ); ?></a>
			<div class="menu-overlay"></div>

		<?php
	}
endif;
add_action( 'juju_blog_page_start_action', 'juju_blog_page_start', 10 );

if ( ! function_exists( 'juju_blog_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'juju_blog_page_end_action', 'juju_blog_page_end', 10 );



if ( ! function_exists( 'juju_blog_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_header_start() { 
		$options  = juju_blog_get_theme_options();

		if ( $options['top_bar_section_enable'] == true ): ?>
			
			<div id="top_navigation" class="relative">
				<div class="wrapper">
					<div class="top-navigation-container">

						<?php if ( !empty( $options['top_bar_notice'] ) ): ?>

							<div class="top-navigation-content">
								<p><?php echo esc_html( $options['top_bar_notice'] ); ?></p>
							</div>

						<?php endif;

						if ( !empty( $options['top_bar_email'] ) ): ?>

						<div class="contact-information">
							<div class="email">
								<i class="fa fa-envelope"></i>
								<span><a href="mailto:<?php echo esc_attr( $options['top_bar_email'] ); ?>"><?php echo esc_html( $options['top_bar_email'] ); ?></a></span>
							</div>
						</div>

					<?php endif; ?>

				</div><!-- .top-navigation-container -->
				</div><!-- .wrapper --></span>
			</div><!-- #top-navigation -->

	        <?php endif; ?>

		<header id="masthead" class="site-header" role="banner">
			
		<div class="wrapper">

		<?php
	}
endif;
add_action( 'juju_blog_header_action', 'juju_blog_header_start', 20 );

if ( ! function_exists( 'juju_blog_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_site_branding() {
		$options  = juju_blog_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>		
		<div class="site-branding">

			<div class="search-menu">
				<a href="#">
					<span class="screen-reader-text"><?php echo esc_html__( 'Search', 'juju-blog' ); ?></span>
					<?php echo juju_blog_get_svg( array( 'icon' => 'search' ) ); ?>
					<?php echo juju_blog_get_svg( array( 'icon' => 'close' ) ); ?>
					<?php echo esc_html__( 'Search', 'juju-blog' ); ?>
				</a>

				<div id="search" style="display: none;">
				<?php echo get_search_form(); ?>
				</div><!-- #search -->
			</div>

			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>

				<div id="site-identity">

				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>

					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( juju_blog_is_latest_posts() || juju_blog_is_frontpage() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); ?></p>
						<?php
						endif; 
					}?>
				</div>

	    	<?php endif; ?>

	    	<?php 
	    	if( has_nav_menu( 'social' ) ):

	    		wp_nav_menu(  array(
	    			'theme_location' => 'social',
	    			'container' => 'div',
	    			'container_class' => 'social-icons',
	    			'echo' => true,
	    			'depth' => 1,
	    			'link_before' => '<span class="screen-reader-text">',
	    			'link_after' => '</span>',
	    			'fallback_cb' => false,
	    			) );

	    	endif;
	    	?>

		</div><!-- .site-branding -->

		<?php
	}
endif;
add_action( 'juju_blog_header_action', 'juju_blog_site_branding', 20 );

if ( ! function_exists( 'juju_blog_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_site_navigation() {
		$options = juju_blog_get_theme_options();
		?>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="menu-label"><?php esc_html_e( 'Menu', 'juju-blog' ); ?></span>			
				<?php
				echo juju_blog_get_svg( array( 'icon' => 'menu' ) );
				echo juju_blog_get_svg( array( 'icon' => 'close' ) );
				?>		
			</button>
			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
			
				<?php 
	        		wp_nav_menu(array(
	        			'theme_location' => 'primary',
	        			'container' => 'div',
	        			'menu_class' => 'menu nav-menu',
	        			'menu_id' => 'primary-menu',
	        			'echo' => true,
	        			'fallback_cb' => 'juju_blog_menu_fallback_cb',
	        		));
	        	?>
		</nav><!-- #site-navigation -->

		<?php
	}
endif;
add_action( 'juju_blog_header_action', 'juju_blog_site_navigation', 30 );


if ( ! function_exists( 'juju_blog_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_header_end() {
		$options = juju_blog_get_theme_options();
		?>
			</div>
			
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'juju_blog_header_action', 'juju_blog_header_end', 50 );

if ( ! function_exists( 'juju_blog_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'juju_blog_content_start_action', 'juju_blog_content_start', 10 );

if ( ! function_exists( 'juju_blog_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_header_image() {
		if ( juju_blog_is_frontpage() )
			return;
		$header_image = get_header_image();
		?>

		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php echo juju_blog_custom_header_banner_title(); ?>
                </header>

                <?php juju_blog_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->

		<?php
	}
endif;
add_action( 'juju_blog_header_image_action', 'juju_blog_header_image', 10 );

if ( ! function_exists( 'juju_blog_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Juju Blog Pro 1.0.0
	 */
	function juju_blog_add_breadcrumb() {
		$options = juju_blog_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( juju_blog_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list">';
				
				do_action( 'juju_blog_simple_breadcrumb' );

		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;
//add_action( 'juju_blog_header_image_action', 'juju_blog_add_breadcrumb', 20 );

if ( ! function_exists( 'juju_blog_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_content_end() {
		?>
			
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'juju_blog_content_end_action', 'juju_blog_content_end', 10 );

if ( ! function_exists( 'juju_blog_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_footer_start() {

		$options = juju_blog_get_theme_options();
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">

		<?php
	}
endif;
add_action( 'juju_blog_footer', 'juju_blog_footer_start', 10 );

if ( ! function_exists( 'juju_blog_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_footer_site_info() {
		$options = juju_blog_get_theme_options();
		$theme_data = wp_get_theme();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		?>

			<div class="site-info col-1">
                <div class="wrapper">
                    
                	<span class="copyright">
                		<?php if( !empty( $copyright_text ) ):
                		echo juju_blog_santize_allow_tag( $copyright_text );
                		endif; ?>

                		<?php echo esc_html__( ' All Rights Reserved | ', 'juju-blog' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'juju-blog' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>' ?>
                	</span>
                
                </div><!-- .wrapper -->    
            </div><!-- .site-info -->
			
		<?php
	}
endif;
add_action( 'juju_blog_footer', 'juju_blog_footer_site_info', 40 );

if ( ! function_exists( 'juju_blog_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_footer_scroll_to_top() {
		$options  = juju_blog_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo juju_blog_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'juju_blog_footer', 'juju_blog_footer_scroll_to_top', 40 );

if ( ! function_exists( 'juju_blog_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'juju_blog_footer', 'juju_blog_footer_end', 100 );

if ( ! function_exists( 'juju_blog_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_loader() {
		$options = juju_blog_get_theme_options();
		 ?>

			<div id="loader">
            <div class="loader-container">
	                <div id="preloader">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </div>
	            
            </div>
        </div><!-- #loader -->
        <div class="menu-overlay"></div>
		<?php
	}
endif;
add_action( 'juju_blog_before_header', 'juju_blog_loader', 10 );

if ( ! function_exists( 'juju_blog_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since Juju Blog 1.0.0
	 *
	 */
	function juju_blog_infinite_loader_spinner() { 
		$id = get_the_ID();
		$options = juju_blog_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :
			if ( ! empty( $id ) ) {
				echo '<div class="blog-loader">' . juju_blog_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';
			}
		endif;
	}
endif;
add_action( 'juju_blog_infinite_loader_spinner_action', 'juju_blog_infinite_loader_spinner', 10 );
