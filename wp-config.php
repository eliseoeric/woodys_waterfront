<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
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
define('DB_NAME', 'wp_node_woodys');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '~b#Bj>D6(1nL`BiWIi@R<4`/-%*U85sq@MNTA@LIO~?u2VO7|!0/=43|%NuTQMXC');
define('SECURE_AUTH_KEY',  ',|l`CO`<JxrIU=?om>QXqa-rXT~Z-!94f<k:lhfZ#lXk,O4a>WMUX0qp&gj6}ySu');
define('LOGGED_IN_KEY',    'ox}DW+W7o=GS{=hTk|8<b`wYOnEX--kiw@F2z}d}#e4{N$ nWE02-D>aODXbcMBh');
define('NONCE_KEY',        'AMcTg.3)Kb>Sjk# ,S-)q,-GBPf6|>Z^*t^9cf/mHyT03W6(6f!- jPVou-B1C:o');
define('AUTH_SALT',        'h<&(4/#9EZ2|T+Oi0u)KE/<u}VY{Fa$Pvh[<:Ej-S#I+HkuM#h?O|H:j?|Z6sxU-');
define('SECURE_AUTH_SALT', 'oQ+sX8q.1T|9qX$RW+VQoM@{mJK8snjT|=cq6ztw%Hh$fGn?f</M du2-x^$+PD^');
define('LOGGED_IN_SALT',   '&)O:N1HYm0JG3=X+%woXe^#x:Fhwy5gGQG|}~1 =-$3B 76l*:U6tnk8vIf_,l6=');
define('NONCE_SALT',       'Ic24zji^ZBeIrVb>)|D)HkBl2C(aMt@?9=YZ8DUo/lxb-PJ@/..bqKTc|$./(z`R');

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
