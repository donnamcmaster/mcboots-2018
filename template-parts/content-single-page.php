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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="entry-content">
<?php
	the_content();

	// for multi-page articles
	wp_link_pages( array(
		'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mcboots' ),
		'after'  => '</div>',
	) );
?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?= Pieces\entry_meta_foot( 'page', true ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
