<?php
$options = [];
$options[] = array(
	'label'    => esc_html__( 'Remove all default google fonts - load default fonts from located hosting', 'soledad' ),
	'id'       => 'penci_disable_default_fonts',
	'type'     => 'soledad-fw-toggle',
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => esc_html__( 'Remove all default fonts loads by the theme from located hosting', 'soledad' ),
	'id'          => 'penci_disable_all_fonts',
	'description' => 'This option only works when you check to option "Remove all default google fonts" above.',
	'type'        => 'soledad-fw-toggle',
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => esc_html__( 'Enable Cookie Law Policy PopUp At The Footer', 'soledad' ),
	'id'       => 'penci_enable_cookie_law',
	'type'     => 'soledad-fw-toggle',
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => esc_html__( 'Remove "Privacy & Cookies Policy" notice after Accept clicked', 'soledad' ),
	'id'       => 'penci_show_cookie_law',
	'type'     => 'soledad-fw-toggle',
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom Description on Cookie Law PopUp', 'soledad' ),
	'id'       => 'penci_gprd_desc',
	'type'     => 'soledad-fw-textarea',
	'default'  => penci_default_setting_customizer( 'penci_gprd_desc' ),
	'sanitize' => 'penci_sanitize_textarea_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom Text "Accept"', 'soledad' ),
	'id'       => 'penci_gprd_btn_accept',
	'type'     => 'soledad-fw-text',
	'default'  => penci_default_setting_customizer( 'penci_gprd_btn_accept' ),
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom Text "Read More"', 'soledad' ),
	'id'       => 'penci_gprd_rmore',
	'type'     => 'soledad-fw-text',
	'default'  => penci_default_setting_customizer( 'penci_gprd_rmore' ),
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom URL on "Read More" Button', 'soledad' ),
	'id'       => 'penci_gprd_rmore_link',
	'type'     => 'soledad-fw-text',
	'default'  => penci_default_setting_customizer( 'penci_gprd_rmore_link' ),
	'sanitize' => 'sanitize_text_field'
);
$options[] = array(
	'label'    => esc_html__( 'Custom Text "Privacy & Cookies Policy"', 'soledad' ),
	'type'     => 'soledad-fw-text',
	'id'       => 'penci_gprd_policy_text',
	'default'  => penci_default_setting_customizer( 'penci_gprd_policy_text' ),
	'sanitize' => 'sanitize_text_field'
);
$options_color_gprd = array(
	'penci_gprd_bgcolor'     => esc_html__( 'Background For Cookie Law Policy PopUp', 'soledad' ),
	'penci_gprd_color'       => esc_html__( 'Text Color For Cookie Law Policy PopUp', 'soledad' ),
	'penci_gprd_btn_color'   => esc_html__( 'Text Color For Accept Button', 'soledad' ),
	'penci_gprd_btn_bgcolor' => esc_html__( 'Background For Accept Button', 'soledad' ),
	'penci_gprd_border'      => esc_html__( 'Border Color For Cookie Law Policy PopUp', 'soledad' ),
);
foreach ( $options_color_gprd as $key => $label ) {
	$options[] = array(
		'label'    => $label,
		'id'       => $key,
		'type'     => 'soledad-fw-color',
		'sanitize' => 'sanitize_hex_color'
	);
}
return $options;
