<?php

namespace PenciSoledadElementor\Modules\PenciPostsSlider\Widgets;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use PenciSoledadElementor\Base\Base_Widget;
use PenciSoledadElementor\Modules\QueryControl\Module as Query_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciPostsSlider extends Base_Widget {

	public function get_name() {
		return 'penci-posts-slider';
	}

	public function get_title() {
		return esc_html__( 'Penci Widget Posts Slider', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'post', 'slider' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		// Section layout
		$this->start_controls_section(
			'section_page_layout', array(
				'label' => esc_html__( 'Layout', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		$this->add_control(
			'penci_style', array(
				'label'   => __( 'Select Style for This Slider', 'soledad' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'style-1',
				'options' => array(
					'style-1' => esc_html__( 'Style 1', 'soledad' ),
					'style-2' => esc_html__( 'Style 2', 'soledad' ),
					'style-3' => esc_html__( 'Style 3', 'soledad' ),
				)
			)
		);

		$this->add_control(
			'penci_size', array(
				'label'                => __( 'Image Size Type', 'soledad' ),
				'type'                 => Controls_Manager::SELECT,
				'default'              => 'horizontal',
				'options'              => array(
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
			)
		);
		$this->add_responsive_control(
			'penci_img_ratio', array(
				'label'          => __( 'Image Ratio', 'soledad' ),
				'type'           => Controls_Manager::SLIDER,
				'default'        => array( 'size' => 0.66 ),
				'tablet_default' => array( 'size' => '' ),
				'mobile_default' => array( 'size' => 0.5 ),
				'range'          => array( 'px' => array( 'min' => 0.1, 'max' => 2, 'step' => 0.01 ) ),
				'selectors'      => array(
					'{{WRAPPER}} .penci-image-holder:before' => 'padding-top: calc( {{SIZE}} * 100% );',
				),
				'condition'      => array( 'penci_size' => 'custom' ),
			)
		);
		$this->add_control(
			'thumb_size', array(
				'label'     => __( 'Custom Image size', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => '',
				'options'   => $this->get_list_image_sizes( true ),
				'condition' => array( 'penci_size' => 'custom' ),
			)
		);

		$this->add_control(
			'hide_pdate', array(
				'label'   => __( 'Hide post date?', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			)
		);
		$this->add_control(
			'dis_lazyload', array(
				'label'   => __( 'Disable lazyload ?', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			)
		);
		$this->add_control(
			'enable_autoplay', array(
				'label'   => __( 'Enable Autoplay Slider?', 'soledad' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			)
		);
		$this->add_control(
			'_title_length', array(
				'label'       => __( 'Custom Words Length for Post Titles', 'soledad' ),
				'type'        => Controls_Manager::NUMBER,
				'label_block' => true,
				'default'     => '10',
			)
		);
		$this->end_controls_section();
		$this->register_query_section_controls();
		$this->register_block_title_section_controls();
		$this->start_controls_section(
			'section_pslider_style',
			array(
				'label' => __( 'Post Slider', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'heading_ptitle_style', array(
				'label' => __( 'Post Title', 'soledad' ),
				'type'  => Controls_Manager::HEADING
			)
		);

		$this->add_control(
			'ptitle_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-widget-slider .penci-widget-slide-detail h4 a' => 'color: {{VALUE}};',
					'{{WRAPPER}} .penci-widget-slider .penci-widget-slide-detail h4'   => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_control(
			'ptitle_hcolor', array(
				'label'     => __( 'Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-widget-slider .penci-widget-slide-detail h4 a:hover' => 'color: {{VALUE}};',
				)
			)
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'ptitle_typo',
				'selector' => '{{WRAPPER}} .penci-widget-slider .penci-widget-slide-detail h4 a,{{WRAPPER}} .penci-widget-slider .penci-widget-slide-detail h4'
			)
		);

		$this->add_control(
			'heading_pmeta_style', array(
				'label' => __( 'Post Meta', 'soledad' ),
				'type'  => Controls_Manager::HEADING
			)
		);

		$this->add_control(
			'pmeta_color', array(
				'label'     => __( 'Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .penci-widget-slide-detail .slide-item-date' => 'color: {{VALUE}};',
				)
			)
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'pmeta_typo',
				'selector' => '{{WRAPPER}} .penci-widget-slide-detail .slide-item-date'
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

		$query_args = Query_Control::get_query_args( 'posts', $settings );
		$loop       = new \WP_Query( $query_args );

		if ( ! $loop->have_posts() ) {
			return;
		}

		$rand = rand( 100, 10000 );

		$dis_lazyload = $settings['dis_lazyload'];
		if ( get_theme_mod( 'penci_disable_lazyload_layout' ) ) {
			$dis_lazyload = false;
		}

		$style = $settings['penci_style'] ? $settings['penci_style'] : 'style-1';

		$css_class = 'penci-block-vc penci_post-slider-sc';
		$dataauto  = 'false';
		if ( $settings['enable_autoplay'] ) {
			$dataauto = 'true';
		}

		$thumbsize = penci_featured_images_size();
		if ( 'horizontal' == $settings['penci_size'] ) {
			$thumbsize = 'penci-thumb';
		} else if ( 'square' == $settings['penci_size'] ) {
			$thumbsize = 'penci-thumb-square';
		} else if ( 'vertical' == $settings['penci_size'] ) {
			$thumbsize = 'penci-thumb-vertical';
		} else if ( 'custom' == $settings['penci_size'] ) {
			if ( $settings['thumb_size'] ) {
				$thumbsize = $settings['thumb_size'];
			}
		}
		?>
        <div class="<?php echo esc_attr( $css_class ); ?>">
			<?php $this->markup_block_title( $settings, $this ); ?>
            <div class="penci-block_content">
                <div id="penci-postslidewg-<?php echo sanitize_text_field( $rand ); ?>"
                     class="penci-owl-carousel penci-owl-carousel-slider penci-widget-slider penci-post-slider-<?php echo $style; ?>"
                     data-lazy="true" data-auto="<?php echo $dataauto; ?>">
					<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="penci-slide-widget">
                            <div class="penci-slide-content">
								<?php if ( $style != 'style-3' ) { ?>
									<?php if ( ! $dis_lazyload ) { ?>
                                        <span class="penci-image-holder <?php echo penci_classes_slider_lazy(); ?>"
                                              data-bgset="<?php echo penci_image_srcset( get_the_ID(), $thumbsize ); ?>"
                                              title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></span>
									<?php } else { ?>
                                        <span class="penci-image-holder"
                                              style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumbsize ); ?>');"
                                              title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></span>
									<?php } ?>
                                    <a href="<?php the_permalink() ?>" class="penci-widget-slider-overlay"
                                       title="<?php the_title(); ?>"></a>
								<?php } else { ?>
									<?php if ( ! $dis_lazyload ) { ?>
                                        <a href="<?php the_permalink() ?>" class="penci-image-holder penci-lazy"
                                           data-bgset="<?php echo penci_get_featured_image_size( get_the_ID(), $thumbsize ); ?>"
                                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
									<?php } else { ?>
                                        <a href="<?php the_permalink() ?>" class="penci-image-holder"
                                           style="background-image: url('<?php echo penci_get_featured_image_size( get_the_ID(), $thumbsize ); ?>')"
                                           title="<?php echo wp_strip_all_tags( get_the_title() ); ?>"></a>
									<?php } ?>
								<?php } ?>
                                <div class="penci-widget-slide-detail">
                                    <h4>
                                        <a href="<?php the_permalink() ?>" rel="bookmark"
                                           title="<?php the_title(); ?>"><?php penci_trim_post_title( get_the_ID(), $settings['_title_length'] ); ?></a>
                                    </h4>
									<?php if ( ! $settings['hide_pdate'] ) : ?>
										<?php
										$date_format = get_option( 'date_format' );
										?>
										<?php if ( ! get_theme_mod( 'penci_show_modified_date' ) ) { ?>
                                            <span class="slide-item-date"><?php the_time( $date_format ); ?></span>
										<?php } else { ?>
                                            <span class="slide-item-date"><?php echo get_the_modified_date( $date_format ); ?></span>
										<?php } ?>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>
					<?php endwhile; ?>
                </div>

				<?php
				wp_reset_postdata();
				?>
            </div>
        </div>
		<?php
	}
}
