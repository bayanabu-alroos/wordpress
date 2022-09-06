<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */
if ( ! function_exists( 'juju_blog_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Juju Blog 1.0.0
    */
    function juju_blog_add_slider_section() {
    	$options = juju_blog_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'juju_blog_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'juju_blog_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        juju_blog_render_slider_section( $section_details );
    
    }
endif;

if ( ! function_exists( 'juju_blog_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Juju Blog 1.0.0
    * @param array $input slider section details.
    */
    function juju_blog_get_slider_section_details( $input ) {
        $options = juju_blog_get_theme_options();

        $content = array();
       
        $post_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['slider_content_post_' . $i] ) )
                $post_ids[] = $options['slider_content_post_' . $i];
        }
        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => absint( 3 ),
            'orderby'           => 'post__in',
            'ignore_sticky_posts'   => true,
            ); 


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// slider section content details.
add_filter( 'juju_blog_filter_slider_section_details', 'juju_blog_get_slider_section_details' );


if ( ! function_exists( 'juju_blog_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Juju Blog 1.0.0
   *
   */
   function juju_blog_render_slider_section( $content_details = array() ) {
        $options = juju_blog_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="juju_blog_featured_slider_section" class="slider-section page-section">
                <div class="wrapper">
                    <div class="featured-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":true, "autoplay": false, "draggable": true, "fade": false, "adaptiveHeight": true }'>
                       
                       <?php foreach ($content_details as $content ): ?>

                        <article style="background-image:url('<?php echo esc_url( $content['image'] ); ?>');">
                            <div class="overlay"></div>
                            <div class="featured-content-wrapper">
                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>
                                </div><!-- .entry-container -->
                                <div class="entry-meta">
                                    <?php juju_blog_posted_on( $content['id'] ); ?>
                                    <?php echo juju_blog_author( get_the_author_meta( 'ID' ) ); ?>
                                </div>
                            </div><!-- .featured-content-wrapper -->
                        </article>
                           
                       <?php endforeach; ?>
                                            
                    </div><!-- .featured-slider -->
                </div><!-- .wrapper -->
            </div>

    <?php }
endif;