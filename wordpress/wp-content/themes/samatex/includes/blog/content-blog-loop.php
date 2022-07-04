<?php

	samatex_enovathemes_global_variables();
	
	$blog_sidebar          = (isset($GLOBALS['samatex_enovathemes']['blog-sidebar']) && $GLOBALS['samatex_enovathemes']['blog-sidebar']) ? $GLOBALS['samatex_enovathemes']['blog-sidebar'] : "none";
	$blog_post_layout      = (isset($GLOBALS['samatex_enovathemes']['blog-post-layout']) && $GLOBALS['samatex_enovathemes']['blog-post-layout']) ? $GLOBALS['samatex_enovathemes']['blog-post-layout'] : "grid";
	$blog_animation_effect = (isset($GLOBALS['samatex_enovathemes']['blog-animation-effect']) && $GLOBALS['samatex_enovathemes']['blog-animation-effect']) ? $GLOBALS['samatex_enovathemes']['blog-animation-effect'] : "none";
	
	if ($blog_post_layout != "grid") {
		$blog_animation_effect = "none";
	}

	if (is_active_sidebar('blog-widgets') && $blog_sidebar == "none" && !defined('ENOVATHEMES_ADDONS')) {
		$blog_sidebar = 'right';
	}

	$class = array();
	$class[] = 'blog-layout';
	$class[] = 'medium';
	$class[] = 'blog-layout-'.$blog_post_layout;
	$class[] = 'layout-sidebar-'.$blog_sidebar;
	$class[] = $blog_post_layout;

	if($blog_animation_effect == "none") {$class[] = "lazy lazy-load";}


?>
<div id="et-content" class="content et-clearfix padding-false">
	<div class="<?php echo implode(' ', $class); ?>">
		<div class="container et-clearfix">
			<?php if ($blog_sidebar == "left"): ?>
				<div class="layout-sidebar blog-sidebar et-clearfix">
					<?php get_sidebar(); ?>
				</div>
				<div class="layout-content blog-content et-clearfix">
					<?php get_template_part( '/includes/blog/content-blog-loop-code' ); ?>
				</div>
			<?php elseif ($blog_sidebar == "right"): ?>
				<div class="layout-content blog-content et-clearfix">
					<?php get_template_part( '/includes/blog/content-blog-loop-code' ); ?>
				</div>
				<div class="layout-sidebar blog-sidebar et-clearfix">
					<?php get_sidebar(); ?>
				</div>
			<?php else: ?>
				<?php get_template_part( '/includes/blog/content-blog-loop-code' ); ?>
			<?php endif ?>
		</div>
	</div>
</div>