<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Configure Navigation Menus
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_action( 'init', function() {
	register_nav_menu( 'primary_navigation', 'Primary Navigation' );
	register_nav_menu( 'action_menu', 'Action Menu' );
	register_nav_menu( 'social_media', 'Social Media Menu' );
	register_nav_menu( 'footer_menu', 'Footer Menu' );
});
