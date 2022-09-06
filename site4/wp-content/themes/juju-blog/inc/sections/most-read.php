<?php
/**
 * Most Read section
 *
 * This is the template for the content of most_read section
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */
if ( ! function_exists( 'juju_blog_add_most_read_section' ) ) :
    /**
    * Add most_read section
    *
    *@since Juju Blog 1.0.0
    */
    function juju_blog_add_most_read_section() {
    	$options = juju_blog_get_theme_options();
        // Check if most_read is enabled on frontpage
        $most_read_enable = apply_filters( 'juju_blog_section_status', true, 'most_read_section_enable' );

        if ( true !== $most_read_enable ) {
            return false;
        }
        // Get most_read section details
        $section_details = array();
        $section_details = apply_filters( 'juju_blog_filter_most_read_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        juju_blog_render_most_read_section( $section_details );

    }
endif;

if ( ! function_exists( 'juju_blog_get_most_read_section_details' ) ) :
    /**
    * most_read section details.
    *
    * @since Juju Blog 1.0.0
    * @param array $input most_read section details.
    */
    function juju_blog_get_most_read_section_details( $input ) {
        $options = juju_blog_get_theme_options();

        // Content type.
        $most_read_content_type  = $options['most_read_content_type'];
        
        $content = array();
        switch ( $most_read_content_type ) {

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['most_read_content_post_' . $i] ) )
                        $post_ids[] = $options['most_read_content_post_' . $i];
                }
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( 3 ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['most_read_content_category'] ) ? $options['most_read_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( 3 ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            default:
            break;
        }

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
// most_read section content details.
add_filter( 'juju_blog_filter_most_read_section_details', 'juju_blog_get_most_read_section_details' );

if ( ! function_exists( 'juju_blog_render_most_read_section' ) ) :
  /**
   * Start most_read section
   *
   * @return string most_read content
   * @since Juju Blog 1.0.0
   *
   */
   function juju_blog_render_most_read_section( $content_details = array() ) {
        $options = juju_blog_get_theme_options();
        $most_read_title = !empty( $options['most_read_title'] ) ? $options['most_read_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="juju_blog_most_read_posts_section" class="relative page-section ">
                <div class="wrapper">

                <?php if( !empty( $most_read_title ) ): ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $most_read_title ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                    <div class="section-content col-3 clear">

                    <?php foreach ($content_details as $content ): ?>

                        <article>
                            <div class="most-read-post-wrapper">
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ) ?>');">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                                </div><!-- .featured-image -->

                                <div class="entry-container">
                                    <span class="cat-links">
                                        <?php the_category( '', '', $content['id'] ); ?>
                                    </span><!-- .cat-links -->

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                    </header>

                                    <?php echo juju_blog_author( get_the_author_meta( 'ID' ) ); ?>

                                </div><!-- .entry-container -->
                            </div><!-- .most-read-post-wrapper -->
                        </article>
                        
                    <?php endforeach; ?>

                    </div><!-- .section-content -->
                </div><!-- .wrapper -->
            </div>

    <?php }
endif;