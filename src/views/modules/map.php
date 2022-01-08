<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$style = apply_filters( 'tribe_events_embedded_map_style', "height: $height; width: $width", $index );
?>
<div id="tribe-events-gmap-<?php echo esc_attr( $index ) ?>" style="<?php echo esc_attr( $style ) ?>" aria-hidden="true"></div><!-- #tribe-events-gmap-<?php esc_attr( $index ) ?> -->
