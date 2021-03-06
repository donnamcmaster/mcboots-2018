<?php
/**
 *	Admin Functionality
 *
 *	- this file is included only if is_admin()
 *
 * @package McBoots-2018
 * @since 0.1
 */

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

add_filter( 'admin_init', function () {
	// block access to /wp-admin if current user can't edit 
	// (also check Ajax: http://pento.net/2011/06/19/preventing-users-from-accessing-wp-admin/)
	if ( !current_user_can( 'edit_posts' ) && !( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
        wp_redirect( '/' );
        exit;
    }
});

add_action( 'admin_head', function () {
// get rid of empty space next to media quick edit menu
?>
<style>
	#posts-filter table.media .column-title .has-media-icon~.row-actions {
		margin-left: 0;
	}
</style>
<?php
});