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
	$options = get_option('framework_options');
	$video_url = $options['_waterfront_video_url'];
?>
<section id="hero" class="front-hero upslash-bg waves-section" data-bottom="0 0.5 0.33 0 0.66 1 1 0.5" data-background="video http://woodys.wpengine.com/static/video_2">
	<div class="container front-hero__container">
		<div class="row hero_row ">
			<div class="front-hero__content text-center">
				<img class="front-hero__logo desktop-only" src="<?php echo $options['_waterfront_logo']; ?>">
				<h2 class="mg-b-25">So close to the water your burgers going to get wet!</h2>
				<div class=" secondary button"><a href="#">View Menu</a></div>
				<div class=" primary button mobile-only"><a href="#">Call Now</a></div>
				<div class=" primary button desktop-only"><a href="#">Gift Cards</a></div>
			</div>
			<div class="front-hero__weather weather-widget bg-dark-blue-transparent cl-white desktop-only">
				<?php 
					if( is_active_sidebar( 'frontpage-1' ) )
					{
						dynamic_sidebar( 'frontpage-1' );
					}
				?>
			</div>
		</div>
	</div>
</section>