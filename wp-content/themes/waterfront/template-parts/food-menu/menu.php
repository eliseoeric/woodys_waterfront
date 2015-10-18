<?php 
/*
|--------------------------------------------------------------------------
| menu.php
|--------------------------------------------------------------------
|
| Loops through menu items and displays tabbed food menu
|
*/
?>

<section id="menu-tabs" class="wrapper wave-border">
	<?php //get the menus ?>
	<?php $menus = new WP_Query( array( 'post_type' => 'menu_block') ); ?>

	<!-- Start Menu Navigation -->
	<div class="row">
		<div class="ten columns centered">
			<section class="tabs wm">
				<ul class="tab-nav wm__nav">
					<?php if( $menus->have_posts() ) : while( $menus->have_posts() ) : $menus->the_post(); ?>
						<li class=" <?php echo ( 0 == $menus->current_post ? 'active' : '' ); ?>"><a href="#"><?php echo get_the_title(); ?></a></li>
					<?php endwhile; endif; ?>
				</ul>

				<?php if( $menus->have_posts() ) : while( $menus->have_posts() ) : $menus->the_post(); ?>
					<div class="tab-content wm__content <?php echo ( 0 == $menus->current_post ? 'active' : '' ); ?>">
					<div class="wm__content--description"><?php the_content(); ?></div>
					<?php $menu_items = get_post_meta( get_the_ID(), '_WW_menu_items', true); ?>
						<ul class="wm__items">
							<?php foreach ($menu_items as $item): ?>
								<li class="wm__item">
									<h4 class="wm__item--name"><?php echo $item['item_name']; ?></h4>
									<span class="wm__item--price"><?php echo $item['item_price']; ?></span>
									<p class="wm__item--description"><?php echo $item['item_description']; ?></p>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endwhile; endif; ?>
			</section>
		</div>
	</div>
	<!-- End Menu Tabs -->
	<?php wp_reset_postdata(); ?>
</section>

<!-- TODO: Abstract out these promo sections, and use a metabox to add them to pages. -->


