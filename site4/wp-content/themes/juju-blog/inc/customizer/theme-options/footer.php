<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'juju_blog_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'juju-blog' ),
		'priority'   			=> 900,
		'panel'      			=> 'juju_blog_theme_options_panel',
	)
);

// footer copyright text
$wp_customize->add_setting( 'juju_blog_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'juju_blog_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'juju_blog_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'juju-blog' ),
		'section'    			=> 'juju_blog_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'juju_blog_theme_options[copyright_text]', array(
		'selector'            => '#colophon .site-info span.copyright',
		'settings'            => 'juju_blog_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'juju_blog_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'juju_blog_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'juju_blog_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Juju_Blog_Switch_Control( $wp_customize, 'juju_blog_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'juju-blog' ),
		'section'    			=> 'juju_blog_section_footer',
		'on_off_label' 		=> juju_blog_switch_options(),
    )
) );