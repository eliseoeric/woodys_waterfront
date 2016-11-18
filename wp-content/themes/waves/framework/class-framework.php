<?php
/*
|--------------------------------------------------------------------------
| class-framework.php
|--------------------------------------------------------------------------
|
| Framework class -- get's the framework up and running.
|
*/


class Framework {

	private static $instance;

	protected $shortcodes;
	protected $widgets;
	protected $post_types;

	public function __construct() {

		$this->shortcodes = array(
			'buttons_sh',
			'google_street_view_sh',
			'image_frame_sh',
			'social_media_sh'
		);

		$this->widgets = array(
			'Weather_Widget',
			'Review_Widget',
			'Waves_Recent_Posts'
		);

		$this->post_types = array(
			'menu_pt',
			'review_pt'
		);
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

		define( 'FRAMEWORK_DIR', get_template_directory() . '/framework/' );
		$this->get_included_files();
		$this->register_types();
		$this->register_metaboxes();
		$this->liftoff();

//		add_action( 'after_setup_theme', array( $this, 'liftoff' ) );

	}

	public function get_included_files() {
		require FRAMEWORK_DIR . '/inc/utilities.php';
		require FRAMEWORK_DIR . '/inc/class-framework-loader.php';
		require FRAMEWORK_DIR . '/inc/class-liftoff.php';
		require FRAMEWORK_DIR . '/inc/class-hook-manager.php';
		require FRAMEWORK_DIR . '/inc/class-public-script-handler.php';
		require FRAMEWORK_DIR . '/inc/class-metabox-handler.php';
		require FRAMEWORK_DIR . '/inc/class-gravity-form-handler.php';
		require FRAMEWORK_DIR . '/admin/class-framework-admin-menu.php';
		require FRAMEWORK_DIR . '/inc/class-woocommerce-handler.php';

		if ( file_exists( dirname( WATERFRONT_DIR ) . '/waterfront/vendor/CMB2/init.php' ) )  {
			require dirname( WATERFRONT_DIR ) . '/waterfront/vendor/CMB2/init.php';
		}

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
		$liftoff->run();
	}

	public function register_types() {
		$hook_manager = new Hook_Manager();

		$hook_manager->register_posts( $this->post_types );

		$hook_manager->register_shortcodes( $this->shortcodes );

		$hook_manager->register_widgets( $this->widgets );

	}

	public function register_metaboxes() {
		$metabox_handler = new Metabox_Handler();

		$metabox_handler->register_metabox_group(
			array(
				'menu_mb',
				'location_mb',
				'acts_mb',
				'banner_mb',
				'page_mb',
				'review_mb'
			)
		);
	}

}