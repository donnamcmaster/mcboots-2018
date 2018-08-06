<?php
/**
 * Enqueue Stylesheets & Scripts
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_action( 'wp_enqueue_scripts', function() {
  	// enqueue custom fonts if needed
// 	wp_enqueue_style( 'custom-fonts', '//fast.fonts.net/cssapi/xxx.css' );

    wp_enqueue_style( 'mcboots-css', get_stylesheet_directory_uri() . '/assets/css/app.css', [], null );
    wp_enqueue_script( 'jquery' );
});


/**
 * Load Bootstrap Scripts
 *
 * - loading Bootstrap scripts from CDN; require special syntax
 * - loaded into footer; jQuery is loaded by WordPress into header
 * - see https://getbootstrap.com/docs/4.1/getting-started/introduction/#js
 */
add_action( 'wp_footer', function() {
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

<?php
}, 30 );
