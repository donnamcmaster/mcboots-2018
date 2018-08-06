<?php
/**
 * The default template for displaying a single post of any type but page.
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/page', 'header' );
	get_template_part( 'template-parts/content-single', get_post_type() );
endwhile;