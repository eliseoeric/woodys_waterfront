<?php


class Liftoff {

	protected $loader;

	public function __construct()
	{
	    $this->loader = new Framework_Loader();
		$this->init();
	}

	public function init() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on waterfront, use a find and replace
		 * to change 'waterfront' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'waterfront', get_template_directory() . '/languages' );

		$this->manage_theme_supports();

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', 'waterfront' ),
		) );

		$this->set_content_width();

		$this->hooks();
		$this->admin_hooks();
		$this->woocommerce_hooks();
		$this->gravity_forms_hooks();
	}

	public function hooks() {
		$this->loader->add_action( 'widgets_init', $this, 'register_widgets_init' );
//		add_action( 'widgets_init', array( $this, 'register_widgets_init' ) );

		$this->loader->add_action( 'init', $this, 'remove_wp_emoji' );
//		add_action( 'init', array($this, 'remove_wp_emoji' ) );

		$script_handler = new Public_Script_Handler( '0.7' );

		$this->loader->add_action( 'wp_enqueue_scripts', $script_handler, 'register_scripts_and_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $script_handler, 'enqueue_styles' );
		$this->loader->add_action( 'wp_enqueue_scripts', $script_handler, 'enqueue_scripts' );
	}

	public function admin_hooks(){
		$admin_menu = new Framework_Admin_Menu();

		$this->loader->add_action( 'admin_init', $admin_menu, 'init' );
		$this->loader->add_action( 'admin_menu', $admin_menu, 'add_options_page' );
		$this->loader->add_action( 'cmb2_admin_init', $admin_menu, 'add_options_page_metabox' );
	}

	public function woocommerce_hooks() {
		// TODO -- is_plugin_active is being called before 'wp-admin/includes/plugin.php' is loaded, typically should be called after admin_init hook
//		if( !is_plugin_active( '/woocommerce/woocommerce.php' ) ) {
//			return;
//		}
		$woocommerce_handler = new Woocommerce_Handler();
		$woocommerce_handler->remove_hooks();

		$this->loader->add_action('after_setup_theme', $woocommerce_handler, 'hooks' );
	}

	public function gravity_forms_hooks() {
//		if( !is_plugin_active( '/gravityforms/gravityforms.php' ) ) {
//			return;
//		}
		$gravity_form_handler = new Gravity_Form_Handler();
		$this->loader->add_action( 'after_setup_theme', $gravity_form_handler, 'hooks' );
	}

	public function run() {
		$this->loader->run();
	}

	public function manage_theme_supports() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'recent-post', 300, 213, true );
		add_image_size( 'jazz-figure', 445, 250, true );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
			) );

			/*
			 * Enable support for Post Formats.
			 * See http://codex.wordpress.org/Post_Formats
			 */
			add_theme_support( 'post-formats', array(
				'aside',
				'image',
				'video',
				'quote',
				'link',
			) );

			// Set up the WordPress core custom background feature.
			add_theme_support( 'custom-background', apply_filters( 'waterfront_custom_background_args', array(
				'default-color' => 'ffffff',
				'default-image' => '',
			) ) );
	}

	public function set_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'waterfront_content_width', 1000 );
	}


	public function register_widgets_init() {
		unregister_widget('WP_Widget_Recent_Posts');

		$widgets = array(
			array(
				'name'          => 'Footer Column 1',
                'id'            => 'footer_clm_1',
                'before_widget' => '<div class="footer-widget"><div class="footer-widget__content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="">',
                'after_title'   => '</h5>',
			),
			array(
                'name'          => 'Footer Column 2',
                'id'            => 'footer_clm_2',
                'before_widget' => '<div class="footer-widget"><div class="footer-widget__content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="">',
                'after_title'   => '</h5>',
            ),
            array(
                'name'          => 'Footer Column 3',
                'id'            => 'footer_clm_3',
                'before_widget' => '<div class="footer-widget"><div class="footer-widget__content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h5 class="">',
                'after_title'   => '</h5>',
            ),
            array(
                'name'          => 'Main Sidebar',
                'id'            => 'sidebar-1',
                'before_widget' => '<div class="sidebar"><div class="sidebar-widget__content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h3 class="">',
                'after_title'   => '</h3>',
            ),
            array(
                'name'          => 'Woocommerce Sidebar',
                'id'            => 'sidebar-woo',
                'before_widget' => '<div class="sidebar"><div class="sidebar-widget__content">',
                'after_widget'  => '</div></div>',
                'before_title'  => '<h3 class="">',
                'after_title'   => '</h3>',
            ),
            array(
                'name'          => 'Frontpage',
                'id'            => 'frontpage-1',
                'before_widget' => '',
                'after_widget'  => '',
                'before_title'  => '<h3 class="">',
                'after_title'   => '</h3>',
            ),
		);

		foreach( $widgets as $widget ) 
		{
			register_sidebar( $widget );
		}
	}

	public function remove_wp_emoji() {
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

		// filter to remove TinyMCE emojis
//		add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
	}
}