<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package waves
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer " role="contentinfo">
		<div class="container">
			<div class="footer-column alpha">
				<?php 
					if( is_active_sidebar( 'footer_clm_1' ) )
					{
						dynamic_sidebar( 'footer_clm_1' );
					}
				?>
			</div>
			<div class="footer-column wide">
				<?php 
					if( is_active_sidebar( 'footer_clm_2' ) )
					{
						dynamic_sidebar( 'footer_clm_2' );
					}
				?>
			</div>
			<div class="footer-column">
				<?php 
					if( is_active_sidebar( 'footer_clm_3' ) )
					{
						dynamic_sidebar( 'footer_clm_3' );
					}
				?>
			</div>
		 </div>
		 <div class="container">
			<div class="site-info">

			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
