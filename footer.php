<?php
/**
 * Footer Template
 * 
 * - displays the <footer> block 
 * - typically includes navigation & copyright
 * - does not include the call to wp_footer(); that is found in layout.php
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

if ( has_nav_menu( 'footer_menu' ) ) {
	$footer_nav_args = [
		'theme_location' => 'footer_menu', 
		'menu_class' => 'nav justify-content-center mt-1 mb-5',
		'depth' => 1, // 1 = no dropdowns, 2 = with dropdowns.
		'walker' => new WP_Bootstrap_Navwalker(),
		'container' => false,
	];
} else {
	$footer_nav_args = false;
}

$footer_content = get_option('mcw_common_content');
if ( $footer_content ) {
	$initial_year = isset( $footer_content['copyright_year'] ) ? $footer_content['copyright_year'] : 0;
	$current_year = date( 'Y' );
	if ( $initial_year && ( $initial_year < $current_year) ) {
		$copyright_years = "$initial_year - $current_year";
	} else {
		$copyright_years = $current_year;
	}
	$copyright_statement = str_replace(
		'[years]',
		$copyright_years,
		wptexturize( $footer_content['copyright_statement'] )
	);
} else {
	$copyright_statement = '&copy;' . get_bloginfo( 'name' ) .' '. date('Y');
}
?>

<footer class="content-info" role="contentinfo">
	<div class="site-info">

<?php
	if ( $footer_nav_args ) {
		wp_nav_menu( $footer_nav_args );
	}
?>

		<p class="copyright"><?= $copyright_statement; ?></p>
	</div><!-- site-info -->
</footer><!-- content-info -->
