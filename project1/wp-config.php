<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'project1' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'd:gY>0jw&]9S>$lVHKU;jn3^u6$20_jT8Qh1wV0(}2jvjNvs8?z:aB}_+g6Uz^5/' );
define( 'SECURE_AUTH_KEY',  '(pX:O9FPOrCvhB1w%wS=qCXt++Ag;8&ebBVwR9HxAul4j.^n@`a_+/+|JWl/_${R' );
define( 'LOGGED_IN_KEY',    '# V8WwrJ&9wILwqK%V7?z0.;xk1(H`5P6`08^W;D[~p+6_0thkmEVxCQ~ k9SNx&' );
define( 'NONCE_KEY',        'F+5H);Z2?i)^*[j$p.bQLgEQy& :757*u7f=C:8E9w!_$NXB@6# =Kg. 7mt=412' );
define( 'AUTH_SALT',        't]4X}1 V5`++l9bQj-~Cv+*um<QMz$fPR7}](N-+]8X-Diqb2JB~PXTOqc<US?( ' );
define( 'SECURE_AUTH_SALT', 'sJeed Ja[zqPK$UJnwA68?dr$$>qWjBy?F^KpX6$< O%>D)N%RUbHyY >+~?pU2}' );
define( 'LOGGED_IN_SALT',   'hYEXKk#I1Lu$>-f|~P8V9_|u|HJyjCvh]fVR<`P;qu(D8_1hY8^8?B&iV}QnErqi' );
define( 'NONCE_SALT',       '%B5_:1b;%{]e/Jb/8g$6k1~v`t$uL^?/;O$$-b=l>)G2@CN,d#|ZVga.&Eq:p|5l' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define( 'FS_METHOD', 'direct' );
