<?php 
/*
|--------------------------------------------------------------------------
| content.php
|--------------------------------------------------------------------
|
| Content to be displayed before the reviews
|
*/
?>
<section id="" <?php post_class(); ?>>
	<div class="row wrapper full_width double reviews__main_content" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id )); ?>');">
		<div class="six columns entry-content">
			<div class="three columns push_one">
				<img src="/woodys_waterfront/wp-content/themes/waterfront/img/wire_iphone.png">
			</div>
			<div class="seven columns mg-l-50">
				<header class="entry-header mg-t-75">
					<?php the_title( '<h3 class="cl-white entry-title">', '</h3>' ); ?>
				</header><!-- .entry-header -->
				<?php the_content(); ?>
			</div>
		</div>
		<div class="six columns">
			

		</div>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'waterfront' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</section>

<section class="wrapper wave-border">
	<div class="row">
		<div class="push_two eight columns">
			<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), '_WW_extra_content', true ) ); ?>
		</div>
	</div>
</section>