<?php
/**
 * Development environment config settings
 *
 * Enter any WordPress config settings that are specific to this environment
 * in this file.
 *
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    1.0
 * @author     Studio 24 Ltd  <info@studio24.net>
 */


// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'btn_db');

/** MySQL database username */
define('DB_USER', 'btn');

/** MySQL database password */
define('DB_PASSWORD', 'cdnCbkak8bU8kC2r');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);
define('WP_SITEURL','/');
define('WP_HOME','/');
define('WP_FULL_URL','http://btn-vb.stagingapps.net');

//SQL SERVER
define('MSSQL_HOST', '43.231.128.71:1433');
define('MSSQL_USERNAME', 'sa');
define('MSSQL_PASSWORD', 'BTNw!ndow5');
define('MSSQL_DB', 'LOSBIISME');
