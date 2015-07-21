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
define('DB_NAME', 'unitee_plugin');

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
define('AUTH_KEY',         'kA4.bzK!GDOM-E=+L<ha_57^K<&!?^}lVx+c2b([sLI&:cf1A9exLOG,O^ya3bfR');
define('SECURE_AUTH_KEY',  'FO:-?8!b_$7|0X.8t;RCxo-=q|Oa2@&ZsrfR:hR-^4H+M@8;0XsNI(C1Iw^ci A(');
define('LOGGED_IN_KEY',    '([H^Gz4fl@2c]OTx/mN7GS.|oDy^BGhAd.SiDVgjT%0n*z@:Acxs$enWdhsS`4fX');
define('NONCE_KEY',        'aJqG2M)ema(.S{*;]Vuk+LRpRhWCR47)y.().Xwkk_h)PM[r[0cjK51h6t5?PVR2');
define('AUTH_SALT',        's>Lz^j@sOwwn/1U9|&?*mo-vIxDiAyb=z#s=aDGex!H:0gBOmZcHZe@G6HF%dRqi');
define('SECURE_AUTH_SALT', '6ja (IN4f? {X0xEtm>/ylLBvV-.@^Zd8Xjx+hrR(?|HYEOJl)zMs]iLLH_DdcIw');
define('LOGGED_IN_SALT',   'HGTj/}N86N~v%vtq5nwh WOPUJNS[eMTv1D$N]zLSs6NE)Dl1ogPuWU/u^a#6U (');
define('NONCE_SALT',       'IK8aW}>9W>zkf!]@MyTzDr?<=d860D>/^Sy]|sFh]eBEx247S0SrA9~4A_[Mx2Ad');

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
