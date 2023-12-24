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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define( 'AUTH_KEY',          'qkI.Ijz9]vlRebe`/MCf3T;7}F=m=i-fST9SoRg1?Hf-ffcz6dL.W~OHGn&H%@hb' );
define( 'SECURE_AUTH_KEY',   'uRuL{)4n2:U1mxu=psu1gV3?AU^80lw%x/JlAE}4=#tY6nC+#Nd.BtYV#Ax8O^%U' );
define( 'LOGGED_IN_KEY',     'z$I} gV?-Dt;]tix!+9zJCN(ssW?o:@/)l>gVhF+mv@q SLw3A::zRh:}:oBw{}.' );
define( 'NONCE_KEY',         ']`!hgw)f8ARf9!hF]s-#:@@mNbCSyNSW]Wh%xiH]G@Sw16jgDR;Nx7Ly8f@u$e&M' );
define( 'AUTH_SALT',         'Z/H);0Ad9=],%.h$VIV{S]N4$WTt(QrujTt[dTO0}r,/3[U&KUu`@YcvdhAC0ZLs' );
define( 'SECURE_AUTH_SALT',  ':^bI6;<U%jT_0aj-:Z`Bs/oI^HH<IO=`|EsaR:+0BrUIS&Y8R`0n]Awz8{&Tg7|5' );
define( 'LOGGED_IN_SALT',    'R OIHw8iWR^bi{._Bx^H~2Z0nViHg=pTL[BvIWvd.+4@+F}dDmU+e(lFP)NOH8uU' );
define( 'NONCE_SALT',        'VSOj({6evKU$yH/0x9k6.DhO0AZE~dIesI:+z-`gStE9KO;B :>Do>s!9_v+v],c' );
define( 'WP_CACHE_KEY_SALT', '$Ofp[<KZ^-5kZCa|_x8|c~7),,VJQU*3P?w9(&7ce!-Kb/*rImQc&p:)ik?YORfj' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
