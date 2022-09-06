<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

$options = vivid_blog_get_theme_options();


if ( ! function_exists( 'vivid_blog_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Vivid Blog 1.0.0
	 */
	function vivid_blog_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'vivid_blog_doctype', 'vivid_blog_doctype', 10 );


if ( ! function_exists( 'vivid_blog_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif;
	}
endif;
add_action( 'vivid_blog_before_wp_head', 'vivid_blog_head', 10 );

if ( ! function_exists( 'vivid_blog_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'vivid-blog' ); ?></a>
			<div class="menu-overlay"></div>

		<?php
	}
endif;
add_action( 'vivid_blog_page_start_action', 'vivid_blog_page_start', 10 );

if ( ! function_exists( 'vivid_blog_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'vivid_blog_page_end_action', 'vivid_blog_page_end', 10 );

if ( ! function_exists( 'vivid_blog_site_branding_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_site_branding_start() { ?>
		<div id="site-details">
            <div class="wrapper">
                <div class="site-branding-wrapper">
		<?php
	}
endif;
add_action( 'vivid_blog_header_action', 'vivid_blog_site_branding_start', 10 );

if ( ! function_exists( 'vivid_blog_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_site_branding() {
		$options  = vivid_blog_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		

		if ( ! empty( $options['topbar_author'] ) ) : ?>
        	<div class="site-advertisement">
        		<?php if ( ! empty( $options['topbar_author_image'] ) ) : ?>
	                <img src="<?php echo esc_url( $options['topbar_author_image'] ); ?>" alt="<?php echo esc_attr( $options['topbar_author'] ); ?>">
	            <?php endif; ?>

                <div class="desc clear">
                    <span class="topbar-author"><?php echo esc_html( $options['topbar_author'] ); ?></span>
                    <?php if ( ! empty( $options['topbar_author_position'] ) ) : ?>
	                    <p><?php echo esc_html( $options['topbar_author_position'] ); ?></p>
	                <?php endif; ?>
                </div><!-- .desc -->
            </div><!-- .site-advertisement -->
    	<?php endif; ?>

		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-details">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( vivid_blog_is_latest_posts() || vivid_blog_is_frontpage() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<?php if ( $options['topbar_social_enable'] ) : ?>
			<div id="social-navigation">
	            <div class="social-icons">

	            <?php 
	            wp_nav_menu(
	            	array(
	        			'theme_location' => 'social',
	        			'container' => false,
	        			'menu_class' => false,
	        			'fallback_cb' => 'vivid_blog_menu_fallback_cb',
	        			'depth' => 1,
	        			'link_before' => '<span class="screen-reader-text">',
						'link_after' => '</span>',
	        		)
	            ); 
	            ?>

	            </div><!-- .social-icons -->
	        </div><!-- #social-navigation -->
	    <?php endif;
	}
endif;
add_action( 'vivid_blog_header_action', 'vivid_blog_site_branding', 20 );

if ( ! function_exists( 'vivid_blog_site_branding_end' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_site_branding_end() { ?>
				</div><!-- .site-branding-wrapper-->
            </div><!-- .wrapper -->
        </div><!-- .site-details -->
		<?php
	}
endif;
add_action( 'vivid_blog_header_action', 'vivid_blog_site_branding_end', 30 );

if ( ! function_exists( 'vivid_blog_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_header_start() { ?>
		<header id="masthead" class="site-header" role="banner">
	<?php
	}
endif;
add_action( 'vivid_blog_header_action', 'vivid_blog_header_start', 40 );

if ( ! function_exists( 'vivid_blog_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_site_navigation() {
		$options = vivid_blog_get_theme_options();
		?>
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
			<?php
			echo vivid_blog_get_svg( array( 'icon' => 'menu' ) );
			echo vivid_blog_get_svg( array( 'icon' => 'close' ) );
			?>				
			<span class="menu-label"><?php esc_html_e( 'Menu', 'vivid-blog' ); ?></span>	
		</button>
		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="wrapper">
				<?php 
					$search = '';
					if ( $options['nav_search_enable'] ) :
						$search .= '<li class="search-menu"><a href="#">';
						$search .= vivid_blog_get_svg( array( 'icon' => 'search' ) );
						$search .= vivid_blog_get_svg( array( 'icon' => 'close' ) );
						$search .= '</a><div id="search">';
						$search .= get_search_form( $echo = false );
		                $search .= '</div><!-- #search --></li>';
	                endif;

	                $social_nav = '';
					if ( $options['topbar_social_enable'] ) : 
			            $social_nav .= '<li class="social-menu-item">';
			            $social_nav .= '<div class="social-icons">';
				            
	            		$social_defaults = array(
	            			'theme_location' => 'social',
	            			'container' => false,
	            			'echo' => false,
	            			'fallback_cb' => false,
	            			'depth' => 1,
	            			'link_before' => '<span class="screen-reader-text">',
							'link_after' => '</span>',
	            		);
	            	
	            		$social_nav .= wp_nav_menu( $social_defaults );
	            		$social_nav .= '</div>';
			            $social_nav .= '</li><!-- .social-menu -->';
            		endif; 

	        		$defaults = array(
	        			'theme_location' => 'primary',
	        			'container' => false,
	        			'menu_class' => 'menu nav-menu',
	        			'menu_id' => 'primary-menu',
	        			'echo' => true,
	        			'fallback_cb' => 'vivid_blog_menu_fallback_cb',
	        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s' . $social_nav . $search . '</ul>',
	        		);
	        	
	        		wp_nav_menu( $defaults );
	        	?>
			</div><!-- #site-navigation -->
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'vivid_blog_header_action', 'vivid_blog_site_navigation', 50 );


if ( ! function_exists( 'vivid_blog_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;
add_action( 'vivid_blog_header_action', 'vivid_blog_header_end', 60 );

if ( ! function_exists( 'vivid_blog_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'vivid_blog_content_start_action', 'vivid_blog_content_start', 10 );

if ( ! function_exists( 'vivid_blog_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_header_image() {
		if ( vivid_blog_is_frontpage() )
			return;
		$header_image = get_header_image();
		if ( is_singular() ) :
			$header_image = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $header_image;
		endif;
		?>

		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php vivid_blog_custom_header_banner_title(); ?>
                </header>

                <?php vivid_blog_add_breadcrumb(); ?>
            </div><!-- .wrapper -->
        </div><!-- #page-site-header -->
		<?php
	}
endif;
add_action( 'vivid_blog_header_image_action', 'vivid_blog_header_image', 10 );

if ( ! function_exists( 'vivid_blog_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Vivid Blog 1.0.0
	 */
	function vivid_blog_add_breadcrumb() {
		$options = vivid_blog_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( vivid_blog_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list">';
				/**
				 * vivid_blog_simple_breadcrumb hook
				 *
				 * @hooked vivid_blog_simple_breadcrumb -  10
				 *
				 */
				do_action( 'vivid_blog_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;
add_action( 'vivid_blog_header_image_action', 'vivid_blog_add_breadcrumb', 20 );

if ( ! function_exists( 'vivid_blog_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_content_end() {
		?>
			<div class="menu-overlay"></div>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'vivid_blog_content_end_action', 'vivid_blog_content_end', 10 );

if ( ! function_exists( 'vivid_blog_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_footer_start() {
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">
		<?php
	}
endif;
add_action( 'vivid_blog_footer', 'vivid_blog_footer_start', 10 );

if ( ! function_exists( 'vivid_blog_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_footer_site_info() {
		$theme_data = wp_get_theme();
		$options = vivid_blog_get_theme_options();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text']; 
		$poweredby_text = esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'vivid-blog' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>'; 
		?>
		<div class="site-info col-2">
            <div class="wrapper">
            	<div class="site-wrapper copyright">
	                <span>
	                	<?php 
	                	echo vivid_blog_santize_allow_tag( $copyright_text ); 
	                	if ( function_exists( 'the_privacy_policy_link' ) ) {
							the_privacy_policy_link( ' | ' );
						}
	                	?>
	            	</span>

	            	<span>
                        <?php echo vivid_blog_santize_allow_tag( $poweredby_text ); ?>
                    </span>
            	</div><!-- .site-wrapper --> 
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'vivid_blog_footer', 'vivid_blog_footer_site_info', 40 );

if ( ! function_exists( 'vivid_blog_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_footer_scroll_to_top() {
		$options  = vivid_blog_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo vivid_blog_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'vivid_blog_footer', 'vivid_blog_footer_scroll_to_top', 40 );

if ( ! function_exists( 'vivid_blog_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Vivid Blog 1.0.0
	 *
	 */
	function vivid_blog_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'vivid_blog_footer', 'vivid_blog_footer_end', 100 );
