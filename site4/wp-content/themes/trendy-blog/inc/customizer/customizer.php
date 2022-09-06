<?php
/**
 * Trendy Blog Theme Customizer
 *
 * @package Trendy Blog
 */
function trendy_blog_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_control( 'header_image' )->section = 'trendy_blog_header_style_section';
	$wp_customize->get_control( 'header_image' )->priority = 20;
	$wp_customize->get_section( 'title_tagline' )->panel = 'trendy_blog_site_identity_panel';
	$wp_customize->get_section( 'title_tagline' )->title = esc_html__( 'Logo & Site Icon', 'trendy-blog' );

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'trendy_blog_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'trendy_blog_customize_partial_blogdescription',
			)
		);
	}
	require get_template_directory() . '/inc/customizer/custom-controls/repeater/repeater.php';
	require get_template_directory() . '/inc/customizer/custom-controls/toggle-control/toggle-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/range-slider/range-slider.php';
	require get_template_directory() . '/inc/customizer/custom-controls/radio-image/radio-image.php';
	require get_template_directory() . '/inc/customizer/custom-controls/section-heading/section-heading.php';
	require get_template_directory() . '/inc/customizer/custom-controls/blocks-repeater/blocks-repeater.php';
	require get_template_directory() . '/inc/customizer/custom-controls/control-group-control/control-group-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/typography/typography.php';
	require get_template_directory() . '/inc/customizer/custom-controls/redirect-control/redirect-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/tab-control/tab-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/spacing-control/spacing-control.php';
	require get_template_directory() . '/inc/customizer/custom-controls/radio-tab/radio-tab.php';

	// register control type
	$wp_customize->register_control_type( 'Trendy_Blog_WP_Radio_Image_Control' );
	$wp_customize->register_control_type( 'Trendy_Blog_WP_Control_Group_Control' );
	$wp_customize->register_control_type( 'Trendy_Blog_WP_Typography_Control' );
	$wp_customize->register_control_type( 'Trendy_Blog_WP_Spacing_Control' );
	$wp_customize->register_control_type( 'Trendy_Blog_WP_Radio_Tab_Control' );

	/**
	 * Register "Site Identity Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'trendy_blog_site_identity_panel', array(
		'title' => esc_html__( 'Site Identity', 'trendy-blog' ),
		'priority' => 5
	));

	/**
	 * Register "Gloabl Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'trendy_blog_global_options_panel', array(
		'title' => esc_html__( 'Global Options', 'trendy-blog' ),
		'priority' => 10
	));

	/**
	 * Register "Footer Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'trendy_blog_header_options_panel', array(
		'title' => esc_html__( 'Header Options', 'trendy-blog' ),
		'priority' => 20
	));

	/**
	 * Register "Frontpage Sections" panel
	 * 
	 */
	$wp_customize->add_panel( 'trendy_blog_frontpage_sections_panel', array(
		'title' => esc_html__( 'Frontpage Sections', 'trendy-blog' ),
		'priority' => 30
	));

	/**
     * Frontpage Section Option
     * 
     */
    $wp_customize->add_setting( 'frontpage_sections_option', array(
		'default'           => true,
		'sanitize_callback' => 'trendy_blog_sanitize_toggle_control',
	));

	$wp_customize->add_control( 
		new Trendy_Blog_WP_Toggle_Control( $wp_customize, 'frontpage_sections_option', array(
			'label'	      => esc_html__( 'Show frontpage sections', 'trendy-blog' ),
			'description' => sprintf( esc_html__( 'Enabling this control will display all the frontpage sections theme provides hiding other home content. Disable this if you want default home template or if you are editing frontpage with Elementor. %1$1s Manage frontpage sections %2$2s click here %3$3s', 'trendy-blog' ), '<br/><br/>', '<a href="' .esc_url( admin_url( 'customize.php?autofocus[panel]=trendy_blog_frontpage_sections_panel' ) ). '">', '</a>' ),
			'section'     => 'static_front_page',
			'settings'    => 'frontpage_sections_option',
			'type'        => 'toggle',
			'priority'	  => 100
		))
	);

	/**
	 * Register "Innerpages Section" panel
	 * 
	 */
	$wp_customize->add_panel( 'trendy_blog_innerpages_settings_panel', array(
		'title' => esc_html__( 'Innerpages', 'trendy-blog' ),
		'priority' => 40
	));

	/**
	 * Register "Footer Options" panel
	 * 
	 */
	$wp_customize->add_panel( 'trendy_blog_footer_options_panel', array(
		'title' => esc_html__( 'Footer Options', 'trendy-blog' ),
		'priority' => 50
	));

	/**
	 * Theme Color
	 * 
	 */
	$wp_customize->add_setting( 'trendy_blog_theme_color', array(
		'default' => '#11d2ef',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'trendy_blog_theme_color', array(
			'label'      => esc_html__( 'Theme Color', 'trendy-blog' ),
			'section'    => 'colors',
			'settings'   => 'trendy_blog_theme_color'
		))
	);

	/**
	 * Theme Hover Color
	 * 
	 */
	$wp_customize->add_setting( 'trendy_blog_theme_hover_color', array(
		'default' => '#11d2ef',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	$wp_customize->add_control( 
		new WP_Customize_Color_Control( $wp_customize, 'trendy_blog_theme_hover_color', array(
			'label'      => esc_html__( 'Theme Hover Color', 'trendy-blog' ),
			'section'    => 'colors',
			'settings'   => 'trendy_blog_theme_hover_color'
		))
	);
}
add_action( 'customize_register', 'trendy_blog_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function trendy_blog_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function trendy_blog_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function trendy_blog_customize_preview_js() {
	wp_enqueue_script( 'trendy-blog-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), TRENDY_BLOG_VERSION, true );
}
add_action( 'customize_preview_init', 'trendy_blog_customize_preview_js' );

// include files
require get_template_directory() . '/inc/customizer/sanitize.php';
require get_template_directory() . '/inc/customizer/sections/site-identity.php';
require get_template_directory() . '/inc/customizer/sections/global-options.php';
require get_template_directory() . '/inc/customizer/sections/header-options.php';
require get_template_directory() . '/inc/customizer/sections/frontpage-sections.php';
require get_template_directory() . '/inc/customizer/sections/footer-options.php';
require get_template_directory() . '/inc/customizer/sections/sidebar-layouts.php';
require get_template_directory() . '/inc/customizer/sections/innerpages.php';
require get_template_directory() . '/inc/admin/customizer-upsell/theme-upsell.php';

if ( ! function_exists( 'trendy_blog_get_google_font_weight_html' ) ) :
    /**
     * get Google font weights html
     *
     * @since 1.0.0
     */
    function trendy_blog_get_google_font_weight_html() {
		$google_fonts_file = get_template_directory() . '/assets/lib/googleFonts.json';
		$google_fonts = array();
		if ( file_exists( $google_fonts_file ) ) {
            $google_fonts   = json_decode( file_get_contents( $google_fonts_file ), true );
		}
		$font_family = sanitize_text_field( wp_unslash( $_REQUEST['font_family'] ) );
		$font_weights = $google_fonts[$font_family]['variants']['normal'];

        $options_array = '';
        foreach ( $font_weights as $weight_key => $weight ) {
            $options_array .= '<option value="'.esc_attr( $weight_key ).'">'. esc_html( $weight_key ).'</option>';
        }
        echo wp_kses_post( $options_array );
        wp_die();
    }
endif;
add_action( "wp_ajax_trendy_blog_get_google_font_weight_html", "trendy_blog_get_google_font_weight_html" );