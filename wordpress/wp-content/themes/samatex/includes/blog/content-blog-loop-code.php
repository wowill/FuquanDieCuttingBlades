<?php

	samatex_enovathemes_global_variables();

	$blog_post_excerpt 	       = (isset($GLOBALS['samatex_enovathemes']['blog-post-excerpt']) && $GLOBALS['samatex_enovathemes']['blog-post-excerpt']) ? $GLOBALS['samatex_enovathemes']['blog-post-excerpt'] : 0;
	$blog_post_layout  	       = (isset($GLOBALS['samatex_enovathemes']['blog-post-layout']) && $GLOBALS['samatex_enovathemes']['blog-post-layout']) ? $GLOBALS['samatex_enovathemes']['blog-post-layout'] : "grid";
    $blog_sidebar     	       = (isset($GLOBALS['samatex_enovathemes']['blog-sidebar']) && $GLOBALS['samatex_enovathemes']['blog-sidebar']) ? $GLOBALS['samatex_enovathemes']['blog-sidebar'] : "right";
	$blog_animation_effect     = (isset($GLOBALS['samatex_enovathemes']['blog-animation-effect']) && $GLOBALS['samatex_enovathemes']['blog-animation-effect']) ? $GLOBALS['samatex_enovathemes']['blog-animation-effect'] : "none";
	$blog_image_effect         = (isset($GLOBALS['samatex_enovathemes']['blog-image-effect']) && $GLOBALS['samatex_enovathemes']['blog-image-effect']) ? $GLOBALS['samatex_enovathemes']['blog-image-effect'] : "overlay-fade";
	$blog_image_full           = (isset($GLOBALS['samatex_enovathemes']['blog-image-full']) && $GLOBALS['samatex_enovathemes']['blog-image-full'] == 1) ? "true" : "false";
	$blog_image_justify        = (isset($GLOBALS['samatex_enovathemes']['blog-image-justify']) && $GLOBALS['samatex_enovathemes']['blog-image-justify'] == 1) ? "true" : "false";
	$blog_navigation           = (isset($GLOBALS['samatex_enovathemes']['blog-navigation']) && $GLOBALS['samatex_enovathemes']['blog-navigation']) ? $GLOBALS['samatex_enovathemes']['blog-navigation'] : "pagination";

	if ($blog_post_layout != "grid") {
		$blog_animation_effect = "none";
	}

	$class = array();

	$class[] = 'loop-posts';
	$class[] = 'et-item-set';
	$class[] = $blog_image_effect;
	$class[] = 'effect-'.$blog_animation_effect;
	$class[] = 'nav-'.$blog_navigation;
	$class[] = 'et-clearfix';

	if ($blog_image_full == "true" && $blog_image_justify == "false"){
		$class[] = 'fluid-masonry';
	}

?>
<?php if (have_posts()) : ?>

	<main id="loop-posts" class="<?php echo esc_attr(implode(' ', $class)); ?>">

		<?php if ($blog_post_layout == "grid"): ?>
			<div class="grid-sizer"></div>
		<?php endif ?>

		<?php

			$thumb_size = 'samatex_400X320';

			if ($blog_post_layout == "full") {
				$thumb_size = ($blog_sidebar != "none") ? 'samatex_900X556' : 'samatex_1200X720';
			}

			if ($blog_image_full == "true" && $blog_post_layout == "grid") {
				$thumb_size = 'full';
			}

			if ($blog_post_layout == "grid" && $blog_sidebar != "none") {
				$thumb_size = 'samatex_480X360';
			}

			if ($blog_post_layout == "chess" || $blog_post_layout == "list") {
				$thumb_size = 'samatex_400X400';
			}

		?>

		<?php while (have_posts()) : the_post(); ?>
			<?php echo samatex_enovathemes_post($blog_post_layout,$blog_post_excerpt,$thumb_size,$blog_image_full,$blog_image_justify,false); ?>
		<?php endwhile; ?>

	</main>

	<?php if (function_exists('enovathemes_addons_ajax_nav')) {
		echo enovathemes_addons_ajax_nav($blog_navigation,'post');
	} else {
		echo samatex_enovathemes_post_nav_num('post');
	} ?>

<?php else : ?>
	<?php samatex_enovathemes_not_found('post'); ?>
<?php endif; ?>