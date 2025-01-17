<?php
/**
 *
 * @link              https://github.com/saqibsarwar/quick-and-easy-faqs
 * @since             1.0.0
 * @package           Quick_And_Easy_FAQs
 *
 * @wordpress-plugin
 * Plugin Name:       Quick and Easy FAQs
 * Plugin URI:        https://github.com/saqibsarwar/quick-and-easy-faqs
 * Description:       A quick and easy way to add FAQs to your site.
 * Version:           1.0.1
 * Author:            M Saqib Sarwar
 * Author URI:        http://saqibsarwar.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       quick-and-easy-faqs
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'QE_FAQS_PLUGIN_BASENAME', plugin_basename(__FILE__) );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-quick-and-easy-faqs-activator.php
 */
function activate_quick_and_easy_faqs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quick-and-easy-faqs-activator.php';
	Quick_And_Easy_FAQs_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-quick-and-easy-faqs-deactivator.php
 */
function deactivate_quick_and_easy_faqs() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-quick-and-easy-faqs-deactivator.php';
	Quick_And_Easy_FAQs_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_quick_and_easy_faqs' );
register_deactivation_hook( __FILE__, 'deactivate_quick_and_easy_faqs' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-quick-and-easy-faqs.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_quick_and_easy_faqs() {

	$plugin = new Quick_And_Easy_FAQs();
	$plugin->run();

}
run_quick_and_easy_faqs();