<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Icon Post Format',
	'id'       => 'penci_grid_icon_format',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Display Post Meta Overlay Featured Image',
	'id'          => 'penci_grid_meta_overlay',
	'description' => 'This option just apply for Grid Posts & Masonry Posts',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Uppercase on Post Categories',
	'id'       => 'penci_grid_uppercase_cat',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase on Post Title',
	'id'       => 'penci_grid_off_title_uppercase',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Enable Click on Posts Thumbnail to Play Video',
	'description' => 'This option only apply for video posts format - supports only for Youtube & Vimeo',
	'id'          => 'penci_grid_lightbox_video',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Letter Spacing on Post Titles',
	'id'       => 'penci_grid_off_letter_spacing',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field',
	'label'       => 'Do Not Crop Images on List Layouts',
	'id'          => 'penci_grid_nocrop_list',
	'description' => 'This option does not apply for gallery posts format',
	'type'        => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Share Box',
	'id'       => 'penci_grid_share_box',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Borders Left & Right on Share Box',
	'id'       => 'penci_grid_share_rmbd',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Category',
	'id'       => 'penci_grid_cat',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Post Author',
	'id'       => 'penci_grid_author',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Post Date',
	'id'       => 'penci_grid_date',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Views Count',
	'id'       => 'penci_grid_countviews',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Comment Count on Mixed & Overlay Posts',
	'id'       => 'penci_grid_comment',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Comment Count on Grid, Masonry, List, Boxed, Photography Posts',
	'id'       => 'penci_grid_comment_other',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Reading Time',
	'id'       => 'penci_grid_readingtime',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Line Above Post Excerpt',
	'id'       => 'penci_grid_remove_line',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Post Excerpt',
	'id'       => 'penci_grid_remove_excerpt',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Add "Read more" button link',
	'id'       => 'penci_grid_add_readmore',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove arrow on "Read more"',
	'id'       => 'penci_grid_remove_arrow',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Make "Read more" is A Button',
	'id'       => 'penci_grid_readmore_button',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Remove Border Bottom on List Posts',
	'id'       => 'penci_grid_rmbd_bottom',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Header Alignment',
	'description' => __( 'This option does not apply for Overlay, Photography, Boxed 2 Styles', 'soledad' ),
	'id'          => 'penci_grihead_align',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		''       => esc_html__( 'Default', 'soledad' ),
		'left'   => esc_html__( 'Left', 'soledad' ),
		'center' => esc_html__( 'Center', 'soledad' ),
		'right'  => esc_html__( 'Right', 'soledad' ),
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Post Excerpt Alignment',
	'id'       => 'penci_griexc_align',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		''        => esc_html__( 'Default', 'soledad' ),
		'left'    => esc_html__( 'Left', 'soledad' ),
		'center'  => esc_html__( 'Center', 'soledad' ),
		'right'   => esc_html__( 'Right', 'soledad' ),
		'justify' => esc_html__( 'Justify', 'soledad' ),
	)
);
$options[] = array(
	'default'  => 'left',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Align "Read more" Button',
	'id'       => 'penci_grid_readmore_align',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'left'   => esc_html__( 'Left', 'soledad' ),
		'center' => esc_html__( 'Center', 'soledad' ),
		'right'  => esc_html__( 'Right', 'soledad' )
	)
);
$options[] = array(
	'default'     => '',
	'sanitize'    => 'penci_sanitize_choices_field',
	'label'       => 'Share Box Alignment',
	'description' => __( 'This option does apply for some Post Styles, not all', 'soledad' ),
	'id'          => 'penci_grishare_align',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		''       => esc_html__( 'Default', 'soledad' ),
		'left'   => esc_html__( 'Left', 'soledad' ),
		'center' => esc_html__( 'Center', 'soledad' ),
		'right'  => esc_html__( 'Right', 'soledad' ),
	)
);
$options[] = array(
	'default'  => '30',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Excerpt Length', 'soledad' ),
	'id'       => 'penci_post_excerpt_length',
	'type'     => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_post_excerpt_length',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '30',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Image Width on List Posts', 'soledad' ),
	'id'       => 'penci_img_listwidth',
	'type'     => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_img_listwidth',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '%',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Image Width on Small List Posts', 'soledad' ),
	'id'       => 'penci_img_slistwidth',
	'type'     => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_img_slistwidth',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '%',
		),
	),
);

return $options;
