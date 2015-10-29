<?php
/*
|--------------------------------------------------------------------------
| template-location.php
|--------------------------------------------------------------------------
| Template Name: Location 
| Template for the location page
|
*/
get_header(); ?>

<div id="location" class="content-area">

	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/location/content' ); ?>
		<?php endwhile; // End of the loop. ?>
		<?php $banner_type = get_post_meta( get_the_ID(), '_WW_banner_type', true ); ?>
		<?php get_template_part( 'template-parts/banners/' . $banner_type ); ?>
	</main>
</div>

<?php get_footer(); ?>