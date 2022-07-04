<?php 
    samatex_enovathemes_global_variables();

    $product_post_size            = (isset($GLOBALS['samatex_enovathemes']['product-post-size']) && $GLOBALS['samatex_enovathemes']['product-post-size']) ? $GLOBALS['samatex_enovathemes']['product-post-size'] : "medium";
    $product_animation_effect     = (isset($GLOBALS['samatex_enovathemes']['product-animation-effect']) && $GLOBALS['samatex_enovathemes']['product-animation-effect']) ? $GLOBALS['samatex_enovathemes']['product-animation-effect'] : "none";
    $product_sidebar              = (isset($GLOBALS['samatex_enovathemes']['product-sidebar']) && $GLOBALS['samatex_enovathemes']['product-sidebar']) ? $GLOBALS['samatex_enovathemes']['product-sidebar'] : "none";

    $class = array();
    $class[] = 'product-layout';
    $class[] = $product_post_size;
    $class[] = 'layout-sidebar-'.$product_sidebar;

    if($product_animation_effect == "none") {$class[] = "lazy lazy-load";}
?>
<?php get_header(); ?>
<?php do_action('samatex_enovathemes_title_section'); ?>
<?php if (is_singular('product')): ?>
    <?php get_template_part('/woocommerce/content-product-single'); ?>
<?php else: ?>
    <div class="<?php echo implode(' ', $class); ?>">
        <?php get_template_part('/woocommerce/content-product-loop'); ?>
    </div>
<?php endif ?>
<?php get_footer(); ?>