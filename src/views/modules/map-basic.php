<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

?>
<iframe
  width="<?php echo esc_attr( $width ); ?>"
  height="<?php echo esc_attr( $height ); ?>"
  frameborder="0" style="border:0"
  src="<?php echo esc_url( $embed_url ); ?>" allowfullscreen>
</iframe>