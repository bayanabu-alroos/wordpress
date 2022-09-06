<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */
$class = has_post_thumbnail() ? 'has-post-thumbnail' : '';
$options = juju_blog_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <div class="most-read-post-wrapper">

    <?php if( has_post_thumbnail() ){ ?>

        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>');">
            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
        </div><!-- .featured-image -->

        <?php } ?>

        <div class="entry-container">

        <?php if ( $options['hide_category'] == false ): ?>

            <span class="cat-links">
                <ul class="post-categories">
                    <li><?php the_category(); ?></li>
                </ul><!-- .post-categories -->
            </span><!-- .cat-links -->

             <?php endif; ?>

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

             <?php if ( $options['hide_author'] == false ) { ?>
                
                <div class="entry-meta">
                <?php echo juju_blog_author( get_the_author_meta( 'ID' ) ); ?>
            </div>

             <?php } ?>

        </div><!-- .entry-container -->
    </div><!-- .most-read-post-wrapper -->
</article>