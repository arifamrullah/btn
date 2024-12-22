<?php
/**
 * Default config settings
 *
 * Enter any WordPress config settings that are default to all environments
 * in this file. These can then be overridden in the environment config files.
 * 
 * Please note if you add constants in this file (i.e. define statements) 
 * these cannot be overridden in environment config files.
 * 
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    1.0
 * @author     Studio 24 Ltd  <info@studio24.net>
 */
  

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
define('AUTH_KEY',         'sT%b?2`TW!.1234mvhEKGW02;BxWc<,VV,/bE;#MD*TwPZ+W `e$cs?V! ,J5:Hs');
define('SECURE_AUTH_KEY',  'Z&x,D@+Fq=5DMEes$K63sN:UJ@)Q21YMQId?$,S;.c|GPv3-{JOzLZH]B7%=0298');
define('LOGGED_IN_KEY',    ';tLE@IrNxgo}atF_Octs~1234A6+6pZ#`!$O9p=GrwN%D RTBC|3g7[~Esz.Kg?^');
define('NONCE_KEY',        'i|yH8jgNo-]-2a.KR;~){U,Y492IjsU:@OY^?Na.hYKj)Z&KRO|e60#,LX2>T-?1');
define('AUTH_SALT',        '>CBF-f<|#06B+p?1234l6Tk_w;f_sLj%%W^;0keU]ic>15VqwDJ4(!,vn{vcy;-l');
define('SECURE_AUTH_SALT', 'a2HI`4)h>y[:%~C7#@[p@G1234+,yH9)^6>N2 ~#?4fR>mwi|GD]&FmqWDG|[Nf]');
define('LOGGED_IN_SALT',   '-|9}-q{c|y6biNm1234nY[va=?d]=[;Ig9y+-839;2+,B<Z%%I-uUPM8lwwW.]:>');
define('NONCE_SALT',       '8!s^Pp52;P^VjwLp-t/)_1234nq@?krIJMQC^+~h0|e_+j)H({,%`z@Lzs+.^C$5');

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
