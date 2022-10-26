<?php
/**
 * @author : PenciDesign
 */

namespace SoledadFW\Customizer;

/**
 * Class Theme Soledad Customizer
 */
class SinglePostOption extends CustomizerOptionAbstract {

	public $panelID = 'penci_single_post_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'Single Posts', 'soledad' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'penci_section_spost_general_section', esc_html__( 'General', 'soledad' ), $this->panelID );
		$this->add_lazy_section( 'penci_section_spost_inline_reposts_section', esc_html__( 'Inline Related Posts', 'soledad' ), $this->panelID );
		$this->add_lazy_section( 'penci_section_spost_related_posts_section', esc_html__( 'Related Posts', 'soledad' ), $this->panelID );
		$this->add_lazy_section( 'penci_section_spost_comments_section', esc_html__( 'Comments Form', 'soledad' ), $this->panelID );
		$this->add_lazy_section( 'penci_section_spost_autoload_section', esc_html__( 'Infinity Scrolling Load Posts', 'soledad' ), $this->panelID, esc_html__( 'When you viewing a single post page, scroll down and this feature can help you load the next/previous posts automatically.', 'soledad' ) );
		$this->add_lazy_section( 'penci_section_spost_fontsize_section', esc_html__( 'Font Size', 'soledad' ), $this->panelID );
		$this->add_lazy_section( 'penci_section_spost_colors_section', esc_html__( 'Colors', 'soledad' ), $this->panelID );
	}
}
