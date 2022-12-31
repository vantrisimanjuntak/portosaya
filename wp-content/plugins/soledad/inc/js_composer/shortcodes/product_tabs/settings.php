<?php
vc_map(
	array(
		'name'                    => esc_html__( 'Penci Product Tabs', 'soledad' ),
		'base'                    => 'penci_product_tabs',
		'as_parent'               => array( 'only' => 'penci_product_tab' ),
		'content_element'         => true,
		'show_settings_on_create' => true,
		'html_template'           => get_template_directory() . '/inc/js_composer/shortcodes/product_tabs/frontend.php',
		'category'                => esc_html__( 'Soledad', 'soledad' ),
		'description'             => esc_html__( 'Product tabs for your marketplace', 'soledad' ),
		'icon'                    => get_template_directory_uri() . '/images/vc-icon.png',
		'params'                  => array(
			/**
			 * Title
			 */
			array(
				'type'       => 'textfield',
				'heading'    => esc_html__( 'Tabs title', 'soledad' ),
				'param_name' => 'title',
			),
			/**
			 * Image
			 */
			array(
				'type'             => 'attach_image',
				'heading'          => esc_html__( 'Icon image', 'soledad' ),
				'param_name'       => 'image',
				'value'            => '',
				'hint'             => esc_html__( 'Select image from media library.', 'soledad' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),

			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Images size', 'soledad' ),
				'param_name'       => 'img_size',
				'hint'             => esc_html__( 'Enter image size. Example: \'thumbnail\', \'medium\', \'large\', \'full\' or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use \'thumbnail\' size.', 'soledad' ),
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'description'      => esc_html__( 'Example: \'thumbnail\', \'medium\', \'large\', \'full\' or enter image size in pixels: \'200x100\'.', 'soledad' ),
			),
			/**
			 * Style
			 */
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Tabs color', 'soledad' ),
				'param_name'       => 'color',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Design', 'soledad' ),
				'param_name'       => 'design',
				'value'            => array(
					esc_html__( 'Default', 'soledad' )     => 'default',
					esc_html__( 'Simple', 'soledad' )      => 'simple',
					esc_html__( 'Alternative', 'soledad' ) => 'alt',
				),
				'std'              => 'default',
				'edit_field_class' => 'vc_col-sm-6 vc_column title-align',
			),
			array(
				'type'             => 'dropdown',
				'heading'          => esc_html__( 'Alignment', 'soledad' ),
				'param_name'       => 'alignment',
				'value'            => array(
					esc_html__( 'Left', 'soledad' )   => 'left',
					esc_html__( 'Center', 'soledad' ) => 'center',
					esc_html__( 'Right', 'soledad' )  => 'right',
				),
				'dependency'       => array(
					'element' => 'design',
					'value'   => array( 'default' ),
				),
				'std'              => 'center',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
			),
			array(
				'type'             => 'textfield',
				'heading'          => esc_html__( 'Extra class name', 'soledad' ),
				'param_name'       => 'el_class',
				'edit_field_class' => 'vc_col-sm-6 vc_column',
				'hint'             => esc_html__( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'soledad' ),
			),
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Products Display', 'soledad' ),
				'value'            => array(
					esc_html__( 'Grid', 'soledad' )     => 'grid',
					esc_html__( 'List', 'soledad' )     => 'list',
					esc_html__( 'Carousel', 'soledad' ) => 'carousel',
				),
				'std'              => 'grid',
				'param_name'       => 'layout',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Columns', 'soledad' ),
				'value'            => array(
					esc_html__( '2 Columns', 'soledad' ) => 2,
					esc_html__( '3 Columns', 'soledad' ) => 3,
					esc_html__( '4 Columns', 'soledad' ) => 4,
					esc_html__( '5 Columns', 'soledad' ) => 5,
					esc_html__( '6 Columns', 'soledad' ) => 6,
				),
				'std'              => 3,
				'param_name'       => 'columns',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Tablet Columns', 'soledad' ),
				'value'            => array(
					esc_html__( '2 Columns', 'soledad' ) => 2,
					esc_html__( '3 Columns', 'soledad' ) => 3,
					esc_html__( '4 Columns', 'soledad' ) => 4,
					esc_html__( '5 Columns', 'soledad' ) => 5,
					esc_html__( '6 Columns', 'soledad' ) => 6,
				),
				'std'              => 2,
				'param_name'       => 'tablet_columns',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Mobile Columns', 'soledad' ),
				'value'            => array(
					esc_html__( '2 Columns', 'soledad' ) => 2,
					esc_html__( '3 Columns', 'soledad' ) => 3,
					esc_html__( '4 Columns', 'soledad' ) => 4,
					esc_html__( '5 Columns', 'soledad' ) => 5,
					esc_html__( '6 Columns', 'soledad' ) => 6,
				),
				'std'              => 1,
				'param_name'       => 'mobile_columns',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'textfield',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Items per page', 'soledad' ),
				'std'              => '12',
				'param_name'       => 'items_per_page',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'group'            => 'Layout & Design',
				'heading'          => __( 'Paginations', 'soledad' ),
				'value'            => array(
					esc_html__( 'Inherit', 'soledad' )           => '',
					esc_html__( 'Load more button', 'soledad' )  => 'loadmore',
					esc_html__( 'Infinit scrolling', 'soledad' ) => 'infinit',
					esc_html__( 'Next/Previous', 'soledad' )     => 'next_previous',
					esc_html__( 'Links Number', 'soledad' )      => 'links',
					esc_html__( 'Hidden', 'soledad' )            => 'none',
				),
				'std'              => '',
				'param_name'       => 'pagination',
				'edit_field_class' => 'vc_col-sm-6',
			),

			// Carousel Settings
			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Scroll per page', 'soledad' ),
				'std'        => '3',
				'param_name' => 'scroll_per_page',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Show Next Previous Button', 'soledad' ),
				'std'        => '',
				'param_name' => 'hide_prev_next_buttons',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Show Pagination Control', 'soledad' ),
				'std'        => '',
				'param_name' => 'hide_pagination_control',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Slider Loop', 'soledad' ),
				'std'        => '',
				'param_name' => 'wrap',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Slider Autoplay', 'soledad' ),
				'std'        => '',
				'param_name' => 'autoplay',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'textfield',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Carousel Speed', 'soledad' ),
				'std'        => '300',
				'param_name' => 'speed',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),

			array(
				'type'       => 'checkbox',
				'group'      => 'Layout & Design',
				'heading'    => __( 'Init carousel on scroll', 'soledad' ),
				'std'        => '',
				'param_name' => 'scroll_carousel_init',
				'dependency' => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'       => 'dropdown',
				'group'      => 'Product Style',
				'heading'    => __( 'Product Style', 'soledad' ),
				'value'      => array(
					esc_html__( 'Inherit from Theme Settings', 'soledad' ) => 'inherit',
					'Default'                                              => 'standard',
					'Style 1'                                              => 'style-1',
					'Style 2'                                              => 'style-2',
					'Style 3'                                              => 'style-3',
					'Style 4'                                              => 'style-4',
					'Style 5'                                              => 'style-5',
					'Style 6'                                              => 'style-6',
				),
				'std'        => 'style-1',
				'param_name' => 'product_style',
			),
			array(
				'type'       => 'dropdown',
				'group'      => 'Product Style',
				'heading'    => __( 'Image Size', 'soledad' ),
				'value'      => Penci_Vc_Params_Helper::get_list_image_sizes( true ),
				'param_name' => 'img_size',
			),
			array(
				'type'       => 'textfield',
				'group'      => 'Product Style',
				'heading'    => __( 'Custom Image Size', 'soledad' ),
				'value'      => '',
				'param_name' => 'img_custom_size',
			),
			array(
				'type'       => 'checkbox',
				'group'      => 'Product Style',
				'heading'    => __( 'Sale Countdown', 'soledad' ),
				'value'      => '',
				'param_name' => 'sale_countdown',
			),
			array(
				'type'       => 'checkbox',
				'group'      => 'Product Style',
				'heading'    => __( 'Stock Progress Bar', 'soledad' ),
				'value'      => '',
				'param_name' => 'stock_progress_bar',
			),
			array(
				'type'       => 'checkbox',
				'group'      => 'Product Style',
				'heading'    => __( 'Hide Hot Label ?', 'soledad' ),
				'value'      => '',
				'param_name' => 'hide_hot_label',
			),
			array(
				'type'       => 'checkbox',
				'group'      => 'Product Style',
				'heading'    => __( 'Hide New Label ?', 'soledad' ),
				'value'      => '',
				'param_name' => 'hide_new_label',
			),
			array(
				'type'       => 'checkbox',
				'group'      => 'Product Style',
				'heading'    => __( 'Hide Sale Label ?', 'soledad' ),
				'value'      => '',
				'param_name' => 'hide_sale_label',
			),
			array(
				'type'       => 'penci_only_number',
				'group'      => 'Product Style',
				'heading'    => __( 'Product Item Vertical Spacing', 'soledad' ),
				'value'      => '',
				'param_name' => 'item_vertical_spacing',
			),
			array(
				'type'       => 'penci_only_number',
				'group'      => 'Product Style',
				'heading'    => __( 'Product Item Horizontal Spacing', 'soledad' ),
				'value'      => '',
				'param_name' => 'item_horizontal_spacing',
			),
		),
		'js_view'                 => 'VcColumnView',
	)
);
