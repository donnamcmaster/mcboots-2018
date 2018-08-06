<?php
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

if (!defined('ABSPATH')) exit; // Exit if accessed directly

$primary_nav_args = [
	'theme_location' => 'primary_navigation', 
	'menu_class' => 'navbar-nav mr-auto mt-2 mt-lg-0',
	'depth' => 2, // 1 = no dropdowns, 2 = with dropdowns.
	'walker' => new WP_Bootstrap_Navwalker(),
	'container' => false,
];

?>
<header class="banner" role="banner">
	<nav class="navbar navbar-expand-md navbar-light bg-light">
		<a class="navbar-brand" href="<?= home_url(); ?>/" rel="home"><?= bloginfo( 'name' ); ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="primary-menu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" role="navigation">
			<?php wp_nav_menu( $primary_nav_args ); ?>
		</div>
	</nav>
</header>
