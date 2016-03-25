<?php

$page_header_class = get_post_meta( get_the_ID(), '_WW_header_class', true );
?>
<section class="page-header wrapper hero-image waves-section <?= $page_header_class; ?>" data-bottom="0 1 0.5 1 0.6 0 1 1" data-background="image <?php echo wp_get_attachment_url( get_post_thumbnail_id( $post_id )); ?>">
	<div class="container">
		<div class="two columns offset-by-one">
			<img src="<?php echo get_template_directory_uri() . '/img/wire_iphone.png'; ?>" alt="Woody's Waterfront Review">
		</div>
		<header class="entry-header seven columns">
			<?php the_title( '<h3 class="cl-white entry-title">', '</h3>' ); ?>
			<?php the_content(); ?>
		</header><!-- .entry-header -->
	</div>
</section>

<?php $content_class = get_post_meta( get_the_ID(), '_WW_content_class', true );?>
<section <?php post_class($content_class . ' waves-section review-form') ?> data-bottom="0 0 0.33 0.8 0.66 0.5 1 0" data-background="solid #fff"> 
	<div class="container entry-content">
		<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), '_WW_extra_content', true ) ); ?>
	</div>
</section>
