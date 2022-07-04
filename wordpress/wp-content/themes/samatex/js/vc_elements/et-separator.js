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
                return dataObj[key] === "et_separator";
            });

        /* Edit element
        /*-------------*/

            if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_separator"){

                var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_separator"]'),
                    animate      = edit_element.find('select[name="animate"] option:selected').val(),
                    table        = edit_element.find(".responsive-visibility"),
                    media_query  = table.find(".media-query"),
                    rv           = edit_element.find("input[name=\"rv\"]"),
                    visibility_array = [],
                    element_css  = edit_element.find('textarea[name="element_css"]'),
                    element_id   = edit_element.find('input[name="element_id"]');

                // Set defaults

                    var rv_val = rv.val();

                    if(typeof(rv_val) != "undefined" && rv_val.length){
                        var rv_array = rv_val.split(",");

                        media_query.each(function(index){
                            var $this = $(this);
                            var $thisQuery = String($this.data("query"));
                            if(isInArray($thisQuery, rv_array)){
                                $this.find("input[name=\""+$thisQuery +"\"]").attr("checked",true);
                            }
                        });
                    }

                $('#vc_ui-panel-edit-element[data-vc-shortcode="et_separator"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                    if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_separator"]').length) {

                        var ID  = uniqueID();
                        var CSS = '';

                        edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_separator"]');

                        var height = edit_element.find('input[name="height"]').val(),
                            width  = edit_element.find('input[name="width"]').val(),
                            top    = edit_element.find('input[name="top"]').val(),
                            bottom = edit_element.find('input[name="bottom"]').val(),
                            type   = edit_element.find('select[name="type"] option:selected').val(),
                            color  = edit_element.find('input[name="color"]').val();

                        if(rv.length){

                            for(var i=0;i<media_query.length;i++){

                                var query = $(media_query[i]).data("query");
                                var checked = $(media_query[i]).find("input[type='checkbox']:checked").val();

                                if(typeof(checked) != "undefined" && checked.length){
                                    visibility_array.push(query);
                                }
                            }

                            var visibility_string = visibility_array.join();
                            rv.val(visibility_string);
                            visibility_array = [];
                        }

                        CSS += '.et-separator-'+ID+' .line {';
                            if (top.length) {CSS += 'margin-top:'+top+'px;';}
                            if (bottom.length) {CSS += 'margin-bottom:'+bottom+'px;';}
                            if (color.length) {CSS += 'border-bottom-color:'+color+';';}
                            if (type.length) {CSS += 'border-bottom-style:'+type+';';}
                            if (animate.length && animate == 'false') {
                                if (height.length) {
                                    CSS += 'height:'+height+'px;border-bottom-width:'+height+'px;';
                                }
                                if (width.length) {
                                    CSS += 'width:'+width+'px;';
                                }
                            } else {
                                if (height.length) {
                                    CSS += 'border-bottom-width:'+height+'px;';
                                }
                            }
                        CSS += '}';

                        if (animate.length && animate == 'true') {

                            CSS += '.et-separator-'+ID+'.active .line {';
                                if (height.length) {
                                    CSS += 'height:'+height+'px;';
                                }
                                if (width.length) {
                                    CSS += 'width:'+width+'px;';
                                }
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
                        var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-separator.animate-true');
                        if (typeof(element) != 'undefined' && element != null) {
                            iframeSCRIPT(element);
                        }
                    });
                }
                return;
            }

    });

})(jQuery);