<?php
/**
 * The template used for displaying front page content in front-page.php
 *
 * @package waterfront
 */

?>

<section id="" <?php post_class(); ?> >
	<div class="banner frontpage__main_content wave-border wrapper extra ">
		<div class="container entry-content">
			<div class="seven columns featured-content">
				<header class="entry-header">
					<?php the_title( '<h3 class="cl-blue entry-title">', '</h3>' ); ?>
				</header><!-- .entry-header -->
				<?php the_content(); ?>
			</div>
			<div class="five columns featured-image jazz-img">
				<?php waterfront_image_overlay( get_template_directory_uri() . '/img/jared_no_mask.jpg',  "So close to the water your burger gets wet", "Woody's Waterfront Entrance" );?>
			</div>
			
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'waterfront' ),
				'after'  => '</div>',
			) );
			?>
		</div>
	</div>
</section>


<!-- Start Happy Hour Banner -->
<?php $banner_type = get_post_meta( get_the_ID(), '_WW_banner_type', true ); ?>
<?php get_template_part( 'template-parts/banners/' . $banner_type ); ?>
<!-- End Happy Hour banner -->

<?php get_template_part( 'template-parts/frontpage/specials' ); ?>