<?php
$group_color = 'Typo & Color';

$main_params = array(
	array(
		'type'        => 'loop',
		'heading'     => __( '', 'soledad' ),
		'param_name'  => 'build_query',
		'value'       => 'post_type:post|size:10',
		'settings'    => array(
			'size'      => array( 'value' => 10, 'hidden' => false ),
			'post_type' => array( 'value' => 'post', 'hidden' => false )
		),
		'description' => __( 'Create WordPress loop, to populate content from your site.', 'soledad' ),
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Choose style', 'soledad' ),
		'value'      => array(
			'Style 1'  => 'style-1',
			'Style 2'  => 'style-2',
			'Style 4'  => 'style-4',
			'Style 6'  => 'style-6',
			'Style 7'  => 'style-7',
			'Style 8'  => 'style-8',
			'Style 9'  => 'style-9',
			'Style 10' => 'style-10',
			'Style 11' => 'style-11',
			'Style 13' => 'style-13',
			'Style 15' => 'style-15',
			'Style 17' => 'style-17',
			'Style 19' => 'style-19',
			'Style 20' => 'style-20',
			'Style 21' => 'style-21',
			'Style 22' => 'style-22',
			'Style 23' => 'style-23',
			'Style 24' => 'style-24',
			'Style 25' => 'style-25',
			'Style 26' => 'style-26',
			'Style 27' => 'style-27',
			'Style 28' => 'style-28',
			'Style 29' => 'style-29',
			'Style 35' => 'style-35',
			'Style 37' => 'style-37',
			'Style 38' => 'style-38'
		),
		'param_name' => 'style',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Disable Lazy Load Images on The Slider', 'soledad' ),
		'param_name' => 'disable_lazyload_slider',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Enable Flat Overlay Replace with Gradient Overlay', 'soledad' ),
		'param_name'  => 'enable_flat_overlay',
		'value'       => array( __( 'Yes', 'soledad' ) => 'yes' ),
		'description' => 'This option does not apply for Slider Styles 1, 2, 3, 4, 5, 29, 30, 35, 36, 37, 38',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Hide Center Box on Featured Slider', 'soledad' ),
		'param_name' => 'center_box',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Hide Center Box', 'soledad' ),
		'param_name' => 'center_box',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Hide Post Date', 'soledad' ),
		'param_name' => 'meta_date_hide',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Hide Categories Of Post', 'soledad' ),
		'param_name' => 'hide_categories',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Display Categories for all Posts on Slider', 'soledad' ),
		'param_name' => 'show_cat',
		'description'	=> 'By default, we disabled categories for some slider styles & some small posts - this option will help you show it if you want.',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Hide Post Number Comments', 'soledad' ),
		'param_name' => 'hide_meta_comment',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Show Post Author', 'soledad' ),
		'param_name' => 'show_meta_author',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Hide Post Excerpt on Style 24 & 26', 'soledad' ),
		'param_name' => 'hide_meta_excerpt',

		'value' => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Hide Post Format Icons', 'soledad' ),
		'param_name' => 'hide_format_icons',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Post Title Length', 'soledad' ),
		'param_name' => 'title_length',
		'std'        => '12',
	),
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_slider_settings',
		'heading'          => esc_html__( 'Slider options', 'soledad' ),
		'value'            => '',
		'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Autoplay', 'soledad' ),
		'param_name' => 'autoplay',
		'value'      => array( esc_html__( 'Yes', 'soledad' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Slider Loop', 'soledad' ),
		'param_name' => 'loop',
		'value'      => array( esc_html__( 'Yes', 'soledad' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Slider Auto Time (at x seconds)', 'soledad' ),
		'param_name' => 'auto_time',
		'std'        => 4000,
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Slider Speed (at x seconds)', 'soledad' ),
		'param_name' => 'speed',
		'std'        => 800,
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Show next/prev buttons', 'soledad' ),
		'param_name' => 'shownav',
		'value'      => array( esc_html__( 'Yes', 'soledad' ) => 'yes' ),
		'std'        => 'yes',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Show dots navigation', 'soledad' ),
		'param_name' => 'showdots',
	),
);

$style_big_post = array( 'style-6', 'style-13', 'style-15', 'style-17', 'style-18', 'style-19', 'style-20', 'style-21', 'style-22', 'style-23', 'style-24', 'style-25', 'style-26', 'style-27', 'style-28', 'style-37' );
$typo_params    = array(
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_style_img_settings',
		'heading'          => esc_html__( 'Image', 'soledad' ),
		'value'            => '',
		'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
		'group'            => $group_color,
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Image size', 'soledad' ),
		'param_name' => 'post_thumb_size',
		'std'        => '',
		'value'      => Penci_Vc_Helper::get_list_image_sizes( true ),
		'group'            => $group_color,
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Image size for Big Post', 'soledad' ),
		'param_name' => 'bpost_thumb_size',
		'std'        => '',
		'value'      => Penci_Vc_Helper::get_list_image_sizes( true ),
		'dependency' => array( 'element' => 'style', 'value' => $style_big_post ),
		'group'            => $group_color,
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Image size on Mobile', 'soledad' ),
		'param_name' => 'post_thumb_size_mobile',
		'std'        => '',
		'value'      => Penci_Vc_Helper::get_list_image_sizes( true ),
		'group'            => $group_color,
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Border Radius', 'soledad' ),
		'description' => 'You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>',
		'param_name'  => 'img_border_radius',
		'std'         => '',
		'group'            => $group_color,
	),
	array(
		'type'        => 'textfield',
		'heading'     => esc_html__( 'Ratio Height/Width of Images', 'soledad' ),
		'description' => 'This option does not apply for <strong>Slider Styles 19 & 27</strong>. Unit is %. E.g: 50',
		'param_name'  => 'img_ratio',
		'std'         => '',
		'group'            => $group_color,
	),

	// Title
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_style_title_settings',
		'heading'          => esc_html__( 'Title', 'soledad' ),
		'value'            => '',
		'group'            => $group_color,
		'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Title Color', 'soledad' ),
		'param_name'       => 'title_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Title Hover Color', 'soledad' ),
		'param_name'       => 'title_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'penci_number',
		'param_name' => 'ptitle_fsize',
		'heading'    => __( 'Font size for Post title', 'soledad' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'             => 'penci_number',
		'param_name'       => 'bptitle_fsize',
		'heading'          => __( 'Font Size for Post Title of Big Post', 'soledad' ),
		'value'            => '',
		'std'              => '',
		'suffix'           => 'px',
		'min'              => 1,
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
		'dependency'       => array( 'element' => 'style', 'value' => $style_big_post ),
	),
	array(
		'type'             => 'checkbox',
		'heading'          => __( 'Custom Font Family for Post Title', 'soledad' ),
		'param_name'       => 'use_ptitle_typo',
		'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'google_fonts',
		'group'      => $group_color,
		'param_name' => 'ptitle_typo',
		'value'      => '',
		'dependency' => array( 'element' => 'use_ptitle_typo', 'value' => 'yes' ),
	),

	// Category
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_style_cat_settings',
		'heading'          => esc_html__( 'Category', 'soledad' ),
		'value'            => '',
		'group'            => $group_color,
		'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Title Color', 'soledad' ),
		'param_name'       => 'pcat_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Title Hover Color', 'soledad' ),
		'param_name'       => 'pcat_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'penci_number',
		'param_name' => 'pcat_fsize',
		'heading'    => __( 'Font size for Post title', 'soledad' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'             => 'checkbox',
		'heading'          => __( 'Custom Font Family for Post Title', 'soledad' ),
		'param_name'       => 'use_pcat_typo',
		'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'google_fonts',
		'group'      => $group_color,
		'param_name' => 'pcat_typo',
		'value'      => '',
		'dependency' => array( 'element' => 'use_pcat_typo', 'value' => 'yes' ),
	),

	// Meta
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_style_pmeta_settings',
		'heading'          => esc_html__( 'Post Meta', 'soledad' ),
		'value'            => '',
		'group'            => $group_color,
		'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Meta Color', 'soledad' ),
		'param_name'       => 'pmeta_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Meta Hover Color', 'soledad' ),
		'param_name'       => 'pmeta_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'penci_number',
		'param_name' => 'pmeta_fsize',
		'heading'    => __( 'Font size for Post Meta', 'soledad' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'             => 'checkbox',
		'heading'          => __( 'Custom Font Family for Post Meta', 'soledad' ),
		'param_name'       => 'use_pmeta_typo',
		'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'google_fonts',
		'group'      => $group_color,
		'param_name' => 'pmeta_typo',
		'value'      => '',
		'dependency' => array( 'element' => 'use_pcat_typo', 'value' => 'yes' ),
	),

	// Excerpt
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_style_pexcerpt_settings',
		'heading'          => esc_html__( 'Category', 'soledad' ),
		'value'            => '',
		'group'            => $group_color,
		'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Meta Color', 'soledad' ),
		'param_name'       => 'pexcerpt_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Meta Hover Color', 'soledad' ),
		'param_name'       => 'pexcerpt_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'penci_number',
		'param_name' => 'pexcerpt_fsize',
		'heading'    => __( 'Font size for Post Meta', 'soledad' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'             => 'checkbox',
		'heading'          => __( 'Custom Font Family for Post Meta', 'soledad' ),
		'param_name'       => 'use_pexcerpt_typo',
		'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'google_fonts',
		'group'      => $group_color,
		'param_name' => 'pexcerpt_typo',
		'value'      => '',
		'dependency' => array( 'element' => 'use_pexcerpt_typo', 'value' => 'yes' ),
	),

	// Read More
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_style_readmore_settings',
		'heading'          => esc_html__( 'Read More', 'soledad' ),
		'value'            => '',
		'group'            => $group_color,
		'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Read More Color', 'soledad' ),
		'param_name'       => 'readmore_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Read More Hover Color', 'soledad' ),
		'param_name'       => 'readmore_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Read More Hover Background Color', 'soledad' ),
		'param_name'       => 'readmore_hbgcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'penci_number',
		'param_name' => 'readmore_fsize',
		'heading'    => __( 'Font size for Read More', 'soledad' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'             => 'checkbox',
		'heading'          => __( 'Custom Font Family for Read More', 'soledad' ),
		'param_name'       => 'use_readmore_typo',
		'value'            => array( __( 'Yes', 'soledad' ) => 'yes' ),
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'       => 'google_fonts',
		'group'      => $group_color,
		'param_name' => 'readmore_typo',
		'value'      => '',
		'dependency' => array( 'element' => 'use_readmore_typo', 'value' => 'yes' ),
	),
);

vc_map( array(
	'base'          => 'penci_featured_slider',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => 'Soledad',
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/featured_slider/frontend.php',
	'weight'        => 700,
	'name'          => __( 'Featured Slider', 'soledad' ),
	'description'   => __( 'Featured Slider Block', 'soledad' ),
	'controls'      => 'full',
	'params'        => array_merge( $main_params, $typo_params )
) );