<?php
/**
 * WeCodeArt Framework.
 *
 * WARNING: This file is part of the core WeCodeArt Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package 	WeCodeArt Framework
 * @subpackage 	Support\WPSeo\Conditional\is_yoast_active
 * @copyright   Copyright (c) 2022, WeCodeArt Framework
 * @since 		4.0.2
 * @version		5.0.0
 */

namespace WeCodeArt\Support\Plugins\WPSeo;

defined( 'ABSPATH' ) || exit(); 

use WeCodeArt\Conditional\Interfaces\ConditionalInterface;
use function WeCodeArt\Functions\detect_plugin;

/**
 * Conditional that is only met when plugin is active.
 */
class Condition implements ConditionalInterface {

	/**
	 * @inheritdoc
	 */
	public function is_met() {
		return detect_plugin( [ 'constants' => [ 'WPSEO_VERSION' ] ] );
	}
}