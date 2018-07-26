<?php
/**
 * Configure Theme Support
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_action( 'after_setup_theme', function() {

	// makes the featured image box show up in custom post types
	add_theme_support( 'post-thumbnails' );

	// tell wordpress to output the title tag
	add_theme_support( 'title-tag' );

	// print a breadcrumb trail just below the page header
	add_theme_support( 'breadcrumbs' );

	// make theme available for translation.
	load_theme_textdomain( 'mcboots', get_template_directory() . '/languages' );

	// switch default core markup to output valid HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	// options specific to McBoots
//	add_theme_support( 'mcboots-sidebars' );
//	add_theme_support( 'mcboots-blog' );

	$GLOBALS['content_width'] = 1140;
});

// customize excerpt parameters 
//define( 'MCB_MAX_EXCERPT_LENGTH', 80 );
//define( 'MCB_EXCERPT_MORE', ' [&hellip;]' );
