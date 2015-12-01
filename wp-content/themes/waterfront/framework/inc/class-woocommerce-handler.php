<?php 


class Woocommerce_Handler {

	public function init() {
		$this->remove_hooks();
		$this->hooks();
	}

	public function remove_hooks() {
		remove_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description' );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper' );
		remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end' );
		remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb' );
	}

	public function hooks() {
		add_theme_support( 'woocommerce' );

		add_filter( 'woocommerce_add_to_cart_fragments', array( $this, 'waterfront_add_to_cart_fragment' ) );

		add_action( 'woocommerce_before_main_content', array( $this, 'waterfront_before_main_content' ), 10, 1 );
		add_action( 'woocommerce_after_main_content', array( $this, 'watefront_after_main_content' ), 10, 1 );
		// add_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 20, 1 );

		add_action( 'woocommerce_archive_description', array( $this, 'waterfront_archive_description' ), 1 );

		add_filter( 'woocommerce_show_page_title', array( $this, 'waterfront_show_page_title' ), 10, 1  );

		add_action( 'woocommerce_before_shop_loop', array( $this, 'waterfront_before_shop_loop' ), 10, 1 );
		add_action( 'woocommerce_after_shop_loop', array( $this, 'waterfront_after_shop_loop' ), 10, 1 );

		add_action( 'woocommerce_sidebar', array( $this, 'waterfront_before_woocommerce_sidebar' ), 1, 1);
		add_action( 'woocommerce_sidebar', array( $this, 'waterfront_after_woocommerce_sidebar' ), 20, 1 );

	}

	public function woocommerce_support() {
	}



	public function waterfront_add_to_cart_fragment( $fragments ) {
		ob_start();
		$count = WC()->cart->cart_contents_count;
		?> 
		<a class="cart-contents" href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e( 'View Your Shopping Cart' ); ?>">
			<i class="fa fa-shopping-cart"></i> <?php if( $count > 0 ) echo ' (' . $count . ') '; ?>
		</a>
		<?php

		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}

	public function waterfront_before_main_content() {
		if( is_post_type_archive( 'product' ) && get_query_var( 'paged' ) == 0 ) {
			$shop_page = get_post( wc_get_page_id( 'shop' ) );
			if( $shop_page ) {
				get_template_part( 'template-parts/shop/content' );
			}
		}
		ob_start();
		?>
		<main class="shop shop__content">
			<div class="row">
				<div class="eight columns">
		<?php
		echo ob_get_clean();
	}

	public function watefront_after_main_content() {
		ob_start();
		?>		
				</div>
		<?php
		echo ob_get_clean();
	}

	public function waterfront_before_woocommerce_sidebar() {
		ob_start();
		?>		
		<div class="four columns">
		<?php
		echo ob_get_clean();
	}

	public function waterfront_after_woocommerce_sidebar() {
		ob_start();
		?>		
				</div>
			</div>
		</main>
		<?php
		echo ob_get_clean();
	}

	public function waterfront_archive_description() {
		// if( is_post_type_archive( 'product' ) && get_query_var( 'paged' ) == 0 ) {
		// 	$shop_page = get_post( wc_get_page_id( 'shop' ) );
		// 	if( $shop_page ) {
		// 		get_template_part( 'template-parts/shop/content' );
		// 	}
		// }
	}

	public function waterfront_show_page_title( $bool ) {
		if( is_shop() ) {
			$bool =  false;
		}
		else {
			$bool =  true;
		}

		return $bool;
	}

	public function waterfront_before_shop_loop() {
		ob_start();
		?>
		<section class='wrapper shop-loop'>
			<div class='row'>
		<?php

		echo ob_get_clean();
	}

	public function waterfront_after_shop_loop() {
		ob_start();
		?>
			</div>
		</section>
		<?php

		echo ob_get_clean();
	}
}