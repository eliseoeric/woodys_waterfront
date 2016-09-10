<?php 

function get_social_media( $atts, $content = null )
{
	$a = shortcode_atts(
		array(
			'bg_color' => '',
			'class' => ''
		), $atts
	);

	ob_start();
	?>
	<ul class="social-list">
		<li class="social-list__icon social-list__icon--facebook">
			<a href="https://www.facebook.com/woodyswaterfront/" target="_blank">
				<i class="fa fa-facebook" aria-hidden="true"></i>
			</a>
		</li>
		<li class="social-list__icon social-list__icon--twitter">
			<a href="https://twitter.com/woodyswaterfrnt" target="_blank">
				<i class="fa fa-twitter" aria-hidden="true"></i>
			</a>
		</li>
		<li class="social-list__icon social-list__icon--google-plus">
			<a href="https://plus.google.com/+WoodysWaterfrontStPetersburg" target="_blank">
				<i class="fa fa-google-plus" aria-hidden="true"></i>
			</a>
		</li>
		<li class="social-list__icon social-list__icon--youtube">
			<a href="https://www.youtube.com/channel/UCm7VqBBpUI6ihRw3WXDMK9Q" target="_blank">
				<i class="fa fa-youtube" aria-hidden="true"></i>
			</a>
		</li>
		<li class="social-list__icon social-list__icon--instagram">
			<a href="https://www.instagram.com/woodyswaterfront/" target="_blank">
				<i class="fa fa-instagram" aria-hidden="true"></i>
			</a>
		</li>
	</ul>

	<?php
	$html = ob_get_clean();

	return $html;
}

add_shortcode( 'social_media', 'get_social_media' );