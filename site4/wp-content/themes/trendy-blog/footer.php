<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Trendy Blog
 */

?>
		</div><!-- .container -->
	</div><!-- #content -->
	<?php
		/**
		* hook - trendy_blog_before_footer_hook
		*
		* @hooked - trendy_blog_scroll_to_top
		*
		*/
		if( has_action( 'trendy_blog_before_footer_hook' ) ) {
			do_action( 'trendy_blog_before_footer_hook' );
		}

			if( get_theme_mod( 'footer_option', true ) ) :
				$footer_section_width = get_theme_mod( 'footer_section_width', 'boxed-width' );
				$footer_inner_classes = ( $footer_section_width === 'boxed-width' ) ? 'container' : 'container-fluid';
	?>
				<footer id="colophon" class="site-footer column-four">
					<div class="<?php echo esc_attr( $footer_inner_classes ); ?>">
						<div class="row">
							<?php
								get_template_part( '/footer-columns' );
							?>
						</div>
					</div>
				</footer><!-- #colophon -->
		<?php endif;

				if( get_theme_mod( 'bottom_footer_option', true ) ) :
		?>
					<div id="bottom-footer">
						<div class="copyright">
							<?php echo sprintf( esc_html__( 'Trendy Blog - Modern WordPress Theme. All Rights Reserved. %s.', 'trendy-blog' ), '<a href="https://blazethemes.com/theme/trendy-blog">' .esc_html( 'Blaze Themes' ). '</a>'  ); ?>
						</div><!-- .copyright -->
					</div><!-- #bottom-footer -->
	<?php
				endif;
		/**
		* hook - trendy_blog_after_footer_hook
		*
		* @hooked - trendy_blog_scroll_to_top
		*
		*/
		if( has_action( 'trendy_blog_after_footer_hook' ) ) {
			do_action( 'trendy_blog_after_footer_hook' );
		}
	?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
