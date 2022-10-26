<?php
$group_color = 'Font Size & Color';

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
		'description' => __( 'Create WordPress loop, to filter your posts', 'soledad' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Custom "Top Posts" Text', 'soledad' ),
		'param_name' => 'tpost_text',
		'std'        => 'Top Posts',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Style for "Top Posts" Text', 'soledad' ),
		'value'      => array(
			'Default Style' => '',
			'Style 2' => 'nticker-style-2',
			'Style 3' => 'nticker-style-3',
			'Style 4' => 'nticker-style-4',
		),
		'param_name' => 'headline_style',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Display Next/Prev Icons as Buttons', 'soledad' ),
		'param_name' => 'navs_buttons',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'        => 'checkbox',
		'heading'     => esc_html__( 'Move Next/Prev Icons/Buttons To The Right Side', 'soledad' ),
		'param_name'  => 'move_navs',
		'value'       => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Turn off Uppercase for "Top Posts" text', 'soledad' ),
		'param_name' => 'headline_upper',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Custom Words Length for Post Titles', 'soledad' ),
		'param_name' => 'title_length',
		'std'        => '8',
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Turn off Uppercase for Post Titles', 'soledad' ),
		'param_name' => 'titles_upper',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'checkbox',
		'heading'    => esc_html__( 'Disable Auto Play', 'soledad' ),
		'param_name' => 'autoplay',
		'value'      => array( __( 'Yes', 'soledad' ) => 'yes' ),
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Autoplay Timeout', 'soledad' ),
		'param_name' => 'autotime',
		'description'    => esc_html__( '1000 = 1 second', 'soledad' ),
		'std'        => '3000',
	),
	array(
		'type'       => 'textfield',
		'heading'    => esc_html__( 'Autoplay Speed', 'soledad' ),
		'param_name' => 'autospeed',
		'description'    => esc_html__( '1000 = 1 second', 'soledad' ),
		'std'        => '300',
	),
	array(
		'type'       => 'dropdown',
		'heading'    => __( 'Transition Animation', 'soledad' ),
		'value'      => array(
			'Slide In Up' => '',
			'Fade In Right' => 'slideInRight',
			'Fade In' => 'fadeIn',
		),
		'param_name' => 'headline_anim',
	),
	
);


$typo_params    = array(
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_fontsize',
		'heading'          => esc_html__( 'Font Size', 'soledad' ),
		'value'            => '',
		'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
		'group'            => $group_color,
	),
	array(
		'type'       => 'penci_number',
		'param_name' => 'tpost_size',
		'heading'    => __( 'Font size for "Top Posts" Text', 'soledad' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'       => 'penci_number',
		'param_name' => 'navs_size',
		'heading'    => __( 'Font size for Next/Prev Buttons', 'soledad' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),
	array(
		'type'       => 'penci_number',
		'param_name' => 'ptitles_size',
		'heading'    => __( 'Font size for Post Titles', 'soledad' ),
		'value'      => '',
		'std'        => '',
		'suffix'     => 'px',
		'min'        => 1,
		'group'      => $group_color,
	),

	// Colors
	array(
		'type'             => 'textfield',
		'param_name'       => 'heading_colors',
		'heading'          => esc_html__( 'Colors', 'soledad' ),
		'value'            => '',
		'group'            => $group_color,
		'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Set Borders Around The News Ticker', 'soledad' ),
		'param_name'       => 'border_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Background Color', 'soledad' ),
		'param_name'       => 'bg_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( '"Top Posts" Background Color', 'soledad' ),
		'param_name'       => 'tpost_bg',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( '"Top Posts" Text Color', 'soledad' ),
		'param_name'       => 'tpost_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Next/Prev Icons Color', 'soledad' ),
		'param_name'       => 'navs_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Next/Prev Icons Hover Color', 'soledad' ),
		'param_name'       => 'navs_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Next/Prev Buttons Background Color', 'soledad' ),
		'param_name'       => 'navs_bg',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
		'dependency' => array( 'element' => 'navs_buttons', 'value' => 'yes' ),
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Next/Prev Buttons Hover Background Color', 'soledad' ),
		'param_name'       => 'navs_hbg',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
		'dependency' => array( 'element' => 'navs_buttons', 'value' => 'yes' ),
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Title Color', 'soledad' ),
		'param_name'       => 'ptitle_color',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
	array(
		'type'             => 'colorpicker',
		'heading'          => esc_html__( 'Post Title Hover Color', 'soledad' ),
		'param_name'       => 'ptitle_hcolor',
		'group'            => $group_color,
		'edit_field_class' => 'vc_col-sm-6',
	),
);

vc_map( array(
	'base'          => 'penci_news_ticker',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => 'Soledad',
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/news_ticker/frontend.php',
	'weight'        => 700,
	'name'          => __( 'News Ticker', 'soledad' ),
	'description'   => __( 'News Ticker', 'soledad' ),
	'controls'      => 'full',
	'params'        => array_merge( $main_params, $typo_params )
) );