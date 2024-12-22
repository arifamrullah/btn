<?php
/**
 * Setup environments
 * 
 * Set environment based on the current server hostname, this is stored
 * in the $hostname variable
 * 
 * You can define the current environment via: 
 *     define('WP_ENV', 'production');
 * 
 * @package    Studio 24 WordPress Multi-Environment Config
 * @version    1.0
 * @author     Studio 24 Ltd  <info@studio24.net>
 */


// Set environment based on hostname
switch ($hostname) {
    case 'localhost':
        define('WP_ENV', 'development');
        break;

    case 'btn.local':
        define('WP_ENV', 'development');
        break;
    
    case 'btn-vb.stagingapps.net':
        define('WP_ENV', 'staging');
        break;

    case 'btn.staging.smooets.com':
        define('WP_ENV', 'staging2');
        break;

    case '43.231.128.127':
    default: 
        define('WP_ENV', 'production');
}

