<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Vivid Blog
* @since Vivid Blog 1.0.0
*/

if ( ! function_exists( 'vivid_blog_topbar_author_partial' ) ) :
    // topbar author
    function vivid_blog_topbar_author_partial() {
        $options = vivid_blog_get_theme_options();
        return esc_html( $options['topbar_author'] );
    }
endif;

if ( ! function_exists( 'vivid_blog_topbar_author_position_partial' ) ) :
    // topbar author position
    function vivid_blog_topbar_author_position_partial() {
        $options = vivid_blog_get_theme_options();
        return esc_html( $options['topbar_author_position'] );
    }
endif;

if ( ! function_exists( 'vivid_blog_about_btn_title_partial' ) ) :
    // about btn title
    function vivid_blog_about_btn_title_partial() {
        $options = vivid_blog_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'vivid_blog_blog_title_partial' ) ) :
    // blog title
    function vivid_blog_blog_title_partial() {
        $options = vivid_blog_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;

if ( ! function_exists( 'vivid_blog_subscription_title_partial' ) ) :
    // subscription title
    function vivid_blog_subscription_title_partial() {
        $options = vivid_blog_get_theme_options();
        return esc_html( $options['subscription_title'] );
    }
endif;

if ( ! function_exists( 'vivid_blog_copyright_text_partial' ) ) :
    // copyright text
    function vivid_blog_copyright_text_partial() {
        $options = vivid_blog_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;
