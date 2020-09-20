<?php
/**
 * Gallery
 *
 * - generates Bootstrap v4 row/col markup based on the # of columns 
 * - assumes a 12-column grid; defaults to 3 cols if value isn't a factor of 12
 *   (the default is based on WordPress gallery cols default of 3)
 * - phone-size gets fewer columns with max of 3
 * - add filters to change thumbnail or full sizes
 * - 'img-fluid' is defined in Bootstrap
 * - see assets/less/app.less for basic gallery styling 
 *
 * props to http://stackoverflow.com/users/1948627/bitworking for the starting point in
 * http://stackoverflow.com/questions/35772718/output-gallery-shortcode-as-bootstrap-columns-in-wordpress
 * and to https://github.com/cullylarson for review & critique
 *
 * @package McBoots-2018
 * @since 0.1
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

add_filter( 'post_gallery', 'bootstrap_gallery', 10, 3 );
function bootstrap_gallery ( $output = '', $atts, $instance ) {
	// if no images, return
	if ( !isset( $atts['ids'] ) || !$atts['ids'] ) {
		return;
	}

	// default columns=3, set by WordPress, not passed in $atts!
	if ( !isset( $atts['columns'] ) ) {
		$atts['columns'] = 3;
	}
	$defaults = [
		'columns' => 0,
		'size' => '',
		'show_titles' => false,
		'enlarged_size' => apply_filters( 'mcb_gallery_enlarged_size', 'full' ),
	];
	$atts = array_merge( $defaults, $atts );

	// allow "yes" or non-zero number to enable titles with thumbnails
	if ( $atts['show_titles'] == 'yes' ) {
		 $atts['show_titles'] = true;
	}

	// allow theme to override nr columns
	$atts['columns'] = apply_filters( 'mcb_gallery_columns', $atts['columns'] );

	// if thumbnail size not specified, set to 'thumbnail' but allow theme to override
	if ( !$atts['size'] ) {
		$atts['size'] = apply_filters( 'mcb_gallery_thumb_size', 'thumbnail' );
	}

	$columns = $atts['columns'];
	$images = explode( ',', $atts['ids'] );

	// map number of columns to the Bootstrap CSS markup
	// if unworkable # of columns, set it to 3
	$col_map = [
		// if fewer than 3 columns, go to 1 column in phone-size
		1 => 'col-12',
		2 => 'col-sm-6',

		// with flexbox, we can have any number of cols at any size
		3 => 'col-md-4 col-6',
		4 => 'col-lg-3 col-md-4 col-6',
		6 => 'col-lg-2 col-md-3 col-4',
		12 => 'col-md-1 col-2',	// actually not a good idea!
	];
	if ( !isset( $col_map[$columns] ) ) {
		$columns = $default_number_columns;
	}
	$col_class = $col_map[$columns];

	// start collecting the output
	ob_start();

?>
<div class="gallery">
	<div class="row">

<?php
	$cols_printed = 0;
	foreach ( $images as $img_id ) {
		$img_atts = wp_get_attachment_image_src( $img_id, $atts['enlarged_size'] );
		if ( !$img_atts ) {
			continue;
		}
		$img_src = $img_atts[0];

		$img_caption = '';
		$img_caption = apply_filters( 'mcb_get_gallery_caption', $img_caption, $img_id );
		$img_title = $atts['show_titles'] ? get_the_title( $img_id ) : '';

		$thumb_tag = wp_get_attachment_image( $img_id, $atts['size'], false, ['class'=>'img-fluid'] );
?>
		<div class="gallery_item <?= $col_class;?>">
			<div class="gallery_img">
				<a data-gallery="gallery" href="<?= $img_src;?>" title="<?= $img_caption;?>">
					<?= $thumb_tag;?>
				</a>
			</div>
<?php
		if ( $img_title ) {
?>
			<div class="pcaption"><?= $img_title; ?></div>

<?php
		}
?>
		</div>

<?php
		$cols_printed++;
	} // foreach

?>
	</div><!-- row -->
</div><!-- gallery -->

<?php
	return ob_get_clean();
}
