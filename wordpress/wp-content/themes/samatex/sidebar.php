<?php if(is_active_sidebar('blog-widgets')): ?>
	<aside class='blog-widgets widget-area'>  
		<?php if ( function_exists( 'dynamic_sidebar' )){dynamic_sidebar('blog-widgets');} ?>
	</aside>
<?php endif ?>	
