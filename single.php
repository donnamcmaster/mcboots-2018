<?php
/**
 * The template for displaying a single post. Damn well better be only one of them.
 *
 * @package McBoots
 */

use McBoots\Views;

while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/page', 'header' );
	echo Views\render_singular( get_post_type() );
endwhile;