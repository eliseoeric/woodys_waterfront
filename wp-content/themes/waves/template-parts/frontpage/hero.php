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
<section id="hero" class="front-hero upslash-bg waves-section" data-bottom="0 0.5 0.33 0 0.66 1 1 0.5" data-background="video http://localhost/woodys_waterfront/wp-content/themes/waves/img/video/video_1">
	<div class="container front-hero__container">
		<div class="row hero_row ">

			<div class="front-hero__content text-center mg-t-50">
				<img src="<?php echo $options['_waterfront_logo']; ?>" style="max-width:350px;">
				<h2 class="mg-b-25">So close to the water your burgers going to get wet!</h2>
				<div class="large secondary button"><a href="#">View Menu</a></div>
				<div class="large primary button"><a href="#">Call Now</a></div>
			</div>
			<div class="front-hero__weather">
				<?php 
					if( is_active_sidebar( 'frontpage-1' ) )
					{
						// dynamic_sidebar( 'frontpage-1' );
					}
				?>
			</div>
		</div>
	</div>

</section>
<section class="wrapper weather__mobile bg-dark-blue">
	<div class="row ">
		<div class="weather__mobile--widget">
			<?php 
				if( is_active_sidebar( 'frontpage-1' ) )
				{
					// dynamic_sidebar( 'frontpage-1' );
				}
			?>
		</div>	
	</div>
</section>