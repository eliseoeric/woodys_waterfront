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

<div class="wrapper bg-grey">
	<div class="row">
		<div class="eight columns centered">
			<div class="row">
				<?php if( $reviews->have_posts() ) : while( $reviews->have_posts() ) : $reviews->the_post(); ?>
					<div class="six columns pd-l-20 pd-r-20">
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
	</div>	
</div>