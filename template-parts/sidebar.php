<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly

/**
 * Primary Sidebar
 *
 * The sidebar containing the main widget area.
 *
 * @package McBoots-2018
 * @since 0.1
 */

use McBoots\Template;

?>

<aside class="widget-area sidebar-primary <?= Template\sidebar_class(); ?>" role="complementary">
<?php 
	if ( is_active_sidebar( 'sidebar-primary' ) ) {
		dynamic_sidebar( 'sidebar-primary' );
	}
?>
</aside><!-- sidebar-primary -->
