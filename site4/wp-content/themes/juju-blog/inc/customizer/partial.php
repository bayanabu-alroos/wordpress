<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Juju Blog
* @since Juju Blog 1.0.0
*/

//topbar
if ( ! function_exists( 'juju_blog_top_bar_notice_partial' ) ) :
    // top_bar_notice
    function juju_blog_top_bar_notice_partial() {
        $options = juju_blog_get_theme_options();
        return esc_html( $options['top_bar_notice'] );
    }
endif;

if ( ! function_exists( 'juju_blog_top_bar_email_partial' ) ) :
    // top_bar_email
    function juju_blog_top_bar_email_partial() {
        $options = juju_blog_get_theme_options();
        return esc_html( $options['top_bar_email'] );
    }
endif;

if ( ! function_exists( 'juju_blog_topics_title_partial' ) ) :
    // topics_title
    function juju_blog_topics_title_partial() {
        $options = juju_blog_get_theme_options();
        return esc_html( $options['topics_title'] );
    }
endif;

if ( ! function_exists( 'juju_blog_about_btn_text_partial' ) ) :
    // about_btn_text
    function juju_blog_about_btn_text_partial() {
        $options = juju_blog_get_theme_options();
        return esc_html( $options['about_btn_text'] );
    }
endif;

if ( ! function_exists( 'juju_blog_recent_posts_title_partial' ) ) :
    // recent_posts_title
    function juju_blog_recent_posts_title_partial() {
        $options = juju_blog_get_theme_options();
        return esc_html( $options['recent_posts_title'] );
    }
endif;

if ( ! function_exists( 'juju_blog_most_read_sub_title_partial' ) ) :
    // most_read_sub_title
    function juju_blog_most_read_sub_title_partial() {
        $options = juju_blog_get_theme_options();
        return esc_html( $options['most_read_sub_title'] );
    }
endif;

if ( ! function_exists( 'juju_blog_most_read_title_partial' ) ) :
    // most_read_title
    function juju_blog_most_read_title_partial() {
        $options = juju_blog_get_theme_options();
        return esc_html( $options['most_read_title'] );
    }
endif;

if ( ! function_exists( 'juju_blog_copyright_text_partial' ) ) :
    // copyright_text
    function juju_blog_copyright_text_partial() {
        $options = juju_blog_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;