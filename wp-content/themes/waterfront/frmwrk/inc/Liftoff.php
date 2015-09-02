<?php


class Liftoff {

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
	}

	public function hooks() {
		add_action( 'widgets_init', array( $this, 'register_widgets_init' ) );

		add_action( 'init', array($this, 'remove_wp_emoji' ) );
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
		register_sidebar( array(
			'name'          => esc_html__( 'Sidebar', 'waterfront' ),
			'id'            => 'sidebar-1',
			'description'   => '',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		) );
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