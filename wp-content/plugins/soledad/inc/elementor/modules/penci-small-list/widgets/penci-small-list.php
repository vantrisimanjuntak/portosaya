<?php

namespace PenciSoledadElementor\Modules\PenciSmallList\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use PenciSoledadElementor\Base\Base_Color;
use PenciSoledadElementor\Base\Base_Widget;
use PenciSoledadElementor\Modules\QueryControl\Module as Query_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciSmallList extends Base_Widget {

	public function get_name() {
		return 'penci-small-list';
	}

	public function get_title() {
		return esc_html__( 'Penci Small List', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'list', 'post', 'small', 'slider', 'carousel' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		// Section general
		$this->start_controls_section(
			'section_type', array(
				'label' => esc_html__( 'General', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'type',
			array(
				'label'   => __( 'Type:', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'grid' => 'Grid',
					'crs'  => 'Carousel',
					'nlist'  => 'Creative List',
				),
				'default' => 'grid',
			)
		);

		$this->add_control(
			'column',
			array(
				'label'   => __( 'Columns', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'default' => '3',
				'condition' => array( 'type!' => array( 'nlist' ) ),
			)
		);

		$this->add_control(
			'tab_column',
			array(
				'label'   => __( 'Columns on Tablet', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					''  => 'Default',
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'default' => '',
				'condition' => array( 'type!' => array( 'nlist' ) ),
			)
		);

		$this->add_control(
			'mb_column',
			array(
				'label'   => __( 'Columns on Mobile', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					''  => 'Default',
					'1' => '1',
					'2' => '2',
					'3' => '3',
				),
				'default' => '',
				'condition' => array( 'type!' => array( 'nlist' ) ),
			)
		);

		$this->add_responsive_control(
			'hgap', array(
				'label'     => __( 'Horizontal Space Between Posts', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-smalllist' => '--pcsl-hgap: {{SIZE}}px;',
				),
				'condition' => array( 'type!' => array( 'nlist' ) ),
			)
		);

		$this->add_responsive_control(
			'vgap', array(
				'label'     => __( 'Vertical Space Between Posts', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-smalllist' => '--pcsl-bgap: {{SIZE}}px;',
				),
				'condition' => array( 'type' => array( 'grid', 'nlist' ) ),
			)
		);

		$this->add_responsive_control(
			'imggap', array(
				'label'     => __( 'Space Between Image & Content', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-smalllist' => '--pcsl-between: {{SIZE}}px;',
				),
			)
		);

		$this->add_control(
			'vertical_position',
			array(
				'label'                => __( 'Vertical Align', 'soledad' ),
				'type'                 => Controls_Manager::CHOOSE,
				'label_block'          => false,
				'options'              => array(
					'top'    => array(
						'title' => __( 'Top', 'soledad' ),
						'icon'  => 'eicon-v-align-top',
					),
					'middle' => array(
						'title' => __( 'Middle', 'soledad' ),
						'icon'  => 'eicon-v-align-middle',
					),
					'bottom' => array(
						'title' => __( 'Bottom', 'soledad' ),
						'icon'  => 'eicon-v-align-bottom',
					),
				),
				'selectors'            => array(
					'{{WRAPPER}} .pcsl-inner .pcsl-iteminer' => 'align-items: {{VALUE}}',
				),
				'selectors_dictionary' => array(
					'top'    => 'flex-start',
					'middle' => 'center',
					'bottom' => 'flex-end',
				),
			)
		);

		$this->add_control(
			'text_align', array(
				'label'       => __( 'Content Text Align', 'soledad' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => array(
					'left'   => array(
						'title' => __( 'Left', 'soledad' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'soledad' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'soledad' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .pcsl-content, {{WRAPPER}} .pcsl-flex-full' => 'text-align: {{VALUE}}'
				)
			)
		);

		$this->end_controls_section();

		$this->register_query_section_controls();

		$this->start_controls_section(
			'section_image', array(
				'label' => esc_html__( 'Image', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'hide_thumb', array(
				'label'        => __( 'Hide Featured Image?', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'soledad' ),
				'label_off'    => __( 'No', 'soledad' ),
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'imgpos',
			array(
				'label'   => __( 'Image Position', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => array(
					'left'  => 'Left',
					'right' => 'Right',
					'top'   => 'Top',
				),
				'default' => 'left',
			)
		);

		$this->add_responsive_control(
			'imgwidth',
			[
				'label'      => __( 'Image Width', 'soledad' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 600,
						'step' => 1,
					],
					'%'  => [
						'min'  => 0,
						'max'  => 95,
						'step' => 0.1,
					],
				],
				'default'    => [
					'unit' => '%',
				],
				'selectors'  => [
					'{{WRAPPER}} .pcsl-inner .pcsl-thumb'                                                       => 'width: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .pcsl-imgpos-left .pcsl-content, {{WRAPPER}} .pcsl-imgpos-right .pcsl-content' => 'width: calc( 100% - {{SIZE}}{{UNIT}} );',
					'{{WRAPPER}} .pcsl-imgpos-left.pcsl-hdate .pcsl-content, {{WRAPPER}} .pcsl-imgpos-right.pcsl-hdate .pcsl-content' => 'width: calc( 100% - var(--pcsl-dwidth) - {{SIZE}}{{UNIT}} );',
				],
			]
		);

		$this->add_control(
			'image_align',
			array(
				'label'                => __( 'Image Align', 'soledad' ),
				'type'                 => Controls_Manager::CHOOSE,
				'label_block'          => false,
				'options'              => array(
					'left'   => array(
						'title' => __( 'Left', 'soledad' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'soledad' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'soledad' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'selectors'            => array(
					'{{WRAPPER}} .pcsl-inner.pcsl-imgpos-top .pcsl-thumb' => '{{VALUE}}',
				),
				'selectors_dictionary' => array(
					'left'   => 'marin-right: auto;',
					'center' => 'margin-left: auto; margin-right: auto;',
					'right'  => 'margin-left: auto;',
				),
				'conditions'           => [
					'relation' => 'and',
					'terms'    => [
						[
							'name'     => 'imgpos',
							'operator' => '==',
							'value'    => 'top'
						],
						[
							'name'     => 'imgwidth[size]',
							'operator' => '!=',
							'value'    => ''
						]
					]
				]
			)
		);

		$this->add_responsive_control(
			'img_ratio', array(
				'label'     => __( 'Image Ratio', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 1, 'max' => 300, 'step' => 0.5 ) ),
				'selectors' => array(
					'{{WRAPPER}} .pcsl-inner .penci-image-holder:before' => 'padding-top: {{SIZE}}%;',
				),
				'condition' => array( 'nocrop!' => 'yes' ),
			)
		);

		$this->add_control(
			'disable_lazy', array(
				'label'        => __( 'Disable Lazyload Images?', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'soledad' ),
				'label_off'    => __( 'No', 'soledad' ),
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'thumb_size', array(
				'label'   => __( 'Image Size', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_list_image_sizes( true ),
			)
		);

		$this->add_control(
			'mthumb_size', array(
				'label'   => __( 'Image Size for Mobile', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_list_image_sizes( true ),
			)
		);

		$this->add_control(
			'nocrop', array(
				'label'        => __( 'No Crop Image?', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'soledad' ),
				'label_off'    => __( 'No', 'soledad' ),
				'return_value' => 'yes',
				'default'      => '',
				'description'  => __( 'To make it works, you need to select Image Size above is "Penci Masonry Thumb" or "Penci Full Thumb" or "Full"', 'soledad' ),
			)
		);

		$this->add_control(
			'imgtop_mobile', array(
				'label'        => __( 'Move Image Above The Post Meta on Mobile?', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'soledad' ),
				'label_off'    => __( 'No', 'soledad' ),
				'return_value' => 'yes',
				'condition'    => array( 'imgpos' => array( 'left', 'right' ) ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_postmeta', array(
				'label' => esc_html__( 'Post Meta Data', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'post_meta', array(
				'label'    => __( 'Showing Post Meta', 'soledad' ),
				'type'     => Controls_Manager::SELECT2,
				'default'  => array( 'title', 'author', 'date' ),
				'multiple' => true,
				'options'  => array(
					'cat'     => esc_html__( 'Categories', 'soledad' ),
					'title'   => esc_html__( 'Title', 'soledad' ),
					'author'  => esc_html__( 'Author', 'soledad' ),
					'date'    => esc_html__( 'Date', 'soledad' ),
					'comment' => esc_html__( 'Comments', 'soledad' ),
					'views'   => esc_html__( 'Views', 'soledad' ),
					'reading' => esc_html__( 'Reading Time', 'soledad' ),
				),
			)
		);

		$this->add_control(
			'primary_cat', array(
				'label'        => __( 'Show Primary Category Only', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'description'  => __( 'If you using Yoast SEO or Rank Math plugin, this option will show only the primary category from those plugins. If you don\'t use those plugins, it will show the first category in the list categories of the posts.', 'soledad' ),
				'label_on'     => __( 'On', 'soledad' ),
				'label_off'    => __( 'Off', 'soledad' ),
				'return_value' => 'on',
				'default'      => '',
			)
		);

		$this->add_control(
			'title_length', array(
				'label'   => __( 'Custom Title Words Length', 'soledad' ),
				'type'    => Controls_Manager::NUMBER,
				'min'     => 1,
				'max'     => 100,
				'step'    => 1,
				'default' => '',
			)
		);
		
		$this->add_control(
			'date_pos',
			array(
				'label'     => __( 'Post Date Position', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'left'    => 'Left',
					'right'  => 'Right',
				),
				'default'   => 'left',
				'condition' => array( 'type' => array( 'nlist' ) ),
			)
		);
		
		$this->add_control(
			'date_align', array(
				'label'       => __( 'Post Date Align', 'soledad' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => array(
					'left'   => array(
						'title' => __( 'Left', 'soledad' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'soledad' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'soledad' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .pcsl-inner.pcsl-nlist .pcsl-date' => 'text-align: {{VALUE}}'
				),
				'condition' => array( 'type' => array( 'nlist' ) ),
			)
		);
		
		$this->add_responsive_control(
			'datewidth',
			[
				'label'      => __( 'Post Date Width', 'soledad' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ '%', 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 600,
						'step' => 1,
					],
					'%'  => [
						'min'  => 0,
						'max'  => 95,
						'step' => 0.1,
					],
				],
				'default'    => [
					'unit' => '%',
				],
				'selectors'  => [
					'{{WRAPPER}} .penci-smalllist' => '--pcsl-dwidth: {{SIZE}}{{UNIT}};',
				],
				'condition' => array( 'type' => array( 'nlist' ) ),
			]
		);
		
		$this->add_control(
			'dformat',
			array(
				'label'     => __( 'Date Format', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					''    => 'Default',
					'timeago'  => 'Time Ago',
					'normal' => 'Normal',
				),
				'default'   => '',
			)
		);

		$this->add_control(
			'show_formaticon', array(
				'label'        => __( 'Show Post Format Icons', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'soledad' ),
				'label_off'    => __( 'No', 'soledad' ),
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'show_reviewpie', array(
				'label'        => __( 'Show Review Scores from Penci Review plugin', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'soledad' ),
				'label_off'    => __( 'No', 'soledad' ),
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'show_excerpt', array(
				'label'        => __( 'Show The Post Excerpt?', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'soledad' ),
				'label_off'    => __( 'No', 'soledad' ),
				'return_value' => 'yes',
				'default'      => '',
				'separator'    => 'before',
			)
		);

		$this->add_control(
			'excerpt_length', array(
				'label'     => __( 'Custom Excerpt Length', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'min'       => 1,
				'max'       => 500,
				'step'      => 1,
				'default'   => 15,
				'condition' => array( 'show_excerpt' => 'yes' ),
			)
		);

		$this->add_control(
			'excerpt_align', array(
				'label'       => __( 'Custom Excerpt Align', 'soledad' ),
				'type'        => Controls_Manager::CHOOSE,
				'condition'   => array( 'show_excerpt' => 'yes' ),
				'label_block' => false,
				'options'     => array(
					'left'    => array(
						'title' => __( 'Left', 'soledad' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center'  => array(
						'title' => __( 'Center', 'soledad' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'   => array(
						'title' => __( 'Right', 'soledad' ),
						'icon'  => 'eicon-text-align-right',
					),
					'justify' => array(
						'title' => __( 'Justify', 'soledad' ),
						'icon'  => 'eicon-text-align-justify',
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .pcsl-pexcerpt' => 'text-align: {{VALUE}}'
				)
			)
		);

		$this->add_control(
			'show_readmore', array(
				'label'        => __( 'Show Read More Button?', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'soledad' ),
				'label_off'    => __( 'No', 'soledad' ),
				'return_value' => 'yes',
				'default'      => '',
				'separator'    => 'before',
			)
		);

		$this->add_control(
			'rmstyle',
			array(
				'label'     => __( 'Read More Button Style', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'filled'    => 'Default',
					'bordered'  => 'Bordered',
					'underline' => 'Underline',
					'text'      => 'Text Only',
				),
				'default'   => 'filled',
				'condition' => array( 'show_readmore' => 'yes' ),
			)
		);

		$this->add_control(
			'rm_align', array(
				'label'       => __( 'Custom Read More Align', 'soledad' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'condition'   => array( 'show_readmore' => 'yes' ),
				'options'     => array(
					'left'   => array(
						'title' => __( 'Left', 'soledad' ),
						'icon'  => 'eicon-text-align-left',
					),
					'center' => array(
						'title' => __( 'Center', 'soledad' ),
						'icon'  => 'eicon-text-align-center',
					),
					'right'  => array(
						'title' => __( 'Right', 'soledad' ),
						'icon'  => 'eicon-text-align-right',
					),
				),
				'selectors'   => array(
					'{{WRAPPER}} .pcsl-readmore' => 'text-align: {{VALUE}}'
				)
			)
		);

		$this->add_control(
			'excerpt_pos',
			array(
				'label'      => __( 'Excerpt & Read More Position', 'soledad' ),
				'type'       => Controls_Manager::SELECT,
				'options'    => array(
					'below' => 'Below of Image',
					'side'  => 'Side of Image',
				),
				'separator'  => 'before',
				'default'    => 'below',
				'conditions' => [
					'relation' => 'or',
					'terms'    => [
						[
							'name'     => 'show_excerpt',
							'operator' => '==',
							'value'    => 'yes'
						],
						[
							'name'     => 'show_readmore',
							'operator' => '==',
							'value'    => 'yes'
						]
					]
				]
			)
		);

		$this->add_control(
			'heading_show_mobile',
			array(
				'label'     => __( 'Showing on Mobile', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'hide_cat_mobile', array(
				'label'        => __( 'Hide Post Categories on Mobile?', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'hide_meta_mobile', array(
				'label'        => __( 'Hide Post Meta on Mobile', 'soledad' ),
				'description'  => __( 'Include: Author Name, Date, Comments Count, Views Count, Reading Time', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
			)
		);

		$this->add_control(
			'hide_excerpt_mobile', array(
				'label'        => __( 'Hide Post Excerpt on Mobile', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
				'condition'    => array( 'show_excerpt' => 'yes' ),
			)
		);

		$this->add_control(
			'hide_rm_mobile', array(
				'label'        => __( 'Hide Post Read More Button on Mobile', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'return_value' => 'yes',
				'default'      => '',
				'condition'    => array( 'show_readmore' => 'yes' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_carousel_options',
			array(
				'label'     => __( 'Carousel Options', 'soledad' ),
				'condition' => array( 'type' => 'crs' ),
			)
		);

		$this->add_control(
			'autoplay', array(
				'label'   => __( 'Autoplay', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);

		$this->add_control(
			'loop', array(
				'label'   => __( 'Carousel Loop', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'auto_time', array(
				'label'   => __( 'Carousel Auto Time ( 1000 = 1s )', 'soledad' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 4000,
			)
		);
		$this->add_control(
			'speed', array(
				'label'   => __( 'Carousel Speed ( 1000 = 1s )', 'soledad' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 600,
			)
		);
		$this->add_control(
			'shownav', array(
				'label'   => __( 'Show next/prev buttons', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			)
		);
		$this->add_control(
			'showdots', array(
				'label' => __( 'Show dots navigation', 'soledad' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);

		$this->end_controls_section();

		$this->register_block_title_section_controls();

		$this->start_controls_section(
			'section_style_content',
			array(
				'label' => __( 'General', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'ver_border', array(
				'label'        => __( 'Add Vertical Border Between Post Items', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'soledad' ),
				'label_off'    => __( 'No', 'soledad' ),
				'return_value' => 'yes',
			)
		);
		
		$this->add_control(
			'ver_bordercl', array(
				'label'     => __( 'Custom Vertical Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .pcsl-verbd .pcsl-item' => 'border-right-color: {{VALUE}};',
				),
				'condition' => array( 'ver_border' => 'yes' ),
			)
		);
		
		$this->add_responsive_control(
			'ver_borderw', array(
				'label'     => __( 'Custom Vertical Border Width', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .pcsl-verbd .pcsl-item' => 'border-right-width: {{SIZE}}px;',
				),
				'condition' => array( 'ver_border' => 'yes' ),
			)
		);

		$this->add_control(
			'item_bg',
			array(
				'label'     => __( 'Post Items Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .pcsl-itemin' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->add_responsive_control(
			'item_padding', array(
				'label'      => __( 'Post Items Padding', 'soledad' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .pcsl-itemin' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);

		$this->add_control(
			'item_borders',
			array(
				'label'     => __( 'Add Borders for Post Items', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .pcsl-itemin' => 'border: 1px solid {{VALUE}};' ),
			)
		);

		$this->add_control(
			'remove_border_last', array(
				'label'     => __( 'Remove Border Bottom On Last Item', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'label_on'  => __( 'Yes', 'soledad' ),
				'label_off' => __( 'No', 'soledad' ),
				'selectors' => array(
					'{{WRAPPER}} .pcsl-col-1 .pcsl-item:last-child .pcsl-itemin' => 'padding-bottom: 0; border-bottom: none;'
				),
				'condition' => array( 'column' => '1', 'item_borders!' => '' ),
			)
		);

		$this->add_responsive_control(
			'item_bordersw', array(
				'label'      => __( 'Post Items Borders Width', 'soledad' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .pcsl-itemin' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);

		$this->add_responsive_control(
			'side_padding', array(
				'label'      => __( 'Padding for Side Content of Image', 'soledad' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'selectors'  => array(
					'{{WRAPPER}} .pcsl-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;'
				),
			)
		);

		$this->add_control(
			'heading_pcat',
			array(
				'label'     => __( 'Post Categories', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'cat_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .cat > a.penci-cat-name' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'cat_hcolor',
			array(
				'label'     => __( 'Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .cat > a.penci-cat-name:hover' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'cat_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .cat > a.penci-cat-name',
			)
		);

		$this->add_control(
			'heading_ptitle',
			array(
				'label'     => __( 'Post Title', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .pcsl-content .pcsl-title a' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'title_hcolor',
			array(
				'label'     => __( 'Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .pcsl-content .pcsl-title a:hover' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'title_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .pcsl-content .pcsl-title',
			)
		);
		
		$this->add_control(
			'heading_date',
			array(
				'label'     => __( 'Post Date ( for "Creative List" layout )', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array( 'type' => array( 'nlist' ) ),
			)
		);

		$this->add_control(
			'date_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .pcsl-hdate .pcsl-date span' => 'color: {{VALUE}};' ),
				'condition' => array( 'type' => array( 'nlist' ) ),
			)
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'date_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .pcsl-hdate .pcsl-date span',
				'condition' => array( 'type' => array( 'nlist' ) ),
			)
		);

		$this->add_control(
			'heading_meta',
			array(
				'label'     => __( 'Post Meta', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);

		$this->add_control(
			'meta_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .grid-post-box-meta span' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'links_color',
			array(
				'label'     => __( 'Links Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .grid-post-box-meta span a' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'links_hcolor',
			array(
				'label'     => __( 'Links Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .grid-post-box-meta span a:hover' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'meta_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .grid-post-box-meta',
			)
		);

		$this->add_control(
			'heading_excerpt',
			array(
				'label'     => __( 'Post Excerpt', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array( 'show_excerpt' => 'yes' ),
			)
		);

		$this->add_control(
			'excerpt_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'show_excerpt' => 'yes' ),
				'selectors' => array( '{{WRAPPER}} .pcbg-pexcerpt, {{WRAPPER}} .pcbg-pexcerpt p' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'      => 'excerpt_typo',
				'label'     => __( 'Typography', 'soledad' ),
				'condition' => array( 'show_excerpt' => 'yes' ),
				'selector'  => '{{WRAPPER}} .pcbg-pexcerpt p',
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_rm',
			array(
				'label'     => __( 'Read More Button', 'soledad' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array( 'show_readmore' => 'yes' ),
			)
		);

		$this->add_responsive_control(
			'rm_padding', array(
				'label'      => __( 'Button Padding', 'soledad' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'condition'  => array( 'rmstyle!' => 'text' ),
				'selectors'  => array(
					'{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);

		$this->add_responsive_control(
			'rm_borders', array(
				'label'      => __( 'Button Borders Width', 'soledad' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'condition'  => array( 'rmstyle' => array( 'bordered', 'underline' ) ),
				'selectors'  => array(
					'{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);

		$this->add_responsive_control(
			'rm_radius', array(
				'label'      => __( 'Button Borders Radius', 'soledad' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'condition'  => array( 'rmstyle' => array( 'bordered', 'filled' ) ),
				'selectors'  => array(
					'{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};'
				),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'rm_typo',
				'label'    => __( 'Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn',
			)
		);

		$this->add_control(
			'rm_color',
			array(
				'label'     => __( 'Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'rm_hcolor',
			array(
				'label'     => __( 'Text Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn:hover' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'rm_bgcolor',
			array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'rmstyle' => array( 'bordered', 'filled' ) ),
				'selectors' => array( '{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'rm_hbgcolor',
			array(
				'label'     => __( 'Hover Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'rmstyle' => array( 'bordered', 'filled' ) ),
				'selectors' => array( '{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn:hover' => 'background-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'rm_bdcolor',
			array(
				'label'     => __( 'Borders Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'rmstyle' => array( 'bordered', 'underline' ) ),
				'selectors' => array( '{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn' => 'border-color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'rm_hbdcolor',
			array(
				'label'     => __( 'Hover Borders Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'rmstyle' => array( 'bordered', 'underline' ) ),
				'selectors' => array( '{{WRAPPER}} .pcsl-readmore .pcsl-readmorebtn:hover' => 'border-color: {{VALUE}};' ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style_spacing',
			array(
				'label' => __( 'Elements Spacing', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_responsive_control(
			'cat_space', array(
				'label'     => __( 'Categories Margin Bottom', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .pcsl-inner .pcsl-content .cat' => 'margin-bottom: {{SIZE}}px;',
				),
			)
		);

		$this->add_responsive_control(
			'meta_space', array(
				'label'     => __( 'Post Meta Margin Top', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .pcsl-inner .grid-post-box-meta' => 'margin-top: {{SIZE}}px;',
				),
			)
		);

		$this->add_responsive_control(
			'excerpt_space', array(
				'label'     => __( 'Post Excerpt Margin Top', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'condition' => array( 'show_excerpt' => 'yes' ),
				'selectors' => array(
					'{{WRAPPER}} .pcsl-pexcerpt' => 'margin-top: {{SIZE}}px;',
				),
			)
		);

		$this->add_responsive_control(
			'rm_space', array(
				'label'     => __( 'Read More Button Margin Top', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'condition' => array( 'show_readmore' => 'yes' ),
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors' => array(
					'{{WRAPPER}} .pcsl-readmore' => 'margin-top: {{SIZE}}px;',
				),
			)
		);

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();

	}

	/**
	 * Get image sizes.
	 *
	 * Retrieve available image sizes after filtering `include` and `exclude` arguments.
	 */
	public function get_list_image_sizes( $default = false ) {
		$wp_image_sizes = $this->get_all_image_sizes();

		$image_sizes = array();

		if ( $default ) {
			$image_sizes[''] = esc_html__( 'Default', 'soledad' );
		}

		foreach ( $wp_image_sizes as $size_key => $size_attributes ) {
			$control_title = ucwords( str_replace( '_', ' ', $size_key ) );
			if ( is_array( $size_attributes ) ) {
				$control_title .= sprintf( ' - %d x %d', $size_attributes['width'], $size_attributes['height'] );
			}

			$image_sizes[ $size_key ] = $control_title;
		}

		$image_sizes['full'] = esc_html__( 'Full', 'soledad' );

		return $image_sizes;
	}

	public function get_all_image_sizes() {
		global $_wp_additional_image_sizes;

		$default_image_sizes = [ 'thumbnail', 'medium', 'medium_large', 'large' ];

		$image_sizes = [];

		foreach ( $default_image_sizes as $size ) {
			$image_sizes[ $size ] = [
				'width'  => (int) get_option( $size . '_size_w' ),
				'height' => (int) get_option( $size . '_size_h' ),
				'crop'   => (bool) get_option( $size . '_crop' ),
			];
		}

		if ( $_wp_additional_image_sizes ) {
			$image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
		}

		return $image_sizes;
	}

	protected function render() {
		$settings = $this->get_settings();

		$type              = $settings['type'] ? $settings['type'] : '';
		$dformat            = $settings['dformat'] ? $settings['dformat'] : '';
		$date_pos            = $settings['date_pos'] ? $settings['date_pos'] : 'left';
		$column            = $settings['column'] ? $settings['column'] : '3';
		$tab_column        = $settings['tab_column'] ? $settings['tab_column'] : '2';
		$mb_column         = $settings['mb_column'] ? $settings['mb_column'] : '1';
		$imgpos            = $settings['imgpos'] ? $settings['imgpos'] : 'left';
		$thumb_size_imgtop = 'top' == $imgpos ? 'penci-thumb' : 'penci-thumb-small';
		$thumb_size        = $settings['thumb_size'] ? $settings['thumb_size'] : $thumb_size_imgtop;
		$mthumb_size       = $settings['mthumb_size'] ? $settings['mthumb_size'] : $thumb_size_imgtop;
		$post_meta         = $settings['post_meta'] ? $settings['post_meta'] : array();
		$primary_cat       = $settings['primary_cat'] ? $settings['primary_cat'] : '';
		$title_length      = $settings['title_length'] ? $settings['title_length'] : '';
		$excerpt_pos       = $settings['excerpt_pos'] ? $settings['excerpt_pos'] : 'below';
		if ( 'top' == $imgpos ) {
			$excerpt_pos = 'side';
		}
		$rmstyle        = $settings['rmstyle'] ? $settings['rmstyle'] : 'filled';
		$excerpt_length = $settings['excerpt_length'] ? $settings['excerpt_length'] : 15;

		$thumbnail = $thumb_size;
		if ( penci_is_mobile() ) {
			$thumbnail = $mthumb_size;
		}

		$inner_wrapper_class = 'pcsl-inner penci-clearfix';
		$inner_wrapper_class .= ' pcsl-' . $type;
		if ( 'crs' == $type ) {
			$inner_wrapper_class .= ' penci-owl-carousel penci-owl-carousel-slider';
		}
		if ( 'nlist' == $type ) {
			$column            = '1';
			$tab_column        = '1';
			$mb_column         = '1';
			if( in_array( 'date', $post_meta ) ){
				$inner_wrapper_class .= ' pcsl-hdate';
			}
		}
		$inner_wrapper_class .= ' pcsl-imgpos-' . $imgpos;
		$inner_wrapper_class .= ' pcsl-col-' . $column;
		$inner_wrapper_class .= ' pcsl-tabcol-' . $tab_column;
		$inner_wrapper_class .= ' pcsl-mobcol-' . $mb_column;
		if ( 'yes' == $settings['nocrop'] ) {
			$inner_wrapper_class .= ' pcsl-nocrop';
		}
		if ( 'yes' == $settings['hide_cat_mobile'] ) {
			$inner_wrapper_class .= ' pcsl-cat-mhide';
		}
		if ( 'yes' == $settings['hide_meta_mobile'] ) {
			$inner_wrapper_class .= ' pcsl-meta-mhide';
		}
		if ( 'yes' == $settings['hide_excerpt_mobile'] ) {
			$inner_wrapper_class .= ' pcsl-excerpt-mhide';
		}
		if ( 'yes' == $settings['hide_rm_mobile'] ) {
			$inner_wrapper_class .= ' pcsl-rm-mhide';
		}
		if ( 'yes' == $settings['imgtop_mobile'] && in_array( $imgpos, array( 'left', 'right' ) ) ) {
			$inner_wrapper_class .= ' pcsl-imgtopmobile';
		}
		if ( 'yes' == $settings['ver_border'] ) {
			$inner_wrapper_class .= ' pcsl-verbd';
		}

		$data_slider = '';
		if ( 'crs' == $type ) {
			$data_slider .= $settings['showdots'] ? ' data-dots="true"' : '';
			$data_slider .= ! $settings['shownav'] ? ' data-nav="true"' : '';
			$data_slider .= ! $settings['loop'] ? ' data-loop="true"' : '';
			$data_slider .= ' data-auto="' . ( 'yes' == $settings['autoplay'] ? 'true' : 'false' ) . '"';
			$data_slider .= $settings['auto_time'] ? ' data-autotime="' . $settings['auto_time'] . '"' : ' data-autotime="4000"';
			$data_slider .= $settings['speed'] ? ' data-speed="' . $settings['speed'] . '"' : ' data-speed="600"';

			$data_slider .= ' data-item="' . ( isset( $settings['column'] ) && $settings['column'] ? $settings['column'] : '3' ) . '"';
			$data_slider .= ' data-desktop="' . ( isset( $settings['column'] ) && $settings['column'] ? $settings['column'] : '3' ) . '" ';
			$data_slider .= ' data-tablet="' . ( isset( $settings['tab_column'] ) && $settings['tab_column'] ? $settings['tab_column'] : '2' ) . '"';
			$data_slider .= ' data-tabsmall="' . ( isset( $settings['tab_column'] ) && $settings['tab_column'] ? $settings['tab_column'] : '2' ) . '"';
			$data_slider .= ' data-mobile="' . ( isset( $settings['mb_column'] ) && $settings['mb_column'] ? $settings['mb_column'] : '1' ) . '"';
		}

		$args            = Query_Control::get_query_args( 'posts', $settings );
		$args['paged']   = max( get_query_var( 'paged' ), get_query_var( 'page' ), 1 );
		$query_smalllist = new \WP_Query( $args );
		?>
        <div class="penci-wrapper-smalllist">
			<?php $this->markup_block_title( $settings, $this ); ?>
			<?php
			if ( ! $query_smalllist->have_posts() ) {
				echo $this->show_missing_settings( 'Small List', penci_get_setting( 'penci_ajaxsearch_no_post' ) );
			}

			if ( $query_smalllist->have_posts() ) {
				?>
                <div class="penci-smalllist pcsl-wrapper">
                    <div class="<?php echo $inner_wrapper_class; ?>"<?php echo $data_slider; ?>>
						<?php while ( $query_smalllist->have_posts() ) : $query_smalllist->the_post();
							$post_id = get_the_ID();
							?>
                            <div class="pcsl-item<?php if ( 'yes' == $settings['hide_thumb'] || ! has_post_thumbnail() ) {
								echo ' pcsl-nothumb';
							} ?>">
                                <div class="pcsl-itemin">
                                    <div class="pcsl-iteminer">
										<?php if ( in_array( 'date', $post_meta ) && 'nlist' == $type ) { ?>
											<div class="pcsl-date pcsl-dpos-<?php echo $date_pos; ?>">
												<span class="sl-date"><?php penci_soledad_time_link( null, $dformat ); ?></span>
											</div>
										<?php } ?>
										
										<?php if ( 'yes' != $settings['hide_thumb'] && has_post_thumbnail() ) { ?>
                                            <div class="pcsl-thumb">
												<?php
												/* Display Review Piechart  */
												if ( 'yes' == $settings['show_reviewpie'] && function_exists( 'penci_display_piechart_review_html' ) ) {
													penci_display_piechart_review_html( get_the_ID(), 'small' );
												}
												?>
												<?php if ( 'yes' == $settings['show_formaticon'] ): ?>
													<?php if ( has_post_format( 'video' ) ) : ?>
                                                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                           aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-play' ); ?></a>
													<?php endif; ?>
													<?php if ( has_post_format( 'gallery' ) ) : ?>
                                                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                           aria-label="Icon"><?php penci_fawesome_icon( 'far fa-image' ); ?></a>
													<?php endif; ?>
													<?php if ( has_post_format( 'audio' ) ) : ?>
                                                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                           aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-music' ); ?></a>
													<?php endif; ?>
													<?php if ( has_post_format( 'link' ) ) : ?>
                                                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                           aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-link' ); ?></a>
													<?php endif; ?>
													<?php if ( has_post_format( 'quote' ) ) : ?>
                                                        <a href="<?php the_permalink() ?>" class="icon-post-format"
                                                           aria-label="Icon"><?php penci_fawesome_icon( 'fas fa-quote-left' ); ?></a>
													<?php endif; ?>
												<?php endif; ?>
												<?php if ( 'yes' != $settings['disable_lazy'] ) { ?>
                                                    <a href="<?php the_permalink(); ?>" title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"
                                                       class="penci-image-holder penci-lazy"<?php if ( 'yes' == $settings['nocrop'] ) {
														echo ' style="padding-bottom: ' . penci_get_featured_image_padding_markup( get_the_ID(), $thumbnail, true ) . '%"';
													} ?> data-bgset="<?php echo penci_get_featured_image_size( get_the_ID(), $thumbnail ); ?>">
                                                    </a>
												<?php } else { ?>
                                                    <a title="<?php echo wp_strip_all_tags( get_the_title() ); ?>" href="<?php the_permalink(); ?>" class="penci-image-holder"
                                                       style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumbnail ); ?>');<?php if ( 'yes' == $settings['nocrop'] ) {
														   echo 'padding-bottom: ' . penci_get_featured_image_padding_markup( get_the_ID(), $thumbnail, true ) . '%';
													   } ?>">
                                                    </a>
												<?php } ?>
                                            </div>
										<?php } ?>
                                        <div class="pcsl-content">
											<?php if ( in_array( 'cat', $post_meta ) ) : ?>
                                                <div class="cat pcsl-cat">
													<?php penci_category( '', $primary_cat ); ?>
                                                </div>
											<?php endif; ?>

											<?php if ( in_array( 'title', $post_meta ) ) : ?>
                                                <div class="pcsl-title">
                                                    <a href="<?php the_permalink(); ?>"<?php if( $title_length ): echo ' title="'. wp_strip_all_tags( get_the_title() ) .'"'; endif; ?>><?php if ( ! $title_length ) {
															the_title();
														} else {
															echo wp_trim_words( wp_strip_all_tags( get_the_title() ), $title_length, '...' );
														} ?></a>
                                                </div>
											<?php endif; ?>

											<?php if ( ( count( array_intersect( array( 'author', 'date', 'comment', 'views', 'reading' ), $post_meta ) ) > 0 && 'nlist' != $type ) || ( count( array_intersect( array( 'author', 'comment', 'views', 'reading' ), $post_meta ) ) > 0 && 'nlist' == $type ) ) { ?>
                                                <div class="grid-post-box-meta pcsl-meta">
													<?php if ( in_array( 'author', $post_meta ) ) : ?>
                                                        <span class="sl-date-author author-italic">
													<?php echo penci_get_setting( 'penci_trans_by' ); ?> <a class="url fn n" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
													</span>
													<?php endif; ?>
													<?php if ( in_array( 'date', $post_meta ) && 'nlist' != $type ) : ?>
                                                        <span class="sl-date"><?php penci_soledad_time_link( null, $dformat ); ?></span>
													<?php endif; ?>
													<?php if ( in_array( 'comment', $post_meta ) ) : ?>
                                                        <span class="sl-comment">
												<a href="<?php comments_link(); ?> "><?php comments_number( '0 ' . penci_get_setting( 'penci_trans_comment' ), '1 ' . penci_get_setting( 'penci_trans_comment' ), '% ' . penci_get_setting( 'penci_trans_comments' ) ); ?></a>
											</span>
													<?php endif; ?>
													<?php
													if ( in_array( 'views', $post_meta ) ) {
														echo '<span class="sl-views">';
														echo penci_get_post_views( get_the_ID() );
														echo ' ' . penci_get_setting( 'penci_trans_countviews' );
														echo '</span>';
													}
													?>
													<?php
													$hide_readtime = in_array( 'reading', $post_meta ) ? false : true;
													if ( penci_isshow_reading_time( $hide_readtime ) ): ?>
                                                        <span class="sl-readtime"><?php penci_reading_time(); ?></span>
													<?php endif; ?>
                                                </div>
											<?php } ?>

											<?php if ( 'yes' == $settings['show_excerpt'] && 'side' == $excerpt_pos ) { ?>
                                                <div class="pcbg-pexcerpt pcsl-pexcerpt">
													<?php penci_the_excerpt( $excerpt_length ); ?>
                                                </div>
											<?php } ?>
											<?php if ( 'yes' == $settings['show_readmore'] && 'side' == $excerpt_pos ) { ?>
                                                <div class="pcsl-readmore">
                                                    <a href="<?php the_permalink(); ?>"
                                                       class="pcsl-readmorebtn pcsl-btns-<?php echo $rmstyle; ?>">
														<?php echo penci_get_setting( 'penci_trans_read_more' ); ?>
                                                    </a>
                                                </div>
											<?php } ?>
                                        </div>

										<?php if ( ( 'yes' == $settings['show_excerpt'] || 'yes' == $settings['show_readmore'] ) && 'below' == $excerpt_pos ) { ?>
                                            <div class="pcsl-flex-full">
												<?php if ( 'yes' == $settings['show_excerpt'] ) { ?>
                                                    <div class="pcbg-pexcerpt pcsl-pexcerpt">
														<?php penci_the_excerpt( $excerpt_length ); ?>
                                                    </div>
												<?php } ?>
												<?php if ( 'yes' == $settings['show_readmore'] ) { ?>
                                                    <div class="pcsl-readmore">
                                                        <a href="<?php the_permalink(); ?>"
                                                           class="pcsl-readmorebtn pcsl-btns-<?php echo $rmstyle; ?>">
															<?php echo penci_get_setting( 'penci_trans_read_more' ); ?>
                                                        </a>
                                                    </div>
												<?php } ?>
                                            </div>
										<?php } ?>
                                    </div>
                                </div>
                            </div>
						<?php endwhile; ?>
                    </div>
                </div>
				<?php
			} /* End check if query exists posts */
			?>
        </div>
		<?php
		wp_reset_postdata();
	}

	public static function show_missing_settings( $label, $mess ) {
		$output = '';
		if ( current_user_can( 'manage_options' ) ) {
			$output .= '<div class="penci-missing-settings">';
			$output .= '<p style="margin-bottom: 4px;">This message appears for administrator users only</p>';
			$output .= '<span>' . $label . '</span>';
			$output .= $mess;
			$output .= '</div>';
		}

		return $output;
	}
}
