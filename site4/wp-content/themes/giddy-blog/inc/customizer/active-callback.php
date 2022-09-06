<?php
/**
 * Active callback functions.
 *
 * @package Giddy Blog
 */

function giddy_blog_header_background_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_header_background_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function giddy_blog_about_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_about_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function giddy_blog_about_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( giddy_blog_about_active( $control ) && ( 'about_custom' == $content_type ) );
} 

function giddy_blog_about_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( giddy_blog_about_active( $control ) && ( 'about_page' == $content_type ) );
}

function giddy_blog_about_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( giddy_blog_about_active( $control ) && ( 'about_post' == $content_type ) );
}

function giddy_blog_about_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[about_content_type]' )->value();
    return ( giddy_blog_about_active( $control ) && ( 'about_category' == $content_type ) );
}




function giddy_blog_slider_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_featured-slider_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function giddy_blog_slider_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( giddy_blog_slider_active( $control ) && ( 'sr_page' == $content_type ) );
}

function giddy_blog_slider_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( giddy_blog_slider_active( $control ) && ( 'sr_post' == $content_type ) );
}

function giddy_blog_slider_seperator( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return  giddy_blog_slider_seperator( $control ) && ( in_array( $content_type, array( 'sr_page', 'sr_post', 'sr_custom' ) ) ) ;
}

function giddy_blog_slider_custom( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( giddy_blog_slider_active( $control ) && ( 'sr_custom' == $content_type ) );
}

function giddy_blog_slider_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[sr_content_type]' )->value();
    return ( giddy_blog_slider_active( $control ) && ( 'sr_category' == $content_type ) );
}




function giddy_blog_mustread_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[disable_mustread_section]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

function giddy_blog_mustread_page( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[mustread_content_type]' )->value();
    return ( giddy_blog_mustread_active( $control ) && ( 'mustread_page' == $content_type ) );
}

function giddy_blog_mustread_post( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[mustread_content_type]' )->value();
    return ( giddy_blog_mustread_active( $control ) && ( 'mustread_post' == $content_type ) );
}

function giddy_blog_mustread_category( $control ) {
    $content_type = $control->manager->get_setting( 'theme_options[mustread_content_type]' )->value();
    return ( giddy_blog_mustread_active( $control ) && ( 'mustread_category' == $content_type ) );
}

/**
 * Active Callback for top bar section
 */
function giddy_blog_contact_info_ac( $control ) {

    $show_contact_info = $control->manager->get_setting( 'theme_options[show_header_contact_info]')->value();
    $control_id        = $control->id;
         
    if ( $control_id == 'theme_options[header_location]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_email]' && $show_contact_info ) return true;
    if ( $control_id == 'theme_options[header_phone]' && $show_contact_info ) return true;

    return false;
}

function giddy_blog_social_links_active( $control ) {
    if( $control->manager->get_setting( 'theme_options[show_header_social_links]' )->value() == true ) {
        return true;
    }else{
        return false;
    }
}

