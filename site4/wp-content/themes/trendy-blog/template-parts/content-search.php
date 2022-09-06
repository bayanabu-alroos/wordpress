<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Trendy Blog
 */

?>
<div class="post-card -theme--blue -small -horizontal">
        <?php
            if( has_post_thumbnail() ) {
                trendy_blog_get_thumb_html_by_post_format();
            }
        ?>
        <div class="card__content">
        	<?php
        	$trendy_blog_categories = get_the_category();
				if ( ! empty( $trendy_blog_categories ) ) {
				    echo '<a class="card__content-category" href="' . esc_url( get_category_link( $trendy_blog_categories[0]->term_id ) ) . '">' . esc_html( $trendy_blog_categories[0]->name ) . '</a>';
				}
        	?>
            <a class="card__content-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            
            <div class="card__content-info">
                
                <div class="info__time"><i class="far fa-clock"></i>
                    <p><?php echo esc_html( get_the_date() ); ?></p>
                </div>
                <div class="info__comment">
                    <i class="far fa-comment"></i>
                    <p><?php echo absint( get_comments_number( ) ); ?></p>
                </div>
            </div>
            
            <div class="card__content-description">
                <?php the_excerpt(); ?>
            </div>
            <br/>
            <div class="card__button">
            	<a href="<?php the_permalink(); ?>">
            		<?php echo esc_html('Read More', 'trendy-blog'); ?>		
            	</a>
            </div>
        </div>
    </div>
