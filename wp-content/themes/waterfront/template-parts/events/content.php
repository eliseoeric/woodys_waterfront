<?php 
/*
|--------------------------------------------------------------------------
| content.php
|--------------------------------------------------------------------
|
| Content to be displayed before the events
|
*/
?>
<section id="" <?php post_class(); ?>>
	<div class="row wrapper full_width double events__main_content" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id )); ?>');">
		<div class="four push_one columns entry-content">
			<header class="entry-header">
				<?php the_title( '<h3 class="cl-white entry-title">', '</h3>' ); ?>
			</header><!-- .entry-header -->
			<?php the_content(); ?>
		</div>
			
		<div class="seven columns">
			

		</div>
		
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'waterfront' ),
			'after'  => '</div>',
		) );
		?>
</div><!-- .entry-content -->

<section class="wrapper wave-border">
	<?php $entertainers = get_post_meta( get_the_ID(), '_WW_entertainers', true ); ?>
	<?php $count = 0; ?>
	<?php foreach( $entertainers as $entertainer ) : ?>
	<div class="row wrapper">
		<?php if( $count % 2 == 0 ): ?>
			<div class="four columns jazz-img entertainer-img">
				<?php waterfront_image_overlay( $entertainer['entertainer_attachment'], "So close to the water your burger gets wet", "Woody's Waterfront Entrance" );  ?>
			</div>
		<?php endif; ?>
		<div class="eight columns entertainer-details <?php echo ($count % 2 == 0 ? '' : 'text-right'); ?>">
			<h3><a href="<?php echo $entertainer['entertainer_url']; ?>" target="_blank"><?php echo $entertainer['entertainer_name']; ?></a></h3>
			<span><?php echo $entertainer['entertainer_schedule']; ?></span>
			<p><?php echo $entertainer['entertainer_description']; ?></p>
		</div>
		<?php if( $count % 2 != 0 ): ?>
			<div class="four columns jazz-img entertainer-img">
				<?php waterfront_image_overlay( $entertainer['entertainer_attachment'], "So close to the water your burger gets wet", "Woody's Waterfront Entrance" );  ?>
			</div>
		<?php endif; ?>
	</div>
	<?php $count++; ?>
	<?php endforeach; ?>
</section>

<?php get_template_part( 'template-parts/banners/promo-hh', 'blue'); ?>