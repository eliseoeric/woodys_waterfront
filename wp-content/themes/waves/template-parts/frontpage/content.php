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
			<div class="five columns featured-image jazz-img">
				<?php waterfront_image_overlay( get_template_directory_uri() . '/img/jared_no_mask.jpg',  "So close to the water your burger gets wet", "Woody's Waterfront Entrance" );?>
			</div>
			<div class="seven columns featured-content">
				<header class="entry-header">
					<?php the_title( '<h3 class="cl-blue entry-title">', '</h3>' ); ?>
				</header><!-- .entry-header -->
				<?php the_content(); ?>
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
<section class="waves-section frontpage-menu"  data-background="solid #fbf7ec">
	<!-- Start Image Showcase -->
	<div class="wrapper">
	
		<div class="container">
			<div class="row">
				<div class="twelve column pd-b-15 pd-t-15">
					<h2 >Casual Waterfront Dining </h2>
				</div>
			</div>
			<div class="row">
				<div class="three columns pd-l-10 pd-r-10 jazz-img">
				<?php waterfront_image_overlay( get_template_directory_uri() . '/img/burgers.jpg', "So close to the water your burger gets wet", "Woody's Waterfront Entrance" );  ?>
					
					<p>I don't like you sucking around bothering our citizens, Lebowski. I—the royal we, man, you know, the editorial. Regrettably, it's true, standards have fallen in adult entertainment.</p>
				</div>

				<div class="three columns pd-l-10 pd-r-10 jazz-img">
				<?php waterfront_image_overlay( get_template_directory_uri() . '/img/wings.jpg', "So close to the water your burger gets wet", "Woody's Waterfront Entrance" );  ?>
					
					<p>You might want to watch out the front window there, Larry. I mean I had an M16, Jacko, not an Abrams fucking tank. Mind if I smoke a jay? I got information—new shit has come to light and—shit, man! She kidnapped herself! That is our most modestly priced receptacle.</p>
				</div>

				<div class="three columns pd-l-10 pd-r-10 jazz-img">
					<?php waterfront_image_overlay( get_template_directory_uri() . '/img/scallops.jpg', "So close to the water your burger gets wet", "Woody's Waterfront Entrance" );  ?>
				
					<p>It's video, Dude. …which would place him high in the runnin' for laziest worldwide—but sometimes there's a man… sometimes there's a man. That wasn't her toe. Vee don't care. Vee still vant zat money or vee fuck you up.</p>
				</div>

				<div class="three columns pd-l-10 pd-r-10 jazz-img">
				<?php waterfront_image_overlay( get_template_directory_uri() . '/img/fish_spread.jpg', "So close to the water your burger gets wet", "Woody's Waterfront Entrance" );  ?>

					<p>Any further harm visited upon Bunny, shall be visited tenfold upon your head. Who's in pyjamas, Walter? All right, Plan B. </p>
				</div>
			</div>	
			<div class="row text-center">
				<a href="#" class="button">View Our Menu</a>
			</div>
		</div>
	</div>
	<!-- End Image Showcase -->
</section><!-- #post-## -->
