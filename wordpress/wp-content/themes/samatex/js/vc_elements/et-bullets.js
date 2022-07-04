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

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_bullets"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_bullets"]');

                var element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]');

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_bullets"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_bullets"]').length) {

                        var CSS = '';
                        var ID  = uniqueID();

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_bullets"]');

                        /* Styling
                        ---------------*/

                            var bullet_color             = edit_element.find('input[name="bullet_color"]').val(),
                                bullet_color_hover       = edit_element.find('input[name="bullet_color_hover"]').val(),
                                bullet_background_color  = edit_element.find('input[name="bullet_background_color"]').val(),
                                bullet_border_color      = edit_element.find('input[name="bullet_border_color"]').val(),
                                tooltip_color            = edit_element.find('input[name="tooltip_color"]').val(),
                                tooltip_background_color = edit_element.find('input[name="tooltip_background_color"]').val();

                            CSS += '#bullets-menu-'+ID+' {';
                                if (bullet_background_color.length) {
                                    CSS += 'background-color:'+bullet_background_color+';';
                                } else {
                                    CSS += 'background-color:transparent;';
                                }
                                if (bullet_border_color.length) {
                                    CSS += 'box-shadow:inset 0 0 0 1px '+bullet_border_color+';';
                                } else {
                                    CSS += 'box-shadow:none;';
                                }
                            CSS += '}';

                            CSS += '#bullets-menu-'+ID+' a:after {';
                                if (bullet_color.length) {
                                    CSS += 'background-color:'+bullet_color+';';
                                } else {
                                    CSS += 'background-color:transparent;';
                                }
                            CSS += '}';

                            CSS += '#bullets-menu-'+ID+' a:hover:after, #bullets-menu-'+ID+' a.one-page-active:after {';
                                if (bullet_color_hover.length) {
                                    CSS += 'background-color:'+bullet_color_hover+';';
                                } else {
                                    CSS += 'background-color:transparent;';
                                }
                            CSS += '}';
                            
                            CSS += '#bullets-menu-'+ID+' a {';
                                if (bullet_color.length) {
                                    CSS += 'color:'+bullet_color+';';
                                }
                            CSS += '}';

                            CSS += '#bullets-menu-'+ID+' a:hover, #bullets-menu-'+ID+' a.one-page-active {';
                                if (bullet_color_hover.length) {
                                    CSS += 'color:'+bullet_color_hover+';';
                                }
                            CSS += '}';

                            CSS += '#bullets-menu-'+ID+' a .tooltip {';
                                if (tooltip_color.length) {CSS += 'color:'+tooltip_color+';';}
                                if (tooltip_background_color.length) {
                                    CSS += 'background-color:'+tooltip_background_color+';';
                                } else {
                                    CSS += 'background-color:transparent;';
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