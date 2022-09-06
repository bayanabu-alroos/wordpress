<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'vivid_blog_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','vivid-blog' ),
	'description'       => esc_html__( 'Excerpt section options.', 'vivid-blog' ),
	'panel'             => 'vivid_blog_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'vivid_blog_sanitize_number_range',
	'validate_callback' => 'vivid_blog_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'vivid_blog_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'vivid-blog' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'vivid-blog' ),
	'section'     		=> 'vivid_blog_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

// read more text setting and control
$wp_customize->add_setting( 'vivid_blog_theme_options[read_more_text]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['read_more_text'],
) );

$wp_customize->add_control( 'vivid_blog_theme_options[read_more_text]', array(
	'label'           	=> esc_html__( 'Read More Text Label', 'vivid-blog' ),
	'section'        	=> 'vivid_blog_excerpt_section',
	'type'				=> 'text',
) );
