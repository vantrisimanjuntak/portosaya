<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'akuu' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



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
define( 'AUTH_KEY',         'a1greJ9U8G8524AhqJjwuohRr1jgJ5hNpczCb82bFgNz7YsSAMw1nLjxY1w9YKj3' );
define( 'SECURE_AUTH_KEY',  '8ysZoxnmLKc1Qr74GHozClIBGFLlWOdSxCEJbXokwXAWxTfHOdROAjCbCUKVx4aj' );
define( 'LOGGED_IN_KEY',    'vbvgmIr1rZccOSpAQkwX8AzWVQ011V9Tdj6x4ShikeZ3t4gmamw4nlytQ2NtKm5g' );
define( 'NONCE_KEY',        '7BW39pp9vPYzaRmv0OxVDVxgkZ1IesI1NoWYHnw80Z38jzpR6sICyTieNacyLIFD' );
define( 'AUTH_SALT',        'WQLjHDhKWht8UnWMC0puaoCzT7ktEoYbgSd28r8M1gJc6qHcyvsv81RsslWbA9Yo' );
define( 'SECURE_AUTH_SALT', 'W4E1EKdBHElehcVNMVBhA7f2s2kILyfHdgI0U0RaRGzIlSegFE6g9hzPB7oxwTBU' );
define( 'LOGGED_IN_SALT',   'dUffN3T0Shl8OLMOyWd1bNzkn2zAwlQ3tyQqRn0wKWyNXsMhgAUNsrL2HlOdWrkt' );
define( 'NONCE_SALT',       'N4hdWNZOBshX4xX4Q3nseeMbWpCeO08CRG2RLZn6ENLAIG6vf1d7UfRLfTpNfdUj' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
