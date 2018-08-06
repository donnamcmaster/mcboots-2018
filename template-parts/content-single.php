<?php
/**
 * Content Block - Singular
 *
 * Default template part for displaying the main content area of one singular post 
 * (of any type) or page.
 * 
 * Uses WordPress template functions and assumes that we are in the loop. 
 *
 * Does not include the <h1> as that is in page-header.php
 *
 * This template may be overriden by creating a file specific to the post type: 
 * content-single-{post_type}.php
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use McBoots\Pieces;
$post_type = get_post_type();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?= Pieces\entry_meta_head( $post_type, true ); ?>
	</header><!-- .entry-header -->

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
		<?= Pieces\entry_meta_foot( $post_type, true ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

<?php
	Pieces\post_navigation( $post_type, true );
	Pieces\render_comments( $post_type, true );
