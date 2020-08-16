<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Resulta_Test
 * @subpackage Resulta_Test/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Resulta_Test
 * @subpackage Resulta_Test/admin
 * @author     Your Name <email@example.com>
 */
class Resulta_Test_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $resulta_test    The ID of this plugin.
	 */
	private $resulta_test;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $resulta_test       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $resulta_test, $version ) {

		$this->resulta_test = $resulta_test;
		$this->version = $version;

	}

	/**
	 * Register the menu for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function admin_menu() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Resulta_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Resulta_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		add_menu_page(
	        __( 'NFL Team', $this->resulta_test ),
	        __( 'NFL Team', $this->resulta_test ),
	        'manage_options',
	        $this->resulta_test,
	        array($this, 'main_admin_page'),
	        plugin_dir_url( __FILE__ ) . 'images/resulta_logo.png',
	        90
	    );

	    add_submenu_page(
	        $this->resulta_test,
	        __( 'API Settings', $this->resulta_test ),
	        __( 'Settings', $this->resulta_test ),
	        'manage_options',
	        'resulta-test-settings',
	        array($this, 'settings_page')
	    );

	}

	/**
	 * Main Admin Page.
	 *
	 * @since    1.0.0
	*/
	public function main_admin_page()
	{
		include_once(dirname( __FILE__ ) . '/partials/resulta-test-admin-display.php');
	}

	/**
	 * API Settings Page.
	 *
	 * @since    1.0.0
	*/
	public function settings_page()
	{
		$api_url = get_option('RESULTA_TEST_API_URL');
		$api_endpoint = get_option('RESULTA_TEST_API_ENDPOINT');
		$api_key = get_option('RESULTA_TEST_API_KEY');
		include(dirname( __FILE__ ) . '/partials/resulta-test-admin-settings.php');
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Resulta_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Resulta_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->resulta_test, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * An instance of this class should be passed to the run() function
		 * defined in Resulta_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Resulta_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->resulta_test, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * Update the settings page here
	 *
	 */
	
	public function options_update() {

		if(isset($_POST['action']) && $_POST['action'] == $this->resulta_test)
		{
			$api_url = ( isset( $_POST['api_url'] ) && ! empty( $_POST['api_url'] ) ) ? esc_attr( $_POST['api_url'] ) : 'http://delivery.chalk247.com/';
			$api_key = ( isset( $_POST['api_key'] ) && ! empty( $_POST['api_key'] ) ) ? esc_attr( $_POST['api_key'] ) : '74db8efa2a6db279393b433d97c2bc843f8e32b0';
			$api_endpoint = ( isset( $_POST['api_endpoint'] ) && ! empty( $_POST['api_endpoint'] ) ) ? esc_attr( $_POST['api_endpoint'] ) : 'team_list/NFL.JSON';

			update_option('RESULTA_TEST_API_URL', $api_url);
			update_option('RESULTA_TEST_API_KEY', $api_key);
			update_option('RESULTA_TEST_API_ENDPOINT', $api_endpoint);

		}
	}
}
