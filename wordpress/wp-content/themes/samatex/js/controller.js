	jQuery.fn.isInViewport = function(win) {
        var elH = jQuery(this).outerHeight(),
            scrolled = jQuery(win).scrollTop(),
            viewed = scrolled + jQuery(win).height(),
            elTop = jQuery(this).offset().top,
            elBottom = elTop + elH,
            h = 0.4;
        return (elTop + elH * h) <= viewed && (elBottom - elH * h) >= scrolled;
    };

    jQuery.fn.randomAnimationDelay = function() {
        jQuery(this).find('.et-item').each(function(){

            var item = jQuery(this);

            var randomDelay = Math.round(( Math.random() * ( 300 - 100 ) + 100 ));
            var preloader   = item.find('.image-preloader' );

            item.find('.et-item-inner').css('animation-delay',randomDelay+'ms');

            if (typeof(preloader) != 'undefined' && preloader != null){
                preloader.css('transition-delay',( 300 + randomDelay )+'ms');
            }

        });
    }

    jQuery.fn.sequentialAnimationDelay = function() {
        jQuery(this).find('.et-item').each(function(index){

            var item = jQuery(this);

            var sequentialDelay = 50*index;
            var preloader   = item.find('.image-preloader' );

            item.find('.et-item-inner').css('animation-delay',sequentialDelay+'ms');

            if (typeof(preloader) != 'undefined' && preloader != null){
                preloader.css('transition-delay',( 300 + sequentialDelay )+'ms');
            }

        });
    }

    jQuery.fn.animateIfInViewport = function(win) {
        jQuery(this).find('.et-item').each(function(){
            var $this = jQuery(this);
            if($this.isInViewport(win)){
                $this.find('.et-item-inner').addClass('animate');
            }
        });
    }

	function plyrElement(){
		const players = Array.from(document.querySelectorAll('.plyr-element')).map(p => new Plyr(p));
	}

/* icon pack
---------------*/
	
	(function($){

		function copyToClipboard(text) {
			var $temp = $('<input>');
			$("body").append($temp);
			$temp.val(text).select();
			document.execCommand("copy");
			$temp.remove();
		}

		"use strict";
		$('.demo-icon-pack span').each(function(){

			$(this).on('click',function(){

				copyToClipboard($(this).attr('class'));

				$(this).toggleClass('active');
				
			});

		});

	})(jQuery);

/* NiceScroll
---------------*/

	(function($){

		"use strict";

		var $customScroll                   = controller_opt.customScroll; 
        var $customScrollCursorcolor        = controller_opt.customScrollCursorcolor;
        var $customScrollRailcolor          = controller_opt.customScrollRailcolor;
        var $customScrollCursorOpacityMin   = controller_opt.customScrollCursorOpacityMin;
        var $customScrollCursorOpacityMax   = controller_opt.customScrollCursorOpacityMax;
        var $customScrollCursorWidth        = controller_opt.customScrollCursorWidth;
        var $customScrollCursorBorderRadius = controller_opt.customScrollCursorBorderRadius;
        var $customScrollScrollSpeed        = controller_opt.customScrollScrollSpeed;
        var $customScrollMouseScrollStep    = controller_opt.customScrollMouseScrollStep;

        if ($customScroll == "true") {
        	$("html").niceScroll({
				cursorcolor:$customScrollCursorcolor,
				cursoropacitymin:$customScrollCursorOpacityMin/100,
				cursoropacitymax:$customScrollCursorOpacityMax/100,
				cursorwidth:$customScrollCursorWidth+'px',
				cursorborderradius:$customScrollCursorBorderRadius+'px',
				scrollspeed:$customScrollScrollSpeed,
				mousescrollstep:$customScrollMouseScrollStep,
				background:$customScrollRailcolor,
				cursorborder: "none",
				zindex: "100000000"
			});
        }

	})(jQuery);

/* General
---------------*/

	(function($){

		"use strict";

		$('.site-loading').addClass('animate');

		setTimeout(function(){
			$('.site-loading').css({'display':'none'});
		},800);

		setTimeout(function(){
			$('.lazy-load').removeClass('lazy');
		},300);
			
		/* Plyr
		---------------*/

			plyrElement();

		/* WPML Language switcher
		---------------*/

			$('.widget_icl_lang_sel_widget .wpml-ls-current-language > a')
			.append('<span class="toggle"></span>');

			$('.wpml-ls-legacy-dropdown-click a > span.toggle').on('click',function(e){
				$(this).parent().toggleClass('active');
				if ($(this).parent().next('ul').length != 0) {
					$(this).parent().toggleClass('animate');
					$(this).parent().next('ul').stop().slideToggle(300, "easeOutExpo");
				};
				e.preventDefault();
			});

			$('.wpml-ls-legacy-dropdown .wpml-ls-current-language').hoverIntent(
				function(){
					$(this).toggleClass('active');
					if ($(this).find('ul').length != 0) {
						$(this).toggleClass('animate');
						$(this).find('ul').stop().slideToggle(300, "easeOutExpo");
					};
				},
				function(){
					$(this).toggleClass('active');
					if ($(this).find('ul').length != 0) {
						$(this).toggleClass('animate');
						$(this).find('ul').stop().slideToggle(300, "easeOutExpo");
					};
				}
			);

		/* Widget navigation
		---------------*/

			$('.widget_nav_menu').each(function(){

				var $this = $(this);
				var childItems = $this.find('.menu-item-has-children > a')
				.append('<span class="toggle"></span>');

				if ($this.find('.menu-item-has-children > a').attr( "href" ) == "#") {
					$this.find('.menu-item-has-children > a').on('click',function(e){
						$(this).toggleClass('active');
						if ($(this).next('ul').length != 0) {
							$(this).toggleClass('animate');
							$(this).next('ul').stop().slideToggle(300, "easeOutExpo");
							$('.site-sidebar').getNiceScroll().resize();
							$('html').getNiceScroll().resize();
						};
						e.preventDefault();
					});
				} else {
					$this.find('.menu-item-has-children > a > span.toggle').on('click',function(e){
						e.stopImmediatePropagation();
						$(this).toggleClass('active');
						if ($(this).parent().next('ul').length != 0) {
							$(this).parent().toggleClass('animate');
							$(this).parent().next('ul').stop().slideToggle(300, "easeOutExpo");
							$('.site-sidebar').getNiceScroll().resize();
							$('html').getNiceScroll().resize();
						};
						e.preventDefault();
					});
				}
				
			});

			$('.widget_product_categories').each(function(){

				var $this = $(this);

				if ($this.find('.count').length != 0) {
					$this.find('a').each(function(){
						var $self = $(this);
						var countClone = $self.next('.count').clone();
						$self.next('.count').remove();
						$self.append(countClone);
					});
				}

				var childItems = $this.find('.cat-parent > a')
				.append('<span class="toggle"></span>');

				if ($this.find('.cat-parent > a').attr( "href" ) == "#") {
					$this.find('.cat-parent > a').on('click',function(e){
						$(this).toggleClass('active');
						if ($(this).parent().next('.children').length != 0) {
							$(this).parent().toggleClass('animate');
							$(this).parent().next('.children').stop().slideToggle(300, "easeOutExpo");
						};
						e.preventDefault();
					});
				} else {
					$this.find('.cat-parent > a > span.toggle').on('click',function(e){
						e.stopImmediatePropagation();
						$(this).toggleClass('active');
						if ($(this).parent().next('.children').length != 0) {
							$(this).parent().toggleClass('animate');
							$(this).parent().next('.children').stop().slideToggle(300, "easeOutExpo");
						};
						e.preventDefault();
					});
				}
				
			});

		/* Widget calendar
		---------------*/

			$('.widget_calendar').each(function(){

				var $this = $(this);
				var caption = $this.find('caption');

				$this.find('td#prev a').clone().addClass('prev').html('').appendTo(caption);
				$this.find('td#next a').clone().addClass('next').html('').appendTo(caption);
				$this.find('tfoot').remove();

			});

		/* Widget product search
		---------------*/

			$('.widget_product_search').each(function(){
				$('<div class="search-icon"></div>').insertAfter($(this).find('input[type="submit"]'));
			});

		/* One page bullets / to top move button
		---------------*/

			function init() {
				window.addEventListener( 'scroll', function( event ) {
				    if( !didScroll ) {
				        didScroll = true;
				        scrollPage();
				    }
				}, false );
			}

			function scrollPage() {
				var sy = scrollY();
				if ( sy >= activateOn ) {
					top.addClass('animate');
					$('.bullets-container').addClass('animate');
				} else {
					top.removeClass('animate');
					$('.bullets-container').removeClass('animate');
				}

				didScroll = false;
			}

			function scrollY() {
				return window.pageYOffset || docElem.scrollTop;
			}

			var top         = $('#to-top'),
				docElem     = document.documentElement,
				didScroll   = false,
				activateOn  = 400;

			top.bind('click.smoothscroll', function (event) {
				event.preventDefault();
				var target = this.hash;
				$('html, body').stop().animate({
				    'scrollTop': $(target).offset().top
				}, 800, function () {
				    window.location.hash = target;
				});
			});

			init();

			$('.bullets-container').each(function(){
				$(this).find('li').each(function(){

					var $this = $(this),
						$prefix = ($this.index() <= 8) ? '0' : '';

					$this.find('a').prepend('<span class="number">'+$prefix+($this.index()+1)+'<span/>');
					
				});
			});

		/* Form placeholder
		---------------*/

			$.fn.placeholder = function() {

				$.each(this, function(){

					var $this       = $(this);

					if ($this.attr('placeholder')) {
						$this.attr("data-placeholder", $this.attr('placeholder'));
						$this.removeAttr('placeholder');
					};

					var placeholder = $this.data("placeholder");

					if($this.val() == '') { $this.val(placeholder);}

					$this
					.on('focus', function(){
						if($this.val() == placeholder) { $this.val('');}
					})
					.on('focusout', function(){
						if($this.val() == '') { $this.val(placeholder);}
					});

				});

			}

			$('.et-contact-form input[type="text"], .et-contact-form textarea').placeholder();

			$('.widget_login, .widget_reglog').each(function(){
				var $this = $(this);

				$this.find('label').each(function(){
					var labelText = $(this).text();
					$(this).next('input').attr('placeholder',labelText);
					$(this).remove();
				});

				$this.find('input[type="text"]').placeholder();
				$this.find('input[type="password"]').placeholder();

				$this.find('input[type="submit"]').on("click",function(event) {

					if (!$this.find('input[type="text"]').val() || !$this.find('input[type="password"]').val() || 
						$this.find('input[type="text"]').val() == $this.find('input[type="text"]').data('placeholder') ||
						$this.find('input[type="password"]').val() == $this.find('input[type="password"]').data('placeholder')) {
						console.log("here");
						event.preventDefault();
					}

				});
			});

			$('.search-form').each(function(){
				var form  = $(this);
				var search = form.find('#s');
				search.placeholder();
				form.submit(function(event){
					if (search.val() === search.attr('data-placeholder')) {
						event.preventDefault();
					}
				});
			});

		/* Responsive tables
		---------------*/

			function responsiveTable(){

				if ($(window).outerWidth() <= 767) {
					$('table').addClass('responsive');
					$('table').parent().addClass('overflow-x');
				} else {
					$('table').removeClass('responsive');
					$('table').parent().removeClass('overflow-x');
				}
				
			}
			responsiveTable();
			$(window).resize(responsiveTable);
		
		/* Et-filter
		---------------*/

			var mobile = window.matchMedia("(max-width: 767px)");

			function responsiveFilter(){

				$('.enovathemes-filter').each(function(){
					var $this = $(this);

					if (mobile.matches) {

						$this.find('a.toggle-link').remove();
						$this.find('.toggle-container a').unwrap();
						
						$this.prepend('<a class="filter et-button small toggle-link" href="#">--<i class="toggle ien-earrow-4"></i></a>');
						$this.children('a:not(.toggle-link)').wrapAll('<div class="toggle-container"></div>');

						$this.find('.toggle-link').on('click',function(e){
							e.preventDefault();
							e.stopImmediatePropagation();
							$(this).html('--<i class="toggle ien-earrow-4"></i>');
							$this.find('.toggle-container').slideToggle();
						});

						$this.find('a:not(.toggle-link)').on('click',function(){
							$this.find('.toggle-link').html($(this).html()+'<i class="toggle ien-earrow-4"></i>');
							$this.find('.toggle-container').slideUp();
						});

					} else {
						$this.find('a.toggle-link').remove();
						$this.find('.toggle-container a').unwrap();
					}

				});
			}

			responsiveFilter();
			$(window).resize(responsiveFilter);

	})(jQuery);

/* Footer
---------------*/

	(function($){

		"use strict";

		var footer = $('.footer.sticky-true');
		if (typeof(footer) != 'undefined' && footer.length) {
			footer.footerReveal({ shadow: false, zIndex: -101 });
			setTimeout(function(){
				footer.addClass('active');
			},1500);
		}

	})(jQuery);

/* Header
---------------*/

	(function($){

		"use strict";

		/* Submenu conditional left/right
		---------------*/

			function submenuPosition(){

				$('.et-desktop .header-menu > .menu-item').each(function(){

					var $this = $(this);

					if ($this.children('.sub-menu:not(.megamenu)').length) {

						if( $this.offset().left + $this.width() + $this.children('.sub-menu').width() > $(window).innerWidth()){
							$this.addClass('submenu-left');
						} else {
							$this.removeClass('submenu-left');
						}

					}

				});

			}

			submenuPosition();
			$(window).resize(submenuPosition);

		/* Sticky
		---------------*/

			var header = $( '.header.sticky-true' );

			header.each(function(){

				var $this = $(this);

				if ($this.length) {

					var docElem        = document.documentElement;
					var didScroll      = false;
			        var changeHeaderOn = 300 + $this.offset().top;

				    function init() {

				    	if( !didScroll ) {
			                didScroll = true;
			                scrollPage();
			            }

				        window.addEventListener( 'scroll', function( event ) {
				            if( !didScroll ) {
				                didScroll = true;
				                scrollPage();
				            }
				        }, false );

				    }

				    function scrollPage() {
				        var sy = scrollY();

			    		if ( sy >= changeHeaderOn ) {
			        		$this.addClass('active');
			        	} else {
			        		$this.removeClass('active');
			        	}

				        didScroll = false;
				    }

				    function scrollY() {
				        return window.pageYOffset || docElem.scrollTop;
				    }

				    $('<div class="header-placeholder" style="height:'+$this.outerHeight()+'px;"></div>').insertAfter($this);

				    init();

			    }
			});

		/* Toggles
		---------------*/

			$('.header-search').each(function(){
				var $this  = $(this);
				var toggle = $this.find('.search-toggle');
				$this.find('.search-icon').addClass(toggle.data('icon'));
				toggle.on('click',function(){
					toggle.toggleClass('active');
					$this.find('.search-box').toggleClass('active');
					$this.find('input[type="text"]').focus();
				});
			});

			$('.header-cart').each(function(){
				var $this  = $(this);
				var toggle = $this.find('.cart-toggle');
				toggle.on('click',function(){
					toggle.toggleClass('active');
					$this.find('.cart-box').toggleClass('active');
				});
			});

			$('.language-switcher').each(function(){
				var $this  = $(this);
				var toggle = $this.find('.language-toggle');
				toggle.on('click',function(){
					toggle
					.toggleClass('sm-globe')
					.toggleClass(toggle.data('close-icon'))
					.toggleClass('active');

					toggle.next('ul').toggleClass('active');
				});
			});

			$('.wpml-ls-legacy-dropdown-click').each(function(){
				var $this = $(this);

				$this.find('.js-wpml-ls-item-toggle').on('click',function(){
					$this.find('.js-wpml-ls-sub-menu').toggleClass('active');
				});

			});

			$('.header-login').each(function(){
				var $this  = $(this);
				var toggle = $this.find('.login-toggle');
				toggle.on('click',function(){
					toggle.toggleClass('active');
					$this.find('.widget_reglog').toggleClass('active');
				});
			});

			$('.mobile-toggle').first().on('click',function(){
				$(this).toggleClass('active');
				$('.mobile-container-overlay').first().toggleClass('active');
				$('.et-mobile.sticky-true').addClass('disable-sticky');
			});

			$('.mobile-container-overlay').first().on('click',function(e){
				if(e.target !== e.currentTarget) return;
				$(this).toggleClass('active');
				$('.mobile-toggle').first().toggleClass('active');
				$('.et-mobile.sticky-true').removeClass('disable-sticky');
			});

			$('.mobile-container-close').first().on('click',function(){
				$('.mobile-toggle').first().removeClass('active');
				$('.mobile-container-overlay').first().removeClass('active');
				$('.et-mobile.sticky-true').removeClass('disable-sticky');
			});

			$('.modal-toggle').first().on('click',function(){
				$(this).toggleClass('active');
				$('.modal-container').first().toggleClass('active');
				$('.header.sticky-true').addClass('disable-sticky');
			});

			$('.modal-container-close').first().on('click',function(){
				$('.modal-toggle').first().removeClass('active');
				$('.modal-container').first().removeClass('active');
				$('.header.sticky-true').removeClass('disable-sticky');
			});

			$('.header .hbe-toggle').each(function(){
				$(this).on('click',function(){
					if ($(this).hasClass('active')) {
						$('.header .hbe-toggle.active').not(this).each(function(){
							$(this).removeClass('active');
							$(this).parent().find('.active').removeClass('active');

							var languageSwitcher = $(this).parent().find('.language-toggle');

							if (typeof languageSwitcher != 'undefined' && languageSwitcher != null) {
								var languageSwitcherClose = languageSwitcher.data('close-icon');
								languageSwitcher
								.removeClass('active')
								.addClass('sm-globe')
								.removeClass(languageSwitcherClose);
							}

						});
					}
				});
			});

		/* Mobile menu
		---------------*/

			var desktop = window.matchMedia("(min-width: 1280px)");
			if (desktop.matches) {
				$('.mobile-container').first().niceScroll({
					cursoropacitymin:0,
					cursoropacitymax:0,
					cursorwidth:'4px',
					scrollspeed:150,
					mousescrollstep:60,
					cursorborder: "none",
				});
			}

			$('.mobile-menu .menu-item-has-children > a').each(function(){
				var $link = $(this);
				if ($link.attr( "href" ) == "#") {
					$link.on('click',function(e){
						e.preventDefault();
						$link.find('.arrow-down').toggleClass('active');
						$link.parent('.menu-item-has-children').siblings().find('.arrow-down').removeClass('active');
						$link.parent('.menu-item-has-children').siblings().children('ul').slideUp(200, "easeOutExpo");
						$link.next('ul').stop().slideToggle(200, "easeOutExpo", function(){
							$('.mobile-container').first().getNiceScroll().resize();
						});
					});
				} else {
					$link.find('.arrow-down').on("click", function(e){
						e.preventDefault();
						var $this = $(this);
						$this.toggleClass('active');
						$link.parent('.menu-item-has-children').siblings().find('.arrow-down').removeClass('active');
						$link.parent('.menu-item-has-children').siblings().children('ul').slideUp(200, "easeOutExpo");
						$this.parent().next('ul').stop().slideToggle(200, "easeOutExpo", function(){
							$('.mobile-container').first().getNiceScroll().resize();
						});
					});
				}
			});

			$('.et-mobile').each(function(){
				$(this).find('.header-cart').each(function(){
					var mobile = window.matchMedia("(max-width: 479px)");
					if (mobile.matches) {
						$(this).find('.cart-box').css({
							'max-height':($(window).height() - $(this).height())+'px'
						});
					}
				});
			});

		/* Modal menu
		---------------*/

			$('.modal-container').first().niceScroll({
				cursoropacitymin:0,
				cursoropacitymax:0,
				cursorwidth:'4px',
				scrollspeed:150,
				mousescrollstep:60,
				cursorborder: "none",
			});

			$('.modal-menu .menu-item-has-children > a').each(function(){
				var $link = $(this);
				if ($link.attr( "href" ) == "#") {
					$link.on('click',function(e){
						e.preventDefault();
						$link.find('.arrow-down').toggleClass('active');
						$link.parent('.menu-item-has-children').siblings().find('.arrow-down').removeClass('active');
						$link.parent('.menu-item-has-children').siblings().children('ul').slideUp(200, "easeOutExpo");
						$link.next('ul').stop().slideToggle(200, "easeOutExpo", function(){
							$('.modal-container').first().getNiceScroll().resize();
						});
					});
				} else {
					$link.find('.arrow-down').on("click", function(e){
						e.preventDefault();
						var $this = $(this);
						$this.toggleClass('active');
						$link.parent('.menu-item-has-children').siblings().find('.arrow-down').removeClass('active');
						$link.parent('.menu-item-has-children').siblings().children('ul').slideUp(200, "easeOutExpo");
						$this.parent().next('ul').stop().slideToggle(200, "easeOutExpo", function(){
							$('.modal-container').first().getNiceScroll().resize();
						});
					});
				}
			});

		/* Megamenu tabs
		---------------*/
			
			$('.megamenu-tab').each(function(){

				var $this    = $(this),
					tabs     = $this.find('.tab-item'),
					tabsQ    = tabs.length,
					tabsDefaultWidth  = 0,
					tabsDefaultHeight = 0,
					tabsContent = $this.find('.tab-content');

				tabs.wrapAll('<div class="tabset et-clearfix"></div>');
				tabsContent.wrapAll('<div class="tabs-container et-clearfix"></div>');

				var tabSet = $this.find('.tabset');

				if(!tabs.hasClass('active')){
					tabs.first().addClass('active');
				}
				
				tabs.each(function(){

					var $thiz = $(this);

					if ($thiz.hasClass('active')) {
						$thiz.siblings()
						.removeClass("active");
						tabsContent.hide(0).removeClass('active');
						tabsContent.eq($thiz.index()).show(0).addClass('active');
					}

				});

				if(tabsQ >= 2){

					tabs.on('click', function(event){

						event.stopImmediatePropagation();

						var $self = $(this);
						
						if(!$self.hasClass("active")){

							$self.addClass("active");

							$self.siblings()
							.removeClass("active");

							tabsContent.hide(0).removeClass('active');
							tabsContent.eq($self.index()).show(0).addClass('active');
						}
						
					});
				}

			});

		/* Megamenu
		---------------*/

			function megamenuPosition(){

				$('.sidebar-menu > .menu-item').each(function(){

					var $this = $(this);
					var megamenu = $this.children('.megamenu');
					var top      = ($this.parents('.sidebar-menu-container.tl-separator-true')) ? '-18px' : '-24px';

					if (megamenu.length) {

						var totalHeight = 0;

						if ($this.data('width') == '100') {
							var megamenuWidth = ($(window).innerWidth() - 320);
							if ($this.data('stretch') == 'stretch') {
								megamenu.css({'max-width':megamenuWidth+'px','width':megamenuWidth+'px'});
							} else {
								megamenu.css({'max-width':megamenuWidth+'px'});
							}
						}

						megamenu.children().each(function(){
						    totalHeight = totalHeight + $(this).outerHeight(true);
						});

						if( $this.offset().top + $this.children('.mi-link').height() + totalHeight > $(window).innerHeight()){
							$this.addClass('megamenu-static');
							if (totalHeight < $(window).innerHeight()) {
								megamenu.css({
									'top':'50%',
									'margin-top':'-'+(totalHeight/2)+'px'
								});
							}
						} else {
							$this.removeClass('megamenu-static');
							megamenu.css({
								'top':top,
								'margin-top':'0'
							});
						}
					}

				});

				$('.header-menu > .menu-item').each(function(){

					var $this = $(this);
					var megamenu = $this.children('.megamenu');

					if (megamenu.length) {
						if ($this.data('width') == '100') {
							var megamenuWidth = $(window).innerWidth();
							megamenu.css({
								'max-width':megamenuWidth+'px',
								'width':megamenuWidth+'px',
								'margin-left':'-'+($this.offset().left)+'px',
							});
						}
					}

				});

			}

			megamenuPosition();
			$(window).resize(megamenuPosition);

			$('.sidebar-navigation-right .sidebar-menu-container.tl-text-align-center > .sidebar-menu > .menu-item > .mi-link').each(function(){
				var $this = $(this);
				var arrowDown = $this.find('.arrow-down').clone();
				$this.find('.arrow-down').remove();
				$this.prepend(arrowDown);
			});

			$('.sidebar-navigation-right .sidebar-menu-container.sub-text-align-center > .sidebar-menu .sub-menu .menu-item > .mi-link').each(function(){
				var $this = $(this);
				var arrowDown = $this.find('.arrow-down').clone();
				$this.find('.arrow-down').remove();
				$this.prepend(arrowDown);
			});

		/* Megamenu grid autoalign
		---------------*/

			$('.megamenu').each(function(){
				var $this = $(this);

				if ($this.outerWidth() == 1200 && $this.parents('.container').eq(0).outerWidth() == 1200) {

					var closestLink = $this.parent().children('a');
					if (closestLink.length) {
						var parentContainer = $this.parents('.container').eq(0);
						var offset = closestLink.offset().left - parentContainer.offset().left;
						$this.attr('style','margin-left:-'+offset+'px !important;');
					}

				}

			});

		})(jQuery);

/* Inview random
---------------*/

	(function($){

		var docElem = window.document.documentElement;

		function getViewportH() {
			var client = docElem['clientHeight'],
				inner = window['innerHeight'];
			
			if( client < inner )
				return inner;
			else
				return client;
		}

		function scrollY() {
			return window.pageYOffset || docElem.scrollTop;
		}

		function getOffset( el ) {
			var offsetTop = 0, offsetLeft = 0;
			do {
				if ( !isNaN( el.offsetTop ) ) {
					offsetTop += el.offsetTop;
				}
				if ( !isNaN( el.offsetLeft ) ) {
					offsetLeft += el.offsetLeft;
				}
			} while( el = el.offsetParent )

			return {
				top : offsetTop,
				left : offsetLeft
			}
		}

		function inViewport( el, h ) {
			var elH = el.offsetHeight,
				scrolled = scrollY(),
				viewed = scrolled + getViewportH(),
				elTop = getOffset(el).top,
				elBottom = elTop + elH,
				h = h || 0;

			return (elTop + elH * h) <= viewed && (elBottom - elH * h) >= scrolled;
		}

		function extend( a, b ) {
			for( var key in b ) { 
				if( b.hasOwnProperty( key ) ) {
					a[key] = b[key];
				}
			}
			return a;
		}

		function AnimOnScroll( el, options ) {	
			this.el = el;
			this.options = extend( this.defaults, options );
			this._init();
		}

		AnimOnScroll.prototype = {
			defaults : {
				minDelay : 0,
				maxDelay : 0,
				viewportFactor : 0,
				reload:false,
				grid:false,
				delayType:'grid',
				delay:0
			},
			_init : function() {

				this.items      		 = this.options.items;
				this.itemsRenderedCount  = 0;
				this.itemsCount 		 = this.items.length;
				this.didScroll           = false;
				this.delay      		 = this.options.delay;
				this.grid       		 = this.options.grid;
				this.itemSelector        = this.options.itemSelector;
				this.reload     		 = this.options.reload;
				this.delayType     		 = this.options.delayType;
				this.minDelay     		 = this.options.minDelay;
				this.maxDelay     		 = this.options.maxDelay;
				this.viewportFactor      = this.options.viewportFactor;
				this.gridSizer           = this.options.gridSizer;
				this.preloaderDelay      = this.options.preloaderDelay;

				var self = this;

				imagesLoaded( this.el, function() {

					if (self.grid) {

						if (typeof(self.gridSizer) != 'undefined' && self.gridSizer != null) {

							// initialize masonry
							var msnry = new Masonry( self.el, {
								itemSelector: self.itemSelector,
								transitionDelay : '0.6s',
								columnWidth: self.gridSizer
							} );

						} else {

							// initialize masonry
							var msnry = new Masonry( self.el, {
								itemSelector: self.itemSelector,
								transitionDelay : '0.6s'
							} );

						}

						if (self.reload) {
							msnry.reloadItems();
						}

					}

					// the items already shown...
					self.items.forEach( function( el, i ) {
						if( inViewport( el ) ) {
							self._checkTotalRendered();

							if( self.minDelay && self.maxDelay && self.delayType != "none") {
								var randomDelay = Math.round(( Math.random() * ( self.maxDelay - self.minDelay ) + self.minDelay ));

								if (self.delayType == 'both') {
									var preloader    = el.querySelector( '.image-preloader' );
									if (typeof(preloader) != 'undefined' && preloader != null){
										preloader.style.transitionDelay = ( randomDelay + self.preloaderDelay )+'ms';
									}
									el.style.WebkitAnimationDelay = randomDelay+'ms';
									el.style.MozAnimationDelay = randomDelay+'ms';
									el.style.animationDelay = randomDelay+'ms';
								} else if (self.delayType == 'grid') {
									el.style.WebkitAnimationDelay = randomDelay+'ms';
									el.style.MozAnimationDelay = randomDelay+'ms';
									el.style.animationDelay = randomDelay+'ms';
								} else if (self.delayType == 'image') {

									var preloader    = el.querySelector( '.image-preloader' );
									if (typeof(preloader) != 'undefined' && preloader != null){
										preloader.style.transitionDelay = ( randomDelay)+'ms';
									}
								}

								classie.add( el, 'shown');
							}
							
						}
					} );

					// animate on scroll the items inside the viewport
					window.addEventListener( 'scroll', function() {
						self._onScrollFn();
					}, false );
					window.addEventListener( 'resize', function() {
						self._resizeHandler();
					}, false );

				});
			},
			_onScrollFn : function() {
				var self = this;
				if( !this.didScroll ) {
					this.didScroll = true;
					setTimeout( function() { self._scrollPage(); }, 60 );
				}
			},
			_scrollPage : function() {
				var self = this;
				this.items.forEach( function( el, i ) {
					if( !classie.has( el, 'shown' ) && !classie.has( el, 'animate' ) && inViewport( el, self.viewportFactor )) {
						setTimeout( function() {
							var perspY = scrollY() + getViewportH() / 2;
							self.el.style.WebkitPerspectiveOrigin = '50% ' + perspY + 'px';
							self.el.style.MozPerspectiveOrigin = '50% ' + perspY + 'px';
							self.el.style.perspectiveOrigin = '50% ' + perspY + 'px';

							self._checkTotalRendered();

							if( self.minDelay && self.maxDelay && self.delayType != "none") {
								
								var randomDelay = Math.round(( Math.random() * ( self.maxDelay - self.minDelay ) + self.minDelay ));
								
								if (self.delayType == 'both') {
									var preloader    = el.querySelector( '.image-preloader' );
									if (typeof(preloader) != 'undefined' && preloader != null){
										preloader.style.transitionDelay = ( randomDelay + self.preloaderDelay )+'ms';
									}
									el.style.WebkitAnimationDelay = randomDelay+'ms';
									el.style.MozAnimationDelay = randomDelay+'ms';
									el.style.animationDelay = randomDelay+'ms';
								} else if (self.delayType == 'grid') {
									el.style.WebkitAnimationDelay = randomDelay+'ms';
									el.style.MozAnimationDelay = randomDelay+'ms';
									el.style.animationDelay = randomDelay+'ms';
								} else if (self.delayType == 'image') {
									var preloader    = el.querySelector( '.image-preloader' );
									if (typeof(preloader) != 'undefined' && preloader != null){
										preloader.style.transitionDelay = ( randomDelay )+'ms';
									}
								}

								classie.add( el, 'animate' );
							}

						}, self.delay );
					}
				});

				this.didScroll = false;
			},
			_resizeHandler : function() {
				var self = this;
				function delayed() {
					self._scrollPage();
					self.resizeTimeout = null;
				}
				if ( this.resizeTimeout ) {
					clearTimeout( this.resizeTimeout );
				}
				this.resizeTimeout = setTimeout( delayed, 1000 );
			},
			_checkTotalRendered : function() {
				++this.itemsRenderedCount;
				if( this.itemsRenderedCount === this.itemsCount ) {
					window.removeEventListener( 'scroll', this._onScrollFn );
				}
			}
		}

		// add to global namespace
		window.AnimOnScroll = AnimOnScroll;

	})(jQuery);

/* Posts
---------------*/

	(function($){

		"use strict";

		// Blog loop
		var blogLayout         = $('.blog-layout');
		var blogMinDelay       = 100;
		var blogMaxDelay       = 300;
		var blogViewportFactor = 0.4;
		var blogDelay          = 50;
		var blogReload         = false;
		var blogGrid           = true;
		var blogDelayType      = 'grid';
		var blogPreloaderDelay = 0;
		var blogItemSelector   = '.et-item';
		var blogGridSizer      = '.grid-sizer';
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		if ($('#loop-posts').hasClass('effect-none')) {
			blogDelayType = (preloaderActive) ? 'image' : "none";
		} else {
			blogDelayType = (preloaderActive) ? 'both' : "grid";
			if (preloaderActive && blogDelayType == "both") {
				blogPreloaderDelay = 300;
			}
		}

		if (blogLayout.hasClass('full') || blogLayout.hasClass('list')) {
			blogGrid     = false;
			blogDelayType = (preloaderActive) ? 'image' : "none";
		}

		if (blogLayout.hasClass('chess')) {
			blogGridSizer = '.et-item';
		}

		var blogItemSet = document.querySelector( '#loop-posts' );
		var blogItems   = Array.prototype.slice.call( document.querySelectorAll( '#loop-posts > .post > .post-inner' ) );
		if (typeof(blogItemSet) != 'undefined' && blogItemSet != null && blogItems.length){
			new AnimOnScroll( blogItemSet, {
				items:blogItems,
				minDelay : blogMinDelay,
				maxDelay : blogMaxDelay,
				preloaderDelay:blogPreloaderDelay,
				viewportFactor:blogViewportFactor,
				delay:blogDelay,
				reload:blogReload,
				grid:blogGrid,
				itemSelector:blogItemSelector,
				delayType:blogDelayType,
				gridSizer:blogGridSizer,
			} );
		}

		function postGallery(){

			$('.post-gallery').each(function(){
				$(this).flexslider({
					animation:'slide',
					smoothHeight:false,
					touch: true,
					animationSpeed: 450,
					slideshow:false,
					directionNav:true,
					controlNav:true,
					pauseOnHover: true,
					prevText: "",
					nextText: "",
				});
			});

		}

		postGallery();
		

		var postLoop              = $('#loop-posts'),
			postLoadMore          = $('#post-ajax-loader'),
			postAjaxScroll        = $('#post-ajax-scroll'),
			postAjaxScrollStatus  = $('#post-ajax-scroll-status'),
			postAjaxError         = $('#post-ajax-error'),
			defaultText        = postLoadMore.html(),
			postStartPage      = parseInt(controller_opt.postStartPage) + 1,
			postMax            = parseInt(controller_opt.postMax),
			nextLink    	   = controller_opt.postNextLink,
			postNoText         = controller_opt.postNoText,
			loadRequestRunning = false;

		function postLoadMoreText(){
			if(postStartPage > postMax) {
				postLoadMore.html(postNoText);
				postLoadMore.addClass('disable');
			} else {
				postLoadMore.html(defaultText);
				postLoadMore.removeClass('disable');
			}
		}

		function postAjaxScrollStatusCheck(){
			if(postStartPage > postMax) {
				postAjaxScrollStatus.html(postNoText);
				postAjaxScroll.addClass('disable');
			} else {
				postAjaxScrollStatus.empty();
				postAjaxScroll.removeClass('disable');
			}
		}

		if (postLoop.hasClass('nav-loadmore')) {
			postLoadMoreText();
			postLoadMore.on('click',function(){

				var $this = $(this);

				if (loadRequestRunning) {
					return;
				}

				loadRequestRunning = true;

				postLoadMoreText();

				if(postStartPage <= postMax) {

					$this.addClass('loading');
					$.get(nextLink,function(content) {

					    var content = $(content).find('#loop-posts > .post').addClass('appended');

					    if (typeof content !== "undefined") {
						    $('#loop-posts').append(content);
							var itemSet = document.querySelector( '.loop-posts' );
							var items   = Array.prototype.slice.call( document.querySelectorAll( '.loop-posts > .post > .post-inner' ) );
							
							if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

								new AnimOnScroll( itemSet, {
									items:items,
									minDelay : blogMinDelay,
									maxDelay : blogMaxDelay,
									viewportFactor:blogViewportFactor,
									delay:blogDelay,
									reload:blogReload,
									grid:blogGrid,
									itemSelector:blogItemSelector,
									delayType:blogDelayType,
									gridSizer:blogGridSizer
								} );

							}

							$('#loop-posts.overlay-move .overlay-hover')
							.each( function() { $(this).hoverdir(); } );
							plyrElement();
							postGallery();

							setTimeout(function(){
								$this.removeClass('loading');
								$('#loop-posts .post').removeClass('appended');

								// Update nicescroll
								$("html").getNiceScroll().resize();

								postLoadMoreText();
							},600);

							postStartPage++;

							nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
							loadRequestRunning = false;

						} else {
							postAjaxError.show();
						}
					});

				}

				return false;
			});
		} else if (postLoop.hasClass('nav-scroll')) {
			postAjaxScrollStatusCheck();

			$(window).scroll(function(){
	           
	            if  (postAjaxScroll.isInViewport(window)){
	            	
	            	if (loadRequestRunning) {
						return;
					}

					loadRequestRunning = true;

					postAjaxScrollStatusCheck();

					if(postStartPage <= postMax) {

						postAjaxScroll.addClass('loading');
						$.get(nextLink,function(content) {

						    var content = $(content).find('#loop-posts > .post').addClass('appended');

						    if (typeof content !== "undefined") {

							    $('#loop-posts').append(content);
								var itemSet = document.querySelector( '.loop-posts' );
								var items   = Array.prototype.slice.call( document.querySelectorAll( '.loop-posts > .post > .post-inner' ) );
								
								if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){
									new AnimOnScroll( itemSet, {
										items:items,
										minDelay : blogMinDelay,
										maxDelay : blogMaxDelay,
										viewportFactor:blogViewportFactor,
										delay:blogDelay,
										reload:blogReload,
										grid:blogGrid,
										itemSelector:blogItemSelector,
										delayType:blogDelayType,
										gridSizer:blogGridSizer
									} );
								}
								
								$('#loop-posts.overlay-move .overlay-hover')
								.each( function() { $(this).hoverdir(); } );
								plyrElement();
								postGallery();

								setTimeout(function(){
									postAjaxScroll.removeClass('loading');
									$('#loop-posts .post').removeClass('appended');

									// Update nicescroll
									$("html").getNiceScroll().resize();

									postLoadMoreText();
								},600);

								postStartPage++;

								nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
								loadRequestRunning = false;
							} else {
								projectAjaxError.show();
							}
						});

					}

					return false;
	            }

	        });
		}

		var postBodyHeight = $('#single-post-page > .post > .post-inner > .post-body').height();

		if (postBodyHeight < 250) {
			$("#single-post-page #post-social-share").addClass('static');
		}

		var stickyOffeset = $('.et-desktop').hasClass('sticky-true') ? $('.et-desktop.sticky-true').outerHeight() : 0;
		$("#single-post-page #post-social-share").stick_in_parent({
			parent:'.post-body',
			spacer:false,
			offset_top:stickyOffeset
		});

	})(jQuery);

/* Projects
---------------*/

	(function($){

		"use strict";

		// Project loop
		var projectLayout         = $('.project-layout');
		var projectMinDelay       = 100;
		var projectMaxDelay       = 300;
		var projectViewportFactor = 0.4;
		var projectDelay          = 50;
		var projectReload         = true;
		var projectGrid           = true;
		var projectItemSelector   = '.et-item';
		var projectGridSizer      = '.grid-sizer';
		var projectDelayType      = 'both';
		var projectPreloaderDelay = 0;
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		if ($('#loop-projects').hasClass('effect-none')) {
			projectDelayType = (preloaderActive == true) ? 'image' : "none";
		} else {
			projectDelayType = (preloaderActive == true) ? 'both' : "grid";

			if (preloaderActive && projectDelayType == "both") {
				projectPreloaderDelay = 300;
			}
		}

		var projectItemSet = document.querySelector( '#loop-projects' );
		var projectItems   = Array.prototype.slice.call( document.querySelectorAll( '#loop-projects > .project > .post-inner' ) );
		if (typeof(projectItemSet) != 'undefined' && projectItemSet != null && projectItems.length){
			new AnimOnScroll( projectItemSet, {
				items:projectItems,
				minDelay : projectMinDelay,
				maxDelay : projectMaxDelay,
				preloaderDelay:projectPreloaderDelay,
				viewportFactor:projectViewportFactor,
				delay:projectDelay,
				reload:projectReload,
				grid:projectGrid,
				gridSizer:projectGridSizer,
				itemSelector:projectItemSelector,
				delayType:projectDelayType
			} );
		}

		var projectFilter            = $('#project-filter'),
			projectLoop              = $('#loop-projects'),
			exclude                  = projectLoop.data('exclude'),
			projectNavigation        = projectLoop.data('navigation'),
			postPerPage              = projectFilter.data('posts-per-page'),
			projectLoadMore          = $('#project-ajax-loader'),
			projectAjaxScroll       = $('#project-ajax-scroll'),
			projectAjaxScrollStatus = $('#project-ajax-scroll-status'),
			projectAjaxError         = $('#project-ajax-error'),
			defaultText              = projectLoadMore.html(),
			postStartPage            = parseInt(controller_opt.postStartPage) + 1,
			projectMax               = parseInt(controller_opt.projectMax),
			nextLink    	         = controller_opt.projectNextLink,
			projectNoText            = controller_opt.projectNoText,
			projectLoadingText       = controller_opt.projectLoadingText,
			loadRequestRunning       = false,
			paginationRequestRunning = false,
			filterRequestRunning     = false;


		function buildJsonURL(){
			var json_url     = controller_opt.projectJsonUrl;
			json_url += '?per_page='+postPerPage;
			if (typeof(exclude) != 'undefined' && exclude.length && exclude != null) {
				json_url += '&exclude='+exclude;
			}

			return json_url;
		}

		var	layout       = 'project-with-details';
		var	column       = 'medium';
		var	container    = projectLayout.hasClass('project-container-boxed') ? 'boxed' : 'wide';
		var imageEffect  = projectLoop.hasClass('transform') ? 'transform' : 'overlay';
		var imageFull    = projectLoop.hasClass('image-full-true') ? true : false;
		var json_url     = buildJsonURL();


		if (projectLayout.hasClass('small')) {
			column = 'small';
		}

		if (projectLayout.hasClass('large')) {
			column = 'large';
		}

		if (projectLayout.hasClass('project-with-overlay')) {
			layout = 'project-with-overlay';
		}

		if (projectLayout.hasClass('project-with-caption')) {
			layout = 'project-with-caption';
		}

		function projectLoadMoreText(){
			if(postStartPage > projectMax) {
				projectLoadMore.html(projectNoText);
				projectLoadMore.addClass('disable');
			} else {
				projectLoadMore.html(defaultText);
				projectLoadMore.removeClass('disable');
			}
		}

		function projectAjaxScrollStatusCheck(){

			if(postStartPage > projectMax) {
				projectAjaxScrollStatus.html(projectNoText);
				projectAjaxScroll.addClass('disable');
			} else {
				projectAjaxScrollStatus.empty();
				projectAjaxScroll.removeClass('disable');
			}
		}

		function projectBuildPagination(){
			$('.enovathemes-navigation').addClass('ajax').empty();
			if(postStartPage <= projectMax) {

				$('.enovathemes-navigation').append('<ul class="page-numbers"></ul>');
				var $pagination = $('.enovathemes-navigation > .page-numbers');

				for (var i = 1; i <= projectMax; i++) {
					$pagination.append('<li><a class="page-numbers" data-page="'+i+'" href="'+nextLink.replace(/\/page\/[0-9]*/, '/page/'+ i)+'">'+i+'</a></li>');
				}

				$pagination.find('a').first().addClass('current');
			}
		}

		function projectAjaxLoad(){
			if (projectNavigation == "loadmore") {
				projectLoadMoreText();
				projectLoadMore.on('click',function(){

					var $this = $(this);

					if (loadRequestRunning) {
						return;
					}

					loadRequestRunning = true;

					projectLoadMoreText();				

					if(postStartPage <= projectMax) {

						json_url += '&page='+postStartPage;

						$this.addClass('loading');

						$.ajax({
							dataType: 'json',
							url:json_url
						})

						.done(function(response){

							var $output = '';

							$.each(response,function(index,object){

								$output += '<article id="project-'+object.id+'" class="et-item post post-'+object.id+' project type-project hentry appended">';
									$output += '<div class="post-inner et-item-inner et-clearfix">';
										$output += '<div class="overlay-hover">';
											$output += '<div class="post-image post-media">';
												if (imageEffect == "overlay") {
													if (layout == 'project-with-details' || layout == 'project-with-overlay') {
														$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">';
															$output += '<div class="post-image-overlay">';
																$output += '<div class="post-image-overlay-content">';
																	$output += '<span class="overlay-read-more"></span>';
																	if (layout == 'project-with-overlay') {

																		$output += '<div class="project-category">';

																			var projectCategoryArray 	   = object.project_category_array;
																			var projectCategoryArrayOutput = [];

																			for (var i = 0; i < projectCategoryArray.length; i++) {
																				projectCategoryArrayOutput.push(projectCategoryArray[i][0]);
																			}

																			$output += projectCategoryArrayOutput.join(", ");

																		$output += '</div>';

																		$output += '<h4 class="post-title">'+object.title.rendered+'</h4>';
																	}
																$output += '</div>';
															$output += '</div>';
														$output += '</a>';
													}
												}
												$output += '<div class="image-container">';
													$output += '<a href="'+object.link+'">';

														var imageSrc = '';
														var imageObj = [{}];
														var projectImageArray = object.project_image;

											            for (var i = 0; i < projectImageArray.length; i++) {
											                var key      = (projectImageArray[i][0]);
											                var value    = (projectImageArray[i][1]);
											                imageObj[key] = value;
											            }

														switch (column) {
															case 'small':
																imageSrc = (container == "wide") ? imageObj['samatex_480X360'] : imageObj['samatex_400X320'];
																break;
															case 'medium':
																imageSrc = (container == "wide") ? imageObj['samatex_640X400'] : imageObj['samatex_400X320'];
																break;
															case 'large':
																imageSrc = (container == "wide") ? imageObj['samatex_960X600'] : imageObj['samatex_600X370'];
																break;
														}

														if (imageFull || (typeof(imageSrc) == 'undefined' || imageSrc == null || !imageSrc.length)) {
															imageSrc = imageObj['full'];
														}

														$output += '<div class="image-preloader"></div>';
														$output += '<img src="'+imageSrc+'" class="wp-post-image" data-responsive-images="false">';
													$output += '</a>';
												$output += '</div>';
											$output += '</div>';
											if (layout != 'project-with-overlay') {
												$output += '<div class="post-body et-clearfix">';
													$output += '<div class="post-body-inner-wrap">';
														$output += '<div class="post-body-inner">';

															if (layout == 'project-with-details') {
																$output += '<div class="project-category">';

																	var projectCategoryArray 	   = object.project_category_array;
																	var projectCategoryArrayOutput = [];

																	for (var i = 0; i < projectCategoryArray.length; i++) {
																		projectCategoryArrayOutput.push('<a href="'+projectCategoryArray[i][1]+'" rel="tag">'+projectCategoryArray[i][0]+'</a>');
																	}

																	$output += projectCategoryArrayOutput.join(", ");

																$output += '</div>';
															}

															$output += '<h4 class="post-title entry-title">';
																$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">'+object.title.rendered+'</a>';
															$output += '</h4>';

														$output += '</div>';
													$output += '</div>';
												$output += '</div>';
											}
										$output += '</div>';
									$output += '</div>';
								$output += '</article>';

							});

							if ($output.length) {

								$('#loop-projects').append($output);

								var ItemSet = document.querySelector( '#loop-projects' );
								var Items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-projects > .project > .post-inner' ) );

								if (typeof(ItemSet) != 'undefined' && ItemSet != null && Items.length){
									new AnimOnScroll( ItemSet, {
										items:Items,
										minDelay : projectMinDelay,
										maxDelay : projectMaxDelay,
										preloaderDelay:projectPreloaderDelay,
										viewportFactor:projectViewportFactor,
										delay:projectDelay,
										reload:projectReload,
										grid:projectGrid,
										gridSizer:projectGridSizer,
										itemSelector:projectItemSelector,
										delayType:projectDelayType
									} );
								}

							}

							postStartPage++;
							nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);

							loadRequestRunning       = false;
							paginationRequestRunning = false;
							filterRequestRunning     = false;

							$('#loop-projects.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

							$output = '';

							$("html").getNiceScroll().resize();

							projectLoadMoreText();

							setTimeout(function(){
								$this.removeClass('loading');
								$('#loop-projects .project').removeClass('appended');
							},300);

						})

						.fail(function(response){

							$('.ajax-scroll-overlay').fadeOut(100,function(){
								$('#loop-project').append('<span class="error fas fa-exclamation-triangle"></span>');
							});

						});

					}

					return false;
				});
			} else if (projectNavigation == "scroll") {

				projectAjaxScrollStatusCheck();

				$(window).scroll(function(){

		            if  (projectAjaxScroll.isInViewport(window)){

		            	if (loadRequestRunning) {
							return;
						}

						loadRequestRunning = true;

						projectAjaxScrollStatusCheck();

						if(postStartPage <= projectMax) {

							json_url += '&page='+postStartPage;

							projectAjaxScroll.addClass('loading');

							$.ajax({
								dataType: 'json',
								url:json_url
							})

							.done(function(response){

								var $output = '';

								$.each(response,function(index,object){

									$output += '<article id="project-'+object.id+'" class="et-item post post-'+object.id+' project type-project hentry appended">';
										$output += '<div class="post-inner et-item-inner et-clearfix">';
											$output += '<div class="overlay-hover">';
												$output += '<div class="post-image post-media">';
													if (imageEffect == "overlay") {
														if (layout == 'project-with-details' || layout == 'project-with-overlay') {
															$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">';
																$output += '<div class="post-image-overlay">';
																	$output += '<div class="post-image-overlay-content">';
																		$output += '<span class="overlay-read-more"></span>';
																		if (layout == 'project-with-overlay') {

																			$output += '<div class="project-category">';

																				var projectCategoryArray 	   = object.project_category_array;
																				var projectCategoryArrayOutput = [];

																				for (var i = 0; i < projectCategoryArray.length; i++) {
																					projectCategoryArrayOutput.push(projectCategoryArray[i][0]);
																				}

																				$output += projectCategoryArrayOutput.join(", ");

																			$output += '</div>';

																			$output += '<h4 class="post-title">'+object.title.rendered+'</h4>';
																		}
																	$output += '</div>';
																$output += '</div>';
															$output += '</a>';
														}
													}
													$output += '<div class="image-container">';
														$output += '<a href="'+object.link+'">';

															var imageSrc = '';
															var imageObj = [{}];
															var projectImageArray = object.project_image;

												            for (var i = 0; i < projectImageArray.length; i++) {
												                var key      = (projectImageArray[i][0]);
												                var value    = (projectImageArray[i][1]);
												                imageObj[key] = value;
												            }

												            console.log(imageObj);

															switch (column) {
																case 'small':
																	imageSrc = (container == "wide") ? imageObj['samatex_480X360'] : imageObj['samatex_400X320'];
																	break;
																case 'medium':
																	imageSrc = (container == "wide") ? imageObj['samatex_640X400'] : imageObj['samatex_400X320'];
																	break;
																case 'large':
																	imageSrc = (container == "wide") ? imageObj['samatex_960X600'] : imageObj['samatex_600X370'];
																	break;
															}

															if (imageFull || (typeof(imageSrc) == 'undefined' || imageSrc == null || !imageSrc.length)) {
																imageSrc = imageObj['full'];
															}

															$output += '<div class="image-preloader"></div>';
															$output += '<img src="'+imageSrc+'" class="wp-post-image" data-responsive-images="false">';
														$output += '</a>';
													$output += '</div>';
												$output += '</div>';
												if (layout != 'project-with-overlay') {
													$output += '<div class="post-body et-clearfix">';
														$output += '<div class="post-body-inner-wrap">';
															$output += '<div class="post-body-inner">';

																if (layout == 'project-with-details') {
																	$output += '<div class="project-category">';

																		var projectCategoryArray 	   = object.project_category_array;
																		var projectCategoryArrayOutput = [];

																		for (var i = 0; i < projectCategoryArray.length; i++) {
																			projectCategoryArrayOutput.push('<a href="'+projectCategoryArray[i][1]+'" rel="tag">'+projectCategoryArray[i][0]+'</a>');
																		}

																		$output += projectCategoryArrayOutput.join(", ");

																	$output += '</div>';
																}

																$output += '<h4 class="post-title entry-title">';
																	$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">'+object.title.rendered+'</a>';
																$output += '</h4>';

															$output += '</div>';
														$output += '</div>';
													$output += '</div>';
												}
											$output += '</div>';
										$output += '</div>';
									$output += '</article>';

								});

								if ($output.length) {

									$('#loop-projects').append($output);

									var ItemSet = document.querySelector( '#loop-projects' );
									var Items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-projects > .project > .post-inner' ) );

									if (typeof(ItemSet) != 'undefined' && ItemSet != null && Items.length){
										new AnimOnScroll( ItemSet, {
											items:Items,
											minDelay : projectMinDelay,
											maxDelay : projectMaxDelay,
											preloaderDelay:projectPreloaderDelay,
											viewportFactor:projectViewportFactor,
											delay:projectDelay,
											reload:projectReload,
											grid:projectGrid,
											gridSizer:projectGridSizer,
											itemSelector:projectItemSelector,
											delayType:projectDelayType
										} );
									}

								}

								postStartPage++;

								nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);

								loadRequestRunning       = false;
								paginationRequestRunning = false;
								filterRequestRunning     = false;

								$('#loop-projects.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

								$output = '';

								$("html").getNiceScroll().resize();

								projectLoadMoreText();

								setTimeout(function(){
									projectAjaxScroll.removeClass('loading');
									$('#loop-projects .project').removeClass('appended');
								},300);

							})

							.fail(function(response){

								$('.ajax-scroll-overlay').fadeOut(100,function(){
									$('#loop-project').append('<span class="error fas fa-exclamation-triangle"></span>');
								});

							});

						}

						return false;
		            }
		        });

			} else if (projectNavigation == "pagination" && projectFilter.length) {
				if (!$('.enovathemes-navigation').hasClass('tax')) {
					projectBuildPagination();
					$('.enovathemes-navigation').find('a').on('click',function(event){

						event.preventDefault();

						var $this = $(this);

						$('.enovathemes-navigation .current').removeClass('current');

						$this.toggleClass('current');

						if (paginationRequestRunning) {
							return;
						}

						paginationRequestRunning = true;

						if(postStartPage <= projectMax) {

							projectLoop.prepend('<div class="ajax-scroll-overlay"><div class="ajax-scroll-overlay-content"><div class="ajax-scroll-text">'+projectLoadingText+'</div><div class="ajax-scroll"><span></span><span></span></div></div></div>');
							projectLoop.find('.ajax-scroll-overlay').fadeIn(300);
							projectLoop.find('.project').remove();

							var json_urlClone = json_url;
							json_url += '&page='+$this.data('page');

							console.log(json_url);

							$.ajax({
								dataType: 'json',
								url:json_url
							})

							.done(function(response){

								var $output = '';

								$.each(response,function(index,object){

									$output += '<article id="project-'+object.id+'" class="et-item post post-'+object.id+' project type-project hentry appended">';
										$output += '<div class="post-inner et-item-inner et-clearfix">';
											$output += '<div class="overlay-hover">';
												$output += '<div class="post-image post-media">';
													if (imageEffect == "overlay") {
														if (layout == 'project-with-details' || layout == 'project-with-overlay') {
															$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">';
																$output += '<div class="post-image-overlay">';
																	$output += '<div class="post-image-overlay-content">';
																		$output += '<span class="overlay-read-more"></span>';
																		if (layout == 'project-with-overlay') {

																			$output += '<div class="project-category">';

																				var projectCategoryArray 	   = object.project_category_array;
																				var projectCategoryArrayOutput = [];

																				for (var i = 0; i < projectCategoryArray.length; i++) {
																					projectCategoryArrayOutput.push(projectCategoryArray[i][0]);
																				}

																				$output += projectCategoryArrayOutput.join(", ");

																			$output += '</div>';

																			$output += '<h4 class="post-title">'+object.title.rendered+'</h4>';
																		}
																	$output += '</div>';
																$output += '</div>';
															$output += '</a>';
														}
													}
													$output += '<div class="image-container">';
														$output += '<a href="'+object.link+'">';

															var imageSrc = '';
															var imageObj = [{}];
															var projectImageArray = object.project_image;

												            for (var i = 0; i < projectImageArray.length; i++) {
												                var key      = (projectImageArray[i][0]);
												                var value    = (projectImageArray[i][1]);
												                imageObj[key] = value;
												            }

															switch (column) {
																case 'small':
																	imageSrc = (container == "wide") ? imageObj['samatex_480X360'] : imageObj['samatex_400X320'];
																	break;
																case 'medium':
																	imageSrc = (container == "wide") ? imageObj['samatex_640X400'] : imageObj['samatex_400X320'];
																	break;
																case 'large':
																	imageSrc = (container == "wide") ? imageObj['samatex_960X600'] : imageObj['samatex_600X370'];
																	break;
															}

															if (imageFull || (typeof(imageSrc) == 'undefined' || imageSrc == null || !imageSrc.length)) {
																imageSrc = imageObj['full'];
															}

															$output += '<div class="image-preloader"></div>';
															$output += '<img src="'+imageSrc+'" class="wp-post-image" data-responsive-images="false">';
														$output += '</a>';
													$output += '</div>';
												$output += '</div>';
												if (layout != 'project-with-overlay') {
													$output += '<div class="post-body et-clearfix">';
														$output += '<div class="post-body-inner-wrap">';
															$output += '<div class="post-body-inner">';

																if (layout == 'project-with-details') {
																	$output += '<div class="project-category">';

																		var projectCategoryArray 	   = object.project_category_array;
																		var projectCategoryArrayOutput = [];

																		for (var i = 0; i < projectCategoryArray.length; i++) {
																			projectCategoryArrayOutput.push('<a href="'+projectCategoryArray[i][1]+'" rel="tag">'+projectCategoryArray[i][0]+'</a>');
																		}

																		$output += projectCategoryArrayOutput.join(", ");

																	$output += '</div>';
																}

																$output += '<h4 class="post-title entry-title">';
																	$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">'+object.title.rendered+'</a>';
																$output += '</h4>';

															$output += '</div>';
														$output += '</div>';
													$output += '</div>';
												}
											$output += '</div>';
										$output += '</div>';
									$output += '</article>';

								});

								if ($output.length) {

									$('#loop-projects').append($output);

									var ItemSet = document.querySelector( '#loop-projects' );
									var Items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-projects > .project > .post-inner' ) );

									if (typeof(ItemSet) != 'undefined' && ItemSet != null && Items.length){
										new AnimOnScroll( ItemSet, {
											items:Items,
											minDelay : projectMinDelay,
											maxDelay : projectMaxDelay,
											preloaderDelay:projectPreloaderDelay,
											viewportFactor:projectViewportFactor,
											delay:projectDelay,
											reload:projectReload,
											grid:projectGrid,
											gridSizer:projectGridSizer,
											itemSelector:projectItemSelector,
											delayType:projectDelayType
										} );
									}

								}

								$('.ajax-scroll-overlay').fadeOut(100,function(){

									$(this).remove();

									loadRequestRunning       = false;
									paginationRequestRunning = false;
									filterRequestRunning     = false;
									json_url                 = json_urlClone;

									$('#loop-projects.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

									$output = '';

									$("html").getNiceScroll().resize();

									projectLoadMoreText();

									setTimeout(function(){
										$('#loop-projects .project').removeClass('appended');
									},300);

								});

							})

							.fail(function(response){

								$('.ajax-scroll-overlay').fadeOut(100,function(){
									$('#loop-project').append('<span class="error fas fa-exclamation-triangle"></span>');
								});

							});


							

						}

						return false;
					});
				}
			}
		}

		if (projectFilter.length) {

			projectFilter.find('.filter').on('click',function(event){

				event.preventDefault();

				if (filterRequestRunning) {
					return;
				}

				filterRequestRunning = true;

				projectLoop.prepend('<div class="ajax-scroll-overlay"><div class="ajax-scroll-overlay-content"><div class="ajax-scroll-text">'+projectLoadingText+'</div><div class="ajax-scroll"><span></span><span></span></div></div></div>');
				projectLoop.find('.ajax-scroll-overlay').fadeIn(300);
				projectLoop.find('.project').remove();

				var currentFilter   = $(this);
				var filterLink      = currentFilter.attr('href');
				var currentFilterID = currentFilter.data('filter-id');

				postStartPage = 2;
				nextLink      = filterLink + 'page/'+postStartPage;
				projectMax    = Math.ceil(currentFilter.attr('data-count')/postPerPage);
				json_url      = buildJsonURL();

        		if (typeof(currentFilterID) != 'undefined' && currentFilterID != null){
					json_url += '&project-category='+currentFilterID;
				}

        		currentFilter.addClass('active').siblings().removeClass('active');

				if (projectNavigation == "pagination"){
					$('.enovathemes-navigation').addClass('hide');
        		} else {
					$('.ajax-container').addClass('hide');
        		}

        		$.ajax({
					dataType: 'json',
					url:json_url
				})

				.done(function(response){

					var $output = '';

					$.each(response,function(index,object){

						$output += '<article id="project-'+object.id+'" class="et-item post post-'+object.id+' project type-project hentry appended">';
							$output += '<div class="post-inner et-item-inner et-clearfix">';
								$output += '<div class="overlay-hover">';
									$output += '<div class="post-image post-media">';
										if (imageEffect == "overlay") {
											if (layout == 'project-with-details' || layout == 'project-with-overlay') {
												$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">';
													$output += '<div class="post-image-overlay">';
														$output += '<div class="post-image-overlay-content">';
															$output += '<span class="overlay-read-more"></span>';
															if (layout == 'project-with-overlay') {

																$output += '<div class="project-category">';

																	var projectCategoryArray 	   = object.project_category_array;
																	var projectCategoryArrayOutput = [];

																	for (var i = 0; i < projectCategoryArray.length; i++) {
																		projectCategoryArrayOutput.push(projectCategoryArray[i][0]);
																	}

																	$output += projectCategoryArrayOutput.join(", ");

																$output += '</div>';

																$output += '<h4 class="post-title">'+object.title.rendered+'</h4>';
															}
														$output += '</div>';
													$output += '</div>';
												$output += '</a>';
											}
										}
										$output += '<div class="image-container">';
											$output += '<a href="'+object.link+'">';

												var imageSrc = '';
												var imageObj = [{}];
												var projectImageArray = object.project_image;

									            for (var i = 0; i < projectImageArray.length; i++) {
									                var key      = (projectImageArray[i][0]);
									                var value    = (projectImageArray[i][1]);
									                imageObj[key] = value;
									            }

												switch (column) {
													case 'small':
														imageSrc = (container == "wide") ? imageObj['samatex_480X360'] : imageObj['samatex_400X320'];
														break;
													case 'medium':
														imageSrc = (container == "wide") ? imageObj['samatex_640X400'] : imageObj['samatex_400X320'];
														break;
													case 'large':
														imageSrc = (container == "wide") ? imageObj['samatex_960X600'] : imageObj['samatex_600X370'];
														break;
												}

												if (imageFull || (typeof(imageSrc) == 'undefined' || imageSrc == null || !imageSrc.length)) {
													imageSrc = imageObj['full'];
												}

												$output += '<div class="image-preloader"></div>';
												$output += '<img src="'+imageSrc+'" class="wp-post-image" data-responsive-images="false">';
											$output += '</a>';
										$output += '</div>';
									$output += '</div>';
									if (layout != 'project-with-overlay') {
										$output += '<div class="post-body et-clearfix">';
											$output += '<div class="post-body-inner-wrap">';
												$output += '<div class="post-body-inner">';

													if (layout == 'project-with-details') {
														$output += '<div class="project-category">';

															var projectCategoryArray 	   = object.project_category_array;
															var projectCategoryArrayOutput = [];

															for (var i = 0; i < projectCategoryArray.length; i++) {
																projectCategoryArrayOutput.push('<a href="'+projectCategoryArray[i][1]+'" rel="tag">'+projectCategoryArray[i][0]+'</a>');
															}

															$output += projectCategoryArrayOutput.join(", ");

														$output += '</div>';
													}

													$output += '<h4 class="post-title entry-title">';
														$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">'+object.title.rendered+'</a>';
													$output += '</h4>';

												$output += '</div>';
											$output += '</div>';
										$output += '</div>';
									}
								$output += '</div>';
							$output += '</div>';
						$output += '</article>';

					});

					if ($output.length) {

						$('#loop-projects').append($output);

						var ItemSet = document.querySelector( '#loop-projects' );
						var Items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-projects > .project > .post-inner' ) );

						if (typeof(ItemSet) != 'undefined' && ItemSet != null && Items.length){
							new AnimOnScroll( ItemSet, {
								items:Items,
								minDelay : projectMinDelay,
								maxDelay : projectMaxDelay,
								preloaderDelay:projectPreloaderDelay,
								viewportFactor:projectViewportFactor,
								delay:projectDelay,
								reload:projectReload,
								grid:projectGrid,
								gridSizer:projectGridSizer,
								itemSelector:projectItemSelector,
								delayType:projectDelayType
							} );
						}

					}

					$('#loop-projects.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

					$('.ajax-scroll-overlay').fadeOut(100,function(){

						$(this).remove();

						$output = '';

						loadRequestRunning       = false;
						paginationRequestRunning = false;
						filterRequestRunning     = false;

						$("html").getNiceScroll().resize();

						$('.enovathemes-navigation').removeClass('hide');
						$('.ajax-container').removeClass('hide');

						setTimeout(function(){
							$('#loop-projects .project').removeClass('appended');
						},300);

					});

				})

				.fail(function(response){

					$('.ajax-scroll-overlay').fadeOut(100,function(){
						$('#loop-project').append('<span class="error fas fa-exclamation-triangle"></span>');
					});

				})

				.always(function(response){
					projectAjaxLoad();
				});

        		return false;

			});

			projectAjaxLoad();

		} else {
			projectAjaxLoad();
		}

		var slidesToShow = ($('.project-layout-single').hasClass('project-layout-wide')) ? 10 : 6;

		$('#project-gallery ul.carousel_thumb').slick({
			asNavFor: '#project-gallery-navigation-set',
			slidesToShow: 1,
			slidesToScroll: 1,
			arrows: true,
			dots: false,
		});

		$('#project-gallery-navigation ul').slick({
			asNavFor: '#project-gallery-set',
			slidesToShow: slidesToShow,
			slidesToScroll: 1,
			dots: false,
			arrows: false,
			centerMode: false,
			focusOnSelect: true,
		});

	})(jQuery);

/* Products
---------------*/

	(function($){

		"use strict";

		var productMinDelay       = 100;
		var productMaxDelay       = 300;
		var productViewportFactor = 0.4;
		var productDelay          = 50;
		var productReload         = true;
		var productGrid           = true;
		var productDelayType      = 'both';
		var productPreloaderDelay = 0;
		var preloaderActive       = $('body').hasClass('preloader-active') ? true : false;


		if ($('body').hasClass('addon-active')) {

			if (!$('#loop-products').parent().hasClass('related') && !$('#loop-products').parent().hasClass('up-sells') && !$('#loop-products').parent().hasClass('cross-sells')) {

				$('#loop-products').prepend('<li class="grid-sizer"></li>');

				// Product loop
				var productLayout         = $('.product-layout');
				var productItemSelector   = '.et-item';
				var productGridSizer      = '.grid-sizer';

				if ($('#loop-products').hasClass('effect-none')) {
					productDelayType = (preloaderActive == true) ? 'image' : "none";
				} else {
					productDelayType = (preloaderActive == true) ? 'both' : "grid";

					if (preloaderActive && productDelayType == "both") {
						productPreloaderDelay = 300;
					}
				}

				var productItemSet = document.querySelector( '#loop-products' );
				var productItems   = Array.prototype.slice.call( document.querySelectorAll( '#loop-products > .product > .post-inner' ) );
				if (typeof(productItemSet) != 'undefined' && productItemSet != null && productItems.length){
					new AnimOnScroll( productItemSet, {
						items:productItems,
						minDelay : productMinDelay,
						maxDelay : productMaxDelay,
						preloaderDelay:productPreloaderDelay,
						viewportFactor:productViewportFactor,
						delay:productDelay,
						reload:productReload,
						grid:productGrid,
						gridSizer:productGridSizer,
						itemSelector:productItemSelector,
						delayType:productDelayType
					} );
				}

				var productFilter = $('#product-filter'),
					productLoop              = $('#loop-products'),
					productNavigation        = productLoop.data('navigation'),
					postPerPage              = productFilter.data('posts-per-page'),
					productLoadMore          = $('#product-ajax-loader'),
					productAjaxScroll        = $('#product-ajax-scroll'),
					productAjaxScrollStatus  = $('#product-ajax-scroll-status'),
					productAjaxError         = $('#product-ajax-error'),
					defaultText              = productLoadMore.html(),
					postStartPage            = parseInt(controller_opt.postStartPage) + 1,
					productMax               = parseInt(controller_opt.productMax),
					nextLink    	         = controller_opt.productNextLink,
					productNoText            = controller_opt.productNoText,
					productLoadingText       = controller_opt.productLoadingText,
					loadRequestRunning       = false,
					paginationRequestRunning = false,
					filterRequestRunning     = false;

				function productLoadMoreText(){
					if(postStartPage > productMax) {
						productLoadMore.html(productNoText);
						productLoadMore.addClass('disable');
					} else {
						productLoadMore.html(defaultText);
						productLoadMore.removeClass('disable');
					}
				}

				function productAjaxScrollStatusCheck(){

					if(postStartPage > productMax) {
						productAjaxScrollStatus.html(productNoText);
						productAjaxScroll.addClass('disable');
					} else {
						productAjaxScrollStatus.empty();
						productAjaxScroll.removeClass('disable');
					}
				}

				function productBuildPagination(){
					$('.enovathemes-navigation').addClass('ajax').empty();
					if(postStartPage <= productMax) {

						$('.enovathemes-navigation').append('<ul class="page-numbers"></ul>');
						var $pagination = $('.enovathemes-navigation > .page-numbers');

						for (var i = 1; i <= productMax; i++) {
							$pagination.append('<li><a class="page-numbers" href="'+nextLink.replace(/\/page\/[0-9]*/, '/page/'+ i)+'">'+i+'</a></li>');
						}

						$pagination.find('a').first().addClass('current');
					}
				}

				function productAjaxLoad(){
					if (productNavigation == "loadmore") {
						productLoadMoreText();
						productLoadMore.on('click',function(){

							var $this = $(this);

							if (loadRequestRunning) {
								return;
							}

							loadRequestRunning = true;

							productLoadMoreText();				

							if(postStartPage <= productMax) {

								$this.addClass('loading');
								$.get(nextLink,function(content) {

								    var content = $(content).find('#loop-products > .product').addClass('appended');

								    if (typeof content !== "undefined") {
									    $('#loop-products').append(content);
										var itemSet = document.querySelector( '#loop-products' );
										var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-products > .product > .post-inner' ) );
										
										if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

											new AnimOnScroll( itemSet, {
												items:items,
												minDelay : productMinDelay,
												maxDelay : productMaxDelay,
												preloaderDelay:productPreloaderDelay,
												viewportFactor:productViewportFactor,
												delay:productDelay,
												reload:productReload,
												grid:productGrid,
												gridSizer:productGridSizer,
												itemSelector:productItemSelector,
												delayType:productDelayType
											} );
										}

										productAdditonalFunctionality();

										// Update overlay-move
										$('#loop-products.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

										setTimeout(function(){
											$this.removeClass('loading');
											$('#loop-products .product').removeClass('appended');

											// Update nicescroll
											$("html").getNiceScroll().resize();

											productLoadMoreText();
										},600);

										postStartPage++;

										nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
										loadRequestRunning       = false;
										paginationRequestRunning = false;
										filterRequestRunning     = false;

									} else {
										productAjaxError.show();
									}
								});

							}

							return false;
						});
					} else if (productNavigation == "scroll") {
						productAjaxScrollStatusCheck();

						$(window).scroll(function(){

				            if  (productAjaxScroll.isInViewport(window)){

				            	if (loadRequestRunning) {
									return;
								}

								loadRequestRunning = true;

								productAjaxScrollStatusCheck();

								if(postStartPage <= productMax) {

									productAjaxScroll.addClass('loading');

									$.get(nextLink,function(content) {

									    var content = $(content).find('#loop-products > .product').addClass('appended');

										if (typeof content !== "undefined") {
									    	
									    	$('#loop-products').append(content);
									    
											var itemSet = document.querySelector( '#loop-products' );
											var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-products > .product > .post-inner' ) );
											
											if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){
												new AnimOnScroll( itemSet, {
													items:items,
													minDelay : productMinDelay,
													maxDelay : productMaxDelay,
													preloaderDelay:productPreloaderDelay,
													viewportFactor:productViewportFactor,
													delay:productDelay,
													reload:productReload,
													grid:productGrid,
													gridSizer:productGridSizer,
													itemSelector:productItemSelector,
													delayType:productDelayType
												} );
											}

											productAdditonalFunctionality();

											// Update overlay-move
											$('#loop-products.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

											setTimeout(function(){
												productAjaxScroll.removeClass('loading');
												$('#loop-products .product').removeClass('appended');

												// Update nicescroll
												$("html").getNiceScroll().resize();

												productLoadMoreText();
											},600);

											postStartPage++;

											nextLink = nextLink.replace(/\/page\/[0-9]*/, '/page/'+ postStartPage);
											loadRequestRunning       = false;
											paginationRequestRunning = false;
											filterRequestRunning     = false;

										} else {
											productAjaxError.show();
										}
									});

								}

								return false;
				            }
				        });
					} else if (productNavigation == "pagination" && productFilter.length) {
						if (!$('.enovathemes-navigation').hasClass('tax')) {
							productBuildPagination();
							$('.enovathemes-navigation').find('a').on('click',function(event){

								event.preventDefault();

								var $this = $(this);

								$('.enovathemes-navigation .current').removeClass('current');

								$this.toggleClass('current');

								if (paginationRequestRunning) {
									return;
								}

								paginationRequestRunning = true;

								if(postStartPage <= productMax) {

									productLoop.prepend('<div class="ajax-scroll-overlay"><div class="ajax-scroll-overlay-content"><div class="ajax-scroll-text">'+productLoadingText+'</div><div class="ajax-scroll"><span></span><span></span></div></div></div>');

									$('.ajax-scroll-overlay').fadeIn(300,function(){

										var $ajaxLoadingOverlay = $(this);

										productLoop.remove('.product');

										productLoop.load($this.attr('href') + ' #loop-products > .product',
											function(response, status, xhr) {

												if (status == "error") {
													$('#loop-products').css('height','200px');
													$ajaxLoadingOverlay.fadeOut(300,function(){
														productAjaxError.show();
													});
												} else {

													var content = $('#loop-products > .product').addClass('appended');

													if (typeof content !== "undefined") {

														$('#loop-products').append(content);

														var itemSet = document.querySelector( '#loop-products' );
														var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-products > .product > .post-inner' ) );
														
														if (typeof(productGridSizer) != 'undefined' && productGridSizer != null) {
															$('#loop-products').append('<div class="grid-sizer"></div>');
														}

														if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

															new AnimOnScroll( itemSet, {
																items:items,
																minDelay : productMinDelay,
																maxDelay : productMaxDelay,
																preloaderDelay:productPreloaderDelay,
																viewportFactor:productViewportFactor,
																delay:productDelay,
																reload:productReload,
																grid:productGrid,
																gridSizer:productGridSizer,
																itemSelector:productItemSelector,
																delayType:productDelayType
															} );

														}

														productAdditonalFunctionality();

														// Update overlay-move
														$('#loop-products.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

														setTimeout(function(){
															$ajaxLoadingOverlay.fadeOut(300);
															$('#loop-products .product').removeClass('appended');

															// Update nicescroll
															$("html").getNiceScroll().resize();

															productLoadMoreText();
														},600);

														loadRequestRunning       = false;
														paginationRequestRunning = false;
														filterRequestRunning     = false;
														
													} else {
														productAjaxError.show();
													}
												}
											}
										);

									});

								}

								return false;
							});
						}
					}
				}

				function productAdditonalFunctionality(){
					$('.loop-product.overlay-none .product').each(function(){
						var $this              = $(this),
							$thisImgGallery    = $this.find('.product-image-gallery'),
							$thisFirstImg      = $thisImgGallery.find('.image-container'),
							$images            = $thisImgGallery.children('img');

						var length = $images.length + 1,
							i      = 1,
							timer  = '';

						if (length > 1) {

							$thisImgGallery.hover(
								function(){
									timer  = setInterval(function(){
										$thisImgGallery.children().eq(i)
										.addClass('visible')
										.siblings()
										.removeClass('visible');
										i++;
										if (i == length) {
											$thisFirstImg
											.addClass('visible')
											.siblings()
											.removeClass('visible');
											i = 1;
										}
									},700);
								},
								function(){
									clearInterval(timer);
									$thisFirstImg
									.addClass('visible')
									.siblings()
									.removeClass('visible');
									i = 1;
								}
							);

						}

					});

					$('.yith-wcwl-add-to-wishlist').each(function(){

						var $this = $(this);
						var $yithWcwlAddButton            = $this.find('.yith-wcwl-add-button');
						var $yithWcwlWishlistaddedbrowse  = $this.find('.yith-wcwl-wishlistaddedbrowse');
						var $yithWcwlWishlistexistsbrowse = $this.find('.yith-wcwl-wishlistexistsbrowse');

						var $yithWcwlAddButtonLink = $yithWcwlAddButton.find('a');
						$yithWcwlAddButtonLink.attr('title',$yithWcwlAddButtonLink.text().trim());

						$yithWcwlWishlistaddedbrowse.find('a').attr('title',$yithWcwlWishlistaddedbrowse.find('.feedback').text().trim());
						$yithWcwlWishlistexistsbrowse.find('a').attr('title',$yithWcwlWishlistexistsbrowse.find('.feedback').text().trim());

						$this.find('a').on('click',function(){

							var $self = $(this);
							$self.addClass('active');

							setTimeout(function(){
								$self.removeClass('active');
							},1000);
						});

					});

					$('.loop-product .product').each(function(){

						var $this = $(this);
						var addToCard = $this.find('.ajax_add_to_cart');
						var productProgress = $this.find('.ajax-add-to-cart-loading');
						var addToCardEvent  = true;

						if (addToCard.hasClass('added')) {
							addToCardEvent  = false;
						}

						if (addToCard.attr('data-product_status') == 'outofstock') {
							addToCardEvent  = false;
						}

						if (addToCard.attr('data-product_type') == 'variable') {
							addToCardEvent  = false;
						}

						if (addToCardEvent == true) {
							addToCard.on('click',function(){
								var $self = $(this);
								productProgress.fadeIn(400,function(){
									setTimeout(function(){
										productProgress.find('.circle-loader').addClass('load-complete');
										setTimeout(function(){
											productProgress.fadeOut(400);
											addToCardEvent  = false;
										}, 500);
									}, 1500);
								});
								
							});
						}
					});
				}

				if (productFilter.length) {

					productFilter.find('.filter').on('click',function(event){

						event.preventDefault();

						if (filterRequestRunning) {
							return;
						}

						filterRequestRunning = true;

						var $this = $(this);
		        		var filterLink = $this.attr('href');

		        		$('#product-filter .active').removeClass('active');

		        		$this.toggleClass('active');
		        		postStartPage = 2;
						nextLink      = filterLink + 'page/'+postStartPage;
						productMax    = Math.ceil($this.attr('data-count')/postPerPage);

						if (productNavigation == "pagination"){
							$('.enovathemes-navigation').addClass('hide');
		        		} else {
							$('.ajax-container').addClass('hide');
		        		}

						productLoop.prepend('<div class="ajax-scroll-overlay"><div class="ajax-scroll-overlay-content"><div class="ajax-scroll-text">'+productLoadingText+'</div><div class="ajax-scroll"><span></span><span></span></div></div></div>');

						$('.ajax-scroll-overlay').fadeIn(300,function(){

							var $ajaxLoadingOverlay = $(this);

							productLoop.remove('.product');

							productLoop.load(filterLink + ' #loop-products > .product',
								function(response, status, xhr) {

									if (status == "error") {
										$('#loop-products').css('height','200px');
										$ajaxLoadingOverlay.fadeOut(300,function(){
											productAjaxError.show();
										});

									} else {

										var content = $('#loop-products > .product').addClass('appended');

										if (typeof content !== "undefined") {

											$('#loop-products').append(content);

											var itemSet = document.querySelector( '#loop-products' );
											var items   = Array.prototype.slice.call( document.querySelectorAll( '#loop-products > .product > .post-inner' ) );
											
											if (typeof(productGridSizer) != 'undefined' && productGridSizer != null) {
												$('#loop-products').append('<div class="grid-sizer"></div>');
											}

											if (typeof(itemSet) != 'undefined' && itemSet != null && items.length){

												new AnimOnScroll( itemSet, {
													items:items,
													minDelay : productMinDelay,
													maxDelay : productMaxDelay,
													preloaderDelay:productPreloaderDelay,
													viewportFactor:productViewportFactor,
													delay:productDelay,
													reload:productReload,
													grid:productGrid,
													gridSizer:productGridSizer,
													itemSelector:productItemSelector,
													delayType:productDelayType
												} );

											}

											productAdditonalFunctionality();

											// Update overlay-move
											$('#loop-products.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );


											setTimeout(function(){
												$ajaxLoadingOverlay.fadeOut(300);
												$('#loop-products .product').removeClass('appended');
												$('.enovathemes-navigation').removeClass('hide');
												$('.ajax-container').removeClass('hide');

												// Update nicescroll
												$("html").getNiceScroll().resize();

											},600);

											loadRequestRunning       = false;
											paginationRequestRunning = false;
											filterRequestRunning     = false;

										} else {
											productAjaxError.show();
										}
									}
								}
							);

							productAjaxLoad();

						});

		        		return false;

					});

					productAjaxLoad();

				} else {
					productAjaxLoad();
				}

				productAdditonalFunctionality();

			}

		} else {

			var productItemSelector   = '.product';
			var productItemSet = document.querySelector( '.archive ul.products' );
			var productItems   = Array.prototype.slice.call( document.querySelectorAll( 'ul.products > .product > .post-inner' ) );
			if (typeof(productItemSet) != 'undefined' && productItemSet != null && productItems.length){
				new AnimOnScroll( productItemSet, {
					items:productItems,
					minDelay : productMinDelay,
					maxDelay : productMaxDelay,
					preloaderDelay:productPreloaderDelay,
					viewportFactor:productViewportFactor,
					delay:productDelay,
					reload:productReload,
					grid:productGrid,
					itemSelector:productItemSelector,
					delayType:productDelayType
				} );
			}
		}

		/* Product cart
		---------------*/

			function scrollCart(){
				$('.header-cart').each(function(){

					var $this  = $(this);
					var toggle = $this.find('.cart-toggle');
					var box    = $this.find('.cart-box');

					toggle.on('click',function(){
						if (box.outerHeight() >= 320) {
							box.addClass('scroll-cart');
							box.find(".cart_list").niceScroll({
								cursorcolor:'#000000',
								cursoropacitymin:0.1,
								cursoropacitymax:0.3,
								cursorwidth:'6px',
								cursorborderradius:'6px',
								cursorborder: "none",
								zindex: "100000000",
							});
						}
					});
				});
			}

			scrollCart();



        /* Product single
		---------------*/

			$('.product-layout-single .single_add_to_cart_button').addClass('product-single-button');

		/* Woo default
		---------------*/

			$('ul.products .product').each(function(){

				var $this = $(this);
				var addToCard = $this.find('.ajax_add_to_cart');
				var productProgress = $this.find('.ajax-add-to-cart-loading');
				var addToCardEvent  = true;

				if (addToCard.hasClass('added')) {
					addToCardEvent  = false;
				}

				if (addToCard.attr('data-product_status') == 'outofstock') {
					addToCardEvent  = false;
				}

				if (addToCard.attr('data-product_type') == 'variable') {
					addToCardEvent  = false;
				}

				if (addToCardEvent == true) {
					addToCard.on('click',function(){
						var $self = $(this);
						productProgress.fadeIn(400,function(){
							setTimeout(function(){
								productProgress.find('.circle-loader').addClass('load-complete');
								setTimeout(function(){
									productProgress.fadeOut(400);
									addToCardEvent  = false;
								}, 500);
							}, 1500);
						});
						
					});
				}
			});

	})(jQuery);

/* Image preloader
---------------*/

	(function($){

		"use strict";
		
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		var itemSetMinDelay       = 100;
		var itemSetMaxDelay       = 300;
		var itemSetViewportFactor = 0.4;
		var itemSetDelay          = 10;
		var itemSetReload         = false;
		var itemSetGrid           = false;
		var itemSetDelayType      = 'image';
		var preloaderDelay        = 0;

		if (preloaderActive) {

			preloaderDelay = 300;

			// Instagram widget
			var InstagramItemSet = document.querySelectorAll( '.instagram-image-list' );
			imagesLoaded( InstagramItemSet, function() {
				for (var i = 0; i <= InstagramItemSet.length; i++) {
					if (typeof(InstagramItemSet[i]) != 'undefined' && InstagramItemSet[i] != null){

						var InstagramItem    = Array.prototype.slice.call( InstagramItemSet[i].querySelectorAll( 'li' ) );

						if (InstagramItem.length) {

						  	new AnimOnScroll( InstagramItemSet[i], {
								minDelay : itemSetMinDelay,
								maxDelay : itemSetMaxDelay,
								viewportFactor:itemSetViewportFactor,
								delay:itemSetDelay,
								reload:itemSetReload,
								grid:itemSetGrid,
								delayType:itemSetDelayType,
								items:InstagramItem
							} );
						}
					}
				}
			});


			// Gallery
			$('.gallery').find('.gallery-icon').wrapInner('<div class="image-container"></div>');
			$('.gallery').find('.gallery-icon > .image-container').append('<div class="image-preloader"></div>');

			var GalleryItemSet = document.querySelectorAll( '.gallery' );
			imagesLoaded( GalleryItemSet, function() {
				for (var i = 0; i <= GalleryItemSet.length; i++) {
					if (typeof(GalleryItemSet[i]) != 'undefined' && GalleryItemSet[i] != null){

						var GalleryItem    = Array.prototype.slice.call( GalleryItemSet[i].querySelectorAll( '.gallery-item' ) );

						if (GalleryItem.length) {

						  	new AnimOnScroll( GalleryItemSet[i], {
								minDelay : itemSetMinDelay,
								maxDelay : itemSetMaxDelay,
								viewportFactor:itemSetViewportFactor,
								delay:itemSetDelay,
								reload:itemSetReload,
								grid:itemSetGrid,
								delayType:itemSetDelayType,
								items:GalleryItem
							} );
						}
					}
				}
			});

			// Flickrm widget
			var FlickrItemSet = document.querySelectorAll( '.flickr-image-list' );
			imagesLoaded( FlickrItemSet, function() {
				for (var j = 0; j <= FlickrItemSet.length; j++) {
					if (typeof(FlickrItemSet[j]) != 'undefined' && FlickrItemSet[j] != null){

						var FlickrItem    = Array.prototype.slice.call( FlickrItemSet[j].querySelectorAll( 'li' ) );

						if (FlickrItem.length) {

							new AnimOnScroll( FlickrItemSet[j], {
								minDelay : itemSetMinDelay,
								maxDelay : itemSetMaxDelay,
								viewportFactor:itemSetViewportFactor,
								delay:itemSetDelay,
								reload:itemSetReload,
								grid:itemSetGrid,
								delayType:itemSetDelayType,
								items:FlickrItem
							} );

						}
					}
				}
			});

			// RPostsm widget
			var RPostsItemSet = document.querySelectorAll( '.widget_et_recent_entries ul' );
			imagesLoaded( RPostsItemSet, function() {
				for (var i = 0; i <= RPostsItemSet.length; i++) {
					if (typeof(RPostsItemSet[i]) != 'undefined' && RPostsItemSet[i] != null){

						var RPostsItem    = Array.prototype.slice.call( RPostsItemSet[i].querySelectorAll( 'li' ) );

						if (RPostsItem.length) {

						  	new AnimOnScroll( RPostsItemSet[i], {
								minDelay : itemSetMinDelay,
								maxDelay : itemSetMaxDelay,
								viewportFactor:itemSetViewportFactor,
								delay:itemSetDelay,
								reload:itemSetReload,
								grid:itemSetGrid,
								delayType:itemSetDelayType,
								items:RPostsItem
							} );
						}
					}
				}
			});

			// ProductListm widget
			var ProductListItemSet = document.querySelectorAll( '.product_list_widget' );
			imagesLoaded( ProductListItemSet, function() {
				for (var j = 0; j <= ProductListItemSet.length; j++) {
					if (typeof(ProductListItemSet[j]) != 'undefined' && ProductListItemSet[j] != null){

						var ProductListItem    = Array.prototype.slice.call( ProductListItemSet[j].querySelectorAll( 'li' ) );

						if (ProductListItem.length) {

							new AnimOnScroll( ProductListItemSet[j], {
								minDelay : itemSetMinDelay,
								maxDelay : itemSetMaxDelay,
								viewportFactor:itemSetViewportFactor,
								delay:itemSetDelay,
								reload:itemSetReload,
								grid:itemSetGrid,
								delayType:itemSetDelayType,
								items:ProductListItem
							} );

						}
					}
				}
			});

			// Single post page
			imagesLoaded( $('.single-post-page > .post'), function() {
				
				$('.single-post-page .post-media').waypoint({
				    handler: function(direction) {
				    	$(this.element).toggleClass('animate');
				    	this.destroy();
					},
				    offset: '100%'
				});

				$('.single-post-page > .post > .post-inner img[class*="wp-image"]').waypoint({
				    handler: function(direction) {
				    	$(this.element).toggleClass('animate');
				    	this.destroy();
					},
				    offset: 'bottom-in-view'
				});
	        });

	        // Single project page
			imagesLoaded( $('#single-project-page .project-image'), function() {
				$('#single-project-page .project-image').waypoint({
				    handler: function(direction) {
				    	$(this.element).toggleClass('animate');
				    	this.destroy();
					},
				    offset: '100%'
				});
	        });

	        $('.et-gallery.grid').addClass('animate-gallery');

		}

		$('.et-gallery.grid').prepend('<div class="grid-sizer"></div>');

		// EtGallery
		var EtGalleryItemSet = document.querySelectorAll( '.et-gallery.animate-gallery' );
		imagesLoaded( EtGalleryItemSet, function() {
			for (var i = 0; i <= EtGalleryItemSet.length; i++) {
				if (typeof(EtGalleryItemSet[i]) != 'undefined' && EtGalleryItemSet[i] != null){

					var EtGalleryItem    = Array.prototype.slice.call( EtGalleryItemSet[i].querySelectorAll( '.et-gallery-item > .et-item-inner' ) );

					if (EtGalleryItem.length) {

					  	new AnimOnScroll( EtGalleryItemSet[i], {
							minDelay : itemSetMinDelay,
							maxDelay : itemSetMaxDelay,
							viewportFactor:itemSetViewportFactor,
							delay:itemSetDelay,
							preloaderDelay:preloaderDelay,
							reload:itemSetReload,
							grid:true,
							delayType:'both',
							items:EtGalleryItem,
							gridSizer: '.grid-sizer'
						} );
					}
				}
			}
		});

		// Single project gallery
		var projectGalleryItemSet = document.querySelectorAll( '#project-gallery-set.grid-mas' );

		imagesLoaded( projectGalleryItemSet, function() {
			for (var i = 0; i <= projectGalleryItemSet.length; i++) {
				if (typeof(projectGalleryItemSet[i]) != 'undefined' && projectGalleryItemSet[i] != null){

					var projectGalleryItem    = Array.prototype.slice.call( projectGalleryItemSet[i].querySelectorAll( '#project-gallery-set.grid-mas > .et-item > .et-item-inner' ) );

					if (projectGalleryItem.length) {

					  	new AnimOnScroll( projectGalleryItemSet[i], {
							minDelay : itemSetMinDelay,
							maxDelay : itemSetMaxDelay,
							preloaderDelay:preloaderDelay,
							viewportFactor:itemSetViewportFactor,
							delay:itemSetDelay,
							reload:itemSetReload,
							grid:true,
							delayType:'both',
							gridSizer:'.grid-sizer',
							items:projectGalleryItem
						} );
					}
				}
			}
		});


	})(jQuery);

/* Material
---------------*/

	function materialButton(){
		var ink, d, x, y;

		jQuery(".material").on('click',function(e){

			var jQuerythis = jQuery(this);
		    
			if(jQuerythis.find(".et-ink").length === 0){
		        jQuerythis.prepend("<span class='et-ink'></span>");
		    }

		    ink = jQuerythis.find(".et-ink");
		    ink.removeClass("click");
		     
		    if(!ink.height() && !ink.width()){
		        d = Math.max(jQuerythis.outerWidth(), jQuerythis.outerHeight());
		        ink.css({height: d, width: d});
		    }
		     
		    x = e.pageX - jQuerythis.offset().left - ink.width()/2;
		    y = e.pageY - jQuerythis.offset().top - ink.height()/2;
		     
		    ink.css({top: y+'px', left: x+'px'}).addClass("click");
		});
	}

	materialButton();

	function scaleButton(){
		jQuery(".et-button.hover-scale").each(function(e){
			var jQuerythis = jQuery(this);
		    var hover      = jQuerythis.find(".hover");
	        var d = Math.max(jQuerythis.outerWidth(), jQuerythis.outerHeight());
	        hover.css({'height': d*1.2, 'width': d*1.2});
		});
	}

	scaleButton();

/* Click smooth
---------------*/

	(function($){

		"use strict";

		$('.click-smooth').bind('click.smoothscroll', function (event) {
			event.preventDefault();
			var target = this.hash;
			$('html, body').stop().animate({
			    'scrollTop': $(target).offset().top
			}, 800, function () {
			    window.location.hash = target;
			});
		});

	})(jQuery);

/* Carousel
---------------*/

	(function($){

		"use strict";

		$('.related ul.products').addClass('owl-carousel');
		$('.related ul.products').attr('data-columns',3);
		$('.up-sells ul.products').addClass('owl-carousel');
		$('.up-sells ul.products').attr('data-columns',3);
		$('.cross-sells ul.products').addClass('owl-carousel');
		$('.cross-sells ul.products').attr('data-columns',3);

		$('.owl-carousel').each(function(){

			var $this           = $(this);
			var	$thisColumns    =  $this.data('columns');

			var columnsTabPort = ($thisColumns < 2) ? 1 : 2;
			var columnsTabLand = ($thisColumns <= 4) ? $thisColumns : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 3 : 4;
			var columnsMob     = 1;
			var dots 	       = false;
			var autoplay 	   = false;
			var center 	       = false;
			var loop 	       = false;

			if ($this.hasClass('et-instagram-pics')) {
				columnsTabPort = ($thisColumns < 2) ? 1 : $thisColumns;
				columnsMob = ($thisColumns < 2) ? 1 : 3;
			}


			if ($this.hasClass('et-carousel') || $this.hasClass('et-testimonial-container') || $this.hasClass('et-person-container') || $this.hasClass('et-client-container')) {
				dots = true;
				if (($thisColumns >= 3)) {columnsTabLand = 2;}
			}

			var mobile = window.matchMedia("(max-width: 639px)");
			if (mobile.matches) {
				$thisColumns = 1;
				columnsTabPort = 1;
				columnsTabLand = 1;
				columnsMob = 1;
			}

			if ($this.hasClass('autoplay-true') || $this.data('autoplay') == true) {
				autoplay = true;
			}

			if ($this.parent().hasClass('et-shortcode-projects-full')) {
				dots = false;
			}

			if ($this.hasClass('related-projects')) {
				center = false,
				loop   = false;
			}

			if ($this.hasClass('navigation-only-dottes')) {
				dots = true;
			}

			imagesLoaded($this,function(){
				$this.owlCarousel({
					items:$thisColumns,
				    nav:true,
				    navText:[],
				    dots:dots,
				    autoplay:autoplay,
				    animateOut:false,
				    animateIn:false,
				    autoHeight: true,
				    responsive:{
				    	320 : {items:1},
				    	480 : {items:columnsMob},
				    	768 : {items:columnsTabPort},
				    	1024 : {items:columnsTabLand},
				    	1280 : {items:$thisColumns}
				    },
				    responsiveRefreshRate:200,
				    responsiveBaseElement:window,
				    center:center,
				    loop:loop
				});
			});

		});

		$('.manual-carousel').each(function(){

			var $this           = $(this);
			var	$thisColumns    =  $this.data('columns');

			var columnsTabPort = ($thisColumns < 2) ? 1 : 2;
			var columnsTabLand = ($thisColumns <= 4) ? $thisColumns : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 3 : 4;
			var columnsMob     = 1;

			imagesLoaded($this,function(){
				$this.find('.loop-posts').addClass('owl-carousel').owlCarousel({
					items:$thisColumns,
				    nav:true,
				    navText:[],
				    dots:false,
				    autoplay:false,
				    animateOut:false,
				    animateIn:false,
				    autoHeight: true,
				    responsive:{
				    	320 : {items:1},
				    	480 : {items:columnsMob},
				    	768 : {items:columnsTabPort},
				    	1024 : {items:columnsTabLand},
				    	1280 : {items:$thisColumns}
				    },
				    responsiveRefreshRate:200,
				    responsiveBaseElement:window,
				});
			});

		});


	})(jQuery);

/* Overlay-move
---------------*/

	(function($){
		"use strict";

		$('.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );
	})(jQuery);

/* Lightbox
---------------*/

	(function($){

		"use strict";

		var imagesWithLinks = $('a[href$=".gif"], a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".bmp"]');
		imagesWithLinks.each(function(){

			var $this = $(this);

			if (
				$this.has('img') && 
				!$this.hasClass('photoswip-project') && 
				!$this.hasClass('social-share') && 
				!$this.hasClass('photoswip-product') && 
				!$this.hasClass('et-gallery-link') && 
				!$this.parent().hasClass('woocommerce-product-gallery__image')
			) {
				$this.nivoLightbox({
					effect: 'fadeScale',
				    theme: 'default', 
				    keyboardNav: true, 
				    clickOverlayToClose: true, 
				    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
				});
			}
			
		});

		$('.gallery').each(function(){
			var $this = $(this);

			$this.find('.gallery-item').each(function(){
				var captionText = $(this).find('.wp-caption-text').text();
				var galleryImageWithLink = $(this).find('a[href$=".gif"], a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".bmp"]');

				if (galleryImageWithLink.has('img')) {
					galleryImageWithLink
					.attr("title",captionText)
					.attr("data-lightbox-gallery","gallery")
					.nivoLightbox({
						effect: 'fadeScale',
					    theme: 'default', 
					    keyboardNav: true, 
					    clickOverlayToClose: true, 
					    errorMessage: 'The requested content cannot be loaded. Please try again later.',
					    afterShowLightbox: function(lightbox){
					    	$('.nivo-lightbox-open')
							.on('swipeleft', function(){
								$('.nivo-lightbox-next').trigger( "click" );
							})
							.on('swiperight', function(){
								$('.nivo-lightbox-prev').trigger( "click" );
							});
					    }
					});
				}
			});
			
		});

		$('.et-gallery').each(function(){
			var $this = $(this);

			$this.find('.et-gallery-item').each(function(){
				var galleryImageWithLink = $(this).find('a.lightbox');
				if (galleryImageWithLink.has('img')) {
					galleryImageWithLink
					.nivoLightbox({
						effect: 'fadeScale',
					    theme: 'default', 
					    keyboardNav: true, 
					    clickOverlayToClose: true, 
					    errorMessage: 'The requested content cannot be loaded. Please try again later.',
					    afterShowLightbox: function(lightbox){
					    	$('.nivo-lightbox-open')
							.on('swipeleft', function(){
								$('.nivo-lightbox-next').trigger( "click" );
							})
							.on('swiperight', function(){
								$('.nivo-lightbox-prev').trigger( "click" );
							});
					    }
					});
				}
			});
			
		});

		$('a.single-image-link').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

		$('a[data-lightbox-gallery="image-slider"]').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

		$('a.video-modal').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

		$('a.et-button.modal-true').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

		$('a[data-modal="true"]').nivoLightbox({
			effect: 'fadeScale',
		    theme: 'default', 
		    keyboardNav: true, 
		    clickOverlayToClose: true, 
		    errorMessage: 'The requested content cannot be loaded. Please try again later.' 
		});

	})(jQuery);

/* Photoswip
---------------*/

	(function($){

		"use strict";

		var PhotoSwipe = window.PhotoSwipe,
			PhotoSwipeUI_Default = window.PhotoSwipeUI_Default;

		$('body').on('click', '.photoswip-project[data-size]', function(e) {
			if( !PhotoSwipe || !PhotoSwipeUI_Default ) {
				return;
			}

			e.preventDefault();
			openPhotoSwipe( this );
		});

		var parseThumbnailElements = function(gallery, el) {
			var elements = $(gallery).find('.photoswip-project[data-size]').has('img'),
				galleryItems = [],
				index;

			elements.each(function(i) {
				var $el = $(this),
					size = $el.data('size').split('x'),
					caption;
				
				caption = $el.attr('title');

				galleryItems.push({
					src: $el.attr('href'),
					w: parseInt(size[0], 10),
					h: parseInt(size[1], 10),
					title: caption,
					msrc: $el.find('img').attr('src'),
					el: $el
				});
				if( el === $el.get(0) ) {
					index = i;
				}
			});

			return [galleryItems, parseInt(index, 10)];
		};

		var openPhotoSwipe = function( element, disableAnimation ) {
			var pswpElement = $('.pswp').get(0),
				galleryElement = $(element).parents('.project-gallery').first(),
				gallery,
				options,
				items, index;

			items = parseThumbnailElements(galleryElement, element);
			index = items[1];
			items = items[0];

			options = {
				index: index,
				getThumbBoundsFn: function(index) {
					var image = items[index].el.find('img'),
						offset = image.offset();

					return {x:offset.left, y:offset.top, w:image.width()};
				},
				showHideOpacity: true,
				history: false,
			};

			if(disableAnimation) {
				options.showAnimationDuration = 0;
			}

			// Pass data to PhotoSwipe and initialize it
			gallery = new PhotoSwipe( pswpElement, PhotoSwipeUI_Default, items, options);
			gallery.init();
		};

	})(jQuery);

/* Default gallery
---------------*/

	(function($){

		"use strict";

		$('.gallery').each(function(){

			var $this = $(this);
			var items = $this.find('.gallery-item');
			var i = 0;
			var timer;

			if (!$this.parents('.menu-item-type-yawp_wim')) {
				$this.imagesLoaded(function(){
					$this.masonry({
					  itemSelector: '.gallery-item',
					});
				});
			}

		});

	})(jQuery);

/* Row
---------------*/

    (function($){

        "use strict";

        function backgroundScroll(el,speed,direction){
    		var size = (direction == "horizontal") ? el.data('img-width') : el.data('img-height');
    		if (direction == "horizontal") {
				el.animate({'background-position-x' :size}, {duration:speed,easing:'linear',complete:function(){el.css('background-position-x','0');backgroundScroll(el, speed,direction);}});
    		} else if (direction == "vertical") {
    			el.animate({'background-position-y' :size}, {duration:speed,easing:'linear',complete:function(){el.css('background-position-y','0');backgroundScroll(el, speed,direction);}});
    		};
		}

        $('.vc-parallax').each(function(){
            var $this = $(this),
            plx = $this.find('.parallax-container');
            
            if ($this.hasClass('vc-video-parallax')) {
           		plx = $this.find('.video-container');
            }

            $(window).scroll(function() {
                var yPos   = Math.round(($(window).scrollTop()-plx.offset().top) / $this.data('parallax-speed'));
                plx.css({
                	'-ms-transform':'translate3d(0,'+yPos + 'px,0)',
                	'transform':'translate3d(0,'+yPos + 'px,0)'
                });    
            });
        });

        $('.vc-fixed-bg').each(function(){

	    	var $this      = $(this), 
	    		fx         = $this.find('.fixed-container'),
	    		$secHeight = $(this).outerHeight(),			
			    $secWidth  = $(this).outerWidth(),
				fxHeight   = ($secHeight > $(window).height()) ? $secHeight : $(window).height();

			fx.css({'height':fxHeight*1.2+'px'});

			$(window).resize(function(){
				fx.css({'height':fxHeight+100+'px'});
	    	});
	    });

	    $('.vc-animated-bg').each(function(){

	    	var $this         = $(this), 
	    		animatedBg    = $this.find('.animated-container'),
	    		animatedDir   = $this.data('animatedbg-dir'),
	    		animatedSpeed = $this.data('animatedbg-speed');

		    	if (animatedDir == 'horizontal') {
		    		backgroundScroll(animatedBg, animatedSpeed, 'horizontal');
		    	} else if (animatedDir == 'vertical') {
		    		backgroundScroll(animatedBg, animatedSpeed, 'vertical');
		    	};
	    });

	    $('.curtain-gradient').each(function(){
	    	var $this = $(this);

	    	$this.waypoint({
			    handler: function(direction) {
			    	$(this.element).toggleClass('animate');
			    	this.destroy();
				},
			    offset: '75%'
			});

	    });

    })(jQuery);

/* et-heading
---------------*/

	(function($){

		$('.et-heading.animate-true').each(function(){
            var element      = $(this),
                elementDelay = element.attr('data-delay'),
                elementText  = element.find('.text');
                
            if (
                element.hasClass('letter-direct') || 
                element.hasClass('letter-angle') || 
                element.hasClass('words-direct') || 
                element.hasClass('words-angle')
            ) {

                var highlight      = elementText.find('.highlight');
            	var highlightAll   = (highlight.length && highlight.hasClass('full')) ? true : false;
				var highlightStyle = highlight.attr('style');
				var highlightClass = highlight.attr('class');

                elementText.html(elementText.text().split(' ').map(function(w) {return '<span class="word">' + w + '</span>';}).join(' '));

                element.find('.word').each(function(){

                    var word = $(this);

                    if (element.hasClass('letter-direct') || element.hasClass('letter-angle')) {
                    	word.html(word.text().split('').map(function(w) {return '<span class="letter">' + w + '</span>';}));
                    }

                    if (highlight.length && highlightAll == false && word.text() == highlight.text()) {
                        
                    	if (highlight.hasClass('box') || highlight.hasClass('underline')) {
                    		word.append('<span class="after" style="'+highlightStyle+'"></span>');
                    	}
                        word.attr({
                            'class':'word '+highlightClass,
                            'style':highlightStyle
                        });

                    }

                });

                if (highlightAll == true) {
                	if (highlight.hasClass('box') || highlight.hasClass('underline')) {
                		elementText.append('<span class="after" style="'+highlightStyle+'"></span>');
                	}
                    elementText.attr({
                        'class':'text '+highlightClass,
                        'style':highlightStyle
                    });
                }

            }

            $(this).waypoint({
                handler: function(direction) {

                    var $this = $(this.element);

                    /* Curtain
                    ---------------*/

                        if ($this.hasClass('curtain')) {
                            setTimeout(function(){
                                $this.addClass('active');
                            },elementDelay);

                            return;
                        }
                    
                    /* Words
                    ---------------*/

                        if ($this.hasClass('words-direct') || $this.hasClass('words-angle')) {

                            var i = 0;
                            var timer;
                            var $thisWords = $this.find('.word');
                            
                            setTimeout(function(){
                                $this.addClass('active');
                                timer = setInterval(function(){
                                    $($thisWords[i]).addClass('animate');
                                    i++;
                                    if (i == $thisWords.length) {clearInterval(timer);}
                                }, 50);
                            },elementDelay);

                            return;
                        }

                    /* Letters
                    ---------------*/

                        if ($this.hasClass('letter-direct') || $this.hasClass('letter-angle')) {

                            var i = 0;
                            var timer;
                            var $thisWords = $this.find('.letter');
                            
                            setTimeout(function(){
                                $this.addClass('active');
                                timer = setInterval(function(){
                                    $($thisWords[i]).addClass('animate');
                                    i++;
                                    if (i == $thisWords.length) {clearInterval(timer);}
                                }, 25);
                            },elementDelay);

                            return;
                        }
                   
                    this.destroy();
                
                },
                offset: '75%',
            });
        });

	})(jQuery);

/* et-typeit
---------------*/

	(function($){

		"use strict";

		$('.et-typeit').each(function(){

			var $this      = $(this);
			var strings    = $this.data('strings');
			var autostart  = $this.hasClass('autostart-true') ? true : false;
			var startdelay = $this.data('startdelay');
			
			strings    = strings.split(",");

			var string_1 = strings[0];
			var string_2 = strings[1];
			var string_3 = strings[2];
			var string_4 = strings[3];

			if ($this.hasClass('onlyfirst')) {
				$this.find('.typeit-dynamic').typeIt({
					speed: 100,
					startDelay:startdelay,
					autoStart: autostart,
					loop:false,
					lifeLike:true
				})
				.tiType(string_1);
			} else {
				$this.find('.typeit-dynamic').typeIt({
					speed: 100,
					startDelay:startdelay,
					autoStart: autostart,
					loop:false,
					lifeLike:true
				})
				.tiType(string_1)
				.tiPause(1000)
				.tiDelete(string_1.length)
				.tiType(string_2)
				.tiPause(1000)
				.tiDelete(string_2.length)
				.tiType(string_3)
				.tiPause(1000)
				.tiDelete(string_3.length)
				.tiType(string_4);
			}

			
		});

	})(jQuery);

/* et-button
---------------*/

	(function($){

		"use strict";


		$('.et-button').each(function(){

			var $this = $(this);
			var ink, d, x, y;
			$this.on('click',function(e){
				ink = $this.find(".et-ink");
				if (typeof(ink) != 'undefined' && ink != null) {
					ink.removeClass("click");
				    if(!ink.height() && !ink.width()){
				        d = Math.max($this.outerWidth(), $this.outerHeight());
				        ink.css({height: d, width: d});
				    }
				    x = e.pageX - $this.offset().left - ink.width()/2;
				    y = e.pageY - $this.offset().top - ink.height()/2;
				    ink.css({top: y+'px', left: x+'px'}).addClass("click");
				}
			});

			if ($this.hasClass('wpb_animate_when_almost_visible')) {

				var delay = $(this).data('animation_delay');

				$this.waypoint({
	                handler: function(direction) {

	                	setTimeout(function(){
	                		$(this.element)
	                        .addClass('wpb_start_animation')
	                        .addClass('animated');
	                	},delay);
	                   
	                    this.destroy();
	                
	                },
	                offset: '25%',
	            });

			}

		});

	})(jQuery);

/* et-separator
---------------*/

	(function($){

		"use strict";

		$('.et-separator.animate-true').waypoint({
		    handler: function(direction) {
		    	var $this = $(this.element),
				$thisDelay = $this.attr('data-delay');

		    	setTimeout(function(){
	    			$this.addClass('active')
	    		},$thisDelay);

		    	this.destroy();
			},
		    offset: 'bottom-in-view'
		});

	})(jQuery);

/* et-blockquote
---------------*/

	(function($){

		$('.et-blockquote').each(function(){
            $(this).waypoint({
                handler: function(direction) {
                    $(this.element).addClass('active');
                    this.destroy();
                },
                offset: '75%',
            });
        });

	})(jQuery);

/* et-testimonial
---------------*/

	(function($){

		$('.et-testimonial').each(function(){
			if (!$(this).parents('.et-testimonial-container').length) {
	            $(this).waypoint({
	                handler: function(direction) {
	                    $(this.element).addClass('active');
	                    this.destroy();
	                },
	                offset: '75%',
	            });
            }
        });

	})(jQuery);

/* et-person
---------------*/

	(function($){

		$('.et-person').each(function(){
			if (!$(this).parents('.et-person-container').length) {
	            $(this).waypoint({
	                handler: function(direction) {
	                    $(this.element).addClass('active');
	                    this.destroy();
	                },
	                offset: '75%',
	            });
            }
        });

	})(jQuery);

/* et-accordion
---------------*/

	(function($){

		"use strict";

		$('.et-accordion').each(function(){
			var $this = $(this),
				title = $this.find('.toggle-title'),
				content =  $this.find('.toggle-content');

			if($this.hasClass('collapsible-true')){
				$this.find('.active:not(:first)').removeClass("active");
			}

			content.hide();

			$this.find('.toggle-title.active').next().show();

			title.on('click', function(){

				var $self = $(this);
				var $selfContent = $self.next();
		
				if($this.hasClass('collapsible-true')){

					if(!$self.hasClass('active')){

						$self.addClass("active").siblings().removeClass("active");
						content.slideUp(300);
						$selfContent.slideDown(300);
					}

				} else {

					if(!$self.hasClass('active')){

						$self.addClass("active");
						$selfContent.stop().slideDown(300);

					} else {

						$self.removeClass("active");
						$selfContent.stop().slideUp(300);

					}

				}

			});

		});

	})(jQuery);

/* et-more-box
---------------*/
	
	(function($){

		"use strict";

		function responsiveBox(element){
			if (element.hasClass('auto')) {
				element.css({
					'width':element.parents('.vc_column_container').outerWidth(),
					'height':element.parents('.vc_column_container').outerHeight()
				});
				element.find('.et-more-box-content').css({
					'width':element.parents('.vc_column_container').outerWidth(),
					'height':element.parents('.vc_column_container').outerHeight()
				});
			}
			element.css({
				'max-width':element.parents('.vc_column_container').outerWidth(),
				'max-height':element.parents('.vc_column_container').outerHeight()
			});
			element.find('.et-more-box-content').css({
				'max-width':element.parents('.vc_column_container').outerWidth(),
				'max-height':element.parents('.vc_column_container').outerHeight()
			});
		}

		$('.et-more-box').each(function(){

			var $this    = $(this),
				icon     = $this.find('.et-more-box-icon'),
				content  = $this.find('.et-more-box-content');

			responsiveBox($this);

			icon.on('click',function(){
				$this.toggleClass('active');
				content.niceScroll({
					cursorcolor:'#000000',
					cursoropacitymin:0.1,
					cursoropacitymax:0.3,
					cursorwidth:'6px',
					cursorborderradius:'6px',
					cursorborder: "none",
					zindex: "100000000",
				});
			});

		});

		$(window).resize(function(){
			$('.et-more-box').each(function(){
				responsiveBox($(this));
				$(this).find('.et-more-box-content').getNiceScroll().resize();
			});
		});

	})(jQuery);

/* et-step-box
---------------*/
	
	(function($){

		"use strict";

		$('.et-step-box-container').each(function(){
			var $this = $(this);

			$this.find('.et-step-box').each(function(){
				var $stepBox = $(this);

				$stepBox.find('.step-dot .before').text($stepBox.index()+1);

			});

			$this.sequentialAnimationDelay();
		});

		function animateItemset(){
			$('.et-step-box-container').each(function(){
				$(this).animateIfInViewport(window);
			});
		}

		animateItemset();
		$(window).scroll(animateItemset);	

	})(jQuery);

/* et-client
---------------*/
	
	(function($){

		"use strict";

		$('.grid.et-client-container').each(function(){
			$(this).randomAnimationDelay();
		});

		function animateItemset(){
			$('.grid.et-client-container').each(function(){
				$(this).animateIfInViewport(window);
			});
		}

		animateItemset();
		$(window).scroll(animateItemset);	

	})(jQuery);

/* et-icon-box
---------------*/

	(function($){

		"use strict";

		$('.et-icon-box-container').each(function(){
			var $this = $(this);
			if ($this.hasClass('effect-fadeIn') || $this.hasClass('effect-moveUp')) {
                if ($this.hasClass('animation-type-sequential')) {
                    $this.sequentialAnimationDelay();
                } else {
                    $this.randomAnimationDelay();
                }
            }
		});

		function animateItemset(){
			$('.et-icon-box-container').each(function(){
				$(this).animateIfInViewport(window);
			});
		}

		animateItemset();
		$(window).scroll(animateItemset);

		$('.et-icon-box[data-parallax="true"]').each(function(){
			$(this).parent().css('position','relative');
		});

	})(jQuery);

/* et-tabs
---------------*/
	
	(function($){

		"use strict";

		$('.et-tab').each(function(){

			var $this    = $(this),
				tabs     = $this.find('.tab'),
				tabsQ    = tabs.length,
				tabsDefaultWidth  = 0,
				tabsDefaultHeight = 0,
				tabsContent = $this.find('.tab-content');

			tabs.wrapAll('<div class="tabset et-clearfix"></div>');
			tabsContent.wrapAll('<div class="tabs-container et-clearfix"></div>');

			var tabSet = $this.find('.tabset');

				if(!tabs.hasClass('active')){
					tabs.first().addClass('active');
				}
				
				tabs.each(function(){

					var $thiz = $(this);

					if ($thiz.hasClass('active')) {
						$thiz.siblings()
						.removeClass("active");
						tabsContent.hide(0).removeClass('active');
						tabsContent.eq($thiz.index()).show(0).addClass('active');
					}

					tabsDefaultWidth += $(this).outerWidth();
					tabsDefaultHeight += $(this).outerHeight();
				});

				if(tabsQ >= 2){

					tabs.on('click', function(){
						var $self = $(this);
						
						if(!$self.hasClass("active")){

							$self.addClass("active");

							$self.siblings()
							.removeClass("active");

							tabsContent.hide(0).removeClass('active');
							tabsContent.eq($self.index()).show(0).addClass('active');
						}
						
					});
				}

				function OverflowCorrection(){
		            if(tabsDefaultWidth >= $this.outerWidth()  && $this.hasClass('horizontal')){
		                $this.addClass('tab-full');
		            } else {
		                $this.removeClass('tab-full');
		            }
		        }

				OverflowCorrection();

				$(window).resize(OverflowCorrection);			

		});

	})(jQuery);

/* etp-parallax
---------------*/

	(function($){

		"use strict";

		$('.etp-parallax[data-parallax="true"]').each(function(){

			var $this 		= $(this),
				speed 		= $this.data('speed'),
				move 		= $this.data('move'),
				xCoordinate = $this.data('coordinatex'),
				yCoordinate = $this.data('coordinatey');

			if (move == true) {

				$this.on('mousemove',function(event){
					
					var clientRect  = this.getBoundingClientRect();
					var yPosDefault = Math.round((0-$(window).scrollTop()) / speed)  +  yCoordinate;
		            var yPos        = Math.round(0 - ((event.clientY-(clientRect.top+clientRect.height*0.5))/speed)) + yPosDefault;
					var xPos        = Math.round(0 - (event.clientX-(clientRect.left+clientRect.width*0.5))/speed) + xCoordinate;

					$this.css({
						'-ms-transform':'translate3d('+xPos+'px, '+yPos+ 'px, 0px)',
						'transform':'translate3d('+xPos+'px, '+yPos+ 'px, 0px)'
					});
					
				});

			}

			$(window).scroll(function(){
				var yPos = Math.round((0-$(window).scrollTop()) / speed)  +  yCoordinate;
				$this.css({
					'-ms-transform':'translate3d('+xCoordinate+'px, '+yPos+ 'px, 0px)',
					'transform':'translate3d('+xCoordinate+'px, '+yPos+ 'px, 0px)'
				});
			});
		});

	})(jQuery);

/* et-animate-box
---------------*/

	(function($){

		"use strict";

		$('.et-animate-box[data-curtain="true"]').each(function(){

			var delay = $(this).data('animation-delay');

			$(this).find('.content').css({'animation-delay':(delay+1000)+'ms'});

			$(this).waypoint({
                handler: function(direction) {

                        $(this.element).addClass('active');

                    this.destroy();
                },
                offset: '75%',
            });
		});

	})(jQuery);

/* et-image
---------------*/

	(function($){

		"use strict";

		$('.et-image[data-curtain="true"]').each(function(){

			var delay = $(this).data('animation-delay');

			$(this).find('img').css({'animation-delay':(delay+1000)+'ms'});

			$(this).waypoint({
                handler: function(direction) {

                    $(this.element).addClass('active');

                    this.destroy();
                },
                offset: '75%',
            });
		});

	})(jQuery);

/* et-gallery
---------------*/

	(function($){

		$('.et-gallery.carousel-thumbs').each(function(){

			var $this = $(this),
				thumbs = $this.find('ul.carousel-thumbs'),
				navs   = $this.find('ul.carousel-navs'),
				slidesToShow = (navs.find('li').length < 8) ? navs.find('li').length : 8;

			thumbs.slick({
				asNavFor: '#'+navs.attr('id'),
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				dots: false,
				autoplay: $this.data('autoplay'),
  				autoplaySpeed: 2000,
			});

			navs.slick({
				asNavFor: '#'+thumbs.attr('id'),
				slidesToShow: slidesToShow,
				slidesToScroll: 1,
				dots: false,
				arrows: false,
				autoplay: $this.data('autoplay'),
  				autoplaySpeed: 2000,
				centerMode: false,
				focusOnSelect: true,
			});

		});

	})(jQuery);

/* et-instagram
---------------*/

	(function($){

		"use strict";

		var instagramItemSet = document.querySelectorAll( '.et-instagram.grid' );
		for (var j = 0; j <= instagramItemSet.length; j++) {
			if (typeof(instagramItemSet[j]) != 'undefined' && instagramItemSet[j] != null){

				if (instagramItemSet[j].classList.contains('effect-fadeIn') || instagramItemSet[j].classList.contains('effect-moveUp')) {
					
					var instagramDelayType      = 'both';
					var instagramMinDelay       = 100;
					var instagramMaxDelay       = 300;
					var instagramViewportFactor = 0.4;
					var instagramDelay          = 50;
					var instagramReload         = false;
					var instagramGrid           = true;
					var instagramItemSelector   = '.et-item';
					var instagramItems          = Array.prototype.slice.call( instagramItemSet[j].querySelectorAll( '.et-instagram.grid > .et-item > .et-item-inner' ) );

					if (instagramItems.length) {

						new AnimOnScroll( instagramItemSet[j], {
							items:instagramItems,
							minDelay : instagramMinDelay,
							maxDelay : instagramMaxDelay,
							viewportFactor:instagramViewportFactor,
							delay:instagramDelay,
							reload:instagramReload,
							grid:instagramGrid,
							itemSelector:instagramItemSelector,
							delayType:instagramDelayType,
						} );

					}

				}
			}
		}

	})(jQuery);

/* et-map
---------------*/

	(function($){

		"use strict";

		$('.et-map').each(function(){

			var $this = $(this),
				zoom      = ($this.attr('data-zoom')) ? parseInt($this.data('zoom')) : 18,
				type      = ($this.attr('data-type')) ? $this.attr('data-type') : 'roadmap',
				mapTypeId = "roadmap",
				styleArray = '';

				var dataX_1   = $this.data('x1'),
					dataY_1   = $this.data('y1'),
					title_1   = $this.attr('data-title1'),
					image_1   = $this.attr('data-image1'),
					content_1 = $this.attr('data-content1'),
					location_1 = [];

				var buildContent_1 = '';

					if (typeof(image_1) != 'undefined' && image_1 != null){
						buildContent_1 += '<img class="map-image" src="'+image_1+'" />';
					}

				 	if (typeof(title_1) != 'undefined' && title_1 != null){
				 		buildContent_1 += '<h5 class="map-title">'+title_1+'</h5>';
				 	}
					
					if (typeof(content_1) != 'undefined' && content_1 != null){
						buildContent_1 += '<p class="map-content">'+content_1+'</p>';
					}

					if (typeof(dataX_1) != 'undefined' && dataX_1 != null){location_1.push(dataX_1);}
					if (typeof(dataY_1) != 'undefined' && dataY_1 != null){location_1.push(dataY_1);}
					if (typeof(buildContent_1) != 'undefined' && buildContent_1 != null){location_1.push(buildContent_1);}
					

				var dataX_2   = $this.data('x2'),
					dataY_2   = $this.data('y2'),
					title_2   = $this.attr('data-title2'),
					image_2   = $this.attr('data-image2'),
					content_2 = $this.attr('data-content2'),
					location_2 = [];

				var buildContent_2 = '';

					if (typeof(image_2) != 'undefined' && image_2 != null){
						buildContent_2 += '<img class="map-image" src="'+image_2+'" />';
					}

				 	if (typeof(title_2) != 'undefined' && title_2 != null){
				 		buildContent_2 += '<h5 class="map-title">'+title_2+'</h5>';
				 	}
					
					if (typeof(content_2) != 'undefined' && content_2 != null){
						buildContent_2 += '<p class="map-content">'+content_2+'</p>';
					}

					if (typeof(dataX_2) != 'undefined' && dataX_2 != null){location_2.push(dataX_2);}
					if (typeof(dataY_2) != 'undefined' && dataY_2 != null){location_2.push(dataY_2);}
					if (typeof(buildContent_2) != 'undefined' && buildContent_2 != null){location_2.push(buildContent_2);}

				var dataX_3   = $this.data('x3'),
					dataY_3   = $this.data('y3'),
					title_3   = $this.attr('data-title3'),
					image_3   = $this.attr('data-image3'),
					content_3 = $this.attr('data-content3'),
					location_3 = [];

				var buildContent_3 = '';

					if (typeof(image_3) != 'undefined' && image_3 != null){
						buildContent_3 += '<img class="map-image" src="'+image_3+'" />';
					}

				 	if (typeof(title_3) != 'undefined' && title_3 != null){
				 		buildContent_3 += '<h5 class="map-title">'+title_3+'</h5>';
				 	}
					
					if (typeof(content_3) != 'undefined' && content_3 != null){
						buildContent_3 += '<p class="map-content">'+content_3+'</p>';
					}

					if (typeof(dataX_3) != 'undefined' && dataX_3 != null){location_3.push(dataX_3);}
					if (typeof(dataY_3) != 'undefined' && dataY_3 != null){location_3.push(dataY_3);}
					if (typeof(buildContent_3) != 'undefined' && buildContent_3 != null){location_3.push(buildContent_3);}

				var dataX_4   = $this.data('x4'),
					dataY_4   = $this.data('y4'),
					title_4   = $this.attr('data-title4'),
					image_4   = $this.attr('data-image4'),
					content_4 = $this.attr('data-content4'),
					location_4 = [];

				var buildContent_4 = '';

					if (typeof(image_4) != 'undefined' && image_4 != null){
						buildContent_4 += '<img class="map-image" src="'+image_4+'" />';
					}

				 	if (typeof(title_4) != 'undefined' && title_4 != null){
				 		buildContent_4 += '<h5 class="map-title">'+title_4+'</h5>';
				 	}
					
					if (typeof(content_4) != 'undefined' && content_4 != null){
						buildContent_4 += '<p class="map-content">'+content_4+'</p>';
					}

					if (typeof(dataX_4) != 'undefined' && dataX_4 != null){location_4.push(dataX_4);}
					if (typeof(dataY_4) != 'undefined' && dataY_4 != null){location_4.push(dataY_4);}
					if (typeof(buildContent_4) != 'undefined' && buildContent_4 != null){location_4.push(buildContent_4);}

				var dataX_5   = $this.data('x5'),
					dataY_5   = $this.data('y5'),
					title_5   = $this.attr('data-title5'),
					image_5   = $this.attr('data-image5'),
					content_5 = $this.attr('data-content5'),
					location_5 = [];

				var buildContent_5 = '';

					if (typeof(image_5) != 'undefined' && image_5 != null){
						buildContent_5 += '<img class="map-image" src="'+image_5+'" />';
					}

				 	if (typeof(title_5) != 'undefined' && title_5 != null){
				 		buildContent_5 += '<h5 class="map-title">'+title_5+'</h5>';
				 	}
					
					if (typeof(content_5) != 'undefined' && content_5 != null){
						buildContent_5 += '<p class="map-content">'+content_5+'</p>';
					}

					if (typeof(dataX_5) != 'undefined' && dataX_5 != null){location_5.push(dataX_5);}
					if (typeof(dataY_5) != 'undefined' && dataY_5 != null){location_5.push(dataY_5);}
					if (typeof(buildContent_5) != 'undefined' && buildContent_5 != null){location_5.push(buildContent_5);}

				var locations = [];

				if (location_1.length >= 1) {locations.push(location_1);}
				if (location_2.length >= 1) {locations.push(location_2);}
				if (location_3.length >= 1) {locations.push(location_3);}
				if (location_4.length >= 1) {locations.push(location_4);}
				if (location_5.length >= 1) {locations.push(location_5);}

				switch(type){
					case 'roadmap':
					case 'black':
					case 'grey':
					case 'theme':
				        mapTypeId = google.maps.MapTypeId.ROADMAP
				        break;
				    case 'satellite':
				        mapTypeId = google.maps.MapTypeId.SATELLITE
				        break;
				}

				if (type === 'black') {
					styleArray = [{"stylers":[{"hue":"#ff1a00"},{"invert_lightness":true},{"saturation":-100},{"lightness":33},{"gamma":0.5}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#2D333C"}]}];
				} else if(type === 'grey') {
					styleArray = [{"featureType": "water", "elementType": "geometry", "stylers": [{"color": "#E0E0E0"},{"lightness": 17}]},{"featureType": "landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"},{"lightness": 20}]},{"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"},{"lightness": 17}]},{"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"},{"lightness": 29},{"weight": 0.2}]},{"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"},{"lightness": 18}]},{"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"},{"lightness": 16}]},{"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"},{"lightness": 21}]},{"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#BDBDBD"},{"lightness": 21}]},{"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16}]},{"elementType": "labels.text.fill", "stylers": [{"saturation": 36},{"color": "#212121"},{"lightness": 40}]},{"elementType": "labels.icon", "stylers": [{"visibility": "off"}]},{"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"},{"lightness": 19}]},{"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#FAFAFA"},{"lightness": 20}]},{"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#FAFAFA"},{"lightness": 17},{"weight": 1.2}]}];
				}

				var options = {
					center     : new google.maps.LatLng(dataX_1, dataY_1),
					zoom       : zoom, 
					mapTypeId  : mapTypeId,
					styles     : styleArray,
					disableDefaultUI: true
				};

				var map        = new google.maps.Map(document.getElementById($this.attr('id')), options);

				var infowindow = new google.maps.InfoWindow();
				var marker, i = 0;
				var bounds = new google.maps.LatLngBounds();
				var interval = setInterval(function () {
	            	marker = new google.maps.Marker({
						position: new google.maps.LatLng(locations[i][0], locations[i][1]),
						map: map,
						icon: $this.attr('data-marker'),
						animation: google.maps.Animation.DROP
					});

					bounds.extend(marker.position);

		            if (locations[i][2]) {

						google.maps.event.addListener(marker, 'click', (function(marker, i) {
							return function() {
							  infowindow.setContent(locations[i][2]);
							  infowindow.open(map, marker);
							}
						})(marker, i));

					}

		            i++;

		            if (i == locations.length) {
		                clearInterval(interval);
		            }

		            map.fitBounds(bounds);
		            map.setZoom(zoom);

		        }, 200);

		});

	})(jQuery);

/* et-counter
---------------*/

	(function($){

		"use strict";

		$('.et-counter').each(function(){

			var $this   = $(this);
			var $thisTo = $this.data('to');

			$(this).waypoint({
                handler: function(direction) {

                	var element = $(this.element);

                    element.addClass('animate');
		    		element.find('.counter').countTo({
					    from: 0,
					    to: $thisTo,
					    speed: 2000,
					    refreshInterval: 30
					});

                    this.destroy();
                },
                offset: '75%',
            });

		});

	})(jQuery);

/* et-progress
---------------*/

	(function($){

		"use strict";

		$('.et-progress').each(function(){

			var $this 	   = $(this);
			var bar   	   = $this.find('.bar');
			var percentage = bar.data('percentage');
			var percent    = $this.find('.percent');

			$(this).waypoint({
                handler: function(direction) {

                    bar.addClass('visible')
					.animate({width: percentage+'%'}, 2000, 'easeOutExpo');

					percent.addClass('visible')
					.countTo({
					    from: 0,
					    to: percentage,
					    speed: 2000,
					    refreshInterval: 30
					});

                    this.destroy();
                },
                offset: '75%',
            });

		});

	})(jQuery);

/* et-circle-progress
---------------*/

	(function($){

		"use strict";

		$('.et-circle-progress').each(function(){

			var $this 	   = $(this);
			var bar   	   = $this.data('bar');
			var track      = $this.data('track');
			var percentage = $this.data('percent');
			var percent    = $this.find('.percent');
			var size       = 200;

			if ($this.hasClass('size-medium')) {size = 240;}
			if ($this.hasClass('size-large'))  {size = 300;}

			$this.waypoint({
                handler: function(direction) {

                    $(this.element).addClass('visible');

					$(this.element).easyPieChart({
						barColor: bar,
						trackColor: (typeof track == "undefined") ? "#e0e0e0" : track,
						lineCap:'square',
						lineWidth:4,
						size:size,
						animate:'1500',
						scaleColor: false
					});

					percent.countTo({
					    from: 0,
					    to: percentage,
					    speed: 2000,
					    refreshInterval: 30
					});

                    this.destroy();
                },
                offset: 'bottom-in-view',
            });

		});

	})(jQuery);

/* et-timer
---------------*/

	(function($){

		"use strict";

		$('.et-timer').each(function(){
			var $this  = $(this);
            $this.find('ul').countdown({
                date: $this.data('enddate'),
                offset: -8,
                day: $this.data('days'),
                days: $this.data('days'),
                hour: $this.data('hours'),
                hours: $this.data('hours'),
                minute: $this.data('minutes'),
                minutes: $this.data('minutes'),
                second: $this.data('seconds'),
                seconds: $this.data('seconds')
            });
		});

	})(jQuery);

/* et-banner
---------------*/

	(function($){

		$('.et-popup-banner-wrapper').each(function(){

			var $this  = $(this);
			var	$delay = $this.find('.et-popup-banner').attr('data-delay');
			var cookie = $this.find('.et-popup-banner').attr('data-cookie');

			var bannerClone = $this.clone();

			$('body').append(bannerClone);

			$this.remove();

			bannerClone.find('a').on('click',function(event){
				event.stopPropagation();
			});

			if (typeof($.cookie(bannerClone.attr('id'))) == 'undefined') {



				setTimeout(function(){
					bannerClone.addClass('animate');

					$('.et-contact-form input[type="text"], .et-contact-form textarea').placeholder();

                    $('.widget_login, .widget_reglog').each(function(){
                        var $this = $(this);

                        $this.find('label').each(function(){
                            var labelText = $(this).text();
                            $(this).next('input').attr('placeholder',labelText);
                            $(this).remove();
                        });

                        $this.find('input[type="text"]').placeholder();
                        $this.find('input[type="password"]').placeholder();

                        $this.find('input[type="submit"]').on("click",function(event) {

                            if (!$this.find('input[type="text"]').val() || !$this.find('input[type="password"]').val() || 
                                $this.find('input[type="text"]').val() == $this.find('input[type="text"]').data('placeholder') ||
                                $this.find('input[type="password"]').val() == $this.find('input[type="password"]').data('placeholder')) {
                                event.preventDefault();
                            }

                        });
                    });

                    $('.search-form').each(function(){
                        var form  = $(this);
                        var search = form.find('#s');
                        search.placeholder();
                        form.submit(function(event){
                            if (search.val() === search.attr('data-placeholder')) {
                                event.preventDefault();
                            }
                        });
                    });

				},$delay);

				bannerClone.find('.popup-banner-toggle').bind('click',function(){
					bannerClone.removeClass('animate');
					if (cookie == true) {
						$.cookie(bannerClone.attr('id'),'active',{ expires: 1,path: '/'});
					}
				});

				bannerClone.on('click',function(){
					bannerClone.removeClass('animate');
					if (cookie == true) {
						$.cookie(bannerClone.attr('id'),'active',{ expires: 1,path: '/'});
					}
				});

			}

		});

	})(jQuery);

/* et-tagline
---------------*/

	(function($){

		$('.et-tagline').each(function(){

			var $this  = $(this);
			var	$delay = $this.data('delay');
			var cookie = $this.data('cookie');

			if (typeof($delay) == 'undefined' && $delay == null){
				$delay = 3000;
			}

			if (typeof($.cookie($this.attr('id'))) == 'undefined') {

				setTimeout(function(){
					$this.slideToggle(300);
				},$delay);

				$this.find('.tagline-toggle').bind('click',function(){
					$this.slideToggle(300);
					if (cookie == true) {
						$.cookie($this.attr('id'),'active',{ expires: 1,path: '/'});
					}
				});

			}

		});

	})(jQuery);

/* et-video
---------------*/

	(function($){

		"use strict";

		$('.et-video').each(function(){
			$(this).addClass('animate');
		});

	})(jQuery);

/* et-woo-products
---------------*/

	(function($){

		"use strict";

		var productMinDelay       = 100;
		var productMaxDelay       = 300;
		var productViewportFactor = 0.4;
		var productDelay          = 50;
		var productReload         = true;
		var productGrid           = true;
		var productItemSelector   = '.et-item';
		var productGridSizer      = '.grid-sizer';
		var productDelayType      = 'both';
		var productPreloaderDelay = 0;
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		$('.et-woo-products').each(function(){
			
			var $this = $(this),
				loop  = $this.find('.loop-product');

			if (loop.hasClass('effect-none')) {
				productDelayType = (preloaderActive == true) ? 'image' : "none";
			} else {
				productDelayType = (preloaderActive == true) ? 'both' : "grid";

				if (preloaderActive && productDelayType == "both") {
					productPreloaderDelay = 300;
				}
			}

			if($this.hasClass('grid')){

				loop.prepend('<li class="grid-sizer"></li>');

				var productItemSet = this.querySelector( '.loop-product' );
				var productItems   = Array.prototype.slice.call( this.querySelectorAll( '.loop-product > .post > .post-inner' ) );

				if (typeof(productItemSet) != 'undefined' && productItemSet != null && productItems.length){
					new AnimOnScroll( productItemSet, {
						items:productItems,
						minDelay : productMinDelay,
						maxDelay : productMaxDelay,
						preloaderDelay:productPreloaderDelay,
						viewportFactor:productViewportFactor,
						delay:productDelay,
						reload:productReload,
						grid:productGrid,
						gridSizer:productGridSizer,
						itemSelector:productItemSelector,
						delayType:productDelayType
					} );
				}

			}

		});

	})(jQuery);

/* et-shortcode-projects
---------------*/

	(function($){

		"use strict";

		var projectMinDelay       = 100;
		var projectMaxDelay       = 300;
		var projectViewportFactor = 0.4;
		var projectDelay          = 50;
		var projectReload         = true;
		var projectGrid           = true;
		var projectItemSelector   = '.et-item';
		var projectGridSizer      = '.grid-sizer';
		var projectDelayType      = 'both';
		var projectPreloaderDelay = 0;
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		$('.et-shortcode-projects').each(function(){
			
			var $this = $(this),
				loop  = $this.find('.loop-project');

			if (loop.hasClass('effect-none')) {
				projectDelayType = (preloaderActive == true) ? 'image' : "none";
			} else {
				projectDelayType = (preloaderActive == true) ? 'both' : "grid";

				if (preloaderActive && projectDelayType == "both") {
					projectPreloaderDelay = 300;
				}
			}

			if($this.hasClass('grid')){

				loop.prepend('<div class="grid-sizer"></div>');

				var projectItemSet = this.querySelector( '.loop-project' );
				var projectItems   = Array.prototype.slice.call( this.querySelectorAll( '.loop-project > .post > .post-inner' ) );

				if (typeof(projectItemSet) != 'undefined' && projectItemSet != null && projectItems.length){
					new AnimOnScroll( projectItemSet, {
						items:projectItems,
						minDelay : projectMinDelay,
						maxDelay : projectMaxDelay,
						preloaderDelay:projectPreloaderDelay,
						viewportFactor:projectViewportFactor,
						delay:projectDelay,
						reload:projectReload,
						grid:projectGrid,
						gridSizer:projectGridSizer,
						itemSelector:projectItemSelector,
						delayType:projectDelayType
					} );
				}

				var filter = $this.find('.enovathemes-filter');

				if (typeof(filter) != 'undefined' && filter != null && filter.length) {

					var filterRequestRunning = false;
					var postsPerPage = filter.data('posts-per-page');
					var order        = filter.data('order');
					var orderby      = filter.data('orderby');
					var	loadingText  = controller_opt.projectLoadingText;
					var	layout       = 'project-with-details';
					var	container    = $this.hasClass('project-container-boxed') ? 'boxed' : 'wide';
					var	column       = 'medium';
					var imageEffect  = loop.hasClass('transform') ? 'transform' : 'overlay';
					var imageFull    = loop.hasClass('image-full-true') ? true : false;

					order = order.toLowerCase();
					orderby = orderby.toLowerCase();

					if ($this.hasClass('small')) {
						column = 'small';
					}

					if ($this.hasClass('large')) {
						column = 'large';
					}

					if ($this.hasClass('project-with-overlay')) {
						layout = 'project-with-overlay';
					}

					if ($this.hasClass('project-with-caption')) {
						layout = 'project-with-caption';
					}

					filter.find('.filter').on('click',function(event){

						event.preventDefault();

						if (filterRequestRunning) {
							return;
						}

						filterRequestRunning = true;

						loop.prepend('<div class="ajax-scroll-overlay"><div class="ajax-scroll-overlay-content"><div class="ajax-scroll-text">'+loadingText+'</div><div class="ajax-scroll"><span></span><span></span></div></div></div>');

						loop.find('.ajax-scroll-overlay').fadeIn(300);
						loop.find('.project').remove();

						var currentFilter   = $(this);
						var currentFilterID = currentFilter.data('filter-id');
						var terms_exclude   = currentFilter.data('exclude');
						var json_url        = controller_opt.projectJsonUrl;

						json_url += '?per_page='+postsPerPage;
						json_url += '&order='+order;
						json_url += '&orderby='+orderby;

						if (typeof(currentFilterID) != 'undefined' && currentFilterID != null){
							json_url += '&project-category='+currentFilterID;
						} else {
							if (typeof(terms_exclude) != 'undefined' && terms_exclude.length && terms_exclude != null) {
								json_url += '&project-category_exclude='+terms_exclude;
							}
						}

						currentFilter.addClass('active').siblings().removeClass('active');

						$.ajax({
							dataType: 'json',
							url:json_url
						})

						.done(function(response){

							var $output = '';

							$.each(response,function(index,object){

								$output += '<article id="project-'+object.id+'" class="et-item post post-'+object.id+' project type-project hentry">';
									$output += '<div class="post-inner et-item-inner et-clearfix">';
										$output += '<div class="overlay-hover">';
											$output += '<div class="post-image post-media">';
												if (imageEffect == "overlay") {
													if (layout == 'project-with-details' || layout == 'project-with-overlay') {
														$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">';
															$output += '<div class="post-image-overlay">';
																$output += '<div class="post-image-overlay-content">';
																	$output += '<span class="overlay-read-more"></span>';
																	if (layout == 'project-with-overlay') {

																		$output += '<div class="project-category">';

																			var projectCategoryArray 	   = object.project_category_array;
																			var projectCategoryArrayOutput = [];

																			for (var i = 0; i < projectCategoryArray.length; i++) {
																				projectCategoryArrayOutput.push(projectCategoryArray[i][0]);
																			}

																			$output += projectCategoryArrayOutput.join(", ");

																		$output += '</div>';

																		$output += '<h4 class="post-title">'+object.title.rendered+'</h4>';
																	}
																$output += '</div>';
															$output += '</div>';
														$output += '</a>';
													}
												}
												$output += '<div class="image-container">';
													$output += '<a href="'+object.link+'">';

														var imageSrc = '';
														var imageObj = [{}];
														var projectImageArray = object.project_image;

											            for (var i = 0; i < projectImageArray.length; i++) {
											                var key      = (projectImageArray[i][0]);
											                var value    = (projectImageArray[i][1]);
											                imageObj[key] = value;
											            }

														switch (column) {
															case 'small':
																imageSrc = (container == "wide") ? imageObj['samatex_480X360'] : imageObj['samatex_400X320'];
																break;
															case 'medium':
																imageSrc = (container == "wide") ? imageObj['samatex_640X400'] : imageObj['samatex_400X320'];
																break;
															case 'large':
																imageSrc = (container == "wide") ? imageObj['samatex_960X600'] : imageObj['samatex_600X370'];
																break;
														}

														if (imageFull || (typeof(imageSrc) == 'undefined' || imageSrc == null || !imageSrc.length)) {
															imageSrc = imageObj['full'];
														}

														$output += '<div class="image-preloader"></div>';
														$output += '<img src="'+imageSrc+'" class="wp-post-image" data-responsive-images="false">';
													$output += '</a>';
												$output += '</div>';
											$output += '</div>';
											if (layout != 'project-with-overlay') {
												$output += '<div class="post-body et-clearfix">';
													$output += '<div class="post-body-inner-wrap">';
														$output += '<div class="post-body-inner">';

															if (layout == 'project-with-details') {
																$output += '<div class="project-category">';

																	var projectCategoryArray 	   = object.project_category_array;
																	var projectCategoryArrayOutput = [];

																	for (var i = 0; i < projectCategoryArray.length; i++) {
																		projectCategoryArrayOutput.push('<a href="'+projectCategoryArray[i][1]+'" rel="tag">'+projectCategoryArray[i][0]+'</a>');
																	}

																	$output += projectCategoryArrayOutput.join(", ");

																$output += '</div>';
															}

															$output += '<h4 class="post-title entry-title">';
																$output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">'+object.title.rendered+'</a>';
															$output += '</h4>';

														$output += '</div>';
													$output += '</div>';
												$output += '</div>';
											}
										$output += '</div>';
									$output += '</div>';
								$output += '</article>';

							});

							if ($output.length) {

								$this.find('.loop-project').append($output);

								var ItemSet = document.getElementById($this.attr('id')).querySelector( '.loop-project' );
								var Items   = Array.prototype.slice.call( document.getElementById($this.attr('id')).querySelectorAll( '.loop-project > .post > .post-inner' ) );

								if (typeof(ItemSet) != 'undefined' && ItemSet != null && Items.length){
									new AnimOnScroll( ItemSet, {
										items:Items,
										minDelay : projectMinDelay,
										maxDelay : projectMaxDelay,
										preloaderDelay:projectPreloaderDelay,
										viewportFactor:projectViewportFactor,
										delay:projectDelay,
										reload:projectReload,
										grid:projectGrid,
										gridSizer:projectGridSizer,
										itemSelector:projectItemSelector,
										delayType:projectDelayType
									} );
								}

							}

							$this.find('.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

							$this.find('.ajax-scroll-overlay').fadeOut(100,function(){
								$(this).remove();
								$output = '';
								filterRequestRunning = false;
								$("html").getNiceScroll().resize();
							});

						})

						.fail(function(response){

							$this.find('.ajax-scroll-overlay').fadeOut(100,function(){
								$this.find('.loop-project').append('<span class="error fas fa-exclamation-triangle"></span>');
							});

						});

					});

				}

			}

		});

	})(jQuery);

/* et-shortcode-single-project
---------------*/

	(function($){

		"use strict";

		var preloaderActive = $('body').hasClass('preloader-active') ? true : false;

		if (preloaderActive) {

			function animateItemset(){
				$('.et-shortcode-single-project').each(function(){
					$(this).animateIfInViewport(window);
				});
			}

			animateItemset();
			$(window).scroll(animateItemset);

		}

	})(jQuery);

/* et-shortcode-posts
---------------*/

	(function($){

		"use strict";

		var postMinDelay       = 100;
		var postMaxDelay       = 300;
		var postViewportFactor = 0.4;
		var postDelay          = 50;
		var postReload         = true;
		var postGrid           = true;
		var postItemSelector   = '.et-item';
		var postGridSizer      = '.grid-sizer';
		var postDelayType      = 'both';
		var postPreloaderDelay = 0;
		var preloaderActive    = $('body').hasClass('preloader-active') ? true : false;

		$('.et-shortcode-posts').each(function(){
			
			var $this = $(this),
				loop  = $this.find('.loop-posts');

			if ($this.hasClass('chess')) {
				postGridSizer = '.et-item';
			}

			if (loop.hasClass('effect-none')) {
				postDelayType = (preloaderActive == true) ? 'image' : "none";
			} else {
				postDelayType = (preloaderActive == true) ? 'both' : "grid";

				if (preloaderActive && postDelayType == "both") {
					postPreloaderDelay = 300;
				}
			}

			if($this.hasClass('grid') || $this.hasClass('chess')){

				if ($this.hasClass('grid')) {loop.prepend('<div class="grid-sizer"></div>');}

				var postItemSet = this.querySelector( '.loop-posts' );
				var postItems   = Array.prototype.slice.call( this.querySelectorAll( '.loop-posts > .post > .post-inner' ) );

				if (typeof(postItemSet) != 'undefined' && postItemSet != null && postItems.length){
					new AnimOnScroll( postItemSet, {
						items:postItems,
						minDelay : postMinDelay,
						maxDelay : postMaxDelay,
						preloaderDelay:postPreloaderDelay,
						viewportFactor:postViewportFactor,
						delay:postDelay,
						reload:postReload,
						grid:postGrid,
						gridSizer:postGridSizer,
						itemSelector:postItemSelector,
						delayType:postDelayType
					} );
				}

			}

		});

	})(jQuery);

/* et-highlight
---------------*/

	(function($){

		"use strict";

		$('.et-highlight').each(function(){

			var $this 	     = $(this);

			if ($this.data('tipso')) {

				var animationIn  =  '';
				var animationOut =  '';
				var width 	 	 =  $this.data('width');
				var direction 	 =  $this.data('direction');
				var color    	 =  ($this.data('message-color')) ? $this.data('message-color') : '#212121';

				switch(direction){
                    case "left":
                        $this.data('data-in','fadeInLeft');
                        $this.data('data-out','fadeOutLeft');
                        animationIn = 'fadeInLeft';
                        animationOut = 'fadeOutLeft';
                    break;
                    case "right":
                        $this.data('data-in','fadeInRight');
                        $this.data('data-out','fadeOutRight');
                        animationIn = 'fadeInRight';
                        animationOut = 'fadeOutRight';
                    break;
                    case "top":
                        $this.data('data-in','fadeInTop');
                        $this.data('data-out','fadeOutTop');
                        animationIn = 'fadeInTop';
                        animationOut = 'fadeOutTop';
                    break;
                    case "bottom":
                        $this.data('data-in','fadeInDown');
                        $this.data('data-out','fadeOutDown');
                        animationIn = 'fadeInDown';
                        animationOut = 'fadeOutDown';
                    break;
                }

				$this.tipso({
				    background      : color,
				    color           : '#ffffff',
				    animationIn     : animationIn,
	  				animationOut    : animationOut,
				    width           : width,
				    useTitle        : false,
				    position        : direction,
				    speed           : 400,        
					showArrow       : false,
					delay           : 200,
					hideDelay       : 0,
					offsetX         : 0,
					offsetY         : 0,
					tooltipHover    : true,
				});

			}
			
		});

	})(jQuery);