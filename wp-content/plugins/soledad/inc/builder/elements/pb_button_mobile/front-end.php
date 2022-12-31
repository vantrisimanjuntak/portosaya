<?php
$btn_link        = penci_get_builder_mod( 'penci_header_pb_button_mobile_link_setting' );
$btn_link_rel    = penci_get_builder_mod( 'penci_header_pb_button_mobile_link_rel', 'noreferrer' );
$btn_link_target = penci_get_builder_mod( 'penci_header_pb_button_mobile_link_target', '_blank' );
$btn_title       = penci_get_builder_mod( 'penci_header_pb_button_mobile_text_setting' );
$btn_style       = penci_get_builder_mod( 'penci_header_pb_button_mobile_style', 'customize' );
$btn_shape       = penci_get_builder_mod( 'penci_header_pb_button_mobile_shape', 'retangle' );

$classes   = [];
$classes[] = 'penci-builder penci-builder-button penci-builder-button button-mobile-1';
$classes[] = 'button-define-' . $btn_style;
$classes[] = 'button-shape-' . $btn_shape;
$classes[] = penci_get_builder_mod( 'penci_header_pb_button_mobile_txt_css_class', 'default' );

if ( $btn_link && $btn_title ):?>
    <a target="<?php echo esc_attr( $btn_link_target ); ?>" rel="<?php echo esc_attr( $btn_link_rel ); ?>"
       href="<?php echo esc_url( $btn_link ); ?>" class="<?php echo implode( ' ', $classes ); ?> ">
		<?php echo $btn_title; ?>
    </a>
<?php endif; ?>
