=== Resulta Test ===
Contributors: Phailendra Deo
Requires at least: 3.0.1
Tested up to: 5.5
Stable tag: 5.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

This is a Wordpress test plugin for Resulta. It uses the WordPress Plugin Boilerplate(https://github.com/DevinVinson/WordPress-Plugin-Boilerplate) to develop the plugin with OOP foundation.

== Description ==

This plugin consumes the API hosted at http://delivery.chalk247.com/team_list/NFL.JSON?api_key=74db8efa2a6db279393b433d97c2bc843f8e32b0 to
display the list of NFL teams. 

== Installation ==

This section describes how to install the plugin and get it working.

1. Upload `resulta-test` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. To display the NFL team list on the frontend. Copy the following Shortcode and paste it on your content editor.
   
[nfl-team-list]
   
4. To display team from particular conference and/or division, use attributes `conference="conference_name" and/or 	`division="division_name"`:

[nfl-team-list conference="National Football Conference" division="North"]
	
== DEMO ==

Please visit this link to view the demo https://dev-testpdeo.pantheonsite.io/


== Frequently Asked Questions ==


== Changelog ==

== Arbitrary section ==
