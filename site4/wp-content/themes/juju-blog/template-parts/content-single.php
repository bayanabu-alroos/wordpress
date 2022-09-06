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
$options = juju_blog_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear ' . $class ); ?>>

<?php if (has_post_thumbnail()): ?>
		<div class="featured-image">
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'large' ) ?>" alt="<?php the_title(); ?>"></a>
	</div>
<?php endif; ?>

	<div class="entry-container">
		<div class="entry-content">
			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'juju-blog' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'juju-blog' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
		</div><!-- .entry-container -->

		<div class="entry-meta">
			<?php if ( ! $options['single_post_hide_author'] ) :
			echo juju_blog_author( get_the_author_meta( 'ID' ) );
			endif; 

			if ( ! $options['single_post_hide_date'] ) :
				juju_blog_posted_on(); 
			endif; ?>

			<?php  
			juju_blog_single_categories();
			juju_blog_entry_footer();
			?>

		</div><!-- .entry-meta -->

</article><!-- #post-## -->