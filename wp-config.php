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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'codeline_wordpress');

/** MySQL database username */
define('DB_USER', 'codeline');

/** MySQL database password */
define('DB_PASSWORD', 'LCVnmV8HhaVsLD6r');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '>Xv5b-Ma6eLzy*ACd4H~Y86;&lD[-Ao77=%w!q~c$ihkY{*eFhmL0k9f|Z9dw@S|');
define('SECURE_AUTH_KEY',  '27~5iIT-9s[Rs8:X:/_fg2ed<4rIP*_UtllS^]x~%S7Pkjt[y>3e/E%vNIOH`SLF');
define('LOGGED_IN_KEY',    '9t=-o7IK$!)nY:r|?W8($}`rgyAPs9:cg[D[8#L@1qzj~Ka%#Gt{jhFce.K{Ln|G');
define('NONCE_KEY',        ':PQT@Ru4:Ke$k<k*#[]CV4qtq@GQ{xMW7]UX(L_iaMAm!:;rdy_h^_5#i3jv~.)>');
define('AUTH_SALT',        '?7dxO:yMr(FJ)d%b{ i?d;GxA8z1Ti=ODt DNlqN q25=v,,kN!n@JfNezuuEv`T');
define('SECURE_AUTH_SALT', 'aHS)7qs!ylpj[f+gA-h HXlttjO=nA-]^0OZgHv?Hb,`%3=bbsrP&Qdp9Pl+75-e');
define('LOGGED_IN_SALT',   'FNuX@ol=:I3F^ q:~wAxu:x02;30MZAbr%/]=rrV:5HF-@&}j{:}[g|KH4AaFXry');
define('NONCE_SALT',       'o$7y1fbd-^?DweRF75HboW&r9+uyWBMJX-.]!K*Wu8gf>FCl_96E%!U/Q^n JD3?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
