<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'system' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'Word14' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'k&:r[A?*3zmvxK.0r`ybN:1|7:yD;TSJS3`Pk6d)Va#d6vjE}2-O9x3) $0(d>NS' );
define( 'SECURE_AUTH_KEY',  '7Ybtt]$^Ai^bSs?jrI<he(,N=b?^jQN h,}pN&Gp)Q:u!)+dXmgx.&b0a{m#w{@z' );
define( 'LOGGED_IN_KEY',    '?BI]tg2RQ._XI%YS59~!@>l&ZVC.+yBTeW3oY#[Z-[5Dn@yBb=u>lJR=.&Zv`yJI' );
define( 'NONCE_KEY',        'aW}H_k`)[0f3$]`QWO64vknxY;&Yd~_:!]|N%oFg8(U(hiEX{{D*+Y^naU8@jJx!' );
define( 'AUTH_SALT',        '](L[=JC1~B%=L`!>nu9D0y,O]4p-K@Criu[FCLcS<<|AE4.{jmOSRU^+]4Vjwp`u' );
define( 'SECURE_AUTH_SALT', 'Z:.+e[@ BZeO<vV-unHikSJU;*lt`(?^wjx>[95+hl|q/aIb(`r#1<M=v=OMPwK9' );
define( 'LOGGED_IN_SALT',   'nX_@v}vLm}h)J-*{Ia;gt6x:(jY35Pu(iA6QX!Uw_K~-FOeOCVj(Q{+vI|f@Pp&C' );
define( 'NONCE_SALT',       'fXT<n3.*$dPg9AUH/O3uPg)!y(,MXX@7KQQUR]HIuqa,diOie5V|qejyOk0g/d@#' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
