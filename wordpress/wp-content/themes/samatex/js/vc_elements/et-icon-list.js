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

            var $this  = $(this),
            $thisDelay = $this.attr('data-delay');

            setTimeout(function(){
                $this.addClass('active')
            },$thisDelay);

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
                return dataObj[key] === "et_icon_list";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_icon_list"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_list"]'),
                    element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]');

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_list"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_list"]').length) {

                        var ID  = uniqueID();
                        var CSS = '';

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_icon_list"]');

                        var icon_color         = edit_element.find('input[name="icon_color"]').val(),
                            icon_back_color    = edit_element.find('input[name="icon_back_color"]').val(),
                            icon_border_color  = edit_element.find('input[name="icon_border_color"]').val(),
                            icon_border_radius = edit_element.find('input[name="icon_border_radius"]').val(),
                            icon_border_width  = edit_element.find('input[name="icon_border_width"]').val(),
                            icon_size          = edit_element.find('select[name="icon_size"] option:selected').val(),
                            shadow             = edit_element.find('input[name="shadow"]');

                        CSS += '#et-icon-list-'+ID+' .icon {';
                            if (icon_color.length) {CSS += 'color:'+icon_color+';';}
                            if (icon_back_color.length) {CSS += 'background-color:'+icon_back_color+';';}
                            if (icon_border_radius.length) {CSS += 'border-radius:'+icon_border_radius+'px;';}
                            if (icon_border_width.length) {
                                if (icon_border_color.length) {
                                    if (shadow.length && shadow.is(":checked")) {
                                        CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_border_color+', 0px 0 24px 0px rgba(0, 0, 0, 0.08);';
                                    } else {
                                        CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_border_color+';';
                                    }
                                } else {
                                    
                                    if (icon_color.length) {
                                        if (shadow.length && shadow.is(":checked")) {
                                            CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_color+', 0px 0 24px 0px rgba(0, 0, 0, 0.08);';
                                        } else {
                                            CSS += 'box-shadow:inset 0 0 0 '+icon_border_width+'px '+icon_color+';';
                                        }
                                    }
                                    
                                }
                                
                            }
                        CSS += '}';

                        switch (icon_size) {
                            case 'small':
                                CSS += '#et-icon-list-'+ID+' li {margin-bottom:16px;}';
                            break;
                            case 'medium':
                                CSS += '#et-icon-list-'+ID+' li {margin-bottom:24px;}';
                            break;
                            case 'large':
                                CSS += '#et-icon-list-'+ID+' li {margin-bottom:32px;}';
                            break;
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
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-icon.animate-true');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);