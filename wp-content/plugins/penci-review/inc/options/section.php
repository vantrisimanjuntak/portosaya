<?php
/**
 * @author : PenciDesign
 */

namespace SoledadFW\Customizer;

/**
 * Class Theme Soledad Customizer
 */
class ReviewOption extends CustomizerOptionAbstract {

	public $panelID = '';

	public function set_option() {
		$this->set_section();
	}

	public function set_section() {
		$this->add_lazy_section( 'penci_new_section_review_section', esc_html__( 'Posts Review Options', 'soledad' ), $this->panelID );
	}
}
