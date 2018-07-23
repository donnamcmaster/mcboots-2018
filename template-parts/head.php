<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Entry Meta: Head
 *
 * Prints HTML with meta information for the current post-date/time and author.
 * This version is from _s
 *
 * @package McBoots-2018
 * @since 0.1
 */

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
