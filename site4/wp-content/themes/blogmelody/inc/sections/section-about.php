<?php
    $number_of_about_items  = blogmelody_get_option( 'number_of_about_items' );
    $enable_posted_on     = blogmelody_get_option( 'about_posted_on_enable' );
    for( $i=1; $i<=$number_of_about_items; $i++ ) :
        $about_page_posts[] = absint(blogmelody_get_option( 'about_page_'.$i ) );
    endfor;

?>
<div class="section-content clear">
    <div class="about-slider" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1200, "dots": true, "arrows":false, "autoplay": true, "fade": false }'>

    <?php $args = array (
        'post_type'     => 'page',
        'post_per_page' => count( $about_page_posts ),
        'post__in'      => $about_page_posts,
        'orderby'       =>'post__in', 
    ); 
    $loop = new WP_Query($args);                        
    if ( $loop->have_posts() ) :
        $i=0;  
        while ($loop->have_posts()) : $loop->the_post(); $i++;?>           
            <article>
                <div class="post-item-wrapper">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'blogmelody-blog');?>');">
                                <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                <div class="overlay"></div>
                            </div><!-- .featured-image -->
                        <?php endif; ?>

                        <div class="entry-container">

                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                            </header>
                            <?php if (($enable_posted_on==true)) : ?>
                                <div class="entry-meta">
                                    <?php blogmelody_posted_on(); ?>
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