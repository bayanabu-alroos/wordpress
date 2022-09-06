<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

$options = vivid_blog_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>

    <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');">
            <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
        </div><!-- .featured-image -->
    <?php endif; ?>

    <div class="entry-container">
        <div class="entry-meta">
            <span class="cat-links">
                <?php echo vivid_blog_article_footer_meta(); ?>
            </span><!-- .cat-links -->
        </div><!-- .entry-meta -->

        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div>

        <div class="section-meta">
            <?php if ( ! $options['hide_date'] ) :
                vivid_blog_posted_on();
            endif;

            if ( ! $options['hide_author'] ) :
                echo vivid_blog_author();
            endif; ?>
        </div><!-- .entry-meta -->
    </div><!-- .entry-container -->

</article><!-- #post-## -->
