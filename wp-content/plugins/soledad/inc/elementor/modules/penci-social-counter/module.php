<?php
namespace PenciSoledadElementor\Modules\PenciSocialCounter;

use PenciSoledadElementor\Base\Module_Base;

class Module extends Module_Base {

	public function get_name() {
		return 'penci-social-counter';
	}

	public function get_widgets() {
		return array( 'PenciSocialCounter' );
	}
}
