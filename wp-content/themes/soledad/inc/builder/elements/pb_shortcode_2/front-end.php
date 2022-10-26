<?php
$shortcode_html  = penci_get_builder_mod( 'penci_header_builder_pb_shortcode_2_name', false );
$shortcode_class = penci_get_builder_mod( 'penci_header_builder_pb_shortcode_2_class' );
if ( empty( $shortcode_html ) ) {
	return false;
}
?>

<div class="penci-builder-element penci-shortcodes-2 <?php echo esc_attr( $shortcode_class ); ?>">
	<?php echo do_shortcode( $shortcode_html ); ?>
</div>
