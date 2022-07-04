(function($){

    "use strict";

    function uniqueID() {return Math.floor((Math.random() * 1000000) + 1);}

    String.prototype.replaceAll = function(str1, str2, ignore) {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }

    function iframeSCRIPT(element,doc){
        $(element).each(function(){

            var $this = $(this);

            if ($this.hasClass('grid')) {
                imagesLoaded( $this, function() {
                    $this.find('.et-item-set').masonryIfame(doc,'.et-item');
                });
            }

            var preloaderActive = $(doc).find('body').hasClass('preloader-active') ? true : false;

            if ($this.find('.et-item-set').hasClass('effect-fadeIn') || $this.find('.et-item-set').hasClass('effect-moveUp') || preloaderActive == true) {

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

            if ($this.hasClass('carousel')) {

                var carousel        = $this.find('.owl-carousel');
                var $thisColumns    =  carousel.data('columns');
                var columnsTabPort  = ($thisColumns < 2) ? 1 : 2;
                var columnsTabLand  = ($thisColumns <= 4) ? $thisColumns : ($thisColumns == 5 || $thisColumns == 6 || $thisColumns == 7 || $thisColumns == 9) ? 3 : 4;
                var columnsMob      = 1;
                var dots           = true;
                var autoplay       = carousel.data('autoplay');
                var center         = false;
                var loop           = false;

                imagesLoaded(carousel,function(){
                    var $owl = carousel.owlCarousel({
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

            setTimeout(function(){
                $this.find('.lazy-load').removeClass('lazy');
            },300);

        
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
                return dataObj[key] === "et_woo_products";
            });

        /* Load element
        /*-------------*/

            if((dataObj['action'] == "vc_load_shortcode" && elementExists)){
                var iframe = $('#vc_inline-frame');
                if (typeof(iframe) != 'undefined' && iframe != null){
                    iframe.ready(function() {
                        var doc = iframe.contents();
                        iframe = document.getElementById('vc_inline-frame');
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"]');
                        element = element.parent().find('.et-woo-products')
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element,doc);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);