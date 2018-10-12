<?php
/**
 * Template part for displaying the main content area of a page.
 * Uses WordPress template functions and assumes that we are in the loop. 
 *
 * Does not include the <h1> as that is in page-header.php
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use McBoots\Pieces;
?>

<article <?php post_class(); ?>>
	<div class="entry-content">
<?php
	the_content();
	Pieces\link_pages();
?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?= Pieces\entry_meta_foot( 'page', true ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
