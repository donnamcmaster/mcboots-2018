<?php
/**
 * Index Template
 * 
 * The default template for displaying all non-singular pages, for any post type.
 * Used primarily for blog home (index) pages. 
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

get_template_part( 'template-parts/page', 'header' );

if ( have_posts() ) {
?>
	<ol class="post-list list-unstyled">

<?php
	while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content', get_post_type() );
	endwhile;
?>
	</ol>

<?php
	the_posts_navigation();

} else {
	// empty list
	get_template_part( 'template-parts/content', 'none' );
}