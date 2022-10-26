<?php
if ( get_theme_mod( 'penci_header_logo_mobile' ) ) {
	$logo_url = esc_url( home_url( '/' ) );
	if ( get_theme_mod( 'penci_custom_url_logo' ) ) {
		$logo_url = get_theme_mod( 'penci_custom_url_logo' );
	}

	$logo_src = get_template_directory_uri() . '/images/logo.png';
	if ( get_theme_mod( 'penci_logo' ) ) {
		$logo_src = get_theme_mod( 'penci_logo' );
	}
	?>
	<div class="penci-mobile-hlogo">
		<a href="<?php echo esc_url( $logo_url ); ?>"><img class="penci-mainlogo penci-mainlogo-mb" src="<?php echo esc_url( $logo_src ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="<?php echo penci_get_image_data_basedurl( $logo_src, 'w' ); ?>" height="<?php echo penci_get_image_data_basedurl( $logo_src, 'h' ); ?>" /></a>
	</div>
	<?php
}