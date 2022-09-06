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
define( 'DB_NAME', 'site4' );

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
define( 'AUTH_KEY',         'Ck}Krm(mfl=YJ`Hi<+g-x1j$@IV492SR6Y8/}}Oh!ipdG* tYuv>a;geZFIvL5n(' );
define( 'SECURE_AUTH_KEY',  'Q(&d/ *N1wZkY4d 4^^AeFt`-f.;;lq<PaX73iMNJvmf.m^WfBXRCy$]#*fLr^[+' );
define( 'LOGGED_IN_KEY',    '-Uxaa_Pdc(vvXfn%Sylae6U? b09O<IjpUf26Z;okg)s:*]T`gq.!qe8p(o]@3#]' );
define( 'NONCE_KEY',        'oS16JD7nvRL|D<4~L8W^za3 gT<?@&SO9jpu3}`<0s>9)2TM)FJysP0~x}b6lmEG' );
define( 'AUTH_SALT',        '|NwCh0*,,@=dKg[gc^BTcvt8yig]NB+pIX)4$h8rbJ|K}ZE,<R],KUc+z[ew*lTp' );
define( 'SECURE_AUTH_SALT', 'TgKG39}=69bk/mW&euZq6.3PGyR ?Fb!}n}M7W+>e]);IhlaD,zHq%.*J,&;qLY}' );
define( 'LOGGED_IN_SALT',   '4n@Hd_sTz-Kas [pI1<`!Bnv~$0,>(A{_ s<;I}{,d-7dUL*@_ywIi>Tr9dK!a J' );
define( 'NONCE_SALT',       ';?/oY:sVfLFoA3|$$vNLz4;dX~S7NngmK&G(zK6,HYDY8Xr`5/Z mYd`CG?p$: 9' );

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
