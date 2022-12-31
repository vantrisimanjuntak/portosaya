<?php
namespace PenciSoledadElementor\Modules\PenciBlockHeadingTitle\Widgets;

use PenciSoledadElementor\Base\Base_Widget;
use PenciSoledadElementor\Modules\QueryControl\Module;
use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class PenciBlockHeadingTitle extends Base_Widget {

	public function get_name() {
		return 'penci-block-heading';
	}

	public function get_title() {
		return esc_html__( 'Penci Block Heading', 'soledad' );
	}

	public function get_icon() {
		return 'eicon-url';
	}
	
	public function get_categories() {
		return [ 'penci-elements' ];
	}

	public function get_keywords() {
		return array( 'heading', 'block heading', 'title' );
	}

	protected function _register_controls() {
		parent::_register_controls();

		$this->register_block_title_section_controls();
		
		$this->start_controls_section(
			'section_extra_link',
			array(
				'label' => __( 'Extra Button Link', 'soledad' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'btn_text', array(
				'label'   => __( 'Button Text', 'soledad' ),
				'type'    => Controls_Manager::TEXT,
				'default' => __( '', 'soledad' ),
			)
		);
		
		$this->add_control(
			'btn_url',
			array(
				'label'       => __( 'Button URL', 'soledad' ),
				'type'        => Controls_Manager::URL,
				'placeholder' => __( 'https://your-link.com', 'soledad' ),
			)
		);
		
		$this->add_control(
			'btn_style', array(
				'label'     => __( 'Button Style', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'none',
				'options'   => array(
					'none'  => esc_html__( 'None', 'soledad' ),
					'underline' => esc_html__( 'Underline', 'soledad' ),
				),
			)
		);
		
		$this->add_control(
			'btn_pos', array(
				'label'     => __( 'Button Position', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'default'   => 'right',
				'options'   => array(
					'right'  => esc_html__( 'Right', 'soledad' ),
					'left' => esc_html__( 'Left', 'soledad' ),
				),
			)
		);
		
		$this->add_responsive_control(
			'btn_space', array(
				'label'   => __( 'Button Spacing', 'soledad' ),
				'type'    => Controls_Manager::SLIDER,
				'range'   => array( 'px' => array( 'min' => 0, 'max' => 300, ) ),
				'selectors' => array(
					'{{WRAPPER}} .pcbh-btnp-left' => 'margin-right: {{SIZE}}px;',
					'{{WRAPPER}} .pcbh-btnp-right' => 'margin-left: {{SIZE}}px;',
				),
			)
		);
		
		$this->add_control(
			'btn_hidemobile', array(
				'label' => __( 'Hide Extra Button Link on Mobile', 'soledad' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);
		
		$this->add_control(
			'btn_addicon', array(
				'label' => __( 'Add Icon to Button', 'soledad' ),
				'type'  => Controls_Manager::SWITCHER,
			)
		);

		$this->add_control(
			'btn_icon',
			array(
				'label'     => esc_html__( 'Icon', 'soledad' ),
				'type'      => Controls_Manager::ICONS,
				'condition' => array( 'btn_addicon' => 'yes' ),
			)
		);

		$this->add_control(
			'btn_iconpos',
			array(
				'label'     => esc_html__( 'Icon position', 'soledad' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => array(
					'right' => esc_html__( 'Right', 'soledad' ),
					'left'  => esc_html__( 'Left', 'soledad' ),
				),
				'default'   => 'right',
				'condition' => array( 'btn_addicon' => 'yes' ),
			)
		);
		
		$this->end_controls_section();
		

		// Design
		$this->start_controls_section(
			'section_padding_general',
			array(
				'label' => __( 'Spacing', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
				'condition' => array( 'heading_title_style!' => array( 'style-7', 'style-10', 'style-12', 'style-13', 'style-16' ) ),
			)
		);
		
		$this->add_responsive_control(
			'bht_padding', array(
				'label'      => __( 'Block Heading Padding', 'soledad' ),
				'type'       => Controls_Manager::DIMENSIONS,
				'size_units' => array( 'px', '%', 'em' ),
				'condition' => array( 'heading_title_style!' => array( 'style-7', 'style-10', 'style-12', 'style-13', 'style-16' ) ),
				'selectors' => array( '{{WRAPPER}} .penci-homepage-title .inner-arrow' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};' ),
			)
		);

		$this->end_controls_section();
		
		$this->register_block_title_style_section_controls();
		
		$this->start_controls_section(
			'section_extrabtn_general',
			array(
				'label' => __( 'Extra Button Link', 'soledad' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			)
		);
		
		$this->add_control(
			'btn_text_color', array(
				'label'     => __( 'Text Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow .pcbh-extrabtn' => 'color: {{VALUE}} !important;',
				),
			)
		);
		
		$this->add_control(
			'btn_text_hcolor', array(
				'label'     => __( 'Text Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow a.pcbh-extrabtn:hover' => 'color: {{VALUE}} !important;',
				),
			)
		);
		
		$this->add_control(
			'btn_line_color', array(
				'label'     => __( 'Line Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'btn_style' => 'underline' ),
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow .pcbh-btns-underline:after' => 'background-color: {{VALUE}} !important;',
				),
			)
		);
		
		$this->add_control(
			'btn_line_hcolor', array(
				'label'     => __( 'Line Hover Color', 'soledad' ),
				'type'      => Controls_Manager::COLOR,
				'default'   => '',
				'condition' => array( 'btn_style' => 'underline' ),
				'selectors' => array(
					'{{WRAPPER}} .penci-border-arrow .inner-arrow a.pcbh-btns-underline:hover:after' => 'background-color: {{VALUE}} !important;',
				),
			)
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(), array(
				'name'     => 'btn_typo',
				'label'    => __( 'Block Title Typography', 'soledad' ),
				'selector' => '{{WRAPPER}} .penci-border-arrow .inner-arrow a.pcbh-extrabtn',
			)
		);

		$this->end_controls_section();

	}

	protected function render() {
		$r = $this->get_settings();
		//$this->markup_block_title( $settings, $this );
		
		if ( ! $r['heading'] ) {
			return;
		}

		$heading_title = get_theme_mod( 'penci_sidebar_heading_style' ) ? get_theme_mod( 'penci_sidebar_heading_style' ) : 'style-1';
		$heading_align = get_theme_mod( 'penci_sidebar_heading_align' ) ? get_theme_mod( 'penci_sidebar_heading_align' ) : 'pcalign-center';


		if ( $r['heading_title_style'] ) {
			$heading_title = $r['heading_title_style'];
		}

		if ( $r['block_title_align'] ) {
			$heading_align = 'pcalign-' . $r['block_title_align'];
		}

		$heading_icon_pos    = get_theme_mod( 'penci_sidebar_icon_align' ) ? get_theme_mod( 'penci_sidebar_icon_align' ) : 'pciconp-right';
		$heading_icon_design = get_theme_mod( 'penci_sidebar_icon_design' ) ? get_theme_mod( 'penci_sidebar_icon_design' ) : 'pcicon-right';

		if ( $r['heading_icon_pos'] ) {
			$heading_icon_pos = $r['heading_icon_pos'];
		}

		if ( $r['heading_icon'] ) {
			$heading_icon_design = $r['heading_icon'];
		}

		$classes = 'penci-border-arrow penci-homepage-title penci-home-latest-posts';
		$classes .= ' ' . $heading_title;
		$classes .= ' ' . $heading_align;
		$classes .= ' ' . $heading_icon_pos;
		$classes .= ' ' . $heading_icon_design;
		$classes .= $r['block_title_ialign'] ? ' block-title-icon-' . $r['block_title_ialign'] : ' block-title-icon-left';
		
		$extra_btn_html = '';
		$btn_pos = isset( $r['btn_pos'] ) ? $r['btn_pos'] : 'right';
		$btn_ipos = isset( $r['btn_iconpos'] ) ? $r['btn_iconpos'] : 'right';
		$class_hide_mobile = 'yes' == $r['btn_hidemobile'] ? ' pcbtn-etrhm' : '';
		if( $r['btn_text'] ){
			ob_start();
			$btn_style = isset( $r['btn_style'] ) ? $r['btn_style'] : '';
			if ( $r['btn_url']['url'] ) {
				$btntarget = $r['btn_url']['is_external'] ? ' target="_blank"' : '';
				$btnnofollow = $r['btn_url']['nofollow'] ? ' rel="nofollow"' : '';
				$btn_classes = 'pcbh-extrabtn pcbh-btns-'. $btn_style .' pcbh-btnp-'. $btn_pos .' pcbh-btni-'. $btn_ipos . $class_hide_mobile;

				echo '<a class="'. $btn_classes .'"' . $btntarget . $btnnofollow . ' href="'. $r['btn_url']['url'] .'">';
			} else {
				echo '<span class="'. $btn_classes .'">';
			}
			
			if ( $r['btn_addicon'] && $r['btn_icon'] && 'left' == $r['btn_iconpos'] ) {
				\Elementor\Icons_Manager::render_icon( $r['btn_icon'] );
			}
			echo do_shortcode( $r['btn_text'] );
			if ( $r['btn_addicon'] && $r['btn_icon'] && 'right' == $r['btn_iconpos'] ) {
				\Elementor\Icons_Manager::render_icon( $r['btn_icon'] );
			}
			if ( $r['btn_url']['url'] ) {
				echo '</a>';
			} else {
				echo '</span>';
			}
			$extra_btn_html = ob_get_contents();
			ob_end_clean();
		}
		?>
        <div class="<?php echo esc_attr( $classes ); ?>">
            <h3 class="inner-arrow">
				<?php
				if( 'left' == $btn_pos && $extra_btn_html ){
					echo $extra_btn_html;
				}
				
				if ( $r['heading_title_link']['url'] ) {
					$target = $r['btn_url']['is_external'] ? ' target="_blank"' : '';
					$nofollow = $r['btn_url']['nofollow'] ? ' rel="nofollow"' : '';
					
					echo '<a href="'. $r['heading_title_link']['url'] .'"' . $target . $nofollow . '>';
				} else {
					echo '<span>';
				}

				if ( $r['add_title_icon'] && $r['block_title_icon'] && 'left' == $r['block_title_ialign'] ) {
					\Elementor\Icons_Manager::render_icon( $r['block_title_icon'] );
				}
				echo do_shortcode( $r['heading'] );
				if ( $r['add_title_icon'] && $r['block_title_icon'] && 'right' == $r['block_title_ialign'] ) {
					\Elementor\Icons_Manager::render_icon( $r['block_title_icon'] );
				}
				if ( $r['heading_title_link']['url'] ) {
					echo '</a>';
				} else {
					echo '</span>';
				}
				
				if( 'right' == $btn_pos && $extra_btn_html ){
					echo $extra_btn_html;
				}
				?>
            </h3>
        </div>
		<?php
	}
}
