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
<section id="" <?php post_class(); ?>>
	<div class="row wrapper full_width double location__main_content" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id )); ?>');">
		<div class="seven columns">
			

		</div>
		<div class="four columns entry-content">
			<header class="entry-header">
				<?php the_title( '<h3 class="cl-white entry-title">', '</h3>' ); ?>
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

<section class="wrapper wave-border">
	<div class="row">
		<div class="eight columns">
			<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), '_WW_extra_content', true ) ); ?>
		</div>
		<div class="four columns">
			<?php get_template_part( 'sidebar' ); ?>
		</div>
	</div>
</section>

<?php get_template_part( 'template-parts/banners/promo-hh', 'green'); ?>