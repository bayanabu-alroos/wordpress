<?php
/**
 * Recent Posts section
 *
 * This is the template for the content of recent_posts section
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */
if ( ! function_exists( 'juju_blog_add_recent_posts_section' ) ) :
    /**
    * Add recent_posts section
    *
    *@since Juju Blog 1.0.0
    */
    function juju_blog_add_recent_posts_section() {
        $options = juju_blog_get_theme_options();
        // Check if recent_posts is enabled on frontpage
        $recent_posts_enable = apply_filters( 'juju_blog_section_status', true, 'recent_posts_section_enable' );

        if ( true !== $recent_posts_enable ) {
            return false;
        }
        // Get recent_posts section details
        $section_details = array();
        $section_details = apply_filters( 'juju_blog_filter_recent_posts_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render recent_posts section now.
        juju_blog_render_recent_posts_section( $section_details );
    }
endif;

if ( ! function_exists( 'juju_blog_get_recent_posts_section_details' ) ) :
    /**
    * recent_posts section details.
    *
    * @since Juju Blog 1.0.0
    * @param array $input recent_posts section details.
    */
    function juju_blog_get_recent_posts_section_details( $input ) {
        $options = juju_blog_get_theme_options();

        $content = array();
        $post_ids = array();
                $author = array();

                for ( $i = 1; $i <= 4; $i++ ) {
                    if ( ! empty( $options['recent_posts_content_post_' . $i] ) ) :
                        $post_ids[] = $options['recent_posts_content_post_' . $i];
                    endif;
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( 4 ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['author_id'] = get_post_field('post_author', get_the_ID());
                $page_post['title']     = get_the_title();
                $page_post['excerpt']   = juju_blog_trim_content( 15 );
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// recent_posts section content details.
add_filter( 'juju_blog_filter_recent_posts_section_details', 'juju_blog_get_recent_posts_section_details' );


if ( ! function_exists( 'juju_blog_render_recent_posts_section' ) ) :
  /**
   * Start recent_posts section
   *
   * @return string recent_posts content
   * @since Juju Blog 1.0.0
   *
   */
   function juju_blog_render_recent_posts_section( $content_details = array() ) {
        $options = juju_blog_get_theme_options();

        $section_title = !empty( $options['recent_posts_title'] ) ? $options['recent_posts_title'] : '';

        if ( empty( $content_details ) ) {
            return;
            
        } ?>

        <div id="content-wrapper" class="page-section same-background ">
                <div class="wrapper">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">
                            <div id="juju_blog_most_recent_posts_section" class="archive-blog-wrapper">
                            <?php if( !empty( $section_title ) ): ?>
                                <div class="section-header">
                                    <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>
                                </div>
                            <?php endif; ?>

                            <?php foreach ($content_details as $content ): ?>

                                 <article>
                                    <div class="popular-post-wrapper">
                                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                                        </div><!-- .featured-image -->

                                        <div class="entry-container">
                                            <span class="cat-links">
                                                <?php the_category( '', '', $content['id'] ); ?>
                                            </span><!-- .cat-links -->

                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                            </header>

                                            <div class="entry-content">
                                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                            </div>

                                            <div class="most-recent-post-wrapper">
                                                <div class="admin-profile">
                                                    <div class="admin-image">
                                                        <a href="<?php echo esc_url( get_author_posts_url( $content['author_id']) ); ?>"><img src="<?php echo get_avatar_url($content['author_id'], ['size' => '70']); ?>" alt="admin"></a>
                                                    </div><!-- .admin-image -->

                                                    <div class="admin-container">
                                                        <div class="admin-header">
                                                            <h2 class="admin-name"><a href="<?php echo esc_url( get_author_posts_url( $content['author_id']) ); ?>"><?php echo get_the_author_meta('display_name', $content['author_id']); ?></a></h2>
                                                        </div><!-- .admin-header -->

                                                        <div class="entry-meta">
                                                            <?php juju_blog_posted_on( $content['id'] ); ?>
                                                            <span class="reading-time"><?php echo juju_blog_reading_time($content['id']) . esc_html__( ' read', 'juju-blog' ); ?></span>
                                                        </div><!-- .entry-meta -->
                                                    </div><!-- .entry-container -->
                                                </div>
                                            </div>
                                        </div><!-- .entry-container -->
                                    </div><!-- .popular-post-wrapper -->
                                </article>
                                
                            <?php endforeach; ?>

                            </div><!-- .archive-blog-wrapper -->
                        </main><!-- #main -->
                    </div><!-- #primary -->

                    <?php if(is_active_sidebar( 'primary-content-sidebar' )) : ?>

                    <aside id="secondary" class="widget-area" role="complementary">
                        
                        <?php  dynamic_sidebar( 'primary-content-sidebar' ); ?>
                        
                    </aside><!-- #secondary -->

                    <?php endif ; ?>
                </div><!-- .wrapper -->
            </div>
       
    <?php }
endif;