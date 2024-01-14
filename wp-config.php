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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'my flight' );

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
define( 'AUTH_KEY',         '(W#b<Fhc`v?w+_swwI_TdzUaF1Zz+K>&I+7_M}^RswpQ{$-prC`3Cu_4ZfGx/1./' );
define( 'SECURE_AUTH_KEY',  '9]{dT0`7PAa-er#Fkm(|&Fm,J[Y3Lrd;u<$LR3G},fr=K 6(s>+ZjK4Oz7L^Y,Nr' );
define( 'LOGGED_IN_KEY',    '8zVdI]g]&H%/Bv+0+Ic>k}@qvHIWj/;Ew>2u/>+6kwV|.g#$g@]<0I_olg}LYsg=' );
define( 'NONCE_KEY',        '>Blg%P8+KiTsaK+v6F!A7IiCUX/;CmLN9w$DqB-|KrFjvqBU/hOxa@=ze!(DS[ua' );
define( 'AUTH_SALT',        'K|IQ(k,zcj4~Qtx7]1vQqpMOfI}^WX&jWa%;xa*-%m ;IL|o/WN#(@V=*2$cF>AT' );
define( 'SECURE_AUTH_SALT', '8}V=Q^2X<8(TRzDjiyKScy|Te98HjhVD o17/xIr:7ZP3nFffy<ek[.#w=l4O]~@' );
define( 'LOGGED_IN_SALT',   'qZIQi]u1O0pIEbj7ICQ5a3Svro9o5MdzBmgr_vh=w6F;Uc]iEbyy}+61q]ZUTxq$' );
define( 'NONCE_SALT',       '8 {|!pt8 L>:C{GU]>KP)<?>K?ylZ|9>Fb6Q!ftlO|8t3QJqBZXu3LF(iM3)T{*-' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
