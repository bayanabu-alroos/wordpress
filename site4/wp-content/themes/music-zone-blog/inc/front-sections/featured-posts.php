<?php

if ( ! function_exists( 'music_zone_blog_add_featured_posts_section' ) ) :

    function music_zone_blog_add_featured_posts_section() {


        if ( get_theme_mod( 'featured_posts_section_enable', false ) == false ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'music_zone_blog_filter_featured_posts_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        music_zone_blog_render_featured_posts_section( $section_details );
}

endif;

if ( ! function_exists( 'music_zone_blog_get_featured_posts_section_details' ) ) :

    function music_zone_blog_get_featured_posts_section_details( $input ) {

        $featured_posts_count = 3;
        
        $content = array();
      
        $page_ids = array();

        for ( $i=1; $i <= $featured_posts_count; $i++ ) {
            if ( ! empty( get_theme_mod( 'featured_posts_content_post_' . $i, '' ) ) )
                $page_ids[] =  get_theme_mod( 'featured_posts_content_post_' . $i, '' );
        }

        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $featured_posts_count ),
            'orderby'           => 'post__in',
            );                    
           
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = music_zone_trim_content(20);
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

                array_push( $content, $page_post );
            endwhile;
            $i++;
        endif;
        wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;

add_filter( 'music_zone_blog_filter_featured_posts_section_details', 'music_zone_blog_get_featured_posts_section_details' );


if ( ! function_exists( 'music_zone_render_featured_posts_section' ) ) :

   function music_zone_blog_render_featured_posts_section( $content_details = array() ) {

    ?>  

    <div id="music_zone_featured_posts_section" class="relative featured-posts-section">
        <div class="wrapper">
            <?php if ( is_customize_preview()):
                music_zone_section_tooltip( 'featured-posts-section-class' );
            endif; ?>
            <div class="section-contnet col-3 clear">
                <?php foreach (  $content_details as $content ) : ?>
                    <article>
                        <div class="featured-post-item">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                            </div><!-- .featured-image -->

                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>
                        </div><!-- .featured-post-item -->
                    </article>                
                <?php endforeach; ?>
            </div><!-- .col-3 -->
        </div><!-- .wrapper -->
    </div><!-- .featured-postSSSSSs-section --> 
<?php
    }    
endif;

