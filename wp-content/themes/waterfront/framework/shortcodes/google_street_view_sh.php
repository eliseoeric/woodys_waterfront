<?php 
function get_google_street_view( $atts, $content = null ) {

	return "<iframe class='border-bottom mg-b-50' width='100%' height='350' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://www.google.com/maps/embed?pb=!1m0!3m2!1sen!2sus!4v1444096016460!6m8!1m7!1sTabqp0zWoREAAAQJOIlICA!2m2!1d27.73966261570912!2d-82.75374530042512!3f300.97!4f0!5f0.7820865974627469'></iframe>";
}
add_shortcode( 'google_street_view', 'get_google_street_view' );
