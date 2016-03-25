<?php 
/*
|--------------------------------------------------------------------------
| review-two-column.php
|--------------------------------------------------------------------------
|
| 
|
*/
?>
<?php $reviews = new WP_Query( array( 'post_type' => 'review') ); ?>
<?php 
	wp_enqueue_style( 'slick_css' );
	wp_enqueue_style( 'slick-theme_css' );
 ?>
<section class="wrapper waves-section tripadvisor" data-bottom="0 0 0.33 0.8 0.66 0.5 1 0" data-background="solid #fff">
	<div class="container">
		<div class="twelve columns ">
			<div class="row tripadvisor_reviews">
				<?php if( $reviews->have_posts() ) : while( $reviews->have_posts() ) : $reviews->the_post(); ?>
					<div class="review__card pd-l-20 pd-r-20 bg-neutral">
						<div class="review review__block">
							<header class="review__header">
								<div class="stars"></div>
								<h4><?php the_title(); ?></h4>
							</header>
							<div class="review__body">
								<?php the_content(); ?>
							</div>
							<footer class="review__footer">
								<strong><a href="#">View on TripAdvisor <i class="fa fa-long-arrow-right"></i></a></strong>
							</footer>
						</div>
						<div class="review__block--after">
							<h5>First Name</h5>
							<p class="review__block--date">
								<i class="fa fa-clock-o"></i> 2015-10-03
							</p>
						</div>
					</div>
				<?php endwhile; endif; ?>
				<?php wp_reset_postdata(); ?>
			</div>
		</div>
		<div class="twelve columns text-center">
			<a href="#" class="button">Leave a Review</a>
		</div>
	</div>	
</section>