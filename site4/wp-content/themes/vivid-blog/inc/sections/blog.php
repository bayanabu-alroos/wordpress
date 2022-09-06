<?php
/**
 * Blog section
 *
 * This is the template for the content of blog section
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */
if ( ! function_exists( 'vivid_blog_add_blog_section' ) ) :
    /**
    * Add blog section
    *
    *@since Vivid Blog 1.0.0
    */
    function vivid_blog_add_blog_section() {
    	$options = vivid_blog_get_theme_options();
        // Check if blog is enabled on frontpage
        $blog_enable = apply_filters( 'vivid_blog_section_status', true, 'blog_section_enable' );

        if ( true !== $blog_enable ) {
            return false;
        }
        // Get blog section details
        $section_details = array();
        $section_details = apply_filters( 'vivid_blog_filter_blog_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog section now.
        vivid_blog_render_blog_section( $section_details );
    }
endif;

if ( ! function_exists( 'vivid_blog_get_blog_section_details' ) ) :
    /**
    * blog section details.
    *
    * @since Vivid Blog 1.0.0
    * @param array $input blog section details.
    */
    function vivid_blog_get_blog_section_details( $input ) {
        $options = vivid_blog_get_theme_options();

        // Content type.
        $blog_content_type  = $options['blog_content_type'];
        
        $content = array();
        switch ( $blog_content_type ) {
        	
            case 'category':
                $cat_id = ! empty( $options['blog_content_category'] ) ? $options['blog_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 8,
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'recent':
                $cat_ids = ! empty( $options['blog_category_exclude'] ) ? $options['blog_category_exclude'] : array();
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => 8,
                    'category__not_in'  => ( array ) $cat_ids,
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
                $page_post['excerpt']   = vivid_blog_trim_content( 20 );
                $page_post['author']    = vivid_blog_author();
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// blog section content details.
add_filter( 'vivid_blog_filter_blog_section_details', 'vivid_blog_get_blog_section_details' );


if ( ! function_exists( 'vivid_blog_render_blog_section' ) ) :
  /**
   * Start blog section
   *
   * @return string blog content
   * @since Vivid Blog 1.0.0
   *
   */
   function vivid_blog_render_blog_section( $content_details = array() ) {
        $options = vivid_blog_get_theme_options();
        $readmore = ! empty( $options['read_more_text'] ) ? $options['read_more_text'] : esc_html__( 'Read More', 'vivid-blog' );
        $i = 1;
        $count = count( $content_details );

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="latest-posts" class="relative page-section <?php echo ! is_active_sidebar( 'latest-blog-sidebar' ) ? 'latest-blog-sidebar-disabled' : ''; ?>">
            <div class="wrapper">   
                <?php if ( ! empty( $options['blog_title'] ) ) : ?>
                    <div class="section-header">
                        <h2 class="section-title"><?php echo esc_html( $options['blog_title'] ); ?></h2>
                    </div><!-- .section-header -->
                <?php endif; ?>

                <div id="primary" class="content-area">
                    <main id="main" class="site-main" role="main">
                        <?php foreach ( $content_details as $content ) : 
                            if ( 1 == $i ) : ?>
                                <div class="archive-blog-wrapper clear">
                            <?php endif; 

                            if ( $i <= 2 ) : ?>

                                <article class="<?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail">
                                    <?php if ( ! empty( $content['image'] ) ) : ?>
                                        <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                            <a href="<?php echo esc_url( $content['image'] ); ?>" class="post-thumbnail-link"></a>
                                        </div><!-- .featured-image -->
                                    <?php endif; ?>

                                    <div class="entry-container">
                                        <div class="entry-meta">
                                            <span class="cat-links">
                                                <?php the_category( '', '', $content['id'] ); ?>
                                            </span><!-- .cat-links -->
                                        </div><!-- .entry-meta -->

                                        <header class="entry-header">
                                            <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                        </header>

                                        <div class="entry-content">
                                            <p><?php echo esc_html( $content['excerpt'] ); ?><a href="<?php echo esc_url( $content['url'] ); ?>"> <?php echo esc_html( $readmore ); ?></a></p>
                                        </div>

                                        <div class="section-meta">
                                            <?php 
                                                vivid_blog_posted_on( $content['id'] );
                                                echo wp_kses_post( $content['author'] );
                                            ?>
                                        </div><!-- .entry-meta -->
                                    </div><!-- .entry-container -->
                                </article>

                            <?php endif;

                            if ( 2 == $i || $count < 2 ) : ?>
                                </div><!-- .archive-blog-wrapper -->
                            <?php endif; 

                            if ( $count > 2 && $i > 2 ) : 
                                if ( 3 == $i ) : ?>
                                    <div class="blog-posts-wrapper clear">
                                <?php endif; ?>

                                    <article class="<?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail">
                                        <?php if ( ! empty( $content['image'] ) ) : ?>
                                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                                <a href="<?php echo esc_url( $content['image'] ); ?>" class="post-thumbnail-link"></a>
                                            </div><!-- .featured-image -->
                                        <?php endif; ?>

                                        <div class="entry-container">
                                            <div class="entry-meta">
                                                <span class="cat-links">
                                                    <?php the_category( '', '', $content['id'] ); ?>
                                                </span><!-- .cat-links -->
                                                <?php  vivid_blog_posted_on( $content['id'] ); ?>
                                            </div><!-- .entry-meta -->

                                            <header class="entry-header">
                                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                            </header>
                                        </div><!-- .entry-container -->
                                    </article>

                                <?php if ( $i == $count ) : ?>
                                    </div><!-- .blog-posts-wrapper -->
                                <?php endif; 
                            endif; 
                            $i++;
                        endforeach; ?>
                    </main><!-- #main -->
                </div><!-- #primary -->

                <?php if ( is_active_sidebar( 'latest-blog-sidebar' ) ) : ?>
                    <aside id="secondary" class="widget-area" role="complementary">
                        <?php dynamic_sidebar( 'latest-blog-sidebar' ); ?>
                    </aside><!-- #secondary -->
                <?php endif; ?>
            </div><!-- .wrapper -->
        </div><!-- #latest-posts -->


    <?php }
endif;