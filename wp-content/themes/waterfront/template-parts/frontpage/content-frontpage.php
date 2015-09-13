<?php
/**
 * The template used for displaying front page content in front-page.php
 *
 * @package waterfront
 */

?>

<section id="" <?php post_class(); ?>>
	<div class="row full_width wrapper double frontpage__main_content">
		<div class="four columns entry-content">
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
	</div><!-- .entry-content -->
	<div class="wrapper bg-blue">
		<div class="row">
			<div class="three columns jazz-img">
				<figure class="effect-jazz">
					<img src="<?php echo get_template_directory_uri() . '/img/entrance_1.jpg'; ?>" alt="Woody's Waterfront Entrance">
					<figcaption>
						<!-- <h2 class="">Woody's <span>Waterfront</span></h2> -->
						<p>So close to the water your burger gets wet</p>
						<a href="#">View more</a>
					</figcaption>			
				</figure>
			</div>
			<div class="nine columns">
				<h2 class="cl-white mg-t-30">1/2 Priced Happy Hour Daily!</h2>
				<h3 class="cl-white">Monday - Friday 2pm 6pm Entertainment Nightly </h3>
			</div>
		</div>	
	</div>
</section><!-- #post-## -->
