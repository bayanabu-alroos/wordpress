<?php
/**
 * Demo Import.
 *
 * This is the template that includes all the other files for core featured of Theme Palace
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

function vivid_blog_ctdi_plugin_page_setup( $default_settings ) {
    $default_settings['menu_title']  = esc_html__( 'Theme Palace Demo Import' , 'vivid-blog' );

    return $default_settings;
}
add_filter( 'cp-ctdi/plugin_page_setup', 'vivid_blog_ctdi_plugin_page_setup' );

/**
 * Imports predefine demos.
 * @return [type] [description]
 */
function vivid_blog_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for Vivid Blog Theme.', 'vivid-blog' ),
    esc_url( 'https://themepalace.com/instructions/themes/vivid-blog' ), esc_html__( 'Click here for Demo File download', 'vivid-blog' ) );

    return $default_text;
}
add_filter( 'cp-ctdi/plugin_intro_text', 'vivid_blog_intro_text' );