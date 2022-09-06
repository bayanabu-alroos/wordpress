<?php
/**
 * WeCodeArt Framework.
 *
 * WARNING: This file is part of the core WeCodeArt Framework. DO NOT edit this file under any circumstances.
 * Please do all modifications in the form of a child theme.
 *
 * @package 	WeCodeArt Framework.
 * @subpackage  WeCodeArt/Config/Interfaces/Config
 * @copyright   Copyright (c) 2022, WeCodeArt Framework
 * @since		3.9.5
 * @version		5.4.5
 */

namespace WeCodeArt\Config\Interfaces;

/**
 * ConfigInterface.
 *
 * @author     Bican Marian Valeriu <marianvaleriubican@gmail.com>
 */
interface Configuration {
    /**
     * Get all of the configuration items for the application.
     *
     * @return array
     */
    public function all();

    /**
     * Get the specified configuration value.
     *
     * @param  string  $key
     * @param  mixed   $default
     *
     * @return mixed
     */
    public function get( $key, $default );

    /**
     * Set a given configuration value.
     *
     * @param  array|string  $key
     * @param  mixed   $value
     *
     * @return void
     */
    public function set( $key, $value );

    /**
     * Determine if the given configuration value exists.
     *
     * @param  string  $key
     *
     * @return bool
     */
    public function has( $key );

    /**
     * Removes configuration from the container.
     *
     * @param  string  $key
     *
     * @return void
     */
    public function forget( $key );
}