<?php 
/*
|--------------------------------------------------------------------------
| content.php
|--------------------------------------------------------------------
|
| Content to be displayed before the menu
|
*/
?>
<section id="" <?php post_class('wrapper'); ?>>
	<div class="row wrapper full_width double food-menu__main_content hero-image" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id )); ?>');">
		<canvas id="water-drops" width="1900" height="913" style="position:absolute;top:0;left:0;width:100%;"></canvas>
		<div class="five columns push_one entry-content">
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

</section>