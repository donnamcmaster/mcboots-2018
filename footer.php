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
?>

<footer class="content-info" role="contentinfo">
	<div class="site-info">
		<?php if ( has_nav_menu( 'footer_menu' ) ) : ?>
			<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'menu' => 'Footer Menu', 'menu_class' => 'nav-footer' ) ); ?>
		<?php endif; ?>
		<p class="copyright">&copy; <?= bloginfo( 'name' ); ?> <?php echo date('Y'); ?></p>
	</div><!-- .site-info -->
</footer><!-- .content-info -->
