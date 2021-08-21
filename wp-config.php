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
define( 'DB_NAME', 'kondomrey' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
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
define( 'AUTH_KEY',         '%Y+ZF-]^|l;+@5_mO]P*a;,.|akjki`BKOn3ep_#l&^}#a/rPW>>dn|Cc/Ds2of/' );
define( 'SECURE_AUTH_KEY',  'D-an}!S=Aax@ZgG-.,iFbZGivr#(L*k0yg,9(Vf0iHhBA*Xr rNwptndA>r~U3Fu' );
define( 'LOGGED_IN_KEY',    '`IoLy9uY:!+5qawE7>Xk1`(%f%Fa?H3WSJffoh!X<%Cq{CX{-]aI)5e^K{r@E_s#' );
define( 'NONCE_KEY',        'O#jCj aD+p!Z@x*IwMh^q<1:.ikq#JD5Sa6Qrw&C@e.}@BN%-P}Br>_4b}o?}]i5' );
define( 'AUTH_SALT',        'dPM<m4C;05%V^[qSmQ;O6|9vPDFuEj(`PKBU|;q7-I?Yd[8U]<mnNyW#%&z47xm1' );
define( 'SECURE_AUTH_SALT', '}Xiiv1j!(LBQ;hMNDb9%FmZZ2aMlcX(m=nRIhe_(d:+7} Qf2hlI;[%e3*+Vp}MP' );
define( 'LOGGED_IN_SALT',   '}(OZ#p/m))!}:cd{6N#@K[[8Ra,jQ_.8gnaZcmSXrD#05E{A*tHGz2JR$i-6LpY|' );
define( 'NONCE_SALT',       'OQ{dCT(m{<;-*4ovgo6!1|P%yH=SbIK6JaP892!sDhZM]9P[L$2.YdV;kcon,T V' );

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
