<?php

if ( ! function_exists( 'music_zone_blog_add_cta_section' ) ) :

    function music_zone_blog_add_cta_section() {


        if ( get_theme_mod( 'promotions_section_enable', false ) == false ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'music_zone_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        music_zone_render_cta_section( $section_details );
}

endif;

if ( ! function_exists( 'music_zone_get_cta_section_details' ) ) :

    function music_zone_get_cta_section_details( $input ) {

        $promotions_count  = 3;
        
        $content = array();

        $page_ids[] =  get_theme_mod( 'promotions_content_page' );


        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $promotions_count ),
            'orderby'           => 'post__in',
            );                    
           
        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            $i = 1;
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = music_zone_trim_content(50);
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

                // Push to the main array.
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

add_filter( 'music_zone_filter_cta_section_details', 'music_zone_get_cta_section_details' );


if ( ! function_exists( 'music_zone_render_promotions_section' ) ) :

   function music_zone_render_cta_section( $content_details = array() ) {

    ?>
    <?php foreach ( $content_details as $content ) : ?>
        <div id="music_zone_promotions_section" class="relative page-section promotions-section" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                    music_zone_section_tooltip( 'promotions-section-class' );
                endif; ?>
                <header class="entry-header">
                    <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                </header>

                <div class="entry-content">
                    <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                </div><!-- .entry-content -->

                <div class="video-button">
                    <a href="<?php echo esc_url(get_theme_mod( 'promotions_video_url', '' )); ?>" class="popup-video">
                        <svg viewBox="0 0 373.008 373.008" class="icon-media-play">
                            <path d="M61.792,2.588C64.771,0.864,68.105,0,71.444,0c3.33,0,6.663,0.864,9.655,2.588l230.116,167.2
                            c5.963,3.445,9.656,9.823,9.656,16.719c0,6.895-3.683,13.272-9.656,16.713L81.099,370.427c-5.972,3.441-13.334,3.441-19.302,0
                            c-5.973-3.453-9.66-9.833-9.66-16.724V19.305C52.137,12.413,55.818,6.036,61.792,2.588z"/>
                        </svg>
                    </a>
                </div><!-- .video-button -->
            </div><!-- .wrapper -->
        </div><!-- #music_zone_promotion_section -->
    <?php endforeach; ?>

<?php   }    
endif;

