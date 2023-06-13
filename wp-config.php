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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'branix' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         '*(6cke&ktd8#%e~RBdDKe{lxqj {G>f-eUi:|Orcw2x>7E,Q.|z0JC-g&@(%AV. ' );
define( 'SECURE_AUTH_KEY',  '`N/0hTtfCw*hOfNV(tDRK[a{dzazm.5M@u@ZA,(+u9Du2n}H4/k]ojYS2j|Y>j?h' );
define( 'LOGGED_IN_KEY',    'oX/qgW`b_t)3kRCN T,zB^xzJ3H7(!G&/ZS/*,8:64Ujb-*U?|zV^4X,*Cr72&D.' );
define( 'NONCE_KEY',        'd*jI+TLR`sizcOb^P2gT jQK/T| J$fQkM$a>DXj+5w:*HCYG{*[Jd$Fn1w>6x8&' );
define( 'AUTH_SALT',        '/K}JLn/nOB;,U%W<_=hE.VCvc:]e&#b,Kf,.Xuzu:V(86y#Gv3MaaLB/(Drvh973' );
define( 'SECURE_AUTH_SALT', '?838DiyzIp]R7wS<g>WWr>U|g?2]sL;&Fv3$LY(kjK:tBu=>TwdvhPZ9r%DIJL~e' );
define( 'LOGGED_IN_SALT',   'RnYq1?Y9O#%jWq+umhZdbHYw2 fh*A`0yZ&*cf23*Vu@pr[:wiDrdeb7`u,CxgIH' );
define( 'NONCE_SALT',       'vy~LHR/jd0 acH>#U_~ef&J5=?_lH.Z,susxM+3$P;$uTr3*bT&ZKa@4.&PI@cJ.' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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

