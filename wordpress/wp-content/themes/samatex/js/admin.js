/* Megamenu
---------------*/

    (function($){
        
        "use strict";

        var mmo = $('.megamenu-options');

        mmo.each(function(){

            var $this = $(this),
                mms   = $this.find('.mms select'),
                mmc   = $this.find('.mmc');
               
            if ( mms.val() == "true") {
                mmc.show();
            }

            mms.on("change",function(){
                if ($(this).val() == "false") {
                    mmc.hide();
                } else {
                    mmc.show();
                }
            });

        });

        function megamenuToggle(selected){
            if ( selected == 100) {
                $('.megamenu-toggle').hide(0);
            } else {
                $('.megamenu-toggle').show(0);
            }
        }

        var selected = $('select[name="enovathemes_addons_megamenu_width"] option:selected').val();
        megamenuToggle(selected);

        $('select[name="enovathemes_addons_megamenu_width"]').on("change",function(){
            selected = $(this).val();
            megamenuToggle(selected);
        });

        function megamenuFormStyles(formChecked){
            if (formChecked) {
                $('.custom-form-styling').show(0);
            } else {
                $('.custom-form-styling').hide(0);
            }
        }

        function megamenuWidgetStyles(widgetChecked){
            if (widgetChecked) {
                $('.custom-widget-styling').show(0);
            } else {
                $('.custom-widget-styling').hide(0);
            }
        }

        var formChecked = ($('input[name="enovathemes_addons_custom_form_styling"]')).is(':checked') ? true : false;

        megamenuFormStyles(formChecked);
        $('input[name="enovathemes_addons_custom_form_styling"]').on("change",function(){
            formChecked = (this.checked) ? true: false;
            megamenuFormStyles(formChecked);
        });
        
        var widgetChecked = ($('input[name="enovathemes_addons_custom_widget_styling"]')).is(':checked') ? true : false;
        megamenuWidgetStyles(widgetChecked);
        $('input[name="enovathemes_addons_custom_widget_styling"]').on("change",function(){
            widgetChecked = (this.checked) ? true: false;
            megamenuWidgetStyles(widgetChecked);
        });

    })(jQuery);

/* Colorpicker
---------------*/
    
    (function( $ ) {

        "use strict";
 
        $(function() {
            $('.enovathemes-color-picker').wpColorPicker();
        });
         
    })( jQuery );

/* Projects
---------------*/

    (function($){
        
        "use strict";

        function projectLayoutSwitch($layout){

            if ($layout == "custom") {
                $('.project-data').hide(0);
            } else
            if($layout == "sidebar"){
                $('.sidebar-off').hide(0).siblings().show(0);
            } else {
                $('.project-data').show(0);
            }
        }

        function projectFormatSwitch($format,$layout){

            if ($format == "gallery") {
                $('.gallery-format').show(0);
                $('.format-data:not(.gallery-format)').hide(0);
            }else
            if ($format == "audio") {
                $('.audio-format').show(0);
                $('.format-data:not(.audio-format)').hide(0);
            }else
            if ($format == "video") {
                $('.video-format').show(0);
                $('.format-data:not(.video-format)').hide(0);
            }

            if ($layout == 'sidebar') {
                $('.sidebar-off').hide(0);
            }
        }

        function galleryTypeSwitch($type,$layout){

            if ($type == "carousel_thumb") {
                $('.carousel-thumbnail-off').hide(0);
            } else {
                $('.carousel-thumbnail-off').show(0);
            }

            if ($layout == 'sidebar') {
                $('.sidebar-off').hide(0);
            }
            
        }

        function masonrySwitch($type,$format,$layout){

            if ($format == "gallery" && $type == "masonry") {
                $('.masonry-only').show(0);
            } else {
                $('.masonry-only').hide(0);
            }

            if ($layout == 'sidebar') {
                $('.sidebar-off').hide(0);
            }
            
        }

        var $format = $('.cmb2-id-enovathemes-addons-project-format input[type="radio"]:checked').val();
        var $type   = $('.cmb2-id-enovathemes-addons-gallery-type select[name="enovathemes_addons_gallery_type"]').val();
        var $layout = $('.cmb2-id-enovathemes-addons-project-layout input[type="radio"]:checked').val();

        projectLayoutSwitch($layout);
        projectFormatSwitch($format,$layout);
        galleryTypeSwitch($type,$layout);
        masonrySwitch($type,$format,$layout);

        // On change

        $('.cmb2-id-enovathemes-addons-gallery-type select[name="enovathemes_addons_gallery_type"]').on('change', function(){
            
            $type   = $(this).val();
            $layout = $('.cmb2-id-enovathemes-addons-project-layout input[type="radio"]:checked').val();
            $format = $('.cmb2-id-enovathemes-addons-project-format input[type="radio"]:checked').val();

            galleryTypeSwitch($type,$layout);
            masonrySwitch($type,$format,$layout);
        });

        $('.cmb2-id-enovathemes-addons-project-format input[type="radio"]').each(function(){
            $(this).on('click', function(){

                $format = $(this).val();
                $layout = $('.cmb2-id-enovathemes-addons-project-layout input[type="radio"]:checked').val();
                $type   = $('.cmb2-id-enovathemes-addons-gallery-type select[name="enovathemes_addons_gallery_type"]').val();

                projectFormatSwitch($format,$layout);
                if ($type == "carousel_thumb") {galleryTypeSwitch($type,$layout);}
                masonrySwitch($type,$format,$layout);

            });
        });

        $('.cmb2-id-enovathemes-addons-project-layout input[type="radio"]').each(function(){
            $(this).on('click', function(){

                $layout = $(this).val();
                $type   = $('.cmb2-id-enovathemes-addons-gallery-type select[name="enovathemes_addons_gallery_type"]').val();
                $format = $('.cmb2-id-enovathemes-addons-project-format input[type="radio"]:checked').val();

                projectLayoutSwitch($layout);
                projectFormatSwitch($format,$layout);

                if ($layout == "custom") {
                    $('.project-data').hide(0);
                }

            });
        });

    })(jQuery);

/* Posts
---------------*/

    (function($){

        "use strict";

        function formatSwitch($value){
            if ($value == "link") {
                $('#_enovathemes_addons_post_options_metabox').show(0);
                $('.link-format').show(0);
                $('.post-data:not(.link-format)').hide(0);
            }else
            if ($value == "status") {
                $('#_enovathemes_addons_post_options_metabox').show(0);
                $('.status-format').show(0);
                $('.post-data:not(.status-format)').hide(0);
            }else
            if ($value == "quote") {
                $('#_enovathemes_addons_post_options_metabox').show(0);
                $('.quote-format').show(0);
                $('.post-data:not(.quote-format)').hide(0);
            }else
            if ($value == "gallery") {
                $('#_enovathemes_addons_post_options_metabox').show(0);
                $('.gallery-format').show(0);
                $('.post-data:not(.gallery-format)').hide(0);
            }else
            if ($value == "audio") {
                $('#_enovathemes_addons_post_options_metabox').show(0);
                $('.audio-format').show(0);
                $('.post-data:not(.audio-format)').hide(0);
            }else
            if ($value == "video") {
                $('#_enovathemes_addons_post_options_metabox').show(0);
                $('.video-format').show(0);
                $('.post-data:not(.video-format)').hide(0);
            }else {
                $('.post-data').hide(0);
                $('#_enovathemes_addons_post_options_metabox').hide(0);
            }
        }

        $('#formatdiv input[type="radio"]').each(function(){
            var $this = $(this);

            $this.on('click', function(){
                formatSwitch($this.val());
            });

            if($this.is(":checked")){
                formatSwitch($this.val());
            }
        });

    })(jQuery);

/* Header options
---------------*/

    (function($){

        "use strict";

        function toggleHeader(selected){
            switch(selected){
                case "sidebar":
                    $('.sidebar-off').hide(0);
                    $('.sidebar-on').show(0);
                break;
                case "desktop":
                    $('.sidebar-on').hide(0);
                    $('.sidebar-off').show(0);
                    $('.desktop-on').show(0);
                break;
                case "mobile":
                    $('.sidebar-off').show(0);
                    $('.sidebar-on').hide(0);
                    $('.desktop-on').hide(0);
                break;
            }
        }

        var selected = $('#enovathemes_addons_header_options_metabox select[name="enovathemes_addons_header_type"] option:selected').val();

        toggleHeader(selected)

        $('#enovathemes_addons_header_options_metabox select[name="enovathemes_addons_header_type"]').on('change', function(){

            selected = $(this).find("option:selected").val();

            toggleHeader(selected)
            
        });

        if ($('#enovathemes_addons_header_options_metabox select[name="enovathemes_addons_header_type"] option:selected').val() == 'desktop' || $('#enovathemes_addons_header_options_metabox select[name="enovathemes_addons_header_type"] option:selected').val() == 'sidebar') {
            $('#enovathemes_addons_header_options_metabox input[name="enovathemes_addons_desktop"]').attr('checked','checked');
        }

        if ($('#enovathemes_addons_header_options_metabox select[name="enovathemes_addons_header_type"] option:selected').val() == 'mobile') {
            $('#enovathemes_addons_header_options_metabox input[name="enovathemes_addons_desktop"]').removeAttr('checked','');
        }

        $('#enovathemes_addons_header_options_metabox select[name="enovathemes_addons_header_type"]').on('change',function(){
            if ($(this).val() == 'mobile') {
                $('#enovathemes_addons_header_options_metabox input[name="enovathemes_addons_desktop"]').removeAttr('checked','');
            } else
            if ($(this).val() == 'desktop' || $(this).val() == 'sidebar') {
                $('#enovathemes_addons_header_options_metabox input[name="enovathemes_addons_desktop"]').attr('checked','checked');
            }
        });

    })(jQuery);

/* Visual composer front-end editor
---------------*/

    (function($){

        "use strict";

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

        $.fn.isInViewport = function(win) {
            var elH = $(this).outerHeight(),
                scrolled = $(win).scrollTop(),
                viewed = scrolled + $(win).height(),
                elTop = $(this).offset().top,
                elBottom = elTop + elH,
                h = 0.4;
            return (elTop + elH * h) <= viewed && (elBottom - elH * h) >= scrolled;
        };

        $.fn.randomAnimationDelay = function() {
            $(this).find('.et-item').each(function(){

                var item = $(this);

                var randomDelay = Math.round(( Math.random() * ( 300 - 100 ) + 100 ));
                var preloader   = item.find('.image-preloader' );

                item.find('.et-item-inner').css('animation-delay',randomDelay+'ms');

                if (typeof(preloader) != 'undefined' && preloader != null){
                    preloader.css('transition-delay',( 300 + randomDelay )+'ms');
                }

            });
        }

        $.fn.sequentialAnimationDelay = function() {
            $(this).find('.et-item').each(function(index){

                var item = $(this);

                var sequentialDelay = 50*index;
                var preloader   = item.find('.image-preloader' );

                item.find('.et-item-inner').css('animation-delay',sequentialDelay+'ms');

                if (typeof(preloader) != 'undefined' && preloader != null){
                    preloader.css('transition-delay',( 300 + sequentialDelay )+'ms');
                }

            });
        }

        $.fn.animateIfInViewport = function(win) {
            $(this).find('.et-item').each(function(){
                var $this = $(this);
                if($this.isInViewport(win)){
                    $this.find('.et-item-inner').addClass('animate');
                }
            });
        }

        var iframe = document.getElementById('vc_inline-frame');

        if (typeof(iframe) != 'undefined' && iframe != null){

            iframe.addEventListener("load", function() {
                var win = iframe.contentWindow;
                var doc = iframe.contentDocument ? iframe.contentDocument : iframe.contentWindow.document;

                setTimeout(function(){

                    /* Header builder
                    /*-------------*/

                        $(doc).find(".hbe").each(function(){
                            var $this = $(this);
                            var attr = $this.parent().attr('data-tag');
                            var hasAttribute = (typeof attr !== 'undefined') ? true : false;
                            if ($this.hasClass('hbe-right') && hasAttribute) {$this.parent().addClass('hbe-right');}
                            if ($this.hasClass('hbe-left') && hasAttribute) {$this.parent().addClass('hbe-left');}
                            if ($this.hasClass('hbe-center') && hasAttribute) {$this.parent().addClass('hbe-center');}
                        });

                    /* Megamenu tabs
                    ---------------*/
                        
                        $(doc).find('.megamenu-tab').each(function(){

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

                        });

                    /* Megamenu grid autoalign
                    ---------------*/

                        $(doc).find('.megamenu').each(function(){
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

                    /* Title section
                    /*-------------*/
                    
                        $(doc).find(".tse").each(function(){
                            var $this = $(this);
                            var attr = $this.parent().attr('data-tag');
                            var hasAttribute = (typeof attr !== 'undefined') ? true : false;
                            if ($this.hasClass('tse-right') && hasAttribute) {$this.parent().addClass('tse-right');}
                            if ($this.hasClass('tse-left') && hasAttribute) {$this.parent().addClass('tse-left');}
                            if ($this.hasClass('tse-center') && hasAttribute) {$this.parent().addClass('tse-center');}
                        });

                    /* VC core animations
                    /*-------------*/  

                        $(doc).find('.wpb_animate_when_almost_visible').each(function(){
                            $(this).waypoint({
                                handler: function(direction) {
                                    
                                    $(this.element)
                                    .addClass('wpb_start_animation')
                                    .addClass('animated');

                                    this.destroy();
                                },
                                offset: 'bottom-in-view',
                                context: win
                            });
                        });           
                    
                    /* Parallax/Video/Fixed backs/Overlay
                    /*-------------*/

                        $(doc).find('.vc-parallax').each(function(){
                            var $this = $(this),
                            plx = $this.find('.parallax-container');
                            
                            if ($this.hasClass('vc-video-parallax')) {
                                plx = $this.find('.video-container');
                            }

                            $(win).scroll(function() {
                                var yPos   = Math.round(($(win).scrollTop()-plx.offset().top) / $this.data('parallax-speed'));
                                plx.css({
                                    '-ms-transform':'translateY('+yPos + 'px)',
                                    '-webkit-transform':'translateY('+yPos + 'px)',
                                    '-moz-transform':'translateY('+yPos + 'px)',
                                    'transform':'translateY('+yPos + 'px)'
                                });    
                            });
                        });

                        $(doc).find('.vc-fixed-bg').each(function(){

                            var $this      = $(this), 
                                fx         = $this.find('.fixed-container'),
                                $secHeight = $(this).outerHeight(),         
                                $secWidth  = $(this).outerWidth(),
                                fxHeight   = ($secHeight > $(win).height()) ? $secHeight : $(win).height();

                            fx.css({'height':fxHeight*1.2+'px'});

                            $(win).resize(function(){
                                fx.css({'height':fxHeight+100+'px'});
                            });
                        });

                        $(doc).find('.vc-animated-bg').each(function(){

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

                        $(doc).find('.curtain-gradient').each(function(){

                            $(this).waypoint({
                                handler: function(direction) {
                                    
                                    $(this.element)
                                    .addClass('animate');

                                    this.destroy();
                                },
                                offset: '75%',
                                context: win
                            });

                        });

                    /* et-heading
                    /*-------------*/

                        $(doc).find('.et-heading.animate-true').each(function(){
                            var element      = $(this),
                                elementDelay = element.attr('data-delay'),
                                elementText  = element.find('.text');

                            if (
                                element.hasClass('line-appear') || 
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
                                offset: 'bottom-in-view',
                                context: win
                            });
                        });

                    /* et-typeit
                    /*-------------*/

                        $(doc).find('.et-typeit').each(function(){
                            var $this      = $(this);
                            var strings    = $this.data('strings');
                            var autostart  = $this.hasClass('autostart-true') ? true : false;
                            var startdelay = $this.data('startdelay');
                            
                            strings    = strings.split(",");

                            var string_1 = strings[0];
                            var string_2 = strings[1];
                            var string_3 = strings[2];
                            var string_4 = strings[3];

                            $this.waypoint({
                                handler: function(direction) {

                                    var element = $(this.element);

                                    if (element.hasClass('onlyfirst')) {
                                        element.find('.typeit-dynamic').typeIt({
                                            speed: 100,
                                            startDelay:startdelay,
                                            autoStart: true,
                                            loop:false,
                                            lifeLike:true
                                        })
                                        .tiType(string_1);
                                    } else {
                                        element.find('.typeit-dynamic').typeIt({
                                            speed: 100,
                                            startDelay:startdelay,
                                            autoStart: true,
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

                                    this.destroy();

                                },
                                offset: 'bottom-in-view',
                                context: win
                            });
                        });

                    /* et-blockquote
                    /*-------------*/

                        $(doc).find('.et-blockquote').each(function(){
                            $(this).waypoint({
                                handler: function(direction) {
                                    $(this.element).addClass('active');
                                    this.destroy();
                                },
                                offset: '75%',
                                context: win
                            });
                        });

                    /* et-testimonial
                    /*-------------*/

                        $(doc).find('.et-testimonial').each(function(){
                            if (!$(this).parents('.et-testimonial-container').length) {
                                $(this).waypoint({
                                    handler: function(direction) {
                                        $(this.element).addClass('active');
                                        this.destroy();
                                    },
                                    offset: '75%',
                                    context: win
                                });
                            }
                        });

                    /* et-person
                    /*-------------*/

                        $(doc).find('.et-person').each(function(){
                            if (!$(this).parents('.et-person-container').length) {
                                $(this).waypoint({
                                    handler: function(direction) {
                                        $(this.element).addClass('active');
                                        this.destroy();
                                    },
                                    offset: '75%',
                                    context: win
                                });
                            }
                        });

                    /* et-button
                    /*-------------*/

                        $(doc).find('.et-button').each(function(){

                            var $this = $(this);

                            if ($this.hasClass('hover-scale')) {
                                var hover = $this.find(".hover");
                                var d = Math.max($this.outerWidth(), $this.outerHeight());
                                hover.css({'height': d*1.2, 'width': d*1.2});
                            }

                            if ($this.hasClass('material')) {
                                $this.on('click',function(e){
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

                            if ($this.hasClass('wpb_animate_when_almost_visible')) {

                                var delay = $(this).data('delay');

                                $this.waypoint({
                                    handler: function(direction) {

                                        var element = $(this.element);

                                        setTimeout(function(){
                                            element
                                            .addClass('wpb_start_animation')
                                            .addClass('animated');
                                        },delay);
                                       
                                        this.destroy();
                                    
                                    },
                                    offset: '25%',
                                    context: win
                                });

                            }
                                    
                        });

                    /* et-header-button
                    /*-------------*/

                        $(doc).find('.et-header-button a').each(function(){

                            var $this = $(this);

                            if ($this.hasClass('hover-scale')) {
                                var hover = $this.find(".hover");
                                var d = Math.max($this.outerWidth(), $this.outerHeight());
                                hover.css({'height': d*1.2, 'width': d*1.2});
                            }

                            if ($this.hasClass('material')) {
                                $this.on('click',function(e){
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

                            if ($this.hasClass('wpb_animate_when_almost_visible')) {

                                $this.waypoint({
                                    handler: function(direction) {

                                        var $this = $(this.element);

                                        $this
                                        .addClass('wpb_start_animation')
                                        .addClass('animated');
                                       
                                        this.destroy();
                                    
                                    },
                                    offset: '25%',
                                    context: win
                                });

                            }
                                    
                        });
                
                    /* et-separator
                    ---------------*/

                        $(doc).find('.et-separator.animate-true').waypoint({
                            handler: function(direction) {
                                var $this = $(this.element),
                                $thisDelay = $this.attr('data-delay');

                                setTimeout(function(){
                                    $this.addClass('active')
                                },$thisDelay);

                                this.destroy();
                            },
                            offset: 'bottom-in-view',
                            context: win
                        });

                    /* et-more-box
                    ---------------*/

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

                        $(doc).find('.et-more-box').each(function(){

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

                        $(win).resize(function(){
                            $(doc).find('.et-more-box').each(function(){
                                responsiveBox($(this));
                                $(this).find('.et-more-box-content').getNiceScroll().resize();
                            });
                        });

                    /* et-accordion
                    ---------------*/

                        $(doc).find('.et-accordion').each(function(){

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

                    /* et-tab
                    ---------------*/

                        $(doc).find('.et-tab').each(function(){

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

                                $(win).resize(OverflowCorrection);           

                        });

                    /* et-mailchimp
                    ---------------*/

                        var valid = "invalid";
                        function validateValue($value, $target, $placeholder,$email){
                            if ($email == true) {
                                var n = $value.indexOf("@");
                                var r = $value.lastIndexOf(".");
                                if (n < 1 || r < n + 2 || r + 2 >= $value.length) {
                                    valid =  "invalid";
                                } else {
                                    valid = "valid";
                                }
                                
                                if ($value == null || $value == "" || valid == "invalid") {
                                    $target.addClass('visible');
                                } else {
                                    $target.removeClass('visible');
                                }

                            } else {
                                if ($value == null || $value == "" || $value == $placeholder) {
                                    $target.addClass('visible');
                                } else {
                                    $target.removeClass('visible');
                                }
                            }
                        };

                        $(doc).find('.et-mailchimp-form').each(function(){

                            var $this = $(this);

                            $this.submit(function(event) {

                                event.preventDefault();

                                var formData = $this.serialize();

                                var email   = $this.find("input[name='email']"),
                                    fname   = $this.find("input[name='fname']"),
                                    lname   = $this.find("input[name='lname']"),
                                    phone   = $this.find("input[name='phone']"),
                                    list    = $this.find("input[name='list']");

                                validateValue(email.val(), email.next(".alert"), email.attr('data-placeholder'), true);
                                if (fname.length && fname.attr('data-required') == "true") {validateValue(fname.val(), fname.next(".alert"), fname.attr('data-placeholder'), false);}
                                if (lname.length && lname.attr('data-required') == "true") {validateValue(lname.val(), lname.next(".alert"), lname.attr('data-placeholder'), false);}
                                if (phone.length && phone.attr('data-required') == "true") {validateValue(phone.val(), phone.next(".alert"), phone.attr('data-placeholder'), false);}

                                if (email.val() != email.attr('data-placeholder') && valid == "valid" && 
                                    (fname.length && fname.attr('data-required') == "true" && fname.val() != fname.attr('data-placeholder')) &&
                                    (lname.length && lname.attr('data-required') == "true" && lname.val() != lname.attr('data-placeholder')) &&
                                    (phone.length && phone.attr('data-required') == "true" && phone.val() != phone.attr('data-placeholder'))
                                ){

                                    $this.find(".sending").addClass('visible');

                                    $.ajax({
                                        type: 'POST',
                                        url: $this.attr('action'),
                                        data: formData
                                    })
                                    .done(function(response) {
                                        $this.find(".sending").removeClass('visible');
                                        $this.find(".et-mailchimp-success").addClass('visible');
                                        setTimeout(function(){
                                            $this.find(".et-mailchimp-success").removeClass('visible');
                                        },2000);
                                    })
                                    .fail(function(data) {
                                        $this.find(".sending").removeClass('visible');
                                        $this.find(".et-mailchimp-error").addClass('visible');
                                        setTimeout(function(){
                                            $this.find(".et-mailchimp-error").removeClass('visible');
                                        },2000);
                                    })
                                    .always(function(){
                                        setTimeout(function(){
                                            // Clear the form.
                                            $this.find("input[name='email']").val(email.attr('data-placeholder'));
                                            $this.find("input[name='fname']").val(fname.attr('data-placeholder'));
                                            $this.find("input[name='lname']").val(lname.attr('data-placeholder'));
                                            $this.find("input[name='phone']").val(phone.attr('data-placeholder'));
                                        },2000);
                                    });

                                }
                            });
                        });

                    /* et-instagram
                    ---------------*/

                        function cutString(s, n){
                            var cut= s.indexOf(' ', n);
                            if(cut== -1) return s;
                            return s.substring(0, cut)
                        }
                                
                        $(doc).find('.instagram-image-list').each(function(){

                            var $this    = $(this),
                                username = $this.data('username'),
                                limit    = $this.data('limit'),
                                size     = $this.data('size');

                            $(this).instastory({
                                get: username,
                                imageSize: size,
                                limit: limit,
                                link: true,
                                template: '<li><a href="{{link}}"><div class="image-preloader"></div><img src="{{image}}" alt="{{accessibility_caption}}"></a></li>'
                            });
                        });

                        $(doc).find('.et-instagram').each(function(){

                            var $this    = $(this),
                                username = $this.data('username'),
                                limit    = $this.data('limit'),
                                size     = $this.data('size');

                            $(this).instastory({
                                get: username,
                                imageSize: size,
                                limit: limit,
                                link: true,
                                template: '<div class="et-item instagram-item"><div class="et-item-inner et-clearfix"><div class="overlay-hover"><a href="{{link}}"><div class="image-container"><img src="{{image}}" alt="{{accessibility_caption}}"></div><div class="post-image-overlay"><div class="post-image-overlay-content"><p><span class="feed-item-likes"><span class="feed-item-icons far fa-heart"></span>{{likes}}</span><span class="feed-item-comments"><span class="feed-item-icons far fa-comment"></span>{{comments}}</span></p><p class="feed-item-description">{{caption}}</p></div></div></a></div></div></div>'
                            });

                            if ($this.hasClass('carousel')) {

                                var $thisColumns   =  $this.data('columns');
                                var columnsTabPort = ($thisColumns < 2) ? $thisColumns : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 3 : 2;
                                var columnsTabLand = ($thisColumns < 4) ? $thisColumns : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 4 : 3;
                                var columnsMob     = ($thisColumns < 5) ? 1 : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 2 : 1;

                                var dots        = false,
                                    autoplay    = false,
                                    center      = false,
                                    loop        = false,
                                    autoHeight  = true,
                                    baseElement = window;

                                    columnsTabPort = ($thisColumns < 2) ? 1 : $thisColumns;
                                    columnsMob = ($thisColumns < 2) ? 1 : 3;

                                var mobile = window.matchMedia("(max-width: 639px)");
                                if (mobile.matches) {
                                    $thisColumns = 1;
                                    columnsTabPort = 1;
                                    columnsTabLand = 1;
                                }
                                if ($this.hasClass('autoplay-true') || $this.data('autoplay') == true) {
                                    autoplay = true;
                                    loop = true;
                                }
                                if ($this.hasClass('navigation-only-bullets')) {
                                    dots = true;
                                }

                                setTimeout(function(){
                                    imagesLoaded($this,function(){
                                        $this.addClass('owl-carousel');
                                        var $owl = $this.owlCarousel({
                                            nav:true,
                                            animateOut:false,
                                            animateIn:false,
                                            navText:[],
                                            dots:dots,
                                            autoplay:autoplay,
                                            autoplayHoverPause:true,
                                            autoHeight: autoHeight,
                                            responsiveRefreshRate:50,
                                            responsiveBaseElement:baseElement,
                                            center:center,
                                            loop:loop,
                                            items:$thisColumns,
                                            responsive:{
                                                320 : {items:1},
                                                321 : {items:columnsMob},
                                                768 : {items:columnsTabPort},
                                                1024 : {items:columnsTabLand},
                                                1280 : {items:$thisColumns}
                                            },
                                        });

                                        $(doc).resize(function(){
                                            setTimeout(function(){
                                                $owl.on('initialized.owl.carousel', function(event) {
                                                    $owl.trigger('refresh.owl.carousel');
                                                });
                                            },50);
                                        });
                                    });
                                },4000);
                            }

                        });

                    /* owl-carousel
                    ---------------*/

                        $(doc).find('.owl-carousel').each(function(){

                            var $this           =  $(this);
                            var $thisColumns    =  $this.data('columns');
                            var columnsTabPort  = ($thisColumns < 2) ? 1 : 2;
                            var columnsTabLand  = ($thisColumns <= 4) ? $thisColumns : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 3 : 4;
                            var columnsMob      = 2;
                            var dots           = false;
                            var autoplay       = $this.data('autoplay');
                            var center         = false;
                            var loop           = false;

                            if ($this.hasClass('et-instagram-pics')) {
                                columnsTabPort = ($thisColumns < 2) ? 1 : $thisColumns;
                                columnsMob = ($thisColumns < 2) ? 1 : 3;
                            }

                            if ($this.hasClass('et-carousel') || $this.hasClass('et-testimonial-container') || $this.hasClass('et-person-container') || $this.hasClass('et-client-container')) {
                                dots = true;
                                if (($thisColumns == 4)) {columnsTabLand = 2;}
                                if (($thisColumns == 2)) {columnsTabPort = 1;}
                            }

                            if ($this.hasClass('related-projects')) {
                                center = true,
                                loop   = true;
                            }

                            if ($this.parent().hasClass('et-shortcode-projects-full')) {
                                dots = false;
                            }

                            if ($this.hasClass('navigation-only-dottes')) {
                                dots = true;
                            }

                            imagesLoaded($this,function(){
                                var $owl = $this.owlCarousel({
                                    items:$thisColumns,
                                    nav:true,
                                    navText:[],
                                    dots:dots,
                                    autoplay:autoplay,
                                    animateOut:false,
                                    animateIn:false,
                                    autoHeight: true,
                                    responsive:{
                                        300 : {items:1},
                                        460 : {items:columnsMob},
                                        750 : {items:columnsTabPort},
                                        1000 : {items:columnsTabLand},
                                        1280 : {items:$thisColumns}
                                    },
                                    responsiveRefreshRate:200,
                                    responsiveBaseElement:win,
                                    center:center,
                                    loop:loop
                                });
                                setTimeout(function(){
                                    $owl.trigger('refresh.owl.carousel');
                                },50);
                            });

                        });

                        $(win).resize(function(){
                            $(doc).find('.owl-carousel').each(function(){
                                $(this).trigger('refresh.owl.carousel');
                            });
                        });

                    /* etp-parallax
                    ---------------*/

                        $(doc).find('.etp-parallax[data-parallax="true"]').each(function(){

                            var $this       = $(this),
                                $thisParent = $this.parent(),
                                speed       = $this.data('speed'),
                                move        = $this.data('move'),
                                xCoordinate = $this.data('coordinatex'),
                                yCoordinate = $this.data('coordinatey'),
                                classes     = $this.attr('class'),
                                classArray  = classes.split(' '),
                                disableArray = [];

                                for (var i = 0; i < classArray.length; i++) {
                                    if (classArray[i].includes("disable")) {
                                        disableArray.push(classArray[i])
                                    }
                                }

                            $this
                            .removeClass('etp-parallax')
                            .removeAttr('data-parallax');

                            $thisParent
                            .addClass('etp-parallax')
                            .attr('data-parallax','true')
                            .css({
                                '-ms-transform':'translate3d('+xCoordinate+'px, '+yCoordinate+ 'px, 0px)',
                                'transform':'translate3d('+xCoordinate+'px, '+yCoordinate+ 'px, 0px)'
                            });
                            
                            for (var i = 0; i < disableArray.length; i++) {
                                $thisParent.addClass(disableArray[i]);
                            }

                            if (move == true) {
                              
                                $thisParent.on('mousemove',function(event){
                        
                                    var clientRect  = this.getBoundingClientRect();
                                    var yPosDefault = Math.round((0-$(win).scrollTop()) / speed)  +  yCoordinate;
                                    var yPos        = Math.round(0 - ((event.clientY-(clientRect.top+clientRect.height*0.5))/speed)) + yPosDefault;
                                    var xPos        = Math.round(0 - (event.clientX-(clientRect.left+clientRect.width*0.5))/speed) + xCoordinate;

                                    $thisParent.css({
                                        '-ms-transform':'translate3d('+xPos+'px, '+yPos+ 'px, 0px)',
                                        'transform':'translate3d('+xPos+'px, '+yPos+ 'px, 0px)'
                                    });
                                    
                                });
                            }

                            $(win).scroll(function(){
                                var yPos = Math.round((0-$(win).scrollTop()) / speed)  +  yCoordinate;
                                $thisParent.css({
                                    '-ms-transform':'translate3d('+xCoordinate+'px, '+yPos+ 'px, 0px)',
                                    'transform':'translate3d('+xCoordinate+'px, '+yPos+ 'px, 0px)'
                                });
                            });
                        });

                    /* et-image
                    ---------------*/

                        $(doc).find('.et-image[data-curtain="true"]').each(function(){

                            var delay = $(this).data('animation-delay');

                            $(this).find('img').css({'animation-delay':(delay+1000)+'ms'});

                            $(this).waypoint({
                                handler: function(direction) {
                                    $(this.element).addClass('active');
                                },
                                offset: '75%',
                                context: win
                            });
                        });

                    /* et-animate-box
                    ---------------*/

                        $(doc).find('.et-animate-box[data-curtain="true"]').each(function(){

                            var delay = $(this).data('animation-delay');

                            $(this).find('.content').css({'animation-delay':(delay+1000)+'ms'});

                            $(this).waypoint({
                                handler: function(direction) {

                                    $(this.element).addClass('active');

                                    this.destroy();
                                },
                                offset: '75%',
                                context: win
                            });
                        });

                    /* et-icon-box
                    ---------------*/

                        $(doc).find('.vc_et_icon_box[data-parallax="true"]').each(function(){
                            $(this).parent().css('position','relative');
                        });

                        $(doc).find('.et-icon-box-container').each(function(){
                            var $this = $(this);
                            if ($this.hasClass('effect-fadeIn') || $this.hasClass('effect-moveUp')) {
                                if ($this.hasClass('animation-type-sequential')) {
                                    $this.sequentialAnimationDelay();
                                } else {
                                    $this.randomAnimationDelay();
                                }

                                setTimeout(function(){
                                    $this.animateIfInViewport(win);
                                },250);
                            }
                        });

                    /* et-gallery
                    ---------------*/

                        $(doc).find('.et-gallery').each(function(){

                            var $this = $(this);

                            if ($this.hasClass('grid')) {
                                imagesLoaded( $this, function() {
                                    $this.masonryIfame(win,'.et-item');
                                });
                            }
                      
                            if ($this.hasClass('animate-gallery')) {

                                $this.randomAnimationDelay();

                                setTimeout(function(){
                                    $this.animateIfInViewport(win);
                                },250);

                            }

                            if ($this.hasClass('carousel-thumbs')) {

                                var thumbs = $this.find('ul.carousel-thumbs'),
                                    navs   = $this.find('ul.carousel-navs'),
                                    slidesToShow = (navs.find('li').length < 8) ? navs.find('li').length : 8;

                                thumbs.slick({
                                    asNavFor: $(doc).find('#'+navs.attr('id')),
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                    arrows: true,
                                    dots: false,
                                    autoplay: $this.data('autoplay'),
                                    autoplaySpeed: 2000,
                                });

                                navs.slick({
                                    asNavFor: $(doc).find('#'+thumbs.attr('id')),
                                    slidesToShow: slidesToShow,
                                    slidesToScroll: 1,
                                    dots: false,
                                    arrows: false,
                                    centerMode: false,
                                    focusOnSelect: true,
                                    autoplay: $this.data('autoplay'),
                                    autoplaySpeed: 2000,
                                });


                                navs.find('li').each(function(){
                                    $(this).on('click',function(){
                                        var index = $(this).index();
                                        thumbs.find('li').eq(index)
                                        .addClass('slick-current')
                                        .addClass('slick-active')
                                        .siblings()
                                        .removeClass('slick-current')
                                        .removeClass('slick-active');
                                    });
                                });

                            }

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

                    /* et-step-box-container
                    ---------------*/

                        $(doc).find('.et-step-box-container').each(function(){

                            var $this = $(this);

                            $this.find('.et-step-box').each(function(){
                                var $stepBox = $(this);

                                $stepBox.find('.step-dot .before').text($stepBox.index()+1);

                            });
                      
                            $this.sequentialAnimationDelay();

                            setTimeout(function(){
                                $this.animateIfInViewport(win);
                            },250);
                                
                        });

                    /* et-client-container
                    ---------------*/

                        $(doc).find('.et-client-container').each(function(){

                            var $this = $(this);
                      
                            $this.randomAnimationDelay();

                            setTimeout(function(){
                                $this.animateIfInViewport(win);
                            },250);
                                
                        });

                    /* et-map
                    ---------------*/

                        $(doc).find('.et-map').each(function(){

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

                                var map        = new google.maps.Map(doc.getElementById($this.attr('id')), options);

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

                    /* et-counter
                    ---------------*/

                        $(doc).find('.et-counter').each(function(){

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
                                context: win
                            });

                        });

                    /* et-progress
                    ---------------*/

                        $(doc).find('.et-progress').each(function(){

                            var $this      = $(this);
                            var bar        = $this.find('.bar');
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
                                context: win
                            });

                        });

                    /* et-circle-progress
                    ---------------*/

                        $(doc).find('.et-circle-progress').each(function(){

                            var $this      = $(this);
                            var bar        = $this.data('bar');
                            var track      = $this.data('track');
                            var percentage = $this.data('percent');
                            var percent    = $this.find('.percent');
                            var size       = 200;

                            if ($this.hasClass('size-medium')) {size = 240;}
                            if ($this.hasClass('size-large'))  {size = 300;}

                            $(this).waypoint({
                                handler: function(direction) {

                                    $this
                                    .addClass('visible');

                                    $this.easyPieChart({
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
                                offset: '75%',
                                context: win
                            });

                        });

                    /* et-timer
                    ---------------*/

                        $(doc).find('.et-timer').each(function(){
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

                    /* et-banner
                    ---------------*/

                        $(doc).find('.et-popup-banner-wrapper').each(function(){

                            var $this  = $(this);
                            var $delay = $this.data('delay');
                            var cookie = $this.data('cookie');

                            if (typeof($delay) == 'undefined' && $delay == null){
                                $delay = 3000;
                            }

                            var bannerClone = $this.clone();

                            $(doc).find('body').append(bannerClone);

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

                    /* et-tagline
                    ---------------*/

                        $(doc).find('.et-tagline').each(function(){

                            var $this  = $(this);
                            var $delay = $this.data('delay');
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

                    /* et-post-shortcodes
                    ---------------*/

                        $(doc).find('.et-woo-products.grid').each(function(){
                            var $this = $(this);
                            imagesLoaded( $this, function() {
                                $this.find('.et-item-set').masonryIfame(win,'.et-item');
                            });

                            var preloaderActive = $(doc).find('body').hasClass('preloader-active') ? true : false;

                            if ($this.find('.et-item-set').hasClass('effect-fadeIn') || $this.find('.et-item-set').hasClass('effect-moveUp') || preloaderActive == true) {

                                $this.randomAnimationDelay();

                                setTimeout(function(){
                                    $this.animateIfInViewport(win);
                                },250);

                            } 
                        });

                        $(doc).find('.et-shortcode-posts').each(function(){
                            var $this = $(this);

                                if ($this.hasClass('grid') || $this.hasClass('chess')) {

                                    if ($this.hasClass('grid')) {
                                        imagesLoaded( $this, function() {
                                            $this.find('.et-item-set').masonryIfame(win,'.et-item');
                                        });
                                    }

                                    var preloaderActive = $(doc).find('body').hasClass('preloader-active') ? true : false;

                                    if ($this.find('.et-item-set').hasClass('effect-fadeIn') || $this.find('.et-item-set').hasClass('effect-moveUp') || preloaderActive == true) {

                                        $this.randomAnimationDelay();

                                        setTimeout(function(){
                                            $this.animateIfInViewport(win);
                                        },250);

                                    }

                                } 
                        });

                        $(doc).find('.et-shortcode-projects.grid').each(function(){
                            var $this = $(this);
                            imagesLoaded( $this, function() {
                                $this.find('.et-item-set').masonryIfame(win,'.et-item');
                            });

                            var preloaderActive = $(doc).find('body').hasClass('preloader-active') ? true : false;

                            if ($this.find('.et-item-set').hasClass('effect-fadeIn') || $this.find('.et-item-set').hasClass('effect-moveUp') || preloaderActive == true) {

                                $this.randomAnimationDelay();

                                setTimeout(function(){
                                    $this.animateIfInViewport(win);
                                },250);

                            } 
                        });

                        $(doc).find('.et-shortcode-posts .overlay-move').each( function() { 
                            $(this).find('.overlay-hover').each( function() { $(this).hoverdir(); } );
                        } );

                        $(doc).find('.et-shortcode-projects .overlay-move').each( function() { 
                            $(this).find('.overlay-hover').each( function() { $(this).hoverdir(); } );
                        } );

                        $(doc).find('.et-shortcode-single-project').each(function(){
                            var preloaderActive = $(doc).find('body').hasClass('preloader-active') ? true : false;
                            if (preloaderActive) {
                                $(this).animateIfInViewport(win);
                            }
                        });

                    /* et-shortcode-projects ajax
                    ---------------*/

                        $(doc).find('.et-shortcode-projects').each(function(){
                
                            var $this = $(this),
                                loop  = $this.find('.loop-project');

                            if($this.hasClass('grid')){

                                var filter = $this.find('.enovathemes-filter');

                                if (typeof(filter) != 'undefined' && filter != null && filter.length) {

                                    var filterRequestRunning = false;
                                    var postsPerPage = filter.data('posts-per-page');
                                    var order        = filter.data('order');
                                    var orderby      = filter.data('orderby');
                                    var loadingText  = admin_opt.projectLoadingText;
                                    var layout       = 'project-with-details';
                                    var container    = $this.hasClass('project-container-boxed') ? 'boxed' : 'wide';
                                    var column       = 'medium';
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
                                        var json_url        = admin_opt.projectJsonUrl;

                                        json_url += '?per_page='+postsPerPage;
                                        json_url += '&order='+order;
                                        json_url += '&orderby='+orderby;

                                        if (typeof(currentFilterID) != 'undefined' && currentFilterID != null){
                                            json_url += '&project-category='+currentFilterID;
                                        } else {
                                            if (typeof(terms_exclude) != 'undefined' && terms_exclude != null){
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

                                                                        if (imageFull) {
                                                                            imageSrc = imageObj['full']
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
                                                                            $output += '<h4 class="post-title entry-title">';
                                                                                $output += '<a href="'+object.link+'" title="'+object.title.rendered+'" rel="bookmark">'+object.title.rendered+'</a>';
                                                                            $output += '</h4>';
                                                                            if (layout == 'project-with-details') {
                                                                                $output += '<div class="project-category">';

                                                                                    var projectCategoryArray       = object.project_category_array;
                                                                                    var projectCategoryArrayOutput = [];

                                                                                    for (var i = 0; i < projectCategoryArray.length; i++) {
                                                                                        projectCategoryArrayOutput.push('<a href="'+projectCategoryArray[i][1]+'" rel="tag">'+projectCategoryArray[i][0]+'</a>');
                                                                                    }

                                                                                    $output += projectCategoryArrayOutput.join(", ");

                                                                                $output += '</div>';
                                                                            }
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

                                                imagesLoaded($this.find('.loop-project'), function() {
                                                    $this.find('.loop-project').masonryIfame(win,'.et-item');
                                                });

                                                $this.randomAnimationDelay();

                                                setTimeout(function(){
                                                    $this.animateIfInViewport(win);
                                                },250);
                                            }

                                            $this.find('.overlay-move .overlay-hover').each( function() { $(this).hoverdir(); } );

                                            $this.find('.ajax-scroll-overlay').fadeOut(100,function(){
                                                $(this).remove();
                                                $output = '';
                                                filterRequestRunning = false;
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

                    /* widgets
                    ---------------*/

                        /* widget_flickr
                        ---------------*/

                            $(doc).find('.widget_flickr').each(function(){

                                var $this = $(this);

                                $this.find('.flickr-image').each(function(){

                                    var item = $(this);

                                    var randomDelay = Math.round(( Math.random() * ( 300 - 100 ) + 100 ));
                                    var preloader   = item.find('.image-preloader' );

                                    if (typeof(preloader) != 'undefined' && preloader != null){
                                        preloader.css('transition-delay',( randomDelay )+'ms');
                                    }

                                    if(item.isInViewport(win)){
                                        item.addClass('animate');
                                    }

                                });
                            
                            });

                        /* widget_et_recent_entries
                        ---------------*/

                            $(doc).find('.widget_et_recent_entries').each(function(){

                                var $this = $(this);

                                $this.find('li').each(function(){

                                    var item = $(this);

                                    var randomDelay = Math.round(( Math.random() * ( 300 - 100 ) + 100 ));
                                    var preloader   = item.find('.image-preloader' );

                                    if (typeof(preloader) != 'undefined' && preloader != null){
                                        preloader.css('transition-delay',( randomDelay )+'ms');
                                    }

                                    if(item.isInViewport(win)){
                                        item.addClass('animate');
                                    }

                                });
                            
                            });

                        /* widget_products
                        ---------------*/

                            $(doc).find('.product_list_widget').each(function(){

                                var $this = $(this);

                                $this.find('li').each(function(){

                                    var item = $(this);

                                    var randomDelay = Math.round(( Math.random() * ( 300 - 100 ) + 100 ));
                                    var preloader   = item.find('.image-preloader' );

                                    if (typeof(preloader) != 'undefined' && preloader != null){
                                        preloader.css('transition-delay',( randomDelay )+'ms');
                                    }

                                    if(item.isInViewport(win)){
                                        item.addClass('animate');
                                    }

                                });
                            
                            });

                        /* WPML Language switcher
                        ---------------*/

                            $(doc).find('.widget_icl_lang_sel_widget .wpml-ls-current-language > a')
                            .append('<span class="toggle"></span>');

                            $(doc).find('.wpml-ls-legacy-dropdown-click a > span.toggle').on('click',function(e){
                                $(this).parent().toggleClass('active');
                                if ($(this).parent().next('ul').length != 0) {
                                    $(this).parent().toggleClass('animate');
                                    $(this).parent().next('ul').stop().slideToggle(300, "easeOutExpo");
                                };
                                e.preventDefault();
                            });

                            $(doc).find('.wpml-ls-legacy-dropdown .wpml-ls-current-language').hoverIntent(
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

                            $(doc).find('.widget_nav_menu').each(function(){

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

                            $(doc).find('.widget_product_categories').each(function(){

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

                            $(doc).find('.widget_calendar').each(function(){

                                var $this = $(this);
                                var caption = $this.find('caption');

                                $this.find('td#prev a').clone().addClass('prev').html('').appendTo(caption);
                                $this.find('td#next a').clone().addClass('next').html('').appendTo(caption);
                                $this.find('tfoot').remove();

                            });

                    /* win resize
                    ---------------*/

                        $(win).resize(function(){
                            setTimeout(function(){

                                $(doc).find('.et-gallery.grid').each(function(){
                                    var $this = $(this);
                                    imagesLoaded( $this, function() {
                                        $this.masonryIfame(win,'.et-gallery-item');
                                    });
                                });

                                $(doc).find('.et-woo-products.grid').each(function(){
                                    var $this = $(this);
                                    imagesLoaded( $this, function() {
                                        $this.find('.et-item-set').masonryIfame(win,'.et-item');
                                    });
                                });

                                $(doc).find('.et-shortcode-posts.grid').each(function(){
                                    var $this = $(this);
                                    imagesLoaded( $this, function() {
                                       $this.find('.et-item-set').masonryIfame(win,'.et-item');
                                    });
                                });

                                $(doc).find('.et-shortcode-projects.grid').each(function(){
                                    var $this = $(this);
                                    imagesLoaded( $this, function() {
                                       $this.find('.et-item-set').masonryIfame(win,'.et-item');
                                    });
                                });

                            },200);
                        });

                    /* win scroll
                    ---------------*/

                        $(win).scroll(function(){

                            var preloaderActive = $(doc).find('body').hasClass('preloader-active') ? true : false;

                            $(doc).find('.et-instagram.grid').each(function(){

                                var $this = $(this);
                                if ($this.hasClass('effect-fadeIn') || $this.hasClass('effect-moveUp')) {
                                    $this.randomAnimationDelay();
                                    $this.animateIfInViewport(win);
                                }

                            });

                            $(doc).find('.et-gallery').each(function(){

                                var $this = $(this);
                          
                                if ($this.hasClass('animate-gallery')) {

                                    $this.randomAnimationDelay();
                                    $this.animateIfInViewport(win);

                                }
                                    
                            });

                            $(doc).find('.et-icon-box-container').each(function(){
                                var $this = $(this);
                                if ($this.hasClass('effect-fadeIn') || $this.hasClass('effect-moveUp')) {
                                    if ($this.hasClass('animation-type-sequential')) {
                                        $this.sequentialAnimationDelay();
                                    } else {
                                        $this.randomAnimationDelay();
                                    }

                                    $this.animateIfInViewport(win);
                                }
                            });

                            $(doc).find('.et-step-box-container').each(function(){

                                var $this = $(this);

                                $this.find('.et-step-box').each(function(){
                                    var $stepBox = $(this);

                                    $stepBox.find('.step-dot .before').text($stepBox.parents('.vc_et_step_box').index()+1);

                                });
                                          
                                $this.sequentialAnimationDelay();
                                $this.animateIfInViewport(win);
                                    
                            });

                            $(doc).find('.et-client-container').each(function(){

                                var $this = $(this);
                          
                                $this.randomAnimationDelay();
                                $this.animateIfInViewport(win);
                                    
                            });

                            $(doc).find('.et-shortcode-posts').each(function(){
                                var $this = $(this);

                                    if ($this.hasClass('grid') || $this.hasClass('chess')) {

                                        if ($this.find('.et-item-set').hasClass('effect-fadeIn') || $this.find('.et-item-set').hasClass('effect-moveUp') || preloaderActive == true) {
                                            $this.animateIfInViewport(win);
                                        }

                                    } 
                            });

                            $(doc).find('.et-shortcode-products.grid').each(function(){
                                var $this = $(this);
                                if ($this.find('.et-item-set').hasClass('effect-fadeIn') || $this.find('.et-item-set').hasClass('effect-moveUp') || preloaderActive == true) {
                                    $this.animateIfInViewport(win);
                                }
                            });

                            $(doc).find('.et-woo-products.grid').each(function(){
                                var $this = $(this);
                                if ($this.find('.et-item-set').hasClass('effect-fadeIn') || $this.find('.et-item-set').hasClass('effect-moveUp') || preloaderActive == true) {
                                    $this.animateIfInViewport(win);
                                }
                            });

                            $(doc).find('.et-shortcode-projects.grid').each(function(){
                                var $this = $(this);
                                if ($this.find('.et-item-set').hasClass('effect-fadeIn') || $this.find('.et-item-set').hasClass('effect-moveUp') || preloaderActive == true) {
                                    $this.animateIfInViewport(win);
                                }
                            });

                            $(doc).find('.widget_flickr').each(function(){

                                var $this = $(this);

                                $this.find('.flickr-image').each(function(){

                                    var item = $(this);

                                    if(item.isInViewport(win)){
                                        item.addClass('animate');
                                    }

                                });
                            
                            });

                            $(doc).find('.widget_instagram').each(function(){

                                var $this = $(this);

                                $this.find('li').each(function(){

                                    var item = $(this);

                                    if(item.isInViewport(win)){
                                        item.addClass('animate');
                                    }

                                });
                            
                            });

                            $(doc).find('.widget_et_recent_entries').each(function(){

                                var $this = $(this);

                                $this.find('li').each(function(){

                                    var item = $(this);

                                    if(item.isInViewport(win)){
                                        item.addClass('animate');
                                    }

                                });
                            
                            });

                            $(doc).find('.product_list_widget').each(function(){

                                var $this = $(this);

                                $this.find('li').each(function(){

                                    var item = $(this);

                                    if(item.isInViewport(win)){
                                        item.addClass('animate');
                                    }

                                });
                            
                            });

                        });
                
                },1); 
            });

            /* Front-end save
            /*-------------*/

                $( document ).ajaxComplete(function( event, xhr, settings ) {

                    if (settings['type'] != 'POST') {return;}

                    var data = settings['data'];

                    data = data.split("&");

                    var dataObj = [{}];

                    for (var i = 0; i < data.length; i++) {
                        var property = data[i].split("=");
                        dataObj[property[0]] = property[1];
                    }

                    if (dataObj['action'] == "vc_save") {

                        var url  = settings['url'];

                        $.ajax({
                            type: 'POST',
                            url:url,
                            data:{
                                action:'et_vc_save',
                                post_id :dataObj['post_id'],
                                content :dataObj['content'],
                            }
                        })
                        .fail(function(data) {
                            console.log("Ajax error");
                        });

                        return;   
                    }

                });

        }
        
    })(jQuery);
