<?php
/**
 * Search Results Template
 * 
 * The default template for displaying search results pages, for any post type. 
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