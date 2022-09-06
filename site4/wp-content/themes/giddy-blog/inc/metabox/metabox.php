<?php
/**
 * Giddy Blog metabox file.
 *
 * This is the template that includes all the other files for metaboxes of Giddy Blog theme
 *
 * @package Giddy Blog
 * @since Giddy Blog 0.1
 */

// Include Post subtitle meta
require get_template_directory() . '/inc/metabox/video-url.php'; 




if ( ! function_exists( 'giddy_blog_custom_meta' ) ) : 
    /**
     * Adds meta box to the post editing screen
     */
    function giddy_blog_custom_meta() {
        $post_type = array( 'post', 'page' );

        // POST Subtitle 
        add_meta_box( 'giddy_blog_video_url', esc_html__( 'Video Links', 'giddy-blog' ), 'giddy_blog_video_url_callback', $post_type );
               
    }
endif;
add_action( 'add_meta_boxes', 'giddy_blog_custom_meta' );


