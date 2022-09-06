<?php
/**
 * Slider Template Part - Layout Two
 * 
 * @package Trendy Blog
 * @since 1.0.0
 */
$postCategory = $args->category;
$postCount = $args->count;
$dateOption = $args->dateOption;
$commentOption = $args->commentOption;
?>
<div class="blog-flower">
    <div class="blog-flower__slide__wrapper">
        <div class="blog-flower__slide layout-two">
            <?php
                $banner_slider_posts = new WP_Query( array(
                    'category_name'     => esc_html( $postCategory ),
                    'posts_per_page'    => esc_html( $postCount )      
                ));
                if( $banner_slider_posts->have_posts() ) :
                    while( $banner_slider_posts->have_posts() ) : $banner_slider_posts->the_post();
                    $blockCategories = get_the_category();
                ?>
                        <div class="blog-flower__slide__item">
                            <div class="post-card -box-text -center -theme--violet">
                                <a class="card__cover" href="<?php the_permalink(); ?>">
                                    <?php if( has_post_thumbnail() ) : ?>
                                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"/>
                                    <?php endif; ?>
                                </a>
                                <div class="card__content">
                                    <?php
                                        if( $blockCategories ) {
                                            foreach( $blockCategories as $category ) :
                                        ?>
                                                <h5 class="card__content-category post-cat-<?php echo esc_attr( ( $category->term_id ) ); ?>"><a href="<?php echo esc_url( get_term_link( $category->term_id ) ); ?>"><?php echo esc_html( $category->name ); ?></a></h5>
                                        <?php
                                            endforeach;
                                        }
                                    ?>
                                        <a class="card__content-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    <div class="card__content-info">
                                        <?php if( $dateOption ) { ?>
                                                <div class="info__time"><i class="far fa-clock"></i>
                                                    <p><?php echo get_the_date(); ?></p>
                                                </div>
                                        <?php }
                                        if( $commentOption ) {
                                        ?>
                                            <div class="info__comment"><i class="far fa-comment"></i>
                                                <p><?php echo absint( get_comments_number() ); ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    endwhile;
                endif;
            ?>
        </div>
    </div>
</div>