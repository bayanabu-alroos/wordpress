<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */
if ( ! function_exists( 'juju_blog_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Juju Blog 1.0.0
    */
    function juju_blog_add_about_section() {
    	$options = juju_blog_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'juju_blog_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'juju_blog_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        juju_blog_render_about_section( $section_details );

    }
endif;

if ( ! function_exists( 'juju_blog_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Juju Blog 1.0.0
    * @param array $input about section details.
    */
    function juju_blog_get_about_section_details( $input ) {
        $options = juju_blog_get_theme_options();

        $content = array();
        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
                $args = array(
                    'post_type'         => 'page',
                    'page_id'           => $page_id,
                    'posts_per_page'    => 1,
                    );  

        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['id']        = get_the_id();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = juju_blog_trim_content( 30 );
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
// about section content details.
add_filter( 'juju_blog_filter_about_section_details', 'juju_blog_get_about_section_details' );

if ( ! function_exists( 'juju_blog_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Juju Blog 1.0.0
   *
   */
   function juju_blog_render_about_section( $content_details = array() ) {
        $options = juju_blog_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <?php foreach ( $content_details as $content ) : ?>

        <div id="juju_blog_about_section" class="page-section relative same-background">
                <div class="wrapper">
                    <div class="about-content">
                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        </div>

                        <div class="about-content-wrapper">
                            <div class="entry-container">
                                <span class="cat-links">
                                    <?php the_category( '', '', $content['id'] ); ?>
                                </span>

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div>

                                <div class="entry-meta">
                                   <?php echo juju_blog_author( get_the_author_meta( 'ID' ) ); ?>
                                </div>

                                <?php if( !empty( $options['about_btn_text'] ) ): ?>

                                <div class="view-more">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $options['about_btn_text'] ); ?></a>
                                </div>

                            <?php endif; ?>

                            </div><!-- .entry-container -->
                        </div>
                    </div>  
                </div><!-- .wrapper -->
            </div>

            <?php endforeach; ?>
        
        <?php 
    }
endif;