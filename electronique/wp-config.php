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
define( 'DB_NAME', 'electronique' );

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
define( 'AUTH_KEY',         'T;S-fQx|n|M(s{^DIt[Y0e `ZC;3X3qCO/*t-C,ZX<${G@5%q+6*|kjL=,md?] c' );
define( 'SECURE_AUTH_KEY',  '1*%Q<9rqR1iRIirFCX?u6hGiegoJJzxi[cmRly:)Gb:I%{4|t$:nSIbev$CoLEPp' );
define( 'LOGGED_IN_KEY',    'z!L/f@OKm(<Cr7G7^Eqh7qy1`G*m!UJk*FFUag{{iU?MsP@w3$oV+Z8?*`u7#Q,_' );
define( 'NONCE_KEY',        '}T*guzS;(OXU^uUmT/32>-cx`>TQr.UavMQbOXx&^igWj)=YQ;Szg4G~/a,tx*@`' );
define( 'AUTH_SALT',        'x=(:!Mkl9~PIe@Ec,LgYSwq_/{sgU1z5Y_kpV>jgE|d^UJs`#r$P3T$p$6#YzszN' );
define( 'SECURE_AUTH_SALT', '&.-LW^=XWj!>Bl/v$MW9=*$ZxX^WvBU@SYe3g],2*l2=^|:vNQd5@B9XX95wMwG)' );
define( 'LOGGED_IN_SALT',   'uRM0>SkI,e3LQtM1d&xqXIJU=SDf&oSvI60_@f%R2z/G[=k?MLrJxX1b4O[`OV(+' );
define( 'NONCE_SALT',       '.Aq<qyu.JjmLxfp@BHAoH[knCfX`%O2M^5mDC!]zejwV6?XiLd9!/kqaks]:;^c/' );

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
