<?php
/**
 * The template for displaying search forms
 * Modified to use Bootstrap classes by _strap
 *
 * @package McBoots-2018
 * @since 0.1
 */

if ( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$value = esc_attr( get_search_query() );
$placeholder = esc_attr( 'Search '.get_bloginfo( 'name' ), 'mcboots' );

?>
	<form method="get" id="searchform" action="<?= esc_url( home_url( '/' ) ); ?>" role="search" class="">
        <div class="form-group">
            <input type="text" class="form-control" name="s" value="<?= $value; ?>" id="s" placeholder="<?= $placeholder; ?>" />
	        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
        </div>
	</form>

