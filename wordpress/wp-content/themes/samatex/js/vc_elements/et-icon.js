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
                return dataObj[key] === "et_icon";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_icon"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon"]'),
                    element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]');

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon"]').length) {

                        var ID  = uniqueID();
                        var CSS = '';

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon"]');

                        var icon_color         = edit_element.find('input[name="icon_color"]').val(),
                            icon_back_color    = edit_element.find('input[name="icon_back_color"]').val(),
                            icon_border_color  = edit_element.find('input[name="icon_border_color"]').val(),
                            icon_border_radius = edit_element.find('input[name="icon_border_radius"]').val(),
                            icon_border_width  = edit_element.find('input[name="icon_border_width"]').val();

                        CSS += '.et-icon-'+ID+' {';
                            if (icon_color.length) {CSS += 'color:'+icon_color+';';}
                            if (icon_back_color.length) {CSS += 'background-color:'+icon_back_color+';';}
                            if (icon_border_radius.length) {CSS += 'border-radius:'+icon_border_radius+'px;';}
                            if (icon_border_width.length) {
                                if (icon_border_color.length) {
                                    CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_border_color+';';
                                } else {
                                    if (icon_color.length) {
                                        CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_color+';';
                                    }
                                }
                                
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

    });

})(jQuery);