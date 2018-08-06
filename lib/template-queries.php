<?php
/**
 * Template Queries
 *
 * Provides information about the site's structure. 
 *
 * @package McBoots-2018
 * @since 0.1
 */

namespace McBoots\Template;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// returns which sidebar to display, or null if none
function display_sidebar () {
	// special case for front page
	if ( is_front_page() ) {
		return null;
	}

	$post_type = get_post_type();
	if ( $post_type == 'post' )  {
		return 'blog';
	} else {
		return 'primary';
	}
}

// returns whether this page has a full-width aside between content and footer
function display_footbar () {
	return false;
//	return is_front_page();
}

// returns Bootstrap class for main part of content area
function main_class () {
	return display_sidebar() ? 'col-md-9' : 'col-sm-12';
}

// returns Bootstrap class for sidebar part of content area
function sidebar_class ( $sidebar='sidebar-primary' ) {
	return 'col-md-3';
}
