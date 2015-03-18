<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
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
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'a es+J!mvl|@|5!nm9H|cRR8$Q-N3?k<^x^Mw&/ln2Z{-}jB5=gzp[?gL|PJ-^)#');
define('SECURE_AUTH_KEY',  '~4Sk<fMqCkXILMvt9N5%V.^+kGM%I )Apr_4|%{0l^bHRmz|s0/m(||CD:XKl?3G');
define('LOGGED_IN_KEY',    '4y+4!ET_{C(N?CLSv-HbDi_f&-|,8P-SPA-NV(T$5A|@kO9:[@b2 Gn9y?p7~@gc');
define('NONCE_KEY',        'u[eq_ m%-58?>Pv[|*^*iub#BnKhhd!<fexZjwV,$9D;Osk`U$_G5[Su418%]+J.');
define('AUTH_SALT',        'LG?cwZQ0VA9VY]c|)]q$$8TN6u&ld,W|P:u-N+C0+szIs<QF+BMOMQrNSqAoOwZ>');
define('SECURE_AUTH_SALT', '?^3C VZ3$;B,?>yldprrXDGT4|q4Vg=;l&Gp2DBR1Qdo^c7}=T zkF#?<}lj=Re|');
define('LOGGED_IN_SALT',   '#FC23Sg}tf2;~S#xPjQNNA_I4[Qf!ecM<C#v%2[}ptG_BVG(%]0T-%2&PcbdrTvE');
define('NONCE_SALT',       'nMTXbC-,~& Ztva(Zo;}|)TJ`ssI/:m5iSrR6F-|xQ&):`LIs7`6*>{Vf{Q)P9;M');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
