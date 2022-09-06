<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

$options = juju_blog_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear ' . $class ); ?>>

 <?php if (has_post_thumbnail()): ?>

    <div class="featured-image">
	<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'large' ) ?>" alt="<?php the_title(); ?>"></a>

	</div>

<?php endif; ?>

    <div class="post-wrapper">
    	<?php if ( juju_blog_is_frontpage() ) : ?>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->
		<?php endif; ?>
    	<div class="entry-container">
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'juju-blog' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'juju-blog' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div><!-- .entry-container -->
	</div><!-- .post-wrapper -->
</article><!-- #post-## -->
