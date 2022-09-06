<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Giddy Blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function giddy_blog_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	if (true == giddy_blog_get_option('menu_sticky')) {
		$classes[] = 'menu-sticky';
	}

	if (is_front_page() && (false == giddy_blog_get_option('disable_blog_banner_section')  || true == giddy_blog_get_option('disable_featured-slider_section'))){
		$classes[] = 'blog-banner-disable';
	}
	if (false == giddy_blog_get_option( 'disable_about_section' )){
		$classes[] = 'disable-about-section';
	}
	if ( is_front_page() || is_home() ) {
		$featured_layout = giddy_blog_get_option('featured_layout_option');
		$classes[] = esc_attr( $featured_layout );
	}
	if ( is_front_page() || is_home() ) {
		$about_layout = giddy_blog_get_option('about_layout_option');
		$classes[] = esc_attr( $about_layout );
	}
	if ( is_front_page() || is_home() ) {
		$trending_layout = giddy_blog_get_option('trending_layout_option');
		$classes[] = esc_attr( $trending_layout );
	}
	if ( is_front_page() || is_home() ) {
		$slider_layout = giddy_blog_get_option('slider_layout_option');
		$classes[] = esc_attr( $slider_layout );
	} 
	if (is_single() && false == giddy_blog_get_option( 'single_post_header_image_enable' )){
		$classes[] = 'disable-single-post-header';
	}
	if (is_page() && false == giddy_blog_get_option( 'single_page_header_image_enable' )){
		$classes[] = 'disable-single-page-header';
	}
	if ( is_home() ) {
		$sidebar_layout_blog = giddy_blog_get_option('layout_options_blog'); 
		$classes[] = esc_attr( $sidebar_layout_blog );
	}

	if( is_archive() ) {
		$sidebar_layout_archive = giddy_blog_get_option('layout_options_archive'); 
		$classes[] = esc_attr( $sidebar_layout_archive );
		if (false == giddy_blog_get_option( 'archive_post_header_title_enable' )) {
			$classes[] = 'disable-archive-post-header-title';
		}
	}

	if( is_page() ) {
		$sidebar_layout_page = giddy_blog_get_option('layout_options_page'); 
		$classes[] = esc_attr( $sidebar_layout_page );
		if (false == giddy_blog_get_option( 'single_page_header_title_enable' )) {
			$classes[] = 'disable-single-page-header-title';
		}
	}

	if( is_single() ) {
		$sidebar_layout_single = giddy_blog_get_option('layout_options_single'); 
		$classes[] = esc_attr( $sidebar_layout_single );
		if (false == giddy_blog_get_option( 'single_post_header_title_enable' )) {
			$classes[] = 'disable-single-post-header-title';
		}
	}


	$blog_layout_content_type = giddy_blog_get_option('blog_layout_content_type'); 
	$classes[] = esc_attr( $blog_layout_content_type );



		// Add a class for typography
	$typography = (  giddy_blog_get_option('theme_typography') == 'default' ) ? '' :  giddy_blog_get_option('theme_typography');
	$classes[] = esc_attr( $typography );

	$body_typography = (  giddy_blog_get_option('body_theme_typography') == 'default' ) ? '' :  giddy_blog_get_option('body_theme_typography');
	$classes[] = esc_attr( $body_typography );


	return $classes;
}
add_filter( 'body_class', 'giddy_blog_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function giddy_blog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'giddy_blog_pingback_header' );

/**
 * Function to get Sections 
 */
function giddy_blog_get_sections() {
    $sections = array( 'featured-slider', 'about');
    $enabled_section = array();
    foreach ( $sections as $section ){
    	
        if (true == giddy_blog_get_option('disable_'.$section.'_section')){
            $enabled_section[] = array(
                'id' => $section,
                'menu_text' => esc_html( giddy_blog_get_option('' . $section . '_menu_title','') ),
            );
        }
    }
    return $enabled_section;
}

if ( ! function_exists( 'giddy_blog_the_excerpt' ) ) :

	/**
	 * Generate excerpt.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $length Excerpt length in words.
	 * @param WP_Post $post_obj WP_Post instance (Optional).
	 * @return string Excerpt.
	 */
	function giddy_blog_the_excerpt( $length = 0, $post_obj = null ) {

		global $post;

		if ( is_null( $post_obj ) ) {
			$post_obj = $post;
		}

		$length = absint( $length );

		if ( 0 === $length ) {
			return;
		}

		$source_content = $post_obj->post_content;

		if ( ! empty( $post_obj->post_excerpt ) ) {
			$source_content = $post_obj->post_excerpt;
		}

		$source_content = preg_replace( '`\[[^\]]*\]`', '', $source_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '&hellip;' );
		return $trimmed_content;

	}

endif;

//  Customizer Control
if (class_exists('WP_Customize_Control') && ! class_exists( 'Giddy_Blog_Image_Radio_Control' ) ) {
	/**
 	* Customize sidebar layout control.
 	*/
	class Giddy_Blog_Image_Radio_Control extends WP_Customize_Control {

		public function render_content() {

			if (empty($this->choices))
				return;

			$name = '_customize-radio-' . $this->id;
			?>
			<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
			<ul class="controls" id='giddy-blog-img-container'>
				<?php
				foreach ($this->choices as $value => $label) :
					$class = ($this->value() == $value) ? 'giddy-blog-radio-img-selected giddy-blog-radio-img-img' : 'giddy-blog-radio-img-img';
					?>
					<li style="display: inline;">
						<label>
							<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr($value); ?>" name="<?php echo esc_attr($name); ?>" <?php
								$this->link();
								checked($this->value(), $value);
								?> />
							<img src='<?php echo esc_url($label); ?>' class='<?php echo esc_attr($class); ?>' />
						</label>
					</li>
					<?php
				endforeach;
				?>
			</ul>
			<?php
		}

	}
}	
