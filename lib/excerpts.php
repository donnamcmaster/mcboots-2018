<?php
/**
 * Custom Post Excerpts
 *
 * - values for excerpt_length and excerpt_more filters are defined in lib/setup/config.php
 * - to generate excerpt for content that's outside the loop, use function get_custom_excerpt
 * - to override length or "more", add a filter with a priority value higher than 10
 *
 * @package McBoots-2018
 * @since 0.1
 */

namespace McBoots\Excerpts;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if ( defined( 'MCB_MAX_EXCERPT_LENGTH' ) ) {
	add_filter( 'excerpt_length', function ( $length ) {
		return MCB_MAX_EXCERPT_LENGTH;
	}, 20 );
}
if ( defined( 'MCB_EXCERPT_MORE' ) ) {
	add_filter( 'excerpt_more', function ( $more ) {
		return MCB_EXCERPT_MORE;
	}, 20 );
}


/**
 *	Returns a "continue" link for excerpts
 *	- defaults to current $post->ID
 */
function read_more_link ( $post_id ) {
	return ' <a href="'. get_permalink( $post_id ) . '" class="read-more">' . apply_filters( 'excerpt_more', MCB_EXCERPT_MORE ) . '</a>';
}

/**
 *	Trim excerpt outside the loop
 *	- similar to wp_trim_excerpt in wp-includes/formatting.php
 *	- but can't use wp_trim_excerpt because it only works on current post in the loop
 *	- also this function allows special case override of default excerpt length
 */
function trim_excerpt ( $text='', $excerpt_length=null ) {
	$text = wpautop( wptexturize( strip_shortcodes( $text ) ) );
	$text = str_replace( ']]>', ']]&gt;', $text );

	// allow this function to override normal excerpt length
	$excerpt_length = !is_null( $excerpt_length ) ? $excerpt_length : apply_filters( 'excerpt_length', 55 );
	$excerpt_more = apply_filters( 'excerpt_more', ' ' . '[&hellip;]' );

	$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	return $text;
}

/**
 *	Custom excerpt code
 *	- similar to wp_trim_excerpt in wp-includes/formatting.php
 *	- but can't use wp_trim_excerpt because you can't use apply_filters( 'the_content' ) outside loop
 *	- also this function allows special case override of default excerpt length
 */
function get_custom_excerpt ( $post_id=null, $excerpt_length=null, $read_more_link=false ) {
	$post_to_excerpt = get_post( $post_id );
	if ( empty( $post_to_excerpt ) ) {
		return '';
	}
	$text = $post_to_excerpt->post_excerpt ? $post_to_excerpt->post_excerpt : $post_to_excerpt->post_content;
	$text = trim_excerpt( $text, $excerpt_length );
	if ( $read_more_link ) {
		$text .= read_more_link( $post_to_excerpt->ID );
	}
	return $text;
}
