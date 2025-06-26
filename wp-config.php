<?php

 // Added by WP Rocket
 // Added by WP Rocket
 // Added by WP Rocket
 // Added by WP Rocket
 // Added by WP Rocket

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
define('DB_NAME', 'hoodbuilder_wp2017');

/** MySQL database username */
define('DB_USER', 'hoodbuil_dbUser');
// define('DB_USER', 'hbuilder_usr2017');

/** MySQL database password */
define('DB_PASSWORD', 'GGg74yr&*^&%&(^wQrJsCDq?69');
// define('DB_PASSWORD', 'Rp4NG{8C,mFv');


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
define('AUTH_KEY',         '.tQfqUTILmNcIGd21Gq5nXJz^PgQ/-BDHp 3 6C94;.W$Y 4uwzv-Glla9IA8F(P');
define('SECURE_AUTH_KEY',  '^;o}|XHZA|*C(z}]U|h;#8]LSF`Q+l5a8cIVDn7:fC2KwS]t10>tRe0E<=I+8>sn');
define('LOGGED_IN_KEY',    '-h:Px~zqI&C|s+^uK=444$aOAH#^f&zQ5Iq)md$8`V*y|4(aEaNgH^VPkbs,&2q)');
define('NONCE_KEY',        'B+i3h(Ab]UUe.mo/,JnaT@Dc[LtVc+[J{<jZ9`hr#v6IoIdO4%&L;;el:jDF4cO|');
define('AUTH_SALT',        '_WU7llf|WUnk#`mM>GG_uz(|T$DRK^4Uo#df9!>pA@/:h[]ID3? {;) Vg3PkTOd');
define('SECURE_AUTH_SALT', ';p3-o3[1#]MI0VQl} ~ggY}H~k=VfP>v[6_y@b3_n=tR4UOU~Ao3?[s752v,|>]T');
define('LOGGED_IN_SALT',   ']%omf;H!P5_,$.?2~z[YVIFV+#m3R(P@IhhRVrD qa+}o.WS9|wP9+[zcDgr)@q}');
define('NONCE_SALT',       '1B0s#Hm5khPgk(rM(O&fkMs`R` 2i(x.rR9Byq!nPNUd4@l2yk}UNb$;=_<SpnNf');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');




define('ALTERNATE_WP_CRON', true);