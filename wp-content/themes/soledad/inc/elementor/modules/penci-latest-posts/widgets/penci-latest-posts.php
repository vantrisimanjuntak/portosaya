<?php
namespace PenciSoledadElementor\Modules\PenciLatestPosts\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use PenciSoledadElementor\Modules\QueryControl\Module as Query_Control;
use PenciSoledadElementor\Modules\QueryControl\Controls\Group_Control_Posts;


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciLatestPosts extends Base_Widget {

	public function get_name() {
		return 'penci-latest-posts';
	}

	public function get_title() {
		return esc_html__( 'Penci Latest Posts', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}
	
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'post', 'cpt', 'item', 'loop', 'query', 'cards', 'custom post type', 'latest', 'recent' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$style_big_post   = array(
			'mixed',
			'mixed-4',
			'mixed-2',
			'standard-grid',
			'standard-grid-2',
			'standard-list',
			'standard-boxed-1',
			'classic-grid',
			'classic-grid-2',
			'classic-list',
			'classic-boxed-1',
			'overlay-grid',
			'overlay-grid-2',
			'overlay-list',
			'overlay-boxed-1'
		);
		$color_big_post   = array( 'mixed-2', 'overlay-grid', 'overlay-grid-2', 'overlay-list', 'overlay-boxed-1' );
		$style_extra_post = array( 'featured', 'mixed-4' );

		$this->start_controls_section(
			'section_layout', array(
				'label' => esc_html__( 'Layout', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'penci_style', array(
				'label'   => __( 'Style', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'grid',
				'options' => array(
					'standard'         => esc_html__( 'Standard Posts', 'soledad' ),
					'classic'          => esc_html__( 'Classic Posts', 'soledad' ),
					'overlay'          => esc_html__( 'Overlay Posts', 'soledad' ),
					'featured'         => esc_html__( 'Featured Boxed', 'soledad' ),
					'grid'             => esc_html__( 'Grid Posts', 'soledad' ),
					'grid-2'           => esc_html__( 'Grid 2 Columns Posts', 'soledad' ),
					'masonry'          => esc_html__( 'Grid Masonry Posts', 'soledad' ),
					'masonry-2'        => esc_html__( 'Grid Masonry 2 Columns Posts', 'soledad' ),
					'list'             => esc_html__( 'List Posts', 'soledad' ),
					'small-list'       => esc_html__( 'Small List Posts', 'soledad' ),
					'boxed-1'          => esc_html__( 'Boxed Posts Style 1', 'soledad' ),
					'boxed-2'          => esc_html__( 'Boxed Posts Style 2', 'soledad' ),
					'photography'      => esc_html__( 'Photography Posts', 'soledad' ),
					'mixed'            => esc_html__( 'Mixed Posts', 'soledad' ),
					'mixed-2'          => esc_html__( 'Mixed Posts Style 2', 'soledad' ),
					'mixed-larger'     => esc_html__( 'Mixed Posts Larger', 'soledad' ),
					'mixed-3'          => esc_html__( 'Mixed Posts Style 3', 'soledad' ),
					'mixed-4'          => esc_html__( 'Mixed Posts Style 4', 'soledad' ),
					'standard-grid'    => esc_html__( '1st Standard Then Grid', 'soledad' ),
					'standard-grid-2'  => esc_html__( '1st Standard Then Grid 2 Columns', 'soledad' ),
					'standard-list'    => esc_html__( '1st Standard Then List', 'soledad' ),
					'standard-boxed-1' => esc_html__( '1st Standard Then Boxed', 'soledad' ),
					'classic-grid'     => esc_html__( '1st Classic Then Grid', 'soledad' ),
					'classic-grid-2'   => esc_html__( '1st Classic Then Grid 2 Columns', 'soledad' ),
					'classic-list'     => esc_html__( '1st Classic Then List', 'soledad' ),
					'classic-boxed-1'  => esc_html__( '1st Classic Then Boxed', 'soledad' ),
					'overlay-grid'     => esc_html__( '1st Overlay Then Grid', 'soledad' ),
					'overlay-grid-2'   => esc_html__( '1st Overlay Then Grid 2 Columns', 'soledad' ),
					'overlay-list'     => esc_html__( '1st Overlay Then List', 'soledad' ),
					'overlay-boxed-1'  => esc_html__( '1st Overlay Then Boxed', 'soledad' ),
				)
			)
		);

		$this->add_control(
			'penci_mixed_style', array(
				'label'     => __( 'Mixed Post Style', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 's1',
				'options'   => array(
					's1' => esc_html__( 'Style 1', 'soledad' ),
					's2' => esc_html__( 'Style 2', 'soledad' ),
				),
				'condition' => array( 'penci_style' => array( 'mixed', 'mixed-2' ) ),
			)
		);
		$this->add_control(
			'post_alignment', array(
				'label'       => __( 'Post Header Alignment', 'soledad' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => array(
					'left'   => array(
						'title' => __( 'Left', 'soledad' ),
						'icon'  => 'eicon-text-align-left'
					),
					'center' => array(
						'title' => __( 'Center', 'soledad' ),
						'icon'  => 'eicon-text-align-center'
					),
					'right'  => array(
						'title' => __( 'Right', 'soledad' ),
						'icon'  => 'eicon-text-align-right'
					)
				),
				'condition'   => array( 'penci_style!' => array( 'overlay', 'boxed-2', 'photography' ) ),
			)
		);
		
		$this->add_responsive_control(
			'penci_items_martop',
			array(
				'label'       => __( 'Rows Gap Between Post Items', 'soledad' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => array( 'size' => '' ),
				'range'       => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors'   => array(
					'{{WRAPPER}} .penci-grid > li, {{WRAPPER}} .grid-featured, {{WRAPPER}} .penci-grid li.typography-style, {{WRAPPER}} .grid-mixed, {{WRAPPER}} .penci-grid .list-post.list-boxed-post, {{WRAPPER}} .penci-masonry .item-masonry, {{WRAPPER}} article.standard-article, {{WRAPPER}} .penci-grid li.list-post, {{WRAPPER}} .grid-overlay' => 'margin-bottom: {{SIZE}}px;',
					'{{WRAPPER}} .penci-grid li.list-post'                                                                                                                                                                                                                                                                                                => 'padding-bottom: {{SIZE}}px;',
					'{{WRAPPER}} .penci-latest-posts-mixed-3 .penci-grid li.penci-slistp, {{WRAPPER}} .penci-latest-posts-mixed-4 .penci-grid li.penci-slistp'                                                                                                                                                                                            => 'padding-bottom: 0px; margin-bottom: 0px; padding-top: {{SIZE}}px;',
					'{{WRAPPER}} .penci-latest-posts-mixed-3 .penci-grid li.penci-slistp ~ .penci-slistp, {{WRAPPER}} .penci-latest-posts-mixed-4 .penci-grid li.penci-slistp ~ .penci-slistp'                                                                                                                                                            => 'margin-top: {{SIZE}}px;',
					'{{WRAPPER}} .penci-latest-posts-mixed-3 .penci-grid li.list-post.penci-slistp:last-child, {{WRAPPER}} .penci-latest-posts-mixed-4 .penci-grid li.list-post.penci-slistp:last-child'                                                                                                                                                  => 'margin-bottom: {{SIZE}}px;'
				),
				'label_block' => true,
			)
		);

		$this->add_responsive_control(
			'penci_bitems_martop',
			array(
				'label'       => __( 'Rows Gap for Big Post Items', 'soledad' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => array( 'size' => '' ),
				'range'       => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors'   => array(
					'{{WRAPPER}} .grid-featured, {{WRAPPER}} .grid-mixed, {{WRAPPER}} article.standard-article, {{WRAPPER}} .grid-overlay' => 'margin-bottom: {{SIZE}}px;',
				),
				'label_block' => true,
				'condition'   => array(
					'penci_style' => array(
						'mixed',
						'mixed-2',
						'mixed-4',
						'standard-grid',
						'standard-list',
						'standard-grid-2',
						'standard-boxed',
						'classic-grid',
						'classic-list',
						'classic-grid-2',
						'classic-boxed',
						'overlay-grid',
						'overlay-list',
						'overlay-grid-2',
						'overlay-boxed'
					)
				),
			)
		);

		$this->add_responsive_control(
			'penci_sitems_martop',
			array(
				'label'       => __( 'Rows Gap for Small List Post Items', 'soledad' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => array( 'size' => '' ),
				'range'       => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors'   => array(
					'{{WRAPPER}} .penci-grid li.penci-slistp'                                                                                                                                  => 'margin-bottom: {{SIZE}}px; padding-bottom: {{SIZE}}px;',
					'{{WRAPPER}} .penci-latest-posts-mixed-3 .penci-grid li.penci-slistp, {{WRAPPER}} .penci-latest-posts-mixed-4 .penci-grid li.penci-slistp'                                 => 'padding-bottom: 0px; margin-bottom: 0px; padding-top: {{SIZE}}px;',
					'{{WRAPPER}} .penci-latest-posts-mixed-3 .penci-grid li.penci-slistp ~ .penci-slistp, {{WRAPPER}} .penci-latest-posts-mixed-4 .penci-grid li.penci-slistp ~ .penci-slistp' => 'margin-top: {{SIZE}}px;',
				),
				'label_block' => true,
				'condition'   => array( 'penci_style' => array( 'mixed-3', 'mixed-4' ) ),
			)
		);

		$this->add_control(
			'penci_paging', array(
				'label'       => __( 'Page Navigation Style', 'soledad' ),
				'type'        => Controls_Manager::SELECT,
				'default'     => 'numbers',
				'options'     => array(
					'numbers'  => esc_html__( 'Page Navigation Numbers', 'soledad' ),
					'loadmore' => esc_html__( 'Load More Posts', 'soledad' ),
					'scroll'   => esc_html__( 'Infinite Scroll', 'soledad' ),
					'none'     => esc_html__( 'None', 'soledad' ),
				),
				'separator'   => 'before'
			)
		);
		$this->add_control(
			'morenum', array(
				'label'       => __( 'Custom Number Posts for Each Time Load More Posts', 'soledad' ),
				'type'        => Controls_Manager::NUMBER,
				'default'     => 6,
				'label_block' => true,
				'condition'   => array( 'penci_paging' => array( 'loadmore', 'scroll' ) ),
			)
		);
		$this->add_responsive_control(
			'penci_paging_martop',
			array(
				'label'       => __( 'Margin Top for Page Navigation', 'soledad' ),
				'type'        => Controls_Manager::SLIDER,
				'default'     => array( 'size' => '' ),
				'range'       => array( 'px' => array( 'min' => 0, 'max' => 200, ) ),
				'selectors'   => array(
					'{{WRAPPER}} .penci-latest-posts-el .penci-pagination' => 'margin-top: {{SIZE}}{{UNIT}} !important'
				),
				'label_block' => true,
			)
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'section_standard_classic_layout', array(
				'label' => esc_html__( 'Standard & Classic Layouts Options', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$standard_classic_opts = array(
			'standard_meta_overlay'   => array(
				'label'   => 'Enable Post Meta Overlay Featured Image',
				'desc'    => 'This option just apply for Standard Layout Only',
				'default' => ''
			),
			'standard_thumbnail'      => array( 'label' => 'Hide Post Thumbnail', 'desc' => '', 'default' => '' ),
			'std_dis_at_gallery'      => array(
				'label'   => 'Disable Autoplay for Slider on Posts Format Gallery',
				'desc'    => '',
				'default' => ''
			),
			'standard_thumb_crop'     => array(
				'label'   => 'Make Featured Image Auto Crop',
				'desc'    => '',
				'default' => ''
			),
			'standard_share_box'      => array( 'label' => 'Hide Share Icons', 'desc' => '', 'default' => '' ),
			'standard_cat'            => array( 'label' => 'Hide Category', 'desc' => '', 'default' => '' ),
			'standard_author'         => array( 'label' => 'Hide Post Author', 'desc' => '', 'default' => '' ),
			'standard_date'           => array( 'label' => 'Hide Post Date', 'desc' => '', 'default' => '' ),
			'standard_comment'        => array( 'label' => 'Hide Comment Count', 'desc' => '', 'default' => '' ),
			'standard_viewscount'     => array( 'label' => 'Show Views Count', 'desc' => '', 'default' => '' ),
			'standard_readtime'       => array( 'label' => 'Hide Reading Time', 'desc' => '', 'default' => '' ),
			'standard_remove_line'    => array(
				'label'   => 'Remove Line Above Post Excerpt',
				'desc'    => '',
				'default' => ''
			),
			'standard_auto_excerpt'   => array(
				'label'   => 'Showing Post Excerpt Instead of Full Content',
				'desc'    => '',
				'default' => 'yes'
			),
			'standard_remove_excerpt' => array(
				'label'   => 'Hide Post Content/Post Excerpt',
				'desc'    => '',
				'default' => ''
			),
			'standard_effect_button'  => array(
				'label'   => 'Disable Hover Effect on "Continue Reading" Button',
				'desc'    => '',
				'default' => ''
			),
		);

		foreach ( $standard_classic_opts as $standard_classic_key => $standard_classic_opt ) {
			$this->add_control(
				$standard_classic_key, array(
					'label'       => $standard_classic_opt['label'],
					'type'        => Controls_Manager::SWITCHER,
					'description' => $standard_classic_opt['desc'],
					'default'     => $standard_classic_opt['default'],
				)
			);
		}

		$this->add_control(
			'std_continue_btn', array(
				'label'     => 'Make "Continue Reading" is A Button',
				'type'      => Controls_Manager::SWITCHER,
				'condition' => array( 'standard_auto_excerpt' => 'yes' ),
			)
		);
		
		$this->add_control(
			'std_excerpt_align', array(
				'label'   => __( 'Post Excerpt Alignment', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'left'   => esc_html__( 'Left', 'soledad' ),
					'center' => esc_html__( 'Center', 'soledad' ),
					'right'  => esc_html__( 'Right', 'soledad' )
				),
			)
		);
		
		$this->add_control(
			'standard_title_length', array(
				'label'     => __( 'Custom Words Length for Post Titles', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'label_block' => true,
			)
		);
		$this->add_control(
			'standard_excerpt_length', array(
				'label'     => __( 'Custom Excerpt Length', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
			)
		);
		$this->add_control(
			'std_continue_align', array(
				'label'   => __( 'Align "Continue Reading" Button', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'center',
				'options' => array(
					'left'   => esc_html__( 'Left', 'soledad' ),
					'center' => esc_html__( 'Center', 'soledad' ),
					'right'  => esc_html__( 'Right', 'soledad' )
				),
				'condition' => array( 'penci_style!' => array( 'overlay','boxed-1', 'boxed-2','photography' ) ),
			)
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_order_layouts_layout', array(
				'label' => esc_html__( 'Other Layouts Options', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'order_layouts_note', array(
				'type'            => Controls_Manager::RAW_HTML,
				'content_classes' => 'elementor-descriptor',
			)
		);

		$this->add_control(
			'penci_featimg_size', array(
				'label'                => __( 'Image Size Type', 'soledad' ),
				'type'                 => Controls_Manager::SELECT,
				'default'              => '',
				'options'              => array(
					''           => esc_html__( 'Default', 'soledad' ),
					'horizontal' => esc_html__( 'Horizontal Size', 'soledad' ),
					'square'     => esc_html__( 'Square Size', 'soledad' ),
					'vertical'   => esc_html__( 'Vertical Size', 'soledad' ),
					'custom'     => esc_html__( 'Custom', 'soledad' ),
				),
				'selectors'            => array( '{{WRAPPER}} .penci-image-holder:before' => '{{VALUE}}', ),
				'selectors_dictionary' => array(
					'horizontal' => 'padding-top: 66.6667%;',
					'square'     => 'padding-top: 100%;',
					'vertical'   => 'padding-top: 135.4%;',
				),
				'condition'      => array( 'penci_style!' => array( 'masonry-2','masonry' ) ),
			)
		);
		$this->add_responsive_control(
			'penci_featimg_ratio', array(
				'label'          => __( 'Image Ratio', 'soledad' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => array( 'size' => 0.66 ),
				'tablet_default' => array( 'size' => '' ),
				'mobile_default' => array( 'size' => 0.5 ),
				'range'          => array( 'px' => array( 'min' => 0.1, 'max' => 2, 'step' => 0.01 ) ),
				'selectors'      => array(
					'{{WRAPPER}} .penci-image-holder:before' => 'padding-top: calc( {{SIZE}} * 100% );',
				),
				'condition'      => array( 'penci_featimg_size' => 'custom' ),
			)
		);
		
		$this->add_control(
			'thumb_size', array(
				'label'   => __( 'Custom Image Size', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_list_image_sizes( true ),
				'condition'      => array( 'penci_featimg_size' => 'custom' ),
			)
		);
		
		$this->add_control(
			'thumb_bigsize', array(
				'label'   => __( 'Custom Image Size for Big Posts', 'soledad' ),
				'description'   => __( 'This option apply for Overlay Posts & Big Posts on "Mixed Post" & "Mixed Posts Large" Layout', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => $this->get_list_image_sizes( true ),
				'condition'      => array( 'penci_featimg_size' => 'custom' ),
			)
		);

		$this->add_responsive_control(
			'order_columns',array(
				'label' => __( 'Columns', 'soledad' ),
				'type' => Controls_Manager::SELECT,
				'default' => '',
				'tablet_default' => '1',
				'mobile_default' => '1',
				'options' => array(
					''  => 'Default',
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
					'6' => '6',
				),
				'condition' => array( 'penci_style' => array( 'masonry-2','masonry' ) ),
			)
		);


		$this->add_control(
			'order_column_gap', array(
				'label'     => __( 'Columns Gap', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-wrap-masonry'          => 'margin-right: calc({{SIZE}}{{UNIT}} * -1 / 2); margin-left: calc( {{SIZE}}{{UNIT}} * -1 / 2 )',
					'{{WRAPPER}} .penci-masonry .item-masonry' => 'padding-right: calc({{SIZE}}{{UNIT}} / 2); padding-left: calc({{SIZE}}{{UNIT}} / 2)',
				),
				'condition' => array( 'penci_style' => array( 'masonry' ) ),
			)
		);
		
		$this->add_control(
			'rmborder_bottom', array(
				'label'     => __( 'Remove Border Bottom on List Layouts', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'selectors'          => array(
					'{{WRAPPER}} .penci-grid li.list-post' => 'padding-bottom: 0; border-bottom: none;',
					'{{WRAPPER}} .penci-layout-mixed-3 .penci-grid li.penci-slistp, {{WRAPPER}} .penci-layout-mixed-4 .penci-grid li.penci-slistp, {{WRAPPER}} .penci-latest-posts-mixed-3 .penci-grid li.penci-slistp, {{WRAPPER}} .penci-latest-posts-mixed-4 .penci-grid li.penci-slistp'  => 'border-top: none; padding-top: 0;',
				),
			)
		);
		
		$this->add_control(
			'share_rmborder', array(
				'label'     => __( 'Remove Border Left & Right on Share Box', 'soledad' ),
				'type'      => Controls_Manager::SWITCHER,
				'selectors'          => array(
					'{{WRAPPER}} .penci-post-box-meta.penci-post-box-grid .penci-post-share-box' => 'padding: 0; background: none;',
					'{{WRAPPER}} .penci-post-box-meta.penci-post-box-grid:before'  => 'content: none;',
				),
			)
		);

		$order_layouts_opts = array(
			'grid_icon_format'     => array( 'label' => 'Hide Icon Post Format', 'desc' => '' ),
			'grid_meta_overlay'    => array( 'label' => 'Enable Post Meta Overlay Featured Image', 'desc' => '' ),
			'grid_nocrop_list'     => array(
				'label' => 'Do Not Crop Images in List & Small List Layouts',
				'desc'  => 'This option does not apply for gallery posts format'
			),
			'grid_share_box'       => array( 'label' => 'Hide Share Box', 'desc' => '' ),
			'grid_cat'             => array( 'label' => 'Hide Category', 'desc' => '' ),
			'grid_author'          => array( 'label' => 'Hide Post Author', 'desc' => '' ),
			'grid_date'            => array( 'label' => 'Hide Post Date', 'desc' => '' ),
			'grid_comment'         => array( 'label' => 'Hide Comment Count on Mixed, Overlay Posts', 'desc' => '' ),
			'grid_comment_other'   => array( 'label' => 'Show Comment Count on Other Posts', 'desc' => '' ),
			'grid_viewscount'      => array( 'label' => 'Show Views Count', 'desc' => '' ),
			'grid_readtime'        => array( 'label' => 'Hide Reading Time', 'desc' => '' ),
			'grid_remove_line'     => array( 'label' => 'Remove Line Above Post Excerpt', 'desc' => '' ),
			'grid_remove_excerpt'  => array( 'label' => 'Remove Post Excerpt', 'desc' => '' ),
			'grid_add_readmore'    => array( 'label' => 'Add "Read more" button link', 'desc' => '' ),
			'grid_remove_arrow'    => array( 'label' => 'Remove arrow on "Read more"', 'desc' => '' ),
			'grid_readmore_button' => array( 'label' => 'Make "Read more" is A Button', 'desc' => '' ),
		);

		foreach ( $order_layouts_opts as $order_layouts_key => $order_layouts_opt ) {
			$this->add_control(
				$order_layouts_key, array(
					'label'       => $order_layouts_opt['label'],
					'type'        => Controls_Manager::SWITCHER,
					'description' => $order_layouts_opt['desc'],
					'return_value' => 'yes',
				)
			);
		}
		
		$this->add_control(
			'share_alignment', array(
				'label'       => __( 'Share Box Alignment', 'soledad' ),
				'type'        => Controls_Manager::CHOOSE,
				'label_block' => false,
				'options'     => array(
					'left'   => array(
						'title' => __( 'Left', 'soledad' ),
						'icon'  => 'eicon-text-align-left'
					),
					'center' => array(
						'title' => __( 'Center', 'soledad' ),
						'icon'  => 'eicon-text-align-center'
					),
					'right'  => array(
						'title' => __( 'Right', 'soledad' ),
						'icon'  => 'eicon-text-align-right'
					)
				),
				'condition'   => array( 'penci_style!' => array( 'overlay', 'boxed-2', 'photography' ) ),
			)
		);

		$this->add_control(
			'grid_readmore_align', array(
				'label'   => __( 'Align "Read more" Button', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'left',
				'options' => array(
					'left'   => esc_html__( 'Left', 'soledad' ),
					'center' => esc_html__( 'Center', 'soledad' ),
					'right'  => esc_html__( 'Right', 'soledad' )
				),
			)
		);
		$this->add_control(
			'grid_excerpt_align', array(
				'label'     => __( 'Post Excerpt Alignment', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'left',
				'options'   => array(
					'left'   => esc_html__( 'Left', 'soledad' ),
					'center' => esc_html__( 'Center', 'soledad' ),
					'right'  => esc_html__( 'Right', 'soledad' )
				),
			)
		);
		
		$this->add_control(
			'grid_title_length', array(
				'label'     => __( 'Custom Words Length for Post Titles', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'label_block' => true,
			)
		);
		$this->add_control(
			'grid_excerpt_length', array(
				'label'     => __( 'Custom Excerpt Length', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
			)
		);

		$this->add_responsive_control(
			'list_imgwidth',
			array(
				'label'       => __( 'Image Width on List & Small List Layout', 'soledad' ),
				'type'        => Controls_Manager::SLIDER,
				'size_units'  => array( 'px', '%' ),
				'range'       => array(
					'px' => array( 'min' => 0, 'max' => 1000, ),
					'%'  => array( 'min' => 0, 'max' => 99, ),
				),
				'devices'     => array( 'desktop', 'tablet' ),
				'selectors'   => array(
					'{{WRAPPER}} .penci-grid li.list-post.penci-slistp .item > .thumbnail, {{WRAPPER}} .penci-latest-posts-sc .penci-grid li.list-post .item > .thumbnail' => 'width: {{SIZE}}{{UNIT}}',
					'{{WRAPPER}} .penci-latest-posts-sc .penci-grid li.penci-item-listp .item .content-list-right'                                                         => 'width: calc( 100% - {{SIZE}}{{UNIT}} )',
				),
				'label_block' => true,
				'condition'   => array(
					'penci_style' => array(
						'list',
						'small-list',
						'mixed-3',
						'mixed-4',
						'standard-list',
						'classic-list',
						'overlay-list'
					)
				),
			)
		);

		$this->end_controls_section();

		$this->register_query_section_controls();

		$this->start_controls_section(
			'section_infeed_ads', array(
				'label' => esc_html__( 'In-feed Ads', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);

		$this->add_control(
			'infeed_ads_note', array(
				'type'            => Controls_Manager::RAW_HTML,
				'content_classes' => 'elementor-descriptor',
			)
		);
		
		$this->add_control(
			'infeedads_num', array(
				'label'     => __( 'Insert In-feed Ads After Every How Many Posts?', 'soledad' ),
				'type'      => Controls_Manager::NUMBER,
				'default' => '3',
			)
		);
		
		$this->add_control(
			'infeedads_code',
			array(
				'label' => __( 'In-feed Ads Code/HTML', 'soledad' ),
				'type' => Controls_Manager::CODE,
				'language' => 'html',
				'rows' => 20,
			)
		);
		
		$this->add_control(
			'infeedads_layout', array(
				'label'   => __( 'In-feed Ads Layout Type', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => '',
				'options' => array(
					''   => esc_html__( 'Follow Selected Layout', 'soledad' ),
					'full' => esc_html__( 'Full Width', 'soledad' ),
				)
			)
		);
		
		$this->end_controls_section();
		
		$this->register_block_title_section_controls_post();

		// Design
		$this->start_controls_section(
			'section_design_content', array(
				'label' => __( 'General', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'post_border_color',
			array(
				'label'     => __( 'Post Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-grid li.list-post'                          => 'border-color: {{VALUE}} !important;',
					'{{WRAPPER}} .penci-grid .list-post.list-boxed-post'            => 'border-color: {{VALUE}} !important;',
					'{{WRAPPER}} .penci-grid li.list-boxed-post-2 .content-boxed-2' => 'border-color: {{VALUE}} !important;',
					'{{WRAPPER}} .grid-mixed'                                       => 'border-color: {{VALUE}} !important;',
				),
				'condition' => array( 'penci_style' => array( 'list', 'boxed-1', 'boxed-2', 'mixed', 'standard-boxed-1' ) ),
			)
		);
		$this->add_control(
			'ptitle_style', array(
				'label' => __( 'Post Title', 'soledad' ),
				'type'  => Controls_Manager::HEADING,
			)
		);

		$ptitle_typo = '{{WRAPPER}} .entry-title,{{WRAPPER}} .entry-title a,';
		$ptitle_typo .= '{{WRAPPER}} .header-standard .entry-title,{{WRAPPER}} .header-standard .entry-title a,';
		$ptitle_typo .= '{{WRAPPER}} .overlay-header-box .entry-title,{{WRAPPER}} .overlay-header-box .entry-title a,';
		$ptitle_typo .= '{{WRAPPER}} .header-standard h2, {{WRAPPER}} .header-standard h2 a,';
		$ptitle_typo .= '{{WRAPPER}} .penci-grid li .item h2 a, {{WRAPPER}} .penci-grid li .item h2 a,';
		$ptitle_typo .= '{{WRAPPER}} .penci-masonry .item-masonry h2 a,{{WRAPPER}} .penci-masonry .item-masonry h2 a';
		$this->add_control(
			'ptitle_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					$ptitle_typo => 'color: {{VALUE}};'
				),
			)
		);
		$this->add_control(
			'ptitle_hcolor', array(
				'label'     => __( 'Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .header-standard h2 a:hover,{{WRAPPER}} .entry-title a:hover'                        => 'color: {{VALUE}};',
					'{{WRAPPER}} .overlay-header-box .overlay-title a:hover'                                          => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-grid li .item h2 a:hover,{{WRAPPER}} .penci-masonry .item-masonry h2 a:hover' => 'color: {{VALUE}};'
				),
			)
		);

		$this->add_control(
			'bptitle_color', array(
				'label'     => __( 'Color for Big Post', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .grid-overlay .penci-entry-title a' => 'color: {{VALUE}};' ),
				'condition' => array( 'penci_style' => $color_big_post ),
			)
		);
		$this->add_control(
			'bptitle_hcolor', array(
				'label'     => __( 'Hover Color for Big Post', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .grid-overlay .penci-entry-title a:hover' => 'color: {{VALUE}};' ),
				'condition' => array( 'penci_style' => $color_big_post ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'ptitle_typo',
				'selector' => $ptitle_typo
			)
		);
		$this->add_responsive_control(
			'bptitle_size', array(
				'label'     => __( 'Font size for Big Post', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-latest-posts-mixed-2 .item.overlay-layout .entry-title a'             => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-mixed .grid-mixed .entry-title a'                        => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-grid article.format-standard .entry-title a'    => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-grid-2 article.format-standard .entry-title a'  => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-list article.format-standard .entry-title a'    => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-boxed-1 article.format-standard .entry-title a' => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-grid article.format-standard .entry-title a'     => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-grid-2 article.format-standard .entry-title a'   => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-list article.format-standard .entry-title a'     => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-grid .overlay-header-box .entry-title a'         => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-grid-2 .overlay-header-box .entry-title a'       => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-list .overlay-header-box .entry-title a'         => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-boxed-1 .overlay-header-box .entry-title a'      => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-mixed-4 .penci-featured-infor .entry-title a'            => 'font-size: {{SIZE}}px !important',
				),
				'condition' => array( 'penci_style' => $style_big_post ),
			)
		);
		// Post meta
		$this->add_control(
			'heading_meta_style',
			array(
				'label'     => __( 'Post Meta', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'pmeta_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .header-standard .author-post span,' .
					'{{WRAPPER}} .penci-post-box-meta .penci-box-meta span,' .
					'{{WRAPPER}} .penci-post-box-meta .penci-box-meta a'             => 'color: {{VALUE}};',
					'{{WRAPPER}} .overlay-author span,{{WRAPPER}} .overlay-author a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .overlay-post-box-meta .overlay-share span,' .
					'{{WRAPPER}} .overlay-post-box-meta .overlay-share a,' .
					'{{WRAPPER}} .overlay-post-box-meta'                             => 'color: {{VALUE}};',
					'{{WRAPPER}} .grid-post-box-meta span'                           => 'color: {{VALUE}};',

				),
			)
		);
		$this->add_control(
			'author_color',
			array(
				'label'     => __( 'Author Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .header-standard .author-post span a,{{WRAPPER}} .overlay-author a,{{WRAPPER}} .grid-post-box-meta span a' => 'color: {{VALUE}};' ),
			)
		);

		$this->add_control(
			'bpauthor_color', array(
				'label'     => __( 'Author Color for Big Post', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .grid-overlay .overlay-author span,{{WRAPPER}} .grid-overlay .overlay-author a' => 'color: {{VALUE}};',
				),
				'condition' => array( 'penci_style' => $color_big_post ),
			)
		);

		$this->add_control(
			'pmeta_hcolor',
			array(
				'label'     => __( 'Post Meta Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-post-box-meta .penci-box-meta a:hover' => 'color: {{VALUE}};',
					'{{WRAPPER}} .overlay-author a:hover'                      => 'color: {{VALUE}};',
					'{{WRAPPER}} .grid-post-box-meta span a:hover'             => 'color: {{VALUE}};',
				),
			)
		);

		$pmeta_typo = '{{WRAPPER}} .header-standard .author-post,';
		$pmeta_typo .= '{{WRAPPER}} .penci-post-box-meta .penci-box-meta span,';
		$pmeta_typo .= '{{WRAPPER}} .penci-post-box-meta .penci-box-meta a,';
		$pmeta_typo .= '{{WRAPPER}} .overlay-author a,';
		$pmeta_typo .= '{{WRAPPER}} .overlay-header-box .overlay-author,';
		$pmeta_typo .= '{{WRAPPER}} .grid-post-box-meta';

		$pmeta_typo_bpost = '{{WRAPPER}} %1$s .header-standard .author-post,';
		$pmeta_typo_bpost .= '{{WRAPPER}} %1$s .penci-post-box-meta .penci-box-meta span,';
		$pmeta_typo_bpost .= '{{WRAPPER}} %1$s .penci-post-box-meta .penci-box-meta a,';
		$pmeta_typo_bpost .= '{{WRAPPER}} %1$s .overlay-author a,';
		$pmeta_typo_bpost .= '{{WRAPPER}} %1$s .overlay-header-box .overlay-author,';
		$pmeta_typo_bpost .= '{{WRAPPER}} %1$s .grid-post-box-meta';

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pmeta_typo',
				'selector' => $pmeta_typo
			)
		);
		$this->add_responsive_control(
			'bpmeta_size', array(
				'label'     => __( 'Font size for Big Post', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-mixed .grid-mixed' )                        => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-mixed-2 .item.overlay-layout' )             => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-standard-grid article.format-standard' )    => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-standard-grid-2 article.format-standard' )  => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-standard-list article.format-standard' )    => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-standard-boxed-1 article.format-standard' ) => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-classic-grid article.format-standard' )     => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-classic-grid-2 article.format-standard' )   => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-classic-list article.format-standard' )     => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-overlay-grid .overlay-layout' )             => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-overlay-grid-2 .overlay-layout' )           => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-overlay-list .overlay-layout' )             => 'font-size: {{SIZE}}px !important',
					sprintf( $pmeta_typo_bpost, '.penci-latest-posts-overlay-boxed-1 .overlay-layout' )          => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-mixed-4 .penci-featured-infor .grid-post-box-meta'          => 'font-size: {{SIZE}}px !important',
				),
				'condition' => array( 'penci_style' => $style_big_post ),
			)
		);

		$this->add_control(
			'pmeta_border_color',
			array(
				'label'     => __( 'Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .header-standard:after'                        => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-overlay-over .overlay-header-box:after' => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .grid-header-box:after'                        => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-post-box-meta'                          => 'border-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'bpmeta_border_color', array(
				'label'     => __( 'Border Color for Big Post', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .grid-overlay .penci-overlay-over .overlay-header-box:after' => 'background-color: {{VALUE}};',
				),
				'condition' => array( 'penci_style' => $color_big_post ),
			)
		);


		// Post Excrept
		$markup_excrept = '{{WRAPPER}} .post-entry.standard-post-entry, {{WRAPPER}} .post-entry.standard-post-entry p,';
		$markup_excrept .= '{{WRAPPER}} .penci-grid .entry-content,{{WRAPPER}} .penci-grid .entry-content p,';
		$markup_excrept .= '{{WRAPPER}} .entry-content,{{WRAPPER}} .entry-content p';

		$this->add_control(
			'heading_excerpt_style',
			array(
				'label'     => __( 'Post Excerpt', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'pexcerpt_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( $markup_excrept => 'color: {{VALUE}};' )
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pexcerpt_typo',
				'selector' => $markup_excrept,
			)
		);
		$this->add_responsive_control(
			'bpexcerpt_size', array(
				'label'     => __( 'Font size for Big Post', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-latest-posts-mixed .grid-mixed .entry-content,{{WRAPPER}} .penci-latest-posts-mixed .grid-mixed .entry-content p'                                               => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-grid article.format-standard .entry-content,{{WRAPPER}} .penci-latest-posts-standard-grid article.format-standard .entry-content p'       => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-grid-2 article.format-standard .entry-content,{{WRAPPER}} .penci-latest-posts-standard-grid-2 article.format-standard .entry-content p'   => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-list article.format-standard .entry-content,{{WRAPPER}} .penci-latest-posts-standard-list article.format-standard .entry-content p'       => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-boxed-1 article.format-standard .entry-content,{{WRAPPER}} .penci-latest-posts-standard-boxed-1 article.format-standard .entry-content p' => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-grid article.format-standard .entry-content,{{WRAPPER}} .penci-latest-posts-classic-grid article.format-standard .entry-content p'         => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-grid-2 article.format-standard .entry-content,{{WRAPPER}} .penci-latest-posts-classic-grid-2 article.format-standard .entry-content p'     => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-list article.format-standard .entry-content,{{WRAPPER}} .penci-latest-posts-classic-list article.format-standard .entry-content p'         => 'font-size: {{SIZE}}px !important',
				),
				'condition' => array( 'penci_style' => array( 'mixed', 'standard-grid', 'standard-grid-2', 'standard-list', 'standard-boxed-1', 'classic-grid', 'classic-grid-2', 'classic-list' ) ),
			)
		);

		// Category
		$this->add_control(
			'heading_cat_style', array(
				'label'     => __( 'Post Category', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'pcat_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .cat > a.penci-cat-name'                                                                        => 'color: {{VALUE}};',
					'{{WRAPPER}} .cat > a.penci-cat-name:after, {{WRAPPER}} .overlay-header-box .cat > a.penci-cat-name:after'   => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-grid .cat a.penci-cat-name:after,{{WRAPPER}} .penci-masonry .cat a.penci-cat-name:after' => 'border-color: {{VALUE}};',
				),
			)
		);
		$this->add_control(
			'pcat_hcolor', array(
				'label'     => __( 'Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .cat > a.penci-cat-name:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'bpcat_color', array(
				'label'     => __( 'Color for Big Post', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .grid-overlay .cat > a.penci-cat-name'                                                                                            => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-featured-infor .cat > a.penci-cat-name:after, {{WRAPPER}} .grid-overlay .overlay-header-box .cat > a.penci-cat-name:after' => 'border-color: {{VALUE}};',
				),
				'condition' => array( 'penci_style' => $color_big_post ),
			)
		);
		$this->add_control(
			'bpcat_hcolor', array(
				'label'     => __( 'Hover Color for Big Post', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .grid-overlay .cat > a.penci-cat-name:hover' => 'color: {{VALUE}};' ),
				'condition' => array( 'penci_style' => $color_big_post ),
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pcat_typo',
				'selector' => '{{WRAPPER}} .cat > a.penci-cat-name',
			)
		);
		$this->add_responsive_control(
			'bpcat_size', array(
				'label'     => __( 'Font size for Big Post', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-latest-posts-mixed .grid-mixed .cat > a.penci-cat-name'                        => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-mixed-2 .item.overlay-layout .cat > a.penci-cat-name'             => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-grid article.format-standard .cat > a.penci-cat-name'    => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-grid-2 article.format-standard .cat > a.penci-cat-name'  => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-list article.format-standard .cat > a.penci-cat-name'    => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-boxed-1 article.format-standard .cat > a.penci-cat-name' => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-grid article.format-standard .cat > a.penci-cat-name'     => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-grid-2 article.format-standard .cat > a.penci-cat-name'   => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-list article.format-standard .cat > a.penci-cat-name'     => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-grid .grid-overlay .cat > a.penci-cat-name'               => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-grid-2 .grid-overlay .cat > a.penci-cat-name'             => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-list .grid-overlay .cat > a.penci-cat-name'               => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-boxed-1 .grid-overlay .cat > a.penci-cat-name'            => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-mixed-4 .penci-featured-infor .cat > a.penci-cat-name'            => 'font-size: {{SIZE}}px !important',
				),
				'condition' => array( 'penci_style' => $style_big_post ),
			)
		);

		// Read more button
		$this->add_control(
			'heading_readmore_style',
			array(
				'label'     => __( 'Continue Reading/Read More Button', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'readmore_text_color',
			array(
				'label'     => __( 'Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-more-link a.more-link' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'readmore_text_hcolor',
			array(
				'label'     => __( 'Text Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-more-link a.more-link:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'readmorebt_text_color',
			array(
				'label'     => __( 'Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-readmore-btn a' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'readmorebt_text_hcolor',
			array(
				'label'     => __( 'Text Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-readmore-btn a:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'readmore_bg_color',
			array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-readmore-btn.penci-btn-make-button a' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'readmore_bg_hcolor',
			array(
				'label'     => __( 'Background Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-readmore-btn.penci-btn-make-button a:hover' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'label'    => __( 'Continue Reading Typography', 'soledad' ),
				'name'     => 'readmore_text_typo',
				'selector' => '{{WRAPPER}} .penci-more-link a.more-link',
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'label'    => __( 'Read More Button Typography', 'soledad' ),
				'name'     => 'readmorebtn_text_typo',
				'selector' => '{{WRAPPER}} .penci-readmore-btn a',
			)
		);
		$this->add_control(
			'readmore_line_color',
			array(
				'label'     => __( 'Line Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-more-link a.more-link:before,{{WRAPPER}} .penci-more-link a.more-link:after' => 'border-color: {{VALUE}};' ),
			)
		);

		// Social Share
		$this->add_control(
			'heading_socialshare_style',
			array(
				'label'     => __( 'Social Share', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
			)
		);
		$this->add_control(
			'socialshare_color',
			array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-post-box-meta .penci-post-share-box a, {{WRAPPER}} .penci-featured-share-box a' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'socialshare_hcolor',
			array(
				'label'     => __( 'Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-post-box-meta .penci-post-share-box a:hover, {{WRAPPER}} .penci-featured-share-box a:hover' => 'color: {{VALUE}};' ),
			)
		);
		$this->add_control(
			'socialshare_bgcolor',
			array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-featured-share-box .penci-shareic, {{WRAPPER}} .penci-featured-share-box .penci-shareso' => 'background-color: {{VALUE}};' ),
				'condition' => array( 'penci_style' => $style_extra_post ),
			)
		);
		$this->add_control(
			'socialshare_line_color',
			array(
				'label'     => __( 'Line Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .penci-post-box-meta.penci-post-box-grid:before' => 'background-color: {{VALUE}};' ),
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'socialshare_typo',
				'selector' => '{{WRAPPER}} .penci-post-box-meta .penci-post-share-box a',
			)
		);
		$this->add_responsive_control(
			'bsocialshare_size', array(
				'label'     => __( 'Font size for Big Post', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-latest-posts-mixed-2 .item.overlay-layout .penci-post-box-meta .penci-post-share-box a'             => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-mixed .grid-mixed .penci-post-box-meta .penci-post-share-box a'                        => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-grid article.format-standard .penci-post-box-meta .penci-post-share-box a'    => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-grid-2 article.format-standard .penci-post-box-meta .penci-post-share-box a'  => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-list article.format-standard .penci-post-box-meta .penci-post-share-box a'    => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-standard-boxed-1 article.format-standard .penci-post-box-meta .penci-post-share-box a' => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-grid article.format-standard .penci-post-box-meta .penci-post-share-box a'     => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-grid-2 article.format-standard .penci-post-box-meta .penci-post-share-box a'   => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-classic-list article.format-standard .penci-post-box-meta .penci-post-share-box a'     => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-grid .grid-overlay .penci-post-share-box a'                                    => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-grid-2 .grid-overlay .penci-post-share-box a'                                  => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-list .grid-overlay .penci-post-share-box a'                                    => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-overlay-boxed-1 .grid-overlay .penci-post-share-box a'                                 => 'font-size: {{SIZE}}px !important',
					'{{WRAPPER}} .penci-latest-posts-mixed-4 .grid-featured .penci-post-share-box a'                                        => 'font-size: {{SIZE}}px !important',
				),
				'condition' => array( 'penci_style' => $style_big_post ),
			)
		);

		// Social Share
		$this->add_control(
			'heading_extra_style',
			array(
				'label'     => __( 'Extra Options', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before',
				'condition' => array( 'penci_style' => $style_extra_post ),
			)
		);

		$this->add_control(
			'borders_color_sfeatured',
			array(
				'label'     => __( 'Borders Color for Featured Boxed Style', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .grid-featured' => 'border-color: {{VALUE}};' ),
				'condition' => array( 'penci_style' => $style_extra_post ),
			)
		);

		$this->add_control(
			'bg_color_sfeatured',
			array(
				'label'     => __( 'Background Color for Featured Boxed Style', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array( '{{WRAPPER}} .grid-featured' => 'background-color: {{VALUE}};' ),
				'condition' => array( 'penci_style' => $style_extra_post ),
			)
		);

		$this->end_controls_section();

		// Pagination
		$this->start_controls_section(
			'section_pagination_style', array(
				'label' => __( 'Pagination', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pagination_typography',
				'selector' => '{{WRAPPER}} .penci-pagination ul.page-numbers li a i, {{WRAPPER}} .penci-pagination ul.page-numbers li span,{{WRAPPER}} .penci-pagination ul.page-numbers li a, {{WRAPPER}}  .penci-pagination.penci-ajax-more a.penci-ajax-more-button'
			)
		);
		$this->add_responsive_control(
			'pagination_icon', array(
				'label'     => __( 'Font size for Load More Icon', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100, ) ),
				'selectors' => array( '{{WRAPPER}} .penci-pagination a.penci-ajax-more-button i, {{WRAPPER}}  .penci-pagination .disable-url i' => 'font-size: {{SIZE}}px' ),
				'condition' => array( 'penci_paging' => array( 'loadmore', 'scroll' ) ),
			)
		);
		$this->add_control(
			'pagination_color_heading', array(
				'label'     => __( 'Colors', 'soledad' ),
				'type'      => Controls_Manager::HEADING,
				'separator' => 'before'
			)
		);

		$this->start_controls_tabs( 'pagination_colors' );

		$this->start_controls_tab(
			'pagination_color_normal', array(
				'label' => __( 'Normal', 'soledad' )
			)
		);

		$this->add_control(
			'pagination_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-pagination ul.page-numbers li span,'                 => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-pagination ul.page-numbers li a'                     => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-pagination.penci-ajax-more a.penci-ajax-more-button' => 'color: {{VALUE}};'
				)
			)
		);
		$this->add_control(
			'pagination_bordercolor', array(
				'label'     => __( 'Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-pagination ul.page-numbers li span,'                 => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-pagination ul.page-numbers li a'                     => 'border-color: {{VALUE}};',
					'{{WRAPPER}} .penci-pagination.penci-ajax-more a.penci-ajax-more-button' => 'border-color: {{VALUE}};'
				)
			)
		);
		$this->add_control(
			'pagination_bgcolor', array(
				'label'     => __( 'Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-pagination ul.page-numbers li span,'                 => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-pagination ul.page-numbers li a'                     => 'background-color: {{VALUE}};',
					'{{WRAPPER}} .penci-pagination.penci-ajax-more a.penci-ajax-more-button' => 'background-color: {{VALUE}};'
				)
			)
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'pagination_color_hover', array(
				'label' => __( 'Hover', 'soledad' )
			)
		);

		$this->add_control(
			'pagination_hover_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .penci-pagination.penci-ajax-more a.penci-ajax-more-button:hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .penci-pagination ul.page-numbers li a:hover'                      => 'color: {{VALUE}}',
					'{{WRAPPER}} .penci-pagination ul.page-numbers li span.current'                 => 'color: {{VALUE}}'
				)
			)
		);
		$this->add_control(
			'pagination_hbordercolor', array(
				'label'     => __( 'Hover Border Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}}  .penci-pagination.penci-ajax-more a.penci-ajax-more-button:hover' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .penci-pagination ul.page-numbers li a:hover'                      => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .penci-pagination ul.page-numbers li span.current'                 => 'border-color: {{VALUE}}'
				)
			)
		);
		$this->add_control(
			'pagination_hbgcolor', array(
				'label'     => __( 'Hover Background Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-pagination.penci-ajax-more a.penci-ajax-more-button:hover' => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .penci-pagination ul.page-numbers li a:hover'                     => 'background-color: {{VALUE}}',
					'{{WRAPPER}} .penci-pagination ul.page-numbers li span.current'                => 'background-color: {{VALUE}}'
				)
			)
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_responsive_control(
			'pagination_spacing', array(
				'label'     => __( 'Space Between', 'soledad' ),
				'type'      => Controls_Manager::SLIDER,
				'separator' => 'before',
				'range'     => array( 'px' => array( 'min' => 0, 'max' => 100 ) ),
				'selectors' => array(
					'{{WRAPPER}} .penci-pagination' => 'margin-top: {{SIZE}}{{UNIT}}'
				)
			)
		);

		$this->end_controls_section();

		$this->register_block_title_style_section_controls();
	}

	protected function render() {
		$settings = $this->get_settings();

		$query_args = Query_Control::get_query_args( 'posts', $settings );
		
		$ads_code = '';
		if( $settings['infeedads_code'] ){
			$ads_code = base64_encode( rawurlencode( $settings['infeedads_code'] ) );
		}
		$order_columns = isset( $settings['order_columns'] ) ? $settings['order_columns'] : '';
		$order_columns_tablet = isset( $settings['order_columns_tablet'] ) ? $settings['order_columns_tablet'] : $order_columns;
		$order_columns_mobile = isset( $settings['order_columns_mobile'] ) ? $settings['order_columns_mobile'] : $order_columns;

		echo \Soledad_VC_Shortcodes::latest_posts( array(
			'heading'             => $settings['heading'],
			'hide_block_heading'  => $settings['hide_block_heading'],
			'heading_title_style' => $settings['heading_title_style'],
			'heading_title_link'  => $settings['heading_title_link'],
			'heading_title_align' => $settings['block_title_align'],
			'heading_icon_pos'    => $settings['heading_icon_pos'],
			'heading_icon'        => $settings['heading_icon'],
			'style'               => $settings['penci_style'],
			'paging'              => $settings['penci_paging'],
			'penci_mixed_style'   => $settings['penci_mixed_style'],
			'morenum'             => $settings['morenum'],

			'standard_meta_overlay'   => $settings['standard_meta_overlay'],
			'standard_thumbnail'      => $settings['standard_thumbnail'],
			'std_dis_at_gallery'      => $settings['std_dis_at_gallery'],
			'standard_thumb_crop'     => $settings['standard_thumb_crop'],
			'standard_share_box'      => $settings['standard_share_box'],
			'standard_cat'            => $settings['standard_cat'],
			'standard_author'         => $settings['standard_author'],
			'standard_date'           => $settings['standard_date'],
			'standard_comment'        => $settings['standard_comment'],
			'standard_viewscount'     => $settings['standard_viewscount'],
			'standard_readtime'       => $settings['standard_readtime'],
			'standard_remove_line'    => $settings['standard_remove_line'],
			'standard_auto_excerpt'   => $settings['standard_auto_excerpt'],
			'standard_remove_excerpt' => $settings['standard_remove_excerpt'],
			'standard_effect_button'  => $settings['standard_effect_button'],
			'std_continue_btn'        => $settings['std_continue_btn'],
			'grid_icon_format'        => $settings['grid_icon_format'],
			'grid_meta_overlay'       => $settings['grid_meta_overlay'],
			'grid_nocrop_list'        => $settings['grid_nocrop_list'],
			'grid_share_box'          => $settings['grid_share_box'],
			'grid_cat'                => $settings['grid_cat'],
			'grid_author'             => $settings['grid_author'],
			'grid_date'               => $settings['grid_date'],
			'grid_comment'            => $settings['grid_comment'],
			'grid_comment_other'      => $settings['grid_comment_other'],
			'grid_viewscount'         => $settings['grid_viewscount'],
			'grid_readtime'         => $settings['grid_readtime'],
			'grid_remove_line'        => $settings['grid_remove_line'],
			'grid_remove_excerpt'     => $settings['grid_remove_excerpt'],
			'grid_add_readmore'       => $settings['grid_add_readmore'],
			'grid_remove_arrow'       => $settings['grid_remove_arrow'],
			'grid_readmore_button'    => $settings['grid_readmore_button'],
			'grid_readmore_align'     => $settings['grid_readmore_align'],
			'grid_excerpt_length'     => $settings['grid_excerpt_length'],
			'standard_excerpt_length' => $settings['standard_excerpt_length'],
			'post_alignment'          => $settings['post_alignment'],
			'std_continue_align'      => $settings['std_continue_align'],
			'std_excerpt_align'       => $settings['std_excerpt_align'],
			'share_alignment'       => $settings['share_alignment'],
			'grid_excerpt_align'      => $settings['grid_excerpt_align'],
			'standard_title_length'   => $settings['standard_title_length'],
			'grid_title_length'       => $settings['grid_title_length'],
			'penci_featimg_size'      => $settings['penci_featimg_size'],
			'penci_featimg_ratio'      => $settings['penci_featimg_ratio'],
			'thumb_size'      => $settings['thumb_size'],
			'thumb_bigsize'      => $settings['thumb_bigsize'],
			'order_columns'           => $order_columns,
			'order_columns_tablet'    => $order_columns_tablet,
			'order_columns_mobile'    => $order_columns_mobile,
			'infeed_num'           => $settings['infeedads_num'],
			'infeed_code'           => $ads_code,
			'infeed_layout'           => $settings['infeedads_layout'],

			'elementor_query' => $query_args
		) );
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
}
