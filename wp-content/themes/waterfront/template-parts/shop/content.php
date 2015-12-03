<?php 
/*
|--------------------------------------------------------------------------
| content.php
|--------------------------------------------------------------------
|
| Hero content of the woocomerce shop page
|
*/
?>

<?php $shop_page = get_post( wc_get_page_id( 'shop' ) ); ?>

<section id="" <?php post_class('wrapper'); ?>>
	<div class="row wrapper full_width double food-menu__main_content hero-image" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( $shop_page->ID )); ?>');">
		<div class="seven columns">
			
		</div>
		<div class="four columns entry-content">
			<header class="entry-header">
				<h3 class="cl-white entry-title"><?php echo get_the_title( $shop_page->ID ); ?></h3>
			</header><!-- .entry-header -->
			
			<?php echo wc_format_content( $shop_page->post_content ); ?>
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
		<div class="ten columns centered text-center">
			<h3>Woody's Waterfront Online Gear</h3>
			<p>Here you can purchase watever it is we decide to sell online -- it's great!</p>
		</div>
	</div>
</section>
