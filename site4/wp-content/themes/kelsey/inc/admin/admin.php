<?php
/**
 * Admin functions.
 *
 * @package Kelsey
 */

add_action( 'admin_menu', 'kelsey_admin_menu_page' );

/**
 * Register admin page.
 *
 * @since 1.0.0
 */
function kelsey_admin_menu_page() {

	$theme = wp_get_theme( get_template() );

	add_theme_page(
		$theme->display( 'Name' ),
		$theme->display( 'Name' ),
		'manage_options',
		'kelsey',
		'kelsey_do_admin_page'
	);

}

/**
 * Render admin page.
 *
 * @since 1.0.0
 */
function kelsey_do_admin_page() {

	$theme = wp_get_theme( get_template() );
	?>
	<div class="wrap about-wrap">
		<h1><?php echo $theme->display( 'Name' ); ?></h1>
		<div class="two-col">

			<div class="col about-text">
				<?php
					$description_raw = $theme->display( 'Description' );
					$main_description = explode( 'Official', $description_raw );
					?>
				<?php echo wp_kses_post( $main_description[0] ); ?>
				<p><?php esc_html_e( 'Version', 'kelsey' ); ?>:&nbsp;<?php echo esc_html( $theme->display( 'Version' ) ); ?></p>
			</div><!-- .col -->

			<div class="col about-img">
				<a href="<?php echo esc_url( $theme->display( 'ThemeURI' ) ); ?>" target="_blank"><img src="<?php echo trailingslashit( get_template_directory_uri() ); ?>screenshot.png" alt="<?php echo esc_attr( $theme->display( 'Name' ) ); ?>" /></a>
			</div><!-- .col -->

		</div><!-- .two-col -->
		<div class="four-col">

			<div class="col">

				<h3><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Upgrade to Pro', 'kelsey' ); ?></h3>

				<p>
					<?php esc_html_e( 'To get more beautiful block patterns and templates, we recommend you to Upgrade to Kelsey Pro', 'kelsey' ); ?>
				</p>

				<p>
					<a class="button green button-primary" href="<?php echo esc_url( 'https://wenthemes.com/item/wordpress-themes/kelsey-pro/' ); ?>" target="_blank"><?php esc_html_e( 'Upgrade to Pro', 'kelsey' ); ?></a>
				</p>

			</div><!-- .col -->

			<div class="col">

				<h3><i class="dashicons dashicons-admin-customizer"></i><?php esc_html_e( 'Full Site Editing', 'kelsey' ); ?></h3>

				<p>
					<?php esc_html_e( 'We have used Full Site Editing which will help you preview your changes live and fast.', 'kelsey' ); ?>
				</p>

				<p>
					<a class="button button-primary" href="<?php echo esc_url( admin_url( 'site-editor.php' ) ); ?>" ><?php esc_html_e( 'Use Site Editor', 'kelsey' ); ?></a>
				</p>

			</div><!-- .col -->

			<div class="col">

				<h3><i class="dashicons dashicons-book-alt"></i><?php esc_html_e( 'Theme Instructions', 'kelsey' ); ?></h3>
				<p>
					<?php esc_html_e( 'We have prepared detailed theme instructions which will help you to customize theme as you prefer.', 'kelsey' ); ?>
				</p>

				<p>
					<a class="button button-primary" href="<?php echo esc_url( 'https://themepalace.com/instructions/themes/kelsey/' ); ?>" target="_blank"><?php esc_html_e( 'Documentation', 'kelsey' ); ?></a>
				</p>

			</div><!-- .col -->


			<div class="col">

				<h3><i class="dashicons dashicons-sos"></i><?php esc_html_e( 'Help &amp; Support', 'kelsey' ); ?></h3>

				<p>
					<?php esc_html_e( 'If you have any question/feedback regarding theme, please post in our official support forum.', 'kelsey' ); ?>
				</p>

				<p>
					<a class="button button-primary" href="<?php echo esc_url( 'https://themepalace.com/forum/free-themes/kelsey/' ); ?>" target="_blank"><?php esc_html_e( 'Get Support', 'kelsey' ); ?></a>
				</p>

			</div><!-- .col -->

		</div><!-- .four-col -->


	</div><!-- .wrap -->
	<?php

}

/**
 * Load admin scripts.
 *
 * @since 1.0.0
 *
 * @param string $hook Current page hook.
 */
function kelsey_load_admin_scripts( $hook ) {

	if ( 'appearance_page_kelsey' === $hook ) {

		$min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_style( 'kelsey-admin', get_template_directory_uri() . '/assets/css/admin' . $min . '.css', false, '2.1.0' );

	}

}

add_action( 'admin_enqueue_scripts', 'kelsey_load_admin_scripts' );
