<?php
$classes        = '';
$middle_content = penci_get_builder_mod( 'penci_header_topbar_middle_column', 'enable' );
$content_width  = penci_get_builder_mod( 'penci_header_topbar_content_width', 'container' );
$transparent    = penci_get_builder_mod( 'penci_header_topbar_transparent_background_color' );
$classes        .= 'enable' == $transparent ? 'bg-transparent' : 'bg-normal';
$classes        .= 'enable' == $middle_content ? ' pcmiddle-center' : ' pcmiddle-normal';
$classes        .= penci_can_render_header( 'desktop', 'top' ) ? ' pc-hasel' : ' pc-noel';
?>
<div class="penci_topbar penci-desktop-topbar penci_container <?php echo esc_attr( $classes ); ?>">
    <div class="container <?php esc_attr_e( $content_width ); ?>">
        <div class="penci_nav_row">
			<?php
			$columns = array( 'left', 'center', 'right' );

			foreach ( $columns as $column ) {
				$setting_align = "penci_hb_align_desktop_top_{$column}";
				$align         = penci_get_builder_mod( $setting_align, $column );

				$setting_element = "penci_hb_element_desktop_top_{$column}";
				$elements        = penci_get_builder_mod( $setting_element, penci_header_default( "desktop_element_top_{$column}" ) );
				$elements        = $elements ? explode( ',', $elements ) : '';
				?>

                <div class="penci_nav_col penci_nav_<?php echo esc_attr( $column ); ?> penci_nav_align<?php echo esc_attr( $align ); ?>">

						<?php
						if ( ! empty( $elements ) && is_array( $elements ) ) {
							foreach ( $elements as $element ) {
								if ( ! empty( $element ) && file_exists( PENCI_BUILDER_PATH . 'elements/' . $element . '/front-end.php' ) ) {
									load_template( PENCI_BUILDER_PATH . 'elements/' . $element . '/front-end.php', false, [ 'class_type' => 'normal-header' ] );
								}
							}
						}
						?>

                </div>

				<?php
			}
			?>
        </div>
    </div>
</div>
