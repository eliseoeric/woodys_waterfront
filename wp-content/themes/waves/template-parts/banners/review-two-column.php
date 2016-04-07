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
					<?php 
						//get the review details 
						$post_id = get_the_ID();

						$review_details = array(
							'fullName' => get_post_meta( $post_id, '_WW_review_fullName', true ),
							'date' => get_post_meta( $post_id, '_WW_review_date', true ),
							'rating' => get_post_meta( $post_id, '_WW_review_rating', true ),
							'link' => get_post_meta( $post_id, '_WW_review_link', true ),
							'source' => get_post_meta( $post_id, '_WW_review_source', true ),
						);
					?>
					<div class="review__card pd-l-20 pd-r-20 ">
						<div class="review review__block bg-neutral">
							<header class="review__header">
								<div class="stars <?= $review_details['rating']; ?>"></div>
								<h5><?php the_title(); ?></h5>
							</header>
							<div class="review__body">
								<?php the_content(); ?>
							</div>
							<footer class="review__footer">
								<strong><a href="<?= $review_details['link']; ?>">View on <?= $review_details['source']; ?> <i class="fa fa-long-arrow-right"></i></a></strong>
							</footer>
						</div>
						<div class="review__block--after">
							<h6><?= $review_details['fullName']; ?></h6>
							<p class="review__block--date">
								<i class="fa fa-clock-o"></i> <?= date('j M Y', intval($review_details['date'])); ?>
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