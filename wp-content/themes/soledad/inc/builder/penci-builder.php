<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Plugin;

define( 'PENCI_BUILDER_PATH', get_template_directory() . '/inc/builder/' );
define( 'PENCI_BUILDER_URL', get_template_directory_uri() . '/inc/builder/' );
require_once get_template_directory() . '/inc/builder/class/template.php';
require_once get_template_directory() . '/inc/builder/customizer/menu-callback.php';
require_once get_template_directory() . '/inc/builder/customizer/builder_helper.php';
require_once get_template_directory() . '/inc/builder/class/header_builder.php';
require_once get_template_directory() . '/inc/builder/customizer/style.php';

HeaderBuilder::getInstance();

add_action( 'init', function () {
	require_once get_template_directory() . '/inc/builder/class/builder_panel.php';
	require_once get_template_directory() . '/inc/builder/class/sections.php';
	\SoledadFW\HeaderBuilderCustomizer::getInstance();
} );

if ( ! function_exists( 'penci_check_theme_mod' ) ) {
	function penci_check_theme_mod( $settings ) {
		$val          = false;
		$page_data    = get_theme_mod( 'pchdbd_all' );
		$page_archive = get_theme_mod( 'pchdbd_archive' );
		$page_posts   = get_theme_mod( 'pchdbd_post' );
		$page_pages   = get_theme_mod( 'pchdbd_page' );
		$page_home    = get_theme_mod( 'pchdbd_homepage' );
		if ( ! empty( $page_data ) ) {
			$val = true;
		}
		if ( ! empty( $page_home ) && ( is_home() || is_front_page() ) ) {
			$val = true;
		}
		if ( ! empty( $page_archive ) && is_archive() ) {
			$val = true;
		}
		if ( ! empty( $page_posts ) && is_single() ) {
			$val = true;
		}
		if ( ! empty( $page_pages ) && is_page() ) {
			$val = true;
		}
		if ( is_page() ) {

			$data_check = get_post_meta( get_the_ID(), 'penci_pmeta_page_header', true );

			if ( is_array( $data_check ) && ! empty( $data_check ) && isset( $data_check['header_builder_layout'] ) && $data_check['header_builder_layout'] ) {
				$val = true;
			}
		}
		if ( is_singular() && ! is_page() && get_post_meta( get_the_ID(), 'penci_header_builder_layout', true ) ) {
			$val = true;
		}
		if ( is_singular( 'penci_builder' ) || is_singular( 'penci-block' ) ) {
			$val = true;
		}
		if ( isset( $_GET['view-header-layout'] ) ) {
			$val = true;
		}
		if ( is_customize_preview() && isset( $_GET['layout_id'] ) ) {
			$val = true;
		}

		if ( get_theme_mod( 'penci_vertical_nav_show' ) ) {
			$val = false;
		}


		return $val;
	}
}

if ( ! function_exists( 'penci_can_render_footer' ) ) {
	function penci_can_render_footer() {
		$render = false;

		$footer_site    = get_theme_mod( 'penci_footer_builder_layout' );
		$footer_home    = get_theme_mod( 'penci_footer_builder_layout_homepage' );
		$footer_archive = get_theme_mod( 'penci_footer_builder_layout_archive' );
		$footer_page    = get_theme_mod( 'penci_footer_builder_layout_page' );
		$footer_post    = get_theme_mod( 'penci_footer_builder_layout_post' );

		if ( ! empty( $footer_site ) ) {
			$render = true;
		}

		if ( ! empty( $footer_home ) && ( is_home() || is_front_page() ) ) {
			$render = true;
		}

		if ( ! empty( $footer_archive ) && is_archive() ) {
			$render = true;
		}

		if ( ! empty( $footer_post ) && is_single() ) {
			$render = true;
		}

		if ( ! empty( $footer_page ) && is_page() ) {
			$render = true;
		}

		if ( is_singular() && ! is_page() && get_post_meta( get_the_ID(), 'penci_footer_builder_layout', true ) ) {
			$render = true;
		}

		if ( is_page() ) {
			$data_check = get_post_meta( get_the_ID(), 'penci_pmeta_page_footer', true );
			if ( is_array( $data_check ) && ! empty( $data_check ) && isset( $data_check['footer_builder_layout'] ) && $data_check['footer_builder_layout'] ) {
				$render = true;
			}
		}

		if ( is_singular( 'penci-block' ) ) {
			$render = true;
		}

		if ( isset( $_GET['layout_id'] ) && is_customize_preview() ) {
			$render = true;
		}

		return $render;
	}
}

if ( ! function_exists( 'penci_get_builder_mod' ) ) {
	function penci_get_builder_mod( $setting, $default = '' ) {
		$header_data     = '';
		$data            = get_theme_mod( $setting, $default );
		$page_data       = get_theme_mod( 'pchdbd_all' );
		$page_archive    = get_theme_mod( 'pchdbd_archive' );
		$page_posts      = get_theme_mod( 'pchdbd_post' );
		$page_pages      = get_theme_mod( 'pchdbd_page' );
		$page_home       = get_theme_mod( 'pchdbd_homepage' );
		$customizer_save = isset( $_GET['layout_id'] ) ? (int) $_GET['layout_id'] : '';
		$header_id       = '';

		if ( ( is_home() || is_front_page() ) && $page_home ) {
			$page_home = get_page_by_path( $page_home, OBJECT, 'penci_builder' );
			$header_id = isset( $page_home->ID ) && $page_home->ID ? $page_home->ID : '';
		} elseif ( is_archive() && $page_archive ) {
			$page_archive = get_page_by_path( $page_archive, OBJECT, 'penci_builder' );
			$header_id    = isset( $page_archive->ID ) && $page_archive->ID ? $page_archive->ID : '';
		} elseif ( is_singular() && ! is_page() ) {
			$data_check = get_post_meta( get_the_ID(), 'penci_header_builder_layout', true );
			if ( $data_check ) {
				$header_id = $data_check;
			} elseif ( $page_posts ) {
				$page_posts = get_page_by_path( $page_posts, OBJECT, 'penci_builder' );
				$header_id  = isset( $page_posts->ID ) && $page_posts->ID ? $page_posts->ID : '';
			} elseif ( $page_data ) {
				$page_data = get_page_by_path( $page_data, OBJECT, 'penci_builder' );
				$header_id = isset( $page_data->ID ) && $page_data->ID ? $page_data->ID : '';
			}

		} elseif ( is_page() ) {
			$data_check = get_post_meta( get_the_ID(), 'penci_pmeta_page_header', true );
			if ( isset( $data_check['header_builder_layout'] ) && $data_check['header_builder_layout'] ) {
				$header_id = $data_check['header_builder_layout'];
			} elseif ( $page_pages ) {
				$page_pages = get_page_by_path( $page_pages, OBJECT, 'penci_builder' );
				$header_id  = isset( $page_pages->ID ) && $page_pages->ID ? $page_pages->ID : '';
			} elseif ( $page_data ) {
				$page_data = get_page_by_path( $page_data, OBJECT, 'penci_builder' );
				$header_id = isset( $page_data->ID ) && $page_data->ID ? $page_data->ID : '';
			}
		} elseif ( $page_data ) {
			$page_data = get_page_by_path( $page_data, OBJECT, 'penci_builder' );
			$header_id = isset( $page_data->ID ) && $page_data->ID ? $page_data->ID : '';
		}

		if ( $header_id ) {
			$header_data = get_post_meta( $header_id, 'settings_content', true );
			$data        = isset( $header_data[ $setting ] ) && ! empty( $header_data[ $setting ] ) ? $header_data[ $setting ] : $default;
		}

		if ( is_singular( 'penci_builder' ) ) {
			$header_data = get_post_meta( get_the_ID(), 'settings_content', true );
			$data        = isset( $header_data[ $setting ] ) && ! empty( $header_data[ $setting ] ) ? $header_data[ $setting ] : $default;
		}

		if ( is_customize_preview() && ! empty( $customizer_save ) ) {
			$data = get_theme_mod( $setting, $default );
		}

		if ( isset( $_GET['view-header-layout'] ) ) {
			$header_data = get_post_meta( $_GET['view-header-layout'], 'settings_content', true );
			$data        = isset( $header_data[ $setting ] ) && ! empty( $header_data[ $setting ] ) ? $header_data[ $setting ] : $default;
		}

		if ( is_array( $data ) ) {
			$data = implode( ',', $data );
		}

		if ( ! $data ) {
			$data = $default;
		}

		return $data;
	}
}

add_action( 'wp_enqueue_scripts', function () {
	if ( penci_check_theme_mod( 'penci_enable_builder' ) ) {
		wp_enqueue_style( 'penci-header-builder-fonts', penci_builder_fonts_url(), array(), PENCI_SOLEDAD_VERSION );
		wp_enqueue_script( 'penci-header-builder', get_template_directory_uri() . '/inc/builder/assets/js/penci-header-builder.js', array(), PENCI_SOLEDAD_VERSION, true );
	}
} );

function penci_footer_builder_content_id() {
	$footer_id = '';
	$footer_site    = get_theme_mod( 'penci_footer_builder_layout' );
	$footer_home    = get_theme_mod( 'penci_footer_builder_layout_homepage' );
	$footer_archive = get_theme_mod( 'penci_footer_builder_layout_archive' );
	$footer_page    = get_theme_mod( 'penci_footer_builder_layout_page' );
	$footer_post    = get_theme_mod( 'penci_footer_builder_layout_post' );

	if ( ( is_home() || is_front_page() ) && $footer_home ) {
		$footer_home = get_page_by_path( $footer_home, OBJECT, 'penci-block' );
		if ( isset( $footer_home->ID ) && $footer_home->ID ) {
			$footer_id = $footer_home->ID;
		}
	} elseif ( is_archive() && $footer_archive ) {
		$footer_archive = get_page_by_path( $footer_archive, OBJECT, 'penci-block' );
		if ( isset( $footer_archive->ID ) && $footer_archive->ID ) {
			$footer_id = $footer_archive->ID;
		}
	} elseif ( is_singular() && ! is_page() ) {
		$post_config = get_post_meta( get_the_ID(), 'penci_footer_builder_layout', true );
		if ( $post_config ) {
			$footer_id = $post_config;
		} elseif ( $footer_post ) {
			$footer_post = get_page_by_path( $footer_post, OBJECT, 'penci-block' );
			if ( isset( $footer_post->ID ) && $footer_post->ID ) {
				$footer_id = $footer_post->ID;
			}
		} elseif ( $footer_site ) {
			$footer_site = get_page_by_path( $footer_site, OBJECT, 'penci-block' );
			if ( isset( $footer_site->ID ) && $footer_site->ID ) {
				$footer_id = $footer_site->ID;
			}
		}
	} elseif ( is_page() ) {
		$page_config = get_post_meta( get_the_ID(), 'penci_pmeta_page_footer', true );
		if ( isset( $page_config['footer_builder_layout'] ) && $page_config['footer_builder_layout'] ) {
			$footer_id = $page_config['footer_builder_layout'];
		} elseif ( $footer_page ) {
			$footer_page = get_page_by_path( $footer_page, OBJECT, 'penci-block' );
			if ( isset( $footer_page->ID ) && $footer_page->ID ) {
				$footer_id = $footer_page->ID;
			}
		} elseif ( $footer_site ) {
			$footer_site = get_page_by_path( $footer_site, OBJECT, 'penci-block' );
			if ( isset( $footer_site->ID ) && $footer_site->ID ) {
				$footer_id = $footer_site->ID;
			}
		}
	} elseif ( $footer_site ) {
		$footer_site = get_page_by_path( $footer_site, OBJECT, 'penci-block' );
		if ( isset( $footer_site->ID ) && $footer_site->ID ) {
			$footer_id = $footer_site->ID;
		}
	}

	return $footer_id;
}

function penci_footer_builder_content() {
	if ( is_singular( 'penci-block' ) || ( isset( $_GET['layout_id'] ) && is_customize_preview() ) ) {
		return;
	}
	$content   = '';
	$footer_id = penci_footer_builder_content_id();
	if ( $footer_id ) {
		$footer_content = get_post( $footer_id );

		if ( $footer_content ) {
			if ( did_action( 'elementor/loaded' ) && Plugin::$instance->documents->get( $footer_id )->is_built_with_elementor() ) {
				$content .= '<div class="pcfb-wrapper">';
				$content .= Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $footer_id );
				$content .= '</div>';
			} else {
				$content .= '<div class="pcfb-wrapper js-composer-content">';
				$content .= do_shortcode( $footer_content->post_content );

				$shortcodes_custom_css = get_post_meta( $footer_id, '_wpb_shortcodes_custom_css', true );

				$content .= '<style data-type="vc_shortcodes-custom-css">';
				if ( ! empty( $shortcodes_custom_css ) ) {
					$content .= $shortcodes_custom_css;
				}
				$content .= '</style>';
				$content .= '</div>';
			}
		}
	}

	echo $content;
}

if ( ! function_exists( 'penci_builder_header_list' ) ) {
	function penci_builder_header_list() {
		$header_layout  = [ '' => '- Select -' ];
		$header_layouts = get_posts( [
			'post_type'      => 'penci_builder',
			'posts_per_page' => - 1,
		] );
		foreach ( $header_layouts as $header_builder ) {
			$header_layout[ $header_builder->post_name ] = $header_builder->post_title;
		}

		return $header_layout;
	}
}

if ( ! function_exists( 'penci_builder_block_list' ) ) {
	function penci_builder_block_list() {
		$builder_layout  = [ '' => '- Select -' ];
		$builder_layouts = get_posts( [
			'post_type'      => 'penci-block',
			'posts_per_page' => - 1,
		] );

		foreach ( $builder_layouts as $builder_builder ) {
			$builder_layout[ $builder_builder->post_name ] = $builder_builder->post_title;
		}

		return $builder_layout;
	}
}
