<section class="wrapper wave-border">
	<div class="container">
		<div class="eight columns">
			<?php echo apply_filters( 'the_content', get_post_meta( get_the_ID(), '_WW_extra_content', true ) ); ?>
		</div>
		<div class="four columns">
			<?php get_template_part( 'sidebar' ); ?>
		</div>
	</div>
</section>
