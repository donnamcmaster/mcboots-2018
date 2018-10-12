<?php
/**
 * Template Pieces
 *
 * Default functions for the detailed parts of templates, such as entry meta and page navigation. 
 * Called from template-parts/content*.php. 
 * 
 * @package McBoots-2018
 * @since 0.1
 */

namespace McBoots\Pieces;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Post: Entry Meta Header
 *
 * Prints HTML with meta information for the current post-date/time and author.
 * This version is from _s but modified to remove last update time. 
 */
function post_entry_meta_head ( $is_singular ) {
	$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
	$posted_on = sprintf(
		esc_html_x( 'Posted %s', 'post date', 'mcboots' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);

	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'mcboots' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);
?>

	<div class="entry-meta">
		<span class="posted-on"><?= $posted_on; ?></span> <span class="byline"><?= $byline; ?></span> <?= edit_post_link(); ?>
	</div>

<?php
}


/**
 * Post: Entry Meta Footer
 */
function post_entry_meta_foot ( $is_singular ) {
	// print byline if defined
	$byline = get_post_meta( get_the_ID(), 'byline', true );
	if ( $byline && $is_singular ) {
?>
	<p class="byline author vcard">
		<?php echo $byline; ?>
	</p>

<?php
	}

	$categories_list = get_the_category_list( ', ' );
	$tag_list = get_the_tag_list( '', ', ' );
?>
	<p class="entry-meta">
	Posted <time class="published" datetime="<?php echo get_the_time('c'); ?>"><?php echo get_the_date(); ?></time>
<?php
	if ( $categories_list ) {
		echo ' in ', $categories_list;
	}
	if ( $tag_list ) {
		echo "<br>Tagged $tag_list";
	}
?>
	</p>

<?php
}


/**
 * Small bits
 */
function entry_meta_head ( $post_type, $is_singular ) {
	if ( ( $post_type == 'post' ) && !is_search() ) {
		post_entry_meta_head( $is_singular );
	} else {
		return false;
	}
}

function entry_meta_foot ( $post_type, $is_singular ) {
	if ( ( $post_type == 'post' ) && !is_search() ) {
		post_entry_meta_foot( $is_singular );
	} else {
		return false;
	}
}

function post_navigation ( $post_type, $is_singular ) {
	if ( $post_type == 'post' ) {
		the_post_navigation();
	}
}

function link_pages () {
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages: ', 'mcboots' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) );
}

function report_page_num () {
	global $numpages, $multipage;
	if ( !$multipage ) {
		return;
	}
	$this_page = get_query_var( 'page' );
	$this_page = $this_page ? $this_page : 1;
?>
	<div class="this-page">Page <?= $this_page; ?> of <?= $numpages; ?></div>
<?php
}

function render_comments ( $post_type, $is_singular ) {
	// if comments are open or we have at least one comment, load up the comment template.
	if ( $is_singular && ( $post_type == 'post' ) && ( comments_open() || get_comments_number() ) ) {
		comments_template();
	}
}
