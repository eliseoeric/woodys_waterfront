<?php

class Public_Script_Handler {

	private $version;

	public function __construct( $version )
	{
	    $this->version = $version;
	}

	public function register_scripts_and_styles() {
		//css
		wp_register_style( 'waterfront-style', get_template_directory_uri() . '/css/app.css', '', $this->version);
		wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome/font-awesome.css', '', $this->version);
		wp_register_style( 'slick_css', get_template_directory_uri() . '/css/slick/slick.css', '', $this->version );
		wp_register_style( 'slick-theme_css', get_template_directory_uri() . '/css/slick/slick-theme.css', '', $this->version );
		//js
		wp_register_script( 'modernizr', get_template_directory_uri(). '/js/libs/modernizr-2.6.2.min.js', array(), $this->version, false );
		wp_register_script( 'waterfront-gumby', get_template_directory_uri() . '/js/app.min.js', array('jquery'), $this->version, true );
		wp_register_script( 'gumby-init', get_template_directory_uri() . '/js/libs/gumby.init.js', array('jquery'), $this->version, true );
		wp_register_script( 'waterfront-plugin', get_template_directory_uri() . '/js/plugins.js', array('jquery'), $this->version, true );
		wp_register_script( 'waterfront-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), $this->version, true );
		wp_register_script( 'slick_js', get_template_directory_uri() . '/js/slick.min.js', array( 'jquery', 'waterfront-main'), $this->version, true );
	}

	public function enqueue_styles() {
		wp_enqueue_style( 'waterfront-style' );
		wp_enqueue_style( 'font-awesome' );
	}

	public function enqueue_scripts() {
		wp_enqueue_script( 'modernizr' );
		wp_enqueue_script( 'waterfront-gumby' );
		wp_enqueue_script( 'gumby-init' );
		wp_enqueue_script( 'waterfront-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );
		wp_enqueue_script( 'waterfront-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_enqueue_script('waterfront-main');
	}

}