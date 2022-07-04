(function($){

    "use strict";

    function uniqueID() {return Math.floor((Math.random() * 1000000) + 1);}

    function isInArray(value, array) {return array.indexOf(value) > -1;}

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
            var $this      = $(this);
            var bar        = $this.find('.bar');
            var percentage = bar.data('percentage');
            var percent    = $this.find('.percent');

            bar.addClass('visible')
            .animate({width: percentage+'%'}, 2000, 'easeOutExpo');

            percent.addClass('visible')
            .countTo({
                from: 0,
                to: percentage,
                speed: 2000,
                refreshInterval: 30
            });

        });
    }

    var font_weight_array = [];

    for (var i = 1; i <= 9; i++) {
        font_weight_array.push(i+'00italic');
    }

    /* Ajax complete
    /*-------------*/

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
                        return dataObj[key] === "et_progress";
                    });

                /* Edit element
                /*-------------*/

                    if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_progress"){

                        var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_progress"]');

                        var element_css  = edit_element.find('textarea[name="element_css"]'),
                            element_id   = edit_element.find('input[name="element_id"]');


                        $('#vc_ui-panel-edit-element[data-vc-shortcode="et_progress"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                            if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_progress"]').length) {

                                var ID  = uniqueID();
                                var CSS = '';

                                edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_progress"]');

                                /* Styling
                                ---------------*/

                                    var bar_color   = edit_element.find('input[name="bar_color"]').val(),
                                        track_color = edit_element.find('input[name="track_color"]').val(),
                                        text_color  = edit_element.find('input[name="text_color"]').val();

                                    if (bar_color.length) {
                                        CSS += '#et-progress-'+ID+' .bar {';
                                            CSS += 'background-color:'+bar_color+';';
                                        CSS += '}';
                                    }

                                    if (track_color.length) {
                                        CSS += '#et-progress-'+ID+' .track {';
                                            CSS += 'background-color:'+track_color+';';
                                        CSS += '}';
                                    }

                                    if (text_color.length) {
                                        CSS += '#et-progress-'+ID+' .text {';
                                            CSS += 'color:'+text_color+';';
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
                                var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-progress');
                                if (typeof(element) != 'undefined' && element != null) {
                                    iframeSCRIPT(element);
                                }
                            });
                        }
                        return;
                    }

                    

        });

})(jQuery);