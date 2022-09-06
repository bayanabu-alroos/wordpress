<?php
/**
 * WeCodeArt Framework.
 *
 * WARNING: This file is part of the core WeCodeArt Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package 	WeCodeArt Framework
 * @subpackage 	Core\Content
 * @copyright   Copyright (c) 2022, WeCodeArt Framework
 * @since 		3.5
 * @version		5.4.4
 */

namespace WeCodeArt\Core;

defined( 'ABSPATH' ) || exit();

use WeCodeArt\Singleton;
use function WeCodeArt\Functions\get_prop;

/**
 * Handles PHP Fallback
 */
class Content {

	use Singleton;

	/**
	 * Send to Constructor
	 * @since 3.6.2
	 */
	public function init() {
		add_action( 'wecodeart/content',	[ $this, 'markup' ] );
	}

	/**
	 * Returns the inner markp with wrapper based on user options
	 *
	 * @since 	unknown
	 * @version	5.4.4
	 *
	 * @return 	HTML
	 */
	public static function markup() {
		$file = get_parent_theme_file_path( 'templates/content-only.html' );

		if( file_exists( $file ) === false ) return;
			
		echo do_blocks( file_get_contents( $file ) );
	}
}