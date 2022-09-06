<?php
/**
 * Theme Palace widgets inclusion
 *
 * This is the template that includes all custom widgets of Juju Blog
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

/*
 * Add Popular Posts widget
 */
require get_template_directory() . '/inc/widgets/popular-posts-widget.php';


/*
 * Add social link widget
 */
require get_template_directory() . '/inc/widgets/social-link-widget.php';


/**
 * Register widgets
 */
function juju_blog_register_widgets() {

	register_widget( 'Juju_Blog_Popular_Post' );

	register_widget( 'Juju_Blog_Social_Link' );

}
add_action( 'widgets_init', 'juju_blog_register_widgets' );