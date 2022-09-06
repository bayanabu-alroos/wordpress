<?php
/**
 * Theme About Page
 *
 * @package lyna
 * @since 1.0
 */

function lyna_theme_page_admin_style( $hook ) {
	if ( 'appearance_page_lyna-theme' === $hook ) {
		// Register theme stylesheet.
		$theme_version = wp_get_theme()->get( 'Version' );

		$version_string = is_string( $theme_version ) ? $theme_version : false;
		wp_enqueue_style(
			'lyna-theme-admin-style',
			get_theme_file_uri( 'assets/css/about-admin.css' ),
			array(),
			$version_string
		);
	}
}
add_action( 'admin_enqueue_scripts', 'lyna_theme_page_admin_style' );

/**
 * Add theme page
 */
function lyna_menu() {
	add_theme_page( esc_html__( 'Lyna', 'lyna' ), esc_html__( 'Lyna', 'lyna' ), 'edit_theme_options', 'lyna-theme', 'lyna_theme_page_display' );
}
add_action( 'admin_menu', 'lyna_menu' );

/**
 * Display About page
 */
function lyna_theme_page_display() {
	$theme = wp_get_theme();
	
	if ( is_child_theme() ) {
		$theme = wp_get_theme()->parent();
	}
	?>
	
	<div id="welcome-panel" class="welcome-panel">
		<div class="welcome-panel-content">
			<div class="welcome-panel-header">
				<h2><?php echo esc_html( $theme->Name ); ?></h2>
				<p><?php esc_html_e( 'Free Full Site Editing WordPress Theme', 'lyna' ); ?></p>
			</div>
			
			<div class="welcome-panel-column-container">
				<div class="container-wrap">
					<div class="welcome-panel-column two-columns">
						<!-- <div class="welcome-panel-icon-pages"></div> -->
						<div class="welcome-panel-column-content">
							<h3><?php esc_html_e( 'Getting Started with Lyna!', 'lyna' ); ?></h3>
							<p><?php esc_html_e( 'Awesome! Lyna has been installed and activated successfully. Now, you can start building your dream website with a wide range of highly-customizable block patterns, templates, and template parts available in this astounding theme.', 'lyna' ); ?></p>
							<a target="_blank" href="https://catchthemes.com/themes/lyna/#theme-instructions"><?php esc_html_e( 'Theme documentation', 'lyna' ); ?></a>
						</div>
					</div>
					
					<div class="welcome-panel-column two-columns">
						<div class="welcome-panel-column-content">
							<h3><?php esc_html_e( 'More Features with Lyna Pro plugin', 'lyna' ); ?></h3>
							<p><?php esc_html_e( 'To get more beautiful block patterns and templates, we recommend you activate the Lyna Pro. With the pro theme installed, get more options, blocks, block patterns, templates and template parts.', 'lyna' ); ?></p>
							<a target="_blank" href="https://catchthemes.com/themes/lyna-pro"><?php esc_html_e( 'Buy Lyna Pro', 'lyna' ); ?></a>
						</div>
					</div>
				</div>
				<div class="sidebar">
					<div class="welcome-panel-column important-links">
					<!-- <div class="welcome-panel-icon-pages"></div> -->
					<div class="welcome-panel-column-content">
						<h3><?php esc_html_e( 'Important Links', 'lyna' ); ?></h3>
						<a target="_blank" href="<?php echo esc_url( $theme->get( 'ThemeURI' ) ); ?>"><?php esc_html_e( 'Theme Info', 'lyna' ); ?></a>
						<a target="_blank" href="https://fse.catchthemes.com/lyna"><?php esc_html_e( 'View Demo', 'lyna' ); ?></a>
						<a  target="_blank" href="<?php echo esc_url( $theme->get( 'ThemeURI' ) . '/#theme-instructions' ); ?>"><?php esc_html_e( 'Theme Instructions', 'lyna' ); ?></a>
						<a  target="_blank" href="<?php echo esc_url( $theme->get( 'ThemeURI' ) . '/#changelog' ); ?>"><?php esc_html_e( 'Change log', 'lyna' ); ?></a>
						<a target="_blank" href="<?php echo esc_url( 'https://catchthemes.com/support-forum/forum/full-site-editing/' ); ?>"><?php esc_html_e( 'Support', 'lyna' ); ?></a>
					</div>
				</div>
				
				<div class="welcome-panel-column review">
					<!-- <div class="welcome-panel-icon-pages"></div> -->
					<div class="welcome-panel-column-content">
						<h3><?php esc_html_e( 'Leave us a review', 'lyna' ); ?></h3>
						<p><?php esc_html_e( 'Loved Lyna? Feel free to leave your feedback. Your opinion helps us reach more audiences!', 'lyna' ); ?></p>
						<a href="https://wordpress.org/support/theme/lyna/reviews/" class="button button-primary button-hero" style="text-decoration: none;" target="_blank"><?php esc_html_e( 'Review', 'lyna' ); ?></a>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function lyna_main_screen() {
	if ( isset( $_GET['page'] ) && 'lyna-theme' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Instructions/Documentation', 'lyna' ); ?></h2>
				<p><?php esc_html_e( 'Thank you for installing the theme. Further, checkout our theme instructions/documentation to start building your website the way you want.', 'lyna' ) ?></p>
				<p><a href="https://catchthemes.com/themes/lyna/#theme-instructions" class="button button-primary"><?php esc_html_e( 'Support Forum', 'lyna' ); ?></a></p>
			</div>
			
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'lyna' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'lyna' ) ?></p>
				<p><a href="https://catchthemes.com/support-forum" class="button button-primary"><?php esc_html_e( 'Support Forum', 'lyna' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function lyna_import_demo() {
	if ( isset( $_GET['tab'] ) && 'import_demo' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap demo-import-wrap">
			<div class="feature-section one-col">
			<?php if ( class_exists( 'CatchThemesDemoImportPlugin' ) ) { ?>
				<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Import Demo', 'lyna' ); ?></h2>
					<p><?php esc_html_e( 'You can easily import the demo content using the Catch Themes Demo Import Plugin.', 'lyna' ) ?></p>
					<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=catch-themes-demo-import' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Import Demo', 'lyna' ); ?></a></p>
				</div>
				<?php } 
				else {
					$action = 'install-plugin';
					$slug   = 'catch-themes-demo-import';
					$install_url = wp_nonce_url(
						    add_query_arg(
						        array(
						            'action' => $action,
						            'plugin' => $slug
						        ),
						        admin_url( 'update.php' )
						    ),
						    $action . '_' . $slug
						); ?>
					<div class="col card">
					<h2 class="title"><?php esc_html_e( 'Install Catch Themes Demo Import Plugin', 'lyna' ); ?></h2>
					<p><?php esc_html_e( 'You can easily import the demo content using the Catch Themes Demo Import Plugin.', 'lyna' ) ?></p>
					<p><a href="<?php echo esc_url( $install_url ); ?>" class="button button-primary"><?php esc_html_e( 'Install Plugin', 'lyna' ); ?></a></p>
				</div>
				<?php } ?>
			</div>
		</div>
	<?php
	}
}
