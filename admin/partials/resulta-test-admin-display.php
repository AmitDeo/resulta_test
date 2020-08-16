<?php

/**
 * Provide a admin area main view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Resulta_Test
 * @subpackage Resulta_Test/admin/partials
 */
?>

<h2><?php _e('NFL Team', $this->resulta_test ); ?> </h2>

<p><?php _e('To display the NFL team list on the frontend. Copy the following Shortcode and paste it on your content editor.', $this->resulta_test ); ?> </p>
<p><code>[nfl-team-list]</code></p>
<p><?php _e('To display team from particular conference and/or division, use attributes `conference="conference_name" and/or `division="division_name"`:', $this->resulta_test ); ?></p>
<p><code>[nfl-team-list conference="National Football Conference" division="North"]</code></p>
