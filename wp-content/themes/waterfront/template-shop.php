<?php
/*
|--------------------------------------------------------------------------
| template-shop.php
|--------------------------------------------------------------------------
| Template Name: Shop Page 
| Shop template for woocommerce that allows content from the main page
|
*/

get_header(); ?>

	<div id="primary" class="content-area">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php do_action( 'woocommerce_before_main_content' ); ?>
				
				<?php get_template_part( 'template-parts/content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

				<?php do_action( 'woocommerce_after_main_content' ); ?>

			<?php endwhile; // End of the loop. ?>

			<?php
				/**
				 * woocommerce_sidebar hook
				 *
				 * @hooked woocommerce_get_sidebar - 10
				 */
				do_action( 'woocommerce_sidebar' );
			?>
	</div><!-- #primary -->
<?php get_footer(); ?>
