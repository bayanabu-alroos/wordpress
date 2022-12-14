<?php
/**
 * Sidebars settings
 * 
 * @package Clean Design Blog
 * @since 1.0.0
 */

add_action( 'customize_register', 'clean_design_blog_customize_sidebars_section_register', 10 );
/**
 * Add settings for sidebars section in the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function clean_design_blog_customize_sidebars_section_register( $wp_customize ) {
    /**
     * Typography Section
     * 
     * panel - clean_design_blog_theme_panel
     */
    $wp_customize->add_section( 'sidebars_section', array(
        'title' => esc_html__( 'Sidebar Layouts', 'clean-design-blog' ),
        'panel' => 'clean_design_blog_theme_panel',
        'priority'  => 50,
    ));

    /**
     * Post Sidebar Settings Heading
     * 
     */
    $wp_customize->add_setting( 'post_sidebar_setting_header', array(
      'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Clean_Design_Blog_WP_Section_Heading_Control( $wp_customize, 'post_sidebar_setting_header', array(
          'label'       => esc_html__( 'Post Sidebar', 'clean-design-blog' ),
          'section'     => 'sidebars_section',
          'settings'    => 'post_sidebar_setting_header',
          'type'        => 'section-heading',
      ))
    );

    /**
     * Post Sidebar Option
     * 
     */
    $wp_customize->add_setting( 'post_sidebar_option', array(
        'default'           => true,
        'sanitize_callback' => 'clean_design_blog_sanitize_toggle_control',
    ));
  
    $wp_customize->add_control( 
        new Clean_Design_Blog_WP_Toggle_Control( $wp_customize, 'post_sidebar_option', array(
            'label'	      => esc_html__( 'Show on post', 'clean-design-blog' ),
            'section'     => 'sidebars_section',
            'settings'    => 'post_sidebar_option',
            'type'        => 'toggle',
        ))
    );

    /**
     * Post sidebar settings
     * 
     */
    $wp_customize->add_setting( 'post_sidebar_layout',
      array(
        'default'           => 'right-sidebar',
        'sanitize_callback' => 'sanitize_text_field',
      )
    );

    // Add the layout control.
    $wp_customize->add_control( new Clean_Design_Blog_WP_Radio_Image_Control(
        $wp_customize,
        'post_sidebar_layout',
        array(
          'section'  => 'sidebars_section',
          'choices'  => array(
            'left-sidebar' => array(
              'label' => esc_html__( 'Left Sidebar', 'clean-design-blog' ),
              'url'   => '%s/images/customizer/left_sidebar.png'
            ),
            'right-sidebar' => array(
              'label' => esc_html__( 'Right Sidebar', 'clean-design-blog' ),
              'url'   => '%s/images/customizer/right_sidebar.png'
            )
          ),
          'active_callback' => 'post_sidebar_option_callback'
        )
      )
    );

    /**
     * Page Sidebar Settings Heading
     * 
     */
    $wp_customize->add_setting( 'page_sidebar_setting_header', array(
      'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Clean_Design_Blog_WP_Section_Heading_Control( $wp_customize, 'page_sidebar_setting_header', array(
          'label'       => esc_html__( 'Page Sidebar', 'clean-design-blog' ),
          'section'     => 'sidebars_section',
          'settings'    => 'page_sidebar_setting_header',
          'type'        => 'section-heading',
      ))
    );

    /**
     * Page Sidebar Option
     * 
     */
    $wp_customize->add_setting( 'page_sidebar_option', array(
        'default'           => true,
        'sanitize_callback' => 'clean_design_blog_sanitize_toggle_control',
    ));
  
    $wp_customize->add_control( 
        new Clean_Design_Blog_WP_Toggle_Control( $wp_customize, 'page_sidebar_option', array(
            'label'	      => esc_html__( 'Show on page', 'clean-design-blog' ),
            'section'     => 'sidebars_section',
            'settings'    => 'page_sidebar_option',
            'type'        => 'toggle',
        ))
    );

    /**
     * Page sidebar settings
     * 
     */
    $wp_customize->add_setting( 'page_sidebar_layout',
      array(
        'default'           => 'right-sidebar',
        'sanitize_callback' => 'sanitize_text_field',
      )
    );

    // Add the layout control.
    $wp_customize->add_control( new Clean_Design_Blog_WP_Radio_Image_Control(
        $wp_customize,
        'page_sidebar_layout',
        array(
          'section'  => 'sidebars_section',
          'choices'  => array(
            'left-sidebar' => array(
              'label' => esc_html__( 'Left Sidebar', 'clean-design-blog' ),
              'url'   => '%s/images/customizer/left_sidebar.png'
            ),
            'right-sidebar' => array(
              'label' => esc_html__( 'Right Sidebar', 'clean-design-blog' ),
              'url'   => '%s/images/customizer/right_sidebar.png'
            )
          ),
          'active_callback' => 'page_sidebar_option_callback'
        )
      )
    );

    /**
     * Archive Sidebar Settings Heading
     * 
     */
    $wp_customize->add_setting( 'archive_sidebar_setting_header', array(
      'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Clean_Design_Blog_WP_Section_Heading_Control( $wp_customize, 'archive_sidebar_setting_header', array(
          'label'       => esc_html__( 'Archive/Category Sidebar', 'clean-design-blog' ),
          'section'     => 'sidebars_section',
          'settings'    => 'archive_sidebar_setting_header',
          'type'        => 'section-heading',
      ))
    );

    /**
     * Archive Sidebar Option
     * 
     */
    $wp_customize->add_setting( 'archive_sidebar_option', array(
        'default'           => true,
        'sanitize_callback' => 'clean_design_blog_sanitize_toggle_control',
    ));
  
    $wp_customize->add_control( 
        new Clean_Design_Blog_WP_Toggle_Control( $wp_customize, 'archive_sidebar_option', array(
            'label'	      => esc_html__( 'Show on archive', 'clean-design-blog' ),
            'section'     => 'sidebars_section',
            'settings'    => 'archive_sidebar_option',
            'type'        => 'toggle',
        ))
    );

    /**
     * Archive sidebar settings
     * 
     */
    $wp_customize->add_setting( 'archive_sidebar_layout',
      array(
        'default'           => 'right-sidebar',
        'sanitize_callback' => 'sanitize_text_field',
      )
    );

    // Add the layout control.
    $wp_customize->add_control( new Clean_Design_Blog_WP_Radio_Image_Control(
        $wp_customize,
        'archive_sidebar_layout',
        array(
          'section'  => 'sidebars_section',
          'choices'  => array(
            'left-sidebar' => array(
              'label' => esc_html__( 'Left Sidebar', 'clean-design-blog' ),
              'url'   => '%s/images/customizer/left_sidebar.png'
            ),
            'right-sidebar' => array(
              'label' => esc_html__( 'Right Sidebar', 'clean-design-blog' ),
              'url'   => '%s/images/customizer/right_sidebar.png'
            )
          ),
          'active_callback' => 'archive_sidebar_option_callback'
        )
      )
    );
}