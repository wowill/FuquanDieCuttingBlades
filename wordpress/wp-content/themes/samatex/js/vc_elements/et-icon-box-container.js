(function($){

    "use strict";

    function uniqueID() {return Math.floor((Math.random() * 1000000) + 1);}

    String.prototype.replaceAll = function(str1, str2, ignore) {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
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

            if ($this.hasClass('effect-fadeIn') || $this.hasClass('effect-moveUp')) {
                if ($this.hasClass('animation-type-sequential')) {
                    $this.sequentialAnimationDelay();
                } else {
                    $this.randomAnimationDelay();
                }

                $this.animateIfInViewport(doc);
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
                return dataObj[key] === "et_icon_box_container";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_icon_box_container"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_box_container"]'),
                    element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]');

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_box_container"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_box_container"]').length) {

                        var ID  = uniqueID();
                        var CSS = '';

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_box_container"]');

                        /* Styling
                        ---------------*/

                            var border_color  = edit_element.find('input[name="border_color"]').val(),
                                height        = edit_element.find('select[name="height"] option:selected').val(),
                                custom_height = edit_element.find('input[name="custom_height"]').val();

                            
                            CSS += '#et-icon-box-container-'+ID+' {';
                                if (border_color.length) {
                                    CSS += 'background-color:'+border_color+';';
                                }
                                if (height.length) {
                                    if (height == 'custom' && custom_height.length) {height = custom_height;}
                                    CSS += 'min-height:'+height+' !important;';
                                }
                            CSS += '}';

                        element_id.val(ID);

                        if (CSS) {
                            element_css.text(CSS);
                            iframeCSS(CSS);
                            CSS = '';
                        }

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
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-icon-box-container');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element,doc);
                        }
                    });
                }
                return;
            }
    });

})(jQuery);