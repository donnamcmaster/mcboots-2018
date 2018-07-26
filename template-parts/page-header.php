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

use McBoots\Titles;
?>

<header class="page-header">
	<h1><?= Titles\title(); ?></h1>
</header>
