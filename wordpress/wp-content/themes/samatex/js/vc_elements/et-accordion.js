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

    function iframeSCRIPT(element){
        $(element).each(function(){

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
                return dataObj[key] === "et_accordion";
            });

        /* Load element
        /*-------------*/

            if((dataObj['action'] == "vc_load_shortcode" && elementExists)){
                var iframe = $('#vc_inline-frame');
                if (typeof(iframe) != 'undefined' && iframe != null){
                    iframe.ready(function() {
                        var doc = iframe.contents();
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-accordion');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);