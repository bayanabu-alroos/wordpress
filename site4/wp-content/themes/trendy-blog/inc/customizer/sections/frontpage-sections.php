<?php
/**
 * Frontpage Sections Settings
 * 
 * @package Elog Pro
 * @since 1.0.0
 */
add_action( 'customize_register', 'trendy_blog_customize_frontpage_sections_register', 10 );
/**
 * Add settings for frontpage top full width section in the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function trendy_blog_customize_frontpage_sections_register( $wp_customize ) {
    /**
     * Frontpage Top Full Width Section
     * 
     * panel - trendy_blog_frontpage_sections_panel
     */
    $wp_customize->add_section( 'frontpage_top_full_width_section', array(
      'title' => esc_html__( 'Frontpage Top Full Width', 'trendy-blog' ),
      'panel' => 'trendy_blog_frontpage_sections_panel'
    ));

    /**
     * Frontpage Top Banner Widget Heading Settings
     * 
     */
    $wp_customize->add_setting( 'frontpage_top_banner_widget_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'frontpage_top_banner_widget_settings', array(
            'label'	      => esc_html__( 'Top Full Width Section', 'trendy-blog' ),
            'section'     => 'frontpage_top_full_width_section',
            'settings'    => 'frontpage_top_banner_widget_settings',
            'type'        => 'section-heading',
        ))
    );
    
    $wp_customize->add_setting( 'frontpage_top_full_width_blocks', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'   => json_encode(array(
                array(
                    'name'      => 'banner-slider',
                    'option'    => true,
                    'category'  => '',
                    'count'     => 6,
                    'dateOption' => true,
                    'commentOption' => true
                )
            )
        )
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Blocks_Repeater_Control( $wp_customize, 'frontpage_top_full_width_blocks', array(
            'label'	      => esc_html__( 'Full Width Section Blocks', 'trendy-blog' ),
            'section'     => 'frontpage_top_full_width_section',
            'repeat'      => true,
            'settings'    => 'frontpage_top_full_width_blocks'
        ))
    );

    /**
     * Frontpage About Author Section
     * 
     * panel - trendy_blog_frontpage_sections_panel
     */
    $wp_customize->add_section( 'frontpage_about_author_section', array(
        'title' => esc_html__( 'About Author Section', 'trendy-blog' ),
        'panel' => 'trendy_blog_frontpage_sections_panel'
    ));

    /**
     * About Author Content Heading Settings
     * 
     */
    $wp_customize->add_setting( 'frontpage_about_author_widget_content_header_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'frontpage_about_author_widget_content_header_settings', array(
            'label'	      => esc_html__( 'Content', 'trendy-blog' ),
            'section'     => 'frontpage_about_author_section',
            'settings'    => 'frontpage_about_author_widget_content_header_settings',
            'type'        => 'section-heading',
        ))
    );

    /**
     * About Author Section Option
     * 
     */
    $wp_customize->add_setting( 'about_author_section_option', array(
        'default'         => true,
        'sanitize_callback' => 'trendy_blog_sanitize_toggle_control'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Toggle_Control( $wp_customize, 'about_author_section_option', array(
            'label'	      => esc_html__( 'Enable section', 'trendy-blog' ),
            'section'     => 'frontpage_about_author_section',
            'settings'    => 'about_author_section_option',
            'type'        => 'toggle'
        ))
    );

    /**
     * About Author Image One
     * 
     */
    $wp_customize->add_setting( 'frontpage_about_author_image_one', array(
        'default'   => esc_url( get_template_directory_uri() . '/assets/images/author-one.jpg' ),
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'frontpage_about_author_image_one',
            array(
                'label'      => __( 'Author Image One', 'trendy-blog' ),
                'section'    => 'frontpage_about_author_section',
                'settings'   => 'frontpage_about_author_image_one'
            )
        )
    );

    /**
     * About Author Image Two
     * 
     */
    $wp_customize->add_setting( 'frontpage_about_author_image_two', array(
        'default'   => esc_url( get_template_directory_uri() . '/assets/images/author.jpg' ),
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'frontpage_about_author_image_two',
            array(
                'label'      => __( 'Author Image Two', 'trendy-blog' ),
                'section'    => 'frontpage_about_author_section',
                'settings'   => 'frontpage_about_author_image_two'
            )
        )
    );

    /**
     * About Author Image Three
     * 
     */
    $wp_customize->add_setting( 'frontpage_about_author_image_three', array(
        'default'   => esc_url( get_template_directory_uri() . '/assets/images/author-two.jpg' ),
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'frontpage_about_author_image_three',
            array(
                'label'      => __( 'Author Image Three', 'trendy-blog' ),
                'section'    => 'frontpage_about_author_section',
                'settings'   => 'frontpage_about_author_image_three'
            )
        )
    );

    /**
     * About Author Title
     * 
     */
    $wp_customize->add_setting( 'frontpage_about_author_title', array(
        'default'        => esc_html__( 'Behind the blog', 'trendy-blog' ),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control( 'frontpage_about_author_title', array(
        'label'    => esc_html__( 'Title', 'trendy-blog' ),
        'section'  => 'frontpage_about_author_section',
        'type'     => 'text'
    ));

    /**
     * About Author Signature Image
     * 
     */
    $wp_customize->add_setting( 'frontpage_about_author_signature_image', array(
        'sanitize_callback' => 'esc_url_raw'
    ));
    $wp_customize->add_control( 
        new WP_Customize_Image_Control( $wp_customize, 'frontpage_about_author_signature_image',
            array(
                'label'      => __( 'Signature Image', 'trendy-blog' ),
                'section'    => 'frontpage_about_author_section',
                'settings'   => 'frontpage_about_author_signature_image'
            )
        )
    );

    /**
     * About Author Style Heading Settings
     * 
     */
    $wp_customize->add_setting( 'frontpage_about_author_widget_style_header_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'frontpage_about_author_widget_style_header_settings', array(
            'label'	      => esc_html__( 'Style', 'trendy-blog' ),
            'section'     => 'frontpage_about_author_section',
            'settings'    => 'frontpage_about_author_widget_style_header_settings',
            'type'        => 'section-heading',
        ))
    );

    /**
     * Frontpage About Author Color Settings
     * 
     */
    $wp_customize->add_setting( 'frontpage_about_author_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'frontpage_about_author_secondary_color', array( 'default' => '#1a1919',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( 
        new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'frontpage_about_author_color_group', array(
            'label'       => esc_html__( 'Colors', 'trendy-blog' ),
            'section'     => 'frontpage_about_author_section',
            'settings'    => array(
                'color' => 'frontpage_about_author_color',
                'secondary_color' => 'frontpage_about_author_secondary_color'
            )
        ))
    );

    /**
     * Frontpage Middle Left Content Section
     * 
     * panel - trendy_blog_frontpage_sections_panel
     */
    $wp_customize->add_section( 'frontpage_middle_left_content_section', array(
        'title' => esc_html__( 'Frontpage Middle Left Content', 'trendy-blog' ),
        'panel' => 'trendy_blog_frontpage_sections_panel'
    ));

    /**
     * Frontpage Middle Left Content Heading Settings
     * 
     */
    $wp_customize->add_setting( 'frontpage_middle_left_content_widget_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'frontpage_middle_left_content_widget_settings', array(
            'label'	      => esc_html__( 'Middle Left Content Section', 'trendy-blog' ),
            'description' => sprintf( esc_html__( 'Manage right sidebar content in widgets area "Frontpage Middle - Right Sidebar" %1$1s manage right sidebar %2$2s', 'trendy-blog' ), '<a target="blank" href="' .esc_url(admin_url( 'widgets.php' )). '">', '</a>' ),
            'section'     => 'frontpage_middle_left_content_section',
            'settings'    => 'frontpage_middle_left_content_widget_settings',
            'type'        => 'section-heading',
        ))
    );

    $wp_customize->add_setting( 'frontpage_middle_left_content_blocks', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'   => json_encode(array(
                array(
                    'name'      => 'posts-grid',
                    'option'    => true,
                    'blockTitle'=> esc_html__( 'Posts Grid', 'trendy-blog' ),
                    'category'  => '',
                    'count'     => 4,
                    'excerptOption'=> true,
                    'dateOption' => true,
                    'commentOption' => true,
                    'buttonOption'  => true
                ),
                array(
                    'name'      => 'categories-collection',
                    'option'    => true,
                    'blockTitle'=> esc_html__( 'Categories Collection', 'trendy-blog' ),
                    'categories'  => '[]',
                    'count'     => 4,
                    'countOption'   => true,
                    'titleOption'   => true
                )
            )
        )
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Blocks_Repeater_Control( $wp_customize, 'frontpage_middle_left_content_blocks', array(
            'label'	      => esc_html__( 'Middle Left Content Section Blocks', 'trendy-blog' ),
            'section'     => 'frontpage_middle_left_content_section',
            'repeat'      => true,
            'settings'    => 'frontpage_middle_left_content_blocks'
        ))
    );

    /**
     * Frontpage Middle Right Content Section
     * 
     * panel - trendy_blog_frontpage_sections_panel
     */
    $wp_customize->add_section( 'frontpage_middle_right_content_section', array(
        'title' => esc_html__( 'Frontpage Middle Right Content', 'trendy-blog' ),
        'panel' => 'trendy_blog_frontpage_sections_panel'
    ));

    /**
     * Frontpage Middle Right Content Heading Settings
     * 
     */
    $wp_customize->add_setting( 'frontpage_middle_right_content_widget_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'frontpage_middle_right_content_widget_settings', array(
            'label'	      => esc_html__( 'Middle Right Content Section', 'trendy-blog' ),
            'description' => sprintf( esc_html__( 'Manage left sidebar content in widgets area "Frontpage Middle - Left Sidebar" %1$1s manage left sidebar %2$2s', 'trendy-blog' ), '<a target="blank" href="' .esc_url(admin_url( 'widgets.php' )). '">', '</a>' ),
            'section'     => 'frontpage_middle_right_content_section',
            'settings'    => 'frontpage_middle_right_content_widget_settings',
            'type'        => 'section-heading',
        ))
    );

    $wp_customize->add_setting( 'frontpage_middle_right_content_blocks', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'   => json_encode(array(
                array(
                    'name'      => 'posts-list',
                    'option'    => false,
                    'blockTitle'=> esc_html__( 'Posts List', 'trendy-blog' ),
                    'category'  => '',
                    'count'     => 4,
                    'excerptOption'=> true,
                    'dateOption' => true,
                    'commentOption' => true,
                    'buttonOption'  => false
                ),
                array(
                    'name'      => 'categories-collection',
                    'option'    => false,
                    'blockTitle'=> esc_html__( 'Categories Collection', 'trendy-blog' ),
                    'categories'  => '[]',
                    'count'     => 4,
                    'countOption'   => true,
                    'titleOption'   => true
                )
            )
        )
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Blocks_Repeater_Control( $wp_customize, 'frontpage_middle_right_content_blocks', array(
            'label'	      => esc_html__( 'Middle Right Content Section Blocks', 'trendy-blog' ),
            'section'     => 'frontpage_middle_right_content_section',
            'repeat'      => true,
            'settings'    => 'frontpage_middle_right_content_blocks'
        ))
    );

    /**
     * Frontpage Bottom Full Width Woocommerce Section
     * 
     * panel - trendy_blog_frontpage_sections_panel
     */
    $wp_customize->add_section( 'frontpage_bottom_full_width_woocommerce_section', array(
        'title' => esc_html__( 'Frontpage Bottom Full Width Woocommerce Section', 'trendy-blog' ),
        'panel' => 'trendy_blog_frontpage_sections_panel'
    ));

    /**
     * Frontpage Bottom Full Width Woocoommerce Widget Heading Settings
     * 
     */
    $wp_customize->add_setting( 'frontpage_bottom_full_woocommerce_widget_heading_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'frontpage_bottom_full_woocommerce_widget_heading_settings', array(
            'label'	      => esc_html__( 'Woocommerce Blocks', 'trendy-blog' ),
            'section'     => 'frontpage_bottom_full_width_woocommerce_section',
            'settings'    => 'frontpage_bottom_full_woocommerce_widget_heading_settings',
            'type'        => 'section-heading'
        ))
    );
    
    $wp_customize->add_setting( 'frontpage_bottom_full_width_woocommerce_blocks', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'   => json_encode(array(
                array(
                    'name'      => 'woo-products',
                    'option'    => true,
                    'blockTitle'=> esc_html__( 'Latest Products', 'trendy-blog' ),
                    'productType' => 'latest',
                    'categories'  => '[]',
                    'count'     => 4
                )
            )
        )
    ));
    
    $wp_customize->add_control( 
        new Trendy_Blog_WP_Blocks_Repeater_Control( $wp_customize, 'frontpage_bottom_full_width_woocommerce_blocks', array(
            'label'	      => esc_html__( 'Woocommerce Blocks', 'trendy-blog' ),
            'repeat'      => false,  
            'section'     => 'frontpage_bottom_full_width_woocommerce_section',
            'settings'    => 'frontpage_bottom_full_width_woocommerce_blocks'
        ))
    );

    /**
     * Frontpage Bottom Full Width Section
     * 
     * panel - trendy_blog_frontpage_sections_panel
     */
    $wp_customize->add_section( 'frontpage_bottom_full_width_section', array(
        'title' => esc_html__( 'Frontpage Bottom Full Width', 'trendy-blog' ),
        'panel' => 'trendy_blog_frontpage_sections_panel'
    ));

    /**
     * Frontpage Bottom Full Width Widget Heading Settings
     * 
     */
    $wp_customize->add_setting( 'frontpage_bottom_full_widget_heading_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'frontpage_bottom_full_widget_heading_settings', array(
            'label'	      => esc_html__( 'Bottom Full Width Section', 'trendy-blog' ),
            'description' => esc_html__( 'Hold and drag vertically to re-order the blocks.', 'trendy-blog' ),
            'section'     => 'frontpage_bottom_full_width_section',
            'settings'    => 'frontpage_bottom_full_widget_heading_settings',
            'type'        => 'section-heading',
        ))
    );
    
    $wp_customize->add_setting( 'frontpage_bottom_full_width_blocks', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'   => json_encode(array(
                array(
                    'name'      => 'posts-list',
                    'option'    => false,
                    'blockTitle'=> esc_html__( 'Posts List', 'trendy-blog' ),
                    'category'  => '',
                    'count'     => 4,
                    'excerptOption'=> true,
                    'dateOption' => true,
                    'commentOption' => true,
                    'buttonOption'  => false
                ),
                array(
                    'name'      => 'posts-grid',
                    'option'    => true,
                    'blockTitle'=> esc_html__( 'Posts Grid', 'trendy-blog' ),
                    'category'  => '',
                    'count'     => 4,
                    'excerptOption'=> true,
                    'dateOption' => true,
                    'commentOption' => true,
                    'buttonOption'  => true
                )
            )
        )
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Blocks_Repeater_Control( $wp_customize, 'frontpage_bottom_full_width_blocks', array(
            'label'	      => esc_html__( 'Bottom Full Width Section Blocks', 'trendy-blog' ),
            'section'     => 'frontpage_bottom_full_width_section',
            'repeat'      => true,
            'settings'    => 'frontpage_bottom_full_width_blocks'
        ))
    );

    /**
     * Bottom Three Column Section
     * 
     * panel - trendy_blog_frontpage_sections_panel
     */
    $wp_customize->add_section( 'footer_three_column_section', array(
        'title' => esc_html__( 'Footer Three Column', 'trendy-blog' ),
        'panel' => 'trendy_blog_frontpage_sections_panel'
    ));

    /**
     * Bottom Three Column Heading Settings
     * 
     */
    $wp_customize->add_setting( 'footer_three_column_header_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'footer_three_column_header_settings', array(
            'label'	      => esc_html__( 'Footer Three Column Section', 'trendy-blog' ),
            'description' => esc_html__( 'Hold and drag vertically to re-order the blocks.', 'trendy-blog' ),
            'section'     => 'footer_three_column_section',
            'settings'    => 'footer_three_column_header_settings',
            'type'        => 'section-heading',
        ))
    );

    $wp_customize->add_setting( 'footer_three_column_blocks', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'   => json_encode(array(
                array(
                    'label'=> esc_html__( 'Column One', 'trendy-blog' ),
                    'name'      => 'posts-column',
                    'category'  => '',
                    'dateOption' => true,
                    'layout'    => 'one'
                ),
                array(
                    'label'=> esc_html__( 'Column Two', 'trendy-blog' ),
                    'name'      => 'posts-column',
                    'category'  => '',
                    'dateOption' => true,
                    'layout'    => 'two'
                ),
                array(
                    'label'=> esc_html__( 'Column Three', 'trendy-blog' ),
                    'name'      => 'posts-column',
                    'category'  => '',
                    'dateOption' => true,
                    'layout'    => 'three'
                )
            )
        )
    ));
    
    $wp_customize->add_control( 
        new Trendy_Blog_WP_Blocks_Repeater_Control( $wp_customize, 'footer_three_column_blocks', array(
            'label'	      => esc_html__( 'Footer Three Column Section', 'trendy-blog' ),
            'repeat'      => false,  
            'section'     => 'footer_three_column_section',
            'settings'    => 'footer_three_column_blocks'
        ))
    );
}