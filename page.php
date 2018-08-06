<?php
/**
 * The default template for displaying a page. 
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/page', 'header' );
	get_template_part( 'template-parts/content-single', 'page' );
endwhile;