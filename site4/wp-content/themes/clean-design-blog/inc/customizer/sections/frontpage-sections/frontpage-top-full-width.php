<?php
/**
 * Frontpage Top Full Width Section Settings
 * 
 * @package Clean Design Blog
 * @since 1.0.0
 */

add_action( 'customize_register', 'clean_design_blog_customize_frontpage_top_full_width_section_register', 10 );
/**
 * Add settings for frontpage top full width section in the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function clean_design_blog_customize_frontpage_top_full_width_section_register( $wp_customize ) {
    /**
     * Frontpage Top Full Width Section
     * 
     * panel - clean_design_blog_frontpage_sections_panel
     */

    $wp_customize->add_section( 'frontpage_top_full_width_section', array(
      'title' => esc_html__( 'Frontpage Top Full Width Section', 'clean-design-blog' ),
      'panel' => 'clean_design_blog_frontpage_sections_panel',
      'priority'  => 10,
    ));

    /**
     * Frontpage Top Banner Widget Heading Settings
     * 
     */
    $wp_customize->add_setting( 'frontpage_top_banner_widget_settings', array(
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customize->add_control( 
        new Clean_Design_Blog_WP_Section_Heading_Control( $wp_customize, 'frontpage_top_banner_widget_settings', array(
            'label'	      => esc_html__( 'Top Full Width Blocks', 'clean-design-blog' ),
            'description' => esc_html__( 'Add, remove, clone or reorder blocks below. ', 'clean-design-blog' ),
            'section'     => 'frontpage_top_full_width_section',
            'settings'    => 'frontpage_top_banner_widget_settings',
            'type'        => 'section-heading',
        ))
    );
    
    $wp_customize->add_setting( 'frontpage_top_full_width_blocks', array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'   => json_encode(array(
                array(
                    'name'      => 'posts-carousel',
                    'option'    => true,
                    'blockTitle'=> esc_html__( 'Posts Carousel', 'clean-design-blog' ),
                    'category'  => '',
                    'count'     => 6,
                    'dateOption'     => true,
                    'commentOption'  => true,
                    'layout'    => 'three'
                ),
                array(
                    'name'      => 'categories-collection',
                    'option'    => false,
                    'blockTitle'=> esc_html__( 'Category Collection', 'clean-design-blog' ),
                    'categories'  => '[]',
                    'countOption'     => true,
                    'layout'    => 'one'
                )
            )
        )
    ));

    $wp_customize->add_control( 
        new Clean_Design_Blog_WP_Blocks_Repeater_Control( $wp_customize, 'frontpage_top_full_width_blocks', array(
            'label'	      => esc_html__( 'Full Width Section Blocks', 'clean-design-blog' ),
            'section'     => 'frontpage_top_full_width_section',
            'settings'    => 'frontpage_top_full_width_blocks'
        ))
    );
}