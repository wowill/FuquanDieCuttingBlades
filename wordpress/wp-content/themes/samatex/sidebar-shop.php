<?php if(is_active_sidebar('shop-widgets')): ?>
	<aside class='shop-widgets widget-area'>  
		<?php if ( function_exists( 'dynamic_sidebar' )){dynamic_sidebar('shop-widgets');} ?>
	</aside>
<?php endif ?>	
