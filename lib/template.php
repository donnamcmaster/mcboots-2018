<?php
/**
 * Template Queries
 *
 * @package McBoots-2018
 * @since 0.1
 */

namespace McBoots\Template;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// does this page have a sidebar?
function display_sidebar ( $sidebar='sidebar-primary' ) {
	if ( $sidebar != 'sidebar-primary' ) {
		return false;
	}
	if ( is_front_page() ) {
		return false;
	} else {
		return true;
	}
}

// returns Bootstrap class for main part of content area
function main_class () {
	return display_sidebar() ? 'col-sm-9' : 'col-sm-12';
}

// returns Bootstrap class for sidebar part of content area
function sidebar_class ( $sidebar='sidebar-primary' ) {
	return 'col-sm-3';
}