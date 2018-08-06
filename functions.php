<?php
/**
 * McBoots functions and definitions.
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

call_user_func( function() {
	$setupScripts = [
		// initialization & configuration
		'/lib/setup/config.php',
		'/lib/setup/assets.php',
		'/lib/setup/images.php',
		'/lib/setup/menus.php',
		'/lib/setup/sidebars.php',

		// core template files
		'/lib/layout-wrapper.php',
		'/lib/body-class.php',
//		'/lib/nav-walker.php',
		'/lib/class-wp-bootstrap-navwalker.php',
		'/lib/titles.php',
		'/lib/template-queries.php',
		'/lib/template-pieces.php',

		// extras
		'/lib/excerpts.php',
		'/lib/gallery.php',
		'/lib/shortcodes.php',
		
		// some options for initial activation
//		'/lib/activation.php',
    ];

	foreach ( $setupScripts as $setupScript ) {
		require_once locate_template( $setupScript );
	}

	if ( is_admin() ) {
		include_once locate_template( '/lib/setup/admin.php' );
	}
});
