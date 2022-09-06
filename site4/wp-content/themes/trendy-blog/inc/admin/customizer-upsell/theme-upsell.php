<?php
/**
 * Footer settings
 * 
 * @since 1.1.0
 */

add_action( 'customize_register', 'trendy_blog_upsell_section_register', 10 );
/**
 * Add settings for upsell links
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function trendy_blog_upsell_section_register( $wp_customize ) {
	require get_template_directory() . '/inc/admin/customizer-upsell/upsell-section/upsell-button.php';
    require get_template_directory() . '/inc/admin/customizer-upsell/upsell-section/upsell-info.php';
    $wp_customize->register_section_type( 'Trendy_Blog_Upsell_Button' );
    /**
     * Add Upsell Button
     * 
     */
    $wp_customize->add_section(
		new Trendy_Blog_Upsell_Button( $wp_customize, 
            'upsell_button', [
                'button_text'   => esc_html__( 'View Premium', 'trendy-blog' ),
                'button_url'    => esc_url( '//blazethemes.com/theme/trendy-blog-pro/' ),
                'priority'      => 1
            ]
        )
	);
    
    /**
     * Add Upsell Button
     * 
     */
    $wp_customize->add_section(
        new Trendy_Blog_Upsell_Button( $wp_customize, 
            'demo_import_button', [
                'button_text'   => esc_html__( 'Go to Import', 'trendy-blog' ),
                'button_url'    => esc_url( admin_url('themes.php?page=trendy-blog-info.php') ),
                'title'         => esc_html__('Import Demo Data', 'trendy-blog'),
                'priority'  => 1000,
            ]
        )
    );

    // Upgrade infos
    $wp_customize->add_setting( 'social_icons_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'social_icons_upgrade_text', array(
        'section' => 'trendy_blog_social_section',
        'label' => esc_html__('For more social icons settings,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Unlimited social icons options', 'trendy-blog' ),
            esc_html__( 'Icons spacing options', 'trendy-blog' ),
            esc_html__( 'Icon color and hover color', 'trendy-blog' ),
            esc_html__( 'Icon background type, color and hover color', 'trendy-blog' ),
            esc_html__( 'Icon border with, radius and color', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'breadcrumbs_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'breadcrumbs_upgrade_text', array(
        'section' => 'trendy_blog_global_breadcrumb_section',
        'label' => esc_html__('For more breadcrumbs settings,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Prefix title label field', 'trendy-blog' ),
            esc_html__( 'Home title label field', 'trendy-blog' ),
            esc_html__( 'Search page title label field', 'trendy-blog' ),
            esc_html__( 'Error page title field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'sidebar_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'sidebar_upgrade_text', array(
        'section' => 'sidebars_section',
        'label' => esc_html__('For more sidebar options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Sidebar options for search page', 'trendy-blog' ),
            esc_html__( 'Sidebar options for error page', 'trendy-blog' ),
            esc_html__( 'Sidebar options in post meta', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'header_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'header_upgrade_text', array(
        'section' => 'trendy_blog_header_style_section',
        'label' => esc_html__('For more header layouts,', 'trendy-blog'),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'header_menu_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'header_menu_upgrade_text', array(
        'section' => 'trendy_blog_header_menu_option_section',
        'label' => esc_html__('For more menu settings,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Active menu color and background color', 'trendy-blog' ),
            esc_html__( 'Sub menu color and background color', 'trendy-blog' ),
            esc_html__( 'Menu border color and width', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    // Upgrade infos
    $wp_customize->add_setting( 'full_width_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'full_width_upgrade_text', array(
        'section' => 'frontpage_top_full_width_section',
        'label' => esc_html__('For more advanced options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'trendy-blog' ),
            esc_html__( '3 or more layouts in each block', 'trendy-blog' ),
            esc_html__( '25+ total layouts', 'trendy-blog' ),
            esc_html__( 'Carousel/Slider options', 'trendy-blog' ),
            esc_html__( 'Newsletter section', 'trendy-blog' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'trendy-blog' ),
            esc_html__( 'Read more button show/hide option with text field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'author_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'author_upgrade_text', array(
        'section' => 'frontpage_about_author_section',
        'label' => esc_html__('For more advanced options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Custom image fields for author', 'trendy-blog' ),
            esc_html__( 'Background color field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'posts_column_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'posts_column_upgrade_text', array(
        'section' => 'footer_three_column_section',
        'label' => esc_html__('For more advanced options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Column title text field', 'trendy-blog' ),
            esc_html__( 'Background color and text color field', 'trendy-blog' ),
            esc_html__( 'Width column options', 'trendy-blog' ),
            esc_html__( 'Show on frontpage, innerpages or both select field', 'trendy-blog' ),
            esc_html__( 'Padding top, right, bottom and left field for desktop and mobile', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'frontpage_middle_left_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'frontpage_middle_left_upgrade_text', array(
        'section' => 'frontpage_middle_left_content_section',
        'label' => esc_html__('For more advanced options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'trendy-blog' ),
            esc_html__( '3 or more layouts in each block', 'trendy-blog' ),
            esc_html__( '25+ total layouts', 'trendy-blog' ),
            esc_html__( 'Carousel/Slider options', 'trendy-blog' ),
            esc_html__( 'Newsletter section', 'trendy-blog' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'trendy-blog' ),
            esc_html__( 'Read more button show/hide option with text field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'frontpage_middle_right_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'frontpage_middle_right_upgrade_text', array(
        'section' => 'frontpage_middle_right_content_section',
        'label' => esc_html__('For more advanced options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'trendy-blog' ),
            esc_html__( '3 or more layouts in each block', 'trendy-blog' ),
            esc_html__( '25+ total layouts', 'trendy-blog' ),
            esc_html__( 'Carousel/Slider options', 'trendy-blog' ),
            esc_html__( 'Newsletter section', 'trendy-blog' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'trendy-blog' ),
            esc_html__( 'Read more button show/hide option with text field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'frontpage_bottom_full_width_woo_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'frontpage_bottom_full_width_woo_upgrade_text', array(
        'section' => 'frontpage_bottom_full_width_woocommerce_section',
        'label' => esc_html__('For more advanced options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'trendy-blog' ),
            esc_html__( '3 or more layouts in each block', 'trendy-blog' ),
            esc_html__( '25+ total layouts', 'trendy-blog' ),
            esc_html__( 'Carousel/Slider options', 'trendy-blog' ),
            esc_html__( 'Newsletter section', 'trendy-blog' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'trendy-blog' ),
            esc_html__( 'Read more button show/hide option with text field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'frontpage_bottom_full_width_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'frontpage_bottom_full_width_upgrade_text', array(
        'section' => 'frontpage_bottom_full_width_section',
        'label' => esc_html__('For more advanced options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Unlimited blocks - clone and add blocks', 'trendy-blog' ),
            esc_html__( '3 or more layouts in each block', 'trendy-blog' ),
            esc_html__( '25+ total layouts', 'trendy-blog' ),
            esc_html__( 'Carousel/Slider options', 'trendy-blog' ),
            esc_html__( 'Newsletter section', 'trendy-blog' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'trendy-blog' ),
            esc_html__( 'Read more button show/hide option with text field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'archive_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'archive_upgrade_text', array(
        'section' => 'innerpages_archive_page_section',
        'label' => esc_html__('For more options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Masonry post layout', 'trendy-blog' ),
            esc_html__( 'Ajax pagination type', 'trendy-blog' ),
            esc_html__( 'Content Length field', 'trendy-blog' ),
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'trendy-blog' ),
            esc_html__( 'Prefix for post meta date, comments, author', 'trendy-blog' ),
            esc_html__( 'Read more button show/hide option with text field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'single_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'single_upgrade_text', array(
        'section' => 'innerpages_single_page_section',
        'label' => esc_html__('For more options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Show/hide options for post meta date, comments, author, tags, categories', 'trendy-blog' ),
            esc_html__( 'Prefix for post meta date, comments, author', 'trendy-blog' ),
            esc_html__( 'Show/hide author box ', 'trendy-blog' ),
            esc_html__( 'Related posts title and post count options', 'trendy-blog' ),
            esc_html__( 'Related sort by tags or categories', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'footer_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'footer_upgrade_text', array(
        'section' => 'trendy_blog_footer_style_section',
        'label' => esc_html__('For more options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Footer column layouts', 'trendy-blog' ),
            esc_html__( 'Background Image field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'bottom_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'bottom_upgrade_text', array(
        'section' => 'trendy_blog_bottom_footer_content_section',
        'label' => esc_html__('For more options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Custom copyright WYSIWYG field', 'trendy-blog' )
        ),
        'priority' => 150
    )));

    $wp_customize->add_setting( 'category_colors_upgrade_text', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    
    $wp_customize->add_control(new Trendy_Blog_Upsell_Info_Control($wp_customize, 'category_colors_upgrade_text', array(
        'section' => 'colors',
        'label' => esc_html__('For more options,', 'trendy-blog'),
        'choices' => array(
            esc_html__( 'Category colors field', 'trendy-blog' )
        ),
        'priority' => 150
    )));
}

/**
 * Enqueue theme upsell controls scripts
 * 
 */
function trendy_blog_upsell_scripts() {
    wp_enqueue_style( 'trendy-blog-upsell', get_template_directory_uri() . '/inc/admin/customizer-upsell/upsell-section/upsell.css', array(), '1.0.0', 'all' );
    wp_enqueue_script( 'trendy-blog-upsell', get_template_directory_uri() . '/inc/admin/customizer-upsell/upsell-section/upsell.js', array(), '1.0.0', 'all' );
}
add_action( 'customize_controls_enqueue_scripts', 'trendy_blog_upsell_scripts' );