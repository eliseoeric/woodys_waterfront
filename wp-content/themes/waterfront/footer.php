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
		<svg id="waveUpDark" class="wave" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
			<path d="M0 100 C 50 0 50 0 100 100 Z"/>
		</svg>
	<footer id="colophon" class="site-footer " role="contentinfo">
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
