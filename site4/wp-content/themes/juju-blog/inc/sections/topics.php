<?php
/**
 * Topics section
 *
 * This is the template for the content of topics section
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */
if ( ! function_exists( 'juju_blog_add_topics_section' ) ) :
    /**
    * Add topics section
    *
    *@since Juju Blog 1.0.0
    */
    function juju_blog_add_topics_section() {
        $options = juju_blog_get_theme_options();
        // Check if topics is enabled on frontpage
        $topics_enable = apply_filters( 'juju_blog_section_status', true, 'topics_section_enable' );

        if ( true !== $topics_enable ) {
            return false;
        }
        // Get topics section details
        $section_details = array();
        $section_details = apply_filters( 'juju_blog_filter_topics_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render topics section now.
        juju_blog_render_topics_section( $section_details );
    }
endif;

if ( ! function_exists( 'juju_blog_get_topics_section_details' ) ) :
    /**
    * topics section details.
    *
    * @since Juju Blog 1.0.0
    * @param array $input topics section details.
    */
    function juju_blog_get_topics_section_details( $input ) {
        $options = juju_blog_get_theme_options();

        $content = array();
        $post_ids = array();
        $author = array();

        for ( $i = 1; $i <= 6; $i++ ) {
            if ( ! empty( $options['topics_content_post_' . $i] ) ) :
                $post_ids[] = $options['topics_content_post_' . $i];
            endif;
        }

        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => absint( 6 ),
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
// topics section content details.
add_filter( 'juju_blog_filter_topics_section_details', 'juju_blog_get_topics_section_details' );


if ( ! function_exists( 'juju_blog_render_topics_section' ) ) :
  /**
   * Start topics section
   *
   * @return string topics content
   * @since Juju Blog 1.0.0
   *
   */
   function juju_blog_render_topics_section( $content_details = array() ) {
        $options = juju_blog_get_theme_options();

        $section_title = !empty( $options['topics_title'] ) ? $options['topics_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="juju_blog_trending_topics_section" class="page-section same-background">
                <div class="wrapper">
                <?php if( !empty( $section_title ) ): ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                    <div class="trending-topics-slider" data-slick='{"slidesToShow": 5, "slidesToScroll": 1, "infinite": true, "speed": 800, "dots": true, "arrows":true, "autoplay": false, "draggable": true, "fade": false, "adaptiveHeight": true }'>
                        
                    <?php foreach ($content_details as $content ): ?>

                        <article>
                            <div class="featured-images" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <div class="overlay"></div>
                            </div>
                            <div class="entry-header-wrapper clear">
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>   
                            </div>
                        </article>
                        
                    <?php endforeach; ?>

                    </div>
                </div><!-- .wrapper -->
            </div>
       
    <?php }
endif;