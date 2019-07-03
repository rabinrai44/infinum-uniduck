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
define( 'DB_NAME', 'database_uniduck' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'j4#Tg6c4:uT7Dw=F/dJQYk@=Wfv5l7Mjj`J61(uOE;BQA@ks5U#3}xN4LXIbLz8D' );
define( 'SECURE_AUTH_KEY',  'mCk1Yk:nue5KJ.eN=3{b~_5m,SfQ}0T`b}fZ>=7WEx6S]YZ Rg$0)KKz=IBoDt_C' );
define( 'LOGGED_IN_KEY',    '(oI5Z{mwF6#^dUsg*S<GLkTMY,yW8_~+PUJd.RC],j|$Zef%S68#aPn{rkv[=O{k' );
define( 'NONCE_KEY',        'HH;cni$`|$&J!7$K6Kn}JK% bs];S73m<w?wz9!=y4N:eq|bv({Q|OO/A3fH?lHr' );
define( 'AUTH_SALT',        'gZ}9nT@.2q{:2B+c*x])$wqDcqEZs_fA6[O2fIGn~{h/.;VzUTC|n/sPW2nHsIKx' );
define( 'SECURE_AUTH_SALT', 'wvZS8&_(&GGaaZAzvEuST#;Y~S^^do4G#uQQFqGi!wh%k{IDpQrzX&}.,PZI`X|B' );
define( 'LOGGED_IN_SALT',   '0f3l!`OiO*OSnsRXikT[b; !]3GD0I(>cKNA$ak}CHVof<:C_3ZbU*7n8K7veE#s' );
define( 'NONCE_SALT',       'jPD8/wpAR7$p}sjGCt+oiVXA<w7>|Vn[u@Sbj}BWVpT[`AN.c}?~C |)hR^er;!i' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ic_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
