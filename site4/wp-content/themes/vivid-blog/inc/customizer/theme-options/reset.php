<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'vivid_blog_reset_section', array(
	'title'             => esc_html__('Reset all settings','vivid-blog'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'vivid-blog' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'vivid_blog_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'vivid_blog_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'vivid_blog_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'vivid-blog' ),
	'section'           => 'vivid_blog_reset_section',
	'type'              => 'checkbox',
) );
