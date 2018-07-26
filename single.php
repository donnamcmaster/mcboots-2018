<?php
/**
 * The template for displaying a single post. 
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use McBoots\Views;

while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/page', 'header' );
	echo Views\render_singular( get_post_type() );
endwhile;