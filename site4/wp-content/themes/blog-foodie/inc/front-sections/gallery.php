<?php

if ( ! function_exists( 'blog_foodie_add_gallery_section' ) ) :

    function blog_foodie_add_gallery_section() {

        if ( true !== get_theme_mod( 'blog_foodie_gallery_section_enable' ) ) {
            return false;
        }

        $content_details = array();
        $cat_id = ! empty( get_theme_mod( 'blog_foodie_gallery_section_category' ) ) ? get_theme_mod( 'blog_foodie_gallery_section_category' ) : '';
        $args = array(
            'post_type'         => 'post',
            'posts_per_page'    => 6,
            'cat'               => absint( $cat_id ),
            'ignore_sticky_posts'   => true,
            );                    


        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = vivid_blog_trim_content( 25 );
                $page_post['author']    = vivid_blog_author();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

                array_push( $content_details, $page_post );
            endwhile;
        endif;
        wp_reset_postdata();

        blog_foodie_render_gallery_section( $content_details );
    }
endif;

if ( ! function_exists( 'blog_foodie_render_gallery_section' ) ) :

   function blog_foodie_render_gallery_section(  $content_details ) {

    ?>
    <div id="gallery-section" class="relative">
        <div class="gallery-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": true, "draggable": true, "fade": false }'>
            <?php foreach ( $content_details as $content ) : ?>
                <article>
                    <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <a href="<?php echo esc_url( $content['url'] ) ?>" class="post-thumbnail-link"></a>
                    </div><!-- .featured-image -->
                </article>
            <?php endforeach; ?>
        </div><!-- .gallery-slider -->
    </div><!-- #gallery-section -->

    <?php }
endif;
