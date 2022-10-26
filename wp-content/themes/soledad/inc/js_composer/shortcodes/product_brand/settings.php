<?php
$group_color = 'Typo & Color';
vc_map( array(
	'base'          => 'penci_product_brand',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => 'Soledad',
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/product_brand/frontend.php',
	'weight'        => 700,
	'name'          => __( 'Penci Product Brand', 'soledad' ),
	'description'   => __( 'Show the product brand list', 'soledad' ),
	'controls'      => 'full',
	'params'        => array_merge(
		array(
			array(
				'type'             => 'textfield',
				'heading'          => __( 'Number', 'soledad' ),
				'value'            => '',
				'param_name'       => 'number',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Order by', 'soledad' ),
				'param_name'       => 'orderby',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					''                                      => '',
					esc_html__( 'Name', 'soledad' )         => 'name',
					esc_html__( 'ID', 'soledad' )           => 'term_id',
					esc_html__( 'Slug', 'soledad' )         => 'slug',
					esc_html__( 'Random order', 'soledad' ) => 'random',
				),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Sort order', 'soledad' ),
				'param_name'       => 'order',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( 'Inherit', 'soledad' )    => '',
					esc_html__( 'Descending', 'soledad' ) => 'DESC',
					esc_html__( 'Ascending', 'soledad' )  => 'ASC',
				),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Hide Empty', 'soledad' ),
				'param_name'       => 'order',
				'edit_field_class' => 'vc_col-sm-4',
			),
			array(
				'type'             => 'autocomplete',
				'heading'          => __( 'Brand', 'soledad' ),
				'param_name'       => 'ids',
				'edit_field_class' => 'vc_col-sm-4',
			),
		),
		array(
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Brand images hover', 'soledad' ),
				'param_name'       => 'hover',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( 'Default', 'soledad' )   => 'default',
					esc_html__( 'Simple', 'soledad' )    => 'simple',
					esc_html__( 'Alternate', 'soledad' ) => 'alt',
				),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Style', 'soledad' ),
				'param_name'       => 'style',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( 'Default', 'soledad' )  => 'default',
					esc_html__( 'Bordered', 'soledad' ) => 'bordered',
				),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Layout', 'soledad' ),
				'param_name'       => 'layout',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( 'Carousel', 'soledad' )   => 'carousel',
					esc_html__( 'Grid', 'soledad' )       => 'grid',
					esc_html__( 'Links List', 'soledad' ) => 'list',
				),
			),
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Columns', 'soledad' ),
				'param_name'       => 'columns',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( '2 Columns', 'soledad' ) => 2,
					esc_html__( '3 Columns', 'soledad' ) => 3,
					esc_html__( '4 Columns', 'soledad' ) => 4,
					esc_html__( '5 Columns', 'soledad' ) => 5,
					esc_html__( '6 Columns', 'soledad' ) => 6,
				),
				'dependency'       => array( 'element' => 'style', 'value' => array( 'grid', 'list' ) ),
			),
		),
		array(
			array(
				'type'             => 'dropdown',
				'heading'          => __( 'Slides per view', 'soledad' ),
				'param_name'       => 'slides_per_view',
				'edit_field_class' => 'vc_col-sm-4',
				'value'            => array(
					esc_html__( '2 Columns', 'soledad' ) => 2,
					esc_html__( '3 Columns', 'soledad' ) => 3,
					esc_html__( '4 Columns', 'soledad' ) => 4,
					esc_html__( '5 Columns', 'soledad' ) => 5,
					esc_html__( '6 Columns', 'soledad' ) => 6,
				),
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Hide pagination control', 'soledad' ),
				'param_name'       => 'hide_pagination_control',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Hide prev/next buttons', 'soledad' ),
				'param_name'       => 'hide_prev_next_buttons',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Slider loop', 'soledad' ),
				'param_name'       => 'wrap',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'checkbox',
				'heading'          => __( 'Slider autoplay', 'soledad' ),
				'param_name'       => 'autoplay',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'textfield',
				'heading'          => __( 'Slider speed', 'soledad' ),
				'param_name'       => 'speed',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
			array(
				'type'             => 'textfield',
				'heading'          => __( 'Init carousel on scroll', 'soledad' ),
				'param_name'       => 'scroll_carousel_init',
				'edit_field_class' => 'vc_col-sm-4',
				'dependency'       => array( 'element' => 'layout', 'value' => array( 'carousel' ) ),
			),
		),
		Penci_Vc_Params_Helper::heading_block_params(),
		Penci_Vc_Params_Helper::params_heading_typo_color(),
		Penci_Vc_Params_Helper::extra_params()
	)
) );
