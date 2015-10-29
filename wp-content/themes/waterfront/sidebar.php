<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package waterfront
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

$template = substr( get_page_template_slug( get_the_ID() ), 0, -4 );
$template = str_replace('template-', '', $template );

if( is_woocommerce() ) {
	$template = "woocommerce";
}

?>

<aside id="secondary" class="widget-area widget-area__<?php echo $template; ?>" role="complementary">
	<?php if( is_woocommerce() || $template == 'shop'): ?>
		<?php dynamic_sidebar( 'sidebar-woo' ); ?>
	<?php else: ?>
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	<?php endif; ?>
</aside><!-- #secondary -->
