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
define('DB_NAME', 'wp896');

/** MySQL database username */
define('DB_USER', 'wp896');

/** MySQL database password */
define('DB_PASSWORD', '8p46BS3]4-');

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
define('AUTH_KEY',         'nwmbgfkleomqm3c64pvekvqzt8oktljn6fri4e9j6esugtb6zpatfsa2vd4soozg');
define('SECURE_AUTH_KEY',  'dq0qtnex07wtvd90qawi75tnsuvqu38tdxppdvmn5hryatrsfhby81yae3ccnshg');
define('LOGGED_IN_KEY',    'zfnecjzvgfclbjpszitnwfovozocxijkdg8akjzghon3fissmtsdvwqrapzvagzn');
define('NONCE_KEY',        'buldc7wilszhsra9jrt6v6lcschoinoprg7wmexhvcbkwgilkqziloactyxjmh2i');
define('AUTH_SALT',        'bydzyuhcpnoukxusaapwgbgf7z8e5pcc4xsx29sdfwp9ph6yrfdp2ihd2jcmbozt');
define('SECURE_AUTH_SALT', 'bbthxyfxinyxhkt4s9khx7rmcmezlrhyqgbcvtd4huwmeiggexyur2rkjklgktme');
define('LOGGED_IN_SALT',   'sad42nkvqwcw8ywbwdjm8dwwsevvvrhzt0qx0mdm3fhygfqg6an88wjsjyig7itg');
define('NONCE_SALT',       'wgoqojj0gq207vhvye5uzb263izypvvwdh582fvgkz70z2gsbtyk71q1c4prtm5g');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpif_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
