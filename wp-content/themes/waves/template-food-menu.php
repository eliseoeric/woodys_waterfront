<?php
/*
|--------------------------------------------------------------------------
| template-food-menu.php
|--------------------------------------------------------------------------
| Template Name: Menu 
| Front page template for the site. Will override all other templates
|
*/
get_header(); ?>

<div id="food-menu" class="content-area">

	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/partials/wave-content' ); ?>
		<?php endwhile; // End of the loop. ?>

		<?php get_template_part( 'template-parts/food-menu/menu' ); ?>
		<?php $banner_type = get_post_meta( get_the_ID(), '_WW_banner_type', true ); ?>
		<?php get_template_part( 'template-parts/banners/' . $banner_type ); ?>
	</main>
</div>

<?php get_footer(); ?>
