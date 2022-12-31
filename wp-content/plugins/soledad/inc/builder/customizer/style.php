<?php
if ( ! function_exists( 'penci_builder_fonts_url' ) ) {
	function penci_builder_fonts_url( $data = 'normal' ) {
		$font_url = '';

		$array_fonts       = [];
		$array_get         = [];
		$array_options     = [];
		$array_earlyaccess = [];

		$font_settings = [
			'penci_header_pb_main_menu_penci_font_for_menu',
			'penci_header_pb_logo_penci_font_for_title',
			'penci_header_pb_logo_mobile_penci_font_for_title',
			'penci_header_pb_logo_sidebar_penci_font_for_title',
			'penci_header_pb_logo_sticky_penci_font_for_title',
			'penci_header_pb_logo_penci_font_for_slogan',
			'penci_header_pb_logo_mobile_penci_font_for_slogan',
			'penci_header_pb_logo_sidebar_penci_font_for_slogan',
			'penci_header_pb_logo_sticky_penci_font_for_slogan',
			'penci_header_pb_second_menu_penci_font_for_menu',
			'penci_header_pb_third_menu_penci_font_for_menu',
			'penci_header_pb_dropdown_menu_penci_font_for_menu',
			'penci_header_pb_login_register_penci_font_login_text',
			'penci_header_pb_button_font',
			'penci_header_pb_button_2_font',
			'penci_header_pb_button_3_font',
			'penci_header_pb_button_mobile_font',
			'penci_header_pb_button_mobile_1_font',
			'penci_header_pb_news_ticker_font'
		];

		$exlude_fonts = array_merge( penci_get_custom_fonts(), penci_font_browser() );

		foreach ( $font_settings as $font ) {
			$font = penci_get_builder_mod( $font );
			if ( $font && ! in_array( $font, $exlude_fonts ) ) {
				$array_options[] = $font;
			}
		}

		if ( ! empty( $array_options ) ) {
			$font_earlyaccess_keys = [];
			if ( function_exists( 'penci_font_google_earlyaccess' ) ) {
				$font_earlyaccess_keys = array_keys( penci_font_google_earlyaccess() );
			}

			foreach ( $array_options as $font ) {
				if ( ! in_array( $font, $font_earlyaccess_keys ) ) {
					$font_family       = str_replace( '"', '', $font );
					$font_family_explo = explode( ", ", $font_family );
					$array_get[]       = isset( $font_family_explo[0] ) ? $font_family_explo[0] : '';
				} else {
					$font_family       = str_replace( '"', '', $font );
					$font_family_explo = explode( ", ", $font_family );
					if ( isset( $font_family_explo[0] ) ) {
						$font_earlyaccess_name = strtolower( str_replace( ' ', '', $font_family_explo[0] ) );
						$array_earlyaccess[]   = $font_earlyaccess_name;
					}
				}
			}
		}
		$array_end = array_unique( array_merge( $array_fonts, $array_get ), SORT_REGULAR );

		$string_end = implode( ':300,300italic,400,400italic,500,500italic,700,700italic,800,800italic|', $array_end );

		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'soledad' ) && ! empty( $array_options ) ) {
			$font_url = add_query_arg( array(
				'family'  => urlencode( $string_end . ':300,300italic,400,400italic,500,500italic,600,600italic,700,700italic,800,800italic&subset=latin,cyrillic,cyrillic-ext,greek,greek-ext,latin-ext' ),
				'display' => 'swap',
			), "https://fonts.googleapis.com/css"
			);
		}

		if ( $data == 'earlyaccess' ) {
			return $array_earlyaccess;
		} else {
			return $font_url;
		}
	}
}

add_action( 'soledad_theme/custom_css', 'penci_builder_customizer_css' );
function penci_builder_customizer_css() {
	$block_settings        = [ 'topblock', 'topbar', 'midbar', 'bottombar', 'bottomblock' ];
	$sticky_block_settings = [ 'top', 'mid', 'bottom' ];
	$mobile_block_settings = [ 'topbar', 'midbar', 'bottombar' ];
	$return                = $out = '';
	foreach ( $block_settings as $area ) {
		$return .= penci_builder_get_area_css( $area, 'desktop', 'header' );
	}
	foreach ( $sticky_block_settings as $sticky_area ) {
		$return .= penci_builder_get_area_css( $sticky_area, 'sticky', 'header_sticky' );
	}
	foreach ( $mobile_block_settings as $mobile_area ) {
		$return .= penci_builder_get_area_css( $mobile_area, 'mobile', 'header_mobile' );
	}

	// General header
	$header_general_spacing = penci_get_builder_mod( 'penci_header_spacing_setting' );
	$out                    .= '.penci_header.penci-header-builder.main-builder-header{';
	$out                    .= penci_builder_spacing_extract_data( $header_general_spacing );
	$out                    .= '}';

	// Desktop Logo
	$custom_logo_mw                     = penci_get_builder_mod( 'penci_header_pb_logo_size_logo_w' );
	$custom_logo_mmw                    = penci_get_builder_mod( 'penci_header_pb_logo_size_logo_mw' );
	$custom_logo_mh                     = penci_get_builder_mod( 'penci_header_pb_logo_size_logo_h' );
	$custom_logo_mmh                    = penci_get_builder_mod( 'penci_header_pb_logo_size_logo_mh' );
	$custom_logo_msw                    = penci_get_builder_mod( 'penci_header_pb_logo_size_logo_sw' );
	$custom_logo_msh                    = penci_get_builder_mod( 'penci_header_pb_logo_size_logo_sh' );
	$custom_logo_fontsize_logo          = penci_get_builder_mod( 'penci_header_pb_logo_font_size_logo' );
	$custom_logo_color_logo             = penci_get_builder_mod( 'penci_header_pb_logo_color_logo' );
	$custom_logo_fontsize_m_logo        = penci_get_builder_mod( 'penci_header_pb_logo_font_size_m_logo' );
	$custom_logo_fontface_logo          = penci_get_builder_mod( 'penci_header_pb_logo_penci_font_for_title' );
	$custom_logo_fontweight_logo        = penci_get_builder_mod( 'penci_header_pb_logo_penci_font_weight_title' );
	$custom_logo_fontstyle_logo         = penci_get_builder_mod( 'penci_header_pb_logo_penci_font_style_title' );
	$custom_logo_fontsize_slogan_logo   = penci_get_builder_mod( 'penci_header_pb_logo_font_size_slogan' );
	$custom_logo_color_slogan_logo      = penci_get_builder_mod( 'penci_header_pb_logo_color_slogan' );
	$custom_logo_fontsize_slogan_m_logo = penci_get_builder_mod( 'penci_header_pb_logo_font_size_m_slogan' );
	$custom_logo_fontface_slogan_logo   = penci_get_builder_mod( 'penci_header_pb_logo_penci_font_for_slogan' );
	$custom_logo_fontweight_slogan_logo = penci_get_builder_mod( 'penci_header_pb_logo_penci_font_weight_slogan' );
	$custom_logo_fontstyle_slogan_logo  = penci_get_builder_mod( 'penci_header_pb_logo_penci_font_style_slogan' );

	$out .= '.penci-header-image-logo,.penci-header-text-logo{';
	if ( ! empty( $custom_logo_fontsize_logo ) ) {
		$out .= '--pchb-logo-title-size:' . $custom_logo_fontsize_logo . 'px;';
	}
	if ( ! empty( $custom_logo_color_logo ) ) {
		$out .= '--pchb-logo-title-color:' . $custom_logo_color_logo . ';';
	}
	if ( ! empty( $custom_logo_color_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-color:' . $custom_logo_color_slogan_logo . ';';
	}
	if ( ! empty( $custom_logo_fontsize_m_logo ) ) {
		$out .= '--pchb-logo-title-m-size:' . $custom_logo_fontsize_m_logo . 'px;';
	}
	if ( ! empty( $custom_logo_fontface_logo ) ) {
		$out .= '--pchb-logo-title-font:' . penci_builder_get_font_data( $custom_logo_fontface_logo ) . ';';
	}
	if ( ! empty( $custom_logo_fontweight_logo ) ) {
		$out .= '--pchb-logo-title-fw:' . $custom_logo_fontweight_logo . ';';
	}
	if ( ! empty( $custom_logo_fontstyle_logo ) ) {
		$out .= '--pchb-logo-title-fs:' . $custom_logo_fontstyle_logo . ';';
	}
	if ( ! empty( $custom_logo_fontsize_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-size:' . $custom_logo_fontsize_slogan_logo . 'px;';
	}
	if ( ! empty( $custom_logo_fontsize_slogan_m_logo ) ) {
		$out .= '--pchb-logo-slogan-m-size:' . $custom_logo_fontsize_slogan_m_logo . 'px;';
	}
	if ( ! empty( $custom_logo_fontface_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-font:' . $custom_logo_fontface_slogan_logo . ';';
	}
	if ( ! empty( $custom_logo_fontweight_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-fw:' . $custom_logo_fontweight_slogan_logo . ';';
	}
	if ( ! empty( $custom_logo_fontstyle_slogan_logo ) ) {
		$out .= '--pchb-logo-slogan-fs:' . $custom_logo_fontstyle_slogan_logo . ';';
	}
	$out .= '}';

	$out .= '.pc-logo-desktop.penci-header-image-logo img{';
	if ( ! empty( $custom_logo_mw ) ) {
		$out .= 'max-width:' . $custom_logo_mw . 'px;';
	}
	if ( ! empty( $custom_logo_mh ) ) {
		$out .= 'max-height:' . $custom_logo_mh . 'px;';
	}
	$out .= '}';

	$out .= '@media only screen and (max-width: 767px){.penci_navbar_mobile .penci-header-image-logo img{';
	if ( ! empty( $custom_logo_mmw ) ) {
		$out .= 'max-width:' . $custom_logo_mmw . 'px;';
	}
	if ( ! empty( $custom_logo_mmh ) ) {
		$out .= 'max-height:' . $custom_logo_mmh . 'px;';
	}
	$out .= '}}';

	$out .= '.penci_builder_sticky_header_desktop .penci-header-image-logo img{';
	if ( ! empty( $custom_logo_msw ) ) {
		$out .= 'max-width:' . $custom_logo_msw . 'px;';
	}
	if ( ! empty( $custom_logo_msh ) ) {
		$out .= 'max-height:' . $custom_logo_msh . 'px;';
	}
	$out .= '}';

	// Mobile Logo
	$custom_m_logo_mw                     = penci_get_builder_mod( 'penci_header_pb_logo_mobile_size_logo_mw' );
	$custom_m_logo_mh                     = penci_get_builder_mod( 'penci_header_pb_logo_mobile_size_logo_mh' );
	$custom_m_logo_msw                    = penci_get_builder_mod( 'penci_header_pb_logo_mobile_size_logo_sw' );
	$custom_m_logo_msh                    = penci_get_builder_mod( 'penci_header_pb_logo_mobile_size_logo_sh' );
	$custom_m_logo_fontsize_logo          = penci_get_builder_mod( 'penci_header_pb_logo_mobile_font_size_logo' );
	$custom_m_logo_color_logo             = penci_get_builder_mod( 'penci_header_pb_logo_mobile_color_logo' );
	$custom_m_logo_fontsize_m_logo        = penci_get_builder_mod( 'penci_header_pb_logo_mobile_font_size_m_logo' );
	$custom_m_logo_fontface_logo          = penci_get_builder_mod( 'penci_header_pb_logo_mobile_penci_font_for_title' );
	$custom_m_logo_fontweight_logo        = penci_get_builder_mod( 'penci_header_pb_logo_mobile_penci_font_weight_title' );
	$custom_m_logo_fontstyle_logo         = penci_get_builder_mod( 'penci_header_pb_logo_mobile_penci_font_style_title' );
	$custom_m_logo_fontsize_slogan_logo   = penci_get_builder_mod( 'penci_header_pb_logo_mobile_font_size_slogan' );
	$custom_m_logo_color_slogan_logo      = penci_get_builder_mod( 'penci_header_pb_logo_mobile_color_slogan' );
	$custom_m_logo_fontsize_slogan_m_logo = penci_get_builder_mod( 'penci_header_pb_logo_mobile_font_size_m_slogan' );
	$custom_m_logo_fontface_slogan_logo   = penci_get_builder_mod( 'penci_header_pb_logo_mobile_penci_font_for_slogan' );
	$custom_m_logo_fontweight_slogan_logo = penci_get_builder_mod( 'penci_header_pb_logo_mobile_penci_font_weight_slogan' );
	$custom_m_logo_fontstyle_slogan_logo  = penci_get_builder_mod( 'penci_header_pb_logo_mobile_penci_font_style_slogan' );

	$out .= '.penci_navbar_mobile .penci-header-text-logo{';
	if ( ! empty( $custom_m_logo_fontsize_logo ) ) {
		$out .= '--pchb-m-logo-title-size:' . $custom_m_logo_fontsize_logo . 'px;';
	}
	if ( ! empty( $custom_m_logo_color_logo ) ) {
		$out .= '--pchb-m-logo-title-color:' . $custom_m_logo_color_logo . ';';
	}
	if ( ! empty( $custom_m_logo_color_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-color:' . $custom_m_logo_color_slogan_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontsize_m_logo ) ) {
		$out .= '--pchb-m-logo-title-m-size:' . $custom_m_logo_fontsize_m_logo . 'px;';
	}
	if ( ! empty( $custom_m_logo_fontface_logo ) ) {
		$out .= '--pchb-m-logo-title-font:' . penci_builder_get_font_data( $custom_m_logo_fontface_logo ) . ';';
	}
	if ( ! empty( $custom_m_logo_fontweight_logo ) ) {
		$out .= '--pchb-m-logo-title-fw:' . $custom_m_logo_fontweight_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontstyle_logo ) ) {
		$out .= '--pchb-m-logo-title-fs:' . $custom_m_logo_fontstyle_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontsize_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-size:' . $custom_m_logo_fontsize_slogan_logo . 'px;';
	}
	if ( ! empty( $custom_m_logo_fontsize_slogan_m_logo ) ) {
		$out .= '--pchb-m-logo-slogan-m-size:' . $custom_m_logo_fontsize_slogan_m_logo . 'px;';
	}
	if ( ! empty( $custom_m_logo_fontface_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-font:' . $custom_m_logo_fontface_slogan_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontweight_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-fw:' . $custom_m_logo_fontweight_slogan_logo . ';';
	}
	if ( ! empty( $custom_m_logo_fontstyle_slogan_logo ) ) {
		$out .= '--pchb-m-logo-slogan-fs:' . $custom_m_logo_fontstyle_slogan_logo . ';';
	}
	$out .= '}';

	$out .= '.penci_navbar_mobile .penci-header-image-logo img{';
	if ( ! empty( $custom_m_logo_mw ) ) {
		$out .= 'max-width:' . $custom_m_logo_mw . 'px;';
	}
	if ( ! empty( $custom_m_logo_mh ) ) {
		$out .= 'max-height:' . $custom_m_logo_mh . 'px;';
	}
	$out .= '}';

	$out .= '.penci_navbar_mobile .sticky-enable .penci-header-image-logo img{';
	if ( ! empty( $custom_m_logo_msw ) ) {
		$out .= 'max-width:' . $custom_m_logo_msw . 'px;';
	}
	if ( ! empty( $custom_m_logo_msh ) ) {
		$out .= 'max-height:' . $custom_m_logo_msh . 'px;';
	}
	$out .= '}';

	// Mobile Sidebar Logo
	$custom_ms_logo_mw                     = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_size_logo_mw' );
	$custom_ms_logo_mh                     = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_size_logo_mh' );
	$custom_ms_logo_fontsize_logo          = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_font_size_logo' );
	$custom_ms_logo_color_logo             = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_color_logo' );
	$custom_ms_logo_fontsize_m_logo        = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_font_size_m_logo' );
	$custom_ms_logo_fontface_logo          = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_penci_font_for_title' );
	$custom_ms_logo_fontweight_logo        = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_penci_font_weight_title' );
	$custom_ms_logo_fontstyle_logo         = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_penci_font_style_title' );
	$custom_ms_logo_fontsize_slogan_logo   = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_font_size_slogan' );
	$custom_ms_logo_color_slogan_logo      = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_color_slogan' );
	$custom_ms_logo_fontsize_slogan_m_logo = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_font_size_m_slogan' );
	$custom_ms_logo_fontface_slogan_logo   = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_penci_font_for_slogan' );
	$custom_ms_logo_fontweight_slogan_logo = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_penci_font_weight_slogan' );
	$custom_ms_logo_fontstyle_slogan_logo  = penci_get_builder_mod( 'penci_header_pb_logo_sidebar_penci_font_style_slogan' );

	$out .= '.pb-logo-sidebar-mobile{';
	if ( ! empty( $custom_ms_logo_fontsize_logo ) ) {
		$out .= '--pchb-logo-sm-title-size:' . $custom_ms_logo_fontsize_logo . 'px;';
	}
	if ( ! empty( $custom_ms_logo_color_logo ) ) {
		$out .= '--pchb-logo-sm-title-color:' . $custom_ms_logo_color_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_color_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-color:' . $custom_ms_logo_color_slogan_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontsize_m_logo ) ) {
		$out .= '--pchb-logo-sm-title-m-size:' . $custom_ms_logo_fontsize_m_logo . 'px;';
	}
	if ( ! empty( $custom_ms_logo_fontface_logo ) ) {
		$out .= '--pchb-logo-sm-title-font:' . penci_builder_get_font_data( $custom_ms_logo_fontface_logo ) . ';';
	}
	if ( ! empty( $custom_ms_logo_fontweight_logo ) ) {
		$out .= '--pchb-logo-sm-title-fw:' . $custom_ms_logo_fontweight_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontstyle_logo ) ) {
		$out .= '--pchb-logo-sm-title-fs:' . $custom_ms_logo_fontstyle_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontsize_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-size:' . $custom_ms_logo_fontsize_slogan_logo . 'px;';
	}
	if ( ! empty( $custom_ms_logo_fontsize_slogan_m_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-m-size:' . $custom_ms_logo_fontsize_slogan_m_logo . 'px;';
	}
	if ( ! empty( $custom_ms_logo_fontface_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-font:' . $custom_ms_logo_fontface_slogan_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontweight_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-fw:' . $custom_ms_logo_fontweight_slogan_logo . ';';
	}
	if ( ! empty( $custom_ms_logo_fontstyle_slogan_logo ) ) {
		$out .= '--pchb-logo-sm-slogan-fs:' . $custom_ms_logo_fontstyle_slogan_logo . ';';
	}
	$out .= '}';

	$out .= '.pc-builder-element.pb-logo-sidebar-mobile img{';
	if ( ! empty( $custom_ms_logo_mw ) ) {
		$out .= 'max-width:' . $custom_ms_logo_mw . 'px;';
	}
	if ( ! empty( $custom_ms_logo_mh ) ) {
		$out .= 'max-height:' . $custom_ms_logo_mh . 'px;';
	}
	$out .= '}';

	// Sticky Logo
	$custom_s_logo_mw                     = penci_get_builder_mod( 'penci_header_pb_logo_sticky_size_logo_w' );
	$custom_s_logo_mh                     = penci_get_builder_mod( 'penci_header_pb_logo_sticky_size_logo_h' );
	$custom_s_logo_fontsize_logo          = penci_get_builder_mod( 'penci_header_pb_logo_sticky_font_size_logo' );
	$custom_s_logo_color_logo             = penci_get_builder_mod( 'penci_header_pb_logo_sticky_color_logo' );
	$custom_s_logo_fontsize_m_logo        = penci_get_builder_mod( 'penci_header_pb_logo_sticky_font_size_m_logo' );
	$custom_s_logo_fontface_logo          = penci_get_builder_mod( 'penci_header_pb_logo_sticky_penci_font_for_title' );
	$custom_s_logo_fontweight_logo        = penci_get_builder_mod( 'penci_header_pb_logo_sticky_penci_font_weight_title' );
	$custom_s_logo_fontstyle_logo         = penci_get_builder_mod( 'penci_header_pb_logo_sticky_penci_font_style_title' );
	$custom_s_logo_fontsize_slogan_logo   = penci_get_builder_mod( 'penci_header_pb_logo_sticky_font_size_slogan' );
	$custom_s_logo_color_slogan_logo      = penci_get_builder_mod( 'penci_header_pb_logo_sticky_color_slogan' );
	$custom_s_logo_fontsize_slogan_m_logo = penci_get_builder_mod( 'penci_header_pb_logo_sticky_font_size_m_slogan' );
	$custom_s_logo_fontface_slogan_logo   = penci_get_builder_mod( 'penci_header_pb_logo_sticky_penci_font_for_slogan' );
	$custom_s_logo_fontweight_slogan_logo = penci_get_builder_mod( 'penci_header_pb_logo_sticky_penci_font_weight_slogan' );
	$custom_s_logo_fontstyle_slogan_logo  = penci_get_builder_mod( 'penci_header_pb_logo_sticky_penci_font_style_slogan' );

	$out .= '.pc-logo-sticky{';
	if ( ! empty( $custom_s_logo_fontsize_logo ) ) {
		$out .= '--pchb-logo-s-title-size:' . $custom_s_logo_fontsize_logo . 'px;';
	}
	if ( ! empty( $custom_s_logo_color_logo ) ) {
		$out .= '--pchb-logo-s-title-color:' . $custom_s_logo_color_logo . ';';
	}
	if ( ! empty( $custom_s_logo_color_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-color:' . $custom_s_logo_color_slogan_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontsize_m_logo ) ) {
		$out .= '--pchb-logo-s-title-m-size:' . $custom_s_logo_fontsize_m_logo . 'px;';
	}
	if ( ! empty( $custom_s_logo_fontface_logo ) ) {
		$out .= '--pchb-logo-s-title-font:' . penci_builder_get_font_data( $custom_s_logo_fontface_logo ) . ';';
	}
	if ( ! empty( $custom_s_logo_fontweight_logo ) ) {
		$out .= '--pchb-logo-s-title-fw:' . $custom_s_logo_fontweight_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontstyle_logo ) ) {
		$out .= '--pchb-logo-s-title-fs:' . $custom_s_logo_fontstyle_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontsize_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-size:' . $custom_s_logo_fontsize_slogan_logo . 'px;';
	}
	if ( ! empty( $custom_s_logo_fontsize_slogan_m_logo ) ) {
		$out .= '--pchb-logo-s-slogan-m-size:' . $custom_s_logo_fontsize_slogan_m_logo . 'px;';
	}
	if ( ! empty( $custom_s_logo_fontface_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-font:' . $custom_s_logo_fontface_slogan_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontweight_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-fw:' . $custom_s_logo_fontweight_slogan_logo . ';';
	}
	if ( ! empty( $custom_s_logo_fontstyle_slogan_logo ) ) {
		$out .= '--pchb-logo-s-slogan-fs:' . $custom_s_logo_fontstyle_slogan_logo . ';';
	}
	$out .= '}';

	$out .= '.pc-builder-element.pc-logo-sticky.pc-logo img{';
	if ( ! empty( $custom_s_logo_mw ) ) {
		$out .= 'max-width:' . $custom_s_logo_mw . 'px;';
	}
	if ( ! empty( $custom_s_logo_mh ) ) {
		$out .= 'max-height:' . $custom_s_logo_mh . 'px;';
	}
	$out .= '}';

	// Main Menu
	$main_menu_font        = penci_get_builder_mod( 'penci_header_pb_main_menu_penci_font_for_menu' );
	$main_menu_font_weight = penci_get_builder_mod( 'penci_header_pb_main_menu_penci_font_weight_menu' );
	$main_menu_fs          = penci_get_builder_mod( 'penci_header_pb_main_menu_penci_font_size_lv1' );
	$main_menu_lh          = penci_get_builder_mod( 'penci_header_pb_main_menu_penci_line_height_lv1' );
	$main_menu_fs_drop     = penci_get_builder_mod( 'penci_header_pb_main_menu_penci_font_size_drop' );
	$main_menu_tt          = penci_get_builder_mod( 'penci_header_pb_main_menu_penci_menu_uppercase' );
	$main_menu_mg          = penci_get_builder_mod( 'penci_header_pb_main_menu_penci_lv1_item_spacing' );

	$out .= '.pc-builder-element.pc-main-menu{';
	if ( ! empty( $main_menu_font ) ) {
		$out .= '--pchb-main-menu-font:' . penci_builder_get_font_data( $main_menu_font ) . ';';
	}
	if ( ! empty( $main_menu_font_weight ) ) {
		$out .= '--pchb-main-menu-fw:' . $main_menu_font_weight . ';';
	}
	if ( ! empty( $main_menu_fs ) ) {
		$out .= '--pchb-main-menu-fs:' . $main_menu_fs . 'px;';
	}
	if ( ! empty( $main_menu_fs_drop ) ) {
		$out .= '--pchb-main-menu-fs_l2:' . $main_menu_fs_drop . 'px;';
	}
	if ( ! empty( $main_menu_mg ) ) {
		$out .= '--pchb-main-menu-mg:' . $main_menu_mg . 'px;';
	}
	if ( ! empty( $main_menu_lh ) ) {
		$out .= '--pchb-main-menu-lh:' . $main_menu_lh . 'px;';
	}
	if ( 'enable' == $main_menu_tt ) {
		$out .= '--pchb-main-menu-tt: none;';
	}

	$out .= '}';

	// Secondary Menu
	$second_menu_font        = penci_get_builder_mod( 'penci_header_pb_second_menu_penci_font_for_menu' );
	$second_menu_font_weight = penci_get_builder_mod( 'penci_header_pb_second_menu_penci_font_weight_menu' );
	$second_menu_fs          = penci_get_builder_mod( 'penci_header_pb_second_menu_penci_font_size_lv1' );
	$second_menu_lh          = penci_get_builder_mod( 'penci_header_pb_second_menu_penci_line_height_lv1' );
	$second_menu_fs_drop     = penci_get_builder_mod( 'penci_header_pb_second_menu_penci_font_size_drop' );
	$second_menu_tt          = penci_get_builder_mod( 'penci_header_pb_second_menu_penci_menu_uppercase' );
	$second_menu_mg          = penci_get_builder_mod( 'penci_header_pb_second_menu_penci_lv1_item_spacing' );

	$out .= '.pc-builder-element.pc-second-menu{';
	if ( ! empty( $second_menu_font ) ) {
		$out .= '--pchb-second-menu-font:' . penci_builder_get_font_data( $second_menu_font ) . ';';
	}
	if ( ! empty( $second_menu_font_weight ) ) {
		$out .= '--pchb-second-menu-fw:' . $second_menu_font_weight . ';';
	}
	if ( ! empty( $second_menu_fs ) ) {
		$out .= '--pchb-second-menu-fs:' . $second_menu_fs . 'px;';
	}
	if ( ! empty( $second_menu_lh ) ) {
		$out .= '--pchb-second-menu-lh:' . $second_menu_lh . 'px;';
	}
	if ( ! empty( $second_menu_fs_drop ) ) {
		$out .= '--pchb-second-menu-fs_l2:' . $second_menu_fs_drop . 'px;';
	}
	if ( ! empty( $second_menu_mg ) ) {
		$out .= '--pchb-second-menu-mg:' . $second_menu_mg . 'px;';
	}
	if ( 'enable' == $second_menu_tt ) {
		$out .= '--pchb-second-menu-tt: none;';
	}
	$out .= '}';

	// Third Menu
	$third_menu_font        = penci_get_builder_mod( 'penci_header_pb_third_menu_penci_font_for_menu' );
	$third_menu_font_weight = penci_get_builder_mod( 'penci_header_pb_third_menu_penci_font_weight_menu' );
	$third_menu_fs          = penci_get_builder_mod( 'penci_header_pb_third_menu_penci_font_size_lv1' );
	$third_menu_lh          = penci_get_builder_mod( 'penci_header_pb_third_menu_penci_line_height_lv1' );
	$third_menu_fs_drop     = penci_get_builder_mod( 'penci_header_pb_third_menu_penci_font_size_drop' );
	$third_menu_tt          = penci_get_builder_mod( 'penci_header_pb_third_menu_penci_menu_uppercase' );
	$third_menu_mg          = penci_get_builder_mod( 'penci_header_pb_third_menu_penci_lv1_item_spacing' );

	$out .= '.pc-builder-element.pc-third-menu{';
	if ( ! empty( $third_menu_font ) ) {
		$out .= '--pchb-third-menu-font:' . penci_builder_get_font_data( $third_menu_font ) . ';';
	}
	if ( ! empty( $third_menu_font_weight ) ) {
		$out .= '--pchb-third-menu-fw:' . $third_menu_font_weight . ';';
	}
	if ( ! empty( $third_menu_fs ) ) {
		$out .= '--pchb-third-menu-fs:' . $third_menu_fs . 'px;';
	}
	if ( ! empty( $third_menu_lh ) ) {
		$out .= '--pchb-third-menu-lh:' . $third_menu_lh . 'px;';
	}
	if ( ! empty( $third_menu_fs_drop ) ) {
		$out .= '--pchb-third-menu-fs_l2:' . $third_menu_fs_drop . 'px;';
	}
	if ( ! empty( $third_menu_mg ) ) {
		$out .= '--pchb-third-menu-mg:' . $third_menu_mg . 'px;';
	}
	if ( 'enable' == $third_menu_tt ) {
		$out .= '--pchb-third-menu-tt: none;';
	}

	$out .= '}';

	// Button 1
	$button_1_spacing         = penci_get_builder_mod( 'penci_header_pb_button_spacing_setting' );
	$button_1_border_color    = penci_get_builder_mod( 'penci_header_pb_button_border_color' );
	$button_1_border_hv_color = penci_get_builder_mod( 'penci_header_pb_button_border_hv_color' );
	$button_1_bg_color        = penci_get_builder_mod( 'penci_header_pb_button_bg_color' );
	$button_1_bg_hv_color     = penci_get_builder_mod( 'penci_header_pb_button_bg_hv_color' );
	$button_1_txt_color       = penci_get_builder_mod( 'penci_header_pb_button_txt_color' );
	$button_1_txt_hv_color    = penci_get_builder_mod( 'penci_header_pb_button_txt_hv_color' );

	$out .= '.penci-builder.penci-builder-button.button-1{';
	if ( ! empty( $button_1_spacing ) ) {
		$out .= penci_builder_spacing_extract_data( $button_1_spacing );
	}
	if ( ! empty( $button_1_border_color ) ) {
		$out .= 'border-color:' . $button_1_border_color . ';';
	}
	if ( ! empty( $button_1_bg_color ) ) {
		$out .= 'background-color:' . $button_1_bg_color . ';';
	}
	if ( ! empty( $button_1_txt_color ) ) {
		$out .= 'color:' . $button_1_txt_color . ';';
	}
	$out .= '}';

	$out .= '.penci-builder.penci-builder-button.button-1:hover{';
	if ( ! empty( $button_1_border_hv_color ) ) {
		$out .= 'border-color:' . $button_1_border_hv_color . ';';
	}
	if ( ! empty( $button_1_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_1_bg_hv_color . ';';
	}
	if ( ! empty( $button_1_txt_hv_color ) ) {
		$out .= 'color:' . $button_1_txt_hv_color . ';';
	}
	$out .= '}';

	// Button 2
	$button_2_spacing         = penci_get_builder_mod( 'penci_header_pb_button_2_spacing_setting' );
	$button_2_border_color    = penci_get_builder_mod( 'penci_header_pb_button_2_border_color' );
	$button_2_border_hv_color = penci_get_builder_mod( 'penci_header_pb_button_2_border_hv_color' );
	$button_2_bg_color        = penci_get_builder_mod( 'penci_header_pb_button_2_bg_color' );
	$button_2_bg_hv_color     = penci_get_builder_mod( 'penci_header_pb_button_2_bg_hv_color' );
	$button_2_txt_color       = penci_get_builder_mod( 'penci_header_pb_button_2_txt_color' );
	$button_2_txt_hv_color    = penci_get_builder_mod( 'penci_header_pb_button_2_txt_hv_color' );

	$out .= '.penci-builder.penci-builder-button.button-2{';
	if ( ! empty( $button_2_spacing ) ) {
		$out .= penci_builder_spacing_extract_data( $button_2_spacing );
	}
	if ( ! empty( $button_2_border_color ) ) {
		$out .= 'border-color:' . $button_2_border_color . ';';
	}
	if ( ! empty( $button_2_bg_color ) ) {
		$out .= 'background-color:' . $button_2_bg_color . ';';
	}
	if ( ! empty( $button_2_txt_color ) ) {
		$out .= 'color:' . $button_2_txt_color . ';';
	}
	$out .= '}';

	$out .= '.penci-builder.penci-builder-button.button-2:hover{';
	if ( ! empty( $button_2_border_hv_color ) ) {
		$out .= 'border-color:' . $button_2_border_hv_color . ';';
	}
	if ( ! empty( $button_2_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_2_bg_hv_color . ';';
	}
	if ( ! empty( $button_2_txt_hv_color ) ) {
		$out .= 'color:' . $button_2_txt_hv_color . ';';
	}
	$out .= '}';

	// Button 3
	$button_3_spacing         = penci_get_builder_mod( 'penci_header_pb_button_3_spacing_setting' );
	$button_3_border_color    = penci_get_builder_mod( 'penci_header_pb_button_3_border_color' );
	$button_3_border_hv_color = penci_get_builder_mod( 'penci_header_pb_button_3_border_hv_color' );
	$button_3_bg_color        = penci_get_builder_mod( 'penci_header_pb_button_3_bg_color' );
	$button_3_bg_hv_color     = penci_get_builder_mod( 'penci_header_pb_button_3_bg_hv_color' );
	$button_3_txt_color       = penci_get_builder_mod( 'penci_header_pb_button_3_txt_color' );
	$button_3_txt_hv_color    = penci_get_builder_mod( 'penci_header_pb_button_3_txt_hv_color' );

	$out .= '.penci-builder.penci-builder-button.button-3{';
	if ( ! empty( $button_3_spacing ) ) {
		$out .= penci_builder_spacing_extract_data( $button_3_spacing );
	}
	if ( ! empty( $button_3_border_color ) ) {
		$out .= 'border-color:' . $button_3_border_color . ';';
	}
	if ( ! empty( $button_3_bg_color ) ) {
		$out .= 'background-color:' . $button_3_bg_color . ';';
	}
	if ( ! empty( $button_3_txt_color ) ) {
		$out .= 'color:' . $button_3_txt_color . ';';
	}
	$out .= '}';

	$out .= '.penci-builder.penci-builder-button.button-3:hover{';
	if ( ! empty( $button_3_border_hv_color ) ) {
		$out .= 'border-color:' . $button_3_border_hv_color . ';';
	}
	if ( ! empty( $button_3_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_3_bg_hv_color . ';';
	}
	if ( ! empty( $button_3_txt_hv_color ) ) {
		$out .= 'color:' . $button_3_txt_hv_color . ';';
	}
	$out .= '}';

	// Button Mobile
	$button_m_1_spacing         = penci_get_builder_mod( 'penci_header_pb_button_mobile_spacing_setting' );
	$button_m_1_border_color    = penci_get_builder_mod( 'penci_header_pb_button_mobile_border_color' );
	$button_m_1_border_hv_color = penci_get_builder_mod( 'penci_header_pb_button_mobile_border_hv_color' );
	$button_m_1_bg_color        = penci_get_builder_mod( 'penci_header_pb_button_mobile_bg_color' );
	$button_m_1_bg_hv_color     = penci_get_builder_mod( 'penci_header_pb_button_mobile_bg_hv_color' );
	$button_m_1_txt_color       = penci_get_builder_mod( 'penci_header_pb_button_mobile_txt_color' );
	$button_m_1_txt_hv_color    = penci_get_builder_mod( 'penci_header_pb_button_mobile_txt_hv_color' );

	$out .= '.penci-builder.penci-builder-button.button-mobile-1{';
	if ( ! empty( $button_m_1_spacing ) ) {
		$out .= penci_builder_spacing_extract_data( $button_m_1_spacing );
	}
	if ( ! empty( $button_m_1_border_color ) ) {
		$out .= 'border-color:' . $button_m_1_border_color . ';';
	}
	if ( ! empty( $button_m_1_bg_color ) ) {
		$out .= 'background-color:' . $button_m_1_bg_color . ';';
	}
	if ( ! empty( $button_m_1_txt_color ) ) {
		$out .= 'color:' . $button_m_1_txt_color . ';';
	}
	$out .= '}';

	$out .= '.penci-builder.penci-builder-button.button-mobile-1:hover{';
	if ( ! empty( $button_m_1_border_hv_color ) ) {
		$out .= 'border-color:' . $button_m_1_border_hv_color . ';';
	}
	if ( ! empty( $button_m_1_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_m_1_bg_hv_color . ';';
	}
	if ( ! empty( $button_m_1_txt_hv_color ) ) {
		$out .= 'color:' . $button_m_1_txt_hv_color . ';';
	}
	$out .= '}';

	// Button Mobile 2
	$button_m_2_spacing         = penci_get_builder_mod( 'penci_header_pb_button_mobile_2_spacing_setting' );
	$button_m_2_border_color    = penci_get_builder_mod( 'penci_header_pb_button_mobile_2_border_color' );
	$button_m_2_border_hv_color = penci_get_builder_mod( 'penci_header_pb_button_mobile_2_border_hv_color' );
	$button_m_2_bg_color        = penci_get_builder_mod( 'penci_header_pb_button_mobile_2_bg_color' );
	$button_m_2_bg_hv_color     = penci_get_builder_mod( 'penci_header_pb_button_mobile_2_bg_hv_color' );
	$button_m_2_txt_color       = penci_get_builder_mod( 'penci_header_pb_button_mobile_2_txt_color' );
	$button_m_2_txt_hv_color    = penci_get_builder_mod( 'penci_header_pb_button_mobile_2_txt_hv_color' );

	$out .= '.penci-builder.penci-builder-button.button-2{';
	if ( ! empty( $button_m_2_spacing ) ) {
		$out .= penci_builder_spacing_extract_data( $button_m_2_spacing );
	}
	if ( ! empty( $button_m_2_border_color ) ) {
		$out .= 'border-color:' . $button_m_2_border_color . ';';
	}
	if ( ! empty( $button_m_2_bg_color ) ) {
		$out .= 'background-color:' . $button_m_2_bg_color . ';';
	}
	if ( ! empty( $button_m_2_txt_color ) ) {
		$out .= 'color:' . $button_m_2_txt_color . ';';
	}
	$out .= '}';

	$out .= '.penci-builder.penci-builder-button.button-2:hover{';
	if ( ! empty( $button_m_2_border_hv_color ) ) {
		$out .= 'border-color:' . $button_m_2_border_hv_color . ';';
	}
	if ( ! empty( $button_m_2_bg_hv_color ) ) {
		$out .= 'background-color:' . $button_m_2_bg_hv_color . ';';
	}
	if ( ! empty( $button_m_2_txt_hv_color ) ) {
		$out .= 'color:' . $button_m_2_txt_hv_color . ';';
	}
	$out .= '}';

	// mobile sidebar

	$out .= penci_builder_get_area_css( 'sidebar', '', 'header_mobile', '.penci-builder-mobile-sidebar-nav.penci-menu-hbg' );

	// Mobile Menu

	$dropdown_fn  = penci_get_builder_mod( 'penci_header_pb_dropdown_menu_penci_font_for_menu' );
	$dropdown_fw  = penci_get_builder_mod( 'penci_header_pb_dropdown_menu_penci_font_weight_menu' );
	$dropdown_lv1 = penci_get_builder_mod( 'penci_header_pb_dropdown_menu_penci_font_size_lv1' );
	$dropdown_lv2 = penci_get_builder_mod( 'penci_header_pb_dropdown_menu_penci_font_size_drop' );
	$dropdown_tt  = penci_get_builder_mod( 'penci_header_pb_dropdown_menu_penci_menu_uppercase' );

	$out .= '.pc-builder-menu.pc-dropdown-menu{';
	if ( ! empty( $dropdown_fn ) ) {
		$out .= '--pchb-dd-fn:' . penci_builder_get_font_data( $dropdown_fn ) . ';';
	}
	if ( ! empty( $dropdown_fw ) ) {
		$out .= '--pchb-dd-fw:' . $dropdown_fw . ';';
	}
	if ( ! empty( $dropdown_lv1 ) ) {
		$out .= '--pchb-dd-lv1:' . $dropdown_lv1 . 'px;';
	}
	if ( ! empty( $dropdown_lv2 ) ) {
		$out .= '--pchb-dd-lv2:' . $dropdown_lv2 . 'px;';
	}
	$out .= '}';

	if ( 'enable' == $dropdown_tt ) {
		$out .= '.pc-builder-menu.pc-dropdown-menu .menu li a{text-transform: none;}';
	}


	$element_spacings = [
		'penci_header_pb_block_spacing'                    => '.penci-header-builder .penci-header-block-1',
		'penci_header_pb_block_2_spacing'                  => '.penci-header-builder .penci-header-block-2',
		'penci_header_pb_cart_icon_section_spacing'        => '.penci-header-builder .pb-header-builder.cart-icon',
		'penci_header_pb_compare_icon_section_spacing'     => '.penci-header-builder .penci-builder-elements.compare-icon',
		'penci_header_pb_data_time_spacing'                => '.penci-header-builder .penci-builder-element.penci-data-time-format',
		'penci_header_pb_dropdown_menu_spacing'            => '.pc-builder-element.pc-builder-menu.pc-dropdown-menu',
		'penci_header_pb_hamburger_menu_spacing'           => '.penci-header-builder .pc-builder-element.penci-menuhbg-wapper',
		'penci_header_builder_pb_html_spacing'             => '.penci-header-builder .penci-builder-element.penci-html-ads',
		'penci_header_pb_logo_spacing'                     => '.penci-header-builder .pc-builder-element.pc-logo',
		'penci_header_pb_main_menu_spacing'                => '.penci-header-builder .pc-builder-element.pc-builder-menu',
		'penci_header_pb_mobile_menu_spacing'              => '.penci-header-builder .pc-builder-element.mobile-menu',
		'penci_header_pb_news_ticker_spacing'              => '.penci-header-builder .penci-builder-element.pctopbar-item',
		'penci_header_search_spacing'                      => '.penci-header-builder .pc-builder-element.penci-top-search',
		'penci_header_pb_second_menu_spacing'              => '.penci-header-builder .pc-builder-element.pc-second-menu',
		'penci_header_builder_pb_shortcode_spacing'        => '.penci-header-builder .penci-builder-element.penci-shortcodes',
		'penci_header_pb_social_icon_section_spacing'      => '.penci-header-builder .header-social.penci-builder-element.desktop-social',
		'penci_header_pb_wishlist_icon_section_spacing'    => '.penci-header-builder .pc-builder-element.wishlist-icon',
		'penci_header_pb_login_register_spacing'           => '.penci-header-builder .pc-header-element.pc-login-register',
		'penci_header_pb_search_form_menu_spacing'         => '.penci-header-builder .penci-builder-element.pc-search-form',
		'penci_header_pb_search_form_sidebar_menu_spacing' => '.penci-builder-mobile-sidebar-nav .penci-builder-element.pc-search-form-sidebar',
		'penci_header_mobile_topbar_spacing_setting'       => '.penci-mobile-topbar',
		'penci_header_mobile_midbar_spacing_setting'       => '.penci-mobile-midbar',
		'penci_header_mobile_bottombar_spacing_setting'    => '.penci-mobile-bottombar',
		'penci_header_sticky_top_spacing_setting'          => '.penci-desktop-sticky-top',
		'penci_header_sticky_mid_spacing_setting'          => '.penci-desktop-sticky-mid',
		'penci_header_sticky_bottom_spacing_setting'       => '.penci-desktop-sticky-bottom',
		'penci_header_mobile_sidebar_spacing_setting'      => '.penci-mobile-sidebar-content-wrapper',
		'penci_header_desktop_sticky_spacing_setting'      => '.penci_builder_sticky_header_desktop,',
		'penci_header_pb_vertical_line1_spacing'           => '.penci-builder-element.vertical-line-1',
		'penci_header_pb_vertical_line2_spacing'           => '.penci-builder-element.vertical-line-2',
		'penci_header_pb_vertical_line3_spacing'           => '.penci-builder-element.vertical-line-3',
		'penci_header_pb_vertical_line4_spacing'           => '.penci-builder-element.vertical-line-4',
		'penci_header_pb_vertical_line5_spacing'           => '.penci-builder-element.vertical-line-5',
		'penci_header_pb_vertical_line_mobile1_spacing'    => '.penci-builder-element.vertical-line-mobile-1',
		'penci_header_pb_vertical_line_mobile2_spacing'    => '.penci-builder-element.vertical-line-mobile-2',
	];

	foreach ( $element_spacings as $element => $selector ) {
		$numbers = penci_get_builder_mod( $element );
		if ( ! empty( $numbers ) ) {
			$out .= $selector . '{';
			$out .= penci_builder_spacing_extract_data( $numbers );
			$out .= '}';
		}
	}

	$color_css = [
		'penci_header_search_icon_color'                             => '.pc-builder-element.penci-top-search .search-click',
		'penci_header_search_icon_hv_color'                          => '.pc-builder-element.penci-top-search .search-click:hover',
		'penci_header_pb_data_time_color'                            => '.penci-builder-element.penci-data-time-format',
		'penci_header_pb_login_register_color'                       => '.pc-header-element.pc-login-register a',
		'penci_header_pb_login_register_hv_color'                    => '.pc-header-element.pc-login-register a:hover',
		// main menu
		'penci_header_pb_main_menu_penci_menu_color'                 => '.pc-builder-element.pc-main-menu .navigation .menu > li > a,.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu a',
		'penci_header_pb_main_menu_penci_menu_hv_color'              => '.pc-builder-element.pc-main-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-main-menu .navigation .menu > li:hover > a,.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu a:hover',
		'penci_header_pb_main_menu_penci_menu_active_color'          => '.pc-builder-element.pc-main-menu .navigation .menu li.current-menu-item > a,.pc-builder-element.pc-main-menu .navigation .menu > li.current_page_item > a,.pc-builder-element.pc-main-menu .navigation .menu > li.current-menu-ancestor > a,.pc-builder-element.pc-main-menu .navigation .menu > li.current-menu-item > a',
		'penci_header_pb_main_menu_penci_submenu_color'              => '.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu li a',
		'penci_header_pb_main_menu_penci_submenu_hv_color'           => '.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu li a:hover',
		'penci_header_pb_main_menu_penci_submenu_activecl'           => '.pc-builder-element.pc-main-menu .navigation .menu .sub-menu li.current-menu-item > a,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu > li.current_page_item > a,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu > li.current-menu-ancestor > a,.pc-builder-element.pc-main-menu .navigation .menu .sub-menu > li.current-menu-item > a',
		'penci_header_pb_main_menu_penci_menu_bg_color'              => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > li > a'
		],
		'penci_header_pb_main_menu_penci_menu_line_hv_color'         => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > ul.sub-menu > li > a:before'
		],
		'penci_header_pb_main_menu_penci_menu_bg_hv_color'           => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-main-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
		],
		'penci_header_pb_main_menu_penci_mega_bg_color'              => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .penci-megamenu:not(.penci-block-mega), .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-1 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-1 .penci-megamenu .penci-mega-child-categories a.cat-active:before',
		],
		'penci_header_pb_main_menu_penci_mega_child_cat_bg_color'    => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active'
		],
		'penci_header_pb_main_menu_penci_mega_post_date_color'       => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-date',
		],
		'penci_header_pb_main_menu_penci_mega_post_category_color'   => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .penci-megamenu:not(.penci-block-mega) .penci-mega-thumbnail .mega-cat-name',
		],
		'penci_header_pb_main_menu_penci_mega_post_title_color'      => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .penci-megamenu:not(.penci-block-mega) .penci-mega-latest-posts .penci-mega-post .post-mega-title a',
		],
		'penci_header_pb_main_menu_penci_mega_accent_color'          => [
			'color'            => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation .menu .penci-megamenu:not(.penci-block-mega) .penci-mega-latest-posts .penci-mega-post .post-mega-title a:hover',
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-thumbnail .mega-cat-name',
		],
		'penci_header_pb_main_menu_penci_mega_border_style2'         => [
			'border-color' => '.pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a::after',
		],
		'penci_header_pb_main_menu_penci_submenu_bordercolor'        => [
			'border-color'     => '.pc-builder-element.pc-main-menu .navigation .menu .sub-menu, .pc-builder-element.pc-main-menu .navigation ul.menu > li.megamenu > ul.sub-menu,.pc-builder-element.pc-main-menu .navigation ul.menu ul.sub-menu li > a, .pc-builder-element.pc-builder-menu.pc-main-menu .navigation.menu-style-1 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active',
			'background-color' => '.pc-builder-element.pc-main-menu .menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-content-megamenu .penci-mega-latest-posts .penci-mega-post:before,.pc-builder-element.pc-main-menu .navigation ul.menu > li.megamenu > ul.sub-menu > li:before, .pc-builder-element.pc-main-menu .navigation.menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.all-style:before, .pc-builder-element.pc-main-menu .navigation.menu-style-2 .penci-megamenu .penci-mega-child-categories:after, .pc-builder-element.pc-main-menu .navigation .penci-megamenu .penci-mega-child-categories:after',
			'border-top-color' => '.pc-builder-element.pc-main-menu .navigation.menu-style-2 .menu .sub-menu'
		],
		'penci_header_pb_main_menu_penci_submenu_bgcolor'            => [
			'background-color' => '.pc-builder-element.pc-main-menu .navigation ul.menu > li.megamenu > ul.sub-menu, .pc-builder-element.pc-main-menu .navigation .menu .sub-menu, .pc-builder-element.pc-main-menu .navigation .menu .children'
		],
		'penci_header_pb_main_menu_drop_border_style2'               => [
			'background-color' => '.pc-builder-element.pc-main-menu .navigation.menu-style-2 ul.menu ul:before'
		],

		// second menu
		'penci_header_pb_second_menu_penci_menu_color'               => '.pc-builder-element.pc-second-menu .navigation .menu > li > a,.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu a',
		'penci_header_pb_second_menu_penci_menu_hv_color'            => '.pc-builder-element.pc-second-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-second-menu .navigation .menu > li:hover > a,.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu a:hover',
		'penci_header_pb_second_menu_penci_menu_active_color'        => '.pc-builder-element.pc-second-menu .navigation .menu li.current-menu-item > a,.pc-builder-element.pc-second-menu .navigation .menu > li.current_page_item > a,.pc-builder-element.pc-second-menu .navigation .menu > li.current-menu-ancestor > a,.pc-builder-element.pc-second-menu .navigation .menu > li.current-menu-item > a',
		'penci_header_pb_second_menu_penci_submenu_color'            => '.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu li a',
		'penci_header_pb_second_menu_penci_submenu_hv_color'         => '.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu li a:hover',
		'penci_header_pb_second_menu_penci_submenu_activecl'         => '.pc-builder-element.pc-second-menu .navigation .menu .sub-menu li.current-menu-item > a,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu > li.current_page_item > a,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu > li.current-menu-ancestor > a,.pc-builder-element.pc-second-menu .navigation .menu .sub-menu > li.current-menu-item > a',
		'penci_header_pb_second_menu_penci_menu_bg_color'            => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > li > a'
		],
		'penci_header_pb_second_menu_penci_menu_line_hv_color'       => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > ul > li > a:before'
		],
		'penci_header_pb_second_menu_penci_menu_bg_hv_color'         => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-second-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
		],
		'penci_header_pb_second_menu_penci_mega_bg_color'            => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .penci-megamenu:not(.penci-block-mega), .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-1 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-1 .penci-megamenu .penci-mega-child-categories a.cat-active:before',
		],
		'penci_header_pb_second_menu_penci_mega_child_cat_bg_color'  => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active'
		],
		'penci_header_pb_second_menu_penci_mega_post_date_color'     => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-date',
		],
		'penci_header_pb_second_menu_penci_mega_post_title_color'    => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .penci-megamenu:not(.penci-block-mega) .penci-mega-latest-posts .penci-mega-post .post-mega-title a',
		],
		'penci_header_pb_second_menu_penci_mega_post_category_color' => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .penci-megamenu:not(.penci-block-mega) .penci-mega-thumbnail .mega-cat-name',
		],
		'penci_header_pb_second_menu_penci_mega_accent_color'        => [
			'color'            => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation .menu .penci-megamenu:not(.penci-block-mega) .penci-mega-latest-posts .penci-mega-post .post-mega-title a:hover',
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-thumbnail .mega-cat-name',
		],
		'penci_header_pb_second_menu_penci_mega_border_style2'       => [
			'border-color' => '.pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a::after',
		],
		'penci_header_pb_second_menu_penci_submenu_bordercolor'      => [
			'border-color'     => '.pc-builder-element.pc-second-menu .navigation .menu .sub-menu, .pc-builder-element.pc-second-menu .navigation ul.menu > li.megamenu > ul.sub-menu,.pc-builder-element.pc-second-menu .navigation ul.menu ul.sub-menu li > a, .pc-builder-element.pc-builder-menu.pc-second-menu .navigation.menu-style-1 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active',
			'background-color' => '.pc-builder-element.pc-second-menu .menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-content-megamenu .penci-mega-latest-posts .penci-mega-post:before,.pc-builder-element.pc-second-menu .navigation ul.menu > li.megamenu > ul.sub-menu > li:before, .pc-builder-element.pc-second-menu .navigation.menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.all-style:before, .pc-builder-element.pc-second-menu .navigation.menu-style-2 .penci-megamenu .penci-mega-child-categories:after, .pc-builder-element.pc-second-menu .navigation .penci-megamenu .penci-mega-child-categories:after',
			'border-top-color' => '.pc-builder-element.pc-second-menu .navigation.menu-style-2 .menu .sub-menu'
		],
		'penci_header_pb_second_menu_penci_submenu_bgcolor'          => [
			'background-color' => '.pc-builder-element.pc-second-menu .navigation ul.menu > li.megamenu > ul.sub-menu, .pc-builder-element.pc-second-menu .navigation .menu .sub-menu, .pc-builder-element.pc-second-menu .navigation .menu .children'
		],
		'penci_header_pb_second_menu_drop_border_style2'             => [
			'background-color' => '.pc-builder-element.pc-second-menu .navigation.menu-style-2 ul.menu ul.sub-menu:before'
		],

		// third menu
		'penci_header_pb_third_menu_penci_menu_color'                => '.pc-builder-element.pc-third-menu .navigation .menu > li > a,.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu a',
		'penci_header_pb_third_menu_penci_menu_hv_color'             => '.pc-builder-element.pc-third-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-third-menu .navigation .menu > li:hover > a,.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu a:hover',
		'penci_header_pb_third_menu_penci_menu_active_color'         => '.pc-builder-element.pc-third-menu .navigation .menu li.current-menu-item > a,.pc-builder-element.pc-third-menu .navigation .menu > li.current_page_item > a,.pc-builder-element.pc-third-menu .navigation .menu > li.current-menu-ancestor > a,.pc-builder-element.pc-third-menu .navigation .menu > li.current-menu-item > a',
		'penci_header_pb_third_menu_penci_submenu_color'             => '.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu li a',
		'penci_header_pb_third_menu_penci_submenu_hv_color'          => '.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu li a:hover',
		'penci_header_pb_third_menu_penci_submenu_activecl'          => '.pc-builder-element.pc-third-menu .navigation .menu .sub-menu li.current-menu-item > a,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu > li.current_page_item > a,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu > li.current-menu-ancestor > a,.pc-builder-element.pc-third-menu .navigation .menu .sub-menu > li.current-menu-item > a',
		'penci_header_pb_third_menu_penci_menu_bg_color'             => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > li > a'
		],
		'penci_header_pb_third_menu_penci_menu_line_hv_color'        => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation ul.menu > li > a:before, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > ul > li > a:before'
		],
		'penci_header_pb_third_menu_penci_menu_bg_hv_color'          => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu > li > a:hover,.pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li > a:hover, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li:hover > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-item > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current_page_item > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-ancestor > a, .pc-builder-element.pc-third-menu .navigation.menu-item-padding .menu > li.current-menu-item > a'
		],
		'penci_header_pb_third_menu_penci_mega_bg_color'             => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .penci-megamenu:not(.penci-block-mega), .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-1 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-1 .penci-megamenu .penci-mega-child-categories a.cat-active:before',
		],
		'penci_header_pb_third_menu_penci_mega_child_cat_bg_color'   => [
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active'
		],
		'penci_header_pb_third_menu_penci_mega_post_date_color'      => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-date',
		],
		'penci_header_pb_third_menu_penci_mega_post_category_color'  => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .penci-megamenu:not(.penci-block-mega) .penci-mega-thumbnail .mega-cat-name',
		],
		'penci_header_pb_third_menu_penci_mega_post_title_color'     => [
			'color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .penci-megamenu:not(.penci-block-mega) .penci-mega-latest-posts .penci-mega-post .post-mega-title a',
		],
		'penci_header_pb_third_menu_penci_mega_accent_color'         => [
			'color'            => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a:hover, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation .menu .penci-megamenu:not(.penci-block-mega) .penci-mega-latest-posts .penci-mega-post .post-mega-title a:hover',
			'background-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation .penci-megamenu:not(.penci-block-mega) .penci-mega-thumbnail .mega-cat-name',
		],
		'penci_header_pb_third_menu_penci_mega_border_style2'        => [
			'border-color' => '.pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a::after',
		],
		'penci_header_pb_third_menu_penci_submenu_bordercolor'       => [
			'border-color'     => '.pc-builder-element.pc-third-menu .navigation .menu .sub-menu, .pc-builder-element.pc-third-menu .navigation ul.menu > li.megamenu > ul.sub-menu,.pc-builder-element.pc-third-menu .navigation ul.menu ul.sub-menu li > a, .pc-builder-element.pc-builder-menu.pc-third-menu .navigation.menu-style-1 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.cat-active',
			'background-color' => '.pc-builder-element.pc-third-menu .navigation ul.menu > li.megamenu > ul.sub-menu > li:before, .pc-builder-element.pc-third-menu .navigation.menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-mega-child-categories a.all-style:before,.pc-builder-element.pc-third-menu .menu-style-2 .penci-megamenu:not(.penci-block-mega) .penci-content-megamenu .penci-mega-latest-posts .penci-mega-post:before, .pc-builder-element.pc-third-menu .navigation.menu-style-2 .penci-megamenu .penci-mega-child-categories:after, .pc-builder-element.pc-third-menu .navigation .penci-megamenu .penci-mega-child-categories:after',
			'border-top-color' => '.pc-builder-element.pc-third-menu .navigation.menu-style-2 .menu .sub-menu'
		],
		'penci_header_pb_third_menu_penci_submenu_bgcolor'           => [
			'background-color' => '.pc-builder-element.pc-third-menu .navigation ul.menu > li.megamenu > ul.sub-menu, .pc-builder-element.pc-third-menu .navigation .menu .sub-menu, .pc-builder-element.pc-third-menu .navigation .menu .children'
		],
		'penci_header_pb_third_menu_drop_border_style2'              => [
			'background-color' => '.pc-builder-element.pc-third-menu .navigation.menu-style-2 ul.menu ul.sub-menu:before'
		],

		// search
		'penci_header_pb_search_form_bg_color'                       => [
			'background-color' => '.penci-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
		],
		'penci_header_pb_search_form_border_color'                   => [
			'border-color' => '.penci-builder-element.pc-search-form-desktop form.pc-searchform input.search-input'
		],
		'penci_header_pb_search_form_btntxt_color'                   => [
			'color' => '.pc-search-form-desktop form.pc-searchform i, .penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit'
		],
		'penci_header_pb_search_form_btnhtxt_color'                  => [
			'color' => '.penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit:hover,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit:hover'
		],
		'penci_header_pb_search_form_btn_color'                      => [
			'background-color' => '.penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit'
		],
		'penci_header_pb_search_form_btn_hv_color'                   => [
			'background-color' => '.penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-desktop .searchsubmit:hover,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-desktop .searchsubmit:hover'
		],

		// search mobile
		'penci_header_pb_search_form_sidebar_bg_color'               => [
			'background-color' => '.penci-builder-element.pc-search-form.pc-search-form-sidebar form.pc-searchform input.search-input'
		],
		'penci_header_pb_search_form_sidebar_border_color'           => [
			'border-color' => '.penci-builder-element.pc-search-form.pc-search-form-sidebar form.pc-searchform input.search-input'
		],
		'penci_header_pb_search_form_sidebar_btntxt_color'           => [
			'color' => '.pc-search-form-sidebar form.pc-searchform i, .penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit'
		],
		'penci_header_pb_search_form_sidebar_btnhtxt_color'          => [
			'color' => '.penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit:hover,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit:hover'
		],
		'penci_header_pb_search_form_sidebar_btn_color'              => [
			'background-color' => '.penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit'
		],
		'penci_header_pb_search_form_sidebar_btn_hv_color'           => [
			'background-color' => '.penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .searchsubmit:hover,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .searchsubmit:hover'
		],

		// social icon dekstop
		'penci_header_pb_social_icon_section_icon_size'              => [
			'font-size' => '.penci-builder-element.header-social.desktop-social a i',
		],
		'penci_header_pb_social_icon_section_item_spacing'           => [
			'margin-right' => 'body:not(.rtl) .penci-builder-element.desktop-social .inner-header-social a',
			'margin-left' => 'body.rtl .penci-builder-element.desktop-social .inner-header-social a',
		],

		'penci_header_pb_social_icon_section_bg_color'        => [
			'background-color' => '.penci-builder-element.desktop-social .inner-header-social a i',
		],
		'penci_header_pb_social_icon_section_bg_hv_color'     => [
			'background-color' => '.penci-builder-element.desktop-social .inner-header-social a:hover i',
		],
		'penci_header_pb_social_icon_section_border_color'    => [
			'border-color' => '.penci-builder-element.desktop-social .inner-header-social a i',
		],
		'penci_header_pb_social_icon_section_border_hv_color' => [
			'border-color' => '.penci-builder-element.desktop-social .inner-header-social a:hover i',
		],

		'penci_header_pb_social_icon_section_color'                  => [
			'color' => '.penci-builder-element.desktop-social .inner-header-social a,.penci-builder-element.desktop-social .inner-header-social a i',
		],
		'penci_header_pb_social_icon_section_hv_color'               => [
			'color' => '.penci-builder-element.desktop-social .inner-header-social a:hover,.penci-builder-element.desktop-social .inner-header-social a:hover i',
		],

		// social icon mobile
		'penci_header_pb_social_icon_mobile_section_icon_size'       => [
			'font-size' => '.penci-builder-element.mobile-social a i',
		],
		'penci_header_pb_social_icon_mobile_section_icon_w'          => [
			'width' => '.penci-builder-element.mobile-social i',
		],
		'penci_header_pb_social_icon_mobile_section_icon_h'          => [
			'height' => '.penci-builder-element.mobile-social i',
		],
		'penci_header_pb_social_icon_mobile_section_item_spacing'    => [
			'margin-right' => 'body:not(.rtl) .penci-builder-element.mobile-social .inner-header-social a',
			'margin-left' => 'body.rtl .penci-builder-element.mobile-social .inner-header-social a',
		],
		'penci_header_pb_hamburger_menu_color'                       => [
			'background-color' => '.pc-builder-element a.penci-menuhbg-toggle .lines-button:after, .pc-builder-element a.penci-menuhbg-toggle.builder .penci-lines:before,.pc-builder-element a.penci-menuhbg-toggle.builder .penci-lines:after',
		],
		'penci_header_pb_hamburger_menu_hv_color'                    => [
			'background-color' => '.pc-builder-element a.penci-menuhbg-toggle:hover .lines-button:after, .pc-builder-element a.penci-menuhbg-toggle.builder:hover .penci-lines:before,.pc-builder-element a.penci-menuhbg-toggle.builder:hover .penci-lines:after',
		],
		'penci_header_pb_social_icon_mobile_section_bg_color'        => [
			'background-color' => '.penci-builder-element.mobile-social .penci-social-textaccent.inner-header-social a i',
		],
		'penci_header_pb_social_icon_mobile_section_bg_hv_color'     => [
			'background-color' => '.penci-builder-element.mobile-social .penci-social-textaccent.inner-header-social a:hover i',
		],
		'penci_header_pb_social_icon_mobile_section_border_color'    => [
			'border-color' => '.penci-builder-element.mobile-social .penci-social-textaccent.inner-header-social a i',
		],
		'penci_header_pb_social_icon_mobile_section_border_hv_color' => [
			'border-color' => '.penci-builder-element.mobile-social .penci-social-textaccent.inner-header-social a:hover i',
		],
		'penci_header_pb_social_icon_mobile_section_color'           => [
			'color' => '.penci-builder-element.mobile-social .penci-social-textaccent.inner-header-social a,.penci-builder-element.mobile-social .penci-social-textaccent.inner-header-social a i',
		],
		'penci_header_pb_social_icon_mobile_section_hv_color'        => [
			'color' => '.penci-builder-element.mobile-social .penci-social-textaccent.inner-header-social a:hover,.penci-builder-element.mobile-social .penci-social-textaccent.inner-header-social a:hover i',
		],

		// search form
		'penci_header_pb_search_form_height'                         => [
			'line-height' => '.pc-search-form-desktop.search-style-icon-button .searchsubmit:before,.pc-search-form-desktop.search-style-text-button .searchsubmit ',
		],
		'penci_header_pb_search_form_sidebar_height'                 => [
			'line-height' => '.pc-search-form-sidebar.search-style-icon-button .searchsubmit:before,.pc-search-form-sidebar.search-style-text-button .searchsubmit ',
		],

		// font size
		'penci_header_pb_cart_icon_section_size'                     => [
			'font-size' => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents > i, .pb-header-builder.cart-icon .top-search-classes.shoping-cart-icon > a > i',
		],
		'penci_header_pb_wishlist_icon_section_size'                 => [
			'font-size' => '.penci-builder-elements.pcheader-icon.wishlist-icon > a',
		],
		'penci_header_pb_compare_icon_section_size'                  => [
			'font-size' => '.penci-builder-elements.pcheader-icon.compare-icon > a',
		],

		'penci_header_pb_cart_icon_section_item_count_txt' => [
			'color' => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents > span, .pb-header-builder.cart-icon .top-search-classes.shoping-cart-icon > span',
		],
		'penci_header_pb_cart_icon_section_item_count_bg'  => [
			'background-color' => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents > span, .pb-header-builder.cart-icon .top-search-classes.shoping-cart-icon > span',
		],

		'penci_header_pb_compare_icon_section_item_count_txt' => [
			'color' => '.penci-builder-elements.pcheader-icon.compare-icon > a > span',
		],
		'penci_header_pb_compare_icon_section_item_count_bg'  => [
			'background-color' => '.penci-builder-elements.pcheader-icon.compare-icon > a > span',
		],

		'penci_header_pb_wishlist_icon_section_item_count_txt' => [
			'color' => '.penci-builder-elements.pcheader-icon.wishlist-icon > a > span',
		],
		'penci_header_pb_wishlist_icon_section_item_count_bg'  => [
			'background-color' => '.penci-builder-elements.pcheader-icon.wishlist-icon > a > span',
		],

		// cart
		'penci_header_pb_compare_icon_section_color'           => '.penci-builder-elements.pcheader-icon.compare-icon > a',
		'penci_header_pb_compare_icon_section_hv_color'        => '.penci-builder-elements.pcheader-icon.compare-icon > a:hover',
		'penci_header_pb_wishlist_icon_section_color'          => '.penci-builder-elements.pcheader-icon.wishlist-icon > a',
		'penci_header_pb_wishlist_icon_section_hv_color'       => '.penci-builder-elements.pcheader-icon.wishlist-icon > a:hover',
		'penci_header_pb_cart_icon_section_color'              => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents',
		'penci_header_pb_cart_icon_section_hv_color'           => '.pb-header-builder.cart-icon .top-search-classes a.cart-contents:hover',

		// button font size
		'penci_header_pb_button_txt_size'                      => [
			'font-size' => '.penci-builder-button.button-1',
		],
		'penci_header_pb_button_2_txt_size'                    => [
			'font-size' => '.penci-builder-button.button-2',
		],
		'penci_header_pb_button_3_txt_size'                    => [
			'font-size' => '.penci-builder-button.button-3',
		],
		'penci_header_pb_button_mobile_txt_size'               => [
			'font-size' => '.penci-builder-button.button-mobile-1',
		],
		'penci_header_pb_button_mobile_2_txt_size'             => [
			'font-size' => '.penci-builder-button.button-mobile-2',
		],

		'penci_header_pb_login_register_size'               => [
			'font-size' => '.pc-header-element.penci-topbar-social .pclogin-item a i',
		],
		'penci_header_pb_login_register_txt_size'           => [
			'font-size' => '.pc-header-element.penci-topbar-social .pclogin-item a',
		],

		// sidebar mobile menu
		'penci_header_pb_dropdown_menu_penci_menu_color'    => '.pc-builder-menu.pc-dropdown-menu .menu li a',
		'penci_header_pb_dropdown_menu_penci_menu_hv_color' => '.pc-builder-menu.pc-dropdown-menu .menu li a:hover,.pc-builder-menu.pc-dropdown-menu .menu > li.current_page_item > a',

		// button
		'penci_header_pb_button_font'                       => [
			'font-family' => '.penci-builder.penci-builder-button.button-1',
		],
		'penci_header_pb_button_font_w'                     => [
			'font-weight' => '.penci-builder.penci-builder-button.button-1',
		],
		'penci_header_pb_button_font_s'                     => [
			'font-style' => '.penci-builder.penci-builder-button.button-1',
		],
		'penci_header_pb_button_2_font'                     => [
			'font-family' => '.penci-builder.penci-builder-button.button-2',
		],
		'penci_header_pb_button_2_font_w'                   => [
			'font-weight' => '.penci-builder.penci-builder-button.button-2',
		],
		'penci_header_pb_button_2_font_s'                   => [
			'font-style' => '.penci-builder.penci-builder-button.button-2',
		],
		'penci_header_pb_button_3_font'                     => [
			'font-family' => '.penci-builder.penci-builder-button.button-3',
		],
		'penci_header_pb_button_3_font_w'                   => [
			'font-weight' => '.penci-builder.penci-builder-button.button-3',
		],
		'penci_header_pb_button_3_font_s'                   => [
			'font-style' => '.penci-builder.penci-builder-button.button-3',
		],
		'penci_header_pb_button_mobile_font'                => [
			'font-family' => '.penci-builder.penci-builder-button.button-mobile-1',
		],
		'penci_header_pb_button_mobile_font_w'              => [
			'font-weight' => '.penci-builder.penci-builder-button.button-mobile-1',
		],
		'penci_header_pb_button_mobile_font_s'              => [
			'font-style' => '.penci-builder.penci-builder-button.button-mobile-1',
		],
		'penci_header_pb_button_mobile_2_font'              => [
			'font-family' => '.penci-builder.penci-builder-button.button-mobile-2',
		],
		'penci_header_pb_button_mobile_2_font_w'            => [
			'font-weight' => '.penci-builder.penci-builder-button.button-mobile-2',
		],
		'penci_header_pb_button_mobile_2_font_s'            => [
			'font-style' => '.penci-builder.penci-builder-button.button-mobile-2',
		],
		'penci_header_search_icon_size'                     => [
			'font-size' => '.pc-builder-element.penci-top-search a i',
		],
		'penci_header_pb_data_time_format_size'             => [
			'font-size' => '.penci-builder-element.penci-data-time-format',
		],

		'penci_header_topblock_content_custom_width'            => [
			'width' => '.penci-desktop-topblock .container.container-custom',
		],
		'penci_header_topbar_content_custom_width'              => [
			'width' => '.penci-desktop-topbar .container.container-custom',
		],
		'penci_header_midbar_content_custom_width'              => [
			'width' => '.penci-desktop-midbar .container.container-custom',
		],
		'penci_header_bottombar_content_custom_width'              => [
			'width' => '.penci-desktop-bottombar .container.container-custom',
		],
		'penci_header_bottomblock_content_custom_width'         => [
			'width' => '.penci-desktop-bottomblock .container.container-custom',
		],
		'penci_header_wrap_custom_width'                        => [
			'width' => '.penci-header-builder.main-builder-header.container.container-custom',
		],
		'penci_header_pb_social_icon_section_icon_w'            => [
			'--pchb-socialw' => '.pc-wrapbuilder-header'
		],
		'penci_header_sticky_border_color'                      => [
			'border-color' => '.penci_builder_sticky_header_desktop',
		],
		'penci_header_sticky_border_style'                      => [
			'border-style' => '.penci_builder_sticky_header_desktop',
		],
		'penci_header_sticky_top_content_custom_width'          => [
			'width' => '.penci-desktop-sticky-top .container.container-custom',
		],
		'penci_header_sticky_mid_content_custom_width'          => [
			'width' => '.penci-desktop-sticky-mid .container.container-custom',
		],
		'penci_header_sticky_bottom_content_custom_width'       => [
			'width' => '.penci-desktop-sticky-bottom .container.container-custom',
		],
		'penci_header_desktop_sticky_wrap_custom_width'         => [
			'max-width' => '.penci_builder_sticky_header_desktop.container.container-custom',
		],

		// news ticker
		'penci_header_pb_news_ticker_color'                     => [
			'color' => '.penci-builder-element.penci-topbar-trending a.penci-topbar-post-title',
		],
		'penci_header_pb_news_ticker_hv_color'                  => [
			'color' => '.penci-builder-element.penci-topbar-trending a.penci-topbar-post-title:hover',
		],
		'penci_header_pb_news_ticker_arr_color'                 => [
			'color' => '.penci-builder-element.penci-topbar-trending .penci-trending-nav a',
		],
		'penci_header_pb_news_ticker_arr_hv_color'              => [
			'color' => '.penci-builder-element.penci-topbar-trending .penci-trending-nav a:hover',
		],
		'penci_header_pb_news_ticker_headline_color'            => [
			'color' => '.penci-builder-element.penci-topbar-trending .headline-title',
		],
		'penci_header_pb_news_ticker_headline_bg_style3'        => [
			'border-right-color' => '.penci-builder-element.penci-topbar-trending .headline-title.nticker-style-3::after',
		],
		'penci_header_pb_news_ticker_headline_bg'               => [
			'background-color'    => '.penci-builder-element.penci-topbar-trending .headline-title',
			'border-bottom-color' => '.penci-builder-element.penci-topbar-trending .headline-title.nticker-style-4:after',
			'border-left-color'   => '.penci-builder-element.penci-topbar-trending .headline-title.nticker-style-2:after',
		],
		'penci_header_pb_news_ticker_width'                     => [
			'max-width' => '.penci-builder-element.penci-topbar-trending',
		],
		'penci_header_pb_news_ticker_fs'                        => [
			'font-size' => '.penci-builder-element.penci-topbar-trending a.penci-topbar-post-title',
		],
		'penci_header_pb_news_ticker_arr_fs'                    => [
			'font-size' => '.penci-builder-element.penci-topbar-trending .penci-trending-nav a',
		],
		'penci_header_pb_news_ticker_headline_fs'               => [
			'font-size' => '.penci-builder-element.penci-topbar-trending .headline-title',
		],
		'penci_header_pb_news_ticker_font'                      => [
			'font-family' => '.penci-builder-element.penci-topbar-trending a.penci-topbar-post-title,.penci-builder-element.penci-topbar-trending .headline-title',
		],
		'penci_header_pb_dropdown_menu_penci_menu_border_color' => [
			'border-color' => '.penci-menu-hbg.penci-builder-mobile-sidebar-nav .menu li,.penci-menu-hbg.penci-builder-mobile-sidebar-nav ul.sub-menu'
		],
		'penci_header_pb_hamburger_menu_size'                   => [
			'--pcbd-menuhbg-size' => '.penci-menuhbg-toggle.builder',
		],
		'penci_header_pb_search_form_txt_color'                 => [
			'--pcs-d-txt-cl' => '.penci-builder-element.pc-search-form-desktop'
		],
		'penci_header_pb_search_form_sidebar_txt_color'         => [
			'--pcs-s-txt-cl' => '.penci-builder-element.pc-search-form-sidebar'
		],
		'penci_header_border_color'                             => [
			'border-color' => '.penci_header.main-builder-header',
		],
		'penci_header_border_style'                             => [
			'border-style' => '.penci_header.main-builder-header',
		],
		'penci_header_pb_mobile_menu_color'                     => [
			'color' => '.navigation .button-menu-mobile',
			'fill' => '.navigation .button-menu-mobile svg',
		],
		'penci_header_pb_mobile_menu_hv_color'                  => [
			'color' => '.navigation .button-menu-mobile:hover',
			'fill' => '.navigation .button-menu-mobile:hover svg',
		],
		'penci_header_search_border_color'                      => [
			'border-bottom-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search:before',
			'border-top-color'    => '.header-search-style-showup .pc-wrapbuilder-header .show-search'
		],
		'penci_header_search_bg_color'                          => [
			'background-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search'
		],
		'penci_header_search_input_border_color'                => [
			'border-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
		],
		'penci_header_search_input_bg_color'                    => [
			'background-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
		],
		'penci_header_search_input_color'                       => [
			'--pchd-sinput-txt' => '.pc-wrapbuilder-header',
		],
		'penci_header_search_button_bg_color'                   => [
			'background-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit',
		],
		'penci_header_search_button_bg_hcolor'                  => [
			'background-color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit:hover',
		],
		'penci_header_search_button_color'                      => [
			'color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit',
		],
		'penci_header_search_button_hcolor'                     => [
			'color' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit:hover',
		],
		'penci_header_search_input_size'                        => [
			'font-size' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform input.search-input',
		],
		'penci_header_search_btn_size'                          => [
			'font-size' => '.header-search-style-showup .pc-wrapbuilder-header .show-search form.pc-searchform .searchsubmit',
		],
		'penci_header_builder_pb_html_color'                    => [
			'color' => '.penci-builder-element.penci-html-ads-1',
		],
		'penci_header_builder_pb_html_link_color'               => [
			'color' => '.penci-builder-element.penci-html-ads-1 a',
		],
		'penci_header_builder_pb_html_fsize'                    => [
			'font-size' => '.penci-builder-element.penci-html-ads-1,.penci-builder-element.penci-html-ads-1 *',
		],
		'penci_header_builder_pb_html_2_color'                  => [
			'color' => '.penci-builder-element.penci-html-ads-2',
		],
		'penci_header_builder_pb_html_2_link_color'             => [
			'color' => '.penci-builder-element.penci-html-ads-2 a',
		],
		'penci_header_builder_pb_html_2_fsize'                  => [
			'font-size' => '.penci-builder-element.penci-html-ads-2,.penci-builder-element.penci-html-ads-2 *',
		],
		'penci_header_builder_pb_html_3_color'                  => [
			'color' => '.penci-builder-element.penci-html-ads-3',
		],
		'penci_header_builder_pb_html_3_link_color'             => [
			'color' => '.penci-builder-element.penci-html-ads-3 a',
		],
		'penci_header_builder_pb_html_3_fsize'                  => [
			'font-size' => '.penci-builder-element.penci-html-ads-3,.penci-builder-element.penci-html-ads-3 *',
		],
		'penci_header_builder_pb_html_mobile_color'             => [
			'color' => '.penci-builder-element.penci-html-ads-mobile',
		],
		'penci_header_builder_pb_html_mobile_link_color'        => [
			'color' => '.penci-builder-element.penci-html-ads-mobile a',
		],
		'penci_header_builder_pb_html_mobile_fsize'             => [
			'font-size' => '.penci-builder-element.penci-html-ads-mobile,.penci-builder-element.penci-html-ads-mobile *',
		],
		'penci_header_builder_pb_html_mobile_2_color'           => [
			'color' => '.penci-builder-element.penci-html-ads-mobile-2',
		],
		'penci_header_builder_pb_html_mobile_2_link_color'      => [
			'color' => '.penci-builder-element.penci-html-ads-mobile-2 a',
		],
		'penci_header_builder_pb_html_mobile_2_fsize'           => [
			'font-size' => '.penci-builder-element.penci-html-ads-mobile-2,.penci-builder-element.penci-html-ads-mobile-2 *',
		],
		'penci_header_pb_search_form_input_size'                => [
			'font-size' => '.penci-builder-element.pc-search-form-desktop form.pc-searchform input.search-input',
		],
		'penci_header_pb_search_form_btn_size'                  => [
			'font-size' => '.pc-search-form-desktop.search-style-default i,
							.pc-search-form-desktop.search-style-icon-button .searchsubmit:before,
							.pc-search-form-desktop.search-style-text-button .searchsubmit',
		],
		'penci_header_pb_search_form_sidebar_input_size'        => [
			'font-size' => '.penci-builder-element.pc-search-form-sidebar form.pc-searchform input.search-input',
		],
		'penci_header_pb_search_form_sidebar_btn_size'          => [
			'font-size' => '.pc-search-form-sidebar.search-style-default i,
							.pc-search-form-sidebar.search-style-icon-button .searchsubmit:before,
							.pc-search-form-sidebar.search-style-text-button .searchsubmit',
		],
	];

	foreach ( $color_css as $value => $selector ) {
		$control_value = penci_get_builder_mod( $value );
		$prefix        = '';
		if ( is_array( $selector ) && ! empty( $control_value ) ) {
			foreach ( $selector as $prop => $subselect ) {
				if ( $prop == 'font-family' ) {
					$control_value = penci_builder_get_font_data( $control_value );
				}
				$prefix = is_numeric( $control_value ) && $prop !== 'font-weight' ? 'px' : '';
				$out    .= $subselect . '{' . $prop . ':' . $control_value . $prefix . '}';
			}
		} elseif ( ! empty( $control_value ) ) {
			$out .= $selector . '{color:' . $control_value . $prefix . '}';
		}
	}

	$search_form_height = penci_get_builder_mod( 'penci_header_pb_search_form_height' );
	if ( ! empty( $search_form_height ) ) {
		$out .= '.penci-builder-element.pc-search-form-desktop,.penci-builder-element.pc-search-form-desktop.search-style-icon-button .search-input,.penci-builder-element.pc-search-form-desktop.search-style-text-button .search-input{';
		$out .= 'line-height:' . ( $search_form_height - 2 ) . 'px';
		$out .= '}';

		$out .= '.penci-builder-element.pc-search-form-desktop.search-style-default .search-input{';
		$out .= 'line-height:' . ( $search_form_height - 2 ) . 'px;padding-top:0;padding-bottom:0';
		$out .= '}';
	}

	$search_form_sidebar_height = penci_get_builder_mod( 'penci_header_pb_search_form_sidebar_height' );
	if ( ! empty( $search_form_sidebar_height ) ) {
		$out .= '.penci-builder-element.pc-search-form.pc-search-form-sidebar,.penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .search-input,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .search-input{';
		$out .= 'line-height:' . ( $search_form_sidebar_height - 2 ) . 'px';
		$out .= '}';

		$out .= '.penci-builder-element.pc-search-form-sidebar.search-style-default .search-input{';
		$out .= 'line-height:' . ( $search_form_sidebar_height - 2 ) . 'px;padding-top:0;padding-bottom:0';
		$out .= '}';
	}

	// search
	$search_form_width = penci_get_builder_mod( 'penci_header_pb_search_form_width' );
	if ( ! empty( $search_form_width ) ) {
		$out .= '.penci-builder-element.pc-search-form-desktop,.penci-builder-element.pc-search-form-desktop.search-style-icon-button .search-input,.penci-builder-element.pc-search-form-desktop.search-style-text-button .search-input{';
		$out .= 'max-width:' . $search_form_width . 'px;';
		$out .= '}';
	}

	$search_form_sidebar_width = penci_get_builder_mod( 'penci_header_pb_search_form_sidebar_width' );
	if ( ! empty( $search_form_sidebar_width ) ) {
		$out .= '.penci-builder-element.pc-search-form.pc-search-form-sidebar,.penci-builder-element.pc-search-form.search-style-icon-button.pc-search-form-sidebar .search-input,.penci-builder-element.pc-search-form.search-style-text-button.pc-search-form-sidebar .search-input{';
		$out .= 'max-width:' . $search_form_sidebar_width . 'px;';
		$out .= '}';
	}

	// mobile logo
	$logo_mobile_spacing = penci_get_builder_mod( 'penci_header_pb_logo_mobile_spacing' );
	$out                 .= '.pc-builder-element.pc-logo.pb-logo-mobile{';
	$out                 .= penci_builder_spacing_extract_data( $logo_mobile_spacing );
	$out                 .= '}';

	// social icon line height
	$social_icon_height = penci_get_builder_mod( 'penci_header_pb_social_icon_section_icon_h' );
	$social_icon_style  = penci_get_builder_mod( 'penci_header_pb_social_icon_section_icon_style' );

	if ( ! empty( $social_icon_height ) ) {
		$social_line_height = $social_icon_height;
		if ( 'simple' != $social_icon_style ) {
			$social_line_height = $social_icon_height - 2;
		}
		$out .= '.penci-builder-element.header-social.desktop-social a i,.penci-builder-element.header-social.desktop-social .penci-social-simple a i{line-height:' . $social_line_height . 'px;}';
	}

	// social icon mobile height
	$social_mobile_icon_height = penci_get_builder_mod( 'penci_header_pb_social_icon_mobile_section_icon_h' );
	$social_mobile_icon_style  = penci_get_builder_mod( 'penci_header_pb_social_icon_mobile_section_icon_style' );

	if ( ! empty( $social_mobile_icon_height ) ) {
		$social_mobile_line_height = $social_mobile_icon_height;
		if ( 'simple' != $social_mobile_icon_style ) {
			$social_mobile_line_height = $social_mobile_icon_height - 2;
		}
		$out .= '.penci-builder-element.header-social.mobile-social a i,.penci-builder-element.header-social.mobile-social .penci-social-simple a i{line-height:' . $social_mobile_line_height . 'px;}';
	}

	// font for login text
	$out        .= '.pc-header-element.penci-topbar-social .pclogin-item a{';
	$login_font = penci_get_builder_mod( 'penci_header_pb_login_register_penci_font_login_text' );
	if ( ! empty( $login_font ) ) {
		$out .= 'font-family:' . penci_builder_get_font_data( $login_font ) . ';';
	}
	$login_uppercase = penci_get_builder_mod( 'penci_header_pb_login_register_text_uppercase' );
	if ( 'enable' == $login_uppercase ) {
		$out .= 'text-transform:uppercase;';
	}
	$login_weight = penci_get_builder_mod( 'penci_header_pb_login_register_penci_fontw_login_text' );
	if ( ! empty( $login_weight ) ) {
		$out .= 'font-weight:' . $login_weight . ';';
	}
	$out .= '}';

	$out .= 'body.penci-header-preview-layout .wrapper-boxed{min-height:1500px}';


	echo $out . $return;
}

function penci_builder_get_font_data( $setting ) {
	if ( ! $setting ) {
		return false;
	}
	$font_data = str_replace( '"', '', $setting );
	$font_data = explode( ", ", $font_data );

	$out = '';
	if ( isset( $font_data[0] ) ) {
		$out .= "'" . $font_data[0] . "'";
	}
	if ( isset( $font_data[2] ) ) {
		$out .= ', ' . $font_data[2];
	}

	return $out;
}

function penci_builder_get_area_css( $area, $cssprefix = '', $optionprefix = '', $customselect = '' ) {
	if ( ! empty( $customselect ) ) {
		$out = $customselect . '{';
	} else {
		$out = '.penci_header_overlap .penci-' . $cssprefix . '-' . $area . ',.penci-' . $cssprefix . '-' . $area . '{';
	}
	$out                   .= 'border-width:0;';
	$background_img        = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_background_img' );
	$background_color      = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_background_color' );
	$background_repeat     = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_background_repeat' );
	$background_position   = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_background_position' );
	$background_size       = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_background_size' );
	$background_attachment = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_background_attachment' );
	$background_spacing    = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_spacing_setting' );
	$background_border     = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_border_setting' );
	$border_style          = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_border_style_setting' );
	$background_text_color = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_text_color_setting' );
	$background_maxheight  = penci_get_builder_mod( 'penci_' . $optionprefix . '_' . $area . '_maxheight_setting' );

	if ( ! empty( $background_img ) ) {
		$out .= 'background-image:url(' . esc_url( $background_img ) . ');';
	}

	if ( ! empty( $background_color ) ) {
		$out .= 'background-color:' . esc_attr( $background_color ) . ';';
	}

	if ( ! empty( $background_repeat ) ) {
		$out .= 'background-repeat:' . esc_attr( $background_repeat ) . ';';
	}

	if ( ! empty( $background_position ) ) {
		$out .= 'background-position:' . esc_attr( $background_position ) . ';';
	}
	if ( ! empty( $background_size ) ) {
		$out .= 'background-size:' . esc_attr( $background_size ) . ';';
	}
	if ( ! empty( $background_attachment ) ) {
		$out .= 'background-attachment:' . esc_attr( $background_attachment ) . ';';
	}
	if ( ! empty( $background_border ) ) {
		$out .= 'border-color:' . esc_attr( $background_border ) . ';';
	}
	if ( ! empty( $border_style ) ) {
		$out .= 'border-style:' . esc_attr( $border_style ) . ';';
	}
	if ( ! empty( $background_text_color ) ) {
		$out .= 'color:' . esc_attr( $background_text_color ) . ';';
	}
	if ( ! empty( $background_maxheight ) ) {
		$out .= 'max-height:' . esc_attr( $background_maxheight ) . ';';
	}
	if ( ! empty( $background_spacing ) ) {
		$out .= penci_builder_spacing_extract_data( $background_spacing );
	}

	$out .= '}';

	return $out;
}

function penci_builder_spacing_extract_data( $number = '', $out = '' ) {
	$mpb = explode( ',', $number );
	if ( isset( $mpb[0] ) && is_numeric( $mpb[0] ) ) {
		$out .= 'margin-top:' . esc_attr( $mpb[0] ) . 'px;';
	}
	if ( isset( $mpb[1] ) && is_numeric( $mpb[1] ) ) {
		$out .= 'margin-right:' . esc_attr( $mpb[1] ) . 'px;';
	}
	if ( isset( $mpb[2] ) && is_numeric( $mpb[2] ) ) {
		$out .= 'margin-bottom:' . esc_attr( $mpb[2] ) . 'px;';
	}
	if ( isset( $mpb[3] ) && is_numeric( $mpb[3] ) ) {
		$out .= 'margin-left:' . esc_attr( $mpb[3] ) . 'px;';
	}

	if ( isset( $mpb[4] ) && is_numeric( $mpb[4] ) ) {
		$out .= 'padding-top:' . esc_attr( $mpb[4] ) . 'px;';
	}
	if ( isset( $mpb[5] ) && is_numeric( $mpb[5] ) ) {
		$out .= 'padding-right:' . esc_attr( $mpb[5] ) . 'px;';
	}
	if ( isset( $mpb[6] ) && is_numeric( $mpb[6] ) ) {
		$out .= 'padding-bottom:' . esc_attr( $mpb[6] ) . 'px;';
	}
	if ( isset( $mpb[7] ) && is_numeric( $mpb[7] ) ) {
		$out .= 'padding-left:' . esc_attr( $mpb[7] ) . 'px;';
	}

	if ( isset( $mpb[8] ) && is_numeric( $mpb[8] ) ) {
		$out .= 'border-top-width:' . esc_attr( $mpb[8] ) . 'px;';
	}
	if ( isset( $mpb[9] ) && is_numeric( $mpb[9] ) ) {
		$out .= 'border-right-width:' . esc_attr( $mpb[9] ) . 'px;';
	}
	if ( isset( $mpb[10] ) && is_numeric( $mpb[10] ) ) {
		$out .= 'border-bottom-width:' . esc_attr( $mpb[10] ) . 'px;';
	}
	if ( isset( $mpb[11] ) && is_numeric( $mpb[11] ) ) {
		$out .= 'border-left-width:' . esc_attr( $mpb[11] ) . 'px;';
	}

	if ( isset( $mpb[12] ) && is_numeric( $mpb[12] ) ) {
		$out .= 'border-top-left-radius:' . esc_attr( $mpb[12] ) . 'px;';
	}
	if ( isset( $mpb[13] ) && is_numeric( $mpb[13] ) ) {
		$out .= 'border-top-right-radius:' . esc_attr( $mpb[13] ) . 'px;';
	}
	if ( isset( $mpb[14] ) && is_numeric( $mpb[14] ) ) {
		$out .= 'border-bottom-right-radius:' . esc_attr( $mpb[14] ) . 'px;';
	}
	if ( isset( $mpb[15] ) && is_numeric( $mpb[15] ) ) {
		$out .= 'border-bottom-left-radius:' . esc_attr( $mpb[15] ) . 'px;';
	}

	return $out;
}

function penci_builder_preview_css( $color_css, $wrap = false ) {
	$out = $before = $after = '';
	foreach ( $color_css as $value => $selector ) {
		$control_value = penci_get_builder_mod( $value );
		$prefix        = is_numeric( $control_value ) ? 'px' : '';
		if ( is_array( $selector ) && ! empty( $control_value ) ) {
			foreach ( $selector as $prop => $subselect ) {
				$out .= $subselect . '{' . $prop . ':' . $control_value . $prefix . '}';
			}
		} elseif ( ! empty( $control_value ) ) {
			$out .= $selector . '{color:' . $control_value . $prefix . '}';
		}
	}

	if ( $wrap ) {
		$before = '<style>';
		$after  = '</style>';
	}

	return $before . $out . $after;
}
