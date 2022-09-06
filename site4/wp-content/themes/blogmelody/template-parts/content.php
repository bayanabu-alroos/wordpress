<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BlogMelody
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'grid-item' ); ?>>
	<div class="post-item">
			
    	<?php if ( has_post_thumbnail() ) { ?>
			<figure class="featured-image" style="background-image: url('<?php the_post_thumbnail_url();?>');">
                <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
            </figure><!-- .featured-image -->
		<?php }?>

		<div class="entry-container">
			<header class="entry-header">
				<div class="entry-meta">
					<?php blogmelody_entry_meta(); ?>
				</div><!-- .entry-meta -->
				
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-meta posted-on">
				<?php blogmelody_posted_on(); ?>
			</div><!-- .entry-meta -->
			<div class="entry-content">
				<?php the_excerpt(); ?>
			</div><!-- .entry-content -->
			<?php $latest_readmore_text = blogmelody_get_option( 'latest_readmore_text' );
	        if (!empty ($latest_readmore_text)) { ?>
	          <div class="latest-read-more"><a href="<?php the_permalink();?>" class="btn"><?php echo esc_html($latest_readmore_text);?></a> </div>
        <?php } ?>
		</div><!-- .entry-container -->
		
	</div><!-- .post-item -->
</article><!-- #post-## -->
