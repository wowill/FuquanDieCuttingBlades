<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_mini_cart' ); ?>

<?php if ( ! WC()->cart->is_empty() ) : ?>

	<ul class="woocommerce-mini-cart cart_list product_list_widget <?php echo esc_attr( $args['list_class'] ); ?>">
		<?php
			do_action( 'woocommerce_before_mini_cart_contents' );

			foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
				$_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
				$product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

				if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

					$product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
					$thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
					$product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
					$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

					?>
					<li class="woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
						<?php
							echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
								'woocommerce_cart_item_remove_link',
								sprintf(
									'<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s">&times;</a>',
									esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
									esc_attr__( 'Remove this item', 'woocommerce' ),
									esc_attr( $product_id ),
									esc_attr( $cart_item_key ),
									esc_attr( $_product->get_sku() )
								),
								$cart_item_key
							);
						?>
						<div class="cart-product-body et-clearfix">
							<?php if (!empty($thumbnail)): ?>
								<div class="cart-product-image">
									<a href="<?php echo esc_url( $product_permalink ); ?>">
										<?php echo $thumbnail; ?>
									</a>
								</div>
							<?php endif ?>
							<div class="cart-product-content">
								<h6 class="cart-product-title">
									<a href="<?php echo esc_url( $product_permalink ); ?>">
										<?php echo mb_strimwidth($product_name,0,40,'...'); ?>
									</a>
								</h6>
								<div class="cart-product-data">

									<ul class="cart-data">
										<li>
											<span class='attribute'><?php echo esc_html__('Quantity:', 'enovathemes-addons'); ?></span>
											<span><?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ), $cart_item, $cart_item_key ); ?></span>
										</li>

										<?php
											$cartoutput = "";
											$cart_data = wc_get_formatted_cart_item_data( $cart_item );
								            $split = preg_split("/(\r?\n)+|(<br\s*\/?>\s*)+/", $cart_data);

								            foreach($split as $haystack) {
								                if (strpos($haystack, ":")) {
								                    $string = explode(":", trim($haystack), 2);
								                    $attribute = strip_tags(trim($string[0]));
								                    $value = strip_tags(trim($string[1]));
								                    $cartoutput = $cartoutput . "<li><span class='attribute'>$attribute:</span><span>$value</span></li>\n";
								                } else {
								                    $cartoutput = $cartoutput . $haystack . "\n";
								                }
								            }

								            $cart_data = $cartoutput . "\n";
								            echo  $cart_data;
										?>

									</ul>

								</div>
							</div>
						</div>
					</li>
					<?php
				}
			}

			do_action( 'woocommerce_mini_cart_contents' );
		?>
	</ul>

	<p class="woocommerce-mini-cart-info woocommerce-mini-cart__total total">
		<span class="subtotal-label"><?php echo esc_html__( 'Subtotal', 'enovathemes-addons' ); ?>:</span>
		<?php echo WC()->cart->get_cart_subtotal(); ?>
	</p>

	<?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

	<p class="woocommerce-mini-cart-info woocommerce-mini-cart__buttons buttons">
		<?php do_action( 'woocommerce_widget_shopping_cart_buttons' ); ?>
	</p>

<?php else : ?>

	<p class="woocommerce-mini-cart-info woocommerce-mini-cart__empty-message">
		<?php echo esc_html__( 'No products in the cart.', 'enovathemes-addons' ); ?>
	</p>

<?php endif; ?>

<?php do_action( 'woocommerce_after_mini_cart' ); ?>