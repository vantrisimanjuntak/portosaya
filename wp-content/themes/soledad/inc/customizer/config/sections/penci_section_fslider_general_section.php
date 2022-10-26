<?php
$options   = [];
$options[] = array(
	'label'    => 'Enable Featured Slider',
	'id'       => 'penci_featured_slider',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Enable Featured Slider on All Page',
	'id'       => 'penci_featured_slider_all_page',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Enable Flat Overlay Replace with Gradient Overlay',
	'id'          => 'penci_enable_flat_overlay',
	'description' => 'This option does not apply for Slider Styles 1, 2, 3, 4, 5, 29, 30, 35, 36, 37, 38 & Penci Sliders',
	'type'        => 'soledad-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Border Radius for Images on Featured Slider',
	'id'          => 'penci_slider_border_radius',
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'type'        => 'soledad-fw-text',
	'description' => 'You can use pixel or percent. E.g:  <strong>10px</strong>  or  <strong>10%</strong>. If you want to disable border radius for slider. Fill 0',
);
$options[] = array(
	'label'       => 'Featured Slider Style',
	'id'          => 'penci_featured_slider_style',
	'default'     => 'style-1',
	'sanitize'    => 'penci_sanitize_choices_field',
	'description' => 'If you choose Penci Slider, you need have posts in "Penci Slider" post type',
	'type'        => 'soledad-fw-select',
	'choices'     => array(
		'style-1'  => 'Style 1',
		'style-2'  => 'Style 2',
		'style-3'  => 'Style 3',
		'style-4'  => 'Style 4',
		'style-5'  => 'Style 5',
		'style-6'  => 'Style 6',
		'style-7'  => 'Style 7',
		'style-8'  => 'Style 8',
		'style-9'  => 'Style 9',
		'style-10' => 'Style 10',
		'style-11' => 'Style 11',
		'style-12' => 'Style 12',
		'style-13' => 'Style 13',
		'style-14' => 'Style 14',
		'style-15' => 'Style 15',
		'style-16' => 'Style 16',
		'style-17' => 'Style 17',
		'style-18' => 'Style 18',
		'style-19' => 'Style 19',
		'style-20' => 'Style 20',
		'style-21' => 'Style 21',
		'style-22' => 'Style 22',
		'style-23' => 'Style 23',
		'style-24' => 'Style 24',
		'style-25' => 'Style 25',
		'style-26' => 'Style 26',
		'style-27' => 'Style 27',
		'style-28' => 'Style 28',
		'style-29' => 'Style 29',
		'style-30' => 'Style 30',
		'style-31' => 'Penci Slider Style 1',
		'style-32' => 'Penci Slider Style 2',
		'style-33' => 'Revolution Slider Full Width',
		'style-34' => 'Revolution Slider In Container',
		'style-35' => 'Style 35',
		'style-36' => 'Style 36',
		'style-37' => 'Style 37',
		'style-38' => 'Style 38',
	)
);
$options[] = array(
	'label'       => 'Revolution Slider Shortcode',
	'id'          => 'penci_feature_rev_sc',
	'type'        => 'soledad-fw-textarea',
	'default'     => '',
	'sanitize'    => 'sanitize_text_field',
	'description' => 'If you choose Featured Slider Style is Revolution Slider, you need to fill Revolution Slider shortcode here',
);
$options[] = array(
	'label'    => 'Enable Next/Prev Button for Penci Slider & Slider Styles 35, 36, 37',
	'section'  => 'penci_section_fslider_general',
	'id'       => 'penci_enable_next_prev_penci_slider',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Disable Dots for Penci Slider & Slider Styles 35, 36, 37',
	'section'  => 'penci_section_fslider_general',
	'id'       => 'penci_disable_dots_penci_slider',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Custom Image Size on the Slider',
	'id'       => 'featured_slider_imgsize',
	'type'     => 'soledad-fw-ajax-select',
	'choices'  => call_user_func( function () {
		global $_wp_additional_image_sizes;

		$default_image_sizes = get_intermediate_image_sizes();

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ]['width']  = intval( get_option( "{$size}_size_w" ) );
			$image_sizes[ $size ]['height'] = intval( get_option( "{$size}_size_h" ) );
			$image_sizes[ $size ]['crop']   = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
		}

		if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		$image_sizes_data = array( '' => 'Default' );
		if ( ! empty( $image_sizes ) ) {
			foreach ( $image_sizes as $key => $val ) {
				$new_val = $key;
				if ( isset( $val['width'] ) && isset( $val['height'] ) ) {
					$heightname = $val['height'];
					if ( '0' == $val['height'] || '99999' == $val['height'] ) {
						$heightname = 'auto';
					}
					$new_val = $key . ' - ' . $val['width'] . ' x ' . $heightname;
				}
				$image_sizes_data[ $key ] = $new_val;
			}
		}
		$image_sizes_data['full'] = 'Full Size';

		return $image_sizes_data;
	} ),
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Custom Image Size for Big Posts on the Slider',
	'section'  => 'penci_section_fslider_general',
	'id'       => 'featured_slider_imgbig',
	'type'     => 'soledad-fw-ajax-select',
	'choices'  => call_user_func( function () {
		global $_wp_additional_image_sizes;

		$default_image_sizes = get_intermediate_image_sizes();

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ]['width']  = intval( get_option( "{$size}_size_w" ) );
			$image_sizes[ $size ]['height'] = intval( get_option( "{$size}_size_h" ) );
			$image_sizes[ $size ]['crop']   = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
		}

		if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		$image_sizes_data = array( '' => 'Default' );
		if ( ! empty( $image_sizes ) ) {
			foreach ( $image_sizes as $key => $val ) {
				$new_val = $key;
				if ( isset( $val['width'] ) && isset( $val['height'] ) ) {
					$heightname = $val['height'];
					if ( '0' == $val['height'] || '99999' == $val['height'] ) {
						$heightname = 'auto';
					}
					$new_val = $key . ' - ' . $val['width'] . ' x ' . $heightname;
				}
				$image_sizes_data[ $key ] = $new_val;
			}
		}
		$image_sizes_data['full'] = 'Full Size';

		return $image_sizes_data;
	} ),
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Custom Image Size on Mobile',
	'id'       => 'featured_slider_imgsize_mobile',
	'type'     => 'soledad-fw-ajax-select',
	'choices'  => call_user_func( function () {
		global $_wp_additional_image_sizes;

		$default_image_sizes = get_intermediate_image_sizes();

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ]['width']  = intval( get_option( "{$size}_size_w" ) );
			$image_sizes[ $size ]['height'] = intval( get_option( "{$size}_size_h" ) );
			$image_sizes[ $size ]['crop']   = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
		}

		if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		$image_sizes_data = array( '' => 'Default' );
		if ( ! empty( $image_sizes ) ) {
			foreach ( $image_sizes as $key => $val ) {
				$new_val = $key;
				if ( isset( $val['width'] ) && isset( $val['height'] ) ) {
					$heightname = $val['height'];
					if ( '0' == $val['height'] || '99999' == $val['height'] ) {
						$heightname = 'auto';
					}
					$new_val = $key . ' - ' . $val['width'] . ' x ' . $heightname;
				}
				$image_sizes_data[ $key ] = $new_val;
			}
		}
		$image_sizes_data['full'] = 'Full Size';

		return $image_sizes_data;
	} ),
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label' => __( 'Custom Words Length for Post Titles', 'soledad' ),
	'id'          => 'penci_slider_title_length',
	'type'        => 'soledad-fw-size',
	'default'     => '12',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'penci_slider_title_length',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '12',
		),
	),
);
$options[] = array(
	'label'    => 'Order By on Featured Slider',
	'id'       => 'featured_slider_orderby',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'date'          => 'Post Date',
		'modified'      => 'Modified Date',
		'title'         => 'Post Title',
		'rand'          => 'Random Posts',
		'ID'            => 'Post ID',
		'comment_count' => 'Comment Count'
	),
	'default'  => 'date',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => 'Sort Order on Featured Slider',
	'id'       => 'featured_slider_order',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'DESC' => 'Descending',
		'ASC'  => 'Ascending '
	),
	'default'  => 'DESC',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'    => __( 'Amount of Slides', 'soledad' ),
	'id'       => 'penci_featured_slider_slides',
	'type'     => 'soledad-fw-size',
	'default'  => '6',
	'sanitize' => 'absint',
	'ids'         => array(
		'desktop' => 'penci_featured_slider_slides',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '6',
		),
	),
);
$options[] = array(
	'label'    => 'Enable Auto Play Slider',
	'id'       => 'penci_featured_autoplay',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => __( 'Featured Slider Auto Time', 'soledad' ),
	'description' => __( '1000 = 1 second', 'soledad' ),
	'id'          => 'penci_featured_slider_auto_time',
	'type'        => 'soledad-fw-size',
	'default'     => '4000',
	'sanitize'    => 'absint',
	'ids'         => array(
		'desktop' => 'penci_featured_slider_auto_time',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '4000',
		),
	),
);
$options[] = array(
	'label'       => __( 'Featured Slider Auto Speed', 'soledad' ),
	'description' => __( '1000 = 1 second', 'soledad' ),
	'id'          => 'penci_featured_slider_auto_speed',
	'default'     => '600',
	'sanitize'    => 'absint',
	'type'        => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_featured_slider_auto_speed',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'     => '600',
		),
	),
);
$options[] = array(
	'label'    => __( 'Featured Penci Slider Height', 'soledad' ),
	'id'       => 'penci_featured_penci_slider_height',
	'default'  => '',
	'sanitize' => 'absint',
	'type'     => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_featured_penci_slider_height',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => 'px',
		),
	),
);
$options[] = array(
	'label'       => __( 'Custom Fixed Ratio Height/Width of Images on Penci Slider', 'soledad' ),
	'description' => __( 'Example: height/width = 0.45 = 45% - let fill 45', 'soledad' ),
	'id'          => 'penci_featured_penci_slider_ratio',
	'type'        => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_featured_penci_slider_ratio',
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
	'label'    => 'Remove Black Overlay Background on Heading & Captions of Penci Slider',
	'section'  => 'penci_section_fslider_general',
	'id'       => 'penci_penci_slider_remove_overlay',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Filter Featured Slider By',
	'section'  => 'penci_section_fslider_general',
	'id'       => 'penci_featured_slider_filter_type',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		'category' => 'Featured Category',
		'tags'     => 'Featured Tags'
	),
	'default'  => 'category',
	'sanitize' => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'       => 'Select Featured Category',
	'id'          => 'penci_featured_cat',
	'description' => 'Just apply when you select filter by Featured Category above',
	'default'     => '0',
	'type'        => 'soledad-fw-ajax-select',
	'choices'     => call_user_func( function () {
		$category = [ '' ];
		$count    = wp_count_terms( 'category' );
		$limit    = 99;
		if ( (int) $count <= $limit ) {
			$categories = get_categories( [
				'hide_empty'   => false,
				'hierarchical' => true,
			] );
			foreach ( $categories as $value ) {
				$category[ $value->term_id ] = $value->name;
			}
		} else {
			$selected = get_theme_mod( 'penci_top_bar_category' );
			if ( ! empty( $selected ) ) {
				$categories = get_categories( [
					'hide_empty'   => false,
					'hierarchical' => true,
					'include'      => $selected,
				] );

				foreach ( $categories as $value ) {
					$category[ $value->term_id ] = $value->name;
				}
			}
		}

		return $category;
	} ),
	'sanitize'    => 'penci_sanitize_choices_field'
);
$options[] = array(
	'label'       => 'Fill List Featured Tags for Featured Slider',
	'id'          => 'penci_featured_tags',
	'description' => 'Just apply when you select filter by Featured Tags above. And please fill list featured tags slug here, check <a rel="nofollow" href="https://soledad.pencidesign.net/soledad-document/images/tags.png" target="_blank">this image</a> to know what is tags slug. Example for multiple tags slug, fill:  tag-1, tag-2, tag-3',
	'type'        => 'soledad-fw-textarea',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field'
);
$options[] = array(
	'label'       => 'Hide Featured Category',
	'id'          => 'penci_featured_cat_hide',
	'description' => 'Check this if you want the featured category to be hide on all pages.',
	'type'        => 'soledad-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Exclude All Posts on the Featured Slider in Latest Posts on Homepage',
	'description' => 'Let view your site outside customize page to see the changes.',
	'id'          => 'penci_exclude_featured_cat',
	'type'        => 'soledad-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Center Box on Featured Slider',
	'id'       => 'penci_featured_center_box',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Turn off Uppercase of Heading/Post Titles on Slider',
	'id'       => 'penci_featured_off_uppercase_title',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Post Date',
	'id'       => 'penci_featured_meta_date',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Hide Categories Of Post',
	'id'          => 'penci_featured_hide_categories',
	'description' => '',
	'type'        => 'soledad-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Display Categories for all Posts on Slider',
	'id'          => 'penci_featured_show_categories',
	'description' => 'By default, we disabled categories for some slider styles & some small posts - this option will help you show it if you want.',
	'type'        => 'soledad-fw-toggle',
	'default'     => false,
	'sanitize'    => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Comment Count',
	'id'       => 'penci_featured_meta_comment',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Show Post Author',
	'id'       => 'penci_featured_meta_author',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Post Excerpt on Style 35 & 36',
	'section'  => 'penci_section_fslider_general',
	'id'       => 'penci_featured_meta_excerpt',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'    => 'Hide Post Format Icons',
	'id'       => 'penci_featured_slider_icons',
	'type'     => 'soledad-fw-toggle',
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field'
);
$options[] = array(
	'label'       => 'Add Google Adsense/Custom HTML Code Below Featured Slider',
	'id'          => 'penci_home_adsense_below_slider',
	'description' => '',
	'type'        => 'soledad-fw-textarea',
	'default'     => '',
	'sanitize'    => 'penci_sanitize_textarea_field'
);

return $options;
