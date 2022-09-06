<?php
/**
 * Sidebars settings
 * 
 * @package Trendy Blog
 * @since 1.0.0
 */
add_action( 'customize_register', 'trendy_blog_customize_sidebars_section_register', 10 );
/**
 * Add settings for sidebars section in the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function trendy_blog_customize_sidebars_section_register( $wp_customize ) {
    /**
     * Typography Section
     * 
     * panel - trendy_blog_global_options_panel
     */
    $wp_customize->add_section( 'sidebars_section', array(
        'title' => esc_html__( 'Sidebar Layouts', 'trendy-blog' ),
        'panel' => 'trendy_blog_global_options_panel',
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
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'post_sidebar_setting_header', array(
          'label'       => esc_html__( 'Post Sidebar', 'trendy-blog' ),
          'section'     => 'sidebars_section',
          'settings'    => 'post_sidebar_setting_header',
          'type'        => 'section-heading',
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
    $wp_customize->add_control( new Trendy_Blog_WP_Radio_Image_Control(
        $wp_customize,
        'post_sidebar_layout',
        array(
          'section'  => 'sidebars_section',
          'choices'  => array(
            'no-sidebar' => array(
                'label' => esc_html__( 'No Sidebar', 'trendy-blog' ),
                'url'   => '%s/assets/images/customizer/no_sidebar.jpg'
            ),
            'left-sidebar' => array(
              'label' => esc_html__( 'Left Sidebar', 'trendy-blog' ),
              'url'   => '%s/assets/images/customizer/left_sidebar.jpg'
            ),
            'right-sidebar' => array(
              'label' => esc_html__( 'Right Sidebar', 'trendy-blog' ),
              'url'   => '%s/assets/images/customizer/right_sidebar.jpg'
            )
          )
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
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'page_sidebar_setting_header', array(
          'label'       => esc_html__( 'Page Sidebar', 'trendy-blog' ),
          'section'     => 'sidebars_section',
          'settings'    => 'page_sidebar_setting_header',
          'type'        => 'section-heading',
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
    $wp_customize->add_control( new Trendy_Blog_WP_Radio_Image_Control(
        $wp_customize,
        'page_sidebar_layout',
        array(
          'section'  => 'sidebars_section',
          'choices'  => array(
            'no-sidebar' => array(
                'label' => esc_html__( 'No Sidebar', 'trendy-blog' ),
                'url'   => '%s/assets/images/customizer/no_sidebar.jpg'
            ),
            'left-sidebar' => array(
              'label' => esc_html__( 'Left Sidebar', 'trendy-blog' ),
              'url'   => '%s/assets/images/customizer/left_sidebar.jpg'
            ),
            'right-sidebar' => array(
              'label' => esc_html__( 'Right Sidebar', 'trendy-blog' ),
              'url'   => '%s/assets/images/customizer/right_sidebar.jpg'
            )
          )
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
        new Trendy_Blog_WP_Section_Heading_Control( $wp_customize, 'archive_sidebar_setting_header', array(
          'label'       => esc_html__( 'Archive/Category Sidebar', 'trendy-blog' ),
          'section'     => 'sidebars_section',
          'settings'    => 'archive_sidebar_setting_header',
          'type'        => 'section-heading',
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
    $wp_customize->add_control( new Trendy_Blog_WP_Radio_Image_Control(
        $wp_customize,
        'archive_sidebar_layout',
        array(
          'section'  => 'sidebars_section',
          'choices'  => array(
            'no-sidebar' => array(
                'label' => esc_html__( 'No Sidebar', 'trendy-blog' ),
                'url'   => '%s/assets/images/customizer/no_sidebar.jpg'
            ),
            'left-sidebar' => array(
              'label' => esc_html__( 'Left Sidebar', 'trendy-blog' ),
              'url'   => '%s/assets/images/customizer/left_sidebar.jpg'
            ),
            'right-sidebar' => array(
              'label' => esc_html__( 'Right Sidebar', 'trendy-blog' ),
              'url'   => '%s/assets/images/customizer/right_sidebar.jpg'
            )
          )
        )
      )
    );
}