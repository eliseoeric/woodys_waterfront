<?php
/**
 * The template used for displaying front page content in front-page.php
 *
 * @package waterfront
 */

?>

<section id="" <?php post_class(); ?>>
	<div class="entry-content row">
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php the_content(); ?>
		<?php
		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'waterfront' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->
</section><!-- #post-## -->

