<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Vivid Blog
 * @since Vivid Blog 1.0.0
 */

/**
 * vivid_blog_footer_primary_content hook
 *
 * @hooked vivid_blog_add_contact_section -  10
 *
 */
do_action( 'vivid_blog_footer_primary_content' );

/**
 * vivid_blog_content_end_action hook
 *
 * @hooked vivid_blog_content_end -  10
 *
 */
do_action( 'vivid_blog_content_end_action' );

/**
 * vivid_blog_content_end_action hook
 *
 * @hooked vivid_blog_footer_start -  10
 * @hooked Vivid_Blog_Footer_Widgets->add_footer_widgets -  20
 * @hooked vivid_blog_footer_site_info -  40
 * @hooked vivid_blog_footer_end -  100
 *
 */
do_action( 'vivid_blog_footer' );

/**
 * vivid_blog_page_end_action hook
 *
 * @hooked vivid_blog_page_end -  10
 *
 */
do_action( 'vivid_blog_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
