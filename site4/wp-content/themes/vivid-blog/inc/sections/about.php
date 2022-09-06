<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */
if ( ! function_exists( 'vivid_blog_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Vivid Blog 1.0.0
    */
    function vivid_blog_add_about_section() {
    	$options = vivid_blog_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'vivid_blog_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'vivid_blog_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        vivid_blog_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'vivid_blog_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Vivid Blog 1.0.0
    * @param array $input about section details.
    */
    function vivid_blog_get_about_section_details( $input ) {
        $options = vivid_blog_get_theme_options();

        $content = array();
        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['author']    = vivid_blog_author();
                $page_post['excerpt']   = vivid_blog_trim_content( 30 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

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
add_filter( 'vivid_blog_filter_about_section_details', 'vivid_blog_get_about_section_details' );


if ( ! function_exists( 'vivid_blog_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Vivid Blog 1.0.0
   *
   */
   function vivid_blog_render_about_section( $content_details = array() ) {
        $options = vivid_blog_get_theme_options();
        $readmore = ! empty( $options['about_btn_title'] ) ? $options['about_btn_title'] : esc_html__( 'Read More', 'vivid-blog' );

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>

            <div id="about-us" class="relative page-section">
                <div class="wrapper">
                    <article class="<?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail">
                        <?php if ( ! empty( $content['image'] ) ) : ?>
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">
                            <div class="section-header">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                <?php endif; ?>
                            </div><!-- .section-header -->

                            <?php if ( ! empty( $content['excerpt'] ) ) : ?>
                                <div class="section-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->
                            <?php endif; 

                            if ( ! empty( $content['url'] ) ) : ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $readmore ); ?></a>
                                </div><!-- .read-more -->
                            <?php endif; ?>
                        </div><!-- .entry-container -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #about-me -->

        <?php endforeach;
    }
endif;