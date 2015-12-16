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
		<video class="videobg" scr="<?php echo get_template_directory_uri() . $video_url; ?>" autoplay loop poster="<?php echo $hero[0]; ?>" style="position:absolute;">
	       <!--  TODO -- add Webm video -->
			<!-- TODO -- fix url path here -->
			<?php
				$options = get_option('framework_options');
				$video_url = $options['_waterfront_video_url'];;
			?>
	        <source src="<?php echo get_template_directory_uri() . $video_url; ?>" type="video/mp4">
	    </video>
	    <canvas id="container" width="1" height="1" style="position:absolute"></canvas>
    </div>
	<div class="row hero_row full_width">

		<div class="front-hero__content text-center mg-t-50">
			<img src="<?php echo $options['_waterfront_logo']; ?>" style="max-width:350px;">
			<h2 class="mg-b-25">So close to the water your burgers going to get wet!</h2>
			<div class="large secondary btn"><a href="#">View Menu</a></div>
			<div class="large primary btn"><a href="#">Call Now</a></div>
		</div>
		<div class="front-hero__weather">
			<?php 
				if( is_active_sidebar( 'frontpage-1' ) )
				{
					dynamic_sidebar( 'frontpage-1' );
				}
			?>
		</div>
</section>
<section class="wrapper weather__mobile bg-dark-blue">
	<div class="row full_width">
		<div class="weather__mobile--widget">
			<?php 
				if( is_active_sidebar( 'frontpage-1' ) )
				{
					dynamic_sidebar( 'frontpage-1' );
				}
			?>
		</div>	
	</div>
</section>