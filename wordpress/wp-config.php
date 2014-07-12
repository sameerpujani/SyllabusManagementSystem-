<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'PARAM');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '+U1g!YP[]F-?Z*+e8M}plgXt9_dZwaM+F?K_Sev`uk%.L)2U_.q`y@cDN/l-<gsN');
define('SECURE_AUTH_KEY',  ',7hf!&XFmuHO~dA-vEg(Et!b~;Bfe{}Id(2{.p[7)*z~GKi-r-^)JZE$X?L{rP9>');
define('LOGGED_IN_KEY',    ')Nf=QNR{Z=Ckd_GP}qtM7Zzh7A}eDy=$l(N+.IReZZa+4d+{wG4^w[3l,W<+;)^k');
define('NONCE_KEY',        '98#_izD`DjaM+6%0`cZq[xZ|udb9=^uZCpLZ+(V8($|ZnqxHm+?=yvN<^7^Mu({ ');
define('AUTH_SALT',        'zQz?4P<{%^bI@X?I z.yRQ,z4CS=+X?B|^7J}_pvgYk!lnFgfK-<W$=K6GI0hndV');
define('SECURE_AUTH_SALT', '!5=~di.{3SC(PZO+cAhcF=dFB5|/TlJ~NUs/8WD&8jU iR%&DM2@0ru8 TJ@``:d');
define('LOGGED_IN_SALT',   'vkvP|l%-=G#w-:4!b^/*[ErcPgVd|QYmM~3-|Q+@E7}=XXng+^1%=ywmWwiT4.H ');
define('NONCE_SALT',       '}H-+a:xa@f>-nG&%Sv)1=ND_;%&IAN*p&Q$kie-2v[JGxe[+G8r7) *9vKx.nE2h');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

