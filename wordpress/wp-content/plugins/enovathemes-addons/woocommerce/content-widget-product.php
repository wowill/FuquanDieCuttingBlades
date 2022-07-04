<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>
<li>
	<?php do_action( 'woocommerce_widget_product_item_start', $args ); ?>
	<div class="product-image">
		<div class="image-container">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>">
				<div class="image-preloader"></div>
				<?php echo $product->get_image(); ?>
			</a>
		</div>
	</div>
	<div class="product-body">
	
		<h6 class="product-title">
			<a href="<?php echo esc_url( $product->get_permalink() ); ?>"><?php echo $product->get_name(); ?></a>
		</h6>
		
		<?php if ( ! empty( $show_rating ) ) : ?>
			<?php echo wc_get_rating_html( $product->get_average_rating() ); ?>
		<?php endif; ?>

		<?php echo $product->get_price_html(); ?>
	</div>

	<?php do_action( 'woocommerce_widget_product_item_end', $args ); ?>
</li>
