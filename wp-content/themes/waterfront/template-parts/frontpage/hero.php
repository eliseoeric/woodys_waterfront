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
<section id="hero" class="front-hero upslash-bg" >
	<div class="video_container">	
		<video autoplay loop poster="<?php echo $hero[0]; ?>" id="bgvid">
	       <!--  <source src="/wp-content/themes/redwood/assets/video/ultimate-medical-academy.webm" type="video/webm"> -->
	        <source src="<?php echo get_template_directory_uri() . '/img/video/video_1.mp4'; ?>" type="video/mp4">
	    </video>
    </div>
	<div class="row hero_row full_width">

		<div class="six columns push_three front-hero__content text-center mg-t-50">
			<img src="<?php echo get_template_directory_uri() . '/img/red-with-stroke.png'; ?>" style="max-width:350px;">
			<h2 class="mg-b-25">So close to the water your burgers going to get wet!</h2>
			<div class="large secondary btn mg-r-15"><a href="#">View Menu</a></div>
			<div class="large primary btn"><a href="#">Call Now</a></div>
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