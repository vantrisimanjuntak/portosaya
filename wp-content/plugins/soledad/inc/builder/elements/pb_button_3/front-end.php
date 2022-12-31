<?php
$btn_link        = penci_get_builder_mod( 'penci_header_pb_button_3_link_setting' );
$btn_link_rel    = penci_get_builder_mod( 'penci_header_pb_button_3_link_rel', 'noreferrer' );
$btn_link_target = penci_get_builder_mod( 'penci_header_pb_button_3_link_target', '_blank' );
$btn_title       = penci_get_builder_mod( 'penci_header_pb_button_3_text_setting' );
$btn_style       = penci_get_builder_mod( 'penci_header_pb_button_3_style', 'customize' );
$btn_shape       = penci_get_builder_mod( 'penci_header_pb_button_3_shape', 'retangle' );

$classes   = [];
$classes[] = 'penci-builder penci-builder-button button-3';
$classes[] = 'button-define-' . $btn_style;
$classes[] = 'button-shape-' . $btn_shape;
$classes[] = penci_get_builder_mod( 'penci_header_pb_button_3_txt_css_class', 'default' );

if ( ($btn_link && $btn_title) || is_customize_preview() ):?>
    <a target="<?php echo esc_attr( $btn_link_target ); ?>" rel="<?php echo esc_attr( $btn_link_rel ); ?>"
       href="<?php echo esc_url( $btn_link ); ?>" class="<?php echo implode( ' ', $classes ); ?> ">
		<?php echo $btn_title; ?>
    </a>
<?php endif; ?>
