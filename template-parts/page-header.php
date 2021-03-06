<?php
/**
 * Page Header
 *
 * Prints the <h1> header for the current "page."
 * "Page" is used here as a generic term, and includes singleton posts, indices, archives,
 * 404s, search results, etc. 
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use McBoots\Titles;
use McBoots\Pieces;
?>

<header class="page-header">
	<h1><?= Titles\title(); ?></h1>
	<?php Pieces\report_page_num(); ?>
</header>
