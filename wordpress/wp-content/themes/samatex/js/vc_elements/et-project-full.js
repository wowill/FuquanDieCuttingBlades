(function($){

    "use strict";

    function uniqueID() {return Math.floor((Math.random() * 1000000) + 1);}

    String.prototype.replaceAll = function(str1, str2, ignore) {
        return this.replace(new RegExp(str1.replace(/([\/\,\!\\\^\$\{\}\[\]\(\)\.\*\+\?\|\<\>\-\&])/g,"\\$&"),(ignore?"gi":"g")),(typeof(str2)=="string")?str2.replace(/\$/g,"$$$$"):str2);
    }

    function iframeSCRIPT(element,doc){
        $(element).each(function(){

            var $this        = $(this);

            var carousel        = $this.find('.owl-carousel');
            var $thisColumns    = carousel.data('columns');
            var columnsTabPort  = 1;
            var columnsTabLand  = 1;
            var columnsMob      = 1;
            var dots            = false;
            var autoplay        = carousel.data('autoplay');
            var center          = false;
            var loop            = false;

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
                return dataObj[key] === "et_projects_full";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_projects_full"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_projects_full"]');

                var element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]');

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_projects_full"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_projects_full"]').length) {

                        var CSS = '';
                        var ID  = uniqueID();

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_projects_full"]');

                        var color = edit_element.find('input[name="color"]').val();

                        if (color.length) {
                            CSS += '#et-shortcode-projects-full-'+ID+' .project-category, #et-shortcode-projects-full-'+ID+' .project-category a, #et-shortcode-projects-full-'+ID+' .post-title, #et-shortcode-projects-full-'+ID+' .post-title a, #et-shortcode-projects-full-'+ID+' .post-excerpt, #et-shortcode-projects-full-'+ID+' .overlay-read-more {';
                                CSS += 'color:'+color+';';
                            CSS += '}';

                            CSS += '#et-shortcode-projects-full-'+ID+' .overlay-read-more:hover {';
                                CSS += 'background-color:'+color+';';
                            CSS += '}';
                        }
                        
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
                        iframe = document.getElementById('vc_inline-frame');
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"]');
                        element = element.parent().find('.et-shortcode-projects-full')
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element,doc);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);