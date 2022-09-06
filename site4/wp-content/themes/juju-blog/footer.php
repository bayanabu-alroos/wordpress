<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Juju Blog
 * @since Juju Blog 1.0.0
 */

/**
 * juju_blog_footer_primary_content hook
 *
 * @hooked juju_blog_add_contact_section -  10
 *
 */
do_action( 'juju_blog_footer_primary_content' );

/**
 * juju_blog_content_end_action hook
 *
 * @hooked juju_blog_content_end -  10
 *
 */
do_action( 'juju_blog_content_end_action' );

/**
 * juju_blog_content_end_action hook
 *
 * @hooked juju_blog_footer_start -  10
 * @hooked juju_blog_Footer_Widgets->add_footer_widgets -  20
 * @hooked juju_blog_footer_site_info -  40
 * @hooked juju_blog_footer_end -  100
 *
 */
do_action( 'juju_blog_footer' );

/**
 * juju_blog_page_end_action hook
 *
 * @hooked juju_blog_page_end -  10
 *
 */
do_action( 'juju_blog_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
