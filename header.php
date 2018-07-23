<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Theme Header
 *
 * The template that displays the top <header> section:
 * - logo and other branding
 * - main navigation
 *
 * @package McBoots-2018
 * @since 0.1
 */
?>

<header class="banner navbar navbar-default navbar-static-top" role="banner">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="primary-menu" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="<?= home_url(); ?>/" rel="home"><?= bloginfo( 'name' ); ?></a>
<?php
	if ( has_nav_menu( 'social_media' ) ) {
		wp_nav_menu( array( 'theme_location' => 'social_media', 'menu_class' => 'menu-social header' ) );
	}
?>
	</div>

<?php
	if ( has_nav_menu( 'primary_navigation' ) ) {
?>
	<nav class="collapse navbar-collapse" role="navigation">
		<?php wp_nav_menu( ['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'] ); ?>
	</nav>
<?php
	}
?>
</header>
