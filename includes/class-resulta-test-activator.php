<?php

/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Resulta_Test
 * @subpackage Resulta_Test/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Resulta_Test
 * @subpackage Resulta_Test/includes
 * @author     Your Name <email@example.com>
 */
class Resulta_Test_Activator {

	/**
	 * API Options
	 *
	 * Adding default API options on plugin install.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		update_option('RESULTA_TEST_API_URL', 'http://delivery.chalk247.com/');
		update_option('RESULTA_TEST_API_ENDPOINT', 'team_list/NFL.JSON');
		update_option('RESULTA_TEST_API_KEY', '74db8efa2a6db279393b433d97c2bc843f8e32b0');
	}

}
