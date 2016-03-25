(function( $ ) {
	window.waveObjects = [];
	$('.waves-section').each(function( idx, el ) {
		return window.waveObjects.push(new WaveElement(el) );
	});


	$(document).ready( function(){
		$('.tripadvisor_reviews').slick({
			slidesToScroll: 1,
			autoplay: true,
			autoplaySpeed: 8000,
			slidesToShow:2,
			speed: 330,
			infinite: true 
		});
	});
})( jQuery);