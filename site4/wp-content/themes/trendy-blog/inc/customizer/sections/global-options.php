<?php
/**
 * Gloabl Options Section
 * 
 */
if( !function_exists( 'trendy_blog_customizer_global_options_section' ) ) :
    /**
     * Register global options settings
     * 
     */
    function trendy_blog_customizer_global_options_section( $wp_customize ) {
      /**
       * Sticky header section
       * 
       * panel - trendy_blog_global_options_panel
       */
      $wp_customize->add_section( 'trendy_blog_global_sticky_header_section', array(
        'title' => esc_html__( 'Sticky Header', 'trendy-blog' ),
        'panel' => 'trendy_blog_global_options_panel',
        'priority'  => 5,
      ));

      /**
       * Sticky sidebar Option
       * 
       */
      $wp_customize->add_setting( 'sticky_header_option', array(
        'default'         => false,
        'sanitize_callback' => 'trendy_blog_sanitize_toggle_control'
      ));

      $wp_customize->add_control( 
          new Trendy_Blog_WP_Toggle_Control( $wp_customize, 'sticky_header_option', array(
              'label'	      => esc_html__( 'Enable sticky header', 'trendy-blog' ),
              'section'     => 'trendy_blog_global_sticky_header_section',
              'settings'    => 'sticky_header_option',
              'type'        => 'toggle'
          ))
      );

      /**
       * Social Section
       * 
       * panel - trendy_blog_global_options_panel
       */
      $wp_customize->add_section( 'trendy_blog_social_section', array(
          'title' => esc_html__( 'Social', 'trendy-blog' ),
          'panel' => 'trendy_blog_global_options_panel',
          'priority'  => 10,
      ));

      /**
       * Global Social Setting Heading
       * 
       */
      $wp_customize->add_setting( 'global_social_settings_header', array(
        'sanitize_callback' => 'sanitize_text_field'
      ));
      
      $wp_customize->add_control( 
          new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'global_social_settings_header', array(
              'label'	      => esc_html__( 'Social Setting', 'trendy-blog' ),
              'section'     => 'trendy_blog_social_section',
              'settings'    => 'global_social_settings_header',
              'type'        => 'section-heading',
          ))
      );

      /**
       * Social Icons Settings
       * 
       */
      $wp_customize->add_setting( 'social_icons', array(
          'sanitize_callback' => 'trendy_blog_sanitize_repeater_control',
          'default' => json_encode(array(
            array(
              'icon_value'  => 'fab fa-facebook-square',
              'link'        => '#',
              'checkbox'    => true
            ),
            array(
              'icon_value'  => 'fab fa-instagram',
              'link'        => '#',
              'checkbox'    => true
            ),
            array(
              'icon_value'  => 'fab fa-twitter',
              'link'        => '#',
              'checkbox'    => true
            ),
            array(
              'icon_value'  => 'fab fa-vimeo',
              'link'        => '#',
              'checkbox'    => true
            )
          ))
      ));
      $wp_customize->add_control( 
        new Trendy_Blog_WP_Repeater_Control( $wp_customize, 'social_icons', array(
          'label'   => esc_html__( 'Social Icons', 'trendy-blog' ),
          'section' => 'trendy_blog_social_section',
          'customizer_repeater_icon_control'  => true,
          'customizer_repeater_link_control'  => true,
          'customizer_repeater_checkbox_control' => true
        ))
      );
      
      /**
       * Global Container Section
       * 
       * panel - trendy_blog_global_options_panel
       */
      $wp_customize->add_section( 'trendy_blog_global_container_section', array(
        'title' => esc_html__( 'Container', 'trendy-blog' ),
        'panel' => 'trendy_blog_global_options_panel',
        'priority'  => 30
      ));

      /**
       * Scroll To Top Style Setting Heading
       * 
       */
      $wp_customize->add_setting( 'global_sttop_style_settings_header', array(
        'sanitize_callback' => 'sanitize_text_field'
      ));
      $wp_customize->add_control( 
          new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'global_sttop_style_settings_header', array(
              'label'	      => esc_html__( 'Style ', 'trendy-blog' ),
              'section'     => 'trendy_blog_scroll_top_section',
              'settings'    => 'global_sttop_style_settings_header',
              'type'        => 'section-heading',
          ))
      );

      /**
       * Container Width Setting
       * 
       */
      $wp_customize->add_setting( 'trendy_blog_global_container_width', array(
        'sanitize_callback' => 'trendy_blog_sanitize_number_range',
        'default'           => 1300
      ));
      $wp_customize->add_control( 
          new Trendy_Blog_Range_Slider_Control( $wp_customize, 'trendy_blog_global_container_width', array(
              'label'	      => esc_html__( 'Container width (px)', 'trendy-blog' ),
              'section'     => 'trendy_blog_global_container_section',
              'settings'    => 'trendy_blog_global_container_width',
              'unit'        => 'px',
              'input_attrs' => array(
                'max'         => 1900,
                'min'         => 780,
                'step'        => 1
              )
          ))
      );

      /**
       * Sidebar Width Setting
       * 
       */
      $wp_customize->add_setting( 'trendy_blog_global_container_sidebar_width', array(
        'sanitize_callback' => 'trendy_blog_sanitize_number_range',
        'default'           => 25
      ));
      $wp_customize->add_control( 
          new Trendy_Blog_Range_Slider_Control( $wp_customize, 'trendy_blog_global_container_sidebar_width', array(
              'label'	      => esc_html__( 'Sidebar width (%)', 'trendy-blog' ),
              'section'     => 'trendy_blog_global_container_section',
              'settings'    => 'trendy_blog_global_container_sidebar_width',
              'unit'        => '%',
              'input_attrs' => array(
                'max'         => 50,
                'min'         => 20,
                'step'        => 1
              )
          ))
      );

      /**
       * Global Buttons Section
       * 
       * panel - trendy_blog_global_options_panel
       */
      $wp_customize->add_section( 'trendy_blog_global_button_section', array(
        'title' => esc_html__( 'Buttons', 'trendy-blog' ),
        'panel' => 'trendy_blog_global_options_panel',
        'priority'  => 35
      ));
      
      /**
       * Read more button setting header
       * 
       */
      $wp_customize->add_setting( 'trendy_blog_global_button_layout_header', array(
        'sanitize_callback' => 'sanitize_text_field'
      ));
      $wp_customize->add_control( 
          new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'trendy_blog_global_button_layout_header', array(
              'label'	      => esc_html__( 'Layouts', 'trendy-blog' ),
              'section'     => 'trendy_blog_global_button_section',
              'settings'    => 'trendy_blog_global_button_layout_header',
              'type'        => 'section-heading',
          ))
      );

      /**
       * Global buttons layouts settings
       * 
       */
      $wp_customize->add_setting( 'trendy_blog_global_button_layout',
          array(
              'default'           => 'one',
              'sanitize_callback' => 'sanitize_text_field',
          )
      );

      $wp_customize->add_control( new Trendy_Blog_WP_Radio_Image_Control(
          $wp_customize,
          'trendy_blog_global_button_layout',
          array(
              'section'   => 'trendy_blog_global_button_section',
              'choices'   => array(
                  'one' => array(
                      'label'   => esc_html__( 'Layout One', 'trendy-blog' ),
                      'url'     => '%s/assets/images/customizer/button-one.jpg'
                  ),
                  'two' => array(
                      'label'   => esc_html__( 'Layout Two', 'trendy-blog' ),
                      'url'     => '%s/assets/images/customizer/button-two.jpg'
                  )
              )
          )
        )
      );
      /**
       * Breadcrumb Section
       * 
       * panel - trendy_blog_theme_panel
       */
      $wp_customize->add_section( 'trendy_blog_global_breadcrumb_section', array(
        'title' => esc_html__( 'Breadcrumb', 'trendy-blog' ),
        'panel' => 'trendy_blog_global_options_panel',
        'priority'  => 50,
    ));
    
    /**
     * Breadcrumb Show Hide
     * 
     */
    $wp_customize->add_setting( 'breadcrumb_option', array(
      'default'         => true,
      'sanitize_callback' => 'trendy_blog_sanitize_toggle_control',
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Toggle_Control( $wp_customize, 'breadcrumb_option', array(
          'label'         => esc_html__( 'Show/Hide Breadcrumb', 'trendy-blog' ),
          'section'     => 'trendy_blog_global_breadcrumb_section',
          'settings'    => 'breadcrumb_option',
          'type'        => 'toggle'
      ))
    );
    
    /**
     * Sticky sidebar Section
     * 
     * panel - trendy_blog_global_options_panel
     */
    $wp_customize->add_section( 'trendy_blog_global_sticky_sidebar_section', array(
      'title' => esc_html__( 'Sticky Sidebar', 'trendy-blog' ),
      'panel' => 'trendy_blog_global_options_panel',
      'priority'  => 100,
    ));

    /**
     * Sticky sidebar Option
     * 
     */
    $wp_customize->add_setting( 'sticky_sidebars_option', array(
      'default'         => true,
      'sanitize_callback' => 'trendy_blog_sanitize_toggle_control'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Toggle_Control( $wp_customize, 'sticky_sidebars_option', array(
            'label'	      => esc_html__( 'Enable sticky sidebars', 'trendy-blog' ),
            'section'     => 'trendy_blog_global_sticky_sidebar_section',
            'settings'    => 'sticky_sidebars_option',
            'type'        => 'toggle'
        ))
    );

    /**
     * Scroll To Top Section
     * 
     * panel - trendy_blog_global_options_panel
     */
    $wp_customize->add_section( 'trendy_blog_scroll_top_section', array(
      'title' => esc_html__( 'Scroll To Top', 'trendy-blog' ),
      'panel' => 'trendy_blog_global_options_panel',
      'priority'  => 100,
    ));

    /**
     * Scroll To Top Content Setting Heading
     * 
     */
    $wp_customize->add_setting( 'global_sttop_content_settings_header', array(
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'global_sttop_content_settings_header', array(
            'label'	      => esc_html__( 'Content ', 'trendy-blog' ),
            'section'     => 'trendy_blog_scroll_top_section',
            'settings'    => 'global_sttop_content_settings_header',
            'type'        => 'section-heading',
        ))
    );

    /**
     * Scroll To Top Option
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_option', array(
      'default'         => true,
      'sanitize_callback' => 'trendy_blog_sanitize_toggle_control'
    ));

    $wp_customize->add_control( 
        new Trendy_Blog_WP_Toggle_Control( $wp_customize, 'scroll_to_top_option', array(
            'label'	      => esc_html__( 'Show scroll to top', 'trendy-blog' ),
            'section'     => 'trendy_blog_scroll_top_section',
            'settings'    => 'scroll_to_top_option',
            'type'        => 'toggle'
        ))
    );

    /**
     * Scroll To Top Align
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_align',
      array(
        'default'           => 'align--left',
        'sanitize_callback' => 'sanitize_text_field',
      )
    );

    // Add the layout control.
    $wp_customize->add_control( new Trendy_Blog_WP_Radio_Tab_Control(
        $wp_customize,
        'scroll_to_top_align',
            array(
            'label'    => esc_html__( 'Button Align', 'trendy-blog' ),
            'section'  => 'trendy_blog_scroll_top_section',
            'choices'  => array(
                'align--left' => array(
                    'icon'  => esc_attr( 'fas fa-align-left' )
                ),
                'align--center' => array(
                    'icon'  => esc_attr( 'fas fa-align-center' )
                ),
                'align--right' => array(
                    'icon'  => esc_attr( 'fas fa-align-right' )
                )
            )
        )
    ));

    /**
     * Scroll To Top Style Setting Heading
     * 
     */
    $wp_customize->add_setting( 'global_sttop_style_settings_header', array(
      'sanitize_callback' => 'sanitize_text_field'
    ));
    $wp_customize->add_control( 
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'global_sttop_style_settings_header', array(
            'label'	      => esc_html__( 'Style ', 'trendy-blog' ),
            'section'     => 'trendy_blog_scroll_top_section',
            'settings'    => 'global_sttop_style_settings_header',
            'type'        => 'section-heading',
        ))
    );

    /**
     * Scroll To Top Padding Settings
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_padding_top', array( 'default' => 6, 'sanitize_callback' => 'trendy_blog_sanitize_number_field' ) );
    $wp_customize->add_setting( 'scroll_to_top_padding_right', array( 'default' => 10, 'sanitize_callback' => 'trendy_blog_sanitize_number_field' ) );
    $wp_customize->add_setting( 'scroll_to_top_padding_bottom', array( 'default' => 6, 'sanitize_callback' => 'trendy_blog_sanitize_number_field' ) );
    $wp_customize->add_setting( 'scroll_to_top_padding_left', array( 'default' => 10, 'sanitize_callback' => 'trendy_blog_sanitize_number_field' ) );
    $wp_customize->add_control( 
        new Trendy_Blog_WP_Spacing_Control( $wp_customize, 'scroll_to_top_padding_group', array(
            'label'     => esc_html__( 'Padding', 'trendy-blog' ),
            'section'     => 'trendy_blog_scroll_top_section',
            'settings'    => array(
                'top'   => 'scroll_to_top_padding_top',
                'right' => 'scroll_to_top_padding_right',
                'bottom' => 'scroll_to_top_padding_bottom',
                'left'  => 'scroll_to_top_padding_left'
            ),
            'priority'  => 90
        ))
    );

    /**
     * Scroll To Top Color Settings
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'scroll_to_top_hover_color', array( 'default' => '#f0f0f0',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( 
      new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'scroll_to_top_color_group', array(
        'label'       => esc_html__( 'Icon Color', 'trendy-blog' ),
        'descrition'  => esc_html__( 'Manage font color', 'trendy-blog' ),
        'section'     => 'trendy_blog_scroll_top_section',
        'settings'    => array(
          'color' => 'scroll_to_top_color',
          'hover_color' => 'scroll_to_top_hover_color'
        ),
        'priority'  => 90
      ))
    );

    /**
     * Scroll To Top Background Color Settings
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_bg_color', array( 'default' => '#000000',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_setting( 'scroll_to_top_hover_bg_color', array( 'default' => '#262626',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( 
      new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'scroll_to_top_bg_group', array(
        'label'       => esc_html__( 'Background', 'trendy-blog' ),
        'descrition'  => esc_html__( 'Manage background', 'trendy-blog' ),
        'section'     => 'trendy_blog_scroll_top_section',
        'settings'    => array(
          'color' => 'scroll_to_top_bg_color',
          'hover_color' => 'scroll_to_top_hover_bg_color'
        ),
        'priority'  => 100
      ))
    );

    /**
     * Scroll To Top Border Settings
     * 
     */
    $wp_customize->add_setting( 'scroll_to_top_border', array( 'default' => 'show',  'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_setting( 'scroll_to_top_border_color', array( 'default' => '#ffffff',  'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( 
        new Trendy_Blog_WP_Control_Group_Control( $wp_customize, 'scroll_to_top_border_group', array(
        'label'       => esc_html__( 'Border', 'trendy-blog' ),
        'section'     => 'trendy_blog_scroll_top_section',
        'settings'    => array(
            'border'        => 'scroll_to_top_border',
            'color'         => 'scroll_to_top_border_color'
        ),
        'priority'  => 110
        ))
    );
  }
  add_action( 'customize_register', 'trendy_blog_customizer_global_options_section', 10 );
endif;