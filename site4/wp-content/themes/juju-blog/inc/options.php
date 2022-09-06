<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function juju_blog_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'juju-blog' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function juju_blog_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'juju-blog' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of category for category choices.
 * @return Array Array of post ids and name.
 */
function juju_blog_category_choices() {
    $tax_args = array(
        'hierarchical' => 0,
        'taxonomy'     => 'category',
    );
    $taxonomies = get_categories( $tax_args );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'juju-blog' );
    foreach ( $taxonomies as $tax ) {
        $choices[ $tax->term_id ] = $tax->name;
    }
    return  $choices;
}

if ( ! function_exists( 'juju_blog_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function juju_blog_selected_sidebar() {
        $juju_blog_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'juju-blog' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'juju-blog' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'juju-blog' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'juju-blog' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'juju-blog' ),
        );

        $output = apply_filters( 'juju_blog_selected_sidebar', $juju_blog_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'juju_blog_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function juju_blog_site_layout() {
        $juju_blog_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'juju_blog_site_layout', $juju_blog_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'juju_blog_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function juju_blog_global_sidebar_position() {
        $juju_blog_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'juju_blog_global_sidebar_position', $juju_blog_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'juju_blog_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function juju_blog_sidebar_position() {
        $juju_blog_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'juju_blog_sidebar_position', $juju_blog_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'juju_blog_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function juju_blog_pagination_options() {
        $juju_blog_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'juju-blog' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'juju-blog' ),
        );

        $output = apply_filters( 'juju_blog_pagination_options', $juju_blog_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'juju_blog_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function juju_blog_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'juju-blog' ),
            'spinner-wheel'         => esc_html__( 'Wheel', 'juju-blog' ),
            'spinner-double-circle' => esc_html__( 'Double Circle', 'juju-blog' ),
            'spinner-two-way'       => esc_html__( 'Two Way', 'juju-blog' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'juju-blog' ),
            'spinner-dots'          => esc_html__( 'Dots', 'juju-blog' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'juju-blog' ),
            'spinner-fidget'        => esc_html__( 'Fidget', 'juju-blog' ),
        );
        return apply_filters( 'juju_blog_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'juju_blog_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function juju_blog_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'juju-blog' ),
            'off'       => esc_html__( 'Disable', 'juju-blog' )
        );
        return apply_filters( 'juju_blog_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'juju_blog_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function juju_blog_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'juju-blog' ),
            'off'       => esc_html__( 'No', 'juju-blog' )
        );
        return apply_filters( 'juju_blog_hide_options', $arr );
    }
endif;