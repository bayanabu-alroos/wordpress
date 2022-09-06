<?php
/**
 * Header Options Section
 * 
 */
if( !function_exists( 'trendy_blog_customizer_header_options_section' ) ) :
    /**
     * Register header options settings
     * 
     */
    function trendy_blog_customizer_header_options_section( $wp_customize ) {
        /**
         * Content Section
         * 
         * panel - trendy_blog_header_options_panel
         */
        $wp_customize->add_section( 'trendy_blog_header_content_section', array(
            'title' => esc_html__( 'Content', 'trendy-blog' ),
            'panel' => 'trendy_blog_header_options_panel',
            'priority'  => 10,
        ));

        /**
         * Header Search Setting Heading
         * 
         */
        $wp_customize->add_setting( 'header_search_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'header_search_settings_header', array(
                'label'	      => esc_html__( 'Search Bar', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_content_section',
                'settings'    => 'header_search_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Search Option
         * 
         */
        $wp_customize->add_setting( 'header_search_option', array(
            'default'         => true,
            'sanitize_callback' => 'trendy_blog_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Toggle_Control( $wp_customize, 'header_search_option', array(
                'label'	      => esc_html__( 'Show search bar', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_content_section',
                'settings'    => 'header_search_option',
                'type'        => 'toggle',
            ))
        );

        /**
         * Header Search Toggle Font Settings
         * 
         */
        $wp_customize->add_setting( 'header_search_toggle_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'header_search_toggle_hover_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'header_search_toggle_color_group', array(
            'label'       => esc_html__( 'Search Icon Color', 'trendy-blog' ),
            'section'     => 'trendy_blog_header_content_section',
            'settings'    => array(
                'color'         => 'header_search_toggle_color',
                'hover_color'   => 'header_search_toggle_hover_color'
            )
            ))
        );

        /**
         * Header sidebar toggle bar setting heading
         * 
         */
        $wp_customize->add_setting( 'header_sidebar_toggle_bar_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'header_sidebar_toggle_bar_settings_header', array(
                'label'	      => esc_html__( 'Sidebar toggle', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_content_section',
                'settings'    => 'header_sidebar_toggle_bar_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Header Sidebar Toggle Bar Option
         * 
         */
        $wp_customize->add_setting( 'header_sidebar_toggle_bar_option', array(
            'default'         => true,
            'sanitize_callback' => 'trendy_blog_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Toggle_Control( $wp_customize, 'header_sidebar_toggle_bar_option', array(
                'label'	      => esc_html__( 'Show sidebar toggle bar', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_content_section',
                'settings'    => 'header_sidebar_toggle_bar_option',
                'type'        => 'toggle',
            ))
        );

        /**
         * Header Sidebar Toggle Font Settings
         * 
         */
        $wp_customize->add_setting( 'header_sidebar_toggle_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'header_sidebar_toggle_hover_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'header_sidebar_toggle_color_group', array(
            'label'       => esc_html__( 'Sidebar Toggle Color', 'trendy-blog' ),
            'section'     => 'trendy_blog_header_content_section',
            'settings'    => array(
                'color'         => 'header_sidebar_toggle_color',
                'hover_color'   => 'header_sidebar_toggle_hover_color'
            )
            ))
        );

        /**
         * Header social setting heading
         * 
         */
        $wp_customize->add_setting( 'header_social_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'header_social_settings_header', array(
                'label'	      => esc_html__( 'Social icons', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_content_section',
                'settings'    => 'header_social_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Header Social Icons Option
         * 
         */
        $wp_customize->add_setting( 'header_social_option', array(
            'default'         => true,
            'sanitize_callback' => 'trendy_blog_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Toggle_Control( $wp_customize, 'header_social_option', array(
                'label'	      => esc_html__( 'Show social icons', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_content_section',
                'settings'    => 'header_social_option',
                'type'        => 'toggle',
            ))
        );

        /**
         * Redirect widgets link
         * 
         */
        $wp_customize->add_setting( 'header_social_icons_redirects', array(
            'sanitize_callback' => 'trendy_blog_sanitize_toggle_control',
        ));
    
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Redirect_Control( $wp_customize, 'header_social_icons_redirects', array(
                'section'     => 'trendy_blog_header_content_section',
                'settings'    => 'header_social_icons_redirects',
                'choices'     => array(
                    'footer-column-one' => array(
                        'type'  => 'section',
                        'id'    => 'trendy_blog_social_section',
                        'label' => esc_html__( 'Manage social icons', 'trendy-blog' )
                    )
                )
            ))
        );

        /**
         * Style Section
         * 
         * panel - trendy_blog_theme_panel
         */
        $wp_customize->add_section( 'trendy_blog_header_style_section', array(
            'title' => esc_html__( 'Style', 'trendy-blog' ),
            'panel' => 'trendy_blog_header_options_panel',
            'priority'  => 20,
        ));

        /**
         * Header Style Heading
         * 
         */
        $wp_customize->add_setting( 'header_style_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
    

        $wp_customize->add_control( 
            new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'header_style_settings_header', array(
                'label'	      => esc_html__( 'Style Setting', 'trendy-blog' ),
                'priority' => 10,
                'section'     => 'trendy_blog_header_style_section',
                'settings'    => 'header_style_settings_header',
                'type'        => 'section-heading',
            ))
        );

        /**
         * Header bottom box shadow
         * 
         */
        $wp_customize->add_setting( 'header_bottom_box_shadow', array(
            'default' => 'show',
            'sanitize_callback' => 'trendy_blog_sanitize_select'
        ));
        
        $wp_customize->add_control( 'header_bottom_box_shadow', array(
            'type'      => 'select',
            'section'   => 'trendy_blog_header_style_section',
            'label'     => __( 'Bottom box shadow', 'trendy-blog' ),
            'choices'   => array(
                'show' => esc_html__( 'Show', 'trendy-blog' ),
                'hide' => esc_html__( 'Hide', 'trendy-blog' )
            ),
        ));

        /**
         * Header Background Settings
         * 
         */
        $wp_customize->add_setting( 'header_bg_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'header_bg_group', array(
            'label'       => esc_html__( 'Background', 'trendy-blog' ),
            'descrition'  => esc_html__( 'Manage background', 'trendy-blog' ),
            'section'     => 'trendy_blog_header_style_section',
            'settings'    => array(
                'color' => 'header_bg_color'
            )
            ))
        );

        /**
         * Menu Options Section
         * 
         * panel - trendy_blog_header_options_panel
         */
        $wp_customize->add_section( 'trendy_blog_header_menu_option_section', array(
            'title' => esc_html__( 'Menu Options', 'trendy-blog' ),
            'panel' => 'trendy_blog_header_options_panel',
            'priority'  => 30,
        ));

        /**
         * Header menu hover effect
         * 
         */
        $wp_customize->add_setting( 'header_menu_hover_effect', array(
            'default' => 'default',
            'sanitize_callback' => 'trendy_blog_sanitize_select'
        ));
        
        $wp_customize->add_control( 'header_menu_hover_effect', array(
            'type'      => 'select',
            'section'   => 'trendy_blog_header_menu_option_section',
            'label'     => __( 'Menu hover effect', 'trendy-blog' ),
            'choices'   => array(
                'default' => esc_html__( 'Default', 'trendy-blog' ),
                'none' => esc_html__( 'None', 'trendy-blog' )
            ),
        ));

        /**
         * Header Menu Responsive Tab
         * 
         */
        $wp_customize->add_setting( 'header_menu_responsive_tabs_settings_header', array(
            'default'           => 'desktop',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Tab_Control( $wp_customize, 'header_menu_responsive_tabs_settings_header', array(
                'section'     => 'trendy_blog_header_menu_option_section',
                'settings'    => 'header_menu_responsive_tabs_settings_header',
                'choices'   => array(
                    array(
                        'label' => esc_html__( 'Desktop', 'trendy-blog' ),
                        'controls_hide' => array(
                            'responsive_header_menu_toggle_button_colors_settings_header',
                            'header_menu_mobile_toggle_button_color',
                            'header_menu_mobile_toggle_button_background_color'
                        ),
                        'controls' => array(
                            'header_menu_colors_settings_header',
                            'header_menu_background_color_group',
                            'header_menu_font_color_group',
                            'header_sub_menu_colors_settings_header',
                            'header_active_menu_colors_settings_header',
                            'header_menu_border_settings_header',
                            'header_menu_border_top_group',
                            'header_menu_border_bottom_group',
                            'header_menu_typo_settings_header',
                            'header_menu_typography'
                        )
                    ),
                    array(
                        'label' => esc_html__( 'Mobile', 'trendy-blog' ),
                        'controls' => array(
                            'responsive_header_menu_toggle_button_colors_settings_header',
                            'header_menu_mobile_toggle_button_color',
                            'header_menu_mobile_toggle_button_background_color'
                        ),
                        'controls_hide' => array(
                            'header_menu_colors_settings_header',
                            'header_menu_background_color_group',
                            'header_menu_font_color_group',
                            'header_sub_menu_colors_settings_header',
                            'header_active_menu_colors_settings_header',
                            'header_menu_border_settings_header',
                            'header_menu_border_top_group',
                            'header_menu_border_bottom_group',
                            'header_menu_typo_settings_header',
                            'header_menu_typography'
                        )
                    )
                ),
                'priority'    => 30
            ))
        );

        /**
         * Responsive Header Menu Toggle Button Colors Heading
         * 
         */
        $wp_customize->add_setting( 'responsive_header_menu_toggle_button_colors_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'responsive_header_menu_toggle_button_colors_settings_header', array(
                'label'	      => esc_html__( 'Toggle Button Colors', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_menu_option_section',
                'settings'    => 'responsive_header_menu_toggle_button_colors_settings_header',
                'type'        => 'section-heading',
                'active_callback'   => function() { return false; },
                'priority'    => 35
            ))
        );

        /**
         * Toggle Button Color
         * 
         */
        $wp_customize->add_setting( 'header_menu_mobile_toggle_button_color', array(
            'default' => '#000000',
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
    
        $wp_customize->add_control( 
            new WP_Customize_Color_Control( $wp_customize, 'header_menu_mobile_toggle_button_color', array(
                'label'      => esc_html__( 'Color', 'trendy-blog' ),
                'section'    => 'trendy_blog_header_menu_option_section',
                'settings'   => 'header_menu_mobile_toggle_button_color',
                'active_callback'   => function() { return false; },
                'priority'    => 35
            ))
        );

        /**
         * Button Background color
         * 
         */
        $wp_customize->add_setting( 'header_menu_mobile_toggle_button_background_color', array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
    
        $wp_customize->add_control( 
            new WP_Customize_Color_Control( $wp_customize, 'header_menu_mobile_toggle_button_background_color', array(
                'label'      => esc_html__( 'Background Color', 'trendy-blog' ),
                'section'    => 'trendy_blog_header_menu_option_section',
                'settings'   => 'header_menu_mobile_toggle_button_background_color',
                'active_callback'   => function() { return false; },
                'priority'    => 35
            ))
        );

        /**
         * Header Menu Colors Heading
         * 
         */
        $wp_customize->add_setting( 'header_menu_colors_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'header_menu_colors_settings_header', array(
                'label'	      => esc_html__( 'Colors', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_menu_option_section',
                'settings'    => 'header_menu_colors_settings_header',
                'type'        => 'section-heading',
                'priority'    => 35
            ))
        );

        /**
         * Header Menu Background Settings
         * 
         */
        $wp_customize->add_setting( 'header_menu_background_type', array( 'default' => 'solid',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_setting( 'header_menu_background_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'header_menu_background_hover_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'header_menu_background_color_group', array(
            'label'       => esc_html__( 'Background Color', 'trendy-blog' ),
            'section'     => 'trendy_blog_header_menu_option_section',
            'settings'    => array(
                'background_type'=> 'header_menu_background_type',
                'color'         => 'header_menu_background_color',
                'hover_color'   => 'header_menu_background_hover_color'
            ),
            'priority'  => 40
            ))
        );

        /**
         * Header Menu Font Settings
         * 
         */
        $wp_customize->add_setting( 'header_menu_font_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_setting( 'header_menu_font_hover_color', array( 'default' => '#f9f9f9',  'sanitize_callback' => 'sanitize_hex_color' ) );
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'header_menu_font_color_group', array(
            'label'       => esc_html__( 'Font Color', 'trendy-blog' ),
            'section'     => 'trendy_blog_header_menu_option_section',
            'settings'    => array(
                'color'         => 'header_menu_font_color',
                'hover_color'   => 'header_menu_font_hover_color'
            ),
            'priority'  => 40
            ))
        );

        /**
         * Header Menu Borders Heading
         * 
         */
        $wp_customize->add_setting( 'header_menu_border_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'header_menu_border_settings_header', array(
                'label'	      => esc_html__( 'Borders', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_menu_option_section',
                'settings'    => 'header_menu_border_settings_header',
                'type'        => 'section-heading',
                'priority'    => 45
            ))
        );

        /**
         * Header Menu Border Top Settings
         * 
         */
        $wp_customize->add_setting( 'header_menu_border_top', array( 'default' => 'hide',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'header_menu_border_top_group', array(
            'label'       => esc_html__( 'Border Top', 'trendy-blog' ),
            'section'     => 'trendy_blog_header_menu_option_section',
            'settings'    => array(
                'border'        => 'header_menu_border_top'
            ),
            'priority'  => 45
            ))
        );

        /**
         * Header Menu Border Bottom Settings
         * 
         */
        $wp_customize->add_setting( 'header_menu_border_bottom', array( 'default' => 'hide',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'header_menu_border_bottom_group', array(
            'label'       => esc_html__( 'Border Bottom', 'trendy-blog' ),
            'section'     => 'trendy_blog_header_menu_option_section',
            'settings'    => array(
                'border'        => 'header_menu_border_bottom'
            ),
            'priority'  => 45
            ))
        );
        
        /**
         * Header Menu Typography Heading
         * 
         */
        $wp_customize->add_setting( 'header_menu_typo_settings_header', array(
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control( 
            new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'header_menu_typo_settings_header', array(
                'label'	      => esc_html__( 'Typography ', 'trendy-blog' ),
                'section'     => 'trendy_blog_header_menu_option_section',
                'settings'    => 'header_menu_typo_settings_header',
                'type'        => 'section-heading',
                'priority'    => 110
            ))
        );

        // Add the `header text` typography settings.
        $wp_customize->add_setting( 'header_menu_font_family', array( 'default' => 'DM Sans',  'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_setting( 'header_menu_font_weight', array( 'default' => '700',    'sanitize_callback' => 'absint' ) );
        $wp_customize->add_setting( 'header_menu_font_style',  array( 'default' => 'normal', 'sanitize_callback' => 'sanitize_key') );
        $wp_customize->add_setting( 'header_menu_font_size',   array( 'default' => '15',     'sanitize_callback' => 'absint' ) );

        // Add the `menu` typography control.
        $wp_customize->add_control(
            new Trendy_Blog_WP_Typography_Control( $wp_customize, 'header_menu_typography',
                array(
                    'label' => __( 'Typography', 'trendy-blog' ),
                    'section'     => 'trendy_blog_header_menu_option_section',
                    'initial'     => true,
                    'settings'    => array(
                        'family'      => 'header_menu_font_family',
                        'weight'      => 'header_menu_font_weight',
                        'style'       => 'header_menu_font_style',
                        'size'        => 'header_menu_font_size'
                    ),
                    'priority'  => 120
                )
            )
        );
    }
    add_action( 'customize_register', 'trendy_blog_customizer_header_options_section', 10 );
endif;