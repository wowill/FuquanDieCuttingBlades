<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

samatex_enovathemes_global_variables();

$product_animation_effect     = (isset($GLOBALS['samatex_enovathemes']['product-animation-effect']) && $GLOBALS['samatex_enovathemes']['product-animation-effect']) ? $GLOBALS['samatex_enovathemes']['product-animation-effect'] : "none";
$product_image_effect         = (isset($GLOBALS['samatex_enovathemes']['product-image-effect']) && $GLOBALS['samatex_enovathemes']['product-image-effect']) ? $GLOBALS['samatex_enovathemes']['product-image-effect'] : "overlay-fade";
$product_image_full           = (isset($GLOBALS['samatex_enovathemes']['product-image-full']) && $GLOBALS['samatex_enovathemes']['product-image-full'] == 1) ? "true" : "false";
$product_navigation           = (isset($GLOBALS['samatex_enovathemes']['product-navigation']) && $GLOBALS['samatex_enovathemes']['product-navigation']) ? $GLOBALS['samatex_enovathemes']['product-navigation'] : "pagination";

$class = array();

$display = woocommerce_get_loop_display_mode();

$class[] = 'loop-posts';
$class[] = 'loop-product';
$class[] = 'et-item-set';
$class[] = $display;
$class[] = $product_image_effect;
$class[] = 'effect-'.$product_animation_effect;
$class[] = 'nav-'.$product_navigation;
$class[] = 'et-clearfix';

?>
<ul id="loop-products" class="<?php echo esc_attr(implode(' ', $class)); ?>" data-navigation="<?php echo esc_attr($product_navigation); ?>">
