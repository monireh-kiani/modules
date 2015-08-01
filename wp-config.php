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
define('DB_NAME', 'Monika');

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
define('AUTH_KEY',         'M:<bk-V.M6[voYA&37n0WF]G86$p-/?F)ntPBy@jo$Q5W-u*3vS-3N|JsL$bERZ$');
define('SECURE_AUTH_KEY',  'ydAIi*<JxMuH$vMS1o%0mqAa6USOhV$Y*6,%(d&B(B-hD-%UErKjZ?8aD==%>K~b');
define('LOGGED_IN_KEY',    'friM=@}cpHADePCdKW:r#_1j9:gq-(dFDE:IwW%:|[/>m-[%5]-Dk3V#h&U)+,@o');
define('NONCE_KEY',        'lj#|H|w7#fmDy?3zwc-S!k`yeLOUw:L/`8R(c- A%SGVwe@o>0 bNdEqh><22ZCf');
define('AUTH_SALT',        'Ha#LtakJ;:V-Q):w{,u[@*cEa:)gikFx+:SDVoBk|Y`Dp~yf|+ag`#JJAUgW/8e{');
define('SECURE_AUTH_SALT', '*1lEu@Vp`<L%IoVS(Ho1oL+gMo@?6KCe,tlw-**C/n.J+I));^*)Ae0PTFSY>y8>');
define('LOGGED_IN_SALT',   '{/h89]|H.ffH`>zu(73P4S<nWS<CSuNpI%61l1MYo^{|a!O8``_VOh1vj|-yhd>G');
define('NONCE_SALT',       'XU#%BJ19Ai2N3oQ&7;y|WNj0p*uApf>A:Xbx&HC>%q&o~0/+k([q4R*[ED^:9:O9');

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
