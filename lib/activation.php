<?php
/**
 * Activation
 * 
 * - called when the theme is first selected in admin and activated
 * - needs to be replaced with Customizer interface
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// set uploads path
add_action( 'admin_init', function() {
	update_option( 'uploads_use_yearmonth_folders', 0 );
	if ( !is_multisite() ) {
		update_option( 'upload_path', 'assets' );
	} else {
		update_option( 'upload_path', '' );
	}
});

