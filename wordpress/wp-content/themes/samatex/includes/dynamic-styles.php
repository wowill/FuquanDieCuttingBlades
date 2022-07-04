<?php
function samatex_enovathemes_include_dynamic_styles() {

	wp_enqueue_style('dynamic-styles', get_template_directory_uri() . '/css/dynamic-styles.css');

	samatex_enovathemes_global_variables();

    $dynamic_css = "";

    if(isset($GLOBALS['samatex_enovathemes']['custom-css']) && !empty($GLOBALS['samatex_enovathemes']['custom-css'])){
		$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css'];
	}
  
	if(isset($GLOBALS['samatex_enovathemes']['font-custom-css']) && !empty($GLOBALS['samatex_enovathemes']['font-custom-css'])){
		$dynamic_css .= $GLOBALS['samatex_enovathemes']['font-custom-css'];
	}

	/* Typography
	/*-------------*/

		$et_main_font_size          = (isset($GLOBALS['samatex_enovathemes']['main-typo']['font-size']) && $GLOBALS['samatex_enovathemes']['main-typo']['font-size']) ? $GLOBALS['samatex_enovathemes']['main-typo']['font-size'] : "16px";
		$et_main_font_weight        = (isset($GLOBALS['samatex_enovathemes']['main-typo']['font-weight']) && $GLOBALS['samatex_enovathemes']['main-typo']['font-weight']) ? $GLOBALS['samatex_enovathemes']['main-typo']['font-weight'] : "400";
		$et_main_line_height        = (isset($GLOBALS['samatex_enovathemes']['main-typo']['line-height']) && $GLOBALS['samatex_enovathemes']['main-typo']['line-height']) ? $GLOBALS['samatex_enovathemes']['main-typo']['line-height'] : "32px";
		$et_main_letter_spacing     = (isset($GLOBALS['samatex_enovathemes']['main-typo']['letter-spacing']) && $GLOBALS['samatex_enovathemes']['main-typo']['letter-spacing']) ? $GLOBALS['samatex_enovathemes']['main-typo']['letter-spacing'] : "0px";
		$et_main_font_family        = (isset($GLOBALS['samatex_enovathemes']['main-typo']['font-family']) && $GLOBALS['samatex_enovathemes']['main-typo']['font-family']) ? $GLOBALS['samatex_enovathemes']['main-typo']['font-family'] : "Nunito Sans, sans-serif";
		$et_main_color              = (isset($GLOBALS['samatex_enovathemes']['main-typo']['color']) && $GLOBALS['samatex_enovathemes']['main-typo']['color']) ? $GLOBALS['samatex_enovathemes']['main-typo']['color'] : "#616161";
		$et_headings_font_family    = (isset($GLOBALS['samatex_enovathemes']['headings-typo']['font-family']) && $GLOBALS['samatex_enovathemes']['headings-typo']['font-family']) ? $GLOBALS['samatex_enovathemes']['headings-typo']['font-family'] : "Nunito Sans, sans-serif";
		$et_headings_font_weight    = (isset($GLOBALS['samatex_enovathemes']['headings-typo']['font-weight']) && $GLOBALS['samatex_enovathemes']['headings-typo']['font-weight']) ? $GLOBALS['samatex_enovathemes']['headings-typo']['font-weight'] : '700';
		$et_headings_text_transform = (isset($GLOBALS['samatex_enovathemes']['headings-typo']['text-transform']) && $GLOBALS['samatex_enovathemes']['headings-typo']['text-transform']) ? $GLOBALS['samatex_enovathemes']['headings-typo']['text-transform'] : "none";
		$et_headings_letter_spacing = (isset($GLOBALS['samatex_enovathemes']['headings-typo']['letter-spacing']) && $GLOBALS['samatex_enovathemes']['headings-typo']['letter-spacing']) ? $GLOBALS['samatex_enovathemes']['headings-typo']['letter-spacing'] : "0px";
		$et_headings_color          = (isset($GLOBALS['samatex_enovathemes']['headings-typo']['color']) && $GLOBALS['samatex_enovathemes']['headings-typo']['color']) ? $GLOBALS['samatex_enovathemes']['headings-typo']['color'] : "#212121";
		$et_h1_font_size            = (isset($GLOBALS['samatex_enovathemes']['h1-typo']['font-size']) && $GLOBALS['samatex_enovathemes']['h1-typo']['font-size']) ? $GLOBALS['samatex_enovathemes']['h1-typo']['font-size'] : "48px";
		$et_h1_line_height          = (isset($GLOBALS['samatex_enovathemes']['h1-typo']['line-height']) && $GLOBALS['samatex_enovathemes']['h1-typo']['line-height']) ? $GLOBALS['samatex_enovathemes']['h1-typo']['line-height'] : "56px";
		$et_h2_font_size            = (isset($GLOBALS['samatex_enovathemes']['h2-typo']['font-size']) && $GLOBALS['samatex_enovathemes']['h2-typo']['font-size']) ? $GLOBALS['samatex_enovathemes']['h2-typo']['font-size'] : "40px";
		$et_h2_line_height          = (isset($GLOBALS['samatex_enovathemes']['h2-typo']['line-height']) && $GLOBALS['samatex_enovathemes']['h2-typo']['line-height']) ? $GLOBALS['samatex_enovathemes']['h2-typo']['line-height'] : "48px";
		$et_h3_font_size            = (isset($GLOBALS['samatex_enovathemes']['h3-typo']['font-size']) && $GLOBALS['samatex_enovathemes']['h3-typo']['font-size']) ? $GLOBALS['samatex_enovathemes']['h3-typo']['font-size'] : "32px";
		$et_h3_line_height          = (isset($GLOBALS['samatex_enovathemes']['h3-typo']['line-height']) && $GLOBALS['samatex_enovathemes']['h3-typo']['line-height']) ? $GLOBALS['samatex_enovathemes']['h3-typo']['line-height'] : "40px";
		$et_h4_font_size            = (isset($GLOBALS['samatex_enovathemes']['h4-typo']['font-size']) && $GLOBALS['samatex_enovathemes']['h4-typo']['font-size']) ? $GLOBALS['samatex_enovathemes']['h4-typo']['font-size'] : "24px";
		$et_h4_line_height          = (isset($GLOBALS['samatex_enovathemes']['h4-typo']['line-height']) && $GLOBALS['samatex_enovathemes']['h4-typo']['line-height']) ? $GLOBALS['samatex_enovathemes']['h4-typo']['line-height'] : "32px";
		$et_h5_font_size            = (isset($GLOBALS['samatex_enovathemes']['h5-typo']['font-size']) && $GLOBALS['samatex_enovathemes']['h5-typo']['font-size']) ? $GLOBALS['samatex_enovathemes']['h5-typo']['font-size'] : "20px";
		$et_h5_line_height          = (isset($GLOBALS['samatex_enovathemes']['h5-typo']['line-height']) && $GLOBALS['samatex_enovathemes']['h5-typo']['line-height']) ? $GLOBALS['samatex_enovathemes']['h5-typo']['line-height'] : "28px";
		$et_h6_font_size            = (isset($GLOBALS['samatex_enovathemes']['h6-typo']['font-size']) && $GLOBALS['samatex_enovathemes']['h6-typo']['font-size']) ? $GLOBALS['samatex_enovathemes']['h6-typo']['font-size'] : "18px";
		$et_h6_line_height          = (isset($GLOBALS['samatex_enovathemes']['h6-typo']['line-height']) && $GLOBALS['samatex_enovathemes']['h6-typo']['line-height']) ? $GLOBALS['samatex_enovathemes']['h6-typo']['line-height'] : "28px";

		$dynamic_css .='body,input,select,pre,code,kbd,samp,dt,
		#cancel-comment-reply-link,
		.box-item-content, textarea, 
		.widget_price_filter .price_label,
		.demo-icon-pack span:after {
			font-size: '.$et_main_font_size.';
			font-weight: '.$et_main_font_weight.';
			font-family:'.$et_main_font_family.';
			line-height: '.$et_main_line_height.';
			letter-spacing: '.$et_main_letter_spacing.';
			color:'.$et_main_color.';
		}';

		$dynamic_css .='.header-login .login-title, 
		.cart-contents {
			font-size: '.$et_main_font_size.';
			font-weight: '.$et_main_font_weight.';
			font-family:'.$et_main_font_family.';
			letter-spacing: '.$et_main_letter_spacing.';
		}';

		$dynamic_css .='h1,h2,h3,h4,h5,h6, 
		.woocommerce-page #et-content .shop_table .product-name > a:not(.yith-wcqv-button),
		.woocommerce-Tabs-panel .shop_attributes th,
		#reply-title,
		.product .summary .price,
		.et-circle-progress .circle-content,
		.et-timer .timer-count,
		.et-pricing-table .currency,
		.et-pricing-table .price,
		.et-counter .counter,
		.et-progress .percent,
		.error404-default-subtitle,
		.yith-woocompare-widget ul.products-list li .title,
		.woocommerce-MyAccount-navigation ul li a,
		.woocommerce-tabs .tabs li a {
			font-family:'.$et_headings_font_family.';
			text-transform: '.$et_headings_text_transform.';
			font-weight: '.$et_headings_font_weight.';
			letter-spacing: '.$et_headings_letter_spacing.';
			color:'.$et_headings_color.';
		}';

		$dynamic_css .='.widget_layered_nav ul li a, 
		.widget_nav_menu ul li a, 
		.widget_product_categories ul li a,
		.widget_categories ul li a,
		.post-single-navigation a, 
		.widget_pages ul li a, 
		.widget_archive ul li a, 
		.widget_meta ul li a, 
		.widget_recent_entries ul li a, 
		.widget_rss ul li a, 
		.widget_icl_lang_sel_widget li a, 
		.recentcomments a, 
		.widget_product_search form button:before, 
		.page-content-wrap .widget_shopping_cart .cart_list li .remove{
			font-family:'.$et_headings_font_family.';
			font-weight: '.$et_headings_font_weight.';
			letter-spacing: '.$et_headings_letter_spacing.';
			color:'.$et_headings_color.';
		}';

		$dynamic_css .='.woocommerce-page #et-content .shop_table .product-name > a:not(.yith-wcqv-button),
		.widget_et_recent_entries .post-title a,
		.widget_products .product_list_widget > li .product-title a,
		.widget_recently_viewed_products .product_list_widget > li .product-title a,
		.widget_recent_reviews .product_list_widget > li .product-title a,
		.widget_top_rated_products .product_list_widget > li .product-title a {
			color:'.$et_headings_color.' !important;
		}';

		$dynamic_css .='.page-content-wrap .widget_shopping_cart .cart-product-title a,
		.et-circle-progress .percent {
			color:'.$et_headings_color.';
		}';

		$dynamic_css .='h1 {font-size: '.$et_h1_font_size.'; line-height: '.$et_h1_line_height.';}';
		$dynamic_css .='h2 {font-size: '.$et_h2_font_size.'; line-height: '.$et_h2_line_height.';}';
		$dynamic_css .='h3 {font-size: '.$et_h3_font_size.'; line-height: '.$et_h3_line_height.';}';
		$dynamic_css .='h4 {font-size: '.$et_h4_font_size.'; line-height: '.$et_h4_line_height.';}';
		$dynamic_css .='h5 {font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';}';
		$dynamic_css .='h6 {font-size: '.$et_h6_font_size.'; line-height: '.$et_h6_line_height.';}';

		$dynamic_css .='.widgettitle
		{font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';}';

		$dynamic_css .='.woocommerce-Tabs-panel h2,
		.shop_table .product-name > a:not(.yith-wcqv-button),
		.widget_layered_nav ul li a, 
		.widget_nav_menu ul li a, 
		.widget_product_categories ul li a,
		.yith-woocompare-widget ul.products-list li .title
		{font-size: '.$et_h6_font_size.'; line-height: '.$et_h6_line_height.';}';

		$dynamic_css .='#reply-title,.woocommerce h2
		{font-size: '.$et_h4_font_size.'; line-height: '.$et_h4_line_height.';}';

		$dynamic_css .='.et-timer .timer-count
		{font-size: '.$et_h1_font_size.'; line-height: '.$et_h1_line_height.';}';

		$dynamic_css .='.et-circle-progress .percent
		{font-size: '.$et_h1_font_size.'; line-height: '.$et_h1_font_size.';}';

	/* Color
	/*-------------*/

		$main_color     = (isset($GLOBALS['samatex_enovathemes']['main-color']) && $GLOBALS['samatex_enovathemes']['main-color']) ? $GLOBALS['samatex_enovathemes']['main-color'] : '#ffd311';
		$link_color_hov = (isset($GLOBALS['samatex_enovathemes']['link-color-hover']) && $GLOBALS['samatex_enovathemes']['link-color-hover']) ? $GLOBALS['samatex_enovathemes']['link-color-hover'] : '#212121';

		$dynamic_css .='#loop-posts .post-title:hover,
		#loop-posts .post-title a:hover,
		.et-shortcode-posts .post-title:hover,
		.et-shortcode-posts .post-title a:hover,
		.loop-product .post-title:hover,
		.loop-product .post-title a:hover,
		.post-social-share > .social-links > a:hover,
		.related-posts .post .post-title a:hover,
		.project-layout .project .post-body .post-title a:hover,
		.project-layout .project .project-category a:hover,
		.product .summary .price ins,
		.page-content-wrap .widget_shopping_cart .cart-product-title a:hover,
		.page-content-wrap .widget_shopping_cart .cart-product-title:hover a,
		.widget_products .product_list_widget > li > a:hover .product-title,
		.widget_recently_viewed_products .product_list_widget > li > a:hover .product-title,
		.widget_recent_reviews .product_list_widget > li > a:hover .product-title,
		.widget_top_rated_products .product_list_widget > li > a:hover .product-title,
		.search-posts .post-title a:hover,
		.search-posts .post-title:hover a,
		.et-testimonial-item .rating span,
		.plyr--full-ui input[type=range],
		.comment-meta .comment-date-time a:hover,
		.comment-author a:hover,
		.comment-content .edit-link a a,
		#cancel-comment-reply-link:hover,
		.woocommerce-review-link,
		.yith-woocompare-widget ul.products-list li .title:hover,
		.yith-woocompare-widget ul.products-list li .remove:hover,
		.product .price,
		.star-rating,
		.comment-form-rating a,
		.comment-form-rating a:after,
		.border-true.et-client-container .et-client .plus,
		.widget_nav_menu ul li.current-menu-item a {
			color: '.$main_color.';
		}';

		$dynamic_css .='.post-single-navigation a:hover,
		.post-meta a:hover,
		.project-meta ul a:not(.social-share):hover,
		.widget_et_recent_entries .post-title:hover a,
		.widget_categories ul li a:hover,
		.widget_pages ul li a:hover,
		.widget_archive ul li a:hover,
		.widget_meta ul li a:hover,
		.widget_layered_nav ul li a:hover,
		.widget_nav_menu ul li a:hover,
		.widget_product_categories ul li a:hover,
		.widget_recent_entries ul li a:hover, 
		.widget_rss ul li a:hover,
		.widget_icl_lang_sel_widget li a:hover,
		.widget_products .product_list_widget > li .product-title:hover a,
		.widget_recently_viewed_products .product_list_widget > li .product-title:hover a,
		.widget_recent_reviews .product_list_widget > li .product-title:hover a,
		.widget_top_rated_products .product_list_widget > li .product-title:hover a,
		.recentcomments a:hover,
		#yith-quick-view-close:hover,
		.page-content-wrap .widget_shopping_cart .cart_list li .remove:hover,
		.woocommerce-page #et-content .shop_table .product-name > a:not(.yith-wcqv-button):hover,
		.product-layout-single .summary .yith-wcwl-add-to-wishlist a:hover,
		.et-shortcode-projects-full .overlay-read-more:hover {
			color: '.$main_color.' !important;
		}';

		$dynamic_css .='.post-read-more:after,
		.comment-reply-link:after,
		.enovathemes-navigation li a:hover,
		.enovathemes-navigation li .current,
		.woocommerce-pagination li a:hover,
		.woocommerce-pagination li .current,
		.post-sticky,
		.post-media .flex-direction-nav li a:hover,
		.post-media .flex-control-nav li a:hover,
		.post-media .flex-control-nav li a.flex-active,
		.slick-dots li button:hover,
		.slick-dots li.slick-active button,
		.owl-carousel .owl-nav > *:hover,
		.enovathemes-filter .filter:before,
		.overlay-flip-hor .overlay-hover .post-image-overlay, 
		.overlay-flip-ver .overlay-hover .post-image-overlay,
		.image-move-up .post-image-overlay,
		.image-move-down .post-image-overlay,
		.image-move-left .post-image-overlay,
		.image-move-right .post-image-overlay,
		.overlay-image-move-up .post-image-overlay,
		.overlay-image-move-down .post-image-overlay,
		.overlay-image-move-left .post-image-overlay,
		.overlay-image-move-right .post-image-overlay,
		.product .onsale,
		.product-quick-view:hover,
		.product .button,
		.yith-woocompare-widget a.compare,
		.yith-woocompare-widget a.clear-all,
		.added_to_cart,
		.woocommerce-store-notice.demo_store,
		.shop_table .product-remove a:hover,
		.et-accordion .toggle-title.active:before,
		.tabset .tab.active:before,
		.et-mailchimp input[type="text"] + .after,
		.owl-carousel .owl-dots > .owl-dot.active,
		.et-pricing-table .label,
		.mob-menu-toggle-alt,
		.full #loop-posts .format-link .post-body-inner,
		.single-post-page > .format-link .format-container,
		.plyr--audio .plyr__control.plyr__tab-focus,.plyr--audio .plyr__control:hover,.plyr--audio .plyr__control[aria-expanded=true],.plyr--video .plyr__control.plyr__tab-focus,.plyr--video .plyr__control:hover,.plyr--video .plyr__control[aria-expanded=true],
		.plyr__control--overlaid:focus,.plyr__control--overlaid:hover,.plyr__menu__container .plyr__control[role=menuitemradio][aria-checked=true]::before,
		.woocommerce-tabs .tabs li.active a,
		.woocommerce-tabs .tabs li a:hover,
		.et-image .curtain,
		.et-breadcrumbs a:after,
		.post-meta:before,
		.project-category:before,
		.related-posts-title:before,
		.comment-reply-title:before,
		.comments-title:before,
		.upsells > h4:before,
		.crosssells > h4:before,
		.related > h4:before,
		.nivo-lightbox-prev:hover,
		.nivo-lightbox-next:hover,
		.nivo-lightbox-close:hover,
		.enovathemes-filter .filter:after,
		.project-single-navigation > *:hover,
		.project-layout.project-with-caption .post-body,
		.project-description-title:before,
		.project-meta-title:before,
		.product .button:after,
		.added_to_cart:after,
		.et-pricing-table .plan:after,
		.et-testimonial .author-info-wrapper .author:after,
		.et-person .name:after,
		.et-video .modal-video-poster:before,
		.widget_title:before,
		.widgettitle:before,
		.et-shortcode-projects-full .post .post-body,
		.et-image-box.caption .post-body {
			background-color: '.$main_color.';
		}';

		$dynamic_css .='.mejs-controls .mejs-time-rail .mejs-time-current,
		.slick-slider .slick-prev:hover,
		.slick-slider .slick-next:hover,
		#project-gallery .owl-nav > .owl-prev:hover,
		#project-gallery .owl-nav > .owl-next:hover,
		.widget_tag_cloud .tagcloud a:after,
		.widget_product_tag_cloud .tagcloud a:after,
		.project-tags a:after,
		.widget_price_filter .ui-slider-horizontal .ui-slider-range,
		#cboxClose:hover {
			background-color: '.$main_color.' !important;
		}';

		$dynamic_css .='.plyr--video .plyr__controls {
			background: '.samatex_enovathemes_hex_to_rgba($main_color,0.5).' !important;
		}';

		$dynamic_css .='ul.chat li:nth-child(2n+2) > p {
			background-color: '.samatex_enovathemes_hex_to_rgba($main_color,0.1).';
			color: '.$main_color.' !important;
		}';

		$dynamic_css .='.plyr__control--overlaid {
			background-color: '.$main_color.';
		}';

		$dynamic_css .='.plyr__control.plyr__tab-focus {
			box-shadow: 0 8px 24px 0 '.samatex_enovathemes_hex_to_rgba($main_color,0.5).';
		}';

		$dynamic_css .='#yith-wcwl-popup-message {
			color:'.$main_color.' !important;
			box-shadow:inset 0 0 0 1px '.$main_color.';
		}';

		$dynamic_css .='.ajax-add-to-cart-loading .circle-loader,
		.yith-wcwl-add-to-wishlist a:after {
			border-left-color: '.$main_color.';
		}';

		$dynamic_css .='.ajax-add-to-cart-loading .load-complete {
			border-color:'.$main_color.' !important;
		}';

		$dynamic_css .='.ajax-add-to-cart-loading .checkmark:after {
			border-right: 3px solid '.$main_color.';
			border-top: 3px solid '.$main_color.';
		}';

        $dynamic_css .='.widget_price_filter .ui-slider .ui-slider-handle {
            border:5px solid '.$main_color.';
        }';

        $dynamic_css .='blockquote {
			border-left:8px solid '.$main_color.' !important;
		}';

        $dynamic_css .='.et-pricing-table.highlight-true .pricing-table-inner {
			border-color:'.$main_color.' !important;
		}';

		$dynamic_css .= '.counter-moving-child:before {
			border-color:'.$main_color.';
		}';

		$dynamic_css .= '.highlight-true .testimonial-content {
			box-shadow:inset 0 0 0 1px '.$main_color.';border-color:'.$main_color.';
		}';

		$dynamic_css .= '.highlight-true .testimonial-content:after {
			border-color: '.$main_color.' transparent transparent transparent;
		}';

		$dynamic_css .= '.woocommerce-product-gallery .flex-control-nav li img.flex-active {
			box-shadow: 0 0 0 2px '.$main_color.';
		}';

		$dynamic_css .= '.post-image-overlay {
			background-color: '.samatex_enovathemes_hex_to_rgba($main_color,0.9).';
		}';

		$dynamic_css .= '.overlay-fall .overlay-hover .post-image-overlay,
		.project-with-overlay .overlay-hover .post-image-overlay {
			background-color: '.$main_color.';
		}';

		// Header defaults
		$dynamic_css .='#header-menu-default > .menu-item.depth-0 > .mi-link .txt:after {
		    border-bottom-color: '.$main_color.';
		}';

		$dynamic_css .='a:hover,
		.comment-content .edit-link a a:hover,
		.woocommerce-review-link:hover,
		.product_meta a:hover {
			color: '.$link_color_hov.';
		}';

		$dynamic_css .='.widget_tag_cloud .tagcloud a:hover:after,
		.widget_product_tag_cloud .tagcloud a:hover:after,
		.project-tags a:hover:after {
			background-color:'.$link_color_hov.' !important;
		}';

	/* Effects
	/*------------*/

		/* Custom scroll
		/*------------*/

            $custom_scroll             = (isset($GLOBALS['samatex_enovathemes']['custom-scroll']) && $GLOBALS['samatex_enovathemes']['custom-scroll'] == 1) ? 'true' : 'false';
			$custom_scroll_cursorwidth = (isset($GLOBALS['samatex_enovathemes']['custom-scroll-cursorwidth']) && $GLOBALS['samatex_enovathemes']['custom-scroll-cursorwidth']) ? $GLOBALS['samatex_enovathemes']['custom-scroll-cursorwidth'] : "10";

			if ($custom_scroll == "true") {
				$dynamic_css .='html {
					margin-right:'.$custom_scroll_cursorwidth.'px;
				}';
			}

		/* Image preloader
		/*------------*/

			$img_preloader = (isset($GLOBALS['samatex_enovathemes']['img-preload']) && $GLOBALS['samatex_enovathemes']['img-preload'] == 1) ? 'true' : 'false';

			if ($img_preloader == "true") {

				$dynamic_css .='.image-preloader,
				.gallery-icon:before {
					opacity:1 !important;
					visibility: visible !important;
					z-index:1 !important;
				}';
			}

		/* Move to top
		/*------------*/

			$mtt                  = (isset($GLOBALS['samatex_enovathemes']['mtt']) && $GLOBALS['samatex_enovathemes']['mtt'] == 1) ? 'true' : 'false';
			$mtt_size          	  = (isset($GLOBALS['samatex_enovathemes']['mtt-size']) && $GLOBALS['samatex_enovathemes']['mtt-size']) ? $GLOBALS['samatex_enovathemes']['mtt-size'] : '48';
			$mtt_arrow_size    	  = (isset($GLOBALS['samatex_enovathemes']['mtt-arrow-size']) && $GLOBALS['samatex_enovathemes']['mtt-arrow-size']) ? $GLOBALS['samatex_enovathemes']['mtt-arrow-size'] : '16';
			$mtt_border_radius 	  = (isset($GLOBALS['samatex_enovathemes']['mtt-border-radius']) && $GLOBALS['samatex_enovathemes']['mtt-border-radius']) ? $GLOBALS['samatex_enovathemes']['mtt-border-radius'] : '0';
			$mtt_color_reg        = (isset($GLOBALS['samatex_enovathemes']['mtt-color']['regular']) && $GLOBALS['samatex_enovathemes']['mtt-color']['regular']) ? $GLOBALS['samatex_enovathemes']['mtt-color']['regular'] : '#212121';
			$mtt_color_hov        = (isset($GLOBALS['samatex_enovathemes']['mtt-color']['hover']) && $GLOBALS['samatex_enovathemes']['mtt-color']['hover']) ? $GLOBALS['samatex_enovathemes']['mtt-color']['hover'] : '#000000';
			$mtt_back_color_reg   = (isset($GLOBALS['samatex_enovathemes']['mtt-back-color']['regular']) && $GLOBALS['samatex_enovathemes']['mtt-back-color']['regular']) ? $GLOBALS['samatex_enovathemes']['mtt-back-color']['regular'] : '#ffffff';
			$mtt_back_color_hov   = (isset($GLOBALS['samatex_enovathemes']['mtt-back-color']['hover']) && $GLOBALS['samatex_enovathemes']['mtt-back-color']['hover']) ? $GLOBALS['samatex_enovathemes']['mtt-back-color']['hover'] : '#ffd311';

			if ($mtt == "true") {
				
				$dynamic_css .='#to-top {
					width: '.$mtt_size.'px;
					height: '.$mtt_size.'px;
					line-height: '.$mtt_size.'px !important;
					font-size: '.$mtt_arrow_size.'px;
					border-radius: '.$mtt_border_radius.'px;
					color: '.$mtt_color_reg.';
					background-color: '.$mtt_back_color_reg.';
				}';

				$dynamic_css .='#to-top:hover {
					color: '.$mtt_color_hov.';
					background-color: '.$mtt_back_color_hov.';
				}';

				$dynamic_css .='#to-top .et-ink {
					background-color: '.$mtt_color_hov.';
				}';

			}

	/* Site background
	/*-------------*/

		$et_site_back_col   = (isset($GLOBALS['samatex_enovathemes']['site-background']['background-color']) && $GLOBALS['samatex_enovathemes']['site-background']['background-color']) ? $GLOBALS['samatex_enovathemes']['site-background']['background-color'] : "#ffffff";
		$et_site_back_img   = (isset($GLOBALS['samatex_enovathemes']['site-background']['background-image']) && $GLOBALS['samatex_enovathemes']['site-background']['background-image']) ? esc_url($GLOBALS['samatex_enovathemes']['site-background']['background-image']) : "";
		$et_site_back_r     = (isset($GLOBALS['samatex_enovathemes']['site-background']['background-repeat']) && $GLOBALS['samatex_enovathemes']['site-background']['background-repeat']) ? $GLOBALS['samatex_enovathemes']['site-background']['background-repeat'] : "no-repeat";
		$et_site_back_s     = (isset($GLOBALS['samatex_enovathemes']['site-background']['background-size']) && $GLOBALS['samatex_enovathemes']['site-background']['background-size']) ? $GLOBALS['samatex_enovathemes']['site-background']['background-size'] : "inherit";
		$et_site_back_a     = (isset($GLOBALS['samatex_enovathemes']['site-background']['background-attachment']) && $GLOBALS['samatex_enovathemes']['site-background']['background-attachment']) ? $GLOBALS['samatex_enovathemes']['site-background']['background-attachment'] : "inherit";
		$et_site_back_p     = (isset($GLOBALS['samatex_enovathemes']['site-background']['background-position']) && $GLOBALS['samatex_enovathemes']['site-background']['background-position']) ? $GLOBALS['samatex_enovathemes']['site-background']['background-position'] : "left top";

		$dynamic_css .='html,
		#gen-wrap {
			background-color:'.$et_site_back_col.';';
			if(!empty($et_site_back_img)){
				$dynamic_css .='background-image:url('.$et_site_back_img.');
				background-repeat:'.$et_site_back_r.';
				background-attachment: '.$et_site_back_a.';
				-webkit-background-size: '.$et_site_back_s.';
				-moz-background-size: '.$et_site_back_s.';
				background-size: '.$et_site_back_s.';
				background-position:'.$et_site_back_p;
			}
		$dynamic_css .='}';

	/* Site loading
	---------------*/

		$custom_loading_backcolor = (isset($GLOBALS['samatex_enovathemes']['custom-loading-backcolor']) && $GLOBALS['samatex_enovathemes']['custom-loading-backcolor']) ? $GLOBALS['samatex_enovathemes']['custom-loading-backcolor'] : "#ffffff";
		$custom_loading_color     = (isset($GLOBALS['samatex_enovathemes']['custom-loading-color']) && $GLOBALS['samatex_enovathemes']['custom-loading-color']) ? $GLOBALS['samatex_enovathemes']['custom-loading-color'] : "#ffd311";

		$dynamic_css .='.site-loading {
			background-color: '.$custom_loading_backcolor.';
		}';

		$dynamic_css .='.site-loading .site-loading-bar:after {
			background-color: '.$custom_loading_color.';
		}';

	/* Forms
	---------------*/

		$form_text_color_reg         = (isset($GLOBALS['samatex_enovathemes']['form-text-color']['regular']) && !empty($GLOBALS['samatex_enovathemes']['form-text-color']['regular'])) ? $GLOBALS['samatex_enovathemes']['form-text-color']['regular'] : '#616161';
		$form_text_color_hov         = (isset($GLOBALS['samatex_enovathemes']['form-text-color']['hover']) && !empty($GLOBALS['samatex_enovathemes']['form-text-color']['hover'])) ? $GLOBALS['samatex_enovathemes']['form-text-color']['hover'] : '#616161';
		$form_back_color_reg         = (isset($GLOBALS['samatex_enovathemes']['form-back-color']['regular']) && $GLOBALS['samatex_enovathemes']['form-back-color']['regular']) ? $GLOBALS['samatex_enovathemes']['form-back-color']['regular'] : "#ffffff";
		$form_back_color_hov         = (isset($GLOBALS['samatex_enovathemes']['form-back-color']['hover']) && $GLOBALS['samatex_enovathemes']['form-back-color']['hover']) ? $GLOBALS['samatex_enovathemes']['form-back-color']['hover'] : "#ffffff";
		$form_border_color_reg       = (isset($GLOBALS['samatex_enovathemes']['form-border-color']['regular']) && !empty($GLOBALS['samatex_enovathemes']['form-border-color']['regular'])) ? $GLOBALS['samatex_enovathemes']['form-border-color']['regular'] : "#e0e0e0";
		$form_border_color_hov       = (isset($GLOBALS['samatex_enovathemes']['form-border-color']['hover']) && !empty($GLOBALS['samatex_enovathemes']['form-border-color']['hover'])) ? $GLOBALS['samatex_enovathemes']['form-border-color']['hover'] : "#bdbdbd";

		$form_button_typo_font_family  	   = (isset($GLOBALS['samatex_enovathemes']['form-button-typo']['font-family']) && !empty($GLOBALS['samatex_enovathemes']['form-button-typo']['font-family'])) ? $GLOBALS['samatex_enovathemes']['form-button-typo']['font-family'] : "Nunito Sans, sans-serif";
		$form_button_typo_font_weight  	   = (isset($GLOBALS['samatex_enovathemes']['form-button-typo']['font-weight']) && !empty($GLOBALS['samatex_enovathemes']['form-button-typo']['font-weight'])) ? $GLOBALS['samatex_enovathemes']['form-button-typo']['font-weight'] : "700";
		$form_button_typo_letter_spacing   = (isset($GLOBALS['samatex_enovathemes']['form-button-typo']['letter-spacing']) && !empty($GLOBALS['samatex_enovathemes']['form-button-typo']['letter-spacing'])) ? $GLOBALS['samatex_enovathemes']['form-button-typo']['letter-spacing'] : "0.25px";
		$form_button_color_reg             = (isset($GLOBALS['samatex_enovathemes']['form-button-color']['regular']) && $GLOBALS['samatex_enovathemes']['form-button-color']['regular']) ? $GLOBALS['samatex_enovathemes']['form-button-color']['regular'] : "#000000";
		$form_button_color_hov             = (isset($GLOBALS['samatex_enovathemes']['form-button-color']['hover']) && $GLOBALS['samatex_enovathemes']['form-button-color']['hover']) ? $GLOBALS['samatex_enovathemes']['form-button-color']['hover'] : "#ffffff";
		$form_button_back_reg              = (isset($GLOBALS['samatex_enovathemes']['form-button-back']['regular']) && $GLOBALS['samatex_enovathemes']['form-button-back']['regular']) ? $GLOBALS['samatex_enovathemes']['form-button-back']['regular'] : "#ffd311";
		$form_button_back_hov              = (isset($GLOBALS['samatex_enovathemes']['form-button-back']['hover']) && $GLOBALS['samatex_enovathemes']['form-button-back']['hover']) ? $GLOBALS['samatex_enovathemes']['form-button-back']['hover'] : "#212121";

		$dynamic_css .='textarea, select,
		 input[type="date"], input[type="datetime"],
		 input[type="datetime-local"], input[type="email"],
		 input[type="month"], input[type="number"],
		 input[type="password"], input[type="search"],
		 input[type="tel"], input[type="text"],
		 input[type="time"], input[type="url"],
		 input[type="week"], input[type="file"] {
			color:'.$form_text_color_reg.';
			background-color:'.$form_back_color_reg.';
			border-color:'.$form_border_color_reg.';
		}';

		$dynamic_css .='.tech-page-search-form .search-icon,
		.widget_search form input[type="submit"]#searchsubmit + .search-icon, 
		.widget_product_search form input[type="submit"] + .search-icon {
			color:'.$form_text_color_reg.' !important;
		}';

		$dynamic_css .='.select2-container--default .select2-selection--single {
			color:'.$form_text_color_reg.' !important;
			background-color:'.$form_back_color_reg.' !important;
			border-color:'.$form_border_color_reg.' !important;
		}';

		$dynamic_css .='.select2-container--default .select2-selection--single .select2-selection__rendered{
			color:'.$form_text_color_reg.' !important;
		}';

		$dynamic_css .='.select2-dropdown,
		.select2-container--default .select2-search--dropdown .select2-search__field {
			background-color:'.$form_back_color_reg.' !important;
		}';

		$dynamic_css .='textarea:focus, select:focus,
		 input[type="date"]:focus, input[type="datetime"]:focus,
		 input[type="datetime-local"]:focus, input[type="email"]:focus,
		 input[type="month"]:focus, input[type="number"]:focus,
		 input[type="password"]:focus, input[type="search"]:focus,
		 input[type="tel"]:focus, input[type="text"]:focus,
		 input[type="time"]:focus, input[type="url"]:focus,
		 input[type="week"]:focus, input[type="file"]:focus {
			color:'.$form_text_color_hov.';
			border-color:'.$form_border_color_hov.';
			background-color:'.$form_back_color_hov.';';
		$dynamic_css .='}';

		$dynamic_css .='.tech-page-search-form [type="submit"]#searchsubmit:hover + .search-icon,
		.widget_search form input[type="submit"]#searchsubmit:hover + .search-icon, 
		.widget_product_search form input[type="submit"]:hover + .search-icon {
			color:'.$form_text_color_hov.' !important;
		}';

		$dynamic_css .='.select2-container--default .select2-selection--single:focus {
			color:'.$form_text_color_hov.' !important;
			border-color:'.$form_border_color_hov.' !important;
			background-color:'.$form_back_color_hov.' !important;';
		$dynamic_css .='}';

		$dynamic_css .='.select2-container--default .select2-selection--single .select2-selection__rendered:focus{
			color:'.$form_text_color_hov.' !important;
		}';

		$dynamic_css .='.select2-dropdown:focus,
		.select2-container--default .select2-search--dropdown .select2-search__field:focus {
			background-color:'.$form_back_color_hov.' !important;
		}';

		$dynamic_css .='input[type="button"],
		 input[type="reset"],
		 input[type="submit"],
		 button:not(.plyr__control),
		 a.checkout-button,
		 .return-to-shop a,
		 .wishlist_table .product-add-to-cart a,
		 .wishlist_table .yith-wcqv-button,
		 a.woocommerce-button,
		 #page-links > a,
		 .edit-link a,
		 .project-link,
		 .page-content-wrap .woocommerce-mini-cart__buttons > a,
		 .woocommerce .wishlist_table td.product-add-to-cart a,
		 .woocommerce-message .button,
		 a.error404-button,
		 .yith-woocompare-widget a.clear-all,
		 .yith-woocompare-widget a.compare {
			color:'.$form_button_color_reg.';
			font-family:'.$form_button_typo_font_family.'; 
			font-weight:'.$form_button_typo_font_weight.'; 
			letter-spacing:'.$form_button_typo_letter_spacing.'; 
			background-color:'.$form_button_back_reg.';';
		$dynamic_css .='}';

		$dynamic_css .='.et-button,
		.post-read-more,
		.comment-reply-link,
		.et-ajax-loader,
		.enovathemes-filter .filter,
		.enovathemes-filter .filter:before,
		.woocommerce-mini-cart__buttons > a,
		.product .button,
		.yith-woocompare-widget a.compare,
		.yith-woocompare-widget a.clear-all,
		.added_to_cart,
		.widget_tag_cloud .tagcloud a,
		.post-tags a,
		.widget_product_tag_cloud .tagcloud a,
		.project-tags a,
		.post-tags-single a {
			font-family:'.$form_button_typo_font_family.'; 
			font-weight:'.$form_button_typo_font_weight.'; 
			letter-spacing:'.$form_button_typo_letter_spacing.';
		}';

		$dynamic_css .='input[type="button"]:hover,
		input[type="reset"]:hover,
		input[type="submit"]:hover,
		button:hover,
		.yith-woocompare-widget a.compare:hover,
		.yith-woocompare-widget a.clear-all:hover,
		a.checkout-button:hover,
		.return-to-shop a:hover,
		.wishlist_table .product-add-to-cart a:hover,
		.wishlist_table .yith-wcqv-button:hover,
		a.woocommerce-button:hover,
		.woocommerce-mini-cart__buttons > a:hover,
		#page-links > a:hover,
		.edit-link a:hover,
		.et-ajax-loader:hover,
		.project-link:hover,
		.page-content-wrap .woocommerce-mini-cart__buttons > a:hover,
		.woocommerce .wishlist_table td.product-add-to-cart a:hover,
		.error404-button:hover,
		.yith-woocompare-widget a.clear-all:hover,
		.yith-woocompare-widget a.compare:hover {
			color:'.$form_button_color_hov.' !important;
			background-color:'.$form_button_back_hov.';';
		$dynamic_css .='}';

		$dynamic_css .='.et-ajax-loader.loading:hover:after {
			border: 2px solid '.$form_button_color_hov.';
		}';

		$dynamic_css .='.widget_price_filter .ui-slider .ui-slider-handle {
			background-color:'.$form_button_back_reg.';
		}';

	/* Post
	---------------*/

		$blog_post_title_min_height = (isset($GLOBALS['samatex_enovathemes']['blog-post-title-min-height']) && !empty($GLOBALS['samatex_enovathemes']['blog-post-title-min-height'])) ? $GLOBALS['samatex_enovathemes']['blog-post-title-min-height'] : "0";       
		$blog_meta_font_weight      = (isset($GLOBALS['samatex_enovathemes']['blog-meta-font-weight']) && !empty($GLOBALS['samatex_enovathemes']['blog-meta-font-weight'])) ? $GLOBALS['samatex_enovathemes']['blog-meta-font-weight'] : "700";       
		$blog_excerpt_font_weight   = (isset($GLOBALS['samatex_enovathemes']['blog-excerpt-font-weight']) && !empty($GLOBALS['samatex_enovathemes']['blog-excerpt-font-weight'])) ? $GLOBALS['samatex_enovathemes']['blog-excerpt-font-weight'] : "600";       

		$dynamic_css .='#loop-posts .post-title,
		.et-shortcode-posts .post-title {
			min-height:'.$blog_post_title_min_height.'px;
		}';

		$dynamic_css .='.post .post-meta,
		.enovathemes-navigation li a,
		.enovathemes-navigation li .current,
		.woocommerce-pagination li a,
		.woocommerce-pagination li .current
		.project .project-category,
		.related-posts-title,
		.comment-reply-title,
		.comments-title,
		.upsells > h4,
		.crosssells > h4,
		.related > h4,
		.project-description-title,
		.project-meta-title,
		#reply-title {
			font-weight:'.$blog_meta_font_weight.';
		}';

		$dynamic_css .='.post .post-excerpt {
			font-weight:'.$blog_excerpt_font_weight.';
		}';

	/* Projects
	---------------*/

		$project_image_effect_overlay_more       = (isset($GLOBALS['samatex_enovathemes']['project-image-effect-overlay-more']) && !empty($GLOBALS['samatex_enovathemes']['project-image-effect-overlay-more'])) ? $GLOBALS['samatex_enovathemes']['project-image-effect-overlay-more'] : "#000000";       
		$project_image_effect_overlay_more_hover = (isset($GLOBALS['samatex_enovathemes']['project-image-effect-overlay-more-hover']) && !empty($GLOBALS['samatex_enovathemes']['project-image-effect-overlay-more-hover'])) ? $GLOBALS['samatex_enovathemes']['project-image-effect-overlay-more-hover'] : "#ffffff";       
		$project_meta_font_weight                = (isset($GLOBALS['samatex_enovathemes']['project-meta-font-weight']) && !empty($GLOBALS['samatex_enovathemes']['project-meta-font-weight'])) ? $GLOBALS['samatex_enovathemes']['project-meta-font-weight'] : "800";       
		$project_title_font_weight                = (isset($GLOBALS['samatex_enovathemes']['project-title-font-weight']) && !empty($GLOBALS['samatex_enovathemes']['project-title-font-weight'])) ? $GLOBALS['samatex_enovathemes']['project-title-font-weight'] : "800";       

		
		$dynamic_css .='.project .project-category {
			font-weight:'.$project_meta_font_weight.' !important;
		}';

		$dynamic_css .='.project .post-title {
			font-weight:'.$project_title_font_weight.' !important;
		}';

		$dynamic_css .='.project-layout.project-with-overlay .overlay-read-more,
		.project-layout.project-with-overlay .project-category {
			color:'.$project_image_effect_overlay_more.';
		}';

		$dynamic_css .='.project-layout.project-with-overlay .overlay-read-more:hover {
			background-color:'.$project_image_effect_overlay_more.';
			color:'.$project_image_effect_overlay_more_hover.' !important;
		}';

	/* Products
	---------------*/
		
		$product_quick_modal_width  = (isset($GLOBALS['samatex_enovathemes']['product-quick-modal-width']) && !empty($GLOBALS['samatex_enovathemes']['product-quick-modal-width'])) ? $GLOBALS['samatex_enovathemes']['product-quick-modal-width'] : "1176";
		$product_quick_modal_height = (isset($GLOBALS['samatex_enovathemes']['product-quick-modal-height']) && !empty($GLOBALS['samatex_enovathemes']['product-quick-modal-height'])) ? $GLOBALS['samatex_enovathemes']['product-quick-modal-height'] : "588";

	/* Header/Footer/Page/Post
	---------------*/

		$title_section_id  = (isset($GLOBALS['samatex_enovathemes']['title-section-id']) && !empty($GLOBALS['samatex_enovathemes']['title-section-id'])) ? $GLOBALS['samatex_enovathemes']['title-section-id'] : "default";
	    $blog_title_id     = (isset($GLOBALS['samatex_enovathemes']['blog-title']) && !empty($GLOBALS['samatex_enovathemes']['blog-title'])) ? $GLOBALS['samatex_enovathemes']['blog-title'] : "none";
		$project_title_id  = (isset($GLOBALS['samatex_enovathemes']['project-title']) && !empty($GLOBALS['samatex_enovathemes']['project-title'])) ? $GLOBALS['samatex_enovathemes']['project-title'] : "none";
        $product_title_id  = (isset($GLOBALS['samatex_enovathemes']['product-title']) && !empty($GLOBALS['samatex_enovathemes']['product-title'])) ? $GLOBALS['samatex_enovathemes']['product-title'] : "none";

        $header_desktop_id = (isset($GLOBALS['samatex_enovathemes']['header-desktop-id']) && !empty($GLOBALS['samatex_enovathemes']['header-desktop-id'])) ? $GLOBALS['samatex_enovathemes']['header-desktop-id'] : "default";
        $header_mobile_id  = (isset($GLOBALS['samatex_enovathemes']['header-mobile-id']) && !empty($GLOBALS['samatex_enovathemes']['header-mobile-id'])) ? $GLOBALS['samatex_enovathemes']['header-mobile-id'] : "default";
        $footer_id         = (isset($GLOBALS['samatex_enovathemes']['footer-id']) && !empty($GLOBALS['samatex_enovathemes']['footer-id'])) ? $GLOBALS['samatex_enovathemes']['footer-id'] : "default";

        /* WPML
        ---------------*/

	        if (class_exists('SitePress') || function_exists('pll_the_languages')){

	        	$current_lang = (function_exists('pll_the_languages')) ? pll_current_language() : ICL_LANGUAGE_CODE;

	            // WPML
	            $header_desktop_id_wpml = (isset($GLOBALS['samatex_enovathemes']['header-desktop-id-wpml']) && !empty($GLOBALS['samatex_enovathemes']['header-desktop-id-wpml'])) ? $GLOBALS['samatex_enovathemes']['header-desktop-id-wpml'] : $header_desktop_id;
	            $header_mobile_id_wpml  = (isset($GLOBALS['samatex_enovathemes']['header-mobile-id-wpml']) && !empty($GLOBALS['samatex_enovathemes']['header-mobile-id-wpml'])) ? $GLOBALS['samatex_enovathemes']['header-mobile-id-wpml'] : $header_mobile_id;
	            $footer_id_wpml         = (isset($GLOBALS['samatex_enovathemes']['footer-id-wpml']) && !empty($GLOBALS['samatex_enovathemes']['footer-id-wpml'])) ? $GLOBALS['samatex_enovathemes']['footer-id-wpml'] : $footer_id;
				$title_section_id_wpml  = (isset($GLOBALS['samatex_enovathemes']['title-section-id-wpml']) && !empty($GLOBALS['samatex_enovathemes']['title-section-id-wpml'])) ? $GLOBALS['samatex_enovathemes']['title-section-id-wpml'] : $title_section_id;

	            if ($header_desktop_id_wpml != $header_desktop_id && !empty($header_desktop_id_wpml)) {
	                $header_desktop_id_wpml = explode('|', $header_desktop_id_wpml);

	                $lang_header_obj = array();

	                foreach ($header_desktop_id_wpml as $wpml_lang_header) {
	                    $lang_header_set = explode(":",$wpml_lang_header);
	                    $lang_header_obj[$lang_header_set[0]] = $lang_header_set[1];
	                }

	                if (array_key_exists($current_lang,$lang_header_obj)) {
	                    $header_desktop_id = $lang_header_obj[$current_lang];
	                }

	            }

	            if ($header_mobile_id_wpml != $header_mobile_id && !empty($header_mobile_id_wpml)) {
	                $header_mobile_id_wpml = explode('|', $header_mobile_id_wpml);

	                $lang_header_obj = array();

	                foreach ($header_mobile_id_wpml as $wpml_lang_header) {
	                    $lang_header_set = explode(":",$wpml_lang_header);
	                    $lang_header_obj[$lang_header_set[0]] = $lang_header_set[1];
	                }

	                if (array_key_exists($current_lang,$lang_header_obj)) {
	                    $header_mobile_id = $lang_header_obj[$current_lang];
	                }

	            }

                if ($footer_id_wpml != $footer_id && !empty($footer_id_wpml)) {
                    $footer_id_wpml = explode('|', $footer_id_wpml);

                    $lang_footer_obj = array();

                    foreach ($footer_id_wpml as $wpml_lang_footer) {
                        $lang_footer_set = explode(":",$wpml_lang_footer);
                        $lang_footer_obj[$lang_footer_set[0]] = $lang_footer_set[1];
                    }

                    if (array_key_exists($current_lang,$lang_footer_obj)) {
                        $footer_id = $lang_footer_obj[$current_lang];
                    }

                }

                if ($title_section_id_wpml != $title_section_id && !empty($title_section_id_wpml)) {
                    $title_section_id_wpml = explode('|', $title_section_id_wpml);

                    $lang_titlesection_obj = array();

                    foreach ($title_section_id_wpml as $wpml_lang_titlesection) {
                        $lang_titlesection_set = explode(":",$wpml_lang_titlesection);
                        $lang_titlesection_obj[$lang_titlesection_set[0]] = $lang_titlesection_set[1];
                    }

                    if (array_key_exists($current_lang,$lang_titlesection_obj)) {
                        $title_section_id = $lang_titlesection_obj[$current_lang];
                    }

                }
	        }


		/* Page
        ---------------*/

	        if (is_page()) {


	            $page_header_desktop_id = get_post_meta( get_the_ID(), 'enovathemes_addons_desktop_header', true );
                $page_header_mobile_id  = get_post_meta( get_the_ID(), 'enovathemes_addons_mobile_header', true );
                $page_footer_id 		= get_post_meta( get_the_ID(), 'enovathemes_addons_footer', true );
                $page_title_section_id  = get_post_meta( get_the_ID(), 'enovathemes_addons_title_section', true );


                if (empty($page_header_desktop_id) || !isset($page_header_desktop_id)) {
                	$page_header_desktop_id = "inherit";
                }

                if (empty($page_header_mobile_id) || !isset($page_header_mobile_id)) {
                	$page_header_mobile_id = "inherit";
                }

                if (empty($page_footer_id) || !isset($page_footer_id)) {
                	$page_footer_id = "inherit";
                }
                
                if (empty($page_title_section_id) || !isset($page_title_section_id)) {
                	$page_title_section_id = "inherit";
                }

                if ($page_header_desktop_id != "inherit") {
                    $header_desktop_id = $page_header_desktop_id;
                }

                if ($page_header_mobile_id != "inherit") {
                    $header_mobile_id = $page_header_mobile_id;
                }

                if ($page_footer_id != "inherit") {
                    $footer_id = $page_footer_id;
                }

                if ($page_title_section_id != "inherit") {
                    $title_section_id= $page_title_section_id;
                }

	            $element_css = get_post_meta(get_the_ID(), 'element_css', true);

	            if (!empty($element_css)) {
					$dynamic_css .= $element_css;
				}
	        }

        /* Blog
        ---------------*/

		    if (is_home() || is_category() || is_tag() || is_day() || is_month() || is_year() || is_author() || is_search() || is_singular('post')) {
		        if ($blog_title_id != "inherit") {
		        	$title_section_id = $blog_title_id;
		        }
		    }

		/*  CPT
        ---------------*/

        	if (!is_search()  && !is_404()) {
            
	            $post_info = get_post(get_the_ID());

	            if (!is_wp_error($post_info) && is_object($post_info)) {

	                $post_type   = $post_info->post_type;

	                if ($post_type != 'post' && $post_type != 'page') {
	                    switch ($post_type) {
	                        case 'project':
		                        if ($project_title_id != "inherit") {
						        	$title_section_id = $project_title_id;
						        }
	                            break;
	                        case 'product':
	                            if ($product_title_id != "inherit") {
						        	$title_section_id = $product_title_id;
						        }
	                            break;
	                        default :
	                            if ($blog_title_id != "inherit") {
						        	$title_section_id = $blog_title_id;
						        }
	                            break;
	                    }
	                }
	                
	            }

	        }

        /*  Singular header
        ---------------*/

        	if (is_singular('header')) {
        		$header_mobile_id = get_the_ID();
        		$header_desktop_id = get_the_ID();
        	}

        /*  Singular footer
        ---------------*/

        	if (is_singular('footer')) {
        		$footer_id = get_the_ID();
        	}

        /*  Singular title section
        ---------------*/

        	if (is_singular('title_section')) {
        		$title_section_id = get_the_ID();
        	}

        /*  Singular post
        ---------------*/

        	if (is_singular('post')) {
        		$element_css = get_post_meta(get_the_ID(), 'element_css', true);

	            if (!empty($element_css)) {
					$dynamic_css .= $element_css;
				}
        	}

        /*  Singular project
        ---------------*/

        	if (is_singular('project')) {
        		$element_css = get_post_meta(get_the_ID(), 'element_css', true);

	            if (!empty($element_css)) {
					$dynamic_css .= $element_css;
				}
        	}

        /*  Singular product
        ---------------*/

        	if (is_singular('product')) {
        		$element_css = get_post_meta(get_the_ID(), 'element_css', true);

	            if (!empty($element_css)) {
					$dynamic_css .= $element_css;
				}
        	}

        if ($header_desktop_id == $header_mobile_id && $header_desktop_id != "default") {
        	$header_mobile_id = "none";
        }

        /*  Mobile header
        ---------------*/

			if ($header_mobile_id != "none" && $header_mobile_id != "default") {

				$element_css               = get_post_meta($header_mobile_id, 'element_css', true);
				$wpb_shortcodes_custom_css = get_post_meta($header_mobile_id, '_wpb_shortcodes_custom_css', true);

				if (!empty($element_css)) {
					$dynamic_css .= $element_css;
				}

				if (!empty($wpb_shortcodes_custom_css)) {
					$dynamic_css .= $wpb_shortcodes_custom_css;
				}
			}

		/*  Desktop header
        ---------------*/

			if ($header_desktop_id != "none" && $header_desktop_id != "default") {

				$element_css               = get_post_meta($header_desktop_id, 'element_css', true);
				$wpb_shortcodes_custom_css = get_post_meta($header_desktop_id, '_wpb_shortcodes_custom_css', true);

				if (!empty($element_css)) {
					$dynamic_css .= $element_css;
				}

				if (!empty($wpb_shortcodes_custom_css)) {
					$dynamic_css .= $wpb_shortcodes_custom_css;
				}
			}

		/*  Megamenu
        ---------------*/

			$query_options = array(
				'post_type'           => 'megamenu',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => 1,
				'posts_per_page' 	  => -1, 
			);

			$megamenu = new WP_Query($query_options);
			if ($megamenu->have_posts()){
				while($megamenu->have_posts()) { $megamenu->the_post();
					$megamenu_id = get_the_ID();

					$megamenu_position         = get_post_meta($megamenu_id, 'enovathemes_addons_megamenu_position', true);
					$megamenu_width            = get_post_meta($megamenu_id, 'enovathemes_addons_megamenu_width', true);
					$megamenu_offset           = get_post_meta($megamenu_id, 'enovathemes_addons_megamenu_offset', true);
					$element_css               = get_post_meta($megamenu_id, 'element_css', true);
					$wpb_shortcodes_custom_css = get_post_meta($megamenu_id, '_wpb_shortcodes_custom_css', true);

					if (!empty($element_css)) {
						$dynamic_css .= $element_css;
					}

					if (!empty($wpb_shortcodes_custom_css)) {
						$dynamic_css .= $wpb_shortcodes_custom_css;
					}

					if (empty($megamenu_width)) {
						$megamenu_width = 1200;
					}

					if (!is_singular('megamenu')) {

						if ($megamenu_width != 1200 && $megamenu_width != 100) {
							$megamenu_width = abs((1200*($megamenu_width/100)));
							$dynamic_css .= '#megamenu'.'-'.$megamenu_id.' {width:'.$megamenu_width.'px;max-width:'.$megamenu_width.'px;}';
						} elseif($megamenu_width == 1200){
							$dynamic_css .= '#megamenu'.'-'.$megamenu_id.' {width:1200px;max-width:1200px;}';
						}

						if (!empty($megamenu_offset) && $megamenu_width != 100) {
							if ($megamenu_position == 'left' || $megamenu_position == 'center') {
								$dynamic_css .= '.header-menu #megamenu'.'-'.$megamenu_id.' {margin-left:'.$megamenu_offset.'px !important;}';
							} elseif($megamenu_position == 'right') {
								$dynamic_css .= '.header-menu #megamenu'.'-'.$megamenu_id.' {margin-right:'.$megamenu_offset.'px !important;}';
							}
						}

						if ($megamenu_width != 100 && $megamenu_position == 'center' && empty($megamenu_offset)) {
							$dynamic_css .= '.header-menu #megamenu'.'-'.$megamenu_id.' {margin-left:-'.($megamenu_width/2).'px !important;}';
						}

					}

					/*  Megamenu forms
    				---------------*/

    					$megamenu_custom_form_styling      = get_post_meta($megamenu_id, 'enovathemes_addons_custom_form_styling', true);

    					if ($megamenu_custom_form_styling == "on") {

							$megamenu_field_color              = get_post_meta($megamenu_id, 'enovathemes_addons_field_color', true);
							$megamenu_field_color_focus        = get_post_meta($megamenu_id, 'enovathemes_addons_field_color_focus', true);
							$megamenu_field_back_color         = get_post_meta($megamenu_id, 'enovathemes_addons_field_back_color', true);
							$megamenu_field_back_color_focus   = get_post_meta($megamenu_id, 'enovathemes_addons_field_back_color_focus', true);
							$megamenu_field_border_color       = get_post_meta($megamenu_id, 'enovathemes_addons_field_border_color', true);
							$megamenu_field_border_color_focus = get_post_meta($megamenu_id, 'enovathemes_addons_field_border_color_focus', true);
							$megamenu_button_color             = get_post_meta($megamenu_id, 'enovathemes_addons_button_color', true);
							$megamenu_button_color_hover       = get_post_meta($megamenu_id, 'enovathemes_addons_button_color_hover', true);
							$megamenu_button_back_color        = get_post_meta($megamenu_id, 'enovathemes_addons_button_back_color', true);
							$megamenu_button_back_color_hover  = get_post_meta($megamenu_id, 'enovathemes_addons_button_back_color_hover', true);

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' textarea, 
							#megamenu'.'-'.$megamenu_id.' select,
							#megamenu'.'-'.$megamenu_id.' input[type="date"], 
							#megamenu'.'-'.$megamenu_id.' input[type="datetime"],
							#megamenu'.'-'.$megamenu_id.' input[type="datetime-local"], 
							#megamenu'.'-'.$megamenu_id.' input[type="email"],
							#megamenu'.'-'.$megamenu_id.' input[type="month"], 
							#megamenu'.'-'.$megamenu_id.' input[type="number"],
							#megamenu'.'-'.$megamenu_id.' input[type="password"], 
							#megamenu'.'-'.$megamenu_id.' input[type="search"],
							#megamenu'.'-'.$megamenu_id.' input[type="tel"], 
							#megamenu'.'-'.$megamenu_id.' input[type="text"],
							#megamenu'.'-'.$megamenu_id.' input[type="time"], 
							#megamenu'.'-'.$megamenu_id.' input[type="url"],
							#megamenu'.'-'.$megamenu_id.' input[type="week"], 
							#megamenu'.'-'.$megamenu_id.' input[type="file"] {
								color:'.$megamenu_field_color.';
								background-color:'.$megamenu_field_back_color.';
								border-color:'.$megamenu_field_border_color.';
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' textarea:focus, 
							#megamenu'.'-'.$megamenu_id.' select:focus,
							#megamenu'.'-'.$megamenu_id.' input[type="date"]:focus, 
							#megamenu'.'-'.$megamenu_id.' input[type="datetime"]:focus,
							#megamenu'.'-'.$megamenu_id.' input[type="datetime-local"]:focus, 
							#megamenu'.'-'.$megamenu_id.' input[type="email"]:focus,
							#megamenu'.'-'.$megamenu_id.' input[type="month"]:focus, 
							#megamenu'.'-'.$megamenu_id.' input[type="number"]:focus,
							#megamenu'.'-'.$megamenu_id.' input[type="password"]:focus, 
							#megamenu'.'-'.$megamenu_id.' input[type="search"]:focus,
							#megamenu'.'-'.$megamenu_id.' input[type="tel"]:focus, 
							#megamenu'.'-'.$megamenu_id.' input[type="text"]:focus,
							#megamenu'.'-'.$megamenu_id.' input[type="time"]:focus, 
							#megamenu'.'-'.$megamenu_id.' input[type="url"]:focus,
							#megamenu'.'-'.$megamenu_id.' input[type="week"]:focus, 
							#megamenu'.'-'.$megamenu_id.' input[type="file"]:focus {
								color:'.$megamenu_field_color_focus.';
								background-color:'.$megamenu_field_back_color_focus.';
								border-color:'.$megamenu_field_border_color_focus.';
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_product_search form button:before{
								color:'.$megamenu_field_color.' !important;
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_product_search form button:hover:before{
								color:'.$megamenu_field_color_focus.' !important;
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' input[type="button"],
							#megamenu'.'-'.$megamenu_id.' input[type="reset"],
							#megamenu'.'-'.$megamenu_id.' input[type="submit"],
							#megamenu'.'-'.$megamenu_id.' button:not(.plyr__control),
							#megamenu'.'-'.$megamenu_id.' .woocommerce-mini-cart__buttons > a {
								color:'.$megamenu_button_color.';
								background-color:'.$megamenu_button_back_color.';';
							$dynamic_css .='}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' input[type="button"]:hover,
							#megamenu'.'-'.$megamenu_id.' input[type="reset"]:hover,
							#megamenu'.'-'.$megamenu_id.' input[type="submit"]:hover,
							#megamenu'.'-'.$megamenu_id.' button:hover,
							#megamenu'.'-'.$megamenu_id.' .woocommerce-mini-cart__buttons > a:hover {
								color:'.$megamenu_button_color_hover.' !important;
								background-color:'.$megamenu_button_back_color_hover.';';
							$dynamic_css .='}';

						}

					/*  Megamenu widgets
    				---------------*/

    					$megamenu_custom_widget_styling = get_post_meta($megamenu_id, 'enovathemes_addons_custom_widget_styling', true);

    					if ($megamenu_custom_widget_styling == "on") {

							$megamenu_widget_title_color      = get_post_meta($megamenu_id, 'enovathemes_addons_widget_title_color', true);
							$megamenu_widget_color            = get_post_meta($megamenu_id, 'enovathemes_addons_widget_color', true);
							$megamenu_widget_link_color       = get_post_meta($megamenu_id, 'enovathemes_addons_widget_link_color', true);
							$megamenu_widget_link_color_hover = get_post_meta($megamenu_id, 'enovathemes_addons_widget_link_color_hover', true);

							$megamenu_widget_color_brightness = samatex_enovathemes_brightness($megamenu_widget_color);

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_title,
							#megamenu'.'-'.$megamenu_id.' .widgettitle {
								color:'.$megamenu_widget_title_color.';
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget,
							#megamenu'.'-'.$megamenu_id.' .widget_categories ul li a,
							#megamenu'.'-'.$megamenu_id.' .widget_pages ul li a,
							#megamenu'.'-'.$megamenu_id.' .widget_archive ul li a,
							#megamenu'.'-'.$megamenu_id.' .widget_meta ul li a,
							#megamenu'.'-'.$megamenu_id.' .widget_recent_entries ul li a, 
							#megamenu'.'-'.$megamenu_id.' .widget_rss ul li a,
							#megamenu'.'-'.$megamenu_id.' .widget_icl_lang_sel_widget li a,
							#megamenu'.'-'.$megamenu_id.' .recentcomments a,
							#megamenu'.'-'.$megamenu_id.' .widget_shopping_cart .cart_list li .remove,
							#megamenu'.'-'.$megamenu_id.' .widget_calendar a,
							#megamenu'.'-'.$megamenu_id.' .widget_tag_cloud .tagcloud a,
							#megamenu'.'-'.$megamenu_id.' .widget_product_tag_cloud .tagcloud a,
							#megamenu'.'-'.$megamenu_id.' .widget_price_filter .price_label {
								color:'.$megamenu_widget_color.' !important;
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_layered_nav ul li a, 
							#megamenu'.'-'.$megamenu_id.' .widget_nav_menu ul li a, 
							#megamenu'.'-'.$megamenu_id.' .widget_product_categories ul li a,
							#megamenu'.'-'.$megamenu_id.' .widget_et_recent_entries .post-title a,
							#megamenu'.'-'.$megamenu_id.' .widget_products .product_list_widget > li .product-title a,
							#megamenu'.'-'.$megamenu_id.' .widget_recently_viewed_products .product_list_widget > li .product-title a,
							#megamenu'.'-'.$megamenu_id.' .widget_recent_reviews .product_list_widget > li .product-title a,
							#megamenu'.'-'.$megamenu_id.' .widget_top_rated_products .product_list_widget > li .product-title a,
							#megamenu'.'-'.$megamenu_id.' .widget_shopping_cart .cart-product-title a {
								color:'.samatex_enovathemes_hex_to_rgb_shade($megamenu_widget_color,50).' !important;
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget a:not(.button):not(.et-button),
							#megamenu'.'-'.$megamenu_id.' .widget_nav_menu ul li.current-menu-item a {
								color:'.$megamenu_widget_link_color.';
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget a:not(.button):not(.et-button):hover,
							#megamenu'.'-'.$megamenu_id.' .widget_shopping_cart .cart-product-title a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_shopping_cart .cart-product-title:hover a,
							#megamenu'.'-'.$megamenu_id.' .widget_products .product_list_widget > li > a:hover .product-title,
							#megamenu'.'-'.$megamenu_id.' .widget_recently_viewed_products .product_list_widget > li > a:hover .product-title,
							#megamenu'.'-'.$megamenu_id.' .widget_recent_reviews .product_list_widget > li > a:hover .product-title,
							#megamenu'.'-'.$megamenu_id.' .widget_top_rated_products .product_list_widget > li > a:hover .product-title,
							#megamenu'.'-'.$megamenu_id.' .widget_et_recent_entries .post-title:hover a,
							#megamenu'.'-'.$megamenu_id.' .widget_categories ul li a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_pages ul li a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_archive ul li a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_meta ul li a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_layered_nav ul li a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_nav_menu ul li a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_product_categories ul li a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_recent_entries ul li a:hover, 
							#megamenu'.'-'.$megamenu_id.' .widget_rss ul li a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_icl_lang_sel_widget li a:hover,
							#megamenu'.'-'.$megamenu_id.' .widget_products .product_list_widget > li .product-title:hover a,
							#megamenu'.'-'.$megamenu_id.' .widget_recently_viewed_products .product_list_widget > li .product-title:hover a,
							#megamenu'.'-'.$megamenu_id.' .widget_recent_reviews .product_list_widget > li .product-title:hover a,
							#megamenu'.'-'.$megamenu_id.' .widget_top_rated_products .product_list_widget > li .product-title:hover a,
							#megamenu'.'-'.$megamenu_id.' .widget_shopping_cart .cart_list li .remove:hover {
								color:'.$megamenu_widget_link_color_hover.' !important;
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_tag_cloud .tagcloud a:after,
							#megamenu'.'-'.$megamenu_id.' .widget_product_tag_cloud .tagcloud a:after {
								background-color:'.$megamenu_widget_color.' !important;
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_tag_cloud .tagcloud a:hover:after,
							#megamenu'.'-'.$megamenu_id.' .widget_product_tag_cloud .tagcloud a:hover:after,
							#megamenu'.'-'.$megamenu_id.' .project-tags a:hover:after{
								background-color:'.$megamenu_widget_link_color_hover.' !important;
							}';
							
							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_schedule ul li,
							#megamenu'.'-'.$megamenu_id.' .widget_nav_menu ul li a + ul li:before,
							#megamenu'.'-'.$megamenu_id.' .widget_product_categories ul li a + ul li:before,
							#megamenu'.'-'.$megamenu_id.' .widget_shopping_cart .product_list_widget > li:not(:last-child):before,
							#megamenu'.'-'.$megamenu_id.' .woocommerce-mini-cart__total:before,
							#megamenu'.'-'.$megamenu_id.' .widget_price_filter .ui-slider-horizontal {
								background-color:'.samatex_enovathemes_hex_to_rgba($megamenu_widget_color,0.1).';
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_calendar th,
							#megamenu'.'-'.$megamenu_id.' .widget_calendar th:first-child,
							#megamenu'.'-'.$megamenu_id.' .widget_calendar th:last-child,
							#megamenu'.'-'.$megamenu_id.' .widget_calendar td,
							#megamenu'.'-'.$megamenu_id.' .widget_calendar caption,
							#megamenu'.'-'.$megamenu_id.' .widget_icl_lang_sel_widget li a {
								border-color:'.samatex_enovathemes_hex_to_rgba($megamenu_widget_color,0.2).';
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_schedule ul li:nth-child(2n+1) {
								color:'.samatex_enovathemes_hex_to_rgb_shade($megamenu_widget_color,-30).';
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_et_recent_entries .post-date,
							#megamenu'.'-'.$megamenu_id.' .star-rating:before {
								color:'.samatex_enovathemes_hex_to_rgb_shade($megamenu_widget_color,30).';
							}';

							if ($megamenu_widget_color_brightness == "light") {
								$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget .image-preloader {
									background-color:'.samatex_enovathemes_hex_to_rgb_shade($megamenu_widget_color,150).';
								}';
							} else {
								$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget .image-preloader {
									background-color:'.samatex_enovathemes_hex_to_rgb_shade($megamenu_widget_color,-150).';
								}';
							}

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_nav_menu > div > ul > li > a, 
							#megamenu'.'-'.$megamenu_id.' .widget_product_categories > ul > li > a,
							#megamenu'.'-'.$megamenu_id.' .widget_categories ul li, 
							#megamenu'.'-'.$megamenu_id.' .widget_pages ul li, 
							#megamenu'.'-'.$megamenu_id.' .widget_archive ul li, 
							#megamenu'.'-'.$megamenu_id.' .widget_meta ul li, 
							#megamenu'.'-'.$megamenu_id.' .widget_schedule ul li, 
							#megamenu'.'-'.$megamenu_id.' .widget_layered_nav ul li, 
							#megamenu'.'-'.$megamenu_id.' .yith-woocompare-widget ul.products-list li,
							#megamenu'.'-'.$megamenu_id.' .widget_et_recent_entries .post,
							#megamenu'.'-'.$megamenu_id.' .widget_products .product_list_widget > li, 
							#megamenu'.'-'.$megamenu_id.' .widget_recently_viewed_products .product_list_widget > li, 
							#megamenu'.'-'.$megamenu_id.' .widget_recent_reviews .product_list_widget > li, 
							#megamenu'.'-'.$megamenu_id.' .widget_top_rated_products .product_list_widget > li {
							    background-color:'.samatex_enovathemes_hex_to_rgba($megamenu_widget_color,0.05).';
								border-color:'.samatex_enovathemes_hex_to_rgba($megamenu_widget_color,0.07).';
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_tag_cloud .tagcloud a, 
							#megamenu'.'-'.$megamenu_id.' .post-tags a, 
							#megamenu'.'-'.$megamenu_id.' .widget_product_tag_cloud .tagcloud a, 
							#megamenu'.'-'.$megamenu_id.' .project-tags a,
							#megamenu'.'-'.$megamenu_id.' .post-tags-single a {
								box-shadow: inset 0 0 0 1px '.$megamenu_widget_color.';
								color:'.$megamenu_widget_color.';
							}';

							$dynamic_css .='#megamenu'.'-'.$megamenu_id.' .widget_tag_cloud .tagcloud a:not(.button):not(.et-button):hover, 
							#megamenu'.'-'.$megamenu_id.' .post-tags a:not(.button):not(.et-button):hover, 
							#megamenu'.'-'.$megamenu_id.' .widget_product_tag_cloud .tagcloud a:not(.button):not(.et-button):hover, 
							#megamenu'.'-'.$megamenu_id.' .project-tags a:not(.button):not(.et-button):hover, 
							#megamenu'.'-'.$megamenu_id.' .post-tags-single a:not(.button):not(.et-button):hover {
								box-shadow: inset 0 0 0 1px '.$megamenu_widget_link_color.';
								color:'.$megamenu_widget_link_color.' !important;
							}';
							
						}
				}
				wp_reset_postdata();
			}

		/*  Title section
        ---------------*/

			if ($title_section_id != "none" && $title_section_id != "default") {

				$element_css               = get_post_meta($title_section_id, 'element_css', true);
				$wpb_shortcodes_custom_css = get_post_meta($title_section_id, '_wpb_shortcodes_custom_css', true);

				if (!empty($element_css)) {
					$dynamic_css .= $element_css;
				}

				if (!empty($wpb_shortcodes_custom_css)) {
					$dynamic_css .= $wpb_shortcodes_custom_css;
				}
			}

		/*  Footer
        ---------------*/

			if ($footer_id != "none" && $footer_id != "default") {

				$element_css               = get_post_meta($footer_id, 'element_css', true);
				$wpb_shortcodes_custom_css = get_post_meta($footer_id, '_wpb_shortcodes_custom_css', true);

				if (!empty($element_css)) {
					$dynamic_css .= $element_css;
				}

				if (!empty($wpb_shortcodes_custom_css)) {
					$dynamic_css .= $wpb_shortcodes_custom_css;
				}

				/*  Footer forms
				---------------*/

					$footer_custom_form_styling      = get_post_meta($footer_id, 'enovathemes_addons_custom_form_styling', true);

					if ($footer_custom_form_styling == "on") {

						$footer_field_color              = get_post_meta($footer_id, 'enovathemes_addons_field_color', true);
						$footer_field_color_focus        = get_post_meta($footer_id, 'enovathemes_addons_field_color_focus', true);
						$footer_field_back_color         = get_post_meta($footer_id, 'enovathemes_addons_field_back_color', true);
						$footer_field_back_color_focus   = get_post_meta($footer_id, 'enovathemes_addons_field_back_color_focus', true);
						$footer_field_border_color       = get_post_meta($footer_id, 'enovathemes_addons_field_border_color', true);
						$footer_field_border_color_focus = get_post_meta($footer_id, 'enovathemes_addons_field_border_color_focus', true);
						$footer_button_color             = get_post_meta($footer_id, 'enovathemes_addons_button_color', true);
						$footer_button_color_hover       = get_post_meta($footer_id, 'enovathemes_addons_button_color_hover', true);
						$footer_button_back_color        = get_post_meta($footer_id, 'enovathemes_addons_button_back_color', true);
						$footer_button_back_color_hover  = get_post_meta($footer_id, 'enovathemes_addons_button_back_color_hover', true);

						$dynamic_css .='#et-footer'.'-'.$footer_id.' textarea, 
						#et-footer'.'-'.$footer_id.' select,
						#et-footer'.'-'.$footer_id.' input[type="date"], 
						#et-footer'.'-'.$footer_id.' input[type="datetime"],
						#et-footer'.'-'.$footer_id.' input[type="datetime-local"], 
						#et-footer'.'-'.$footer_id.' input[type="email"],
						#et-footer'.'-'.$footer_id.' input[type="month"], 
						#et-footer'.'-'.$footer_id.' input[type="number"],
						#et-footer'.'-'.$footer_id.' input[type="password"], 
						#et-footer'.'-'.$footer_id.' input[type="search"],
						#et-footer'.'-'.$footer_id.' input[type="tel"], 
						#et-footer'.'-'.$footer_id.' input[type="text"],
						#et-footer'.'-'.$footer_id.' input[type="time"], 
						#et-footer'.'-'.$footer_id.' input[type="url"],
						#et-footer'.'-'.$footer_id.' input[type="week"], 
						#et-footer'.'-'.$footer_id.' input[type="file"] {
							color:'.$footer_field_color.';
							background-color:'.$footer_field_back_color.';
							border-color:'.$footer_field_border_color.';
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' textarea:focus, 
						#et-footer'.'-'.$footer_id.' select:focus,
						#et-footer'.'-'.$footer_id.' input[type="date"]:focus, 
						#et-footer'.'-'.$footer_id.' input[type="datetime"]:focus,
						#et-footer'.'-'.$footer_id.' input[type="datetime-local"]:focus, 
						#et-footer'.'-'.$footer_id.' input[type="email"]:focus,
						#et-footer'.'-'.$footer_id.' input[type="month"]:focus, 
						#et-footer'.'-'.$footer_id.' input[type="number"]:focus,
						#et-footer'.'-'.$footer_id.' input[type="password"]:focus, 
						#et-footer'.'-'.$footer_id.' input[type="search"]:focus,
						#et-footer'.'-'.$footer_id.' input[type="tel"]:focus, 
						#et-footer'.'-'.$footer_id.' input[type="text"]:focus,
						#et-footer'.'-'.$footer_id.' input[type="time"]:focus, 
						#et-footer'.'-'.$footer_id.' input[type="url"]:focus,
						#et-footer'.'-'.$footer_id.' input[type="week"]:focus, 
						#et-footer'.'-'.$footer_id.' input[type="file"]:focus {
							color:'.$footer_field_color_focus.';
							background-color:'.$footer_field_back_color_focus.';
							border-color:'.$footer_field_border_color_focus.';
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_product_search form button:before{
							color:'.$footer_field_color.' !important;
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_product_search form button:hover:before{
							color:'.$footer_field_color_focus.' !important;
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' input[type="button"],
						#et-footer'.'-'.$footer_id.' input[type="reset"],
						#et-footer'.'-'.$footer_id.' input[type="submit"],
						#et-footer'.'-'.$footer_id.' button:not(.plyr__control),
						#et-footer'.'-'.$footer_id.' .woocommerce-mini-cart__buttons > a {
							color:'.$footer_button_color.';
							background-color:'.$footer_button_back_color.';';
						$dynamic_css .='}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' input[type="button"]:hover,
						#et-footer'.'-'.$footer_id.' input[type="reset"]:hover,
						#et-footer'.'-'.$footer_id.' input[type="submit"]:hover,
						#et-footer'.'-'.$footer_id.' button:hover,
						#et-footer'.'-'.$footer_id.' .woocommerce-mini-cart__buttons > a:hover {
							color:'.$footer_button_color_hover.' !important;
							background-color:'.$footer_button_back_color_hover.';';
						$dynamic_css .='}';

					}

				/*  Footer widgets
				---------------*/

					$footer_custom_widget_styling = get_post_meta($footer_id, 'enovathemes_addons_custom_widget_styling', true);

					if ($footer_custom_widget_styling == "on") {

						$footer_widget_title_color      = get_post_meta($footer_id, 'enovathemes_addons_widget_title_color', true);
						$footer_widget_color            = get_post_meta($footer_id, 'enovathemes_addons_widget_color', true);
						$footer_widget_link_color       = get_post_meta($footer_id, 'enovathemes_addons_widget_link_color', true);
						$footer_widget_link_color_hover = get_post_meta($footer_id, 'enovathemes_addons_widget_link_color_hover', true);

						$footer_widget_color_brightness = samatex_enovathemes_brightness($footer_widget_color);

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_title,
						#et-footer'.'-'.$footer_id.' .widgettitle {
							color:'.$footer_widget_title_color.';
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget,
						#et-footer'.'-'.$footer_id.' .widget_categories ul li a,
						#et-footer'.'-'.$footer_id.' .widget_pages ul li a,
						#et-footer'.'-'.$footer_id.' .widget_archive ul li a,
						#et-footer'.'-'.$footer_id.' .widget_meta ul li a,
						#et-footer'.'-'.$footer_id.' .widget_recent_entries ul li a, 
						#et-footer'.'-'.$footer_id.' .widget_rss ul li a,
						#et-footer'.'-'.$footer_id.' .widget_icl_lang_sel_widget li a,
						#et-footer'.'-'.$footer_id.' .recentcomments a,
						#et-footer'.'-'.$footer_id.' .widget_shopping_cart .cart_list li .remove,
						#et-footer'.'-'.$footer_id.' .widget_calendar a,
						#et-footer'.'-'.$footer_id.' .widget_tag_cloud .tagcloud a,
						#et-footer'.'-'.$footer_id.' .widget_product_tag_cloud .tagcloud a,
						#et-footer'.'-'.$footer_id.' .widget_price_filter .price_label {
							color:'.$footer_widget_color.' !important;
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_layered_nav ul li a, 
						#et-footer'.'-'.$footer_id.' .widget_nav_menu ul li a, 
						#et-footer'.'-'.$footer_id.' .widget_product_categories ul li a,
						#et-footer'.'-'.$footer_id.' .widget_et_recent_entries .post-title a,
						#et-footer'.'-'.$footer_id.' .widget_products .product_list_widget > li .product-title a,
						#et-footer'.'-'.$footer_id.' .widget_recently_viewed_products .product_list_widget > li .product-title a,
						#et-footer'.'-'.$footer_id.' .widget_recent_reviews .product_list_widget > li .product-title a,
						#et-footer'.'-'.$footer_id.' .widget_top_rated_products .product_list_widget > li .product-title a,
						#et-footer'.'-'.$footer_id.' .widget_shopping_cart .cart-product-title a {
							color:'.samatex_enovathemes_hex_to_rgb_shade($footer_widget_color,50).' !important;
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget a:not(.button):not(.et-button),
						#et-footer'.'-'.$megamenu_id.' .widget_nav_menu ul li.current-menu-item a {
							color:'.$footer_widget_link_color.';
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget a:not(.button):not(.et-button):hover,
						#et-footer'.'-'.$footer_id.' .widget_shopping_cart .cart-product-title a:hover,
						#et-footer'.'-'.$footer_id.' .widget_shopping_cart .cart-product-title:hover a,
						#et-footer'.'-'.$footer_id.' .widget_products .product_list_widget > li > a:hover .product-title,
						#et-footer'.'-'.$footer_id.' .widget_recently_viewed_products .product_list_widget > li > a:hover .product-title,
						#et-footer'.'-'.$footer_id.' .widget_recent_reviews .product_list_widget > li > a:hover .product-title,
						#et-footer'.'-'.$footer_id.' .widget_top_rated_products .product_list_widget > li > a:hover .product-title,
						#et-footer'.'-'.$footer_id.' .widget_et_recent_entries .post-title:hover a,
						#et-footer'.'-'.$footer_id.' .widget_categories ul li a:hover,
						#et-footer'.'-'.$footer_id.' .widget_pages ul li a:hover,
						#et-footer'.'-'.$footer_id.' .widget_archive ul li a:hover,
						#et-footer'.'-'.$footer_id.' .widget_meta ul li a:hover,
						#et-footer'.'-'.$footer_id.' .widget_layered_nav ul li a:hover,
						#et-footer'.'-'.$footer_id.' .widget_nav_menu ul li a:hover,
						#et-footer'.'-'.$footer_id.' .widget_product_categories ul li a:hover,
						#et-footer'.'-'.$footer_id.' .widget_recent_entries ul li a:hover, 
						#et-footer'.'-'.$footer_id.' .widget_rss ul li a:hover,
						#et-footer'.'-'.$footer_id.' .widget_icl_lang_sel_widget li a:hover,
						#et-footer'.'-'.$footer_id.' .widget_products .product_list_widget > li .product-title:hover a,
						#et-footer'.'-'.$footer_id.' .widget_recently_viewed_products .product_list_widget > li .product-title:hover a,
						#et-footer'.'-'.$footer_id.' .widget_recent_reviews .product_list_widget > li .product-title:hover a,
						#et-footer'.'-'.$footer_id.' .widget_top_rated_products .product_list_widget > li .product-title:hover a,
						#et-footer'.'-'.$footer_id.' .widget_shopping_cart .cart_list li .remove:hover {
							color:'.$footer_widget_link_color_hover.' !important;
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_tag_cloud .tagcloud a:after,
						#et-footer'.'-'.$footer_id.' .widget_product_tag_cloud .tagcloud a:after {
							background-color:'.$footer_widget_color.' !important;
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_tag_cloud .tagcloud a:hover:after,
						#et-footer'.'-'.$footer_id.' .widget_product_tag_cloud .tagcloud a:hover:after,
						#et-footer'.'-'.$footer_id.' .project-tags a:hover:after{
							background-color:'.$footer_widget_link_color_hover.' !important;
						}';
						
						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_schedule ul li,
						#et-footer'.'-'.$footer_id.' .widget_nav_menu ul li a + ul li:before,
						#et-footer'.'-'.$footer_id.' .widget_product_categories ul li a + ul li:before,
						#et-footer'.'-'.$footer_id.' .widget_shopping_cart .product_list_widget > li:not(:last-child):before,
						#et-footer'.'-'.$footer_id.' .woocommerce-mini-cart__total:before,
						#et-footer'.'-'.$footer_id.' .widget_price_filter .ui-slider-horizontal {
							background-color:'.samatex_enovathemes_hex_to_rgba($footer_widget_color,0.1).';
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_calendar th,
						#et-footer'.'-'.$footer_id.' .widget_calendar th:first-child,
						#et-footer'.'-'.$footer_id.' .widget_calendar th:last-child,
						#et-footer'.'-'.$footer_id.' .widget_calendar td,
						#et-footer'.'-'.$footer_id.' .widget_calendar caption,
						#et-footer'.'-'.$footer_id.' .widget_icl_lang_sel_widget li a {
							border-color:'.samatex_enovathemes_hex_to_rgba($footer_widget_color,0.2).';
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_schedule ul li:nth-child(2n+1) {
							color:'.samatex_enovathemes_hex_to_rgb_shade($footer_widget_color,-30).';
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_et_recent_entries .post-date,
						#et-footer'.'-'.$footer_id.' .star-rating:before {
							color:'.samatex_enovathemes_hex_to_rgb_shade($footer_widget_color,30).';
						}';

						if ($footer_widget_color_brightness == "light") {
							$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget .image-preloader {
								background-color:'.samatex_enovathemes_hex_to_rgb_shade($footer_widget_color,150).';
							}';
						} else {
							$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget .image-preloader {
								background-color:'.samatex_enovathemes_hex_to_rgb_shade($footer_widget_color,-150).';
							}';
						}

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_nav_menu > div > ul > li > a, 
						#et-footer'.'-'.$footer_id.' .widget_product_categories > ul > li > a,
						#et-footer'.'-'.$footer_id.' .widget_categories ul li, 
						#et-footer'.'-'.$footer_id.' .widget_pages ul li, 
						#et-footer'.'-'.$footer_id.' .widget_archive ul li, 
						#et-footer'.'-'.$footer_id.' .widget_meta ul li, 
						#et-footer'.'-'.$footer_id.' .widget_schedule ul li, 
						#et-footer'.'-'.$footer_id.' .widget_layered_nav ul li, 
						#et-footer'.'-'.$footer_id.' .yith-woocompare-widget ul.products-list li,
						#et-footer'.'-'.$footer_id.' .widget_et_recent_entries .post,
						#et-footer'.'-'.$footer_id.' .widget_products .product_list_widget > li, 
						#et-footer'.'-'.$footer_id.' .widget_recently_viewed_products .product_list_widget > li, 
						#et-footer'.'-'.$footer_id.' .widget_recent_reviews .product_list_widget > li, 
						#et-footer'.'-'.$footer_id.' .widget_top_rated_products .product_list_widget > li {
						    background-color:'.samatex_enovathemes_hex_to_rgba($footer_widget_color,0.05).';
							border-color:'.samatex_enovathemes_hex_to_rgba($footer_widget_color,0.07).';
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_tag_cloud .tagcloud a, 
						#et-footer'.'-'.$footer_id.' .post-tags a, 
						#et-footer'.'-'.$footer_id.' .widget_product_tag_cloud .tagcloud a, 
						#et-footer'.'-'.$footer_id.' .project-tags a,
						#et-footer'.'-'.$footer_id.' .post-tags-single a {
							box-shadow: inset 0 0 0 1px '.$footer_widget_color.';
							color:'.$footer_widget_color.';
						}';

						$dynamic_css .='#et-footer'.'-'.$footer_id.' .widget_tag_cloud .tagcloud a:not(.button):not(.et-button):hover, 
						#et-footer'.'-'.$footer_id.' .post-tags a:not(.button):not(.et-button):hover, 
						#et-footer'.'-'.$footer_id.' .widget_product_tag_cloud .tagcloud a:not(.button):not(.et-button):hover, 
						#et-footer'.'-'.$footer_id.' .project-tags a:not(.button):not(.et-button):hover, 
						#et-footer'.'-'.$footer_id.' .post-tags-single a:not(.button):not(.et-button):hover {
							box-shadow: inset 0 0 0 1px '.$footer_widget_link_color.';
							color:'.$footer_widget_link_color.' !important;
						}';
						
					}
			}
		
	/* Responsive
	---------------*/
		
		if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-320']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-320'])){
			$dynamic_css .='@media only screen and (min-width: 320px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-320'];
			$dynamic_css .='}';
		}

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-max-320']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-max-320'])){
			$dynamic_css .='@media only screen and (max-width: 320px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-max-320'];
			$dynamic_css .='}';
		}

		$dynamic_css .='@media only screen and (max-width: 479px)  {';

			$dynamic_css .='.list #loop-posts .post .post-title,
			.list .et-shortcode-posts .post .post-title,
			.post-title-section .post-title {
				font-size: '.$et_h4_font_size.'; line-height: '.$et_h4_line_height.';
			}';

			$dynamic_css .='#loop-project .project .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			if(isset($GLOBALS['samatex_enovathemes']['custom-css-max-479']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-max-479'])){
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-max-479'];
			}

		$dynamic_css .='}';

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-480']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-480'])){
			$dynamic_css .='@media only screen and (min-width: 480px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-480'];
			$dynamic_css .='}';
		}

		$dynamic_css .='@media only screen and (min-width: 480px) and (max-width: 767px)  {';

			$dynamic_css .='.list #loop-posts .post .post-title,
			.list .et-shortcode-posts .post .post-title,
			.full #loop-posts .post .post-title {
				font-size: '.$et_h3_font_size.'; line-height: '.$et_h3_line_height.';
			}';

			if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-480-max-767']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-480-max-767'])){
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-480-max-767'];
			}

		$dynamic_css .='}';

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-max-639']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-max-639'])){
			$dynamic_css .='@media only screen and (max-width: 639px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-max-639'];
			$dynamic_css .='}';
		}

		
		if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-640']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-640'])){
			$dynamic_css .='@media only screen and (min-width: 640px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-640'];
			$dynamic_css .='}';
		}


		if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-640-max-767']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-640-max-767'])){
			$dynamic_css .='@media only screen and (min-width: 640px) and (max-width: 767px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-640-max-767'];
			$dynamic_css .='}';
		}

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-max-767']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-max-767'])){
			$dynamic_css .='@media only screen and (max-width: 767px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-max-767'];
			$dynamic_css .='}';
		}

		$dynamic_css .='@media only screen and (min-width: 768px) and (max-width: 1023px)  {';

			$dynamic_css .='.medium.grid #loop-posts .post .post-title,
			.medium.grid .et-shortcode-posts .post .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			$dynamic_css .='.medium #loop-project .project .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-768-max-1023']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-768-max-1023'])){
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-768-max-1023'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 768px) {';

			/* Project
			---------------*/
				
				if (is_singular('project')) {

					$project_id      = get_the_ID();
					$gallery_type    = get_post_meta( $project_id, 'enovathemes_addons_gallery_type', true );
					$gallery_justify = get_post_meta( $project_id, 'enovathemes_addons_gallery_justify', true );
					$gallery_columns = get_post_meta( $project_id, 'enovathemes_addons_gallery_columns', true );

					if ($gallery_type == "carousel") {

						$gallery_gap     = get_post_meta( $project_id, 'enovathemes_addons_gallery_gap', true );

						$dynamic_css .='#project-gallery:hover .slick-prev, 
						#project-gallery:hover .owl-nav > .owl-prev {
							left: '.(32+$gallery_gap/2).'px !important;
						}';

						$dynamic_css .='#project-gallery:hover .slick-next, 
						#project-gallery:hover .owl-nav > .owl-next {
							right: '.(32+$gallery_gap/2).'px !important;
						}';
					}

					if ($gallery_type != "carousel" && $gallery_type != "carousel_thumb") {

						$dynamic_css .='#project-gallery-set .grid-sizer {
							width: '.(100/$gallery_columns).'% !important;
						}';

					}

					if ($gallery_type == "masonry" && $gallery_justify != "on") {
			        	
			        	$gallery           = get_post_meta( $project_id, 'enovathemes_addons_gallery', true );
						$gallery_container = get_post_meta( $project_id, 'enovathemes_addons_gallery_container', true );
						$project_layout    = get_post_meta( $project_id, 'enovathemes_addons_project_layout', true );

						$total = ($project_layout == "sidebar") ? round((65*1200)/100,0) : (($gallery_container == "wide") ? 1920 : 1200);
			        	if (!empty($gallery)) {
			        		foreach ($gallery as $image => $url){
				        		$post_img_original = wp_get_attachment_image_src($image, "full");
				        		$dynamic_css .='#gallery-image-'.$image.'{
									width: '.(($post_img_original[1]/$total)*100).'% !important;
								}';
			        		}
			        	}
			        	
					}
				}

			$dynamic_css .='.list #loop-posts .post .post-title,
			.list .et-shortcode-posts .post .post-title,
			.full #loop-posts .post .post-title {
				font-size: '.$et_h2_font_size.'; line-height: '.$et_h2_line_height.';
			}';

			if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-768']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-768'])){
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-768'];
			}

		$dynamic_css .='}';

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-max-1023']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-max-1023'])){
			$dynamic_css .='@media only screen and (max-width: 1023px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-max-1023'];
			$dynamic_css .='}';
		}

		$dynamic_css .='@media only screen and (min-width: 1024px) {';

			$dynamic_css .='.small #loop-project .project .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			$dynamic_css .='.post-title-section .post-title,
			.full #loop-posts .post .post-title {
				font-size: '.$et_h1_font_size.'; line-height: '.$et_h1_line_height.';
			}';

			if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-1024']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-1024'])){
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-1024'];
			}

		$dynamic_css .='}';

		$dynamic_css .='@media only screen and (min-width: 1024px) and (max-width: 1279px)  {';
			
			$dynamic_css .='.medium.grid .blog-content #loop-posts .post .post-title {
				font-size: '.$et_h5_font_size.'; line-height: '.$et_h5_line_height.';
			}';

			if ($product_quick_modal_width > 720) {

				$ratio                           = round($product_quick_modal_height/$product_quick_modal_width,2);
				$product_quick_modal_width_1024  = ($product_quick_modal_width - ($product_quick_modal_width - 960));
				$product_quick_modal_height_1024 = round($product_quick_modal_width_1024*$ratio,0);

				$dynamic_css .='#yith-quick-view-modal .yith-wcqv-wrapper {
					width:'.$product_quick_modal_width_1024.'px !important;
					height:'.$product_quick_modal_height_1024.'px !important;
					margin-left:-'.($product_quick_modal_width_1024/2).'px !important;
					margin-top:-'.($product_quick_modal_height_1024/2).'px !important;
				}';

				$dynamic_css .='#yith-quick-view-content .summary {
					height:'.$product_quick_modal_height_1024.'px !important;
				}';
			}

			if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-1024-max-1279']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-1024-max-1279'])){
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-1024-max-1279'];
			}

		$dynamic_css .='}';

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-max-1279']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-max-1279'])){
			$dynamic_css .='@media only screen and (max-width: 1279px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-max-1279'];
			$dynamic_css .='}';
		}

		$dynamic_css .='@media only screen and (min-width: 1280px)  {';

			$dynamic_css .='#yith-quick-view-modal .yith-wcqv-wrapper {
				width:'.$product_quick_modal_width.'px !important;
				height:'.$product_quick_modal_height.'px !important;
				margin-left:-'.($product_quick_modal_width/2).'px !important;
				margin-top:-'.($product_quick_modal_height/2).'px !important;
			}';

			$dynamic_css .='#yith-quick-view-content .summary {
				height:'.$product_quick_modal_height.'px !important;
			}';

			$dynamic_css .='#yith-quick-view-modal .yith-wcqv-wrapper {
				width:'.$product_quick_modal_width.'px !important;
				height:'.$product_quick_modal_height.'px !important;
				margin-left:-'.($product_quick_modal_width/2).'px !important;
				margin-top:-'.($product_quick_modal_height/2).'px !important;
			}';

			if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-1280']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-1280'])){
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-1280'];
			}

		$dynamic_css .='}';


		if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-1280-max-1367']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-1280-max-1367'])){
			$dynamic_css .='@media only screen and (min-width: 1280px) and (max-width: 1367px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-1280-max-1367'];
			$dynamic_css .='}';
		}
		
		if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-1366']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-1366'])){
			$dynamic_css .='@media only screen and (min-width: 1366px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-1366'];
			$dynamic_css .='}';
		}

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-1366-max-1599']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-1366-max-1599'])){
			$dynamic_css .='@media only screen and (min-width: 1366px) and (max-width: 1599px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-1366-max-1599'];
			$dynamic_css .='}';
		}

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-max-1599']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-max-1599'])){
			$dynamic_css .='@media only screen and (max-width: 1599px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-max-1599'];
			$dynamic_css .='}';
		}

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-1600']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-1600'])){
			$dynamic_css .='@media only screen and (min-width: 1600px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-1600'];
			$dynamic_css .='}';
		}

		if(isset($GLOBALS['samatex_enovathemes']['custom-css-min-1600-max-1919']) && !empty($GLOBALS['samatex_enovathemes']['custom-css-min-1600-max-1919'])){
			$dynamic_css .='@media only screen and (min-width: 1600px) and (max-width: 1919px)  {';
				$dynamic_css .= $GLOBALS['samatex_enovathemes']['custom-css-min-1600-max-1919'];
			$dynamic_css .='}';
		}

	$dynamic_css = samatex_enovathemes_minify_css($dynamic_css);

	wp_add_inline_style( 'dynamic-styles', $dynamic_css );
}
add_action( 'wp_enqueue_scripts', 'samatex_enovathemes_include_dynamic_styles',20);
?>