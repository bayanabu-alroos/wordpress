<?php
/**
 * Slider section
 *
 * This is the template for the content of slider section
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */
if ( ! function_exists( 'vivid_blog_add_slider_section' ) ) :
    /**
    * Add slider section
    *
    *@since Vivid Blog 1.0.0
    */
    function vivid_blog_add_slider_section() {
    	$options = vivid_blog_get_theme_options();
        // Check if slider is enabled on frontpage
        $slider_enable = apply_filters( 'vivid_blog_section_status', true, 'slider_section_enable' );

        if ( true !== $slider_enable ) {
            return false;
        }
        // Get slider section details
        $section_details = array();
        $section_details = apply_filters( 'vivid_blog_filter_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render slider section now.
        vivid_blog_render_slider_section( $section_details );
    }
endif;

if ( ! function_exists( 'vivid_blog_get_slider_section_details' ) ) :
    /**
    * slider section details.
    *
    * @since Vivid Blog 1.0.0
    * @param array $input slider section details.
    */
    function vivid_blog_get_slider_section_details( $input ) {
        $options = vivid_blog_get_theme_options();

        $content = array();
        $post_ids = array();

        for ( $i = 1; $i <= 4; $i++ ) {
            if ( ! empty( $options['slider_content_post_' . $i] ) )
                $post_ids[] = $options['slider_content_post_' . $i];
        }
        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => 4,
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
                    $page_post['excerpt']   = vivid_blog_trim_content( 25 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

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
add_filter( 'vivid_blog_filter_slider_section_details', 'vivid_blog_get_slider_section_details' );


if ( ! function_exists( 'vivid_blog_render_slider_section' ) ) :
  /**
   * Start slider section
   *
   * @return string slider content
   * @since Vivid Blog 1.0.0
   *
   */
   function vivid_blog_render_slider_section( $content_details = array() ) {
        $options = vivid_blog_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 

        for ( $i=0;  $i < count( $content_details );  $i++ ) { 
            $background = $content_details[$i]['image'];
            if ( ! empty( $background ) )
                break;
        }

        ?>

        <div id="featured-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": false }' style="background-image: url('<?php echo esc_url( $background ); ?>');">
            <?php foreach ( $content_details as $content ) : ?>
                <article data-thumb="url('<?php echo esc_url( $content['image'] ); ?>')">
                    <div class="overlay"></div>
                    <div class="entry-container">
                        <div class="entry-meta">
                            <span class="cat-links">
                                <?php the_category( '', '', $content['id'] ); ?>
                            </span><!-- .cat-links -->
                        </div><!-- .entry-meta -->

                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                        </header>
                    </div><!-- .entry-container -->
                </article>
            <?php endforeach; ?>
        </div><!-- #featured-slider -->

    <?php }
endif;