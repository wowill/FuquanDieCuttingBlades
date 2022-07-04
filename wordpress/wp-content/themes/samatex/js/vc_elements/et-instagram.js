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

    function cutString(s, n){
        var cut= s.indexOf(' ', n);
        if(cut== -1) return s;
        return s.substring(0, cut)
    }

    function iframeSCRIPT(element,doc){
        $(element).each(function(){

            var $this = $(this);
            var username = $this.data('username'),
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
                return dataObj[key] === "et_instagram";
            });

        /* Load element
        /*-------------*/

            if((dataObj['action'] == "vc_load_shortcode" && elementExists)){
                var iframe = $('#vc_inline-frame');
                if (typeof(iframe) != 'undefined' && iframe != null){
                    iframe.ready(function() {
                        var doc = iframe.contents();
                        iframe = document.getElementById('vc_inline-frame');
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-instagram');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element,doc);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);