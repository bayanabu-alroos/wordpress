<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BlogMelody
 */
/**
* Hook - blogmelody_action_doctype.
*
* @hooked blogmelody_doctype -  10
*/
do_action( 'blogmelody_action_doctype' );
?>
<head>
<?php
/**
* Hook - blogmelody_action_head.
*
* @hooked blogmelody_head -  10
*/
do_action( 'blogmelody_action_head' );
?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php do_action( 'wp_body_open' ); ?>
<?php

/**
* Hook - blogmelody_action_before.
*
* @hooked blogmelody_page_start - 10
*/
do_action( 'blogmelody_action_before' );

/**
*
* @hooked blogmelody_header_start - 10
*/
do_action( 'blogmelody_action_before_header' );

/**
*
*@hooked blogmelody_site_branding - 10
*@hooked blogmelody_header_end - 15 
*/
do_action('blogmelody_action_header');

/**
*
* @hooked blogmelody_content_start - 10
*/
do_action( 'blogmelody_action_before_content' );

/**
 * Banner start
 * 
 * @hooked blogmelody_banner_header - 10
*/
do_action( 'blogmelody_banner_header' );  
