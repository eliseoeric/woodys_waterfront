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
		<header class="entry-header ">
			<?php the_title( '<h1 class="cl-white entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
	</div>
</section>

<?php $content_class = get_post_meta( get_the_ID(), '_WW_content_class', true );?>
<section <?php post_class($content_class . ' wrapper') ?>>
<?php get_template_part( 'template-parts/food-menu/menu' ); ?>
</section>

<section class="wrapper waves-section menu-tabs" data-top="0 .5 .5 0 .75 0 1 .2" data-bottom="0 .2 .5 0 .5 .6 1 .6" data-background="image <?php echo get_stylesheet_directory_uri() . '/img/entrace_1_bg.png'; ?>">
	<div class="container entry-content">
		<?php the_content(); ?>
	</div>
</section>