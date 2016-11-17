<?php 
/*
|--------------------------------------------------------------------------
| content.php
|--------------------------------------------------------------------
|
| Content to be displayed before the menu
|
*/
$page_header_class = get_post_meta( get_the_ID(), '_WW_header_class', true );
?>
<section class="page-header wrapper hero-image waves-section <?= $page_header_class; ?>" data-bottom="0 1 0.5 1 0.6 0 1 1" data-background="image <?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id )); ?>">
	<div class="container">
		<header class="entry-header mg-t-50">
			<?php the_title( '<h1 class="cl-white entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
</section>

<?php $content_class = get_post_meta( get_the_ID(), '_WW_content_class' ); ?>
<section <?php post_class('wrapper ' . $content) ?>>
	<div class="container entry-content">
		<?php the_content(); ?>
	</div>
</section>