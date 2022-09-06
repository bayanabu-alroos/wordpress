<?php 
 /*
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Giddy Blog
 */
?>
<?php 
	$enable_video = giddy_blog_get_option( 'single_post_video_enable' );
	$enable_category     = giddy_blog_get_option( 'single_post_category_enable' );
    $enable_posted_on     = giddy_blog_get_option( 'single_post_posted_on_enable' );
    $enable_author     = giddy_blog_get_option( 'single_post_author_enable' );
    $enable_image     = giddy_blog_get_option( 'single_post_image_enable' );
    $enable_header_image     = giddy_blog_get_option( 'single_post_header_image_enable' );
 ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ($enable_header_image==false): ?>
		<header class="entry-header">
        <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
    </header>
	<?php endif ?>
	
	<?php
		if ( $enable_image==true ) { ?>
			<div class="featured-image">
		        <?php the_post_thumbnail( 'full', array( 'alt' => the_title_attribute( 'echo=0' ) ) ); ?>
			</div><!-- .featured-post-image -->
		<?php } ?>
	<div class="entry-content">
		<div class="entry-meta">
			<?php 
				if ($enable_author==true) :
					giddy_blog_author();
				endif;
				if ($enable_posted_on==true) :
					giddy_blog_posted_on();
				endif;   
			?>
		</div><!-- .entry-meta -->	
		
		<?php the_content(); ?>
		<?php 
			$video_url = get_post_meta( get_the_ID(), 'giddy-blog-video-url', true );
            if ( ! empty( $video_url ) && ($enable_video==true) ) { ?>
				<div class="featured-video">
		            <?php echo do_shortcode( '[video src="' . esc_url( $video_url ) . '"]' );?>
		        </div><!-- .featured-image -->
		    <?php } ?>
		    <?php if ($enable_category==true) :
				giddy_blog_entry_meta(); 
			endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'giddy-blog' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<?php giddy_blog_posts_tags(); ?>
	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
				edit_post_link(
					sprintf(
						/* translators: %s: Name of current post */
						esc_html__( 'Edit %s', 'giddy-blog' ),
						the_title( '<span class="screen-reader-text">"', '"</span>', false )
					),
					'<span class="edit-link">',
					'</span>'
				);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>	
</article><!-- #post-## -->