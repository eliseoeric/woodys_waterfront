
	<?php //get the menus ?>
	<?php $menus = new WP_Query( array( 'post_type' => 'menu_block' ) ); ?>
	<div class="container">
		<ul class="accordion-tabs">
			<?php if( $menus->have_posts() ) : while( $menus->have_posts() ) : $menus->the_post(); ?>
			<li class="tab-header-and-content heading-black">
				<a href="javascript:void(0)" class="tab-link ">
					<?= get_the_title(); ?>
				</a>
				<div class="tab-content heading-handmade">
					<?php $menu_items = get_post_meta( get_the_ID(), '_WW_menu_items', true); ?>
					<div class="wm__content--description "><?php the_content(); ?></div>
					<ul class="wm__items container">
						<?php foreach ($menu_items as $item ): ?>
							<li class="wm__item three columns">
								<?php if( $item['item_image'] ): ?>
								<div class="wm__item--image">
									<img src="<?= $item['item_image']; ?>" class="" title="<?php echo $item['item_name']; ?>" alt="<?php echo $item['item_name']; ?>">
								</div>
								<?php endif; ?>
								<h6 class="wm__item--name"><?php echo $item['item_name']; ?></h6>
								<span class="wm__item--price "><?php echo $item['item_price']; ?></span>
								<p class="wm__item--description"><?php echo $item['item_description']; ?></p>
							</li>
						<?php endforeach; ?>
					</ul>	
				</div>
			</li>
			<?php endwhile; endif; ?>
			<?php wp_reset_postdata(); ?>
		</ul>
	</div>


