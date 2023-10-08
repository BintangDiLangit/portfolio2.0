<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u406840254_Ekfmx' );

/** Database username */
define( 'DB_USER', 'u406840254_V4Xz0' );

/** Database password */
define( 'DB_PASSWORD', 'EmaE2LdYj3' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          '+<~u439P.ZZ|jp/9{<ZXP5^D,S&kZ>QtCcpc:Yf=oC@PNKMfAS|Wi+c~X2U0uXX>' );
define( 'SECURE_AUTH_KEY',   'X8#2T&hUr<N.5Gh/&GRuYWOgx#1I9/&&IyQz6{/up<`qBH}hV>Tml,Zw,)aXy|}N' );
define( 'LOGGED_IN_KEY',     '%ILBvKB0+aEK;3ig]`lP*]ac2R+X{l|M|rVwqf^l5]Jr$<CU^fD@8F0QYgJ7#Q_w' );
define( 'NONCE_KEY',         '7=Fz`c{ {W<N$MXv!eH`0uuz(-~#-,QJMAcS){E2h+w^@Ct]].l>i_DEa*SD-Ekb' );
define( 'AUTH_SALT',         '(Dt4)pK UAnsAw@+{F>?X&rK>eQLwzW>=r38]9XtX!_Z%#oAzcq0#*Uf$D2?LF5d' );
define( 'SECURE_AUTH_SALT',  'UA^Kz)%?oY78TMflQ[#GTI5l5 xIAowYx9!l!!r*4z_z*dYT{B)r~G<Rk*X$[V!t' );
define( 'LOGGED_IN_SALT',    ' { o;6+l0HB;~?7K30}#h0`^)~OZWtq~Bg$dNoe;s6I&{iZh^2!muY@m8h<7Hh5M' );
define( 'NONCE_SALT',        ',WL~Rf}9E_)t![W,.dvj6ggr=(W S$`|?E5QT6uDLKr|tZq$9]&LN1B~x+9n3cu~' );
define( 'WP_CACHE_KEY_SALT', 'k#q&e?Kd8TIGmlFX3rS$wgw_. concG^vMo6x]$#~(aAOc]_??]S7,T#Y[),vs@t' );


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



define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
