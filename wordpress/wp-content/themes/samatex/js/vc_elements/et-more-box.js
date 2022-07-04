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
                return dataObj[key] === "et_more_box";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_more_box"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_more_box"]'),
                    element_css   = edit_element.find('textarea[name="element_css"]'),
                    element_id    = edit_element.find('input[name="element_id"]'),
                    padding_box   = edit_element.find(".padding-box"),
                    padding       = edit_element.find('input[name="padding"]'),
                    padding_val   = padding.val(),
                    padding_array = [],
                    table         = edit_element.find(".column-responsive-padding"),
                    media_query   = table.find(".media-query"),
                    crp           = edit_element.find("input[name=\"crp\"]"),
                    responsive_padding_array = [];

                // Set defaults

                if(typeof(padding_val) != "undefined" && padding_val.length){

                    var padding_array = padding_val.split(",");

                    padding_box.find("input[name=\"padding-top\"]").attr('value',padding_array[0]);
                    padding_box.find("input[name=\"padding-right\"]").attr('value',padding_array[1]);
                    padding_box.find("input[name=\"padding-bottom\"]").attr('value',padding_array[2]);
                    padding_box.find("input[name=\"padding-left\"]").attr('value',padding_array[3]);

                }

                var crp_val = crp.val();

                if(typeof(crp_val) != "undefined" && crp_val.length){
                    var crp_array = crp_val.split(",");

                    media_query.each(function(index){
                        var $this = $(this);
                        var defaults = crp_array[index].split(":");

                        if(defaults[0] == $this.data("query")){
                            $this.find("td.left option[value=\""+defaults[1]+"\"]").attr("selected","selected").siblings().removeAttr("selected");
                            $this.find("td.right option[value=\""+defaults[2]+"\"]").attr("selected","selected").siblings().removeAttr("selected");
                        }
                    });

                }

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_more_box"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_more_box"]').length) {

                        var ID  = uniqueID();
                        var CSS = '';

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_more_box"]');

                        var icon_color      = edit_element.find('input[name="icon_color"]').val(),
                            icon_back_color = edit_element.find('input[name="icon_back_color"]').val(),
                            width           = edit_element.find('input[name="width"]').val(),
                            height          = edit_element.find('input[name="height"]').val();

                        CSS += '.et-more-box-'+ID+' .et-more-box-content {';
                            if (icon_back_color.length) {CSS += 'background-color:'+icon_back_color+';';}
                            if (width.length) {CSS += 'width:'+width+'px;';}
                            if (height.length) {CSS += 'height:'+height+'px;';}
                        CSS += '}';

                        CSS += '.et-more-box-'+ID+' .et-more-box-icon {';
                            if (icon_back_color.length) {CSS += 'background-color:'+icon_back_color+';';}
                        CSS += '}';

                        if (icon_color.length) {
                            CSS += '.et-more-box-'+ID+' .et-more-box-icon:before, .et-more-box-'+ID+' .et-more-box-icon:after {';
                                CSS += 'background-color:'+icon_color+';';
                            CSS += '}';
                        }

                        /* Padding
                        ---------------*/

                            var padding_left   = edit_element.find(".padding-box input[name=\"padding-left\"]").val(),
                                padding_top    = edit_element.find(".padding-box input[name=\"padding-top\"]").val(),
                                padding_right  = edit_element.find(".padding-box input[name=\"padding-right\"]").val(),
                                padding_bottom = edit_element.find(".padding-box input[name=\"padding-bottom\"]").val();

                            padding_top = (padding_top.length) ? padding_top : '0';
                            padding_right = (padding_right.length) ? padding_right : '0';
                            padding_bottom = (padding_bottom.length) ? padding_bottom : '0';
                            padding_left = (padding_left.length) ? padding_left : '0';

                            var padding_output = padding_top+','+padding_right+','+padding_bottom+','+padding_left,
                                padding_value  = padding_top+'px '+padding_right+'px '+padding_bottom+'px '+padding_left+'px';

                            padding.val(padding_output);

                            CSS += '.et-more-box-'+ID+' .et-more-box-content {';
                                CSS += 'padding:'+padding_value+';';
                            CSS += '}';

                         /* Responsive padding
                        ---------------*/

                            if(crp.length){

                                for(var i=0;i<media_query.length;i++){
                                    var query = $(media_query[i]).data("query");
                                    var left = $(media_query[i]).find("td.left option:selected").val();
                                    var right = $(media_query[i]).find("td.right option:selected").val();
                                    responsive_padding_array.push(query+":"+left+":"+right);
                                }

                                var padding_string = responsive_padding_array.join();
                                crp.val(padding_string);
                                responsive_padding_array= [];

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