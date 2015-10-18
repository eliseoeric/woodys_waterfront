<?php
/*
|--------------------------------------------------------------------------
| template-reviews.php
|--------------------------------------------------------------------------
| Template Name: Reviews 
| Front page template for the site. Will override all other templates
|
*/
get_header(); ?>

<div id="reviews" class="content-area">

	<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'template-parts/reviews/content' ); ?>
		<?php endwhile; // End of the loop. ?>

	</main>
</div>

<?php get_footer(); ?>