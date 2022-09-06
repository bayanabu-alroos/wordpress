<?php
/**
 * WeCodeArt Framework
 *
 * WARNING: This file is part of the core WeCodeArt Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package 	WeCodeArt Framework 
 * @subpackage 	Compatability/Activation
 * @copyright   Copyright (c) 2022, WeCodeArt Framework
 * @since		3.5
 * @version		5.6.4
 */

namespace WeCodeArt\Admin;

defined( 'ABSPATH' ) || exit(); 

use WeCodeArt\Config;
use WeCodeArt\Singleton;
use WeCodeArt\Admin\Notifications;
use WeCodeArt\Admin\Notifications\Notification;

/**
 * Activation - runs first before any other class to make sure user meets the requirements
 */
class Activation {

	use Singleton;

	/**
	 * Constants
	 *
	 * @var		string
	 */
	const REQUIRED_WP 	= '6.0';
	const REQUIRED_PHP 	= '7.0';

	/**
	 * Requirements
	 *
	 * @access 	protected
	 * @var		array
	 */
	protected $requirements = [];

	/**
	 * Status
	 *
	 * @access 	protected
	 * @var		boolean
	 */
	protected $status = true;  
	
	/**
	 * Send to Constructor
	 */
	public function init() {
		$this->set_requirements();
		$this->set_deactivation_hooks();

		add_action( 'after_switch_theme', 	[ $this, 'after_switch_theme' 	] );
	}

	/**
	 * Set Requirements
	 *
	 * @since 	3.5
	 * @version	5.2.2
	 */
	public function set_requirements( $args = [] ) {
		return $this->requirements = wp_parse_args( $args, [
			'wordpress' => [
				'required'  => self::REQUIRED_WP,
				'installed' => $GLOBALS['wp_version'],
				'i18n'      => sprintf(
					__( 'WeCodeArt Framework requires WordPress version %1$s or higher. You are using version %2$s. Please upgrade WordPress to use WeCodeArt Framework.', 'wecodeart' ),
					self::REQUIRED_WP,
					$GLOBALS['wp_version']
				),
			],
			'php'       => [
				'required'  => self::REQUIRED_PHP,
				'installed' => PHP_VERSION,
				'i18n'      => sprintf(
					__( 'WeCodeArt Framework requires PHP version %1$s or higher. You are using version %2$s. Please %3$s to use WeCodeArt Framework.', 'wecodeart' ), 
					self::REQUIRED_PHP,
					PHP_VERSION,
					sprintf( '<a href="https://wordpress.org/support/upgrade-php/">%s</a>', esc_html__( 'upgrade PHP', 'wecodeart' ) )
				),
			],
		] );	
	}

	/**
	 * Requirements deactivated?
	 *
	 * @since 	5.0.0
	 * @version	5.0.0
	 */
	public function set_deactivation_hooks() {
		if( ! $this->requirements ) return;
		foreach( $this->requirements as $key => $val ) {
			if( isset( $val['plugin'] ) && (bool) $val['plugin'] === true ) {
				// Simply switch theme on plugin deactivation, beautiful!!!
				register_deactivation_hook( $val['required'], [ $this, 'switch_theme' ] );
				continue;
			}
		}
	}

	/**
	 * Get Activation Validation Status
	 *
	 * @since 	3.5
	 * @version	5.4.6
	 *
	 * @return	boolean
	 */
	public function is_ok() {
		if( empty( $this->requirements ) || ! is_admin() ) return true;

		$this->compare_requirements();

		foreach( $this->requirements as $val ) {
			if( isset( $val['condition'] ) && $val['condition'] === false ) {
				$this->status = false;
				break;
			}
		}

		return $this->status;
	}

	/**
	 * Compare Requirements
	 *
	 * @since 	3.5
	 * @version	5.0.0
	 */
	public function compare_requirements() {
		if( ! $this->requirements ) return;
		foreach( $this->requirements as $key => $val ) {
			if( isset( $val['plugin'] ) && (bool) $val['plugin'] === true ) {
				// If we have plugin, activate it and move on!
				if( $this->is_plugin_installed( $val['required'] ) ) {
					\activate_plugin( $val['required'] );
					continue;
				}
				// If we dont, simply return true on the failed key, it means we dont have it
				$this->requirements[$key]['condition'] = \is_plugin_active( $val['required'] ) === false;
				continue;
			}

			if( isset( $val['installed'] ) && isset( $val['required'] ) ) {
				$this->requirements[$key]['condition'] = \version_compare( $val['installed'], $val['required'], '>=' );
			}
		}
	}


	/**
	 * Show an error notice box
	 *
	 * @since 	1.8
	 * @version	5.2.7
	 */
	public function after_switch_theme() {
		// If not, why bother to load the theme?
		if( $this->is_ok() === false ) {
			// Switch to old theme
			$this->switch_theme();

			// Show what's failed validation
			$this->admin_notice();

			do_action( 'wecodeart/hook/activation/failed' );

			return;
		}
	}

	/**
	 * Switch to old theme
	 *
	 * @since 	5.0.0
	 * @version	5.0.0
	 */
	public function switch_theme() {
		unset( $_GET['activated'] ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		$old_theme = wp_get_theme( get_option( 'theme_switched' ) );
		if ( $old_theme->exists() && strpos( $old_theme->get_stylesheet(), wecodeart( 'name' ) ) === false ) {
			$fallback_stylesheet = $old_theme->get_stylesheet();
		} else {
			$fallback_stylesheet = WP_DEFAULT_THEME;
		}
	
		// Switch to old theme
		switch_theme( $fallback_stylesheet );
	}

	/**
	 * Show an error notice box
	 *
	 * @since 	1.8
	 * @version	5.4.6
	 */
	public function admin_notice() {
		if( ! $this->requirements ) return;
		foreach( $this->requirements as $key => $val ) {
			if( isset( $val['condition'] ) && $val['condition'] === false ) {
				$notification = new Notification( wpautop( $val['i18n'] ), [ 'type' => Notification::ERROR ] );
			
				Notifications::get_instance()->add_notification( $notification );
			}
		}	
	}

	/**
	 * Check if plugin is installed by getting all plugins from the plugins dir
	 *
	 * @since 	5.0.0
	 * @version	5.0.0
	 *
	 * @param 	$slug
	 *
	 * @return 	bool
	 */
	public function is_plugin_installed( $slug ) {
		$installed = \get_plugins();

		return array_key_exists( $slug, $installed ) || in_array( $slug, $installed, true );
	}
}