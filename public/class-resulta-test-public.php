<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Resulta_Test
 * @subpackage Resulta_Test/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Resulta_Test
 * @subpackage Resulta_Test/public
 * @author     Your Name <email@example.com>
 */
class Resulta_Test_Public {

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
	 * @param      string    $resulta_test       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $resulta_test, $version ) {

		$this->resulta_test = $resulta_test;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Resulta_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Resulta_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
	
		wp_enqueue_style( $this->resulta_test.'-tablesorter-pager', plugin_dir_url( __FILE__ ) . 'css/jquery.tablesorter.pager.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->resulta_test.'-tablesorter-theme-blue', plugin_dir_url( __FILE__ ) . 'css/theme.blue.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->resulta_test, plugin_dir_url( __FILE__ ) . 'css/resulta-test-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Resulta_Test_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Resulta_Test_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		wp_enqueue_script( $this->resulta_test.'-tablesorter-main', plugin_dir_url( __FILE__ ) . 'js/jquery.tablesorter.combined.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->resulta_test.'-tablesorter-pager', plugin_dir_url( __FILE__ ) . 'js/jquery.tablesorter.pager.min.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( $this->resulta_test.'-tablesorter-custom-control', plugin_dir_url( __FILE__ ) . 'js/pager-custom-controls.js', array( 'jquery' ), $this->version, false );

		wp_enqueue_script( $this->resulta_test, plugin_dir_url( __FILE__ ) . 'js/resulta-test-public.js', array( 'jquery' ), $this->version, false );

	}

	public function getTeamList($conference=false, $division=false)
	{
		$api_url = get_option('RESULTA_TEST_API_URL');
		$api_endpoint = get_option('RESULTA_TEST_API_ENDPOINT');
		$api_key = get_option('RESULTA_TEST_API_KEY');
		
		//http://delivery.chalk247.com/team_list/NFL.JSON?api_key=74db8efa2a6db279393b433d97c2bc843f8e32b0

		$response = wp_remote_get( $api_url . $api_endpoint . '?api_key='.$api_key );

		$teams = [];

	    try {
	 
	        // Note that we decode the body's response since it's the actual JSON feed
	        $json = json_decode( $response['body'] );
	        //print_r($json);

	        //Check if we have the data or return empty
		    $teamList = isset($json->results->data->team) && count($json->results->data->team) ? $json->results->data->team : [];

		    //Aggregate the result
		    foreach ( $teamList as $team) 
		    {
		      if($conference && $team->conference != $conference)
		      {
		      	continue;
		      }

		      if($division && $team->division != $division)
		      {
		      	continue;
		      }
		      
		      $teams[] = $team;
		    }

		    $teams;
	 
	    } catch ( Exception $ex ) {
	        $json = null;
	    } // end try/catch
	    	
	    return $teams;
	}

	/**
	* Function to get unique Conferences for the filter
	*/
	public function getConferences($teams)
	{
		$conferences = [];

		if(count($teams))
		{
			foreach($teams as $team)
			{
				if(!in_array($team->conference, $conferences))
				{
					$conferences[] = $team->conference;
				}
			}

			//Sort alphabetically
			sort($conferences);	
		}

		return $conferences;
	}

	/**
	* Function to get unique Divisions for the filter
	*/
	public function getDivisions($teams)
	{
		$divisions = [];

		if(count($teams))
		{
			foreach($teams as $team)
			{
				if(!in_array($team->division, $divisions))
				{
					$divisions[] = $team->division;
				}
			}

			//Sort alphabetically
			sort($divisions);

		}

		return $divisions;
	}

	/**
	* Function for displaying team list on frontend
	*/
	public function nfl_team_sc($atts)
	{
		$atts = shortcode_atts( array(
	        'conference' => false,
	        'division' => false
	    ), $atts);
		extract($atts);
		$teams = $this->getTeamList($conference, $division);
		$conferences = $this->getConferences($teams);
		$divisions = $this->getDivisions($teams);

		ob_start();
			include(dirname( __FILE__ ) . '/partials/resulta-test-public-display.php');
		$content = ob_get_clean();
		return $content;
	}
}
