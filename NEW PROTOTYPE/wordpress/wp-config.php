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
define('DB_NAME', 'asmaraSpaDatabase');

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
define('AUTH_KEY',         'd?aeKT4xD%B13 Ysl+vt3!!l<sNydmZf |1cS=#ho~hcL=jZt-`_V(I$$@8QTTL9');
define('SECURE_AUTH_KEY',  'd(mU*f65&cT8Qy(c :{A&CfLp>bcI#{HkY]f+u:Cx;s{>T_fI<~@LX6y;qpf4)WC');
define('LOGGED_IN_KEY',    'bB>IIytF)Sf?J PD**`Y/an X$A1Mp&y?!?(hFk7|-~:k.#tv{VYQ b>r[jy7.zV');
define('NONCE_KEY',        ' hK(Ud%Z-^VW+()aEuoX0g:4TK.=;6Xbc4,2:^cBhfTYn]V{3o6@y>X^EzELR<jf');
define('AUTH_SALT',        '2B<`W^4Q&Q?&W`Qovi?PV_$5A^G%M+vo>[!%Dqs3#Tq[>B=4og@*[Ra5Y&0=f0Vy');
define('SECURE_AUTH_SALT', '6)-XPX`unm#3E<OFC#Bj$R>]WJv$%20y]MTz-hQItICq?>]:/D;s`TebCqBa2*l`');
define('LOGGED_IN_SALT',   'Y?Q$ E}2|L!NGE}|@5@7msGHo.[Z1X]Y|PIu64eDM)R=*^#<=F@t#e(1n~7P[CMg');
define('NONCE_SALT',       'FM1FGPh:q%6%b+Jv7zoH.jeS{T(b))_cjIC,LiG]5(jCHF]`AlBZLq>p%(1lz`Rs');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_testsite';

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
