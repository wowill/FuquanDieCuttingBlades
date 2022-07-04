(function($){

    "use strict";

    function uniqueID() {return Math.floor((Math.random() * 1000000) + 1);}

    String.prototype.replaceAll = function(str1, str2, ignore) {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }

    function iframeCSS(CSS){
        var iframe = $('#vc_inline-frame');
        if (typeof(iframe) != 'undefined' && iframe != null){
            iframe.ready(function() {
                CSS = CSS.replaceAll("dir-child*",">");
                iframe.contents().find("#dynamic-styles-inline-css").append(CSS);
            });
        }
    }

    function iframeSCRIPT(element,doc){
        $(element).each(function(){

            var $this = $(this);

            if ($this.hasClass('grid')) {
                imagesLoaded( $this, function() {
                    $this.masonryIfame(doc,'.et-item');
                });
            }

            if ($this.hasClass('animate-gallery')) {
                var items = element.find('.et-item');
                var i = 0;
                var timer;
                
                timer = setInterval(function(){
                    var randomDelay = Math.round(( Math.random() * ( 300 - 100 ) + 100 ));
                    $(items[i]).find('.et-item-inner').addClass('animate').css('transition-delay',randomDelay+'ms');
                    var preloader    = $(items[i]).find('.image-preloader' );
                    if (typeof(preloader) != 'undefined' && preloader != null){
                        preloader.css('transition-delay',( 100 + randomDelay )+'ms');
                    }
                    i++;
                    if (i == items.length) {clearInterval(timer);}
                }, 10);
            }

            if ($this.hasClass('owl-carousel')) {

                var $thisColumns    =  $this.data('columns');
                var columnsTabPort  = ($thisColumns < 2) ? 1 : 2;
                var columnsTabLand  = ($thisColumns <= 4) ? $thisColumns : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 3 : 4;
                var columnsMob      = 1;
                var dots           = true;
                var autoplay       = $this.data('autoplay');
                var center         = false;
                var loop           = false;

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
                        responsiveBaseElement:doc,
                        center:center,
                        loop:loop
                    });

                    setTimeout(function(){
                        $owl.trigger('refresh.owl.carousel');
                    },50);
                });

            }

            if ($this.hasClass('carousel-thumbs')) {

                var thumbs = $this.find('ul.carousel-thumbs'),
                    navs   = $this.find('ul.carousel-navs'),
                    slidesToShow = (navs.find('li').length < 8) ? navs.find('li').length : 8;

                thumbs.slick({
                    asNavFor: doc.find('#'+navs.attr('id')),
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: true,
                    dots: false,
                    autoplay: $this.data('autoplay'),
                    autoplaySpeed: 2000,
                });

                navs.slick({
                    asNavFor: doc.find('#'+thumbs.attr('id')),
                    slidesToShow: slidesToShow,
                    slidesToScroll: 1,
                    dots: false,
                    arrows: false,
                    centerMode: false,
                    focusOnSelect: true,
                    autoplay: $this.data('autoplay'),
                    autoplaySpeed: 2000,
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
    }

    $( document ).ajaxComplete(function( event, xhr, settings ) {

        if (settings['type'] != 'POST') {return;}

        /* Prepare settings
        /*-------------*/

            var data = decodeURIComponent(settings['data']);

            data = data.split("&");

            var dataObj = [{}];

            for (var i = 0; i < data.length; i++) {
                var property = data[i].split("=");
                var key      = (property[0]);
                var value    = (property[1]);
                dataObj[key] = value;
            }

            var elementExists = Object.keys(dataObj).some(function(key) {
                return dataObj[key] === "et_gallery";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_gallery"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_gallery"]'),
                    element_id   = edit_element.find('input[name="element_id"]');

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_gallery"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_gallery"]').length) {

                        var ID  = uniqueID();
                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_gallery"]');
                        element_id.val(ID);

                    }
                    
                });

                return;
            }

        /* Load element
        /*-------------*/

            if((dataObj['action'] == "vc_load_shortcode" && elementExists)){
                var iframe = $('#vc_inline-frame');
                if (typeof(iframe) != 'undefined' && iframe != null){
                    iframe.ready(function() {
                        var doc = iframe.contents();
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-gallery');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element,doc);
                        }
                    });
                }
                return;
            }
    });

})(jQuery);