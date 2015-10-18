<?php 


class Widget_Manager {

	public function register_widgets( $widgets ) {
		foreach( $widgets as $widget ) 
		{
			include_once( BEAN_FRAMEWORK_DIR . '/widgets/' . $widget .'.php' );

			// dd($widget);
			add_action('widgets_init', function() use ($widget) {
				register_widget( $widget );
			});
		}
	}
}