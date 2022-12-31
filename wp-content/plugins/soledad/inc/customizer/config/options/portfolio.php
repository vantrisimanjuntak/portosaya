<?php
/**
 * @author : PenciDesign
 */

namespace SoledadFW\Customizer;

/**
 * Class Theme Soledad Customizer
 */
class PortfolioOption extends CustomizerOptionAbstract {

	public $panelID = 'penci_portfolio_section_panel';

	public function set_option() {
		$this->set_panel();
		$this->set_section();
	}

	public function set_panel() {
		$this->customizer->add_panel( [
			'id'       => $this->panelID,
			'title'    => esc_html__( 'Portfolio', 'soledad' ),
			'priority' => $this->id,
		] );
	}

	public function set_section() {
		$this->add_lazy_section( 'pencidesign_portfolio_sgeneral_section', esc_html__( 'General', 'soledad' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_portfolio_scolor_section', esc_html__( 'Colors', 'soledad' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_portfolio_sfontsize_section', esc_html__( 'Font Size', 'soledad' ), $this->panelID );
		$this->add_lazy_section( 'pencidesign_portfolio_sadvanced_section', esc_html__( 'Advanced', 'soledad' ), $this->panelID );
	}
}
