<?php

	$class   = array();
	$class[] = 'pswp';

	if (is_singular('project')) {
		$project_id = get_the_ID();
		$gallery_type = get_post_meta( $project_id, 'enovathemes_addons_gallery_type', true );

		if ($gallery_type == "carousel" || $gallery_type == "carousel_thumb") {
			$class[] = 'carousel';
		}
	}

?>
<div class="<?php echo implode(' ', $class); ?>" tabindex="-1" role="dialog" aria-hidden="true"> <div class="pswp__bg"></div> <div class="pswp__scroll-wrap"> <div class="pswp__container"> <div class="pswp__item"></div> <div class="pswp__item"></div> <div class="pswp__item"></div> </div> <div class="pswp__ui pswp__ui--hidden"> <div class="pswp__top-bar"> <div class="pswp__counter"></div> <span class="pswp__button pswp__button--close" title="<?php esc_html__( "Close (Esc)", "samatex" ); ?>"></span> <span class="pswp__button pswp__button--share" title="<?php esc_html__( "Share", "samatex" ); ?>"></span> <span class="pswp__button pswp__button--fs" title="<?php esc_html__( "Toggle fullscreen", "samatex" ); ?>"></span> <span class="pswp__button pswp__button--zoom" title="<?php esc_html__( "Zoom in/out", "samatex" ); ?>"></span> <div class="pswp__preloader"> <div class="pswp__preloader__icn"> <div class="pswp__preloader__cut"> <div class="pswp__preloader__donut"></div> </div> </div> </div> </div> <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap"> <div class="pswp__share-tooltip"></div> </div> <span class="pswp__button pswp__button--arrow--left" title="<?php esc_html__( "Previous (arrow left)", "samatex" ); ?>"> </span> <span class="pswp__button pswp__button--arrow--right" title="<?php esc_html__( "Next (arrow right)", "samatex" ); ?>"> </span> <div class="pswp__caption"> <div class="pswp__caption__center"></div> </div> </div> </div></div>