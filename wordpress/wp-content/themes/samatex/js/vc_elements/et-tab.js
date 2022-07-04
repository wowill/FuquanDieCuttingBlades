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
                    tabsContent.hide(0);
                    tabsContent.eq($thiz.index()).show(0);
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

                        tabsContent.hide(0);
                        tabsContent.eq($self.index()).show(0);
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

            $(doc).resize(OverflowCorrection);

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
                return dataObj[key] === "et_tab";
            });

        /* Load element
        /*-------------*/

            if((dataObj['action'] == "vc_load_shortcode" && elementExists)){
                var iframe = $('#vc_inline-frame');
                if (typeof(iframe) != 'undefined' && iframe != null){
                    iframe.ready(function() {
                        var doc = iframe.contents();
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-tab');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element,doc);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);