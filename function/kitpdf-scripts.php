<?php
class KITPDF_Scripts {
	public function __construct() {
		add_action( 'wp_footer', array( $this, 'kitpdf_js' ) );
	}
	public function kitpdf_js() {
		// js 
	}
}
$kitpdf_scripts = new KITPDF_Scripts();
