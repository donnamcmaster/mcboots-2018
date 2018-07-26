<?php
/**
 * Body Class
 *
 * - adds the post type and slug to the <body> class, e.g., "page-about" 
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_filter( 'body_class', function( $classes ) {
    global $post;

    if ( isset( $post ) ) {
    	$classes[]= "{$post->post_type}-{$post->post_name}";
    }
    return $classes;
});
