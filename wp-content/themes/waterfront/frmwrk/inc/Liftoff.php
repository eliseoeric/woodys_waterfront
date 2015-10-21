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

		add_filter( 'gform_pre_render', array( $this, 'ww_add_input_class' ) );

		add_filter( 'gform_submit_button', array( $this, 'ww_submit_button' ), 10, 2 );

		add_filter( 'gform_next_button', array( $this, 'ww_next_button' ), 10, 2 );
		
		add_filter( 'gform_previous_button', array( $this, 'ww_previous_button' ), 10, 2 );

		add_filter( 'gform_field_choice_markup_pre_render', array( $this, 'ww_choice_markup' ), 10, 4 );
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

	public function ww_add_input_class( $form ) {
		foreach( $form['fields'] as &$field ) {
			$class = 'input ';
			$field['size'] .= ' ' . $class;
		}

		return $form;
	}

	public function ww_submit_button( $button, $form ) {
		$button = "<div class='medium primary btn'>" . $button . '</div>';

		return $button;
	}

	public function ww_next_button( $button, $form ) {
		$button = "<div class='medium default btn'>" . $button . '</div>';

		return $button;
	}

	public function ww_previous_button( $button, $form ) {
		$button = "<div class='medium default btn'>" . $button . '</div>';

		return $button;
	}

	public function ww_choice_markup( $choice_markup, $choice, $field, $value ) {
		
	}

	public function register_widgets_init() {
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