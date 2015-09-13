<?php 

function get_button( $atts, $content = null ) {
	$a = shortcode_atts( 
			array( 
				'size' => 'medium',
				'type' => 'primary',
				'icon' => '',
				'icon_pos' => '',
				'style' => '',
				'class' => ''
			), 
			$atts 
		);

	return "<div class='{$a['class']} {$a['size']} {$a['type']} btn'><a href='{$url}'>" . do_shortcode( $content ) . "</a></div>";
}
add_shortcode( 'button', 'get_button' );