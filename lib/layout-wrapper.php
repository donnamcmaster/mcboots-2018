<?php
/**
 * Layout Wrapper
 *
 * Wraps content of the template in layout.php. 
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_filter( 'template_include', function( $template ) {
    if ( empty( $template ) || !is_string( $template ) || !is_file( $template ) ) return $template;
    
    $layout = include locate_template( '/layout.php' );

    echo $layout( $template );

    // this will prevent wordpress from trying to include anything
    return false;
}, 109);
