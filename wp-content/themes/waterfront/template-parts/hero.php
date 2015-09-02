<?php 
/**
 * The template part for displaying the website hero image and weather
 *
 * 
 *
 * @package waterfront
 */

?>
<?php
	$hero = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
?>
<section id="hero" class="front-hero upslash-bg" style="background-image: url('<?php echo $hero[0]; ?>')">
	<div class="row ">
		<div class="nine columns front-hero__content">
			<h1>So close to the water your burger gonna get wet bro!</h1>
			<p>So come on down and eat our food</p>
			<div class="medium default btn"><a href="#">Call to Action</a></div>
		</div>
		<div class="three columns front-hero__weather">
			<div class="hero-weather">
				<div class="hero-weather__current">
					<span class="currently">Currently</span>
					<span class="degrees">88<span class="symbol">°</span></span>
					<div class="icon_weather sun-shower">
						<div class="cloud"></div>
						<div class="sun">
							<div class="rays"></div>
						</div>
						<div class="rain"></div>
					</div>
				</div>
				<div id="marineforecast" class="marineforecast row">
					<div class="weather-stat four columns" id="sunset">
						<div class="stat-label">Sunset</div>
						<div class="stat-value">8:39<span class="symbol">PM</span></div>
					</div>
					<div class="weather-stat four columns" id="wind-speed">
						<div class="stat-label">Wind</div>
						<div class="stat-value">6-12<span class="symbol">kn</span></div>
					</div>
					<div class="weather-stat four columns" id="seas">
						<div class="stat-label">Seas</div>
						<div class="stat-value">2<span class="symbol">ft</span></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
