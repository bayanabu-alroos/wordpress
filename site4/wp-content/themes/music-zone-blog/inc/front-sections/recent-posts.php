<?php

if ( ! function_exists( 'music_zone_blog_add_recent_posts_section' ) ) :

    function music_zone_blog_add_recent_posts_section() {


        if ( get_theme_mod( 'recent_posts_section_enable', false ) == false ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'music_zone_blog_filter_recent_posts_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        music_zone_blog_render_recent_posts_section( $section_details );
}

endif;

if ( ! function_exists( 'music_zone_blog_get_recent_posts_section_details' ) ) :

    function music_zone_blog_get_recent_posts_section_details( $input ) {

        $recent_posts_count = 6;
        
        $content = array();
      
        $page_ids = array();

        for ( $i=1; $i <= $recent_posts_count; $i++ ) {
            if ( ! empty( get_theme_mod( 'recent_posts_content_post_' . $i, '' ) ) )
                $page_ids[] =  get_theme_mod( 'recent_posts_content_post_' . $i, '' );
        }

        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $recent_posts_count ),
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

add_filter( 'music_zone_blog_filter_recent_posts_section_details', 'music_zone_blog_get_recent_posts_section_details' );


if ( ! function_exists( 'music_zone_render_recent_posts_section' ) ) :

   function music_zone_blog_render_recent_posts_section( $content_details = array() ) {

    ?>  
    <div id="music_zone_recent_posts_section" class="relative recent-posts-section">
        <div class="wrapper">
            <?php if ( is_customize_preview()):
                music_zone_section_tooltip( 'recent-posts-section-class' );
            endif; ?>
            <div class="section-header">
                <?php if ( !empty( get_theme_mod( 'recent_posts_sub_title', '' ) ) ): ?>
                    <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'recent_posts_sub_title', '' ) ); ?></p>
                <?php endif ?>
                <?php if ( !empty( get_theme_mod( 'recent_posts_title', '' ) ) ): ?>
                    <h2 class="section-title"><?php echo esc_html( get_theme_mod( 'recent_posts_title', '' ) ); ?></h2>
                <?php endif ?>
            </div><!-- .section-header -->

            <div class="section-content col-3 clear">
                <?php foreach (  $content_details as $content ) : ?>
                    <article>
                        <div class="post-wrapper">
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="<?php echo esc_attr( $content['title'] ); ?>"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                            
                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                                </div><!-- .entry-content -->
                                
                                <div class="post-footer-meta"> 
                                    <?php music_zone_posted_on( $content['id'] ); ?>
                                </div>
                            </div><!-- .entry-container -->
                        </div><!-- .post-wrapper -->
                    </article>                
                <?php endforeach; ?>
            </div><!-- .section-content -->
        </div><!-- .wrapper -->
    </div><!-- #recent-posts-section -->
<?php
    }    
endif;

