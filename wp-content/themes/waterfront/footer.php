<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package waterfront
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row">
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
		 <div class="row">
			<div class="site-info">

			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
