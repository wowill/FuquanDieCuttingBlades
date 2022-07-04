<?php

	samatex_enovathemes_global_variables();

	$blog_single_sidebar = (isset($GLOBALS['samatex_enovathemes']['blog-single-sidebar']) && $GLOBALS['samatex_enovathemes']['blog-single-sidebar']) ? $GLOBALS['samatex_enovathemes']['blog-single-sidebar'] : "none";

	$class = array();
	$class[] = 'blog-layout-single';
	$class[] = 'layout-sidebar-'.$blog_single_sidebar;
	$class[] = 'lazy lazy-load';

?>
<div id="et-content" class="content et-clearfix padding-false">
	<div class="<?php echo implode(' ', $class); ?>">
		<div class="container et-clearfix">
			<?php if ($blog_single_sidebar == "left"): ?>
				<div class="blog-sidebar layout-sidebar et-clearfix">
					<?php get_sidebar('single'); ?>
				</div>
				<div class="blog-content layout-content et-clearfix">
					<?php get_template_part( '/includes/blog/content-blog-single-code' ); ?>
				</div>
			<?php elseif ($blog_single_sidebar == "right"): ?>
				<div class="blog-content layout-content et-clearfix">
					<?php get_template_part( '/includes/blog/content-blog-single-code' ); ?>
				</div>
				<div class="blog-sidebar layout-sidebar et-clearfix">
					<?php get_sidebar('single'); ?>
				</div>
			<?php else: ?>
				<?php get_template_part( '/includes/blog/content-blog-single-code' ); ?>
			<?php endif ?>
		</div>
	</div>
</div>