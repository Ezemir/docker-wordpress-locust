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
define( 'DB_NAME', 'wordpress');

/** MySQL database username */
define( 'DB_USER', 'usr-wordpress');

/** MySQL database password */
define( 'DB_PASSWORD', 'pwd-wordpress');

/** MySQL hostname */
define( 'DB_HOST', 'mysql:3306');

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '322eeb2c73880c76b6959afac5287b8fd355a8a7');
define( 'SECURE_AUTH_KEY',  '9eb29732fde665662afb7b43bdfb18ea2393613b');
define( 'LOGGED_IN_KEY',    'c535ea464ae2f9d6f11967288c30068b4264852a');
define( 'NONCE_KEY',        'ac55cd93a70733b0a6f1a8260fadfc651bf693d9');
define( 'AUTH_SALT',        '6b8b875aa5571946f2ddfebeddd573bf454a0942');
define( 'SECURE_AUTH_SALT', 'a8ec9c482cb10cbf67b69b9973b089f34b8f2fda');
define( 'LOGGED_IN_SALT',   'c72d81b560f7642deda8aa8b393f469c9b4ba26d');
define( 'NONCE_SALT',       'e0fe278e0bc94626051798fd74b0844707e1bfc7');
define( 'JWT_AUTH_SECRET_KEY', 't_D3o]?Hc+.*1]%)z)sVN7LI-yuf9-s>^$h@`jF;R~$P+60Nz ^`ul@li_9XQYoO');
define('JWT_AUTH_CORS_ENABLE', true);

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

// If we're behind a proxy server and using HTTPS, we need to alert WordPress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
