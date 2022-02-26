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
define( 'DB_NAME', 'itarenas' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '~6i3=;YMMS[3.m e9UgD|LQnjt-}t>Wc>O.EFsB:+*szM5+!F3%JtS&-E)A98P8$' );
define( 'SECURE_AUTH_KEY',  'YcO<[qoi}#L^eQY2E/Be2 WG|3RC|]rhq5W~(l<h{q6e0mn#hs}Q2eaCKk#Vv-_X' );
define( 'LOGGED_IN_KEY',    '&|54/1#<gkU,y6ghSTn@!;uVCcY2j[aWY2&>?&m#FV9%agC&( vL[KS$+<Z<N=kj' );
define( 'NONCE_KEY',        'r^k<ICl6:UR??.+egU9y{|SAhtF6=.[):RS~t7Z)gXCO9H{ 20 ?}~_oi-eDb?x]' );
define( 'AUTH_SALT',        '%h4v`B!r$/lQZaoEdJFCDi6<D-9N,@U7]wG=y^U;1r+sy|qKF2}(3W/(#wm}6]wm' );
define( 'SECURE_AUTH_SALT', 'j&RX6%rNCr[+O|OfJuA?5PZZ`G~*?{<]cY(Q4#))[T,7po7_r;&`w4Q&`N <<COF' );
define( 'LOGGED_IN_SALT',   'cu)]p&^A/tW`7dL|p2)I&<Wi%U;U<qm#ymvB-<iVm#l$lv7M99#8X.6F16En4c[h' );
define( 'NONCE_SALT',       '7dBTPksux1SOu.`T5v18u@lmYAb:Td}:eFU!!$m(6~*!{pT]SgFf?13ENN*tG#[T' );

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
