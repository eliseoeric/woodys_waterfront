<?php 


class Post_Type_Manager {

	public function __construct() {
		// flush rewrite rules for custom post type
		add_action( 'after_switch_theme', function() {
			flush_rewrite_rules();
		});
	}

	public function register_posts( $post_types ) {
		foreach( $post_types as $type ) 
		{
			include_once( BEAN_FRAMEWORK_DIR . '/post_types/' . $type .'.php' );
		}
	}
}