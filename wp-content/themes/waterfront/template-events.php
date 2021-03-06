<?php
/*
|--------------------------------------------------------------------------
| template-events.php
|--------------------------------------------------------------------------
| Template Name: Events 
| Front page template for the site. Will override all other templates
|
*/
get_header(); ?>

<div id="events" class="content-area">

	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/events/content' ); ?>
			
			<?php $banner_type = get_post_meta( get_the_ID(), '_WW_banner_type', true ); ?>
			<?php get_template_part( 'template-parts/banners/' . $banner_type ); ?>
		<?php endwhile; // End of the loop. ?>
		
	</main>
</div>

<?php get_footer(); ?>