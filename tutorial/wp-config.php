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
define( 'DB_NAME', 'wordpress_tut' );

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
define( 'AUTH_KEY',         '3P9zoA<1~%b0p9AM,e3HTB||WD&BvpQeD2lU6n{|2A3Te IoE=$M_nRxyk;W~u>9' );
define( 'SECURE_AUTH_KEY',  '8#w]?P*jx1;j#1F:nE`J.fymT_J5+4Hwa5J/sXvl{JG_Eg+j|62^[Obig%nSxeWc' );
define( 'LOGGED_IN_KEY',    'a+Q8_~UcEhj 5$cPXy.hv4M $paaxp&zi/3#=5t7uRjEZP5V~?#A#>7*q U9Jb,C' );
define( 'NONCE_KEY',        '[t,pj21X;mT2t*9gi3v$J+kGaZpRp}F#9i}JRw?X`[u$%[71L,keQMCwauR%|;j>' );
define( 'AUTH_SALT',        'G!l_fv7[P4jV/1l{[*1}m!yz98M_|aWl%M|qs1mpx@X33n+ }hcn+)X0cy4[W.[V' );
define( 'SECURE_AUTH_SALT', 'B!aCkAAG(~<<$l%6psra6]kD8zTmCZ/ qPlMeX]V@A);hM}js},$TpP0rM,-pul&' );
define( 'LOGGED_IN_SALT',   'if`fJwIeed/,Yx}&Gg@ATUzOH;.pWCxdp92@5p)gB6Z,[68+2 y-=6bcm1j 5Np.' );
define( 'NONCE_SALT',       '`dCa |d)Cf$91c1sQof(TtR%&vFDsu4muIi G5Va%rw<L~h[zM[/1H!_^P]7*w1W' );

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
