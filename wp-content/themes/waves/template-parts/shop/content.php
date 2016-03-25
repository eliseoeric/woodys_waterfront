<?php 
/*
|--------------------------------------------------------------------------
| content.php
|--------------------------------------------------------------------
|
| Hero content of the woocomerce shop page
|
*/
$shop_page = get_post( wc_get_page_id( 'shop' ) );
$page_header_class = get_post_meta( $shop_page->ID, '_WW_header_class', true );
?>

<?php  ?>

<section class="page-header wrapper hero-image waves-section <?= $page_header_class; ?>" data-bottom="0 1 0.5 1 0.6 0 1 1" data-background="image <?php echo wp_get_attachment_url( get_post_thumbnail_id( $shop_page->ID )); ?>">
	<div class="container">
		<header class="entry-header">
			<h3 class="entry-title"><?php echo get_the_title( $shop_page->ID ); ?></h3>
		</header><!-- .entry-header -->
	</div>
</section>

<?php $content_class = get_post_meta( $shop_page->ID, '_WW_content_class', true );?>
<section <?php post_class($content_class . ' wrapper') ?>>
	<div class="container entry-content">
		<?php echo wc_format_content( $shop_page->post_content ); ?>
	</div>
</section>