<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'juju_blog_reset_section', array(
	'title'             => esc_html__('Reset all settings','juju-blog'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'juju-blog' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'juju_blog_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'juju_blog_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'juju_blog_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'juju-blog' ),
	'section'           => 'juju_blog_reset_section',
	'type'              => 'checkbox',
) );
