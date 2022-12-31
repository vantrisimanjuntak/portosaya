<?php
$options   = [];
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Popular Posts on HomePage',
	'id'       => 'penci_enable_home_popular_posts',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => '10',
	'sanitize' => 'absint',
	'type'     => 'soledad-fw-size',
	'label'    => __( 'Amount of Posts on Popular Posts', 'soledad' ),
	'id'       => 'penci_home_popular_post_numberposts',
	'ids'         => array(
		'desktop' => 'penci_home_popular_post_numberposts',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '10',
		),
	),
);
$options[] = array(
	'default'  => '',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Display Home Popular Posts on',
	'id'       => 'penci_home_popular_type',
	'type'     => 'soledad-fw-select',
	'choices'  => array(
		''      => 'All Time',
		'week'  => 'Once Weekly',
		'month' => 'Once a Month'
	)
);
$options[] = array(
	'default'  => 'Popular Posts',
	'sanitize' => 'sanitize_text_field',
	'label'    => 'Custom Title for Home Popular Posts Box',
	'id'       => 'penci_home_popular_title',
	'type'     => 'soledad-fw-text',
);
$options[] = array(
	'default'  => '0',
	'sanitize' => 'penci_sanitize_choices_field',
	'label'    => 'Filter Home Popular Posts by A Category',
	'id'       => 'penci_home_popular_cat',
	'type'     => 'soledad-fw-ajax-select',
	'choices'  => call_user_func( function () {
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
);
$options[] = array(
	'default'  => '8',
	'sanitize' => 'absint',
	'label'    => __( 'Custom Words Length for Post Titles on Popular Posts', 'soledad' ),
	'id'       => 'penci_home_polular_title_length',
	'type'     => 'soledad-fw-size',
	'ids'         => array(
		'desktop' => 'penci_home_polular_title_length',
	),
	'choices'     => array(
		'desktop' => array(
			'min'  => 1,
			'max'  => 2000,
			'step' => 1,
			'edit' => true,
			'unit' => '',
			'default'  => '8',
		),
	),
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Turn Off Uppercase Post Titles for Popular Posts on HomePage',
	'id'       => 'penci_lowcase_popular_posts',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Date on Home Popular Posts',
	'id'       => 'penci_hide_date_home_popular',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Enable Post Format Icons on Home Popular Posts',
	'id'       => 'penci_enable_home_popular_icons',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Show Prev/Next Buttons on Home Popular Posts',
	'id'       => 'penci_home_popular_shownav',
	'type'     => 'soledad-fw-toggle',
);
$options[] = array(
	'default'  => false,
	'sanitize' => 'penci_sanitize_checkbox_field',
	'label'    => 'Hide Dots on Home Popular Posts',
	'id'       => 'penci_home_popular_hidedots',
	'type'     => 'soledad-fw-toggle',
);

return $options;
