<?php

if ( ! function_exists( 'blog_foodie_add_cta_section' ) ) :

    function blog_foodie_add_cta_section() {

        if ( true !== get_theme_mod( 'blog_foodie_cta_section_enable' ) ) {
            return false;
        }   

        blog_foodie_render_cta_section();
    }
endif;

if ( ! function_exists( 'blog_foodie_render_cta_section' ) ) :

   function blog_foodie_render_cta_section() {

    $content_details = array();
    $page_id = ! empty( get_theme_mod( 'blog_foodie_cta_content_page' ) ) ? get_theme_mod( 'blog_foodie_cta_content_page' ) : '';
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
            <div id="call-to-action" class="page-section">
                <div class="wrapper">
                    <?php if ( ! empty( $content['title'] ) || ! empty( get_theme_mod( 'blog_foodie_cta_section_sub_title' ) ) ) : ?>
                        <div class="section-header">
                            <?php if ( ! empty( get_theme_mod( 'blog_foodie_cta_section_sub_title' ) ) ) : ?>
                                <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'blog_foodie_cta_section_sub_title' ) ); ?></p>
                            <?php endif; 

                            if ( ! empty( $content['title'] ) ) : ?>
                                <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                            <?php endif; ?>
                        </div><!-- .section-header -->
                    <?php endif;

                    if ( ! empty( $content['excerpt'] ) ) : ?>
                        <div class="section-content">
                            <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                        </div><!-- .entry-content -->
                    <?php endif;

                    if ( ! empty( get_theme_mod( 'blog_foodie_cta_section_show_more_label' ) ) ) : ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ) ?>" class="btn"><?php echo esc_html( get_theme_mod( 'blog_foodie_cta_section_show_more_label' ) ); ?></a>
                        </div><!-- .read-more -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #call-to-action -->

        <?php endforeach;          

    }
endif;
