<?php

//Adding a dump and die for debugging
if( ! function_exists( 'dd' ) ) {
	function dd( $var ) {
		echo "<pre>";
		var_dump( $var );
		echo "</pre>";
	}
}

function show_review_rating( $review ) {
	$html = "<ul class='review__card--stars'>";

	switch ( $review ) {
		case 'one':
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			break;

		case 'two':
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			break;

		case 'three':
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			break;

		case 'four':
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star-o' aria-hidden='true'></i></li>";
			break;

		case 'five':
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			$html .= "<li><i class='fa fa-star' aria-hidden='true'></i></li>";
			break;
		
		default:
			# code...
			break;
	}

	$html .= "</ul>";

	return $html;
}