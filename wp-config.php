<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'DellaTera');

/** Database username */
define('DB_USER', 'root');

/** Database password */
define('DB_PASSWORD', 'Admin@123#@!');

/** Database hostname */
define('DB_HOST', 'localhost');

/** Database charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The database collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('WP_HOME', 'http://10.0.4.217/DellaTera/');
define('WP_SITEURL', 'http://10.0.4.217/DellaTera/');

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
define('AUTH_KEY',         ';#!npD1|p$V!gewSD^u~}g>@T/2B,+c> fZ*A<G_,5fk(u8v.fXP.ysMAR>~RQ@-');
define('SECURE_AUTH_KEY',  '1$9>NS.$P+M%N*l28sPQvawI|,U6:Y9c/NwxH33?$[;uZot~L5.{->A;8^*6Rj.<');
define('LOGGED_IN_KEY',    'V?3,y@L8_@9acd<O8:7w!l|cZw+QcK0i ?Upu&D@1A+5V.;@$-!;&g?s/?-xPftt');
define('NONCE_KEY',        '[Daa0L=ybQx7{m_{(jSC{l$!k>jOKqVc]S&#/VZ>fjtz=Z_ERH?o&>U6m+K<q/MJ');
define('AUTH_SALT',        '!b(s`I0^&e< q&= y7x=Y;6<f2|^QHsc:Ktbs3!8{|XlAIw.dJ5_Ge.4]W/vs v8');
define('SECURE_AUTH_SALT', '6HxW#vwZ 1~7;WN 9fzX>.7sa&J7Gg.;wB5mESWNd=.5CZ|v+9/tst&^!(V6Yo!R');
define('LOGGED_IN_SALT',   'T|hC;n,hT?>o9}+}i;((M[8W4qh<}eZWf,k 0{+#<>cfmM|cf]TyXD@%Dp%?qZtg');
define('NONCE_SALT',       '(29::.!BRb}#hL-I&6^~wNFBz8lCB*VUg I;WvSJx>dKDDvC~_an]c{7RP;t]0P|');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'dtp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);


/* Add any custom values between this line and the "stop editing" line. */
define('FS_METHOD', 'direct');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (! defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
