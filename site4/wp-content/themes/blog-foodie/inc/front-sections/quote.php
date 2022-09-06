<?php

if ( ! function_exists( 'blog_foodie_add_quote_section' ) ) :

    function blog_foodie_add_quote_section() {

        if ( true !== get_theme_mod( 'blog_foodie_quote_section_enable' ) ) {
            return false;
        }   

        blog_foodie_render_quote_section();
    }
endif;

if ( ! function_exists( 'blog_foodie_render_quote_section' ) ) :

   function blog_foodie_render_quote_section() {

    $content_details = array();
    $page_id = ! empty( get_theme_mod( 'blog_foodie_quote_content_page' ) ) ? get_theme_mod( 'blog_foodie_quote_content_page' ) : '';
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
            $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : '';

            // Push to the main array.
            array_push( $content_details, $page_post );
        endwhile;
    endif;
    wp_reset_postdata();

    foreach ( $content_details as $content ) : ?>
          <div id="clients-feedback" class="relative page-section" style="background-image: url('<?php echo esc_url( get_theme_mod( 'blog_foodie_quote_bg_image', '' ) ); ?>');">
            <div class="overlay"></div>
            <div class="client-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": true, "arrows":false, "autoplay": true, "draggable": true, "fade": false }'>
                <article>
                    <div class="wrapper">
                        <div class="section-header">
                            <?php if ( ! empty( get_theme_mod('blog_foodie_quote_section_sub_title') ) ) : ?>
                                <p class="section-subtitle"><?php echo esc_html( get_theme_mod('blog_foodie_quote_section_sub_title') ); ?></p>
                            <?php endif; ?>
                            <h2 class="section-title"><?php printf( '%1$s</span>%2$s</span>%3$s', '&#8220;', esc_html( $content['title'] ), '&#8221;' ); ?></h2>
                        </div><!-- .section-header -->
                    </div><!-- .wrapper -->
                </article>
            </div><!-- .client-slider -->
        </div><!-- #clients-feedback -->
    <?php endforeach;          

    }
endif;
