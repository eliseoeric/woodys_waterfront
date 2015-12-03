<?php 

class Metabox_Handler {

	public function __construct() {
//		add_filter( 'cmb2_show_on', array( $this, 'be_metabox_show_on_template' ), 10, 2 );
		add_filter( 'cmb2_show_on', array( $this, 'be_metabox_show_on_slug' ), 10, 2 );
	}

	public function register_metabox_group( $groups ) {
		foreach( $groups as $meta_box )
		{
			include_once( FRAMEWORK_DIR . '/metaboxes/' . $meta_box . '.php' );
			add_filter( 'cmb2_init', $meta_box );
		}
	}

	public function be_metabox_show_on_template( $display, $meta_box ) {
       if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
            return $display;
        }

        if ( 'template' !== $meta_box['show_on']['key'] ) {
            return $display;
        }

        $post_id = 0;

        // If we're showing it based on ID, get the current ID
        if ( isset( $_GET['post'] ) ) {
            $post_id = $_GET['post'];
        } elseif ( isset( $_POST['post_ID'] ) ) {
            $post_id = $_POST['post_ID'];
        }

        if ( ! $post_id ) {
            return false;
        }

        $template_name = get_page_template_slug( $post_id );
        $template_name = ! empty( $template_name ) ? substr( $template_name, 0, -4 ) : '';

        // See if there's a match
        return in_array( $template_name, (array) $meta_box['show_on']['value'] );		
	}

	function be_metabox_show_on_slug( $display, $meta_box ) {

        if ( ! isset( $meta_box['show_on']['key'], $meta_box['show_on']['value'] ) ) {
            return $display;
        }

        if ( 'slug' !== $meta_box['show_on']['key'] ) {
            return $display;
        }

        $post_id = 0;

        // If we're showing it based on ID, get the current ID
        if ( isset( $_GET['post'] ) ) {
            $post_id = $_GET['post'];
        } elseif ( isset( $_POST['post_ID'] ) ) {
            $post_id = $_POST['post_ID'];
        }

        if ( ! $post_id ) {
            return $display;
        }

        $slug = get_post( $post_id )->post_name;

        // See if there's a match
        return in_array( $slug, (array) $meta_box['show_on']['value']);
    }
}