<?php
/**
 * Class mcw_Breadcrumbs
 *
 * @package McBoots
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

Class mcw_Breadcrumbs {

function __construct ( ) {

	global $post;

	$this->crumbs = array();
	$this->crumbs[] = array(
		'url' => '/',
		'class' => 'home-icon',
		'name' => '<span class="text-name">Home</span>',
	);
	$this->sep = '<span class="sep"> &bull; </span>';
	$this->blog_page = get_option( 'page_for_posts' );

	// blog index page
	if ( is_home() ) {
		$this->get_page_crumbs( $this->blog_page );

	// not in the page hierarchy
	} elseif ( is_404() || is_search() ) {
		// do nothing; just print the home page link

	// taxonomy or date archive
	} elseif ( is_archive() ) {
		$this->get_blog_archive_crumbs();

	// single blog post
	} elseif ( $post->post_type == 'post' ) {
		$this->get_blog_post_crumbs();

	// example of how to handle a single custom post type
	} elseif ( $post->post_type == 'event' ) {
		$this->event_calendar_page_id = 2;
		$this->get_event_post_crumbs();

	// page
	} elseif ( is_page() ) {
		$this->get_page_crumbs( $post->ID );
	}
	// final default is to display only the Home link 

	$this->print_crumbs();
}

private function add_crumb ( $post, $link=false, $class=null ) {
	$url = $link ? get_permalink( $post->ID ) : null;
	$this->crumbs[] = array(
		'name' => wptexturize( $post->post_title ),
		'class' => $class,
		'url' => $url,
	);
}

private function print_crumbs () {
	if ( empty( $this->crumbs ) ) {
		return;
	}
	foreach ( $this->crumbs as $crumb ) {
		extract( $crumb );
		if ( !isset( $crumb['class'] ) ) {
			$class = '';
		}
		if ( $url ) {
			echo '<a href="', $url, '" class="', $class, '">', $name, '</a>', $this->sep;
		} else {
			echo $name;
		}
	}
}

private function get_blog_archive_crumbs () {
	global $post;
	$this->get_page_crumbs( $this->blog_page, true );
	$term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
	if ( $term ) {
		$name = $term->name;

	} elseif ( is_post_type_archive() ) {
		$name = get_queried_object()->labels->name;

	} elseif ( is_day() ) {
		$name = 'Daily Archives: ' . get_the_date();

	} elseif ( is_month() ) {
		$name = 'Monthly Archives: ' . get_the_date( 'F Y' );

	} elseif ( is_year() ) {
		$name = 'Yearly Archives: ' . get_the_date( 'Y' );

	} elseif ( is_author() ) {
		$author = get_queried_object();
		$name = 'Author Archives: ' . $author->display_name;

	} else {
		$name = single_cat_title( null, false );
	}
	$this->crumbs[] = array(
		'name' => $name,
		'url' => null,
	);
}

private function get_blog_post_crumbs () {
	global $post;
	$this->get_page_crumbs( $this->blog_page, true );
	$this->add_crumb( $post );
}

private function get_event_post_crumbs () {
	global $post;
	$this->get_page_crumbs( $this->event_calendar_page_id, true );
	$this->add_crumb( $post );
}

private function get_section_name ( $section_ID ) {
	$section_name = get_post_meta( $section_ID, 'section_name', true );
	if ( !$section_name ) {
		$section = get_post( $section_ID );
		$section_name = $section->post_title;
	}
	return wptexturize( $section_name );
}

private function get_page_crumbs ( $page_ID, $link_last=false ) {
	// need to translate section page name
	$found_section = false;
	$ancestors = get_post_ancestors( $page_ID );
	if ( $ancestors ) {
		// walk through them from last to first
		for ( $i=count($ancestors)-1; $i>=0; $i-- ) {
			if ( !$found_section ) {
				$this->crumbs[] = array(
					'name' => $this->get_section_name( $ancestors[$i] ),
					'url' => get_permalink( $ancestors[$i] ),
				);
				$found_section = true;
			} else {
				$this->add_crumb( get_post( $ancestors[$i] ), true );
			}
		}
		$this->add_crumb( get_post( $page_ID ), $link_last );

	} else {
		// no ancestors; must be the section ID
		$this->crumbs[] = array(
			'name' => $this->get_section_name( $page_ID ),
			'url' => $link_last ? get_permalink( $page_ID ) : null,
		);
	}
}

} // Class mcw_Breadcrumbs

?>
<div class="row">
	<nav class="breadcrumbs col-sm-12" role="navigation">
	<?php new mcw_Breadcrumbs(); ?>
	</nav>
</div><!-- .breadcrumbs.container -->
