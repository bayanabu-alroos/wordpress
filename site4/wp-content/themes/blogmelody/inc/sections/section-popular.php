<?php 
/**
 * Template part for displaying Services Section
 *
 *@package BlogMelody
 */

    $popular_title       = blogmelody_get_option( 'popular_title' );
    $enable_posted_on     = blogmelody_get_option( 'popular_posted_on_enable' );
    for( $i=1; $i<=5; $i++ ) :
        $popular_post_posts[] = absint(blogmelody_get_option( 'popular_post_'.$i ) );
    endfor;
    ?>
    <div class="wrapper"> 
        <?php if( !empty($popular_title)):?>
            <div class="section-header">
                <?php if( !empty($popular_title)):?>
                    <h2 class="section-title"><?php echo esc_html($popular_title);?></h2>
                <?php endif;?>
            </div>       
        <?php endif;?>       
        <div class="section-content clear">
            <?php
                    $args = array (
                        'post_type'     => 'post',
                        'post_per_page' => count( $popular_post_posts ),
                        'post__in'      => $popular_post_posts,
                        'orderby'       =>'post__in', 
                    ); 
                
                $loop = new WP_Query($args);                        
                if ( $loop->have_posts() ) :
                    $i=0;  
                    while ($loop->have_posts()) : $loop->the_post(); ?>  
                        <article class="<?php echo (has_post_thumbnail() ? 'has' : 'no'); ?>-post-thumbnail <?php echo ( ( 0 == $i ) || ( $i%4 == 0 ) ) ? 'full-width' : ''; ?>">
                            <div class="post-item-wrapper">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'blog-thumbnails');?>');">
                                        <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
                                    </div><!-- .featured-image -->
                                <?php endif; ?>

                                <div class="entry-container">

                                    <span class="cat-links">
                                        <?php blogmelody_entry_meta(); ?>
                                    </span><!-- .cat-links -->

                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                                    </header>
                                    <div class="entry-content">
                                        <?php
                                            $excerpt = blogmelody_the_excerpt( 20 );
                                            echo wp_kses_post( wpautop( $excerpt ) );
                                        ?>
                                    </div><!-- .entry-content -->
                                    <?php if (($enable_posted_on==true)) : ?>
                                        <div class="entry-meta posted-on">
                                            <?php blogmelody_posted_on(); ?>
                                        </div><!-- .entry-meta -->
                                    <?php endif; ?>
                                </div><!-- .entry-container -->
                            </div><!-- .post-item-wrapper -->
                        </article>
                    <?php $i++; ?>
                
                    <?php endwhile;?>
                  
                <?php endif;?>
            <?php wp_reset_postdata(); ?>
        </div>  
    </div>