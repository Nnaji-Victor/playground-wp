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
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'qeHs9kv//ZFo0xi18FM8QqC2Y6CeA4OkYv778fr+0MWGBQWhWxWDnfQr/+2Xq+p+IoT0putKhnlhKpBJJIVxfA==');
define('SECURE_AUTH_KEY',  'nfib/gHwrRzrWldQo/mV3x0igKG4CIbGHAC34JgfD0DneVmIk4GJHJ981XnNmtYpL+Q2CCG4pFz0LdcCF65gSg==');
define('LOGGED_IN_KEY',    '8utWi7rkpjgxsiRh+PLP0/xr3zKoxKkNDIHUN/KNTw25AcCtKyNQOdhqW174OMi4UCsvkpyWR1LZITgb1oRCkA==');
define('NONCE_KEY',        'VyWEK1NYvVYUvFdLokzmrdft4o1XftOaUrf/j+/8G26MSLv87qK+DgVbKeTVI834lzmwUFlGPjLWzBiGc+appA==');
define('AUTH_SALT',        'SqbQ7PaMsfedo82m0xB99FGiKRCQRPem2GGmBP9NGpuQ8kO2jAsEDTsgaQTKXqc6KVEJwLAeLgUftNwDVeE/5Q==');
define('SECURE_AUTH_SALT', '5E50uxzGnCYZ3Q/Gh4yRbzoh8WUOinliD0OuRqUDb9N5FOtdYcRHuOYah61Hl6ctp6Ml+ZG/ge77NPBP49y53Q==');
define('LOGGED_IN_SALT',   'MQ/jdBj8q1ZM98fAxgCyXWyxQ+IIXD2BOFmxoHo2t4K450ml5rTyF26owyNZed1TEU6+h66YxcLpdruBI2XOsQ==');
define('NONCE_SALT',       'LTuW5lsIunnQc8Q9oXOU6doQUN/Fo1d3Zni3672m7SBCMhnBjfqBxG1icYJMS5y6K1DBKrid4rfIo9yOwEPUeg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
