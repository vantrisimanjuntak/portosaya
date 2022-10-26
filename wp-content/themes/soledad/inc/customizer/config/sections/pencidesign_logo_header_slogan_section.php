<?php
$options   = [];
$options[] = array(
	'default'     => 'keep your memories alive',
	'sanitize'    => 'penci_sanitize_textarea_field',
	'label'       => 'Header Slogan Text',
	'id'          => 'penci_header_slogan_text',
	'description' => 'If you want to hide the slogan text, let make it blank',
	'type'        => 'soledad-fw-textarea',
);

$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove the Lines on Left & Right of Header Slogan',
	'id'       => 'penci_header_remove_line_slogan',
	'type'     => 'soledad-fw-toggle',
);

$options[] = array(
	'default'  => '14',
	'type'     => 'soledad-fw-size',
	'sanitize' => 'absint',
	'label'    => __( 'Font Size for Slogan', 'soledad' ),
	'id'       => 'penci_font_size_slogan',
	'ids'         => array(
		'desktop' => 'penci_font_size_slogan',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 100,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
			'default'  => '14',
		),
	),
);

$options[] = array(
	'default'     => '"PT Serif", "regular:italic:700:700italic", serif',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Font For Header Slogan',
	'id'          => 'penci_font_for_slogan',
	'description' => 'Default font is "PT Serif"',
	'type'        => 'soledad-fw-select',
	'choices'     => penci_all_fonts()
);

$options[] = array(
	'default'  => 'bold',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Font Weight For Slogan',
	'id'       => 'penci_font_weight_slogan',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'normal'  => 'Normal',
		'bold'    => 'Bold',
		'bolder'  => 'Bolder',
		'lighter' => 'Lighter',
		'100'     => '100',
		'200'     => '200',
		'300'     => '300',
		'400'     => '400',
		'500'     => '500',
		'600'     => '600',
		'700'     => '700',
		'800'     => '800',
		'900'     => '900'
	)
);

$options[] = array(
	'default'  => 'italic',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Font Style for Slogan',
	'id'       => 'penci_font_style_slogan',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'italic' => 'Italic',
		'normal' => 'Normal'
	)
);

return $options;
