<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://wordpress.org
 * @since             1.0.0
 * @package           Resulta_Test
 *
 * @wordpress-plugin
 * Plugin Name:       Resulta Test Plugin
 * Plugin URI:        http://wordpress.org/
 * Description:       This is a plugin developed as a test for Resulta. It uses the "WordPress Plugin Boilerplate".
 * Version:           1.0.0
 * Author:            Phailendra Deo
 * Author URI:        https://www.linkedin.com/in/amitdeoo/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       resulta-test
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * 
 */
define( 'RESULTA_TEST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-resulta-test-activator.php
 */
function activate_resulta_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-resulta-test-activator.php';
	Resulta_Test_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-resulta-test-deactivator.php
 */
function deactivate_resulta_test() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-resulta-test-deactivator.php';
	Resulta_Test_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_resulta_test' );
register_deactivation_hook( __FILE__, 'deactivate_resulta_test' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-resulta-test.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_resulta_test() {

	$plugin = new Resulta_Test();
	$plugin->run();

}
run_resulta_test();
