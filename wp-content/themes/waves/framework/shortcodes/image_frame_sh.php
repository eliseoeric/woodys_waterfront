<?php

function get_image_frame( $atts, $content = null ) {
	$a = shortcode_atts(
		array(
			'img' => '',
			'caption' => '',
			'url' => '',
			'alt' => '',
			'class' => '',
		), $atts
	);

	ob_start();
	?>
		<div class="jazz-img">
			<?php waterfront_image_overlay( $a['img'],  $a['caption'], $a['alt'], $a['url'], $a['class'] ); ?>
		</div>
	<?php
	$html = ob_get_clean();

	return $html;
	
}

add_shortcode( 'image_frame', 'get_image_frame' );