<?php 
/**
 * Template part for displaying Featured Slider Section
 *
 *@package Giddy Blog
 */
    $slider_category = giddy_blog_get_option( 'slider_category' );
    $enable_content     = giddy_blog_get_option( 'slider_content_enable' );
    $slider_column = giddy_blog_get_option( 'number_of_sr_column' );
    $enable_title     = giddy_blog_get_option( 'slider_title_enable' );
    $enable_category     = giddy_blog_get_option( 'slider_category_enable' );
    $enable_posted_on     = giddy_blog_get_option( 'slider_posted_on_enable' );
    $slider_speed   = giddy_blog_get_option( 'slider_speed' );
    $slider_dot   = giddy_blog_get_option( 'slider_dot' );
    $slider_arrow   = giddy_blog_get_option( 'slider_arrow_enable' );
    $slider_autoplay  = giddy_blog_get_option( 'slider_autoplay_enable' );
    $slider_infinite  = giddy_blog_get_option( 'slider_infinite_enable' );
    $slider_fade  = giddy_blog_get_option( 'slider_fade_enable' );
    $image_overlay   = giddy_blog_get_option( 'disable_white_overlay' );
    $header_font_size = giddy_blog_get_option( 'slider_font_size');
    $slider_content_position = giddy_blog_get_option( 'slider_content_position_option');
    $class ='';
    if (true == $slider_dot) {
       $class = 'true';
    } else{
        $class = 'false';
    }
    ?>
    
        <div class="featured-slider-wrapper <?php echo esc_attr($slider_content_position); ?>" 
        data-slick='{"slidesToShow": <?php echo esc_attr( $slider_column) ?>,
         "slidesToScroll": 1, 
         "infinite": <?php if( true== $slider_infinite ){ echo 'true'; } else{ echo 'false'; } ?>, 
         "speed": <?php echo esc_attr( $slider_speed) ?>, 
         "dots": <?php echo esc_html($class) ?>, 
         "arrows":<?php if( true== $slider_arrow ){ echo 'true'; } else{ echo 'false'; } ?>, 
         "autoplay": <?php if( true== $slider_autoplay ){ echo 'true'; } else{ echo 'false'; } ?>, 
         "fade": <?php if( true== $slider_fade && $slider_column==1){ echo 'true'; } else{ echo 'false'; } ?> }'>

            <?php 

                $args = array (

                    'posts_per_page' =>3,              
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => 1,
                    );
                    if ( absint( $slider_category ) > 0 ) {
                        $args['cat'] = absint( $slider_category );
                    } 

            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
            $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>

                    <article class="slick-item" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
                        <?php 
                            $class='';
                            if (false == $image_overlay) { 
                                $class='image-overlay';
                            } else{
                                $class='content-overlay';
                            }
                            if (false == $image_overlay)  {
                        ?>
                            <div class="overlay"></div>
                        <?php } ?>
                        <div class="wrapper">
                            <div class="<?php echo esc_attr($class); ?> featured-content-wrapper">
                                <header class="entry-header">
                                    <?php if ( ($enable_category==true)) { ?>
                                        <div class="entry-meta">
                                            <?php giddy_blog_entry_meta(); ?>
                                        </div><!-- .entry-meta -->
                                    <?php } ?>
                                    <?php if ($enable_title==true): ?>
                                        <a href="<?php the_permalink();?>" >
                                            <h2 class="entry-title"><?php the_title();?></h2>
                                        </a>
                                    <?php endif ?>
                                </header>
                                <?php if ( ($enable_content==true)): ?>
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = giddy_blog_the_excerpt( 30 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->
                                <?php endif; ?>
                                
                                <?php if ( ($enable_posted_on==true)) { ?>
                                    <div class="entry-meta">                 
                                        <?php giddy_blog_posted_on(); ?>
                                    </div><!-- .entry-meta -->
                                <?php } ?>
                                <?php
                                $readmore_text   = giddy_blog_get_option( 'slider_custom_btn_text_' . $i ); 
                                if ( ! empty( $readmore_text ) ) { ?>
                                    <div class="read-more">
                                        <a href="<?php the_permalink();?>" class="btn btn-primary"><?php echo esc_html($readmore_text);?></a>
                                    </div><!-- .read-more -->
                                <?php } ?>
                            </div><!-- .featured-content-wrapper -->
                        </div><!-- .wrapper -->
                    </article><!-- .slick-item -->
                <?php endwhile;?>
                <?php endif;?>
        <?php wp_reset_postdata(); ?>
        </div><!-- .featured-slider-wrapper -->