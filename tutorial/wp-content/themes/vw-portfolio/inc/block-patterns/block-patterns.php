<?php
/**
 * VW Portfolio: Block Patterns
 *
 * @package VW Portfolio
 * @since   1.0.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'vw-portfolio',
		array( 'label' => __( 'VW Portfolio', 'vw-portfolio' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {
	register_block_pattern(
		'vw-portfolio/banner-section',
		array(
			'title'      => __( 'Banner Section', 'vw-portfolio' ),
			'categories' => array( 'vw-portfolio' ),
			'content'    => "<!-- wp:cover {\"url\":\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png\",\"id\":9122,\"dimRatio\":20,\"align\":\"full\",\"className\":\"main-slider-section\"} -->\n<div class=\"wp-block-cover alignfull has-background-dim-20 has-background-dim main-slider-section\" style=\"background-image:url(" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/banner.png)\"><div class=\"wp-block-cover__inner-container\"><!-- wp:columns {\"align\":\"wide\",\"className\":\"mx-5 px-lg-2\"} -->\n<div class=\"wp-block-columns alignwide mx-5 px-lg-2\"><!-- wp:column {\"verticalAlignment\":\"center\",\"className\":\"ps-lg-5\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center ps-lg-5\"><!-- wp:heading {\"textAlign\":\"left\",\"level\":1,\"className\":\"mb-2\",\"style\":{\"typography\":{\"fontSize\":40}}} -->\n<h1 class=\"has-text-align-left mb-2\" style=\"font-size:40px\">LOREM IPSUM DOLOR</h1>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"left\",\"className\":\"mb-3 text-left\",\"style\":{\"typography\":{\"fontSize\":15}}} -->\n<p class=\"has-text-align-left mb-3 text-left\" style=\"font-size:15px\"><em>Lorem Ipsum has been the industrys standard.&nbsp;Lorem Ipsum has been the industrys standard.&nbsp;Lorem Ipsum</em> has been</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:buttons {\"align\":\"left\",\"className\":\"m-0\"} -->\n<div class=\"wp-block-buttons alignleft m-0\"><!-- wp:button {\"borderRadius\":0,\"style\":{\"color\":{\"background\":\"#75caf7\"}}} -->\n<div class=\"wp-block-button\"><a class=\"wp-block-button__link has-background no-border-radius\" style=\"background-color:#75caf7\">Read More</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);

	register_block_pattern(
		'vw-portfolio/services-section',
		array(
			'title'      => __( 'Services Section', 'vw-portfolio' ),
			'categories' => array( 'vw-portfolio' ),
			'content'    => "<!-- wp:cover {\"overlayColor\":\"white\",\"align\":\"wide\",\"className\":\"sec-services m-0\"} -->\n<div class=\"wp-block-cover alignwide has-white-background-color has-background-dim sec-services m-0\"><div class=\"wp-block-cover__inner-container\"><!-- wp:heading {\"textAlign\":\"center\",\"className\":\"mt-0 mb-5\",\"textColor\":\"black\",\"style\":{\"typography\":{\"fontSize\":35}}} -->\n<h2 class=\"has-text-align-center mt-0 mb-5 has-black-color has-text-color\" style=\"font-size:35px\">Lorem Ipsum</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns {\"align\":\"wide\",\"className\":\"m-0 px-lg-3\"} -->\n<div class=\"wp-block-columns alignwide m-0 px-lg-3\"><!-- wp:column {\"className\":\"mb-3\"} -->\n<div class=\"wp-block-column mb-3\"><!-- wp:image {\"align\":\"center\",\"id\":9113,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services-icon-1.png\" alt=\"\" class=\"wp-image-9113\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"textColor\":\"black\",\"style\":{\"typography\":{\"fontSize\":25}}} -->\n<h3 class=\"has-text-align-center mb-2 has-black-color has-text-color\" style=\"font-size:25px\">Lorem Ipsum</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"typography\":{\"fontSize\":15},\"color\":{\"text\":\"#333333\"}}} -->\n<p class=\"has-text-align-center text-center has-text-color\" style=\"color:#333333;font-size:15px\"><em>Lorem Ipsum has been the industrys standard</em>.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":9116,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services-icon-2.png\" alt=\"\" class=\"wp-image-9116\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"textColor\":\"black\",\"style\":{\"typography\":{\"fontSize\":25}}} -->\n<h3 class=\"has-text-align-center mb-2 has-black-color has-text-color\" style=\"font-size:25px\">Lorem Ipsum</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"typography\":{\"fontSize\":15},\"color\":{\"text\":\"#333333\"}}} -->\n<p class=\"has-text-align-center text-center has-text-color\" style=\"color:#333333;font-size:15px\"><em>Lorem Ipsum has been the industrys standard</em>.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":9117,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services-icon-3.png\" alt=\"\" class=\"wp-image-9117\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"textColor\":\"black\",\"style\":{\"typography\":{\"fontSize\":25}}} -->\n<h3 class=\"has-text-align-center mb-2 has-black-color has-text-color\" style=\"font-size:25px\">Lorem Ipsum</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"typography\":{\"fontSize\":15},\"color\":{\"text\":\"#333333\"}}} -->\n<p class=\"has-text-align-center text-center has-text-color\" style=\"color:#333333;font-size:15px\"><em>Lorem Ipsum has been the industrys standard</em>.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":9118,\"sizeSlug\":\"large\",\"linkDestination\":\"media\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter size-large\"><img src=\"" . esc_url(get_template_directory_uri()) . "/inc/block-patterns/images/services-icon-4.png\" alt=\"\" class=\"wp-image-9118\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"textAlign\":\"center\",\"level\":3,\"className\":\"mb-2\",\"textColor\":\"black\",\"style\":{\"typography\":{\"fontSize\":25}}} -->\n<h3 class=\"has-text-align-center mb-2 has-black-color has-text-color\" style=\"font-size:25px\">Lorem Ipsum</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"text-center\",\"style\":{\"typography\":{\"fontSize\":15},\"color\":{\"text\":\"#333333\"}}} -->\n<p class=\"has-text-align-center text-center has-text-color\" style=\"color:#333333;font-size:15px\"><em>Lorem Ipsum has been the industrys standard</em>.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:cover -->",
		)
	);
}