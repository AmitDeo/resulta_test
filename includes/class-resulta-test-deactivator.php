<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Resulta_Test
 * @subpackage Resulta_Test/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Resulta_Test
 * @subpackage Resulta_Test/includes
 * @author     Your Name <email@example.com>
 */
class Resulta_Test_Deactivator {

	/**
	 * API Options
	 *
	 * Adding default API options on plugin install.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		delete_option('RESULTA_TEST_API_URL');
		delete_option('RESULTA_TEST_API_ENDPOINT');
		delete_option('RESULTA_TEST_API_KEY');
	}

}
