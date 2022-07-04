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

    function iframeSCRIPT(element,win){
        $(element).each(function(){

            var $this      = $(this);
            var strings    = $this.data('strings');
            var autostart  = $this.hasClass('autostart-true') ? true : false;
            var startdelay = $this.data('startdelay');
            
            strings    = strings.split(",");

            var string_1 = strings[0];
            var string_2 = strings[1];
            var string_3 = strings[2];
            var string_4 = strings[3];

            $this.waypoint({
                handler: function(direction) {

                    var element = $(this.element);

                    if (element.hasClass('onlyfirst')) {
                        element.find('.typeit-dynamic').typeIt({
                            speed: 100,
                            startDelay:startdelay,
                            autoStart: true,
                            loop:false,
                            lifeLike:true
                        })
                        .tiType(string_1);
                    } else {
                        element.find('.typeit-dynamic').typeIt({
                            speed: 100,
                            startDelay:startdelay,
                            autoStart: true,
                            loop:false,
                            lifeLike:true
                        })
                        .tiType(string_1)
                        .tiPause(1000)
                        .tiDelete(string_1.length)
                        .tiType(string_2)
                        .tiPause(1000)
                        .tiDelete(string_2.length)
                        .tiType(string_3)
                        .tiPause(1000)
                        .tiDelete(string_3.length)
                        .tiType(string_4);
                    }

                    this.destroy();

                },
                offset: 'bottom-in-view',
                context: win
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
                        return dataObj[key] === "et_typeit";
                    });

                /* Edit element
                /*-------------*/

                    if(dataObj['action'] == "vc_edit_form" && dataObj['tag'] == "et_typeit"){

                        var edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_typeit"]');

                        var element_css  = edit_element.find('textarea[name="element_css"]'),
                            element_id   = edit_element.find('input[name="element_id"]'),
                            margin_box   = edit_element.find(".margin-box"),
                            margin       = edit_element.find('input[name="margin"]'),
                            margin_val   = margin.val(),
                            margin_array = [],
                            padding_box   = edit_element.find(".padding-box"),
                            padding       = edit_element.find('input[name="padding"]'),
                            padding_val   = padding.val(),
                            padding_array = [];

                        if(typeof(margin_val) != "undefined" && margin_val.length){

                            var margin_array = margin_val.split(",");

                            margin_box.find("input[name=\"margin-top\"]").attr('value',margin_array[0]);
                            margin_box.find("input[name=\"margin-right\"]").attr('value',margin_array[1]);
                            margin_box.find("input[name=\"margin-bottom\"]").attr('value',margin_array[2]);
                            margin_box.find("input[name=\"margin-left\"]").attr('value',margin_array[3]);

                        }

                        if(typeof(padding_val) != "undefined" && padding_val.length){

                            var padding_array = padding_val.split(",");

                            padding_box.find("input[name=\"padding-top\"]").attr('value',padding_array[0]);
                            padding_box.find("input[name=\"padding-right\"]").attr('value',padding_array[1]);
                            padding_box.find("input[name=\"padding-bottom\"]").attr('value',padding_array[2]);
                            padding_box.find("input[name=\"padding-left\"]").attr('value',padding_array[3]);

                        }

                        $('#vc_ui-panel-edit-element[data-vc-shortcode="et_typeit"] .vc_ui-button-action[data-vc-ui-element="button-save"]').on('click',function(){

                            if ($('#vc_ui-panel-edit-element[data-vc-shortcode="et_typeit"]').length) {

                                var ID  = uniqueID();
                                var CSS = '';

                                edit_element = $('#vc_ui-panel-edit-element[data-vc-shortcode="et_typeit"]');

                                /* Styling
                                ---------------*/

                                    var font_weight      = edit_element.find('select[name="font_weight"] option:selected').val(),
                                        font_family      = edit_element.find('select[name="font_family"] option:selected').val(),
                                        text_color       = edit_element.find('input[name="text_color"]').val(),
                                        background_color = edit_element.find('input[name="background_color"]').val(),
                                        font_size        = edit_element.find('input[name="font_size"]').val(),
                                        letter_spacing   = edit_element.find('input[name="letter_spacing"]').val(),
                                        line_height      = edit_element.find('input[name="line_height"]').val(),
                                        text_transform   = edit_element.find('select[name="text_transform"] option:selected').val();

                                    if (background_color.length) {
                                        CSS += '#et-typeit-'+ID+' .text-wrapper {';
                                            CSS += 'background-color:'+background_color+';';
                                        CSS += '}';
                                    } else {
                                        CSS += '#et-typeit-'+ID+' .text-wrapper {';
                                            CSS += 'background-color:transparent;padding:0;';
                                        CSS += '}';
                                    }

                                    CSS += '#et-typeit-'+ID+' {';
                                        
                                        if (text_color.length) {CSS += 'color:'+text_color+';';}
                                        if (font_size.length) {CSS += 'font-size:'+font_size+'px;';}

                                        if (font_weight.length && font_weight != "italic") {

                                            if (isInArray(font_weight,font_weight_array)) {
                                                font_weight = font_weight.substring(0, 3);
                                                CSS += 'font-style:italic;';
                                            }

                                            if (font_weight == "regular") {
                                                font_weight = "400";
                                            }

                                            CSS += 'font-weight:'+font_weight+';';
                                        }

                                        if (letter_spacing.length) {CSS += 'letter-spacing:'+letter_spacing+'px;';}
                                        if (line_height.length) {CSS += 'line-height:'+line_height+'px;';}
                                        if (text_transform.length) {CSS += 'text-transform:'+text_transform+';';}
                                        if (font_family.length && font_family != "Theme default") {CSS += 'font-family:\''+font_family+'\';';}

                                    CSS += '}';

                                /* Margin
                                ---------------*/

                                    var margin_left   = edit_element.find(".margin-box input[name=\"margin-left\"]").val(),
                                        margin_top    = edit_element.find(".margin-box input[name=\"margin-top\"]").val(),
                                        margin_right  = edit_element.find(".margin-box input[name=\"margin-right\"]").val(),
                                        margin_bottom = edit_element.find(".margin-box input[name=\"margin-bottom\"]").val();

                                    margin_top = (margin_top.length) ? margin_top : '0';
                                    margin_right = (margin_right.length) ? margin_right : '0';
                                    margin_bottom = (margin_bottom.length) ? margin_bottom : '0';
                                    margin_left = (margin_left.length) ? margin_left : '0';

                                    var margin_output = margin_top+','+margin_right+','+margin_bottom+','+margin_left,
                                        margin_value  = margin_top+'px '+margin_right+'px '+margin_bottom+'px '+margin_left+'px';

                                    margin.val(margin_output);

                                    CSS += '#et-typeit-'+ID+' {';
                                        CSS += 'margin:'+margin_value+';';
                                    CSS += '}';

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

                                    CSS += '#et-typeit-'+ID+' .text-wrapper {';
                                        CSS += 'padding:'+padding_value+';';
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

                                iframe = document.getElementById('vc_inline-frame');
                                
                                var win = iframe.contentWindow;
                                var element = doc.find('.vc_element[data-model-id="'+dataObj['shortcodes[0][id]']+'"] .et-typeit');
                                if (typeof(element) != 'undefined' && element != null) {
                                    iframeSCRIPT(element,win);
                                }
                            });
                        }
                        return;
                    }

                    

        });

})(jQuery);