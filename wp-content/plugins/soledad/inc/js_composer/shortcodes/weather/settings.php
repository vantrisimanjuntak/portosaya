<?php
vc_map( array(
	'base'          => 'penci_weather',
	'icon'          => get_template_directory_uri() . '/images/vc-icon.png',
	'category'      => 'Soledad',
	'html_template' => get_template_directory() . '/inc/js_composer/shortcodes/weather/frontend.php',
	'weight'        => 700,
	'name'          => __( 'Penci Weather', 'soledad' ),
	'description'   => __( 'Weather Block', 'soledad' ),
	'controls'      => 'full',
	'params'        => array_merge(
		Penci_Vc_Params_Helper::params_container_width(),
		array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Search your for location:', 'soledad' ),
				'param_name'  => 'penci_location',
				'std'         => 'London',
				'admin_label' => true,
				'description' => sprintf( '%s - You can use "city name" (ex: London) or "city name,country code" (ex: London,uk)',
					'<a href="' . esc_url( 'http://openweathermap.org/find' ) . '">' . esc_html__( 'Find your location', 'pennews' ) . '</a>' ),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__( 'Location display', 'soledad' ),
				'param_name'  => 'penci_location_show',
				'description' => esc_html__( 'If the option is empty,will display results from ', 'pennews' ) . '<a href="' . esc_url( 'http://openweathermap.org/find' ) . '">openweathermap.org</a>',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Units', 'soledad' ),
				'param_name' => 'penci_units',
				'value'      => array(
					esc_html__( 'F', 'soledad' ) => 'imperial',
					esc_html__( 'C', 'soledad' ) => 'metric',
				),
				'std'        => 'metric',
			),
			array(
				'type'       => 'dropdown',
				'heading'    => esc_html__( 'Forcast', 'soledad' ),
				'param_name' => 'penci_forcast',
				'value'      => array(
					esc_html__( '1 Day', 'soledad' )  => '1',
					esc_html__( '2 Days', 'soledad' ) => '2',
					esc_html__( '3 Days', 'soledad' ) => '3',
					esc_html__( '4 Days', 'soledad' ) => '4',
					esc_html__( '5 Days', 'soledad' ) => '5',
				),
				'std'        => '5',
			),
		),
		Penci_Vc_Params_Helper::heading_block_params(),
		Penci_Vc_Params_Helper::params_heading_typo_color(),
		array(
			array(
				'type'             => 'textfield',
				'param_name'       => 'color_weather_css',
				'heading'          => esc_html__( 'Weather colors', 'soledad' ),
				'value'            => '',
				'group'            => $group_color,
				'edit_field_class' => 'penci-param-heading-wrapper no-top-margin vc_column vc_col-sm-12',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'General color', 'soledad' ),
				'param_name'       => 'w_genneral_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Localtion color', 'soledad' ),
				'param_name'       => 'w_localtion_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'penci_number',
				'param_name' => 'w_location_size',
				'heading'    => __( 'Font size for Location', 'soledad' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'       => 'penci_number',
				'param_name' => 'w_condition_size',
				'heading'    => __( 'Font size for Cloudiness', 'soledad' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'       => 'penci_number',
				'param_name' => 'w_whc_info_size',
				'heading'    => __( 'Font size for Wind,Humidity, Clouds', 'soledad' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Border color', 'soledad' ),
				'param_name'       => 'w_border_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Degrees color', 'soledad' ),
				'param_name'       => 'w_degrees_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'penci_number',
				'param_name' => 'w_temp_size',
				'heading'    => __( 'Font size for Temperature', 'soledad' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'       => 'penci_number',
				'param_name' => 'w_tempsmall_size',
				'heading'    => __( 'Font size for Min/Max Temperature', 'soledad' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Custom color for forecast weather in next days', 'soledad' ),
				'param_name'       => 'w_forecast_text_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'             => 'colorpicker',
				'heading'          => esc_html__( 'Custom background for forecast weather in next days', 'soledad' ),
				'param_name'       => 'w_forecast_bg_color',
				'group'            => $group_color,
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'       => 'penci_number',
				'param_name' => 'w_forecast_size',
				'heading'    => __( 'Font size for Weather Forecast', 'soledad' ),
				'value'      => '',
				'std'        => '',
				'suffix'     => 'px',
				'min'        => 1,
				'edit_field_class' => 'vc_col-sm-6',
				'group'            => $group_color,
			),
		),
		Penci_Vc_Params_Helper::extra_params()
	)
) );