<?php
/*
|--------------------------------------------------------------------------
| Bean.php
|--------------------------------------------------------------------------
|
| Bean framework init class
|
*/


class Bean {

	private static $instance;

	private function __construct() {

	}

	//standard singleton class instantiation
	public static function get_instance(){
		if( null == self::$instance )
		{
			self::$instance = new self;
		}

		return self::$instance;
	}

	// initialize the theme
	public function init() {

		define( 'BEAN_FRAMEWORK_DIR', get_template_directory() . '/frmwrk/' );

		$this->get_included_files();
//		$this->register_post_types();
//		$this->register_metaboxes();
//		$this->register_shortcodes();
		$this->script_handler();
		//
		add_action( 'after_setup_theme', array( $this, 'liftoff' ) );

	}

	public function get_included_files() {
		require BEAN_FRAMEWORK_DIR . '/inc/utilities.php';
		require BEAN_FRAMEWORK_DIR . '/inc/Liftoff.php';
		require BEAN_FRAMEWORK_DIR . '/inc/Script_Handler.php';

		/**
		 * Implement the Custom Header feature.
		 */
		require get_template_directory() . '/inc/custom-header.php';

		/**
		 * Custom template tags for this theme.
		 */
		require get_template_directory() . '/inc/template-tags.php';

		/**
		 * Custom functions that act independently of the theme templates.
		 */
		require get_template_directory() . '/inc/extras.php';

		/**
		 * Customizer additions.
		 */
		require get_template_directory() . '/inc/customizer.php';

		/**
		 * Load Jetpack compatibility file.
		 */
		require get_template_directory() . '/inc/jetpack.php';
	}

	public function liftoff() {
		$liftoff = new Liftoff();
		$liftoff->init();
	}

	public function script_handler() {
		$sh = new Script_Handler();
		$sh->init();
	}
}