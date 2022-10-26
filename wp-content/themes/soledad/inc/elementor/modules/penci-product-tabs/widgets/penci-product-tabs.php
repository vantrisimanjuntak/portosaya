<?php

namespace PenciSoledadElementor\Modules\PenciProductTabs\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Image_Size;
use Elementor\Group_Control_Typography;
use Elementor\Repeater;
use PenciSoledadElementor\Base\Base_Widget;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * Elementor widget that inserts an embeddable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class PenciProductTabs extends Base_Widget {
	/**
	 * Get widget name.
	 *
	 * @return string Widget name.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_name() {
		return 'penci_products_tabs';
	}

	/**
	 * Get widget title.
	 *
	 * @return string Widget title.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_title() {
		return esc_html__( 'Penci AJAX Products Tabs', 'soledad' );
	}

	/**
	 * Get widget icon.
	 *
	 * @return string Widget icon.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_icon() {
		return 'eicon-tabs';
	}

	/**
	 * Get widget categories.
	 *
	 * @return array Widget categories.
	 * @since 1.0.0
	 * @access public
	 *
	 */
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		/**
		 * Content tab.
		 */

		/**
		 * General settings.
		 */
		$this->start_controls_section(
			'general_content_section',
			[
				'label' => esc_html__( 'General', 'soledad' ),
			]
		);

		$this->add_control(
			'title',
			[
				'label'   => esc_html__( 'Tabs title', 'soledad' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Title text example',
			]
		);

		$this->add_control(
			'product_label_hot',
			[
				'label'        => esc_html__( 'Hidden Hot Label', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '0',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => 'none',
				'selectors'    => [
					'{{WRAPPER}} .penci-soledad-product .product-labels .product-label.featured' => 'display:{{VALUE}}',
				],
			]
		);

		$this->add_control(
			'product_label_new',
			[
				'label'        => esc_html__( 'Hidden New Label', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '0',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => 'none',
				'selectors'    => [
					'{{WRAPPER}} .penci-soledad-product .product-labels .product-label.new' => 'display:{{VALUE}}',
				],
			]
		);

		$this->add_control(
			'product_label_sale',
			[
				'label'        => esc_html__( 'Hidden Sale Label', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '0',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => 'none',
				'selectors'    => [
					'{{WRAPPER}} .penci-soledad-product .product-labels .product-label.onsale' => 'display:{{VALUE}}',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Tabs settings.
		 */
		$this->start_controls_section(
			'tabs_content_section',
			[
				'label' => esc_html__( 'Tabs', 'soledad' ),
			]
		);

		$repeater = new Repeater();

		$repeater->start_controls_tabs( 'content_tabs' );

		$repeater->start_controls_tab(
			'query_tab',
			[
				'label' => esc_html__( 'Query', 'soledad' ),
			]
		);

		$repeater->add_control(
			'post_type',
			[
				'label'       => esc_html__( 'Data source', 'soledad' ),
				'description' => esc_html__( 'Select content type for your grid.', 'soledad' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'product',
				'options'     => array(
					'product'            => esc_html__( 'All Products', 'soledad' ),
					'featured'           => esc_html__( 'Featured Products', 'soledad' ),
					'sale'               => esc_html__( 'Sale Products', 'soledad' ),
					'new'                => esc_html__( 'Products with NEW label', 'soledad' ),
					'bestselling'        => esc_html__( 'Bestsellers', 'soledad' ),
					'ids'                => esc_html__( 'List of IDs', 'soledad' ),
					'top_rated_products' => esc_html__( 'Top Rated Products', 'soledad' ),
				),
			]
		);

		$repeater->add_control(
			'include',
			[
				'label'       => esc_html__( 'Include only', 'soledad' ),
				'description' => esc_html__( 'Add products by title.', 'soledad' ),
				'type'        => 'penci_el_autocomplete',
				'search'      => 'penci_get_posts_by_query',
				'render'      => 'penci_get_posts_title_by_id',
				'post_type'   => 'product',
				'multiple'    => true,
				'label_block' => true,
				'condition'   => [
					'post_type' => 'ids',
				],
			]
		);

		$repeater->add_control(
			'taxonomies',
			[
				'label'       => esc_html__( 'Categories or tags', 'soledad' ),
				'description' => esc_html__( 'List of product categories.', 'soledad' ),
				'type'        => 'penci_el_autocomplete',
				'search'      => 'penci_get_taxonomies_by_query',
				'render'      => 'penci_get_taxonomies_title_by_id',
				'taxonomy'    => array_merge( [ 'product_cat', 'product_tag' ], $this->get_product_attributes_array() ),
				'multiple'    => true,
				'label_block' => true,
				'condition'   => [
					'post_type!' => 'ids',
				],
			]
		);

		$repeater->add_control(
			'orderby',
			[
				'label'       => esc_html__( 'Order by', 'soledad' ),
				'description' => esc_html__( 'Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'soledad' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => '',
				'options'     => array(
					''               => '',
					'date'           => esc_html__( 'Date', 'soledad' ),
					'id'             => esc_html__( 'ID', 'soledad' ),
					'author'         => esc_html__( 'Author', 'soledad' ),
					'title'          => esc_html__( 'Title', 'soledad' ),
					'modified'       => esc_html__( 'Last modified date', 'soledad' ),
					'comment_count'  => esc_html__( 'Number of comments', 'soledad' ),
					'menu_order'     => esc_html__( 'Menu order', 'soledad' ),
					'meta_value'     => esc_html__( 'Meta value', 'soledad' ),
					'meta_value_num' => esc_html__( 'Meta value number', 'soledad' ),
					'rand'           => esc_html__( 'Random order', 'soledad' ),
					'price'          => esc_html__( 'Price', 'soledad' ),
				),
			]
		);

		$repeater->add_control(
			'offset',
			[
				'label'       => esc_html__( 'Offset', 'soledad' ),
				'description' => esc_html__( 'Number of grid elements to displace or pass over.', 'soledad' ),
				'type'        => Controls_Manager::TEXT,
				'condition'   => [
					'post_type!' => 'ids',
				],
			]
		);

		$repeater->add_control(
			'query_type',
			[
				'label'   => esc_html__( 'Query type', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'OR',
				'options' => array(
					'OR'  => esc_html__( 'OR', 'soledad' ),
					'AND' => esc_html__( 'AND', 'soledad' ),
				),
			]
		);

		$repeater->add_control(
			'order',
			[
				'label'       => esc_html__( 'Sort order', 'soledad' ),
				'description' => 'Designates the ascending or descending order. More at <a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>.',
				'type'        => Controls_Manager::SELECT,
				'default'     => '',
				'options'     => array(
					''     => esc_html__( 'Inherit', 'soledad' ),
					'DESC' => esc_html__( 'Descending', 'soledad' ),
					'ASC'  => esc_html__( 'Ascending', 'soledad' ),
				),
				'condition'   => [
					'post_type!' => 'ids',
				],
			]
		);

		$repeater->add_control(
			'meta_key',
			[
				'label'       => esc_html__( 'Meta key', 'soledad' ),
				'description' => esc_html__( 'Input meta key for grid ordering.', 'soledad' ),
				'type'        => Controls_Manager::TEXTAREA,
				'condition'   => [
					'orderby' => [ 'meta_value', 'meta_value_num' ],
				],
			]
		);

		$repeater->add_control(
			'exclude',
			[
				'label'       => esc_html__( 'Exclude', 'soledad' ),
				'description' => esc_html__( 'Exclude posts, pages, etc. by title.', 'soledad' ),
				'type'        => 'penci_el_autocomplete',
				'search'      => 'penci_get_posts_by_query',
				'render'      => 'penci_get_posts_title_by_id',
				'post_type'   => 'product',
				'multiple'    => true,
				'label_block' => true,
				'condition'   => [
					'post_type!' => 'ids',
				],
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab(
			'text_tab',
			[
				'label' => esc_html__( 'Text', 'soledad' ),
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'   => esc_html__( 'Tabs title', 'soledad' ),
				'type'    => Controls_Manager::TEXT,
				'default' => 'Tab title',
			]
		);

		$repeater->end_controls_tab();

		$repeater->start_controls_tab(
			'icon_tab',
			[
				'label' => esc_html__( 'Icon', 'soledad' ),
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose image', 'soledad' ),
				'type'  => Controls_Manager::MEDIA,
			]
		);

		$repeater->add_group_control(
			Group_Control_Image_Size::get_type(),
			[
				'name'      => 'image',
				'default'   => 'thumbnail',
				'separator' => 'none',
			]
		);

		$repeater->end_controls_tab();

		$repeater->end_controls_tabs();

		$this->add_control(
			'tabs_items',
			[
				'type'        => Controls_Manager::REPEATER,
				'title_field' => '{{{ title }}}',
				'fields'      => $repeater->get_controls(),
				'default'     => [
					[
						'title' => 'Tab title 1',
					],
					[
						'title' => 'Tab title 2',
					],
					[
						'title' => 'Tab title 3',
					],
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Style tab.
		 */
		/**
		 * Heading settings.
		 */
		$this->start_controls_section(
			'heading_style_section',
			[
				'label' => esc_html__( 'Heading', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'design',
			[
				'label'   => esc_html__( 'Design', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'default' => esc_html__( 'Style 1', 'soledad' ),
					'simple'  => esc_html__( 'Style 2', 'soledad' ),
					'alt'     => esc_html__( 'Style 3', 'soledad' ),
				],
				'default' => 'default',
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'tab_title_typo',
				'label'    => __( 'Tab Title Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-products-tabs .tabs-name > span',
			)
		);

		$this->add_control(
			'tab_title_color',
			[
				'label'     => esc_html__( 'Tabs Title Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .penci-products-tabs .tabs-name > span' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tab_title_boder_color',
			[
				'label'     => esc_html__( 'Tabs Title Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .penci-products-tabs.tabs-design-simple .tabs-name' => 'border-color: {{VALUE}}',
				],
				'condition' => [
					'design' => [ 'simple' ],
				],
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'tab_label_typo',
				'label'    => __( 'Label Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-products-tabs .products-tabs-title .tab-label',
			)
		);

		$this->add_control(
			'tab_label_color',
			[
				'label'     => esc_html__( 'Tabs Label Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .penci-products-tabs .products-tabs-title .tab-label, {{WRAPPER}} .penci-products-tabs.tabs-design-alt .products-tabs-title .tab-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tab_label_hover_color',
			[
				'label'     => esc_html__( 'Tabs Label Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .penci-products-tabs .products-tabs-title .tab-label:hover, {{WRAPPER}} .penci-products-tabs.tabs-design-alt .products-tabs-title .tab-label:hover' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tab_label_hover_border_color',
			[
				'label'     => esc_html__( 'Tabs Label Hover Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .penci-products-tabs .products-tabs-title .tab-label:hover:after, {{WRAPPER}} .penci-products-tabs.tabs-design-alt .products-tabs-title .tab-label:hover:after' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'design' => [ 'default', 'alt' ],
				],
			]
		);

		$this->add_control(
			'tab_label_active_color',
			[
				'label'     => esc_html__( 'Tabs Label Active Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .penci-products-tabs .products-tabs-title .active-tab-title .tab-label, {{WRAPPER}} .penci-products-tabs.tabs-design-alt .products-tabs-title .active-tab-title .tab-label' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'tab_label_active_border_color',
			[
				'label'     => esc_html__( 'Tabs Label Active Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .tabs-design-default .products-tabs-title .tab-label:after, {{WRAPPER}} .penci-products-tabs.tabs-design-alt .products-tabs-title .tab-label:after' => 'background-color: {{VALUE}}',
				],
				'condition' => [
					'design' => [ 'default', 'alt' ],
				],
			]
		);

		$this->add_control(
			'alignment',
			[
				'label'     => esc_html__( 'Align', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'left'   => esc_html__( 'Left', 'soledad' ),
					'center' => esc_html__( 'Center', 'soledad' ),
					'right'  => esc_html__( 'Right', 'soledad' ),
				),
				'default'   => 'center',
				'condition' => [
					'design' => 'default',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Products layout settings.
		 */
		$this->start_controls_section(
			'products_layout_style_section',
			[
				'label' => esc_html__( 'Products Layout', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => array(
					'grid'     => esc_html__( 'Grid', 'soledad' ),
					'list'     => esc_html__( 'List', 'soledad' ),
					'carousel' => esc_html__( 'Carousel', 'soledad' ),
				),
			]
		);

		$this->add_control(
			'product_horizontal_spacing',
			[
				'label'      => esc_html__( 'Horizontal space between items', 'soledad' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => '',
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'condition'  => [
					'layout' => [ 'grid', 'carousel' ],
				],
				'selectors'  => [
					'{{WRAPPER}} .product-layout-grid ul.products'            => 'margin-left: -{{SIZE}}{{UNIT}}!important;margin-right: -{{SIZE}}{{UNIT}}!important;',
					'{{WRAPPER}} .product-layout-grid ul.products li.product' => 'padding-left: {{SIZE}}{{UNIT}}!important;padding-right: {{SIZE}}{{UNIT}}!important;',
				],
			]
		);

		$this->add_responsive_control(
			'product_vertical_spacing',
			[
				'label'      => esc_html__( 'Vertical space between items', 'soledad' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => '',
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 100,
						'step' => 1,
					],
				],
				'condition'  => [
					'layout' => [ 'grid', 'list' ],
				],
				'selectors'  => [
					'{{WRAPPER}} .product-layout-grid ul.products li.product'                                                                                                                                                                           => 'margin-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .products.product-list .penci-soledad-product .penci-product-loop-inner-content'                                                                                                                                       => 'margin-bottom: {{SIZE}}{{UNIT}};padding-bottom: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .penci-woo-page-container.next_previous .woocommerce-pagination .page-numbers li a.prev.page-numbers,{{WRAPPER}} .penci-woo-page-container.next_previous .woocommerce-pagination .page-numbers li a.next.page-numbers' => 'margin-top: calc( -25px - {{SIZE}}px );',
				],
			]
		);

		$this->add_control(
			'columns',
			[
				'label'       => esc_html__( 'Columns', 'soledad' ),
				'description' => esc_html__( 'Number of columns in the grid.', 'soledad' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => [
					'size' => 4,
				],
				'size_units'  => '',
				'range'       => [
					'px' => [
						'min'  => 1,
						'max'  => 6,
						'step' => 1,
					],
				],
				'condition'   => [
					'layout' => 'grid',
				],
			]
		);

		$this->add_control(
			'items_per_page',
			[
				'label'       => esc_html__( 'Items per page', 'soledad' ),
				'description' => esc_html__( 'Number of items to show per page.', 'soledad' ),
				'default'     => 12,
				'type'        => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'pagination',
			[
				'label'     => esc_html__( 'Pagination', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''              => esc_html__( 'Inherit', 'soledad' ),
					'loadmore'      => esc_html__( 'Load more button', 'soledad' ),
					'infinit'       => esc_html__( 'Infinit scrolling', 'soledad' ),
					'links'         => esc_html__( 'Links', 'soledad' ),
					'next_previous' => esc_html__( 'Next/Previous', 'soledad' ),
					'none'          => esc_html__( 'Hidden', 'soledad' ),
				),
				'condition' => [
					'layout!' => 'carousel',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Carousel settings.
		 */
		$this->start_controls_section(
			'carousel_style_section',
			[
				'label'     => esc_html__( 'Carousel Settings', 'soledad' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => [
					'layout' => 'carousel',
				],
			]
		);

		$this->add_responsive_control(
			'slides_per_view',
			[
				'label'       => esc_html__( 'Slides per view', 'soledad' ),
				'description' => esc_html__( 'Set numbers of slides you want to display at the same time on slider\'s container for carousel mode.', 'soledad' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => [
					'size' => 3,
				],
				'size_units'  => '',
				'range'       => [
					'px' => [
						'min'  => 1,
						'max'  => 8,
						'step' => 1,
					],
				],
			]
		);

		$this->add_control(
			'scroll_per_page',
			[
				'label'        => esc_html__( 'Scroll per page', 'soledad' ),
				'description'  => esc_html__( 'Scroll per page not per item. This affect next/prev buttons and mouse/touch dragging.', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'false',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => 'true',
			]
		);

		$this->add_control(
			'hide_pagination_control',
			[
				'label'        => esc_html__( 'Hide pagination control', 'soledad' ),
				'description'  => esc_html__( 'If "YES" pagination control will be removed.', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'true',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => 'false',
			]
		);

		$this->add_control(
			'hide_prev_next_buttons',
			[
				'label'        => esc_html__( 'Hide prev/next buttons', 'soledad' ),
				'description'  => esc_html__( 'If "YES" prev/next control will be removed', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'true',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => 'false',
			]
		);

		$this->add_control(
			'wrap',
			[
				'label'        => esc_html__( 'Slider loop', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'true',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => 'false',
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'        => esc_html__( 'Slider autoplay', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'false',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => 'true',
			]
		);

		$this->add_control(
			'speed',
			[
				'label'       => esc_html__( 'Slider speed', 'soledad' ),
				'description' => esc_html__( 'Duration of animation between slides (in ms)', 'soledad' ),
				'default'     => '5000',
				'type'        => Controls_Manager::NUMBER,
				'condition'   => [
					'autoplay' => 'yes',
				],
			]
		);

		$this->add_control(
			'scroll_carousel_init',
			[
				'label'        => esc_html__( 'Init carousel on scroll', 'soledad' ),
				'description'  => esc_html__( 'This option allows you to init carousel script only when visitor scroll the page to the slider. Useful for performance optimization.\'', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => 'true',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => 'false',
			]
		);

		$this->end_controls_section();

		/**
		 * Products design settings.
		 */
		$this->start_controls_section(
			'products_design_style_section',
			[
				'label' => esc_html__( 'Products Design', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'product_style',
			[
				'label'     => esc_html__( 'Products hover', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''         => esc_html__( 'Inherit from Theme Settings', 'soledad' ),
					'standard' => 'Default',
					'style-1'  => 'Style 1',
					'style-2'  => 'Style 2',
					'style-3'  => 'Style 3',
					'style-4'  => 'Style 4',
					'style-5'  => 'Style 5',
					'style-6'  => 'Style 6',
					'style-7'  => 'Style 7',
				),
				'condition' => [
					'layout!' => 'list',
				],
			]
		);

		$this->add_control(
			'icon_style',
			[
				'label'   => esc_html__( 'Icon Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''      => esc_html__( 'Inherit from Theme Settings', 'soledad' ),
					'round' => 'Separate Round',
					'group' => 'Group in Rectangle',
				),
			]
		);

		$this->add_control(
			'icon_position',
			[
				'label'   => esc_html__( 'Icon Position', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''              => esc_html__( 'Inherit from Theme Settings', 'soledad' ),
					'top-left'      => 'Top left',
					'top-right'     => 'Top Right',
					'bottom-left'   => 'Bottom Left',
					'bottom-right'  => 'Bottom Right',
					'center-top'    => 'Center Top',
					'center-center' => 'Center Center',
					'center-bottom' => 'Center Bottom',
				),
			]
		);

		$this->add_control(
			'icon_animation',
			[
				'label'   => esc_html__( 'Icon Animation', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''            => esc_html__( 'Inherit from Theme Settings', 'soledad' ),
					'move-left'   => 'Move to left',
					'move-right'  => 'Move to Right',
					'move-top'    => 'Move to Top',
					'move-bottom' => 'Move to Bottom',
					'fade'        => 'Fade In',
					'zoom'        => 'Zoom In',
				),
			]
		);

		$this->add_control(
			'img_size',
			[
				'label'   => esc_html__( 'Image size', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'woocommerce_thumbnail',
				'options' => $this->get_list_image_sizes( 'elementor' ),
			]
		);

		$this->add_control(
			'img_size_custom',
			[
				'label'       => esc_html__( 'Image dimension', 'soledad' ),
				'type'        => Controls_Manager::IMAGE_DIMENSIONS,
				'description' => esc_html__( 'You can crop the original image size to any custom size. You can also set a single value for height or width in order to keep the original size ratio.', 'soledad' ),
				'condition'   => [
					'img_size' => 'custom',
				],
			]
		);

		$this->add_control(
			'stock_progress_bar',
			[
				'label'        => esc_html__( 'Stock progress bar', 'soledad' ),
				'description'  => esc_html__( 'Display a number of sold and in stock products as a progress bar.', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '0',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => '1',
			]
		);

		$this->add_control(
			'product_categories',
			[
				'label'        => esc_html__( 'Show Product Categories', 'soledad' ),
				'description'  => esc_html__( 'Display a product categories list under product title.', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '0',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => '1',
			]
		);

		$this->add_control(
			'product_rating',
			[
				'label'        => esc_html__( 'Show Product Rating', 'soledad' ),
				'description'  => esc_html__( 'Display a product star rating under product title.', 'soledad' ),
				'type'         => Controls_Manager::SWITCHER,
				'default'      => '0',
				'label_on'     => esc_html__( 'Yes', 'soledad' ),
				'label_off'    => esc_html__( 'No', 'soledad' ),
				'return_value' => '1',
			]
		);

		$this->add_control(
			'product_quantity',
			[
				'label'     => esc_html__( 'Quantity input on product', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => array(
					''        => esc_html__( 'Inherit', 'soledad' ),
					'enable'  => esc_html__( 'Enable', 'soledad' ),
					'disable' => esc_html__( 'Disable', 'soledad' ),
				),
				'condition' => [
					'product_hover' => [ 'standard', 'quick' ],
				],
			]
		);

		$this->end_controls_section();

		$this->register_product_style();
	}

	/**
	 * Get attribute taxonomies
	 *
	 * @since 1.0.0
	 */
	public function get_product_attributes_array() {
		$attributes = [];

		foreach ( wc_get_attribute_taxonomies() as $attribute ) {
			$attributes[] = 'pa_' . $attribute->attribute_name;
		}

		return $attributes;
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

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		include dirname( __FILE__ ) . "/products_tabs_temple.php";
		penci_elementor_products_tabs_template( $this->get_settings_for_display() );
	}
}
