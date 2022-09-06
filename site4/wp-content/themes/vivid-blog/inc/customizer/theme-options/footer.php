<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'vivid_blog_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'vivid-blog' ),
		'priority'   			=> 900,
		'panel'      			=> 'vivid_blog_theme_options_panel',
	)
);

// footer text
$wp_customize->add_setting( 'vivid_blog_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'vivid_blog_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'vivid_blog_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'vivid-blog' ),
		'section'    			=> 'vivid_blog_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'vivid_blog_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright span',
		'settings'            => 'vivid_blog_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'vivid_blog_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'vivid_blog_theme_options[scroll_top_visible]',
	array(
		'default'       	=> $options['scroll_top_visible'],
		'sanitize_callback' => 'vivid_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Vivid_Blog_Switch_Control( $wp_customize, 'vivid_blog_theme_options[scroll_top_visible]',
    array(
		'label'      		=> esc_html__( 'Display Scroll Top Button', 'vivid-blog' ),
		'section'    		=> 'vivid_blog_section_footer',
		'on_off_label' 		=> vivid_blog_switch_options(),
    )
) );