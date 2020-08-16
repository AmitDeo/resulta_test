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
<div class="wrap">
<h2><?php _e('API Settings', $this->resulta_test ); ?></h2>
<p><?php _e('This is the default API settings. You can change the API settings to load data from different location. Pleas make sure the output format is exact.', $this->resulta_test ); ?></p>
<form method="post" name="<?php echo $this->resulta_test; ?>" action="">
	 <fieldset>
        <p><?php _e('API URL:', $this->resulta_test ); ?></p>
        <legend class="screen-reader-text">
            <span><?php _e('API URL:', $this->resulta_test ); ?></span>
        </legend>
        <label for="api_url">
            <input type="text" name="api_url" value="<?php echo $api_url; ?>"></p>
        </label>
    </fieldset>
    <fieldset>
        <p><?php _e('API Key:', $this->resulta_test ); ?></p>
        <legend class="screen-reader-text">
            <span><?php _e('API Key:', $this->resulta_test ); ?></span>
        </legend>
        <label for="api_url">
            <input type="text" name="api_key" value="<?php echo $api_key; ?>"></p>
        </label>
    </fieldset>
    <fieldset>
        <p><?php _e('Endpoint for Teams:', $this->resulta_test ); ?></p>
        <legend class="screen-reader-text">
            <span><?php _e('Endpoint for Teams:', $this->resulta_test ); ?></span>
        </legend>
        <label for="api_endpoint">
            <input type="text" name="api_endpoint" value="<?php echo $api_endpoint; ?>"></p>
        </label>
    </fieldset>
    <input type="hidden" name="action" value="<?php echo $this->resulta_test; ?>">
    <?php submit_button( __( 'Save all changes', 'plugin_name' ), 'primary','submit', TRUE ); ?>
</form>
</div>