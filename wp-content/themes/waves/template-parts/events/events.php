<?php 

?>

<section class="wrapper waves-section event-list" data-top="0 0.5 0.33 1.0 0.66 0 1 0.5" data-bottom="0 0.9 0.33 1.0 0.66 0 1 0.1" data-background="solid #fbf7ec">
	<div class="container">
		<div class="row text-center mg-b-25">
			<h4>Woody's Waterfront Events</h4>
			<h3>Don't Miss Out!</h3>
		</div>
		<div class="row">
		<?php $entertainers = get_post_meta( get_the_ID(), '_WW_entertainers', true ); ?>
		<?php foreach( $entertainers as $entertainer ) : ?>
			<div class="four columns entertainer-card">
				<div class="entertainer-details">
					<h6><a href="<?php echo $entertainer['entertainer_url']; ?>" target="_blank" class="cl-dark-blue"><?= $entertainer['entertainer_name']; ?></a></h6>
					<span class="cl-dark-blue block"><small><i class="fa fa-clock-o mg-r-10"></i><?= $entertainer['entertainer_schedule']; ?></small></span>
					<span class="cl-dark-blue block"><small><i class="fa fa-map-marker mg-r-15"></i>Woody's Waterfront</small></span>
				</div>
				<div class="jazz-img entertianer-img">
					<?php waterfront_image_overlay( $entertainer['entertainer_attachment'], "So close to the water your burger gets wet", "Woody's Waterfront Entrance" );  ?>
				</div>
				<div class="entertainer-content">
					<p><?php echo substr( $entertainer['entertainer_description'], 0, 150); ?> ...</p>
				</div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
</section>