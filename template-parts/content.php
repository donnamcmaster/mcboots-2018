<?php
/**
 * Content Block - List Element
 *
 * Default template part for displaying the main content area of one post (of any type) 
 * in a page that lists multiple posts.
 *
 * Uses WordPress template functions and assumes that we are in the loop. 
 *
 * Includes generic options plus calls to optional entry meta, post nav, and comments. 
 *
 * This template may be overriden by creating a file specific to the post type: 
 * content-{post_type}.php
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

use McBoots\Pieces;
$post_type = get_post_type();
?>
<li>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			<?php echo Pieces\entry_meta_head( $post_type, false ); ?>
		</header><!-- entry-header -->

		<div class="entry-content entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- entry-content entry-summary -->

		<footer class="entry-footer">
			<?= Pieces\entry_meta_foot( $post_type, false ); ?>
		</footer><!-- entry-footer -->
	</article><!-- #post-## -->
</li>

