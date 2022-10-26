<?php
$options   = [];
$options[] = array(
	'sanitize'    => 'sanitize_text_field',
	'label'       => esc_html__( 'Standard & Classic', 'soledad' ),
	'description' => 'All options here apply for Standard Layout, Classic Layout and 1st Posts of 1st Standard & 1st Classic Layout.',
	'id'          => 'penci_standar_classic_heading_color',
	'type'        => 'soledad-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'type'     => 'soledad-fw-color',
	'label'    => 'Categories Color',
	'id'       => 'penci_standard_categories_action_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Titles Color',
	'type'     => 'soledad-fw-color',
	'id'       => 'penci_standard_title_post_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Titles Hover Color',
	'type'     => 'soledad-fw-color',
	'id'       => 'penci_standard_title_post_hover_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Meta Color',
	'type'     => 'soledad-fw-color',
	'id'       => 'penci_standard_meta_post_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Author Name Color',
	'type'     => 'soledad-fw-color',
	'id'       => 'penci_standard_author_post_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => '"Continue Reading" Color',
	'type'     => 'soledad-fw-color',
	'id'       => 'penci_standard_readmore_color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => '"Continue Reading" Background Color',
	'id'       => 'penci_standard_readmore_bg',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Share Box Icons Color',
	'id'       => 'penci_standard_share_icon_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Share Box Icons Hover Color',
	'id'       => 'penci_standard_share_icon_hover_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Accent Color',
	'id'       => 'penci_standard_accent_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'sanitize' => 'sanitize_text_field',
	'label'    => esc_html__( 'Other Layouts', 'soledad' ),
	'id'       => 'penci_other_layouts_heading_color',
	'type'     => 'soledad-fw-header',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Categories Accent Color',
	'id'       => 'penci_masonry_categories_accent_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Titles Color',
	'id'       => 'penci_masonry_title_post_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Titles Hover Color',
	'id'       => 'penci_masonry_title_post_hover_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Meta Color',
	'id'       => 'penci_masonry_meta_color',
	'type'     => 'soledad-fw-color',

);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Author Name & Comment Count Color',
	'id'       => 'penci_masonry_author_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => '"Read More" Link/Button Color',
	'id'       => 'penci_masonry_readmore_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => '"Read More" Button Background Color',
	'id'       => 'penci_masonry_readmore_bg',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Share Box Icons Color',
	'id'       => 'penci_masonry_box_icon',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Share Box Icons Hover Color',
	'id'       => 'penci_masonry_box_icon_hover',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Share Box Icons Color on Featured Boxed Layout',
	'id'       => 'penci_masonry_box_ficon',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Share Box Icons Hover Color on Featured Boxed Layout',
	'id'       => 'penci_masonry_box_ficon_hover',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Share Box Background Color on Featured Boxed Layout',
	'id'       => 'penci_masonry_box_icon_bg',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Accent Color',
	'id'       => 'penci_masonry_accent_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Overlay Background Color on Photography Layout',
	'id'       => 'penci_photography_overlay_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '0.3',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Overlay Background Opacity on Photography Layout',
	'id'       => 'penci_photography_overlay_opacity',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'0'    => '0',
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	)
);
$options[] = array(
	'default'  => '0.7',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Overlay Background Hover Opacity on Photography Layout',
	'id'       => 'penci_photography_overlay_hover_opacity',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'0'    => '0',
		'0.05' => '0.05',
		'0.1'  => '0.1',
		'0.15' => '0.15',
		'0.2'  => '0.2',
		'0.25' => '0.25',
		'0.3'  => '0.3',
		'0.35' => '0.35',
		'0.4'  => '0.4',
		'0.45' => '0.45',
		'0.5'  => '0.5',
		'0.55' => '0.55',
		'0.6'  => '0.6',
		'0.65' => '0.65',
		'0.7'  => '0.7',
		'0.75' => '0.75',
		'0.8'  => '0.8',
		'0.85' => '0.85',
		'0.9'  => '0.9',
		'0.95' => '0.95',
		'1'    => '1',
	)
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Categories Color on Photography Layout',
	'id'       => 'penci_photography_categories_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Titles Color on Photography Layout',
	'id'       => 'penci_photography_title_post_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Titles Hover Color on Photography Layout',
	'id'       => 'penci_photography_title_post_hover_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Meta Color on Photography Layout',
	'id'       => 'penci_photography_meta_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Accent Color on Photography Layout',
	'id'       => 'penci_photography_accent_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Titles Color on Overlay Layout',
	'id'       => 'penci_overlay_title_post_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Post Titles Hover Color on Overlay Layout',
	'id'       => 'penci_overlay_title_post_hover_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Categories Post Color on Overlay Layout',
	'id'       => 'penci_overlay_cat_post_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Categories Post Hover Color on Overlay Layout',
	'id'       => 'penci_overlay_cat_hover_post_color',
	'type'     => 'soledad-fw-color',
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'sanitize_hex_color',
	'label'    => 'Author Color on Overlay Layout',
	'id'       => 'penci_overlay_author_post_color',
	'type'     => 'soledad-fw-color',
);

return $options;
