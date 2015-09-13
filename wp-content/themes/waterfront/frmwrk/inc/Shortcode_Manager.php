<?php 

class Shortcode_Manager {

	public function register_shortcodes( $shortcodes ) {
		foreach( $shortcodes as $code )
		{
			include_once( BEAN_FRAMEWORK_DIR . '/shortcodes/' . $code . '.php' );
		}
	}
}