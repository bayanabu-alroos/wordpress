<?php
    $about_content_type     = giddy_blog_get_option( 'about_content_type' );
    $enable_category     = giddy_blog_get_option( 'about_category_enable' );
    $enable_content     = giddy_blog_get_option( 'about_content_enable' );
    $enable_posted_on     = giddy_blog_get_option( 'about_posted_on_enable' );
    $about_dots  = giddy_blog_get_option( 'about_dots_enable' );
    $about_arrow  = giddy_blog_get_option( 'about_arrow_enable' );
    $number_of_about_items  = giddy_blog_get_option( 'number_of_about_items' );
    $about_category = giddy_blog_get_option( 'about_category' );
    $header_font_size = giddy_blog_get_option( 'about_font_size');
    $about_layout = giddy_blog_get_option('about_layout_option');


?>
<div class="section-content clear">
    <div class="about-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": <?php if( true== $about_dots){ echo 'true'; } else{ echo 'false'; } ?>, "arrows":<?php if( true== $about_arrow ){ echo 'true'; } else{ echo 'false'; } ?>, "autoplay": true, "fade": false }'>
        <?php 
            $args = array (

                'posts_per_page' =>4,              
                'post_type' => 'post',
                'post_status' => 'publish',
                'paged' => 1,
                'ignore_sticky_posts' => true, 
                );
                if ( absint( $about_category ) > 0 ) {
                    $args['cat'] = absint( $about_category );
                }
            $loop = new WP_Query($args);                        
            if ( $loop->have_posts() ) :
                $i=0;  
                while ($loop->have_posts()) : $loop->the_post(); $i++;?>           
                    <article>
                        <div class="post-item-wrapper">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'giddy-blog-blog');?>');">
                                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                        <div class="overlay"></div>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container">
                                    <?php if ( ($enable_category==true) ) : ?>
                                        <div class="entry-meta">
                                            <?php giddy_blog_entry_meta(); ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    </header>
                                    <?php if ( ($enable_content==true)): ?>
                                        <div class="entry-content">
                                            <?php if ( ($about_layout=='about-two')){
                                                $excerpt = giddy_blog_the_excerpt( 15 );
                                                echo wp_kses_post( wpautop( $excerpt ) );
                                            } else{
                                                 $excerpt = giddy_blog_the_excerpt( 9 );
                                                echo wp_kses_post( wpautop( $excerpt ) );
                                            }
                                            ?>
                                        </div><!-- .entry-content -->
                                    <?php endif; ?>
                                    <?php if (($enable_posted_on==true)) : ?>
                                        <div class="entry-meta">
                                            <?php giddy_blog_posted_on(); ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                </div><!-- .entry-container -->
                            </div><!-- .post-item-wrapper -->
                    </article>

                <?php endwhile;?>
            <?php endif; ?>
            <?php wp_reset_postdata(); ?>
    </div>
</div><!-- .section-content -->