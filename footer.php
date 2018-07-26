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

$footer_nav_args = [
	'theme_location' => 'footer_menu', 
	'menu_class' => 'nav justify-content-center mt-1 mb-2',
	'depth' => 1, // 1 = no dropdowns, 2 = with dropdowns.
	'walker' => new WP_Bootstrap_Navwalker(),
];
?>

<footer class="content-info" role="contentinfo">
	<div class="site-info">
		<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
			<?php wp_nav_menu( $footer_nav_args ); ?>
		<?php endif; ?>
		<p class="copyright">&copy; <?= bloginfo( 'name' ); ?> <?php echo date('Y'); ?> <?= edit_post_link();?></p>
	</div><!-- .site-info -->
</footer><!-- .content-info -->
