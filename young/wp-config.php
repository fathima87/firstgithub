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

$dev = true;

if($dev == true){
    define('DB_NAME', 'young');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'Ashwaq03');
}else{
    define('DB_NAME', 'young_wordpress');
    define('DB_USER', 'young_user');
    define('DB_PASSWORD', 'sUsAmI}q.nRQ');
}
/** The name of the database for WordPress */
define('DB_NAME', 'young');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'a1rh-Fhd!>90^zA1uF-C~X5;mJ{M!k^+-#ib^4ar1G0Ind%W0Ta#m6=O[CGD84SS');
define('SECURE_AUTH_KEY',  '%Qv:{9bf[@VSrXxTWu+|gNOj4s1cTZG^D_Im3bG9]fQFs`,f9,EfXV# |+[K&=#-');
define('LOGGED_IN_KEY',    'Lpu*bNElS3B-NqvQ0nL}qh|RWh;/m$W`]e8zoUq]$ R@h#A+EkjuMqJwE%D_zy~d');
define('NONCE_KEY',        'Q7Nz$p_}Cb,Bh0k&H%n| rH<4Hp|MNL{k2{(vCn~6Q:yr*y^q|,7>+M/nmGBGGxM');
define('AUTH_SALT',        'Jij,fB|QLsk|Ni!p0nhw+JH+T$7gPcvfQGR-+]v?z]rRK7cQ3eEmGfrZAMQ(U3cs');
define('SECURE_AUTH_SALT', '*Bwi#AMLd+Mzv{=#:k5/1X*##%b1e[/)_fLju9.}7I;^>q]g8S<_(Sl)P5G&JZj?');
define('LOGGED_IN_SALT',   'QpG_at*,v-RY>f*+Q7[]x7)J+Vi+m!R*yBu&l=oE&?=%3%p|,`w~$+;nnjt{[UNN');
define('NONCE_SALT',       '-dj3`|cuN-At4RETt{/ (TuD;eb$9jeL}rBd=L?NFk1ngxK N)W9r[4&q-J5/C-y');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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
