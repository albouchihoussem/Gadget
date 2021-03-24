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
define( 'DB_NAME', 'project2' );

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
define( 'AUTH_KEY',         'hV>3N[U+~FC#75.p8a2iD0Ya{f*4[Me8:878o?7-P# Pj%a*SRITV-(|~5%4<E`.' );
define( 'SECURE_AUTH_KEY',  '@S3wM6<MdH</QZGBAA3|P]>k@7s& QSsj]>?UVgK] *?M8BdEW`ZykP-r(jR/)#T' );
define( 'LOGGED_IN_KEY',    '_&23*XGA;-~^b?e.P,yqC`l.~E8rc=7kB nJ_@<SeeUNdBOqS(p{^T{4d![xeV11' );
define( 'NONCE_KEY',        '}ZHnP9n5{n_7T;0mshkQA_rw>.|:m_2A6Jc,vu^EH/r|R-.]`adi5hL}alCM%6H?' );
define( 'AUTH_SALT',        ';nP&xV,NT:<%7p`<22/nM4{}6*+S*0 2gC@lUW!=BGb4aEf%|8tLXu0c?wbuuhWO' );
define( 'SECURE_AUTH_SALT', 'm(K8T-uAzBP#sN_PK=~%0Ht8-X;|Cx:Q/)Z0U.1)w[,](eaN`DT!^v6,l5T5dKls' );
define( 'LOGGED_IN_SALT',   '7Wq%QqYwE ~ZI2oH}hcJp u5wJ#1x#g oNN8P2! :9(9luFOV]3_|CrV5v3Ey3nY' );
define( 'NONCE_SALT',       'jN72nL-Gqh,cd>LHgVt:UJcA#{l +<=P6NrOO{Lw3[&#t;,}ub-u^nlq/L,77{)O' );

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

