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
                return dataObj[key] === "et_pricing_table";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_pricing_table"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_pricing_table"]'),
                    element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]');
               

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_pricing_table"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_pricing_table"]').length) {

                        var ID  = uniqueID();
                        var CSS = '';

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_pricing_table"]');

                        /* Styling
                        ---------------*/

                            var color = edit_element.find('input[name="color"]').val();

                            if (color.length) {
                                CSS += '#et-pricing-table-'+ID+' .plan:after,#et-pricing-table-'+ID+' .label {';
                                    CSS += 'background-color:'+color+';';
                                CSS += '}';

                                CSS += '#et-pricing-table-'+ID+'.highlight-true .pricing-table-inner {';
                                    CSS += 'border-color:'+color+' !important;';
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

    });

})(jQuery);