<?php

if ( ! function_exists( 'music_zone_blog_add_about_section' ) ) :

    function music_zone_blog_add_about_section() {


        if ( get_theme_mod( 'about_us_section_enable', false ) == false ) {
            return false;
        }

        $section_details = array();
        $section_details = apply_filters( 'music_zone_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        music_zone_render_about_section( $section_details );
}

endif;

if ( ! function_exists( 'music_zone_get_about_section_details' ) ) :

    function music_zone_get_about_section_details( $input ) {

        $about_us_count           = 3;
        
        $content = array();

        $page_ids[] =  get_theme_mod( 'about_us_content_page' );


        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => absint( $about_us_count ),
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

add_filter( 'music_zone_filter_about_section_details', 'music_zone_get_about_section_details' );


if ( ! function_exists( 'music_zone_render_about_us_section' ) ) :

   function music_zone_render_about_section( $content_details = array() ) {

    ?>
        

            <?php foreach ( $content_details as $content ) : ?>
                <div id="music_zone_about_section" class="relative about-section">
                    <div class="wrapper">
                        <?php if ( is_customize_preview()):
                            music_zone_section_tooltip( 'about-section-class' );
                        endif; ?>
                        <article class="has-post-thumbnail">
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ); ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="about"></a>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <div class="section-header">
                                     <?php if ( get_theme_mod( 'about_us_custom_sub_title', '' ) ): ?>
                                        <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'about_us_custom_sub_title', '' ) ); ?></p>
                                    <?php endif ?>
                                    
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </div><!-- .section-header -->

                                <div class="entry-content">
                                    <p><?php echo wp_kses_post($content['excerpt']); ?></p>
                                </div><!-- .entry-content -->

                                <?php if ( !empty( get_theme_mod( 'about_us_btn_txt', '' ) ) ): ?>
                                    <div class="read-more">                                        
                                        <a href="<?php echo esc_url($content['url']); ?>" class="btn"><?php echo esc_html(get_theme_mod( 'about_us_btn_txt', '' )); ?></a>
                                    </div>
                                <?php endif ?>    
                            </div><!-- .entry-container -->
                        </article>
                    </div><!-- .wrapper -->
                </div><!-- #music_zone_about_section -->               
            <?php endforeach; ?>

<?php   }    
endif;

