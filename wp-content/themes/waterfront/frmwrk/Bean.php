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
		$this->register_post_types();
		$this->register_metaboxes();
		$this->register_shortcodes();
		$this->register_widgets();
		$this->script_handler();
		$this->handle_woocommerce();
		//
		add_action( 'after_setup_theme', array( $this, 'liftoff' ) );

	}

	public function get_included_files() {
		require BEAN_FRAMEWORK_DIR . '/inc/utilities.php';
		require BEAN_FRAMEWORK_DIR . '/inc/Liftoff.php';
		require BEAN_FRAMEWORK_DIR . '/inc/Script_Handler.php';
		require BEAN_FRAMEWORK_DIR . '/inc/Post_Type_Manager.php';
		require BEAN_FRAMEWORK_DIR . '/inc/Metabox_Handler.php';
		require BEAN_FRAMEWORK_DIR . '/inc/Shortcode_Manager.php';
		require BEAN_FRAMEWORK_DIR . '/inc/Widget_Manager.php';
		require BEAN_FRAMEWORK_DIR . '/inc/Woocommerce_Handler.php';

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

	public function handle_woocommerce() {
		$handle = new Woocommerce_Handler();
		$handle->init();
	}

	public function script_handler() {
		$sh = new Script_Handler();
		$sh->init();
	}

	public function register_post_types() {
		$post_manager = new Post_Type_Manager();

		$post_manager->register_posts(
			array(
				'menu_pt',
				'review_pt'
			)
		);
	}

	public function register_metaboxes() {
		$metabox_handler = new Metabox_Handler();

		$metabox_handler->register_metabox_group(
			array(
				'menu_mb',
				'location_mb',
				'acts_mb',
				'banner_mb',
			)
		);
	}

	public function register_shortcodes() {
		$manager = new Shortcode_Manager();
		$manager->register_shortcodes(
			array(
				'buttons_sh',
				'google_street_view_sh'
			)
		);
	}

	public function register_widgets() {
		$manager = new Widget_Manager();
		$manager->register_widgets(
			array(
				'Weather_Widget'
			)
		);
	}
}